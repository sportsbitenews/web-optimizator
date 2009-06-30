<?php
/**
 * File from PHP Speedy, Leon Chevalier (http://www.aciddrop.com)
 * Adopted to Web Optimizer by Nikolay Matsievsky (http://webo.in)
 * Gzips and minifies the JavaScript and CSS within the head tags of a page.
 * Can also gzip and minify the page itself
 **/
class web_optimizer {

	/**
	* Constructor
	* Sets the options and defines the gzip headers
	**/
	function web_optimizer($options = false) {
		if(!empty($options['skip_startup'])) {
			return;
		}
/* initialize chained optimization */
		$this->web_optimizer_stage = round(empty($_GET['web_optimizer_stage']) ? 0 : $_GET['web_optimizer_stage']);
		$this->username = htmlspecialchars(empty($_GET['username']) ? '' : $_GET['username']);
		$this->password = htmlspecialchars(empty($_GET['password']) ? '' : $_GET['password']);
		$this->auto_rewrite = round(empty($_GET['auto_rewrite']) ? '' : $_GET['auto_rewrite']);
/* Allow merging of other classes with this one */
		foreach($options AS $key=>$value) {
			$this->$key = $value;
		}
/* define head of the webpage for scripts / styles */
		$this->head = '';
/* define PHP version */
		$this->php = $this->options['php'];
/* number of external files calls to process */
		$this->initial_files = array();
/* Set options */
		$this->set_options();
/* Define the gzip headers */
		$this->set_gzip_headers();
/* Deal with flushed content or not? */
		$this->flushed = false;
/* HTML cache ? */
		$excluded_html_pages = preg_replace("/[!\^\$\|\(\)\[\]\{\}]/", "\$1", preg_replace("/ /", "|", $this->options['page']['cache_ignore']));
		$included_user_agents = preg_replace("/[!\^\$\|\(\)\[\]\{\}]/", "\$1", preg_replace("/ /", "|", $this->options['page']['allowed_user_agents']));
		$this->cache_me = !empty($this->options['page']['cache']) && (empty($this->options['page']['cache_ignore']) || !preg_match("!" . $excluded_html_pages . "!is", $_SERVER['REQUEST_URI']) || preg_match("!" . $included_user_agents . "!is", $_SERVER['HTTP_USER_AGENT'])) && (empty($this->options['page']['gzip']) || empty($this->options['page']['flush'])) && !headers_sent();
/* check if we can get out cached page */
		if (!empty($this->cache_me)) {
			$this->uri = $this->convert_request_uri();
			$file = $this->options['page']['cachedir'] . '/' . $this->uri;
			if (is_file($file) && time() - filemtime($file) < $this->options['page']['cache_timeout']) {
				$content = @file_get_contents($file);
/* check if cached content if gzipped */
				if (!empty($this->options['page']['gzip']) && substr($content, 0, 8) == "\x1f\x8b\x08\x00\x00\x00\x00\x00") {
					$this->set_gzip_header();
				}
				if (empty($this->options['page']['flush'])) {
					echo $content;
					die();
/* content is a head part, flush it after */
				} else {
/* can't gzip twice via php, so flush only if gzip via php disabled */
					if (empty($this->options['page']['gzip'])) {
						if (!empty($content)) {
							echo $content;
							flush();
							$this->flushed = true;
						}
					}
				}
			}
		}
/* Start things off */
		$this->start();
	}

	/**
	* Write installation progress to JavaScript file
	*
	**/
	function write_progress ($progress) {
		$fp = @fopen($this->options['javascript']['cachedir'] . '/progress.html', "w");
		if ($fp) {
			@fwrite($fp, '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><title></title><script type="text/javascript">parent.window.lp(' . $progress. ')</script></head><body></body></html>');
			@fclose($fp);
		}
	}

	/**
	* Options are read from config.webo.php
	**/
	function set_options() {
/* Set paths with new options */
		$this->options['document_root'] = !empty($this->options['document_root']) ? $this->options['document_root'] : '';
		$this->view->set_paths($this->options['document_root']);
/* Set ignore file */
		if(!empty($this->options['ignore_list'])) {
			$this->ignore(trim($this->options['ignore_list']));
		}
/* Read in options */
		$full_options = array(
			"javascript" => array(
				"cachedir" => $this->options['javascript_cachedir'],
				"installdir" => $this->options['webo_cachedir'],
				"gzip" => $this->options['gzip']['javascript'] && !$this->options['htaccess']['mod_gzip'] && !$this->options['htaccess']['mod_deflate'] && (!$this->options['htaccess']['mod_rewrite'] || !$this->options['htaccess']['mod_mime'] || !$this->options['htaccess']['mod_expires']),
				"minify" => $this->options['minify']['javascript'],
				"minify_with" => $this->options['minify']['with_jsmin'] ? 'jsmin' : ($this->options['minify']['with_yui'] ? 'yui' : ($this->options['minify']['with_packer'] ? 'packer' : '')),
				"far_future_expires" => $this->options['far_future_expires']['javascript'] && !$this->options['htaccess']['mod_expires'],
				"far_future_expires_php" => $this->options['far_future_expires']['javascript'],
				"unobtrusive" => $this->options['unobtrusive']['on'],
				"unobtrusive_body" => $this->options['unobtrusive']['body'],
				"external_scripts" => $this->options['external_scripts']['on'],
				"external_scripts_head_end" => $this->options['external_scripts']['head_end'],
				"external_scripts_exclude" => $this->options['external_scripts']['ignore_list'],
				"dont_check_file_mtime" => $this->options['dont_check_file_mtime']['on']
			),
			"css" => array(
				"cachedir" => $this->options['css_cachedir'],
				"installdir" => $this->options['webo_cachedir'],
				"gzip" => $this->options['gzip']['css'] && !$this->options['htaccess']['mod_gzip'] && !$this->options['htaccess']['mod_deflate'] && (!$this->options['htaccess']['mod_rewrite'] || !$this->options['htaccess']['mod_mime'] || !$this->options['htaccess']['mod_expires']),
				"minify" => $this->options['minify']['css'],
				"minify_with" => $this->options['minify']['with_yui'] ? 'yui' : 'tidy',
				"far_future_expires" => $this->options['far_future_expires']['css'] && !$this->options['htaccess']['mod_expires'],
				"far_future_expires_php" => $this->options['far_future_expires']['css'],
				"data_uris" => $this->options['data_uris']['on'],
				"image_optimization" => $this->options['data_uris']['smushit'],
				"css_sprites" => $this->options['css_sprites']['enabled'],
				"css_sprites_exclude" => $this->options['css_sprites']['ignore_list'],
				"truecolor_in_jpeg" => $this->options['css_sprites']['truecolor_in_jpeg'],
				"aggressive" => $this->options['css_sprites']['aggressive'],
				"no_ie6" => $this->options['css_sprites']['no_ie6'],
				"memory_limited" => $this->options['css_sprites']['memory_limited'],
				"dimensions_limited" => round($this->options['css_sprites']['dimensions_limited']),
				"css_sprites_extra_space" => $this->options['css_sprites']['extra_space'],
				"unobtrusive" => false,
				"unobtrusive_body" => false,
				"parallel" => $this->options['parallel']['enabled'],
				"parallel_hosts" => $this->options['parallel']['allowed_list'],
				"external_scripts" => $this->options['external_scripts']['css'],
				"external_scripts_exclude" => $this->options['external_scripts']['ignore_list'],
				"dont_check_file_mtime" => $this->options['dont_check_file_mtime']['on']
			),
			"page" => array(
				"cachedir" => $this->options['html_cachedir'],
				"gzip" => $this->options['gzip']['page'] && !$this->options['htaccess']['mod_gzip'] && !$this->options['htaccess']['mod_deflate'],
				"minify" => $this->options['minify']['page'],
				"minify_aggressive" => $this->options['minify']['html_one_string'],
				"remove_comments" => $this->options['minify']['html_comments'],
				"dont_check_file_mtime" => $this->options['dont_check_file_mtime']['on'],
				"clientside_cache" => $this->options['far_future_expires']['html'],
				"clientside_timeout" => $this->options['far_future_expires']['html_timeout'],
				"cache" => $this->options['html_cache']['enabled'],
				"cache_timeout" => $this->options['html_cache']['timeout'],
				"flush" => $this->options['html_cache']['flush_only'],
				"flush_size" => $this->options['html_cache']['flush_size'],
				"cache_ignore" => $this->options['html_cache']['ignore_list'],
				"allowed_user_agents" => $this->options['html_cache']['allowed_list'],
				"parallel" => $this->options['parallel']['enabled'],
				"parallel_hosts" => $this->options['parallel']['allowed_list'],
				"unobtrusive_informers" => $this->options['unobtrusive']['informers'],
				"unobtrusive_counters" => $this->options['unobtrusive']['counters'],
				"unobtrusive_ads" => $this->options['unobtrusive']['ads']
			)
		);
/* overwrite other options array that we passed in */
		$this->options = $full_options;
/* Make sure cachedir does not have trailing slash */
		foreach($this->options AS $key=>$option) {
			if(!empty($option['cachedir'])) {
				if(substr($option['cachedir'],-1,1) == "/") {
					$cachedir = substr($option['cachedir'], 0, -1);
					$option['cachedir'] = $cachedir;
				}
			}
			$this->options[$key] = $option;
		}
		$this->options['show_timer'] = false; //time the javascript and css compression?
	}

