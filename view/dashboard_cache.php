<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs block about cache size (for dashboard)
 *
 **/
 
/* set correct content charset */
header('Content-Type: text/html;charset=' . _WEBO_CHARSET);

?><table class="wssT"><col width="70%"/><col width="30%"/><tfoot><tr class="wssT4"><th class="wssT2"><?php
	echo _WEBO_DASHBOARD_CACHE_SIZE;
?></th><td class="wssT3"><?php
	echo preg_replace("@([0-9])([0-9][0-9][0-9])$@", "$1 $2", $total) . ' ' . _WEBO_LOGIN_EFFICIENCY_KB;
?></td></tr></tfoot><tbody class="wssT15"><?php
	if ($css) {
?><tr><th class="wssT2"><?php
		echo _WEBO_DASHBOARD_CACHE_CSS;
?></th><td class="wssT3"><?php
		echo preg_replace("@([0-9])([0-9][0-9][0-9])$@", "$1 $2", $css) . ' ' . _WEBO_LOGIN_EFFICIENCY_KB;
?></td></tr><?php
	}
	if ($res) {
?><tr><th class="wssT2"><?php
		echo _WEBO_DASHBOARD_CACHE_RESOURCES;
?></th><td class="wssT3"><?php
		echo preg_replace("@([0-9])([0-9][0-9][0-9])$@", "$1 $2", $res) . ' ' . _WEBO_LOGIN_EFFICIENCY_KB;
?></td></tr><?php
	}
	if ($sprites) {
?><tr><th class="wssT2"><?php
		echo _WEBO_DASHBOARD_CACHE_SPRITES;
?></th><td class="wssT3"><?php
		echo preg_replace("@([0-9])([0-9][0-9][0-9])$@", "$1 $2", $sprites) . ' ' . _WEBO_LOGIN_EFFICIENCY_KB;
?></td></tr><?php
	}
	if ($js) {
?><tr><th class="wssT2"><?php
		echo _WEBO_DASHBOARD_CACHE_JS;
?></th><td class="wssT3"><?php
		echo preg_replace("@([0-9])([0-9][0-9][0-9])$@", "$1 $2", $js) . ' ' . _WEBO_LOGIN_EFFICIENCY_KB;
?></td></tr><?php
	}
	if ($html) {
?><tr><th class="wssT2"><?php
		echo _WEBO_DASHBOARD_CACHE_HTML;
?></th><td class="wssT3"><?php
		echo preg_replace("@([0-9])([0-9][0-9][0-9])$@", "$1 $2", $html) . ' ' . _WEBO_LOGIN_EFFICIENCY_KB;
?></td></tr><?php
	}
	if ($imgs) {
?><tr><th class="wssT2"><?php
		echo _WEBO_DASHBOARD_CACHE_IMAGES;
?></th><td class="wssT3"><?php
		echo preg_replace("@([0-9])([0-9][0-9][0-9])$@", "$1 $2", $imgs) . ' ' . _WEBO_LOGIN_EFFICIENCY_KB;
?></td></tr><?php
	}
?></tbody></table><p class="wssI"><a href="#wss_refresh" class="wssJ wssJ5"><?php
	echo _WEBO_DASHBOARD_CACHE_REFRESH;
?><span class="wssJ6"></span></a></p>