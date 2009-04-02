<?php if(!empty($message)) { ?><div class="success"><?php echo $message ?></div><?php } ?>

<h1>Installation - Stage 2</h1>
<form method="post" enctype="multipart/form-data" action="">
	<input type="submit" name="submit" value="Next..." />	

	<p>Compression options</p>

	<fieldset>
		<legend>Cache Directories</legend>
			<label>Your JavaScript will be cached in</label>
				<div class="info">
				<input type="text" name="user[javascript_cachedir]" class="long_text" value="<?php echo $javascript_cachedir ?>" />
				</div>
			<label>Your CSS will be cached in</label>
				<div class="info">
				<input type="text" name="user[css_cachedir]" class="long_text" value="<?php echo $css_cachedir ?>" />
				</div>
			<label>Web Optimizer is located in</label>
				<div class="info">
				<input type="text" name="user[webo_cachedir]" class="long_text" value="<?php echo $webo_cachedir ?>" />
				</div>
	</fieldset>

			<?php foreach($options AS $key=>$type) {
					if(is_array($type['value'])) {
			?>	
				<fieldset class="spd_options">
					<legend><?php echo $type['title'] ?></legend>
					
					<?php echo $type['intro'] ?>
					<br /><br />
			
						<?php foreach($type['value'] AS $option=>$value) { ?>

							<label for="user[<?php echo $key ?>][<?php echo $option ?>]"><?php echo $key . " " . $option ?></label>

							<?php if ($option == 'ignore_list') { ?>

							<div class="info">
							Please separate with space: <input name="user[<?php echo $key ?>][<?php echo $option ?>]" value="<?php echo $value ?>" size="40"/>
							</div>

							<?php } else { ?>
							<div class="info">
							Yes: <input name="user[<?php echo $key ?>][<?php echo $option ?>]" type="radio" value="1" <?php if(!empty($value)) { ?>checked="checked"<?php } ?> class="radio">
							No: <input name="user[<?php echo $key ?>][<?php echo $option ?>]" type="radio" value="0" <?php if(empty($value)) { ?>checked="checked"<?php } ?> class="radio">				
							</div>	
							
							<?php }

						} ?>
					
				</fieldset>
			<?php 
				}
			} ?>	
			
		<input type="submit" name="submit" value="Next..." />	
		<input type="hidden" name="page" value="install_stage_3" />
		
		<input type="hidden" name="user[_username]" value="<?php echo $compress_options['username'] ?>" />
		<input type="hidden" name="user[_password]" value="<?php echo $compress_options['password'] ?>" />	
	
</form>