	/**
	* Start saving the output buffer
	*
	**/
	function start() {
		ob_start();
	}

	/**
	* Compress passes content directly
	*
	**/
	function compress($content) {
		$this->finish($content);
	}

	/**
	* Tells the script to ignore certain files
	*
	**/
	function ignore($files = false) {
		if(!empty($files)) {
			$files_array = explode(",",$files);
		}
/* Ignore these files */
		if(!empty($files_array)) {
			foreach($files_array AS $key=>$value) {
				$this->ignore_files[] = trim($value);
			}
		}
	}

	/**
	* Do work and return output buffer
	*
	**/
	function finish($content = false) {
		if(!$content) {
			$this->content = ob_get_clean();
		} else {
			$this->content = $content;
		}
/* skip RSS */
		if (!strpos($this->content, "<rss version=")) {
			if ($this->web_optimizer_stage) {
				$this->write_progress($this->web_optimizer_stage = $this->web_optimizer_stage < 16 ? 16 : $this->web_optimizer_stage);
			}
/* find all files in head to process */
			$this->get_script_array();
/* Run the functions specified in options */
			if(is_array($this->options)) {
				foreach($this->options AS $func => $option) {
					if(method_exists($this,$func)) {
						if (!empty($option['gzip']) || !empty($option['minify']) || !empty($option['far_future_expires']) || !empty($option['parallel'])) {
							$this->$func($option, $func);
						}
					}
				}
			}
/* Delete old cache files */
			if(!empty($this->compressed_files) && is_array($this->compressed_files)) {
/* Make a string with the names of the compressed files */
				$this->compressed_files_string = implode("", $this->compressed_files);
			}
			if (!empty($this->web_optimizer_stage)) {
				$this->write_progress($this->web_optimizer_stage = $this->web_optimizer_stage < 90 ? 90 : $this->web_optimizer_stage);
			}
/* redirect to installation page if chained optimization */
			if (!empty($this->web_optimizer_stage)) {
				$this->write_progress($this->web_optimizer_stage = $this->web_optimizer_stage < 95 ? 95 : $this->web_optimizer_stage);
				header('Location: ../index.php?page=install_stage_3&Submit=1&web_optimizer_stage='. $this->web_optimizer_stage .'&user[_username]=' . $this->username . '&user[_password]=' . $this->password . "&user[auto_rewrite][enabled]=" . $this->auto_rewrite);
				die();
			}
		}
/* Echo content to the browser */
		if(empty($this->supress_output)) {
			if(!empty($this->return_content)) {
				return $this->content;
			} else {
				echo $this->content;
			}
		}
	}

	/**
	* GZIP and minify the javascript as required
	*
	**/
	function javascript($options,$type) {
		if (!empty($options['minify'])) {
/* Remove any files in the remove list */
			$this->do_remove();
/* prepare list of files to process */
			$script_files = array();
			foreach ($this->initial_files as $file) {
				if (!empty($file['tag']) && $file['tag'] == 'script') {
					$script_files[] = $file;
				}
			}
			$this->content = $this->do_compress(
				array(
					'cachedir' => $options['cachedir'],
					'installdir' => $options['installdir'],
					'tag' => 'script',
					'type' => 'text/javascript',
					'ext' => 'js',
					'src' => 'src',
					'self_close' => false,
					'gzip' => $options['gzip'],
					'minify' => $options['minify'],
					'minify_with' => $options['minify_with'],
					'far_future_expires' => $options['far_future_expires'],
					'far_future_expires_php' => $options['far_future_expires_php'],
					'header' => $type,
					'css_sprites' => false,
					'css_sprites_exclude' => false,
					'aggressive' => false,
					'no_ie6' => false,
					'memory_limited' => false,
					'dimensions_limited' => false,
					'css_sprites_extra_space' => false,
					'data_uris' => false,
					'unobtrusive' => $options['unobtrusive'],
					'unobtrusive_body' => $options['unobtrusive_body'],
					'external_scripts' => $options['external_scripts'],
					'external_scripts_head_end' => $options['external_scripts_head_end'],
					'external_scripts_exclude' => $options['external_scripts_exclude'],
					'dont_check_file_mtime' => $options['dont_check_file_mtime']
				),
				$this->content,
				$script_files
			);
		}
	}

	/**
	* GZIP and minify the CSS as required
	*
	**/
	function css($options, $type) {
		if (!empty($options['minify'])) {
/* prepare list of files to process */
			$link_files = array();
			foreach ($this->initial_files as $file) {
				if (!empty($file['tag']) && $file['tag'] == 'link') {
					$link_files[] = $file;
				}
			}
/* Compress separately for each media type*/
			$this->content = $this->do_compress(
				array(
					'cachedir' => $options['cachedir'],
					'installdir' => $options['installdir'],
					'tag' => 'link',
					'type' => 'text/css',
					'ext' => 'css',
					'src' => 'href',
					'rel' => 'stylesheet',
					'data_uris' => $options['data_uris'],
					'image_optimization' => $options['image_optimization'],
					'css_sprites' => $options['css_sprites'],
					'css_sprites_exclude' => $options['css_sprites_exclude'],
					'truecolor_in_jpeg' => $options['truecolor_in_jpeg'],
					'aggressive' => $options['aggressive'],
					'no_ie6' => $options['no_ie6'],
					'memory_limited' => $options['memory_limited'],
					'dimensions_limited' => $options['dimensions_limited'],
					'css_sprites_extra_space' => $options['css_sprites_extra_space'],
					'self_close' => true,
					'gzip' => $options['gzip'],
					'minify' => $options['minify'],
					'minify_with' => $options['minify_with'],
					'far_future_expires' => $options['far_future_expires'],
					'far_future_expires_php' => $options['far_future_expires_php'],
					'header' => $type,
					'unobtrusive' => $options['unobtrusive'],
					'unobtrusive_body' => $options['unobtrusive_body'],
					'parallel' => $options['parallel'],
					'parallel_hosts' => $options['parallel_hosts'],
					'external_scripts' => $options['external_scripts'],
					'external_scripts_exclude' => $options['external_scripts_exclude'],
					'dont_check_file_mtime' => $options['dont_check_file_mtime']
				),
				$this->content,
				$link_files
			);
		}
	}

	/**
	* GZIP and minify the page itself as required
	*
	**/
	function page($options, $type) {
		if (empty($this->web_optimizer_stage) && $options['clientside_cache']) {
/* setting cache headers for HTML file */
			@date_default_timezone_set(@date_default_timezone_get());
			$ExpStr = gmdate("D, d M Y H:i:s",
			time() + $this->options['page']['clientside_timeout']) . " GMT";
			header("Cache-Control: private, max-age=" . $this->options['page']['clientside_timeout']);
			header("Expires: " . $ExpStr);
		}
		if (!empty($this->web_optimizer_stage)) {
			$this->write_progress($this->web_optimizer_stage = $this->web_optimizer_stage < 88 ? 88 : $this->web_optimizer_stage);
		}
/* Minify page itself */
		if(!empty($options['minify'])) {
			$this->content = $this->trimwhitespace($this->content);
/* remove empty scripts after merging inline code */
			$this->content = preg_replace("/<script type=['\"]text\/javascript['\"]><\/script>/i", "", $this->content);
		}
/* add multiple hosts */
		if (!empty($options['parallel']) && !empty($options['parallel_hosts'])) {
			$this->content = $this->add_multiple_hosts($this->content, split(" ", $options['parallel_hosts']));
		}
/* remove BOM */
		$this->content = str_replace("﻿", "", $this->content);
/* move informers, counters and ads before </body> */
		$this->replace_informers($options);
/* strip from content flushed part */
		if (!empty($this->flushed)) {
			$this->content = substr($this->content, $options['flush_size'], strlen($this->content));
		}
/* Gzip page itself */
		if(!empty($options['gzip'])) {
			$content = $this->create_gz_compress($this->content);
			if (!empty($content)) {
				$this->set_gzip_header();
				$this->content = $content;
			}
		}
/* check if we need to store cached page */
		if (!empty($this->cache_me)) {
			$file = $options['cachedir'] . '/' . $this->uri;
			if (!is_file($file) || time() - filemtime($file) > $options['cache_timeout']) {
				$fp = @fopen($file, "w");
				if ($fp) {
					$content_to_write = $this->content;
					if (!empty($options['flush'])) {
						$content_to_write = substr($content_to_write, 0, $options['flush_size']);
					}
					@fwrite($fp, $content_to_write);
					@fclose($fp);
				}
			}
		}
	}

