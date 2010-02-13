<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs block about cache size (for dashboard)
 *
 **/
 
/* set correct content charset */
header('Content-Type: text/html;charset=' . _WEBO_CHARSET);

	if ($e + $w) {
?><ul class="wssO"><?php
		$i = 0;
		foreach ($errors as $key => $value) {
			if (empty($value) && $i < 3) {
?><li class="wssO1"><?php
				echo constant('_WEBO_SYSTEM_' . $key);
				$i++;
?> <a class="wssJ9" href="#" title="<?php
						echo str_replace('"', '&quot;', constant('_WEBO_SYSTEM_' . $key . '_HELP'));
?>">?</a></li><?php
			}
		}
		if ($i < 3) {
			foreach ($warnings as $key => $value) {
				if (empty($value) && $i < 3) {
?><li class="wssO1 wssO2"><?php
					echo constant('_WEBO_SYSTEM_' . $key);
					$i++;
?> <a class="wssJ9" href="#" title="<?php
						echo str_replace('"', '&quot;', constant('_WEBO_SYSTEM_' . $key . '_HELP'));
?>">?</a></li><?php
				}
			}
		}
?></ul><p class="wssI"><?php
		echo _WEBO_SYSTEM_TOTAL;
?>: <?php
		if ($e) {
			echo $e;
?> <?php
			echo $e%10 == 1 ? _WEBO_SYSTEM_TROUBLE : ($e%10 < 5 ? _WEBO_SYSTEM_TROUBLES : _WEBO_SYSTEM_TROUBLES2);
		}
		if ($e && $w) {
?>, <?php
		}
		if ($w) {
			echo $w;
?> <?php
			echo $w%10 == 1 ? _WEBO_SYSTEM_WARNING : ($w%10 < 5 ? _WEBO_SYSTEM_WARNINGS : _WEBO_SYSTEM_WARNINGS2);
		}
?></p><?php
	} else {
?><p class="wssI0"><?php
		echo _WEBO_SYSTEM_NOPROBLEMS;
?></p><?php
	}
?>