<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs info about all available configurations
 *
 **/

	foreach ($options as $key => $config) {
?>_.config.<?php
		echo htmlspecialchars($key);
		foreach ($config as $group => $value) {
?>=[<?php
			foreach ($value as $k => $v) {
				if ($k != 'premium') {
?>["wss_<?php
					echo $k;
?>","<?php
					echo htmlspecialchars($v['value']);
?>"],<?php
				}
			}
		}
?>];<?php
	}
?>