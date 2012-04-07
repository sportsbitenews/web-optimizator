<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Parses array of images to dmensions/pathnames. Stores array of CSS rules
 * License agreement: http://www.webogroup.com/about/EULA.txt
 *
 **/
class html_sprites {

	/**
	* Constructor
	* Sets the options and converts
	**/
	function html_sprites ($imgs, $options, $main) {
		$this->options = $options;
		$this->main = $main;
		if (!class_exists('css_sprites_optimize', false)) {
			require($this->options['css']['installdir'] . 'libs/php/css.sprites.optimize.php');
		}
/* create CSS Sprites combiner */
		$this->optimizer = new css_sprites_optimize(array(
			'root_dir' => $this->options['css']['installdir'],
			'current_dir' => $this->options['page']['cachedir'],
			'html_cache' => $this->options['page']['cachedir'],
			'website_root' => $this->options['document_root'],
			'truecolor_in_jpeg' => $this->options['css']['truecolor_in_jpeg'],
			'aggressive' => 0,
			'no_ie6' => 0,
			'ignore' => $this->options['css']['css_sprites_ignore'],
			'ignore_list' => $this->options['css']['css_sprites_exclude'],
			'partly' => 0,
			'extra_space' => $this->options['css']['css_sprites_extra_space'],
			'expires_rewrite' => $this->options['css']['css_sprites_expires_rewrite'],
			'cache_images' => $this->options['page']['cache_images'],
			'cache_images_rewrite' => $this->options['page']['far_future_expires_rewrite'],
			'data_uris' => 0,
			'data_uris_separate' => 0,
			'data_uris_size' => 0,
			'data_uris_ignore_list' => '',
			'mhtml' => 0,
			'mhtml_size' => 0,
			'mhtml_ignore_list' => '',
			'css_url' => '',
			'dimensions_limited' => $this->options['page']['dimensions_limited'] ? $this->options['page']['dimensions_limited'] : 10000,
			'no_css_sprites' => 0,
			'multiple_hosts' => empty($this->options['page']['parallel']) ?
				array() : explode(" ", $this->options['page']['parallel_hosts']),
			'user_agent' => $this->main->ua_mod,
			'punypng' => $this->options['css']['punypng'],
			'restore_properties' => 0,
			'ftp_access' => $this->options['page']['parallel_ftp'],
			'http_host' => $this->options['page']['host'],
			'https_host' => $this->options['page']['parallel_https'],
			'uniform_cache' => $this->options['uniform_cache']
		));
/* calculate all dimensions for images */
		$this->images = $this->get_images_dimensions($imgs);
		$this->imgs = $imgs;
		ksort($this->images);
		$this->css = array(42 => array());
		$this->css_images = array();
	}

