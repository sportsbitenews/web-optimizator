<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs page with cache information
 *
 **/
?><noscript><?php
	echo _WEBO_NEW_NOSCRIPT;
?></noscript><ul class="wssM"><li class="wssM1">
		<a class="wssM3" href="#wss_dashboard" title="<?php
	echo _WEBO_SPLASH2_CONTROLPANEL_TITLE;
		?>">
			<span class="wssM5"></span>
			<span class="wssM4 wssM10"><?php
	echo _WEBO_SPLASH2_CONTROLPANEL;
			?></span>
		</a>
	</li><li class="wssM1">
		<a href="#wss_options" class="wssM3" title="<?php
	echo _WEBO_SPLASH2_OPTIONS_TITLE;
		?>">
			<span class="wssM5"></span>
			<span class="wssM4 wssM11"><?php
	echo _WEBO_SPLASH2_OPTIONS;
			?></span>
		</a>
	</li><li class="wssM1">
		<a href="#wss_system" class="wssM3" title="<?php
	echo _WEBO_DASHBOARD_SYSTEM_TITLE;
		?>">
			<span class="wssM5"></span>
			<span class="wssM4 wssM12"><?php
	echo _WEBO_DASHBOARD_SYSTEM;
			?></span>
		</a>
	</li><li class="wssM1">
		<a href="#wss_cache" class="wssM2" title="<?php
	echo _WEBO_DASHBOARD_CACHE_TITLE;
		?>">
			<span class="wssM5"></span>
			<span class="wssM4 wssM13"><?php
	echo _WEBO_DASHBOARD_CACHE;
			?></span>
		</a>
	</li><li class="wssM1">
		<a href="#wss_account" class="wssM3" title="<?php
	echo _WEBO_DASHBOARD_ACCOUNT_TITLE
		?>">
			<span class="wssM5"></span>
			<span class="wssM4 wssM14"><?php
	echo _WEBO_DASHBOARD_ACCOUNT;
			?></span>
		</a>
	</li><?php
	if ($premium > 1 && 0) {
	?><li class="wssM1">
		<a href="#wss_speed" class="wssM3" title="<?php
	echo _WEBO_DASHBOARD_RESULTS;
			?>">
			<span class="wssM5"></span>
			<span class="wssM4 wssM15"><?php
	echo _WEBO_DASHBOARD_SPEED;
			?></span>
		</a>
	</li><?php
	}
