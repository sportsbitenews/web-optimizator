<ul>
<li><strong>1</strong></li>
<li><a href="?page=install_stage_2" title="<?php echo _WEBO_SPLASH1_NEXT ?>" class="x">2</a></li>
<li><a href="?page=install_stage_3" title="<?php echo _WEBO_SPLASH1_NEXT ?>" class="x">3</a></li>
</ul>
<h4>Web Optimizer <span><?php echo $version ?>/<b><?php echo $version_new ?></b></span></h4>
</div>
<p><sup><a href="?page=install_stage_2" title="<?php echo _WEBO_SPLASH1_NEXT ?>" class="x"></a></sup></p>
<div class="c">
<b></b><i></i><del></del><ins></ins>
<?php if(!empty($message)) { ?><p class="m"><?php echo $message ?></p><?php } ?>
<h2><?php echo _WEBO_LOGIN_TITLE ?></h2>
<div class="d">
<p class="e"><?php echo _WEBO_LOGIN_INSTALLED . $version . ($protected ? _WEBO_LOGIN_INSTALLED3 : _WEBO_LOGIN_INSTALLED2) ?></p>
<form method="post" enctype="multipart/form-data" action="">
<fieldset class="f">
<?php if ($protected) { ?>
	<legend><?php echo _WEBO_SPLAHS1_PROTECTED ?></legend>
	<p>
		<input type="hidden" name="user[_username]" value="<?php echo $username ?>" />
		<input type="hidden" name="user[_password]" value="<?php echo $password ?>" />
		<?php echo _WEBO_SPLAHS1_PROTECTED2 ?>
	</p>
<?php } else { ?>
	<legend><?php echo _WEBO_NEW_USERDATA ?></legend>
	<p>
			<label for="user[username]"><?php echo _WEBO_LOGIN_USERNAME ?></label>
				<input name="user[username]" id="user[username]" value="" title="<?php echo _WEBO_LOGIN_ENTERLOGIN ?>"/>
			<label for="user[password]"><?php echo _WEBO_LOGIN_PASSWORD ?></label>
				<input type="password" id="user[password]" name="user[password]" value="" title="<?php echo _WEBO_LOGIN_ENTERPASSWORD ?>"/>
	</p>
<?php } ?>
		<input type="submit" value="<?php echo _WEBO_SPLASH1_NEXT ?>" title="<?php echo _WEBO_SPLASH1_NEXT ?>" class="i"/>
		<input type="hidden" name="page" value="install_stage_2" />
		<input type="hidden" name="Submit" value="1" />
</fieldset>
<?php if ($version_new_exists) { ?>
<fieldset class="g">
	<p><?php echo _WEBO_LOGIN_UPGRADENOTICE . $version . ($protected ? _WEBO_LOGIN_UPGRADENOTICE4 : _WEBO_LOGIN_UPGRADENOTICE2) . $version_new . _WEBO_LOGIN_UPGRADENOTICE3 ?></p>
	<input type="hidden" name="ujs" value="1"/><input type="submit" name="upgrade" value="<?php echo _WEBO_LOGIN_UPGRADE ?>" title="<?php echo _WEBO_LOGIN_UPGRADE ?>" onclick="this.disabled='disabled';this.form.ujs.id=this.form.ujs.name='upgrade';"/>
</fieldset>
<?php } ?>
<fieldset class="h">
	<p><?php echo ($protected ? '' : _WEBO_SPLASH1_CLEAR_CACHE) . _WEBO_SPLASH1_CLEAR_CACHE2 ?></p>
	<input type="submit" name="clear" value="<?php echo _WEBO_SPLASH1_CLEAR ?>" title="<?php echo _WEBO_SPLASH1_CLEAR ?>" class="k"/>
	<p><?php echo ($protected ? _WEBO_LOGIN_UNINSTALL2 : _WEBO_LOGIN_UNINSTALL) ?></p>
	<input type="submit" name="uninstall" value="<?php echo _WEBO_SPLASH1_UNINSTALL ?>" title="<?php echo _WEBO_LOGIN_UNINSTALLME ?>" class="j"/>
</fieldset>
</form>
<b></b><i></i><del></del><ins></ins>
</div>