	/**
	/* Scale HTML images to real sizes
	/*
	**/
	function scale ($content) {
		$webo_scaled_images = array();
		$webo_images_scale_var = $this->convert_file_name('scale');
		@include($webo_images_scale_var);
		$need_save = 0;
/* get dimensions in HTML */
		if (!empty($this->imgs)) {
			foreach ($this->imgs as $key => $image) {
				$i = str_replace("'", "###", $image[0]);
				$image_to = empty($webo_scaled_images[$i]) ? '' : $webo_scaled_images[$i];
				if (empty($image_to) && $i != 'SKIPPED') {
					$need_save = 1;
					$src = preg_replace("!^['\"\s]*(.*?)['\"\s]*(/?>)?$!is", "$1", preg_replace("!.*\ssrc\s*=\s*(\"[^\"]+\"|'[^']+'|[\S]+).*!is", "$1", $i));
					$absolute_src = $this->main->convert_path_to_absolute($src, array('file' => $_SERVER['REQUEST_URI']));
					$width = round(preg_replace("!.*width\s*:\s*([0-9]+)px.*!is", "$1", $i));
					$width = $width ? $width : round(preg_replace("!.*width\s*=\s*['\"]?([0-9]+).*!is", "$1", $i));
					$height = round(preg_replace("!.*height\s*:\s*([0-9]+)px.*!is", "$1", $i));
					$height = $height ? $height : round(preg_replace("!.*height\s*=\s*['\"]?([0-9]+).*!is", "$1", $i));
					$img = $this->images[$absolute_src];
					if ($absolute_src && (($width && $img[0] > $width) || ($height && $img[1] > $height))) {
						$md5 = md5($absolute_src);
						$scaled_src = $this->options['page']['cachedir'] . 'img/scale/' . $md5{0} . '/';
						if (!@is_dir($scaled_src)) {
							$this->__mkdir($scaled_src);
						}
						$scaled_src .= $md5{1} . '/';
						if (!@is_dir($scaled_src)) {
							$this->__mkdir($scaled_src);
						}
						$scaled_src .= $md5{2} . '/';
						if (!@is_dir($scaled_src)) {
							$this->__mkdir($scaled_src);
						}
						$scaled_src .= $md5{3} . '/';
						if (!@is_dir($scaled_src)) {
							$this->__mkdir($scaled_src);
						}
						$scaled_src .= substr($md5, 4) . '.';
						if ($width && $img[0] > $width) {
							$height = round($img[1] * $width / $img[0]);
						}
						if ($height && $img[1] > $height) {
							$width = round($img[0] * $height / $img[1]);
						}
						$ext = strtolower(preg_replace("!.*\.([^\.]+)$!is", "$1", $src));
						if (in_array($ext, array('png', 'gif'))) {
							$PNG = 1;
							$scaled_src .= 'png';
						} else {
							$PNG = 0;
							$scaled_src .= 'jpg';
						}
/* create new file if required */
						if (!@is_file($scaled_src)) {
							switch ($ext) {
								case 'gif':
									$im = @imagecreatefromgif($this->options['document_root'] . $absolute_src);
									break;
								case 'png':
									$im = @imagecreatefrompng($this->options['document_root'] . $absolute_src);
									break;
								case 'jpg':
								case 'jpeg':
									$im = @imagecreatefromjpeg($this->options['document_root'] . $absolute_src);
									break;
								case 'bmp':
									$im = @imagecreatefromwbmp($this->options['document_root'] . $absolute_src);
									break;
								default:
									$im = @imagecreatefromxbm($this->options['document_root'] . $absolute_src);
									break;
							}
							if (!$im) {
								$functions = array('imagecreatefromgif', 'imagecreatefrompng', 'imagecreatefromjpeg', 'imagecreatefromwbmp', 'imagecreatefromxbm');
								foreach ($functions as $func) {
									if (!$im) {
										$im = @$func($this->options['document_root'] . $absolute_src);
									}
								}
							}
							if ($im) {
								$image_raw = @imagecreatetruecolor($width, $height);
								@imagealphablending($image_raw, false);
								@imagesavealpha($image_raw, true);
								$background = @imagecolorallocatealpha($image_raw, 255, 255, 255, 127);
								@imagefilledrectangle($image_raw, 0, 0, $width-1, $height-1, $background);
								@imagecolortransparent($image_raw, $background);
								@imagecopyresized($image_raw, $im, 0, 0, 0, 0, $width, $height, $img[0], $img[1]);
								if ($PNG) {
									try {
										@imagepng($image_raw, $scaled_src, 9, PNG_ALL_FILTERS);
									} catch (Exception $e) {
										try {
											@imagepng($image_raw, $scaled_src, 9);
										} catch (Exception $e) {
											try {
												@imagepng($image_raw, $scaled_src);
											} catch (Exception $e) {
												$scaled_src = '';
											}
										}
									}
									if (!@is_file($scaled_src)) {
										$scaled_src = preg_replace("!\.png$!", '.jpg', $scaled_src);
										try {
											@imagejpeg($image_raw, $scaled_src, 80);
										} catch (Exception $e) {
											try {
												@imagejpeg($image_raw, $scaled_src);
											} catch (Exception $e) {
												$scaled_src = '';
											}
										}
										if (!@is_file(realpath($scaled_src))) {
											$scaled_src = '';
										}
									}
								} else {
									try {
										@imagejpeg($image_raw, $scaled_src, 80);
									} catch (Exception $e) {
										try {
											@imagejpeg($image_raw, $scaled_src);
										} catch (Exception $e) {
											$scaled_src = '';
										}
									}
									if (!@is_file($scaled_src)) {
										$scaled_src = preg_replace("!\.jpg$!", '.png', $scaled_src);
										try {
											@imagepng($image_raw, $scaled_src, 9, PNG_ALL_FILTERS);
										} catch (Exception $e) {
											try {
												@imagepng($image_raw, $scaled_src, 9);
											} catch (Exception $e) {
												try {
													@imagepng($image_raw, $scaled_src);
												} catch (Exception $e) {
													$scaled_src = '';
												}
											}
										}
										if (!@is_file(realpath($scaled_src))) {
											$scaled_src = '';
										}
									}
								}
							} else {
								$scaled_src = '';
							}
						}
						if ($scaled_src) {
							$image_to = str_replace($src, str_replace($this->options['document_root'], '/', $scaled_src), $i);
						} else {
							$image_to = '';
						}
					} else {
						$image_to = '';
					}
				}
				if ($image_to && $image_to != 'SKIPPED') {
					$replace_from[] = str_replace("###", "'", $i);
					$replace_to[] = $image_to;
				}
				if (empty($webo_scaled_images[$i])) {
					$need_rewrite = 1;
				}
				$webo_scaled_images[$i] = $image_to ? $image_to : 'SKIPPED';
			}
		}
		$content = str_replace($replace_from, $replace_to, $content);
		if (!empty($need_rewrite)) {
			$this->main->write_file($webo_images_scale_var, $this->form_php_file($webo_scaled_images, 1));
		}
		return $content;
	}

