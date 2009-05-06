<?php if(!empty($message)) { ?><div class="success"><?php echo $message ?></div><?php } ?>

<h1><?php echo _WEBO_LOGIN_TITLE ?></h1>

<p><?php echo _WEBO_LOGIN_INSTALLED . $version . _WEBO_LOGIN_INSTALLED2 ?></p>

<form method="post" enctype="multipart/form-data" action="">
<fieldset>
	<legend><?php echo _WEBO_NEW_USERDATA ?></legend>	
			<label for="user[username]"><?php echo _WEBO_LOGIN_USERNAME ?></label>
				<div class="info">
				<input name="user[username]" id="user[username]" class="long_text" value="" title="<?php echo _WEBO_LOGIN_ENTERLOGIN ?>"/>
				</div>	
			<label for="user[password]"><?php echo _WEBO_LOGIN_PASSWORD ?></label>
				<div class="info">
				<input type="password" id="user[password]" name="user[password]" class="long_text" value="" title="<?php echo _WEBO_LOGIN_ENTERPASSWORD ?>"/>
				</div>	
		<input type="submit" value="<?php echo _WEBO_SPLASH1_NEXT ?>" title="<?php echo _WEBO_SPLASH1_NEXT ?>"/>
		<input type="hidden" name="page" value="install_stage_1" />
		<input type="hidden" name="submit" value="1" />
</fieldset>
<?php if ($version_new_exists) { ?>
<fieldset>
	<legend><?php echo _WEBO_LOGIN_UPGRADE ?></legend>	
	<p><?php echo _WEBO_LOGIN_UPGRADENOTICE . $version . _WEBO_LOGIN_UPGRADENOTICE2 . $version_new . _WEBO_LOGIN_UPGRADENOTICE3 ?></p>
	<div><input type="hidden" name="ujs" value="1"/><input type="submit" name="upgrade" value="<?php echo _WEBO_LOGIN_UPGRADE ?>" title="<?php echo _WEBO_LOGIN_UPGRADE ?>" onclick="this.disabled='disabled';this.form.ujs.id=this.form.ujs.name='upgrade';"/></div>
</fieldset>
<?php } ?>
<fieldset>
	<legend><?php echo _WEBO_SPLASH1_CLEAR ?></legend>	
	<p><?php echo _WEBO_SPLASH1_CLEAR_CACHE ?></p>
	<div><input type="submit" name="clear" value="<?php echo _WEBO_SPLASH1_CLEAR ?>" title="<?php echo _WEBO_SPLASH1_CLEAR ?>"/></div>
</fieldset>
<fieldset>
	<legend><?php echo _WEBO_SPLASH1_UNINSTALL ?></legend>	
	<p><?php echo _WEBO_LOGIN_UNINSTALL ?></p>
	<div><input type="submit" name="uninstall" value="<?php echo _WEBO_SPLASH1_UNINSTALL ?>" title="<?php echo _WEBO_LOGIN_UNINSTALLME ?>"/></div>
</fieldset>
</form>
