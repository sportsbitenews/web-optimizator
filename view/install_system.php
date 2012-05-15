<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs page with options (configuration)
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
?></span></a></li><li class="wssM1"><a href="#wss_system" class="wssM2" title="<?php
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
?></span></a></li></ul><?php
	if (!empty($success)) {
		switch ($success) {
			case 1:
?><div class="wssS wssS11"><div class="wssS1"><h2 class="wssB"><?php
				echo _WEBO_SYSTEM_SUCCESS;
?></h2></div></div><?php
				break;
			case 2:
?><div class="wssK wssS11"><div class="wssK1"><h2 class="wssB"><?php
				echo _WEBO_ERROR_TITLE;
?></h2><ul class="wssL"><?php
				foreach ($files_to_change as $file) {
?><li class="wssL1"><?php
					echo _WEBO_SPLASH3_CANTWRITE4 . preg_replace("/\\\/", "/", $document_root) . $file['file'];;
?></li><?php
				}
?></ul></div></div><?php
				break;
			case 3:
?><div class="wssS wssS12"><div class="wssS1"><h2 class="wssB"><?php
				echo _WEBO_LOGIN_SUCCESS;
?></h2></div></div><?php
				break;
			case 4:
?><div class="wssK wssS12"><div class="wssK1"><h2 class="wssB"><?php
				echo _WEBO_ERROR_TITLE;
?></h2><ul class="wssL"><?php
				if (!empty($error[1])) {
?><li class="wssL1"><?php
					echo _WEBO_SPLASH2_UNABLE . ' ' . $website_root . ' ' . _WEBO_SPLASH2_MAKESURE;
?></li><?php
				}
				if (!empty($error[2])) {
?><li class="wssL1"><?php
					echo _WEBO_SPLASH2_UNABLE . ' ' . $document_root . ' ' . _WEBO_SPLASH2_MAKESURE;
?></li><?php
				}
				if (!empty($error[3])) {
?><li class="wssL1"><?php
					echo _WEBO_SYSTEM_css_writable;
?></li><?php
				}
				if (!empty($error[4])) {
?><li class="wssL1"><?php
					echo _WEBO_SYSTEM_javascript_writable;
?></li><?php
				}
				if (!empty($error[5])) {
?><li class="wssL1"><?php
					echo _WEBO_SYSTEM_html_writable;
?></li><?php
				}
				if (!empty($error[6])) {
?><li class="wssL1"><?php
					echo _WEBO_SYSTEM_USERNAME;
?></li><?php
				}
				if (!empty($error[7])) {
?><li class="wssL1"><?php
					echo _WEBO_SYSTEM_EXTERNAL_HTACCESS;
?></li><?php
				}
				if (!empty($error[8])) {
?><li class="wssL1"><?php
					echo _WEBO_SPLASH3_CANTWRITE4 . realpath(dirname(__FILE__) . '/../') . '/.htpasswd';
?></li><?php
				}
				if (!empty($error[9])) {
?><li class="wssL1"><?php
					echo _WEBO_SPLASH3_CANTWRITE4 . realpath(dirname(__FILE__) . '/../') . '/.htaccess';
?></li><?php
				}
				if (!empty($error[10])) {
?><li class="wssL1"><?php
					echo _WEBO_SPLASH3_HTACCESS_CHMOD3 . ' ' . _WEBO_SPLASH3_HTACCESS_CHMOD4;
?></li><?php
				}
?></ul></div></div><?php
				break;
		}
	}
?><form method="post" enctype="multipart/form-data" action="#wss_system" class="wssC6 wssC7"><ul class="wssO3"><li class="wssO4 wssO5"><a href="#wssstatus" class="wssJ"><?php
	echo _WEBO_SYSTEM_STATUS;
?><span class="wssJ6"></span></a></li><li class="wssO4"><a href="#wsssettings" class="wssJ"><?php
	echo _WEBO_SYSTEM_SETTINGS;
?><span class="wssJ6"></span></a></li><li class="wssO4"><a href="#wsscache" class="wssJ"><?php
	echo _WEBO_DASHBOARD_CACHE;
