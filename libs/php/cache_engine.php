<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Classes for storing html cache
 * License agreement: http://www.webogroup.com/about/EULA.txt
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
 	
 	function put_entry($key, $value, $time)
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
 
 	function get_cache_size($mask, $number = false)
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
 	
		/**
		 * A better "fnmatch" alternative for windows that converts a fnmatch
		 * pattern into a preg one. It should work on PHP >= 4.0.0.
		 * @author soywiz at php dot net
		 * @since 17-Jul-2006 10:12
		 */
		if (!function_exists('fnmatch')) {
		    function fnmatch($pattern, $string) {
			return @preg_match('/^' . strtr(addcslashes($pattern, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $string);
		    }
		}

		if(!empty($options['cache_dir']))
		{
			$this->enabled = true;
			$this->cache_dir = $options['cache_dir'];
		}
		else
		{
			$this->enabled = false;
		}
	}
	
 	/* Adds or updates entry. Expects key string and value to cache. */
 	
 	function put_entry($key, $value, $time)
 	{
 		if (!$this->enabled)
 		{
 			return;
 		}
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

	/* Get cache entry by key. Expects key string. */

	function get_entry($key)
	{
 		if (!$this->enabled)
 		{
 			return false;
 		}
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
 		if (!$this->enabled)
 		{
 			return false;
 		}
 		if (!empty($patterns))
 		{
 			if (is_array($patterns))
 			{
 				foreach($patterns as $pattern)
 				{
	 				$files = $this->__recurse_glob($this->__get_path($pattern));
	 				foreach($files as $file)
	 				{
	 					if (@is_file($file))
	 					{
	 						@unlink($file);
 						}
						elseif (@is_dir($file))
						{
							@rmdir($file);
						}
	 				}
 				}
 			}
 			else
 			{
 				$files = $this->__recurse_glob($this->__get_path($patterns));
 				foreach($files as $file)
 				{
 					if (@is_file($file))
 					{
 						@unlink($file);
					}
					elseif (@is_dir($file))
					{
						@rmdir($file);
					}
 				}
 			}
 		}
 	}

 	/* Gets creation time of cache entry. Expects key string. */
 	
 	function get_mtime($key)
 	{
 		if (!$this->enabled)
 		{
 			return 0;
 		}
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
 		if (!$this->enabled)
 		{
 			return false;
 		}
 		@touch($this->__get_path($key), $time);
 	}
 	
 	/* Gets path to file from cache entry key */
 	
 	function __get_path($key)
 	{
 		return preg_replace('/\\.+\\/+/','',$this->cache_dir . str_replace(array('+',"'",'^','%','"','<','>','$'), array('/','','','','','','',''), $key));
 	}
 	
 	/* Creates directory structure to store the file */
 	
 	function __make_path($path)
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
 					@mkdir($cur_dir, 0755);
 				}
			}
		}
 	}

 	/* Internal method that returns all keys that match given pattern. Expects pattern. */

	function __recurse_glob($pattern, $size = false, $number = false) {
	    $split=explode('/',str_replace('\\','/',$pattern));
	    $mask=array_pop($split);
	    $path=implode('/',$split);
	    if (($dir=@opendir($path))!==false) {
	    	if ($size === false)
	    	{
			$glob=array();
		}
        	else
        	{
        		if ($number === false)
        		{
        			$glob = $size;
        		}
        		else
        		{
        			$glob = array($size, $number);
        		}
        	}
		while(($file=@readdir($dir))!==false) {
		    if(is_dir($path.'/'.$file) && (!in_array($file,array('.','..'))) )
		    {
		    	if ($size === false)
		    	{
		        	$glob = array_merge($glob,$this->__recurse_glob($path.'/'.$file.'/'.$mask));
	        	}
	        	else
	        	{
	        		if ($number === false)
	        		{
	        			$glob = $this->__recurse_glob($path.'/'.$file.'/'.$mask, $glob);
        			}
        			else
        			{
        				$glob = $this->__recurse_glob($path.'/'.$file.'/'.$mask, $glob[0], $glob[1]);
        			}
	        	}
	       	    }
		    if (fnmatch($mask,$file)) {
		        if (!in_array($file,array('.','..')))
		        {
		    		if ($size === false)
			    	{
					$glob[] = $path . '/'. $file;
				}
				else
				{
					if ($number === false)
					{
						$glob += @filesize($path . '/'. $file);
					}
					else
					{
						$glob[0] += @filesize($path . '/'. $file);
						$glob[1]++;
					}
				}
	        	}
		    }
		}
		@closedir($dir);
		return $glob;
	    } else {
	    	if ($size === false)
	    	{
			return array();
		}
        	else
        	{
        		if ($number === false)
        		{
        			return $size;
        		}
        		else
        		{
        			return array($size, $number);
        		}
        	}
		
	    }
	}
	
	/* Gets total size and number of cache files defined by mask */
	function get_cache_size($mask, $number = false)
	{
 		if (!$this->enabled)
 		{
 			if ($number === false)
 			{
 				return 0;
			}
			else
			{
				return array(0,0);
			}
 		}
		if ($number === false)
		{
			return $this->__recurse_glob($this->__get_path($mask), 0);
		}
		else
		{
			return $this->__recurse_glob($this->__get_path($mask), 0, 0);
		}
	}

}
 
 class webo_cache_memcached {
 
 	/* Class constructor. Expects options array. */
 	
 	function webo_cache_memcached($options)
 	{
		$this->enabled = false;
		$this->cached = array();
		$this->prefix = 'webo_cache_';  //maybe memcached stores data from other applications
		if(!empty($options['server']))
		{
			$server = explode(':', $options['server']);   //get server and port
			if(!empty($server[1]))
			{
				if (@class_exists('Memcached'))
				{
					$this->connection = new Memcached();
				}
				elseif (@class_exists('Memcache'))
				{
					$this->connection = new Memcache();
				}
				if($this->connection)
				{
					if ($this->connection->addServer($server[0], $server[1]))  //add server to store files
					{
						$all_items = $this->connection->get('webo_files_list');
						/* store empty filelist if none exists */
						if (is_array($all_items))
						{
							$this->enabled = true;
						}
						elseif ($this->connection->flush())
						{
							$this->connection->set('webo_files_list', array());
						}
					}
				}
			}
		}
 	}

 	/* Adds or updates entry. Expects key string and value to cache. */
 	
 	function put_entry($key, $value, $time)
 	{
		if (!$this->enabled)
		{
			return;
		}
		$this->connection->set($this->prefix . $key, array('value' => $value, 'time' => $time));
		$entries = $this->connection->get('webo_files_list');
		if(($entries === false) || !is_array($entries))		//filelist is broken or removed from server so we need to clear cache
		{
			$this->connection->flush();		//this removes all other applications data but is only way to do it
			$entries = array();
		}
		$entries[$key] = 1;
		$this->connection->set('webo_files_list', $entries);
 	}

 	/* Get cache entry by key. Expects key string. */
 	
 	function get_entry($key)
 	{
		if (!$this->enabled)
		{
			return false;
		}
		if (!empty($this->cached[$key]['value']))
		{
			return $this->cached[$key]['value'];
		}
		$item = $this->connection->get($this->prefix . $key);
		if(empty($item['value']))
		{
			$this->cached[$key] = $item;
			return false;
		}
		else
		{
			return $item['value'];
		}
 	}
 	
 	/* Clear cache entries by pattern(s). Expects pattern or array of patterns. */
 	
 	function delete_entries($patterns)
 	{
		if (!$this->enabled)
		{
			return false;
		}
		if (!empty($patterns))
		{
			$all_files = $this->connection->get('webo_files_list');
			if(($all_files === false) || !is_array($all_files))
			{
				$this->connection->flush();
				$this->connection->set('webo_files_list', array());
				return;
			}
			if (is_array($patterns))
			{
				foreach($patterns as $pattern)
				{
					foreach($all_files as $key => $value)
					{
						if(@preg_match('/^' . strtr(addcslashes($pattern, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key))
						{
							$this->connection->delete($this->prefix . $key);
							unset($all_files[$key]);
						}
					}
				}
				$this->connection->set('webo_files_list', $all_files);
			}
			else
			{
				foreach($all_files as $key => $value)
				{
					if(@preg_match('/^' . strtr(addcslashes($patterns, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key))
					{
						$this->connection->delete($this->prefix . $key);
						unset($all_files[$key]);
					}
				}
				$this->connection->set('webo_files_list', $all_files);
			}
		}
 	}

 	/* Gets creation time of cache entry. Expects key string. */
 	
 	function get_mtime($key)
 	{
		if (!$this->enabled)
		{
			return 0;
		}
		if(!empty($this->cached[$key]['time']))
		{
			return $this->cached[$key]['time'];
		}
		$item = $this->connection->get($this->prefix . $key);
		if (empty($item['time']))
		{
			return 0;
		}
		else
		{
			$this->cached[$key] = $item;
			return $item['time'];
		}
 	}

 	/* Sets creation time of cache entry. Expects key string and time to set. */
 	
 	function set_mtime($key, $time)
 	{
		if (!$this->enabled)
		{
			return false;
		}
		$item = $this->connection->get($this->prefix . $key);
		if (empty($item['time']))
		{
			return false;
		}
		else
		{
			$item['time'] = $time;
			$this->connection->set($this->prefix . $key, $item);
		}
 	}
 
	function get_cache_size($mask, $number = false)
	{
		if (!$this->enabled)
		{
			if ($number === false)
			{
				return 0;
			}
			else
			{
				return array(0,0);
			}
		}
		$size = 0;
		$count = 0;
		$all_files = $this->connection->get('webo_files_list');
		if(($all_files === false) || !is_array($all_files))
		{
			$this->connection->flush();
			$this->connection->set('webo_files_list', array());
		}
		else
		{
			foreach($all_files as $key => $value)
			{
				if(@preg_match('/^' . strtr(addcslashes($mask, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key))
				{
					$item = $this->connection->get($this->prefix . $key);
					if ($item !== false)
					{
						$count++;
						$size += strlen(serialize($item));
					}
				}
			}
		}
		if ($number === false)
		{
			return $size;
		}
		else
		{
			return array($size, $count);
		}
	}
}

?>
