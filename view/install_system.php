<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs page with options (configuration)
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
		<a href="#wss_system" class="wssM2" title="<?php
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
?></ul><?php
	if (!empty($success)) {
		if ($success == 1) {
?><div class="wssS"><div class="wssS1"><h2 class="wssB"><?php
			echo _WEBO_SYSTEM_SUCCESS;
		?></h2></div></div><?php
		}
		if ($success == 2) {
?><div class="wssK">
	<div class="wssK1">
		<h2 class="wssB"><?php
		echo _WEBO_ERROR_TITLE;
		?></h2>
		<ul class="wssL"><?php
		foreach ($files_to_change as $file) {
		?>
			<li class="wssL1"><?php
			echo _WEBO_SPLASH3_CANTWRITE4 . preg_replace("/\\\/", "/", $document_root) . $file['file'];;
			?></li><?php
		}
		?></ul>
	</div>
</div><?php
		}
	} 
?><form method="post" enctype="multipart/form-data" action="#wss_system" class="wssC6 wssC7">
	<ul class="wssO3">
		<li class="wssO4 wssO5">
			<a href="#status" class="wssJ">
				<?php
	echo _WEBO_SYSTEM_STATUS;
				?>
				<span class="wssJ6"></span>
			</a>
		</li>
		<li class="wssO4">
			<a href="#settings" class="wssJ">
				<?php
	echo _WEBO_SYSTEM_SETTINGS;
				?>
				<span class="wssJ6"></span>
			</a>
		</li>
		<li class="wssO4">
			<a href="#updates" class="wssJ">
				<?php
	echo _WEBO_SYSTEM_UPDATES;
				?>
				<span class="wssJ6"></span>
			</a>
		</li>
		<li class="wssO4">
			<a href="#install" class="wssJ">
				<?php
	echo _WEBO_SYSTEM_INSTALL;
				?>
				<span class="wssJ6"></span>
			</a>
		</li>
	</ul>
	<fieldset id="status" class="wssD9">
		<div class="wssD10"><h2 class="wssB"><?php
	echo _WEBO_DASHBOARD_STATUS;
			?></h2>
			<p class="wssI">WEBO Site SpeedUp <?php
		echo _WEBO_DASHBOARD_STATUS_IS;
			?> <strong><?php
	if ($active) {
		echo _WEBO_DASHBOARD_STATUS_ACTIVE;
			?></strong> (<?php
		echo _WEBO_DASHBOARD_STATUS_LIVE;
			?>).</p>
			<p class="wssI"><?php
		echo _WEBO_DASHBOARD_STATUS_WORKING;
			?></p>
			<p class="wssI"><a href="#wss_status" class="wssJ wssJ5"><?php
		echo _WEBO_DASHBOARD_STATUS_DISABLE;
	} else {
		echo _WEBO_DASHBOARD_STATUS_NOTACTIVE;
			?></strong> (<?php
		echo _WEBO_DASHBOARD_STATUS_DEBUG;
			?>)</p>
			<p class="wssI"><?php
		echo _WEBO_DASHBOARD_STATUS_TESTING;
			?></p><ul class="wssO7"><li class="wssO8"><a href="http://<?php
		echo $website;
			?>/?web_optimizer_debug=1" class="wssJ"><?php
		echo _WEBO_DASHBOARD_STATUS_TESTING2;
			?></a>,</li><li class="wssO8"><a href="javascript:_.doc.cookie='web_optimizer_debug=1;expires='+(new Date(new Date().getTime()+86400)).toGMTString()+';path=/;domain='+_.doc.domain+';';_.doc.location.href='http://'+_.doc.domain+'/'"><?php
		echo _WEBO_DASHBOARD_STATUS_COOKIE;
			?></a>.</li></ul><p class="wssI"><?php
		echo _WEBO_DASHBOARD_STATUS_TESTING3;
			?></p>
			<p class="wssI"><a href="#wss_status" class="wssJ wssJ7"><?php
		echo _WEBO_DASHBOARD_STATUS_ENABLE;
	}
		?><span class="wssJ6"></span></a></p><h2 class="wssB"><?php
	echo _WEBO_SYSTEM_ISSUES;
			?></h2><?php
	if ($e + $w) {
?><ul class="wssO"><?php
		foreach ($errors as $key => $value) {
			if (empty($value)) {
?><li class="wssO1"><?php
				echo constant("_WEBO_SYSTEM_" . $key);
?></li><?php
			}
		}
		foreach ($warnings as $key => $value) {
			if (empty($value)) {
?><li class="wssO1 wssO2"><?php
				echo constant("_WEBO_SYSTEM_" . $key);
?></li><?php
			}
		}
?></ul><?php
	} else {
?><p class="wssI0"><?php
		echo _WEBO_SYSTEM_NOPROBLEMS;
?></p><?php
	}
	?></div></fieldset>
	<fieldset id="settings" class="wssD9 wssA0">
		<div class="wssD10"><h2 class="wssB"><?php
	echo _WEBO_SYSTEM_SETTINGS_TITLE;
			?></h2>
		<dl>
			<dt class="wssD1">
				<label class="wssE" for="wss_host"><?php
	echo _WEBO_host;
				?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_host_HELP;
			?>">?</a>
				</label>
			</dt>
			<dd class="wssD2"><input value="<?php
	echo htmlspecialchars($host);
				?>" name="wss_host" id="wss_host" class="wssF"/>
			</dd>
			<dt class="wssD1">
				<label class="wssE" for="wss_website_root"><?php
	echo _WEBO_website_root;
				?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_website_root_HELP;
			?>">?</a>
				</label>
			</dt>
			<dd class="wssD2"><input value="<?php
	echo htmlspecialchars($website_root);
				?>" name="wss_website_root" id="website_root" class="wssF"/>
			</dd>
			<dt class="wssD1">
				<label class="wssE" for="wss_document_root"><?php
	echo _WEBO_document_root;
				?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_document_root_HELP;
			?>">?</a>
				</label>
			</dt>
			<dd class="wssD2"><input value="<?php
	echo htmlspecialchars($document_root);
				?>" name="wss_document_root" id="wss_document_root" class="wssF"/>
			</dd>
			<dt class="wssD1">
				<label class="wssE" for="wss_css_cachedir"><?php
	echo _WEBO_css_cachedir;
				?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_css_cachedir_HELP;
			?>">?</a>
				</label>
			</dt>
			<dd class="wssD2"><input value="<?php
	echo htmlspecialchars($css_cachedir);
				?>" name="wss_css_cachedir" id="wss_css_cachedir" class="wssF"/>
			</dd>
			<dt class="wssD1">
				<label class="wssE" for="wss_javascript_cachedir"><?php
	echo _WEBO_javascript_cachedir;
				?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_javascript_cachedir_HELP;
			?>">?</a>
				</label>
			</dt>
			<dd class="wssD2"><input value="<?php
	echo htmlspecialchars($javascript_cachedir);
				?>" name="wss_host" id="wss_host" class="wssF"/>
			</dd>
			<dt class="wssD1">
				<label class="wssE" for="wss_html_cachedir"><?php
	echo _WEBO_html_cachedir;
				?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_html_cachedir_HELP;
			?>">?</a>
				</label>
			</dt>
			<dd class="wssD2"><input value="<?php
	echo htmlspecialchars($html_cachedir);
				?>" name="wss_html_cachedir" id="wss_html_cachedir" class="wssF"/>
			</dd>
			<dt class="wssD5">
				<label class="wssE" for="wss_htpasswd"><?php
	echo _WEBO_htaccess_access;
				?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_htaccess_access_HELP;
			?>">?</a>
				</label>
			</dt>
			<dd class="wssD6"><input type="checkbox"<?php
							echo $htpasswd ? ' checked="checked"' : '';
				?> name="wss_htpasswd" id="wss_htpasswd" class="wssF"/>
			</dd>
			<dt class="wssD1">
				<label class="wssE" for="wss_username"><?php
	echo _WEBO_htaccess_login;
				?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_htaccess_login_HELP;
			?>">?</a>
				</label>
			</dt>
			<dd class="wssD2"><input value="<?php
	echo htmlspecialchars($username);
				?>" name="wss_username" id="wss_username" class="wssF"/>
			</dd>
		</dl>
	<!-- p class="wssI">
		<input type="submit" value="<?php
	echo _WEBO_SPLASH1_SAVE;
		?>" class="wssG"/><input type="hidden" value="1" name="wss_Submit"/>
	</p --></div></fieldset>
	<fieldset id="updates" class="wssD9 wssA0">
		<div class="wssD10">
			<h2 class="wssB"><?php
	echo _WEBO_SYSTEM_UPDATES_TITLE;
			?></h2>
			<dl>
				<dt class="wssD5">
					<label class="wssE" for="wss_showbeta"><?php
	echo _WEBO_showbeta;
						?> <a class="wssJ9" href="#" title="<?php
	echo _WEBO_showbeta_HELP;
						?>">?</a>
					</label>
				</dt>
				<dd class="wssD6">
					<input type="checkbox"<?php
							echo $showbeta ? ' checked="checked"' : '';
					?> name="wss_showbeta" id="wss_showbeta" class="wssF"/>
				</dd>
			</dl>
		</div>
	</fieldset>
	<fieldset id="install" class="wssD9 wssA0">
		<div class="wssD10">
			<h2 class="wssB"><?php
	echo _WEBO_SYSTEM_INSTALL_TITLE;
			?></h2>
			<p class="wssI"><?php
	echo _WEBO_SYSTEM_INSTALLED;
			?>: <?php
	echo htmlspecialchars($cms_version);
			?></p>
			<p class="wssI"><?php
	echo _WEBO_SYSTEM_INSTALLINFO;
			?></p>
			<ol class="wssO7"><?php
		foreach ($files_to_change as $file) {
?><li class="wssO8"><?php
				if ($file['mode'] == 'start' && empty($file['location'])) {
?><p class="wssI"><?php
					echo _WEBO_SPLASH3_TOFILE2;
?> <code><?php
					echo preg_replace("/\\\/", "/", $document_root) . $file['file'];
?></code> <?php
					echo _WEBO_SPLASH3_ADD2;
?>:</p><textarea cols="80" rows="2" class="wssF wssF1">&lt;?php
require('<?php
					echo preg_replace("/\\\/", "/", $current_directory);
?>web.optimizer.php');
?&gt;</textarea><?php
				} elseif ($file['mode'] == 'finish' && $file['location'] == 'end') {
?><p><?php
					echo _WEBO_SPLASH3_TOFILE3;
?> <code><?php
					echo preg_replace("/\\\/", "/", $document_root) . $file['file'];
?></code> <?php
					echo _WEBO_SPLASH3_ADD2;
?>:</p><textarea cols="80" rows="2" class="wssF wssF1">$web_optimizer->finish();</textarea><?php
				} else {
?><p><?php
					echo _WEBO_SPLASH3_TOFILE;
?> <code><?php
					echo preg_replace("/\\\/", "/", $document_root) . $file['file'];
?></code> <?php
					echo _WEBO_SPLASH3_AFTERSTRING;
?></p><textarea cols="80" rows="2" class="wssF wssF1"><?php
					echo $file['location'];
?></textarea><p><?php
					echo _WEBO_SPLASH3_ADD2;
?></p><textarea cols="80" rows="2" class="wssF wssF1"><?php 
					if (!empty($file['global'])) {
?>global $web_optimizer;<?php
					}
					if ($file['mode'] == 'start') {
?>require('<?php
						echo preg_replace("/\\\/", "/", $current_directory);
?>web.optimizer.php');<?php
					} else {
?>$web_optimizer->finish();<?php
					}
?></textarea><?php
				}
?></li><?php
		}
?></ol><p class="wssI"><?php
	echo _WEBO_SYSTEM_INSTALLINFO2;
			?></p><p class="wssI">
		<a href="#wss_install" class="wssJ7">
			<?php
	echo _WEBO_DASHBOARD_INSTALL;
			?>
			<span class="wssJ6"></span>
		</a><a href="#wss_uninstall" class="wssJ5">
			<?php
	echo _WEBO_SPLASH1_UNINSTALL;
			?>
			<span class="wssJ6"></span>
		</a>
	</p>
		</div>
	</fieldset>
</form>