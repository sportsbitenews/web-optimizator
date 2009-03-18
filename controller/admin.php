<?php
/**
 * File from PHP Speedy, Leon Chevalier (http://www.aciddrop.com)
 * 
 *
 **/
class admin {

	/**
	* Constructor
	* Sets the options and defines the gzip headers
	**/
	function admin($options=null) {
	
		if(!empty($options['skip_startup'])) {
		return;
		}
	
		//Ensure no caching
		header('Last-Modified: '.gmdate('D, d M Y H:i:s', mktime(0, 0, 0, date("m"), date("d")-2, date("Y"))).' GMT');
		header('Expires: '.gmdate('D, d M Y H:i:s', mktime(0, 0, 0, date("m"), date("d")-1, date("Y"))).' GMT');		
		header("Cache-Control: private");	
		header("Pragma: no-cache");	

		foreach($options AS $key=>$value) {
		$this->$key = $value;
		}
		
		//Set name of options file
		$this->options_file = "config.php";
		require_once($this->options_file);
		$this->compress_options = $compress_options;
		
		//Make sure login valid
		$this->manage_password();
		$this->password_not_required = array('install_enter_password'=>1,
											 'install_set_password'=>1
											);
		if(empty($this->password_not_required[$this->input['page']])) {
		$this->check_login();
		}
		
		//Set page functions for the installation and admin, makes sure nothing else can be run
		$this->page_functions = array('install_set_password'=>1,
									  'install_enter_password'=>1,
									  'install_stage_1'=>1,
									  'install_stage_2'=>1,
									  'install_stage_3'=>1);
		
		//Show page
		if(!empty($this->page_functions[$this->input['page']]) && method_exists($this,$this->input['page'])) {
			$func = $this->input['page'];
			$this->$func();
		}
	
	}

	/**
	* 
	* 
	**/	
	function install_set_password() {
	
	if(!empty($this->compress_options['username']) && !empty($this->compress_options['password'])) {


		$page_variables = array("title"=>"Enter your password for installtion",
								"paths"=>$this->view->paths,
								"page"=>'install_enter_password'); //take document root from the options file


	} else {
	
		$page_variables = array("title"=>"Set your password for installtion",
								"paths"=>$this->view->paths,
								"page"=>'install_set_password'); //take document root from the options file
	
	}	
	
		//Show the install page
		$this->view->render("admin_container",$page_variables);	

	}

	/**
	* 
	* 
	**/	
	function install_stage_1() {

		$page_variables = array("title" => "Welcome to compressor installation!",
							"paths" => $this->view->paths,
							"page" => $this->input['page'],
							"document_root" => $this->compress_options['document_root'],
							"compress_options" => $this->compress_options);
	
		//Show the install page
		$this->view->render("admin_container", $page_variables);
	
	}
	
