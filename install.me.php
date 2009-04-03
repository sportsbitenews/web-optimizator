<?php

	$loaded_modules = @get_loaded_extensions();
	$install_directory = 'web-optimizer';
	$download_package = 'download Web Optimizer full package at <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>.';
	$messages = array(
		'curl_not_installed' => 'Curl isn\'t installed. Please ' . $download_package,
		'directory_not_writable' => 'Can\'t write to the current directory. Please chmod ' . @dirname(__FILE__) . ' to 0775.',
		'connection_error' => 'Can\'t download files list. It seems there are some troubles with Web Optimizer repository. Please try again later or ' . $download_package
	);

	function download ($file, $install_directory) {
		$ch = @curl_init('http://web-optimizator.googlecode.com/svn/trunk/' . $file);
		$dir = $file;
		@chdir($install_directory);
/* create directory */
		while (preg_match("/\//", $dir)) {
			$directory = preg_replace("/\/.*/", "", $dir);
			if (!is_dir($directory)) {
				@mkdir($directory, 775);
				if (is_dir($directory)) {
					@chdir($directory);
				} else {
					return;
				}
			}
			$dir = substr($dir, strlen($directory) + 1, strlen($dir));
		}
		$fp = @fopen($install_directory . '/' . $file, "w");
		if ($fp && $ch) {
			@curl_setopt($ch, CURLOPT_FILE, $fp);
			@curl_setopt($ch, CURLOPT_HEADER, 0);
			@curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Web Optimizer; Speed Up Your Website; http://webo.in/) Firefox 3.0.9");
			@curl_exec($ch);
			@curl_close($ch);
			@fclose($fp);
		}
	}

/* check for curl installed */
	if (in_array('curl', $loaded_modules) && function_exists('curl_init')) {
/* check if directory already exists */
		if (is_dir($install_directory) && is_file($install_directory . '/index.php')) {
			header("Location: web-optimizer/");
			die();
		} else {
/* try to make current directory writable */
			@chmod("./", 775);
			@mkdir($install_directory);
			if (is_dir($install_directory)) {
/* get list of files */
				download('files', $install_directory);
				if (is_file($install_directory . '/files')) {
					$files = split("\r?\n", file_get_contents($install_directory . '/files'));
					foreach ($files as $file) {
						download($file, $install_directory);
					}
/* check if download was succsessful */
					if (is_file($install_directory . '/index.php')) {
/* remove current file */
						@unlink(__FILE__);
/* redirect to Web Optimizer installation */
						header("Location: web-optimizer/");
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
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Web Optimizer Install</title>
<body>
<h1>We have some problems during Web Optimizer installation</h1>
<p><?php echo $error ?></p>
</body>
</html>