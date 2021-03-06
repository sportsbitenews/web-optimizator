<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Classes for storing html cache
 * License agreement: http://www.webogroup.com/about/EULA.txt
 *
 **/
 
 /* Abstract class that defines basic methods and contains several methods for SQL caching*/
 
 class webo_cache_engine {
 
	/* Class constructor. Expects options array. */
	function webo_cache_engine($options) {
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
	}

	/* Adds or updates entry. Expects key string and value to cache. */
	function put_entry($key, $value, $time) {
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
	}

	/* Get cache entry by key. Expects key string. */
	function get_entry($key) {
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
	}

	/* Clean cache entries by timestamp. Expects timestamp and time interval (in minutes). */
	function delete_entries_by_time ($time, $interval) {
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
	}
	
	/* Clean cache entries by pattern(s). Expects pattern or array of patterns. */
	function delete_entries($patterns) {
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
	}

	/* Gets creation time of cache entry. Expects key string. */
	function get_mtime($key) {
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
	}

	/* Sets creation time of cache entry. Expects key string and time to set. */
	function set_mtime($key, $time) {
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
	}
 
	function get_cache_size($mask, $number = false) {
		if(strtolower(__CLASS__)=='baseclass'){
			trigger_error('This class is abstract!',E_USER_ERROR);
			exit();
		}
	}
	
	/* Returns array with information about given query. */
	function get_query_info($sql) {
		$sql = ltrim($sql);
		$quote = 0;
		$slash = 0;
		$table_stage = false;
		$table_now = false;
		$word = false;
		$table = array();
		$change = false;
		$select = false;
		$alias_now = false;
		$cur_word = '';
		$words = explode(' ', $sql, 2);
		$first_word = strtolower($words[0]);
		if ($first_word == 'select') {
			$sql = $words[1];
			$select = true;
		}
		elseif ($first_word == 'delete') {
			$sql = $words[1];
			$sql = ltrim($sql);
			$words = explode(' ', $sql, 2);
			$second_word = strtolower($words[0]);
			if ($second_word == 'from') {
				$sql = $words[1];
				$change = true;
				$table_stage = true;
			} else {
				return array('select' => $select, 'table' => $table, 'change' => $change);
			}
		} elseif ($first_word == 'insert') {
			$sql = $words[1];
			$sql = ltrim($sql);
			$words = explode(' ', $sql, 2);
			$second_word = strtolower($words[0]);
			if ($second_word == 'into') {
				$sql = $words[1];
				$change = true;
				$table_stage = true;
			} else {
				return array('select' => $select, 'table' => $table, 'change' => $change);
			}
		} elseif ($first_word == 'update') {
			$sql = $words[1];
			$change = true;
			$table_stage = true;
		} else {
			return array('select' => $select, 'table' => $table, 'change' => $change);
		}
		$table_now = $change;
		for ($i = 0; $i < strlen($sql); $i++) {
			if ($table_stage == true) {
				if ($quote == 0) {
					if ($sql[$i] == '`') {
						$word = true;
						$quote = 1;
					} elseif ($sql[$i] == '\'') {
						$word = true;
						$quote = 2;
					} elseif ($sql[$i] == '"') {
						$word = true;
						$quote = 3;
					} elseif (($sql[$i] != ' ') && ($sql[$i] != ',') && ($sql[$i] != "\n") && ($word === false)) {
						$word = true;
						$cur_word = $sql[$i];
					} elseif ((($sql[$i] == ' ') || ($sql[$i] == ',') || ($sql[$i] == "\n")) && ($word === true)) {
						$cur_word = strtolower($cur_word);
						if (($cur_word == 'from') || ($cur_word == 'join')) {
							$table_now = true;
						} elseif (in_array($cur_word, array('where', 'group', 'having', 'order', 'limit', 'procedure', 'into'))) {
							$i = strlen($sql);
						} elseif ($table_now == true) {
							$cur_word = str_replace($this->sql_prefix, '', $cur_word);
							$table[$cur_word] = true;
							if ($change == true) {
								$i = strlen($sql);
							} elseif ($sql[$i] == ',') {
								$table_now = true;
							} else {
								$alias_now = true;
								$table_now = false;
							}
						} elseif (($alias_now == true) && ($cur_word != 'as')) {
							$alias_now = false;
							if ($sql[$i] == ',') {
								$table_now = true;
							}
						}
						$word = false;
						$cur_word = '';
					} elseif ($word == true) {
						$cur_word .= $sql[$i];
					}
				} elseif ((($quote == 1) && ($sql[$i] == '`')) || (($quote == 2) && ($sql[$i] == '\'')) || (($quote == 3) && ($sql[$i] == '"'))) {
					if ($slash == 0) {
						$quote = 0;
					} else {
						$cur_word .= $sql[$i];
						$slash = 0;
					}
				} elseif ($sql[$i] == '\\') {
					$slash = 1 - $slash;
				} else {
					$cur_word .= $sql[$i];
				}
			} else {
				if ($quote == 0) {
					if ($sql[$i] == '`') {
						$quote = 1;
					} elseif ($sql[$i] == '\'') {
						$quote = 2;
					} elseif ($sql[$i] == '"') {
						$quote = 3;
					} elseif (($sql[$i] != ' ') && ($sql[$i] != ',') && ($sql[$i] != "\n") && ($word === false)) {
						$word = true;
						$cur_word = $sql[$i];
					} elseif ((($sql[$i] == ' ') || ($sql[$i] == ',') || ($sql[$i] == "\n")) && ($word === true)) {
						if (strtolower($cur_word) == 'from') {
							$table_stage = true;
							$table_now = true;
						}
						$word = false;
						$cur_word = '';
					} elseif ($word == true) {
						$cur_word .= $sql[$i];
					}
				} elseif ((($quote == 1) && ($sql[$i] == '`')) || (($quote == 2) && ($sql[$i] == '\'')) || (($quote == 3) && ($sql[$i] == '"'))) {
					if ($slash == 0) {
						$quote = 0;
					} else {
						$slash = 1;
					}
				} elseif ($sql[$i] == '\\') {
					$slash = 1 - $slash;
				}
			}
		}
		return array('select' => $select, 'table' => $table, 'change' => $change);
	}
	
	function start_sql_cache ($compress_options, $prefix = '') {
		$queries = $this->get_entry('cached_queries.sql');
		if ($queries) {
			$this->sql_cached_queries = unserialize($queries);
		} else {
			$this->sql_cached_queries = array();
		}
		$info = $this->get_entry('info.sql');
		if ($info) {
			$info = unserialize($info);
			$this->sql_tables = $info['tables'];
			$this->sql_table_queries = $info['table_queries'];
			$this->sql_last_ids = $info['last_ids'];
		} else {
			$this->sql_tables = array();
			$this->sql_table_queries = array();
			$this->sql_last_ids = array('table' => 0, 'query' => 0);
		}
		$this->sql_cache_time = $compress_options['sql_cache']['time'];
		$this->sql_exclude_tables = explode(' ', $compress_options['sql_cache']['tables_exclude']);
		$this->sql_cache_timeout = $compress_options['sql_cache']['timeout'];
		$this->sql_cache_enabled = true;
		$this->current_time = time();
		$this->sql_cached_result = false;
		$this->sql_cached_rows = 0;
		$this->sql_cache_changed = false;
		$this->sql_prefix = $prefix;
		$this->clear_expired_sql();
	}
	
	function save_sql_cache() {
		if (!empty($this->sql_cache_enabled) && ($this->sql_cache_changed)) {
			$this->put_entry('info.sql', serialize(array('tables' => $this->sql_tables, 'table_queries' => $this->sql_table_queries, 'last_ids' => $this->sql_last_ids)), $this->current_time);
			$this->put_entry('cached_queries.sql', serialize($this->sql_cached_queries), $this->current_time);
		}
	}
	
	function get_query_options($sql) {
		$change = false;
		$cache_me = false;
		$cache_hit = false;
		$start = 0;
		$tables = array();
		$key = $sql;
		if ($this->sql_cache_timeout >= 3600) {
			$key = preg_replace('/(\d\d\d\d-\d\d-\d\d \d\d:)\d\d:\d\d/', '${1}00:00', $key);
		} elseif ($this->sql_cache_timeout >= 600) {
			$key = preg_replace('/(\d\d\d\d-\d\d-\d\d \d\d:\d)\d:\d\d/', '${1}0:00', $key);
		} elseif ($this->sql_cache_timeout >= 60) {
			$key = preg_replace('/(\d\d\d\d-\d\d-\d\d \d\d:\d\d:)\d\d/', '${1}00', $key);
		} elseif ($this->sql_cache_timeout >= 10) {
			$key = preg_replace('/(\d\d\d\d-\d\d-\d\d \d\d:\d\d:\d)\d/', '${1}0', $key);
		}
		if (!empty($this->sql_cache_enabled)) {
			$query_info = $this->get_query_info($sql);
			$tables = $query_info['table'];
			foreach ($tables as $table => $value) {
				if (in_array($table, $this->sql_exclude_tables)) {
					$query_info['select'] = false;
					$query_info['change'] = false;
				}
			}
			$change = $query_info['change'];
		}
		if (!empty($this->sql_cache_enabled) && ($query_info['select'])) {
			if (!empty($this->sql_cached_queries[$key])) {
				$query = $this->sql_cached_queries[$key];
				if (($this->current_time - $query['time'] < $this->sql_cache_timeout)) {
					$this->sql_cached_result = $query['result'];
					$this->sql_cached_rows = $query['num_rows'];
					$cache_hit = true;
				}
			}
			$start = explode(' ', microtime());
			$start = $start[1] + $start[0];
			$cache_me = true;
		}
		return(array($cache_me, $change, $cache_hit, $tables, $start, $key));
	}
	
	function add_to_sql_cache($mysql_result, $start, $query_tables, $sql) {
		if (!is_resource($mysql_result) || (stripos(get_resource_type($mysql_result), 'mysql') === false)) {
			return false;
		}
		$end = explode(' ', microtime());
		$end = $end[1] + $end[0];
		if (((($end - $start) * 1000) > $this->sql_cache_time)) {
			$this->sql_cache_changed = true;
			$query_id = $this->sql_last_ids['query'];
			$this->sql_last_ids['query']++;
			foreach ($this->sql_tables as $table => $id) {
				if (!empty($query_tables[$table])) {
					unset($query_tables[$table]);
					$this->sql_table_queries[$id][$query_id] = true;
				}
			}
			foreach ($query_tables as $table => $value) {
				$id = $this->sql_last_ids['table'];
				$this->sql_tables[$table] = $id;
				$this->sql_table_queries[$id][$query_id] = true;
				$this->sql_last_ids['table']++;
			}
			$this->sql_cached_queries[$sql] = array('time' => $this->current_time, 'id' => $query_id);
			$result_array = array();
			$num_rows = 0;
			while ($row = mysql_fetch_assoc($mysql_result)) {
				$num_rows++;
				$result_array[] = $row;
			}
			$this->sql_cached_result = $result_array;
			$this->sql_cached_rows = $num_rows;
			$this->sql_cached_queries[$sql]['result'] = $result_array;
			$this->sql_cached_queries[$sql]['num_rows'] = $num_rows;
			return true;
		} else {
			return false;
		}
	}

	function clear_expired_sql() {
		if (empty($this->sql_cached_queries) || !is_array($this->sql_cached_queries)) {
			return;
		}
		foreach ($this->sql_cached_queries as $query => $info) {
			if ($this->current_time - $info['time'] > $this->sql_cache_timeout) {
				$this->sql_cache_changed = true;
				unset($this->sql_cached_queries[$query]);
				foreach ($this->sql_table_queries as $id => $queries) {
					unset($this->sql_table_queries[$id][$info['id']]);
				}
			}
		}
	}

	function update_sql_cache($tables) {
		foreach ($tables as $table => $value) {
			break;
		}
		if (isset($this->sql_tables[$table])) {
			$this->sql_cache_changed = true;
			$table_id = $this->sql_tables[$table];
			$drop_queries = $this->sql_table_queries[$table_id];
			$this->sql_table_queries[$table_id] = array();
			foreach ($this->sql_table_queries as $table_id => $queries) {
				if (count($this->sql_table_queries[$table_id]) != 0) {
					foreach ($drop_queries as $query_id => $value) {
						if (!empty($queries[$query_id])) {
							unset($this->sql_table_queries[$table_id][$query_id]);
						}
					}
				}
			}
			$max_id = 0;
			foreach ($this->sql_cached_queries as $query => $info) {
				foreach ($drop_queries as $query_id => $value) {
					if ($info['id'] == $query_id) {
						unset($this->sql_cached_queries[$query]);
					} elseif ($info['id'] > $max_id) {
						$max_id = $info['id'];
					}
				}
			}
			$this->sql_last_ids['query'] = $max_id + 1;
		}
	}
	
	
	function clear_sql_cache() {
		if (!$this->enabled) {
			$this->enabled = true;
			$result = $this->delete_entries(array('cached_queries.sql', 'info.sql'));
			$this->enabled = false;
		} else {
			$result = $this->delete_entries(array('cached_queries.sql', 'info.sql'));
		}
		return $result;
	}
}