?><span class="wssJ6"></span></a></li><?php
	if (!$custom) {
?><li class="wssO4"><a href="#updates" class="wssJ"><?php
		echo _WEBO_SYSTEM_UPDATES;
?><span class="wssJ6"></span></a></li><?php
	}
	if (!$internal) {
?><li class="wssO4"><a href="#wssinstall" class="wssJ"><?php
		echo _WEBO_SYSTEM_INSTALL;
?><span class="wssJ6"></span></a></li><?php
	}
?><li class="wssO4"><a href="#wssinfo" class="wssJ"><?php
	echo _WEBO_SYSTEM_PHPINFO;
?><span class="wssJ6"></span></a></li></ul><fieldset id="wssstatus" class="wssD9"><div class="wssD10"><h2 class="wssB"><?php
	echo _WEBO_DASHBOARD_STATUS;
?></h2><p class="wssI">WEBO Site SpeedUp <?php
	echo _WEBO_DASHBOARD_STATUS_IS;
?> <strong><?php
	if ($active) {
		echo _WEBO_DASHBOARD_STATUS_ACTIVE;
?></strong> (<?php
		echo _WEBO_DASHBOARD_STATUS_LIVE;
?>).</p><p class="wssI"><?php
		echo _WEBO_DASHBOARD_STATUS_WORKING;
?><a href="http://<?php
		echo $website;
?>/" class="wssJ"><?php
		echo _WEBO_DASHBOARD_STATUS_WORKING2;
?></a><?php
		echo _WEBO_DASHBOARD_STATUS_WORKING3;
?></p><p class="wssI"><a href="#wss_status" class="wssJ wssJ5"><?php
		echo _WEBO_DASHBOARD_STATUS_DISABLE;
	} else {
		echo _WEBO_DASHBOARD_STATUS_NOTACTIVE;
?></strong> (<?php
		echo _WEBO_DASHBOARD_STATUS_DEBUG;
?>)</p><p class="wssI"><?php
		echo _WEBO_DASHBOARD_STATUS_TESTING;
?></p><ul class="wssO7"><li class="wssO8"><?php
		echo _WEBO_DASHBOARD_STATUS_TESTING2;
?><a href="http://<?php
		echo $website;
?>/?web_optimizer_debug=1" class="wssJ"><?php
		echo _WEBO_DASHBOARD_STATUS_TESTING4;
?></a>,</li><li class="wssO8"><?php
		echo _WEBO_DASHBOARD_STATUS_COOKIE;
?><a href="javascript:_.doc.cookie='web_optimizer_debug=1;expires='+(new Date(new Date().getTime()+86400)).toGMTString()+';path=/;domain='+_.doc.domain+';';_.doc.location.href='http://'+_.doc.domain+'/'"><?php
		echo _WEBO_DASHBOARD_STATUS_COOKIE2;
?></a>.</li></ul><p class="wssI"><?php
		echo _WEBO_DASHBOARD_STATUS_TESTING3;
?></p><p class="wssI"><a href="#wss_status" class="wssJ wssJ7"><?php
		echo _WEBO_DASHBOARD_STATUS_ENABLE;
	}
?><span class="wssJ6"></span></a></p><h2 class="wssB"><?php
	echo _WEBO_SYSTEM_ISSUES;