?></ul>
<div class="wssC4 wssC5"><?php
	if (count($files)) {
?><div class="wssH">
	<div class="wssRB">
		<span class="wssRB1"><span class="wssRB2">&bull;</span></span>
		<span class="wssRB3"><span class="wssRB4">&bull;</span></span>
	</div>
	<div class="wssH1">
		<h2 class="wssB"><?php
	echo _WEBO_CACHE_FILTER;
		?></h2>
		<ul class="wssO3">
			<li class="wssO4"><a href="javascript:_.u()" class="wssJ wssJ1"><?php
	echo _WEBO_CACHE_ALL;
			?></a></li>
			<li class="wssO4"><a href="javascript:_.u(1)" class="wssJ">.css</a></li>
			<li class="wssO4"><a href="javascript:_.u(2)" class="wssJ">.css.gz</a></li>
			<li class="wssO4"><a href="javascript:_.u(3)" class="wssJ">.css.css</a></li>
			<li class="wssO4"><a href="javascript:_.u(4)" class="wssJ">.js</a></li>
			<li class="wssO4"><a href="javascript:_.u(5)" class="wssJ">.js.gz</a></li>
			<li class="wssO4"><a href="javascript:_.u(6)" class="wssJ">.php</a></li>
			<li class="wssO4"><a href="javascript:_.u(7)" class="wssJ">.php.gz</a></li>
			<li class="wssO4"><a href="javascript:_.u(8)" class="wssJ">.png</a></li>
			<li class="wssO4"><a href="javascript:_.u(9)" class="wssJ">.jpg</a></li>
			<li class="wssO4"><a href="javascript:_.u(10)" class="wssJ">.gz</a></li>
		</ul>
		<p class="wssI">
			<a href="#wss_renew" class="wssJ7">
				<?php
	echo _WEBO_DASHBOARD_CACHE_REFRESH;
				?><span class="wssJ6"></span>
			</a>
		</p>
	</div>
	<div class="wssRB">
		<span class="wssRB5"><span class="wssRB6">&bull;</span></span>
		<span class="wssRB7"><span class="wssRB8">&bull;</span></span>
	</div>
</div><table class="wssT wssT0">
	<col width="38%"/><col width="18%"/><col width="17%"/><col width="10%"/><col width="16%"/>
	<thead class="wssT5">
		<tr class="wssT6">
			<th class="wssT7"><?php
		echo _WEBO_CACHE_FILENAME;
			?></th>
			<th class="wssT7"><?php
		echo _WEBO_CACHE_TYPE;
			?></th>
			<th class="wssT7"><?php
		echo _WEBO_GZIP_MTIME;
			?></th>
			<th class="wssT7"><?php
		echo _WEBO_GZIP_SIZE;
			?></th>
			<th class="wssT7"><?php
		echo _WEBO_CACHE_BROWSER;
			?></th>
		</tr>
	</thead>
	<tfoot class="wssT1">
		<tr class="wssT8">
			<th class="wssT9" colspan="3"><?php
		echo _WEBO_CACHE_TOTAL;
			?>:</th>
			<th class="wssT9" colspan="2"><?php
		echo printf("%.1f", $total / 1024);
			?> <?php
		echo _WEBO_LOGIN_EFFICIENCY_KB;
			?></th>
		</tr>
	</tfoot>
	<tbody><?php
		$i = 0;
		foreach ($files as $filename => $file) {
		?><tr class="wssT8 wssT1<?php
			echo $i%2 ? 2 : 1;
		?>">
			<td class="wssT9"><?php
			echo $filename;
			?></td>
			<td class="wssT9"><?php
			switch ($file[0]) {
				case 0:
				case 1:
					echo _WEBO_DASHBOARD_CACHE_JS;
					break;
				case 2:
				case 3:
					echo _WEBO_DASHBOARD_CACHE_CSS;
					break;
				case 4:
					echo _WEBO_DASHBOARD_CACHE_RESOURCES;
					break;
				case 5:
					echo _WEBO_DASHBOARD_CACHE_SPRITES;
					break;
				case 6:
					echo _WEBO_DASHBOARD_CACHE_IMAGES;
					break;
				case 7:
					echo _WEBO_DASHBOARD_CACHE_HTML;
					break;
			}
			?></td>
			<td class="wssT9"><?php
			echo date("Y-m-d H:i", $file[1]);
			?></td>
			<td class="wssT9"><?php
			echo printf("%.1f", $file[2] / 1024);
			?> <?php
			echo _WEBO_LOGIN_EFFICIENCY_KB;
			?></td>
			<td class="wssT9"><?php
			switch ($file[3]) {
				case 0:
					echo _WEBO_DASHBOARD_STATUS_ALL;
					break;
				case 1:
					echo 'IE5';
					break;
				case 2:
					echo 'IE6';
					break;
				case 3:
					echo 'IE7';
					break;
				case 4:
					echo 'IE8';
					break;
				case 10:
					echo 'IE7@Vista';
					break;
			}
			?></td>
		</tr><?php
			$i++;
		}
	?></tbody>
</table>
	<?php
	} else {
?><p class="wssI"><?php
		echo _WEBO_CACHE_EMPTY;
?></p><?php
	}
?><p class="wssI">
	<a href="#wss_renew" class="wssJ7">
		<?php
	echo _WEBO_DASHBOARD_CACHE_REFRESH;
		?><span class="wssJ6"></span>
	</a>
</p></div><div class="wssh"><h4 class="wssl"><span id="wss_prog">0</span>%<span class="wssm"></span></h4><p id="wss_mess">Current Status</p></div>