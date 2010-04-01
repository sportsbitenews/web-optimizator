<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs promo page (version comparison)
 *
 **/
?><noscript><?php
	echo _WEBO_NEW_NOSCRIPT;
?></noscript><ul class="wssM"><li class="wssM1"><a href="#wss_dashboard" class="wssM3" title="<?php
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
?></span></a></li><?php
	if ($premium > 1 && 0) {
?><li class="wssM1"><a href="#wss_speed" class="wssM3" title="<?php
	echo _WEBO_DASHBOARD_RESULTS;
?>"><span class="wssM5"></span><span class="wssM4 wssM15"><?php
	echo _WEBO_DASHBOARD_SPEED;
?></span></a></li><?php
	}
?></ul><h1 class="wssA wssA7"><?php
	echo _WEBO_SPLASH2_COMPARISON;
?></h1><table class="wssT wssT0"><col width="220"/><col width="180"/><col width="180"/><col width="180"/><thead class="wssT5"><tr class="wssT6"><th> </th><th class="wssT7"><?php
	echo _WEBO_SPLASH2_COMPARISON_DEMO;
?><span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_FREE;
?></span></th><th class="wssT7"><?php
	echo _WEBO_SPLASH2_COMPARISON_LITE;
?><span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_LITEPRICE;
?></span><?php
	echo _WEBO_GENERAL_BUYNOWLITE;
?></th><th class="wssT7"><?php
	echo _WEBO_SPLASH2_COMPARISON_FULL;
?><span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_FULLPRICE;
?></span><?php
	echo _WEBO_GENERAL_BUYNOW;
?></th></tr></thead><tfoot><tr><th class="wssT7"> </th><th class="wssT7"> </th><td class="wssT7"><?php
	echo _WEBO_GENERAL_BUYNOWLITE;
?></td><td class="wssT7"><?php
	echo _WEBO_GENERAL_BUYNOW;
?></td></tr></tfoot><tbody><tr class="wssT8 wssT12"><th class="wssT9 wssT11"><?php
	echo _WEBO_SPLASH2_COMPARISON_CPU;
?></th><td class="wssT9">20-100 <?php
	echo _WEBO_SPLASH2_COMPARISON_CPU_MS;
?></td><td class="wssT9">10-50 <?php
	echo _WEBO_SPLASH2_COMPARISON_CPU_MS;
?></td><td class="wssT9">1-5 <?php
	echo _WEBO_SPLASH2_COMPARISON_CPU_MS;
?></td></tr><tr class="wssT8"><th class="wssT9 wssT11"><?php
	echo _WEBO_SPLASH2_COMPARISON_SPEEDUP;
?></th><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 100%</td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 200%</td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 500% <?php
	echo _WEBO_SPLASH2_COMPARISON_ANDMORE;
?></td></tr><tr class="wssT8 wssT12"><th class="wssT9 wssT11"><?php
	echo _WEBO_gzip;
?></th><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 65% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_TRAFFIC;
?></span></td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 65% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_TRAFFIC;
?></span></td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 88% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_TRAFFIC;
?></span></td></tr><tr class="wssT8"><th class="wssT9 wssT11"><?php
	echo _WEBO_clientside;
?></th><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 40% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_TRAFFIC;
?></span></td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 60% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_TRAFFIC;
?></span></td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 85% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_TRAFFIC;
?></span></td></tr><tr class="wssT8 wssT12"><th class="wssT9 wssT11"><?php
	echo _WEBO_serverside;
?></th><td class="wssT9 wssT14">-</td><td class="wssT9 wssT14">-</td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 90% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_LOAD;
?></span></td></tr><tr class="wssT8"><th class="wssT9 wssT11"><?php
	echo _WEBO_css_sprites;
?></th><td class="wssT9 wssT14">-</td><td class="wssT9 wssT14">-</td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 25% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_REQUESTS;
?></span></td></tr><tr class="wssT8 wssT12"><th class="wssT9 wssT11"><?php
	echo _WEBO_data_uri;
?></th><td class="wssT9 wssT14">-</td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 60% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_REQUESTS;
?></span></td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 60% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_REQUESTS;
?></span></td></tr><tr class="wssT8"><th class="wssT9 wssT11"><?php
	echo _WEBO_multiple_hosts;
?></th><td class="wssT9 wssT14">-</td><td class="wssT9 wssT14">-</td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO2;
?> 50% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_ACCELERATION;
?></span></td></tr><tr class="wssT8 wssT12"><th class="wssT9 wssT11"><?php
	echo _WEBO_unobtrusive;
?></th><td class="wssT9 wssT14">-</td><td class="wssT9 wssT14">-</td><td class="wssT9"><?php
	echo _WEBO_SPLASH2_COMPARISON_UPTO2;
?> 20% <span class="wssI"><?php
	echo _WEBO_SPLASH2_COMPARISON_ACCELERATION;
?></span></td></tr></tbody></table>