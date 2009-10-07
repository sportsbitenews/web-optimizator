<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Gzips and minifies the JavaScript and CSS within the head tags of a page.
 * Can also gzip and minify the page itself
 * Initially based on PHP Speedy, Leon Chevalier (http://www.aciddrop.com)
 /* version 1.0 = Festinus Optimus
 **/
class web_optimizer {

	/**
	* Constructor
	* Sets the options and defines the gzip headers
	**/
	function web_optimizer ($options = false) {
/* initialize chained optimization */
		$this->web_optimizer_stage = round(empty($_GET['web_optimizer_stage']) || !strpos(@getenv('SCRIPT_NAME'), "ptimizing.php") ? 0 : $_GET['web_optimizer_stage']);
		$this->username = htmlspecialchars(empty($_GET['username']) ? '' : $_GET['username']);
		$this->password = htmlspecialchars(empty($_GET['password']) ? '' : $_GET['password']);
		$this->auto_rewrite = round(empty($_GET['auto_rewrite']) ? '' : $_GET['auto_rewrite']);
/* allow merging of other classes with this one */
		foreach ($options as $key => $value) {
			$this->$key = $value;
		}
/* disable any actions if not active */
		if (empty($this->options['active'])) {
			return;
		}
/* define head of the webpage for scripts / styles */
		$this->head = '';
/* remember current time */
		$this->time = $_SERVER['REQUEST_TIME'];
/* define PHP version */
		$this->php = $this->options['php'];
/* skip buffering (need for integration as plugin) */
		$this->buffered = $this->options['buffered'];
/* number of external files calls to process */
		$this->initial_files = array();
/* Set options */
		$this->set_options();
/* Sets User Agent to differ IE from not-IE */
		$this->ua = $_SERVER['HTTP_USER_AGENT'];
		$this->set_user_agent();
/* Remember current page encoding */
		$this->encoding = '';
/* Define the gzip headers */
		$this->set_gzip_headers();
/* HTTPS or not ? */
		$this->https = empty($_SERVER['HTTPS']) ? '' : 's';
/* Deal with flushed content or not? */
		$this->flushed = false;
/* HTML cache ? */
		$excluded_html_pages = preg_replace("/ /", "|", preg_replace("/([!\^\$\|\(\)\[\]\{\}])/", "\\\\$1", $this->options['page']['cache_ignore']));
		$included_user_agents = preg_replace("/ /", "|", preg_replace("/([!\^\$\|\(\)\[\]\{\}])/", "\\\\$1", $this->options['page']['allowed_user_agents']));
/* cache if
  - option is enabled,
  - don't parse excluded pages
  - or parse included USER AGENTS,
  - flush or gzip for HTML are disabled,
  - page is requested by GET,
  - no chained optimization.
*/
		$this->cache_me = !empty($this->options['page']['cache']) && (empty($this->options['page']['cache_ignore']) || !preg_match("!" . $excluded_html_pages . "!is", $_SERVER['REQUEST_URI']) || preg_match("!" . $included_user_agents . "!is", $this->ua)) && (empty($this->options['page']['gzip']) || empty($this->options['page']['flush'])) && !headers_sent() && (getenv('REQUEST_METHOD') == 'GET') && empty($this->web_optimizer_stage);
/* check if we can get out cached page */
		if (!empty($this->cache_me)) {
			$this->uri = $this->convert_request_uri();
			$file = $this->options['page']['cachedir'] . '/' . $this->uri . (empty($this->encoding_ext) ? '' : '.' . $this->encoding_ext);
			if (file_exists($file)) {
				$timestamp = @filemtime($file);
			} else {
				$timestamp = 0;
			}
			if ($timestamp && $this->time - $timestamp < $this->options['page']['cache_timeout']) {
				$content = @file_get_contents($file);
				$hash = md5($content) . (empty($this->encoding) ? '' : '-' . str_replace("x-", "", $this->encoding));
/* check for return visits */
				if ((isset($_SERVER['HTTP_IF_NONE_MATCH']) &&
					stripslashes($_SERVER['HTTP_IF_NONE_MATCH']) == '"' . $hash . '"') ||
					(isset($_SERVER['HTTP_IF_MATCH']) &&
					stripslashes($_SERVER['HTTP_IF_MATCH']) == '"' . $hash . '"')) {
/* return visit and no modifications, so do not send anything */
					header ("HTTP/1.0 304 Not Modified");
					header ("Content-Length: 0");
					exit();
				}
/* set ETag, thx to merzmarkus */
				header("ETag: \"" . $hash . "\"");
				if (empty($this->options['page']['flush'])) {
/* check if cached content is gzipped */
					if (!empty($this->options['page']['gzip'])) {
						$this->set_gzip_header();
					}
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
/* activate application */
		$this->options['active'] = 1;
		if ($this->buffered) {
/* Start things off */
			$this->start();
		}
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
	function set_options () {
/* Set paths with new options */
		$this->options['document_root'] = empty($this->options['document_root']) ? '' : $this->options['document_root'];
		$this->view->set_paths($this->options['document_root']);
/* Set local root if chained optimization */
		if (!empty($this->web_optimizer_stage)) {
			$this->view->paths['full']['current_directory'] = $this->view->paths['full']['document_root'];
			$this->view->paths['relative']['current_directory'] = $this->view->paths['relative']['document_root'];
			$_SERVER['REQUEST_URI'] = '/';
		}
		$this->premium = $this->view->validate_license($this->options['license']);
/* Read in options */
		$full_options = array(
			"javascript" => array(
				"cachedir" => $this->options['javascript_cachedir'],
				"installdir" => $this->options['webo_cachedir'],
				"host" => $this->options['host'],
				"gzip" => $this->options['gzip']['javascript'] && ((!$this->options['htaccess']['mod_gzip'] && !$this->options['htaccess']['mod_deflate'] && (!$this->options['htaccess']['mod_rewrite'] || !$this->options['htaccess']['mod_mime'] || !$this->options['htaccess']['mod_expires'])) || !$this->options['htaccess']['enabled']),
				"gzip_level" => $this->premium ? round($this->options['gzip']['javascript_level']) : 1,
				"minify" => $this->options['minify']['javascript'],
				"minify_with" => $this->options['minify']['with_jsmin'] ? 'jsmin' : ($this->options['minify']['with_yui'] ? 'yui' : ($this->options['minify']['with_packer'] ? 'packer' : '')),
				"far_future_expires" => $this->options['far_future_expires']['javascript'] && !$this->options['htaccess']['mod_expires'],
				"far_future_expires_php" => $this->options['far_future_expires']['javascript'],
				"far_future_expires_rewrite" => $this->options['htaccess']['mod_rewrite'] && $this->options['htaccess']['enabled'] && $this->premium,
				"unobtrusive" => $this->options['unobtrusive']['on'] && $this->premium,
				"unobtrusive_body" => $this->options['unobtrusive']['body'] && $this->premium,
				"external_scripts" => $this->options['external_scripts']['on'],
				"external_scripts_head_end" => $this->options['external_scripts']['head_end'],
				"external_scripts_exclude" => $this->options['external_scripts']['ignore_list'],
				"dont_check_file_mtime" => $this->options['performance']['mtime'] && $this->premium 
			),
			"css" => array(
				"cachedir" => $this->options['css_cachedir'],
				"installdir" => $this->options['webo_cachedir'],
				"host" => $this->options['host'],
				"gzip" => $this->options['gzip']['css'] && ((!$this->options['htaccess']['mod_gzip'] && !$this->options['htaccess']['mod_deflate'] && (!$this->options['htaccess']['mod_rewrite'] || !$this->options['htaccess']['mod_mime'] || !$this->options['htaccess']['mod_expires'])) || !$this->options['htaccess']['enabled']),
				"gzip_level" => $this->premium ? round($this->options['gzip']['css_level']) : 1,
				"minify" => $this->options['minify']['css'],
				"minify_with" => $this->options['minify']['with_yui'] ? 'yui' : 'tidy',
				"far_future_expires" => $this->options['far_future_expires']['css'] && !$this->options['htaccess']['mod_expires'],
				"far_future_expires_php" => $this->options['far_future_expires']['css'],
				"far_future_expires_rewrite" => $this->options['htaccess']['mod_rewrite'] && $this->options['htaccess']['enabled'] && $this->premium,
				"data_uris" => $this->options['data_uris']['on'] && $this->premium,
				"data_uris_mhtml" => $this->options['data_uris']['mhtml'],
				"data_uris_separate" => $this->options['data_uris']['separate'],
				"data_uris_size" => round($this->options['data_uris']['size']),
				"data_uris_exclude" => round($this->options['data_uris']['ignore_list']),
				"image_optimization" => $this->options['data_uris']['smushit'],
				"css_sprites" => $this->options['css_sprites']['enabled'] && $this->premium,
				"css_sprites_expires" => !($this->options['htaccess']['mod_rewrite'] || $this->options['htaccess']['mod_expires']) || !$this->options['htaccess']['enabled'], 
				"css_sprites_expires_rewrite" => $this->options['htaccess']['mod_rewrite'] && $this->options['htaccess']['enabled'] && !$this->options['htaccess']['mod_expires'],
				"css_sprites_exclude" => $this->options['css_sprites']['ignore_list'],
				"truecolor_in_jpeg" => $this->options['css_sprites']['truecolor_in_jpeg'],
				"aggressive" => $this->options['css_sprites']['aggressive'],
				"no_ie6" => $this->options['css_sprites']['no_ie6'],
				"memory_limited" => $this->options['css_sprites']['memory_limited'],
				"dimensions_limited" => round($this->options['css_sprites']['dimensions_limited']),
				"css_sprites_extra_space" => $this->options['css_sprites']['extra_space'],
				"unobtrusive" => false,
				"unobtrusive_body" => false,
				"parallel" => $this->options['parallel']['enabled'] && $this->premium,
				"parallel_hosts" => $this->options['parallel']['allowed_list'],
				"external_scripts" => $this->options['external_scripts']['css'],
				"external_scripts_exclude" => $this->options['external_scripts']['ignore_list'],
				"dont_check_file_mtime" => $this->options['performance']['mtime'] && $this->premium
			),
			"page" => array(
				"cachedir" => $this->options['html_cachedir'],
				"host" => $this->options['host'],
				"gzip" => $this->options['gzip']['page'] && ((!$this->options['htaccess']['mod_gzip'] && !$this->options['htaccess']['mod_deflate']) || !$this->options['htaccess']['enabled']),
				"gzip_level" => round($this->options['gzip']['page_level']),
				"gzip_cookie" => $this->options['gzip']['cookie'] && $this->premium,
				"minify" => $this->options['minify']['page'],
				"minify_aggressive" => $this->options['minify']['html_one_string'] && $this->premium,
				"remove_comments" => $this->options['minify']['html_comments'] && $this->premium,
				"dont_check_file_mtime" => $this->premium ? $this->options['performance']['mtime'] : 1,
				"far_future_expires_images" => $this->options['far_future_expires']['images'],
				"far_future_expires_video" => $this->options['far_future_expires']['video'],
				"far_future_expires_static" => $this->options['far_future_expires']['static'],
				"far_future_expires" => !($this->options['htaccess']['mod_rewrite'] || $this->options['htaccess']['mod_expires']) || !$this->options['htaccess']['enabled'],
				"far_future_expires_rewrite" => $this->options['htaccess']['mod_rewrite'] && $this->options['htaccess']['enabled'] && !$this->options['htaccess']['mod_expires'],
				"clientside_cache" => $this->options['far_future_expires']['html'],
				"clientside_timeout" => $this->options['far_future_expires']['html_timeout'],
				"cache" => $this->options['html_cache']['enabled'] && $this->premium,
				"cache_timeout" => $this->options['html_cache']['timeout'],
				"flush" => $this->options['html_cache']['flush_only'],
				"flush_size" => $this->options['html_cache']['flush_size'],
				"cache_ignore" => $this->options['html_cache']['ignore_list'],
				"allowed_user_agents" => $this->options['html_cache']['allowed_list'],
				"parallel" => $this->options['parallel']['enabled'] && $this->premium,
				"parallel_hosts" => $this->options['parallel']['allowed_list'],
				"parallel_satellites" => $this->options['parallel']['additional'],
				"parallel_satellites_hosts" => $this->options['parallel']['additional_list'],
				"unobtrusive_informers" => $this->options['unobtrusive']['informers'] && $this->premium,
				"unobtrusive_counters" => $this->options['unobtrusive']['counters'] && $this->premium,
				"unobtrusive_ads" => $this->options['unobtrusive']['ads'] && $this->premium,
				"footer" => $this->options['footer']['image'],
				"footer_link" => $this->options['footer']['text'],
				"htaccess_username" => $this->options['htaccess']['user'],
				"htaccess_password" => $this->options['htaccess']['pass']
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
	function start () {
		ob_start();
	}

	/**
	* Compress passes content directly
	*
	**/
	function compress ($content) {
		$this->finish($content);
	}

	/**
	* Do work and return output buffer
	*
	**/
	function finish ($content = false) {
/* disable any actions if not active */
		if (empty($this->options['active'])) {
			return;
		}
		if (!$content) {
			$this->content = ob_get_clean();
		} else {
			$this->content = $content;
		}
		if (function_exists('get_headers')) {
			$headers = headers_list();
/* define if Content-Type is text/xml and skip it */
			foreach ($headers as $header) {
				if (strpos($header, 'text/xml')) {
					$xml = 1;
				}
			}
		}
/* skip RSS, SMF xml format */
		if (!strpos($this->content, "<rss version=") && empty($xml) && !strpos($this->content, "<smf>")) {
			if (!empty($this->web_optimizer_stage)) {
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
/* Return content to requestor */
		if ($content) {
			return $this->content;
/* or echo content to the browser */
		} else {
			echo $this->content;
/* browsers crash if there is anything after deflate stream */
			if (in_array($this->encoding, array('deflate', 'x-deflate'))) {
				die();
/* otherwise IE7 crashes if gzip is used */
			} elseif ($this->ua_mod == '.ie7') {
				die();
			}
		}
	}

	/**
	* GZIP and minify the javascript as required
	*
	**/
	function javascript ($options,$type) {
/* prepare list of files to process */
		$script_files = array();
		foreach ($this->initial_files as $file) {
			if (!empty($file['tag']) && $file['tag'] == 'script') {
				$script_files[] = $file;
			}
		}
		if (!empty($options['minify']) && (!empty($script_files) || empty($this->premium))) {
			$this->content = $this->do_compress(
				array(
					'cachedir' => $options['cachedir'],
					'installdir' => $options['installdir'],
					'host' => $options['host'],
					'tag' => 'script',
					'type' => 'text/javascript',
					'ext' => 'js',
					'src' => 'src',
					'self_close' => false,
					'gzip' => $options['gzip'],
					'gzip_level' => $options['gzip_level'],
					'minify' => $options['minify'],
					'minify_with' => $options['minify_with'],
					'far_future_expires' => $options['far_future_expires'],
					'far_future_expires_php' => $options['far_future_expires_php'],
					'far_future_expires_rewrite' => $options['far_future_expires_rewrite'],
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
	function css ($options, $type) {
/* prepare list of files to process */
		$link_files = array();
		foreach ($this->initial_files as $file) {
			if (!empty($file['tag']) && $file['tag'] == 'link') {
				$link_files[] = $file;
			}
		}
		if (!empty($options['minify']) && (!empty($link_files) || empty($this->premium))) {
/* Compress separately for each media type*/
			$this->content = $this->do_compress(
				array(
					'cachedir' => $options['cachedir'],
					'installdir' => $options['installdir'],
					'host' => $options['host'],
					'tag' => 'link',
					'type' => 'text/css',
					'ext' => 'css',
					'src' => 'href',
					'rel' => 'stylesheet',
					'data_uris' => $options['data_uris'],
					'data_uris_mhtml' => $options['data_uris_mhtml'],
					'data_uris_separate' => $options['data_uris_separate'],
					'data_uris_size' => $options['data_uris_size'],
					'data_uris_exclude' => $options['data_uris_exclude'],
					'image_optimization' => $options['image_optimization'],
					'css_sprites' => $options['css_sprites'],
					'css_sprites_exclude' => $options['css_sprites_exclude'],
					'truecolor_in_jpeg' => $options['truecolor_in_jpeg'],
					'aggressive' => $options['aggressive'],
					'no_ie6' => $options['no_ie6'],
					'memory_limited' => $options['memory_limited'],
					'dimensions_limited' => $options['dimensions_limited'],
					'css_sprites_extra_space' => $options['css_sprites_extra_space'],
					'css_sprites_expires' => $options['css_sprites_expires'],
					'css_sprites_expires_rewrite' => $options['css_sprites_expires_rewrite'],
					'self_close' => true,
					'gzip' => $options['gzip'],
					'gzip_level' => $options['gzip_level'],
					'minify' => $options['minify'],
					'minify_with' => $options['minify_with'],
					'far_future_expires' => $options['far_future_expires'],
					'far_future_expires_php' => $options['far_future_expires_php'],
					'far_future_expires_rewrite' => $options['far_future_expires_rewrite'],
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
	function page ($options, $type) {
		if (empty($this->web_optimizer_stage) && $options['clientside_cache']) {
/* setting cache headers for HTML file */
			@date_default_timezone_set(@date_default_timezone_get());
			$ExpStr = gmdate("D, d M Y H:i:s",
			$this->time + $this->options['page']['clientside_timeout']) . " GMT";
			header("Cache-Control: private, max-age=" . $this->options['page']['clientside_timeout']);
			header("Expires: " . $ExpStr);
		}
		if (!empty($this->web_optimizer_stage)) {
			$this->write_progress($this->web_optimizer_stage = $this->web_optimizer_stage < 88 ? 88 : $this->web_optimizer_stage);
		}
/* Minify page itself or parse multiple hosts */
		if(!empty($options['minify']) || (!empty($options['parallel']) && !empty($options['parallel_hosts']))) {
			$this->content = $this->trimwhitespace($this->content);
/* remove empty scripts after merging inline code */
			$this->content = preg_replace("/<script type=['\"]text\/javascript['\"]><\/script>/i", "", $this->content);
		}
/* remove BOM */
		$this->content = str_replace("﻿", "", $this->content);
/* move informers, counters and ads before </body> */
		$this->replace_informers($options);
/* strip from content flushed part */
		if (!empty($this->flushed)) {
			$this->content = substr($this->content, $options['flush_size']);
		}
/* Add script to check gzip possibility */
		if (!empty($options['gzip_cookie']) && empty($_COOKIE['_wo_gzip_checked']) && empty($_SERVER['HTTP_ACCEPT_ENCODING'])) {
			$this->content = preg_replace('!(</body>)!is', '<script type="text/javascript" src="' . str_replace($this->view->paths['full']['document_root'], "/", $options['cachedir']) . '/wo.cookie.php"></script>' . "$1", $this->content);
		}
/* Gzip page itself */
		if(!empty($options['gzip']) && !empty($this->encoding)) {
			$content = $this->create_gz_compress($this->content, in_array($this->encoding, array('gzip', 'x-gzip')));
			if (!empty($content)) {
				$this->set_gzip_header();
				$this->content = $content;
			}
		}
/* check if we need to store cached page */
		if (!empty($this->cache_me)) {
			$file = $options['cachedir'] . '/' . $this->uri . (empty($this->encoding_ext) ? '' : '.' . $this->encoding_ext);
			if (file_exists($file)) {
				$timestamp = @filemtime($file);
			} else {
				$timestamp = 0;
			}
/* set ETag, thx to merzmarkus */
			header("ETag: \"" . md5($this->content) . (empty($this->encoding) ? '' : '-' . str_replace("x-", "", $this->encoding)) . "\"");
			if (empty($timestamp) || $this->time - $timestamp > $options['cache_timeout']) {
				$fp = @fopen($file, "a");
				if ($fp) {
/* block file from writing */
					@flock($fp, LOCK_EX);
/* erase content and move to the beginning */
					@ftruncate($fp, 0);
					@fseek($fp, 0);
					$content_to_write = $this->content;
/* can't write a part of gzipped file */
					if (!empty($options['flush']) && empty($this->encoding)) {
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
	function add_multiple_hosts ($content, $hosts, $satellites, $satellites_hosts) {
/* limit by 4 */
		if (count($hosts) > 4) {
			$hosts = array($hosts[0], $hosts[1], $hosts[2], $hosts[3]);
		}
		if (count($satellites_hosts) > 4) {
			$satellites_hosts = array($satellites_hosts[0], $satellites_hosts[1], $satellites_hosts[2], $satellites_hosts[3]);
		}
		$count = count($hosts);
		$count_satellites = count($satellites_hosts);
		$replaced = array();
		preg_match_all("!<img[^>]+>!is", $content, $imgs, PREG_SET_ORDER);
/* calculate relative path to cache directory if we require it */
		if (!empty($this->options['page']['far_future_expires']) || !empty($this->options['page']['far_future_expires_rewrite'])) {
			$cache_directory = str_replace($this->view->paths['full']['document_root'], "/", $this->options['page']['cachedir']);
		}
		if (!empty($imgs)) {
			foreach ($imgs as $image) {
				$old_src = preg_replace("!^['\"\s]*(.*?)['\"\s]*$!is", "$1", preg_replace("!.*src\s*=(\"[^\"]+\"|'[^']+'|\s*[\s]).*!is", "$1", $image[0]));
				$old_src_param = ($old_src_param_pos = strpos($old_src, '?')) ? substr($old_src, $old_src_param_pos) : '';
				if (empty($replaced[$old_src])) {
/* are we operating with multiple hosts */
					if (!empty($this->options['page']['parallel']) && !empty($this->options['page']['parallel_hosts'])) {
/* skip images on different hosts */
						if ((!strpos($old_src, "://") || preg_match("!://(www\.)?" . preg_replace("/^www\./", "", $_SERVER['HTTP_HOST']) . "/!i", $old_src))) {
							$absolute_src = $this->convert_path_to_absolute($old_src, array('file' => $_SERVER['SCRIPT_FILENAME']));
							$new_src = "http" .
								$this->https .
								"://" .
								$hosts[strlen($old_src)%$count] .
								"." .
								preg_replace("/^www\./", "", $_SERVER['HTTP_HOST']) .
								$absolute_src .
								$old_src_param;
							$content = str_replace($old_src, $new_src, $content);
						} elseif ($count_satellites && !empty($satellites_hosts[0]) && empty($replaced[$old_src])) {
							$img_host = preg_replace("@(https?:)?//(www\.)?([^/]+)/.*@", "$3", $old_src);
/* check if we can distribute this image through satellites' hosts */
							if (in_array($img_host, $satellites)) {
								$new_src = preg_replace("@(https?://)(www\.)?([^/]+)/@", "$1" . $hosts[strlen($old_src)%$count] . ".$3/", $old_src);
								$content = str_replace($old_src, $new_src, $content);
							}
						}
/* or replacing images with rewrite to Expires setter? */
					}
					if (!empty($this->options['page']['far_future_expires']) || !empty($this->options['page']['far_future_expires_rewrite'])) {
						$src = $this->convert_path_to_absolute($old_src, array('file' => $_SERVER['SCRIPT_FILENAME']));
						if (!empty($this->options['page']['far_future_expires'])) {
/* do not touch dynamic images -- how we can handle them? */
							if (preg_match("@\.(bmp|gif|png|ico|jpe?g)$@is", $src)) {
								$new_src = $cache_directory . '/wo.static.php?' . $src;
							}
						} else {
							$new_src = preg_replace("@\.(bmp|gif|png|ico|jpe?g)$@is", ".$1.", $src);
						}
						if (!empty($new_src)) {
							$content = str_replace($old_src, $new_src, $content);
						}
					}
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
	function create_gz_compress ($content, $force_gzip = true) {
		if (!empty($this->encoding)) {
			if (!empty($force_gzip) && function_exists('gzcompress')) {
				$size = strlen($content);
				$crc = crc32($content);
				$cnt = "\x1f\x8b\x08\x00\x00\x00\x00\x00";
				$content = gzcompress($content, $this->options['page']['gzip_level']);
				$content = substr($content, 0, -4);
				$cnt .= $content;
				$cnt .= pack('V', $crc);
				$cnt .= pack('V', $size);
			} elseif (empty($force_gzip) && function_exists('gzdeflate')) {
				$cnt = gzdeflate($content, $this->options['page']['gzip_level']);
			}
			return $cnt;
		} else {
			return false;
		}
	}

	/**
	* Sets current encoding for HTML document
	*
	**/
	function set_gzip_encoding () {
		if (!empty($_SERVER["HTTP_ACCEPT_ENCODING"]) && !empty($this->options['page']['gzip'])) {
			$ae = $_SERVER["HTTP_ACCEPT_ENCODING"];
			if (strpos(" " . $ae, "x-gzip")) {
				$this->encoding = "x-gzip";
				$this->encoding_ext = 'gz';
			} elseif (strpos(" " . $ae, "gzip") || !empty($_COOKIE['_wo_gzip'])) {
				$this->encoding = "gzip";
				$this->encoding_ext = 'gz';
			} elseif (strpos(" " . $ae, "deflate")) {
				$this->encoding = "x-deflate";
				$this->encoding_ext = 'df';
			} elseif (strpos(" " . $ae, "deflate")) {
				$this->encoding = "deflate";
				$this->encoding_ext = 'df';
			}
		}
		$this->encoding_ext = $this->ua_mod . $this->encoding_ext;
	}
	
	/**
	* Sets the correct gzip header
	*
	**/
	function set_gzip_header () {
		if(!empty($this->encoding)) {
			header("Content-Encoding: " . $this->encoding);
		}
	}

	/**
	* Compress JS or CSS and return source
	*
	**/
	function do_compress ($options, $source, $files) {
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
				$source = preg_replace("!<head(\s+[^>]+)?>!is", "$0" . $newfile, $source);
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
						. '","'. $handlers . '"]]</script><script type="text/javascript" src="'. str_replace($this->view->paths['full']['document_root'], "/", $cachedir) .  '/yass.loader.js' . '"></script></body>', $source);
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
	function do_include ($options, $source, $cachedir, $external_array, $handler_array = null) {
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
		$cache_file = urlencode($cache_file . $this->ua_mod);
		$physical_file = $cachedir . '/' . $cache_file . "." . $options['ext'];
		$external_file = 'http' . $this->https . '://' . $_SERVER['HTTP_HOST'] . str_replace($this->view->paths['full']['document_root'], "/", $physical_file);
		if (file_exists($physical_file)) {
			$timestamp = @filemtime($physical_file);
		} else {
			$timestamp = 0;
		}
/* Check if the cache file exists */
		if ($timestamp) {
/* Put in locations and remove certain scripts */
			if (!is_array($external_array)) {
				$external_array = array($external_array);
			}
			$source = $this->_remove_scripts($external_array, $source);
/* Create the link to the new file with data:URI / mhtml */
			if (!empty($options['data_uris_separate'])) {
				$newfile = $this->get_new_file($options, $cache_file, $this->time, '.css');
				$source = $this->include_bundle($source, $newfile, $handlers, $cachedir, 0);
			}
			$newfile = $this->get_new_file($options, $cache_file, $timestamp);
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
					$delimiter = $options['header'] == "javascript" ? ";\n" : "";
					$contents .= $file_contents . $delimiter;
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
					$this->convert_css_sprites($contents, $options, $external_file);
					header('Location: optimizing.php?web_optimizer_stage=40&username=' . $this->username . '&password=' . $this->password . "&auto_rewrite=" . $this->auto_rewrite);
					die();
				} elseif (!empty($this->web_optimizer_stage) && $this->web_optimizer_stage < 60) {
/* Create CSS Sprites in CSS dir */
					$this->convert_css_sprites($contents, $options, $external_file);
/* start new PHP process to create data:URI */
					header('Location: optimizing.php?web_optimizer_stage=60&username=' . $this->username . '&password=' . $this->password . "&auto_rewrite=" . $this->auto_rewrite);
					die();
				} else {
/* we created all Sprites -- ready for data:URI */
					$options['data_uris'] = $remembered_data_uri;
/* create correct resource file name for data:URI / mhtml inclusion */
					$resource_file = $external_file;
					if (!empty($options['data_uris_separate'])) {
						$resource_file .=
							($options['far_future_expires_rewrite'] ? '.wo' . $this->time : '') .
							'.css' . 
							(!$options['far_future_expires_rewrite'] ? '?' . $this->time : '');
					}
					$minified_content_array = $this->convert_css_sprites($contents, $options, $resource_file);
					$minified_content = $minified_content_array[0];
					$minified_resource = $minified_content_array[1];
/* write data:URI / mhtml content */
					if (!empty($minified_resource) && !empty($options['data_uris_separate'])) {
						if ($fp = @fopen($physical_file . '.css', 'wb')) {
							@fwrite($fp, $minified_resource);
							@fclose($fp);
/* Set permissions, required by some hosts */
							@chmod($physical_file . '.css', octdec("0755"));
/* create static gzipped versions for static gzip in nginx, Apache */
							$fpgz = @fopen($cachedir . '/' . $physical_file . '.css.gz', 'wb');
							if ($fpgz) {
								@fwrite($fpgz, @gzencode($minified_resource, $options['gzip_level'], FORCE_GZIP));
								@fclose($fpgz);
								@chmod($physical_file . '.css.gz', octdec("0755"));
							}
/* Create the link to the new file */
							$newfile = $this->get_new_file($options, $cache_file, $this->time, '.css');
							$source = $this->include_bundle($source, $newfile, $handlers, $cachedir, 0);
						}
					} elseif (!empty($minified_content)) {
						$ie = in_array($this->ua_mod, array('.ie5', '.ie6', '.ie7'));
						$minified_content .= ($ie ? "/*\n" : "") . $minified_resource . ($ie ? "\n*/" : "");
					}
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
			if ($options['header'] == "css" && !empty($options['minify']) && empty($options['css_sprites']) && empty($options['data_uris'])) {
/* Minify CSS */
				$contents = $this->minify_text($contents);
			}
/* Allow for gzipping and headers */
			if ($options['gzip'] || $options['far_future_expires']) {
				$contents = $this->gzip_header[$options['header']] . $contents;
			}
			if (!empty($contents)) {
/* Write to cache and display */
				if ($fp = @fopen($physical_file, 'wb')) {
					@fwrite($fp, $contents);
					@fclose($fp);
/* Set permissions, required by some hosts */
					@chmod($physical_file, octdec("0755"));
/* create static gzipped versions for static gzip in nginx, Apache */
					if ($options['ext'] == 'css' || $options['ext'] == 'js') {
						$fpgz = @fopen($physical_file . '.gz', 'wb');
						if ($fpgz) {
							@fwrite($fpgz, @gzencode($contents, $options['gzip_level'], FORCE_GZIP));
							@fclose($fpgz);
							@chmod($physical_file . '.gz', octdec("0755"));
						}
					}
/* Create the link to the new file */
					$newfile = $this->get_new_file($options, $cache_file, $this->time);
					$source = $this->include_bundle($source, $newfile, $handlers, $cachedir, $options['unobtrusive'] ? 2 : ($options['header'] == 'javascript' && ($options['external_scripts'] || $options['external_scripts_head_end']) ? 1 : 0));
				}
			}
			if ($this->web_optimizer_stage) {
				$this->write_progress($this->web_optimizer_stage += 2);
			}
		}
		return str_replace("@@@marker@@@", "", $source);
	}

	/**
	* Replaces scripts calls or css links in the source with a marker
	*
	*/
	function _remove_scripts ($external_array, $source) {
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
	function get_new_file ($options, $cache_file, $timestamp = false, $add = false) {
		$relative_cachedir = str_replace($this->view->prevent_trailing_slash($this->view->unify_dir_separator($this->view->paths['full']['document_root'])), "", $this->view->prevent_trailing_slash($this->view->unify_dir_separator($options['cachedir'])));
		$newfile = '<' . $options['tag'] .
			' type="' . $options['type'] . '" ' .
			$options['src'] . '="' .
				(empty($options['host']) ? '/' : ('http' . $this->https . '://' . $options['host'] . '/')) .
				$this->view->prevent_leading_slash($relative_cachedir) . '/' .
				$cache_file . '.' .
				($add ? $options['ext'] . '.' : '') .
				($timestamp && $options['far_future_expires_rewrite'] ? 'wo' . $timestamp : '') .
				($add ? $add : '.' . $options['ext']) .
				($timestamp && !$options['far_future_expires_rewrite'] ? '?' . $timestamp : '') .
			'"' .
			(empty($options['rel']) ? '' : ' rel="' . $options['rel'] . '"') . 
			(empty($options['self_close']) ? '></' . $options['tag'] . '>' : (empty($this->xhtml) ? '>' : '/>'));
		$this->compressed_files[] = $newfile;
		return $newfile;
	}

	/**
	* Returns the last modified dates of the files being compressed
	* In this way we can see if any changes have been made
	**/
	function get_file_dates ($files, $options) {
/* option added by janvarev */
		if (!empty($options['dont_check_file_mtime'])) {
			return;
		}
		$dates = false;
		if (!empty($files) && is_array($files)) {
			foreach($files AS $key => $value) {
				if (!empty($value['file'])) {
					$value['file'] = $this->get_file_name($value['file']);
					if (file_exists($value['file'])) {
						$thedate = filemtime($value['file']);
						$dates[] = $thedate;
					}
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
			if (!preg_match("!\.css$!is", $file)) {
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
			preg_match_all('!@import\s*(url)?\s*\(?([^;]+?)\)?;!i', $content, $imports, PREG_SET_ORDER);
			if (is_array($imports)) {
				foreach ($imports as $import) {
					$src = false;
					if (isset($import[2])) {
						$src = $import[2];
						$src = trim($src, '\'" ');
					}
					if (strpos($src, "://") && !preg_match('!//(www\.)?' . $_SERVER['HTTP_HOST'] . '/!', $src)) {
						$src = $this->get_remote_file($src);
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
	function get_script_array () {
/* get head with all content */
		$this->get_head();
		if (!empty($this->head)) {
			if (!empty($this->options['javascript']['minify'])) {
/* find all scripts from head */
				$regex = "!(<script[^>]+type\\s*=\\s*(\"text/javascript\"|'text/javascript'|text/javascript)[^>]*>)(.*?</script>)!is";
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
						preg_match_all("@(type|src)\s*=\s*(?:\"([^\"]+)\"|'([^']+)'|([\s]+))@i", $match[1], $variants, PREG_SET_ORDER);
						if(is_array($variants)) {
							foreach($variants AS $variant_type) {
								$variant_type[1] = strtolower($variant_type[1]);
								$variant_type[2] = ($variant_type[2] == '') ? (($variant_type[3] == '') ? $variant_type[4] : $variant_type[3]) : $variant_type[2];
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
								$variant_type[2] = ($variant_type[2] == '') ? (($variant_type[3] == '') ? $variant_type[4] : $variant_type[3]) : $variant_type[2];
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
		$excluded_scripts = explode(" ", $this->options['javascript']['external_scripts_exclude']);
		if (is_array($this->initial_files)) {
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
	}

	/**
	* Gets an content for array of scripts/css files
	*
	**/
	function get_script_content ($tag = false) {
/* to get inline values */
		$last_key = array();
/* to get inline values on empty non-inline */
		$last_key_flushed = array();
		$stored = array();
		if (is_array($this->initial_files)) {
			foreach($this->initial_files as $key => $value) {
/* don't touch all files -- just only requested ones */
				if (!$tag || $value['tag'] == $tag) {
					if (!empty($value['file']) && strlen($value['file']) > 7 && strpos($value['file'], "://")) {
/* exclude files from the same host */
						if(!preg_match("!https?://(www\.)?". $_SERVER['HTTP_HOST'] . "!s", $value['file'])) {
/* don't get actual files' content if option isn't enabled */
							if ($this->options[$value['tag'] == 'script' ? 'javascript' : 'css']['external_scripts']) {
/* get an external file */
								if (!preg_match("/\.(css|js)$/is", $value['file'])) {
/* dynamic file */
									$file = $this->get_remote_file(str_replace("&amp;", "&", $value['file_raw']), $value['tag']);
/* static file */
								} else {
									$file = $this->get_remote_file($value['file'], $value['tag']);
								}
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
						if (!preg_match("/\.(css|js)$/is", $value['file'])) {
							$dynamic_file = $value['file_raw'];
/* touch only non-external scripts */
							if (!strpos($dynamic_file, "://")) {
								$dynamic_file = "http://" . $_SERVER['HTTP_HOST'] . $this->convert_path_to_absolute($dynamic_file, array('file' => $value['file']), true);
							}
							$static_file = ($this->options[$value['tag'] == 'script' ? 'javascript' : 'css']['cachedir']) . '/' . $this->get_remote_file(str_replace("&amp;", "&", $dynamic_file), $value['tag']);
							if (is_file($static_file)) {
								$value['file'] = str_replace($this->view->paths['full']['document_root'], "/", $static_file);
							} else {
								unset($value['file']);
							}
						}
						if ($value['tag'] == 'link') {
/* recursively resolve @import in files */
							$content_from_file = (empty($value['media']) ? "" : "@media " . $value['media'] . "{") .
								$this->resolve_css_imports($value['file']) . (empty($value['media']) ? "" : "}");
/* convert CSS images' paths to absolute */
							$content_from_file = $this->convert_paths_to_absolute($content_from_file, array('file' => $value['file']));
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
/* don't delete any detected scripts from array -- we need to clean up HTML page from them */
					if (empty($value['file']) && (empty($last_key[$value['tag']]) || $key != $last_key[$value['tag']])) {
/* glue inline and external content */
						if (($this->options['javascript']['external_scripts'] && $value['tag'] == 'script') || ($this->options['css']['external_scripts'] && $value['tag'] == 'link')) {
/* resolve @import from inline styles */
							if ($value['tag'] == 'link') {
								$value['content'] = $this->resolve_css_imports($value['content'], true);
/* convert CSS images' paths to absolute */
								$value['content'] = $this->convert_paths_to_absolute($value['content'], array('file' => '/'));
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
/* add stored content before, but leave styles stored */
						if (!empty($stored[$value['tag']])) {
/* preserve order of merged content */
							if ($last_key_flushed[$value['tag']] < $key) {
								$this->initial_files[$key]['content'] = $stored[$value['tag']] . $delimiter . $this->initial_files[$key]['content'];
							} else {
								$this->initial_files[$key]['content'] .= $delimiter . $stored[$value['tag']];
							}
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
	}

	/**
	* Sets the headers to be sent in the javascript and css files
	*
	**/
	function set_gzip_headers () {
/* define encoding for HTML page */
		$this->set_gzip_encoding();
/* When will the file expire? */
		$offset = 6000000 * 60 ;
		$ExpStr = "Expires: " .
		gmdate("D, d M Y H:i:s",
		$this->time + $offset) . " GMT";
		$types = array("css", "javascript");

		foreach($types AS $type) {
/* Always send etag */
			$this->gzip_header[$type] = '<?php
			// Determine supported compression method
			if (!empty($_SERVER["HTTP_ACCEPT_ENCODING"])) {
				$gzip = strstr($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip") || !empty($_COOKIE["_wo_gzip"]);
				$xgzip = strstr($_SERVER["HTTP_ACCEPT_ENCODING"], "x-gzip");
				$deflate = strstr($_SERVER["HTTP_ACCEPT_ENCODING"], "deflate");
				$xdeflate = strstr($_SERVER["HTTP_ACCEPT_ENCODING"], "x-deflate");
			}
			// Determine used compression method
			$encoding = empty($gzip) ? (empty($xgzip) ? (empty($deflate) ? (empty($xdeflate) ? "none" : "x-deflate") : "deflate") : "x-gzip") : "gzip";
			$hash = "' . $this->time .  '-" . str_replace("x-", "", $encoding);
			header ("Etag: \"" . $hash . "\"");
?>';
/* Send 304? */
			$this->gzip_header[$type] .= '<?php

			if ((isset($_SERVER["HTTP_IF_NONE_MATCH"]) &&
				stripslashes($_SERVER["HTTP_IF_NONE_MATCH"]) == "\"" . $hash . "\"") ||
				(isset($_SERVER["HTTP_IF_MATCH"]) &&
				stripslashes($_SERVER["HTTP_IF_MATCH"]) == "\"" . $hash . "\"")) {
				// Return visit and no modifications, so do not send anything
				header ("HTTP/1.0 304 Not Modified");
				header ("Content-Length: 0");
				exit();
			}

?>';
/* ob_start ("ob_gzhandler"); */
			if (!empty($this->options[$type]['gzip'])) {
				$this->gzip_header[$type] .= '<?php
				ob_start("compress_output_option");
				function compress_output_option($contents) {
					global $encoding, $gzip, $xgzip;
					// Check for buggy versions of Internet Explorer
					if (!empty($_SERVER["HTTP_USER_AGENT"]) && !strstr($_SERVER["HTTP_USER_AGENT"], "Opera") &&
						preg_match("/^Mozilla\/4\.0 \(compatible; MSIE ([0-9]\.[0-9])/i", $_SERVER["HTTP_USER_AGENT"], $matches)) {
						$version = floatval($matches[1]);
						// IE6- can loose first 2048 bytes of gzipped content, code from Bitrix
						if ($version < 7) {
							$contents = str_repeat(" ", 2048) . "\r\n" . $contents;
						}
					}

					if (isset($encoding) && $encoding != "none")
					{
						// try to get gzipped content from file
						$extension = $gzip || $xgzip ? "gz" : "df";
						$content = @file_get_contents(__FILE__ . "." . $extension);
						if (empty($content)) {
						// Send compressed contents
							if ($gzip || $xgzip) {
								$contents = gzencode($contents, '. $this->options[$type]['gzip_level'] .', FORCE_GZIP);
							} else {
								$contents = gzdeflate($contents, '. $this->options[$type]['gzip_level'] .');
							}
							$fp = @fopen(__FILE__ . "." . $extension, "wb");
							if ($fp) {
								@fwrite($fp, $contents);
								@fclose($fp);
							}
						} else {
							$contents = $content;
						}
						header ("Content-Encoding: " . $encoding);
						header ("Content-Length: " . strlen($contents));
					}

					return $contents;

				}
?>';
			}

			if (!empty($this->options[$type]['far_future_expires_php'])) {
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
	function strip_querystring ($path) {
		if ($commapos = strpos($path, '?')) {
			$path = substr($path, 0, $commapos);
		}
		if ($numberpos = strpos($path, '#')) {
			$path = substr($path, 0, $numberpos);
		}		
		return $path;
	}

	/**
	* Minifies CSS - removes unnecessary symbols
	*
	**/
	function minify_text ($txt) {
/* Remove line breaks */
		$txt = preg_replace('!\t?\r?\n?!', '', $txt);
/* Remove simple comments */
		$txt = preg_replace('!/\*.*?\*/!', '', $txt);
/* Compress whitespaces */
		$txt = str_replace('  ', ' ', $txt);
/* Remove spaces for }, {, ;, ,: */
		$txt = str_replace(array(' :', ': ', ' ,', ', ', ' ;', '; ', ' {', '{ ', ' }', '} '), array(':', ':', ',', ',', ';', ';', '{', '{', '}', '}'), $txt);
/* Remove excessive symbols */
		$txt = str_replace(array(' 0px', ':0px', ';}', ':0 0 0 0', ':0.', ' 0.'), array(' 0', ':0', '}', ':0', ':.', ' .'), $txt);
		return $txt;
	}

	/**
	* Safely trims whitespace from an HTML page
	* Adapted from smarty code http://www.smarty.net/
	**/
	function trimwhitespace ($source) {
/* Pull out the script, textarea and pre blocks */
		preg_match_all("!(<script.*?</script>|<textarea.*?</textarea>|<pre.*?</pre>)!is", $source, $match);
		$_script_blocks = $match[0];
		$source = preg_replace("!(<script.*?</script>|<textarea.*?</textarea>|<pre.*?</pre>)!is",
							   '@@@COMPRESSOR:TRIM:SCRIPT@@@', $source);
/* add multiple hosts */
		if ((!empty($this->options['page']['parallel']) && !empty($this->options['page']['parallel_hosts'])) || !empty($this->options['page']['far_future_expires']) || !empty($this->options['page']['far_future_expires_rewrite'])) {
			$source = $this->add_multiple_hosts($source, explode(" ", $this->options['page']['parallel_hosts']),  explode(" ", $this->options['page']['parallel_satellites']),  explode(" ", $this->options['page']['parallel_satellites_hosts']));
		}
/* add redirects for stati images */
/* remove all leading spaces, tabs and carriage returns NOT preceeded by a php close tag */
		if (!empty($this->options['page']['minify'])) {
			$source = trim(preg_replace('/((?<!\?>)\n)[\s]+/m', '\1', $source));
		}
/* one-strig-HTML takes about 20-50ms */
		if (!empty($this->options['page']['minify_aggressive'])) {
/* replace breaks with nothing for block tags */
			$source = preg_replace("/[\s\t\r\n]*(<\/?)(!--|!DOCTYPE|address|area|audioscope|base|bgsound|blockquote|body|br|caption|center|col|colgroup|comment|dd|div|dl|dt|embed|fieldset|form|frame|frameset|h[123456]|head|hr|html|iframe|keygen|layer|legend|li|link|map|marquee|menu|meta|noembed|noframes|noscript|object|ol|optgroup|option|p|param|samp|script|select|sidebar|style|table|tbody|td|tfoot|th|title|tr|ul|var)([^>]*)>[\s\t\r\n]+/i", "$1$2$3>", $source);
/* replace breaks with space for inline tags */
			$source = preg_replace("/(<\/?)(a|abbr|acronym|b|basefont|bdo|big|blackface|blink|button|cite|code|del|dfn|dir|em|font|i|img|input|ins|isindex|kbd|label|q|s|small|span|strike|strong|sub|sup|u)([^>]*)>[\s\t\r\n]+/i", "$1$2$3> ", $source);
		}
/* replace ' />' with '/>' */
		if (!empty($this->options['page']['minify'])) {
			$source = preg_replace("/\s\/>/", "/>", $source);
		}
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
	function trimwhitespace_replace ($search_str, $replace, &$subject) {
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
				if (empty($height)) {
/* try to calculate height for AdWords */
					switch ($stuff) {
						case 'gadwords':
							$height = round(substr($value[0], strpos($value[0], 'google_ad_height =') + 18, 5));
							break;
					}
				}
/* count param for str_replace available only in PHP5 */
				$pos = strpos($this->content, $value[0]);
				$len = strlen($value[0]);
				$this->content = substr($this->content, 0, $pos) .
					'<' .
						($inline ? 'span' : 'div') .
					' id="' .
						$stuff .
					'_dst_' .
						$key .
					'"' .
						($height ? ' style="height:' . $height . 'px"' : '') .
					'"></' .
						($inline ? 'span' : 'div') .
					'>' .
						substr($this->content, $pos + $len, strlen($this->content) - $len);
				$return .= '<div id="'.
						$stuff .'_src_' . $key . 
					'">' .
						$value[0] .
					'</div><script type="text/javascript">document.getElementById("' .
						$stuff . '_dst_' . $key . '").appendChild(document.getElementById("' .
						$stuff . '_src_' . $key . '"))</script>';
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
/* Addthis */
			$before_body .= $this->replace_unobtrusive_generic("@<!--\sAddThis\sButton\sBEGIN.*?AddThis\sButton\sEND\s-->@is", 'addthis', 20);
		}
/* Counters */
		if (!empty($options['unobtrusive_counters'])) {
/* LiveInternet */
			$before_body .= $this->replace_unobtrusive_generic("@<!--LiveInternet counter-->.*?<!--/LiveInternet-->@is", 'liveinternet', 31, true);
/* Google Analytics */
			$before_body .= $this->replace_unobtrusive_generic("@<script type=\"text/javascript\">\s*\r?\n?var\s+gaJsHost.*?catch\(err\)\s*\{\}</script>@is", 'ga', 0, true);
/* SpyLog */
			$before_body .= $this->replace_unobtrusive_generic("@<!-- SpyLOG -->\r?\n<script.*?script>\r?\n<!--/ SpyLOG -->@is", 'spylog', 0, true);
/* Rambler Top100 */
			$before_body .= $this->replace_unobtrusive_generic("@<!-- begin of Top100 code -->.*?<!-- end of Top100 code -->@is", 'rambler', 0, true);
/* Yandex.Metrica */
			$before_body .= $this->replace_unobtrusive_generic("@<!-- Yandex.Metrika -->.*?<!-- Yandex.Metrika -->@is", 'metrica', 0, true);
/* Rating@Mail.ru */
			$before_body .= $this->replace_unobtrusive_generic("@<!--Rating\@Mail.ru counter-->.*?<!--// Rating\@Mail.ru counter-->@is", 'ratingmail', 31, true);

		}
/* Advertisement */
		if (!empty($options['unobtrusive_ads'])) {
/* Yandex.Direct */
			$before_body .= $this->replace_unobtrusive_generic("@<script type=\"text/javascript\"><!--\r?\nyandex_partner_id.*?</script>@is", 'yadirect');
/* Google AdWords */
			$before_body .= $this->replace_unobtrusive_generic("@<script type=\"text/javascript\"><!--\r?\n?\r?\ngoogle_ad_client.*?pagead2.googlesyndication.com/pagead/show_ads.js\">[\r\n\s\t]*</script>@is", 'gadwords');
/* Begun */
			$before_body .= $this->replace_unobtrusive_generic("@<script type=\"text/javascript\"><!--\r?\nvar begun_auto_pad.*?autocontext.begun.ru/autocontext2.js\"></script>@is", 'begun');
		}
		if (!empty($before_body)) {
			$this->content = str_replace('</body>', $before_body . '</body>' , $this->content);
		}
	}

	/**
	* Gets the directory we are in
	*
	**/
	function get_current_path ($trailing=false) {
		$current_dir = $this->view->paths['relative']['current_directory'];
/* Remove trailing slash */
		if ($trailing) {
			if(substr($current_dir, -1, 1) == "/") {
				$current_dir = substr($current_dir, 0, -1);
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
			$this->content = preg_replace("!(</head>)((\r?\n)*<script.*)(<body)!is", "$2$1$4", $this->content);
/* Remove comments ?*/
			if (!empty($this->options['page']['remove_comments'])) {
				$this->content = preg_replace("@<!--[^\]\[]*?-->@is", '', $this->content);
			}
			preg_match("!<head(\s+[^>]+)?>.*?</head>!is", $this->content, $matches);
			if (!empty($matches[0])) {
				$this->head = $matches[0];
/* remove conditional comments for current browser */
				if (!empty($this->ua_mod)) {
					$this->remove_conditional_comments();
				}
/* Pull out the comment blocks, so as to avoid touching conditional comments */
				if (!empty($this->options['javascript']['minify'])) {
					$this->head = str_replace(array('//]]>', '// ]]>', '<!--//-->', '<!-- // -->', '<![CDATA[', '//><!--', '//--><!]]>'), array(), $this->head);
/* replace current head content with updated version */
					$this->content = str_replace($matches[0], $this->head, $this->content);
				}
/* and now remove all comments and parse result code -- to avoid IE code mixing with other browsers */
				$this->head = preg_replace("@<!--.*?-->@is", '', $this->head);
			}
/* split XHTML behavior from HTML */
			$xhtml = strpos($this->content, 'XHTML 1');
			$this->xhtml = ($xhtml > 34 && $xhtml < 100 ? 1 : 0);
/* add Web Optimizer spot */
			$this->content = preg_replace('!(<TITLE)!is', "$1" . ' ' . ($this->xhtml ? 'xml:' : '') . 'lang="wo"', $this->content);
/* add Web Optimizer stamp */
			if (!empty($this->options['page']['footer'])) {
				$background_image = str_replace($this->view->paths['full']['document_root'], "/", $this->options['css']['cachedir']) . '/web.optimizer.stamp.png';
				if ($this->ua_mod == '.ie5' || $this->ua_mod == '.ie6') {
					$background_style = 'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=' . $background_image . ',sizingMethod=\'scale\')';
				} else {
					$background_style = 'background:url(' .  $background_image .')';
				}
/* choose between link or span */
				if (!empty($this->options['page']['footer_link'])) {
					$el = 'a' ;
				} else {
					$el = 'span';
				}
				$this->content = preg_replace('!(</body>)!is', '<div style="float:right;margin:-104px 4px -100px"><' . $el . ' href="http://www.web-optimizer.us/" rel="nofollow" title="Web Optimizer: Faster than Lightning" style="display:block;text-decoration:none;width:100px;height:100px;'. $background_style .'"></' . $el . '></div>' . "$1", $this->content);
			}
		}
	}

	/**
	* Removes conditional comments for MSIE 5-9
	*
	**/
	function remove_conditional_comments () {
/* preliminary strpos saves about 50% of CPU */
		if (strpos(' ' . $this->head, 'IE]>')) {
			$this->head = preg_replace("@<!--\[if \(?IE\)?\]>(.*?)<!\[endif\]-->@s", "$1", $this->head);
		}
		for ($version = $this->min_ie_version; $version < $this->max_ie_version; $version++) {
/* detect */
			if ($this->ua_mod == ".ie" . $version || ($version == 7 && $this->ua_mod == '.ie77')) {
/* detect equality */
				if (strpos(' ' . $this->head, 'IE ' . $version . ']>')) {
					$this->head = preg_replace("@<!--\[if (gte )?\(?IE " . $version . "[^\]]*\)?\]>(.*?)<!\[endif\]-->@s", "$2", $this->head);
				}
/* detect lesser versions */
				for ($i = $this->min_ie_version; $i < $version; $i++) {
					if (strpos(' ' . $this->head, 'IE ' . $i . ']>')) {
						$this->head = preg_replace("@<!--\[if gte? IE " . $i . "[^\]]*\]>(.*?)<!\[endif\]-->@s", "$1", $this->head);
					}
				}
/* detect greater versions */
				for ($i = $version; $i < $this->max_ie_version; $i++) {
					if (strpos(' ' . $this->head, 'IE ' . $i . ']>')) {
						$this->head = preg_replace("@<!--\[if lte? IE " . $i . "[^\]]*\]>(.*?)<!\[endif\]-->@s", "$1", $this->head);
					}
				}
			}
		}
	}

	/**
	* Converts sinlge path to the absolute one
	*
	**/
	function convert_path_to_absolute ($file, $path, $leave_querystring = false) {
		$endfile = '';
		$root = $this->view->unify_dir_separator($this->view->paths['full']['document_root']);
		if (!empty($path['file'])) {
			$endfile = $path['file'];
		}
		if (!$leave_querystring) {
			$file = $this->strip_querystring($file);
			$endfile = $this->strip_querystring($endfile);
		}
/* Don't touch data URIs, or mhtml:, or external files */
		if (preg_match("!^(https?|data|mhtml):!is", $file) && !preg_match("!^https?://(www\.)?". preg_replace("!^www\.!", "", $_SERVER['HTTP_HOST']) ."!is", $file)) {
			return false;
		}
		$absolute_path = $file;
/* Not absolute or external */
		if (substr($file, 0, 1) != "/" && !preg_match("!^https?://!", $file)) {
/* add relative directory. Need somehow parse current meta base... */
			if (substr($endfile, 0, 1) != "/" && !preg_match("!^https?://!", $endfile)) {
				$endfile = preg_replace("@([^\?&]*/).*@", "$1", $_SERVER['REQUEST_URI']) . $endfile;
			}
			$full_path_to_image = preg_replace("@[^/]+$@", "", $endfile);
			$absolute_path = (preg_match("!https?://!i", $full_path_to_image) ? "" : "/") . $this->view->prevent_leading_slash(str_replace($root, "", $this->view->unify_dir_separator($full_path_to_image . $file)));
		}
/* remove HTTP host from absolute URL */
		return preg_replace("!https?://(www\.)?". preg_replace("!^www\.!", "", $_SERVER['HTTP_HOST']) ."/!i", "/", $absolute_path);
	}

	/**
	* Finds background images in the CSS and converts their paths to absolute
	*
	**/
	function convert_paths_to_absolute ($content, $path) {
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
	function convert_css_sprites ($content, $options, $css_url) {
/* try to get and increase memory limit */
		$memory_limit = round(str_replace("M", "000000", str_replace("K", "000", @ini_get('memory_limit'))));
/* 64M must enough for any operations with images. I hope... */
		if ($memory_limit < 64000000) {
			@ini_set('memory_limit', '64M');
		}
		@chdir($options['cachedir']);
		$css_sprites = new css_sprites($content, array(
			'root_dir' => $options['installdir'],
			'current_dir' => $options['cachedir'],
			'html_cache' => $this->options['page']['cachedir'],
			'website_root' => $this->view->paths['full']['document_root'],
			'truecolor_in_jpeg' => $options['truecolor_in_jpeg'],
			'aggressive' => $options['aggressive'],
			'no_ie6' => $options['no_ie6'],
			'ignore_list' => $options['css_sprites_exclude'],
			'partly' => $options['css_sprites_partly'],
			'extra_space' => $options['css_sprites_extra_space'],
			'expires' => $options['css_sprites_expires'],
			'expires_rewrite' => $options['css_sprites_expires_rewrite'],
			'data_uris' => $options['data_uris'],
			'data_uris_mhtml' => $options['data_uris_mhtml'],
			'css_url' => $css_url,
			'data_uris_separate' => $options['data_uris_separate'],
			'data_uris_size' => $options['data_uris_size'],
			'data_uris_ignore_list' => $options['data_uris_exclude'],
			'image_optimization' => $options['image_optimization'],
			'memory_limited' => $options['memory_limited'] && !(round(preg_replace("/M/", "000000", preg_replace("/K/", "000", @ini_get('memory_limit')))) < 64000000 ? 0 : 1),
			'dimensions_limited' => $options['dimensions_limited'],
			'no_css_sprites' => !$options['css_sprites'],
			'multiple_hosts' => empty($options['parallel']) ? array() : explode(" ", $options['parallel_hosts']),
			'user_agent' => $this->ua_mod
		));
		return $css_sprites->process();
	}

	/**
	 * Gets file extension
	 *
	**/
	function get_file_extension ($file) {
		$f = explode('.', $file);
		return array_pop($f);
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
/* check if we already have this file */
		if (preg_match("/\/wo[abcdef0-9]+$/", $file)) {
			return preg_replace("/.*(wo[abcdef0-9]+$)/", "$1", $file);
		}
		$current_directory = @getcwd();
/* dirty fix for buggy getcwd call */
		if ($current_directory == '/') {
			$current_directory = $this->options['css']['installdir'];
		}
		if (function_exists('curl_init')) {	
			if ($tag == 'link') {
				@chdir($this->options['css']['cachedir']);
			} else {
				@chdir($this->options['javascript']['cachedir']);
			}
			$return_filename = 'wo' . md5($file) . '.' . ($tag == 'link' ? 'css' : 'js');
			if (file_exists($return_filename)) {
				$timestamp = @filemtime($return_filename);
			} else {
				$timestamp = 0;
			}
/* prevent download more than 1 time a day */
			if (!empty($timestamp) && $timestamp + 86400 > $this->time) {
				@chdir($current_directory);
				return $return_filename;
			}
/* try to download remote file */
			$ch = @curl_init($file);
			$fp = @fopen($return_filename, "w");
			if ($fp && $ch) {
				@curl_setopt($ch, CURLOPT_FILE, $fp);
				@curl_setopt($ch, CURLOPT_HEADER, 0);
				@curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Web Optimizer; Faster than Lightning; http://www.web-optimizer.us/) Firefox 3.5.3");
				if (!empty($this->options['page']['htaccess_username']) && !empty($this->options['page']['htaccess_password'])) {
					@curl_setopt($ch, CURLOPT_USERPWD, $this->options['page']['htaccess_username'] . ':' . $this->options['page']['htaccess_password']);
				}
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
		@chdir($current_directory);
		return false;
	}

	/**
	 * Sets User Agent modificator
	 *
	 **/
	function set_user_agent () {
		$this->ua_mod = '';
/* min. supported IE version */
		$this->min_ie_version = 5;
/* max. supported IE version */
		$this->max_ie_version = 10;
		if (strpos($this->ua, 'MSIE') && !strpos($this->ua, 'Opera')) {
			for ($version = $this->min_ie_version; $version < $this->max_ie_version; $version++) {
				if (strpos($this->ua, 'MSIE ' . $version)) {
					$this->ua_mod = '.ie' . $version;
				}
			}
		}
	}

} // end class

?>