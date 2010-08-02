<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs page with configuration wizard
 *
 **/
 
if ($wizard_mode) {
	echo $wizard_mode;
} else {
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
?></span></a></li></ul><h1 class="wssA wssA10"><?php
	echo _WEBO_WIZARD_TITLE;
?></h1><div class="wssC10"><div class="wssC9"><ul class="wssO7"><li class="wssO8 wssO9 wssO0"><a href="javascript:_.a({href:'#wss_wizard'});void(0)" class="wssJ"><span class="wssJ30">1</span> <?php
	echo _WEBO_WIZARD_STEP1;
?></a><span class="wssJ32"></span></li><li class="wssO8"><a href="javascript:_.wz=47;_.wizard()" class="wssJ"><span class="wssJ30">2</span> <?php
	echo _WEBO_WIZARD_STEP2;
?></a><span class="wssJ32"></span></li><li class="wssO8"><a href="javascript:_.wz=50;_.wizard()" class="wssJ"><span class="wssJ30">3</span> <?php
	echo _WEBO_WIZARD_STEP3;
?></a></li></ul><p class="wssI"><?php
	echo _WEBO_WIZARD_NOTE;
?></p></div><div class="wssC11 wssC12 wssC21"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP11;
?></h3><p class="wssI"><?php
	echo _WEBO_WIZARD_STEP11_INFO;
?></p><span class="wssJ31"></span></div><div class="wssC11 wssC12 wssA0 wssC22"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP12;
?></h3><p class="wssI"><?php
	echo _WEBO_WIZARD_STEP12_INFO;
?></p><span class="wssJ31"></span></div><div class="wssC11 wssC12 wssA0 wssC23"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP13;
?></h3><p class="wssI"><?php
	echo _WEBO_WIZARD_STEP13_INFO;
?></p><span class="wssJ31"></span></div><div class="wssC11 wssC12 wssA0 wssC24"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP14;
?></h3><p class="wssI"><?php
	echo _WEBO_WIZARD_STEP14_INFO;
?></p><span class="wssJ31"></span></div><div class="wssC11 wssC12 wssA0 wssC25"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP15;
?></h3><p class="wssI"><?php
	echo _WEBO_WIZARD_STEP15_INFO;
?></p><span class="wssJ31"></span></div><div class="wssC11 wssC12 wssA0 wssC26"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP16;
?></h3><p class="wssI"><?php
	echo _WEBO_WIZARD_STEP16_INFO;
?></p><span class="wssJ31"></span></div><div class="wssC11 wssC12 wssA0 wssC27"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP17;
?></h3><p class="wssI"><?php
	echo _WEBO_WIZARD_STEP17_INFO;
?></p><span class="wssJ31"></span></div><div class="wssC11 wssC12 wssA0 wssC28"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP18;
?></h3><p class="wssI"><?php
	echo _WEBO_WIZARD_STEP18_INFO;
?></p><span class="wssJ31"></span></div><form class="wssC11 wssC13 wssA0 wssC6"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP21;
?></h3><?php
	echo _WEBO_WIZARD_STEP21_INFO;
?><dl class="wssD10"><dt class="wssD5"><label for="wss_manual1" class="wssE"><?php
	echo _WEBO_WIZARD_STEP211;
?></label></dt><dd class="wssD6"><input type="radio" name="wss_manual" id="wss_manual1" class="wssF" title="<?php
	echo _WEBO_WIZARD_STEP211_HELP;
?>" value="1" checked="checked"/></dd><dt class="wssD5"><label for="wss_manual2" class="wssE"><?php
	echo _WEBO_WIZARD_STEP212;
?></label></dt><dd class="wssD6"><input type="radio" name="wss_manual" id="wss_manual2" class="wssF" title="<?php
	echo _WEBO_WIZARD_STEP212_HELP;
?>" value="2"/></dd></dl><a href="javascript:_.wz=_('#wss_manual1')[0].checked?50:48;_.wizard()" class="wssJ5"><?php
	echo _WEBO_WIZARD_NEXT;
?><span class="wssJ6"></span></a><span class="wssJ31"></span></form><form class="wssC11 wssC13 wssA0 wssC6"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP22;
?></h3><?php
	echo _WEBO_WIZARD_STEP22_INFO;
?><dl class="wssD10"><dt class="wssD5"><label for="wss_serverside1" class="wssE"><?php
	echo _WEBO_WIZARD_STEP221;
?></label></dt><dd class="wssD6"><input type="radio" name="wss_serverside" id="wss_serverside1" class="wssF" title="<?php
	echo _WEBO_WIZARD_STEP221_HELP;
?>" value="1" checked="checked"/></dd><dt class="wssD5"><label for="wss_serverside2" class="wssE"><?php
	echo _WEBO_WIZARD_STEP222;
?></label></dt><dd class="wssD6"><input type="radio" name="wss_serverside" id="wss_serverside2" class="wssF" title="<?php
	echo _WEBO_WIZARD_STEP222_HELP;
?>" value="2"/></dd></dl><a href="javascript:_.wiz('49&web_optimizer_wizard_options='+(_('#wss_serverside2')[0].checked?2:1))" class="wssJ5"><?php
	echo _WEBO_WIZARD_NEXT;
?><span class="wssJ6"></span></a><span class="wssJ31"></span></form><div class="wssC11 wssC13 wssA0"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP23;
?></h3><?php
	echo _WEBO_WIZARD_STEP23_INFO;
?><ul class="wssO7"><li class="wssO8 wssA0"><?php
	echo _WEBO_WIZARD_STEP12;
?></li><li class="wssO8 wssA0"><?php
	echo _WEBO_WIZARD_STEP122;
?></li><li class="wssO8 wssA0"><?php
	echo _WEBO_WIZARD_STEP13;
?></li><li class="wssO8 wssA0"><?php
	echo _WEBO_WIZARD_STEP132;
?></li><li class="wssO8 wssA0"><?php
	echo _WEBO_WIZARD_STEP14;
?></li><li class="wssO8 wssA0"><?php
	echo _WEBO_WIZARD_STEP142;
?></li><li class="wssO8 wssA0"><?php
	echo _WEBO_WIZARD_STEP15;
?></li><li class="wssO8 wssA0"><?php
	echo _WEBO_WIZARD_STEP18;
?></li></ul><a href="javascript:_.wz=50;_.wizard()" class="wssJ5"><?php
	echo _WEBO_WIZARD_NEXT;
?><span class="wssJ6"></span></a><span class="wssJ31"></span></div><div class="wssC11 wssC14 wssA0"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP31;
?></h3><p class="wssI wssI4"><span class="wssI5"><span id="wss_acceleration"></span><?php
	echo _WEBO_WIZARD_FROM;
?> <strong><span id="wss_before"></span><?php
	echo _WEBO_LOGIN_EFFICIENCY_S;
?></strong> <?php
	echo _WEBO_WIZARD_TO;
?> <strong><span id="wss_after"></span><?php
	echo _WEBO_LOGIN_EFFICIENCY_S;
?></span></strong><?php
	echo _WEBO_WIZARD_STEP31_INFO;
?></p><p class="wssI"><?php
	echo _WEBO_WIZARD_STEP31_INFO2;
?> <a href="#wss_options"><?php
	echo _WEBO_SPLASH2_OPTIONS;
?></a> <?php
	echo _WEBO_DASHBOARD_CRITICAL_OR;
?> <a href="mailto:sales@webo.name?Subject=WEBO Site SpeedUp Configuration"><?php
	echo _WEBO_WIZARD_STEP31_INFO3;
?></a>. <?php
	echo _WEBO_WIZARD_STEP31_INFO4;
?></p><a href="javascript:_.wiz(51)" class="wssJ7"><?php
	echo _WEBO_WIZARD_SAVE;
?><span class="wssJ6"></span></a><span class="wssJ31"></span></div><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_PREVIEW;
?></h3><iframe src="<?php
	echo $website_root;
?>?web_optimizer_debug=1" id="wss_website" frameborder="0"></iframe><iframe src="<?php
	echo $website_root;
?>?web_optimizer_disabled=1" id="wss_website_initial"></iframe><iframe src="#" id="wss_website_tech"></iframe><?php
}
?>