?></h2><?php
	if ($e + $w + $i) {
?><ul class="wssO"><?php
		foreach ($errors as $key => $value) {
			if (empty($value)) {
?><li class="wssO1"><?php
				echo constant('_WEBO_SYSTEM_' . $key);
?> <a class="wssJ9" href="#" title="<?php
						echo str_replace('"', '&quot;', constant('_WEBO_SYSTEM_' . $key . '_HELP'));
?>">?</a></li><?php
			}
		}
		foreach ($warnings as $key => $value) {
			if (empty($value)) {
?><li class="wssO1 wssO2"><?php
				echo constant('_WEBO_SYSTEM_' . $key);
?> <a class="wssJ9" href="#" title="<?php
						echo str_replace('"', '&quot;', constant('_WEBO_SYSTEM_' . $key . '_HELP'));
?>">?</a></li><?php
			}
		}
		foreach ($infos as $key => $value) {
			if (empty($value)) {
?><li class="wssO1 wssO98"><?php
				echo constant('_WEBO_SYSTEM_' . $key);
?> <a class="wssJ9" href="#" title="<?php
						echo str_replace('"', '&quot;', constant('_WEBO_SYSTEM_' . $key . '_HELP'));
?>">?</a></li><?php
			}
		}
?></ul><?php
	} else {
?><p class="wssI0"><?php
		echo _WEBO_SYSTEM_NOPROBLEMS;
?></p><?php
	}
?></div></fieldset><fieldset id="wsssettings" class="wssD9 wssA0"><div class="wssD10"><h2 class="wssB"><?php
	echo _WEBO_SYSTEM_SETTINGS_TITLE;
?></h2><dl><dt class="wssD1"><label class="wssE" for="wss_host"><?php
	echo _WEBO_host;
?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_host_HELP;
?>">?</a></label></dt><dd class="wssD2"><input value="<?php
	echo htmlspecialchars($host);
?>" name="wss_host" id="wss_host" class="wssF"/></dd><dt class="wssD1"><label class="wssE" for="wss_website_root"><?php
	echo _WEBO_website_root;
?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_website_root_HELP;
?>">?</a></label></dt><dd class="wssD2<?php
	if (!empty($error[1])) {
?> wssD8<?php
	}
?>"><span class="wssD3">*</span><input value="<?php
	echo htmlspecialchars($website_root);
?>" name="wss_website_root" id="wss_website_root" class="wssF"/></dd><dt class="wssD1"><label class="wssE" for="wss_document_root"><?php
	echo _WEBO_document_root;
?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_document_root_HELP;
?>">?</a></label></dt><dd class="wssD2<?php
	if (!empty($error[2])) {
?> wssD8<?php
	}
?>"><span class="wssD3">*</span><input value="<?php
	echo htmlspecialchars($document_root);
?>" name="wss_document_root" id="wss_document_root" class="wssF"/></dd><dt class="wssD1"><label class="wssE" for="wss_css_cachedir"><?php
	echo _WEBO_css_cachedir;
?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_css_cachedir_HELP;
?>">?</a></label></dt><dd class="wssD2<?php
	if (!empty($error[3])) {
?> wssD8<?php
	}
?>"><span class="wssD3">*</span><input value="<?php
	echo htmlspecialchars($css_cachedir);
?>" name="wss_css_cachedir" id="wss_css_cachedir" class="wssF"/></dd><dt class="wssD1"><label class="wssE" for="wss_javascript_cachedir"><?php
	echo _WEBO_javascript_cachedir;
?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_javascript_cachedir_HELP;
?>">?</a></label></dt><dd class="wssD2<?php
	if (!empty($error[4])) {
?> wssD8<?php
	}
?>"><span class="wssD3">*</span><input value="<?php
	echo htmlspecialchars($javascript_cachedir);
?>" name="wss_javascript_cachedir" id="wss_javascript_cachedir" class="wssF"/></dd><dt class="wssD1"><label class="wssE" for="wss_html_cachedir"><?php
	echo _WEBO_html_cachedir;
?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_html_cachedir_HELP;
?>">?</a></label></dt><dd class="wssD2<?php
	if (!empty($error[5])) {
?> wssD8<?php
	}
?>"><span class="wssD3">*</span><input value="<?php
	echo htmlspecialchars($html_cachedir);
?>" name="wss_html_cachedir" id="wss_html_cachedir" class="wssF"/></dd><dt class="wssD1"><label class="wssE" for="wss_encoding"><?php
	echo _WEBO_charset;
?> <a class="wssJ9" href="#" title="<?php
						echo _WEBO_charset_HELP;
?>">?</a></label></dt><dd class="wssD2"><input value="<?php
	echo htmlspecialchars($charset);
