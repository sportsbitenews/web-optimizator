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
?></h1><div class="wssC10"><div class="wssC9"><ul class="wssO7"><li class="wssO8"><a href="#wss_wizard" class="wssJ"><span class="wssJ30">1</span> <?php
	echo _WEBO_WIZARD_STEP1;
?></a><span class="wssJ32"></span></li><li class="wssO8"><a href="#wss_wizard" class="wssJ"><span class="wssJ30">2</span> <?php
	echo _WEBO_WIZARD_STEP2;
?></a><span class="wssJ32"></span></li><li class="wssO8"><a href="#wss_wizard" class="wssJ"><span class="wssJ30">3</span> <?php
	echo _WEBO_WIZARD_STEP3;
?></a></li></ul><p class="wssI"><?php
	echo _WEBO_WIZARD_NOTE;
?></p></div><div class="wssC11 wssC12"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP11;
?></h3><p class="wssI"><?php
	echo _WEBO_WIZARD_STEP11_INFO;
?></p><span class="wssJ31"></span></div><div class="wssC11 wssC13 wssA0"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP21;
?></h3><dl class="wssD10"><dt class="wssD5"><label for="wss_serverside" class="wssE"><?php
	echo _WEBO_WIZARD_STEP211;
?></label></dt><dd class="wssD2"><input type="checkbox" name="wss_serverside" id="wss_serverside1" class="wssF" title="<?php
	echo _WEBO_WIZARD_STEP211_HELP;
?>" value="1"/></dd><dt class="wssD5"><label for="wss_serverside" class="wssE"><?php
	echo _WEBO_WIZARD_STEP212;
?></label></dt><dd class="wssD2"><input type="checkbox" name="wss_serverside" id="wss_serverside2" class="wssF" title="<?php
	echo _WEBO_WIZARD_STEP212_HELP;
?>" value="2"/></dd><dt class="wssD5"><label for="wss_serverside" class="wssE"><?php
	echo _WEBO_WIZARD_STEP210;
?></label></dt><dd class="wssD2"><input type="checkbox" name="wss_serverside" id="wss_serverside0" class="wssF" title="<?php
	echo _WEBO_WIZARD_STEP210_HELP;
?>" value="0"/></dd></dl><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP22;
?></h3><dl class="wssD10"><dt class="wssD5"><label for="wss_cdn" class="wssE"><?php
	echo _WEBO_WIZARD_STEP221;
?></label></dt><dd class="wssD2"><input type="checkbox" name="wss_cdn" id="wss_cdn1" class="wssF" title="<?php
	echo _WEBO_WIZARD_STEP221_HELP;
?>" value="1"/></dd><dt class="wssD5"><label for="wss_serverside" class="wssE"><?php
	echo _WEBO_WIZARD_STEP222;
?></label></dt><dd class="wssD2"><input type="checkbox" name="wss_cdn" id="wss_cdn2" class="wssF" title="<?php
	echo _WEBO_WIZARD_STEP222_HELP;
?>" value="2"/></dd><dt class="wssD5"><label for="wss_serverside" class="wssE"><?php
	echo _WEBO_WIZARD_STEP220;
?></label></dt><dd class="wssD2"><input type="checkbox" name="wss_cdn" id="wss_cdn0" class="wssF" title="<?php
	echo _WEBO_WIZARD_STEP220_HELP;
?>" value="0"/></dd></dl><a href="#wss_wizard" class="wssJ5"><?php
	echo _WEBO_WIZARD_NEXT;
?><span class="wssJ6"></span></a><span class="wssJ31"></span></div><div class="wssC11 wssC14 wssA0"><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_STEP3;
?></h3><p class="wssI"><?php
	echo _WEBO_WIZARD_STEP3_INFO;
?></p><a href="#wss_wizard" class="wssJ5"><?php
	echo _WEBO_WIZARD_SAVE;
?><span class="wssJ6"></span></a><span class="wssJ31"></span></div><h3 class="wssB3"><?php
	echo _WEBO_WIZARD_PREVIEW;
?></h3><iframe src="<?php
	echo $website_root;
?>?web_optimizer_debug=1" id="wss_website" frameborder="0"></iframe><iframe src="<?php
	echo $website_root;
?>?web_optimizer_disabled=1" id="wss_website_initial"></iframe><iframe src="#" id="wss_website_tech"></iframe><?php
}
?></div>