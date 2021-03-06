<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs page with options (configuration)
 *
 **/
 
if ($submit) {
	if (count($error)) {
?><div class="wssK"><div class="wssK1"><h2 class="wssB"><?php
	echo _WEBO_ERROR_TITLE;
?></h2><ul class="wssL"><li class="wssL1<?php
		if (empty($error[0])) {
?> wssA0<?php
		}
?>"><?php
		echo _WEBO_SPLASH3_CANTWRITE4 .
			' config.' .
			$config .
			'.php . ' .
			_WEBO_SPLASH3_HTACCESS_CHMOD;
?></li><li class="wssL1<?php
		if (empty($error[10])) {
?> wssA0<?php
		}
?>"><?php
		echo _WEBO_SPLASH3_HTACCESS_CHMOD3 .
			' ' .
			_WEBO_SPLASH3_HTACCESS_CHMOD4;
?></li><li class="wssL1<?php
		if (empty($error[5])) {
?> wssA0<?php
		}
?>"><?php
		echo _WEBO_SPLASH3_CANTWRITE4 .
			htmlspecialchars($config) .
			_WEBO_SPLASH3_HTACCESS_CHMOD;
?></li><li class="wssL1<?php
		if (empty($error[11])) {
?> wssA0<?php
		}
?>"><?php
		echo _WEBO_CDN_NOACCESS0;
?></li></ul></div></div><?php
	} else {
?><div class="wssS"><div class="wssS1"><h2 class="wssB"><?php
		echo _WEBO_LOGIN_SUCCESS;
?></h2></div></div><?php
	}
} else {
?><noscript><?php
	echo _WEBO_NEW_NOSCRIPT;
?></noscript><ul class="wssM"><li class="wssM1"><a class="wssM3" href="#wss_dashboard" title="<?php
	echo _WEBO_SPLASH2_CONTROLPANEL_TITLE;
?>"><span class="wssM5"></span><span class="wssM4 wssM10"><?php
	echo _WEBO_SPLASH2_CONTROLPANEL;
?></span></a></li><li class="wssM1"><a href="#wss_options" class="wssM2" title="<?php
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
?></ul><div class="wssX"></div><div class="wssU"><dl class="wssU1"><dt class="wssU2"><?php
	echo _WEBO_OPTIONS_CONFIGURATION;
?>:</dt><dd class="wssU3"><?php
	echo $options['title'];
?></dd><dt class="wssU2"><?php
	echo _WEBO_OPTIONS_DESCRIPTION;
?>:</dt><dd class="wssU4"><?php
	echo $options['description'];
?></dd></dl><dl class="wssU1"><dt class="wssU2"><?php
	echo _WEBO_OPTIONS_ALLCONFIGS;
?>:<?php
	if ($premium == 10) {
?><span class="wssU21"><?php
		echo _WEBO_saas;
?> <span class="wssO15">14</span> <?php
		echo _WEBO_saas2;
?></span><?php
	}
?></dt><dd class="wssU5"><div class="wssH"><div class="wssRB"><span class="wssRB1"><span class="wssRB2">&bull;</span></span><span class="wssRB3"><span class="wssRB4">&bull;</span></span></div><div class="wssH1"><ul class="wssU10"><li class="wssU11<?php
	if ($config == 'safe') {
?> wssU12 wssU17<?php
	}
?>"><a class="wssJ" href="javascript:yass.f('safe');void(0)" rel="safe"><?php
	echo _WEBO_OPTIONS_SAFE;
?></a></li><li class="wssU11<?php
	if ($config == 'optimal') {
?> wssU12 wssU17<?php
	}
?>"><a class="wssJ" href="javascript:yass.f('optimal');void(0)" rel="optimal"><?php
	echo _WEBO_OPTIONS_OPTIMAL;
?></a></li><?php
	if (count($configs)) {
		foreach ($configs as $c) {
?><li class="wssU11 wssU16<?php
			if ($config == $c) {
?> wssU12 wssU17 wssU19<?php
			}
?>"><a class="wssJ" href="javascript:yass.f('<?php
			echo $c;
?>');void(0)" rel="<?php
			echo $c;
?>"><span class="wssU15" onclick="yass.d('<?php
			echo $c;
?>');return false" title="<?php
			echo _WEBO_OPTIONS_DELETECONFIG;
?>"></span><span>&nbsp;</span></a></li><?php
		}
	}
	$i = count($configs);
	$new = 'user' . ($i ? $i : '');
	$oncemore = 1;
	while ($oncemore) {
		$oncemore = 0;
		foreach ($configs as $c) {
			if ($c == $new) {
				$new = 'user' . (++$i);
				$oncemore = 1;
			}
		}
	}
?><li class="wssU11 wssU20"><a class="wssJ" href="javascript:yass.e('<?php
	echo $new;
?>');void(0)" rel="<?php
	echo $new;
?>"><?php
	echo _WEBO_OPTIONS_CREATENEW;
?></a></li></ul></div><div class="wssRB"><span class="wssRB5"><span class="wssRB6">&bull;</span></span><span class="wssRB7"><span class="wssRB8">&bull;</span></span></div></div></dd></dl><p class="wssI wssU18"><a href="javascript:yass.c();void(0)" class="wssJ7"><?php
	echo _WEBO_OPTIONS_APPLY;
?><span class="wssJ6"></span></a><a href="javascript:yass.e();void(0)" class="wssJ5"><?php
	echo _WEBO_OPTIONS_EDIT;
?><span class="wssJ6"></span></a></p><h3 class="wssB"><?php
	echo _WEBO_OPTIONS_ATTENTION;
?></h3><p class="wssI"><?php
	echo _WEBO_OPTIONS_ATTENTION2;
?></p></div><div class="wssA0 wssU0"><form method="post" enctype="multipart/form-data" action="#wss_options" class="wssC6"<?php
	if (!$premium) {
?> style="height:551px"<?php
	}
?>><dl class="wssU1"><dt class="wssU2"><label for="wss_title"><?php
	echo _WEBO_OPTIONS_CONFIGURATION;
?>:</label></dt><dd class="wssU3"><input name="wss_title" id="wss_title" class="wssF" value="<?php
	echo htmlspecialchars($options['title']);
?>"/><input name="wss_apply" id="wss_apply" type="hidden" value="1"/></dd><dt class="wssU2"><label for="wss_description"><?php
	echo _WEBO_OPTIONS_DESCRIPTION;
?>:</label></dt><dd class="wssU4"><textarea rows="2" cols="80" class="wssF wssF1" id="wss_description" name="wss_description"><?php
	echo htmlspecialchars($options['description']);
?></textarea></dd></dl><ul class="wssO3"><?php
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
						'">?</a><br/><a href="#wss_options#' .
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
	foreach ($options as $key => $group) {
		if (empty($group['premium']) && !in_array($key, array('fee', 'title', 'description'))) {
?><li class="wssO4<?php
			echo $key == 'combinecss' ? ' wssO5' : '';
?>"><a href="#<?php
			echo $key;
?>" class="wssJ"><?php
			echo constant('_WEBO_' . ($iis ? str_replace("htaccess", "iis", $key) : $key));
?><span class="wssJ6"></span></a></li><?php
		}
	}
	if ($premium == 10) {
?><li class="wssO4"><a href="#wssas" class="wssJ wssO14"><?php
		echo _WEBO_saas;
?> <span class="wssO15"><?php
		echo $daily;
?></span> <?php
		echo _WEBO_saas2;
?><span class="wssJ6"></span></a></li><?php
	}
?></ul><?php
	foreach ($options as $key => $group) {
?><fieldset id="<?php
		echo $key;
?>" class="wssD9<?php
		echo $key != 'combinecss' ? ' wssA0' : '';
?>"><dl class="wssD10"<?php
	if (!$premium) {
?> style="height:355px"<?php
	}
?>><?php
		if (is_array($group)) {
			foreach ($group as $option => $value) {
				if (is_array($value)) {
					if ($value['type'] != 'radio' || !empty($value['hidden'])) {
						$value['count'] = 1;
					}
					$i = $disabled = 0;
					if ($value['type'] == 'radio') { 
						while ($i++ != $value['count']) {
							if (!empty($value['disabled']) && !empty($value['disabled'][$i-1])) {
								$disabled = 1;
							}
						}
					}
					$i = 0;
					if ($value['type'] == 'radio' && empty($value['hidden'])) {
?><dt class="wssD5<?php
						echo !empty($value['disabled']) && ($disabled || $value['disabled'] == 100) ? ' wssD22' : '';
?>"><label class="wssE" for="wss_<?php
						echo $option;
?>1"><?php
						echo constant('_WEBO_' . ($iis ? str_replace("htaccess", "iis", $option) : $option));
?> <a class="wssJ9" href="#" title="<?php
						echo str_replace('"', '&quot;', constant('_WEBO_' . $option . '_HELP'));
						echo defined('_WEBO_' . $option . '_HELP_DISABLED') ? '///'. constant('_WEBO_' . $option . '_HELP_DISABLED') : '';
?>">?</a></label></dt><?php
					}
					while ($i++ != $value['count']) {
						if (empty($value['hidden'])) {
?><dt class="wssD<?php
							echo strpos($value['type'], 'text') !== false ? 1 : 5;
							echo !empty($value['disabled']) && (!empty($value['disabled'][$i-1]) || $value['disabled'] == 100) ? ' wssD20' : '';
							echo !empty($value['price']) &&
								!empty($value['value']) &&
								($value['value'] == $i-1 || $value['type'] != 'radio') &&
								(!is_array($value['price']) || $value['price'][$i-1]) ? ' wssD23' : '';
?>"><label for="wss_<?php
							echo $option . ($value['type'] == 'radio' ? $i : '');
?>" class="wssE"><?php
							echo constant('_WEBO_' . ($iis ? str_replace("htaccess", "iis", $option) : $option) . ($value['count'] > 1 ? $i : ''));
							echo strpos($value['type'], 'text') !== false ? ':' : '';
							if ($value['type'] != 'radio') {
?> <a class="wssJ9" href="#" title="<?php
								echo constant('_WEBO_' . $option . '_HELP');
								echo defined('_WEBO_' . $option . '_HELP_DISABLED') ? '///'. constant('_WEBO_' . $option . '_HELP_DISABLED') : '';
?>">?</a><?php
							}
							if (!empty($value['price']) && $premium == 10) {
								$price = is_array($value['price']) ? $value['price'][$i-1] : $value['price'];
								if ($price) {
?><span class="wssO15" id="wss_<?php
									echo $option . ($value['type'] == 'radio' ? $i : '');
?>_webo"><?php
									echo $price;
?></span><?php
								}
							}
?></label></dt><?php
						}
						switch ($value['type']) {
							case 'text':
?><dd class="wssD2<?php
								echo !empty($value['disabled']) ? ' wssD20' : '';
?>"><input <?php
								echo empty($value['hidden']) ? '' : ' type="hidden"';
?> value="<?php
								echo htmlspecialchars($value['value']);
?>" name="wss_<?php
								echo $option;
?>" id="wss_<?php
								echo $option;
?>" class="wssF"<?php
								if (!empty($value['price'])) {
?> onblur="yass.u(this)"<?php
								}
								if (empty($value['hidden'])) {
?> title="<?php
									echo constant('_WEBO_' . $option . '_HELP');
?>"<?php
								}
?>/></dd><?php
								break;
							case 'smalltext':
?><dd class="wssD2<?php
								echo !empty($value['disabled']) ? ' wssD20' : '';
?>"><input <?php
								echo empty($value['hidden']) ? '' : ' type="hidden"';
?> value="<?php
								echo htmlspecialchars($value['value']);
?>" name="wss_<?php
								echo $option;
?>" id="wss_<?php
								echo $option;
?>" class="wssF wssF3"<?php
								if (!empty($value['price'])) {
?> onblur="yass.u(this)"<?php
								}
?> title="<?php
								echo constant('_WEBO_' . $option . '_HELP');
?>"/></dd><?php
								break;
							case 'radio':
?><dd class="wssD6<?php
								echo !empty($value['disabled']) && (!empty($value['disabled'][$i-1]) || $value['disabled'] == 100) ? ' wssD20' : '';
?>"><input value="<?php
								echo $i;
?>" type="<?php
								echo empty($value['hidden']) ? 'radio' : 'hidden';
?>"<?php
								if ($value['value'] == $i-1) {
?> checked="checked"<?php
								}
?> name="wss_<?php
								echo $option;
?>" id="wss_<?php
								echo $option . $i;
?>" class="wssF"<?php
								if (!empty($value['price'])) {
?> onclick="yass.u(this)"<?php
								}
								if ($price) {
?> title="<?php
									echo $price;
?>"<?php
								}
?>/></dd><?php
								break;
							case 'checkbox':
?><dd class="wssD6<?php
								echo !empty($value['disabled']) ? ' wssD20' : '';
?>"><input type="<?php
								echo empty($value['hidden']) ? 'checkbox' : 'hidden';
?>"<?php
								echo $value['value'] ? ' checked="checked"' : '';
?>" name="wss_<?php
								echo $option;
?>" id="wss_<?php
								echo $option;
?>" class="wssF"<?php
								if (!empty($value['price'])) {
?> onclick="yass.u(this)"<?php
								}
?> title="<?php
								echo constant('_WEBO_' . $option . '_HELP');
?>"/></dd><?php
								break;
							case 'textarea':
								if (!empty($value['hidden'])) {
?><input type="hidden" name="wss_<?php
									echo $option;
?>" id="wss_<?php
									echo $option;
?>" value="<?php
									echo htmlspecialchars($value['value']);
?>" title="<?php
									echo constant('_WEBO_' . $option . '_HELP');
?>"/><?php
								} else {
?><dd class="wssD2<?php
									echo !empty($value['disabled']) && $value['disabled'] == $i ? ' wssD20' : '';
?>"><textarea class="wssF wssF1" cols="30" rows="2" name="wss_<?php
									echo $option;
?>" id="wss_<?php
									echo $option;
?>"<?php
								if (!empty($value['price'])) {
?> onblur="yass.u(this)"<?php
								}
?> title="<?php
									echo constant('_WEBO_' . $option . '_HELP');
?>"><?php
									echo htmlspecialchars($value['value']);
?></textarea></dd><?php
								}
								break;
						}
?></dd><?php
					}
				}
			}
		}
?></dl></fieldset><?php
	}
	if ($premium == 10) {
?><fieldset id="wssas" class="wssA0 wssD9"><input type="hidden" value="<?php
		echo $options['fee'];
?>" name="wss_fee" id="wss_fee"/><div class="wssD10"><h3 class="wssB3"><?php
		echo _WEBO_SAAS_DAILY;
?></h3><table class="wssT wssT20"><col width="80%"/><col width="20%"/><thead class="wssT5"><tr class="wssT6"><th class="wssT7"><?php
		echo _WEBO_SPLASH2_OPTIONS;
?></th><th class="wssT7"><?php
		echo _WEBO_saas;
?></th></tr></thead><tfoot><tr class="wssT21"><th class="wssT7"><?php
		echo _WEBO_SYSTEM_TOTAL;
?></th><th class="wssT7 wssT10"><span class="wssO15"><?php
		echo $daily;
?></span></th></tr></tfoot><tbody><?php
		echo $saas;
?></tbody></table></div></fieldset><?php
	}
?><p class="wssI wssU18"><a href="javascript:yass('.wssU')[0].style.display='block';yass('.wssU0')[0].style.display='none';void(0)" class="wssJ8"><?php
	echo _WEBO_SPLASH1_BACK;
?></a> <span class="wss_butt1"><a href="javascript:var a=yass('.wssC6')[0];yass('#wss_apply')[0].value=0;if(yass.b.ie){yass[a.name]({target:a},yass.y)}else{a.onsubmit({target:a},yass.y)}void(0)" class="wssJ5"><?php
	echo _WEBO_SPLASH1_SAVE;
?><span class="wssJ6"></span></a> <a href="javascript:var a=yass('.wssC6')[0];yass('#wss_apply')[0].value=1;if(yass.b.ie){yass[a.name]({target:a},yass.y)}else{a.onsubmit({target:a},yass.y)}void(0)" class="wssJ7"><?php
	echo _WEBO_OPTIONS_APPLY;
?><span class="wssJ6"></span></a></span><span class="wss_butt2"><a href="javascript:var a=yass('.wssC6')[0];yass('#wss_apply')[0].value=1;if(yass.b.ie){yass[a.name]({target:a},yass.y)}else{a.onsubmit({target:a},yass.y)}void(0)" class="wssJ7"><?php
	echo _WEBO_SPLASH1_SAVE;
?><span class="wssJ6"></span></a></span><input type="hidden" name="wss_Submit" value="1"/></p></form><?php
}
?></div>