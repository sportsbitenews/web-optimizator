<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs registration page
 *
 **/
?><h1 class="wssA wssA2"><?php
	echo _WEBO_NEW_TITLE;
?></h1><div class="wssK<?php
	if (empty($error) || !count($error)) {
	?> wssA0<?php
	}
?>"><div class="wssK1"><h2 class="wssB"><?php
	echo _WEBO_ERROR_TITLE;
?></h2><ul class="wssL"><li class="wssL1<?php
			if (empty($error[1])) {
?> wssA0<?php
			}
?>" id="wss_error1"><?php
	echo _WEBO_LOGIN_ENTERPASSWORD;
?></li><li class="wssL1<?php
	if (empty($error[2])) {
?> wssA0<?php
	}
?>" id="wss_error2"><?php
	echo _WEBO_LOGIN_ENTERPASSWORDCONFIRM;
?></li><li class="wssL1<?php
	if (empty($error[3])) {
?> wssA0<?php
	}
?>" id="wss_error3"><?php
	echo _WEBO_LOGIN_ENTEREMAIL;
?></li><li class="wssL1<?php
	if (empty($error[4])) {
?> wssA0<?php
	}
?>" id="wss_error4"><?php
	echo _WEBO_LOGIN_LICENSEAGREEMENT . _WEBO_LOGIN_LICENSEAGREEMENT2;
?></li></ul></div></div>
<h2 class="wssB"><?php
	echo _WEBO_NEW_ENTER;
?></h2>
<form action="index.php" method="post" class="wssC wssC1">
	<dl class="wssD">
		<dt class="wssD1">
			<label for="wss_username" class="wssE"><?php 
	echo _WEBO_LOGIN_USERNAME;
?>:</label>
		</dt>
		<dd class="wssD2">
			<input id="wss_username" name="wss_username" title="<?php
	echo _WEBO_LOGIN_ENTERLOGIN;
?>" class="wssF" value="<?php
	if (empty($submit) || !empty($username)) {
		echo htmlspecialchars($username);
	}?>"/>
		</dd>
		<dt class="wssD1">
			<label for="wss_password" class="wssE"><?php 
	echo _WEBO_LOGIN_PASSWORD;
?>:</label>
		</dt>
		<dd class="wssD2<?php
	if (!empty($error[1]) || !empty($error[2])) {
			?> wssD8<?php
	}
			?>">
			<span class="wssD3">*</span>
			<input type="password" id="wss_password" name="wss_password" title="<?php
	echo _WEBO_LOGIN_ENTERPASSWORD;
?>" class="wssF" value="<?php
	if (empty($submit) || !empty($password)) {
		echo htmlspecialchars($password);
	}?>"/>
		</dd>
		<dt class="wssD1">
			<label for="wss_confirm" class="wssE"><?php 
	echo _WEBO_LOGIN_PASSWORD_CONFIRM;
?>:</label>
		</dt>
		<dd class="wssD2<?php
	if (!empty($error[2])) {
			?> wssD8<?php
	}
			?>">
			<span class="wssD3">*</span>
			<input type="password" id="wss_confirm" name="wss_confirm" title="<?php
	echo _WEBO_PASSWORD_ENTERPASSWORDCONFIRM;
?>" class="wssF" value="<?php
	if (empty($submit) || !empty($confirm)) {
		echo htmlspecialchars($confirm);
	}?>"/>
		</dd>
		<dt class="wssD1">
			<label for="wss_license" class="wssE"><?php 
	echo _WEBO_LOGIN_LICENSE;
?>:</label>
		</dt>
		<dd class="wssD2">
			<input id="wss_license" name="wss_license" title="<?php
	echo _WEBO_LOGIN_ENTERLICENSE;
?>" class="wssF" value="<?php
	if (empty($submit) || !empty($license)) {
		echo htmlspecialchars($license);
	}?>"/>
		</dd>
		<dt class="wssD1">
			<label for="wss_email" class="wssE"><?php 
	echo _WEBO_LOGIN_EMAIL;
?>:</label>
		</dt>
		<dd class="wssD2<?php
	if (!empty($error[3])) {
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
	}?>"/>
			<span class="wssD4"><?php
	echo _WEBO_LOGIN_EMAILNOTICE;
			?></span>
		</dd>
		<dt class="wssD5">
			<label for="wss_confirmagreement" class="wssE"><?php 
	echo _WEBO_LOGIN_LICENSEAGREEMENT . ' <a href="javascript:document.getElementById(\'wss_eula2\').style.display=\'block\';void(0)">' . _WEBO_LOGIN_LICENSEAGREEMENT2.'</a> ' . _WEBO_LOGIN_LICENSEAGREEMENT3;
?>:</label>
		</dt>
		<dd class="wssD6 wssD7<?php
	if (!empty($error[4])) {
			?> wssD8<?php
	}
			?>">
			<span class="wssD3">*</span>
			<input type="checkbox" id="wss_confirmagreement" name="wss_confirmagreement" title="<?php
	echo _WEBO_LOGIN_CONFIRMLICENSEAGREEMENT;
?>"<?php
	if (empty($submit) || !empty($confirmagreement)) {
		?> checked="checked"<?php
	}?>/>
		</dd>
		<dd class="wssD2 wssA0" id="wss_eula2">
			<pre class="wssF wssF1"><?php
	if ($language == 'ru') {
		echo htmlspecialchars(@file_get_contents('LICENSE.utf8.ru.txt'));
	} else {
		echo htmlspecialchars(@file_get_contents('LICENSE.txt'));
	}
			?></pre>
		</dd>
	</dl>
	<p class="wssD">
		<input type="submit" value="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" class="wssG"/><input type="hidden" name="wss_page" value="install_set_password"/><input type="hidden" name="wss_Submit" value="1"/>
	</p>
</form>
<div class="wssH wssH2">
	<div class="wssRB">
		<span class="wssRB1"><span class="wssRB2">&bull;</span></span>
		<span class="wssRB3"><span class="wssRB4">&bull;</span></span>
	</div>
	<div class="wssH1">
		<h2 class="wssB"><?php
	echo _WEBO_NEW_TITLE;
		?></h2>
		<?php
	echo _WEBO_NEW_PROTECT;
		?>
	</div>
	<div class="wssRB">
		<span class="wssRB5"><span class="wssRB6">&bull;</span></span>
		<span class="wssRB7"><span class="wssRB8">&bull;</span></span>
	</div>
</div>