?>" name="wss_encoding" id="wss_encoding" class="wssF"/></dd><?php
	if ($premium > 1) {
?><dt class="wssD1"><label class="wssE" for="wss_currency"><?php
		echo _WEBO_currency;
?> <a class="wssJ9" href="#" title="<?php
		echo _WEBO_currency_HELP;
?>">?</a></label></dt><dd class="wssD2"><input value="<?php
		echo htmlspecialchars($currency);
?>" name="wss_currency" id="wss_currency" class="wssF"/></dd><?php
		if (!$internal) {
?><dt class="wssD5"><label class="wssE" for="wss_htaccess_access"><?php
			echo _WEBO_htaccess_access;
?> <a class="wssJ9" href="#" title="<?php
			echo _WEBO_htaccess_access_HELP;
?>">?</a></label></dt><dd class="wssD6"><input type="checkbox"<?php
			echo $htpasswd ? ' checked="checked"' : '';
?> name="wss_htaccess_access" id="wss_htaccess_access" class="wssF"/></dd><dt class="wssD1"><label class="wssE" for="wss_username"><?php
			echo _WEBO_htaccess_login;
?> <a class="wssJ9" href="#" title="<?php
			echo _WEBO_htaccess_login_HELP;
?>">?</a></label></dt><dd class="wssD2<?php
			if (!empty($error[6])) {
?> wssD8<?php
			}
?>"><span class="wssD3"></span><input value="<?php
			echo htmlspecialchars($username);
?>" name="wss_username" id="wss_username" class="wssF"/></dd><?php
		}
?><dt class="wssD1"><label class="wssE" for="wss_external_scripts_user"><?php
		echo _WEBO_external_scripts_user;
?> <a class="wssJ9" href="#" title="<?php
		echo _WEBO_external_scripts_user_HELP;
?>">?</a></label></dt><dd class="wssD2<?php
		if (!empty($error[7])) {
?> wssD8<?php
		}
?>"><span class="wssD3"></span><input value="<?php
		echo htmlspecialchars($external_scripts_user);
?>" name="wss_external_scripts_user" id="wss_external_scripts_user" class="wssF"/></dd><dt class="wssD1"><label class="wssE" for="wss_external_scripts_pass"><?php
		echo _WEBO_external_scripts_pass;
?> <a class="wssJ9" href="#" title="<?php
		echo _WEBO_external_scripts_pass_HELP;
?>">?</a></label></dt><dd class="wssD2<?php
		if (!empty($error[7])) {
?> wssD8<?php
		}
?>"><span class="wssD3"></span><input value="<?php
	echo htmlspecialchars($external_scripts_pass);
?>" name="wss_external_scripts_pass" id="wss_external_scripts_pass" class="wssF"/></dd><?php
	}
?><dt class="wssD1"><label class="wssE" for="wss_restricted"><?php
		echo _WEBO_restricted;
?> <a class="wssJ9" href="#" title="<?php
		echo _WEBO_restricted_HELP;
?>">?</a></label></dt><dd class="wssD2"><textarea name="wss_restricted" id="wss_restricted" cols="80" rows="2" class="wssF wssF1"><?php
		echo htmlspecialchars($restricted);
?></textarea></dd></dl><p class="wssI"><a href="javascript:var a=_('.wssC6')[0];if(_.b.ie){_[a.name]({target:a})}else{a.onsubmit({target:a})}void(0)" class="wssJ5"><?php
	echo _WEBO_SPLASH1_SAVE;
?><span class="wssJ6"></span></a><input type="hidden" name="wss_Submit" value="1"/></p></div></fieldset>
<fieldset id="wsscache" class="wssD9 wssA0 wssC4"><div class="wssD10"><h2 class="wssB"><?php
	echo _WEBO_DASHBOARD_CACHE;
?></h2><table class="wssT wssT0"><col width="38%"/><col width="18%"/><col width="17%"/><col width="10%"/><col width="16%"/><thead class="wssT5"><tr class="wssT6"><th class="wssT7"><?php
	echo _WEBO_CACHE_TYPE;
