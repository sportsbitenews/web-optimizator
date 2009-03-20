<?php if(!empty($message)) { ?><div class="success"><?php echo $message ?></div><?php } ?>

<h1>Installation - Stage 1</h1>

<p>Welcome to Web Optimizer installation.</p>

<fieldset>
	<legend>Path Information</legend>
	<label>Your full path to document root:</label>
		<form method="post" enctype="multipart/form-data" action="">
		<div class="info"><input type="text" name="user[document_root]" class="long_text" value="<?php echo $this->paths['absolute']['document_root'] ?>" /></div>	
			
			<p>			
				<div class="notice">
					<p>Your document root is the root folder that your HTML files are served from. If you don't know what it is, it's probably the path above. Just click <strong>Next...</strong> below.</p>
					<strong>Is the above path incorrect</strong>, please enter the correct path.</p>
				</div>		
			</p>			
		<input type="submit" name="submit" value="Next..." />	
		<input type="hidden" name="page" value="install_stage_2" />
		
		<input type="hidden" name="user[_username]" value="<?php echo $compress_options['username'] ?>" />
		<input type="hidden" name="user[_password]" value="<?php echo $compress_options['password'] ?>" />
	
	</form>	
		
</fieldset>
