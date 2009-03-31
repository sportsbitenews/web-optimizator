<?php
// ==============================================================================================
// Licensed under the MIT (MIT-LICENSE.txt)
// ==============================================================================================
// @author     Leon Chevalier (http://www.aciddrop.com)
// @author     Nikolay Matsievsky aka sunnybear (http://webo.name)
// @version    0.2.5
// @copyright  Copyright &copy; 2008-2009 Leon Chevalier, Nikolay Matsievsky, All Rights Reserved
// ==============================================================================================

require_once("controller/compressor.php");
/* Include this for path getting help */
require_once("libs/php/view.php");
/* Include this for getting user agent */
require_once("libs/php/user_agent.php");
/* Include this for CSS Sprites generating */
require_once("libs/php/css.sprites.php");

/* We need to know the config */
require_once("config.php");

/* Con. the view library */
$view = new compressor_view();

/* Con. the user agent library */
$user_agent = new _webo_User_agent();

/* Con. the js min library */
if (substr(phpversion(), 0, 1) == 5) {
	require_once('libs/php/jsmin5.php');
	require_once('libs/php/packer5.php');
}

if (substr(phpversion(), 0, 1) == 4) {
	require_once('libs/php/jsmin4.php');
	require_once('libs/php/packer4.php');
}

/* Con. the compression controller */
$web_optimizer = new compressor(array('view'=>$view,
	'options' => $compress_options,
	'user_agent' => $user_agent)
);
?>