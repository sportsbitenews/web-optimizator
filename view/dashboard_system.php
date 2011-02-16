<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs block about cache size (for dashboard)
 *
 **/
 
/* set correct content charset */
header('Content-Type: text/html;charset=' . _WEBO_CHARSET);

	if ($e + $w + $i) {
?><ul class="wssO"><?php
		$k = 0;
		foreach ($errors as $key => $value) {
			if (empty($value) && $k < 3) {
?><li class="wssO1"><?php
				echo constant('_WEBO_SYSTEM_' . $key);
				$k++;
?> <a class="wssJ9" href="#" title="<?php
						echo str_replace('"', '&quot;', constant('_WEBO_SYSTEM_' . $key . '_HELP'));
?>">?</a></li><?php
			}
		}
		if ($k < 3) {
			foreach ($warnings as $key => $value) {
				if (empty($value) && $k < 3) {
?><li class="wssO1 wssO2"><?php
					echo constant('_WEBO_SYSTEM_' . $key);
					$k++;
?> <a class="wssJ9" href="#" title="<?php
						echo str_replace('"', '&quot;', constant('_WEBO_SYSTEM_' . $key . '_HELP'));
?>">?</a></li><?php
				}
			}
		}
		if ($k < 3) {
			foreach ($infos as $key => $value) {
				if (empty($value) && $k < 3) {
?><li class="wssO1 wssO98"><?php
					echo constant('_WEBO_SYSTEM_' . $key);
					$k++;
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
			echo $e . ' ' . ($e%10 == 1 ? _WEBO_SYSTEM_TROUBLE : ($e%10 < 5 ? _WEBO_SYSTEM_TROUBLES : _WEBO_SYSTEM_TROUBLES2));
		}
		if ($e && $w) {
?>, <?php
		}
		if ($w) {
			echo $w . ' ' . ($w%10 == 1 ? _WEBO_SYSTEM_WARNING : ($w%10 < 5 ? _WEBO_SYSTEM_WARNINGS : _WEBO_SYSTEM_WARNINGS2));
		}
		if (($e || $w) && $i) {
?>, <?php
		}
		if ($i) {
			echo $i . ' ' . ($i%10 == 1 ? _WEBO_SYSTEM_INFO : ($i%10 < 5 ? _WEBO_SYSTEM_INFOS : _WEBO_SYSTEM_INFOS2));
		}
?></p><?php
	} else {
?><p class="wssI0"><?php
		echo _WEBO_SYSTEM_NOPROBLEMS;
?></p><?php
	}
?>