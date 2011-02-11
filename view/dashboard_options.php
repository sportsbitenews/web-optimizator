<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs block about current confihuration (options)
 *
 **/
 
/* set correct content charset */
header('Content-Type: text/html;charset=' . _WEBO_CHARSET);

if ($delta && $delta != 100) {
	$i = 0;
?><ul class="wssO"><li class="wssO1"><span class="wssJ1"><?php
echo _WEBO_DASHBOARD_OPTIONS_BARELY;
?></span></li><li class="wssO1 wssO11"><span class="wssJ1"><?php
echo _WEBO_DASHBOARD_OPTIONS_NORMALLY;
?></span></li><li class="wssO1 wssO12"><span class="wssJ1"><?php
echo _WEBO_DASHBOARD_OPTIONS_FAST;
?></span></li><li class="wssO1 wssO13"><span class="wssJ1"><?php
echo _WEBO_DASHBOARD_OPTIONS_FLYING;
?></span></li></ul><p class="wssI"><span class="wssJ3" style="left:<?php
echo round((100 - $delta) * 1.04);
?>%;width:<?php
echo round($delta * 1.02);
?>%"></span><span class="wssJ4" style="left:<?php
echo round((100 - $delta) * 0.94);
?>%"><?php
echo 100 - $delta;
?></span></p><ul class="wssO3"><?php
	foreach ($errors as $key => $value) {
		if ($i < 3) {
		?><li class="wssO4"><strong class="wssJ2">+<?php
			echo $value;
		?></strong> <?php
			echo constant('_WEBO_' . $key);
		?></li><?php
			$i++;
		}
	}
	if ($premium < 1) {
?><li class="wssO4"><strong class="wssJ2">+28</strong> <a class="wssJ" href="#wss_promo"><?php
		echo _WEBO_DASHBOARD_AVAILABLE;
?></a></li><?php
	}
?></ul><p class="wssI wssI00"><a href="http://twitter.com/home?status=<?php
	echo urlencode(_WEBO_DASHBOARD_SHARE_RESULTS1 . " " . (100 - $delta)) . '/100 - ' . $_SERVER['HTTP_HOST'];
?>" class="wssJ wssJ10"><?php
	echo _WEBO_DASHBOARD_SHARE_RESULTS;
?></a></p><?php
} else {
?><p class="wssI0"><?php
	echo _WEBO_SYSTEM_NOPROBLEMS;
?></p><?php
}
?>