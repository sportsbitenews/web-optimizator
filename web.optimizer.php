<?
// ==============================================================================================
// Licensed under the MIT (MIT-LICENSE.txt)
// ==============================================================================================
// @author     Leon Chevalier (http://www.aciddrop.com)
// @author     Nikolay Matsievsky aka sunnybear (http://webo.name)
// @version    0.1
// @copyright  Copyright &copy; 2008-2009 Leon Chevalier, Nikolay Matsievsky, All Rights Reserved
// ==============================================================================================

require("controller/compressor.php");
require("libs/php/view.php"); //Include this for path getting help
require("libs/php/user_agent.php"); //Include this for getting user agent
require("libs/php/css.sprites.php"); //Include this for CSS Sprites generating

//We need to know the config
require("config.php");

//Con. the view library
$view = new compressor_view();

//Con. the user agent library
$user_agent = new _webo_User_agent();

//Con. the js min library
if (substr(phpversion(), 0, 1) == 5) {
	require_once('libs/php/jsmin5.php');
}

if (substr(phpversion(), 0, 1) == 4) {
	require_once('libs/php/jsmin4.php');
}

//Con. the compression controller
$compressor = new compressor(array('view'=>$view,
	'options' => $compress_options,
	'user_agent' => $user_agent)
);
?>