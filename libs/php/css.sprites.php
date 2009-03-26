<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Prases content, get all CSS images, convert them to CSS Sprites.
 * Output minified (no sorting selectors) content
 *
 **/
class css_sprites {

	/**
	* Constructor
	* Sets the options
	**/
	function css_sprites ($css_code, $current_dir, $root_dir, $truecolor_in_jpeg, $website_root) {

		require_once('class.csstidy.php');
/* convert CSS code to hash */
		$this->css = new csstidy();
		$this->css->load_template($root_dir . 'libs/php/css.template.tpl');
		$this->css->parse($css_code);
/* array for global media@ distribution */
		$this->media = array();
/* array for images from selectors */
		$this->css_images = array();
/* timestamp for CSS Sprites files */
		$this->timestamp = time();
/* set directories */
		$this->current_dir = $current_dir;
		$this->root_dir = $root_dir;
		$this->website_root = $website_root;
/* output True Color images in JPEG (or PNG24) */
		$this->truecolor_in_jpeg = $truecolor_in_jpeg;
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
/* create new item (array) if required */
							if (!$this->media[$import][$tag]) {

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

				if (!$image['background-image'] || $image['background-image'] == 'none') {
/* try to find w/o CSS3 pseudo-selectors, i.e. :focus, :hover, etc */
					$key_fixed = $this->fix_css3_selectors($key);
					if ($media[$import][$key_fixed]) {
						$image['background-image'] = $media[$import][$key]['background-image'] = $media[$import][$key_fixed]['background-image'];
						if (!$image['background-repeat']) {
							$image['background-repeat'] = $media[$import][$key]['background-repeat'] = $media[$import][$key_fixed]['background-repeat'];
						}
					} else {
						unset($this->media[$import][$key]);
					}

				} 
/* re-check background image existence */
				if ($image['background-image'] && $image['background-image'] != 'none') {

					if ($image['height'] && $image['width'] && !$image['background-repeat']) {
						$image['background-repeat'] = $this->media[$import][$key]['background-repeat'] = 'no-repeat';
					}

					if ($image['background-repeat']) {
/* count different images with repeating options */
						$this->css_images[$image['background-repeat'] == 'no-repeat' ? ('no-repeat' . ($image['width'] && $image['height'] ? '' : 'i')) : $image['background-repeat']]++;
/* count selectors for every images -- to handle initial CSS Sprites */
						if (!$this->css_images[$image['background-image']]) {
							$this->css_images[$image['background-image']] = array();
						}
						$this->css_images[$image['background-image']][$image['background-position']] = 1;

					}

				}

			}

		}

/* combine dimensional CSS Sprites */
		foreach ($this->media as $import => $images) {

			foreach ($images as $key => $image) {
/* merge images only if we have more than 1 for this axis */
				if ($image['background-repeat'] == 'repeat-x' && $this->css_images['repeat-x'] > 1) {
/* no initial CSS Sprites */
					if (count($this->css_images[$image['background-image']]) < 2) {

						$sprite = 'webox.'. $this->timestamp .'.png';
						$this->css_image = substr($image['background-image'], 4, strlen($image['background-image']) - 5);
						list($width, $height) = $this->get_image($sprite);
						if ($width && $height && !preg_match("/(bottom|center|em|%)/", $image['background-position'])) {
//need to handle existing shift
							if (!$this->css_images[$sprite]) {

								$this->css_images[$sprite] = array();
								$this->css_images[$sprite]['x'] = 0;
								$this->css_images[$sprite]['y'] = 0;
								$this->css_images[$sprite]['images'] = array();

							}
							$position = split(" ", $image['background-position']);
							$top = $position[0] == 'top' ? 0 : round($position[1]);
/* add image to CSS Sprite to merge */
							$this->css_images[$sprite]['images'][] = array($this->css_image, $width, $height, 0, $top, $import, $key);

						}

					}
/* repeat-y case */
				} elseif ($image['background-repeat'] == 'repeat-y' && $this->css_images['repeat-y'] > 1) {
/* no initial CSS Sprites */
					if (count($this->css_images[$image['background-image']]) < 2) {

						$sprite = 'weboy.'. $this->timestamp .'.png';
						$this->css_image = substr($image['background-image'], 4, strlen($image['background-image']) - 5);
						list($width, $height) = $this->get_image($sprite);
						if ($width && $height && !preg_match("/(right|center|em|%)/", $image['background-position'])) {

							if (!$this->css_images[$sprite]) {

								$this->css_images[$sprite] = array();
								$this->css_images[$sprite]['x'] = 0;
								$this->css_images[$sprite]['y'] = 0;
								$this->css_images[$sprite]['images'] = array();

							}
							$position = split(" ", $image['background-position']);
							$left = $position[0] == 'left' ? 0 : round($position[0]);
/* add image to CSS Sprite to merge */
							$this->css_images[$sprite]['images'][] = array($this->css_image, $width, $height, $left, 0, $import, $key);

						}

					}
/* no-repeat case w/o dimensions -- icons -- should be placed like this:
	*
   *
  *
 *
*/
				} elseif ($image['background-repeat'] == 'no-repeat' && !($image['width'] && $image['height']) && $this->css_images['no-repeati'] > 1) {
/* no initial CSS Sprites */
					if (count($this->css_images[$image['background-image']]) < 2) {

						$sprite = 'weboi.'. $this->timestamp .'.png';
						$this->css_image = substr($image['background-image'], 4, strlen($image['background-image']) - 5);
						list($width, $height) = $this->get_image($sprite);
/* try to place image if it's possible */
						if ($width && $height && !preg_match("/(right|bottom|center|em|%)/", $image['background-position'])) {
							if (!$this->css_images[$sprite]) {

								$this->css_images[$sprite] = array();
								$this->css_images[$sprite]['x'] = 0;
								$this->css_images[$sprite]['y'] = 0;
								$this->css_images[$sprite]['images'] = array();

							}
							$position = split(" ", $image['background-position']);
							$left = $position[0] == 'left' ? 0 : round($position[0]);
							$top = $position[0] == 'top' ? 0 : round($position[1]);
/* add image to CSS Sprite to merge */
							$this->css_images[$sprite]['images'][] = array($this->css_image, $width, $height, $left, $top, $import, $key);

						}

					}
/* no-repeat case w/ dimensions can be placed all together */
				} elseif (($image['background-repeat'] == 'no-repeat' && $this->css_images['no-repeat'] > 1) || ($image['width'] && $image['height'] && $this->css_images['repeat'] > 1)) {
/* no initial CSS Sprites */
					if (count($this->css_images[$image['background-image']]) < 2) {

						$sprite = 'webo.'. $this->timestamp .'.png';
						$this->css_image = substr($image['background-image'], 4, strlen($image['background-image']) - 5);
						list($width, $height) = $this->get_image($sprite);
/* try to place image if it's possible */
						if ($width && $height && !preg_match("/(right|bottom|center|em|%)/", $image['background-position'])) {
							if (!$this->css_images[$sprite]) {

								$this->css_images[$sprite] = array();
								$this->css_images[$sprite]['x'] = 0;
								$this->css_images[$sprite]['y'] = 0;
								$this->css_images[$sprite]['images'] = array();

							}
							$position = split(" ", $image['background-position']);
							$left = $position[0] == 'left' ? 0 : round($position[0]);
							$top = $position[0] == 'top' ? 0 : round($position[1]);

/* add image to CSS Sprite to merge */
							$this->css_images[$sprite]['images'][] = array($this->css_image, $width, $height, $left, $top, $import, $key);

						}

					}

				}

			}

		}

/* merge simple cases: repeat-x/y */
		$this->merge_sprites('webox.'. $this->timestamp .'.png', 1);
		$this->merge_sprites('weboy.'. $this->timestamp .'.png', 2);
/* than parse more complicated one: no-repeat icons */
		$this->merge_sprites('weboi.'. $this->timestamp .'.png', 3);
/* only then try to combine all other images into the last one */
		$this->merge_sprites('webo.'. $this->timestamp .'.png', 4);

