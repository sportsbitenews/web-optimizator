<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Provides admin interface for Web Optimizer standalone application.
 *
 **/
class admin {
	/**
	* Constructor
	* Sets the options and defines the gzip headers
	**/
	function admin ($options = null) {
		if (!empty($options['skip_startup'])) {
			return;
		}
		if (function_exists('date_default_timezone_set')) {
			date_default_timezone_set('Europe/Moscow');
		}
		foreach ($options as $key => $value) {
			$this->$key = $value;
		}
		if (empty($this->skip_render)) {
/* Ensure no caching */
			header('Expires: ' . date("r"));
			header("Cache-Control: no-store, no-cache, must-revalidate, private");	
			header("Pragma: no-cache");
		}
/* Set name of options file */
		$this->options_file = "config.webo.php";
		require_once($this->basepath . $this->options_file);
		$this->compress_options = empty($compress_options) ? '' : $compress_options;
/* to check and download new Web Optimizer version */
		$this->svn = 'http://web-optimizator.googlecode.com/svn/trunk-stable/';
		$this->svn_beta = 'http://web-optimizator.googlecode.com/svn/trunk/';
		$this->version = @file_get_contents($this->basepath . 'version');
/* get the latest version */
		$version_new_file = 'version.new';
		if (in_array($this->input['wss_page'],
			array('install_dashboard',
				'install_set_password',
				'install_enter_password'))) {
			$this->view->download($this->svn . 'version', $version_new_file);
		}
		if (@is_file($version_new_file)) {
			$this->version_new = @file_get_contents($version_new_file);
			@unlink($version_new_file);
		} else {
			$this->version_new = $this->version;
		}
		if (!empty($compress_options)) {
			$this->compress_options['license'] =
				empty($this->input['wss_license']) ?
					$this->compress_options['license'] :
						$this->input['license'];
			$this->premium = $this->view->validate_license($this->compress_options['license'],
				$this->compress_options['html_cachedir'],
					$this->compress_options['host']);
			$this->access = in_array($this->input['wss_page'],
				array('install_enter_password', 'install_set_password'));
/* Make sure password valid */
			$this->check_password();
			if (!$this->access) {
				$this->input['wss_page'] = 'install_set_password';
			}
/* default multiple hosts */
			$this->default_hosts = array('img', 'img1', 'img2', 'img3', 'img4', 'i', 'i1', 'i2', 'i3', 'i4', 'image', 'images', 'assets', 'static', 'css', 'js');
			$this->version_new_exists = round(preg_replace("/\./", "", $this->version)) < round(preg_replace("/\./", "", $this->version_new)) ? 1 : 0;
/* Set page functions for the installation and admin, makes sure nothing else can be run */
			$this->page_functions = array(
				'install_set_password' => 1,
				'install_enter_password' => 1,
				'install_dashboard' => 1,
				'install_install' => 1,
				'install_uninstall' => 1,
				'install_promo' => 1,
				'install_about' => 1,
				'install_gzip' => 1,
				'install_image' => 1,
				'install_status' => 1,
				'install_account' => 1,
				'install_refresh' => 1,
				'install_cache' => 1,
				'install_renew' => 1,
				'install_options' => 1,
				'install_system' => 1,
				'dashboard_cache' => 1,
				'dashboard_system' => 1,
				'dashboard_options' => 1,
				'dashboard_speed' => 1,
				'compress_gzip' => 1,
				'compress_image' => 1,
				'options_configuration' => 1
			);
/* inializa stage for chained optimization */
			$this->web_optimizer_stage =
				round(empty($this->input['web_optimizer_stage']) ? 0 :
					$this->input['web_optimizer_stage']);
			$this->display_progress = false;
/* if we use .htaccess */
			$this->protected = isset($_SERVER['PHP_AUTH_USER']) &&
				$this->compress_options['username'] == md5($_SERVER['PHP_AUTH_USER']);
/* grade URL from webo.name */
			$this->webo_grade = 'http://webo.name/check/index2.php?url=' .
				$_SERVER['HTTP_HOST'] . '/' .
				str_replace($this->view->paths['full']['document_root'], '',
					$this->view->paths['absolute']['document_root']) .
				'&mode=xml&source=wo';
/* download counter */
			if (!is_file($this->basepath . 'web-optimizer-counter')) {
				$this->view->download('http://web-optimizator.googlecode.com/files/web-optimizer-counter',
					$this->basepath . 'web-optimizer-counter');
			}
		}
/* define constants for stats */
		$this->index_check = 'index.check';
		$this->index_before = 'index.before';
		$this->index_after = 'index.after';
/* initialize info about cache types */
		$this->cache_types = array(
			'js' => array('*.js', '*.js.gz'),
			'js_php' => array('*.php', '*.php.gz'),
			'css' => array('*.css', '*.css.gz'),
			'css_php' => array('*.php', '*.php.gz'),
			'res' => array('*.css.css', '*.css.css.gz', '*.php.php', '*.php.php.gz'),
			'sprites' => array('webo.*.png', 'webo.*.jpg'),
			'imgs' => array('*.png', '*.jpg', '*.gif', '*.bmp'),
			'html' => array('*+*')
		);
/* show page */
		if (!empty($this->input) &&
			!empty($this->page_functions[$this->input['wss_page']]) &&
			method_exists($this, $this->input['wss_page']) &&
			empty($this->skip_render)) {
				$func = $this->input['wss_page'];
				$this->$func();
		}
	}

	/*
	* Return size of specific (optimized images) files
	*
	**/
	function compress_image () {
		$file = realpath($this->input['wss_file']);
		$mtime = @filemtime($file);
		$size = @filesize($file);
		$backup = $file . '.backup';
		$compressed_size = $size;
		if (strpos($file, $this->view->paths['full']['document_root']) !== false) {
			if (!@is_file($backup) || $mtime != @filemtime($backup)) {
				require(dirname(__FILE__) . '/../libs/php/css.sprites.optimize.php');
				$optimizer = new css_sprites_optimize();
/* CSS Sprites uses .backup itself, so just prepare another backup */
				if (@is_file($backup)) {
					@copy($backup, $file . '.bkp');
				} else {
					@copy($file, $file . '.bkp');
				}
				$optimizer->website_root = $this->view->paths['full']['document_root'];
				$optimizer->smushit($file);
/* copy backup back */
				@copy($file . '.bkp', $backup);
				@unlink($file . '.bkp');
				$mtime2 = @filemtime($file);
/* Has file been changed? */
				$success = $mtime2 > $mtime ? 1 : 0;
				if ($success) {
					$compressed_size = @filesize($file);
				}
				@touch($backup, $mtime2);
			} else {
				$success = 1;
			}
		}
		$page_variables = array(
			"file" => $file,
			"size" => $size,
			"compressed" => $compressed_size,
			"success" => $success
		);
		$this->view->render("compress_gzip", $page_variables);
	}

	/*
	* Return size of specific (compressed) files
	*
	**/
	function compress_gzip () {
		$file = realpath($this->input['wss_file']);
		$mtime = @filemtime($file);
		$size = @filesize($file);
		$gzipped = $file . '.gz';
		$gzipped_size = $size;
		if (strpos($file, $this->view->paths['full']['document_root']) !== false) {
			if (!@is_file($gzipped) || $mtime != @filemtime($gzipped)) {
				$success = $this->write_file($gzipped,
					@gzencode(file_get_contents($file), 9, FORCE_GZIP));
				if ($success) {
					@touch($gzipped, $mtime);
					$gzipped_size = @filesize($gzipped);
				}
			} else {
				$success = 1;
				$gzipped_size = @filesize($gzipped);
			}
		}
		$page_variables = array(
			"file" => $file,
			"size" => $size,
			"compressed" => $gzipped_size,
			"success" => $success
		);
		$this->view->render("compress_gzip", $page_variables);
	}

	/*
	* Renders account page
	*
	**/
	function install_account () {
		$allow = $this->compress_options['optimization'];
		$email = $this->compress_options['email'];
		$name = $this->compress_options['name'];
		$license = $this->compress_options['license'];
		$error = array();
		if (!empty($this->input['wss_Submit'])) {
			$email = $this->input['wss_email'];
			$allow = empty($this->input['wss_allow']) ? 0 : 1;
			$license = trim($this->input['wss_license']);
			$name = $this->input['wss_name'];
			if (md5($this->input['wss_password']) !=
				$this->input['wss__password']) {
				$error[1] = 1;
			}
			if (empty($this->input['wss_email']) ||
				!preg_match("/.+@.+\..+/", $this->input['wss_email'])) {
				$error[2] = 1;
			}
			if (!empty($this->input['wss_new']) &&
				(empty($this->input['wss_confirm']) ||
					$this->input['wss_confirm'] !=
						$this->input['wss_new'])) {
				$error[3] = 1;
			}
			$this->premium = $this->view->validate_license($license);
/* save new options */
			if (!count($error)) {
				$this->save_option("['email']", htmlspecialchars($email));
				$this->save_option("['optimization']", $allow);
				$this->save_option("['license']", htmlspecialchars($license));
				$this->save_option("['name']", htmlspecialchars($name));
				if (!empty($this->input['wss_new'])) {
					$this->save_option("['password']", md5($this->input['wss_new']));
				}
			}
		}
		$expires = -1;
		if (empty($this->premium) && !empty($license)) {
			$error[4] = 1;
		} else {
			$expires = @file_get_contents($this->compress_options['html_cachedir'] . 'wo');
		}
		$page_variables = array(
			"version" => $this->version,
			"premium" => $this->premium,
			"submit" => $this->input['wss_Submit'],
			"expires" => $expires,
			"allow" => $allow,
			"email" => $email,
			"name" => $name,
			"license" => $license,
			"error" => $error,
			
		);
		$this->view->render("install_account", $page_variables);
	}
	
	/*
	* Renders about page
	*
	**/
	function install_about () {
		$email = empty($this->input['wss_email']) ? '' : $this->input['wss_email'];
		$message = empty($this->input['wss_message']) ? '' : $this->input['wss_message'];
		$error = array();
		if (!empty($this->input['wss_Submit'])) {
			if (empty($email) ||
				!preg_match("/.+@.+\..+/", $email)) {
				$error[1] = 1;
			}
			if (empty($message)) {
				$error[2] = 1;
			}
/* send a email to info@webo.name */
			if (!count($error)) {
				$this->send_message($email, $message);
			}
		}
		$page_variables = array(
			"version" => $this->version,
			"premium" => $this->premium,
			"email" => $email,
			"message" => $message,
			"error" => $error
		);
		$this->view->render("install_about", $page_variables);
	}

	/*
	* Sends a message from given e-mail
	*
	**/
	function send_message ($email, $message) {
		$headers = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";
		$headers .= 'Content-Type: text/plain; charset=utf-8'."\r\n";
		$headers .= 'Content-Transfer-Encoding: base64';
		$message .= "\r\n\r\nSystem Info:\r\n" .
			"Host: " . $_SERVER['HTTP_HOST'] . "\r\n";
			"Options: host => " . $this->compress_options['host'] . "\r\n";
		foreach ($this->compress_options as $ko => $opts) {
			if (is_array($opts)) {
				foreach ($opts as $k => $v) {
					$message .= $ko . " "  . $k  . " => " . $v . "\r\n";
				}
			}
		}
		@mail('info@webo.name', "=?latin-1?B?" .
			base64_encode('New message from WEBO Site SpeedUp') . "?=",
				base64_encode($message), $headers);
	}

	/*
	* Renders cache refresh (from cache page)
	*
	**/
	function install_renew () {
		$this->write_progress(1);
		$this->install_clean_cache(0, 1);
		$this->save_option("['performance']['cache_version']", 0);
		$this->chained_load('/');
		$this->save_option("['performance']['cache_version']", $this->compress_options['performance']['cache_version']);
		$this->install_cache();
	}

	/*
	* Renders cache refresh (from dashboard)
	*
	**/
	function install_refresh () {
		$this->write_progress(1);
		$this->install_clean_cache(0, 1);
		$this->save_option("['performance']['cache_version']", 0);
		$this->chained_load('/');
		$this->save_option("['performance']['cache_version']", $this->compress_options['performance']['cache_version']);
		$this->install_dashboard();
	}

	/*
	* Renders change of application status
	*
	**/
	function install_status () {
		if (empty($this->compress_options['active'])) {
			$this->chained_load('/');
			$this->write_htaccess();
			$this->compress_options['active'] = 1;
		} else {
			$this->save_option("['active']", 0);
			$this->compress_options['active'] = 0;
		}
		$this->install_dashboard();
	}

	/*
	* Return info for specific files
	*
	**/
	function install_cache_info ($mask, $type) {
		$return = array();
		foreach (glob($mask) as $filename) {
			$browser = 0;
			if ($a = strpos($filename, '.ie')) {
				$browser = round($filename{$a+3}) - 4;
/* switch ie4 case to IE7@Vista */
				$browser = $browser ? $browser : 10;
			}
			$return[$filename] = array(
				$type,
				@filemtime($filename),
				@filesize($filename),
				$browser
			);
		}
		return $return;
	}

	/*
	* Return info about all cached files
	*
	**/
	function install_cache () {
		$files = array();
		if (!empty($this->compress_options['css_cachedir'])) {
			@chdir($this->compress_options['css_cachedir']);
			foreach ($this->cache_types['css'] as $mask) {
				$files = array_merge($files, $this->install_cache_info($mask, 2));
			}
			foreach ($this->cache_types['css_php'] as $mask) {
				$files = array_merge($files, $this->install_cache_info($mask, 3));
			}
			foreach ($this->cache_types['res'] as $mask) {
				$files = array_merge($files, $this->install_cache_info($mask, 4));
			}
			foreach ($this->cache_types['imgs'] as $mask) {
				$files = array_merge($files, $this->install_cache_info($mask, 6));
			}
			foreach ($this->cache_types['sprites'] as $mask) {
				$files = array_merge($files, $this->install_cache_info($mask, 5));
			}
		}
		if (!empty($this->compress_options['javascript_cachedir'])) {
			@chdir($this->compress_options['javascript_cachedir']);
			foreach ($this->cache_types['js'] as $mask) {
				$files = array_merge($files, $this->install_cache_info($mask, 0));
			}
			if (empty($this->compress_options['css_cachedir']) ||
				$this->compress_options['css_cachedir'] != 
				$this->compress_options['javascript_cachedir']) {
				foreach ($this->cache_types['js_php'] as $mask) {
					$files = array_merge($files, $this->install_cache_info($mask, 1));
				}
			}
		}
		if (!empty($this->compress_options['html_cachedir'])) {
			@chdir($this->compress_options['html_cachedir']);
			foreach ($this->cache_types['html'] as $mask) {
				$files = array_merge($files, $this->install_cache_info($mask, 7));
			}
		}
		$total = 0;
		foreach ($files as $file) {
			$total += $file[2];
		}
		$page_variables = array(
			'files' => $files,
			'total' => $total,
			'premium' => $this->premium
		);
		$this->view->render("install_cache", $page_variables);
	}

	/*
	* Return size of specific files
	*
	**/
	function dashboard_cache_size ($mask) {
		$return = 0;
		foreach (glob($mask) as $filename) {
			$return += @filesize($filename);
		}
		return $return;
	}

	/*
	* Renders block with cache information for dashboard
	*
	**/
	function dashboard_cache () {
		$res = $css = $css_php = $js = $js_php = $html = $sprites = $imgs = 0;
/* get size of JS files */
		if (!empty($this->compress_options['javascript_cachedir'])) {
			@chdir($this->compress_options['javascript_cachedir']);
			foreach ($this->cache_types['js'] as $mask) {
				$js += $this->dashboard_cache_size($mask);
			}
			foreach ($this->cache_types['js_php'] as $mask) {
				$js_php += $this->dashboard_cache_size($mask);
			}
		}
/* get size of CSS files */
		if (!empty($this->compress_options['css_cachedir'])) {
			@chdir($this->compress_options['css_cachedir']);
			foreach ($this->cache_types['css'] as $mask) {
				$css += $this->dashboard_cache_size($mask);
			}
			foreach ($this->cache_types['css_php'] as $mask) {
				$css_php += $this->dashboard_cache_size($mask);
			}
			foreach ($this->cache_types['res'] as $mask) {
				$res += $this->dashboard_cache_size($mask);
			}
/* exclude from CSS resource files */
			$css -= $res;
/* get CSS Sprites size */
			foreach ($this->cache_types['sprites'] as $mask) {
				$sprites += $this->dashboard_cache_size($mask);
			}
/* get size of images */
			foreach ($this->cache_types['imgs'] as $mask) {
				$imgs += $this->dashboard_cache_size($mask);
			}
/* Exclude Sprites from images */
			$imgs -= $sprites;
		}
/* get size of HTML files */
		if (!empty($this->compress_options['html_cachedir'])) {
			@chdir($this->compress_options['html_cachedir']);
			foreach ($this->cache_types['html'] as $mask) {
				$html += $this->dashboard_cache_size($mask);
			}
		}
/* distribute general PHP files between CSS and JS */
		if (!empty($this->compress_options['css_cachedir']) &&
			!empty($this->compress_options['javascript_cachedir']) &&
			$this->compress_options['javascript_cachedir'] ==
			$this->compress_options['css_cachedir']) {
				$css_php = $css_php / 3;
				$js_php = $js_php * 2 / 3;
		}
		$css += $css_php;
		$js += $js_php;
		foreach ($this->cache_types as $key => $val) {
			if (!empty($$key)) {
				$$key = round($$key / 1024);
			}
		}
		$page_variables = array(
			'css' => $css,
			'js' => $js,
			'res' => $res,
			'html' => $html,
			'sprites' => $sprites,
			'imgs' => $imgs,
			'total' => $css + $js + $res + $html + $sprites + $imgs
		);
		$this->view->render("dashboard_cache", $page_variables);
	}

