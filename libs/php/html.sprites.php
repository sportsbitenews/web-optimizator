<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Parses arra yof images to dmensions/pathnames. Stores array of CSS rules
 *
 **/
class html_sprites {

	/**
	* Constructor
	* Sets the options and converts
	**/
	function html_sprites ($imgs, $options, $main) {
		$t = time() + microtime();
		$this->options = $options;
		$this->main = $main;
		if ($this->php == 4) {
			if (!class_exists('css_sprites_optimize')) {
				require($this->options['css']['installdir'] . 'libs/php/css.sprites.optimize.php');
			}
		} else {
			if (!class_exists('css_sprites_optimize', false)) {
				require($this->options['css']['installdir'] . 'libs/php/css.sprites.optimize.php');
			}
		}
/* create CSS Sprites combiner */
		$this->optimizer = new css_sprites_optimize(array(
			'root_dir' => $this->options['page']['installdir'],
			'current_dir' => $this->options['page']['cachedir'],
			'html_cache' => $this->options['page']['cachedir'],
			'website_root' => $this->options['document_root'],
			'truecolor_in_jpeg' => $this->options['css']['truecolor_in_jpeg'],
			'aggressive' => 0,
			'no_ie6' => 0,
			'ignore_list' => $this->options['css']['css_sprites_exclude'],
			'partly' => 0,
			'extra_space' => $this->options['css']['css_sprites_extra_space'],
			'expires_rewrite' => $this->options['css']['css_sprites_expires_rewrite'],
			'data_uris' => 0,
			'data_uris_separate' => 0,
			'data_uris_size' => 0,
			'data_uris_ignore_list' => '',
			'mhtml' => 0,
			'mhtml_size' => 0,
			'mhtml_ignore_list' => '',
			'css_url' => '',
			'dimensions_limited' => $this->options['page']['dimensions_limited'],
			'no_css_sprites' => 0,
			'multiple_hosts' => empty($this->options['page']['parallel']) ?
				array() : explode(" ", $this->options['page']['parallel_hosts']),
			'user_agent' => $this->ua_mod,
			'punypng' => $this->options['css']['punypng'],
			'restore_properties' => 0
		));
/* calculate all dimensions for images */
		$this->images = $this->get_images_dimensions($imgs);
		ksort($this->images);
		$this->css = array(42 => array());
		$this->css_images = array();
	}

	/**
	/* Main function to process with images
	/*
	**/
	function process ($content) {
		$str = '';
		$equal = 1;
/* calculate styles */
		foreach ($this->images as $url => $image) {
			$width = $image[0];
			$height = $image[1];
			$class = $image[2];
			$active = $image[3];
			$filename = $this->options['document_root'] . $url;
/* skip big images */
			if ($width <= $this->options['page']['dimensions_limited'] &&
				$height <= $this->options['page']['dimensions_limited'] &&
				$width && $height && !empty($class) && !empty($active)) {
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
			$this->sprite = 'webo.' . md5($str) . '.png';
			if (!empty($this->images[$this->sprite])) {
				$styles = $this->images[$this->sprite][2];
			} else {
				$dir = @getcwd();
				@chdir($this->options['page']['cachedir']);
				$this->optimizer->css_images = array(
					$this->sprite => array('images' => $this->css_images)
				);
				$this->optimizer->css = $this;
				$this->optimizer->merge_sprites(4, $this->sprite, $equal && !empty($w) && !empty($h) ? 2 : 1);
				@chdir($dir);
				$styles = $this->calculate_styles($this->optimizer->css->css[42]);
/* cache styles to file */
				$this->images[$this->sprite] = array(0, 0, $styles);
				$str = '<?php';
				foreach ($this->images as $k => $i) {
					$str .= "\n" . '$images[\'' . $k .
						"'] = array(" . $i[0] . "," . $i[1] . ",'" . $i[2] . "');";
				}
				$str .= "\n?>";
				$this->main->write_file($this->options['page']['cachedir'] . 'wo.img.cache.php', $str);
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
/* load cached images' dimensions */
		if (@is_file($this->options['page']['cachedir'] . 'wo.img.cache.php')) {
			require($this->options['page']['cachedir'] . 'wo.img.cache.php');
		} else {
			$images = array();
		}
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
/* fetch only non cached images */
				if (!empty($absolute_src) && empty($images[$absolute_src]))  {
					$need_refresh = 1;
					list($width, $height) = $this->optimizer->get_image(0, '', $absolute_src);
/* skip dymanic images, need to download the last... */
					$class = preg_match("@\.(ico|gif|jpe?g|bmp|png)$@", $old_src) &&
						$width && $height ? 'wo' . md5($absolute_src) : '';
					$images[$absolute_src] = array($width, $height, $class);
				}
				if (!empty($this->options['page']['css_sprites_html_page'])) {
					$images[$absolute_src][3] = 1;
				}
/* remember src for calculated images */
				$imgs[$key] = $absolute_src;
			}
		}
		if (!empty($need_refresh)) {
/* cache images' dimensions to file */
			$str = '<?php';
			foreach ($images as $k => $i) {
				$str .= "\n" . '$images[\'' . $k .
					"'] = array(" . $i[0] . "," . $i[1] . ",'" . $i[2] . "');";
				if (empty($this->options['page']['css_sprites_html_page'])) {
					$images[$k][3] = 1;
				}
			}
			$str .= "\n?>";
			$this->main->write_file($this->options['page']['cachedir'] . 'wo.img.cache.php', $str);
/* or just mark all images as active */
		} elseif (empty($this->options['page']['css_sprites_html_page'])) {
			foreach ($images as $k => $i) {
				$images[$k][3] = 1;
			}
		}
		return $images;
	}

	/**
	* Return HTML Sprites styles
	*
	**/
	function calculate_styles ($css) {
		$styles = '';
		if (!empty($css)) {
/* form final css chunk */
			$styles = '<style type="text/css">';
			foreach ($css as $class => $rules) {
				$styles .= $class . '{';
				foreach ($rules as $k => $v) {
					if ($k == 'background-image') {
						$v = 'url(' .
							$this->options['page']['cachedir_relative'] .
							substr($v, 4);
					}
					$styles .= $k . ':' . $v . ';';
				}
				$styles .= '}';
			}
			$styles = str_replace(';}', '}', $styles) . '</style>';
		}
		return $styles;
	}

	/**
	* Return HTML with inserted for HTML Sprites styles
	*
	**/
	function add_styles ($content, $styles) {
		if (!empty($styles)) {
/* insert css chunk to <head> */
			if ($this->options['page']['html_tidy'] && ($h = strpos($content, '<head'))) {
				$hc = strpos(substr($content, $h, 50), '>');
				$content = substr_replace($content, $styles, $hc + $h + 1, 0);
			} elseif ($this->options['page']['html_tidy'] && ($h = strpos($content, '<HEAD'))) {
				$hc = strpos(substr($content, $h, 50), '>');
				$content = substr_replace($content, $styles, $hc + $h + 1, 0);
			} else {
				$content = preg_replace("!<head(\s+[^>]+)?>!is", "$0" . $styles, $content);
			}
		}
		return $content;
	}

}

?>