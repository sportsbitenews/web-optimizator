<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 *
 **/

$basepath = dirname(__FILE__) . '/';

/* We need these */
require($basepath . "controller/admin.php");
require($basepath . "libs/php/view.php");

/* include language file */
$language = strtolower(preg_replace("/[-,;].*/", "", empty($_SERVER["HTTP_ACCEPT_LANGUAGE"]) ? '' : $_SERVER["HTTP_ACCEPT_LANGUAGE"]));
if (!empty($_COOKIE['wss_lang'])) {
	$language = strtolower($_COOKIE['wss_lang']);
}
$language = preg_replace("/[^a-z]/", "", $language);
if (is_file($basepath . "libs/php/lang/" . $language . ".php")) {
	require($basepath . "libs/php/lang/" . $language . ".php");
} else {
	require($basepath . "libs/php/lang/en.php");
}

/* set encoding via header */
header("Content-Type: text/html;charset=\"" . _WEBO_CHARSET . "\"");

/* Merge _GET and _POST */
$input = array_merge($_GET, $_POST);
if (!empty($input['wss_page'])) {
	$input['wss_page'] = htmlspecialchars($input['wss_page']);
/* set default page */
} else {
	$input['wss_page'] = 'install_set_password';
}

/* Con. the view library */
$view = new compressor_view();

/* Con. the admin controller */
new admin(array(
	'view' => $view,
	'input' => $input,
	'basepath' => $basepath,
	'language' => $language)
);
?>