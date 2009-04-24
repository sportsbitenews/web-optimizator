<?php
/**
 * File from PHP Speedy, Leon Chevalier (http://www.aciddrop.com)
 *
 **/

$basepath = dirname(__FILE__) . '/';

/* We need these */
require($basepath . "controller/admin.php");
require($basepath . "libs/php/view.php");

/* include language file */
$language = preg_replace("/[-,;].*/", "", $_SERVER["HTTP_ACCEPT_LANGUAGE"]);
if (is_file($basepath . "libs/php/lang/". $language .".php")) {
	require($basepath . "libs/php/lang/" . $language . ".php");
} else {
	require($basepath . "libs/php/lang/en.php");
}

/* set encoding via header */
header("Content-Type: text/html; charset=" . _WEBO_CHARSET);

/* Set the default page */
if(empty($_GET['page'])) {
	$_GET['page'] = 'install_set_password';
}

/* Merge _GET and _POST */
$input = array_merge($_GET, $_POST);
if (!empty($input['page'])) {
	$input['page'] = htmlspecialchars($input['page']);
}

/* Con. the view library */
$view = new compressor_view();

/* Con. the admin controller */
new admin(array('view' => $view, 'input' => $input, 'basepath' => $basepath));
?>