<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs page with options (configuration)
 *
 **/
 
if ($submit) {
	if (count($error)) {
?><div class="wssK">
	<div class="wssK1">
		<h2 class="wssB"><?php
	echo _WEBO_ERROR_TITLE;
		?></h2>
		<ul class="wssL">
			<li class="wssL1<?php
		if (empty($error[0])) {
			?> wssA0<?php
		}
			?>"><?php
		echo _WEBO_SPLASH3_CANTWRITE4 .
			' config.' .
			$options['config'] .
			'.php . ' .
			_WEBO_SPLASH3_HTACCESS_CHMOD;
			?></li>
			<li class="wssL1<?php
		if (empty($error[1])) {
			?> wssA0<?php
		}
			?>"><?php
		echo _WEBO_SPLASH3_CONFIGERROR .
			' ' .
			_WEBO_SPLASH3_CONFIGERROR2 .
			' ' .
			$basepath .
			' ' .
			_WEBO_SPLASH3_CONFIGERROR3;
			?></li>
			<li class="wssL1<?php
		if (empty($error[2])) {
			?> wssA0<?php
		}
			?>"><?php
		echo _WEBO_SPLASH3_CANTWRITE .
			' ' .
			$cssdir . ' ' .
			_WEBO_SPLASH3_CANTWRITE2 .
			' ' .
			_WEBO_SPLASH3_CANTWRITE3;
			?></li>
			<li class="wssL1<?php
		if (empty($error[3])) {
			?> wssA0<?php
		}
			?>"><?php
		echo _WEBO_SPLASH3_CANTWRITE .
			' ' .
			$jsdir .
			' ' .
			_WEBO_SPLASH3_CANTWRITE2 .
			' ' .
			_WEBO_SPLASH3_CANTWRITE3;
			?></li>
			<li class="wssL1<?php
		if (empty($error[4])) {
			?> wssA0<?php
		}
			?>"><?php
		echo _WEBO_SPLASH3_CANTWRITE .
			' ' .
			$htmldir .
			' ' .
			_WEBO_SPLASH3_CANTWRITE2 . 
			' ' .
			_WEBO_SPLASH3_CANTWRITE3;
			?></li>
			<li class="wssL1<?php
		if (empty($error[4])) {
			?> wssA0<?php
		}
			?>"><?php
		echo _WEBO_SPLASH3_HTACCESS_CHMOD3 .
			' ' .
			_WEBO_SPLASH3_HTACCESS_CHMOD4;
			?></li>
			<li class="wssL1<?php
		if (empty($error[5])) {
			?> wssA0<?php
		}
			?>"><?php
		echo _WEBO_SPLASH3_CANTWRITE4 .
			htmlspecialchars($config) .
			_WEBO_SPLASH3_HTACCESS_CHMOD;
			?></li>
		</ul>
	</div>
</div><?php
	} else {
?><div class="wssS">
	<div class="wssS1">
		<h2 class="wssB"><?php
		echo _WEBO_LOGIN_SUCCESS;
		?></h2>
	</div>
</div><?php
	}
} else {
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
		<a href="#wss_options" class="wssM2" title="<?php
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
		<a href="#wss_cache" class="wssM3" title="<?php
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
<div class="wssX"></div>
<div class="wssU">
	<dl class="wssU1">
		<dt class="wssU2"><?php
	echo _WEBO_OPTIONS_CONFIGURATION;
		?>:</dt>
		<dd class="wssU3"><?php
	echo $options['title'];
		?></dd>
		<dt class="wssU2"><?php
	echo _WEBO_OPTIONS_DESCRIPTION;
		?>:</dt>
		<dd class="wssU4"><?php
	echo $options['description'];
		?></dd>
	</dl>
	<ul class="wssO3">
		<li class="wssO4 wssO11">&mdash; <?php
	echo _WEBO_OPTIONS_APPLYCONFIG;;
		?></li>
		<li class="wssO4 wssO12">&mdash; <?php
	echo _WEBO_OPTIONS_EDITCONFIG;;
		?></li>
		<li class="wssO4 wssO13">&mdash; <?php
	echo _WEBO_OPTIONS_DELETECONFIG;;
		?></li>
	</ul>
	<dl class="wssU1">
		<dt class="wssU2"><?php
	echo _WEBO_OPTIONS_ALLCONFIGS;
		?>:</dt>
		<dd class="wssU5">
			<div class="wssH">
				<div class="wssRB">
					<span class="wssRB1"><span class="wssRB2">&bull;</span></span>
					<span class="wssRB3"><span class="wssRB4">&bull;</span></span>
				</div>
				<div class="wssH1">
					<ul class="wssU10">
						<li class="wssU11<?php
	if ($config == 'safe') {
						?> wssU12 wssU17<?php
	}
						?>">
							<a class="wssJ" href="javascript:_.f('safe');void(0)" rel="safe">
								<span class="wssU13" onclick="_.c('safe');return false" title="<?php
	echo _WEBO_OPTIONS_APPLYCONFIG;
								?>"></span>
								<span class="wssU14" onclick="_.e('safe');return false" title="<?php
	echo _WEBO_OPTIONS_EDITCONFIG;
								?>"></span><?php
	echo _WEBO_OPTIONS_SAFE;
							?></a>
						</li>
						<li class="wssU11<?php
	if ($config == 'optimal') {
						?> wssU12 wssU17<?php
	}
						?>">
							<a class="wssJ" href="javascript:_.f('optimal');void(0)" rel="optimal">
								<span class="wssU13" onclick="_.c('optimal');return false" title="<?php
	echo _WEBO_OPTIONS_APPLYCONFIG;
								?>"></span>
								<span class="wssU14" onclick="_.e('optimal');return false" title="<?php
	echo _WEBO_OPTIONS_EDITCONFIG;
								?>"></span><?php
	echo _WEBO_OPTIONS_OPTIMAL;
							?></a>
						</li>
						<li class="wssU11<?php
	if ($config == 'extreme') {
						?> wssU12 wssU17<?php
	}
						?>">
							<a class="wssJ" href="javascript:_.f('extreme');void(0)" rel="extreme">
								<span class="wssU13" onclick="_.c('extreme');return false" title="<?php
	echo _WEBO_OPTIONS_APPLYCONFIG;
								?>"></span>
								<span class="wssU14" onclick="_.e('extreme');return false" title="<?php
	echo _WEBO_OPTIONS_EDITCONFIG;
								?>"></span><?php
	echo _WEBO_OPTIONS_EXTREME;
							?></a>
						</li><?php
	if (count($configs)) {
		foreach ($configs as $c) {
						?><li class="wssU11<?php
			if ($config == $c) {
						?> wssU12 wssU17<?php
			}
						?>">
							<a class="wssJ" href="javascript:_.f('<?php
			echo $c;
							?>');void(0)" rel="<?php
			echo $c;
						?>">
								<span class="wssU13" onclick="_.c('<?php
			echo $c;
							?>');return false" title="<?php
			echo _WEBO_OPTIONS_APPLYCONFIG;
								?>"></span>
								<span class="wssU14" onclick="_.e('<?php
			echo $c;
							?>');return false" title="<?php
			echo _WEBO_OPTIONS_EDITCONFIG;
								?>"></span>
								<span class="wssU15" onclick="_.d('<?php
			echo $c;
							?>');return false" title="<?php
			echo _WEBO_OPTIONS_DELETECONFIG;
								?>"></span><span>&nbsp;</span></a>
						</li><?php
		}
	}
	$new = 'user' . (count($configs) ? count($configs) : '');
						?><li class="wssU11 wssU20">
							<a class="wssJ" href="javascript:_.e('<?php
	echo $new;
							?>');void(0)" rel="<?php
	echo $new;
							?>"><?php
	echo _WEBO_OPTIONS_CREATENEW;
							?></a>
						</li>
					</ul>
				</div>
				<div class="wssRB">
					<span class="wssRB5"><span class="wssRB6">&bull;</span></span>
					<span class="wssRB7"><span class="wssRB8">&bull;</span></span>
				</div>
			</div>
		</dd>
	</dl>
	<p class="wssI wssU18">
		<a href="javascript:_.c();void(0)" class="wssJ7"><?php
	echo _WEBO_OPTIONS_APPLY;
			?><span class="wssJ6"></span>
		</a>
		<a href="javascript:_.e();void(0)" class="wssJ5"><?php
	echo _WEBO_OPTIONS_EDIT;
			?><span class="wssJ6"></span>
		</a>
	</p>
	<h3 class="wssB"><?php
	echo _WEBO_OPTIONS_ATTENTION;
	?></h3>
	<p class="wssI"><?php
	echo _WEBO_OPTIONS_ATTENTION2;
	?></p>
</div>
<div class="wssA0 wssU0">
	<form method="post" enctype="multipart/form-data" action="#wss_options" class="wssC6">
		<dl class="wssU1">
			<dt class="wssU2">
				<label for="wss_title"><?php
	echo _WEBO_OPTIONS_CONFIGURATION;
				?>:</label>
			</dt>
			<dd class="wssU3">
				<input name="wss_title" id="wss_title" class="wssF" value="<?php
	echo htmlspecialchars($options['title']);
				?>"/><input name="wss_apply" id="wss_apply" type="hidden" value="1"/>
			</dd>
			<dt class="wssU2">
				<label for="wss_description"><?php
	echo _WEBO_OPTIONS_DESCRIPTION;
				?>:</label>
			</dt>
			<dd class="wssU4">
				<textarea rows="2" cols="80" class="wssF wssF1" id="wss_description" name="wss_description"><?php
	echo htmlspecialchars($options['description']);
				?></textarea>
			</dd>
		</dl>
		<ul class="wssO3"><?php
		foreach ($options as $key => $group) {
			if (empty($group['premium'])) {
			?><li class="wssO4<?php
				echo $key == 'combinecss' ? ' wssO5' : '';
			?>">
				<a href="#<?php
				echo $key;
				?>" class="wssJ"><?php
				echo constant('_WEBO_' . $key);
				?><span class="wssJ6"></span></a>
			</li><?php
			}
		}
		?></ul><?php
	foreach ($options as $key => $group) {
		?><fieldset id="<?php
		echo $key;
		?>" class="wssD9<?php
				echo $key != 'combinecss' ? ' wssA0' : '';
			?>"><dl class="wssD10"><?php
		foreach ($group as $option => $value) {
			if (is_array($value)) {
				if ($value['type'] != 'radio' || !empty($value['hidden'])) {
					$value['count'] = 1;
				}
				$i = 0;
				if ($value['type'] == 'radio') {
				?><dt class="wssD5"><label class="wssE" for="wss_<?php
					echo $option;
				?>1"><?php
					echo constant('_WEBO_' . $option);
				?> <a class="wssJ9" href="#" title="<?php
					echo constant('_WEBO_' . $option . '_HELP');
				?>">?</a></label></dt><?php
				}
				while ($i++ != $value['count']) {
					if (empty($value['hidden'])) {
				?><dt class="wssD<?php
						echo strpos($value['type'], 'text') !== false ? 1 : 5;
				?>"><label for="wss_<?php
						echo $option . ($value['type'] == 'radio' ? $i : '');
				?>" class="wssE"><?php
						echo constant('_WEBO_' . $option . ($value['count'] > 1 ? $i : ''));
						echo strpos($value['type'], 'text') !== false ? ':' : '';
						if ($value['type'] != 'radio') {
				?> <a class="wssJ9" href="#" title="<?php
							echo constant('_WEBO_' . $option . '_HELP');
				?>">?</a><?php
						}
				?></label></dt><?php
					}
					switch ($value['type']) {
						case 'text':
					?><dd class="wssD2"><input <?php
							echo empty($value['hidden']) ? '' : ' type="hidden"';
					?> value="<?php
							echo htmlspecialchars($value['value']);
					?>" name="wss_<?php
							echo $option;
					?>" id="wss_<?php
							echo $option;
					?>" class="wssF"/></dd><?php
							break;
						case 'smalltext':
					?><dd class="wssD2"><input <?php
							echo empty($value['hidden']) ? '' : ' type="hidden"';
					?> value="<?php
							echo htmlspecialchars($value['value']);
					?>" name="wss_<?php
							echo $option;
					?>" id="wss_<?php
							echo $option;
					?>" class="wssF wssF3"/></dd><?php
							break;
						case 'radio':
					?><dd class="wssD6"><input value="<?php
							echo $i;
					?>" type="<?php
							echo empty($value['hidden']) ? 'radio' : 'hidden';
					?>"<?php
							echo $value['value'] == $i-1 ? ' checked="checked"' : '';
					?>" name="wss_<?php
							echo $option;
					?>" id="wss_<?php
							echo $option . $i;
					?>" class="wssF"/></dd><?php
							break;
						case 'checkbox':
					?><dd class="wssD6"><input type="<?php
							echo empty($value['hidden']) ? 'checkbox' : 'hidden';
					?>"<?php
							echo $value['value'] ? ' checked="checked"' : '';
					?>" name="wss_<?php
							echo $option;
					?>" id="wss_<?php
							echo $option;
					?>" class="wssF"/></dd><?php
							break;
						case 'textarea':
							if (!empty($value['hidden'])) {
					?><input type="hidden" name="wss_<?php
								echo $option;
					?>" id="wss_<?php
								echo $option;
					?>" value="<?php
								echo htmlspecialchars($value['value']);
					?>"/><?php
							} else {
					?><dd class="wssD2"><textarea class="wssF wssF1" cols="30" rows="2" name="wss_<?php
								echo $option;
					?>" id="wss_<?php
								echo $option;
					?>"><?php
								echo htmlspecialchars($value['value']);
					?></textarea></dd><?php
							}
							break;
					}
				?></dd><?php
				}
			}
		}
			?></dl>
		</fieldset><?php
	}
?>
		<p class="wssI wssU18">
			<a href="javascript:_('.wssU')[0].style.display='block';_('.wssU0')[0].style.display='none';void(0)" class="wssJ8"><?php
	echo _WEBO_SPLASH1_BACK;
			?></a> <a href="javascript:_('#wss_apply')[0].value=0;_('.wssC6')[0].onsubmit({target:_('.wssC6')[0]},_.y);void(0)" class="wssJ5"><?php
	echo _WEBO_SPLASH1_SAVE;
			?>
				<span class="wssJ6"></span>
			</a> <a href="javascript:_('#wss_apply')[0].value=1;_('.wssC6')[0].onsubmit({target:_('.wssC6')[0]},_.y);void(0)" class="wssJ7"><?php
	echo _WEBO_OPTIONS_APPLY;
			?>
				<span class="wssJ6"></span>
			</a>
			<input type="hidden" name="wss_Submit" value="1"/>
		</p>
	</form><?php
}
?></div>