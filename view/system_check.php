<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs JavaScript to update Stage 1 page with system requirements
 *
 **/
header("Content-Type: application/x-javascript");
?>document.getElementById('sc').innerHTML='<a href="javascript:s(1);"><?php
	echo _WEBO_SYSTEM_CHECK_SYSTEM_INFO;
?></a><div id="si"><ul><li title="<?php
	echo $css_cachedir;
?>"><?php
	echo _WEBO_SYSTEM_CHECK_CSS_DIRECTORY;
?> <?php
	if ($css_writable) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_WRITABLE;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_RESTRICTED;
?>]</em><?php
	}
?></li><li title="<?php
	echo $javascript_cachedir;
?>"><?php
	echo _WEBO_SYSTEM_CHECK_JAVASCRIPT_DIRECTORY;
?> <?php
	if ($javascript_writable) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_WRITABLE;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_RESTRICTED;
?>]</em><?php
	}
?></li><li title="<?php
	echo $html_cachedir;
?>"><?php
	echo _WEBO_SYSTEM_CHECK_HTML_DIRECTORY;
?> <?php
	if ($html_writable) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_WRITABLE;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_RESTRICTED;
?>]</em><?php
	}
?></li><li title="<?php
	echo $index;
?>"><?php
	echo _WEBO_SYSTEM_CHECK_INDEX;
?> <?php
	if ($index_writable) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_WRITABLE;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_RESTRICTED;
?>]</em><?php
	}
?></li><li title="<?php
	echo $config;
?>"><?php
	echo _WEBO_SYSTEM_CHECK_CONFIG;
?> <?php
	if ($config_writable) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_WRITABLE;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_RESTRICTED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_GZIP;
?> <?php
	if ($htaccess_possibility && ($mod_deflate || $mod_gzip)) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_VIA_HTACCESS;
?>]</strong><?php
	} elseif ($gzip_possibility) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_VIA_PHP;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_GZIP_STATIC;
?> <?php
	if ($htaccess_possibility && $mod_rewrite) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_CACHE;
?> <?php
	if ($htaccess_possibility && $mod_expires) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_VIA_HTACCESS;
?>]</strong><?php
	} else {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_VIA_PHP;
?>]</strong><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_CSS_MINIFY;
?> <strong>[<?php
	echo _WEBO_SYSTEM_CHECK_VIA_CSSTIDY;
?>]</strong></li><li><?php
	echo _WEBO_SYSTEM_CHECK_JS_MINIFY;
?> <?php
	if ($yui_possibility) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_VIA_YUI;
?>]</strong><?php
	} else {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_VIA_JSMIN;
?>]</strong><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_CSS_SPRITES;
?> <?php
	if ($gd_possibility && $gd_full_support) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_EXTERNAL;
?> <?php
	if ($curl_possibility) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_HOSTS;
?> <?php
	if ($hosts_possibility) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_CMS;
?> <?php
	if ($cms != 'CMS 42') {
?><strong>[<?php
		echo $cms;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_MEMORY;
?> <?php
	if (round($memory_limit) > 16) {
?><strong><?php
	} else {
?><em><?php
	}
	echo $memory_limit;
?><?php
	if (round($memory_limit) > 16) {
?></strong><?php
	} else {
?></em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_HTACCESS_SUPPORT;
?> <?php
	if ($htaccess_possibility) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?></em>]<?php
	}
?></li><li title="<?php
	echo $htaccess;
?>"><?php
	echo _WEBO_SYSTEM_CHECK_HTACCESS;
?> <?php
	if ($htaccess_writable) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_WRITABLE;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_RESTRICTED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_HTACCESS_REWRITE;
?> <?php
	if ($mod_rewrite) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_HTACCESS_GZIP;
?> <?php
	if ($mod_gzip) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_HTACCESS_DEFLATE;
?> <?php
	if ($mod_deflate) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_HTACCESS_EXPIRES;
?> <?php
	if ($mod_expires) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_HTACCESS_HEADERS;
?> <?php
	if ($mod_headers) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_HTACCESS_MIME;
?> <?php
	if ($mod_mime) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_HTACCESS_SETENVIF;
?> <?php
	if ($mod_setenvif) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li><li><?php
	echo _WEBO_SYSTEM_CHECK_HTACCESS_PROTECTED;
?> <?php
	if ($protected_mode) {
?><strong>[<?php
		echo _WEBO_SYSTEM_CHECK_ENABLED;
?>]</strong><?php
	} else {
?><em>[<?php
		echo _WEBO_SYSTEM_CHECK_DISABLED;
?>]</em><?php
	}
?></li></ul></div>';function s(){var a=document.getElementById('si');a.style.display=a.style.display=='block'?'none':'block'}