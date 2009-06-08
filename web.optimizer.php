<?php
// ==============================================================================================
// Licensed under the MIT (MIT-LICENSE.txt)
// ==============================================================================================
// @author     Leon Chevalier (http://www.aciddrop.com)
// @author     Nikolay Matsievsky aka sunnybear (http://webo.name)
// @version    0.3.5
// @copyright  Copyright &copy; 2008-2009 Leon Chevalier, Nikolay Matsievsky, All Rights Reserved
// ==============================================================================================

$basepath = dirname(__FILE__) . '/';

if (!class_exists('compressor')) {
	require_once($basepath . "controller/compressor.php");
}
/* Include this for path getting help */
if (!class_exists('compressor_view')) {
	require_once($basepath . "libs/php/view.php");
}
/* Include this for getting user agent */
if (!class_exists('_webo_User_agent')) {
	require_once($basepath . "libs/php/user_agent.php");
}

/* We need to know the config */
require_once($basepath . "config.webo.php");
/* define basepath */
$compress_options['basepath'] = $basepath;

/* Con. the view library */
$view = new compressor_view();

/* Con. the user agent library */
$user_agent = new _webo_User_agent();

/* create libraries array -- include them only if we are really compressing */
$libraries = array();

/* Include this for CSS Sprites generating */
$libraries['css_sprites'] = 'css.sprites.php';

if (substr(phpversion(), 0, 1) == 4) {
/* JSMin */
	$libraries['JSMin'] = 'jsmin4.php';
/* Dean Edwards Packer */
	$libraries['JavaScriptPacker'] = 'packer4.php';
/* CSS Tidy */
	$libraries['csstidy'] = 'class.csstidy.php';
/* YUI Compressor */
	$libraries['YuiCompressor'] = 'class.yuicompressor4.php';
/* if not PHP4 -- PHP5 by default */
} else {
/* JSMin */
	$libraries['JSMin'] = 'jsmin5.php';
/* Dean Edwards Packer */
	$libraries['JavaScriptPacker'] = 'packer5.php';
/* CSS Tidy */
	$libraries['csstidy'] = 'class.csstidy.php';
/* YUI Compressor */
	$libraries['YuiCompressor'] = 'class.yuicompressor.php';
}

/* Con. the compression controller */
$web_optimizer = new web_optimizer(array(
	'view' => $view,
	'options' => $compress_options,
	'user_agent' => $user_agent,
	'libraries' => $libraries)
);
?>