	/**
	* 
	* 
	**/	
	function install_stage_2() {
/* Save the options file */
		if(!empty($this->input['user']['document_root'])) {
			$_SERVER['DOCUMENT_ROOT'] = $this->input['user']['document_root'];
		}
		if(!empty($this->input['submit'])) {
			$save = $this->save_option('[\'document_root\']', $_SERVER['DOCUMENT_ROOT']);
		}
/* Set paths with the new document root */
		$this->view->set_paths();
/* check for Apache installation */
		if (function_exists('apache_get_modules')) {
			$apache_modules = apache_get_modules();
		} else {
/* if PHP installed as CGI module -- we don't need .htaccess */	
			$apache_modules = array();
		}
		$apache_modules_enabled = array();
		if (in_array('mod_expires', $apache_modules)) {
			$apache_modules_enabled[] = 'mod_expires';
		}
		if (in_array('mod_gzip', $apache_modules)) {
			$apache_modules_enabled[] = 'mod_gzip';
		}
		if (in_array('mod_deflate', $apache_modules)) {
			$apache_modules_enabled[] = 'mod_deflate';
		}
		if (in_array('mod_headers', $apache_modules)) {
			$apache_modules_enabled[] = 'mod_headers';
		}
		$options = array('Minify'=>$this->compress_options['minify'],
							'GZIP'=>$this->compress_options['gzip'],
							'htaccess'=>$this->compress_options['htaccess'],
							'css_sprites'=>$this->compress_options['css_sprites'],
							'Far_future_expires'=>$this->compress_options['far_future_expires']
						);

		$options = array('cache_dir'=>array(
							'title'=>'Cache Directory',
							'intro'=>'Web Optimizer will store your compressed JavaScript and CSS files in a cache directory. <br/>You can enter a new directory below if desired. This directory must be within your document root and writable by the server. If in doubt just use the directory suggested.',
							'key'=>'Directory',
							'value'=>$this->compress_options['javascript_cachedir']
						),
						'js_libraries'=>array(
							'title'=>'JavaScript Libraries',
							'intro'=>'If your plugins or theme use a JavaScript library, it is advisable to let Web Optimizer handle where it is included.<br /><br />
										Speedy has determined that the libraries below could be in use by your installation. It is recommended that you tick all the scripts to let Web Optimizer handle them.<br/><br />
										If your plugins or theme use a higher version or you are sure you don\'t use the library at all, leave unticked.',
							'key'=>'JS_Libraries',
							'value'=>$this->compress_options['js_libraries']
						),
						'ignore_list'=>array(
							'title'=>'Ignore list',
							'intro'=>'Web Optimizer can ignore certain scripts of your choosing. Please enter the filenames of the scripts you would like to ignore below, separated by a comma.',
							'key'=>'Ignore_List',
							'value'=>$this->compress_options['ignore_list']
						),
						'minify'=>array(
							'title'=>'Minify Options',
							'intro'=>'Minifying removes whitespace and other unnecessary characters.',
							'value'=>$this->compress_options['minify']
						),
						'gzip'=>array(
							'title'=>'Gzip Options',
							'intro'=>'Gzipping compresses the code via Gzip compression. This is recommended only for small scale sites, and is off by default.
										<br/>For larger sites, you should Gzip via the web server.',
							'value'=>$this->compress_options['gzip']
						),
						'far_future_expires'=>array(
							'title'=>'Far Future Expires Options',
							'intro'=>'This adds an expires header to your JavaScipt and CSS files which ensures they are cached client-side by the browser.
										<br/>When you change your JS or CSS, a new filename is generated and the latest version is therefore downloaded and cached.',
							'value'=>$this->compress_options['far_future_expires']
						),
						'css_sprites'=>array(
							'title'=>'CSS Sprites',
							'intro'=>'It is possible to store CSS Background images as CSS Sprites. This can significantly reduce number of HTTP Requests website load.
										<br/>This technique is fully supported by all modern browsers.',
							'value'=>$this->compress_options['css_sprites']
						),
						'data_uris'=>array(
							'title'=>'Data URIs',
							'intro'=>'It is possible to store CSS Background images as Data URIs. This will help cut down even further on the amount of HTTP Requests. 
										<br/>Note, however, that this will not work on Internet Explorer (up to version 7.0) and that the overall data size will be larger.',
							'value'=>$this->compress_options['data_uris']
						),
						'htaccess'=>array(
							'title'=>'Use .htaccess',
							'intro'=>'Most of gzip and cache options can be written to your website configuration (and avoid additional work). This can be done via <code>.htaccess</code> file (and you can later cut options from there and move to <code>httpd.cond</code> if it is required).
										<br/>Available options: ' . implode(", ", $apache_modules_enabled),
							'value'=>$this->compress_options['htaccess']
						),
						'cleanup'=>array(
							'title'=>'File cleanup',
							'intro'=>'When you change your JavaScript or CSS Web Optimizer will automatically generate a new compressed file and remove any unused files from the directory.
										<br/>However, if different pages in your site use different JS or CSS files Speedy will get confused and cleanup files it shouldn\'t. In this case, you should turn off the cleanup process.',
							'value'=>$this->compress_options['cleanup']
						),
						'footer'=>array(
							'title'=>'Footer text',
							'intro'=>'Web Optimizer can add a link in your blog footer back to the Web Optimizer website. The link can be a text link, a small image link or both.
										<br/>Please support Web Optimizer by enabling this.',
							'value'=>$this->compress_options['footer']
						)
		);
		$options['auto_rewrite'] = null;
/* check /index.php to possiblity to rewrite it */
		$fp = @fopen($this->input['user']['document_root'] . "index.php", "ar");
		if ($fp) {
/* if we can rewrite the file -- add auto-patch option */
			$options['auto_rewrite'] = array(
						'title' => 'Auto change /index.php',
						'intro' => 'Web Optimizer can add to your website based on [here should go CMS title] all required changes (only for /index.php).' .
									'<br/>Note: this can lead to some problems due to server misconfiguration, be carefull with this option.',
						'value' => is_array($this->compress_options['auto_rewrite']) ? $this->compress_options['auto_rewrite'] : array('enabled' => null)
			);
		}

		$page_variables = array("title" => "Installation stage 2",
							"paths" => $this->view->paths,
							"page" => $this->input['page'],
							"message" => $save,
							"javascript_cachedir" => $this->view->paths['full']['current_directory'] . 'cache/',
							"css_cachedir" => $this->view->paths['full']['current_directory'] . 'cache/',
							"options" => $options,
							"compress_options" => $this->compress_options);
/* Show the install page */
		$this->view->render("admin_container",$page_variables);	
	
	}

