<?php if(!empty($message)) { ?><div class="success"><?php echo $message ?></div><?php } ?>

<h1><?php echo _WEBO_SPLASH2_TITLE ?></h1>
<form method="post" enctype="multipart/form-data" action="">
	<input type="submit" name="submit" value="<?php echo _WEBO_SPLASH1_NEXT ?>" title="<?php echo _WEBO_SPLASH1_NEXT ?>" />

	<p><?php echo _WEBO_SPLASH2_OPTIONS ?></p>

	<fieldset>
		<legend><?php echo _WEBO_SPLASH2_CACHE ?></legend>
			<label><?php echo _WEBO_SPLASH2_CACHE_JS ?></label>
				<div class="info">
				<input name="user[javascript_cachedir]" class="long_text" value="<?php echo $javascript_cachedir ?>" title="<?php echo _WEBO_SPLASH2_CACHE_JS ?>" />
				</div>
			<label><?php echo _WEBO_SPLASH2_CACHE_CSS ?></label>
				<div class="info">
				<input name="user[css_cachedir]" class="long_text" value="<?php echo $css_cachedir ?>" title="<?php echo _WEBO_SPLASH2_CACHE_CSS ?>" />
				</div>
			<label><?php echo _WEBO_SPLASH2_CACHE_HTML ?></label>
				<div class="info">
				<input name="user[html_cachedir]" class="long_text" value="<?php echo $html_cachedir ?>" title="<?php echo _WEBO_SPLASH2_CACHE_HTML ?>" />
				</div>
			<label><?php echo _WEBO_SPLASH2_INSTALLDIR ?></label>
				<div class="info">
				<input name="user[webo_cachedir]" class="long_text" value="<?php echo $webo_cachedir ?>" title="<?php echo _WEBO_SPLASH2_INSTALLDIR ?>" />
				</div>
			<label><?php echo _WEBO_SPLASH2_DOCUMENTROOT ?></label>
				<div class="info">
				<input name="user[document_root]" class="long_text" value="<?php echo $document_root ?>" title="<?php echo _WEBO_SPLASH2_DOCUMENTROOT ?>" />
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

							<label for="user[<?php echo $key ?>][<?php echo $option ?>]"><?php echo defined("_WEBO_" . $key . "_" . $option) ? constant("_WEBO_" . $key . "_" . $option) : ($key . " " . $option) ?></label>

							<?php if ($option == 'dimensions_limited' || $option == 'ignore_list' || $option == 'timeout' || $option == 'allowed_list' || $options == 'flush_size') { ?>

							<div class="info">
							<?php echo $option == 'dimensions_limited' || $option == 'timeout' || $options == 'flush_size' ? '' : _WEBO_SPLASH2_SPACE ?> <input name="user[<?php echo $key ?>][<?php echo $option ?>]" value="<?php echo $value ?>" size="40"/>
							</div>

							<?php } else { ?>
							<div class="info">
							<?php echo _WEBO_SPLASH2_YES ?> <input name="user[<?php echo $key ?>][<?php echo $option ?>]" type="radio" value="1" <?php if(!empty($value)) { ?>checked="checked"<?php } ?> class="radio">
							<?php echo _WEBO_SPLASH2_NO ?> <input name="user[<?php echo $key ?>][<?php echo $option ?>]" type="radio" value="0" <?php if(empty($value)) { ?>checked="checked"<?php } ?> class="radio">
							</div>	
							
							<?php }

						} ?>
					
				</fieldset>
			<?php 
				}
			} ?>	
			
		<input type="submit" name="submit" value="<?php echo _WEBO_SPLASH1_NEXT ?>" title="<?php echo _WEBO_SPLASH1_NEXT ?>" />
		<input type="hidden" name="page" value="install_stage_3" />
		<input type="hidden" name="user[_username]" value="<?php echo $compress_options['username'] ?>" />
		<input type="hidden" name="user[_password]" value="<?php echo $compress_options['password'] ?>" />	

</form>