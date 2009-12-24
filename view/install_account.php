<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs about page (general product information)
 *
 **/
?><noscript><?php
	echo _WEBO_NEW_NOSCRIPT;
?></noscript><ul class="wssM"><li class="wssM1">
		<a href="#wss_dashboard" class="wssM3" title="<?php
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
		<a href="#wss_cache" class="wssM3" title="<?php
	echo _WEBO_DASHBOARD_CACHE_TITLE;
		?>">
			<span class="wssM5"></span>
			<span class="wssM4 wssM13"><?php
	echo _WEBO_DASHBOARD_CACHE;
			?></span>
		</a>
	</li><li class="wssM1">
		<a href="#wss_account" class="wssM2" title="<?php
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
<?php
	if (!empty($submit) && !count($error)) {
?><div class="wssS">
	<div class="wssS1">
		<h2 class="wssB"><?php
		echo _WEBO_LOGIN_SUCCESS;
		?></h2>
	</div>
</div><?php
	} elseif (count($error)) {
?><div class="wssK">
	<div class="wssK1">
		<h2 class="wssB"><?php
	echo _WEBO_ERROR_TITLE;
		?></h2>
		<ul class="wssL">
			<li class="wssL1<?php
			if (empty($error[1])) {
			?> wssA0<?php
			}
			?>"><?php
	echo _WEBO_PASSWORD_ENTERPASSWORD;
			?></li><li class="wssL1<?php
			if (empty($error[2])) {
			?> wssA0<?php
			}
			?>"><?php
	echo _WEBO_LOGIN_ENTEREMAIL;
			?></li><li class="wssL1<?php
			if (empty($error[3])) {
			?> wssA0<?php
			}
			?>"><?php
	echo _WEBO_PASSWORD_DIFFERENT;
			?></li>
		</ul>
	</div>
</div><?php
	}
?><form action="#wss_account" method="post" class="wssC wssC3" enctype="multipart/form-data"><dl class="wssD"><dt class="wssD1"><label for="wss_license" class="wssE"><?php 
	echo _WEBO_LOGIN_LICENSE;
?>:</label></dt><dd class="wssD2"><input id="wss_license" name="wss_license" title="<?php
	echo _WEBO_LOGIN_ENTERLICENSE;
?>" class="wssF" value="<?php
	if (empty($submit) || !empty($license)) {
		echo htmlspecialchars($license);
	}?>"/><input type="hidden" name="wss_premium" id="wss_premium" value="<?php
		echo round($premium);
	?>"/>
		</dd>
		<dt class="wssD1">
			<label for="wss_name" class="wssE"><?php 
	echo _WEBO_LOGIN_USERNAME;
?>:</label>
		</dt>
		<dd class="wssD2">
			<input id="wss_name" name="wss_name" title="<?php
	echo _WEBO_LOGIN_ENTERLOGIN;
?>" class="wssF" value="<?php
	if (empty($submit) || !empty($name)) {
		echo htmlspecialchars($name);
	}
			?>"/>
		</dd>
		<dt class="wssD1">
			<label for="wss_email" class="wssE"><?php 
	echo _WEBO_LOGIN_EMAIL;
?>:</label>
		</dt>
		<dd class="wssD2<?php
	if (!empty($error[2])) {
			?> wssD8<?php
	}
			?>">
			<span class="wssD3">*</span>
			<input id="wss_email" name="wss_email" title="<?php
	echo _WEBO_LOGIN_ENTEREMAIL;
?> <?php
	echo _WEBO_LOGIN_EMAILNOTICE;
			?>" class="wssF" value="<?php
	if (empty($submit) || !empty($email)) {
		echo htmlspecialchars($email);
	}
			?>"/>
			<span class="wssD4"><?php
	echo _WEBO_LOGIN_EMAILNOTICE;
			?></span>
		</dd>
		<dt class="wssD1">
			<label for="wss_password" class="wssE"><?php 
	echo _WEBO_PASSWORD_OLD;
?>:</label>
		</dt>
		<dd class="wssD2<?php
	if (!empty($error[1])) {
			?> wssD8<?php
	}
			?>">
			<span class="wssD3">*</span>
			<input type="password" id="wss_password" name="wss_password" title="<?php
	echo _WEBO_PASSWORD_ENTERPASSWORD;
?>" class="wssF"/>
		</dd>
		<dt class="wssD1">
			<label for="wss_new" class="wssE"><?php 
	echo _WEBO_PASSWORD_NEW;
?>:</label>
		</dt>
		<dd class="wssD2<?php
	if (!empty($error[3])) {
			?> wssD8<?php
	}
			?>">
			<span class="wssD3"> </span>
			<input type="password" id="wss_new" name="wss_new" title="<?php
	echo _WEBO_PASSWORD_ENTERPASSWORDNEW;
