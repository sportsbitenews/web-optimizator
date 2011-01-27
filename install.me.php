<?php

// ==============================================================================================
// Licensed under the WEBO license (LICENSE.txt)
// ==============================================================================================
// @author     WEBO Software (http://www.webogroup.com/)
// @version    1.0.0
// @copyright  Copyright &copy; 2009-2010 WEBO Software, All Rights Reserved
// ==============================================================================================
// To install WEBO Site SpeedUp please copy this file to the document root, make document root
// writable for your web server (or create writable web-optimizer directory) and go
// to /install.me.php in your browser.
// ==============================================================================================
// If you are using advanced framework (such as CodeIgniter, Zend Framework, Symfony, etc)
// please disable default Rewrite rules to setup WEBO Site SpeedUp properly. I.e. comment these lines
// RewriteCond %{REQUEST_FILENAME} !-f
// RewriteRule .* index.php
// in your .htaccess
// ==============================================================================================

	$loaded_modules = @get_loaded_extensions();
	$install_directory = 'web-optimizer';
	$download_package = 'download WEBO Site SpeedUp full package at <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>.';
	$messages = array(
		'curl_not_installed' => 'Curl isn\'t installed. Please ' . $download_package,
		'directory_not_writable' => 'Can\'t write to the current directory. Please chmod ' . @dirname(__FILE__) . ' to 0775.',
		'connection_error' => 'Can\'t download files list. It seems there are some troubles with Web Optimizer repository. Please try again later or ' . $download_package
	);

	function download ($file, $install_directory) {
		$ch = @curl_init('http://web-optimizator.googlecode.com/svn/trunk-stable/' . $file);
		$dir = $file;
/* remember current directory */
		$current_directory = @getcwd();
		@chdir($install_directory);
/* create directory */
		while (preg_match("/\//", $dir)) {
			$directory = preg_replace("/\/.*/", "", $dir);
			if (!is_dir($directory)) {
				@mkdir($directory, octdec("0755"));
				if (is_dir($directory)) {
					@chdir($directory);
				} else {
					return;
				}
			} else {
				@chmod($directory, octdec("0755"));
				@chdir($directory);
			}
			$dir = substr($dir, strlen($directory) + 1, strlen($dir));
		}
/* return to the initial directory */
		@chdir($current_directory);
		$fp = @fopen($install_directory . '/' . $file, "w");
		if ($fp && $ch) {
			@curl_setopt($ch, CURLOPT_FILE, $fp);
			@curl_setopt($ch, CURLOPT_HEADER, 0);
			@curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Web Optimizer; Speed Up Your Website; http://webo.in/) Firefox 3.0.9");
			@curl_exec($ch);
			@curl_close($ch);
			@fclose($fp);
		}
/* set correct rights for a new file */
		@chmod($install_directory . '/' . $file, octdec("0755"));
	}

/* check for curl installed */
	if (in_array('curl', $loaded_modules) && function_exists('curl_init')) {
/* check if directory already exists */
		if (is_dir($install_directory) && is_file($install_directory . '/index.php')) {
			header("Location: " . $install_directory . "/index.php");
			die();
		} else {
			@mkdir($install_directory);
			if (!is_dir($install_directory)) {
/* try to make current directory writable for group */
				@chmod("./", octdec("0755"));
			}
			@mkdir($install_directory);
			if (is_dir($install_directory)) {
/* get list of files */
				download('files', $install_directory);
				if (is_file($install_directory . '/files')) {
					if (get_magic_quotes_runtime())
					{
						$files = split("\r?\n", stripslashes(file_get_contents($install_directory . '/files')));
					}
					else
					{
						$files = split("\r?\n", file_get_contents($install_directory . '/files'));
					}
					foreach ($files as $file) {
						if (!empty($file) && !is_file($install_directory . '/' . $file)) {
							download($file, $install_directory);
						}
					}
/* check if download was succsessful */
					if (is_file($install_directory . '/index.php')) {
/* remove current file */
						@unlink(__FILE__);
/* redirect to WEBO Site SpeedUp installation */
						header("Location: " . $install_directory . "/index.php");
						die();
					} else {
						$error = $messages['connection_error'];
					}
				} else {
					$error = $messages['connection_error'];
				}
			} else {
				$error = $messages['directory_not_writable'];
			}
		}
		$file = 'files';
	} else {
		$error = $messages['curl_not_installed'];
	}

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
?><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><title>WEBO Site SpeedUp Installation</title></head><body><h1>We have some problems during WEBO Site SpeedUp installation</h1><p><?php echo $error ?></p></body></html>
