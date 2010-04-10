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
?></p><img src="<?php
	echo $cachedir;
?>webo-site-speedup161.png?<?php
	echo md5($level1 . $level2 . $level3 . $level4 . $level5);
?>" id="wss_awrd" alt="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp" title="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp"/><ul class="wssO66"><li class="wssO67"><span class="wssO72><?php
	if ($level1) {
?><span class="wssO36 wssO<?php
		echo 36 + $level1;
?>"></span><?php
	}
	echo _WEBO_AWARDS_TOP;
	if ($level1) {
?><span class="wssO52"><?php
		echo constant('_WEBO_AWARDS_LEVEL' . $level1);
?></span><?php
	}
?></span><div class="wssO71"><p class="wssI"><?php
	echo _WEBO_AWARDS_TOP_INFO;
?></p><?php
	if ($level1 < 3) {
?><p class="wssI"><?php
		echo constant('_WEBO_AWARDS_TOP_' . $level1 . ($level1+1));
		$i = 0;
		foreach ($level_options[0][$level1] as $option) {
?><a href="#wss_options#<?php
			echo $option;
?>">"<?php
			echo constant('_WEBO_' . $option);
?>"</a><?php
			if ($i != count($level_options[0][$level1]) - 1) {
?>, <?php
			}
			if ($i && $i == count($level_options[0][$level1]) - 2) {
				echo _WEBO_DASHBOARD_CRITICAL_OR;
?> <?php
			}
			$i++;
		}
?></p><?php
	}
?></div></li><li class="wssO32"><span class="wssO72><<?php
	if ($level2) {
?><span class="wssO36 wssO<?php
		echo 39 + $level2;
?>"></span><?php
	}
	echo _WEBO_AWARDS_MIDDLE;
	if ($level2) {
?><span class="wssO52"><?php
		echo constant('_WEBO_AWARDS_LEVEL' . $level2);
?></span><?php
	}
?></span><div class="wssO71"><p class="wssI"><?php
	echo _WEBO_AWARDS_MIDDLE_INFO;
?></p><?php
	if ($level2 < 3) {
?><p class="wssI"><?php
		echo constant('_WEBO_AWARDS_MIDDLE_' . $level2 . ($level2+1));
		$i = 0;
		foreach ($level_options[1][$level2] as $option) {
?><a href="#wss_options#<?php
			echo $option;
?>">"<?php
			echo constant('_WEBO_' . $option);
?>"</a><?php
			if ($i != count($level_options[1][$level2]) - 1) {
?>, <?php
			}
			if ($i && $i == count($level_options[1][$level2]) - 2) {
				echo _WEBO_DASHBOARD_CRITICAL_OR;
?> <?php
			}
			$i++;
		}
?>.</p><?php
	}
?></div></li><li class="wssO33"><span class="wssO72><<?php
	if ($level3) {
?><span class="wssO36 wssO<?php
		echo 42 + $level3;
?>"></span><?php
	}
	echo _WEBO_AWARDS_BOTTOM;
	if ($level3) {
?><span class="wssO52"><?php
		echo constant('_WEBO_AWARDS_LEVEL' . $level3);
?></span><?php
	}
?></span><div class="wssO71"><p class="wssI"><?php
	echo _WEBO_AWARDS_BOTTOM_INFO;
?></p><?php
	if ($level3 < 3) {
?><p class="wssI"><?php
		echo constant('_WEBO_AWARDS_BOTTOM_' . $level3 . ($level3+1));
		$i = 0;
		foreach ($level_options[2][$level3] as $option) {
?><a href="#wss_options#<?php
			echo $option;
?>">"<?php
			echo constant('_WEBO_' . $option);
?>"</a><?php
			if ($i != count($level_options[2][$level3]) - 1) {
?>, <?php
			}
			if ($i && $i == count($level_options[2][$level3]) - 2) {
				echo _WEBO_DASHBOARD_CRITICAL_OR;
?> <?php
			}
			$i++;
		}
?>.</p><?php
	}
