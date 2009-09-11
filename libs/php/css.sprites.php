<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.name/)
 * Parses content, gets all CSS images, converts them to CSS Sprites.
 * Outputs minified (no sorting selectors) content
 *
 **/
class css_sprites {

	/**
	* Constructor
	* Sets the options
	**/
	function css_sprites ($css_code = '', $options = array()) {
/* array for global media@ distribution */
		$this->media = array();
/* array for images from selectors */
		$this->css_images = array();
/* timestamp for CSS Sprites files */
		$this->timestamp = '';
		if (!empty($options)) {
/* set directories */
			$this->current_dir = $options['current_dir'];
			$this->root_dir = $options['root_dir'];
			$this->website_root = $options['website_root'];
/* output True Color images in JPEG (or PNG24) */
			$this->truecolor_in_jpeg = $options['truecolor_in_jpeg'];
/* use aggressive logic for repeat-x/y */
			$this->aggressive = $options['aggressive'];
/* leave some space for combined Sprites to handle resized fonts */
			$this->extra_space = $options['extra_space'];
/* list of excluded from CSS Sprites files */
			$this->ignore_list = explode(" ", $options['ignore_list']);
/* create data:URI based on parsed CSS file */
			$this->data_uris = $options['data_uris'];
/* max size of images to be converted */
			$this->data_uris_size = $options['data_uris_size'];
/* part or full process */
			$this->partly = $options['partly'];
/* exclude IE6 from CSS Sprites */
			$this->no_ie6 = $options['no_ie6'];
/* if there is a memory limit we need to restrict operating area for images */
			$this->memory_limited = $options['memory_limited'];
/* if there is initial images dimensional limit */
			$this->dimensions_limited = $options['dimensions_limited'];
/* only compress CSS and convert images to data:URI */
			$this->no_sprites = $options['no_css_sprites'];
/* optimiza all CSS images via smush.it? */
			$this->image_optimization = $options['image_optimization'];
/* multiple hosts */
			$this->multiple_hosts = $options['multiple_hosts'];
			if (count($this->multiple_hosts) > 4) {
				$this->multiple_hosts = array($this->multiple_hosts[0], $this->multiple_hosts[1], $this->multiple_hosts[2], $this->multiple_hosts[3]);
			}
/* number of multiple hosts */
			$this->multiple_hosts_count = count($this->multiple_hosts);
			if (empty($this->multiple_hosts[0]) && empty($this->multiple_hosts[1])) {
				$this->multiple_hosts_count = 0;
			}
/* using HTTPS ?*/
			$this->https = empty($_SERVER['HTTPS']) ? '' : 's';
/* CSS rule to avoid overlapping of properties */
			$this->none = 'none!important';
		}
		if (!empty($css_code)) {
/* convert CSS code to hash */
			$this->css = new csstidy();
			$this->css->load_template($this->root_dir . 'libs/php/css.template.tpl');
			$this->css->parse($css_code);
		}
		$memory_available = function_exists('memory_get_usage') ? memory_get_usage() : 10000000;
/* restrict square for large Sprites due to system limitations */
		$this->possible_square = round((round(str_replace("M", "000000", str_replace("K", "000", ini_get('memory_limit')))) - $memory_available) / 10);
	}
	/**
	* Main function
	* Process with given data
	**/
	function process() {
		
		if (empty($this->no_sprites) && !empty($this->css)) {
			foreach ($this->css->css as $import => $token) {
/* create array for selectors with background images */
				$this->media[$import] = array();
				foreach ($token as $tags => $rule) {
					foreach ($rule as $key => $value) {
/* standartize all background values from input */
						if (preg_match("/background/", $key)) {
/* rewrite current background with strict none */
							if ($key == 'background' && $value == 'none') {
								$this->css->css[$import][$tags]['background'] = $this->none;
							}
							foreach (explode(",", $tags) as $tag) {
/* create new item (array) if required */
								if (empty($this->media[$import][$tag])) {
									$this->media[$import][$tag] = array();
								}

								if ($key == 'background') {
/* resolve background property */
									if ($value == 'none') {
										$background = array('background-image' => $this->none);
									} else {
										$background = $this->css->optimise->dissolve_short_bg($value);
									}
									foreach ($background as $bg => $property) {
/* skip default properties */
										if (!($bg == 'background-position' &&
												($property == '0 0 !important' ||
												$property == 'top left !important' ||
												$property == '0 0' ||
												$property == 'top left')) &&
											!($bg == 'background-origin' &&
												($property == 'padding !important' ||
												$property == 'padding')) &&
											!($bg == 'background-color' &&
												($property == 'transparent !important' ||
												$property == 'transparent')) &&
											!($bg == 'background-clip' &&
												($property == 'border !important' ||
												$property == 'border')) &&
											!($bg == 'background-attachment' &&
												($property == 'scroll !important' ||
												$property =='scroll')) &&
											!($bg == 'background-size' &&
												($property == 'auto !important' ||
												$property == 'auto')) &&
											!($bg == 'background-repeat' &&
												($property == 'repeat !important' ||
												$property == 'repeat'))) {
													if ($bg == 'background-image' && ($property == 'none !important' || $property == 'none')) {
														$property = $this->none;
													}
/* compute background-position to standard view */
													if ($bg == 'background-position') {
														$property = $this->compute_background_position($property);
													}
													$this->media[$import][$tag][$bg] = $property;
										}
									}
								} else {
/* fix background-position: top|bottom -> center top|center bottom */
									if ($key == 'background-position') {
										$value = $this->compute_background_position($value);
									}
/* skip default properties */
									if ($key != 'background-position' || $value != '0 0') {
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
						if ($property == 'width' || $property == 'height' || preg_match("/padding/i", $property)) {
/* try to add all possible dimensial properties for selected tags with background */
							foreach ($this->media as $imp => $images) {
								foreach ($images as $key => $image) {
									$fixed_key = $this->fix_css3_selectors($key);
/* remove pseudo-selectors, i.e. :focus, :hover, etc*/
									if (in_array($key, explode(",", $tags)) || in_array($fixed_key, explode(",", $tags))) {
										if (preg_match("/padding/i", $property)) {
											if ($property == 'padding') {
												$padding = $this->css->optimise->dissolve_4value_shorthands($property, $value);
											} else {
												$padding = array(
													$property => $value
												);
											}
											foreach ($padding as $prop => $val) {
												$this->media[$imp][$key][$prop] = $val;
											}
										} else {
											$this->media[$imp][$key][$property] = $value;
										}
									}
								}
							}
						}
					}
				}
			}
			$properties = array('background-image', 'background-position', 'background-repeat', 'padding-left', 'padding-right', 'padding-top', 'padding-bottom', 
'width', 'height');
/* to remember already calculated selectors, by stages */
			$this->restored_selectors = array(1 => array(), 2 => array(), 3 => array(), 4 => array(), 5 => array(), 6 => array(), 7 => array(), 8 => array(), 9 => array());
/* try to restore property values from parent selectors */
			foreach ($this->media as $import => $images) {
				foreach ($images as $key => $image) {
					foreach ($properties as $property) {
						if (empty($image[$property]) && preg_match("@[a-zA-Z0-9][#\.\[][^#\.\[]+$@", $key)) {
							$this->media[$import][$key][$property] = $this->restore_property($import, $key, $property);
						}
					}
				}
			}
/* normalize array -- skip items w/o background (none or just color) */
			foreach ($this->media as $import => $images) {
				foreach ($images as $key => $image) {
					$back = empty($image['background-image']) ? '' : $image['background-image'];
					if (empty($back) || $back == $this->none) {
/* try to find w/o CSS3 pseudo-selectors, i.e. :focus, :hover, etc */
						$key_fixed = $this->fix_css3_selectors($key);
						if (!empty($this->media[$import][$key_fixed])) {
							if (!empty($this->media[$import][$key_fixed]['background-image'])) {
								$back = $this->media[$import][$key]['background-image'] = $this->media[$import][$key_fixed]['background-image'];
								if (empty($image['width']) && !empty($this->media[$import][$key_fixed]['width'])) {
									$image['width'] = $this->media[$import][$key]['width'] = $this->media[$import][$key_fixed]['width'];
								}
								if (empty($image['height']) && !empty($this->media[$import][$key_fixed]['height'])) {
									$image['height'] = $this->media[$import][$key]['height'] = $this->media[$import][$key_fixed]['height'];
								}
								if (empty($image['background-repeat']) && !empty($this->media[$import][$key_fixed]['background-repeat'])) {
									$image['background-repeat'] = $this->media[$import][$key]['background-repeat'] = $this->media[$import][$key_fixed]['background-repeat'];
								}
							}
						}
					}
/* define a few of constants for image */
					$img_has = array();
/* Does image have width? */
					$img_has['width'] = !empty($image['width']);
/* Does image have height? */
					$img_has['height'] = !empty($image['height']);
/* Is image width given in absolute units? */
					$img_has['abs_width'] = $img_has['width'] && !preg_match("/em|%|auto/", $image['width']);
/* Is image height given in absolute units? */
					$img_has['abs_height'] = $img_has['height'] && !preg_match("/em|%|auto/", $image['height']);
/* Does image have background-position? */
					$img_has['position'] = !empty($image['background-position']);
					if ($img_has['position']) {
						$background_position = explode(" ", $image['background-position']);
					} else {
						$background_position = array(0, 0);
					}
					$background_position[1] = empty($background_position[1]) ? 0 : $background_position[1];
/* Is image placed to the right? */
					$img_has['pos_right'] = $img_has['position'] && $background_position[0] == '100%';
/* Is image placed to the bottom? */
					$img_has['pos_bottom'] = $img_has['position'] && $background_position[1] == '100%';
/* Is image placed to the center? */
					$img_has['pos_center'] = $img_has['position'] && ($background_position[0] == '50%' || $background_position[1] == '50%');
/* Does image location depend on container size? */
					$img_has['pos_float'] = $img_has['pos_center'] ||
						($img_has['pos_right'] && preg_match("/%|em/", $background_position[1]) && round($background_position[1])) ||
						($img_has['pos_bottom'] && preg_match("/%|em/", $background_position[0]) && round($background_position[0]));
/* Does image have not absolute position? */
					$img_has['pos_relative'] = $img_has['position'] && preg_match("/right|bottom|center|%|em/", $image['background-position']);
/* Can we calculate background-posititon-x for this image? Thx to Steve Souders */
					$img_has['pos_x_comp'] = strpos($background_position[0], '%') && $img_has['abs_width'];
/* Can we calculate background-posititon-y for this image? */
					$img_has['pos_y_comp'] = strpos($background_position[1], '%') && $img_has['abs_height'];
/* exclude files from ignore list */
					if (!empty($this->ignore_list) && in_array(preg_replace("/.*\//", "", substr($back, 4, strlen($back) - 5)), $this->ignore_list)) {
						unset($this->media[$import][$key]);
					}

/* re-check background image existence */
					if (!empty($back) && $back != $this->none) {
						if (!empty($image['height']) && !empty($image['width']) && empty($image['background-repeat'])) {
							$image['background-repeat'] = $this->media[$import][$key]['background-repeat'] = 'no-repeat';
						}
						if (!empty($image['background-repeat'])) {
							$repeat_key = $image['background-repeat'];
							if ($image['background-repeat'] == 'no-repeat') {
								if ($img_has['abs_height'] && $img_has['pos_right'] && !$img_has['pos_float']) {
									$repeat_key = 'no-repeatr';
								} elseif ($img_has['abs_width'] && $img_has['pos_bottom'] && !$img_has['pos_float']) {
									$repeat_key = 'no-repeatb';
								} elseif (!$img_has['pos_relative']) {
									if (($img_has['abs_width'] && $img_has['abs_height']) || !empty($this->aggressive)) {
										$repeat_key = 'no-repeat';
									} else {
										$repeat_key = 'no-repeati';
									}
/* if can't re-calculate background-position for absolute dimensions */
								} elseif (!$img_has['pos_x_comp'] || !$img_has['pos_y_comp']) {
									$repeat_key = 'repeat';
								}
							}
							if ($image['background-repeat'] == 'repeat-x') {
/* if can't re-calculate background-position for absolute dimensions */
								if ($img_has['pos_relative'] && !$img_has['pos_y_comp']) {
									$repeat_key = 'repeat';
								} elseif (!$img_has['abs_height'] && !$this->aggressive) {
									$repeat_key = 'repeat-xl';
								}
							}
							if ($image['background-repeat'] == 'repeat-y') {
/* if can't re-calculate background-position for absolute dimensions */
								if ($img_has['pos_relative'] && !$img_has['pos_x_comp']) {
									$repeat_key = 'repeat';
								} elseif (!$img_has['abs_width'] && !$this->aggressive) {
									$repeat_key = 'repeat-yl';
								}
							}
/* count selectors for every images -- to handle initial CSS Sprites */
							if (empty($this->css_images[$back])) {
								$this->css_images[$back] = array();
							}
							$this->css_images[$back][empty($image['background-position']) ? 'no' : $image['background-position']] = 1;
/* disable all unsupported cases */
							if ($repeat_key == 'repeat') {
								unset($this->media[$import][$key]);
							} else {
								$this->media[$import][$key]['background-repeat'] = $repeat_key;
								if (empty($this->css_images[$repeat_key])) {
									$this->css_images[$repeat_key] = 0;
								}
/* count different images with repeating options */
								$this->css_images[$repeat_key]++;
/* count selectors for every images -- to handle initial CSS Sprites */
								if (empty($this->css_images[$back])) {
									$this->css_images[$back] = array();
								}
								$this->css_images[$back][empty($image['background-position']) ? 'no' : $image['background-position']] = 1;
							}
/* disable images w/o background-repeat */
						} else {
							unset($this->media[$import][$key]);
						}
					}
				}
/* merge params to form unique string */
				$sorted_selectors = $this->media[$import];
/* rearrage by keys -- alphabetically */
				ksort($sorted_selectors);
				foreach ($sorted_selectors as $image) {
					$this->timestamp .= (empty($image['background-image']) ? '' :  $image['background-image']) . (empty($image['width']) ? '' :  $image['width']) . (empty($image['height']) ? '' : $image['height']) . (empty($image['background-repeat']) ? '' :  $image['background-repeat']);
				}
				unset($sorted_selectors);
			}
/* convert timestamp to md5 hash */
			$this->timestamp = substr(md5($this->timestamp), 0, 10);
/* combine dimensional CSS Sprites */
			foreach ($this->media as $import => $images) {
				foreach ($images as $key => $image) {
/* no initial CSS Sprites and valid background-image */
					if (!empty($image['background-image']) && $image['background-image'] != $this->none && count($this->css_images[$image['background-image']]) < 2) {
						$this->sprite = 'webo'. preg_replace("/(repeat-|no-repeat)/", "", $image['background-repeat']) .'.' . $this->timestamp .'.png';
						$img = trim(str_replace("!important", "", $image['background-image']));
						$this->css_image = substr($img, 4, strlen($img) - 5);
						list($width, $height) = $this->get_image();
/* restrict images by ~64x64 if memory is limited */
						if ($width && $height && (!$this->memory_limited || $width * $height < 4097) && (empty($this->dimensions_limited) || ($width < $this->dimensions_limited && $height < $this->dimensions_limited))) {
/* fix image dimensions with paddings */
							$image['height'] = (empty($image['height']) ? 0 : round($image['height']))
								+ (empty($image['padding-top']) ? 0 : round($image['padding-top']))
								+ (empty($image['padding-bottom']) ? 0 : round($image['padding-bottom']));
							$image['width'] = (empty($image['width']) ? 0 : round($image['width']))
								+ (empty($image['padding-left']) ? 0 : round($image['padding-left']))
								+ (empty($image['padding-right']) ? 0 : round($image['padding-right']));
/* fix background-position & repeat for fixed images */
							if (!empty($image['width']) && $width == $image['width'] && !empty($image['height']) && $height == $image['height']) {
								$image['background-repeat'] = $this->media[$import][$key]['background-repeat'] = 'no-repeat';
/* but try to save existing position */
								if (empty($image['background-position'])) {
									$image['background-position'] = $this->media[$import][$key]['background-position'] = '0 0';
								}
							}
/* calculate backround-position for image with relative position but absolute dimensions */
							if (!empty($image['background-position']) && strpos($image['background-position'], '%')) {
								$width_real = max($width, $image['width']);
								$height_real = max($height, $image['height']);
								$position = explode(" ", $image['background-position']);
								$position_x = round(round($position[0]) * ($image['width'] - $width) / 100);
								$position_x .= ($position_x ? 'px' : '');
								$position_y = round(round($position[1]) * ($image['height'] - $height) / 100);
								$position_y .= ($position_y ? 'px' : '');
								switch ($image['background-repeat']) {
									case 'no-repeat':
										$position[0] = $position_x;
									case 'repeat-x':
										$position[1] = $position_y;
										break;
									case 'repeat-y':
										$position[0] = $position_x;
										break;
								}
								$image['background-position'] =  $this->media[$import][$key]['background-position'] = implode(" ", $position);
							}
							if (empty($this->css_images[$this->sprite])) {
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
							$position = empty($image['background-position']) ? array(0, 0) : explode(" ", $image['background-position'] . " ");
							switch ($image['background-repeat']) {
/* repeat-x case w/ dimensions */
								case 'repeat-x':
/* repeat-x case w/o dimensions - can be added safely only to the end of Sprite */
								case 'repeat-xl':
									$top = round($position[1]);
/* shift for bottom left corner of the object */
									$shift_y = $image['height'] > $height ? $image['height'] - $height : 0;
									break;
/* repeat-y case */
								case 'repeat-y':
/* repeat-y case w/o dimensions - can be added safely only to the end of Sprite */
								case 'repeat-yl':
									$left = round($position[0]);
									$shift_x = $image['width'] > $width ? $image['width'] - $width : 0;
									break;
/* no-repeat case w/ dimensions can be placed all together */
								case 'no-repeat':
									$shift_x = $image['width'] > $width ? $image['width'] - $width : 0;
									$shift_y = $image['height'] > $height ? $image['height'] - $height : 0;
/* cut from initial image area marked with CSS rules */
									$width = $image['width'] < $width ? $image['width'] : $width;
									$height = $image['height'] < $height ? $image['height'] : $height;
/* no-repeat case w/o dimensions -- icons -- should be placed like this:
	*
   *
  *
 *
*/
								case 'no-repeati':
/* don't need any shift for icons -- they have enough room for any object */
									$left = round($position[0]);
									$top = round($position[1]);
									break;
/* no-repeat case with 100% 0 */
								case 'no-repeatr':
									$left = 'right';
									$top = round($position[1]);
									$shift_y = $image['height'] > $height ? $image['height'] - $height : 0;
									break;
/* no-repeat case with 0 100% */
								case 'no-repeatb':
									$left = round($position[0]);
									$top = 'bottom';
									$shift_y = $image['width'] > $height ? $image['width'] - $height : 0;
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
		}
/* create first part of CSS Sprites */
		if ($this->partly || empty($this->css)) {
			return '';
		} else {
			if (empty($this->no_sprites)) {
/* only then try to combine all possible images into the last one */
				$this->sprite = 'webo.'. $this->timestamp .'.png';
				$this->merge_sprites(4);
			}
/* finally convert CSS images to data:URI and add mutiple hosts*/
			if (!empty($this->data_uris) || !empty($this->multiple_hosts_count)) {
				$this->css_to_data_uri();
			}
			return html_entity_decode($this->css->print->formatted(), ENT_QUOTES);
		}
	}
/* convert all CSS images to base64 */
	function css_to_data_uri () {
		foreach ($this->css->css as $import => $token) {
			foreach ($token as $tags => $rule) {
				foreach ($rule as $key => $value) {
/* standartize all background values from input, skip IE6/7 hacks */
					if (preg_match("/background/", $key) && !preg_match("/\*[\+ ]html/", $tags)) {
						$background = array();
						if ($key == 'background') {
/* resolve background property */
							$background = $this->css->optimise->dissolve_short_bg($value);
						} else {
/* skip default properties */
							$background[$key] = $value;
						}
						if (!empty($background['background-image'])) {
							$image = trim(str_replace("!important", "", $background['background-image']));
							$this->css_image = substr($image, 4, strlen($image) - 5);
							if (!empty($this->css_image)) {
								$sprited = strpos($this->css_image, 'ebo.' . $this->timestamp);
								if (!empty($this->data_uris)) {
/* convert image to base64 */
									$this->get_image(1);
								}
								if (substr($this->css_image, 0, 5) == 'data:') {
									$ie_image = preg_replace("/(.*)?url\([^\)]+\)(.*)?/", "$1url(" .
										$this->distribute_image(substr($image, 4, strlen($image) - 5)) .
										")$2", $value);
									if (empty($this->no_ie6) || !$sprited) {
/* preserve IE6/7 selectors only if we are doing anything for IE6 */
										$this->css->css[$import]["* html " . implode(",* html ", explode(",", $tags))] = array();
										$this->css->css[$import]["* html " . implode(",* html ", explode(",", $tags))][$key] = $ie_image;
									}
									$this->css->css[$import]["*+html " . implode(",*+html ", explode(",", $tags))] = array();
									$this->css->css[$import]["*+html " . implode(",*+html ", explode(",", $tags))][$key] = $ie_image;
/* skip images on different hosts */
								} elseif (!$sprited) {
									$this->css_image = $this->distribute_image($this->css_image);
								}
								$this->css->css[$import][$tags][$key] = preg_replace("/url\([^\)]+\)(\s*)?/", "url(" .
									$this->css_image .
									")$1", $value);
							}
						}
					}
				}
			}
		}
	}
/* cdistribute image through multiple hosts */
	function distribute_image ($image) {
		if (!empty($this->multiple_hosts_count) &&
			(!strpos($image, "://") ||
				preg_match("/:\/\/(www\.)?" . preg_replace("/^www\./", "", $_SERVER['HTTP_HOST']) . "\//i", $image))) {
					return "http" . $this->https .
						"://" .
						$this->multiple_hosts[strlen($image)%$this->multiple_hosts_count] .
						"." .
						preg_replace("/^www\./", "", $_SERVER['HTTP_HOST']) .
						$image;
		} else {
			return $image;
		}
	}
/* download requested image */
	function get_image ($mode = 0) {
		$image_saved = $this->css_image;
/* handle cases with data:URI */
		if (substr($this->css_image, 0, 5) == 'data:') {
			$image_name = md5($this->css_image) . "." . preg_replace("/.*image\/([^;]*);base64.*/", "$1", $this->css_image);
			$fp = @fopen($image_name , "w");
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
				$cached = preg_replace("/.*\//", "", $this->css_image);
/* check for cached version */
				if (!is_file($cached)) {
					$this->download_file($this->css_image, $cached);
					$this->css_image = is_file($cached) ? $cached : '';
				} else {
					$this->css_image = $cached;
				}
			} else {
				if (!preg_match("/^webo[ixy\.]/", $this->css_image)) {
					$this->css_image = preg_match("/^\//", $this->css_image) ? $this->website_root . $this->css_image : $this->current_dir . '/' .$this->css_image;
				}
			}
		}
		switch ($mode) {
/* data:URI */
			case 1:
				$extension = strtolower(preg_replace("/jpg/i", "jpeg", preg_replace("/.*\./i", "", $this->css_image)));
/* Thx for htc for ali@ */
				if (is_file($this->css_image) && !in_array($extension, array('htc', 'cur', 'eot', 'ttf'))) {
/* image optimization */
					if ($this->image_optimization && !strpos($this->css_image, "/webo.")) {
						$this->smushit($this->css_image);
					}
/* don't create data:URI greater than 32KB -- for IE8 */
					if (@filesize($this->css_image) < $this->data_uris_size) {
/* convert image to base64-string */
						$this->css_image = 'data:image/' . $extension . ';base64,' . base64_encode(@file_get_contents($this->css_image));
					} else {
/* just return absolute URL for image */
						$this->css_image = str_replace($this->website_root, "", $this->css_image);
					}
				} else {
					$this->css_image = $image_saved;
				}
				return;
				break;
/* image dimensions */
			default:
				if (is_file($this->css_image)) {
/* check for animation */
					if (strtolower(preg_replace("/.*\./", "", $this->css_image)) == 'gif' && $this->is_animated_gif($this->css_image)) {
						return array(0, 0);
					}
/* get dimensions from downloaded image */
					return @getimagesize($this->css_image);
				} else {
					return array(0, 0);
				}
				break;
		}
	}
/* find places for images in complicated Sprite */
	function sprites_placement ($css_images, $css_icons) {
/* initial matrix for css images */
		$matrix = array(array(0));
		$css_images['x'] = $css_images['y'] = $matrix_x = $matrix_y = 0;
/* check if we have initial no-repeat images */
		if (!empty($css_images['images'])) {
/* array for images ordered by square */
			$ordered_images = array();
/* to track duplicates */
			$added_images = array();
/* add images to this matrix one-by-one */
			foreach ($css_images['images'] as $image) {
				$square = $image[1] * $image[1] + $image[2] * $image[2];
				while (!empty($ordered_images[$square])) {
/* increase square while we don't have unique key */
					$square++;
				}
				$ordered_images[$square] = $image;
			}
/* sort images by square */
			krsort($ordered_images);
/* add images to matrix */
			foreach ($ordered_images as $key => $image) {
/* restrict square if no memory */
				if ($matrix_x * $matrix_y <= $this->possible_square) {
					$minimal_x = 0;
					$minimal_y = 0;
/* if this is a unique image */
					if (empty($added_images[$image[0]])) {
/* initial coordinates */
						$I = $J = 0;
/* avoid affecting negative background-position to image placement, we have already counted it */
						$width = $image[1] + ($image[3] > 0 ? $image[3] : 0) + $image[5] + ($this->extra_space && count($ordered_images) > 1 ? 5 : 0);
						$height = $image[2] + ($image[4] > 0 ? $image[4] : 0) + $image[6] + ($this->extra_space && count($ordered_images) > 1 ? 5 : 0);
						$shift_x = $image[3];
						$shift_y = $image[4];
/* to remember the most 'full' place for new image */
						$minimal_square = $matrix_x * $matrix_y;
/* flag if we have enough space */
						$no_space = 1;
						for ($i = 0; $i < $matrix_x; $i++) {
							for ($j = 0; $j < $matrix_y; $j++) {
/* left top corner is empty and three other corners are empty -- we have a placeholder */
								if (empty($matrix[$i][$j]) && 
									empty($matrix[$i][$j + $height]) && 
									empty($matrix[$i + $width][$j]) &&
									empty($matrix[$i + $width][$j + $height]) &&
/* additionally check 4 points in the middle of edges + 1 center point */
									empty($matrix[$i + round($width/2)][$j]) &&
									empty($matrix[$i][$j + round($height/2)]) &&
									empty($matrix[$i + $width][$j + round($height/2)]) &&
									empty($matrix[$i + round($width/2)][$j + $height]) &&
									empty($matrix[$i + round($width/2)][$j + round($height/2)])) {
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
			}
			$css_images['images'] = $ordered_images;
			$css_images['x'] = $matrix_x;
			$css_images['y'] = $matrix_y;
		}
		$distance = $x = $y = 0;
/* count initial shift (not to hurt current images) */
		$shift = $matrix_y;
/* need to add weboi Sprite to the main one */
		if (!empty($css_icons['images'])) {
			foreach ($css_icons['images'] as $image) {
				$shift += $image[2] + $image[4];
			}
/* distance from the main Sprite */
			$distance = $shift - $matrix_y - $css_icons['images'][0][2] - $css_icons['images'][0][4];
			$x = 0;
			$y = $shift;
/* creating 'steps' */
			foreach ($css_icons['images'] as $image) {
/* restrict square if no memory */
				if ($x * ($shift - $distance) + $matrix_x * $matrix_y < $this->possible_square) {
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
/* check for 3 points: left, middle and right for the top border */
					while (empty($matrix[$i][$j]) && empty($matrix[$i + round($width/2)][$j]) && empty($matrix[$i + $width][$j]) && $j>0) {
						$j--;
					}
/* remember minimal distance */
					if ($distance > $y - $j - 1) {
						$distance = $y - $j - 1 - $final_y;
					}
/* to separate new images from old ones */
					$image[] = 1;
					$css_images['images'][] = $image;
				}
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
				$images_number = empty($this->css_images[$this->sprite]) ? 0 : count($this->css_images[$this->sprite]['images']) > 1;
			}

			if ($images_number || $type == 4) {

				$this->css_images[$this->sprite]['x'] = 0;
				$this->css_images[$this->sprite]['y'] = 0;
/* recount x/y sizes for repeat-x / repeat-y / repeat icons -- we can have duplicated dimensions */
				$counted_images = array();
				if (!empty($this->css_images[$this->sprite]['images'])) {
					foreach ($this->css_images[$this->sprite]['images'] as $key => $image) {
						$filename = $image[0];
						if (($type == 1 || $type == 2 || $type == 5 || $type == 6) && empty($counter_images[$filename])) {
							$width = $image[1];
							$height = $image[2];
							$final_x = $image[3];
							$final_y = $image[4];
							$shift_x = $image[5];
							$shift_y = $image[6];
							switch ($type) {
								case 6:
/* glue image to the bottom edge */
									$this->css_images[$this->sprite]['images'][$key][3] = $this->css_images[$this->sprite]['x'] + $final_x;
									$this->css_images[$this->sprite]['images'][$key][4] = $this->css_images[$this->sprite]['y'] - $height;
									$this->css_images[$this->sprite]['images'][$key][5] = $final_x;
									$this->css_images[$this->sprite]['x'] += $width + $final_x + $shift_x + ($this->extra_space ? 5 : 0);
									if ($height > $this->css_images[$this->sprite]['y']) {
										$shift = $this->css_images[$this->sprite]['y'] - $height;
										$this->css_images[$this->sprite]['y'] = $height;
/* move current images futher to the new bottom */
										foreach ($this->css_images[$this->sprite]['images'] as $k => $i) {
											$this->css_images[$this->sprite]['images'][$k][4] += $shift;
										}
									}
									break;
									break;
								case 5:
/* glue image to the right edge */
									$this->css_images[$this->sprite]['images'][$key][3] = $this->css_images[$this->sprite]['x'] - $width;
									$this->css_images[$this->sprite]['images'][$key][4] = $this->css_images[$this->sprite]['y'] + $final_y;
									$this->css_images[$this->sprite]['images'][$key][6] = $final_y;
									$this->css_images[$this->sprite]['y'] += $height + $final_y + $shift_y + ($this->extra_space ? 5 : 0);
									if ($width > $this->css_images[$this->sprite]['x']) {
										$shift = $this->css_images[$this->sprite]['x'] - $width;
										$this->css_images[$this->sprite]['x'] = $width;
/* move current images futher to the new right */
										foreach ($this->css_images[$this->sprite]['images'] as $k => $i) {
											$this->css_images[$this->sprite]['images'][$k][3] += $shift;
										}
									}
									break;
								case 1:
									$this->css_images[$this->sprite]['images'][$key][3] = 0;
									$this->css_images[$this->sprite]['images'][$key][4] = $this->css_images[$this->sprite]['y'] + $final_y;
									$this->css_images[$this->sprite]['images'][$key][6] = $final_y;
									$this->css_images[$this->sprite]['x'] = $this->SCM($width, $this->css_images[$this->sprite]['x'] ? $this->css_images[$this->sprite]['x'] : 1);
									$this->css_images[$this->sprite]['y'] += $height + $final_y + $shift_y;
								break;
								case 2:
									$this->css_images[$this->sprite]['images'][$key][3] = $this->css_images[$this->sprite]['x'] + $final_x;
									$this->css_images[$this->sprite]['images'][$key][4] = 0;
									$this->css_images[$this->sprite]['images'][$key][5] = $final_x;
									$this->css_images[$this->sprite]['x'] += $width + $final_x + $shift_x;
									$this->css_images[$this->sprite]['y'] = $this->SCM($height, $this->css_images[$this->sprite]['y'] ? $this->css_images[$this->sprite]['y'] : 1);
								break;
							}
							$counter_images[$filename] = 1;
						}
					}
				}
				$this->css_images[$this->sprite]['addon_y'] = 0;
				$this->css_images[$this->sprite]['addon_x'] = 0;
				if ($type == 1) {
					$no_dimensions = preg_replace("/x/", "xl", $this->sprite);
/* add to the end of Sprite repeat-x w/o dimensions */
					if (!empty($this->css_images[$no_dimensions]) && count($this->css_images[$no_dimensions]['images'])) {
						foreach ($this->css_images[$no_dimensions]['images'] as $image) {
							if (!empty($image)) {
								continue;
							}
						}
						$final_y = empty($image[4]) ? 0 : $image[4];
						$image[3] = 0;
						$image[4] = (empty($image[4]) ? 0 : $image[4]) + $this->css_images[$this->sprite]['y'];
						$this->css_images[$this->sprite]['images'][] = $image;
						$this->css_images[$this->sprite]['x'] = !empty($image[1]) && $image[1] > $this->css_images[$this->sprite]['x'] ? $this->SCM($image[1], $this->css_images[$this->sprite]['x']) : $this->css_images[$this->sprite]['x'];
						$this->css_images[$this->sprite]['y'] += (empty($image[2]) ? 0 : $image[2]) + $final_y;
						unset($this->css_images[$no_dimensions][0]);
					}
					$counted_images = array();
					$no_repeat = preg_replace("/x/", "", $this->sprite);
					if (!empty($this->css_images[$no_repeat]['images'])) {
/* try to find small no-repeat image to put before all repeat-x ones */
						foreach ($this->css_images[$no_repeat]['images'] as $key => $image) {
							if ($image[1] <= $this->css_images[$this->sprite]['x'] && empty($counted_images[$image[0]])) {
								$counted_images[$image[0]] = 1;
								$final_y = $image[4];
								$image[3] = 0;
								$image[4] = $this->css_images[$this->sprite]['addon_y'] + $final_y + $image[6];
								$this->css_images[$this->sprite]['addon_y'] += $image[2] + $final_y + $image[6] + ($this->extra_space ? 5 : 0);
								$this->css_images[$this->sprite]['y'] += $image[2] + $final_y + $image[6] + ($this->extra_space ? 5 : 0);
								$image[] = 1;
								$this->css_images[$this->sprite]['images'][] = $image;
								unset($this->css_images[$no_repeat]['images'][$key]);
							}
						}
					}
				}
				if ($type == 2) {
					$no_dimensions = preg_replace("/y/", "yl", $this->sprite);
/* add to the end of Sprite repeat-x w/o dimensions */
					if (!empty($this->css_images[$no_dimensions]) && count($this->css_images[$no_dimensions]['images'])) {
						foreach ($this->css_images[$no_dimensions]['images'] as $image) {
							if (!empty($image)) {
								continue;
							}
						}
						$final_x = $image[3];
						$image[3] += $this->css_images[$this->sprite]['x'];
						$image[4] = 0;
						$this->css_images[$this->sprite]['images'][] = $image;
						$this->css_images[$this->sprite]['x'] += $image[1] + $final_x;
						$this->css_images[$this->sprite]['y'] = !empty($image[2]) && $image[2] > $this->css_images[$this->sprite]['y'] ? $this->SCM($image[2], $this->css_images[$this->sprite]['y']) : $this->css_images[$this->sprite]['y'];
						unset($this->css_images[$no_dimensions][0]);
					}
					$counted_images = array();
					$no_repeat = preg_replace("/y/", "", $this->sprite);
					if (!empty($this->css_images[$no_repeat]['images'])) {
/* try to find small no-repeat image to put before all repeat-y ones */
						foreach ($this->css_images[$no_repeat]['images'] as $key => $image) {
							if ($image[2] <= $this->css_images[$this->sprite]['y'] && empty($counted_images[$image[0]])) {
								$counted_images[$image[0]] = 1;
								$final_x = $image[3];
								$image[3] = $this->css_images[$this->sprite]['addon_x'] + $final_x + $image[5];
								$this->css_images[$this->sprite]['addon_x'] += $image[1] + $final_x + $image[5] + ($this->extra_space ? 5 : 0);
								$this->css_images[$this->sprite]['x'] += $image[1] + $final_x + $image[5] + ($this->extra_space ? 5 : 0);
								$image[] = 1;
								$this->css_images[$this->sprite]['images'][] = $image;
								unset($this->css_images[$no_repeat]['images'][$key]);
							}
						}
					}
				}
				$merged_selector = array();
/* need to count placement for each image in array */
				if ($type == 4) {
					$icons_sprite = preg_replace("/webo/", "weboi", $this->sprite);
					$icons = empty($this->css_images[$icons_sprite]) ? array() : $this->css_images[$icons_sprite];
					$this->css_images[$this->sprite] = $this->sprites_placement($this->css_images[$this->sprite], $icons);
					$sprite_right = preg_replace("/webo/", "webor", $this->sprite);
/* add right Sprite to the right top corner */
					if (is_file($sprite_right)) {
						$this->css_images[$this->sprite]['y'] += $this->css_images[$sprite_right]['y'];
						$this->css_images[$this->sprite]['addon_y'] += $this->css_images[$sprite_right]['y'];
/* change background image for the right Sprite selectors */
						foreach ($this->css_images[$sprite_right]['images'] as $image) {
							$merged_selector[$image[7]] = (empty($merged_selector[$image[7]]) ? "" : $merged_selector[$image[7]] . ",") . $image[8];
						}
					}
					$sprite_bottom = preg_replace("/webo/", "webob", $this->sprite);
/* add bottom Sprite to the bottom left corner */
					if (is_file($sprite_bottom)) {
						$this->css_images[$this->sprite]['x'] += $this->css_images[$sprite_bottom]['x'];
						$this->css_images[$this->sprite]['addon_x'] += $this->css_images[$sprite_bottom]['x'];
/* change background image for the right Sprite selectors */
						$merged_selector = array();
						foreach ($this->css_images[$sprite_bottom]['images'] as $image) {
							$merged_selector[$image[7]] = (empty($merged_selector[$image[7]]) ? "" : $merged_selector[$image[7]] . ",") . $image[8];
						}
					}
				}
				if (!$file_exists) {
					$this->sprite_raw = @imagecreatetruecolor($this->css_images[$this->sprite]['x'], $this->css_images[$this->sprite]['y']);
				}
				if (!empty($this->sprite_raw) || $file_exists) {
/* for final sprite */
					if (!$file_exists) {
/* handling 32bit colors in PNG */
						@imagealphablending($this->sprite_raw, false);
						@imagesavealpha($this->sprite_raw, true);
						$this->background = @imagecolorallocatealpha($this->sprite_raw, 255, 255, 255, 127);
/* fill sprite with white color */
						@imagefilledrectangle($this->sprite_raw, 0, 0, $this->css_images[$this->sprite]['x']-1, $this->css_images[$this->sprite]['y']-1, $this->background);
/* make this color transparent */
						@imagecolortransparent($this->sprite_raw, $this->background);
					}
/* loop in all given CSS images */
					foreach ($this->css_images[$this->sprite]['images'] as $image_key => $image) {

						$filename = empty($image[0]) ? '' : $image[0];
						$width = empty($image[1]) ? 0 : $image[1];
						$height = empty($image[2]) ? 0 : $image[2];
						$final_x = empty($image[3]) ? 0 : $image[3];
						$final_y = empty($image[4]) ? 0 : $image[4];
/* re-use of shifts -- to restore initial background-position */
						$shift_x = empty($image[5]) ? 0 : $image[5];
						$shift_y = empty($image[6]) ? 0 : $image[6];
						$import = empty($image[7]) ? '' : $image[7];
						$key = empty($image[8]) ? '' : $image[8];
/* for added to repeat-x / repeat-y image with no-repeat */
						$added = empty($image[9]) ? 0 : $image[9];
/* remember existing background */
						$this->css_images[$this->sprite]['images'][$image_key][10] = empty($this->css->css[$import][$key]['background']) ? '' : $this->css->css[$import][$key]['background'];
						$this->css_images[$this->sprite]['images'][$image_key][11] = empty($this->css->css[$import][$key]['background-image']) ? '' : $this->css->css[$import][$key]['background-image'];
						if (!$added || $type == 4) {
							$final_x += $this->css_images[$this->sprite]['addon_x'];
							$final_y += $this->css_images[$this->sprite]['addon_y'];
						}
/* try to detect duplicates in this Sprite */
						$image_used = 0;
						foreach ($this->css_images[$this->sprite]['images'] as $image) {
							if (!empty($image[7]) && !empty($image[8]) && !empty($this->media[$image[7]][$image[8]]) &&
								!empty($this->media[$image[7]][$image[8]]['background']) &&
								!empty($image[0]) && $image[0] == $filename &&
								!empty($this->css->css[$image[7]][$image[8]]['background'])) {
								$image_used = 1;
								$background = $this->css->css[$image[7]][$image[8]]['background'];
							}
						}
/* leave rules for IE6 */
						if ($this->no_ie6) {
							if (!empty($this->css->css[$import][$key]) && !empty($this->css->css[$import][$key]['background'])) {
/* should we preserve current IE6 hack for background? */
								$this->css->css[$import]["* html " . $key]['background'] = $this->css->css[$import][$key]['background'];
							}
						}

						if (!$image_used) {
							if (!$file_exists) {
								$im = null;
/* flag semi-transparency, 0 - disabled, 1 - enabled */
								$this->alpha = 0;
/* try to copy initial image into sprite */
								switch (strtolower(preg_replace("/.*\./", "", $filename))) {
									case 'gif':
										$im = @imagecreatefromgif($filename);
										break;
									case 'png':
										$im = @imagecreatefrompng($filename);
										if ($im && @imagecolorstotal($im) > 256) {
											$this->alpha = 1;
										}
										break;
									case 'jpg':
									case 'jpeg':
										$im = @imagecreatefromjpeg($filename);
										break;
									case 'bmp':
										$im = @imagecreatefromwbmp($filename);
										break;
									default:
										$im = @imagecreatefromxbm($filename);
										break;
								}
							}
/* some images can have incorrect extension */
							if (empty($im) && is_file($filename)) {
								$im = @imagecreatefrompng($filename);
								if ($im && @imagecolorstotal($im) > 256) {
									$this->alpha = 1;
								}
								if (empty($im)) {
									$im = @imagecreatefromjpeg($filename);
									$this->alpha = 0;
								}
								if (empty($im)) {
									$im = @imagecreatefromgif($filename);
									$this->alpha = 0;
								}
								if (empty($im)) {
									$im = @imagecreatefromwbmp($filename);
									$this->alpha = 0;
								}
								if (empty($im)) {
									$im = @imagecreatefromxbm($filename);
									$this->alpha = 0;
								}
							}

							if (!empty($im) || $file_exists) {
								switch ($type) {
/* 0 100% case */
									case 6:
										$css_top = 'bottom';
										$css_left = -$final_x + $shift_x;
										$css_repeat = 'no-repeat';
										if (!$file_exists) {
											$this->imagecopymerge_alpha($this->sprite_raw, $im, $final_x, $this->css_images[$this->sprite]['y'] - $height, 0, 0, $width, $height);
										}
										break;
/* 100% 0 case */
									case 5:
										$css_top = -$final_y + $shift_y;
										$css_left = 'right';
										$css_repeat = 'no-repeat';
										if (!$file_exists) {
											$this->imagecopymerge_alpha($this->sprite_raw, $im, $this->css_images[$this->sprite]['x'] - $width, $final_y, 0, 0, $width, $height);
										}
										break;
/* the most complicated case */
									case 4:
										$css_left = -$final_x + $shift_x;
										$css_top = -$final_y + $shift_y;
										$css_repeat = 'no-repeat';
										if (!$file_exists) {
											$this->imagecopymerge_alpha($this->sprite_raw, $im, $final_x, $final_y, 0, 0, $width - ($final_x < 0 ? $final_x : 0), $height - ($final_y < 0 ? $final_y : 0));
										}
										break;
/* repeat-y */
									case 2:
										$css_left = -$final_x;
										$css_top = 0;
										if ($added) {
											$css_repeat = 'no-repeat';
										} else {
											$css_left += $shift_x;
											$css_repeat = 'repeat-y';
										}
										if (!$file_exists) {
											$this->imagecopymerge_alpha($this->sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
											$final_y = $height;
/* semi-fix for bug with different height of repeating images, thx to xstroy */
											while ($final_y < $this->css_images[$this->sprite]['y'] && !$added) {
												$this->imagecopymerge_alpha($this->sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
												$final_y += $height;
											}
										}
										break;
/* repeat-x */
									case 1:
										$css_left = 0;
										$css_top = -$final_y;
										if ($added) {
											$css_repeat = 'no-repeat';
										} else {
											$css_top += $shift_y;
											$css_repeat = 'repeat-x';
										}
										if (!$file_exists) {
											$this->imagecopymerge_alpha($this->sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
											$final_x = $width;
/* semi-fix for bug with different width of repeating images, thx to xstroy */
											while ($final_x < $this->css_images[$this->sprite]['x'] && !$added) {
												$this->imagecopymerge_alpha($this->sprite_raw, $im, $final_x, $final_y, 0, 0, $width, $height);
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
								$this->css->css[$import][$key]['background'] = preg_replace("/ $/", "", ((!empty($this->media[$import][$key]['background-color']) && $this->media[$import][$key]['background-color'] != 'transparent') ? $this->media[$import][$key]['background-color'] . ' ' : '') .
									(empty($css_left) || $css_left == 'left' ? '0' : ($css_left . (is_numeric($css_left) ? 'px' : ''))) . ' ' . (empty($css_top) || $css_top == 'top' ? '0' : ($css_top . (is_numeric($css_top) ? 'px' : ''))) . ' ' . $css_repeat . ' ' .
									(!empty($this->media[$import][$key]['background-attachement']) ? $this->media[$import][$key]['background-attachement'] . ' ' : ''));
							}

						} else {
/* or just copy existing styles */
							$this->css->css[$import][$key]['background'] = $background;
						}
/* update array with chosen selectors -- to mark this image as used */
						$this->media[$import][$key]['background'] = 1;
						$merged_selector[$import] = (empty($merged_selector[$import]) ? '' : $merged_selector[$import] . ",") . $key;
						unset($this->css->css[$import][$key]['background-image']);
					}
					if (!$file_exists) {
/* try to add right and bottom Sprites to the main one */
						if ($type == 4) {
							if (is_file($sprite_right)) {
								$im = @imagecreatefrompng($sprite_right);
								$this->imagecopymerge_alpha($this->sprite_raw, $im, $this->css_images[$this->sprite]['x'] - $this->css_images[$sprite_right]['x'], 0, 0, 0, $this->css_images[$sprite_right]['x'], $this->css_images[$sprite_right]['y']);
							}
							if (is_file($sprite_bottom)) {
								$im = @imagecreatefrompng($sprite_bottom);
								$this->imagecopymerge_alpha($this->sprite_raw, $im, 0, $this->css_images[$this->sprite]['y'] - $this->css_images[$sprite_bottom]['y'], 0, 0, $this->css_images[$sprite_bottom]['x'], $this->css_images[$sprite_bottom]['y']);
							}
						}
/* output final sprite */
						if ($this->truecolor_in_jpeg) {
							$this->sprite = preg_replace("/png$/", "jpg", $this->sprite);
							@imagejpeg($this->sprite_raw, $this->sprite, 80);
						} else {
							@imagepng($this->sprite_raw, $this->sprite, 9, PNG_ALL_FILTERS);
/* try to re-save image on GDLib error */
							if (!is_file($this->sprite)) {
								@imagepng($this->sprite_raw, $this->sprite, 9);
							}
							if (!is_file($this->sprite)) {
								@imagepng($this->sprite_raw, $this->sprite);
							}
						}
						@imagedestroy($this->sprite_raw);
/* additional optimization via smush.it */
						$this->smushit($this->current_dir . '/' . $this->sprite);
					}
/* don't touch webor / webob Sprites -- they will be included into the main one */
					if (is_file($this->sprite)) {
/* add selector with final sprite */
						foreach ($merged_selector as $import => $keys) {
							$this->css->css[$import][$keys]['background-image'] = 'url('. preg_replace("/webo[rb]/", "webo", $this->sprite) .')';
						}
					}
/* finish deal with CSS */
					foreach ($this->css_images[$this->sprite]['images'] as $image) {
						$import = empty($image[7]) ? '' : $image[7];
						$key = empty($image[8]) ? '' : $image[8];
/* delete initial CSS rules only on success */
						if (is_file($this->sprite)) {
							unset($this->css->css[$import][$key]['background-color'], $this->css->css[$import][$key]['background-repeat'], $this->css->css[$import][$key]['background-attachement'], $this->css->css[$import][$key]['background-position']);
/* otherwise restore background-image */
						} else {
							$this->css->css[$import][$key]['background'] = $image[10];
							$this->css->css[$import][$key]['background-image'] = $image[11];
						}
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
/* generic download function */
	function download_file ($remote, $local, $referer = "") {
/* check for curl */
		if (function_exists('curl_init')) {
/* try to download image */
			$ch = curl_init($remote);
			$fp = @fopen($local, "w");
			if ($fp && $ch) {
				curl_setopt($ch, CURLOPT_FILE, $fp);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Web Optimizer; Faster than Lightning; http://web-optimizer.us/) Firefox 3.5.2");
				if (!empty($referer)) {
					curl_setopt($ch, CURLOPT_REFERER, $referer);
				}
				curl_exec($ch);
				curl_close($ch);
				fclose($fp);
			}
		}
	}
/* image optimization via smush.it */
	function smushit ($file) {
		$tmp_file = $file . ".tmp";
		$this->download_file("http://smushit.eperf.vip.ac4.yahoo.com/ysmush.it/ws.php?img=http://" . $_SERVER['HTTP_HOST'] . '/' . str_replace($this->website_root, "", $file), $tmp_file);
		if (is_file($tmp_file)) {
			$str = @file_get_contents($tmp_file);
			if (!preg_match("/['\"]error['\"]/i", $str) && filesize($tmp_file)) {
				$optimized = preg_replace("/\\\\\//", "/", preg_replace("/['\"].*/", "", preg_replace("/.*dest['\"]:['\"]/", "", $str)));
				if (!is_file($file . '.backup')) {
					@copy($file, $file . '.backup');
				}
				$this->download_file($optimized, $file, 'http://developer.yahoo.com/yslow/smushit/');
				if (!@filesize($file) || strpos(@file_get_contents($file), "DOCTYPE")) {
					@copy($file . '.backup', $file);
				} else {
					@unlink($file . '.backup');
				}
			}
			@unlink($tmp_file);
		}
/* delay not to overload Yahoo! servers */
		sleep(1);
		if (!@filesize($file)) {
/* if can't optimize file - try once more */
			@copy($file . '.backup', $file);
			$this->smushit($file);
		}
	}
/* calculate smallest common multiple, NOK */
	function SCM ($a, $b) {
		$return = $a * $b;
		while($a && $b) {
			if ($a >= $b) {
				$a = $a % $b;
			} else {
				$b = $b % $a;
			}
		}
		return $return / ($a + $b);
	}
/* try to restore CSS property from some parent selectors for a given one */
	function restore_property ($import, $selector, $property, $stage = 1) {
		switch ($stage) {
/* remove all attribute selectors */
			case 1:
				$regexp = '([a-zA-Z0-9]+)\[[^\[]+$';
				$part = '$1';
				break;
/* remove all class selectors */
			case 2:
				$regexp = '([a-zA-Z0-9]+)\.[^\.]+$';
				$part = '$1';
				break;
/* remove all identificator selectors */
			case 3:
				$regexp = '([a-zA-Z0-9]+)#[^#]+$';
				$part = '$1';
				break;
/* remove 1 attribute selectors from start */
			case 4:
				$regexp = '^([a-zA-Z0-9]+)\[[^\[]+\s([a-zA-Z0-9]+)';
				$part = '$2';
				break;
/* remove 1 class selectors from start */
			case 5:
				$regexp = '^([a-zA-Z0-9]+)\.[^\.]+\s([a-zA-Z0-9]+)';
				$part = '$2';
				break;
/* remove 1 identificator selectors from start */
			case 6:
				$regexp = '^([a-zA-Z0-9]+)#[^#]+\s([a-zA-Z0-9]+)';
				$part = '$3';
				break;
/* remove all attribute selectors from start */
			case 7:
				$regexp = '(^([a-zA-Z0-9]+)\[[^\[]+\s([a-zA-Z0-9]+))+';
				$part = '$3';
				break;
/* remove all class selectors from start */
			case 8:
				$regexp = '^(([a-zA-Z0-9]+)\.[^\.]+\s([a-zA-Z0-9]+))+';
				$part = '$3';
				break;
/* remove all identificator selectors from start */
			case 9:
				$regexp = '^(([a-zA-Z0-9]+)#[^#]+\s([a-zA-Z0-9]+))+';
				$part = '$3';
				break;

/* already have removed all possibilities, exit */
			case 10:
				$regexp = null;
				break;
		}
		if (!empty($regexp)) {
			$restored_selectors = array();
			if (empty($this->restored_selectors[$stage][$selector])) {
/* clear selector for current stage */
				$restored_selector = preg_replace("@" . $regexp . "@", $part, $selector);
			} else {
/* or get from calculated ones */
				$restored_selectors = $this->restored_selectors[$stage][$selector];
				if (is_array($restored_selectors)) {
					$restored_selector = $restored_selectors[0];
				} else {
					$restored_selector = $selector;
				}
			}
			if ($restored_selector != $selector) {
				if (!count($restored_selectors)) {
/* just copy existing element to this array */
					if (!empty($this->css->css[$import][$restored_selector])) {
						$restored_selectors[] = $restored_selector;
					}
/* and try to find any selectors containing calculated one */
					$selectors = array_keys($this->css->css[$import]);
					foreach ($selectors as $possible_selector) {
						if (strpos($possible_selector, "," . $restored_selector) ||
							strpos($possible_selector, ", " . $restored_selector) ||
							strpos($possible_selector, $restored_selector . ",") ||
							strpos($possible_selector, $restored_selector . " ,")) {
								$restored_selectors[] = $possible_selector;
						}
					}
				}
/* there is no selectors in restored array */
				if (is_array($restored_selectors) && count($restored_selectors)) {
/* loop in all restored selectors */
					foreach ($restored_selectors as $restored_selector) {
/* try to resolve background shorthand */
						if (strpos($property, "ackground") &&
							empty($this->css->css[$import][$restored_selector][$property]) &&
							!empty($this->css->css[$import][$restored_selector]['background'])) {
								$background = $this->css->optimise->dissolve_short_bg($this->css->css[$import][$restored_selector]['background']);
/* in resolved property these is no give key */
								if (!empty($background[$property])) {
									$return = $background[$property];
								}
/* try to resolve padding shorthand */
						} elseif (strpos($property, "adding") &&
							empty($this->css->css[$import][$restored_selector][$property]) &&
							!empty($this->css->css[$import][$restored_selector][$property]['padding'])) {
								$padding = $this->css->optimise->dissolve_4value_shorthands('padding', $this->css->css[$import][$restored_selector][$property]['padding']);
/* in resolved property these is no given key */
								if (!empty($padding[$property])) {
									$return = $padding[$property];
								}
/* property is defined w/o shorthands */
						} elseif (!empty($this->css->css[$import][$restored_selector][$property])) {
							$return = $this->css->css[$import][$restored_selector][$property];
						}
					}
/* remember restored selectors for future properties */
					if (empty($this->restored_selectors[$stage][$selector])) {
						$this->restored_selectors[$stage][$selector] = $restored_selectors;
					}
				}
			}
			if (empty($this->restored_selectors[$stage][$selector])) {
				$this->restored_selectors[$stage][$selector] = 'No';
			}
			if (empty($return)) {
				$return = $this->restore_property($import, $selector, $property, ++$stage);
			}
		} else {
			$return = null;
		}
		return $return;
	}
/** 
 * PNG ALPHA CHANNEL SUPPORT for imagecopymerge(); 
 * This is a function like imagecopymerge but it handle alpha channel well
 * A fix to get a function like imagecopymerge WITH ALPHA SUPPORT 
 * Main script by aiden dot mail at freemail dot hu 
 * Transformed to imagecopymerge_alpha() by rodrigo dot polo at gmail dot com
 **/ 
	function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct = 100){
		switch ($this->alpha) {
			case 1:
				$pct /= 100;
/* Get image width and height */
				$w = @imagesx($src_im);
				$h = @imagesy($src_im);
/* Turn alpha blending off */
				@imagealphablending($src_im, false);
/* Find the most opaque pixel in the image (the one with the smallest alpha value) */
				$minalpha = 127;
				for( $x = 0; $x < $w; $x++ ) {
					for( $y = 0; $y < $h; $y++ ) {
						$alpha = (@imagecolorat($src_im, $x, $y) >> 24) & 0xFF;
						if ($alpha < $minalpha) {
							$minalpha = $alpha;
						}
					}
				}
/* loop through image pixels and modify alpha for each */
				for( $x = 0; $x < $w; $x++ ) {
					for( $y = 0; $y < $h; $y++ ) {
/* get current alpha value (represents the TRANSPARENCY!) */
						$colorxy = @imagecolorat($src_im, $x, $y);
						$alpha = ($colorxy >> 24) & 0xFF;
/* calculate new alpha */
						if ($minalpha !== 127) {
							$alpha = 127 + 127 * $pct * ($alpha - 127) / (127 - $minalpha);
						} else {
							$alpha += 127 * $pct;
						}
/* get the color index with new alpha */
						$alphacolorxy = @imagecolorallocatealpha($src_im, ($colorxy >> 16) & 0xFF, ($colorxy >> 8) & 0xFF, $colorxy & 0xFF, $alpha);
/* set pixel with the new color + opacity */
						if (!@imagesetpixel($src_im, $x, $y, $alphacolorxy)) {
							return false;
						}
					}
				}
/* skip all logic for non-semitransparent images */
			case 0:
/* The image copy */
				@imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);
				break;
		}
	}
/* fix background-position:	left|right|center -> 0 50%|100% 50%|50% 50%
							top|bottom -> 50% 0|50% 100% */
	function compute_background_position ($value) {
/* step 1: restore half-value to full one */
		$values = explode(" ", $value);
		if (!isset($values[1])) {
			switch ($values[0]) {
				case 'top':
				case 'bottom':
					$value = '50% ' . $value;
					break;
				default:
					$value .= ' 50%';
					break;
			}
		}
/* step 2: convert 0px etc to absolute 0 */
		$values = explode(" ", $value);
		if (!empty($values[0]) && substr($values[0], 0, 1) == '0') {
			$values[0] = 0;
		}
		if (!empty($values[1]) && substr($values[1], 0, 1) == '0') {
			$values[1] = 0;
		}
/* step 3:	switch bottom left to left bottom etc 
			switch 40px left to left 40px etc */
		if (in_array($values[0], array('top, bottom')) || in_array($values[1], array('left', 'right'))) {
			$v = $values[0];
			$values[0] = $values[1];
			$values[1] = $v;
		}
		$value = $values[0] . " " . $values[1];
/* step 4: replace words with percent */
		$value = str_replace(array('left', 'top', 'center', 'bottom', 'right'), array(0, 0, '50%', '100%', '100%'), $value);
		return $value;
	}
}

?>