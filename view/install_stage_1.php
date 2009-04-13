<?php if(!empty($message)) { ?><div class="success"><?php echo $message ?></div><?php } ?>

<h1><?php echo _WEBO_SPLASH1_TITLE ?></h1>

<p><?php echo _WEBO_SPLASH1_WELCOME ?></p>

<fieldset>
	<legend><?php echo _WEBO_SPLASH1_PATH?></legend>
	<label><?php echo _WEBO_SPLASH1_FULLPATH ?></label>
		<form method="post" enctype="multipart/form-data" action="">
		<div class="info"><input name="user[document_root]" class="long_text" title="<?php echo _WEBO_SPLASH1_FULLPATH ?>" value="<?php echo $this->paths['absolute']['document_root'] ?>" /></div>
			<p>
				<div class="notice">
					<p><?php echo _WEBO_SPLASH1_NOTICE ?></p>
					<p><?php echo _WEBO_SPLASH1_INCORRECT?></p>
				</div>
			</p>
		<input type="submit" name="submit" value="<?php echo _WEBO_SPLASH1_NEXT ?>" title="<?php echo _WEBO_SPLASH1_NEXT ?>" />	
		<input type="hidden" name="page" value="install_stage_2" />
		<input type="hidden" name="user[_username]" value="<?php echo $compress_options['username'] ?>" />
		<input type="hidden" name="user[_password]" value="<?php echo $compress_options['password'] ?>" />
	</form>
</fieldset>