/* Here starts the section with different implementations of cache_engine abstract class. Every class name should start with 'cache_' and use some specific name for particular engine. For example, cache_files (stores cache items on filesystem) or cache_memcached (uses memcached to store cache items).

/* Default implementation that stores cache entries on filesystem */

class webo_cache_files extends webo_cache_engine
{
	/* Class constructor. Expects cache directory as option and checks if it's writable. */

	function webo_cache_files($options) {
	
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
		$this->_host = strtolower(empty($options['host']) ? '' : preg_replace('/\\.+\\/+/','', str_replace(array('+',"'",'^','%','"','<','>','$'), array('/','','','','','','',''), $options['host'])));
		$this->_host_wo_www = preg_replace("!^www\.!i", "", $this->_host);
		$this->_host_w_www = 'www.' . $this->_host_wo_www;

		if(!empty($options['cache_dir'])) {
			$this->enabled = true;
			$this->cache_dir = $options['cache_dir'];
		} else {
			$this->enabled = false;
		}
		$this->all_files = false;
/* large files list can cause 500 error */
		if (round(str_replace("M", "000000", str_replace("K", "000", @ini_get('memory_limit')))) < 128000000) {
			@ini_set('memory_limit', '128M');
		}
	}
	
	/* Read wo.files.php to all_files array */

