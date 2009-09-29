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
			$this->paths['full']['document_root'] = $document_root;
		}
/* Avoiding problems with Denwer */
		if (empty($this->paths['full']['document_root']) || !is_dir($this->paths['full']['document_root']) || !is_file($this->paths['full']['document_root'] . getenv("SCRIPT_NAME"))) {
			if (empty($document_root)) {
				$this->paths['full']['document_root'] = $this->ensure_trailing_slash($this->unify_dir_separator(substr(getenv("SCRIPT_FILENAME"), 0, strpos(getenv("SCRIPT_FILENAME"), getenv("SCRIPT_NAME")))));
			} else {
				$this->paths['full']['document_root'] = $document_root;
			}
		}
/* Get the view directory */
		if($document_root && !empty($_SERVER['SCRIPT_NAME'])) {
			$this->paths['full']['current_directory'] = $this->prevent_trailing_slash($document_root) . $this->prevent_trailing_slash(str_replace($this->get_basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']));
		} else if(!empty($this->paths['full']['document_root']) && !empty($_SERVER['SCRIPT_NAME'])) {
			$this->paths['full']['current_directory'] = $this->prevent_trailing_slash($this->paths['full']['document_root']) . str_replace($this->get_basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
		}

		if(!file_exists($this->paths['full']['current_directory'])) {
			$this->paths['full']['current_directory'] = getcwd();
		}

		$this->paths['full']['current_directory'] = $this->unify_dir_separator($this->ensure_trailing_slash($this->paths['full']['current_directory']));
/* Set the current relative path */
		$this->paths['relative']['current_directory'] = $this->unify_dir_separator(str_replace($this->prevent_trailing_slash($this->paths['full']['document_root']), "", $this->paths['full']['current_directory']));
/* Set the root relative path */
		$this->paths['relative']['document_root'] = preg_replace("/[^\/]+\/$/", "", $this->paths['relative']['current_directory']);
/* set absolute root for some cases */
		$this->paths['absolute']['document_root'] = $this->unify_dir_separator($this->paths['full']['document_root'] . substr(preg_replace("/[^\/]+\/$/", "", $this->paths['relative']['current_directory']), 1));
/* Set the view directory */
		$this->paths['full']['view'] = $this->paths['full']['current_directory'] . "view/";
	}

	/**
	 * 
	 * 
	 **/	
	 function ensure_trailing_slash($path) {
	 	if (substr($path,-1,1) != "/") {
			$path .= "/";
		}
	 	return $path; 
	 }

	/**
	 * 
	 * 
	 **/	
	 function prevent_trailing_slash($path) {
	 	if (substr($path,-1,1) == "/" || substr($path,-1,1) == "\\") {
			$path = substr($path, 0, -1);
		}
	 	return $path;
	 }
	 
	/**
	 * 
	 * 
	 **/	
	 function prevent_leading_slash($path) {
	 	if(substr($path,0,1) == "/" || substr($path,0,1) == "\\") {
			$path = substr($path,1); 
		}
	 	return $path;
	 }
	
	/**
	 * Renders a section of display code.
	 * 
	 **/	
	function render ($file_name, $vars = array ()) {
/* Set variable names */
		foreach ($vars AS $key => $val) {
			$$key = $val;
		}
		if (file_exists ($this->paths['full']['view']."$file_name.php")) {
			include ($this->paths['full']['view']."$file_name.php");
		 } else if (file_exists ("view/" . "$file_name.php")) {
		 	include ("view/"."$file_name.php");
		 } else {
			echo "<body style='font-family:verdana;font-size:11px'><p>Rendering of template $file_name.php failed.<br/>Debug info:<p>Looking for file in: <ul><li>" . $this->paths['full']['view']."$file_name.php" . "</li><li>" . "view/"."$file_name.php" ."</li></ul></p><p>Server info: <ul><li><strong>Document root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "</li><li><strong>Script name:</strong> " . $_SERVER['SCRIPT_NAME']."</li></ul></p></p></body>";
		 }
	}

	/**
	 * Version of realpath that will work on systems without realpath
	 *
	 * @param string $path The path to canonicalize
	 * @return string Canonicalized path
	 **/
	function realpath ($path) {
		$path = str_replace ('~', $_SERVER['DOCUMENT_ROOT'], $path);
		if (function_exists ('realpath')) {
			return realpath ($path);
		} else if (DIRECTORY_SEPARATOR == '/') {
/* canonicalize */
			$path = explode (DIRECTORY_SEPARATOR, $path);
			$newpath = array ();
			for ($i = 0; $i < sizeof ($path); $i++) {
				if ($path[$i] === '' || $path[$i] === '.') {
					continue;
				}
				if ($path[$i] === '..') {
					array_pop ($newpath);
					continue;
				}
				array_push ($newpath, $path[$i]);
			}
			$finalpath = DIRECTORY_SEPARATOR.implode (DIRECTORY_SEPARATOR, $newpath);
			return $finalpath;
		}
		return $path;
	}	

	/**
	 * Version of basename works on nix and windows
	 *
	 **/	
	function get_basename($filename) {
		return preg_replace( '/^.*[\\\\\\/]/', '', $filename );
	}

	/**
	 * Unifies the sep
	 *
	**/
	function unify_dir_separator ($path) {
		if (DIRECTORY_SEPARATOR != '/') {
			return str_replace (DIRECTORY_SEPARATOR, '/', $path);
		} else {
			return $path;
		}
	}
	/**
	* Validate license
	* You can donate for Web Optimizer here: http://sprites.in/donate/
	**/
	function validate_license ($license) {
		if (strlen($license) == 29) {
			$table = '123QWERTUIOP456ASDFGHJKLCVBNM7890ZXYqwertuiop456asdfghjklcvbnm7890zxy';
			$license = str_replace(array('-', '0', '9', 'X', 'Y', 'WEBOPTI', 'MIZATOR', 'Z'), array(), strtoupper($license));
			$c1 = strpos($table, substr($license, 1, 1))*31 + strpos($table, substr($license, 0, 1));
			$c2 = strpos($table, substr($license, 3, 1))*31 + strpos($table, substr($license, 2, 1));
			$i = -1;
			$c3 = 0;
			while (strlen($license)>4+(++$i)) {
				$c3 += pow(31, $i) * strpos($table, substr($license, 4 + $i, 1));
			}
			if ((!(($c3*$c3)%941 - $c1) && !(($c1*$c1)%941 - $c2)) || (!(pow($c3, 3)%941 - $c1) && !(pow($c1, 3)%941 - $c2))) {
				return true;
			}
		}
		return false;
	}
}
?>