	/**
	* 
	* 
	**/	
	function install_stage_3() {

/* Check we can write to the specified directory */
		$content = "Test";
		$test_dirs = array(
					'javascript' => $this->view->ensure_trailing_slash($this->input['user']['javascript_cachedir']),
					'css' => $this->view->ensure_trailing_slash($this->input['user']['css_cachedir'])
		);
		foreach($test_dirs AS $name=>$dir) {

			$fp = @fopen($dir."test", 'w');
			if(!$fp) {
/* unable to open file for writing */
			$this->error("<p>Unable to write to the $name directory you specified. Please make sure the directory exists and is writable.<p>
						<p>You can usually do this from your FTP client. Just navigate to the directory, right click and look for a Properties or CHMOD option.</p>
						<p>Once you have done so, please refresh this page.</p>");
			} else {
/* write the file */
				fwrite($fp, $content);
				fclose($fp);
				unlink($dir."test");
			}

		}
/* check for Apache installation */
		if (function_exists('apache_get_modules')) {
			$apache_modules = apache_get_modules();
		} else {
/* if PHP installed as CGI module -- we don't need .htaccess */	
			$apache_modules = array();
		}
/* Create the options file */
		$this->options_file = "config.php";
		if(!empty($this->input['submit'])) {
/* Save the options		 */
			foreach($this->input['user'] AS $key=>$option) {
				if(is_array($option)) {
					foreach($option AS $option_name=>$option_value) {
						if (!empty($apache_modules)) {
							if (in_array($option_name, array('mod_expires', 'mod_deflate', 'mod_headers', 'mod_gzip'))) {
								$option_value = $option_value && in_array($option_name, $apache_modules);
								$this->input['user'][$key][$option_name] = $option_value;
							}
						}
						$this->save_option("['" . strtolower($key) . "']['" . strtolower($option_name) . "']",$option_value);	
					}
				} else {
					$this->save_option("['" . strtolower($key) . "']",$option);			
				}
			}

/* additional check for .htaccess -- need to open exact file */
			if ($this->input['user']['htaccess']['enabled'] && !empty($apache_modules)) {

				$this->view->set_paths();
/* first of all just cut current Web Optimizer options from .htaccess */
				$htaccess = $this->view->paths['full']['document_root'] . '/.htaccess';
				if (is_file($htaccess)) {
					$fp = @fopen($htaccess, 'r');
					if (!$fp) {
						$this->error("<p>Please sure that the root of your website is readable and writable to your web server process.</p>
										<p>Make CHMOD 775 for it, or create readable and writable <code>.htaccess</code> there, or CHMOD current <code>.htaccess</code> to 664.</p>");
					} else {
						$stop_saving = 0;
						$content_saved = '';
						while ($htaccess_string = fgets($fp)) {
							if (preg_match("/# Web Optimizer options/",$htaccess_string)) {
								$stop_saving = 1;
							}
							if (!$stop_saving && $htaccess_string != "\n") {
								$content_saved .= $htaccess_string;
							}
							if (preg_match("/# Web Optimizer end/",$htaccess_string)) {
								$stop_saving = 0;
							}
						}
						fclose($fp);

					}

				}

				$fp = @fopen($htaccess, 'w');
				if (!$fp) {
					$this->error("<p>Please sure that the root of your website is writable to your web server process.</p>
									<p>Make CHMOD 775 for it, or create writable <code>.htaccess</code> there, or CHMOD current <code>.htaccess</code> to 664.</p>");
				} else {
					$htaccess_options = $this->input['user']['htaccess'];
					$content = '# Web Optimizer options';
					if ($htaccess_options['mod_gzip']) {
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
mod_gzip_dechunk Yes";
						if ($this->input['user']['gzip']['page']) {
							$content .= "
mod_gzip_item_include mime ^text/html$
mod_gzip_item_include mime ^text/plain$
mod_gzip_item_include mime ^image/x-icon$
mod_gzip_item_include mime ^httpd/unix-directory$";
						}
						if ($this->input['user']['gzip']['css']) {
							$content .= "
mod_gzip_item_include mime ^text/css$";
						}
						if ($this->input['user']['gzip']['javascript']) {
							$content .= "
mod_gzip_item_include mime ^text/javascript$
mod_gzip_item_include mime ^application/javascript$
mod_gzip_item_include mime ^application/x-javascript$";
						}
					}
					if ($htaccess_options['mod_deflate']) {
						$content .= "
BrowserMatch ^Mozilla/4 gzip-only-text/html
BrowserMatch ^Mozilla/4\.0[678] no-gzip
BrowserMatch \bMSIE !no-gzip !gzip-only-text/html";
						if ($this->input['user']['gzip']['page']) {
							$content .= "
AddOutputFilterByType DEFLATE text/html
AddOutputFilterByType DEFLATE text/xml
AddOutputFilterByType DEFLATE image/x-icon";
						}
						if ($this->input['user']['gzip']['css']) {
							$content .= "
AddOutputFilterByType DEFLATE text/css";
						}
						if ($this->input['user']['gzip']['javascript']) {
							$content .= "
AddOutputFilterByType DEFLATE text/javascript
AddOutputFilterByType DEFLATE application/javascript
AddOutputFilterByType DEFLATE application/x-javascript";
						}
					}
					if ($htaccess_options['mod_expires']) {
						$content .= "
ExpiresActive On
ExpiresDefault \"access plus 10 years\"
<FilesMatch .*\.(php|phtml|shtml|html|xml)$>
	ExpiresActive Off
</FilesMatch>";
						if (!$this->input['user']['far_future_expires']['css']) {
							$content .= "
<FilesMatch .*\.css$>
	ExpiresActive Off
</FilesMatch>";
						}
						if (!$this->input['user']['far_future_expires']['javascript']) {
							$content .= "
<FilesMatch .*\.js$>
	ExpiresActive Off
</FilesMatch>";
						}
						if (!$this->input['user']['far_future_expires']['static']) {
							$content .= "
<FilesMatch .*\.(bmp|png|gif|jpe?g|ico|swf|flv|pdf)$>
	ExpiresActive Off
</FilesMatch>";
						}
					}
					if ($htaccess_options['mod_headers']) {
						if ($htaccess_options['mod_deflate'] || $htaccess_options['mod_gzip']) {
							$content .= "
<FilesMatch .*\.(css|js|php|phtml|shtml|html|xml)$>
	Header append Vary User-Agent
	Header append Cache-Control private
</FilesMatch>";
						}
						if ($htaccess_options['mod_expires']) {
							$content .= "
<FilesMatch \"\\.(ico|pdf|flv|swf|jpe?g|png|gif|bmp|js|css)$\">
	Header unset Last-Modified
	FileETag MTime
</FilesMatch>";
						}
					}
					$content .= "\n# Web Optimizer end";
					fwrite($fp, $content_saved."\n".$content);
					fclose($fp);
				}

			}
/* try to auto-patch root /index.php */
			$auto_rewrite = 0;
			if ($this->input['user']['auto_rewrite']['enabled']['on']) {
				$index = preg_replace("/web-optimizer\//", "", $this->view->paths['full']['current_directory']) . 'index.php';
				$fp = @fopen($index, "r");
				if ($fp) {
					$content_saved = '';
					while ($index_string = fgets($fp)) {
						$content_saved .= preg_replace("/(require\('[^\']+web-optimizer\/web.optimizer.php'\)|\\\$web_optimizer->finish\(\));\r?\n?/", "", $index_string);
					}
					if (substr($content_saved, 0, 2) == '<?') {
/* add require block */
						$content_saved = preg_replace("/^<\?(php)?( |\r?\n)/", '<?$1$2require(\'' . $this->view->paths['full']['current_directory'] . 'web.optimizer.php\');' . "\n", $content_saved);
					} else {
						$content_saved = "<?php require('" . $this->paths['full']['current_directory'] . "web-optimizer/web.optimizer.php'); ?>" . $content_saved;
					}
					if (substr($content_saved, strlen($content_saved) - 2, 2) == '?>') {
/* add finish block */
						$content_saved = preg_replace("/ ?\?>$/", '\$web_optimizer->finish(); ?>', $content_saved);
					} else {
						$content_saved .= '<?php $web_optimizer->finish(); ?>';
					}
					fclose($fp);
					$fp = @fopen($index, "w");
					if ($fp) {
						fwrite($fp, $content_saved);
						fclose($fp);
						$auto_rewrite = 1;
					}

				}

			}

		}

		$page_variables = array("title" => "Installation stage 3",
								"paths" => $this->view->paths,
								"page" => $this->input['page'],
								"message" => "Configuration saved",
								"auto_rewrite" => $auto_rewrite);
/* Show the install page */
		$this->view->render("admin_container",$page_variables);

	}

	/**
	* Saves an admin option
	* 
	**/	
	function save_option($option_name,$option_value) {
/* See if file exists */
		$option_file = $this->view->paths['full']['current_directory'].$this->options_file;
		if(file_exists($option_file)) {
		
			$content = file_get_contents($option_file);
			$content = preg_replace("@(" . $this->regex_escape($option_name) . ") = \"(.*?)\"@is","$1 = \"" . $option_value . "\"",$content);
			$fp = @fopen($option_file, 'w');
			if(!$fp) {
/* unable to open file for writing */
				$this->error('<p>Unable to open the config file for writing. Please change the config.php file so that is it writable.</p>
								<p>You can usually do this from your FTP client. Just navigate to <strong>' . $option_file .'</strong> , right click the file, and look for a Properties or CHMOD option. Set to 777, or "write".</p>
								<p>Once you have done so, please refresh this page.</p>');
			} else {
/* write the file */
				fwrite($fp, $content);
				fclose($fp);
				return "Saved " . $option_name;
			}
	
		} else {
			$this->error('Config file does not exist. Please download the full script from http://www.aciddrop.com');
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
				$this->error('Login failed');
			} else {
				$this->error('You need to be logged in to view this page');
			}
			
		}
	
	}

	/**
	* Set the initial password
	* 
	**/		
	function manage_password() {
/* If posting a username and pass, md5 encode */
	if(!empty($this->input['user']['username'])) {
		 
			$this->input['user']['username'] = md5($this->input['user']['username']);
			$this->input['user']['password'] = md5($this->input['user']['password']);	
/* If the pass isn't there, write it */
		 if(empty($this->compress_options['username']) && empty($this->compress_options['password'])) {
		 		 
			$save = $this->save_option('[\'username\']',($this->input['user']['username']));
			$save .= "<br/>" . $this->save_option('[\'password\']',($this->input['user']['password']));	
			$save .= "<br />Logged you in";
			$this->save = $save;
/* Set Web Optimizer Actuve */
			$this->save_option('[\'active\']',1);
/* Update */
			$this->compress_options['username'] = $this->input['user']['username'];
			$this->compress_options['password'] = $this->input['user']['password'];
		 
		 }			
							
	}
/* If passing a username and pass, don't md5 encode */
		if(!empty($this->input['user']['_username'])) {
			$this->input['user']['username'] = ($this->input['user']['_username']);
			$this->input['user']['password'] = ($this->input['user']['_password']);	
		}
	
	}
	
	/**
	* Display an error
	* 
	**/		
	function error($string) {

		$page_variables = array("title"=>"Oopps! Something went wrong",
								"paths"=>$this->view->paths,
								"error"=>$string,
								"page"=>'error');								
/* Show the install page */
		$this->view->render("admin_container",$page_variables);
		die();

	}

	/**
	* Make safe for regex
	* 
	**/		
	function regex_escape($string) 	{
		return  addcslashes($string,'\^$.[]|()?*+{}');
	}

}
?>