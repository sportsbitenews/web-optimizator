<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs block about actual acceleration after WEBO Site SpeedUp (for dashboard)
 *
 **/
 
/* set correct content charset */
header('Content-Type: text/html;charset=' . _WEBO_CHARSET);
if (($s_after || $kb_after) && $premium > 1) {
	if ($s_after) {
?><h5 class="wssB1"><?php
		echo _WEBO_DASHBOARD_SPEED_GAINED;
?>:</h5><dl class="wssP"><dt class="wssP1"><span class="wssI2"><?php
		echo $s_before;
?></span> <?php
		echo _WEBO_LOGIN_EFFICIENCY_S;
?> &rarr; <strong class="wssI2"><?php
		echo $s_after;
?></strong> <?php
		echo _WEBO_LOGIN_EFFICIENCY_S;
?></dt><dd class="wssP2"><strong class="wssI2"><?php
		echo round(100 * $s_before / $s_after - 100);
?></strong>%</dd></dl><?php
	}
	if ($kb_after) {
?><h5 class="wssB1"><?php
		echo _WEBO_DASHBOARD_SPEED_SAVINGS;
?>:</h5><dl class="wssP"><dt class="wssP1"><span class="wssI2"><?php
		echo round($kb_before / 1024);
?></span> <?php
		echo _WEBO_LOGIN_EFFICIENCY_KB;
?> &rarr; <strong class="wssI2"><?php
		echo round($kb_after / 1024);
?></strong> <?php
		echo _WEBO_LOGIN_EFFICIENCY_KB;
?></dt><dd class="wssP2"><strong class="wssI2"><?php
		echo round(100 * (1 - $kb_after / $kb_before));
?></strong>%</dd></dl><?php
	}
} else {
?><p class="wssI"><?php
	echo _WEBO_DASHBOARD_SPEED_NODATA;
?></p><?php
}
if ($premium < 2) {
?><p class="wssI"><?php
	echo _WEBO_DASHBOARD_AVAILABLE;
?></p><?php
}
?>