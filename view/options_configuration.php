<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs info about all available configurations
 *
 **/

	foreach ($options as $key => $config) {
?>_.config.<?php
		echo htmlspecialchars($key);
?>=[<?php
		foreach ($config as $group => $value) {
			if (is_array($value)) {
				foreach ($value as $k => $v) {
					if ($k != 'premium') {
?>["wss_<?php
						echo $k;
?>","<?php
						echo htmlspecialchars($v['value']);
?>"],<?php
					}
				}
			} else {
?>["wss_<?php
				echo $group;
?>","<?php
				echo $value;
?>"],<?php
			}
		}
?>];<?php
	}
?>