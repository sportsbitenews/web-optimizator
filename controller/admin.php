<?php
/**
 * File from PHP Speedy, Leon Chevalier (http://www.aciddrop.com)
 * Adopted to Web Optimizer by Nikolay Matsievsky (http://webo.in)
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
/* Ensure no caching */
		header('Expires: ' . date("r"));
		header("Cache-Control: no-store, no-cache, must-revalidate, private");	
		header("Pragma: no-cache");	
		foreach($options AS $key=>$value) {
			$this->$key = $value;
		}
/* Set name of options file */
		$this->options_file = "config.webo.php";
		require_once($this->basepath . $this->options_file);
		$this->compress_options = $compress_options;
/* Make sure login valid */
		$this->manage_password();
		$this->password_not_required = array(
			'install_enter_password' => 1,
			'install_set_password' => 1
		);
/* to check and download new Web Optimizer version */
		$this->svn = 'http://web-optimizator.googlecode.com/svn/trunk/';
		$this->version = @file_get_contents('version');
/* get the latest version */
		$version_new_file = 'version.new';
		$this->download($this->svn . 'version', $version_new_file);
		if (is_file($version_new_file)) {
			$this->version_new = @file_get_contents($version_new_file);
			@unlink($version_new_file);
		} else {
			$this->version_new = $this->version;
		}
		$this->version_new_exists = round(preg_replace("/\./", "", $this->version)) < round(preg_replace("/\./", "", $this->version_new)) ? 1 : 0;
		if(empty($this->password_not_required[$this->input['page']])) {
			$this->check_login();
		}
/* Set page functions for the installation and admin, makes sure nothing else can be run */
		$this->page_functions = array(
			'install_set_password' => 1,
			'install_enter_password' => 1,
			'install_stage_2' => 1,
			'install_stage_3' => 1,
			'install_uninstall' => 1,
			'install_upgrade' => 1
		);
/* inializa stage for chained optimization */
		$this->web_optimizer_stage = round(empty($this->input['web_optimizer_stage']) ? 0 : $this->input['web_optimizer_stage']);
		$this->display_progress = false;
/* if we use .htaccess*/
		$this->protected = isset($_SERVER['PHP_AUTH_USER']);
/* grade URL from webo.name */
		$this->webo_grade = 'http://webo.name/check/index2.php?url=' . $_SERVER['HTTP_HOST'] . '&mode=xml&source=wo';
/* download counter */
		if (!is_file($this->basepath . 'web-optimizer-counter')) {
			$this->download('http://web-optimizator.googlecode.com/files/web-optimizer-counter', $this->basepath . 'web-optimizer-counter');
		}
