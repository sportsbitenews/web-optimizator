<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs block with current optimization achievements (awards) for dashboard
 *
 **/
 
/* set correct content charset */
header('Content-Type: text/html;charset=' . _WEBO_CHARSET);

?><a href="#wss_awards"><img src="<?php
	if ($local) {
		echo $cachedir;
?>webo-site-speedup161.png<?php
	} else {
?>http://webo.in/rocket/?size=161&amp;top=<?php
		echo $level1;
?>&amp;middle=<?php
		echo $level2;
?>&amp;bottom=<?php
		echo $level3;
?>&amp;tail=<?php
		echo $level4;
?>&amp;circle=<?php
		echo $level5;
	}
?>?<?php
	echo md5($options . $grade . $files . $size . $speedup);
?>" alt="<?php
	echo _WEBO_DASHBOARD_AWARDS;
?>" title="<?php
	echo _WEBO_DASHBOARD_AWARDS;
?>" class="wssP0"/></a><dl class="wssP"><dt class="wssP1"><?php
	echo _WEBO_SPLASH2_OPTIONS;
?></dt><dd class="wssP2"><?php
	echo $options;
?></dd><dt class="wssP1"><?php
	echo _WEBO_DASHBOARD_AWARDS_GRADE;
?></dt><dd class="wssP2"><?php
	echo $grade;
?></dd><dt class="wssP1"><?php
	echo _WEBO_DASHBOARD_AWARDS_FILES;
?></dt><dd class="wssP2"><?php
	echo $files;
?></dd><dt class="wssP1"><?php
	echo _WEBO_DASHBOARD_AWARDS_SIZE;
?></dt><dd class="wssP2"><?php
	echo $size;
?> <?php
	echo _WEBO_LOGIN_EFFICIENCY_KB;
?></dd><dt class="wssP1"><?php
	echo _WEBO_DASHBOARD_AWARDS_SPEEDUP;
?></dt><dd class="wssP2"><?php
	echo $speedup < 0 ? 0 : $speedup;
?>%</dd></dl><p class="wssI wssI00"><a href="http://twitter.com/home?status=<?php
	echo urlencode(_WEBO_AWARDS_TWITTER . ' ' . $short_link);
?>" class="wssJ wssJ10"><?php
	echo _WEBO_DASHBOARD_SHARE_RESULTS;
?></a></p>