?></th><th class="wssT7"><?php
	echo _WEBO_GZIP_SIZE;
?></th><th class="wssT7"><?php
	echo _WEBO_DASHBOARD_CACHE_NUMBER;
?></th></tr></thead><tfoot class="wssT1"><tr class="wssT8 wssT19"><th class="wssT9"><?php
	echo _WEBO_CACHE_TOTAL;
?>:</th><th class="wssT9"><?php
	echo preg_replace("@([0-9])([0-9][0-9][0-9])$@", "$1 $2", round($size / 1024)) . ' ' . _WEBO_LOGIN_EFFICIENCY_KB;
?></th><th class="wssT9"><?php
	echo preg_replace("@([0-9])([0-9][0-9][0-9])$@", "$1 $2", $total);
?></th></tr></tfoot><tbody><?php
	$i = 0;
	foreach ($files as $index => $group) {
		foreach ($group as $mask => $file) {
			if (count($file) && $file[1]) {
?><tr class="wssT8 wssT1<?php
				echo $i%2 ? 2 : 1;
?>"><td class="wssT9"><?php
				echo constant('_WEBO_DASHBOARD_CACHE_' . $index) . ' (' . str_replace('*', '', $mask) . ')';
?></td><td class="wssT9"><?php
				echo preg_replace("@([0-9])([0-9][0-9][0-9])$@", "$1 $2", round($file[0] / 1024)) . ' ' . _WEBO_LOGIN_EFFICIENCY_KB;
?></td><td class="wssT9"><?php
				echo $file[1];
?></td></tr><?php
				$i++;
			}
		}
	}
?></tbody></table><p class="wssI"><a href="#wss_renew" class="wssJ7"><?php
	echo _WEBO_DASHBOARD_CACHE_REFRESH;
