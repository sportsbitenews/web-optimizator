<?php
/**
 * File from WEBO Site SpeedUp, Lite version of main library
 **/
class web_optimizer {
	function web_optimizer ($options = false) {
		$currency = empty($_COOKIE['WSS_CURRENCY']) ? $options['options']['currency'] : $_COOKIE['WSS_CURRENCY'];
		$homepage = empty($options['options']['html_cache']['ignore_list']) && empty($options['options']['restricted']) ? '' :
			in_array($_SERVER['REQUEST_URI'], array('/', '/index.php', '/index.html', '/#' . $currency));
		if (!empty($_GET['web_optimizer_disabled']) || (!empty($options['options']['restricted']) &&
			(preg_match("@" . preg_replace("/ /", "|", preg_replace("/([\?!\^\$\|\(\)\[\]\{\}])/", "\\\\$1", $options['options']['restricted'])) . "@", $_SERVER['REQUEST_URI']))) ||
			(strpos($options['options']['restricted'], '#') !== false && $homepage)) {
				$this->options['active'] = 0;
				return;
		}
		if (!empty($options['options']['footer']['ab'])) {
			if (empty($_COOKIE['WSS_DISABLED']) && empty($_COOKIE['WSS_ENABLED'])) {
				$ab = (microtime()*100)%100 < round($options['options']['footer']['ab']);
				setcookie($ab ? "WSS_ENABLED" : "WSS_DISABLED", 1, time() + 60*60, '/', $_SERVER['HTTP_HOST'], false, true);
				if (!$ab) {
					$_COOKIE['WSS_DISABLED'] = 1;
				}
			}
		}
		$this->web_optimizer_stage = round(empty($_GET['web_optimizer_stage']) ? 0 : $_GET['web_optimizer_stage']);
		$this->debug_mode = empty($_GET['web_optimizer_debug']) && empty($_COOKIE['web_optimizer_debug']) ? 0 : 1;
		foreach ($options as $key => $value) {
			$this->$key = $value;
		}
		$this->options['active'] = $this->debug_mode ? 1 : $this->options['active'];
		if (empty($this->options['active'])) {
			return;
		}
		$this->head = '';
		$this->time = empty($_SERVER['REQUEST_TIME']) ? time() : $_SERVER['REQUEST_TIME'];
		$this->buffered = $this->options['buffered'];
		$this->ua = empty($_SERVER['HTTP_USER_AGENT']) ? '' : $_SERVER['HTTP_USER_AGENT'];
		$this->https = empty($_SERVER['HTTPS']) ? '' : 's';
		$this->ies = array('.ie4', '.ie5', '.ie6', '.ie7');
		$this->set_options();
		if (is_array($this->options['plugins'])) {
			include_once($this->options['css']['installdir'] . 'libs/php/class.plugin.php');
		}
		$this->encoding = '';
		$this->set_gzip_headers();
		$this->flushed = false;
		$excluded_html_pages = '';
		$included_user_agents = '';
		$restricted_cookie = 0;
		if (!empty($this->options['page']['cache'])) {
			$this->start_cache_engine();
			if (!empty($this->clear_cache_key)) {
				$this->clear_html_cache($this->clear_cache_key);
			}
			if (!empty($this->options['page']['cache_ignore'])) {
				$excluded_html_pages = preg_replace("/ /", "|", preg_replace("/([\?!\^\$\|\(\)\[\]\{\}])/", "\\\\$1", str_replace(array('# ', '#'), '', $this->options['page']['cache_ignore'])));
			}
			if (!empty($this->options['page']['allowed_user_agents'])) {
				$included_user_agents = preg_replace("/ /", "|", preg_replace("/([\?!\^\$\|\(\)\[\]\{\}])/", "\\\\$1", $this->options['page']['allowed_user_agents']));
			}
			if (!empty($this->options['page']['exclude_cookies'])) {
				$cookies = explode(" ", $this->options['page']['exclude_cookies']);
				foreach ($cookies as $cookie) {
					if ($e = strpos($cookie, '=')) {
						$c = substr($cookie, 0, $e);
						$e = substr($cookie, $e+1);
						if (isset($_COOKIE[$c]) && $_COOKIE[$c] == $e) {
							$restricted_cookie = 1;
						}
					} else {
						if (isset($_COOKIE[$cookie])) {
							$restricted_cookie = 1;
						}
					}
				}
			}
		}
		$this->cache_me = !empty($this->options['page']['cache']) &&
			((empty($this->options['page']['cache_ignore']) && !$this->options['page']['ignore_include']) ||
				(!$this->options['page']['ignore_include'] && 
				(!$excluded_html_pages || !preg_match("!" . $excluded_html_pages . "!is", $_SERVER['REQUEST_URI'])) &&
				(strpos($this->options['page']['cache_ignore'], '#') === false || !$homepage)) ||
				($this->options['page']['ignore_include'] &&
				(($excluded_html_pages && preg_match("!" . $excluded_html_pages . "!is", $_SERVER['REQUEST_URI'])) ||
				(strpos($this->options['page']['cache_ignore'], '#') !== false && $homepage))) ||
				!$this->ua ||
				($included_user_agents && preg_match("!" . $included_user_agents . "!is", $this->ua))) &&
			!$restricted_cookie &&
			(empty($this->options['page']['gzip']) ||
				empty($this->options['page']['flush'])) &&
			!headers_sent() &&
			(getenv('REQUEST_METHOD') == 'GET') &&
			empty($this->web_optimizer_stage) &&
			!$this->debug_mode &&
			empty($this->no_cache) &&
			($this->premium == 3 || strpos($this->options['host'], $this->host) !== false) &&
			(empty($this->options['page']['ab']) || empty($_COOKIE['WSS_DISABLED']));
		if (!empty($this->cache_me)) {
			$this->uri = $this->convert_request_uri(empty($this->uri) ? '' : $this->uri);
			$jutility = class_exists('JUtility', false);
			$gzip_me = is_array($this->options['plugins']) || $jutility;
			$cache_plain_key = $this->view->ensure_trailing_slash($this->uri) .
				'index' .
				$this->ua_mod .
				'.html' .
				($this->options['page']['https_separate'] ? $this->https : '');
			$cache_key = $cache_plain_key .
				($this->options['page']['flush'] ||
				empty($this->encoding_ext) ||
				$gzip_me ? '' : $this->encoding_ext);
			$timestamp_ajax = 0;
			$cache_key_ajax = $cache_plain_key . '.ajax';
			if (defined('WSS_CACHE_MISS')) {
				$timestamp = 0;
			} else {
				$timestamp = $this->cache_engine->get_mtime($cache_key);
				if ($this->options['page']['ajax_timeout']) {
					$timestamp_ajax = $this->cache_engine->get_mtime($cache_key_ajax);
				}
			}
			if (!$timestamp && !$this->options['page']['flush'] && !empty($this->encoding_ext) && !$gzip_me) {
				$timestamp = $this->cache_engine->get_mtime($cache_plain_key);
				$gzip_me = 1;
			}
			if (!$timestamp && !$timestamp_ajax) {
				define('WSS_CACHE_MISS', 1);
			}
			if (($timestamp &&
				$this->time - $timestamp < $this->options['page']['cache_timeout'] &&
				($content = $this->cache_engine->get_entry($gzip_me ? $cache_plain_key : $cache_key))) ||
				($timestamp_ajax &&
				$this->time - $timestamp_ajax < $this->options['page']['ajax_timeout'] &&
				($content = $this->cache_engine->get_entry($cache_key_ajax)))) {
				if ($jutility) {
					$token = JUtility::getToken();
					$content = str_replace('##WSS_JTOKEN_WSS##', $token, $content);
				}
				if (is_array($this->options['plugins'])) {
					foreach ($this->options['plugins'] as $plugin) {
						$plugin_file = $this->options['css']['installdir'] . 'plugins/' . $plugin . '.php';
						if (@is_file($plugin_file)) {
							include_once($plugin_file);
							$web_optimizer_plugin = new $plugin;
							$content = $web_optimizer_plugin->onAfterOptimization($content);
						}
					}
				}
				$hash = crc32($content) . (empty($this->encoding) ? '' : '-' . str_replace("x-", "", $this->encoding));
				if ((isset($_SERVER['HTTP_IF_NONE_MATCH']) &&
					stripslashes($_SERVER['HTTP_IF_NONE_MATCH']) == '"' . $hash . '"') ||
					(isset($_SERVER['HTTP_IF_MATCH']) &&
					stripslashes($_SERVER['HTTP_IF_MATCH']) == '"' . $hash . '"')) {

					@header ("HTTP/1.0 304 Not Modified");
					@header ("Content-Length: 0");
					$this->di();
				}
				$this->set_gzip_header();
				if ($gzip_me && $this->encoding) {
					$cnt = $this->create_gz_compress($content, in_array($this->encoding, array('gzip', 'x-gzip')));
					if (!empty($cnt)) {
						$content = $cnt;

					} else {
						$this->options['page']['gzip'] = 0;
						$this->encoding = '';
					}
				}
				@header("ETag: \"" . $hash . "\"");
				if ($gzip_me && ($this->encoding || empty($this->gzip_set)) && (empty($_SERVER['SERVER_PROTOCOL']) || $_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.0')) {
					@header("Content-Length: " . strlen($content));
				}
				if (!empty($this->options['charset'])) {
					@header("Content-Type: text/html; charset=" . $this->options['charset']);
				}
				if (empty($this->web_optimizer_stage) &&
					$this->options['page']['clientside_cache']) {

					$ExpStr = date("D, d M Y H:i:s",
						$this->time + $this->options['page']['clientside_timeout']) . " GMT";
					@header("Cache-Control: " .
						($this->options['page']['gzip'] ? 'private' : 'public') .
						", max-age=" .
						$this->options['page']['clientside_timeout']);
					@header("Expires: " . $ExpStr);
				}
				while (@ob_end_clean());
				@header('WEBO: cache hit');
				echo $content;
				if ($this->options['page']['flush']) {
					flush();
					$this->flushed = true;
				} else {
					$this->di(1);
				}
			} else {
				@header('WEBO: cache miss');
			}
		} elseif (!empty($this->options['page']['cache'])) {
			@header('WEBO: cache miss');
		}
		$this->joomla_cache = $this->options['page']['cache'] && class_exists('JUtility', false);
		$this->wp_cache = defined('WP_CACHE') && @is_dir($this->options['document_root'] . 'wp-content/plugins/wp-cart-for-digital-products/');
		$this->generic_cache = !$this->joomla_cache && !$this->wp_cache && $this->options['page']['cache'];
		if ($this->https && !empty($this->options['page']['parallel_https'])) {
			$this->options['javascript']['host'] =
			$this->options['css']['host'] =
			$this->options['page']['parallel_hosts'] = 
			$this->options['page']['parallel_https'];
		}
		$this->initial_files = array();
		$this->charset = empty($wss_encoding) ? 'utf8' : $wss_encoding;
		$this->host_escaped = str_replace('.', '\.', $this->host);
		$this->options['active'] = 1;
		if ($this->buffered) {
			$this->start();
		}
	}
	function set_options () {
		$this->options['document_root'] = empty($this->options['document_root']) ? '' : $this->options['document_root'];
		$this->view->set_paths($this->options['document_root']);
		if (!empty($this->web_optimizer_stage)) {
			$this->view->paths['full']['current_directory'] = $this->view->paths['full']['document_root'];
			$this->view->paths['relative']['current_directory'] = $this->view->paths['relative']['document_root'];
			$_SERVER['REQUEST_URI'] = '/';
			$mods = array(
				'',
				'.ie6',
				'.ie7',
				'.ie8',
				'.ma',
				'.end'
			);
			$this->ua_mod = $mods[$this->cache_stage];
		}
		$this->premium = $this->view->validate_license($this->options['license'], $this->options['html_cachedir'], $this->options['host']);
		$this->set_user_agent();
		$webo_cachedir = $this->view->unify_dir_separator(realpath(dirname(__FILE__) . '/../') . '/');
		$this->options['html_cachedir'] = $this->view->ensure_trailing_slash($this->options['html_cachedir']);
		$this->options['css_cachedir'] = $this->view->ensure_trailing_slash($this->options['css_cachedir']);
		$this->options['javascript_cachedir'] = $this->view->ensure_trailing_slash($this->options['javascript_cachedir']);
		if (!empty($this->options['host'])) {
			$this->options['host'] = preg_replace("!^https?://!", "", $this->options['host']);
		}
		$full_options = array(
			"javascript" => array(
				"cachedir" => $this->options['javascript_cachedir'],
				"cachedir_relative" => str_replace($this->options['document_root'], "/", $this->options['javascript_cachedir']),
				"installdir" => $webo_cachedir,
				"gzip" => $this->options['gzip']['javascript'] &&
					((!$this->options['htaccess']['mod_gzip'] &&
						!$this->options['htaccess']['mod_deflate'] &&
						(!$this->options['htaccess']['mod_rewrite'] ||
							!$this->options['htaccess']['mod_mime'] ||
							!$this->options['htaccess']['mod_expires'])) ||
					!$this->options['htaccess']['enabled']),
				"gzip_level" => round($this->options['gzip']['javascript_level']),
				"minify" => $this->options['minify']['javascript'],
				"minify_body" => $this->options['minify']['javascript_body'],
				"minify_with" => $this->options['minify']['with_jsmin'] ?
					'jsmin' : ($this->options['minify']['with_yui'] && $this->premium > 1 ?
					'yui' : ($this->options['minify']['with_packer'] && $this->premium ?
					'packer' : ($this->options['minify']['with_google'] && $this->premium > 1 ?
					'google' : ''))),
				"minify_try" => $this->options['external_scripts']['include_try'] &&
					$this->premium,
				"minify_exclude" => $this->options['external_scripts']['minify_exclude'],
				"remove_duplicates" => $this->options['external_scripts']['duplicates'] &&
					$this->premium,
				"far_future_expires" => $this->options['far_future_expires']['javascript'] &&
					!$this->options['htaccess']['mod_expires'],
				"far_future_expires_php" => $this->options['far_future_expires']['javascript'],
				"far_future_expires_rewrite" => $this->options['htaccess']['mod_rewrite'] &&
					$this->options['htaccess']['enabled'] &&
					$this->options['far_future_expires']['javascript'],
				"far_future_expires_static" => ((!($this->options['htaccess']['mod_rewrite'] ||
						$this->options['htaccess']['mod_expires']) ||
					!$this->options['htaccess']['enabled']) &&
					$this->options['far_future_expires']['javascript']) || 
					((!($this->options['htaccess']['mod_rewrite'] ||
						$this->options['htaccess']['mod_deflate'] ||
						$this->options['htaccess']['mod_gzip']) ||
					!$this->options['htaccess']['enabled']) &&
					$this->options['gzip']['javascript']),
				"unobtrusive_body" => $this->premium && $this->options['unobtrusive']['body'] &&
					!$this->options['unobtrusive']['all'],
				"external_scripts" => $this->options['external_scripts']['on'],
				"inline_scripts" => $this->options['external_scripts']['inline'] &&
					($this->options['minify']['javascript'] || $this->options['rocket']['reorder']),
				"inline_scripts_body" => $this->options['external_scripts']['inline_body'] &&
					($this->options['minify']['javascript'] || $this->options['rocket']['reorder']),
				"external_scripts_head_end" => $this->options['external_scripts']['head_end'],
				"external_scripts_exclude" => $this->options['external_scripts']['ignore_list'],
				"external_scripts_mask" => $this->premium > 1 ? $this->options['external_scripts']['include_mask'] : '',
				"dont_check_file_mtime" => $this->options['performance']['mtime'],
				"file" => $this->premium > 1 ? $this->options['minify']['javascript_file'] : '',
				"host" => $this->premium ? $this->options['minify']['javascript_host'] : '',
				"https" => $this->premium > 1 ? $this->options['parallel']['https'] : '',
				"rocket" => $this->options['rocket']['javascript'] && !$this->options['minify']['javascript'],
				"rocket_external" => $this->options['rocket']['javascript_external'] && !$this->options['minify']['javascript'],
				"reorder" => $this->options['rocket']['reorder']
			),
			"css" => array(
				"cachedir" => $this->options['css_cachedir'],
				"cachedir_relative" => str_replace($this->options['document_root'], "/", $this->options['css_cachedir']),
				"installdir" => $webo_cachedir,
				"gzip" => $this->options['gzip']['css'] &&
					((!$this->options['htaccess']['mod_gzip'] &&
						!$this->options['htaccess']['mod_deflate'] &&
						(!$this->options['htaccess']['mod_rewrite'] ||
							!$this->options['htaccess']['mod_mime'] ||
							!$this->options['htaccess']['mod_expires'])) ||
					!$this->options['htaccess']['enabled']),
				"gzip_level" => round($this->options['gzip']['css_level']),
				"minify" => $this->options['minify']['css'],
				"minify_body" => $this->options['minify']['css_body'],
				"minify_with" => $this->premium > 1 && $this->options['minify']['css_min'] == 2 ?
					'tidy' : ($this->options['minify']['css_min'] ? 'basic' : ''),
				"far_future_expires" => $this->options['far_future_expires']['css'] &&
					!$this->options['htaccess']['mod_expires'],
				"far_future_expires_php" => $this->options['far_future_expires']['css'],
				"far_future_expires_rewrite" => $this->options['htaccess']['mod_rewrite'] &&
					$this->options['htaccess']['enabled'] &&
					$this->options['far_future_expires']['css'],
				"far_future_expires_static" => ((!($this->options['htaccess']['mod_rewrite'] ||
						$this->options['htaccess']['mod_expires']) ||
					!$this->options['htaccess']['enabled']) &&
					$this->options['far_future_expires']['css']) || 
					((!($this->options['htaccess']['mod_rewrite'] ||
						$this->options['htaccess']['mod_deflate'] ||
						$this->options['htaccess']['mod_gzip']) ||
					!$this->options['htaccess']['enabled']) &&
					$this->options['gzip']['css']),
				"data_uris" => $this->options['data_uris']['on'],

				"data_uris_mhtml" => $this->options['data_uris']['mhtml'] && !$this->https,
				"data_uris_separate" => $this->premium > 1 && $this->options['data_uris']['separate'] &&
					((in_array($this->ua_mod, $this->ies) &&
							$this->options['data_uris']['mhtml']) ||
						(!in_array($this->ua_mod, $this->ies) &&
							$this->options['data_uris']['on'])),
				"data_uris_domloaded" => $this->options['unobtrusive']['background'] &&
					$this->premium > 1,
				"data_uris_size" => round($this->options['data_uris']['size']),
				"data_uris_mhtml_size" => round($this->options['data_uris']['mhtml_size']),
				"data_uris_exclude" => $this->options['data_uris']['ignore_list'],
				"data_uris_exclude_mhtml" => $this->options['data_uris']['additional_list'],
				"css_sprites" => $this->premium && $this->options['css_sprites']['enabled'],
				"css_sprites_expires_rewrite" => (!($this->options['htaccess']['mod_rewrite'] ||
						$this->options['htaccess']['mod_expires']) ||
					!$this->options['htaccess']['enabled']) &&
					$this->options['far_future_expires']['images'],
				"css_sprites_ignore" => $this->options['css_sprites']['ignore'],
				"css_sprites_exclude" => $this->options['css_sprites']['ignore_list'],
				"truecolor_in_jpeg" => $this->premium > 1 && $this->options['css_sprites']['truecolor_in_jpeg'],
				"aggressive" => $this->premium > 1 && $this->options['css_sprites']['aggressive'],
				"no_ie6" => $this->premium > 1 && $this->options['css_sprites']['no_ie6'],
				"dimensions_limited" => $this->premium ? round($this->options['css_sprites']['dimensions_limited']) : 0,
				"css_sprites_extra_space" => $this->premium && $this->options['css_sprites']['extra_space'],
				"punypng" => $this->premium > 1 ? $this->options['punypng'] : '',
				"css_restore_properties" => $this->options['performance']['restore_properties'] &&
					$this->premium > 1,
				"unobtrusive_body" => false,
				"parallel" => $this->options['parallel']['enabled'],
				"parallel_hosts" => $this->options['parallel']['allowed_list'],
				"external_scripts" => $this->options['external_scripts']['css'],
				"inline_scripts" => $this->options['external_scripts']['css_inline'],
				"external_scripts_exclude" => $this->options['external_scripts']['additional_list'],
				"include_code" => $this->options['external_scripts']['include_code'],
				"dont_check_file_mtime" => $this->options['performance']['mtime'],
				"file" => $this->premium > 1 ? $this->options['minify']['css_file'] : '',
				"host" => $this->premium ? $this->options['minify']['css_host'] : '',
				"https" => $this->premium > 1 ? $this->options['parallel']['https'] : '',
				"rocket" => $this->options['rocket']['css'] && !$this->options['minify']['css'],
				"reorder" => $this->options['rocket']['reorder']
			),
			"page" => array(
				"cachedir" => $this->options['html_cachedir'],
				"cache_engine" => $this->premium ? $this->options['performance']['cache_engine'] : 0,
				"cache_engine_options" => $this->premium ? $this->options['performance']['cache_engine_options'] : '',
				"cachedir_relative" => str_replace($this->options['document_root'], "/", $this->options['html_cachedir']),
				"installdir" => $webo_cachedir,
				"host" => $this->options['host'],
				"gzip" => $this->options['gzip']['page'] &&
					((!$this->options['htaccess']['mod_gzip'] &&
							!$this->options['htaccess']['mod_deflate']) ||
						!$this->options['htaccess']['enabled']),
				"zlib" => $this->options['gzip']['zlib'],
				"gzip_noie" => $this->options['gzip']['noie'] &&
					$this->premium > 1,
				"gzip_level" => round($this->options['gzip']['page_level']),
				"gzip_cookie" => $this->options['gzip']['cookie'] &&
					$this->premium > 1,
				"minify" => $this->options['minify']['page'],
				"minify_aggressive" => $this->options['minify']['html_one_string'] &&
					$this->premium,
				"remove_comments" => $this->options['minify']['html_comments'] &&
					$this->premium,
				"dont_check_file_mtime" => $this->options['performance']['mtime'],
				"cache_images" => $this->options['far_future_expires']['images'],
				"far_future_expires_rewrite" => (!($this->options['htaccess']['mod_rewrite'] ||
						$this->options['htaccess']['mod_expires']) ||
					!$this->options['htaccess']['enabled']) &&
					$this->options['far_future_expires']['images'],
				"far_future_expires_external" => $this->options['far_future_expires']['external'],
				"clientside_cache" => $this->premium > 1 && $this->options['far_future_expires']['html'],
				"clientside_timeout" => $this->options['far_future_expires']['html_timeout'],
				"cache" => $this->options['html_cache']['enabled'] &&
					$this->premium,
				"cache_timeout" => $this->options['html_cache']['timeout'],
				"cart_timeout" => $this->premium > 1 ? $this->options['html_cache']['timeout_cart'] : 0,
				"ajax_timeout" => $this->premium > 1 ? $this->options['html_cache']['timeout_ajax'] : 0,
				"flush" => $this->options['html_cache']['flush_only'] &&
					$this->premium > 1,
				"flush_size" => $this->options['html_cache']['flush_size'],
				"cache_ignore" => $this->premium ? $this->options['html_cache']['ignore_list'] : '',
				"ignore_include" => $this->premium ? $this->options['html_cache']['ignore'] : '',
				"cache_params" => $this->premium > 1 ? $this->options['html_cache']['params'] : '',
				"allowed_user_agents" => $this->premium > 1 ? $this->options['html_cache']['allowed_list'] : '',
				"exclude_cookies" => $this->premium > 1 ? $this->options['html_cache']['additional_list'] : '',
				"parallel" => $this->options['parallel']['enabled'] && !empty($this->options['parallel']['allowed_list']),
				"parallel_regexp" => $this->premium > 1 ? $this->options['parallel']['regexp'] : '',
				"parallel_hosts" => $this->options['parallel']['allowed_list'],
				"parallel_satellites" => $this->options['parallel']['additional'],
				"parallel_satellites_hosts" => $this->options['parallel']['additional_list'],
				"parallel_ignore" => $this->options['parallel']['ignore_list'],
				"parallel_css" => $this->options['parallel']['css'] && !empty($this->options['parallel']['allowed_list']),
				"parallel_javascript" => $this->options['parallel']['javascript'] && !empty($this->options['parallel']['allowed_list']),
				"parallel_ftp" => $this->premium ? $this->options['parallel']['ftp'] : '',
				"parallel_https" => $this->premium > 1 ? $this->options['parallel']['https'] : '',
				"unobtrusive_informers" => $this->options['unobtrusive']['informers'] &&
					($this->premium > 1),
				"unobtrusive_counters" => $this->options['unobtrusive']['counters'] &&
					($this->premium > 1),
				"unobtrusive_ads" => $this->options['unobtrusive']['ads'] &&
					($this->premium > 1),
				"unobtrusive_all" => $this->options['unobtrusive']['all'] &&
					$this->premium,
				"unobtrusive_iframes" => $this->options['unobtrusive']['iframes'] &&
					($this->premium > 1),
				"unobtrusive_onload" => $this->options['unobtrusive']['on'] &&
					($this->premium > 1),
				"unobtrusive_inline" => $this->options['unobtrusive']['on'] == 2 &&
					($this->premium > 1),
				"unobtrusive_configuration" => $this->premium > 1 ? explode(" ", $this->options['unobtrusive']['configuration']) : array(),
				"postload" => $this->premium > 1 ? $this->options['unobtrusive']['postload'] : '',
				"postload_frames" => $this->premium > 1 ? $this->options['unobtrusive']['frames'] : '',
				"footer" => $this->options['footer']['text'],
				"footer_image" => $this->options['footer']['image'],
				"footer_text" => $this->options['footer']['link'],
				"footer_style" => $this->options['footer']['css_code'],
				"spot" => $this->premium ? $this->options['footer']['spot'] : 1,
				"counter" => $this->premium > 1 ? $this->options['footer']['counter'] : '',
				"ab" => $this->options['footer']['ab'] &&
					$this->premium > 1,
				"htaccess_username" => $this->premium > 1 ? $this->options['external_scripts']['user'] : '',
				"htaccess_password" => $this->premium > 1 ? $this->options['external_scripts']['pass'] : '',
				"html_tidy" => $this->options['performance']['plain_string'] &&
					$this->premium,
				"sprites" => $this->premium && $this->options['css_sprites']['html_sprites'],
				"sprites_domloaded" => $this->options['unobtrusive']['background'] &&
					$this->premium > 1,
				"dimensions_limited" => $this->premium ? round($this->options['css_sprites']['html_limit']) : 0,
				"per_page" => $this->premium && $this->options['css_sprites']['html_page'],
				"https_separate" => $this->premium > 1 ? $this->options['performance']['https'] : 0,
				"scale_images" => $this->premium > 1 ? $this->options['performance']['scale'] : 0,
				"scale_restriction" => $this->premium > 1 ? $this->options['performance']['scale_restriction'] : 0,
			),
			"document_root" => $this->options['document_root'],
			"document_root_relative" => str_replace("//", "/", str_replace($this->options['document_root'], "/", $this->options['website_root'])),
			"website_root" => $this->options['website_root'],
			"cache_version" => round($this->options['performance']['cache_version']) &&
				$this->premium > 1,
			"uniform_cache" => $this->options['performance']['uniform_cache'] &&
				$this->premium > 1,
			"plugins" => !empty($this->options['plugins']) &&
				$this->premium > 1 ? explode(" ", $this->options['plugins']) : '',
			"days_to_delete" => $this->premium > 1 ? round($this->options['performance']['delete_old']) : 0,
			"charset" => $this->options['charset'],
			"currency" => $this->premium > 1 ? $this->options['currency'] : '',
			'host' => $this->options['host'],
			"clean_html_cache" => $this->options['html_cache']['cleanup'] &&
				$this->premium > 1 ? $this->options['html_cache']['timeout'] : 0
		);
		$this->lc = $this->options['license'];
		$this->options = $full_options;
		if ($this->options['page']['parallel_css'] && empty($this->options['css']['host'])) {
			if ($this->options['page']['parallel_hosts']) {
				$hosts = explode(" ", $this->options['page']['parallel_hosts']);
				$this->options['css']['host'] = $hosts[0];
			} else {
				$this->options['page']['parallel_css'] = 0;
			}
		}
		if ($this->options['page']['parallel_javascript'] && empty($this->options['javascript']['host'])) {
			if ($this->options['page']['parallel_hosts']) {
				$hosts = explode(" ", $this->options['page']['parallel_hosts']);
				$this->options['javascript']['host'] = $hosts[0];
			} else {
				$this->options['page']['parallel_javascript'] = 0;
			}
		}
	}
	function set_gzip_encoding () {
		if (!empty($_SERVER["HTTP_ACCEPT_ENCODING"]) && !empty($this->options['page']['gzip'])) {
			$gzip_no_ie = !in_array($this->ua_mod, $this->ies) || empty($this->options['page']['gzip_noie']);
			$ae = strtolower($_SERVER["HTTP_ACCEPT_ENCODING"]);
			if (strpos($ae, 'x-gzip') !== false && $gzip_no_ie) {
				$this->encoding = 'x-gzip';
				$this->encoding_ext = '.gz';
			} elseif ((strpos($ae, 'gzip') !== false || !empty($_COOKIE['_wo_gzip'])) && $gzip_no_ie) {
				$this->encoding = 'gzip';
				$this->encoding_ext = '.gz';
			} elseif (strpos($ae, 'x-deflate') !== false) {
				$this->encoding = 'x-deflate';
				$this->encoding_ext = '.df';
			} elseif (strpos($ae, 'deflate') !== false) {
				$this->encoding = 'deflate';
				$this->encoding_ext = '.df';
			}
		} elseif (empty($_SERVER['HTTP_ACCEPT_ENCODING']) && !empty($_COOKIE['_wo_gzip'])) {
			$this->encoding = 'gzip';
			$this->encoding_ext = '.gz';
		}
	}
	function set_gzip_header () {
		if(!empty($this->encoding) && empty($this->gzip_set)) {
			@header("Vary: Accept-Encoding,User-Agent");
			@header("Content-Encoding: " . $this->encoding);
			if ($this->options['page']['zlib'] && strlen(@ini_get('zlib.output_compression_level'))) {
				@ini_set('zlib.output_compression', 'On');
				@ini_set('zlib.output_compression_level', $this->options['page']['gzip_level']);
				$this->encoding = '';
				$this->encoding_ext = '';
			}
			$this->gzip_set = 1;
		}
	}
	function set_gzip_headers () {
		$this->set_gzip_encoding();
		if ($this->options['page']['gzip'] && !$this->options['page']['flush'] && !$this->nogzip) {
			$this->set_gzip_header();
		}
	}
	function set_user_agent () {
		$this->ua_mod = '';
		if (!$this->options['performance']['uniform_cache']) {

			$this->min_ie_version = 5;

			$this->max_ie_version = 12;
			if (strpos($this->ua, 'MSIE') && strpos($this->ua, 'Opera') === false) {
				for ($version = $this->min_ie_version; $version < $this->max_ie_version; $version++) {
					if (strpos($this->ua, 'MSIE ' . $version)) {
						$this->ua_mod = '.ie' . $version;
					}
				}
			}
			if (empty($this->ua_mod)) {
				$mobiles = array(
					'Android',
					'BlackBerry',
					'HTC',
					'iPhone',
					'iPod',
					'LG',
					'MOT',
					'Mobile',
					'NetFront',
					'Nokia',
					'Opera Mini',
					'Palm',
					'PPC',
					'SAMSUNG',
					'Smartphone',
					'SonyEricsson',
					'Symbian',
					'UP.Browser',
					'webOS');
				$j = 0;
				while (!empty($mobiles[$j]) && strpos($this->ua, $mobiles[$j++]) === false) {}
				if ($j != count($mobiles)) {
					$this->ua_mod = '.ma';
				}
			}
		}
	}
	function start_cache_engine () {
		$cache_engines = array('0' => 'files',
			'1' => 'memcached',
			'2' => 'apc',
			'3' => 'xcache'
			);
		$cache_engines_options = array('0' => array('cache_dir' => $this->options['page']['cachedir']),
			'1' => array('server' => @$this->options['page']['cache_engine_options']),
			'2' => '',
			'3' => ''
			);
		if (!empty($cache_engines[$this->options['page']['cache_engine']])) {
			$engine_name = 'webo_cache_' . $cache_engines[$this->options['page']['cache_engine']];
			$engine_num = $this->options['page']['cache_engine'];
		} else {
			$engine_name = 'webo_cache_' . $cache_engines[0];
			$engine_num = 0;
		}
		include_once($this->options['page']['installdir'] . 'libs/php/cache_engine.php');
		$this->cache_engine = new $engine_name ($cache_engines_options[$engine_num]);
	}
	function clear_html_cache ($patterns) {
		if (!empty($patterns)) {
			$this->cache_engine->delete_entries($patterns);
		}
	}
	function convert_basehref ($uri) {
		if (!empty($this->basehref) &&
			strpos($uri, '//') !== 0 && !strpos($uri, '://')) {
				if ($uri{0} == '/') {
					return $this->basehref_url . $uri;
				} else {
					return $this->basehref . $uri;
				}
		} else {
			return $uri;
		}
	}
	function di ($clean = 0) {
		if (!$clean) {
			while (@ob_end_clean());
		}
		if (function_exists('fastcgi_finish_request')) {
			fastcgi_finish_request();
		}
		die();
	}

}

?>