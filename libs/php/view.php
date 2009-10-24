<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Very basic templating class
 * Initially based on PHP Speedy, Leon Chevalier (http://www.aciddrop.com)
 *
 **/
class compressor_view {

	/**
	* 
	* Creates class instance
	**/
	function compressor_view($options=null) {
		$this->paths = array();
		$this->paths['full'] = array();
		$this->paths['relative'] = array();
		$this->paths['absolute'] = array();
		$this->set_paths();
	}

	/**
	 * Sets the paths
	 *
	 **/
	function set_paths ($document_root = null) {
		if (empty($document_root)) {
/* Save doc root, fix for PHP as CGI */
			$this->paths['full']['document_root'] = $this->ensure_trailing_slash($this->unify_dir_separator($_SERVER['DOCUMENT_ROOT']));
		} else {
			$this->paths['full']['document_root'] = $this->ensure_trailing_slash($this->unify_dir_separator($document_root));
		}
/* Avoiding problems with Denwer */
		if (empty($this->paths['full']['document_root']) || !is_dir($this->paths['full']['document_root']) || !is_file($this->paths['full']['document_root'] . getenv("SCRIPT_NAME"))) {
			$this->paths['full']['document_root'] = $this->ensure_trailing_slash($this->unify_dir_separator(substr(getenv("SCRIPT_FILENAME"), 0, strpos(getenv("SCRIPT_FILENAME"), getenv("SCRIPT_NAME")))));
		}
		$this->paths['full']['document_root'] = str_replace("//", "/", $this->paths['full']['document_root']);
/* Get the view directory */
		if ($document_root && !empty($_SERVER['SCRIPT_NAME'])) {
			$this->paths['full']['current_directory'] = $this->prevent_trailing_slash($this->unify_dir_separator($document_root)) . $this->prevent_trailing_slash($this->unify_dir_separator(str_replace($this->get_basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME'])));
		} else if(!empty($this->paths['full']['document_root']) && !empty($_SERVER['SCRIPT_NAME'])) {
			$this->paths['full']['current_directory'] = $this->prevent_trailing_slash($this->paths['full']['document_root']) . $this->prevent_trailing_slash($this->unify_dir_separator(str_replace($this->get_basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME'])));
		}

		if (!file_exists($this->paths['full']['current_directory'])) {
			$this->paths['full']['current_directory'] = getcwd();
		}

		$this->paths['full']['current_directory'] = $this->ensure_trailing_slash($this->unify_dir_separator($this->paths['full']['current_directory']));
		$this->paths['full']['current_directory'] = str_replace("//", "/", $this->paths['full']['current_directory']);
/* Set the current relative path */
		$this->paths['relative']['current_directory'] = str_replace($this->prevent_trailing_slash($this->paths['full']['document_root']), "", $this->paths['full']['current_directory']);
/* Set the root relative path */
		$this->paths['relative']['document_root'] = preg_replace("@[^/]+/$@", "", $this->paths['relative']['current_directory']);
/* set absolute root for some cases */
		$this->paths['absolute']['document_root'] = $this->paths['full']['document_root'] . $this->prevent_leading_slash($this->paths['relative']['document_root']);
/* Set the view directory */
		$this->paths['full']['view'] = $this->paths['full']['current_directory'] . "view/";
	}

	/**
	 * Adds trailing slash if required
	 *
	 **/	
	 function ensure_trailing_slash ($path) {
	 	if ($path{strlen($path) - 1} !== '/') {
			$path .= '/';
		}
	 	return $path; 
	 }

	/**
	 * Removes trailing slash if required
	 * 
	 **/	
	 function prevent_trailing_slash ($path) {
	 	if ($path{strlen($path) - 1} === '/') {
			$path = substr($path, 0, -1);
		}
	 	return $path;
	 }
	 
	/**
	 * Removes leading slash if required
	 * 
	 **/	
	 function prevent_leading_slash ($path) {
	 	if ($path{0} === '/') {
			$path = substr($path, 1); 
		}
	 	return $path;
	 }
	
	/**
	 * Renders a section of display code.
	 * 
	 **/	
	function render ($file_name, $vars = array ()) {
/* Set variable names */
		foreach ($vars as $key => $val) {
			$$key = $val;
		}
		if (file_exists ($this->paths['full']['view'] . "$file_name.php")) {
			include ($this->paths['full']['view'] . "$file_name.php");
		 } elseif (file_exists ("view/" . "$file_name.php")) {
		 	include ("view/" . "$file_name.php");
		 } else {
			echo "<body style='font-family:verdana;font-size:11px'><p>Rendering of template $file_name.php failed.<br/>Debug info:<p>Looking for file in: <ul><li>" . $this->paths['full']['view']."$file_name.php" . "</li><li>" . "view/"."$file_name.php" ."</li></ul></p><p>Server info: <ul><li><strong>Document root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "</li><li><strong>Script name:</strong> " . $_SERVER['SCRIPT_NAME']."</li></ul></p></p></body>";
		 }
	}

	/**
	 * Version of basename works on nix and windows
	 *
	 **/	
	function get_basename ($filename) {
		return preg_replace( '/^.*[\\\\\\/]/', '', $filename );
	}

	/**
	 * Unifies the sep
	 *
	**/
	function unify_dir_separator ($path) {
		if (DIRECTORY_SEPARATOR !== '/') {
			return str_replace (DIRECTORY_SEPARATOR, '/', $path);
		} else {
			return $path;
		}
	}
	/**
	* Validate license
	* You can donate for Web Optimizer here: http://sprites.in/donate/
	**/
	function validate_license ($license, $cachedir = false) {
		if (strlen($license) == 29) {
			$table = '123QWERTUIOP456ASDFGHJKLCVBNM7890ZXYqwertuiop456asdfghjklcvbnm7890zxy';
			$l = str_replace(array('-', '0', '9', 'X', 'Y', 'WEBOPTI', 'MIZATOR', 'Z'), array(), strtoupper($license));
			$c1 = strpos($table, substr($l, 1, 1))*31 + strpos($table, substr($l, 0, 1));
			$c2 = strpos($table, substr($l, 3, 1))*31 + strpos($table, substr($l, 2, 1));
			$i = -1;
			$c3 = 0;
			while (strlen($l) > 4+(++$i)) {
				$c3 += pow(31, $i) * strpos($table, substr($l, 4 + $i, 1));
			}
			if ((!(($c3*$c3)%941 - $c1) && !(($c1*$c1)%941 - $c2)) || (!(pow($c3, 3)%941 - $c1) && !(pow($c1, 3)%941 - $c2))) {
				if ($cachedir) {
					if (time() - @filemtime($cachedir . 'wo') > 86400) {
						$this->download("http://webo.name/license/?key=" . $license, $cachedir . 'wo', 5);
					}
					if (($wo = @file_get_contents($cachedir . 'wo')) && $wo < 0) {
						return false;
					}
				}
				return true;
			}
		}
		return false;
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
				@mkdir($local_dir, octdec("0755"));
			}
/* parse headers for content-encoding */
			$local_file_headers = $local_file . ".headers";
/* start curl */
			$ch = @curl_init($remote_file);
			$fp = @fopen($local_file, "w");
			$fph = @fopen($local_file_headers, "w");
			if ($fp && $ch) {
				@curl_setopt($ch, CURLOPT_FILE, $fp);
				@curl_setopt($ch, CURLOPT_HEADER, 0);
				@curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Web Optimizer; Speed Up Your Website; http://web-optimizer.us/) Firefox 3.5.2");
				@curl_setopt($ch, CURLOPT_ENCODING, "");
				@curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
				@curl_setopt($ch, CURLOPT_WRITEHEADER, $fph);
				@curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
				@curl_exec($ch);
				@curl_close($ch);
				@fclose($fp);
				@fclose($fph);
			}
			if (is_file($local_file_headers)) {
				$gzip = preg_match('/content-encoding/i', @file_get_contents($local_file_headers));
				@unlink($local_file_headers);
			}
		}
		return $gzip;
	}
}
?>