	/**
	/* Main function to process with images
	/*
	**/
	function process ($content) {
		$webo_images_list_var = $this->convert_file_name('cache');
		$str = '';
		$equal = 1;
		$exclude_list = explode(" ", $this->options['css']['css_sprites_exclude']);
/* calculate styles */
		foreach ($this->images as $url => $image) {
			$width = $image[0];
			$height = $image[1];
			$class = $image[2];
			$active = empty($image[3]) ? 0 : $image[3];
			$filename = $this->options['document_root'] . $url;
			$name = preg_replace("@.*/@", "", $url);
/* skip big images */
			if ($width <= $this->options['page']['dimensions_limited'] &&
				$height <= $this->options['page']['dimensions_limited'] &&
				$width && $height && !empty($class) && !empty($active) &&
				((empty($this->options['css']['css_sprites_ignore']) && !in_array($name, $exclude_list)) ||
				(!empty($this->options['css']['css_sprites_ignore']) && in_array($name, $exclude_list)))) {
					$this->css_images[$url] = array($filename,
						$width, $height, 0, 0, 0, 0, 42, '.' . $class);
					$this->css[42]['.' . $class] = array(
						'width' => $width . 'px',
						'height' => $height . 'px',
						'padding' => 0,
						'background-image' => 'url(' . $url . ')',
						'background-repeat' => 'no-repeat'
					);
					$str .= $url . "_" . $width . "_" . $height;
/* check if all images are equal - this makes Sprite calculation easier */
					$w = empty($w) ? $width : $w;
					$h = empty($h) ? $height : $h;
					$equal = $equal && $w == $width && $h == $height;
			}
		}
/* skip creating if there is only 1 image */
		if (count($this->css_images) > 1) {
			$https = empty($_SERVER['HTTPS']) ? '' : 's';
			$this->sprite = 'webo.' . md5($str) . '.png';
			if (!empty($this->images[$this->sprite . $https])) {
				$styles = $this->images[$this->sprite . $https][2];
			} else {
				$dir = @getcwd();
				@chdir($this->options['page']['cachedir']);
				$this->optimizer->css_images = array(
					$this->sprite => array('images' => $this->css_images)
				);
				$this->optimizer->css = $this;
				$this->optimizer->merge_sprites(4, $this->sprite, $equal && !empty($w) && !empty($h) ? 2 : 1);
				$created = 0;
/* check if we have created sprite */
				foreach ($this->optimizer->css->css[42] as $class => $rules) {
					foreach ($rules as $k => $v) {
						if ($k == 'background-image') {
							$url = substr($v, 4, strlen($v) - 5);
/* leave this image */
							if (empty($this->images[$url])) {
								$created = 1;
/* or remove from generated array */
							} else {
								unset($this->css_images[$url]);
							}
						}
					}
				}
				@chdir($dir);
				if ($created) {
					$styles = $this->calculate_styles($this->optimizer->css->css[42]);
				} else {
					$styles = '';
				}
/* cache styles to file */
				$this->images[$this->sprite . $https] = array(0, 0, $styles);
				$this->main->write_file($webo_images_list_var, $this->form_php_file($this->images));
			}
			$content = $this->add_styles($content, $styles);
		} else {
			unset($this->css_images);
		}
		return $content;
	}

