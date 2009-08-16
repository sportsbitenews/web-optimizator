<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Provides a Web Optimizer plugin for Joomla 1.5.xxx
 * Adds some exlusions for System-Cache plugin, improves caching for
 * VirtueMart images, enables System-Cache and disables Debug
 *
 **/
class web_optimizer_plugin_joomla15 {

/* Constructor */
	function web_optimizer_plugin_joomla15() {
	
	}

/* Installer */
	function onInstall ($root) {
/* Add some exclusions to System-Cache plugin */
		$cache_file = $root . '/plugins/system/cache.php';
		$content = @file_get_contents($cache_file);
		if (!empty($content)) {
			$fp = @fopen($cache_file, 'wb');
			if ($fp) {
				@fwrite($cache_file, str_replace('!$user->get(\'aid\') && $_SERVER[\'REQUEST_METHOD\'] == \'GET\'', '!$user->get(\'aid\') && $_SERVER[\'REQUEST_METHOD\'] == \'GET\' && !in_array($_GET[\'page\'], array(\'shop.cart\', \'checkout.index\')) && $_GET[\'option\'] != \'com_contact\'', $content));
				@fclose($cache_file);
			}
		}
/* Add additional Cache headers for VirtueMart images */
		$virtuemart_file = $root . '/components/com_virtuemart/show_image_in_imgtag.php';
		$content = @file_get_contents($virtuemart_file);
		if (!empty($content)) {
			$fp = @fopen($virtuemart_file, 'wb');
			if ($fp) {
				$content = str_replace('$age = 3600;', '$age = 2592000;$etag = md5($fileout);', $content);
				$content = str_replace('header( \'Cache-Control: max-age=\'.$age.\', must-revalidate\' );', 'header( \'Cache-Control: max-age=\'.$age);' .
					'header(\'ETag: \'. $etag);' . 
					'if ($_SERVER[\'HTTP_IF_NONE_MATCH\'] == $etag) {' .
					'header( \'HTTP/1.0 304 Not Modified\' );' .
					'header( \'Content-Length: 0\' );' .
					'exit();}');
				@fwrite($virtuemart_file, $content);
				@fclose($virtuemart_file);
			}
		}
/* Disable caching in configuration */
		$config_file = $root . '/configuration.php';
		$content = @file_get_contents($config_file);
		if (!empty($content)) {
			$fp = @fopen($content, 'wb');
			if ($fp) {
				@fwrite($fp, str_replace('$caching = \'1\'', '$caching = \'0\'', $content));
				@fclose($fp);
			}
		}
/* Enable System-Cache plugin and disable Debug plugin */
		if (!class_exists('JConfig')) {
			include($root . '/configuration.php');
		}
		$config = new JConfig();
		$query1 = "UPDATE " . $config->dbprefix . "plugins SET published=1 WHERE element='cache'";
		$query2 = "UPDATE " . $config->dbprefix . "plugins SET published=0 WHERE element='debug'";
		switch ($config->dbtype) {
			case 'mysql':
				$link = mysql_connect($config->host, $config->user, $config->password);
				if ($link) {
					mysql_select_db($config->db, $link);
					mysql_query($query1, $link);
					mysql_query($query2, $link);
					mysql_close($link);
				}
				break;
			case 'mysqli':
				$link = mysqli_connect($config->host, $config->user, $config->password, $config->db);
				if ($link) {
					mysqli_query($link, $query1);
					mysqli_query($link, $query2);
					mysqli_close($link);
				}
				break;
		}
	}

/* UnInstaller */
	function onUninstall ($root) {
/* Return System-Cache plugin initial state */
		$cache_file = $root . '/plugins/system/cache.php';
		$content = @file_get_contents($cache_file);
		if (!empty($content)) {
			$fp = @fopen($cache_file, 'wb');
			if ($fp) {
				@fwrite($cache_file, str_replace('!$user->get(\'aid\') && $_SERVER[\'REQUEST_METHOD\'] == \'GET\' && !in_array($_GET[\'page\'], array(\'shop.cart\', \'checkout.index\')) && $_GET[\'option\'] != \'com_contact\'', '!$user->get(\'aid\') && $_SERVER[\'REQUEST_METHOD\'] == \'GET\'', $content));
				@fclose($cache_file);
			}
		}
/* Remove additional Cache headers for VirtueMart images */
		$virtuemart_file = $root . '/components/com_virtuemart/show_image_in_imgtag.php';
		$content = @file_get_contents($virtuemart_file);
		if (!empty($content)) {
			$fp = @fopen($virtuemart_file, 'wb');
			if ($fp) {
				$content = str_replace('$age = 2592000;$etag = md5($fileout);', '$age = 3600;', $content);
				$content = str_replace('header( \'Cache-Control: max-age=\'.$age);' .
					'header(\'ETag: \'. $etag);' . 
					'if ($_SERVER[\'HTTP_IF_NONE_MATCH\'] == $etag) {' .
					'header( \'HTTP/1.0 304 Not Modified\' );' .
					'header( \'Content-Length: 0\' );' .
					'exit();}', 'header( \'Cache-Control: max-age=\'.$age.\', must-revalidate\' );');
				@fwrite($virtuemart_file, $content);
				@fclose($virtuemart_file);
			}
		}
	}

/* preOptimizer */
	function beforeOptimization ($content) {
		return $content;
	}

/* postOptimizer */
	function afterOptimization ($content) {
		return $content;
	}

}

$web_optimizer_plugin = new web_optimizer_plugin_joomla15();
?>