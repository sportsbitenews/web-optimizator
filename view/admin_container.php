<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><title><?php
	echo _WEBO_GENERAL_TITLE;
?> | <?php
	echo $title
?></title><meta http-equiv="content-type" content="text/html; charset=<?php
	echo _WEBO_CHARSET;
?>"/><link href="libs/css/main.css" rel="stylesheet" type="text/css"/></head><body><div class="b"><a href="http://code.google.com/p/web-optimizator/" class="a"></a><h1><?php
	echo _WEBO_GENERAL_TITLE;
?></h1><h4>Web Optimizer <span><?php
	echo $version;
?>/<b id="z"><?php
	echo $version_new;
?></b></span></h4><?php
	require($page.".php");
?></div><blockquote><p>&copy; 2009<?php
	echo date("Y")>2009 ? '-' . date("Y") : '';
?> <a href="http://code.google.com/p/web-optimizator/">Web Optimizer</a>. <?php
	echo _WEBO_GENERAL_FOOTER;
?></p></blockquote><script type="text/javascript" src="libs/js/yass.loadbar.js"></script></body></html>