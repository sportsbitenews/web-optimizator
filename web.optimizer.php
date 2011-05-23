<?php
// ==============================================================================================
// Licensed under the WEBO license (LICENSE.txt)
// ==============================================================================================
// @author     WEBO Software (http://www.webogroup.com/)
// @version    1.4.1
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
	$host = empty($_SERVER['HTTP_HOST']) ? '' : strtolower($_SERVER['HTTP_HOST']);
	if (strpos($host, "www.") === 0) {
		$host = substr($host, 4);
	}
# config spot
	$wss_configs = array();

/* Calculate current folder */
	$uri = $_SERVER['REQUEST_URI'];
	$folder = '';
	if ($uri != '/') {
		$length = 0;
		while (($slash = strpos($uri, '/')) !== false) {
			$uri = substr($uri, $slash + 1);
			$length += $slash + 1;
			$f = str_replace('/', '#', substr($_SERVER['REQUEST_URI'], 0, $length - 1));
			if (in_array($host . $f, $wss_configs)) {
				$folder = $f;
			}
		}
	}
/* We need to know the config, multi-configs supported */
	if (in_array($host . $folder, $wss_configs)) {
		require($basepath . $host . $folder . ".config.webo.php");
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
		'no_cache' => empty($no_cache) ? 0 : $no_cache,
		'clear_cache_key' => empty($clear_cache_key) ? 0 : $clear_cache_key,
		'host' => $host,
		'nogzip' => empty($webo_nogzip) ? 0 : $webo_nogzip)
	);
}
?>