	/*
	* Check Web Optimizer acceleration
	*
	**/	
	function dashboard_speed () {
		$this->check_acceleration();
		$saved_kb = $saved_s = $saved_percent = 0;
		$before = @file_get_contents($this->index_before);
		$after = @file_get_contents($this->index_after);
/* parse files' content for calculated load speed */
		if (!empty($before) && !empty($after)) {
			$s_before = substr($before, strpos($before, '<high>') + 6, strpos($before, '</high>') - strpos($before, '<high>') - 6);
			$kb_before = round(substr($before, strpos($before, '</number><size>') + 15, strpos($before, '</size><file>') - strpos($before, '</number><size>') - 15));
			if (strpos($after, '<high>')) {
				$s_after = substr($after, strpos($after, '<high>') + 6, strpos($after, '</high>') - strpos($after, '<high>') - 6);
				$kb_after = round(substr($after, strpos($after, '</number><size>') + 15, strpos($after, '</size><file>') - strpos($after, '</number><size>') - 15));
			}
			if (!empty($kb_before) && !empty($kb_after)) {
				$saved_s = $s_before - $s_after;
				$saved_kb = $kb_before - $kb_after;
/* do not show negative numbers */
				if ($saved_s <= 0) {
					$s_after = 0;
				}
				if ($saved_kb <= 0) {
					$kb_after = 0;
				}
			}
		}
/* set variables */
		$page_variables = array(
			's_after' => $s_after,
			's_before' => $s_before,
			'kb_after' => $kb_after,
			'kb_before' => $kb_before,
			'premium' => $this->premium
		);
/* Output data */
		$this->view->render("dashboard_speed", $page_variables);
	}

	/*
	* Check Web Optimizer options
	*
	**/
	function dashboard_options () {
		if (!empty($this->compress_options['active'])) {
/* get available Apache modules */
			$this->get_modules();
/* check if .htaccess is avaiable */
			$htaccess_available = count($this->apache_modules) ? 1 : 0;
			$apache2 = 0;
			if (function_exists('apache_get_version')) {
				$apache2 = strpos(apache_get_version(), "/2");
			}
/* fill array with errors */
			$errors = array();
			$value = 5;
/* first priority issues */
			if (empty($this->compress_options['data_uris']['on']) &&
				$this->premium > 0) {
					$errors['data_uris_on'] = $value;
			}
			if (empty($this->compress_options['css_sprites']['enabled']) &&
				$this->premium > 1) {
					$errors['css_sprites_enabled'] = $value;
			}
			if (empty($this->compress_options['parallel']['enabled']) &&
				$this->premium > 1) {
					$errors['parallel_enabled'] = $value;
			}
			if (empty($this->compress_options['performance']['mtime']) &&
				$this->premium > 0) {
				$errors['performance_mtime'] = $value;
			}
			if (empty($this->compress_options['performance']['plain_string']) &&
				$this->premium > 1) {
					$errors['performance_plain_string'] = $value;
			}
			if (empty($this->compress_options['htaccess']['enabled']) ||
				!$htaccess_available) {
					$errors['htaccess_enabled'] = $value;
			}
/* second priority issues */
			$value = 4;
			if (empty($this->compress_options['unobtrusive']['ads']) &&
				$this->premium > 1) {
					$errors['unobtrusive_ads'] = $value;
			}
			if (empty($this->compress_options['unobtrusive']['informers']) &&
				$this->premium > 1) {
					$errors['unobtrusive_informers'] = $value;
			}
			if (empty($this->compress_options['gzip']['cookie']) &&
				$this->premium > 1) {
					$errors['gzip_cookie'] = $value;
			}
			if (empty($this->compress_options['performance']['quick_check']) &&
				$this->premium > 1) {
				$errors['performance_quick_check'] = $value;
			}
			if (empty($this->compress_options['unobtrusive']['body']) &&
				$this->premium > 1) {
					$errors['unobtrusive_body'] = $value;
			}
			if ((empty($this->compress_options['htaccess']['mod_deflate']) ||
				!in_array('mod_deflate', $this->apache_modules))) {
					$errors['htaccess_mod_deflate'] = $value;
			} elseif (!in_array('mod_deflate', $this->apache_modules) &&
				(empty($this->compress_options['htaccess']['mod_gzip']) ||
					!in_array('mod_gzip', $this->apache_modules)) &&
				!$apache) {
					$errors['htaccess_mod_gzip'] = $value;
			}
/* third priority issues */
			$value = 3;
			if (empty($this->compress_options['performance']['cache_version']) &&
				$this->premium > 1) {
				$errors['performance_cache_version'] = $value;
			}
			if (empty($this->compress_options['unobtrusive']['counters']) &&
				$this->premium > 1) {
					$errors['unobtrusive_informers'] = $value;
			}
			if (empty($this->compress_options['gzip']['page'])) {
				$errors['gzip_page'] = $value;
			}
			if (empty($this->compress_options['minify']['javascript'])) {
				$errors['minify_javascript'] = $value;
			}
			if (empty($this->compress_options['unobtrusive']['iframes']) &&
				$this->premium > 1) {
					$errors['unobtrusive_iframes'] = $value;
			}
/* fourth priority issues */
			$value = 2;
			if (empty($this->compress_options['minify']['css'])) {
				$errors['minify_css'] = $value;
			}
			if (empty($this->compress_options['htaccess']['mod_expires']) ||
				!in_array('mod_expires', $this->apache_modules)) {
					$errors['htaccess_mod_expires'] = $value;
			}
			if (empty($this->compress_options['gzip']['css'])) {
				$errors['gzip_css'] = $value;
			}
			if (empty($this->compress_options['gzip']['javascript'])) {
				$errors['gzip_javascript'] = $value;
			}
			if (empty($this->compress_options['minify']['html_comments']) &&
				$this->premium > 1) {
					$errors['minify_html_comments'] = $value;
			}
			if (empty($this->compress_options['data_uris']['separate']) &&
				$this->premium > 1) {
					$errors['data_uris_separate'] = $value;
			}
			if (empty($this->compress_options['htaccess']['mod_rewrite']) ||
				!in_array('mod_rewrite', $this->apache_modules)) {
					$errors['htaccess_mod_rewrite'] = $value;
			}
			if (empty($this->compress_options['far_future_expires']['css'])) {
				$errors['far_future_expires_css'] = $value;
			}
/* fifth priority issues */
			$value = 1;
			if (empty($this->compress_options['far_future_expires']['javascript'])) {
				$errors['far_future_expires_javascript'] = $value;
			}
			if (empty($this->compress_options['far_future_expires']['images'])) {
				$errors['far_future_expires_images'] = $value;
			}
			if (empty($this->compress_options['external_scripts']['on'])) {
				$errors['external_scripts_on'] = $value;
			}
			if (empty($this->compress_options['htaccess']['mod_headers']) ||
				!in_array('mod_headers', $this->apache_modules)) {
					$errors['htaccess_mod_headers'] = $value;
			}
			if (empty($this->compress_options['minify']['javascript'])) {
				$errors['minify_javascript'] = $value;
			}
			if (empty($this->compress_options['external_scripts']['css'])) {
				$errors['external_scripts_css'] = $value;
			}
			if (empty($this->compress_options['external_scripts']['inline'])) {
				$errors['external_scripts_inline'] = $value;
			}
			if (empty($this->compress_options['external_scripts']['css_inline'])) {
				$errors['external_scripts_css_inline'] = $value;
			}
			if (empty($this->compress_options['gzip']['fonts'])) {
				$errors['gzip_fonts'] = $value;
			}
			if (empty($this->compress_options['minify']['page'])) {
				$errors['minify_page'] = $value;
			}
			if (empty($this->compress_options['htaccess']['mod_setenvif']) ||
				!in_array('mod_setenvif', $this->apache_modules)) {
					$errors['htaccess_mod_setenvif'] = $value;
			}
			if (empty($this->compress_options['htaccess']['mod_mime']) ||
				!in_array('mod_mime', $this->apache_modules)) {
					$errors['htaccess_mod_mime'] = $value;
			}
			if (empty($this->compress_options['far_future_expires']['fonts'])) {
				$errors['far_future_expires_fonts'] = $value;
			}
			if (empty($this->compress_options['far_future_expires']['video'])) {
				$errors['far_future_expires_video'] = $value;
			}
			if (empty($this->compress_options['far_future_expires']['static'])) {
				$errors['far_future_expires_static'] = $value;
			}
/* count delta */
			$deltas = array(58, 48, 0);
			$delta = $deltas[round($this->premium)];
			foreach ($errors as $key => $value) {
				$delta += $value;
			}
		} else {
			$delta = 100;
			$errors = array();
		}
/* set variables */
		$page_variables = array(
			'errors' => $errors,
			'delta' => $delta,
			'premium' => $this->premium
		);
/* Output data */
		$this->view->render("dashboard_options", $page_variables);
	}

	/*
	* Check server requirements for Web Optimizer
	*
	**/
	function dashboard_system ($return = false) {
/* get available Apache modules */
		$this->get_modules();
/* get PHP extensions */
		$extensions = @get_loaded_extensions();
/* get GDlib info */
		$gd = function_exists('gd_info') ? gd_info() : array();
/* set default paths */
		$this->view->set_paths();
/* calculate directories */
		$javascript_cachedir = empty($this->compress_options['javascript_cachedir']) ? $this->view->paths['full']['current_directory'] . 'cache/' : $this->compress_options['javascript_cachedir'];
		$css_cachedir = empty($this->compress_options['css_cachedir']) ? $this->view->paths['full']['current_directory'] . 'cache/' : $this->compress_options['css_cachedir'];
		$html_cachedir = empty($this->compress_options['html_cachedir']) ? $this->view->paths['full']['current_directory'] . 'cache/' : $this->compress_options['html_cachedir'];
		$website_root = empty($this->compress_options['website_root']) ? $this->view->paths['absolute']['document_root'] : $this->compress_options['website_root'];
		$document_root = empty($this->compress_options['document_root']) ? $this->view->paths['full']['document_root'] : $this->compress_options['document_root'];
/* check for YUI */
		$YUI_available = 0;
		if (is_file($this->basepath . 'libs/php/class.yuicompressor4.php') || is_file($this->basepath . 'libs/php/class.yuicompressor.php')) {
			if (substr(phpversion(), 0, 1) == 4) {
				require_once($this->basepath . 'libs/php/class.yuicompressor4.php');
			} else {
				require_once($this->basepath . 'libs/php/class.yuicompressor.php');
			}
			$YUI = new YuiCompressor($javascript_cachedir, $this->basepath);
			$YUI_checked = $YUI->check();
		}
/* check if .htaccess is avaiable */
		$htaccess_available = count($this->apache_modules) ? 1 : 0;
/* check for multiple hosts */
		$hosts = empty($this->compress_options['parallel']['allowed_list']) ? $this->default_hosts : explode(" ", $this->compress_options['parallel']['allowed_list']);
		if (!empty($this->compress_options['parallel']['check'])) {
			$hosts = $this->check_hosts($hosts);
		}
/* try to get and increase memory limit */
		$memory_limit = @ini_get('memory_limit');
/* 64M must enough for any operations with images */
		if (round(str_replace("M", "000000", str_replace("K", "000", $memory_limit))) < 64000000) {
			@ini_set('memory_limit', '64M');
			$memory_limit = @ini_get('memory_limit');
		}
		$apache2 = 0;
		if (function_exists('apache_get_version')) {
			$apache2 = strpos(apache_get_version(), "/2");
		}
		$errors = array(
			'javascript_writable' => is_writable($javascript_cachedir),
			'css_writable' => is_writable($css_cachedir),
			'html_writable' => is_writable($html_cachedir),
			'config_writable' => is_writable($this->basepath . $this->options_file),
			'memory_limit' => round($memory_limit) > 16
		);
		$warnings = array(
			'htaccess_writable' => !$htaccess_available ||
				is_writable($website_root) ||
				is_writable($website_root . '.htaccess'),
			'index_writable' => is_writable($website_root . 'index.php'),
			'curl_possibility' => in_array('curl', $extensions) &&
				function_exists('curl_init'),
			'gzip_possibility' => in_array('zlib', $extensions) &&
				function_exists('gzencode') &&
				function_exists('gzcompress') &&
				function_exists('gzdeflate'),
			'gd_possibility' => in_array('gd', $extensions) &&
				function_exists('imagecreatetruecolor'),
			'gd_full_support' => !(in_array('gd', $extensions) &&
					function_exists('imagecreatetruecolor')) ||
				(!empty($gd['GIF Read Support']) &&
					!empty($gd['GIF Create Support']) &&
					!empty($gd['JPG Support']) &&
					!empty($gd['PNG Support']) &&
					!empty($gd['WBMP Support'])),
			'mod_deflate' => in_array('mod_deflate', $this->apache_modules),
			'mod_gzip' => in_array('mod_gzip', $this->apache_modules) ||
				$apache2,
			'mod_headers' => in_array('mod_headers', $this->apache_modules),
			'mod_expires' => in_array('mod_expires', $this->apache_modules),
			'mod_mime' => in_array('mod_mime', $this->apache_modules),
			'mod_setenvif' => in_array('mod_setenvif', $this->apache_modules),
			'mod_rewrite' => in_array('mod_rewrite', $this->apache_modules),
			'mod_symlinks' => in_array('mod_symlinks', $this->apache_modules),
			'yui_possibility' => empty($YUI_checked) ? 0 : 1,
			'hosts_possibility' => count($hosts) > 0 && !empty($hosts[0]),
			'protected_mode' => empty($this->protected) ? 0 : 1,
			'cms' => $this->system_info($website_root),
			'memory_limit' => round($memory_limit) > 32
		);
		$e = $w = 0;
/* count acturl troubles / warnings */
		foreach ($errors as $key => $value) {
			if (empty($value)) {
				$e++;
			}
		}
		foreach ($warnings as $key => $value) {
			if (empty($value)) {
				$w++;
			}
		}
/* set variables */
		$page_variables = array(
			'errors' => $errors,
			'warnings' => $warnings,
			'e' => $e,
			'w' => $w
		);
		if (!$return) {
/* Output data */
			$this->view->render("dashboard_system", $page_variables);
		} else {
			return $page_variables;
		}
	}

	/**
	* Outputs page with general info about system / common actions
	* 
	**/		
	function install_system ($success = 0) {
		if (empty($this->cms_version)) {
			$this->cms_version = $this->system_info($this->view->paths['absolute']['document_root']);
		}
/* get basic errors / warnings */
		$page_variables = $this->dashboard_system(1);
/* sey all other variables */
		$page_variables['version'] = $this->version;
		$page_variables['version_new'] = $this->version_new;
		$page_variables['language'] = $this->language;
		$page_variables['premium'] = $this->premium;
		$page_variables['password'] = $this->compress_options['password'];
		$page_variables['active'] = $this->compress_options['active'];
		$page_variables['website'] = $_SERVER['HTTP_HOST'];
		$page_variables['cache_folder'] = str_replace($this->compress_options['document_root'],
				"/", $this->compress_options['html_cachedir']);
		$page_variables['host'] = $this->compress_options['host'];
		$page_variables['website_root'] = $this->compress_options['website_root'];
		$page_variables['document_root'] = $this->compress_options['document_root'];
		$page_variables['css_cachedir'] = $this->compress_options['css_cachedir'];
		$page_variables['javascript_cachedir'] = $this->compress_options['javascript_cachedir'];
		$page_variables['html_cachedir'] = $this->compress_options['html_cachedir'];
		$page_variables['current_directory'] = dirname(__FILE__) . '/';
		$page_variables['htpasswd'] = $this->compress_options['htaccess']['access'];
		$page_variables['username'] = $this->compress_options['username'];
		$page_variables['external_scripts_user'] = $this->compress_options['external_scripts']['user'];
		$page_variables['external_scripts_pass'] = $this->compress_options['external_scripts']['pass'];
		$page_variables['showbeta'] = $this->compress_options['showbeta'];
		$page_variables['files_to_change'] = $this->system_files($this->cms_version);
		$page_variables['cms_version'] = $this->cms_version;
		$page_variables['success'] = $success;
/* Output data */
		$this->view->render("install_system", $page_variables);
	}

	/**
	* Write installation progress to JavaScript file
	* 
	**/	
	function write_progress ($progress, $init = false) {
		$file = (empty($this->input['user']['javascript_cachedir']) ?
			($this->view->paths['full']['current_directory'] . 'cache/') :
				$this->input['user']['javascript_cachedir']) .
					'progress.html';
		if ($this->display_progress || $init) {
			$return = $this->write_file($file, $progress, 1);
			if (!empty($return)) {
				if ($progress == 100) {
					@unlink($file);
				}
				return true;
			}
			return false;
		}
	}

	/**
	* Refresh results about acceleration
	* 
	**/		
	function check_acceleration () {
		$before = @filesize($this->index_before);
		$after = @filesize($this->index_after);
		if ($this->premium > 1) {
			if (!empty($this->compress_options['active']) &&
				$before && (empty($after) || $after < 200)) {
/* Request to re-check should be done on options save */
					$this->view->download($this->webo_grade, $this->index_after, 1);
			} elseif (empty($before) || $before < 200) {
				$this->view->download($this->webo_grade, $this->index_before, 1);
			}
		}
	}

	/**
	* The login page -- to define password
	* 
	**/	
	function install_enter_password () {
/* check for Web Optimizer existence on the website */
		if (@filesize($this->index_check)) {
			$installed = strpos(@file_get_contents($this->index_check), 'lang="wo"') || empty($this->compress_options['footer']['spot']);
			@unlink($this->index_check);
		} else {
/* curl doesn't work -- can't check existence */
			$installed = 1;
		}
/* fix double gzip: WO isn't installed, but page is gzipped */
		if (!$installed && !empty($gzipped)) {
			$this->save_option("['gzip']['wss_page']", 0);
		}
		$this->check_acceleration;
		$page_variables = array(
			"title" => _WEBO_LOGIN_TITLE,
			"page" => 'install_enter_password',
			"version" => $this->version,
			"premium" => true,
			"language" => $this->language
		);
		$this->view->render("admin_container", $page_variables);
	}

	/**
	* Page with version comparison
	* 
	**/		
	function install_promo() {
		$page_variables = array(
			"title" => _WEBO_SPLASH2_COMPARISON,
			"page" => 'install_promo',
			"version" => $this->version,
			"promo" => true,
			"premium" => true,
			"password" => $this->compress_options['password'],
			"language" => $this->language
		);
		$this->view->render("admin_container", $page_variables);
	}

