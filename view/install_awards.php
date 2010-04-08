<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs page with achievements
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
?></span></a></li><li class="wssM1"><a class="wssM2" href="#wss_awards" title="<?php
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
?></ul><p class="wssI"><?php
	echo _WEBO_AWARDS_INTRO;
?></p><ul class="wssO30"><li class="wssO31"><?php
	if ($level1) {
?><span class="wssO36 wssO<?php
		echo 36 + $level1;
?>"></span><?php
	}
	echo _WEBO_AWARDS_TOP;
	if ($level1) {
?><span class="wssO52"><?php
		echo constant(_WEBO_AWARDS_LEVEL . $level1);
?></span><?php
	}
?></li><li class="wssO32"><?php
	if ($level2) {
?><span class="wssO36 wssO<?php
		echo 39 + $level2;
?>"></span><?php
	}
	echo _WEBO_AWARDS_MIDDLE;
	if ($level2) {
?><span class="wssO52"><?php
		echo constant(_WEBO_AWARDS_LEVEL . $level2);
?></span><?php
	}
?></li><li class="wssO33"><?php
	if ($level3) {
?><span class="wssO36 wssO<?php
		echo 42 + $level3;
?>"></span><?php
	}
	echo _WEBO_AWARDS_BOTTOM;
	if ($level3) {
?><span class="wssO52"><?php
		echo constant(_WEBO_AWARDS_LEVEL . $level3);
?></span><?php
	}
?></li><li class="wssO34"><?php
	if ($level4) {
?><span class="wssO36 wssO<?php
		echo 45 + $level4;
?>"></span><?php
	}
	echo _WEBO_AWARDS_TAIL;
	if ($level4) {
?><span class="wssO52"><?php
		echo constant(_WEBO_AWARDS_LEVEL . $level4);
?></span><?php
	}
?></li><li class="wssO35"><?php
	if ($level5) {
?><span class="wssO36 wssO<?php
		echo 48 + $level5;
?>"></span><?php
	}
	echo _WEBO_AWARDS_CIRCLE;
	if ($level5) {
?><span class="wssO52"><?php
		echo constant(_WEBO_AWARDS_LEVEL . $level5);
?></span><?php
	}
?></li></ul><form action="#wss_awards" class="wssC8" method="get" enctype="multipart/form-data"><div class="wssO60">
<img src="http://webo.in/rocket/?size=125&amp;top=<?php
	echo $level1;
?>&amp;middle=<?php
	echo $level2;
?>&amp;bottom=<?php
	echo $level3;
?>&amp;tail=<?php
	echo $level4;
?>&amp;circle=<?php
	echo $level5;
?>" id="wss_award" alt="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp" title="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp"/>
<div class="wssO61"><span class="wssO65"><?php
	echo _WEBO_AWARDS_BACK;
?>:</span><span class="wssO56 wssO62" title="0"></span><span class="wssO56 wssO63" title="1"></span><span class="wssO56 wssO64" title="2"></span></div>
</div><h3 class="wssB"><?php
	echo _WEBO_AWARDS_CHOOSE;
?>:</h3><dl class="wssO53"><dt class="wssO54"><label for="size88"><?php
	echo _WEBO_AWARDS_SIZE;
?>:</label></dt><dd class="wssO55"><label class="wssO56"><input type="radio" name="size" id="size88" value="88" class="wssO70"/> 88x88</label><label class="wssO56"><input type="radio" name="size" value="125" checked="checked" class="wssO70"/> 125x125</label><label class="wssO56"><input type="radio" name="size" value="161" class="wssO70"/> 161x161</label><label class="wssO56"><input type="radio" name="size" value="250" class="wssO70"/> 250x250</label></dd><dt class="wssO54"><label for="color1"><?php
	echo _WEBO_AWARDS_COLOR;
?>:</label></dt><dd class="wssO55"><label class="wssO57"><input type="radio" name="color" id="color1" value="color1" checked="checked" class="wssO70"/> <?php
	echo _WEBO_AWARDS_COLOR1;
?></label></dd><dt class="wssO54"><label for="codehtml"><?php
	echo _WEBO_AWARDS_CODE;
?>:</label></dt><dd class="wssO55"><label class="wssO56"><input type="radio" name="code" id="codehtml" value="html" checked="checked" class="wssO70"/> <?php
	echo _WEBO_AWARDS_CODE1;
?></label><label class="wssO56"><input type="radio" name="code" value="bb" class="wssO70"/> <?php
	echo _WEBO_AWARDS_CODE2;
?></label><label class="wssO56"><input type="radio" name="code" value="site" class="wssO70"/> <?php
	echo _WEBO_AWARDS_CODE3;
?></label></dd></dl><p class="wssI"><textarea cols="80" rows="5" class="wssE">&lt;a href="<?php
	echo $cachedir;
?>award.html"&gt;<img width="125" height="125" alt="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp" title="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp" src="<?php
	echo $cachedir;
?>award.png" border="0"/>&lt;/a&gt;</textarea><input type="hidden" name="webo_cachedir" value="<?php
	echo $cachedir;
?>"/><input type="hidden" name="webo_aw" value="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp"/><input type="hidden" name="webo_info" value="<?php
	echo htmlspecialchars(_WEBO_AWARDS_GENERAL);
?>"/></p></form>