?></div></li><li class="wssO34"><span class="wssO72><<?php
	if ($level4) {
?><span class="wssO36 wssO<?php
		echo 45 + $level4;
?>"></span><?php
	}
	echo _WEBO_AWARDS_TAIL;
	if ($level4) {
?><span class="wssO52"><?php
		echo constant('_WEBO_AWARDS_LEVEL' . $level4);
?></span><?php
	}
?></span><div class="wssO71"><p class="wssI"><?php
	echo _WEBO_AWARDS_TAIL_INFO;
?></p><?php
	if ($level4 < 3) {
?><p class="wssI"><?php
		echo constant('_WEBO_AWARDS_TAIL_' . $level4 . ($level4+1));
		$i = 0;
		foreach ($level_options[3][$level4] as $option) {
?><a href="#wss_options#<?php
			echo $option;
?>">"<?php
			echo constant('_WEBO_' . $option);
?>"</a><?php
			if ($i != count($level_options[3][$level4]) - 1) {
?>, <?php
			}
			if ($i && $i == count($level_options[3][$level4]) - 2) {
				echo _WEBO_DASHBOARD_CRITICAL_OR;
?> <?php
			}
			$i++;
		}
?>.</p><?php
	}
?></div></li><li class="wssO35"><span class="wssO72><<?php
	if ($level5) {
?><span class="wssO36 wssO<?php
		echo 48 + $level5;
?>"></span><?php
	}
	echo _WEBO_AWARDS_CIRCLE;
	if ($level5) {
?><span class="wssO52"><?php
		echo constant('_WEBO_AWARDS_LEVEL' . $level5);
?></span><?php
	}
?></span><div class="wssO71"><p class="wssI"><?php
	echo _WEBO_AWARDS_CIRCLE_INFO;
?></p><?php
	if ($level5 < 3) {
?><p class="wssI"><?php
		echo constant('_WEBO_AWARDS_CIRCLE_' . $level5 . ($level5+1));
		$i = 0;
		foreach ($level_options[4][$level5] as $option) {
?><a href="#wss_options#<?php
			echo $option;
?>">"<?php
			echo constant('_WEBO_' . $option);
?>"</a><?php
			if ($i != count($level_options[4][$level5]) - 1) {
?>, <?php
			}
			if ($i && $i == count($level_options[4][$level5]) - 2) {
				echo _WEBO_DASHBOARD_CRITICAL_OR;
?> <?php
			}
			$i++;
		}
?>.</p><?php
	}
?></div></li></ul><form action="#wss_awards" class="wssC8" method="get" enctype="multipart/form-data"><div class="wssO60"><img src="<?php
	echo $cachedir;
?>webo-site-speedup125.png?<?php
	echo md5($level1 . $level2 . $level3 . $level4 . $level5);
?>" id="wss_award" alt="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp" title="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp"/><div class="wssO61"><span class="wssO65"><?php
	echo _WEBO_AWARDS_BACK;
?>:</span><span class="wssO56 wssO62" title="0"></span><span class="wssO56 wssO63" title="1"></span><span class="wssO56 wssO64" title="2"></span></div></div><h3 class="wssB"><?php
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
?></label><?php
	if (!empty($short_link)) {
?><label class="wssO56"><input type="radio" name="code" value="twitter" class="wssO70"/> <?php
		echo _WEBO_AWARDS_CODE4;
?></label><?php
	}
?></dd></dl><p class="wssI"><textarea cols="72" rows="7" class="wssE">&lt;a href="<?php
	echo $cachedir;
?>webo-site-speedup.html"&gt;<img width="125" height="125" alt="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp" title="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp" src="<?php
	echo $cachedir;
?>webo-site-speedup.png" border="0"/>&lt;/a&gt;</textarea><input type="hidden" name="webo_cachedir" value="<?php
	echo $cachedir;
?>"/><input type="hidden" name="webo_aw" value="<?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?> WEBO Site SpeedUp"/><input type="hidden" name="webo_info" value="<?php
	echo str_replace(array('<', '>', '"'), array('&lt;', '&gt;', '&quot;'), _WEBO_AWARDS_GENERAL);
?>"/><input type="hidden" name="webo_twitter" value="<?php
	echo _WEBO_AWARDS_TWITTER . ' ' . $short_link;
?>"/></p></form>