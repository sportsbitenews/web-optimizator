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
		<input type="submit" name="express" id="express" value="<?php echo _WEBO_SPLASH1_EXPRESS ?>" title="<?php echo _WEBO_SPLASH1_EXPRESS ?>"/>
		<input type="submit" name="submit" value="<?php echo _WEBO_SPLASH1_NEXT ?>" title="<?php echo _WEBO_SPLASH1_NEXT ?>"/>
<?php if ($display_progress) { ?>
		<input type="hidden" name="display_progress" value="1" />
<?php } ?>
		<input type="hidden" name="page" value="install_stage_1" />
</fieldset>
</form>
<?php if ($display_progress) { ?>
<style type="text/css">
#loader{border:1px solid #656362;float:left}
#loader, #bar{width:243px;background:url(images/loadbar.png) -243px 0;height:24px}
#bar{display:block;width:0;background-position:0 0}
#per{margin-left:250px;font-size:140%}
</style>
<div id="loader"><span id="bar"></span></div><div id="per"><span id="cent">0</span>%</div>
<script type="text/javascript">var yass_modules=[["libs/js/yass.loadbar.js",""]];</script>
<?php } ?>