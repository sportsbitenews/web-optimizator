<?php
// ==============================================================================================
// Licensed under the WEBO license (LICENSE.txt)
// ==============================================================================================
// @author     WEBO Software (http://www.webogroup.com/)
// @version    1.4.0
// @copyright  Copyright &copy; 2009-2011 WEBO Software. All Rights Reserved
// ==============================================================================================

if (!function_exists('finish_webositespeedup'))
{
    function finish_webositespeedup ($content) {
        if ($content) {
            $not_buffered = 1;
            require(realpath(dirname(__FILE__)) . '/web-optimizer/web.optimizer.php');
            if (!empty($web_optimizer)) {
                $webo_content = $web_optimizer->finish($content);
            }
            if (!empty($webo_content)) {
                $content = $webo_content;
            }
            return $content;
        }
    }
}

/* to include WEBO Site SpeedUp in 1-string mode to CMS */
if (!empty($webo_not_buffered)) {
	ob_start('finish_webositespeedup');
} else {
/* defining constants */
	$basepath = realpath(dirname(__FILE__)) . '/';
	$compress_options['php'] = substr(phpversion(), 0, 1);
/* main library */
	if (!class_exists('compressor', false)) {
		require_once($basepath . "controller/compressor.php");
	}
/* Include this for path getting help */
	if (!class_exists('compressor_view', false)) {
		require_once($basepath . "libs/php/view.php");
	}
/* define website host */
	$host = empty($_SERVER['HTTP_HOST']) ? '' : $_SERVER['HTTP_HOST'];
	if (strpos($host, "www.") !== false ||
		strpos($host, "WWW.") !== false) {
			$host = substr($host, 4);
	}
/* We need to know the config, multi-configs supported */
	if (!empty($host) && @file_exists($basepath . $host . ".config.webo.php")) {
		require($basepath . $host . ".config.webo.php");
	} else {
		require($basepath . "config.webo.php");
	}

/* buffer input stream or not */
	$compress_options['buffered'] = empty($not_buffered) ? 1 : 0;
/* Con. the view library */
	$view = new compressor_view();
/* create libraries array -- include them only if we are really compressing */
	$libraries = array();
/* Include this for CSS Sprites generating */
	$libraries['css_sprites'] = 'css.sprites.php';
	$libraries['css_sprites_optimize'] = 'css.sprites.optimize.php';
/* JSMin */
	$libraries['JSMin'] = 'jsmin5.php';
/* Dean Edwards Packer */
	$libraries['JavaScriptPacker'] = 'packer5.php';
/* CSS Tidy */
	$libraries['csstidy'] = 'class.csstidy.php';
/* YUI Compressor */
	$libraries['YuiCompressor'] = 'class.yuicompressor.php';
/* Google Compiler */
	$libraries['GoogleCompiler'] = 'class.googlecompiler.php';

/* Con. the compression controller */
	$web_optimizer = new web_optimizer(array(
		'view' => $view,
		'options' => $compress_options,
		'libraries' => $libraries,
		'no_cache' => empty($no_cache) ? false : $no_cache,
		'clear_cache_key' => empty($clear_cache_key) ? false : $clear_cache_key),
		'host' => $host
	);
}
?>
