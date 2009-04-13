<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Parses content, gets all CSS images, converts them to CSS Sprites.
 * Outputs minified (no sorting selectors) content
 *
 **/
class css_sprites {

	/**
	* Constructor
	* Sets the options
	**/
	function css_sprites ($css_code, $options) {
/* safely check for CSS Tidy */
		if (!class_exists('csstidy')) {
			require_once('class.csstidy.php');
		}
/* convert CSS code to hash */
		$this->css = new csstidy();
		$this->css->load_template($options['root_dir'] . 'libs/php/css.template.tpl');
		$this->css->parse($css_code);
/* array for global media@ distribution */
		$this->media = array();
/* array for images from selectors */
		$this->css_images = array();
/* timestamp for CSS Sprites files */
		$this->timestamp = '';
/* set directories */
		$this->current_dir = $options['current_dir'];
		$this->root_dir = $root_dir;
		$this->website_root = $options['website_root'];
/* output True Color images in JPEG (or PNG24) */
		$this->truecolor_in_jpeg = $options['truecolor_in_jpeg'];
/* use aggressive logic for repeat-x/y */
		$this->aggressive = $options['aggressive'];
/* list of excluded from CSS Sprites files */
		$this->ignore_list = split("\\\s+", $options['ignore_list']);
/* part or full process */
		$this->partly = $options['partly'];
	}
	/**
	* Main function
	* Process with given data
	**/
	function process() {

		foreach ($this->css->css as $import => $token) {
/* create array for selectors with background images */
			$this->media[$import] = array();
			foreach ($token as $tags => $rule) {
				foreach ($rule as $key => $value) {
/* standartize all background values from input */
					if (preg_match("/background/", $key)) {
						foreach (split(",", $tags) as $tag) {
/* fix for hiden :link selectors */
							$tag = preg_replace("/:link/", "", $tag);
/* create new item (array) if required */
							if (!empty($this->media[$import][$tag])) {
								$this->media[$import][$tag] = array();
							}

							if ($key == 'background') {
/* resolve background property */
								$background = $this->css->optimise->dissolve_short_bg($value);
								foreach ($background as $bg => $property) {
/* skip default properties */
									if (!($bg == 'background-position' && ($property == '0 0 !important' || $property == 'top left !important' || $property == '0 0' || $property == 'top left' || $property == 'top' || $property == 'left')) &&
										!($bg == 'background-origin' && ($property == 'padding !important' || $property == 'padding')) &&
										!($bg == 'background-color' && ($property == 'transparent !important' || $property == 'transparent')) &&
										!($bg == 'background-clip' && ($property == 'border !important' || $property == 'border')) &&
										!($bg == 'background-attachment' && ($property == 'scroll !important' || $property =='scroll')) &&
										!($bg == 'background-size' && ($property == 'auto !important' || $property == 'auto')) &&
										!($bg == 'background-repeat' && ($property == 'repeat !important' || $property == 'repeat'))) {

										if ($bg == 'background-image' && $property == 'none !important') {
											$property = 'none';
										}
										$this->media[$import][$tag][$bg] = $property;
									}
								}
							} else {
/* skip default properties */
								if (!($key == 'background-position' &&
										($value == 'top left' || $value == 'left top' || $value == '0px 0px' || $value == '0 0' || $value == '0% 0%' || $value == 'top' || $value == 'left'))) {

									$this->media[$import][$tag][$key] = $value;
								}
							}
						}
					}
				}
			}
		}
/* fill images arrays with possible dimensions */
		foreach ($this->css->css as $import => $token) {
			foreach ($token as $tags => $rule) {
				foreach ($rule as $property => $value) {
					if ($property == 'width' || $property == 'height') {
/* try to add all possible dimensial properties for selected tags with background */
						foreach ($this->media as $imp => $images) {
							foreach ($images as $key => $image) {
								$fixed_key = $this->fix_css3_selectors($key);
/* remove pseudo-selectors, i.e. :focus, :hover, etc*/
								if (in_array($key, split(",", $tags)) || in_array($fixed_key, split(",", $tags))) {
									$this->media[$imp][$key][$property] = $value;
								}
							}
						}

					}

				}

			}

		}
/* normalize array -- skip items w/o background (none or just color) */
		foreach ($this->media as $import => $images) {

			foreach ($images as $key => $image) {

				$back = $image['background-image'];

				if (empty($back) || $back == 'none') {
/* try to find w/o CSS3 pseudo-selectors, i.e. :focus, :hover, etc */
					$key_fixed = $this->fix_css3_selectors($key);
					if (!empty($this->media[$import][$key_fixed])) {
						if (!empty($this->media[$import][$key_fixed]['background-image'])) {
							$back = $this->media[$import][$key]['background-image'] = $this->media[$import][$key_fixed]['background-image'];
							if (empty($image['width'])) {
								$image['width'] = $this->media[$import][$key]['width'] = $this->media[$import][$key_fixed]['width'];
							}
							if (empty($image['height'])) {
								$image['height'] = $this->media[$import][$key]['height'] = $this->media[$import][$key_fixed]['height'];
							}
							if (empty($image['background-repeat'])) {
								$image['background-repeat'] = $this->media[$import][$key]['background-repeat'] = $this->media[$import][$key_fixed]['background-repeat'];
							}
						}
					}
				}
/* exclude files from ignore list */
				if (!empty($this->ignore_list) && in_array(preg_replace("/.*\//", "", substr($back, 4, strlen($back) - 5)), $this->ignore_list)) {
					unset($this->media[$import][$key]);
				}

/* re-check background image existence */
				if (!empty($back) && $back != 'none') {

					if (!empty($image['height']) && !empty($image['width']) && empty($image['background-repeat'])) {
						$image['background-repeat'] = $this->media[$import][$key]['background-repeat'] = 'no-repeat';
					}
					if (!empty($image['background-repeat'])) {
						$repeat_key = $image['background-repeat'];
						if ($image['background-repeat'] == 'no-repeat') {
							if ($image['height'] && !preg_match("/em|%|auto/", $image['height']) && ($image['background-position'] == '100% 0' || (preg_match("/right/", $image['background-position']) && !preg_match("/bottom|center|(50|100)%/", $image['background-position'])))) {
								$repeat_key = 'no-repeatr';
							} elseif ($image['width'] && !preg_match("/em|%|auto/", $image['width']) && ($image['background-position'] == '0 100%' || (preg_match("/bottom/", $image['background-position']) && !preg_match("/right|center|(50|100)%/", $image['background-position'])))) {
								$repeat_key = 'no-repeatb';
							} elseif ($image['width'] && $image['height'] && !preg_match("/em|%|auto/", $image['height']) && !preg_match("/em|%|auto/", $image['width'])) {
								$repeat_key = 'no-repeat';
							} elseif (!preg_match("/right|bottom|center|%|em/", $image['background-position'])) {
								$repeat_key = 'no-repeati';
							} else {
								$repeat_key = 'repeat';
							}
						}
						if ($image['background-repeat'] == 'repeat-x') {
							if (!$image['height'] && !$this->aggressive) {
								$repeat_key = 'repeat-xl';
							} elseif (preg_match("/right|bottom|center|%|em/", $image['background-position'])) {
								$repeat_key = 'repeat';
							}
						}
						if ($image['background-repeat'] == 'repeat-y') {
							if (!$image['width'] && !$this->aggressive) {
								$repeat_key = 'repeat-yl';
							} elseif (preg_match("/right|bottom|center|%|em/", $image['background-position'])) {
								$repeat_key = 'repeat';
							}
						}
						if ($repeat_key == 'repeat') {
							unset($this->media[$import][$key]);
						} else {
							$this->media[$import][$key]['background-repeat'] = $repeat_key;
/* count different images with repeating options */
							$this->css_images[$repeat_key]++;
/* count selectors for every images -- to handle initial CSS Sprites */
							if (empty($this->css_images[$back])) {
								$this->css_images[$back] = array();
							}
							$this->css_images[$back][$image['background-position']] = 1;
						}
/* disable images w/o background-repeat */
					} else {
						unset($this->media[$import][$key]);
					}
				}
/* merge params to form unique string. Should be rearranged alphabetically... */
				if (!empty($this->media[$import][$key])) {
					$this->timestamp .= $back . $image['width'] . $image['height'] . $this->media[$import][$key]['background-repeat'];
				}
			}

		}
/* convert timestamp to md5 hash */
		$this->timestamp = substr(md5($this->timestamp), 0, 10);
/* combine dimensional CSS Sprites */
		foreach ($this->media as $import => $images) {

			foreach ($images as $key => $image) {
/* no initial CSS Sprites */
				if (count($this->css_images[$image['background-image']]) < 2) {
					$this->sprite = 'webo'. preg_replace("/(repeat-|no-repeat)/", "", $image['background-repeat']) .'.' . $this->timestamp .'.png';
					$this->css_image = substr($image['background-image'], 4, strlen($image['background-image']) - 5);
					list($width, $height) = $this->get_image();
					if ($width && $height) {
/* fix background-position & repeat for fixed images */
						if ($width == $image['width'] && $height == $image['height']) {
							$image['background-repeat'] = $this->media[$import][$key]['background-repeat'] = 'no-repeat';
/* but try to save existing position */
							if (!$image['background-position']) {
								$image['background-position'] = $this->media[$import][$key]['background-position'] = '0 0';
							}
						}
						if (!$this->css_images[$this->sprite]) {
							$this->css_images[$this->sprite] = array();
							$this->css_images[$this->sprite]['x'] = 0;
							$this->css_images[$this->sprite]['y'] = 0;
							$this->css_images[$this->sprite]['images'] = array();
						}
/* fast fix for recalculating Sprites from PNG to JPEG -- don't touch files themselves */
						if (preg_match("/\.jpe?g/i", $this->css_image) && $this->truecolor_in_jpeg) {
							$this->css_images[$this->sprite]['jpeg'] = 1;
						}
						$shift_x = $shift_y = $top = $left = 0;
						$position = split(" ", $image['background-position']);
						switch ($image['background-repeat']) {
/* repeat-x case w/ dimensions */
							case 'repeat-x':
/* repeat-x case w/o dimensions - can be added safely only to the end of Sprite */
							case 'repeat-xl':
								$top = ($position[0] == 'top' || $position[1] == 'top') ? 0 : round($position[1]);
/* shift for bottom left corner of the object */
								$shift_y = $image['height'] > $height ? $image['height'] - $height : 0;
								break;
/* repeat-y case */
							case 'repeat-y':
/* repeat-y case w/o dimensions - can be added safely only to the end of Sprite */
							case 'repeat-yl':
								$left = ($position[0] == 'left' || $position[1] == 'left') ? 0 : round($position[0]);
								$shift_x = $image['width'] > $width ? $image['width'] - $width : 0;
								break;
/* no-repeat case w/ dimensions can be placed all together */
							case 'no-repeat':
								$shift_x = $image['width'] > $width ? $image['width'] - $width : 0;
								$shift_y = $image['height'] > $height ? $image['height'] - $height : 0;
/* no-repeat case w/o dimensions -- icons -- should be placed like this:
	*
   *
  *
 *
*/
							case 'no-repeati':
/* don't need any shift for icons -- they have enough room for any object */
								$left = ($position[0] == 'left' || $position[1] == 'left') ? 0 : round($position[0]);
								$top = ($position[0] == 'top' || $position[1] == 'top') ? 0 : round($position[1]);
								break;
/* no-repeat case with 100% 0 */
							case 'no-repeatr':
								$left = 'right';
								$top = ($position[0] == 'top' || $position[1] == 'top') ? 0 : round($position[1]);
								break;
/* no-repeat case with 0 100% */
							case 'no-repeatb':
								$left = ($position[0] == 'left' || $position[1] == 'left') ? 0 : round($position[0]);
								$top = 'bottom';
								break;
							}
/* add image to CSS Sprite to merge. Overall picture looks like this:
__________________
|    left         |   <- outer borders belong to
|top  ______      |      an object
|    | width|     |    <- inner borders belong
|    |height|     |       to the image
|    |______|     |
|            shift|
|_________________|
*/
						$this->css_images[$this->sprite]['images'][] = array($this->css_image, $width, $height, $left, $top, $shift_x, $shift_y, $import, $key);
					}
				}
			}

		}
/* merge simple cases: repeat-x/y */
		$this->sprite = 'webox.'. $this->timestamp .'.png';
		$this->merge_sprites(1);
		$this->sprite = 'weboy.'. $this->timestamp .'.png';
		$this->merge_sprites(2);
/* handle some specific cases -- 0 100% and 100% 0 images */
		$this->sprite = 'webor.'. $this->timestamp .'.png';
		$this->merge_sprites(5);
		$this->sprite = 'webob.'. $this->timestamp .'.png';
		$this->merge_sprites(6);
/* create first part of CSS Sprites */
		if ($this->partly) {
			return '';
		} else {
/* only then try to combine all possible images into the last one */
			$this->sprite = 'webo.'. $this->timestamp .'.png';
			$this->merge_sprites(4);
			return html_entity_decode($this->css->print->formatted());
		}
	}
/* download requested image */
	function get_image () {
/* handle cases with data:URI */
		if (substr($this->css_image, 0, 5) == 'data:') {
			$image_name = md5($this->css_image) . "." . preg_replace("/.*image\/([^;]*);base64.*/", "$1", $this->css_image);
			$fp = fopen($image_name , "w");
			if ($fp) {
				fwrite($fp, base64_decode(preg_replace("/.*;base64,/", "", $this->css_image)));
				fclose($fp);
				$this->css_image = $image_name;
			} else {
				$this->css_image = '';
			}
/* handle cases with mhtml: */
		} elseif (substr($this->css_image, 0, 6) == 'mhtml:') {
			$this->css_image = '';
		} else {
			if (preg_match("/http:\/\//", $this->css_image)) {
/* check for curl */
				if (function_exists('curl_init')) {
/* try to download image */
					$ch = curl_init($this->css_image);
					$this->css_image = preg_replace("/.*\//", "", $this->css_image);
					$fp = fopen($this->css_image, "w");
					if ($fp && $ch) {
						curl_setopt($ch, CURLOPT_FILE, $fp);
						curl_setopt($ch, CURLOPT_HEADER, 0);
						curl_setopt($ch, CURLOPT_REFERER, $protocol . $host);
						curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Web Optimizer; Speed Up Your Website; http://web-optimizer.us/) Firefox 3.0.7");
						curl_exec($ch);
						curl_close($ch);
						fclose($fp);
					}
				} else {
					$this->css_image = '';
				}
			} else {
				$this->css_image = preg_match("/^\//", $this->css_image) ? $this->website_root . $this->css_image : $this->current_dir . '/' .$this->css_image;
			}
		}
		if (is_file($this->css_image)) {
/* check for animation */
			if (strtolower(preg_replace("/.*\./", "", $this->css_image)) == 'gif' && $this->is_animated_gif($this->css_image)) {
				return array(0, 0);
			}
/* get dimensions from downloaded image */
			return getimagesize($this->css_image);
		} else {
			return array(0, 0);
		}
	}
/* find places for images in complicated Sprite */
	function sprites_placement ($css_images, $css_icons) {
/* initial matrix for css images */
		$matrix = array(array(0));
		$css_images['x'] = $css_images['y'] = $matrix_x = $matrix_y = 0;
/* check if we have initial no-repeat images */
		if (is_array($css_images['images'])) {
/* array for images ordered by square */
			$ordered_images = array();
/* to track duplicates */
			$added_images = array();
/* add images to this matrix one-by-one */
			foreach ($css_images['images'] as $image) {
				$square = $image[1] * $image[2];
				while ($ordered_images[$square]) {
/* increase square while we don't have unique key */
					$square++;
				}
				$ordered_images[$square] = $image;
			}
/* sort images by square */
			krsort($ordered_images);
/* add images to matrix */
			foreach ($ordered_images as $key => $image) {
				$minimal_x = 0;
				$minimal_y = 0;
/* if this is a unique image */
				if (!$added_images[$image[0]]) {
/* initial coordinates */
					$I = $J = 0;
					$width = $image[1] + $image[3] + $image[5];
					$height = $image[2] + $image[4] + $image[6];
					$shift_x = $image[3];
					$shift_y = $image[4];
/* to remember the most 'full' place for new image */
					$minimal_square = $matrix_x * $matrix_y;
/* flag if we have enough space */
					$no_space = 1;
					for ($i = 0; $i < $matrix_x; $i++) {
						for ($j = 0; $j < $matrix_y; $j++) {
/* left top corner is empty and three other corners are empty -- we have a placeholder */
							if (!$matrix[$i][$j] && !$matrix[$i + $width] && !$matrix[$i][$j + $height] && !$matrix[$i + $width][$j] && !$matrix[$i + $width][$j + $height]) {
/* and Sprite is big enough */
								if ($i + $width < $matrix_x && $j + $height < $matrix_y) {
									$I = $i;
									$J = $j;
									$i = $matrix_x;
									$j = $matrix_y;
									$no_space = 0;
								} else {
/* else try to remember this placement -- it can be the optimal one */
									if (!$I && !$J && ($i + $width > $matrix_x ? $i + $width - $matrix_x : 0) * $height + ($j + $height > $matrix_y ? $j + $height - $matrix_y : 0) * $matrix_x < $minimal_square ) {
/* if this place is better and we haven't chosen placement yet */
										$minimal_square = ($i + $width > $matrix_x ? $i + $width - $matrix_x : 0) * $height + ($j + $height > $matrix_y ? $j + $height - $matrix_y : 0) * $matrix_x;
										$I = $i;
										$J = $j;
									}
								}
							}
						}
					}
					if ($no_space) {
/* re-count minimal square with linear enlargement */
						if ($width * $matrix_y <= $minimal_square) {
							$I = $matrix_x;
							$J = 0;
						} elseif ($height * $matrix_x <= $minimal_square) {
							$I = 0;
							$J = $matrix_y;
						}
					}
/* calculate increase of matrix dimensions */
					$minimal_x = $I + $width > $matrix_x ? $width + $I - $matrix_x : 0;
					$minimal_y = $J + $height > $matrix_y ? $height + $J - $matrix_y : 0;
/* fill matrix for this image */
					for ($i = $I; $i < $I + $width; $i++) {
						for ($j = $J; $j < $J + $height; $j++) {
							$matrix[$i][$j] = 1;
						}
					}
/* remember coordinates for this image, keep top/left */
					$ordered_images[$key][3] = $I + $ordered_images[$key][3];
					$ordered_images[$key][4] = $J + $ordered_images[$key][4];
/* add images to processed */
					$added_images[$image[0]] = array($I, $J);
				} else {
/* just copy calculated coordinates */
					$ordered_images[$key][3] = $added_images[$image[0]][0];
					$ordered_images[$key][4] = $added_images[$image[0]][1];
				}
/* remember initial background-position */
				$ordered_images[$key][5] = $shift_x;
				$ordered_images[$key][6] = $shift_y;
				$matrix_x += $minimal_x;
				$matrix_y += $minimal_y;
			}
			$css_images['images'] = $ordered_images;
			$css_images['x'] = $matrix_x;
			$css_images['y'] = $matrix_y;
		}
		$distance = $x = $y = 0;
/* count initial shift (not to hurt current images) */
		$shift = $matrix_y;
/* need to add weboi Sprite to the main one */
		if (count($css_icons['images'])) {
			foreach ($css_icons['images'] as $image) {
				$shift += $image[2] + $image[4];
			}
/* distance from the main Sprite */
			$distance = $shift - $matrix_y - $css_icons['images'][0][2] - $css_icons['images'][0][4];
			$x = 0;
			$y = $shift;
/* creating 'steps' */
			foreach ($css_icons['images'] as $image) {
				$width = $image[1];
				$height = $image[2];
				$final_x = $image[3];
				$final_y = $image[4];
				$i = $x;
				$x = $x + $width + $final_x;
				$y = $y - $height - $final_y;
				$image[3] = $x - $width;
				$image[4] = $y + $final_y;
				$image[5] = $final_x;
				$image[6] = $final_y;
				$j = $y;
				while (!$matrix[$i][$j] && $j>0) {
					$j--;
				}
/* remember minimal distance */
				if ($distance > $y - $j - 1) {
					$distance = $y - $j - 1;
				}
/* to separate new images from old ones */
				$image[] = 1;
				$css_images['images'][] = $image;
			}
		}
/* try to restore required pixels in the Sprite */
		$addon_y = $y < 0 ? -$y : 0;
		if (is_array($css_images['images'])) {
			foreach ($css_images['images'] as $key => $image) {
/* images from the main Sprite */
				if (empty($image[9])) {
					$css_images['images'][$key][4] += $addon_y;
/* shrink distance between webo and weboi Sprites */
				} else {
					$css_images['images'][$key][4] -= $distance;
				}
			}
/* increase dimensions */
			$css_images['x'] = $x > $matrix_x ? $x : $matrix_x;
			$css_images['y'] = $shift - $distance + ($y - $distance < 0 ? $distance - $y : 0);
			return $css_images;
		} else {
			return array();
		}

	}
/* merge all images into final CSS Sprite */
	function merge_sprites ($type) {

		if ((!empty($this->css_images[$this->sprite]) || ($type == 4 && !empty($this->css_images['weboi.'. $this->timestamp .'.png'])))) {
/* avoid re-calculating of images to switch from PNG to JPEG */
			$file_exists = is_file(preg_replace("/\.png$/i", empty($this->css_images[$this->sprite]['jpeg']) ? '.png' : '.jpg', $this->sprite));
			$images_number = false;
			if (!empty($this->css_images[preg_replace("/(x|y)/", "$1l", $this->sprite)])) {
				$images_number = count($this->css_images[$this->sprite]['images']) && count($this->css_images[preg_replace("/(x|y)/", "$1l", $this->sprite)]['images']);
			} else {
				$images_number = count($this->css_images[$this->sprite]['images']) > 1;
			}

			if ($images_number || $type == 4) {

				$this->css_images[$this->sprite]['x'] = 0;
				$this->css_images[$this->sprite]['y'] = 0;
/* recount x/y sizes for repeat-x / repeat-y / repeat icons -- we can have duplicated dimensions */
				$counted_images = array();
/* flag for full color (if JPEG is used) */
				$fullcolor = 0;
				if (is_array($this->css_images[$this->sprite]['images'])) {
					foreach ($this->css_images[$this->sprite]['images'] as $key => $image) {
						if (($type == 1 || $type == 2) && !$counter_images[$image[0]]) {
							$width = $image[1];
							$height = $image[2];
							$final_x = $image[3];
							$final_y = $image[4];
							$shift_x = $image[5];
							$shift_y = $image[6];
							switch ($type) {
								case 1:
									$this->css_images[$this->sprite]['images'][$key][3] = 0;
									$this->css_images[$this->sprite]['images'][$key][4] = $this->css_images[$this->sprite]['y'] + $final_y;
									$this->css_images[$this->sprite]['x'] = $width > $this->css_images[$this->sprite]['x'] ? $width : $this->css_images[$this->sprite]['x'];
									$this->css_images[$this->sprite]['y'] += $height + $final_y + $shift_y;
								break;
								case 2:
									$this->css_images[$this->sprite]['images'][$key][3] = $this->css_images[$this->sprite]['x'] + $final_x;
									$this->css_images[$this->sprite]['images'][$key][4] = 0;
									$this->css_images[$this->sprite]['x'] += $width + $final_x + $shift_x;
									$this->css_images[$this->sprite]['y'] =  $height > $this->css_images[$this->sprite]['y'] ? $height : $this->css_images[$this->sprite]['y'];
								break;
							}
							$counter_images[$image[0]] = 1;
						}
						if (preg_match("/\.jpe?g/i", $image[0])) {
							$fullcolor = 1;
						}
					}
				}
				$added_height = 0;
				$added_width = 0;
				if ($type == 1) {
					$no_dimensions = preg_replace("/x/", "xl", $this->sprite);
/* add to the end of Sprite repeat-x w/o dimensions */
					if (count($this->css_images[$no_dimensions]['images'])) {
						$image = $this->css_images[$no_dimensions][0];
						$final_y = $image[4];
						$image[3] = 0;
						$image[4] += $this->css_images[$this->sprite]['y'];
						$this->css_images[$this->sprite]['images'][] = $image;
						$this->css_images[$this->sprite]['x'] = $image[1] > $this->css_images[$this->sprite]['x'] ? $image[1] : $this->css_images[$this->sprite]['x'];
						$this->css_images[$this->sprite]['y'] += $image[2] + $final_y;
						unset($this->css_images[$no_dimensions][0]);
					}
					$counted_images = array();
					$no_repeat = preg_replace("/x/", "", $this->sprite);
					if (!empty($this->css_images[$no_repeat]['images'])) {
/* try to find small no-repeat image to put before all repeat-x ones */
						foreach ($this->css_images[$no_repeat]['images'] as $key => $image) {
							if ($image[1] <= $this->css_images[$this->sprite]['x'] && !$counted_images[$image[0]]) {
								$counted_images[$image[0]] = 1;
								$final_y = $image[4];
								$image[3] = 0;
								$image[4] = $added_height + $final_y;
								$added_height += $image[2] + $final_y + $image[6];
								$this->css_images[$this->sprite]['y'] += $image[2] + $final_y + $image[6];
								$image[] = 1;
								$this->css_images[$this->sprite]['images'][] = $image;
								unset($this->css_images[$no_repeat][$key]);
							}
						}
					}
				}
				if ($type == 2) {
					$no_dimensions = preg_replace("/y/", "yl", $this->sprite);
/* add to the end of Sprite repeat-x w/o dimensions */
					if (count($this->css_images[$no_dimensions]['images'])) {
						$image = $this->css_images[$no_dimensions][0];
						$final_x = $image[3];
						$image[3] += $this->css_images[$this->sprite]['x'];
						$image[4] = 0;
						$this->css_images[$this->sprite]['images'][] = $image;
						$this->css_images[$this->sprite]['x'] += $image[1] + $final_x;
						$this->css_images[$this->sprite]['y'] = $image[2] > $this->css_images[$this->sprite]['y'] ? $image[2] : $this->css_images[$this->sprite]['y'];
						unset($this->css_images[$no_dimensions][0]);
					}
					$counted_images = array();
					$no_repeat = preg_replace("/y/", "", $this->sprite);
					if (!empty($this->css_images[$no_repeat]['images'])) {
/* try to find small no-repeat image to put before all repeat-y ones */
						foreach ($this->css_images[$no_repeat]['images'] as $key => $image) {
							if ($image['height'] <= $this->css_images[$this->sprite]['y'] && !$counted_images[$image[0]]) {
								$counted_images[$image[0]] = 1;
								$final_x = $image[3];
								$image[3] = $added_width + $final_x;
								$added_width += $image[1] + $final_x + $image[5];
								$this->css_images[$this->sprite]['x'] += $image[1] + $final_x + $image[5];
								$image[] = 1;
								$this->css_images[$this->sprite]['images'][] = $image;
								unset($this->css_images[$no_repeat][$key]);
							}
						}
					}
				}
/* need to count placement for each image in array */
				if ($type == 4) {
					$this->css_images[$this->sprite] = $this->sprites_placement($this->css_images[$this->sprite], $this->css_images[preg_replace("/webo/", "weboi", $this->sprite)]);
					$this->css_images['addon_y'] = 0;
					$sprite_right = preg_replace("/webo/", "webor", $this->sprite);
/* add right Sprite to the right top corner */
					if (is_file($sprite_right)) {
						$this->css_images['x'] += $this->css_images[$sprite_right]['x'];
						$this->css_images['y'] += $this->css_images[$sprite_right]['y'];
						$this->css_images['addon_y'] += $this->css_images[$sprite_right]['y'];
					}
					$this->css_images['addon_x'] = 0;
					$sprite_bottom = preg_replace("/webo/", "webob", $this->sprite);
/* add bottom Sprite to the bottom left corner */
					if (is_file($sprite_bottom)) {
						$this->css_images['x'] += $this->css_images[$sprite_bottom]['x'];
						$this->css_images['y'] += $this->css_images[$sprite_bottom]['y'];
						$this->css_images['addon_x'] += $this->css_images[$sprite_bottom]['x'];
					}
				}
				if (!$file_exists) {
					if ($fullcolor) {
						$this->sprite_raw = @imagecreatetruecolor($this->css_images[$this->sprite]['x'], $this->css_images[$this->sprite]['y']);
					} else {
						$this->sprite_raw = @imagecreate($this->css_images[$this->sprite]['x'], $this->css_images[$this->sprite]['y']);
					}
				}
				if ($this->sprite_raw || $file_exists) {
/* for final sprite */
					$merged_selector = array();
					if (!$file_exists) {
/* fill sprite with transparent color */
						$back = @imagecolorallocatealpha($this->sprite_raw, 0, 0, 0, 127);
						@imagecolortransparent($this->sprite_raw, $back);
						@imagefill($this->sprite_raw, 0, 0, $back);
/* to nadle 32bit alpha transparent images */
						$this->alpha_enabled = 0;
					}
/* loop in all given CSS images */
					foreach ($this->css_images[$this->sprite]['images'] as $image) {

						$filename = $image[0];
						$width = $image[1];
						$height = $image[2];
						$final_x = $image[3];
						$final_y = $image[4];
/* re-use of shifts -- to restore initial background-position */
						$shift_x = $image[5];
						$shift_y = $image[6];
						$import = $image[7];
						$key = $image[8];
/* for added to repeat-x / repeat-y image with no-repeat */
						$added = $image[9];
/* try to detect duplicates in this Sprite*/
						$image_used = 0;
						foreach ($this->css_images[$this->sprite]['images'] as $image) {
							if ($this->media[$image[5]][$image[6]]['background'] && $image[0] == $filename) {
								$image_used = 1;
								$background = $css->css[$image[5]][$image[6]]['background'];
							}
						}

						if (!$image_used) {
							if (!$file_exists) {
								$im = null;
/* try to copy initial image into sprite */
								switch (strtolower(preg_replace("/.*\./", "", $filename))) {
									case 'gif':
										$im = @imagecreatefromgif($filename);
										break;
									case 'png':
										$im = @imagecreatefrompng($filename);
										break;
									case 'jpg':
									case 'jpeg':
										$fullcolor = 1;
										$im = @imagecreatefromjpeg($filename);
										break;
									case 'bmp':
										$im = @imagecreatefromwbmp($filename);
										break;
								}
							}

							if ($im || $file_exists) {
								if (!$file_exists) {
									$colors = @imagecolorsforindex($im, @imagecolorat($im, 0, 0));
									$this->alpha_enabled = $this->alpha_enabled || !!$colors['alpha'];
/* recount colors number, switch to fullcolor if more than 256 */
									if (@imagecolorstotal($im) + @imagecolorstotal($this->sprite_raw) > 256 || $colors['alpha']) {
									$fullcolor = 1;
										$this->create_new_raw();
									}
								}
								switch ($type) {
/* 0 100% case */
									case 6:
										$css_top = 'bottom';
										$css_left = -$final_x;
										$css_repeat = 'no-repeat';
										if (!$file_exists) {
											@imagecopy($this->sprite_raw, $im, $final_x, $this->css_images[$this->sprite]['y'] - $height, 0, 0, $width, $height);
										}
										break;
/* 100% 0 case */
									case 5:
										$css_top = -$final_y;
										$css_left = 'right';
										$css_repeat = 'no-repeat';
										if (!$file_exists) {
											@imagecopy($this->sprite_raw, $im, $this->css_images[$this->sprite]['x'] - $width, $final_y, 0, 0, $width, $height);
										}
										break;
/* the most complicated case */
									case 4:
										$css_left = -$final_x + $shift_x;
										$css_top = -$final_y + $shift_y;
										$css_repeat = 'no-repeat';
										if (!$file_exists) {
											@imagecopy($this->sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
										}
										break;
/* repeat-y */
									case 2:
										$css_left = -$final_x - $added_width;
										$css_top = 0;
										if ($added) {
											$css_repeat = 'no-repeat';
										} else {
											$css_repeat = 'repeat-y';
										}
										if (!$file_exists) {
											@imagecopy($this->sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
											$final_y = $height;
/* semi-fix for bug with different height of repeating images, thx to xstroy */
											while ($final_y < $this->css_images[$this->sprite]['y']) {
												@imagecopy($this->sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
												$final_y += $height;
											}
										}
										break;
/* repeat-x */
									case 1:
										$css_left = 0;
										$css_top = -$final_y - $added_height;
										if ($added) {
											$css_repeat = 'no-repeat';
										} else {
											$css_repeat = 'repeat-x';
										}
										if (!$file_exists) {
											@imagecopy($this->sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
/* semi-fix for bug with different width of repeating images, thx to xstroy */
											while ($final_x < $this->css_images[$this->sprite]['x']) {
												@imagecopy($this->sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
												$final_x += $width;
											}
										}
										break;

								}
								if (!$file_exists) {
									@imagedestroy($im);
								}
							}

							if (!empty($this->css->css[$import][$key]['background-color']) || $css_left || $css_top || !empty($this->css->css[$import][$key]['background-attachement']) || !empty($this->css->css[$import][$key]['background'])) {
/* update current styles in initial selector */
								$this->css->css[$import][$key]['background'] = preg_replace("/ $/", "", (!empty($this->css->css[$import][$key]['background-color']) ? $this->css->css[$import][$key]['background-color'] . ' ' : '') .
									($css_left ? $css_left . 'px ' : '0 '). ($css_top ? $css_top . 'px ' : '0 ') . $css_repeat . ' ' .
									(!empty($this->css->css[$import][$key]['background-attachement']) ? $this->css->css[$import][$key]['background-attachement'] . ' ' : ''));
							}

						} else {
/* or just copy existing styles */
							$this->css->css[$import][$key]['background'] = $background;
						}
/* update array with chosen selectors -- to mark this image as used */
						$this->media[$import][$key]['background'] = 1;
						$merged_selector[$import] .= $key . ",";
						unset($this->css->css[$import][$key]['background-color'], $this->css->css[$import][$key]['background-image'], $this->css->css[$import][$key]['background-repeat'], $this->css->css[$import][$key]['background-attachement'], $this->css->css[$import][$key]['background-position']);

					}
					if (!$file_exists) {
/* try to add right and bottom Sprites to the main one */
						if ($type == 4) {
							if (is_file($sprite_right)) {
								$im = @imagecreatefrompng($sprite_right);
								if ($im) {
									if (@imagecolorstotal($im) + @imagecolorstotal($this->sprite_raw) > 256 && !$fullcolor) {
										$fullcolor = 1;
										$this->create_new_raw();
									}
								}
								@imagecopy($this->sprite_raw, $im, $this->css_images[$this->sprite]['x'] - $this->css_images[$sprite_right]['x'], 0, 0, 0, $this->css_images[$sprite_right]['x'], $this->css_images[$sprite_right]['y']);
							}
							if (is_file($sprite_bottom)) {
								$im = @imagecreatefrompng($sprite_bottom);
								if ($im) {
									if (@imagecolorstotal($im) + @imagecolorstotal($this->sprite_raw) > 256 && !$fullcolor) {
										$fullcolor = 1;
										$this->create_new_raw();
									}
								}
								@imagecopy($this->sprite_raw, $im, 0, $this->css_images[$this->sprite]['y'] - $this->css_images[$sprite_bottom]['y'], 0, 0, $this->css_images[$sprite_bottom]['x'], $this->css_images[$sprite_bottom]['y']);
							}
						}
/* output final sprite */
						if ($this->truecolor_in_jpeg && $fullcolor) {
							$this->sprite = preg_replace("/png$/", "jpg", $this->sprite);
							@imagejpeg($this->sprite_raw, $this->sprite, 80);
							if (is_file($this->root_dir . 'libs/php/jpegtran')) {
								@shell_exec($this->root_dir . 'libs/php/jpegtran -copy none -perfect -optimize ' . $this->sprite . ' > jpegtran.'. $this->timestamp .'.jpg');
								if (is_file('jpegtran.'. $this->timestamp .'.jpg') && filesize('jpegtran.'. $this->timestamp .'.jpg')) {
									if (filesize('jpegtran.'. $this->timestamp .'.jpg') < filesize($this->sprite)) {
										@copy('jpegtran.'. $this->timestamp .'.jpg', $this->sprite);
									}
								}
								@unlink('jpegtran.'. $this->timestamp .'.jpg');
							}
						} else {
/* handling 32bit colors in PNG */
							if ($this->alpha_enabled) {
								@imagealphablending($this->sprite_raw, false);
								@imagesavealpha($this->sprite_raw, true);
							}
							@imagepng($this->sprite_raw, $this->sprite, 9, PNG_ALL_FILTERS);
/* additional optimization via pngcrush */
							if (is_file($this->root_dir . 'libs/php/pngcrush')) {
								@shell_exec($this->root_dir . 'libs/php/pngcrush -qz3 -brute -force -reduce -rem alla ' . $this->sprite . ' pngout.'. $this->timestamp .'.png');
								if (is_file('pngout.'. $this->timestamp .'.png')) {
									if (filesize('pngout.'. $this->timestamp .'.png') < filesize($this->sprite)) {
										@copy('pngout.'. $this->timestamp .'.png', $this->sprite);
									}
									unlink('pngout.'. $this->timestamp .'.png');
								}
							}
						}
						@imagedestroy($this->sprite_raw);
					}
/* add selector with final sprite */
					foreach ($merged_selector as $import => $keys) {
						$this->css->css[$import][preg_replace("/,$/", "", $keys)]['background-image'] = 'url('. $this->sprite .')';
					}

				}

			}

		}

	}

/**
 * Thanks to ZeBadger for original example, and Davide Gualano for pointing me to it
 * Original at http://it.php.net/manual/en/function.imagecreatefromgif.php#59787
**/
	function is_animated_gif ($filename) {
		$raw = file_get_contents($filename);
		$offset = 0;
		$frames = 0;
		while ($frames < 2) {
			$where1 = strpos($raw, "\x00\x21\xF9\x04", $offset);
			if ($where1 === false) {
				break;
			}
			$offset = $where1 + 1;
			$where2 = strpos( $raw, "\x00\x2C", $offset );
			if ($where2 === false) {
				break;
			}
			if ($where1 + 8 == $where2) {
				$frames++;
			}
			$offset = $where2 + 1;
		}

		return $frames > 1;
	}
/* return CSS selector w/o CSS3 pseudo-addons */
	function fix_css3_selectors ($key) {
		return preg_replace("/:(empty|root|nth-(child|of-type|last-of-type|last-child)\([^\)+]\)|(only|first|last)-(of-type|child)|hover|focus|visited|link|active|target|enabled|disabled|checked|before|after|lang\([^\)]+\))/", "", $key);
	}
/* return copied full color Sprite from existent one */
	function create_new_raw () {
		$new_raw = @imagecreatetruecolor($this->css_images[$this->sprite]['x'], $this->css_images[$this->sprite]['y']);
		if ($new_raw) {
			$back = @imagecolorallocatealpha($new_raw, 0, 0, 0, 127);
			@imagecolortransparent($new_raw, $back);
			@imagefill($new_raw, 0, 0, $back);
			@imagecopy($new_raw, $this->sprite_raw, 0, 0, 0, 0, $this->css_images[$this->sprite]['x'], $this->css_images[$this->sprite]['y']);
			$this->sprite_raw = $new_raw;
			if ($this->alpha_enabled) {
				@imagealphablending($this->sprite_raw, false);
				@imagesavealpha($this->sprite_raw, true);
			}
		}
	}
}

?>