	function __get_files_list() {
		global $webo_files_list_var, $webo_files_list_ok;
		$webo_files_list_var = $this->cache_dir . 'wo.files.php';
		if ($this->all_files === false) {
			try {
				@include($webo_files_list_var);
			} catch (Exception $e) {}
			if (isset($webo_cache_files_list) && is_array($webo_cache_files_list)) {
				$this->all_files = $webo_cache_files_list;
			} else {
				$this->all_files = array();
			}
			if (!defined('WSS_CACHE_FILE')) {
				$this->__put_files_list();
			}
		}
	}
	
	/* Write all files' array to wo.files.php */

	function __put_files_list() {
		global $webo_files_list_var, $webo_files_list_ok;
		$str = "<?php\nif(!defined('WSS_CACHE_FILE')){define('WSS_CACHE_FILE','1');}\n";
		foreach ($this->all_files as $k => $v) {
			if (!is_array($v)) {
				$v = array($v, time());
			}
			$str .= '$webo_cache_files_list[\'' . addcslashes($k, "\0'\\") . '\'] = array(' . $v[0] . ',' . $v[1] . ");\n";
		}
		$str .= '?>';
		$length = strlen($str);
		$i = 0;
		$written = 0;
		$tmp = '.tmp.' . (time()+microtime());
		@file_put_contents($webo_files_list_var . $tmp, "<?php\nif(!defined('WSS_CACHE_FILE')){define('WSS_CACHE_FILE','1');}\n?>");
		while (($i < 3) && ($written != $length)) {
			$written = @file_put_contents($webo_files_list_var . $tmp, $str);
			$i++;
		}
/* skip mutex issues with reading / writing to cache */
		if (@is_file($webo_files_list_var . $tmp) && $written == $length && strlen($str) > @filesize($webo_files_list_var)) {
			if (@is_file($webo_files_list_var)) {
/* need for APS.NET environments, why? */
				@unlink($webo_files_list_var);
			}
			@rename($webo_files_list_var . $tmp, $webo_files_list_var);
		}
		@unlink($webo_files_list_var . $tmp);
	}