	/**
	* Adds multiple hosts to HTML for images
	*
	**/
	function add_multiple_hosts ($content, $hosts) {
/* limit by 4 */
		if (count($hosts) > 4) {
			$hosts = array($hosts[0], $hosts[1], $hosts[2], $hosts[3]);
		}
		$count = count($hosts);
		$replaced = array();
		preg_match_all("!<img[^>]+>!is", $content, $imgs, PREG_SET_ORDER);
		if (!empty($imgs)) {
			$https = empty($_SERVER['HTTPS']) ? '' : 's';
			foreach ($imgs as $image) {
				$old_src = preg_replace("!^['\"\s]*(.*?)['\"\s]*$!is", "$1", preg_replace("!.*src\s*=(\"[^\"]+\"|'[^']+'|\s*[\s]).*!is", "$1", $image[0]));
				$old_src_param = ($old_src_param_pos = strpos($old_src, '?')) ? substr($old_src, old_src_param_pos, strlen($old_src)) : '';
/* skip images on different hosts */
				if ((!strpos($old_src, "://") || stripos($old_src, "://" . $_SERVER['HTTP_HOST'] . "/") || stripos($old_src, "://www." . preg_replace("/^www\./", "", $_SERVER['HTTP_HOST']) . "/")) && empty($replaced[$old_src])) {
					$absolute_src = $this->convert_path_to_absolute($old_src, array('file' => $_SERVER['SCRIPT_FILENAME']));
					$new_src = "http" . $https . "://" . $hosts[strlen($old_src)%$count] . "." . preg_replace("/^www\./", "", $_SERVER['HTTP_HOST']) . $absolute_src;
					$content = str_replace($old_src, $new_src, $content);
					$replaced[$old_src] = 1;
				}
			}
		}
		return $content;
	}

