<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs page with current balance / paid options
 *
 **/
?><noscript><?php
	echo _WEBO_NEW_NOSCRIPT;
?></noscript><ul class="wssM"><li class="wssM1"><a class="wssM3" href="#wss_dashboard" title="<?php
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
?>"><span class="wssM5"></span><span class="wssM4 wssM16"><?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?></span></a></li><?php
	if ($premium > 1 && 0) {
?><li class="wssM1"><a href="#wss_speed" class="wssM3" title="<?php
	echo _WEBO_DASHBOARD_RESULTS;
?>"><span class="wssM5"></span><span class="wssM4 wssM15"><?php
	echo _WEBO_DASHBOARD_SPEED;
?></span></a></li><?php
	}
?></ul><h1 class="wssA wssA8"><?php
	echo _WEBO_SAAS_TITLE;
?></h1><div class="wssH wssH17"><div class="wssRB"><span class="wssRB1"><span class="wssRB2">&bull;</span></span><span class="wssRB3"><span class="wssRB4">&bull;</span></span></div><div class="wssH1"><ul class="wssH10"><li class="wssH11"><?php
	echo _WEBO_SAAS_CURRENT;
?><br/><span class="wssO15"></span></li><li class="wssH12"><?php
	if ($premium) {
		echo _WEBO_SAAS_VALID;
?><div class="wssH13"><?php
		echo _WEBO_SAAS_FOR;
?> <span id="wss_balance_days">0</span> <span id="wss_balance_days1"><?php
		echo _WEBO_SAAS_DAY;
?></span><span id="wss_balance_days2"><?php
		echo _WEBO_SAAS_DAYS;
?></span><span id="wss_balance_days3"><?php
		echo _WEBO_SAAS_DAYS2;
?></span></div><div class="wssH14"><?php
		echo _WEBO_SAAS_TILL;
?> <span id="wss_balance_days4"><?php
		echo date("Y-m-d");
?></span></div><?php
	} else {
		echo _WEBO_SAAS_EXPIRED;
	}
?></li><li class="wssH15"><?php
	echo _WEBO_SAAS_CODE;
?><form class="wssH16" method="get"><p class="wssI"><input id="wss_balance_add" name="wss_balance_add" size="10" class="wssE"/><a class="wssJ7" href="javascript:_.n()"><span class="wssH18"><?php
	echo _WEBO_SAAS_ADD;
?></span><span class="wssJ6"></span></a></p></form></li></ul></div><div class="wssRB"><span class="wssRB5"><span class="wssRB6">&bull;</span></span><span class="wssRB7"><span class="wssRB8">&bull;</span></span></div></div><h3 class="wssB3 wssB4"><?php
	echo _WEBO_SAAS_DAILY;
	$saas = '';
	$daily = 0;
	foreach ($options as $key => $group) {
		if (is_array($group)) {
			foreach ($group as $option => $value) {
				if (!empty($value['price']) && !empty($value['value'])) {
					$price = is_array($value['price']) ? $value['price'][$value['value']] : $value['price'];
					$daily += empty($value['value']) ? 0 : $price;
					$saas .= '<tr class="wssT8"><td class="wssT9">' .
						constant('_WEBO_' . $option) .
						'<a class="wssJ9" href="#" title="' .
						constant('_WEBO_' . $option . '_HELP') .
						'">?</a><a href="#wss_options#' .
						$key .
						'" class="wssD12">' .
						constant('_WEBO_' . $key) .
						'</a></td><td class="wssT10"><span class="wssO15">' .
						$price .
						'</span></td><td class="wssT9">' .
						constant('_WEBO_' . $option . '_EFFECT') .
						'</td></tr>';
				}
			}
		}
	}
?></h3><?php
	if ($saas) {
?><table class="wssT wssT20"><col width="50%"/><col width="15%"/><col width="35%"/><thead class="wssT5"><tr class="wssT6"><th class="wssT7"><?php
		echo _WEBO_SPLASH2_OPTIONS;
?></th><th class="wssT7"><?php
		echo _WEBO_saas;
?></th><th class="wssT7"><?php
		echo _WEBO_SAAS_EFFECT;
?></th></tr></thead><tfoot><tr class="wssT21"><th class="wssT7"><?php
		echo _WEBO_SYSTEM_TOTAL;
?></th><th class="wssT7 wssT10" colspan="2"><span class="wssO15"><?php
		echo $daily;
?></span></th></tr></tfoot><tbody><?php
		echo $saas;
?></tbody></table><?php
	} else {
?><p class="wssI"><?php
		echo _WEBO_SAAS_NODAILY;
?></p><?php
	}
?>