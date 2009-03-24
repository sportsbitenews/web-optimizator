<?php if(!empty($message)) { ?><div class="success"><?php echo $message ?></div><?php } if ($uninstall) { ?>

<h1>Uninstall</h1>

<p>Thank you for using Web Optimizer. You can install it once more later by visiting <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $this->paths['relative']['current_directory'] ?>"><?php echo "http://" . $_SERVER['HTTP_HOST'] . $this->paths['relative']['current_directory'] ?></a>.</p>

<p>Feel free to visit <a href="http://code.google.com/p/web-optimizator/">Web Optimizer website</a> and submit <a href="http://code.google.com/p/web-optimizator/issues/list">any related issues</a>.</p>

<?php } else { ?>

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

<?php } ?>