		return html_entity_decode($this->css->print->formatted());
	}

/* download requested image */
	function get_image ($sprite) {
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
/* try to download image */
				$ch = curl_init($this->css_image);
				$this->css_image = preg_replace("/.*\//", "", $this->css_image);
				$fp = fopen($this->css_image, "w");

				if ($fp && $ch) {

					curl_setopt($ch, CURLOPT_FILE, $fp);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_REFERER, $protocol . $host);
					curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Web Optimizator; Speed Up Your Website; http://webo.in/) Firefox 3.0.7");
					curl_exec($ch);
					curl_close($ch);
					fclose($fp);
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
	function sprites_placement ($css_images) {
/* initial matrix for css images */
		$matrix = array();
		$matrix[0] = array();
		$matrix[0][0] = $css_images['x'] = $css_images['y'] = $matrix_x = $matrix_y = 0;
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
/* if this is a unique image */
			if (!$added_images[$image[0]]) {
/* initial coordinates */
				$I = $J = 0;
				$width = $image[1];
				$height = $image[2];
/* to remember the most 'full' place for new image */
				$minimal_square = $matrix_x * $matrix_y;
/* flag if we have enough space */
				$no_space = 1;
				for ($i = 0; $i < $matrix_x; $i++) {

					for ($j = 0; $j < $matrix_y; $j++) {
/* left top corner is empty and three other corners are empty -- we have a placeholder*/
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
					if ($width * $matrix_y < $minimal_square) {

						$I = $matrix_x;
						$J = 0;

					} elseif ($height * $matrix_x < $minimal_square) {

						$I = 0;
						$J = $matrix_y;

					}

				}
/* calculate increase of matrix dimensions */
				$minimal_x = $I + $width > $matrix_x ? $width + $I - $matrix_x : 0;
				$minimal_y = $J + $height > $matrix_y ? $height + $J - $matrix_y : 0;
/* we need to enlarge Sprite -- we have enough space */
				if ($minimal_x || $minimal_y) {
/* top right fragment */
					for ($i = $matrix_x; $i < $matrix_x + $minimal_x; $i++) {

						for ($j = 0; $j < $matrix_y; $j++) {

							$matrix[$i][$j] = 0;

						}

					}
/* bottom roght fragment */
					for ($i = $matrix_x; $i < $matrix_x + $minimal_x; $i++) {

						$matrix[$i] = array();

						for ($j = $matrix_y; $j < $matrix_y + $minimal_y; $j++) {

							$matrix[$i][$j] = 0;

						}

					}
/* bottom left fragment */
					for ($i = 0; $i < $matrix_x; $i++) {

						for ($j = $matrix_y; $j < $matrix_y + $minimal_y; $j++) {

							$matrix[$i][$j] = 0;

						}

					}

				}
/* fill matrix for this image */
				for ($i = $I; $i < $I + $width; $i++) {

					for ($j = $J; $j < $J + $height; $j++) {

						$matrix[$i][$j] = 1;

					}

				}
/* remember coordinates for this image */
				$ordered_images[$key][3] = $I;
				$ordered_images[$key][4] = $J;
/* add images to processed */
				$added_images[$image[0]] = array($I, $J);

			} else {
/* just copy calculated coordinates */
				$ordered_images[$key][3] = $added_images[$image[0]][0];
				$ordered_images[$key][4] = $added_images[$image[0]][1];

			}

			$matrix_x = count($matrix);
			$matrix_y = count($matrix[0]);

		}

		$css_images['images'] = $ordered_images;
		$css_images['x'] = $matrix_x;
		$css_images['y'] = $matrix_y;
		return $css_images;

}

/* merge all images into final CSS Sprite */
	function merge_sprites ($sprite, $type) {

		if (count($this->css_images[$sprite]['images']) > 1) {
/* need to count placement for each image in array */
			if ($type == 4) {
				$this->css_images[$sprite] = $this->sprites_placement($this->css_images[$sprite]);
			} else {
				$this->css_images[$sprite]['x'] = 0;
				$this->css_images[$sprite]['y'] = 0;
			}
/* recount x/y sizes for repeat-x / repeat-y / repeat icons -- we can have duplicated dimensions */
			$counted_images = array();
/* flag for full color (if JPEG is used) */
			$fullcolor = 0;
			foreach ($this->css_images[$sprite]['images'] as $key => $image) {

				if (($type == 1 || $type == 2 || $type == 3) && !$counter_images[$image[0]]) {

					$width = $image[1];
					$height = $image[2];
					$final_x = $image[3];
					$final_y = $image[4];

					switch ($type) {

						case 1:
							$this->css_images[$sprite]['images'][$key][3] = 0;
							$this->css_images[$sprite]['images'][$key][4] = $this->css_images[$sprite]['y'] + $final_y;
							$this->css_images[$sprite]['x'] = $width > $this->css_images[$sprite]['x'] ? $width : $this->css_images[$sprite]['x'];
							$this->css_images[$sprite]['y'] += $height + $final_y;
						break;

						case 2:
							$this->css_images[$sprite]['images'][$key][3] = $this->css_images[$sprite]['x'] + $final_x;
							$this->css_images[$sprite]['images'][$key][4] = 0;
							$this->css_images[$sprite]['x'] += $width + $final_x;
							$this->css_images[$sprite]['y'] =  $height > $this->css_images[$sprite]['y'] ? $height : $this->css_images[$sprite]['y'];
						break;

						case 3:
							$this->css_images[$sprite]['x'] += $width;
							$this->css_images[$sprite]['y'] += $height;
							break;

						}

						$counter_images[$image[0]] = 1;

					}

				if (preg_match("/\.jpe?g/i", $image[0])) {

					$fullcolor = 1;

				}

			}

			if ($fullcolor) {
				$sprite_raw = @imagecreatetruecolor($this->css_images[$sprite]['x'], $this->css_images[$sprite]['y']);
			} else {
				$sprite_raw = @imagecreate($this->css_images[$sprite]['x'], $this->css_images[$sprite]['y']);
			}

			if ($sprite_raw) {
/* for final sprite */
				$merged_selector = array();

/* fill sprite with transparent color */
				if ($fullcolor) {
					$back = imagecolorallocate($sprite_raw, 255, 255, 255);
				} else {
					$back = imagecolorallocatealpha($sprite_raw, 255, 255, 255, 127);
					imagecolortransparent($sprite_raw, $back);
				}

				imagefilledrectangle($sprite_raw, 0, 0, $this->css_images[$sprite]['x'], $this->css_images[$sprite]['y'], $back);
/* starting point for some cases */
				if ($type == 3) {

					$x = $this->css_images[$sprite]['x'];
					$y = 0;

				}

				foreach ($this->css_images[$sprite]['images'] as $image) {

					$filename = $image[0];
					$width = $image[1];
					$height = $image[2];
					$final_x = $image[3];
					$final_y = $image[4];
					$import = $image[5];
					$key = $image[6];

/* try to detect duplicates in this Sprite*/
					$image_used = 0;
					foreach ($this->css_images[$sprite]['images'] as $image) {

						if ($this->media[$image[5]][$image[6]]['background'] && $image[0] == $filename) {

							$image_used = 1;
							$background = $css->css[$image[5]][$image[6]]['background'];

						}

					}

					if (!$image_used) {

/* try to copy initial image into sprite */
						switch (strtolower(preg_replace("/.*\./", "", $filename))) {

							case 'gif':
								$im = imagecreatefromgif($filename);
								break;
							case 'png':
								$im = imagecreatefrompng($filename);
								break;
							case 'jpg':
							case 'jpeg':
								$fullcolor = 1;
								$im = imagecreatefromjpeg($filename);
								break;
							case 'bmp':
								$im = imagecreatefromwbmp($filename);
								break;

						}

						if ($im) {
							$colors = imagecolorsforindex($im, imagecolorat($im, 0, 0));
/* recount colors number, switch to fullcolor if more than 256 */
							if (imagecolorstotal($im) + imagecolorstotal($sprite_raw) > 256 || $colors['alpha']) {
								$fullcolor = 1;
								$new_raw = @imagecreatetruecolor($this->css_images[$sprite]['x'], $this->css_images[$sprite]['y']);
								if ($new_raw) {
									$back = imagecolorallocate($new_raw, 255, 255, 255);
									imagecolortransparent($new_raw, $back);
									imagefilledrectangle($new_raw, 0, 0, $this->css_images[$sprite]['x'], $this->css_images[$sprite]['y'], $back);
									imagecopy($new_raw, $sprite_raw, 0, 0, 0, 0, $this->css_images[$sprite]['x'], $this->css_images[$sprite]['y']);
									$sprite_raw = $new_raw;
								}
							}
/* handling 32bit colors in PNG */
							if ($colors['alpha']) {
								imagealphablending($sprite_raw, false);
								imagesavealpha($sprite_raw, true);
							}

							switch ($type) {
/* the most complicated case */
								case 4:
									$css_left = -$final_x;
									$css_top = -$final_y;
									$css_repeat = 'no-repeat';
									imagecopy($sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
									break;

/* icons */
								case 3:
/* shift placing point for images */
									$x -= $width;
									$y += $final_y;
									$css_left = -$x;
									$css_top = -$y;
									$css_repeat = 'no-repeat';
									imagecopy($sprite_raw, $im, $x, $y, 0, 0, $width, $height);
									$x -= $final_x;
									$y += $height;
									break;
/* repeat-y */
								case 2:
									$css_left = -$final_x;
									$css_top = 0;
									$css_repeat = 'repeat-y';
									imagecopy($sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
									$final_y = $height;
/* semi-fix for bug with different height of repeating images, thx to xstroy */
									while ($final_y < $this->css_images[$sprite]['y']) {
										imagecopy($sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
										$final_y += $height;
									}
									break;
/* repeat-x */
								case 1:
									$css_left = 0;
									$css_top = -$final_y;
									$css_repeat = 'repeat-x';
									imagecopy($sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
/* semi-fix for bug with different width of repeating images, thx to xstroy */
									while ($final_x < $this->css_images[$sprite]['x']) {
										imagecopy($sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
										$final_x += $width;
									}
									break;

							}

							@imagedestroy($im);

						}

						if ($this->css->css[$import][$key]['background-color'] || $css_left || $css_top || $this->css->css[$import][$key]['background-attachement'] || $this->css->css[$import][$key]['background']) {
/* update current styles in initial selector */
							$this->css->css[$import][$key]['background'] = preg_replace("/ $/", "", ($this->css->css[$import][$key]['background-color'] ? $this->css->css[$import][$key]['background-color'] . ' ' : '') .
								($css_left ? $css_left . 'px ' : '0 '). ($css_top ? $css_top . 'px ' : '0 ') . $css_repeat . ' ' .
								($this->css->css[$import][$key]['background-attachement'] ? $this->css->css[$import][$key]['background-attachement'] . ' ' : ''));

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
/* output final sprite */
				if ($this->truecolor_in_jpeg && $fullcolor && ($type == 3 || $type == 4)) {
					$sprite = preg_replace("/png$/", "jpg", $sprite);
					imagejpeg($sprite_raw, $sprite, 80);
				} else {
					imagepng($sprite_raw, $sprite, 9, PNG_ALL_FILTERS);
/* additional optimization via pngcrush */
					if (is_file($this->root_dir . 'libs/php/pngcrush')) {

						shell_exec($this->root_dir . 'libs/php/pngcrush -qz3 -brute -force -reduce -rem alla ' . $sprite);
						if (is_file('pngout.png')) {
							if (filesize('pngout.png') < filesize($sprite)) {
								copy('pngout.png', $sprite);
							}
							unlink('pngout.png');
						}

					}

				}
				@imagedestroy($sprite_raw);
				if ($new_raw) {
					@imagedestroy($new_raw);
				}
/* add selector with final sprite */
				foreach ($merged_selector as $import => $keys) {

					$this->css->css[$import][preg_replace("/,$/", "", $keys)]['background-image'] = 'url('. $sprite .')';

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
	
}

?>