	/* Adds or updates entry. Expects key string and value to cache. */
	
	function put_entry($key, $value, $time) {
		if (!$this->enabled) {
			return;
		}
		$path = $this->__get_path($key);
		if (!@is_dir(dirname($path))) {
			$this->__make_path($path);
		}
		$path .= @is_dir($path) ? '/index.html' : '';
		@file_put_contents($path . '.tmp', $value);
		if (!@is_dir($path)) {
			@rename($path . '.tmp', $path);
			@touch($path);
			if (@is_writable($path)) {
				@chmod($path, octdec("0644"));
			}
			$this->__get_files_list();
			$this->all_files[$path] = array(strlen($value), $time);
			$this->__put_files_list();
		}
	}

	/* Get cache entry by key. Expects key string. */

	function get_entry($key) {
		if (!$this->enabled) {
			return false;
		}
		$content = @is_file($this->__get_path($key)) ? @file_get_contents($this->__get_path($key)) : '';
		if (get_magic_quotes_runtime()) {
			$content = stripslashes($content);
		}
		return $content;
	}

	/* Clean cache entries by pattern(s). Expects pattern or array of patterns. */
	
	function delete_entries($patterns) {
		if (!$this->enabled) {
			return false;
		}
		$this->__get_files_list();
		if (!empty($patterns)) {
			if (is_array($patterns)) {
				foreach($patterns as $pattern) {
					$files = $this->__recurse_glob($this->__get_path($pattern));
					foreach($files as $file) {
						if (@is_file($file)) {
							@unlink($file);
							unset($this->all_files[$file]);
						} elseif (@is_dir($file)) {
							$this->__recurse_rm($file);
						}
					}
				}
			} else {
			    if ($patterns == '*') {
/* try to call shell_exec */
					if (strpos(@ini_get('disable_functions') . ' ' . @ini_get('suhosin.executor.func.blacklist'), 'shell_exec') === false && !@ini_get('safe_mode')) {
						try {
							@shell_exec('rm -rf ' . $this->cache_dir . $this->_host_w_www);
							@shell_exec('rm -rf ' . $this->cache_dir . $this->_host_wo_www);
						} catch (Expression $e) {}
					}
			  	$this->__recurse_rm($this->cache_dir . $this->_host_w_www);
					$this->__recurse_rm($this->cache_dir . $this->_host_wo_www);
			    } else {
   				$files = $this->__recurse_glob($this->__get_path($patterns));
   				foreach($files as $file) {
   					if (@is_file($file)) {
							@unlink($file);
							unset($this->all_files[$file]);
					    } elseif (@is_dir($file)) {
						    $this->__recurse_rm($file);
						}
					}
				}
			}
			$this->__put_files_list();
		}
	}
	
	/* Clean cache entries by timestamp. Expects timestamp and time interval (in minutes). */
	
	function delete_entries_by_time ($time, $interval) {
		if (!$this->enabled) {
			return false;
		}
		$this->__get_files_list();
		if (!empty($time)) {
			$changed = 0;
			foreach($this->all_files as $path => $entry) {
				if (!is_array($entry)) {
					$entry = array($entry, @filemtime($path));
				}
				if ($entry[1] + $interval < $time) {
					if (@is_file($path)) {
						@unlink($path);
					}
					unset($this->all_files[$path]);
					$changed = 1;
				}
			}
			if ($changed) {
				$this->__put_files_list();
			}
		}
	}