	/**
	* Get dimensions for give array of HTML images
	*
	**/
	function get_images_dimensions ($imgs) {
		$webo_images_list_var = $this->convert_file_name('cache');
		$images = array();
/* load cached images' dimensions */
		@include($webo_images_list_var);
/* calculate all dimensions for new images */
		if (!empty($imgs)) {
			foreach ($imgs as $key => $image) {
				if (!empty($this->options['page']['html_tidy']) && ($pos=strpos($image[0], 'src="'))) {
					$old_src = substr($image[0], $pos+5, strpos(substr($image[0], $pos+5), '"'));
				} elseif (!empty($this->options['page']['html_tidy']) && ($pos=strpos($image[0], "src='"))) {
					$old_src = substr($image[0], $pos+5, strpos(substr($image[0], $pos+5), "'"));
				} else {
					$old_src = preg_replace("!^['\"\s]*(.*?)['\"\s]*$!is", "$1", preg_replace("!.*\ssrc\s*=\s*(\"[^\"]+\"|'[^']+'|[\S]+).*!is", "$1", $image[0]));
				}
/* strip GET parameter */
				$old_src = ($old_src_param_pos = strpos($old_src, '?')) ? substr($old_src, 0, $old_src_param_pos) : $old_src;
				$absolute_src = $this->main->convert_path_to_absolute($old_src,
					array('file' => $_SERVER['REQUEST_URI']));
				$filename = explode("/", $absolute_src);
				$filename = array_pop($filename);
				$absolute_src = str_replace("'", "\'", $absolute_src);
/* fetch only non-cached images, or only included, or all - if scale */
				if (!empty($absolute_src) && (!$this->optimizer->ignore || in_array($filename, $this->optimizer->ignore_list) || !empty($this->options['page']['scale_images']))) {
					if (empty($images[$absolute_src]))  {
						$need_refresh = 1;
						$width = $height = 0;
						$class = '';
						if (strpos($image[0], 'nosprites') === false) {
							list($width, $height) = $this->optimizer->get_image(0, '', $absolute_src);
							$width = empty($width) ? 0 : $width;
							$height = empty($height) ? 0 : $height;
/* skip dymanic images, need to download the last... */
							$class = preg_match("@\.(ico|gif|jpe?g|bmp|png)$@", $old_src) &&
								$width && $height ? 'wo' . md5($absolute_src) : '';
						}
						$images[$absolute_src] = array($width, $height, $class);
					}
					$images[$absolute_src][3] =
						!empty($this->options['page']['per_page']) ? 1 : 0;
				}
/* remember src for calculated images */
				$imgs[$key] = $absolute_src;
			}
		}
		$images_return = $images;
		if (!empty($need_refresh)) {
/* cache images' dimensions to file */
			$this->main->write_file($webo_images_list_var, $this->form_php_file($images));
/* or just mark all images as active */
		} elseif (empty($this->options['page']['per_page'])) {
			foreach ($images_return as $k => $i) {
				$images_return[$k][3] = 1;
			}
		}
		return $images_return;
	}

