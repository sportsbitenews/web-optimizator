<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Classes for storing html cache
 *
 **/
 
 /* Abstract class that defines basic methods */
 
 class webo_cache_engine {
 
 	/* Class constructor. Expects options array. */
 	
 	function webo_cache_engine($options)
 	{
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
 	}

 	/* Adds or updates entry. Expects key string and value to cache. */
 	
 	function put_entry($key, $value)
 	{
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
 	}

 	/* Get cache entry by key. Expects key string. */
 	
 	function get_entry($key)
 	{
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
 	}
 	
 	/* Clear cache entries by pattern(s). Expects pattern or array of patterns. */
 	
 	function delete_entries($patterns)
 	{
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
 	}

 	/* Gets creation time of cache entry. Expects key string. */
 	
 	function get_mtime($key)
 	{
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
 	}

 	/* Sets creation time of cache entry. Expects key string and time to set. */
 	
 	function set_mtime($key, $time)
 	{
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
 	}

}

/* Here starts the section with different implementations of cache_engine abstract class. Every class name should start with 'cache_' and use some specific name for particular engine. For example, cache_files (stores cache items on filesystem) or cache_memcached (uses memcached to store cache items).

/* Default implementation that stores cache entries on filesystem */

class webo_cache_files extends webo_cache_engine
{
	/* Class constructor. Expects cache directory as option and checks if it's writable. */

	function webo_cache_files($options)
	{
		if(!empty($options['cache_dir']) && @is_writable($options['cache_dir']))
		{
			$this->cache_dir = $options['cache_dir'];
		}
		else
		{
			return false;
		}
	}
	
	/* Get cache entry by key. Expects key string. */

 	/* Adds or updates entry. Expects key string and value to cache. */
 	
 	function put_entry($key, $value, $time)
 	{
 		$path = $this->__get_path($key);
 		if (!@is_dir(dirname($path)))
 		{
 			$this->__make_path($path);
 		}
		if (@function_exists('file_put_contents')) {
			@file_put_contents($path, $value);
		} else {
			$fp = @fopen($path, "a");
			if ($fp) {
/* block file from writing */
				@flock($fp, LOCK_EX);
/* erase content and move to the beginning */
				@ftruncate($fp, 0);
				@fseek($fp, 0);
				@fwrite($fp, $value);
				@fclose($fp);
			}
		}
		@touch($path);
		@chmod($path, octdec("0644"));
 	}

	function get_entry($key)
	{
		if (@is_file($this->__get_path($key)))
		{
			return @file_get_contents($this->__get_path($key));
		}
		else
		{
			return false;
		}
	}

 	/* Clear cache entries by pattern(s). Expects pattern or array of patterns. */
 	
 	function delete_entries($patterns)
 	{
 		if (!empty($patterns))
 		{
 			if (is_array($patterns))
 			{
 				foreach($patterns as $pattern)
 				{
	 				$files = $this->__get_keys_by_pattern($this->__get_path($pattern));
	 				foreach($files as $file)
	 				{
	 					@unlink($file);
	 				}
 				}
 			}
 			else
 			{
 				$files = $this->__get_keys_by_pattern($this->__get_path($patterns));
 				foreach($files as $file)
 				{
 					@unlink($file);
 				}
 			}
 		}
 	}

 	/* Internal method that returns all keys that match given pattern. Expects pattern. */
 	
 	function __get_keys_by_pattern($pattern)
 	{
 		return glob($pattern);
 	}

 	/* Gets creation time of cache entry. Expects key string. */
 	
 	function get_mtime($key)
 	{
 		if (@file_exists($this->__get_path($key)))
 		{
	 		return @filemtime($this->__get_path($key));
 		}
 		else
 		{
 			return 0;
 		}
 	}

 	/* Sets creation time of cache entry. Expects key string and time to set. */
 	
 	function set_mtime($key, $time)
 	{
 		@touch($this->__get_path($key), $time);
 	}
 	
 	/* Gets path to file from cache entry key */
 	
 	function __get_path($key)
 	{
 		return $this->cache_dir . str_replace('+', '/', $key);
 	}
 	
 	/* Creates directory structure to store the file */
 	
 	function __make_path($path)
 	{
 		if (substr(phpversion(), 0, 1) == 4)
 		{
 			$dirs = explode('/', dirname($path));
 			$cur_dir = '/';
 			foreach($dirs as $dir)
 			{
 				if(!empty($dir))
 				{
	 				$cur_dir .= $dir . '/';
	 				if(!@is_dir($cur_dir))
	 				{
	 					mkdir($cur_dir, 0755);
	 				}
 				}
 			}
 		}
 		else
 		{
 			mkdir(dirname($path), 0755, true);
 		}
 	}

}
 
?>