	/**
	* Returns GZIP compressed content string with header
	*
	**/
	function create_gz_compress($content) {

		if(!empty($_SERVER['HTTP_ACCEPT_ENCODING']) && strstr($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') && function_exists('gzcompress')) {
				$Size = strlen( $this->content );
				$Crc = crc32( $this->content );
				$content = "\x1f\x8b\x08\x00\x00\x00\x00\x00";
				$this->content = gzcompress( $this->content,2);
				$this->content = substr( $this->content, 0, strlen( $this->content) - 4 );
				$content .= ( $this->content );
				$content .= ( pack( 'V', $Crc ) );
				$content .= ( pack( 'V', $Size ) );
				return $content;
		} else {
			return false;
		}

	}

	/**
	* Sets the correct gzip header
	*
	**/
	function set_gzip_header() {
		if (!empty($_SERVER["HTTP_ACCEPT_ENCODING"])) {
			if(strpos(" " . $_SERVER["HTTP_ACCEPT_ENCODING"], "x-gzip")) {
				$encoding = "x-gzip";
			}
			if(strpos(" " . $_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) {
				$encoding = "gzip";
			}
			if(!empty($encoding)) {
				header("Content-Encoding: " . $encoding);
			}
		}
	}

	/**
	* Completely remove any JS scripts in the remove list
	*
	**/
	function do_remove() {
		if(empty($this->remove_files)) {
			return;
		}
/* If we have scripts */
		if(is_array($this->script_array)) {
/* Pull out remove immune */
			preg_match("@<!-- REMOVE IMMUNE -->(.*?)<!-- END REMOVE IMMUNE -->@is", $this->content, $match);
			$_immune = $match[0];
			$this->content = str_replace($_immune,'@@@COMPRESSOR:TRIM:REMOVEIMMUNE@@@', $this->content);
			foreach($this->script_array AS $script) {
				foreach($this->remove_files AS $file) {
					if(!empty($file) && !empty($script)) {
						if(strstr($script,$file)) {
/* Remove the scripts from the source if they are on the remove list */
							$this->content = str_replace($script, "", $this->content);
						}
					}
				}
			}
/* Put back */
			$this->content = str_replace("@@@COMPRESSOR:TRIM:REMOVEIMMUNE@@@", $_immune, $this->content);
/* Remove comments */
			$this->content = str_replace("<!-- REMOVE IMMUNE -->", "", $this->content);
			$this->content = str_replace("<!-- END REMOVE IMMUNE -->", "", $this->content);
		}

	}

	/**
	* Compress JS or CSS and return source
	*
	**/
	function do_compress($options, $source, $files) {
/* Save the original extension */
		$options['original_ext'] = $options['ext'];
/* Change the extension */
		if (!empty($options['gzip']) || !empty($options['far_future_expires'])) {
			$options['ext'] = "php";
		}
/* Set cachedir */
		$cachedir = $options['cachedir'];
		if ($this->web_optimizer_stage) {
			$this->write_progress($this->web_optimizer_stage += 1);
		}
/* prepare JS w/o src for merging in unobtrusive way */
		if ($options['unobtrusive'] && !empty($files) && is_array($files)) {
			$postloader = array();
			$handler = 'scripts';
			$key = 0;
			foreach ($files as $script) {
				$handler_new = empty($script['file']) ? 'handler' : 'scripts';
				$postloader[$key][$handler_new][] = $script;
				$handler = $handler_new;
				if ($handler_new != $handler) {
					$key++;
				}
			}
/* go through postloader and include */
			foreach ($postloader as $script_block) {
				$source = $this->do_include($options, $source, $cachedir, empty($script_block['scripts']) ? null : $script_block['scripts'], empty($script_block['handler']) ? null : $script_block['handler']);
			}
		} else {
			$source = $this->do_include($options, $source, $cachedir, $files);
		}
		return $source;
	}

	/**
	* Include a single file or an unobtrusive bundle
	*
	**/
	function include_bundle ($source, $newfile, $handlers, $cachedir, $include) {
		switch ($include) {
/* if no unobtrusive logic and no external JS, move to top */
			default:
				$source = preg_replace("!<head[^>]*>!is", "$0" . $newfile, $source);
				break;
/* no unobtrusive but external scripts exist, avoid excluded scripts */
			case 1:
				$source = preg_replace("!<\/head>!is", $newfile . "$0", $source);
				break;
/* else use unobtrusive loader */
			case 2:
				if (stripos($source, "var yass_modules")) {
					$source = preg_replace('!(<script type="text/javascript">var yass_modules=\[\[.*?)\]\]!is', '$1],["'
						. preg_replace('/.*src="(.*?)".*/i', "$1", $newfile) . '","' . $handlers . '"]]', $source);
				} else {
					$source = preg_replace('/<\/body>/', '<script type="text/javascript">var yass_modules=[["'. preg_replace('/.*src="(.*?)".*/i', "$1", $newfile)
						. '","'. $handlers . '"]]</script><script type="text/javascript" src="'. str_replace($this->view->paths['full']['document_root'], "http://"
						. $_SERVER['HTTP_HOST'] . "/", $cachedir) .  '/yass.loader.js' . '"></script></body>', $source);
				}
				break;
/* add JavaScript calls before </body> */
			case 3:
				$source = preg_replace("!<\/body>!is", $newfile . "$0", $source);
				break;
		}
		return $source;
	}

	/**
	* Include compressed JS or CSS into source and return it
	*
	**/
	function do_include($options, $source, $cachedir, $external_array, $handler_array = null) {
		if ($this->web_optimizer_stage) {
			$this->write_progress($this->web_optimizer_stage += 1);
		}
		$handlers = '';
/* If only one script found */
		if(!is_array($external_array)) {
			$external_array = array($external_array);
		}
/* glue scripts' content / filenames */
		$scripts_string = '';
		foreach ($external_array as $script) {
			$scripts_string .= (empty($script['source']) ? '' : $script['source']) . (empty($script['content']) ? '' : $script['content']);
		}
/* Get date string to make hash */
		$datestring = $this->get_file_dates($external_array, $options);
/* get options string */
		$optstring = '';
		foreach ($options as $key => $value) {
			if (is_array($value)) {
				$optstring .= '_' . implode('_', $value);
			} else {
				$optstring .= '_' . $value;
			}
		}
/* Get the cache hash, restrict by 10 symbols */
		$cache_file = substr(md5($scripts_string . $datestring . $optstring), 0, 10);
		$cache_file = urlencode($cache_file);
/* Check if the cache file exists */
		if (file_exists($cachedir . '/' . $cache_file . ".$options[ext]")) {
/* Put in locations and remove certain scripts */
			if (!is_array($external_array)) {
				$external_array = array($external_array);
			}
			$source = $this->_remove_scripts($external_array, $source);
			$newfile = $this->get_new_file($options, $cache_file);
/* No longer use marker $source = str_replace("@@@marker@@@",$new_file,$source); */
			$source = str_replace("@@@marker@@@", "", $source);
			$source = $this->include_bundle($source, $newfile, $handlers, $cachedir, $options['unobtrusive'] ? 2 : ($options['unobtrusive_body'] ? 3 : ($options['header'] == 'javascript' && ($options['external_scripts'] || $options['external_scripts_head_end']) ? 1 : 0)));
			if ($this->web_optimizer_stage) {
				$this->write_progress($this->web_optimizer_stage += 2);
			}
			return $source;
		}
/* Include all libraries. Save ~1M if no compression */
		if ($this->php == 4) {
			foreach ($this->libraries as $klass => $library) {
/* it seems PHP4 receives on 1 parameter for class_exists */
				if (!class_exists($klass)) {
					require_once($options['installdir'] . 'libs/php/' . $library);
				}
			}
		} else {
			foreach ($this->libraries as $klass => $library) {
				if (!class_exists($klass, false)) {
					require_once($options['installdir'] . 'libs/php/' . $library);
				}
			}
		}
/* If the file didn't exist, continue. Get files' content */
		if (!empty($options['dont_check_file_mtime'])) {
			$this->get_script_content($options['tag']);
/* replace existing array with the new content */
			$external_array = array();
			foreach ($this->initial_files as $key => $file) {
				if ($file['tag'] == $options['tag']) {
					$external_array[] = $file;
				}
			}
		}
/* Create file */
		$contents = "";
		if (is_array($external_array)) {
			foreach($external_array as $key => $info) {
/* Get the code */
				if ($file_contents = $info['content']) {
/* Mess with the CSS source */
					if($options['header'] == "css") {
/* Absolute paths */
						$file_contents = $this->convert_paths_to_absolute($file_contents, $info);
					}
					$delimiter = '';
					if ($options['header'] == "javascript") {
						$delimiter = ";\n";
					}
					$contents .=  $file_contents . $delimiter;
				}
			}
			if ($options['css_sprites'] || $options['data_uris']) {
				$options['css_sprites_partly'] = 0;
				$remembered_data_uri = $options['data_uris'];
				$options['data_uris'] = 0;
/* start new PHP process to create CSS Sprites */
				if (!empty($this->web_optimizer_stage) && $this->web_optimizer_stage < 30) {
					header('Location: optimizing.php?web_optimizer_stage=30&username=' . $this->username . '&password=' . $this->password . "&auto_rewrite=" . $this->auto_rewrite);
					die();
/* prepare first 4 Sprites */
				} elseif (!empty($this->web_optimizer_stage) && $this->web_optimizer_stage < 40) {
					$options['css_sprites_partly'] = 1;
					$this->convert_css_sprites($contents, $options);
					header('Location: optimizing.php?web_optimizer_stage=40&username=' . $this->username . '&password=' . $this->password . "&auto_rewrite=" . $this->auto_rewrite);
					die();
				} elseif (!empty($this->web_optimizer_stage) && $this->web_optimizer_stage < 60) {
/* Create CSS Sprites in CSS dir */
					$this->convert_css_sprites($contents, $options);
/* start new PHP process to create data:URI */
					header('Location: optimizing.php?web_optimizer_stage=60&username=' . $this->username . '&password=' . $this->password . "&auto_rewrite=" . $this->auto_rewrite);
					die();
				} else {
/* we created all Sprites -- ready for data:URI */
					$options['data_uris'] = $remembered_data_uri;
					$minified_content = $this->convert_css_sprites($contents, $options);
				}
				if (!empty($minified_content)) {
					$contents = $minified_content;
				}
			}
			$source = $this->_remove_scripts($external_array, $source);
		}
		if(!empty($contents)) {
/* Allow for minification of javascript */
			if($options['header'] == "javascript" && $options['minify']) {
				if ($options['minify_with'] == 'packer') {
					$this->packer = new JavaScriptPacker($contents, 'Normal', false, false);
					$minified_content = $this->packer->pack();
				} elseif ($options['minify_with'] == 'yui' ) {
					$this->yuicompressor = new YuiCompressor($options['cachedir'], $options['installdir']);
					$minified_content = $this->yuicompressor->compress($contents);
				} elseif ($options['minify_with'] == 'jsmin' || empty($minified_content)) {
					$this->jsmin = new JSMin($contents);
					$minified_content = $this->jsmin->minify($contents);
				}
				if (!empty($minified_content)) {
					$contents = $minified_content;
				}
				if ($this->web_optimizer_stage) {
					$this->write_progress($this->web_optimizer_stage += 3);
				}
			}
/* Allow for minification of CSS, CSS Sprites uses CSS Tidy -- already minified CSS */
			if ($options['header'] == "css" && $options['minify'] && !$options['css_sprites']) {
/* Minify CSS */
				$contents = $this->minify_text($contents);
			}
/* Allow for gzipping and headers */
			if ($options['gzip'] || $options['far_future_expires']) {
				$contents = $this->gzip_header[$options['header']] . $contents;
			}
			if (!empty($contents)) {
/* Write to cache and display */
				if ($fp = fopen($cachedir . '/' . $cache_file . '.' . $options['ext'], 'wb')) {
					@fwrite($fp, $contents);
					@fclose($fp);
/* Set permissions, required by some hosts */
					@chmod($cachedir . '/' . $cache_file . '.' . $options['ext'], octdec("0755"));
/* create static gzipped versions for static gzip in nginx, Apache */
					if ($options['ext'] == 'css' || $options['ext'] == 'js') {
						@file_put_contents($cachedir . '/' . $cache_file . '.' . $options['ext'] . '.gz', gzencode($contents, 9, FORCE_GZIP));
					}
/* Create the link to the new file */
					$newfile = $this->get_new_file($options, $cache_file);
					$source = $this->include_bundle($source, $newfile, $handlers, $cachedir, $options['unobtrusive'] ? 2 : ($options['header'] == 'javascript' && ($options['external_scripts'] || $options['external_scripts_head_end']) ? 1 : 0));
				}
			}
			if ($this->web_optimizer_stage) {
				$this->write_progress($this->web_optimizer_stage += 2);
			}
		}
		return preg_replace("/@@@marker@@@/", "", $source);
	}

	/**
	* Replaces scripts calls or css links in the source with a marker
	*
	*/
	function _remove_scripts($external_array, $source) {
		if (is_array($external_array)) {
			$keys = array_keys($external_array);
			$maxKey = array_pop($keys);
			foreach($external_array as $key=>$value) {
/* Remove script */
				if($key == $maxKey) {
					$source = str_replace($value['source'], "@@@marker@@@", $source);
				} else {
					$source = str_replace($value['source'], "", $source);
				}
			}
		}
		return $source;
	}

	/**
	* Returns the filename for our new compressed file
	*
	**/
	function get_new_file($options, $cache_file, $not_modified=false) {
		$relative_cachedir = str_replace($this->view->prevent_trailing_slash($this->view->unify_dir_separator($this->view->paths['full']['document_root'])), "", $this->view->prevent_trailing_slash($this->view->unify_dir_separator($options['cachedir'])));
		$newfile = "<" . $options['tag'] . " type=\"" . $options['type'] . "\" $options[src]=\"/" . $this->view->prevent_leading_slash($relative_cachedir) ."/$cache_file." . $options['ext'] . "$not_modified\"";
		if (!empty($options['rel'])) {
			$newfile .= " rel=\"" . $options['rel'] . "\"";
		}
		if(!empty($options['self_close'])) {
			$newfile .= " />";
		} else {
			$newfile .= "></" . $options['tag'] . ">";
		}
		$this->compressed_files[] = $newfile;
		return $newfile;
	}

	/**
	* Returns the last modified dates of the files being compressed
	* In this way we can see if any changes have been made
	**/
	function get_file_dates($files, $options) {
/* option added by janvarev */
		if (!empty($options['dont_check_file_mtime'])) {
			return;
		}
		$dates = false;
		if (!empty($files) && is_array($files)) {
			foreach($files AS $key => $value) {
				$value['file'] = $this->get_file_name($value['file']);
				if (file_exists($value['file'])) {
					$thedate = filemtime($value['file']);
					$dates[] = $thedate;
				}
			}	
		}
		if (is_array($dates)) {
			return implode(".", $dates);
		}
		return;
	}

	/**
	* Get full pathname for the given file
	*
	**/
	function get_file_name ($file) {
		if(is_array($file) && count($file)>0) {
			$file = $file[0];
		}
		$file = $this->strip_querystring(preg_replace("/https?:\/\/(www\.)?" . preg_replace("?^www\.?", "", $_SERVER['HTTP_HOST']) . "/", "", $file));
		if (substr($file, 0, 1) == "/") {
			return $this->view->prevent_trailing_slash($this->view->paths['full']['document_root']) . $file;
		} else {
			return $this->view->paths['full']['current_directory'] . $file;
		}
	}

	/**
	* Resursively resolve all @import in CSS files and get files' content
	* The second param marks inline styles case
	*
	**/
	function resolve_css_imports ($src, $inline = false) {
		$content = false;
		$file = '';
		if (!$inline) {
			$file = $this->get_file_name($src);
/* dynamic file */
			if (preg_match("/\.(php|phtml)$/is", $file)) {
				$dynamic_file = $src;
/* touch only non-external scripts */
				if (!strpos($dynamic_file, "://")) {
					$dynamic_file = "http://" . $_SERVER['HTTP_HOST'] . $this->convert_path_to_absolute($dynamic_file, array('file' => $file), true);
				}
				$file = $this->options['css']['cachedir'] . '/' . $this->get_remote_file(preg_replace("/&amp;/", "&", $dynamic_file), 'link');
			}
			if (is_file($file)) {
				$content = @file_get_contents($file);
			}
		} else {
			$content = $src;
		}
/* remove BOM */
		$content = str_replace(array('&amp;', '﻿'), array('&', ''), $content);
		if (is_file($file) || $inline) {
/* remove commented @import. First of all glue CSS files, optimiza only secondly */
			$content = preg_replace("!/\*\s*@import.*?\*/!is", "", $content);
/* new RegExp from xandrx */
			preg_match_all('/@import\\s*(url)?\\s*\\(?([^;]+?)\\)?;/i', $content, $imports, PREG_SET_ORDER);
			if (is_array($imports)) {
				foreach ($imports as $import) {
					$src = false;
					if (isset($import[2])) {
						$src = $import[2];
						$src = trim($src, '\'" ');
					}
					if ($src) {
						$saved_directory = $this->view->paths['full']['current_directory'];
						$this->view->paths['full']['current_directory'] = preg_replace("/[^\/]+$/", "", $file);
/* start recursion */
						$content = str_replace($import[0], $this->convert_paths_to_absolute($this->resolve_css_imports($src), array('file' => str_replace($this->view->paths['full']['document_root'], "/", $this->get_file_name($src)))), $content);
/* return remembed directory */
						$this->view->paths['full']['current_directory'] = $saved_directory;
					}
				}
			}
		}
		return $content;
	}

	/**
	* Gets an array of scripts/css files to be processed
	*
	**/
	function get_script_array() {
/* get head with all content */
		$this->get_head();
		if (!empty($this->head)) {
			if (!empty($this->options['javascript']['minify'])) {
/* find all scripts from head */
				$regex = "!<script[^>]+type\\s*=\\s*(\"text/javascript\"|'text/javascript'|text/javascript)([^>]*)>(.*?</script>)!is";
				preg_match_all($regex, $this->head, $matches, PREG_SET_ORDER);
				if (!empty($matches)) {
					foreach($matches as $match) {
						$file = array();
						$file['tag'] = 'script';
						$file['part'] = 'head';
						$file['source'] = $match[0];
						$file['content'] = preg_replace("/(@@@COMPRESSOR:TRIM:HEADCOMMENT@@@|<script[^>]*>[\t\s\r\n]*|[\t\s\r\n]*<\/script>)/i", "", $match[0]);
						$file['comment'] = '';
						$file['file'] = '';
						preg_match_all("@(type|src)\s*=\s*(?:\"([^\"]+)\"|'([^']+)'|([\s]+))@i", $match[0], $variants, PREG_SET_ORDER);
						if(is_array($variants)) {
							foreach($variants AS $variant_type) {
								$variant_type[1] = strtolower($variant_type[1]);
								$variant_type[2] = !isset($variant_type[2]) ? (!isset($variant_type[3]) ? $variant_type[4] : $variant_type[3]) : $variant_type[2];
								switch ($variant_type[1]) {
									case "src":
										$file['file'] = trim($this->strip_querystring($variant_type[2]));
										$file['file_raw'] = $variant_type[2];
										break;
									default:
										$file[$variant_type[1]] = $variant_type[2];
										break;
								}
							}
						}
						$this->initial_files[] = $file;
					}
				}
			}
			if (!empty($this->options['css']['minify'])) {
/* find all CSS links from head and inine styles */
				$regex = "!(<link[^>]+rel\\s*=\\s*(\"stylesheet\"|'stylesheet'|stylesheet)([^>]*)>|<style\\s+type\\s*=\\s*(\"text/css\"|'text/css'|text/css)([^>]*)>(.*?)</style>)!is";
				preg_match_all($regex, $this->head, $matches, PREG_SET_ORDER);
				if (!empty($matches)) {
					foreach($matches as $match) {
						$file = array();
						$file['tag'] = 'link';
						$file['part'] = 'head';
						$file['source'] = $match[0];
						$file['content'] = preg_replace("/(@@@COMPRESSOR:TRIM:HEADCOMMENT@@@|<link[^>]+>|<style[^>]*>[\t\s\r\n]*|[\t\s\r\n]*<\/style>)/i", "", $match[0]);
						$file['comment'] = '';
						preg_match_all("@(type|rel|media|href)\s*=\s*(?:\"([^\"]+)\"|'([^']+)'|([\s]+))@i", $match[0], $variants, PREG_SET_ORDER);
						if(is_array($variants)) {
							foreach($variants AS $variant_type) {
								$variant_type[1] = strtolower($variant_type[1]);
								$variant_type[2] = !isset($variant_type[2]) ? (!isset($variant_type[3]) ? $variant_type[4] : $variant_type[3]) : $variant_type[2];
								switch ($variant_type[1]) {
									case "href":
										$file['file'] = trim($this->strip_querystring($variant_type[2]));
										$file['file_raw'] = $variant_type[2];
										break;
									default:
/* skip media="all|screen" to prevent Safari bug with @media all{} and @media screen{} */
										if ($variant_type[1] != 'media' || ($variant_type[1] == 'media' && !preg_match("/all|screen/i", $variant_type[2]))) {
											$file[$variant_type[1]] = $variant_type[2];
										}
										break;
								}
							}
						}
						$this->initial_files[] = $file;
					}
				}
			}
		}
/* strange thing: array is filled even if string is empty */
		$excluded_scripts = split(" ", $this->options['javascript']['external_scripts_exclude']);
/* Remove empty sources and any externally linked files */
		foreach($this->initial_files AS $key => $value) {
/* but keep JS w/o src to merge into unobtrusive loader, also exclude files from ignore_list */
			if(empty($value['file']) && !$this->options['javascript']['unobtrusive'] && ((!$this->options['javascript']['external_scripts'] && $value['tag'] == 'script') || (!$this->options['css']['external_scripts'] && $value['tag'] == 'link')) || (!empty($excluded_scripts[0]) && !empty($value['file']) && in_array(preg_replace("/.*\//", "", $value['file']), $excluded_scripts))) {
				unset($this->initial_files[$key]);
			}
		}
/* skip mining files' content if don't check MTIME */
		if (!$this->options['javascript']['dont_check_file_mtime']) {
			$this->get_script_content();
		}
	}

	/**
	* Gets an content for array of scripts/css files
	*
	**/
	function get_script_content($tag = false) {
/* to get inline values */
		$last_key = array();
/* to get inline values on empty non-inline */
		$last_key_flushed = array();
		$stored = array();
		foreach($this->initial_files as $key => $value) {
/* don't touch all files -- just only requested ones */
			if (!$tag || $value['tag'] == $tag) {
				if (!empty($value['file']) && strlen($value['file']) > 7 && strpos($value['file'], "://")) {
/* exclude files from the same host */
					if(!preg_match("!https?://(www\.)?". $_SERVER['HTTP_HOST'] . "!s", $value['file'])) {
/* don't get actual files' content if option isn't enabled */
						if ($this->options[$value['tag'] == 'script' ? 'javascript' : 'css']['external_scripts']) {
/* get an external file */
							$file = $this->get_remote_file($value['file']);
							if (!empty($file)) {
								$value['file'] = $this->initial_files[$key]['file'] = str_replace($this->view->paths['full']['document_root'], "/", $this->options['javascript']['cachedir']) . "/" . $file;
							} else {
								unset($this->initial_files[$key]);
							}
						} else {
							if (empty($value['content'])) {
								unset($this->initial_files[$key]);
							}
						}
					}
				}
				$content_from_file = '';
				if (!empty($value['file'])) {
/* convert dynamic files to static ones */
					if (preg_match("/\.(php|phtml)$/is", $value['file'])) {
						$dynamic_file = $value['file_raw'];
/* touch only non-external scripts */
						if (!strpos($dynamic_file, "://")) {
							$dynamic_file = "http://" . $_SERVER['HTTP_HOST'] . $this->convert_path_to_absolute($dynamic_file, array('file' => $value['file']), true);
						}
						$static_file = ($this->options[$value['tag'] == 'script' ? 'javascript' : 'css']['cachedir']) . '/' . $this->get_remote_file(preg_replace("/&amp;/", "&", $dynamic_file), $value['tag']);
						if (is_file($static_file)) {
							$value['file'] = str_replace($this->view->paths['full']['document_root'], "/", $static_file);
						}
					}
					if ($value['tag'] == 'link') {
/* recursively resolve @import in files */
						$content_from_file = (empty($value['media']) ? "" : "@media " . $value['media'] . "{") .
							$this->resolve_css_imports($value['file']) . (empty($value['media']) ? "" : "}");
					} else {
						$content_from_file = @file_get_contents($this->get_file_name($value['file']));
					}
				}
/* remove BOM */
				$content_from_file = str_replace('﻿', '', $content_from_file);
				$delimiter = '';
				if ($value['tag'] == 'script') {
					$delimiter = ";\n";
				}
/* don't delete any detected scritps from array -- we need to clean up HTML page from them */
				if (empty($value['file']) && (empty($last_key[$value['tag']]) || $key != $last_key[$value['tag']])) {
/* glue inline and external content */
					if (($this->options['javascript']['external_scripts'] && $value['tag'] == 'script') || ($this->options['css']['external_scripts'] && $value['tag'] == 'link')) {
/* resolve @import from inline styles */
						if ($value['tag'] == 'link') {
							$value['content'] = $this->resolve_css_imports($value['content'], true);
						}
						$text = $delimiter . (empty($value['content']) ? '' : $value['content']);
/* if we can't add to existing tag -- store for the future */
						if (empty($last_key[$value['tag']])) {
							$stored[$value['tag']] = empty($stored[$value['tag']]) ? $text : $stored[$value['tag']] . $text;
							$last_key_flushed[$value['tag']] = $key;
						} else {
							$this->initial_files[$last_key[$value['tag']]]['content'] .= $text;
						}
/* null content not to include anywhere, we still have source code in 'source' */
						$this->initial_files[$key]['content'] = '';
					}
				} elseif (!empty($content_from_file)) {
/* don't rewrite existing content inside script tags */
					$this->initial_files[$key]['content'] = (empty($value['content']) ? '' : $value['content']) . $delimiter . $content_from_file;
/* add stored content before */
					if (!empty($stored[$value['tag']])) {
						$this->initial_files[$key]['content'] = $stored[$value['tag']] . $delimiter . $this->initial_files[$key]['content'];
						$stored[$value['tag']] = '';
					}
					$last_key[$value['tag']] = $key;
				}
			}
		}
/* check for stored content and flush it */
		foreach ($stored as $tag => $stored_content) {
			$this->initial_files[$last_key_flushed[$tag]]['content'] = $stored_content;
		}
	}

	/**
	* Sets the headers to be sent in the javascript and css files
	*
	**/
	function set_gzip_headers() {
/* When will the file expire? */
		$offset = 6000000 * 60 ;
		$ExpStr = "Expires: " .
		gmdate("D, d M Y H:i:s",
		time() + $offset) . " GMT";
		$types = array("css", "javascript");

		foreach($types AS $type) {
/* Always send etag */
			$this->gzip_header[$type] = '<?php
			$hash = md5($_SERVER[\'SCRIPT_FILENAME\'])' . (empty($this->options[$type]['gzip']) ? '' : '.\'-gzip\'') . ';
			header ("Etag: \"" . $hash . "\"");
?>';
/* Send 304? */
			$this->gzip_header[$type] .= '<?php

			if (isset($_SERVER[\'HTTP_IF_NONE_MATCH\']) &&
				stripslashes($_SERVER[\'HTTP_IF_NONE_MATCH\']) == \'"\' . $hash . \'"\')	 {
				// Return visit and no modifications, so do not send anything
				header ("HTTP/1.0 304 Not Modified");
				header (\'Content-Length: 0\');
				exit();
			}

?>';
/* ob_start ("ob_gzhandler"); */
			if (!empty($this->options[$type]['gzip'])) {
				$this->gzip_header[$type] .= '<?php
				ob_start("compress_output_option");
				function compress_output_option($contents) {

					// Determine supported compression method
					if (!empty($_SERVER[\'HTTP_ACCEPT_ENCODING\'])) {
						$gzip = strstr($_SERVER[\'HTTP_ACCEPT_ENCODING\'], \'gzip\');
						$deflate = strstr($_SERVER[\'HTTP_ACCEPT_ENCODING\'], \'deflate\');
					}
					// Determine used compression method
					$encoding = !empty($gzip) ? \'gzip\' : (!empty($deflate) ? \'deflate\' : \'none\');

					// Check for buggy versions of Internet Explorer
					if (!empty($_SERVER[\'HTTP_USER_AGENT\']) && !strstr($_SERVER[\'HTTP_USER_AGENT\'], \'Opera\') &&
						preg_match(\'/^Mozilla\/4\.0 \(compatible; MSIE ([0-9]\.[0-9])/i\', $_SERVER[\'HTTP_USER_AGENT\'], $matches)) {
						$version = floatval($matches[1]);

						if ($version < 6)
							$encoding = \'none\';

						if ($version == 6 && !strstr($_SERVER[\'HTTP_USER_AGENT\'], \'SV1\'))
							$encoding = \'none\';
					}

					if (isset($encoding) && $encoding != \'none\')
					{
						// try to get gzipped content from file
						$content = @file_get_contents(__FILE__ . \'.gz\');
						if (empty($content)) {
						// Send compressed contents
							$contents = gzencode($contents, 9, $gzip ? FORCE_GZIP : FORCE_DEFLATE);
							@file_put_contents(__FILE__ . \'.gz\', $contents);
						} else {
							$contents = $content;
						}
						header ("Content-Encoding: " . $encoding);
						header (\'Content-Length: \' . strlen($contents));
					}

					return $contents;

				}
?>';
			}

			if(!empty($this->options[$type]['far_future_expires_php'])) {
				$this->gzip_header[$type] .= '<?php
				header("Cache-Control: private, max-age=315360000");
				header("' . $ExpStr . '");
?>';
			}

			$this->gzip_header[$type] .= '<?php
				header("Content-type: text/' . $type .'; charset: UTF-8");
?>';


		} // end FE
	}

	/**
	* Returns a path or url without the querystring and anchor
	*
	**/
	function strip_querystring($path) {
		if ($commapos = strpos($path, '?')) {
			$path = substr($path, 0, $commapos);
		}
		if ($numberpos = strpos($path, '#')) {
			$path = substr($path, 0, $numberpos);
		}		
		return $path;
	}

	/**
	* Strips whitespace and comments from a text string
	*
	**/
	function minify_text($txt) {
/* Compress whitespace */
		$txt = preg_replace('/\s+/', ' ', $txt);
/* Remove simple comments */
		$txt = preg_replace("/<!--\/\/-->/", "", preg_replace('/\/\*.*?\*\//', '', $txt));
/* Remove rudiments from optimization */
		$txt = preg_replace('/<script[^>]+type=[\'"]text\/javascript[\'"][^>]*>(\r?\n)*<\/script>/i', '', $txt);
		return $txt;
	}

	/**
	* Safely trims whitespace from an HTML page
	* Adapted from smarty code http://www.smarty.net/
	**/
	function trimwhitespace($source) {
/* Pull out the script, textarea and pre blocks */
		preg_match_all("!(<script.*?</script>|<textarea.*?</textarea>|<pre.*?</pre>)!is", $source, $match);
		$_script_blocks = $match[0];
		$source = preg_replace("!(<script.*?</script>|<textarea.*?</textarea>|<pre.*?</pre>)!is",
							   '@@@COMPRESSOR:TRIM:SCRIPT@@@', $source);
/* remove all leading spaces, tabs and carriage returns NOT preceeded by a php close tag */
		$source = trim(preg_replace('/((?<!\?>)\n)[\s]+/m', '\1', $source));
/* one-strig-HTML takes about 20-50ms */
		if (!empty($this->options['page']['minify_aggressive'])) {
/* replace breaks with nothing for block tags */
			$source = preg_replace("/[\s\t\r\n]*(<\/?)(!--|!DOCTYPE|address|area|audioscope|base|bgsound|blockquote|body|br|caption|center|col|colgroup|comment|dd|div|dl|dt|embed|fieldset|form|frame|frameset|h[123456]|head|hr|html|iframe|keygen|layer|legend|li|link|map|marquee|menu|meta|noembed|noframes|noscript|object|ol|optgroup|option|p|param|samp|script|select|sidebar|style|table|tbody|td|tfoot|th|title|tr|ul|var)([^>]*)>[\s\t\r\n]+/i", "$1$2$3>", $source);
/* replace breaks with space for inline tags */
			$source = preg_replace("/(<\/?)(a|abbr|acronym|b|basefont|bdo|big|blackface|blink|button|cite|code|del|dfn|dir|em|font|i|img|input|ins|isindex|kbd|label|q|s|small|span|strike|strong|sub|sup|u)([^>]*)>[\s\t\r\n]+/i", "$1$2$3> ", $source);
		}
/* replace ' />' with '/>' */
		$source = preg_replace("/\s\/>/", "/>", $source);
/* replace multiple spaces with single one 
		$source = preg_replace("/[\s\t\r\n]+/", " ", $source); */
/* replace script, textarea, pre blocks */
		$this->trimwhitespace_replace("@@@COMPRESSOR:TRIM:SCRIPT@@@", $_script_blocks, $source);
		return $source;
	}

	/**
	* Helper function for trimwhitespace
	*
	**/
	function trimwhitespace_replace($search_str, $replace, &$subject) {
		$_len = strlen($search_str);
		$_pos = 0;
		for ($_i=0, $_count=count($replace); $_i<$_count; $_i++) {
			if (($_pos=strpos($subject, $search_str, $_pos))!==false) {
				$subject = substr_replace($subject, $replace[$_i], $_pos, $_len);
			} else {
				break;
			}
		}
	}

	/**
	* Replaces one JS code in HTML with another
	* Returns string to place before </body>
	*
	**/
	function replace_unobtrusive_generic ($match_string, $stuff, $height = 0, $inline = false) {
		$return = '';
		preg_match_all($match_string, $this->content, $matches, PREG_SET_ORDER);
		if (!empty($matches)) {
			foreach ($matches as $key => $value) {
				$this->content = str_replace($value[0], '<div id="' . $stuff . '_dst_' . $key . '"></div>', $this->content);
				$return .= '<' . ($inline ? 'span' : 'div') . ' id="'.
						$stuff .'_src_' . $key . 
					'" style="display:none;' .
						($height ? 'height:' . $height . 'px' : '') .
					'">' .
						$value[0] .
					'</' . ($inline ? 'span' : 'div') . '>' .
					'<script type="text/javascript">document.getElementById("' .
						$stuff . '_dst_' . $key . '").appendChild(document.getElementById("' .
						$stuff . '_src_' . $key . '"));document.getElementById("' .
						$stuff . '_src_' . $key . '").style.display="block"</script>';
			}
		}
		return $return;
	}

	/**
	* Moves all known informers before </body>
	* Also handles counters and ads
	* Leaves placeholders for them in content
	*
	**/
	function replace_informers ($options) {
		$before_body = '';
/* Informers */
		if (!empty($options['unobtrusive_informers'])) {
/* Odnaknopka */
			$before_body .= $this->replace_unobtrusive_generic("@<script\s*src=['\"]https?://odnaknopka.ru[^>]+></script>@is", 'odnaknopka', 16);
		}
/* Counters */
		if (!empty($options['unobtrusive_counters'])) {
/* LiveInternet */
			$before_body .= $this->replace_unobtrusive_generic("@<!--LiveInternet counter-->.*?<!--/LiveInternet-->@is", 'liveinternet', 31, true);
/* Google Analytics */
			$before_body .= $this->replace_unobtrusive_generic("@<script type=\"text/javascript\">\s*\r?\n?var\s+gaJsHost.*?catch\(err\)\s*\{\}</script>@is", 'ga', 0, true);
/* SpyLog */
			$before_body .= $this->replace_unobtrusive_generic("@<!-- SpyLOG -->\r?\n<script.*?script>\r?\n<!--/ SpyLOG -->@is", 'spylog', 0, true);
		}
/* Advertisement */
		if (!empty($options['unobtrusive_ads'])) {
/* Yandex.Direct */
			$before_body .= $this->replace_unobtrusive_generic("@<script type=\"text/javascript\"><!--\r?\nyandex_partner_id.*?</script>@is", 'yadirect');
/* Google AdWords */
			$before_body .= $this->replace_unobtrusive_generic("@<script type=\"text/javascript\"><!--\n?\ngoogle_ad_client.*?pagead2.googlesyndication.com/pagead/show_ads.js\">\r?\n?</script>@is", 'gadwords');
		}
		if (!empty($before_body)) {
			$this->content = str_replace('</body>', $before_body . '</body>' , $this->content);
		}
	}

	/**
	* Gets the directory we are in
	*
	**/
	function get_current_path($trailing=false) {
		$current_dir = $this->view->paths['relative']['current_directory'];
/* Remove trailing slash */
		if($trailing) {
			if(substr($current_dir,-1,1) == "/") {
				$current_dir = substr($current_dir,0,-1);
			}
		}
		return $current_dir;
	}

	/**
	* Gets the head part of the $source
	*
	**/
	function get_head () {
		if (empty($this->head)) {
/* hack for some templates (i.e. LiveStreet) */
			$this->content = preg_replace("!</head>((\r?\n)*<script.*)<body!is", "$1</head><body", $this->content);
/* Pull out the comment blocks, so as to avoid touching conditional comments */
			if (!empty($this->options['javascript']['minify'])) {
				$this->content = str_replace(array('//]]>', '<!--//-->', '<![CDATA[', '//><!--', '//--><!]]>'), array(), $this->content);
			}
/* Remove comments ?*/
			if (!empty($this->options['page']['remove_comments'])) {
				$this->content = preg_replace("@<!--[^\]\[]*?-->@is", '', $this->content);
			}
			preg_match("!<head([^>]+)?>.*?</head>!is", $this->content, $matches);
			if (!empty($matches[0])) {
/* and now remove all comments and parse result code -- to avoid IE code mixing with other browsers */
				$this->head = preg_replace("@<!--.*?-->@is", '', $matches[0]);
			}
/* add Web Optimizer spot */
			$this->content = str_replace('<title', '<title lang="wo"', $this->content);
		}
	}

	/**
	* Converts sinlge path to the absolute one
	*
	**/

	function convert_path_to_absolute($file, $path, $leave_querystring = false) {
		$endfile = '';
		if (!empty($path['file'])) {
			$endfile = $path['file'];
		}
		if (!$leave_querystring) {
			$file = $this->strip_querystring($file);
			$endfile = $this->strip_querystring($endfile);
		}
/* Don't touch data URIs, or mhtml:, or external files */
		if (preg_match("!^(https?|data|mhtml):!is", $file) && !preg_match("!^https?://(www\.)?". $_SERVER['HTTP_HOST'] ."!is", $file)) {
			return false;
		}
		$absolute_path = $file;
/* Not absolute or external */
		if (substr($file, 0, 1) != "/" && !preg_match("!^https?://!", $file)) {
/* add relative directory. Need somehow parse current meta base... */
			if (substr($endfile, 0, 1) != "/" && !preg_match("!^https?://!", $endfile)) {
				$endfile = preg_replace("@([^\?&]+/).*@", "$1", $_SERVER['REQUEST_URI']) . $endfile;
			}
			$full_path_to_image = preg_replace("@[^/]+$@", "", $endfile);
			$absolute_path = (preg_match("!https?://!i", $full_path_to_image) ? "" : "/") . $this->view->prevent_leading_slash(str_replace($this->view->unify_dir_separator($this->view->paths['full']['document_root']), "", $this->view->unify_dir_separator($full_path_to_image . $file)));
		}
/* remove HTTP host from absolute URL */
		return preg_replace("!https?://". $_SERVER['HTTP_HOST'] ."/!i", "/", $absolute_path);
	}

	/**
	* Finds background images in the CSS and converts their paths to absolute
	*
	**/
	function convert_paths_to_absolute($content, $path) {
		preg_match_all( "/url\s*\(\s*['\"]?(.*?)['\"]?\s*\)/is", $content, $matches);
		if(count($matches[1]) > 0) {
			foreach($matches[1] as $key => $file) {
				$absolute_path = $this->convert_path_to_absolute($file, $path);
				if (!empty($absolute_path)) {
/* replace path in initial CSS */
					$content = preg_replace("!url\s*\(\s*['\"]?" . $file . "['\"]?\s*\)!", "url(" . $absolute_path . ")", $content);
				}
			}
		}
		return $content;
	}

	/**
	* Convert all background image to CSS Sprites if possible
	**/
	function convert_css_sprites ($content, $options) {
/* try to get and increase memory limit */
		$memory_limit = round(preg_replace("/M/", "000000", preg_replace("/K/", "000", @ini_get('memory_limit'))));
/* 64M must enough for any operations with images. I hope... */
		if ($memory_limit < 64000000) {
			@ini_set('memory_limit', '64M');
		}
		chdir($options['cachedir']);
		$css_sprites = new css_sprites($content, array(
			'root_dir' => $options['installdir'],
			'current_dir' => $options['cachedir'],
			'website_root' => $this->view->paths['full']['document_root'],
			'truecolor_in_jpeg' => $options['truecolor_in_jpeg'],
			'aggressive' => $options['aggressive'],
			'no_ie6' => $options['no_ie6'],
			'ignore_list' => $options['css_sprites_exclude'],
			'partly' => $options['css_sprites_partly'],
			'extra_space' => $options['css_sprites_extra_space'],
			'data_uris' => $options['data_uris'],
			'image_optimization' => $options['image_optimization'],
			'memory_limited' => $options['memory_limited'] && !(round(preg_replace("/M/", "000000", preg_replace("/K/", "000", @ini_get('memory_limit')))) < 64000000 ? 0 : 1),
			'dimensions_limited' => $options['dimensions_limited'],
			'no_css_sprites' => !$options['css_sprites'],
			'multiple_hosts' => empty($options['parallel']) ? array() : split(" ", $options['parallel_hosts'])
		));
		return $css_sprites->process();
	}

	/**
	 * Gets file extension
	 *
	**/
	function get_file_extension($file) {
		$f = explode('.', $file);
		return array_pop($f);
	}

	/**
	 * Gets mime from extension
	 *
	 **/
	function get_mimetype($value='') {
		$ct['htm'] = 'text/html';
		$ct['html'] = 'text/html';
		$ct['txt'] = 'text/plain';
		$ct['asc'] = 'text/plain';
		$ct['bmp'] = 'image/bmp';
		$ct['gif'] = 'image/gif';
		$ct['jpeg'] = 'image/jpeg';
		$ct['jpg'] = 'image/jpeg';
		$ct['jpe'] = 'image/jpeg';
		$ct['png'] = 'image/png';
		$ct['ico'] = 'image/vnd.microsoft.icon';
		$ct['mpeg'] = 'video/mpeg';
		$ct['mpg'] = 'video/mpeg';
		$ct['mpe'] = 'video/mpeg';
		$ct['qt'] = 'video/quicktime';
		$ct['mov'] = 'video/quicktime';
		$ct['avi']  = 'video/x-msvideo';
		$ct['wmv'] = 'video/x-ms-wmv';
		$ct['mp2'] = 'audio/mpeg';
		$ct['mp3'] = 'audio/mpeg';
		$ct['rm'] = 'audio/x-pn-realaudio';
		$ct['ram'] = 'audio/x-pn-realaudio';
		$ct['rpm'] = 'audio/x-pn-realaudio-plugin';
		$ct['ra'] = 'audio/x-realaudio';
		$ct['wav'] = 'audio/x-wav';
		$ct['css'] = 'text/css';
		$ct['zip'] = 'application/zip';
		$ct['pdf'] = 'application/pdf';
		$ct['doc'] = 'application/msword';
		$ct['bin'] = 'application/octet-stream';
		$ct['exe'] = 'application/octet-stream';
		$ct['class']= 'application/octet-stream';
		$ct['dll'] = 'application/octet-stream';
		$ct['xls'] = 'application/vnd.ms-excel';
		$ct['ppt'] = 'application/vnd.ms-powerpoint';
		$ct['wbxml']= 'application/vnd.wap.wbxml';
		$ct['wmlc'] = 'application/vnd.wap.wmlc';
		$ct['wmlsc']= 'application/vnd.wap.wmlscriptc';
		$ct['dvi'] = 'application/x-dvi';
		$ct['spl'] = 'application/x-futuresplash';
		$ct['gtar'] = 'application/x-gtar';
		$ct['gzip'] = 'application/x-gzip';
		$ct['js'] = 'application/x-javascript';
		$ct['swf'] = 'application/x-shockwave-flash';
		$ct['tar'] = 'application/x-tar';
		$ct['xhtml']= 'application/xhtml+xml';
		$ct['au'] = 'audio/basic';
		$ct['snd'] = 'audio/basic';
		$ct['midi'] = 'audio/midi';
		$ct['mid'] = 'audio/midi';
		$ct['m3u'] = 'audio/x-mpegurl';
		$ct['tiff'] = 'image/tiff';
		$ct['tif'] = 'image/tiff';
		$ct['rtf'] = 'text/rtf';
		$ct['wml'] = 'text/vnd.wap.wml';
		$ct['wmls'] = 'text/vnd.wap.wmlscript';
		$ct['xsl'] = 'text/xml';
		$ct['xml'] = 'text/xml';
		$extension = $this->get_file_extension($value);
		if (!$type = $ct[strtolower($extension)]) {
			$type = 'text/html';
		}
		return $type;
	}

	/**
	 * Converts REQUEST_URI to cached file name
	 *
	 **/
	function convert_request_uri ($uri = false) {
		$uri = $uri ? $uri : $_SERVER['REQUEST_URI'];
/* replace / with - */
		$uri = preg_replace("!/!", "+", $uri);
/* replace ?, & with + */
		$uri = preg_replace("!\?|&!", "+", $uri);
		return $uri;
	}

	/**
	 * Downloads remote files to include
	 *
	 **/
	function get_remote_file ($file, $tag = "link") {
		$current_directory = @getcwd();
		if (function_exists('curl_init')) {	
			if ($tag == 'link') {
				chdir($this->options['css']['cachedir']);
			} else {
				chdir($this->options['javascript']['cachedir']);
			}
			$return_filename = 'wo' . md5($file);
/* prevent download more than 1 time a day */
			if (is_file($return_filename)) {
				if (filemtime($return_filename) + 86400 > time()) {
					chdir($current_directory);
					return $return_filename;
				}
			}
/* try to download remote file */
			$ch = @curl_init($file);
			$fp = @fopen($return_filename, "w");
			if ($fp && $ch) {
				@curl_setopt($ch, CURLOPT_FILE, $fp);
				@curl_setopt($ch, CURLOPT_HEADER, 0);
				@curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Web Optimizer; Speed Up Your Website; http://web-optimizer.us/) Firefox 3.0.7");
				@curl_exec($ch);
				@curl_close($ch);
				@fclose($fp);
/* try to replace background images to local ones */
				$contents = @file_get_contents($return_filename);
				if ($contents) {
					$fp = @fopen($return_filename, "w");
					if ($fp) {
/* replace only in CSS files */
						if ($tag == 'link') {
/* correct background-images */
							$contents = $this->convert_paths_to_absolute($contents, array('file' => $file));
						}
						@fwrite($fp, $contents);
						@fclose($fp);
					}
				}
				chdir($current_directory);
				return $return_filename;
			}
		}
		chdir($current_directory);
		return false;
	}

} // end class

?>