	/**
	* Return HTML Sprites styles
	*
	**/
	function calculate_styles ($css) {
		$styles = '';
		if (!empty($this->options['page']['parallel'])) {
			$hosts = explode(" ", trim($this->options['page']['parallel_hosts']));
			if (count($hosts)) {
				$host = $hosts[0];
			}
			if (!empty($_SERVER['HTTPS']) && !empty($this->options['page']['parallel_https'])) {
				$host = $this->options['page']['parallel_https'];
			}
		}
		if (!empty($css)) {
/* form final css chunk */
			$styles = '';
			foreach ($css as $class => $rules) {
				$styles .= $class . '{';
				foreach ($rules as $k => $v) {
					if ($k == 'background-image') {
						$v = 'url(' .
							(empty($host) ?
								(empty($this->options['page']['far_future_expires_rewrite']) ?
								'' : $this->options['page']['cachedir_relative'] . 'wo.static.php?') .
								$this->options['page']['cachedir_relative'] :
								'//' . $host . $this->options['page']['cachedir_relative']) .
							substr($v, 4);
					}
					$styles .= $k . ':' . $v . ';';
				}
				$styles .= '}';
			}
			$styles = str_replace(';}', '}', $styles);
		}
		return $styles;
	}

	/**
	* Return HTML with inserted for HTML Sprites styles
	*
	**/
	function add_styles ($content, $styles) {
		if (!empty($styles)) {
/* insert css chunk to spot */
			if (!$this->options['page']['sprites_domloaded']) {
				$content = str_replace("@@@WSSSTYLES@@@", '<style type="text/css">' . $styles . '</style>', $content);
/* or to the end of the document */
			} else {
				$content = str_replace("@@@WSSREADY@@@", '<script type="text/javascript">function _webo_hsprites(){var a=document,b=a.createElement("style"),c=a.createTextNode("' .
				str_replace('"', '\\"', $styles) .
				'"),d;b.type="text/css";if(d=b.styleSheet){d.cssText=c.nodeValue}else{b.appendChild(c)}a.getElementsByTagName("head")[0].appendChild(b)}</script>', $content);
			}
		} else {
			unset($this->css_images);
		}
		return $content;
	}

	/**
	* Return ready to insert string of PHP code
	*
	**/
	function form_php_file ($images, $mode = 0) {
		$str = '<?php';
		foreach ($images as $k => $i) {
			$str .= "\n" . '$' .
				($mode ? 'webo_scaled_images' : 'images') .
				'[\'' . str_replace(array("'", '//', "\\"), array("\'", '/', "\\\\"), $k) . "'] = ";
			switch ($mode) {
				case 1:
					$str .= "'" . str_replace(array("'", "\\"), array("\'", "\\\\"), $i) . "'";
					break;
				case 0:
					$str .= "array(" . round($i[0]) . "," . round($i[1]) . ",'" . $i[2] . "')";
					if (empty($this->options['page']['per_page'])) {
						$images[$k][3] = 1;
					}
					break;
			}
			$str .= ";";
		}
		$str .= "\n?>";
		return $str;
	}
	
	function convert_file_name ($str) {
		if (!@is_dir($this->options['page']['cachedir'] . 'img')) {
			$this->__mkdir($this->options['page']['cachedir'] . 'img');
			$this->__mkdir($this->options['page']['cachedir'] . 'img/cache');
			$this->__mkdir($this->options['page']['cachedir'] . 'img/scale');
		}
		if ($this->options['page']['per_page']) {
			$uri = $this->main->convert_request_uri();
			$uris = explode("+", $uri);
			array_pop($uris);
			$ur = $this->options['page']['cachedir'] . 'img/' . $str . '/';
			foreach ($uris as $u) {
				$ur .= $u . '/';
				if (!@is_dir($ur)) {
					$this->__mkdir($ur);
				}
			}
		}
		return $this->options['page']['cachedir'] . 'img/' . $str . '/' .
			($this->options['page']['per_page'] ? str_replace('+', '/', $uri) . '.' : '') .
			'wo.img.php';
	}
	
	function __mkdir ($dir) {
		@mkdir($dir);
		@chmod($dir, octdec('0755'));
	}

}

?>