/* show page */
		if(!empty($this->page_functions[$this->input['page']]) && method_exists($this,$this->input['page'])) {
			$func = $this->input['page'];
			$this->$func();
		}
	}
	/**
	* Write installation progress to JavaScript file
	* 
	**/	
	function write_progress ($progress, $init = false) {
		$file = $this->basepath . 'cache/progress.html';
		if ($this->display_progress || $init) {
			$fp = @fopen($file, "w");
			if ($fp) {
				@fwrite($fp, '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><title></title><script type="text/javascript">parent.window.lp(' . $progress. ')</script></head><body></body></html>');
				@fclose($fp);
				if ($progress == 100) {
					@unlink($file);
				}
				return true;
			}
			return false;
		}
	}

	/**
	* The very first page -- to define username and password
	* 
	**/	
	function install_set_password() {
		$index_check = 'index.check';
		$index_before = 'index.before';
		$index_after = 'index.after';
		$no_initial_grade = !is_file($index_before) || !@filesize($index_before);
/* try to get reliminary optimization grade for the website */
		if ($no_initial_grade) {
			$this->download($this->webo_grade, $index_before, 1);
		}
		if(!empty($this->compress_options['username']) && !empty($this->compress_options['password'])) {
/* check for Web Optimizer existence on the website */
			$this->download('http' . (empty($_SERVER['HTTPS']) ? '' : 's') . '://' . $_SERVER['HTTP_HOST'], $index_check);
			if (is_file($index_check)) {
				$installed = strpos(@file_get_contents($index_check), 'lang="wo"');
				@unlink($index_check);
			} else {
/* curl doesn't work -- can't check existence */
				$installed = 1;
			}
			if ($installed && is_file($index_before) && @filesize($index_before) && (!is_file($index_after) || !@filesize($index_after))) {
/* if we have just downloaded initial grade - try to renew it */
				if ($no_initial_grade) {
					$this->download($this->webo_grade. '&refresh=on', 'index.after', 1);
/* try to get final optimization grade for the website */
				} else {
					$this->download($this->webo_grade, $index_after, 1);
				}
			}
			$page_variables = array(
				"title" => _WEBO_LOGIN_TITLE,
				"page" => 'install_enter_password',
				"version" => $this->version,
				"version_new" => $this->version_new,
				"version_new_exists" => $this->version_new_exists,
				"protected" => $this->protected,
				"installed" => $installed,
				"username" => $this->compress_options['username'],
				"password" => $this->compress_options['password'],
				"message" => empty($this->input['upgraded']) ? (empty($this->input['cleared']) ? '' : _WEBO_CLEAR_SUCCESSFULL) : _WEBO_UPGRADE_SUCCESSFULL . $this->version
			);
		} else {
/* check if we can display progress bar */
			$this->display_progress = $this->write_progress($this->web_optimizer_stage = 0, true);
			$page_variables = array(
				"title" => _WEBO_NEW_ENTER,
				"page" => 'install_set_password',
				"display_progress" => $this->display_progress,
				"version" => $this->version,
				"version_new" => $this->version_new,
			); 
		}
/* Show the install page */
		$this->view->render("admin_container", $page_variables);
	}

	/**
	* Clear cache
	* 
	**/	
	function install_clean_cache($redirect = true) {
/* if all directories haven't been set yet -- just success */
		$success = false || (empty($this->compress_options['css_cachedir']) && empty($this->compress_options['javascript_cachedir']) && empty($this->compress_options['html_cachedir']));
		$deleted_css = true;
		$deleted_js = true;
		$deleted_html = true;
		$restricted = array('.', '..', 'yass.loader.js', 'progress.js');
/* css cache */
		if ($dir = @opendir($this->compress_options['css_cachedir'])) {
			while ($file = @readdir($dir)) {
				if (!in_array($file, $restricted)) {
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
				if (!in_array($file, $restricted)) {
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
				if (!in_array($file, $restricted)) {
					if (!@unlink($this->compress_options['html_cachedir'] . $file)) {
						$deleted_html = false;
					}
				}
			}
			$success = true;
		}
		if ($success && $deleted_css && $deleted_js && $deleted_html) {
			if ($redirect) {
/* redirect to the main page */
				header("Location: index.php?cleared=1");
				die();
			}
		} else {
			$this->error("<p>". _WEBO_CLEAR_UNABLE ."</p>");
		}
	}

	/**
	* Upgrade page
	*
	**/     
	function install_upgrade() {
		$file = 'files';
		$this->download($this->svn . $file, $file);
		if (is_file($file)) {
			$files = split("\r?\n", @file_get_contents($file));
			foreach ($files as $file) {
				$this->download($this->svn . $file, $file);
				if ($file == 'config.webo.php') {
/* save all options to the new file -- rewrite default ones  */
					foreach($this->compress_options AS $key => $option) {
						if(is_array($option)) {
							foreach($option AS $option_name => $option_value) {
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
	function install_uninstall($return = true) {
/* delete last optimization grade */
		@unlink('index.after');
		if (empty($this->cms_version)) {
			$this->cms_version = $this->system_info($this->view->paths['absolute']['document_root']);
		}
/* PHP-Nuke, Bitrix deletion */
		if ($this->cms_version == 'PHP-Nuke' || $this->cms_version == 'Bitrix') {
			if ($this->cms_version == 'Bitrix') {
				$mainfile = $this->view->paths['absolute']['document_root'] . 'bitrix/header.php';
				$footer = $this->view->paths['absolute']['document_root'] . 'bitrix/modules/main/include/epilog_after.php';
			} else {
				$mainfile = $this->view->paths['absolute']['document_root'] . 'mainfile.php';
				$footer = $this->view->paths['absolute']['document_root'] . 'footer.php';
			}
			$mainfile_content = @file_get_contents($mainfile);
			$footer_content = @file_get_contents($footer);
			if (!empty($mainfile_content) && !empty($footer_content)) {
				$fp = @fopen($mainfile, "w");
				if ($fp) {
/* update header */
					@fwrite($fp, preg_replace("/require\('[^\']+\/web.optimizer.php'\);\r?\n?/", "", $mainfile_content));
					@fclose($fp);
					$fp = @fopen($footer, "w");
					if ($fp) {
/* update footer */
						@fwrite($fp, preg_replace("/(\\\$web_optimizer,|\\\$web_optimizer->finish\(\);\r?\n?)/", "", $footer_content));
						@fclose($fp);
					} elseif ($return) {
						$this->error("<p>". _WEBO_SPLASH3_CANTWRITE ."<code>" . $footer . "</code></p>");
					}
				} elseif ($return) {
					$this->error("<p>". _WEBO_SPLASH3_CANTWRITE ."<code>" . $mainfile . "</code></p>");
				}
			}
		} else {
/* remove instances of Web Optimizer from index.php */
			$index = $this->view->paths['full']['document_root'] . 'index.php';
/* fix for phpBB */
			if ($this->cms_version == 'phpBB') {
				$index = $this->view->paths['full']['document_root'] . 'includes/functions.php';
			}
/* fix for IPB */
			if ($this->cms_version == 'Invision Power Board') {
				$index = $this->view->paths['full']['document_root'] . 'sources/classes/class_display.php';
			}
			$fp = @fopen($index, "r");
			if ($fp) {
				$content_saved = '';
				while ($index_string = fgets($fp)) {
					$content_saved .= preg_replace("/(require\('[^\']+\/web.optimizer.php'\)|\\\$web_optimizer->finish\(\));\r?\n?/", "", $index_string);
				}
				fclose($fp);
				$fp = @fopen($index, "w");
				if ($fp) {
					fwrite($fp, $content_saved);
					fclose($fp);
				} elseif ($return) {
					$this->error("<p>". _WEBO_SPLASH2_UNABLE ." ". $this->input['user']['document_root'] ." ". _WEBO_SPLASH2_MAKESURE ."</p>");
				}
/* remove rules from .htaccess */
				if (empty($this->options['htaccess']['local'])) {
					$htaccess = $this->view->paths['full']['document_root'] . '.htaccess';
				} else {
					$htaccess = $this->view->paths['absolute']['document_root'] . '.htaccess';
				}
				if (is_file($htaccess)) {
					$fp = @fopen($htaccess, 'r');
					if ($fp) {
						$stop_saving = 0;
						$content_saved = '';
						while ($htaccess_string = fgets($fp)) {
							if (preg_match("/# Web Optimizer options/", $htaccess_string)) {
								$stop_saving = 1;
							}
							if (!$stop_saving && $htaccess_string != "\n") {
								$content_saved .= $htaccess_string;
							}
							if (preg_match("/# Web Optimizer end/", $htaccess_string)) {
								$stop_saving = 0;
							}
						}
						fclose($fp);
						$fp = @fopen($htaccess, "w");
						if ($fp) {
							fwrite($fp, $content_saved);
							fclose($fp);
						}
					} elseif ($return) {
						$this->error("<p>". _WEBO_SPLASH3_CANTWRITE ."<code>/index.php</code></p>");
					}
				}
			}
/* additional change of cache plugin */
			if (preg_match("/Joomla! 1\.[56789]/", $this->cms_version)) {
				$cache_file = $this->view->paths['absolute']['document_root'] . 'plugins/system/cache.php';
				@file_put_contents($cache_file, preg_replace("/global \\\$web_optimizer;\\\$web_optimizer->finish\(\);/", "", @file_get_contents($cache_file)));
			}
		}
		if ($return) {
			$this->page_variables = array(
				"title" => _WEBO_SPLASH1_UNINSTALL,
				"paths" => $this->view->paths,
				"page" => 'install_uninstall',
				"document_root" => empty($this->compress_options['document_root']) ? null : $this->compress_options['document_root'],
				"compress_options" => $this->compress_options,
				"version" => $this->version,
				"version_new" => $this->version_new
			);
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
			foreach ($hosts as $host) {
				$webo_image = "http://" . $host . "." . $main_host . preg_replace("/[^\/]+$/", "", $_SERVER['SCRIPT_NAME']) . "libs/css/a.png";
				$tmp_image = "image.tmp.png";
/* try to get webo image from this host */
				$this->download($webo_image, $tmp_image);
				if (@filesize($tmp_image) == $etalon) {
/* prevent 404 page with the same size */
					$webo_image2 = "http://" . $host . "." . $main_host . preg_replace("/[^\/]+$/", "", $_SERVER['SCRIPT_NAME']) . "libs/css/c.png";
					$tmp_image2 = "image.tmp2.png";
					$this->download($webo_image2, $tmp_image2);
					if (@filesize($tmp_image2) == $etalon2) {
						$allowed_hosts .= $host . " ";
					}
					@unlink($tmp_image2);
				}
				@unlink($tmp_image);
			}
		}
		return trim($allowed_hosts);
	}
	
	/**
	* 
	* 
	**/	
	function install_stage_2() {
/* express install */
		if (!empty($this->input['express'])) {
			$this->view->set_paths();
/* remember username and password */
			$username = $this->input['user']['username'];
			$password = $this->input['user']['password'];
/* load default options */
			$this->input['user'] = $this->compress_options;
/* calculate directories */
			$this->input['user']['javascript_cachedir'] = $this->view->paths['full']['current_directory'] . 'cache/';
			$this->input['user']['css_cachedir'] = $this->view->paths['full']['current_directory'] . 'cache/';
			$this->input['user']['html_cachedir'] = $this->view->paths['full']['current_directory'] . 'cache/';
			$this->input['user']['webo_cachedir'] = $this->view->paths['full']['current_directory'];
			$this->input['user']['document_root'] = $this->view->paths['full']['document_root'];
/* restore username and password */
			$this->input['user']['password'] = $password;
			$this->input['user']['username'] = $username;
/* enable auto-rewrite */
			$this->input['user']['auto_rewrite']['enabled'] = 1;
			$this->input['Submit'] = 1;
/* switch View page */
			$this->input['page'] = 'install_stage_3';
			$this->display_progress = $this->write_progress($this->web_optimizer_stage = 2, true);
/* check for multiple hosts possibility */
			$hosts = array('img', 'img1', 'img2', 'img3', 'img4', 'i', 'i1', 'i2', 'i3', 'i4', 'image', 'images', 'assets', 'static', 'css', 'js');
			$this->input['user']['parallel']['allowed_list'] = $this->check_hosts($hosts);
/* render final page */
			$this->install_stage_3();
		} else {
			if (!empty($this->input['uninstall'])) {
				$this->install_uninstall();
			} elseif (!empty($this->input['upgrade'])) {
				$this->install_upgrade();
			} elseif (!empty($this->input['clear'])) {
				$this->install_clean_cache();
			} else{
/* Set paths with the new document root */
				if(!empty($this->input['user']['document_root'])) {
					$this->view->set_paths($this->input['user']['document_root']);
				} else {
					$this->view->set_paths();
					$this->input['user']['document_root'] = $this->view->paths['full']['document_root'];
				}
/* check if we are using correct root directory */
				if (!is_dir($this->input['user']['document_root'])) {
					$this->error("<p>". _WEBO_SPLASH2_UNABLE ." ". $this->input['user']['document_root'] ." ". _WEBO_SPLASH2_MAKESURE ."</p>");
				}
/* Save the options file */
				if(!empty($this->input['Submit'])) {
					$save = $this->save_option('[\'document_root\']', $this->input['user']['document_root']);
				}
				$this->get_modules();
/* check for multiple hosts possibility */
				$hosts = split(" ", $this->compress_options['parallel']['allowed_list']);
				if (empty($hosts) || empty($hosts[0])) {
/* load default list */
					$hosts = array('img', 'img1', 'img2', 'img3', 'img4', 'i', 'i1', 'i2', 'i3', 'i4', 'image', 'images', 'assets', 'static', 'css', 'js');
				}
				$this->compress_options['parallel']['allowed_list'] = $this->check_hosts($hosts);

				$options = array(
					'Minify' => $this->compress_options['minify'],
					'GZIP' => $this->compress_options['gzip'],
					'htaccess' => $this->compress_options['htaccess'],
					'css_sprites' => $this->compress_options['css_sprites'],
					'Far_future_expires' => $this->compress_options['far_future_expires'],
					'html_cache' => $this->compress_options['html_cache'],
					'external_scripts' => $this->compress_options['external_scripts'],
					'parallel' => $this->compress_options['parallel']
				);
				
				$options = array('minify'=>array(
							'title' => _WEBO_SPLASH2_MINIFY,
							'intro' => _WEBO_SPLASH2_MINIFY_INFO,
							'value' => $this->compress_options['minify']
						),
						'external_scripts' => array(
							'title' => _WEBO_SPLASH2_EXTERNAL,
							'intro' => _WEBO_SPLASH2_EXTERNAL_INFO,
							'value' => $this->compress_options['external_scripts']
						),
						'unobtrusive' => array(
							'title' => _WEBO_SPLASH2_UNOBTRUSIVE,
							'intro' => _WEBO_SPLASH2_UNOBTRUSIVE_INFO,
							'value' => $this->compress_options['unobtrusive']
						),
						'dont_check_file_mtime' => array(
							'title' => _WEBO_SPLASH2_MTIME,
							'intro' => _WEBO_SPLASH2_MTIME_INFO,
							'value' => $this->compress_options['dont_check_file_mtime']						
						),
						'gzip'=>array(
							'title' => _WEBO_SPLASH2_GZIP,
							'intro' => _WEBO_SPLASH2_GZIP_INFO,
							'value' => $this->compress_options['gzip']
						),
						'far_future_expires'=>array(
							'title' => _WEBO_SPLASH2_EXPIRES,
							'intro' => _WEBO_SPLASH2_EXPIRES_INFO,
							'value' => $this->compress_options['far_future_expires']
						),
						'html_cache' => array(
							'title' => _WEBO_SPLASH2_HTMLCACHE,
							'intro' => _WEBO_SPLASH2_HTMLCACHE_INFO,
							'value' => $this->compress_options['html_cache']
						),
						'css_sprites'=>array(
							'title' => _WEBO_SPLASH2_SPRITES,
							'intro' => _WEBO_SPLASH2_SPRITES_INFO,
							'value' => $this->compress_options['css_sprites']
						),
						'data_uris' => array(
							'title' => _WEBO_SPLASH2_DATAURI,
							'intro' => _WEBO_SPLASH2_DATAURI_INFO,
							'value' => $this->compress_options['data_uris']
						),
						'parallel' => array(
							'title' => _WEBO_SPLASH2_PARALLEL,
							'intro' => _WEBO_SPLASH2_PARALLEL_INFO,
							'value' => $this->compress_options['parallel']
						),
						'htaccess' => array(
							'title' => _WEBO_SPLASH2_HTACCESS,
							'intro' => _WEBO_SPLASH2_HTACCESS_INFO . implode(", ", $this->apache_modules) . '</p>',
							'value' => $this->compress_options['htaccess']
						),
						'footer' => array(
							'title' => _WEBO_SPLASH2_FOOTER,
							'intro' => _WEBO_SPLASH2_FOOTER_INFO,
							'value' => $this->compress_options['footer']
						)
				);
/* make fake option for JavaScript minimization */
				if (is_array($options['minify']['value'])) {
					$javascript = array_shift($options['minify']['value']);
					$with = $this->compress_options['minify']['with_jsmin'] ? 'with_jsmin' : ($this->compress_options['minify']['with_yui'] ? 'with_yui' : ($this->compress_options['minify']['with_packer'] ? 'with_packer' : 0));
					$options['minify']['value'] = array('javascript' => $javascript, 'with' => $with) + $options['minify']['value'];
				}
				$options['auto_rewrite'] = null;
/* check /index.php to possiblity to rewrite it */
				$index = $this->input['user']['document_root'] . "index.php";
				if (is_readable($index) && is_writable($index)) {
/* if we can rewrite the file -- add auto-patch option */
					$options['auto_rewrite'] = array(
						'title' => _WEBO_SPLASH2_AUTOCHANGE,
						'intro' => _WEBO_SPLASH2_AUTOCHANGE_INFO . $this->system_info($this->view->paths['absolute']['document_root']) . _WEBO_SPLASH2_AUTOCHANGE_INFO2,
						'value' => empty($this->compress_options['auto_rewrite']) ? array('enabled' => null) : $this->compress_options['auto_rewrite']
					);
				}

				$this->page_variables = array(
					"title" => _WEBO_SPLASH2_TITLE,
					"paths" => $this->view->paths,
					"page" => $this->input['page'],
					"javascript_cachedir" => empty($this->compress_options['javascript_cachedir']) ? ($this->view->paths['full']['current_directory'] . 'cache/') : $this->compress_options['javascript_cachedir'],
					"css_cachedir" => empty($this->compress_options['css_cachedir']) ? ($this->view->paths['full']['current_directory'] . 'cache/') : $this->compress_options['css_cachedir'],
					"html_cachedir" => empty($this->compress_options['html_cachedir']) ? ($this->view->paths['full']['current_directory'] . 'cache/') : $this->compress_options['html_cachedir'],
					"webo_cachedir" => empty($this->compress_options['webo_cachedir']) ? $this->view->paths['full']['current_directory'] : $this->compress_options['webo_cachedir'],
					"document_root" => empty($this->compress_options['document_root']) ? $this->view->paths['full']['document_root'] : $this->compress_options['document_root'],
					"options" => $options,
					"version" => $this->version,
					"version_new" => $this->version_new,
					"compress_options" => $this->compress_options
				);
			}
/* Show the install page */
			$this->view->render("admin_container", $this->page_variables);
		}
	}

	/**
	* 
	* 
	**/	
	function install_stage_3() {
/* if haven't completed chained optimization */
		if ($this->web_optimizer_stage < 95) {
/* Check we can write to the specified directory */
			$content = "Test";
			$test_dirs = array(
				'javascript' => $this->view->ensure_trailing_slash($this->input['user']['javascript_cachedir']),
				'css' => $this->view->ensure_trailing_slash($this->input['user']['css_cachedir']),
				'html' => $this->view->ensure_trailing_slash($this->input['user']['html_cachedir'])
			);
			$this->write_progress($this->web_optimizer_stage = 3);
			foreach($test_dirs AS $name => $dir) {
				if (!is_dir($dir)) {
					@mkdir($dir, 0755);
				}
				$fp = @fopen($dir . "test", 'w');
				if(!$fp) {
/* unable to open file for writing */
					$this->error("<p>" . _WEBO_SPLASH3_CANTWRITE . $name . _WEBO_SPLASH3_CANTWRITE2 . "<p>
								<p>". _WEBO_SPLASH3_CANTWRITE3 ."</p>
								<p>". _WEBO_SPLASH3_CANTWRITE4 ."</p>");
				} else {
/* write the file */
					fwrite($fp, $content);
					fclose($fp);
					unlink($dir . "test");
				}
			}
/* copy unobtrusive loader library to cache directory */
			@copy($this->input['user']['webo_cachedir'] . 'libs/js/yass.loader.js', $this->input['user']['javascript_cachedir'] . 'yass.loader.js');
			$this->write_progress($this->web_optimizer_stage = 4);
			$this->get_modules();
			$loaded_modules = @get_loaded_extensions();
/* Create the options file */
			$this->options_file = "config.webo.php";
/* convert fake JavaScript minify option */
			if (!empty($this->input['user']['minify']['with'])) {
				$this->input['user']['minify']['with_jsmin'] = ($this->input['user']['minify']['with'] == 'with_jsmin' ? 1 : 0);
				$this->input['user']['minify']['with_yui'] = ($this->input['user']['minify']['with'] == 'with_yui' ? 1 : 0);
				$this->input['user']['minify']['with_packer'] = ($this->input['user']['minify']['with'] == 'with_packer' ? 1 : 0);
				$this->input['user']['minify']['with'] = null;
			}
			if(!empty($this->input['Submit'])) {
/* try to set some libs executable */
				@chmod($this->input['user']['webo_cachedir'] . 'libs/yuicompressor/yuicompressor.jar', 0755);
				if (!empty($this->input['user']['minify']['with_yui'])) {
/* check for YUI availability */
					$YUI_checked = 0;
					if (is_file($this->input['user']['webo_cachedir'] . 'libs/php/class.yuicompressor4.php') || is_file($this->input['user']['webo_cachedir'] . 'libs/php/class.yuicompressor.php')) {
						if (substr(phpversion(), 0, 1) == 4) {
							require_once($this->input['user']['webo_cachedir'] . 'libs/php/class.yuicompressor4.php');
						} else {
							require_once($this->input['user']['webo_cachedir'] . 'libs/php/class.yuicompressor.php');
						}
						$YUI = new YuiCompressor($this->input['user']['javascript_cachedir'], $this->input['user']['webo_cachedir']);
						$YUI_checked = $YUI->check();
					}
					if (!$YUI_checked) {
						$this->input['user']['minify']['with_yui'] = 0;
						$this->input['user']['minify']['with_jsmin'] = 1;
					}
				}
/* Save the options	*/
				foreach($this->input['user'] as $key => $option) {
					if(is_array($option)) {
						foreach($option as $option_name => $option_value) {
							if (!empty($this->apache_modules)) {
								if (in_array($option_name, array('mod_expires', 'mod_deflate', 'mod_headers', 'mod_gzip', 'mod_setenvif', 'mod_mime', 'mod_rewrite'))) {
									$option_value = $option_value && in_array($option_name, $this->apache_modules);
									$this->input['user'][$key][$option_name] = $option_value;
								}
							}
/* check for curl existence */
							if ($key == 'external_scripts' && $option_name == 'on') {
								if (!empty($loaded_modules)) {
									if (!in_array('curl', $loaded_modules) || !function_exists('curl_init')) {
										$this->input['user'][$key][$option_name] = 0;
									}
								}
							}
/* check for gzencode existence */
							if ($key == 'gzip') {
								if (!function_exists('gzencode') && !$this->input['user']['htaccess']['enabled']) {
									$this->input['user'][$key][$option_name] = 0;
								}
							}
/* correct multiple hosts list */
							if ($key == 'parallel' && $option_name == 'allowed_list') {
								$hosts = split(" ", $option_value);
								if (is_array($hosts)) {
									$option_value = $this->check_hosts($hosts);
								}
							}
							$this->save_option("['" . strtolower($key) . "']['" . strtolower($option_name) . "']", $option_value);
						}
					} else {
						$this->save_option("['" . strtolower($key) . "']", $option);			
					}
				}
				$this->write_progress($this->web_optimizer_stage = 5);
/* delete temporary files before chained installation */
				$this->install_clean_cache(false);
				$this->install_uninstall(false);
/* additional check for .htaccess -- need to open exact file */
				if (!empty($this->input['user']['htaccess']['enabled']) && !empty($this->apache_modules)) {
					$this->view->set_paths($this->input['user']['document_root']);
/* write to the current dir or to document root */
					if (empty($this->input['user']['htaccess']['local'])) {
/* first of all just cut current Web Optimizer options from .htaccess */
						$htaccess = $this->view->paths['full']['document_root'] . '.htaccess';
					} else {
						$htaccess = $this->view->paths['absolute']['document_root'] . '.htaccess';
					}
					if (is_file($htaccess)) {
						$fp = @fopen($htaccess, 'r');
						if (!$fp) {
							$this->error("<p>". _WEBO_SPLASH3_HTACCESS_CHMOD ."</p>
											<p>". _WEBO_SPLASH3_HTACCESS_CHMOD2 ."</p>");
						} else {
							$stop_saving = 0;
							$content_saved = '';
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
/* create backup */
					@copy($htaccess, $htaccess . '.backup');
					$fp = @fopen($htaccess, 'w');
					if (!$fp) {
						$this->error("<p>". _WEBO_SPLASH3_HTACCESS_CHMOD3 ."</p>
										<p>". _WEBO_SPLASH3_HTACCESS_CHMOD4 ."</p>");
					} else {
						$htaccess_options = $this->input['user']['htaccess'];
						$content = '# Web Optimizer options';
						if (!empty($htaccess_options['mod_gzip'])) {
							$content .= "
mod_gzip_on Yes
mod_gzip_can_negotiate Yes
mod_gzip_static_suffix .gz
AddEncoding gzip .gz
mod_gzip_update_static No
mod_gzip_keep_workfiles No
mod_gzip_minimum_file_size 500
mod_gzip_maximum_file_size 5000000
mod_gzip_maximum_inmem_size 60000
mod_gzip_min_http 1000
mod_gzip_handle_methods GET POST
mod_gzip_item_exclude reqheader \"User-agent: Mozilla/4.0[678]\"
mod_gzip_dechunk No";
							if (!empty($this->input['user']['gzip']['page'])) {
								$content .= "
mod_gzip_item_include mime ^text/html$
mod_gzip_item_include mime ^text/plain$
mod_gzip_item_include mime ^image/x-icon$
mod_gzip_item_include mime ^httpd/unix-directory$";
							}
							if (!empty($this->input['user']['gzip']['css'])) {
								$content .= "
mod_gzip_item_include mime ^text/css$";
							}
							if (!empty($this->input['user']['gzip']['javascript'])) {
								$content .= "
mod_gzip_item_include mime ^text/javascript$
mod_gzip_item_include mime ^application/javascript$
mod_gzip_item_include mime ^application/x-javascript$";
							}
						}
						if (!empty($htaccess_options['mod_setenvif'])) {
							$content .= "
BrowserMatch ^Mozilla/4 gzip-only-text/html
BrowserMatch ^Mozilla/4\.0[678] no-gzip
BrowserMatch \bMSIE !no-gzip !gzip-only-text/html";
						}
						if (!empty($htaccess_options['mod_deflate'])) {
							if (!empty($this->input['user']['gzip']['page'])) {
								$content .= "
AddOutputFilterByType DEFLATE text/html
AddOutputFilterByType DEFLATE text/xml
AddOutputFilterByType DEFLATE image/x-icon";
							}
							if (!empty($this->input['user']['gzip']['css'])) {
								$content .= "
AddOutputFilterByType DEFLATE text/css";
							}
							if (!empty($this->input['user']['gzip']['javascript'])) {
								$content .= "
AddOutputFilterByType DEFLATE text/javascript
AddOutputFilterByType DEFLATE application/javascript
AddOutputFilterByType DEFLATE application/x-javascript";
							}
						}
/* try to add static gzip */
						if (!empty($htaccess_options['mod_mime'])) {
							$content .= "
AddEncoding gzip .gz";
						}
						if (!empty($htaccess_options['mod_rewrite'])) {
							$content .= "
RewriteEngine On
RewriteBase /
";
							if (!empty($this->input['user']['gzip']['css'])) {
								$content .= "
RewriteCond %{HTTP:Accept-encoding} gzip
RewriteCond %{HTTP_USER_AGENT} !Konqueror
RewriteCond %{REQUEST_FILENAME}.gz -f
RewriteRule ^(.*)\.css$ $1.css.gz [QSA,L]
<FilesMatch \.(css\.gz)$>
	ForceType text/css
</FilesMatch>";
							}
							if (!empty($this->input['user']['gzip']['javascript'])) {
								$content .= "
RewriteCond %{HTTP:Accept-encoding} gzip
RewriteCond %{HTTP_USER_AGENT} !Konqueror
RewriteCond %{REQUEST_FILENAME}.gz -f
RewriteRule ^(.*)\.js$ $1.js.gz [QSA,L]
<FilesMatch \.(js\.gz)$>
	ForceType application/x-javascript
</FilesMatch>";
							}
						}
						if (!empty($htaccess_options['mod_expires'])) {
							$content .= "
ExpiresActive On
ExpiresDefault \"access plus 10 years\"
<FilesMatch \.(php|phtml|shtml|html|xml)$>
	ExpiresActive Off
</FilesMatch>";
							if (empty($this->input['user']['far_future_expires']['css'])) {
								$content .= "
<FilesMatch \.css$>
	ExpiresActive Off
</FilesMatch>";
							}
							if (empty($this->input['user']['far_future_expires']['javascript'])) {
								$content .= "
<FilesMatch \.js$>
	ExpiresActive Off
</FilesMatch>";
							}
							if (empty($this->input['user']['far_future_expires']['static'])) {
								$content .= "
<FilesMatch \.(bmp|png|gif|jpe?g|ico|swf|flv|pdf)$>
	ExpiresActive Off
</FilesMatch>";
							}
						}
						if (!empty($htaccess_options['mod_headers'])) {
							if (!empty($htaccess_options['mod_deflate']) || !empty($htaccess_options['mod_gzip'])) {
								$content .= "
<FilesMatch \.(css|js|php|phtml|shtml|html|xml)$>
	Header append Vary User-Agent
	Header append Cache-Control private
</FilesMatch>";
							}
							if (!empty($htaccess_options['mod_expires'])) {
								$content .= "
<FilesMatch \.(pdf|flv|swf|jpe?g|png|gif|bmp)$>
	Header append Cache-Control public
</FilesMatch>
<FilesMatch \.(ico|pdf|flv|swf|jpe?g|png|gif|bmp|js|css)$>
	Header unset Last-Modified
	FileETag MTime
</FilesMatch>";
							}
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
						fwrite($fp, $content_saved . "\n" . $content);
						fclose($fp);
					}
				}
			}
			$this->write_progress($this->web_optimizer_stage = 6);
			$this->chained_load();
		}
		$this->display_progress = !empty($this->web_optimizer_stage);
		if(!empty($this->input['Submit'])) {
			$this->input['user']['webo_cachedir'] = empty($this->compress_options['webo_cachedir']) ? $this->input['user']['webo_cachedir'] : $this->compress_options['webo_cachedir'];
/* delete test file from chained optimization */
			@unlink($this->input['user']['webo_cachedir'] . 'cache/optimizing.php');
/* define CMS */
			if (empty($this->cms_version)) {
				$this->cms_version = $this->system_info($this->view->paths['absolute']['document_root']);
			}
/* try to auto-patch root /index.php */
			$auto_rewrite = 0;
			if (!empty($this->input['user']['auto_rewrite']) && !empty($this->input['user']['auto_rewrite']['enabled'])) {
/* check for web.optimizer.php existence */
				$fp = fopen($this->input['user']['webo_cachedir'] . 'web.optimizer.php', 'r');
				if (!$fp) {
					$this->error("<p>". _WEBO_SPLASH3_HTACCESS_CHMOD5 ." " . $this->input['user']['webo_cachedir'] . ".</p>");
				} else {
/* dirty hack for PHP-Nuke */
					if ($this->cms_version == 'PHP-Nuke') {
						$mainfile = $this->view->paths['absolute']['document_root'] . 'mainfile.php';
						$footer = $this->view->paths['absolute']['document_root'] . 'footer.php';
						$mainfile_content = @file_get_contents($mainfile);
						$footer_content = @file_get_contents($footer);
						if (!empty($mainfile_content) && !empty($footer_content)) {
/* create backup */
							@copy($mainfile, $mainfile . '.backup');
							$fp = @fopen($mainfile, "w");
							if ($fp) {
/* update main PHP-Nuke file */
								@fwrite($fp, preg_replace("/(if\s+\(!ini_get\('register_globals)/", 'require(\'' . $this->input['user']['webo_cachedir'] . 'web.optimizer.php\');' . "\n$1", preg_replace("/require\('[^\']+\/web.optimizer.php'\);\r?\n?/", "", $mainfile_content)));
								@fclose($fp);
/* create backup */
								@copy($footer, $footer . '.backup');
								$fp = @fopen($footer, "w");
								if ($fp) {
/* update footer */
									@fwrite($fp, preg_replace("/global /", 'global \$web_optimizer,', preg_replace("/(\s*ob_end_flush\(\);)/", '\$web_optimizer->finish();' . "\n$1", preg_replace("/(\\\$web_optimizer,|\\\$web_optimizer->finish\(\);\r?\n?)/", "", $footer_content))));
									@fclose($fp);
									$auto_rewrite = 1;
								}
							}
						}
/* another dirty hack for phpBB */
					} elseif ($this->cms_version == 'phpBB') {
						$mainfile = $this->view->paths['absolute']['document_root'] . 'includes/functions.php';
						$mainfile_content = @file_get_contents($mainfile);
						if (!empty($mainfile_content)) {
/* create backup */
							@copy($mainfile, $mainfile . '.backup');
							$fp = @fopen($mainfile, "w");
							if ($fp) {
/* remove any old strings regarding Web Optimizer */
								$mainfile_content = preg_replace("/\\\$web_optimizer->finish\(\);\r?\n?/", "", preg_replace("/require\('[^\']+\/web.optimizer.php'\);\r?\n?/", "", $mainfile_content));
/* add class declaration */
								$mainfile_content = preg_replace("/(function\s*page_footer\s*\([^\)]+\)[\r\n\s]*\{)/", "$1\n" . 'require(\'' . $this->input['user']['webo_cachedir'] . 'web.optimizer.php\');', $mainfile_content);
/* add finish */
								$mainfile_content = preg_replace("/(\\\$template->display\(['\"]body['\"]\);\r?\n?)/", "$1" . '\$web_optimizer->finish();' . "\n", $mainfile_content);
								@fwrite($fp, $mainfile_content);
								@fclose($fp);
								$auto_rewrite = 1;
							}
						}
/* one more dirty hack for ipb */
					} elseif ($this->cms_version == 'Invision Power Board') {
						$mainfile = $this->view->paths['absolute']['document_root'] . 'sources/classes/class_display.php';
						$mainfile_content = @file_get_contents($mainfile);
						if (!empty($mainfile_content)) {
/* create backup */
							@copy($mainfile, $mainfile . '.backup');
							$fp = @fopen($mainfile, "w");
							if ($fp) {
/* remove any old strings regarding Web Optimizer */
								$mainfile_content = preg_replace("/(\\\$web_optimizer,|\\\$web_optimizer->finish\(\);\r?\n?)/", "", preg_replace("/require\('[^\']+\/web.optimizer.php'\);\r?\n?/", "", $mainfile_content));
/* add class declaration */
								$mainfile_content = preg_replace("/(print \\\$this->ipsclass->skin\['_wrapper'\];\r?\n?)/", 'require(\'' . $this->input['user']['webo_cachedir'] . 'web.optimizer.php\');' . "\n$1", $mainfile_content);
/* add finish */
								$mainfile_content = preg_replace("/(print \\\$this->ipsclass->skin\['_wrapper'\];\r?\n?)/", "$1" . '\$web_optimizer->finish();' . "\n", $mainfile_content);
								@fwrite($fp, $mainfile_content);
								@fclose($fp);
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
							$fp = @fopen($mainfile, "w");
							if ($fp) {
/* update header */
								@fwrite($fp, preg_replace("/<\?/", '<? require(\'' . $this->input['user']['webo_cachedir'] . 'web.optimizer.php\');' . "\n", preg_replace("/require\('[^\']+\/web.optimizer.php'\);\r?\n?/", "", $mainfile_content)));
								@fclose($fp);
/* create backup */
								@copy($footer, $footer . '.backup');
								$fp = @fopen($footer, "w");
								if ($fp) {
/* update footer */
									@fwrite($fp, preg_replace("/(echo\s*\\\$r;\r?\n?)/", "$1" . '\$web_optimizer->finish();' . "\n", preg_replace("/\\\$web_optimizer->finish\(\);\r?\n?/", "", $footer_content)));
									@fclose($fp);
									$auto_rewrite = 1;
								}
							}
						}
					} else {
						$index = $this->view->paths['absolute']['document_root'] . 'index.php';
						if (substr($this->cms_version, 0, 9) == 'vBulletin') {
							$index = $this->view->paths['absolute']['document_root'] . 'include/functions.php';
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
								$content_saved = preg_replace("/(initGzip\(\);\r?\n)/i", 'require(\'' . $this->input['user']['webo_cachedir'] . 'web.optimizer.php\');' . "\n$1", $content_saved);
/* fix for Joomla 1.5.0 */
							} elseif (preg_match("/Joomla! 1\.5\.0/", $this->cms_version)) {
								$content_saved = preg_replace("/(new\s+JVersion\(\);\r?\n)/i", '$1require(\'' . $this->input['user']['webo_cachedir'] . 'web.optimizer.php\');' . "\n", $content_saved);
/* fix for Joomla 1.5+ */
							} elseif (preg_match("/Joomla! 1\.[56789]/", $this->cms_version)) {
								$content_saved = preg_replace("/(\\\$mainframe\s*=&\s*JFactory::getApplication\(['\"]site['\"]\);\r?\n)/i",  "$1" . 'require(\'' . $this->input['user']['webo_cachedir'] . 'web.optimizer.php\');' . "\n", $content_saved);
/* fix for Joostina */
							} elseif (preg_match("/Joostina/", $this->cms_version)) {
								$content_saved = preg_replace("/(require_once\s*\([^\)]+frontend\.php)/i", 'require(\'' . $this->input['user']['webo_cachedir'] . 'web.optimizer.php\');' . "\n$1", $content_saved);
/* fix for vBulletin */
							} elseif (substr($this->cms_version, 0, 9) == 'vBulletin') {
								$content_saved = preg_replace("/\(\\\$hook\s*=\s*vBulletinHook::fetch_hook\('global_complete'\)\)/i", 'require(\'' . $this->input['user']['webo_cachedir'] . 'web.optimizer.php\');' . "\n$1", $content_saved);
/* fix for CMS Made Simple */							
							} elseif (substr($this->cms_version, 0, 15) == 'CMS Made Simple') {
								$content_saved = preg_replace("/(echo\s*\\\$html;)/", 'require(\'' . $this->input['user']['webo_cachedir'] . 'web.optimizer.php\');' . "\n$1", $content_saved);
							} elseif (substr($content_saved, 0, 2) == '<?') {
/* add require block */
								$content_saved = preg_replace("/^<\?(php)?( |\r?\n)/i", '<?$1$2require(\'' . $this->input['user']['webo_cachedir'] . 'web.optimizer.php\');' . "\n", $content_saved);
							} else {
								$content_saved = "<?php require('" . $this->input['user']['webo_cachedir'] . "web.optimizer.php'); ?>" . $content_saved;
							}
/* fix for DataLife Engine */
							if (substr($this->cms_version, 0, 15) == 'DataLife Engine') {
								$content_saved = preg_replace("/(GzipOut\s*\(\);)/", '$web_optimizer->finish();' . "\n$1", $content_saved);
/* fix for vBulletin */
							} elseif (substr($this->cms_version, 0, 9) == 'vBulletin') {
								$content_saved = preg_replace("/(flush\s*\(\);[\r\n\s\t]*\})/", "$1\n" . '$web_optimizer->finish();', $content_saved);
/* fix for CMS Made Simple */
							} elseif (substr($this->cms_version, 0, 15) == 'CMS Made Simple') {
								$content_saved = preg_replace("/(echo\s*\\\$html;)/", "$1\n" . '$web_optimizer->finish();', $content_saved);
/* fix for Joomla! 1.0 */
							} elseif (preg_match("/Joomla! 1\.0/", $this->cms_version)) {
								$content_saved = preg_replace("/(doGzip\(\);\r?\n)/i", '$web_optimizer->finish();' . "\n$1" , $content_saved);
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
							$fp = @fopen($index, "w");
							if ($fp) {
								@fwrite($fp, $content_saved);
								@fclose($fp);
								$auto_rewrite = 1;
							}
/* additional change of cache plugin */
							if (preg_match("/Joomla! 1\.[56789]/", $this->cms_version)) {
								$cache_file = $this->view->paths['absolute']['document_root'] . 'plugins/system/cache.php';
								@copy($cache_file, $cache_file . '.backup');
								@file_put_contents($cache_file, preg_replace("/(\\\$mainframe->close)/", 'global \$web_optimizer;\$web_optimizer->finish();' . "$1", preg_replace("/global \\\$web_optimizer;\\\$web_optimizer->finish\(\);/", "", @file_get_contents($cache_file))));
							}
						}
					}

				}

			}
			$this->write_progress($this->web_optimizer_stage = 98);
/* secure Web Optimizer folder with .htpasswd */
			$this->protect_installation();
			$index_before = 'index.before';
			$index_after = 'index.after';
/* try to get initial optimization grade for the website */
			if (!is_file($index_before) || !filesize($index_before)) {
				$this->download($this->webo_grade, $index_before, 1);
			}
			$this->write_progress($this->web_optimizer_stage = 99);
/* try to get final optimization grade for the website */
			if ($auto_rewrite && is_file($index_before) && @filesize($index_before) && (!is_file($index_after) || !@filesize($index_after))) {
				$this->download($this->webo_grade . '&refresh=on', $index_after, 1);
			}
		}

		$this->write_progress($this->web_optimizer_stage = 100);
		$page_variables = array("title" => _WEBO_SPLASH3_TITLE,
								"paths" => $this->view->paths,
								"page" => $this->input['page'],
								"message" => _WEBO_SPLASH3_CONFSAVED,
								"auto_rewrite" => empty($auto_rewrite) ? 0 : 1,
								"cms_version" => empty($this->cms_version) ? '' : $this->cms_version,
								"username" => $this->input['user']['_username'],
								"password" => $this->input['user']['_password'],
								"version" => $this->version,
								"version_new" => $this->version_new,
								"files_to_change" => $this->system_files($this->cms_version));
/* Show the install page */
		$this->view->render("admin_container", $page_variables);

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
	}

	/**
	* Generic download function to get external files
	*
	**/
	function download ($remote_file, $local_file, $timeout = 60) {
		$gzip = false;
		if (function_exists('curl_init')) {
			$local_dir = preg_replace("/\/[^\/]*$/", "/", $local_file);
/* try to create local directory*/
			if ($local_dir != $local_file && !is_dir($local_dir)) {
				@mkdir($local_dir, 0755);
			}
/* parse headers for content-encoding */
			$local_file_headers = $local_file . ".headers";
/* start curl */
			$ch = @curl_init($remote_file);
			$fp = @fopen($local_file, "w");
			if ($fp && $ch) {
				@curl_setopt($ch, CURLOPT_FILE, $fp);
				@curl_setopt($ch, CURLOPT_HEADER, 0);
				@curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Web Optimizer; Speed Up Your Website; http://web-optimizer.us/) Firefox 3.0.11");
				@curl_setopt($ch, CURLOPT_ENCODING, "");
				@curl_setopt($ch, CURLOPT_WRITEHEADER, $local_file_headers);
				@curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				@curl_exec($ch);
				@curl_close($ch);
				@fclose($fp);
			}
			if (is_file($local_file_headers)) {
				$gzip = stripos(@file_get_contents($local_file_headers), 'content-encoding');
				@unlink($local_file_headers);
			}
		}
		return $gzip;
	}

	/**
	* Consequenty emulate different stages of optimization process
	* To prevent initial delay for optimized website and PHP timeout
	*
	**/
	function chained_load () {
		$test_file = $this->input['user']['webo_cachedir'] . 'cache/optimizing.php';
		$this->write_progress(12);
/* try to download main file */
		$gzipped = $this->download('http://' . $_SERVER['HTTP_HOST'] . '/', $test_file);
/* disable gzip for HTML if already have it (in CMS or on the server) */
		if ($gzipped) {
			$this->save_option("['page']['gzip']", 0);
		}
		$this->write_progress(13);
		$contents = @file_get_contents($test_file);
		if (!empty($contents)) {
			$fp = @fopen($test_file, "w");
			if ($fp) {
				@fwrite($fp, "<?php require('" . $this->input['user']['webo_cachedir'] . "web.optimizer.php'); ?>" . preg_replace("/<\?xml[^>]+\?>/", "", $contents) . '<?php $web_optimizer->finish(); ?>');
				@fclose($fp);
				$this->write_progress(14);
				$this->input['user']['auto_rewrite'] = empty($this->input['user']['auto_rewrite']) ? array() : $this->input['user']['auto_rewrite'];
				$this->input['user']['auto_rewrite']['enabled'] = empty($this->input['user']['auto_rewrite']['enabled']) ? 0 : 1;
				header('Location: cache/optimizing.php?web_optimizer_stage=15&password=' . $this->input['user']['password'] . '&username=' . $this->input['user']['username'] . "&auto_rewrite=" . $this->input['user']['auto_rewrite']['enabled'] );
				exit();
			}
		}
	}

	/**
	* Saves an admin option
	* 
	**/
	function save_option ($option_name, $option_value) {
/* make paths uniform (Windows-Linux). Thx to dmiFedorenko */
		$option_value = preg_replace("/\/\//", "/", preg_replace("/\\\/", '/', $option_value));
/* See if file exists */
		$option_file = $this->view->paths['full']['current_directory'] . $this->options_file;
		if (file_exists($option_file)) {
			$content = @file_get_contents($option_file);
			$content = preg_replace("@(" . $this->regex_escape($option_name) . ")\s*=\s*\"(.*?)\"@is","$1 = \"" . $option_value . "\"", $content);
			$fp = @fopen($option_file, 'w');
			if(!$fp) {
/* unable to open file for writing */
				$this->error('<p>'. _WEBO_SPLASH3_CONFIGERROR .'</p>
								<p>' . _WEBO_SPLASH3_CONFIGERROR2 . $option_file . _WEBO_SPLASH3_CONFIGERROR3 .'.</p>
								<p>'. _WEBO_SPLASH3_CONFIGERROR4 .'</p>');
			} else {
/* write the file */
				@fwrite($fp, $content);
				@fclose($fp);
			}
		} else {
			$this->error(_WEBO_SPLASH3_CONFIGERROR5);
		}
	}
	
	/**
	* Some basic protection
	* 
	**/			
	function check_login() {
		if(($this->input['user']['username'] != $this->compress_options['username']) || 
			($this->input['user']['password'] != $this->compress_options['password'])) {
			if(!empty($this->input['user']['username'])) {
				$this->error(_WEBO_LOGIN_FAILED);
			} else {
				$this->error(_WEBO_LOGIN_ACCESS);
			}
		}
	}

	/**
	* Set the initial password
	* 
	**/		
	function manage_password() {
/* If posting a username and pass, md5 encode */
		if (!empty($this->input['user']['username'])) {
/* write protected password to .htpasswd if required */
			$fp = @fopen($this->basepath . '.htpasswd', "w");
			if ($fp) {
				@fwrite($fp, $this->input['user']['username'] . ":" . $this->encrypt_password($this->input['user']['password']));
				@fclose($fp);
			}
			$this->input['user']['username'] = md5($this->input['user']['username']);
			$this->input['user']['password'] = md5($this->input['user']['password']);
/* If the pass isn't there, write it */
			if(empty($this->compress_options['username']) && empty($this->compress_options['password'])) {
				$save = $this->save_option('[\'username\']',($this->input['user']['username']));
				$save .= "<br/>" . $this->save_option('[\'password\']',($this->input['user']['password']));	
				$save .= "<br />" . _WEBO_LOGIN_LOGGED;
				$this->save = $save;
/* Update */
				$this->compress_options['username'] = $this->input['user']['username'];
				$this->compress_options['password'] = $this->input['user']['password'];
			}
		}
/* If passing a username and pass, don't md5 encode */
		if (!empty($this->input['user']['_username'])) {
			$this->input['user']['username'] = ($this->input['user']['_username']);
			$this->input['user']['password'] = ($this->input['user']['_password']);	
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
			"page" => 'error'
		);
/* Show the install page */
		$this->view->render("admin_container",$page_variables);
		die();
	}

	/**
	* Make safe for regex
	* 
	**/
	function regex_escape($string) {
		return addcslashes($string,'\^$.[]|()?*+{}');
	}

	/**
	* Protects Web OPtimizer folder via htpasswd
	* 
	**/
	function protect_installation() {
		$htaccess = $this->input['user']['webo_cachedir'] . '.htaccess';
		$htaccess_content = @file_get_contents($htaccess);
/* create backup */
		@copy($htaccess, $htaccess . '.backup');
		$fp = @fopen($htaccess, "w");
		if ($fp) {
/* clean current content */
			$htaccess_content = preg_replace("/# Web Optimizer protection.*Web Optimizer protection end/", "", $htaccess_content);
			if (!empty($this->compress_options['htaccess']['access']) || !empty($this->input['user']['htaccess']['access'])) {
/* add secure protection via htpasswd */
				$htaccess_content .= '
# Web Optimizer protection
AuthType Basic
AuthName "Web Optimizer Installation"
AuthUserFile ' . $this->input['user']['webo_cachedir'] . '.htpasswd
require valid-user
<Files ' . $this->input['user']['webo_cachedir'] . '.htpasswd>
	Deny from all
</Files>
# Web Optimizer protection end';
			}
			@fwrite($fp, $htaccess_content);
			@fclose($fp);
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
		if (is_dir($root . 'wp-includes')) {
			$wp_version = '1.0.0';
			if (is_file($root . 'wp-includes/version.php')) {
				require($root . 'wp-includes/version.php');
			}
			return 'Wordpress ' . $wp_version;
		} elseif (is_dir($root . 'modules/system')) {
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
			return 'Drupal ' . $drupal_version;
/* Joomla 1.5 */
		} elseif (is_dir($root . 'libraries')) {
			$joomla_version = '1.5.0';
			if (is_file($root . 'libraries/joomla/version.php')) {
				if (substr(phpversion(), 0, 1) == 4) {
					if (!class_exists('JVersion')) {
						require($root . 'libraries/joomla/version.php');
					}
				} else {
					if (!class_exists('JVersion', false)) {
						require($root . 'libraries/joomla/version.php');
					}
				}
				$jv = new JVersion();
				if ($jv) {
					$joomla_version = $jv->RELEASE . '.' . $jv->DEV_LEVEL;
				} else {
					$joomla_version = JVERSION;
				}
			}
			return 'Joomla! ' . $joomla_version;
		} elseif (is_dir($root . 'includes')) {
/* for PHP-Nuke 8.0 */
			if (is_file($root . 'modules/Journal/copyright.php') && is_file($root . 'footer.php') && is_file($root . 'mainfile.php')) {
				return 'PHP-Nuke';
/* vBulletin */
			} elseif (is_file($root . 'includes/class_core.php')) {
				require($root . 'includes/class_core.php');
				$vbulletin_version = '';
				if (defined('FILE_VERSION')) {
					$vbulletin_version = ' ' . FILE_VERSION;
				}
				return 'vBulletin' . $vbulletin_version;
/* phpBB (3.0) */
			} elseif (is_file($root . 'includes/functions_privmsgs.php')) {
				return 'phpBB';
/* Joomla 1.0, Joostina */
			} else {
				define('_VALID_MOS', 1);
				$joomla_version = '1.0';
				$joomla_title = 'Joomla!';
				if (is_file($root . 'includes/version.php')) {
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
				}
				return $joomla_title . ' ' . $joomla_version;
			}
/* Typo 3 */
		} elseif (is_dir($root . 'typo3conf')) {
			$TYPO3_CONF_VARS = array('SYS' => array('compat_version' => '4.2'));
			if (is_file($root . 'typo3conf/localconf.php')) {
				require($root . 'typo3conf/localconf.php');
			}
			return 'Typo3 ' . $TYPO3_CONF_VARS['SYS']['compat_version'];
/* Simpla */
		} elseif (is_file($root . 'Storefront.class.php')) {
			return 'Simpla';
/* Etomate 1.0, MODx */
		} elseif (is_file($root . 'manager/includes/version.inc.php')) {
			require($root . 'manager/includes/version.inc.php');
			if (empty($full_appname)) {
				return 'Etomite ' . $release;
			} else {
/* MODx case */
				return $full_appname;
			}
/* LiveStreet */
		} elseif (is_file($root . 'classes/engine/Router.class.php')) {
			return 'LiveStreet';
/* Santafox */
		} elseif (is_file($root . 'ini.php')) {
			require($root . 'ini.php');
			if (defined('SANTAFOX_VERSION')) {
				return 'Satafox ' . SANTAFOX_VERSION;
			}
/* Zend Framework */
		} elseif (is_file($root . '../application/configs/config.ini')) {
			return 'Zend Framework';
/* DataLife Engine */
		} elseif (is_file($root . 'engine/data/config.php')) {
			$config = array(
				'version_id' => '8.0'
			);
			require($root . 'engine/data/config.php');
			return 'DataLife Engine ' . $config['version_id'];
/* CodeIgniter */
		} elseif (is_file($root . 'system/codeigniter/CodeIgniter.php')) {
			return 'CodeIgniter';
/* Symfony */
		} elseif (is_file($root . '../lib/symfony/config/config/settings.yml')) {
			return 'Symfony';
/* Textpattern */
		} elseif (is_file($root . 'textpattern/index.php')) {
			$version = preg_replace("/['\"].*/", "", preg_replace("/.*\\\$thisversion\s*=\s*['\"]/", "", preg_replace("/\r?\n/", "", @file_get_contents($root . 'textpattern/index.php'))));
			return 'Textpattern ' . $version;
/* Kohana */
		} elseif (is_file($root . 'system/core/Kohana.php')) {
			return 'Kohana';
/* Yii */
		} elseif (is_file($root . '../framework/YiiBase.php') || is_file($root . 'framework/YiiBase.php')) {
			return 'Yii';
/* Invision Power Board */
		} elseif (is_file($root . 'sources/classes/class_display.php')) {
			return 'Invision Power Board';
/* Simple Machines Forum */
		} elseif (is_file($root . 'Sources/LogInOut.php')) {
			$version = preg_replace("/['\"].*/", "", preg_replace("/.*\\\$forum_version\s*=\s*['\"]/", "", preg_replace("/\r?\n/", "", @file_get_contents($root . 'index.php'))));
			return 'Simple Machines Forum' . (empty($version) ? '' : ' ' . $version);
/* Bitrix */
		} elseif (is_dir($root . 'bitrix/')) {
			return 'Bitrix';
/* cogear */
		} elseif (is_file($root . 'gears/global/global.info')) {
			$version = preg_replace("/group.*/", "", preg_replace("/.*version\s*=\s*/", "", preg_replace("/\r?\n/", "", @file_get_contents($root . 'gears/global/global.info'))));
			return 'cogear' . (empty($version) ? '' : ' ' . $version);
/* NetCat */
		} elseif (is_dir($root . 'netcat/')) {
			return 'NetCat';
/* CakePHP, global root */
		} elseif (is_file($root . 'cake/VERSION.txt')) {
/* change document root to inner directory */
			$this->view->paths['full']['document_root'] = $this->view->ensure_trailing_slash($this->view->unify_dir_separator(substr(getenv("SCRIPT_FILENAME"), 0, strpos(getenv("SCRIPT_FILENAME"), getenv("SCRIPT_NAME")))));
			$this->save_option("['document_root']", $this->view->paths['full']['document_root']);
			return 'CakePHP';
/* CakePHP, local root */
		} elseif (is_file($root . '../../cake/VERSION.txt')) {
			$this->save_option("['document_root']", $root);
			return 'CakePHP';
/* CMS Made Simple */
		} elseif (is_file($root . 'version.php')) {
			if (is_file($root . 'plugins/function.cms_version.php')) {
				require_once($root . 'version.php');
			}
			return 'CMS Made Simple ' . $CMS_VERSION;
		}
		return 'CMS 42';
	}

	/**
	* Get files & strings to change manually
	* 
	**/
	function system_files ($cms_version = 'CMS 42') {
		$cms_version = split(" ", $cms_version);
		$files = array();
		switch ($cms_version[0]) {
			case 'Joomla!':
/* Joomla 1.5 */
				if (preg_match("/1\.[56789]/", $cms_version[1])) {
					$files = array(
						array(
							'file' => 'index.php',
							'mode' => 'start',
							'location' => '$mainframe =& JFactory::getApplication(\'site\');'
						),
						$files[] = array(
							'file' => 'index.php',
							'mode' => 'finish',
							'location' => 'end'
						),
						$files[] = array(
							'file' => 'plugins/system/cache.php',
							'mode' => 'finish',
							'location' => 'echo JResponse::toString($mainframe->getCfg(\'gzip\'));',
							'global' => 1
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
						$files[] = array(
							'file' => 'index.php',
							'mode' => 'finish',
							'location' => 'echo \'</pre>\';}'
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
						'file' => 'include/functions.php',
						'mode' => 'start',
						'location' => 'if (!is_demo_mode()) {',
						'global' => 1
					),
					array(
						'file' => 'include/functions.php',
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
/* CMS Made Simple */
			case 'CMS':
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