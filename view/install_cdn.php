<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs page to sync files with CDN
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
?></span></a></li><li class="wssM1"><a class="wssM3" href="#wss_awards" title="<?php
	echo _WEBO_DASHBOARD_AWARDS;
?>"><span class="wssM5"></span><span class="wssM4 wssM16"><?php
	echo _WEBO_DASHBOARD_AWARDS_TITLE;
?></span></a></li></ul><h1 class="wssA wssA9"><?php
	echo _WEBO_TOOLS_CDN;
?></h1><?php
	if ($cdn_disabled) {
?><p class="wssI"><?php
		echo _WEBO_CDN_DISABLED;
?></p><?php
	} else {
?><p class="wssI"><?php
		echo _WEBO_CDN_INFO;
?></p><p class="wssI"><?php
		echo _WEBO_CDN_INFO2;
?></p><form action="#wss_cdn" class="wssC wssC4" method="post" enctype="multipart/form-data"><?php
		if ($submit) {
?><p class="wssI"><a href="#wss_cdn" class="wssJ7" onclick="_.g(2)"><?php
			echo _WEBO_CDN_SYNC;
?><span class="wssJ6"></span></a></p><?php
		}
?><p class="wssI"><a href="#wss_cdn" class="wssJ5" onclick="_('.wssI3')[0].style.display='block';var a=_('.wssC4')[0];if(_.b.ie){_[a.name]({target:a})}else{a.onsubmit({target:a})}"><?php
		echo _WEBO_GZIP_FIND;
?><span class="wssJ6"></span></a></p><dl class="wssD"><dd class="wssD1"><label for="wss_directory" class="wssE"><?php
		echo _WEBO_GZIP_DIRECTORY;
?>:</label></dt><dd class="wssD2"><input class="wssF" name="wss_directory" id="wss_directory" value="<?php
		echo htmlspecialchars($directory);
?>" title="<?php
		echo _WEBO_GZIP_ENTERDIRECTORY;
?>"/></dd><dl class="wssD5"><label for="wss_recursive"><?php
		echo _WEBO_GZIP_RECURSIVE;;
?></label></dl><dd class="wssD6 wssD7"><input type="checkbox" name="wss_recursive" id="wss_recursive" title="<?php
		echo _WEBO_GZIP_ENTERRECURSIVE;
?>"<?php
		echo $recursive ? ' checked="checked"' : '';
?>/><input type="hidden" name="wss_Submit" id="wss_Submit" value="1"/></dd></dl><p class="wssA0 wssI3"><?php
		echo _WEBO_GZIP_WAIT;
?>...</p><?php
		if (count($results)) {
?><table class="wssT wssT0"><col width="67%"/><col width="10%"/><col width="18%"/><col width="5%"/><thead class="wssT5"><tr class="wssT6"><th class="wssT7"><?php
			echo _WEBO_GZIP_RELATIVE;
?></th><th class="wssT7"><?php
			echo _WEBO_GZIP_SIZE;
?></th><th class="wssT7"><?php
			echo _WEBO_GZIP_MTIME;
?></th><th class="wssT7"><input type="checkbox" checked="checked" onclick="_.z()"/></th></tr></thead><tbody><?php
			$i = 0;
			foreach ($results as $result) {
?><tr class="wssT8 wssT1<?php
				echo $i%2 ? 2 : 1;
?>"><td class="wssT9"><?php
				echo str_replace($directory, "", $result[0]);
?></td><td class="wssT9"><?php
				echo printf("%.1f", $result[3] / 1024) . ' ' . _WEBO_LOGIN_EFFICIENCY_KB;
?></td><td class="wssT9"><?php
				$old = $result[1] < $result[2] || ($result[1] - $result[2] < 86400 && time() - $result[1] > 31536000);
				echo $old ? _WEBO_GZIP_NOTCHANGED : date("Y-m-d H:i", $result[1]);
?></td><td class="wssT9"><input type="checkbox"<?php
				echo $old ? '' : ' checked="checked"';
?>/></td></tr><?php
				$i++;
			}
?></tbody></table><table class="wssT wssT0 wssA0"><col width="70%"/><col width="20%"/><col width="10%"/><thead class="wssT5"><tr class="wssT6"><th class="wssT7"><?php
			echo _WEBO_GZIP_RELATIVE;
?></th><th class="wssT7"><?php
			echo _WEBO_GZIP_INITIAL;
?></th><th class="wssT7"><?php
			echo _WEBO_CDN_STATUS;
?></th></tr></thead><tfoot class="wssT1"><tr class="wssT8"><th class="wssT9"><?php
			echo _WEBO_GZIP_INITIAL_TOTAL;
?>:</th><th class="wssT9" id="wss_total1" colspan="2"></th></tr></tfoot><tbody></tbody></table><?php
		}
?><div class="wss_h"><h4 class="wss_l"><span id="wss_prog">0</span>%<span class="wss_m"></span></h4><p id="wss_mess"><?php
		echo _WEBO_GZIP_PROCESSING;
?> <span id="wss_file1"></span> <?php
		echo _WEBO_GZIP_OUTOF;
?> <span id="wss_file2"></span>: <strong id="wss_file3"></strong></p></div></form><?php
	}
?>