	/**
	* Home page (dashboard), control panel
	* 
	**/		
	function install_dashboard() {
		@unlink($this->compress_options['html_cachedir'] . 'progress.html');
		$page_variables = array(
			"title" => _WEBO_SPLASH2_CONTROLPANEL,
			"page" => 'install_dashboard',
			"version" => $this->version,
			"version_new" => $this->version_new,
			"language" => $this->language,
			"premium" => $this->premium,
			"password" => $this->compress_options['password'],
			"active" => $this->compress_options['active'],
			"website" => $_SERVER['HTTP_HOST'],
			"cache_folder" => str_replace($this->compress_options['document_root'],
				"/", $this->compress_options['html_cachedir']),
			"cookie" => empty($_COOKIE['wss_blocks']) ? '' : $_COOKIE['wss_blocks']
		);
		$this->view->render("admin_container", $page_variables);
	}

	/**
	* The very first page -- to define e-mail and password
	* 
	**/	
	function install_set_password() {
		$no_initial_grade = !@filesize($this->index_before);
		$username = empty($this->input['wss_username']) ? '' : $this->input['wss_username'];
		$password = empty($this->input['wss_password']) ? '' : $this->input['wss_password'];
		$confirm = empty($this->input['wss_confirm']) ? '' : $this->input['wss_confirm'];
		$license = empty($this->input['wss_license']) ? '' : $this->input['wss_license'];
		$email = empty($this->input['wss_email']) ? '' : $this->input['wss_email'];
		$confirmagreement = empty($this->input['wss_confirmagreement']) ? '' : $this->input['wss_confirmagreement'];
		$submit = empty($this->input['wss_Submit']) ? '' : $this->input['wss_Submit'];
/* try to get reliminary optimization grade for the website */
		if ($no_initial_grade) {
			$this->view->download($this->webo_grade, $this->index_before, 1);
		}
		$gzipped = $this->view->download('http' . (empty($_SERVER['HTTPS']) ? '' : 's') . '://' . $_SERVER['HTTP_HOST'], $this->index_check);
		if (!empty($this->compress_options['password'])) {
			$this->install_enter_password($this->index_check, $this->index_before);
		} else {
/* disable gzip for HTML as we alsredy have it */
			if (!empty($gzip)) {
				$this->save_option("['gzip']['wss_page']", 0);
			}
/* check if we can display progress bar */
			$this->display_progress = $this->write_progress($this->web_optimizer_stage = 0, true);
			$error = array();
			if (!empty($submit)) {
				if (empty($password)) {
					$error[1] = 1;
				}
				if (empty($password) || empty($confirm) || $password != $confirm) {
					$error[2] = 1;
				}
				if (empty($email) ||
					!preg_match("/.+@.+\..+/", $email)) {
						$error[3] = 1;
				}
				if (empty($confirmagreement)) {
					$error[4] = 1;
				}
			}
			if (count($error) || empty($this->input['wss_Submit'])) {
				$page_variables = array(
					"title" => _WEBO_NEW_ENTER,
					"page" => 'install_set_password',
					"version" => $this->version,
					"error" => $error,
					"username" => $username,
					"password" => $password,
					"confirm" => $confirm,
					"license" => $license,
					"email" => $email,
					"confirmagreement" => $confirmagreement,
					"submit" => $submit,
					"premium" => true,
					"javascript_relative_cachedir" => str_replace($this->compress_options['document_root'], "/", $this->compress_options['javascript_cachedir']),
					"language" => $this->language
				);
/* Show the install page */
				$this->view->render("admin_container", $page_variables);
			} else {
				$this->compress_options['password'] = md5($this->input['wss_password']);
				$this->save_option("['password']", $this->compress_options['password']);
				$this->save_option("['email']", htmlspecialchars($this->input['wss_email']));
				$this->save_option("['username']", htmlspecialchars($this->input['wss_username']));
				$this->save_option("['name']", htmlspecialchars($this->input['wss_username']));
				$this->install_install(1);
				$this->install_dashboard();
			}
		}
	}

	/**
	* Clean up cache
	* 
	**/	
	function install_clean_cache ($redirect = true, $ajax = false) {
/* if all directories haven't been set yet -- just success */
		$success = false || (empty($this->compress_options['css_cachedir']) && empty($this->compress_options['javascript_cachedir']) && empty($this->compress_options['html_cachedir']));
		$deleted_css = true;
		$deleted_js = true;
		$deleted_html = true;
		$restricted = array('.', '..', 'yass.loader.js', 'progress.html', '.svn', 'wo.cookie.php', 'web.optimizer.stamp.png', 'wo.static.php', 'wo');
/* css cache */
		if ($dir = @opendir($this->compress_options['css_cachedir'])) {
			while ($file = @readdir($dir)) {
				if (!in_array($file, $restricted) && is_file($this->compress_options['css_cachedir'] . $file)) {
					if (!@unlink($this->compress_options['css_cachedir'] . $file)) {
						$deleted_css = false;
					}
				}
			}
			$success = true;
		}
/* javascript cache */
		if ($dir = @opendir($this->compress_options['javascript_cachedir'])) {
			while ($file = @readdir($dir)) {
				if (!in_array($file, $restricted) && is_file($this->compress_options['javascript_cachedir'] . $file)) {
					if (!@unlink($this->compress_options['javascript_cachedir'] . $file)) {
						$deleted_js = false;
					}
				}
			}
			$success = true;
		}
/* html cache */
		if ($dir = @opendir($this->compress_options['html_cachedir'])) {
			while ($file = @readdir($dir)) {
				if (!in_array($file, $restricted) && is_file($this->compress_options['html_cachedir'] . $file)) {
					if (!@unlink($this->compress_options['html_cachedir'] . $file)) {
						$deleted_html = false;
					}
				}
			}
			$success = true;
		}
		if ($success && $deleted_css && $deleted_js && $deleted_html) {
			if ($redirect || !$ajax) {
				if (!empty($this->compress_options['auto_rewrite']['chained'])) {
/* create all new cached files */
					$this->chained_load(str_replace(
						$this->compress_options['document_root'], "/" ,
							$this->compress_options['website_root']) . 'index.php');
				}
/* redirect to the main page */
				header("Location: index.php?cleared=1");
				die();
			}
		} elseif (!$ajax) {
			$this->error("<p>". _WEBO_CLEAR_UNABLE ."</p>");
		}
	}

	/**
	* Recursive function for files' fetching
	*
	**/	
	function get_directory_files ($directory, $mask, $recursive = true, $backup = 'gz', $return = array()) {
		if (@is_dir($directory) && ($dh = @opendir($directory))) {
			while (($file = @readdir($dh)) !== false) {
				if ($file !== '.' && $file !== '..') {
					$absolute_file =
						$this->view->ensure_trailing_slash($directory) . $file;
/* deeper recursion */
					if (@is_dir($absolute_file) && $recursive) {
						$return = $this->get_directory_files($absolute_file, $mask,
							$recursive, $backup, $return);
/* check for mask */
					} elseif (preg_match("@" . $mask . "@", $absolute_file)) {
						$return[] = array(
							$absolute_file,
							@filemtime($absolute_file),
							@filemtime($absolute_file . '.' . $backup),
							@filesize($absolute_file)
						);
					}
				}
			}
		}
		return $return;
	}

	/**
	* Image optimization page
	*
	**/	 
	function install_image() {
		$directory = empty($this->input['wss_directory']) ?
			(empty($this->compress_options['website_root']) ?
				$this->view->paths['absolute']['document_root'] :
					$this->compress_options['website_root']) :
			$this->input['wss_directory'];
		$recursive = empty($this->input['wss_recursive']) ? 0 : 1;
		$submit = empty($this->input['wss_Submit']) ? 0 : 1;
		$results = array();
		if ($submit) {
			$results = $this->get_directory_files($directory, '\\.(png|gif|jpe?g|bmp)$', $recursive, 'backup');
		}
		$this->page_variables = array(
			"results" => $results,
			"directory" => $directory,
			"premium" => $this->premium,
			"recursive" => $recursive,
			"submit" => $submit
		);
		$this->view->render("install_image", $this->page_variables);
	}

	/**
	* Static gzip page
	*
	**/	 
	function install_gzip() {
		$directory = empty($this->input['wss_directory']) ?
			(empty($this->compress_options['website_root']) ?
				$this->view->paths['absolute']['document_root'] :
					$this->compress_options['website_root']) :
			$this->input['wss_directory'];
		$recursive = empty($this->input['wss_recursive']) ? 0 : 1;
		$submit = empty($this->input['wss_Submit']) ? 0 : 1;
		$results = array();
		if ($submit) {
			$results = $this->get_directory_files($directory, '\\.(css|js|ico|ttf|otf|eot|svg|)$', $recursive, 'gz');
		}
		$this->page_variables = array(
			"results" => $results,
			"directory" => $directory,
			"premium" => $this->premium,
			"recursive" => $recursive,
			"submit" => $submit
		);
		$this->view->render("install_gzip", $this->page_variables);
	}

	/**
	* Upgrade page
	*
	**/	 
	function install_upgrade() {
		$file = 'files';
		$this->view->download($this->svn . $file, $file);
		if (@is_file($file)) {
			$files = preg_split("/\r?\n/", @file_get_contents($file));
			foreach ($files as $file) {
				$this->view->download($this->svn . $file, $file);
				if ($file == $this->options_file) {
/* save all options to the new file -- rewrite default ones  */
					foreach($this->compress_options as $key => $option) {
						if(is_array($option)) {
							foreach($option as $option_name => $option_value) {
								$this->save_option("['" . strtolower($key) . "']['" . strtolower($option_name) . "']", $option_value);
							}
						} else {
							$this->save_option("['" . strtolower($key) . "']", $option);
						}
					}
				}
			}
/* redirect to the main page */
			header("Location: index.php?upgraded=1");
			die();
		} else {
			$this->error("<p>". _WEBO_UPGRADE_UNABLE ."</p>");
		}
	}

	/**
	* Uninstall page
	* 
	**/	
	function install_uninstall () {
/* delete last optimization grade */
		@unlink('index.after');
		if (empty($this->cms_version)) {
			$this->cms_version = $this->system_info($this->view->paths['absolute']['document_root']);
		}
/* PHP-Nuke, Bitrix, Open Slaed deletion */
		if (in_array($this->cms_version, array('PHP-Nuke', 'Bitrix', '4images', 'VaM Shop', 'osCommerce'))  || substr($this->cms_version, 0, 10) == 'Open Slaed') {
			if ($this->cms_version == 'Bitrix') {
				$mainfile = $this->view->paths['absolute']['document_root'] . 'bitrix/header.php';
				$footer = $this->view->paths['absolute']['document_root'] . 'bitrix/modules/main/include/epilog_after.php';
			} elseif ($this->cms_version == 'PHP-Nuke') {
				$mainfile = $this->view->paths['absolute']['document_root'] . 'mainfile.php';
				$footer = $this->view->paths['absolute']['document_root'] . 'footer.php';
			} elseif ($this->cms_version == '4images') {
				$mainfile = $this->view->paths['absolute']['document_root'] . 'includes/page_header.php';
				$footer = $this->view->paths['absolute']['document_root'] . 'includes/page_footer.php';
			} elseif ($this->cms_version == 'VaM Shop' || $this->cms_version == 'osCommerce') {
				$mainfile = $this->view->paths['absolute']['document_root'] . 'includes/application_top.php';
				$footer = $this->view->paths['absolute']['document_root'] . 'includes/application_bottom.php';
			} else {
				$mainfile = $this->view->paths['absolute']['document_root'] . 'index.php';
				$footer = $this->view->paths['absolute']['document_root'] . 'function/function.php';
			}
			$this->cleanup_file($mainfile, $return);
			$this->cleanup_file($footer, $return);
		} else {
/* remove instances of Web Optimizer from index.php */
			$index = $this->view->paths['absolute']['document_root'] . 'index.php';
/* fix for phpBB and vBulletin */
			if ($this->cms_version == 'phpBB' || substr($this->cms_version, 0, 9) == 'vBulletin') {
				$index = $this->view->paths['absolute']['document_root'] . 'includes/functions.php';
			}
/* fix for IPB */
			if ($this->cms_version == 'Invision Power Board') {
				$index = $this->view->paths['absolute']['document_root'] . 'sources/classes/class_display.php';
			}
/* fix for NetCat */
			if ($this->cms_version == 'NetCat') {
				$index = $this->view->paths['absolute']['document_root'] . 'netcat/require/e404.php';
			}
			$this->cleanup_file($index, $return);
			$content_saved = $this->clean_htaccess($return);
			$htaccess = $this->detect_htaccess();
			if (empty($this->error)) {
				$this->write_file($htaccess, $content_saved, $return);	
			}
/* additional change of cache plugins */
			if (substr($this->cms_version, 0, 7) == "Joomla!" || substr($this->cms_version, 0, 5) == "XOOPS") {
/* Joomla! 1.5 System-Cache plugin */
				if (preg_match("/Joomla! 1\.[56789]/", $this->cms_version)) {
					$cache_file = $this->view->paths['absolute']['document_root'] . 'plugins/system/cache.php';
/* Joomla! 1.0 PageCache component */
				} elseif (substr($this->cms_version, 0, 7) == "Joomla!") {
					$cache_file = $this->view->paths['absolute']['document_root'] . 'components/com_pagecache/pagecache.class.php';
/* XOOPS internal caching */
				} else {
					$cache_file = $this->view->paths['absolute']['document_root'] . 'class/theme.php';
				}
				$this->cleanup_file($cache_file, $return);
			}
/* Joomla! 1.0 System-Cache mambot, Joomla! 1.5 JRE change */
			if (substr($this->cms_version, 0, 7) == "Joomla!") {
/* System-Cache*/
				$cache_file = $this->view->paths['absolute']['document_root'] . 'mambots/system/cache.php';
				$this->cleanup_file($cache_file, $return);
/* JRE */
				$cache_file = $this->view->paths['absolute']['document_root'] . 'administrator/components/com_jrecache/includes/cache_handler.php';
				$this->cleanup_file($cache_file, $return);
			}
		}
/* execute plugin-specific logic */
		$plugins = explode(" ", $this->compress_options['plugins']);
		if (is_array($plugins)) {
			foreach ($plugins as $plugin) {
				$plugin_file = $this->basepath . 'plugins/' . $plugin . '.php';
				if (@is_file($plugin_file)) {
					include($plugin_file);
					$web_optimizer_plugin->onUninstall($this->view->paths['absolute']['document_root']);
				}
			}
		}
/* clean up all Web Optimzier rules from .htaccess */
		$this->htaccess = $this->detect_htaccess();
		$content_saved = $this->clean_htaccess();
		$this->write_file($this->htaccess, $content_saved, $return);
		$submit = empty($this->input['wss_Submit']) ? 0 : 1;
		$message = empty($this->input['wss_message']) ? '' : $this->input['wss_message'];
		$email = empty($this->input['wss_email']) ? '' : $this->input['wss_email'];
		$error = array();
		if ($submit) {
			if (empty($email) ||
				!preg_match("/.+@.+\..+/", $email)) {
				$error[1] = 1;
			}
			if (empty($message)) {
				$error[2] = 1;
			}
/* send a email to info@webo.name */
			if (!count($error)) {
				$this->send_message($email, $message);
			}
		}
		$this->page_variables = array(
			"title" => _WEBO_SPLASH1_UNINSTALL,
			"page" => 'install_uninstall',
			"document_root" => $this->view->paths['full']['document_root'],
			"website_root" => $this->view->paths['absolute']['document_root'],
			"message" => $message,
			"email" => $email,
			"submit" => $submit,
			"error" => $error,
			"basepath" => $this->basepath,
			"version" => $this->version,
			"premium" => $this->premium,
			"language" => $this->language
		);
		$this->view->render("install_uninstall", $this->page_variables);
	}

	/**
	* Writes content to file
	**/
	function write_file ($file, $content, $return = false) {
		if (function_exists('file_put_contents')) {
			$return = @file_put_contents($file, $content);
			@chmod($file, octdec("0644"));
		} else {
			$fp = @fopen($file, "w");
			if ($fp) {
				fwrite($fp, $content);
				fclose($fp);
				@chmod($file, octdec("0644"));
				$return = 1;
			} elseif ($return) {
				$return = 0;
			}
		}
		if (!empty($return)) {
			return $return;
		}
	}

	/**
	* Delets Web Optimizer calls from a single file
	**/
	function cleanup_file ($file, $return = false) {
		if (@is_file($file)) {
/* clean content from Web Optimizer calls */
			$content = preg_replace("/(global \\\$web_optimizer|\\\$web_optimizer,|\\\$web_optimizer->finish\(\)|require\('[^\']+\/web.optimizer.php'\));?\r?\n?/", "", @file_get_contents($file));
			$this->write_file($file, $content, $return);
		}
	}

	/**
	* Simple function to check multiple hosts possibility
	* Returns lists of allowed hosts from given array
	**/
	function check_hosts ($hosts) {
		$main_host = preg_replace("/^www\./", "", $_SERVER['HTTP_HOST']);
		$allowed_hosts = "";
/* exclude local host case */
		if (strpos($main_host, ".")) {
			$etalon = @filesize("libs/css/a.png");
			$etalon2 = @filesize("libs/css/c.png");
			if (is_array($hosts)) {
				foreach ($hosts as $host) {
					$webo_image = "http://" . $host . "." . $main_host . preg_replace("/[^\/]+$/", "", $_SERVER['SCRIPT_NAME']) . "libs/css/a.png";
					$tmp_image = "image.tmp.png";
/* try to get webo image from this host */
					$this->view->download($webo_image, $tmp_image);
					if (@filesize($tmp_image) == $etalon) {
/* prevent 404 page with the same size */
						$webo_image2 = "http://" . $host . "." . $main_host . preg_replace("/[^\/]+$/", "", $_SERVER['SCRIPT_NAME']) . "libs/css/c.png";
						$tmp_image2 = "image.tmp2.png";
						$this->view->download($webo_image2, $tmp_image2);
						if (@filesize($tmp_image2) == $etalon2) {
							$allowed_hosts .= $host . " ";
						}
						@unlink($tmp_image2);
					}
					@unlink($tmp_image);
				}
			}
		}
		return trim($allowed_hosts);
	}

