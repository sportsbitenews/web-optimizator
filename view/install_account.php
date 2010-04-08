<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs account page (with personal data)
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
?></span></a></li><li class="wssM1"><a href="#wss_account" class="wssM2" title="<?php
	echo _WEBO_DASHBOARD_ACCOUNT_TITLE
?>"><span class="wssM5"></span><span class="wssM4 wssM14"><?php
	echo _WEBO_DASHBOARD_ACCOUNT;
?></span></a></li><li class="wssM1"><a class="wssM3" href="#wss_awards" title="<?php
	echo _WEBO_DASHBOARD_AWARDS;
?>"><span class="wssM5"></span><span class="wssM4 wssM15"><?php
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
	if (!empty($submit) && !count($error)) {
?><div class="wssS"><div class="wssS1"><h2 class="wssB"><?php
		echo _WEBO_LOGIN_SUCCESS;
?></h2></div></div><?php
	} elseif (count($error)) {
?><div class="wssK"><div class="wssK1"><h2 class="wssB"><?php
	echo _WEBO_ERROR_TITLE;
?></h2><ul class="wssL"><li class="wssL1<?php
			if (empty($error[1])) {
?> wssA0<?php
			}
?>"><?php
	echo _WEBO_PASSWORD_ENTERPASSWORD;
?></li><li class="wssL1<?php
			if (empty($error[2])) {
?> wssA0<?php
			}
?>"><?php
	echo _WEBO_LOGIN_ENTEREMAIL;
?></li><li class="wssL1<?php
			if (empty($error[3])) {
?> wssA0<?php
			}
?>"><?php
	echo _WEBO_PASSWORD_DIFFERENT;
?></li><li class="wssL1<?php
			if (empty($error[4])) {
?> wssA0<?php
			}
?>"><?php
	echo _WEBO_ACCOUNT_INVALID;
?></li></ul></div></div><?php
	}
?><form action="#wss_account" method="post" class="wssC wssC3" enctype="multipart/form-data"><dl class="wssD"><dt class="wssD1"><label for="wss_license" class="wssE"><?php 
	echo _WEBO_LOGIN_LICENSE;
?>:</label></dt><dd class="wssD2<?php
	if (!empty($error[4])) {
?> wssD8<?php
	}
?>"><input id="wss_license" name="wss_license" title="<?php
	echo _WEBO_LOGIN_ENTERLICENSE;
?>" class="wssF" value="<?php
	if (empty($submit) || !empty($license)) {
		echo htmlspecialchars($license);
	}
?>" maxlength="29" size="29"/><span class="wssD3">*</span><input type="hidden" name="wss_premium" id="wss_premium" value="<?php
		echo round($premium);
?>"/><?php
		if (!empty($expires) && $expires > -1) {
?><span class="wssD4"><?php
			echo _WEBO_ACCOUNT_EXPIRES;
?> <?php
			echo date("Y-m-d", time() + $expires*86400);
?></span><?php
		} else {
?><span class="wssD4"><a class="wssJ" href="javascript:(function(){var s=_.doc.createElement('script');s.type='text/javascript';s.src='http://webo.name/license/trial/?name='+_('#wss_name')[0].value+'&amp;email='+_('#wss_email')[0].value;_('head')[0].appendChild(s)}())"><?php
			echo _WEBO_LOGIN_TRIAL;
?></a></span><?php
		}
?></dd><dt class="wssD1"><label for="wss_name" class="wssE"><?php 
	echo _WEBO_LOGIN_USERNAME;
?>:</label></dt><dd class="wssD2"><input id="wss_name" name="wss_name" title="<?php
	echo _WEBO_LOGIN_ENTERLOGIN;
?>" class="wssF" value="<?php
	if (empty($submit) || !empty($name)) {
		echo htmlspecialchars($name);
	}
?>"/></dd><dt class="wssD1"><label for="wss_email" class="wssE"><?php 
	echo _WEBO_LOGIN_EMAIL;
?>:</label></dt><dd class="wssD2<?php
	if (!empty($error[2])) {
?> wssD8<?php
	}
?>"><span class="wssD3">*</span><input id="wss_email" name="wss_email" title="<?php
	echo _WEBO_LOGIN_ENTEREMAIL;
?> <?php
	echo _WEBO_LOGIN_EMAILNOTICE;
?>" class="wssF" value="<?php
	if (empty($submit) || !empty($email)) {
		echo htmlspecialchars($email);
	}
?>"/><span class="wssD4"><?php
	echo _WEBO_LOGIN_EMAILNOTICE;
?></span></dd><?php
	if (!$internal) {
?><dt class="wssD1"><label for="wss_password" class="wssE"><?php 
		echo _WEBO_PASSWORD_OLD;
?>:</label></dt><dd class="wssD2<?php
		if (!empty($error[1])) {
?> wssD8<?php
		}
?>"><span class="wssD3">*</span><input type="password" id="wss_password" name="wss_password" title="<?php
		echo _WEBO_PASSWORD_ENTERPASSWORD;
?>" class="wssF"/></dd><dt class="wssD1"><label for="wss_new" class="wssE"><?php 
		echo _WEBO_PASSWORD_NEW;
?>:</label></dt><dd class="wssD2<?php
		if (!empty($error[3])) {
?> wssD8<?php
		}
?>"><span class="wssD3"> </span><input type="password" id="wss_new" name="wss_new" title="<?php
		echo _WEBO_PASSWORD_ENTERPASSWORDNEW;
?>" class="wssF"/></dd><dt class="wssD1"><label for="wss_confirm" class="wssE"><?php 
		echo _WEBO_PASSWORD_CONFIRM;
?>:</label></dt><dd class="wssD2<?php
		if (!empty($error[3])) {
?> wssD8<?php
		}
?>"><span class="wssD3"> </span><input type="password" id="wss_confirm" name="wss_confirm" title="<?php
		echo _WEBO_PASSWORD_ENTERPASSWORDCONFIRM;
?>" class="wssF"/></dd><?php
	}
?><dt class="wssD5">
			<label for="wss_allow" class="wssE1"><?php 
	echo _WEBO_LOGIN_ALLOW;
?>:</label></dt><dd class="wssD6"><input type="checkbox" id="wss_allow" name="wss_allow" title="<?php
	echo _WEBO_LOGIN_ALLOW;
?>"<?php
	if (!empty($allow)) {
?> checked="checked"<?php
	}
?>/></dd></dl><p class="wssD"><input type="submit" value="<?php
	echo _WEBO_SPLASH1_SAVE;
?>" class="wssG"/><input type="hidden" name="wss_page" value="install_account"/><input type="hidden" name="wss_Submit" value="1"/></p></form><div class="wssH wssH3 wssH4"><div class="wssRB"><span class="wssRB1"><span class="wssRB2">&bull;</span></span><span class="wssRB3"><span class="wssRB4">&bull;</span></span></div><div class="wssH1"><h2 class="wssB"><?php
	echo _WEBO_ABOUT_SUPPORT;
?></h2><p class="wssI"><?php
	echo _WEBO_ACCOUNT_LICENSEINFO;
?></p><p class="wssI"><?php
	echo _WEBO_ACCOUNT_LICENSEINFO2;
?></p><p class="wssI"><?php
	echo _WEBO_ACCOUNT_LICENSEINFO3;
?></p></div><div class="wssRB"><span class="wssRB5"><span class="wssRB6">&bull;</span></span><span class="wssRB7"><span class="wssRB8">&bull;</span></span></div></div>