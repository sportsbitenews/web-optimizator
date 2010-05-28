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
?></ul><?php
	$saas = '';
	$daily = 0;
	foreach ($options as $key => $group) {
		if (is_array($group)) {
			foreach ($group as $option => $value) {
				if (!empty($value['price'])) {
					$price = is_array($value['price']) ? $value['price'][$value['value']] : $value['price'];
					$daily += empty($value['value']) ? 0 : $price;
					$saas .= '<tr class="wssT8"' .
						(empty($value['value']) ? ' style="display:none"' : '') .
						' id="wss_' .
						$option .
						'_saas"><td class="wssT9">' .
						constant('_WEBO_' . $option) .
						'<a class="wssJ9" href="#" title="' .
						constant('_WEBO_' . $option . '_HELP') .
						'">?</a><a href="#wss_options#' .
						$key .
						'" class="wssD12">' .
						constant('_WEBO_' . $key).
						'</a></td><td class="wssT10"><span class="wssO15">' .
						$price .
						'</span></td></tr>';
				}
			}
		}
	}
?>