	/* Gets creation time of cache entry. Expects key string. */
	
	function get_mtime($key) {
		if (!$this->enabled) {
			return 0;
		}
		$this->__get_files_list();
		$path = $this->__get_path($key);
		if (!empty($this->all_files[$path])) {
			$entry = $this->all_files[$path];
			if (!is_array($entry)) {
				$entry = array($entry, @filemtime($path));
			}
			return $entry[1];
		} else {
			return 0;
		}
	}

	/* Sets creation time of cache entry. Expects key string and time to set. */
	
	function set_mtime($key, $time) {
		if (!$this->enabled) {
			return false;
		}
		$this->__get_files_list();
		$path = $this->__get_path($key);
		$this->all_files[$path][1] = $time;
		$this->__put_files_list();
		@touch($path, $time);
	}
	
	/* Gets path to file from cache entry key */
	
	function __get_path($key, $host = '') {
		$cur_host = strtolower($_SERVER['HTTP_HOST']);
		$set_host = strtolower($host);
		if (empty($host)) {
			$key = $cur_host . '/' . $key;
		} elseif ($cur_host == $set_host) {
			return ''; //thx to peterbowey
		} else {
			$key = $set_host . '/' . $key;
		}
		$key = preg_replace("!/+!", "/", preg_replace('/\\.+\\/+/','',$this->cache_dir . str_replace(array('+',"'",'^','%','"','<','>','$'), array('/','','','','','','',''), $key)));
		while (@is_dir($key)) {
			@chmod($key, octdec("0755"));
			$key .= '/index.html';
		}
		return $key;
	}
	
	/* Creates directory structure to store the file */
	
	function __make_path($path) {
		$dirs = explode('/', dirname($path));
		$cur_dir = $path{0} == '/' ? '/' : '';
		$basedirs = explode(":", @ini_get('open_basedir'));
		$allow_basedirs = !count($basedirs) || empty($basedirs[0]);
		if (!$allow_basedirs) {
			foreach ($basedirs as $basedir) {
				if (strpos($path, realpath($basedir)) === 0) {
					$cur_dir = dirname($basedir) . '/';
					$dirs = explode('/', str_replace($cur_dir, '', $path));
					$allow_basedirs = 1;
					continue;
				}
			}
		}
		$cur_dir = $path{0} == '/' ? '/' : '';
		if ($allow_basedirs) {
			foreach ($dirs as $dir) {
				if (!empty($dir)) {
					$cur_dir .= $dir . '/';
					if (!@is_dir($cur_dir)) {
						@mkdir($cur_dir, octdec("0755"));
					}
				}
			}
		}
	}

	/* Internal method that returns all keys that match given pattern. Expects pattern. */

	function __recurse_glob($pattern, $size = false, $number = false) {
		if ($pattern == '') {
			return array();
		}
	    $split = explode('/', str_replace('\\', '/', $pattern));
	    $mask = array_pop($split);
	    $path = implode('/', $split);
		$this->__get_files_list();
		
		$path = str_replace('.', '\\.', $path);
		$path = str_replace('*', '.*', $path);
		if ($size === false) {
			$glob = array();
		} else {
			if ($number === false) {
				$glob = 0;
			} else {
				$glob = array(0, 0);
			}
		}

		foreach ($this->all_files as $key => $value) {
			if (preg_match('!' . $path . '!', $key)) {
				if ($size === false) {
					$glob[] = $key;
				} else {
					if ($number === false) {
						$glob += $value;
					} else {
						$glob[0] += $value;
						$glob[1]++;
					}
				}
			}
		}
		return $glob;
	}
	
	function __recurse_rm($path) {
		if (@is_dir($path)) {
			if (substr($path, strlen($path) - 1) != '/') {
				$path .= '/';
			}
			$dh = @opendir($path);
			while (($file = @readdir($dh)) !== false) {
				if (($file == '.') || ($file == '..')) {
					//do nothing
				} elseif (is_dir($path . $file)) {
					$this->__recurse_rm($path . $file);
				}
				else {
					if (isset($this->all_files[$path . $file])) {
						unset($this->all_files[$path . $file]);
					}
					@unlink($path . $file);
				}
			}
			@closedir($dh);
			@rmdir($path);
		} else {
			@unlink($path);
		}
	}
	
