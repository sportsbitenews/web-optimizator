<?
// ======================================================================================
// This application is free software; you can redistribute it and/or
// modify it under the terms of the GNU Lesser General Public
// License as published by the Free Software Foundation; either
// version 2.1 of the License, or (at your option) any later version.
// 
// This class is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
// Lesser General Public License for more details.
// ======================================================================================
// @author     Leon Chevalier (http://www.aciddrop.com)
// @version    0.5
// @copyright  Copyright &copy; 2008 Leon Chevalier, All Rights Reserved
// ======================================================================================


require("controller/compressor.php");
require("libs/php/view.php"); //Include this for path getting help
require("libs/php/user_agent.php"); //Include this for getting user agent

//We need to know the config
require("config.php");

//Con. the view library
$view = new compressor_view();

//Con. the user agent library
$user_agent = new _speedy_User_agent();

//Con. the js min library
if (substr(phpversion(), 0, 1) == 5) {
	require_once('libs/php/jsmin5.php');
	$jsmin = new JSMin(null);
}

if (substr(phpversion(), 0, 1) == 4) {
	require_once('libs/php/jsmin4.php');
	$jsmin = new JSMin(null);
}

//Con. the compression controller
$compressor = new compressor(array('view'=>$view,
	'options' => $compress_options,
	'jsmin' => $jsmin,
	'user_agent' => $user_agent)
);
?>