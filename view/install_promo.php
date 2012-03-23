<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs promo page (version comparison)
 *
 **/
?><noscript><?php
	echo _WEBO_NEW_NOSCRIPT;
?></noscript><?php
	if (!$ready) {
?><ul class="wssM"><li class="wssM1"><a href="#wss_dashboard" class="wssM3" title="<?php
	echo _WEBO_SPLASH2_CONTROLPANEL_TITLE;
?>"><span class="wssM5"></span><span class="wssM4 wssM10"><?php
	echo _WEBO_SPLASH2_CONTROLPANEL;
?></span></a></li><li class="wssM1"><a href="#wss_options" class="wssM3" title="<?php
	echo _WEBO_SPLASH2_OPTIONS_TITLE;
?>"><span class="wssM5"></span><span class="wssM4 wssM11"><?php
	echo _WEBO_SPLASH2_OPTIONS;
?></span></a></li><li class="wssM1"><a href="#wss_system" class="wssM3" title="<?php
	echo _WEBO_DASHBOARD_SYSTEM_TITLE;
?>"><span class="wssM5"></span><span class="wssM4 wssM12"><?php
	echo _WEBO_DASHBOARD_SYSTEM;
?></span></a></li><li class="wssM1"><a href="#wss_account" class="wssM3" title="<?php
	echo _WEBO_DASHBOARD_ACCOUNT_TITLE
?>"><span class="wssM5"></span><span class="wssM4 wssM14"><?php
	echo _WEBO_DASHBOARD_ACCOUNT;
?></span></a></li><li class="wssM1"><a class="wssM3" href="#wss_awards" title="<?php
	echo _WEBO_DASHBOARD_AWARDS;
?>"><span class="wssM5"></span7><span class="wssM4 wssM16"><?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?></span></a></li></ul><?php
	}
?><h1 class="wssA wssA7"><?php
	echo _WEBO_SPLASH2_COMPARISON;
?></h1><table class="wssT wssT0"><col width="220"/><col width="180"/><col width="180"/><col width="180"/><thead class="wssT5"><tr class="wssT6"><th> </th><th class="wssT7"><?php
	echo _WEBO_SPLASH2_COMPARISON_DEMO . ' ' . _WEBO_SPLASH2_COMPARISON_VERSION;
?><span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_FREE;
?></span></th><th class="wssT7"><?php
	echo _WEBO_SPLASH2_COMPARISON_ZERO . ' ' . _WEBO_SPLASH2_COMPARISON_VERSION;
?><span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_ZEROPRICE;
?></span><?php
	echo _WEBO_GENERAL_BUYNOWZERO;
?></th><th class="wssT7"><?php
	echo _WEBO_SPLASH2_COMPARISON_LITE . ' ' . _WEBO_SPLASH2_COMPARISON_VERSION;
?><span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_LITEPRICE;
?></span><?php
	echo _WEBO_GENERAL_BUYNOWLITE;
?></th></tr></thead><tfoot><tr><th class="wssT7"> </th><th class="wssT7"> </th><td class="wssT7"><?php
	echo _WEBO_GENERAL_BUYNOWZERO;
?></th><td class="wssT7"><?php
	echo _WEBO_GENERAL_BUYNOWLITE;
?></td></tr></tfoot><tbody><tr class="wssT8 wssT12"><th class="wssT9 wssT11"><?php
	echo _WEBO_SPLASH2_COMPARISON_SPEEDUP;
?></th><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 200%</td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 200%</td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 300%</td></tr><tr class="wssT8"><th class="wssT9 wssT11"><?php
	echo _WEBO_SPLASH2_COMPARISON_CPU;
?></th><td class="wssT9 wssT14">-</td><td class="wssT9 wssT14">-</td><td class="wssT9 wssT13">+</td></tr><tr class="wssT8"><th class="wssT9 wssT11"><?php
	echo _WEBO_SPLASH2_COMPARISON_BASIC;
?></th><td class="wssT9 wssT13">+</td><td class="wssT9 wssT13">+</td><td class="wssT9 wssT13">+</td></tr><tr class="wssT8"><th class="wssT9 wssT11"><?php
	echo _WEBO_SPLASH2_COMPARISON_ADVANCED;
?></th><td class="wssT9 wssT14">-</td><td class="wssT9 wssT14">-</td><td class="wssT9 wssT13">+</td></tr><tr class="wssT8"><th class="wssT9 wssT11"><?php
	echo _WEBO_SPLASH2_COMPARISON_HTTPS;
?></th><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_PARTLY;
?></td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_PARTLY;
?></td></td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_PARTLY;
?></td></tr><tr class="wssT8"><th class="wssT9 wssT11"><?php
	echo _WEBO_SPLASH2_COMPARISON_SUPPORT;
?></th><td class="wssT9 wssT14">-</td><td class="wssT9 wssT13">+</td><td class="wssT9 wssT13">+</td></tr><tr class="wssT8"><th class="wssT9 wssT11"><?php
	echo _WEBO_SPLASH2_COMPARISON_LICENSING;
?></th><td class="wssT9 wssT14">-</td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UNLIMITED;
?></td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UNLIMITED;
?></td></tr><tr class="wssT8 wssT12"><th class="wssT9 wssT11"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPDATE;
?></th><td class="wssT9 wssT13">+</td><td class="wssT9 wssT13">+</td><td class="wssT9 wssT13">+</td></tr><tr class="wssT8 wssT12"><th class="wssT9 wssT11"><?php
	echo _WEBO_SPLASH2_COMPARISON_LIVE;
?></th><td class="wssT9 wssT14">-</td><td class="wssT9 wssT13">+</td><td class="wssT9 wssT13">+</td></tr><tr class="wssT8"><th class="wssT9 wssT11">HTML Sprites</th><td class="wssT9 wssT14">-</td><td class="wssT9 wssT14">-</td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 25% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_REQUESTS;
?></span></td></tr></tbody></table><p class="wssI"><a href="http://www.webogroup.com/home/site-speedup/complete-comparison/" class="wssJ"><?php
	echo _WEBO_SPLASH2_COMPARISON_MORE . ' ' . _WEBO_SPLASH2_COMPARISON_FULL . ' ' . _WEBO_SPLASH2_COMPARISON_VERSION;
?></a></p>