	/* Gets total size and number of cache files defined by mask */
	function get_cache_size($mask, $number = false) {
		$this->__get_files_list();
		if (!$this->enabled) {
			if ($number === false) {
				return 0;
			} else {
				return array(0,0);
			}
		}
		$mask = str_replace('.', '\\.', $mask);
		$mask = str_replace('*', '.*', $mask);
		$size = 0;
		$num = 0;
		foreach ($this->all_files as $key => $value) {
			if (preg_match('/' . $mask . '/', $key)) {
				if (!is_array($value)) {
					$value = array($value);
				}
				$size += $value[0];
				$num++;
			}
		}
		if ($number === false) {
			return $size;
		} else {
			return array($size, $num);
		}
	}

}
 
 class webo_cache_memcached extends webo_cache_engine {
 
	/* Class constructor. Expects options array. */
	
	function webo_cache_memcached($options) {
		$this->enabled = false;
		$this->cached = array();
		$this->prefix = 'webo_cache_';  //maybe memcached stores data from other applications
		if(!empty($options['server'])) {
			$server = explode(':', $options['server']);   //get server and port
			if(!empty($server[1])) {
				if (@class_exists('Memcached')) {
					$this->connection = new Memcached();
				} elseif (@class_exists('Memcache')) {
					$this->connection = new Memcache();
				}
				if($this->connection) {
					if ($this->connection->addServer($server[0], $server[1])) { //add server to store files
						$this->enabled = true;
					}
				}
			}
		}
	}

	/* Adds or updates entry. Expects key string and value to cache. */
	
	function put_entry($key, $value, $time) {
		if (!$this->enabled) {
			return;
		}
		$entries = $this->connection->get('webo_files_list');
		if(($entries === false) || !is_array($entries)) {		//filelist is broken or removed from server so we need to clear cache
			$this->connection->flush();		//this removes all other applications data but is only way to do it
			$entries = array();
		}
		$this->connection->set($this->prefix . $key, array('value' => $value, 'time' => $time));
		$entries[$key] = 1;
		$this->connection->set('webo_files_list', $entries);
	}

	/* Get cache entry by key. Expects key string. */
	
	function get_entry($key) {
		if (!$this->enabled) {
			return false;
		}
		if (!empty($this->cached[$key]['value'])) {
			return $this->cached[$key]['value'];
		}
		$item = $this->connection->get($this->prefix . $key);
		if(empty($item['value'])) {
			return false;
		} else {
			$this->cached[$key] = $item;
			return $item['value'];
		}
	}

	/* Clean cache entries by timestamp. Expects timestamp and time interval (in minutes). */
	
	function delete_entries_by_time ($time, $interval) {
		if (!$this->enabled) {
			return false;
		}
		if (!empty($time)) {
			$all_files = $this->connection->get('webo_files_list');
			if(($all_files === false) || !is_array($all_files)) {
				$this->connection->flush();
				$this->connection->set('webo_files_list', array());
				return;
			}
			$changed = 0;
			foreach($all_files as $key => $value) {
				$t = $this->get_mtime($key);
				if ($t + $interval < $time) {
					$this->connection->delete($this->prefix . $key);
					unset($all_files[$key]);
					$changed = 1;
				}
			}
			if ($changed) {
				$this->connection->set('webo_files_list', $all_files);
			}
		}
	}
	
	/* Clean cache entries by pattern(s). Expects pattern or array of patterns. */
	
	function delete_entries($patterns) {
		if (!$this->enabled) {
			return false;
		}
		if (!empty($patterns)) {
			$all_files = $this->connection->get('webo_files_list');
			if (($all_files === false) || !is_array($all_files)) {
				$this->connection->flush();
				$this->connection->set('webo_files_list', array());
				return;
			}
			if (is_array($patterns)) {
				foreach($patterns as $pattern) {
					foreach($all_files as $key => $value) {
						if(@preg_match('/^' . strtr(addcslashes($pattern, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key)) {
							$this->connection->delete($this->prefix . $key);
							unset($all_files[$key]);
						}
					}
				}
				$this->connection->set('webo_files_list', $all_files);
			} else {
				foreach($all_files as $key => $value) {
					if(@preg_match('/^' . strtr(addcslashes($patterns, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key)) {
						$this->connection->delete($this->prefix . $key);
						unset($all_files[$key]);
					}
				}
				$this->connection->set('webo_files_list', $all_files);
			}
		}
	}

	/* Gets creation time of cache entry. Expects key string. */
	
	function get_mtime($key) {
		if (!$this->enabled) {
			return 0;
		}
		if (!empty($this->cached[$key]['time'])) {
			return $this->cached[$key]['time'];
		}
		$item = $this->connection->get($this->prefix . $key);
		if (empty($item['time'])) {
			return 0;
		} else {
			$this->cached[$key] = $item;
			return $item['time'];
		}
	}

	/* Sets creation time of cache entry. Expects key string and time to set. */
	
	function set_mtime($key, $time) {
		if (!$this->enabled) {
			return false;
		}
		$item = $this->connection->get($this->prefix . $key);
		if (empty($item['time'])) {
			return false;
		} else {
			$item['time'] = $time;
			$this->connection->set($this->prefix . $key, $item);
		}
	}
 
	function get_cache_size($mask, $number = false) {
		if (!$this->enabled) {
			if ($number === false) {
				return 0;
			} else {
				return array(0,0);
			}
		}
		$size = 0;
		$count = 0;
		$all_files = $this->connection->get('webo_files_list');
		if(($all_files === false) || !is_array($all_files)) {
			$this->connection->flush();
			$this->connection->set('webo_files_list', array());
		} else {
			foreach($all_files as $key => $value) {
				if(@preg_match('/^' . strtr(addcslashes($mask, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key)) {
					$item = $this->connection->get($this->prefix . $key);
					if ($item !== false) {
						$count++;
						$size += strlen(serialize($item));
					}
				}
			}
		}
		if ($number === false) {
			return $size;
		} else {
			return array($size, $count);
		}
	}
}

 class webo_cache_apc extends webo_cache_engine {
 
	/* Class constructor. Expects options array. */
	
	function webo_cache_apc($options) {
		if(function_exists('apc_add')) {
			ini_set('apc.slam_defense','Off');
			$this->enabled = true;
		} else {
			$this->enabled = false;
		}
		$this->cached = array();
		$this->prefix = 'webo_cache_';
	}

	/* Adds or updates entry. Expects key string and value to cache. */
	
	function put_entry($key, $value, $time) {
		if (!$this->enabled) {
			return;
		}
		$entries = apc_fetch('webo_files_list');
		if(($entries === false) || !is_array($entries))	{	//filelist is broken or removed from server so we need to clear cache
			apc_clear_cache('user');
			$entries = array();
		}
		apc_store($this->prefix . $key, array('value' => $value, 'time' => $time));
		$entries[$key] = 1;
		apc_store('webo_files_list', $entries);
	}

	/* Get cache entry by key. Expects key string. */
	
	function get_entry($key) {
		if (!$this->enabled) {
			return false;
		}
		if (!empty($this->cached[$key]['value'])) {
			return $this->cached[$key]['value'];
		}
		$item = apc_fetch($this->prefix . $key);
		if(empty($item['value'])) {
			return false;
		} else {
			$this->cached[$key] = $item;
			return $item['value'];
		}
	}

	/* Clean cache entries by timestamp. Expects timestamp and time interval (in minutes). */
	
	function delete_entries_by_time ($time, $interval) {
		if (!$this->enabled) {
			return false;
		}
		if (!empty($time)) {
			$all_files = apc_fetch('webo_files_list');
			if(($all_files === false) || !is_array($all_files)) {
				apc_clear_cache('user');
				apc_store('webo_files_list', array());
				return;
			}
			$changed = 0;
			foreach($all_files as $key => $value) {
				$t = $this->get_mtime($key);
				if ($t + $interval < $time) {
					apc_delete($this->prefix . $key);
					unset($all_files[$key]);
					$changed = 1;
				}
			}
			if ($changed) {
				apc_store('webo_files_list', $all_files);
			}
		}
	}
	
	/* Clean cache entries by pattern(s). Expects pattern or array of patterns. */
	
	function delete_entries($patterns) {
		if (!$this->enabled) {
			return false;
		}
		if (!empty($patterns)) {
			$all_files = apc_fetch('webo_files_list');
			if(($all_files === false) || !is_array($all_files)) {
				apc_clear_cache('user');
				apc_store('webo_files_list', array());
				return;
			}
			if (is_array($patterns)) {
				foreach($patterns as $pattern) {
					foreach($all_files as $key => $value) {
						if(@preg_match('/^' . strtr(addcslashes($pattern, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key)) {
							apc_delete($this->prefix . $key);
							unset($all_files[$key]);
						}
					}
				}
				apc_store('webo_files_list', $all_files);
			} else {
				foreach($all_files as $key => $value) {
					if(@preg_match('/^' . strtr(addcslashes($patterns, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key))
					{
						apc_delete($this->prefix . $key);
						unset($all_files[$key]);
					}
				}
				apc_store('webo_files_list', $all_files);
			}
		}
	}

	/* Gets creation time of cache entry. Expects key string. */
	
	function get_mtime($key) {
		if (!$this->enabled) {
			return 0;
		}
		if(!empty($this->cached[$key]['time'])) {
			return $this->cached[$key]['time'];
		}
		$item = apc_fetch($this->prefix . $key);
		if (empty($item['time'])) {
			return 0;
		} else {
			$this->cached[$key] = $item;
			return $item['time'];
		}
	}

	/* Sets creation time of cache entry. Expects key string and time to set. */
	
	function set_mtime($key, $time) {
		if (!$this->enabled) {
			return false;
		}
		$item = apc_fetch($this->prefix . $key);
		if (empty($item['time'])) {
			return false;
		} else {
			$item['time'] = $time;
			apc_store($key, $item);
		}
	}
 
	function get_cache_size($mask, $number = false) {
		if (!$this->enabled) {
			if ($number === false) {
				return 0;
			} else {
				return array(0,0);
			}
		}
		$size = 0;
		$count = 0;
		$all_files = apc_fetch('webo_files_list');
		if(($all_files === false) || !is_array($all_files)) {
			apc_clear_cache();
			apc_store('webo_files_list', array());
		} else {
			foreach($all_files as $key => $value) {
				if (@preg_match('/^' . strtr(addcslashes($mask, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key)) {
					$item = apc_fetch($this->prefix . $key);
					if ($item !== false) {
						$count++;
						$size += strlen(serialize($item));
					}
				}
			}
		}
		if ($number === false) {
			return $size;
		} else {
			return array($size, $count);
		}
	}
}

 class webo_cache_xcache extends webo_cache_engine {
 
	/* Class constructor. Expects options array. */
	
	function webo_cache_xcache($options) {
		if (function_exists('xcache_set')) {
			$this->enabled = true;
		} else {
			$this->enabled = false;
		}
		$this->cached = array();
		$this->prefix = 'webo_cache_';
	}

	/* Adds or updates entry. Expects key string and value to cache. */
	
	function put_entry($key, $value, $time) {
		if (!$this->enabled) {
			return;
		}
		$entries = @xcache_get('webo_files_list');
		if(($entries === NULL) || !is_array($entries)) {	//filelist is broken or removed from server so we need to clear cache
			@xcache_unset('user');
			$entries = array();
		}
		@xcache_set($this->prefix . $key, array('value' => $value, 'time' => $time));
		$entries[$key] = 1;
		@xcache_set('webo_files_list', $entries);
	}

	/* Get cache entry by key. Expects key string. */
	
	function get_entry($key) {
		if (!$this->enabled) {
			return false;
		}
		if (!empty($this->cached[$key]['value'])) {
			return $this->cached[$key]['value'];
		}
		$item = @xcache_get($this->prefix . $key);
		if(empty($item['value'])) {
			return false;
		} else {
			$this->cached[$key] = $item;
			return $item['value'];
		}
	}
	
	/* Clean cache entries by timestamp. Expects timestamp and time interval (in minutes). */
	
	function delete_entries_by_time ($time, $interval) {
		if (!$this->enabled) {
			return false;
		}
		if (!empty($time)) {
			$all_files = @xcache_get('webo_files_list');
			if (($all_files === NULL) || !is_array($all_files)) {
				@xcache_unset('user');
				@xcache_set('webo_files_list', array());
				return;
			}
			$changed = 0;
			foreach($all_files as $key => $value) {
				$t = $this->get_mtime($key);
				if ($t + $interval < $time) {
					@xcache_unset($this->prefix . $key);
					unset($all_files[$key]);
					$changed = 1;
				}
			}
			if ($changed) {
				@xcache_set('webo_files_list', $all_files);
			}
		}
	}
	
	/* Clean cache entries by pattern(s). Expects pattern or array of patterns. */
	
	function delete_entries($patterns) {
		if (!$this->enabled) {
			return false;
		}
		if (!empty($patterns)) {
			$all_files = @xcache_get('webo_files_list');
			if(($all_files === NULL) || !is_array($all_files)) {
				@xcache_unset('user');
				@xcache_set('webo_files_list', array());
				return;
			}
			if (is_array($patterns)) {
				foreach($patterns as $pattern) {
					foreach($all_files as $key => $value) {
						if (@preg_match('/^' . strtr(addcslashes($pattern, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key)) {
							@xcache_unset($this->prefix . $key);
							unset($all_files[$key]);
						}
					}
				}
				@xcache_set('webo_files_list', $all_files);
			} else {
				foreach($all_files as $key => $value) {
					if (@preg_match('/^' . strtr(addcslashes($patterns, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key)) {
						@xcache_unset($this->prefix . $key);
						unset($all_files[$key]);
					}
				}
				@xcache_set('webo_files_list', $all_files);
			}
		}
	}

	/* Gets creation time of cache entry. Expects key string. */
	
	function get_mtime ($key) {
		if (!$this->enabled) {
			return 0;
		}
		if(!empty($this->cached[$key]['time'])) {
			return $this->cached[$key]['time'];
		}
		$item = @xcache_get($this->prefix . $key);
		if (empty($item['time'])) {
			return 0;
		} else {
			$this->cached[$key] = $item;
			return $item['time'];
		}
	}

	/* Sets creation time of cache entry. Expects key string and time to set. */
	
	function set_mtime($key, $time) {
		if (!$this->enabled) {
			return false;
		}
		$item = @xcache_get($this->prefix . $key);
		if (empty($item['time'])) {
			return false;
		} else {
			$item['time'] = $time;
			@xcache_set($key, $item);
		}
	}
 
	function get_cache_size($mask, $number = false) {
		if (!$this->enabled) {
			if ($number === false) {
				return 0;
			} else {
				return array(0,0);
			}
		}
		$size = 0;
		$count = 0;
		$all_files = @xcache_get('webo_files_list');
		if (($all_files === NULL) || !is_array($all_files)) {
			@xcache_set('webo_files_list', array());
		} else {
			foreach($all_files as $key => $value) {
				if(@preg_match('/^' . strtr(addcslashes($mask, '\\.+^$(){}=!<>|'), array('*' => '.*', '?' => '.?')) . '$/i', $key)) {
					$item = @xcache_get($this->prefix . $key);
					if ($item !== NULL) {
						$count++;
						$size += strlen(serialize($item));
					}
				}
			}
		}
		if ($number === false) {
			return $size;
		} else {
			return array($size, $count);
		}
	}
}

?>