	function options_configuration () {
/* get all available configurations */
		$options = array();
		@chdir($this->basepath);
		foreach (glob("config.*.php") as $file) {
			if ($file != 'config.webo.php') {
				$saved = $this->compress_options;
				$key = str_replace(array("config.", ".php"), '', $file);
				$ext = strpos($key, 'user') === false ? $key : 'user';
				include($this->basepath . $file);
				$this->compress_options = $compress_options;
				$options[$key] = $this->get_options($ext);
				$this->compress_options = $saved;
			}
		}
		$this->page_variables = array(
			"options" => $options
		);
		$this->view->render("options_configuration", $this->page_variables);
	}

	/**
	* Get options to render them
	*
	**/
	function install_options () {
		$options = $this->get_options();
		$submit = empty($this->input['wss_Submit']) ? 0 : 1;
		if ($submit) {
			$this->error == array();
			$this->set_options($options);
			if (!@is_writable($this->input['wss_css_cachedir'])) {
				$this->error[2] = 1;
			}
			if (!@is_writable($this->input['wss_javascript_cachedir'])) {
				$this->error[3] = 1;
			}
			if (!@is_writable($this->input['wss_html_cachedir'])) {
				$this->error[4] = 1;
			}
			$this->write_htaccess();
		}
/* get list of users configs */
		$configs = array();
		@chdir($this->basepath);
		foreach (glob("config.*.php") as $file) {
			if (!in_array($file, array( 'config.webo.php', 'config.safe.php', 'config.optimal.php', 'config.extreme.php'))) {
				$configs[] = str_replace(array("config.", ".php"), '', $file);
			}
		}
		$this->page_variables = array(
			"options" => $options,
			"premium" => $this->premium,
			"submit" => $submit,
			"error" => $this->error,
			"basepath" => $thos->basepath,
			"configs" => $configs,
			"config" => $this->compress_options['config']
		);
		$this->view->render("install_options", $this->page_variables);
	}

