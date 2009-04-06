<h1><?php echo _WEBO_NEW_TITLE ?></h1>

<p><?php echo _WEBO_NEW_PROTECT ?></p>

<form method="post" enctype="multipart/form-data" action="">

<fieldset>
	<legend><?php echo _WEBO_NEW_USERDATA ?></legend>
	
			<label for="user[username]"><?php echo _WEBO_LOGIN_USERNAME ?></label>
				<div class="info">
				<input id="user[username]" name="user[username]" class="long_text" title="<?php echo _WEBO_LOGIN_ENTERLOGIN ?>"/>
				</div>	
			<label for="user[password]"><?php echo _WEBO_LOGIN_PASSWORD ?></label>
				<div class="info">
				<input type="password" name="user[password]" id="user[password]" class="long_text" title="<?php echo _WEBO_LOGIN_ENTERPASSWORD ?>"/>
				</div>	
			
		<input type="submit" name="submit" value="<?php echo _WEBO_SPLASH1_NEXT ?>" title="<?php echo _WEBO_SPLASH1_NEXT ?>"/>
		<input type="hidden" name="page" value="install_stage_1" />
</fieldset>
</form>