?>" class="wssF"/>
		</dd>
		<dt class="wssD1">
			<label for="wss_confirm" class="wssE"><?php 
	echo _WEBO_PASSWORD_CONFIRM;
?>:</label>
		</dt>
		<dd class="wssD2<?php
	if (!empty($error[3])) {
			?> wssD8<?php
	}
			?>">
			<span class="wssD3"> </span>
			<input type="password" id="wss_confirm" name="wss_confirm" title="<?php
	echo _WEBO_PASSWORD_ENTERPASSWORDCONFIRM;
?>" class="wssF"/>
		</dd>
<dt class="wssD5">
			<label for="wss_allow" class="wssE1"><?php 
	echo _WEBO_LOGIN_ALLOW;
?>:</label>
		</dt>
		<dd class="wssD6">
			<input type="checkbox" id="wss_allow" name="wss_allow" title="<?php
	echo _WEBO_LOGIN_ALLOW;
?>"<?php
	if (!empty($allow)) {
		?> checked="checked"<?php
	}?>/>
		</dd>
	</dl>
	<p class="wssD">
		<input type="submit" value="<?php
	echo _WEBO_ABOUT_SEND;
?>" class="wssG"/><input type="hidden" name="wss_page" value="install_account"/><input type="hidden" name="wss_Submit" value="1"/>
	</p>
</form>
<div class="wssH wssH3 wssH4">
	<div class="wssRB">
		<span class="wssRB1"><span class="wssRB2">&bull;</span></span>
		<span class="wssRB3"><span class="wssRB4">&bull;</span></span>
	</div>
	<div class="wssH">
		<h2 class="wssB"><?php
	echo _WEBO_ABOUT_ABOUT;
		?></h2>
		<ul class="wssO">
			<li class="wssO4"><a href="http://www.web-optimizer.us/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ"><?php
	echo _WEBO_DASHBOARD_LINKS_WEBSITE;
			?></a></li>
			<li class="wssO4"><a href="http://www.web-optimizer.us/web-optimizer/features.html?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ"><?php
	echo _WEBO_ABOUT_FEATURES;
			?></a></li>
			<li class="wssO4"><a href="http://www.web-optimizer.us/web-optimizer/benefits.html?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ"><?php
	echo _WEBO_ABOUT_BENEFITS;
			?></a></li>
			<li class="wssO4"><a href="http://www.web-optimizer.us/web-optimizer/requirements.html?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ"><?php
	echo _WEBO_ABOUT_REQUIREMENTS;
			?></a></li>
			<li class="wssO4"><a href="http://www.web-optimizer.us/web-optimizer/buzz.html?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ"><?php
	echo _WEBO_ABOUT_BUZZ;
			?></a></li>
			<li class="wssO4"><a href="#wss_promo" class="wssJ"><?php
	echo _WEBO_SPLASH2_COMPARISON;
			?></a></li>
		</ul>
	</div>
	<div class="wssH1">
		<h2 class="wssB"><?php
	echo _WEBO_ABOUT_SUPPORT;
		?></h2>
		<ul class="wssO">
			<li class="wssO4"><a href="http://code.google.com/p/web-optimizator/w/list?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ"><?php
	echo _WEBO_DASHBOARD_LINKS_UG;
			?></a></li>
			<li class="wssO4"><a href="http://code.google.com/p/web-optimizator/issues/list?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ"><?php
	echo _WEBO_DASHBOARD_LINKS_ISSUES;
			?></a></li>
			<li class="wssO4"><a href="http://code.google.com/p/web-optimizator/wiki/InstallingIssues?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ"><?php
	echo _WEBO_ABOUT_SUPPORT_INSTALLING;
			?></a></li>
			<li class="wssO4"><a href="http://code.google.com/p/web-optimizator/wiki/ClientSideIssues?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ"><?php
	echo _WEBO_ABOUT_SUPPORT_CLIENT;
			?></a></li>
			<li class="wssO4"><a href="http://code.google.com/p/web-optimizator/wiki/ServerSideIssues?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ"><?php
	echo _WEBO_ABOUT_SUPPORT_SERVER;
			?></a></li>
			<li class="wssO4"><a href="http://web-optimizer.us/support/" class="wssJ"><?php
	echo _WEBO_DASHBOARD_LINKS_SUPPORT;
			?></a></li>
		</ul>
	</div>
	<div class="wssRB">
		<span class="wssRB5"><span class="wssRB6">&bull;</span></span>
		<span class="wssRB7"><span class="wssRB8">&bull;</span></span>
	</div>
</div>