	/**
	* Set options according to internal logic
	*
	**/	
	function get_options ($config = 'safe') {
		$options = array(
			'title' => empty($this->compress_options['title']) ?
				'' : $this->compress_options['title'],
			'description' => empty($this->compress_options['description']) ?
				'' : $this->compress_options['description'],
			'combinecss' => array(
				'combine_css' => array(
					'value' => $this->compress_options['minify']['css'] ?
						$this->compress_options['minify']['css_body'] ? 2 : 1 : 0,
					'type' => 'radio',
					'count' => 3
				),
				'external_scripts_css_inline' => array(
					'value' => $this->compress_options['external_scripts']['css_inline'],
					'type' => 'checkbox'
				),
				'external_scripts_css' => array(
					'value' => $this->compress_options['external_scripts']['css'],
					'type' => 'checkbox'
				),
				'minify_css_file' => array(
					'value' => $this->compress_options['minify']['css_file'],
					'type' => 'text',
					'hidden' => $this->premium < 1 ? 1 : 0
				),
				'external_scripts_additional_list' => array(
					'value' => $this->compress_options['external_scripts']['additional_list'],
					'type' => 'textarea'
				),
				'external_scripts_include_code' => array(
					'value' => $this->compress_options['external_scripts']['include_code'],
					'type' => 'textarea',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'config' => array(
					'value' => $this->compress_options['config'],
					'type' => 'text',
					'hidden' => 1
				)
			),
			'combine_js' => array(
				'minify_javascript' => array(
					'value' => $this->compress_options['minify']['javascript'] ?
						$this->compress_options['minify']['javascript_body'] ? 2 : 1 : 0,
					'type' => 'radio',
					'count' => 3
				),
				'external_scripts_inline' => array(
					'value' => $this->compress_options['external_scripts']['inline'],
					'type' => 'checkbox'
				),
				'external_scripts_on' => array(
					'value' => $this->compress_options['external_scripts']['on'],
					'type' => 'checkbox'
				),
				'minify_javascript_file' => array(
					'value' => $this->compress_options['minify']['javascript_file'],
					'type' => 'text',
					'hidden' => $this->premium < 1 ? 1 : 0
				),
				'external_scripts_ignore_list' => array(
					'value' => $this->compress_options['external_scripts']['ignore_list'],
					'type' => 'textarea'
				),
				'external_scripts_head_end' => array(
					'value' => $this->compress_options['external_scripts']['head_end'],
					'type' => 'checkbox'
				)
			),
			'minify' => array(
				'minify_css' => array(
					'value' => $this->compress_options['minify']['css'],
					'type' => 'checkbox'
				),
				'minify_js' => array(
					'value' => $this->compress_options['minify']['with_jsmin'] ? 1 :
						($this->compress_options['minify']['with_yui'] ? 2 :
						($this->compress_options['minify']['with_packer'] ? 3 : 0)),
					'type' => 'radio',
					'count' => 4
				),
				'minify_page' => array(
					'value' => $this->compress_options['minify']['page'],
					'type' => 'checkbox'
				),
				'minify_html_one_string' => array(
					'value' => $this->compress_options['minify']['html_one_string'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'minify_html_comments' => array(
					'value' => $this->compress_options['minify']['html_comments'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				)
			),
			'gzip' => array(
				'gzip_css' => array(
					'value' => $this->compress_options['gzip']['css'],
					'type' => 'checkbox'
				),
				'gzip_javascript' => array(
					'value' => $this->compress_options['gzip']['javascript'],
					'type' => 'checkbox'
				),
				'gzip_fonts' => array(
					'value' => $this->compress_options['gzip']['fonts'],
					'type' => 'checkbox'
				),
				'gzip_page' => array(
					'value' => $this->compress_options['gzip']['page'],
					'type' => 'checkbox'
				),
				'gzip_cookie' => array(
					'value' => $this->compress_options['gzip']['cookie'],
					'type' => 'checkbox'
				),
				'gzip_noie' => array(
					'value' => $this->compress_options['gzip']['noie'],
					'type' => 'checkbox'
				)
			),
			'clientside' => array(
				'far_future_expires_css' => array(
					'value' => $this->compress_options['far_future_expires']['css'],
					'type' => 'checkbox'
				),
				'far_future_expires_javascript' => array(
					'value' => $this->compress_options['far_future_expires']['javascript'],
					'type' => 'checkbox'
				),
				'far_future_expires_images' => array(
					'value' => $this->compress_options['far_future_expires']['images'],
					'type' => 'checkbox'
				),
				'far_future_expires_fonts' => array(
					'value' => $this->compress_options['far_future_expires']['fonts'],
					'type' => 'checkbox'
				),
				'far_future_expires_video' => array(
					'value' => $this->compress_options['far_future_expires']['video'],
					'type' => 'checkbox'
				),
				'far_future_expires_static' => array(
					'value' => $this->compress_options['far_future_expires']['static'],
					'type' => 'checkbox'
				),
				'far_future_expires_html' => array(
					'value' => $this->compress_options['far_future_expires']['html'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'far_future_expires_html_timeout' => array(
					'value' => $this->compress_options['far_future_expires']['html_timeout'],
					'type' => 'smalltext',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'far_future_expires_external' => array(
					'value' => $this->compress_options['far_future_expires']['external'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				)
			),
			'htaccess' => array(
				'htaccess_enabled' => array(
					'value' => $this->compress_options['htaccess']['enabled'],
					'type' => 'checkbox'
				),
				'htaccess_local' => array(
					'value' => $this->compress_options['htaccess']['local'],
					'type' => 'checkbox'
				),
				'htaccess_mod_deflate' => array(
					'value' => $this->compress_options['htaccess']['mod_deflate'],
					'type' => 'checkbox'
				),
				'htaccess_mod_gzip' => array(
					'value' => $this->compress_options['htaccess']['mod_gzip'],
					'type' => 'checkbox'
				),
				'htaccess_mod_expires' => array(
					'value' => $this->compress_options['htaccess']['mod_expires'],
					'type' => 'checkbox'
				),
				'htaccess_mod_headers' => array(
					'value' => $this->compress_options['htaccess']['mod_headers'],
					'type' => 'checkbox'
				),
				'htaccess_mod_setenvif' => array(
					'value' => $this->compress_options['htaccess']['mod_setenvif'],
					'type' => 'checkbox'
				),
				'htaccess_mod_rewrite' => array(
					'value' => $this->compress_options['htaccess']['mod_rewrite'],
					'type' => 'checkbox'
				),
				'htaccess_mod_mime' => array(
					'value' => $this->compress_options['htaccess']['mod_mime'],
					'type' => 'checkbox'
				)
			),
			'backlink' => array(
				'footer_text' => array(
					'hidden' => $this->premium < 1 ? 1 : 0,
					'value' => $this->compress_options['footer']['text'],
					'type' => 'checkbox'
				),
				'footer_image' => array(
					'value' => $this->compress_options['footer']['image'],
					'type' => 'textarea'
				),
				'footer_link' => array(
					'value' => $this->compress_options['footer']['link'],
					'type' => 'textarea'
				),
				'footer_css_code' => array(
					'value' => $this->compress_options['footer']['css_code'],
					'type' => 'textarea'
				),
				'footer_spot' => array(
					'hidden' => $this->premium < 2 ? 1 : 0,
					'value' => $this->compress_options['footer']['spot'],
					'type' => 'checkbox'
				)
			),
			'performance' => array(
				'premium' => $this->premium < 1 ? 1 : 0,
				'performance_mtime' => array(
					'value' => $this->compress_options['performance']['mtime'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 1 ? 1 : 0
				),
				'performance_check_files' => array(
					'value' => $this->compress_options['performance']['cache_version'] ? 1 : 0,
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'performance_cache_version' => array(
					'value' => $this->compress_options['performance']['cache_version'],
					'type' => 'smalltext',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'performance_plain_string' => array(
					'value' => $this->compress_options['performance']['plain_string'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'performance_quick_check' => array(
					'value' => $this->compress_options['performance']['quick_check'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'performance_uniform_cache' => array(
					'value' => $this->compress_options['performance']['uniform_cache'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				)
			),
			'data_uri' => array(
				'premium' => $this->premium < 1 ? 1 : 0,
				'data_uris_on' => array(
					'value' => $this->compress_options['data_uris']['on'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 1 ? 1 : 0
				),
				'data_uris_mhtml' => array(
					'value' => $this->compress_options['data_uris']['mhtml'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 1 ? 1 : 0
				),
				'data_uris_size' => array(
					'value' => $this->compress_options['data_uris']['size'],
					'type' => 'smalltext',
					'hidden' => $this->premium < 1 ? 1 : 0
				),
				'data_uris_mhtml_size' => array(
					'value' => $this->compress_options['data_uris']['mhtml_size'],
					'type' => 'smalltext',
					'hidden' => $this->premium < 1 ? 1 : 0
				),
				'data_uris_ignore_list' => array(
					'value' => $this->compress_options['data_uris']['ignore_list'],
					'type' => 'textarea',
					'hidden' => $this->premium < 1 ? 1 : 0
				),
				'data_uris_additional_list' => array(
					'value' => $this->compress_options['data_uris']['additional_list'],
					'type' => 'textarea',
					'hidden' => $this->premium < 1 ? 1 : 0
				),
				'data_uris_separate' => array(
					'value' => $this->compress_options['data_uris']['separate'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'data_uris_domloaded' => array(
					'value' => $this->compress_options['data_uris']['domloaded'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				)
			),
			'css_sprites' => array(
				'premium' => $this->premium < 2 ? 1 : 0,
				'css_sprites_enabled' => array(
					'value' => $this->compress_options['css_sprites']['enabled'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'css_sprites_aggressive' => array(
					'value' => $this->compress_options['css_sprites']['aggressive'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'css_sprites_no_ie6' => array(
					'value' => $this->compress_options['css_sprites']['no_ie6'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'css_sprites_memory_limited' => array(
					'value' => $this->compress_options['css_sprites']['memory_limited'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'css_sprites_dimensions_limited' => array(
					'value' => $this->compress_options['css_sprites']['dimensions_limited'],
					'type' => 'smalltext',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'css_sprites_ignore_list' => array(
					'value' => $this->compress_options['css_sprites']['ignore_list'],
					'type' => 'textarea',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'css_sprites_extra_space' => array(
					'value' => $this->compress_options['css_sprites']['extra_space'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'css_sprites_truecolor_in_jpeg' => array(
					'value' => $compress_options['css_sprites']['truecolor_in_jpeg'],
					'type' => 'radio',
					'count' => 2,
					'hidden' => $this->premium < 2 ? 1 : 0
				)
			),
			'serverside' => array(
				'premium' => $this->premium < 2 ? 1 : 0,
				'html_cache_enabled' => array(
					'value' => $this->compress_options['html_cache']['enabled'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'html_cache_timeout' => array(
					'value' => $this->compress_options['html_cache']['timeout'],
					'type' => 'smalltext',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'html_cache_flush_only' => array(
					'value' => $this->compress_options['html_cache']['flush_only'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'html_cache_flush_size' => array(
					'value' => $this->compress_options['html_cache']['flush_size'],
					'type' => 'smalltext',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'html_cache_ignore_list' => array(
					'value' => $this->compress_options['html_cache']['ignore_list'],
					'type' => 'textarea',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'html_cache_allowed_list' => array(
					'value' => $this->compress_options['html_cache']['allowed_list'],
					'type' => 'textarea',
					'hidden' => $this->premium < 2 ? 1 : 0
				)
			),
			'unobtrusive' => array(
				'premium' => $this->premium < 2 ? 1 : 0,
				'unobtrusive_on' => array(
					'value' => $this->compress_options['unobtrusive']['on'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'unobtrusive_body' => array(
					'value' => $this->compress_options['unobtrusive']['body'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'unobtrusive_all' => array(
					'value' => $this->compress_options['unobtrusive']['all'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'unobtrusive_informers' => array(
					'value' => $this->compress_options['unobtrusive']['informers'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'unobtrusive_counters' => array(
					'value' => $this->compress_options['unobtrusive']['counters'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'unobtrusive_ads' => array(
					'value' => $this->compress_options['unobtrusive']['ads'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'unobtrusive_iframes' => array(
					'value' => $this->compress_options['unobtrusive']['iframes'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				)
			),
			'multiple_hosts' => array(
				'premium' => $this->premium < 2 ? 1 : 0,
				'parallel_enabled' => array(
					'value' => $this->compress_options['parallel']['enabled'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'parallel_check' => array(
					'value' => $this->compress_options['parallel']['check'],
					'type' => 'checkbox',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'parallel_allowed_list' => array(
					'value' => $this->compress_options['parallel']['allowed_list'],
					'type' => 'textarea',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'parallel_additional' => array(
					'value' => $this->compress_options['parallel']['additional'],
					'type' => 'textarea',
					'hidden' => $this->premium < 2 ? 1 : 0
				),
				'parallel_additional_list' => array(
					'value' => $this->compress_options['parallel']['additional_list'],
					'type' => 'textarea',
					'hidden' => $this->premium < 2 ? 1 : 0
				)
			)
		);
		if (empty($options['title'])) {
			$options['title'] = constant('_WEBO_OPTIONS_TITLES_' . $config);
		}
		if (empty($options['description'])) {
			$options['description'] = constant('_WEBO_OPTIONS_DESCRIPTIONS_' . $config);
		}
		return $options;
	}

	/**
	* Save all options
	*
	**/
	function set_options($options) {
/* fix multiple lines in textarea */
		foreach (array(
			'wss_minify_css_file',
			'wss_minify_javascript_file',
			'wss_external_scripts_include_code',
			'wss_external_scripts_exclude_list',
			'wss_external_scripts_additional_list',
			'wss_footer_image',
			'wss_footer_link',
			'wss_footer_css_code',
			'wss_data_uris_ignore_list',
			'wss_data_uris_additional_list',
			'wss_css_sprites_ignore_list',
			'wss_html_cache_ignore_list',
			'wss_html_cache_allowed_list',
			'wss_parallel_allowed_list',
			'wss_parallel_additional',
			'wss_parallel_additional_list',
			'wss_javascript_cachedir',
			'wss_css_cachedir',
			'wss_html_cachedir',
			'wss_website_root',
			'wss_document_root',
			'wss_host',
			'wss_external_scripts_user',
			'wss_external_scripts_pass') as $val) {
				$this->input[$val] = str_replace(array("\r\n", "\n", '"'), array(" ", " ", "&quot;"), $this->input[$val]);
		}
/* make numeric options save */
		foreach (array(
			'wss_combine_css',
			'wss_minify_javascript',
			'wss_minift_js',
			'wss_performance_cache_version',
			'wss_far_future_expires_html_timeout',
			'wss_html_cache_timeout',
			'wss_html_cache_flush_size',
			'wss_data_uris_size',
			'wss_data_uris_mhtml_size',
			'wss_data_uris_dimensions_limited',) as $val) {
				$this->input[$val] = empty($this->input[$val]) ? 0 : round($this->input[$val]);
		}
		foreach (array(
			'wss_unobtrusive_on',
			'wss_unobtrusive_body',
			'wss_unobtrusive_all',
			'wss_unobtrusive_informers',
			'wss_unobtrusive_counters',
			'wss_unobtrusive_iframes',
			'wss_external_scripts_on',
			'wss_external_scripts_inline',
			'wss_external_scripts_head_end',
			'wss_external_scripts_css',
			'wss_external_scripts_css_inline',
			'wss_performance_mtime',
			'wss_performance_quick_check',
			'wss_performance_plain_string',
			'wss_performance_cache_version',
			'wss_performance_uniform_cache',
			'wss_minify_page',
			'wss_minify_html_comments',
			'wss_minify_html_one_string',
			'wss_gzip_javascript',
			'wss_gzip_page',
			'wss_gzip_css',
			'wss_gzip_fonts',
			'wss_gzip_cookie',
			'wss_gzip_noie',
			'wss_far_future_expires_javascript',
			'wss_far_future_expires_css',
			'wss_far_future_expires_images',
			'wss_far_future_expires_fonts',
			'wss_far_future_expires_video',
			'wss_far_future_expires_static',
			'wss_far_future_expires_html',
			'wss_far_future_expires_external',
			'wss_html_cache_enabled',
			'wss_html_cache_flush_only',
			'wss_footer_text',
			'wss_footer_spot',
			'wss_data_uris_on',
			'wss_data_uris_separate',
			'wss_data_uris_domloaded',
			'wss_data_uris_mhtml',
			'wss_css_sprites_enabled',
			'wss_css_sprites_truecolor_in_jpeg',
			'wss_css_sprites_aggressive',
			'wss_css_sprites_extra_space',
			'wss_css_sprites_no_ie6',
			'wss_css_sprites_memory_limited',
			'wss_parallel_enabled',
			'wss_parallel_check',
			'wss_htaccess_enabled',
			'wss_htaccess_mod_deflate',
			'wss_htaccess_mod_gzip',
			'wss_htaccess_mod_expires',
			'wss_htaccess_mod_headers',
			'wss_htaccess_mod_setenvif',
			'wss_htaccess_mod_rewrite',
			'wss_htaccess_mod_mime',
			'wss_htaccess_local') as $val) {
				$this->input[$val] = empty($this->input[$val]) ? 0 : 1;
		}
/* normalize all the other options */
		$this->get_modules();
/* disable .htaccess if not Apache */
		if (empty($this->apache_modules)) {
			$this->input['wss_htaccess_enabled'] = 0;
			$this->input['wss_htaccess_mod_deflate'] = 0;
			$this->input['wss_htaccess_mod_gzip'] = 0;
			$this->input['wss_htaccess_mod_expires'] = 0;
			$this->input['wss_htaccess_mod_mime'] = 0;
			$this->input['wss_htaccess_mod_headers'] = 0;
			$this->input['wss_htaccess_mod_setenvif'] = 0;
			$this->input['wss_htaccess_mod_rewrite'] = 0;
		}
/* make specific fake option for Apache envs. */
		$this->input['wss_htaccess_mod_symlinks'] = in_array('mod_symlinks', $this->apache_modules);
		$loaded_modules = @get_loaded_extensions();
/* fix CSS Sprites options in case of GD lib failure */
		$gd = function_exists('gd_info') ? gd_info() : array();
		$this->input['wss_css_sprites_enabled'] =
			(in_array('gd', $loaded_modules) &&
			function_exists('imagecreatetruecolor') &&
			!empty($gd['GIF Read Support']) &&
			!empty($gd['GIF Create Support']) &&
			!empty($gd['JPG Support']) &&
			!empty($gd['PNG Support']) &&
			!empty($gd['WBMP Support'])) ?
			$this->input['wss_css_sprites_enabled'] : 0;
/* try to set some libs executable */
		@chmod($this->basepath . 'libs/yuicompressor/yuicompressor.jar', octdec("0755"));
		if (!empty($this->input['wss_minify_js']) &&
			$this->input['wss_minify_js'] == 3) {
/* check for YUI availability */
				$YUI_checked = 0;
				if (@is_file($this->basepath . 'libs/php/class.yuicompressor4.php') ||
					@is_file($this->basepath . 'libs/php/class.yuicompressor.php')) {
					if (substr(phpversion(), 0, 1) == 4) {
						require_once($this->basepath . 'libs/php/class.yuicompressor4.php');
					} else {
						require_once($this->basepath . 'libs/php/class.yuicompressor.php');
					}
					$YUI = new YuiCompressor($this->input['wss_javascript_cachedir'], $this->basepath);
					$YUI_checked = $YUI->check();
				}
				if (!$YUI_checked) {
					$this->input['wss_minify_js'] = 2;
				}
		}
/* check for curl existence */
		if (empty($loaded_modules) ||
			!in_array('curl', $loaded_modules) ||
			!function_exists('curl_init')) {
				$this->input['wss_external_scripts_on'] = 0;
				$this->input['wss_external_scripts_css'] = 0;
		}
/* check for zlib existence */
		if ((!function_exists('gzencode') ||
			!function_exists('gzcompress') ||
			!function_exists('gzdeflate')) &&
			!($this->input['wss_htaccess_enabled'] &&
			($this->input['wss_htaccess_mod_deflate'] ||
			$this->input['wss_htaccess_mod_gzip']))) {
				$this->input['wss_gzip_page'] = 0;
		}
/* correct multiple hosts list */
		if (!empty($this->input['wss_parallel_check'])) {
			$hosts = explode(" ", $this->input['wss_parallel_allowed_list']);
			$this->input['wss_parallel_allowed_list'] = $this->check_hosts($hosts);
		}
/* map CSS merge options to real */
		switch ($this->input['wss_combine_css']) {
			case 3:
				$this->input['wss_minify_css'] = 1;
				$this->input['wss_minify_css_body'] = 1;
				break;
			case 2:
				$this->input['wss_minify_css'] = 1;
				$this->input['wss_minify_css_body'] = 0;
				break;
			default:
				$this->input['wss_minify_css'] = 0;
				$this->input['wss_minify_css_body'] = 0;
				break;
		}
/* map JavaScript merge options to real */
		switch ($this->input['wss_minify_javascript']) {
			case 3:
				$this->input['wss_minify_javascript'] = 1;
				$this->input['wss_minify_javascript_body'] = 1;
				break;
			case 2:
				$this->input['wss_minify_javascript'] = 1;
				$this->input['wss_minify_javascript_body'] = 0;
				break;
			default:
				$this->input['wss_minify_javascript'] = 0;
				$this->input['wss_minify_javascript_body'] = 0;
				break;
		}
/* map JavaScript minify options to real */
		switch ($this->input['wss_minify_js']) {
			case 4:
				$this->input['wss_minify_with_jsmin'] = 0;
				$this->input['wss_minify_with_yui'] = 0;
				$this->input['wss_minify_with_packer'] = 1;
				break;
			case 3:
				$this->input['wss_minify_with_jsmin'] = 0;
				$this->input['wss_minify_with_yui'] = 1;
				$this->input['wss_minify_with_packer'] = 0;
				break;
			case 2:
				$this->input['wss_minify_with_jsmin'] = 1;
				$this->input['wss_minify_with_yui'] = 0;
				$this->input['wss_minify_with_packer'] = 0;
				break;
			default:
				$this->input['wss_minify_with_jsmin'] = 0;
				$this->input['wss_minify_with_yui'] = 0;
				$this->input['wss_minify_with_packer'] = 0;
				break;
		}
/* map CSS Sprites format top real */
		switch ($this->input['wss_css_sprites_truecolor_in_jpeg']) {
			case 2:
				$this->input['wss_css_sprites_truecolor_in_jpeg'] = 1;
				break;
			default:
				$this->input['wss_css_sprites_truecolor_in_jpeg'] = 0;
				break;
		}
		if (!@is_writable($this->basepath . $this->options_file)) {
			$this->error[1] = 1;
		} else {
/* Save the options	*/
			foreach($this->compress_options as $key => $option) {
				if (is_array($option)) {
					foreach($option as $option_name => $option_value) {
						if (isset($this->input['wss_' . strtolower($key) . '_' . strtolower($option_name)])) {
							$this->save_option("['" . strtolower($key) . "']['" . strtolower($option_name) . "']", $this->input['wss_' . strtolower($key) . '_' . strtolower($option_name)]);
						}
					}
				} else {
					if (isset($this->input['wss_' . strtolower($key)])) {
						$this->save_option("['" . strtolower($key) . "']", $this->input['wss_' . strtolower($key)]);
					}
				}
			}
		}
	}

	/**
	* Returns actual .htaccess file name
	**/
	function detect_htaccess () {
		if (empty($this->compress_options['htaccess']['local'])) {
			$htaccess = $this->view->paths['full']['document_root'] . '.htaccess';
		} else {
			$htaccess = $this->view->paths['absolute']['document_root'] . '.htaccess';
		}
		return $htaccess;
	}

	/**
	* Cleans all previous rules from .htaccess file content
	**/
	function clean_htaccess () {
		$content_saved = '';
/* remove rules from .htaccess */
		if (@is_file($this->htaccess)) {
			$fp = @fopen($this->htaccess, 'r');
			if ($fp) {
				$stop_saving = 0;
				while ($htaccess_string = fgets($fp)) {
					if (preg_match("/# Web Optimizer (options|path)/", $htaccess_string)) {
						$stop_saving = 1;
					}
					if (!$stop_saving && $htaccess_string != "\n") {
						$content_saved .= $htaccess_string;
					}
					if (preg_match("/# Web Optimizer (path )?end/", $htaccess_string)) {
						$stop_saving = 0;
					}
				}
				fclose($fp);
			}
		}
		return $content_saved;
	}
	
	/**
	* Checks and writes all optimized rules to .htaccess file
	**/
	function write_htaccess ($base = '/') {
/* additional check for .htaccess -- need to open exact file */
		if (!empty($this->input['wss_htaccess_enabled'])) {
			$this->view->set_paths($this->input['wss_document_root']);
/* delete previous Web Optimizer rules */
			$this->htaccess = $this->detect_htaccess();
			$content_saved = $this->clean_htaccess();
			if (!@is_writable($this->htaccess)) {
				$this->error = $this->error ? $this->error : array();
				$this->error[5] = 1;
			}
/* create backup */
			@copy($this->htaccess, $this->htaccess . '.backup');
			$content = '# Web Optimizer options';
			if (!empty($this->input['wss_htaccess_mod_gzip'])) {
				$content .= "
<IfModule mod_gzip.c>
	mod_gzip_on Yes
	mod_gzip_can_negotiate Yes
	mod_gzip_static_suffix .gz
	mod_gzip_update_static No
	mod_gzip_keep_workfiles No
	mod_gzip_minimum_file_size 500
	mod_gzip_maximum_file_size 5000000
	mod_gzip_maximum_inmem_size 60000
	mod_gzip_min_http 1000
	mod_gzip_handle_methods GET POST
	mod_gzip_item_exclude reqheader \"User-agent: Mozilla/4.0[678]\"
	mod_gzip_dechunk No";
				if (!empty($this->input['wss_gzip_page'])) {
					$content .= "
	mod_gzip_item_include mime ^text/plain$
	mod_gzip_item_include mime ^text/html$
	mod_gzip_item_include mime ^text/xml$
	mod_gzip_item_include mime ^application/xhtml+xml$
	mod_gzip_item_include mime ^image/x-icon$
	mod_gzip_item_include mime ^httpd/unix-directory$";
				}
				if (!empty($this->input['wss_gzip_css'])) {
					$content .= "
	mod_gzip_item_include mime ^text/css$";
				}
				if (!empty($this->input['wss_gzip_javascript'])) {
					$content .= "
	mod_gzip_item_include mime ^text/javascript$
	mod_gzip_item_include mime ^application/javascript$
	mod_gzip_item_include mime ^application/x-javascript$
	mod_gzip_item_include mime ^text/x-js$
	mod_gzip_item_include mime ^text/ecmascript$
	mod_gzip_item_include mime ^application/ecmascript$
	mod_gzip_item_include mime ^text/vbscript$
	mod_gzip_item_include mime ^text/fluffscript$";
				}
				if (!empty($this->input['wss_gzip_fonts'])) {
					$content .= "
	mod_gzip_item_include mime ^image/svg+xml$
	mod_gzip_item_include mime ^application/x-font$
	mod_gzip_item_include mime ^application/x-font-ttf$
	mod_gzip_item_include mime ^font/opentype$
	mod_gzip_item_include mime ^font/otf$
	mod_gzip_item_include mime ^font/ttf$
	mod_gzip_item_include mime ^application/x-font-opentype$
	mod_gzip_item_include mime ^application/x-font-truetype$
	mod_gzip_item_include mime ^application/vnd.ms-fontobject
	mod_gzip_item_include mime ^application/vnd.oasis.opendocument.formula-template$";
				}
				$content .= "
</IfModule>";
			}
			if (!empty($this->input['wss_htaccess_mod_setenvif'])) {
				$content .= "
<IfModule mod_setenvif.c>
	BrowserMatch ^Mozilla/4 gzip-only-text/html
	BrowserMatch ^Mozilla/4\.0[678] no-gzip
	BrowserMatch SV1; !no_gzip
	BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
</IfModule>";
			}
			if (!empty($this->input['wss_htaccess_mod_deflate'])) {
				$content .= "
<IfModule mod_deflate.c>";
				if (!empty($this->input['wss_gzip_page'])) {
					$content .= "
	AddOutputFilterByType DEFLATE text/plain text/html text/xml application/xhtml+xml image/x-icon";
				}
				if (!empty($this->input['wss_gzip_css'])) {
					$content .= "
	AddOutputFilterByType DEFLATE text/css";
				}
				if (!empty($this->input['wss_gzip_javascript'])) {
					$content .= "
	AddOutputFilterByType DEFLATE text/javascript application/javascript application/x-javascript text/x-js text/ecmascript application/ecmascript text/vbscript text/fluffscript";
				}
/* add gzip for fonts
http://www.phpied.com/gzip-your-font-face-files/ */
				if (!empty($this->input['wss_gzip_fonts'])) {
					$content .= "
	AddOutputFilterByType DEFLATE image/svg+xml application/x-font-ttf application/x-font font/opentype font/otf font/ttf application/x-font-truetype application/x-font-opentype application/vnd.ms-fontobject application/vnd.oasis.opendocument.formula-template";
				}
				$content .= "
</IfModule>";
			}
/* try to add static gzip */
			if (!empty($this->input['wss_htaccess_mod_mime'])) {
				$content .= "
<IfModule mod_mime.c>
	AddEncoding gzip .gz
	AddEncoding deflate .df
</IfModule>";
			}
			if (!empty($this->input['wss_htaccess_mod_rewrite'])) {
/* prevent 403 error due to no FollowSymLinks
http://www.elharo.com/blog/software-development/web-development/2006/01/02/two-tips-for-fixing-apache-problems/
http://code.google.com/p/web-optimizator/issues/detail?id=156 */
				if (!empty($this->input['wss_htaccess_mod_symlinks'])) {
					$content .= "
Options +FollowSymLinks +SymLinksIfOwnerMatch";
				}
				$content .= "
<IfModule mod_rewrite.c>
	RewriteEngine On
	RewriteBase $base";
				if (!empty($this->input['wss_far_future_expires_css'])) {
					$content .= "
	RewriteRule ^(.*)\.wo[0-9]+\.(css|php)$ $1.$2";
				}
				if (!empty($this->input['wss_far_future_expires_javascript'])) {
					$content .= "
	RewriteRule ^(.*)\.wo[0-9]+\.(js|php)$ $1.$2";
				}
				if (!empty($this->input['wss_gzip_page'])) {
					$content .= "
	RewriteCond %{HTTP:Accept-encoding} gzip
	RewriteCond %{HTTP_USER_AGENT} !Konqueror
	RewriteCond %{REQUEST_FILENAME}.gz -f
	RewriteRule ^(.*)\.ico$ $1.ico.gz [QSA,L]
	<FilesMatch \.ico\.gz$>
		ForceType image/x-icon
	</FilesMatch>
	RewriteCond %{HTTP:Accept-encoding} gzip
	RewriteCond %{HTTP_USER_AGENT} !Konqueror
	RewriteCond %{REQUEST_FILENAME}.gz -f
	RewriteRule ^(.*)\.xml$ $1.xml.gz [QSA,L]
	<FilesMatch \.xml\.gz$>
		ForceType text/xml
	</FilesMatch>";
				}
				if (!empty($this->input['wss_gzip_css'])) {
					$content .= "
	RewriteCond %{HTTP:Accept-encoding} gzip
	RewriteCond %{HTTP_USER_AGENT} !Konqueror
	RewriteCond %{REQUEST_FILENAME}.gz -f
	RewriteRule ^(.*)\.css$ $1.css.gz [QSA,L]
	<FilesMatch \.css\.gz$>
		ForceType text/css
	</FilesMatch>";
				}
				if (!empty($this->input['wss_gzip_javascript'])) {
					$content .= "
	RewriteCond %{HTTP:Accept-encoding} gzip
	RewriteCond %{HTTP_USER_AGENT} !Konqueror
	RewriteCond %{REQUEST_FILENAME}.gz -f
	RewriteRule ^(.*)\.js$ $1.js.gz [QSA,L]
	<FilesMatch \.js\.gz$>
		ForceType application/x-javascript
	</FilesMatch>";
				}
				if (!empty($this->input['wss_gzip_fonts'])) {
					$content .= "
	RewriteCond %{HTTP:Accept-encoding} gzip
	RewriteCond %{HTTP_USER_AGENT} !Konqueror
	RewriteCond %{REQUEST_FILENAME}.gz -f
	RewriteRule ^(.*)\.(ttf|otf|eot|svg)$ $1.$2.gz [QSA,L]
	<FilesMatch \.ttf\.gz$>
		ForceType application/x-font-truetype
	</FilesMatch>
	<FilesMatch \.otf\.gz$>
		ForceType application/x-font-opentype
	</FilesMatch>
	<FilesMatch \.svg\.gz$>
		ForceType image/svg+xml
	</FilesMatch>
	<FilesMatch \.eot\.gz$>
		ForceType application/vnd.ms-fontobject
	</FilesMatch>";
				}
				$content .= "
</IfModule>";
			}
			if (!empty($this->input['wss_htaccess_mod_expires'])) {
				$content .= "
<IfModule mod_expires.c>
	ExpiresActive On";
				if (!empty($this->input['wss_far_future_expires_html'])) {
					$content .= "
	<FilesMatch \.(html|xhtml|xml|shtml|phtml|php)$>
		ExpiresDefault \"access plus " . $this->input['wss_far_future_expires_html_timeout'] . " seconds\"
	</FilesMatch>
	ExpiresByType text/html A" . $this->input['wss_far_future_expires_html_timeout'] . "
	ExpiresByType text/xml A" . $this->input['wss_far_future_expires_html_timeout'] . "
	ExpiresByType application/xhtml+xml A" . $this->input['wss_far_future_expires_html_timeout'] . "
	ExpiresByType text/plain A" . $this->input['wss_far_future_expires_html_timeout'];
				}
				if (!empty($this->input['wss_far_future_expires_css'])) {
					$content .= "
	<FilesMatch \.css$>
		ExpiresDefault \"access plus 10 years\"
	</FilesMatch>
	ExpiresByType text/css A315360000";
				}
				if (!empty($this->input['wss_far_future_expires_javascript'])) {
					$content .= "
	<FilesMatch \.js$>
		ExpiresDefault \"access plus 10 years\"
	</FilesMatch>
	ExpiresByType text/javascript A315360000
	ExpiresByType application/javascript A315360000
	ExpiresByType application/x-javascript A315360000
	ExpiresByType text/x-js A315360000
	ExpiresByType text/ecmascript A315360000
	ExpiresByType application/ecmascript A315360000
	ExpiresByType text/vbscript A315360000
	ExpiresByType text/fluffscript A315360000";
				}
				if (!empty($this->input['wss_far_future_expires_images']) && !empty($this->premium)) {
					$content .= "
	<FilesMatch \.(bmp|png|gif|jpe?g|ico)$>
		ExpiresDefault \"access plus 10 years\"
	</FilesMatch>
	ExpiresByType image/gif A315360000
	ExpiresByType image/png A315360000
	ExpiresByType image/jpeg A315360000
	ExpiresByType image/x-icon A315360000
	ExpiresByType image/bmp A315360000";
				}
				if (!empty($this->input['wss_far_future_expires_fonts']) && !empty($this->premium)) {
					$content .= "
	<FilesMatch \.(eot|ttf|otf|svg)$>
		ExpiresDefault \"access plus 10 years\"
	</FilesMatch>
	ExpiresByType application/x-font-opentype A315360000
	ExpiresByType application/x-font-truetype A315360000
	ExpiresByType application/x-font-ttf A315360000
	ExpiresByType application/x-font A315360000
	ExpiresByType font/opentype A315360000
	ExpiresByType font/otf A315360000
	ExpiresByType application/vnd.oasis.opendocument.formula-template A315360000
	ExpiresByType image/svg+xml A315360000
	ExpiresByType application/vnd.ms-fontobject A315360000
	ExpiresByType font/woff A315360000";
				}
				if (!empty($this->input['wss_far_future_expires_video']) && !empty($this->premium)) {
					$content .= "
	<FilesMatch \.(flv|wmv|asf|asx|wma|wax|wmx|wm)$>
		ExpiresDefault \"access plus 10 years\"
	</FilesMatch>
	ExpiresByType video/x-flv A315360000
	ExpiresByType video/x-ms-wmv A315360000
	ExpiresByType video/x-ms-asf A315360000
	ExpiresByType video/x-ms-asx A315360000
	ExpiresByType video/x-ms-wma A315360000
	ExpiresByType video/x-ms-wax A315360000
	ExpiresByType video/x-ms-wmx A315360000
	ExpiresByType video/x-ms-wm A315360000";
				}
				if (!empty($this->input['wss_far_future_expires_static']) && !empty($this->premium)) {
					$content .= "
	<FilesMatch \.(swf|pdf|doc|rtf|xls|ppt)$>
		ExpiresDefault \"access plus 10 years\"
	</FilesMatch>
	ExpiresByType application/x-shockwave-flash A315360000
	ExpiresByType application/pdf A315360000
	ExpiresByType application/msword A315360000
	ExpiresByType application/rtf A315360000
	ExpiresByType application/vnd.ms-excel A315360000
	ExpiresByType application/vnd.ms-powerpoint A315360000";
				}
				$content .= "
</IfModule>";
/* add Expires headers via PHP script if we don't have mod_expires */
			} elseif (!empty($this->input['wss_htaccess_mod_rewrite'])) {
				$cachedir = str_replace($this->input['wss_website_root'], "/", $this->input['wss_html_cachedir']);
				$content .= "
<IfModule mod_rewrite.c>";
				if (!empty($this->input['wss_far_future_expires_css'])) {
					$content .= "
	RewriteRule ^(.*)\.css$ " . $cachedir . "wo.static.php?$1.css [L]";
				}
				if (!empty($this->input['wss_far_future_expires_javascript'])) {
					$content .= "
	RewriteRule ^(.*)\.js$ " . $cachedir . "wo.static.php?$1.js [L]";
				}
				if (!empty($this->input['wss_far_future_expires_images'])) {
					$content .= "
	RewriteRule ^(.*)\.(bmp|gif|png|jpe?g|ico)$ " . $cachedir . "wo.static.php?$1.$2 [L]";
				}
				if (!empty($this->input['wss_far_future_expires_video'])) {
					$content .= "
	RewriteRule ^(.*)\.(flv|wmv|asf|asx|wma|wax|wmx|wm)$ " . $cachedir . "wo.static.php?$1.$2 [L]";
				}
				if (!empty($this->input['wss_far_future_expires_static'])) {
					$content .= "
	RewriteRule ^(.*)\.(swf|pdf|doc|rtf|xls|ppt)$ " . $cachedir . "wo.static.php?$1.$2 [L]";
				}
				if (!empty($this->input['wss_far_future_expires_fonts'])) {
					$content .= "
	RewriteRule ^(.*)\.(eot|ttf|otf|svg)$ " . $cachedir . "wo.static.php?$1.$2 [L]";
				}
				$content .= "
</IfModule>";
			}
			if (!empty($this->input['wss_htaccess_mod_headers']) && !empty($this->premium)) {
				$content .= "
<IfModule mod_headers.c>";
				if (!empty($this->input['wss_htaccess_mod_deflate']) ||
					!empty($this->input['wss_htaccess_mod_gzip'])) {
						$content .= "
	<FilesMatch \.(css|js)$>
		Header append Vary User-Agent
		Header append Cache-Control private
	</FilesMatch>";
				}
				if (!empty($this->input['wss_htaccess_mod_expires'])) {
					$content .= "
	<FilesMatch \.(bmp|png|gif|jpe?g|ico|flv|wmv|asf|asx|wma|wax|wmx|wm|swf|pdf|doc|rtf|xls|ppt|eot|ttf|otf|svg)$>
		Header append Cache-Control public
	</FilesMatch>
	<FilesMatch \.(js|css|bmp|png|gif|jpe?g|ico|flv|wmv|asf|asx|wma|wax|wmx|wm|swf|pdf|doc|rtf|xls|ppt)$>
		Header unset Last-Modified
		FileETag MTime
	</FilesMatch>";
				}
				$content .= "
</IfModule>";
			}
			$content .= "\n# Web Optimizer end";
/* define CMS */
			if (empty($this->cms_version)) {
				$this->cms_version = $this->system_info($this->view->paths['absolute']['document_root']);
			}
			$cms_frameworks = array('Zend Framework', 'Symfony', 'CodeIgniter', 'Kohana', 'Yii', 'CakePHP');
/* prevent rewrite to admin access on frameworks */
			if (in_array($this->cms_version, $cms_frameworks)) {
				$content_saved = preg_replace("/((#\s*)?RewriteRule \.\* index.php\r?\n)/", "# Web Optimizer path\nRewriteCond %{REQUEST_FILENAME} ^(". $this->view->paths['relative']['current_directory'] .")\n# Web Optimizer path end\n$1", $content_saved);
			}
			$this->write_file($this->htaccess, $content . "\n" . $content_saved, 1);
		}
	}

	/**
	* Final stage
	* 
	**/	
	function install_install($skip = false) {
		$auto_rewrite = 0;
/* define CMS */
		if (empty($this->cms_version)) {
			$this->cms_version =
				$this->system_info($this->view->paths['absolute']['document_root']);
		}
/* sve initial options */
		$this->compress_options['document_root'] = empty($this->compress_options['document_root']) ?
			$this->view->paths['absolute']['document_root'] : $this->compress_options['document_root'];
		$this->compress_options['website_root'] = empty($this->compress_options['website_root']) ?
			$this->view->paths['full']['document_root'] : $this->compress_options['website_root'];
		$this->compress_options['css_cachedir'] = empty($this->compress_options['css_cachedir']) ?
			$this->view->paths['absolute']['document_root'] . 'webo/cache/' : $this->compress_options['css_cachedir'];
		$this->compress_options['javascript_cachedir'] = empty($this->compress_options['javascript_cachedir']) ?
			$this->view->paths['absolute']['document_root'] . 'webo/cache/' : $this->compress_options['javascript_cachedir'];
		$this->compress_options['html_cachedir'] = empty($this->compress_options['html_cachedir']) ?
			$this->view->paths['absolute']['document_root'] . 'webo/cache/' : $this->compress_options['html_cachedir'];
		foreach (array(
			'document_root',
			'website_root',
			'css_cachedir',
			'javascript_cachedir',
			'html_cachedir') as $val) {
				$this->save_option("['" . $val . "']", $this->compress_options[$val]);
		}
/* copy some files */
		@copy($this->basepath . 'images/web.optimizer.stamp.png', $this->compress_options['css_cachedir'] . 'web.optimizer.stamp.png');
		@copy($this->basepath . 'libs/js/wo.cookie.php', $this->compress_options['html_cachedir'] . 'wo.cookie.php');
		@copy($this->basepath . 'libs/js/yass.loader.js', $this->compress_options['javascript_cachedir'] . 'yass.loader.js');
/* dirty hack for PHP-Nuke */
		if ($this->cms_version == 'PHP-Nuke') {
			$mainfile = $this->view->paths['absolute']['document_root'] . 'mainfile.php';
			$footer = $this->view->paths['absolute']['document_root'] . 'footer.php';
			$mainfile_content = @file_get_contents($mainfile);
			$footer_content = @file_get_contents($footer);
			if (!empty($mainfile_content) && !empty($footer_content)) {
/* create backup */
				@copy($mainfile, $mainfile . '.backup');
/* update main PHP-Nuke file */
				$return1 = $this->write_file($mainfile,
					preg_replace("/(if\s+\(!ini_get\('register_globals)/",
					'require(\'' . $this->basepath .
					'web.optimizer.php\');' . "\n$1",
					preg_replace("/require\('[^\']+\/web.optimizer.php'\);\r?\n?/", "", $mainfile_content)), 1);
/* create backup */
				@copy($footer, $footer . '.backup');
/* update footer */
				$return2 = $this->write_file($footer, preg_replace("/global /", 'global \$web_optimizer,', preg_replace("/(\s*ob_end_flush\(\);)/", '\$web_optimizer->finish();' . "\n$1", preg_replace("/(\\\$web_optimizer,|\\\$web_optimizer->finish\(\);\r?\n?)/", "", $footer_content))), 1);
				if (!empty($return1) && !empty($return2)) {
					$auto_rewrite = 1;
				}
			}
/* another dirty hack for phpBB */
		} elseif ($this->cms_version == 'phpBB') {
			$mainfile = $this->view->paths['absolute']['document_root'] .
				'includes/functions.php';
			$mainfile_content = @file_get_contents($mainfile);
			if (!empty($mainfile_content)) {
/* create backup */
				@copy($mainfile, $mainfile . '.backup');
/* remove any old strings regarding Web Optimizer */
				$mainfile_content =
					preg_replace("/\\\$web_optimizer->finish\(\);\r?\n?/", "",
					preg_replace("/require\('[^\']+\/web.optimizer.php'\);\r?\n?/", "",
					$mainfile_content));
/* add class declaration */
				$mainfile_content =
					preg_replace("/(function\s*page_footer\s*\([^\)]+\)[\r\n\s]*\{)/",
					"$1\n" . 'require(\'' . $this->basepath . 'web.optimizer.php\');',
					$mainfile_content);
/* add finish */
				$mainfile_content =
					preg_replace("/(\\\$template->display\(['\"]body['\"]\);\r?\n?)/",
					"$1" . '\$web_optimizer->finish();' . "\n",
					$mainfile_content);
				$return = $this->write_file($mainfile, $mainfile_content, 1);
				if (!empty($return)) {
					$auto_rewrite = 1;
				}
			}
/* one more dirty hack for ipb */
		} elseif ($this->cms_version == 'Invision Power Board') {
			$mainfile = $this->view->paths['absolute']['document_root'] .
				'sources/classes/class_display.php';
			$mainfile_content = @file_get_contents($mainfile);
			if (!empty($mainfile_content)) {
/* create backup */
				@copy($mainfile, $mainfile . '.backup');
/* add class declaration */
				$mainfile_content =
					preg_replace("/(print \\\$this->ipsclass->skin\['_wrapper'\];\r?\n?)/",
					'require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n$1",
					$mainfile_content);
/* add finish */
				$mainfile_content =
					preg_replace("/(print \\\$this->ipsclass->skin\['_wrapper'\];\r?\n?)/", "$1" . '\$web_optimizer->finish();' . "\n", $mainfile_content);
				$return = $this->write_file($mainfile, $mainfile_content, 1);
				if (!empty($return)) {
					$auto_rewrite = 1;
				}
			}
/* and for Bitrix */
		} elseif ($this->cms_version == 'Bitrix') {
			$mainfile = $this->view->paths['absolute']['document_root'] . 'bitrix/header.php';
			$footer = $this->view->paths['absolute']['document_root'] . 'bitrix/modules/main/include/epilog_after.php';
			$mainfile_content = @file_get_contents($mainfile);
			$footer_content = @file_get_contents($footer);
			if (!empty($mainfile_content) && !empty($footer_content)) {
/* create backup */
				@copy($mainfile, $mainfile . '.backup');
/* update header */
				$return1 = $this->write_file($mainfile, preg_replace("/<\?/", '<? require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n", $mainfile_content), 1);
/* create backup */
				@copy($footer, $footer . '.backup');
/* update footer */
				$return2 = $this->write_file($footer, preg_replace("/(echo\s*\\\$r;\r?\n?)/", "$1\n" . '\$web_optimizer->finish();' . "\n", preg_replace("/\\\$web_optimizer->finish\(\);\r?\n?/", "", $footer_content)), 1);
				if (!empty($return1) && !empty($return2)) {
					$auto_rewrite = 1;
				}
			}
/* and for Open Slaed */
		} elseif (substr($this->cms_version, 0, 10) == 'Open Slaed') {
			$mainfile = $this->view->paths['absolute']['document_root'] . 'index.php';
			$footer = $this->view->paths['absolute']['document_root'] . 'function/function.php';
			$mainfile_content = @file_get_contents($mainfile);
			$footer_content = @file_get_contents($footer);
			if (!empty($mainfile_content) && !empty($footer_content)) {
/* create backup */
				@copy($mainfile, $mainfile . '.backup');
/* update mainfile */
				$return1 = $this->write_file($mainfile, preg_replace("/(<\?(php)?)/", "$1" . ' require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n", $mainfile_content), 1);
/* create backup */
				@copy($footer, $footer . '.backup');
				$footer_content = preg_replace('!(readfile\(\$cacheurl\);)!', "$1\n" . 'global $web_optimizer;$web_optimizer->finish();', $footer_content);
				$footer_content = preg_replace('!(ob_end_flush\(\);)!', 'global $web_optimizer;$web_optimizer->finish();' . "\n$1", $footer_content);
/* update footer */
				$return2 = $this->write_file($footer, $footer_content, 1);
				if (!empty($return1) && !empty($return2)) {
					$auto_rewrite = 1;
				}
			}
/* and for 4images */
		} elseif ($this->cms_version == '4images') {
			$mainfile = $this->view->paths['absolute']['document_root'] . 'includes/page_header.php';
			$footer = $this->view->paths['absolute']['document_root'] . 'includes/page_footer.php';
			$mainfile_content = @file_get_contents($mainfile);
			$footer_content = @file_get_contents($footer);
			if (!empty($mainfile_content) && !empty($footer_content)) {
/* create backup */
				@copy($mainfile, $mainfile . '.backup');
/* update mainfile */
				$return1 = $this->write_file($mainfile, preg_replace("/(<\?(php)?)/", "$1" . ' require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n", $mainfile_content), 1);
/* create backup */
				@copy($footer, $footer . '.backup');
				$footer_content = preg_replace('!(exit;)!', 'global $web_optimizer;$web_optimizer->finish();' . "$1", $footer_content);
/* update footer */
				$return2 = $this->write_file($footer, $footer_content, 1);
				if (!empty($return1) && !empty($return2)) {
					$auto_rewrite = 1;
				}
			}
/* and for VaM Shop, osCommerce */
		} elseif ($this->cms_version == 'VaM Shop' || $this->cms_version == 'osCommerce') {
			$mainfile = $this->view->paths['absolute']['document_root'] . 'includes/application_top.php';
			$footer = $this->view->paths['absolute']['document_root'] . 'includes/application_bottom.php';
			$mainfile_content = @file_get_contents($mainfile);
			$footer_content = @file_get_contents($footer);
			if (!empty($mainfile_content) && !empty($footer_content)) {
/* create backup */
				@copy($mainfile, $mainfile . '.backup');
/* update mainfile */
				$return1 = $this->write_file($mainfile, preg_replace("/(<\?(php)?)/", "$1" . ' require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n", $mainfile_content), 1);
/* create backup */
				@copy($footer, $footer . '.backup');
				$footer_content = preg_replace('!(\?>)!s', '$web_optimizer->finish();' . "$1", $footer_content);
/* update footer */
				$return2 = $this->write_file($footer, $footer_content, 1);
				if (!empty($return1) && !empty($return2)) {
					$auto_rewrite = 1;
				}
			}
		} else {
			$index = $this->view->paths['absolute']['document_root'] . 'index.php';
			if (substr($this->cms_version, 0, 9) == 'vBulletin') {
				$index = $this->view->paths['absolute']['document_root'] . 'includes/functions.php';
			} elseif ($this->cms_version == 'NetCat') {
				$index = $this->view->paths['absolute']['document_root'] . 'netcat/require/e404.php';
			}
			$fp = @fopen($index, "r");
			if ($fp) {
				$content_saved = '';
				while ($index_string = fgets($fp)) {
					$content_saved .= preg_replace("/(require\('[^\']+\/web.optimizer.php'\)|\\\$web_optimizer->finish\(\));\r?\n?/i", "", $index_string);
				}
/* fix for Joomla 1.0 */
				if (preg_match("/Joomla! 1\.0/", $this->cms_version)) {
					$content_saved = preg_replace("/(initGzip\(\);\r?\n)/i", 'require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n$1", $content_saved);
/* fix for Joomla 1.5+ */
				} elseif (preg_match("/Joomla! 1\.[56789]/", $this->cms_version)) {
					$content_saved = preg_replace("/(\\\$mainframe\s*=&\s*JFactory::getApplication\(['\"]site['\"]\);\r?\n)/i",  "$1" . 'require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n", $content_saved);
/* fix for Joostina */
				} elseif (preg_match("/Joostina/", $this->cms_version)) {
					$content_saved = preg_replace("/(require_once\s*\([^\)]+frontend\.php)/i", 'require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n$1", $content_saved);
/* fix for vBulletin */
				} elseif (substr($this->cms_version, 0, 9) == 'vBulletin') {
					$content_saved = preg_replace("/(\(\\\$hook\s*=\s*vBulletinHook::fetch_hook\('global_complete'\)\))/i", 'require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n$1", $content_saved);
/* fix for CMS Made Simple */							
				} elseif (substr($this->cms_version, 0, 15) == 'CMS Made Simple') {
					$content_saved = preg_replace("/(echo\s*\\\$html;)/", 'require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n$1", $content_saved);
/* fix for UMI.CMS */							
				} elseif (substr($this->cms_version, 0, 7) == 'UMI.CMS') {
					$content_saved = preg_replace("/(sha1.*)\r?\n([\s\t]*echo\s*\\\$res;)/", "$1\n" . 'require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n$2", $content_saved);
				} elseif (substr($content_saved, 0, 2) == '<?') {
/* add require block */
					$content_saved = preg_replace("/^<\?(php)?( |\r?\n)/i", '<?$1$2require(\'' . $this->basepath . 'web.optimizer.php\');' . "\n", $content_saved);
				} else {
					$content_saved = "<?php require('" . $this->basepath . "web.optimizer.php'); ?>" . $content_saved;
				}
/* fix for DataLife Engine */
				if (substr($this->cms_version, 0, 15) == 'DataLife Engine') {
					$content_saved = preg_replace("/(GzipOut\s*\(\);)/", '$web_optimizer->finish();' . "\n$1", $content_saved);
/* fix for vBulletin */
				} elseif (substr($this->cms_version, 0, 9) == 'vBulletin') {
					$content_saved = preg_replace("/(flush\s*\(\);[\r\n\s\t]*\})/", "$1\n" . '$web_optimizer->finish();', $content_saved);
/* fix for Joomla! 1.0 */
				} elseif (preg_match("/Joomla! 1\.0/", $this->cms_version)) {
					$content_saved = preg_replace("/(doGzip\(\);\r?\n)/i", '$web_optimizer->finish();' . "\n$1" , $content_saved);
/* fix for CMS Made Simple */
				} elseif (substr($this->cms_version, 0, 15) == 'CMS Made Simple') {
					$content_saved = preg_replace("/(echo\s*\\\$html;)/", "$1\n" . '$web_optimizer->finish();', $content_saved);
/* fix for UMI.CMS */
				} elseif (substr($this->cms_version, 0, 7) == 'UMI.CMS') {
					$content_saved = preg_replace("/(web\.optimizer.*\r?\n[\s\t]*echo\s*\\\$res;)/", "$1\n" . '$web_optimizer->finish();', $content_saved);
/* fix for MaxDev */
				} elseif (substr($this->cms_version, 0, 6) == 'MaxDev') {
					$content_saved = preg_replace("/(\\\$output->PrintPage\(\);)/", "$1" . '$web_optimizer->finish();', $content_saved);
					$content_saved = preg_replace("/(\}[\r\n\t\s]+)(exit;)/", "$1" . '$web_optimizer->finish();' . "$2", $content_saved);
				} elseif (preg_match("/\?>[\r\n\s]*$/", $content_saved)) {
/* small fix for Joostina */
					if (substr($this->cms_version, 0, 8) == 'Joostina') {
						$content_saved = preg_replace("/(exit\s*\(\);\r?\n\?>)[\r\n\s]*$/", '$web_optimizer->finish();' . "\n$1", $content_saved);
					} else {
/* add finish block */
						$content_saved = preg_replace("/ ?\?>[\r\n\s]*$/", '\$web_optimizer->finish(); ?>', $content_saved);
					}
				} else {
/* fix for Drupal / Joomla / others on not-closed ?> */
					$content_saved .= '$web_optimizer->finish();';
				}
				@fclose($fp);
/* create backup */
				@copy($index, $index . '.backup');
				$return = $this->write_file($index, $content_saved, 1);
				if (!empty($return)) {
					$auto_rewrite = 1;
				}
/* additional change of cache plugins */
				if (preg_match("/Joomla! 1\.[56789]/", $this->cms_version)) {
/* System-Cache plugin */
					$cache_file = $this->view->paths['absolute']['document_root'] . 'plugins/system/cache.php';
					if (@is_file($cache_file)) {
						@copy($cache_file, $cache_file . '.backup');
						$content = preg_replace("/(\\\$mainframe->close)/", 'global \$web_optimizer;\$web_optimizer->finish();' . "$1", @file_get_contents($cache_file));
						$this->write_file($cache_file, $content);
					}
/* JRE component */
					$cache_file = $this->view->paths['absolute']['document_root'] . 'administrator/components/com_jrecache/includes/cache_handler.php';
					if (@is_file($cache_file)) {
						@copy($cache_file, $cache_file . '.backup');
						$content = preg_replace("/(echo \\\$output;)/", 'require(\'' . $this->basepath . 'web.optimizer.php\');' . "$1" . '\$web_optimizer->finish();', @file_get_contents($cache_file));
						$this->write_file($cache_file, $content);
					}
				}
				if (preg_match("/Joomla! 1\.0/", $this->cms_version)) {
/* PageCache component */
					$cache_file = $this->view->paths['absolute']['document_root'] . 'components/com_pagecache/pagecache.class.php';
					if (@is_file($cache_file)) {
						@copy($cache_file, $cache_file . '.backup');
						$content = preg_replace("/(echo \\\$data;)/", "$1" . 'global \$web_optimizer;\$web_optimizer->finish();', @file_get_contents($cache_file));
						$this->write_file($cache_file, $content);
					}
/* System-Cache mambot */
					$cache_file = $this->view->paths['absolute']['document_root'] . 'mambots/system/cache.php';
					if (@is_file($cache_file)) {
						@copy($cache_file, $cache_file . '.backup');
						$content = preg_replace("/(echo \\\$content;)/", 'require(\'' . $this->basepath . 'web.optimizer.php\');' . "$1" . '\$web_optimizer->finish();', @file_get_contents($cache_file));
						$this->write_file($cache_file, $content);
					}
				}
				if (substr($this->cms_version, 0, 5) == 'XOOPS') {
					$cache_file = $this->view->paths['absolute']['document_root'] . 'class/theme.php';
					if (@is_file($cache_file)) {
						@copy($cache_file, $cache_file . '.backup');
						$content = preg_replace("/(\\\$this->render\([^\(]+\);)/", "$1" . 'global \$web_optimizer;\$web_optimizer->finish();', @file_get_contents($cache_file));
						$this->write_file($cache_file, $content);
					}
				}
			}
			if (!$skip) {
				$this->install_system(2 - $auto_rewrite);
			}
		}

/* execute plugin-specific logic */
		$plugins = explode(" ", $this->compress_options['plugins']);
		if (is_array($plugins)) {
			foreach ($plugins as $plugin) {
				$plugin_file = $this->basepath . 'plugins/' . $plugin . '.php';
				if (@is_file($plugin_file)) {
					include($plugin_file);
					$web_optimizer_plugin->onInstall($this->view->paths['absolute']['document_root']);
				}
			}
		}
		return $auto_rewrite;
	}

	/**
	* Get all loaded Apache modules and do some magic
	*
	**/
	function get_modules () {
	/* check for Apache installation */
		if (function_exists('apache_get_modules')) {
			$apache_modules = apache_get_modules();
		} else {
/* if PHP installed as CGI module -- we don't need .htaccess */	
			$apache_modules = array();
		}
		$this->apache_modules = array();
		if (in_array('mod_expires', $apache_modules)) {
			$this->apache_modules[] = 'mod_expires';
		}
		if (in_array('mod_gzip', $apache_modules)) {
			$this->apache_modules[] = 'mod_gzip';
		}
		if (in_array('mod_deflate', $apache_modules) && in_array('mod_filter', $apache_modules)) {
			$this->apache_modules[] = 'mod_deflate';
		}
		if (in_array('mod_headers', $apache_modules)) {
			$this->apache_modules[] = 'mod_headers';
		}
		if (in_array('mod_setenvif', $apache_modules)) {
			$this->apache_modules[] = 'mod_setenvif';
		}
		if (in_array('mod_mime', $apache_modules)) {
			$this->apache_modules[] = 'mod_mime';
		}
		if (in_array('mod_rewrite', $apache_modules)) {
			$this->apache_modules[] = 'mod_rewrite';
		}
		$javascript_cachedir = empty($this->compress_options['javascript_cachedir']) ? $this->view->paths['full']['current_directory'] . 'cache/' : $this->compress_options['javascript_cachedir'];
		$document_root = empty($this->compress_options['document_root']) ? $this->view->paths['full']['document_root'] : $this->compress_options['document_root'];
/* detect if hosting is compatible with SynLinks rule (included in core) */
		if ($this->check_apache_module('Options +FollowSymLinks +SymLinksIfOwnerMatch', $document_root, $javascript_cachedir, 'mod_symlinks')) {
			$this->apache_modules[] = 'mod_symlinks';
		}
/* download restricted file, if sizes are equal =? file isn't restricted => htaccess won't work */
		$this->view->download(str_replace($document_root, "http://" . $_SERVER['HTTP_HOST'] . "/", $this->basepath) . 'libs/php/css.sprites.php', $javascript_cachedir . 'htaccess.test');
		if (@filesize($javascript_cachedir . 'htaccess.test') == @filesize($this->basepath . 'libs/php/css.sprites.php')) {
			$this->apache_modules = array();
		} elseif (!count($this->apache_modules) && function_exists('curl_init')) {
			$modules = array(
				'mod_deflate' => 'AddOutputFilterByType DEFLATE text/javascript application/javascript application/x-javascript text/x-js text/ecmascript application/ecmascript text/vbscript text/fluffscript',
				'mod_gzip' => 'mod_gzip_on Yes',
				'mod_headers' => 'Header append Cache-Control public',
				'mod_expires' => 'ExpiresActive On',
				'mod_setenvif' => 'BrowserMatch SV1; !no_gzip',
				'mod_mime' => 'AddEncoding gzip .gz',
				'mod_rewrite' => "RewriteEngine On
				RewriteRule ^(.*)\.wo[0-9]+\.js$ $1.js"
			);
/* detect modules one by one, it can be CGI environment */
			foreach ($modules as $key => $value) {
				if ($this->check_apache_module($value, $document_root, $javascript_cachedir, $key)) {
					$this->apache_modules[] = $key;
				}
			}
		}
		@unlink($javascript_cachedir . 'htaccess.test');
	}

	/**
	* Checks exitence of current Apache module
	*
	**/
	function check_apache_module ($rule, $document_root, $javascript_cachedir, $module) {
		$testfile = 'libs/js/yass.loader.js';
		$curlfile = 'libs/js/yass.loader.' . ($module == 'mod_rewrite' ? 'wo123.' : '') . 'js';
		$return = false;
		$this->write_file($this->basepath . 'libs/js/.htaccess', $rule);
		$recursive = 0;
		while (!($filesize = @filesize($javascript_cachedir . 'module.test')) &&
			$recursive < 10) {
				$curl = $this->view->download(str_replace(realpath($document_root),
					"http://" . $_SERVER['HTTP_HOST'],
					realpath($this->basepath)) . '/' .
					$curlfile, $javascript_cachedir . 'module.test');
				$recursive++;
		}
/* it it's possible to get file => module works */
		if ($filesize == @filesize($this->basepath . $testfile)) {
				$return = true;
		}
/* check for gzip / deflate support */
		if ((strpos($rule, 'DEFLATE') || strpos($rule, 'gzip')) && !$curl) {
			$return = false;
		}
		@unlink($javascript_cachedir . 'module.test');
		@unlink($this->basepath . 'libs/js/.htaccess');
		return $return;
	}

	/**
	* Consequenty emulate different stages of optimization process
	* To prevent initial delay for optimized website and PHP timeout
	*
	**/
	function chained_load ($index = false) {
/* force cache reload via index.php */
		if ($index) {
/* deactivate Web Optimizer */
			$this->save_option("['active']", 0, 0);
/* load home page in DEBUG mode */
			$this->view->download('http://' . $_SERVER['HTTP_HOST'] . $index .
				'?web_optimizer_stage=10&cache_version=' .
					$this->cache_version .
				'&web_optimizer_debug=1',
				$this->compress_options['html_cachedir'] . 'chained.load', 29);
			if (@is_file($this->compress_options['html_cachedir'] . 'chained.load')) {
				@unlink($this->compress_options['html_cachedir'] . 'chained.load');
			}
/* activate Web Optimizer back */
			$this->save_option("['active']", 1, 0);
/* or via cached HTML */
		} else {
			$test_file = $this->basepath . 'cache/optimizing.php';
			$this->write_progress(8);
/* try to download main file */
			$this->view->download('http://' . $_SERVER['HTTP_HOST'] . '/', $test_file);
			$this->write_progress(9);
			$contents = @file_get_contents($test_file);
			if (!empty($contents)) {
				$return = $this->write_file($test_file, "<?php require('" .
						$this->basepath .
					"web.optimizer.php'); ?>" .
						preg_replace("/<\?xml[^>]+\?>/", "", $contents) .
					'<?php $web_optimizer->finish(); ?>', 1);
				if (!empty($return)) {
					$this->write_progress(10);
					$this->input['user']['auto_rewrite'] =
						empty($this->input['user']['auto_rewrite']) ? array() :
							$this->input['user']['auto_rewrite'];
					$this->input['user']['auto_rewrite']['enabled'] =
						empty($this->input['user']['auto_rewrite']['enabled']) ? 0 : 1;
					header('Location: cache/optimizing.php?web_optimizer_stage=10&password=' .
							$this->input['user']['password'] .
						'&username=' .
							$this->input['user']['username'] .
						'&auto_rewrite=' .
							$this->input['user']['auto_rewrite']['enabled'] .
						'&cache_version=' .
							$this->cache_version .
						'&web_optimizer_debug=1');
					die();
				}
			}
		}
	}

	/**
	* Saves an admin option
	* 
	**/
	function save_option ($option_name, $option_value) {
/* make password salt safe */
		if ($option_name == "['htpasswd']") {
			$option_value = str_replace('$', '\\\\$', str_replace('\\', '\\\\', $option_value));
/* make paths uniform (Windows-Linux). Thx to dmiFedorenko */
		} else {
			$option_value = str_replace('//', '/', str_replace('\\', '/', $option_value));
		}
/* See if file exists */
		$option_file = $this->basepath . $this->options_file;
		if (file_exists($option_file)) {
			$content = @file_get_contents($option_file);
			$content = preg_replace("@(" . preg_quote($option_name) . ")\s*=\s*\"(.*?)\"@is","$1 = \"" . $option_value . "\"", $content);
			$this->write_file($option_file, $content);
		}
	}

	/**
	* Check password
	* 
	**/		
	function check_password ($rewrite = 0) {
/* If passing a username and pass, don't md5 encode */
		if (!empty($this->input['wss_password']) &&
				($this->compress_options['password'] ==
					md5($this->input['wss_password'])) ||
				($this->compress_options['password'] ==
					$this->input['wss__password'])) {
						$this->access = true;
		}
	}
	
	/**
	* Display an error
	* 
	**/		
	function error($string) {
		$page_variables = array(
			"title" => _WEBO_ERROR_ERROR,
			"paths" => $this->view->paths,
			"error" => $string,
			"version" => $this->version,
			"version_new" => $this->version_new,
			"page" => 'error',
			"premium" => $this->premium
		);
/* Show the install page */
		$this->view->render("admin_container", $page_variables);
		die();
	}

	/**
	* Protects Web Optimizer folder via htpasswd
	* 
	**/
	function protect_installation() {
		$htaccess = $this->basepath . '.htaccess';
		$htaccess_content = @file_get_contents($htaccess);
/* clean current content */
		$htaccess_content = preg_replace("!# Web Optimizer protection(\r?\n.*)*Web Optimizer protection end!", "", $htaccess_content);
		$htaccess_content .= '
# Web Optimizer protection';
		$protected = !empty($this->compress_options['htaccess']['access']) ||
			!empty($this->input['user']['htaccess']['access']);
		if ($protected) {
			if (@is_file($this->basepath . '.htpasswd')) {
/* add secure protection via htpasswd */
				$htaccess_content .= '
AuthType Basic
AuthName "Web Optimizer Installation"
AuthUserFile .htpasswd
require valid-user';
			} else {
				$this->error("<p>" . _WEBO_SPLASH2_UNABLE . " ".
					$this->basepath . ".htpasswd</p>");
			}
		}
		$htaccess_content .= '
<Files .htpasswd>
	Deny from all
</Files>
# Web Optimizer protection end';
/* create backup */
		@copy($htaccess, $htaccess . '.backup');
		if (!$this->write_file($htaccess, $htaccess_content) && $protected) {
			$this->error("<p>" . _WEBO_SPLASH2_UNABLE . " ".
				$this->basepath . ".htaccess</p>");
		}
	}
	/**
	* Creates password hash for htpasswd file
	* thx to mikey_nich (at) hotmail . com
	* 
	**/
	function encrypt_password($plainpasswd) {
		$salt = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 8);
		$len = strlen($plainpasswd);
		$text = $plainpasswd . '$apr1$' . $salt;
		$bin = pack("H32", md5($plainpasswd . $salt . $plainpasswd));
		$tmp = '';
		for($i = $len; $i > 0; $i -= 16) {
			$text .= substr($bin, 0, min(16, $i));
		}
		for($i = $len; $i > 0; $i >>= 1) {
			$text .= ($i & 1) ? chr(0) : $plainpasswd{0};
		}
		$bin = pack("H32", md5($text));
		for($i = 0; $i < 1000; $i++) {
			$new = ($i & 1) ? $plainpasswd : $bin;
			if ($i % 3) {
				$new .= $salt;
			}
			if ($i % 7) {
				$new .= $plainpasswd;
			}
			$new .= ($i & 1) ? $bin : $plainpasswd;
			$bin = pack("H32", md5($new));
		}
		for ($i = 0; $i < 5; $i++) {
			$k = $i + 6;
			$j = $i + 12;
			if ($j == 16) {
				$j = 5;
			}
			$tmp = $bin[$i].$bin[$k].$bin[$j].$tmp;
		}
		$tmp = chr(0).chr(0).$bin[11].$tmp;
		$tmp = strtr(strrev(substr(base64_encode($tmp), 2)),
		"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
		"./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
		return "$" . "apr1" . "$" . $salt . "$" . $tmp;
	}

	/**
	* Get current PHP system info
	* 
	**/
	function system_info($root) {
/* Wordpress */
		if (@is_file($root . 'wp-includes/version.php')) {
			$wp_version = '1.0.0';
			require($root . 'wp-includes/version.php');
			return 'Wordpress ' . $wp_version;
		} elseif (@is_file($root . 'modules/system/system.info')) {
/* Drupal */
			$drupal_version = '1.0.0';
			$fp  = @fopen($root . 'modules/system/system.info', "r");
			if ($fp) {
				while ($str = fgets($fp)) {
					if (strstr($str, 'version = "')) {
						$drupal_version = preg_replace('/version\s+=\s+"([0-9.]*?)"/', "$1", $str);
					}
				}
			}
			return 'Drupal ' . trim($drupal_version);
/* Joomla 1.5 */
		} elseif (@is_file($root . 'libraries/joomla/version.php')) {
			return 'Joomla!';
		} elseif (@is_dir($root . 'includes')) {
/* for PHP-Nuke 8.0 */
			if (@is_file($root . 'modules/Journal/copyright.php') && @is_file($root . 'footer.php') && @is_file($root . 'mainfile.php')) {
				return 'PHP-Nuke';
/* vBulletin */
			} elseif (@is_file($root . 'includes/class_core.php')) {
				require($root . 'includes/class_core.php');
				$vbulletin_version = '';
				if (defined('FILE_VERSION')) {
					$vbulletin_version = ' ' . FILE_VERSION;
				}
				return 'vBulletin' . $vbulletin_version;
/* phpBB (3.0) */
			} elseif (@is_file($root . 'includes/functions_privmsgs.php')) {
				return 'phpBB';
/* osCommerce (2.2) */
			} elseif (@is_file($root . 'includes/tld.txt')) {
				return 'osCommerce';
/* Joomla 1.0, Joostina */
			} elseif (@is_file($root . 'includes/version.php')) {
				define('_VALID_MOS', 1);
				$joomla_version = '1.0';
				$joomla_title = 'Joomla!';
				if (substr(phpversion(), 0, 1) == 4) {
					if (!class_exists('joomlaVersion')) {
						require($root . 'includes/version.php');
					} else {
						$_VERSION = new joomlaVersion();
					}
				} else {
					if (!class_exists('joomlaVersion', false)) {
						require($root . 'includes/version.php');
					} else {
						$_VERSION = new joomlaVersion();
					}
				}
				$joomla_version = empty($_VERSION->CMS_ver) ? ($_VERSION->RELEASE . '.' . $_VERSION->DEV_LEVEL) : $_VERSION->CMS_ver;
				$joomla_title = empty($_VERSION->CMS) ? $_VERSION->PRODUCT : $_VERSION->CMS;
				return $joomla_title . ' ' . $joomla_version;
/* 4images */
			} elseif (@is_file($root . 'postcards.php')) {
				return '4images';
/* VaM Shop */
			} elseif (@is_file($root . 'includes/application_top.php')) {
				return 'VaM Shop';
/* MaxDev Pro */
			} elseif (@is_file($root . 'includes/mdHTML.php')) {
				return 'MaxDev Pro';
			}
/* Typo 3 */
		} elseif (@is_dir($root . 'typo3conf')) {
			$TYPO3_CONF_VARS = array('SYS' => array('compat_version' => '4.2'));
			if (@is_file($root . 'typo3conf/localconf.php')) {
				require($root . 'typo3conf/localconf.php');
			}
			return 'Typo3 ' . $TYPO3_CONF_VARS['SYS']['compat_version'];
/* Simpla */
		} elseif (@is_file($root . 'Storefront.class.php')) {
			return 'Simpla';
/* Etomate 1.0, MODx */
		} elseif (@is_file($root . 'manager/includes/version.inc.php')) {
			require($root . 'manager/includes/version.inc.php');
			if (empty($full_appname)) {
				return 'Etomite ' . $release;
			} else {
/* MODx case */
				return $full_appname;
			}
/* LiveStreet */
		} elseif (@is_file($root . 'classes/engine/Router.class.php')) {
			return 'LiveStreet';
/* Santafox */
		} elseif (@is_file($root . 'ini.php')) {
			require($root . 'ini.php');
			if (defined('SANTAFOX_VERSION')) {
				return 'Santafox ' . SANTAFOX_VERSION;
			} else {
				return 'Santafox';
			}
/* Zend Framework */
		} elseif (@is_file($root . '../application/configs/config.ini')) {
			return 'Zend Framework';
/* DataLife Engine */
		} elseif (@is_file($root . 'engine/data/config.php')) {
			$config = array(
				'version_id' => '8.0'
			);
			require($root . 'engine/data/config.php');
			return 'DataLife Engine ' . $config['version_id'];
/* CodeIgniter */
		} elseif (@is_file($root . 'system/codeigniter/CodeIgniter.php')) {
			return 'CodeIgniter';
/* Symfony */
		} elseif (@is_file($root . '../lib/symfony/config/config/settings.yml')) {
			return 'Symfony';
/* Textpattern */
		} elseif (@is_file($root . 'textpattern/index.php')) {
			$version = preg_replace("/['\"].*/", "", preg_replace("/.*\\\$thisversion\s*=\s*['\"]/", "", preg_replace("/\r?\n/", "", @file_get_contents($root . 'textpattern/index.php'))));
			return 'Textpattern ' . $version;
/* Kohana */
		} elseif (@is_file($root . 'system/core/Kohana.php')) {
			return 'Kohana';
/* Yii */
		} elseif (@is_file($root . '../framework/YiiBase.php') || @is_file($root . 'framework/YiiBase.php')) {
			return 'Yii';
/* Invision Power Board */
		} elseif (@is_file($root . 'sources/classes/class_display.php')) {
			return 'Invision Power Board';
/* Simple Machines Forum */
		} elseif (@is_file($root . 'Sources/LogInOut.php')) {
			$version = preg_replace("/['\"].*/", "", preg_replace("/.*\\\$forum_version\s*=\s*['\"]/", "", preg_replace("/\r?\n/", "", @file_get_contents($root . 'index.php'))));
			return 'Simple Machines Forum' . (empty($version) ? '' : ' ' . $version);
/* Bitrix */
		} elseif (@is_dir($root . 'bitrix/')) {
			return 'Bitrix';
/* cogear */
		} elseif (@is_file($root . 'gears/global/global.info')) {
			$version = preg_replace("/group.*/", "", preg_replace("/.*version\s*=\s*/", "", preg_replace("/\r?\n/", "", @file_get_contents($root . 'gears/global/global.info'))));
			return 'cogear' . (empty($version) ? '' : ' ' . $version);
/* NetCat */
		} elseif (@is_dir($root . 'netcat/')) {
			return 'NetCat';
/* CakePHP, global root */
		} elseif (@is_file($root . 'cake/VERSION.txt')) {
/* change document root to inner directory */
			$this->view->paths['absolute']['document_root'] = $this->view->ensure_trailing_slash($this->view->unify_dir_separator(substr(getenv("SCRIPT_FILENAME"), 0, strpos(getenv("SCRIPT_FILENAME"), getenv("SCRIPT_NAME")))));
			$this->save_option("['website_root']", $this->view->paths['absolute']['document_root']);
			return 'CakePHP';
/* CakePHP, local root */
		} elseif (@is_file($root . '../../cake/VERSION.txt')) {
			$this->save_option("['document_root']", $root);
			return 'CakePHP';
/* CMS Made Simple */
		} elseif (@is_file($root . 'version.php')) {
			if (@is_file($root . 'plugins/function.cms_version.php')) {
				require_once($root . 'version.php');
			}
			return 'CMS Made Simple ' . $CMS_VERSION;
/* UMI.CMS */
		} elseif (@is_file($root . 'gw.php')) {
			return 'UMI.CMS';
		} elseif (@is_file($root . 'path.php')) {
			require_once($root . 'path.php');
			define('EXT', '1');
/* ExpressionEngine */
			if (!empty($system_path)) {
				require_once($root . $system_path . 'config.php');
				$version = !empty($conf) && !empty($conf['app_version']) ? ' ' . preg_replace("!([0-9])([0-9])([0-9])$!", "$1.$2.$3", $conf['app_version']) : '';
				return 'ExpressionEngine' . $version;
			}
/* Xaraya 1.1.5 */
		} elseif (@is_file($root . 'var/config.system.php')) {
			return 'Xaraya';
/* XOOPS 2.3.3 */
		} elseif (@is_file($root . 'include/version.php')) {
			require($root . 'include/version.php');
			return defined(XOOPS_VERSION) ? XOOPS_VERSION : 'XOOPS';
/* Website Baker 2.8 */
		} elseif (@is_file($root . 'account/preferences.php')) {
			return 'Website Baker';
/* Open Slaed 1.2 */
		} elseif (@is_file($root . 'config/config_global.php')) {
			define('FUNC_FILE', 1);
			require($root . 'config/config_global.php');
			return 'Open Slaed' . (empty($conf['version']) ? '' : ' ' . $conf['version']);
/* Geeklog 1.6.1 */
		} elseif (@is_file($root . '/images/icons/geeklog.gif')) {
			return 'Geeklog';
		}
		return 'CMS 42';
	}

	/**
	* Get files & strings to change manually
	* 
	**/
	function system_files ($cms_version = 'CMS 42') {
		$cms_version = explode(" ", $cms_version);
		$files = array();
		switch ($cms_version[0]) {
			case 'Joomla!':
/* Joomla 1.5.1+ */
				if (preg_match("/1\.[56789]/", $cms_version[1])) {
					$files = array(
						array(
							'file' => 'index.php',
							'mode' => 'start',
							'location' => '$mainframe =& JFactory::getApplication(\'site\');'
						),
						array(
							'file' => 'index.php',
							'mode' => 'finish',
							'location' => 'end'
						),
						array(
							'file' => 'plugins/system/cache.php',
							'mode' => 'finish',
							'location' => 'echo JResponse::toString($mainframe->getCfg(\'gzip\'));',
							'global' => 1
						),
						array(
							'file' => 'administrator/components/com_jrecache/includes/cache_handler.php',
							'mode' => 'start',
							'location' => 'fclose($handle);'
						),
						array(
							'file' => 'administrator/components/com_jrecache/includes/cache_handler.php',
							'mode' => 'finish',
							'location' => 'echo $output;'
						)
					);
/* Joomla 1.0 */
				} else {
					$files = array(
						array(
							'file' => 'index.php',
							'mode' => 'start',
							'location' => 'ob_end_clean();'
						),
						array(
							'file' => 'index.php',
							'mode' => 'finish',
							'location' => 'echo \'</pre>\';}'
						),
						array(
							'file' => 'components/com_pagecache/pagecache.class.php',
							'mode' => 'finish',
							'location' => 'echo $data;',
							'global' => 1
						),
						array(
							'file' => 'mambots/system/cache.php',
							'mode' => 'start',
							'location' => 'initGzip();'
						),
						array(
							'file' => 'mambots/system/cache.php',
							'mode' => 'finish',
							'location' => 'echo $content;'
						),
						array(
							'file' => 'administrator/components/com_jrecache/includes/cache_handler.php',
							'mode' => 'start',
							'location' => 'fclose($handle);'
						),
						array(
							'file' => 'administrator/components/com_jrecache/includes/cache_handler.php',
							'mode' => 'finish',
							'location' => 'echo $output;'
						)
					);
				}
				break;
/* Joostina */
			case 'Joostina':
				$files = array(
					array(
						'file' => 'index.php',
						'mode' => 'start',
						'location' => 'joostina_api::check_host();'
					),
					array(
						'file' => 'index.php',
						'mode' => 'finish',
						'location' => 'if($mosConfig_clearCache == 1 && $mosConfig_caching == 1) joostina_api::clearCache();'
					)
				);
				break;
/* vBulletin */
			case 'vBulletin':
				$files = array(
					array(
						'file' => 'includes/functions.php',
						'mode' => 'start',
						'location' => '$output = process_replacement_vars($vartext);',
						'global' => 1
					),
					array(
						'file' => 'includes/functions.php',
						'mode' => 'finish',
						'location' => 'flush(); }',
					)
				);
				break;
/* DataLife Engine */
			case 'DataLife':
				$files = array(
					array(
						'file' => 'index.php',
						'mode' => 'start'
					),
					array(
						'file' => 'index.php',
						'mode' => 'finish',
						'location' => 'db->close ();'
					)
				);
				break;
/* Bitrix */
			case 'Bitrix':
				$files = array(
					array(
						'file' => 'bitrix/header.php',
						'mode' => 'start'
					),
					array(
						'file' => 'bitrix/modules/main/include/epilog_after.php',
						'mode' => 'finish',
						'location' => 'echo $r;'
					)
				);
/* Invision Power Board */
			case 'Invision':
				$files = array(
					array(
						'file' => 'sources/classes/class_display.php',
						'mode' => 'start',
						'location' => '$this->ipsclass->skin[\'_wrapper\'] = preg_replace( "#htmldocument\.prototype#is", "HTMLDocument_prototype", $this->ipsclass->skin[\'_wrapper\'] );'
					),
					array(
						'file' => 'sources/classes/class_display.php',
						'mode' => 'finish',
						'location' => 'print $this->ipsclass->skin[\'_wrapper\'];'
					)
				);
				break;
/* phpBB */
			case 'phpBB':
				$files = array(
					array(
						'file' => 'includes/functions.php',
						'mode' => 'start',
						'location' => 'function page_footer($run_cron = true) {'
					),
					array(
						'file' => 'includes/functions.php',
						'mode' => 'finish',
						'location' => '$template->display(\'body\');'
					)
				);
				break;
/* PHP-Nuke */
			case 'PHP-Nuke':
				$files = array(
					array(
						'file' => 'mainfile.php',
						'mode' => 'start',
						'location' => 'unset($matches);',
					),
					array(
						'file' => 'footer.php',
						'mode' => 'finish',
						'location' => 'echo "</body>\n</html>";',
						'global' => 1
					)
				);
				break;
/* NetCat */
			case 'NetCat':
				$files = array(
					array(
						'file' => 'netcat/require/e404.php',
						'mode' => 'start',
					),
					array(
						'file' => 'netcat/require/e404.php',
						'mode' => 'finish',
						'location' => 'end'
					)
				);
				break;
/* UMI.CMS */
			case 'UMI.CMS':
				$files = array(
					array(
						'file' => 'index.php',
						'mode' => 'start',
						'location' => 'header("ETag: \"" . sha1($res) . "\");',
					),
					array(
						'file' => 'index.php',
						'mode' => 'finish',
						'location' => 'echo $res;'
					)
				);
				break;
/* XOOPS 2.3.3 */
			case 'XOOPS':
				$files = array(
					array(
						'file' => 'index.php',
						'mode' => 'start',
					),
					array(
						'file' => 'index.php',
						'mode' => 'finish',
						'location' => 'end'
					),
					array(
						'file' => 'class/theme.php',
						'mode' => 'finish',
						'location' => '$this->render( null, null, $template );',
						'global' => 1
					)
				);
				break;
/* Open Slaed 1.2 */
			case 'Open':
				$files = array(
					array(
						'file' => 'function/function.php',
						'mode' => 'start',
						'location' => 'unset($_SESSION[$conf[\'user_c\']]);',
						'global' => 1
					),
					array(
						'file' => 'function/function.php',
						'mode' => 'finish',
						'location' => 'readfile($cacheurl);'
					),
					array(
						'file' => 'function/function.php',
						'mode' => 'finish',
						'location' => 'echo pack(\'V\', $gzip_size);}}',
						'global' => 1
					)
				);
				break;
/* MaxDev Pro */
			case 'MaxDev':
				$files = array(
					array(
						'file' => 'index.php',
						'mode' => 'start'
					),
					array(
						'file' => 'index.php',
						'mode' => 'finish',
						'location' => '$output->PrintPage();'
					),
					array(
						'file' => 'index.php',
						'mode' => 'finish',
						'location' => 'exit;}'
					)
				);
				break;
/* 4images */
			case '4images':
				$files = array(
					array(
						'file' => 'includes/page_header.php',
						'mode' => 'start'
					),
					array(
						'file' => 'includes/page_footer.php',
						'mode' => 'finish',
						'location' => 'echo pack("V", $gzip_size);}'
					),
				);
				break;
/* CMS Made Simple */
			case 'CMS':
				if ($cms_version[1] == 'Made') {
					$files = array(
						array(
							'file' => 'index.php',
							'mode' => 'start',
							'location' => 'header("Content-Type: " . $gCms->variables[\'content-type\'] . "; charset=" . (isset($pageinfo->template_encoding) && $pageinfo->template_encoding != \'\'?$pageinfo->template_encoding:get_encoding()));',
						),
						array(
							'file' => 'index.php',
							'mode' => 'finish',
							'location' => 'echo $html;'
						)
					);
					break;
				}
/* VaM Shop */
			case 'VaM':
				$files = array(
					array(
						'file' => 'includes/application_top.php',
						'mode' => 'start'
					),
					array(
						'file' => 'includes/application_bottom.php',
						'mode' => 'finish',
						'location' => 'end'
					)
				);
/* all other systems */
			default:
				$files = array(
					array(
						'file' => 'index.php',
						'mode' => 'start'
					),
					array(
						'file' => 'index.php',
						'mode' => 'finish',
						'location' => 'end'
					)
				);
				break;
		}
/* return default value */
		return $files;
	}
	
}
?>