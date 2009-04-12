<?php
// ==============================================================================================
// Licensed under the MIT (MIT-LICENSE.txt)
// ==============================================================================================
// @author     Leon Chevalier (http://www.aciddrop.com)
// @author     Nikolay Matsievsky aka sunnybear (http://webo.name)
// @version    0.3.5
// @copyright  Copyright &copy; 2008-2009 Leon Chevalier, Nikolay Matsievsky, All Rights Reserved
// ==============================================================================================

if (!class_exists('compressor')) {
	require_once("controller/compressor.php");
}
/* Include this for path getting help */
if (!class_exists('compressor_view')) {
	require_once("libs/php/view.php");
}
/* Include this for getting user agent */
if (!class_exists('_webo_User_agent')) {
	require_once("libs/php/user_agent.php");
}
/* Include this for CSS Sprites generating */
if (!class_exists('css_sprites')) {
	require_once("libs/php/css.sprites.php");
}

/* We need to know the config */
require_once("config.webo.php");

/* Con. the view library */
$view = new compressor_view();

/* Con. the user agent library */
$user_agent = new _webo_User_agent();

/* Con. the js min library */
if (substr(phpversion(), 0, 1) == 5) {
	if (!class_exists('JSMin')) {
		require_once('libs/php/jsmin5.php');
	}
	if (!class_exists('JavaScriptPacker')) {
		require_once('libs/php/packer5.php');
	}
}

if (substr(phpversion(), 0, 1) == 4) {
	if (!class_exists('JSMin')) {
		require_once('libs/php/jsmin4.php');
	}
	if (!class_exists('JavaScriptPacker')) {
		require_once('libs/php/packer4.php');
	}
}

/* Con. the compression controller */
$web_optimizer = new web_optimizer(array('view'=>$view,
	'options' => $compress_options,
	'user_agent' => $user_agent)
);
?>