?><span class="wssJ6"></span></a></p></div></fieldset><?php
	if (!$custom) {
?><fieldset id="updates" class="wssD9 wssA0"><div class="wssD10"><h2 class="wssB"><?php
		echo _WEBO_SYSTEM_UPDATES_TITLE;
?></h2><dl><dt class="wssD5"><label class="wssE" for="wss_showbeta"><?php
		echo _WEBO_showbeta;
?> <a class="wssJ9" href="#" title="<?php
		echo _WEBO_showbeta_HELP;
?>">?</a></label></dt><dd class="wssD6"><input type="checkbox"<?php
		echo $showbeta ? ' checked="checked"' : '';
?> name="wss_showbeta" id="wss_showbeta" title="<?php
		echo $version;
?>" class="wssF" onclick="_('#wss_beta')[0].style.display=this.checked?'block':'none'"/></dd></dl><?php
		if (round(str_replace(".", "", $version_new)) > round(str_replace(".", "", $version))) {
?><div id="wss_upd" title="<?php
			echo _WEBO_LOGIN_VERSION . ' ' . $version_new;
?>"></div><?php
		} else {
?><p class="wssI"><?php
			echo _WEBO_SYSTEM_NOUPDATES;
?> (<?php
			echo $version;
?>).</p><?php
		}
		if (count($versions)) {
?><p class="wssI"><a href="#wss_rollback" class="wssJ5" onclick="_.a(this)"><?php
			echo _WEBO_SYSTEM_ROLLBACK;
?><span class="wssJ6"></span></a> <select name="wss_version_stable" id="wss_version_stable"><?php
			foreach ($versions as $version_stable) {
?><option value="<?php
				echo $version_stable;
?>"><?php
				echo $version_stable;
?></option><?php
			}
?></select></p><?php
		}
?><div id="wss_beta"<?php
		if (!$showbeta) {
?> class="wssA0"<?php
		}
?> title="<?php
		echo _WEBO_LOGIN_VERSION . ' ' . $version_beta;
?>"></div></div></fieldset><?php
	}
	if (!$internal) {
?><fieldset id="wssinstall" class="wssD9 wssA0"><div class="wssD10"><h2 class="wssB"><?php
		echo _WEBO_SYSTEM_INSTALL_TITLE;
?></h2><p class="wssI"><?php
		echo _WEBO_SYSTEM_INSTALLED;
?>: <?php
		echo htmlspecialchars($cms_version);
?></p><p class="wssI"><?php
		echo _WEBO_SYSTEM_INSTALLINFO;
?></p><ol class="wssO7"><?php
		foreach ($files_to_change as $file) {
?><li class="wssO8"><?php
				if (strpos($file['mode'], 'start') !== false && empty($file['location'])) {
?><p class="wssI"><?php
					echo _WEBO_SPLASH3_TOFILE2;
?> <code><?php
					echo preg_replace("/\\\/", "/", $document_root) . $file['file'];
?></code>:</p><textarea cols="80" rows="5" class="wssF wssF1">&lt;?php<?php
					if ($file['mode'] == 'start') {
?>require('<?php
					echo preg_replace("/\\\/", "/", $current_directory);
?>web.optimizer.php');<?php
					} else {
						echo '/* WEBO Site SpeedUp */$not_buffered=1; require(\'' . preg_replace("/\\\/", "/", $current_directory) . '/web.optimizer.php\');function weboptimizer_shutdown($content){if(!empty($content)){$not_buffered=1; require(\'' . preg_replace("/\\\/", "/", $current_directory) . 'web.optimizer.php\'); if(!empty($web_optimizer)){$weboptimizer_content=$web_optimizer->finish($content);} if(!empty($weboptimizer_content)){$content=$weboptimizer_content;}return $content;}}ob_start(\'weboptimizer_shutdown\');';
					}
?>?&gt;</textarea><?php
				} elseif ($file['mode'] == 'finish' && $file['location'] == 'end') {
?><p><?php
					echo _WEBO_SPLASH3_TOFILE3;
?> <code><?php
					echo preg_replace("/\\\/", "/", $document_root) . $file['file'];
?></code>:</p><textarea cols="80" rows="2" class="wssF wssF1"><?php
					if (empty($file['text'])) {
?>$web_optimizer->finish();<?php
					} else {
						echo $file['text'];
					}
?></textarea><?php
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
					} elseif ($file['mode'] == 'start_shutdown') {
						echo '/* WEBO Site SpeedUp */$not_buffered=1; require(\'' . preg_replace("/\\\/", "/", $current_directory) . '/web.optimizer.php\');function weboptimizer_shutdown($content){if(!empty($content)){$not_buffered=1; require(\'' . preg_replace("/\\\/", "/", $current_directory) . 'web.optimizer.php\'); if(!empty($web_optimizer)){$weboptimizer_content=$web_optimizer->finish($content);} if(!empty($weboptimizer_content)){$content=$weboptimizer_content;}return $content;}}ob_start(\'weboptimizer_shutdown\');';
					} else {
						if (empty($file['text'])) {
?>$web_optimizer->finish();<?php
						} else {
							echo $file['text'];
						}
					}
?></textarea><?php
				}
?></li><?php
		}
?></ol><p class="wssI"><?php
		echo _WEBO_SYSTEM_INSTALLINFO2;
?></p><p class="wssI"><a href="#wss_install" class="wssJ7"><?php
		echo _WEBO_DASHBOARD_INSTALL;
?><span class="wssJ6"></span></a><a href="#wss_uninstall" class="wssJ5"><?php
		echo _WEBO_SPLASH1_UNINSTALL;
?><span class="wssJ6"></span></a></p></div></fieldset><?php
	}
?><fieldset id="wssinfo" class="wssD9 wssA0"><iframe class="wssD11" src="data:text/html;base64,<?php
	echo $phpinfo;
?>"/></fieldset></form><div class="wss_h"><h4 class="wss_l"><span id="wss_prog">0</span>%<span class="wss_m"></span></h4><p id="wss_mess"></p><span id="wss_mess1" class="wssA0"><?php
	echo _WEBO_UPGRADE_FILE;
?></span></div>