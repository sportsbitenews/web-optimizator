<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Outputs final Stage 3 page
 *
 **/
?><ul><li><a href="index.php" title="<?php
	echo _WEBO_SPLASH1_BACK;
?>">1</a></li><li><a href="?page=install_stage_2" title="<?php
	echo _WEBO_SPLASH1_BACK;
?>" class="x">2</a></li><li><strong>3</strong></li></ul></div><p id="showme"><sub><a href="?page=install_stage_2" title="<?php
	echo _WEBO_SPLASH1_BACK;
?>" class="x"></a></sub><sup><a href="/" title="<?php
	echo _WEBO_SPLASH1_NEXT;
?>"></a></sup></p><div class="c"><b></b><i></i><del></del><ins></ins><?php
	if(!empty($message)) {
?><p class="m"><?php
		echo $message;
?></p><?php
	}
?><h2><?php
	echo _WEBO_SPLASH3_TITLE;
?></h2><div class="d n q"><ul><li><a href="#rewrite" class="z"><?php
	echo _WEBO_SPLASH3_REWRITE_SHORT;
?></a></li><?php
	if (empty($auto_rewrite)) {
?><li><a href="#modify"><?php
		echo _WEBO_SPLASH3_MODIFY_SHORT;
?></a></li><?php
	}
?><li><a href="#testing"><?php
	echo _WEBO_SPLASH3_TESTING_SHORT;
?></a></li><li><a href="#security"><?php
	echo _WEBO_SPLASH3_SECURITY_SHORT;
?></a></li><li><a href="#additional"><?php
	echo _WEBO_SPLASH3_ADDITIONAL_SHORT;
?></a></li></ul><form action="?page=install_stage_2" method="post" enctype="multipart/form-data"><div class="n"><?php
	if ($auto_rewrite) {
?><fieldset id="rewrite"><h3><?php
		echo _WEBO_SPLASH3_REWRITE;
?></h3><p><?php
		echo _WEBO_SPLASH3_REWRITE_DESCRIPTION . $cms_version . _WEBO_SPLASH3_REWRITE_DESCRIPTION2 . $paths['relative']['document_root'] . _WEBO_SPLASH3_REWRITE_DESCRIPTION3;
?></p></fieldset><?php
	} else {
?><fieldset id="rewrite"><h3><?php
		echo _WEBO_SPLASH3_WORKING;
?></h3><p><?php
		echo _WEBO_SPLASH3_ADD . $cms_version . _WEBO_SPLASH3_ADD_;
?></p></fieldset><fieldset id="modify"><h3><?php
		echo _WEBO_SPLASH3_MODIFY;
?></h3><ol><?php
		foreach ($files_to_change as $file) {
			if (is_file(preg_replace("/\\\/", "/", $paths['full']['document_root']) . $file['file'])) {
?><li><?php
				if ($file['mode'] == 'start' && empty($file['location'])) {
?><p><?php
					echo _WEBO_SPLASH3_TOFILE2;
?> <code><?php
					echo preg_replace("/\\\/", "/", $paths['full']['document_root']) . $file['file'];
?></code> <?php
					echo _WEBO_SPLASH3_ADD2;
?>:</p><textarea cols="80" rows="2">&lt;?php
require('<?php
					echo preg_replace("/\\\/", "/", $paths['full']['current_directory']);
?>web.optimizer.php');
?&gt;</textarea><?php
				} elseif ($file['mode'] == 'finish' && $file['location'] == 'end') {
?><p><?php
					echo _WEBO_SPLASH3_TOFILE3;
?> <code><?php
					echo preg_replace("/\\\/", "/", $paths['full']['document_root']) . $file['file'];
?></code> <?php
					echo _WEBO_SPLASH3_ADD2;
?>:</p><textarea cols="80" rows="1">$web_optimizer->finish();</textarea><?php
				} else {
?><p><?php
					echo _WEBO_SPLASH3_TOFILE;
?> <code><?php
					echo preg_replace("/\\\/", "/", $paths['full']['document_root']) . $file['file'];
?></code> <?php
					echo _WEBO_SPLASH3_AFTERSTRING;
?></p><textarea cols="80" rows="1"><?php
					echo $file['location'];
?></textarea><p><?php
					echo _WEBO_SPLASH3_ADD2;
?></p><textarea cols="80" rows="2"><?php 
					if (!empty($file['global'])) {
?>global $web_optimizer;<?php
					}
					if ($file['mode'] == 'start') {
?>require('<?php
						echo preg_replace("/\\\/", "/", $paths['full']['current_directory']);
?>web.optimizer.php');<?php
					} else {
?>$web_optimizer->finish();<?php
					}
?></textarea><?php
				}
?></li><?php
			}
		}
?></ol></fieldset><?php
	}
?><fieldset id="testing"><h3><?php
	echo _WEBO_SPLASH3_TESTING;
?></h3><p><?php
	echo _WEBO_SPLASH3_NOTLIVE;
?></p><ul><li><?php
	echo _WEBO_SPLASH3_MANUALLY . preg_replace("/\\\/", "/", $paths['full']['current_directory']) ._WEBO_SPLASH3_MANUALLY2;
?></li><li><?php
	echo _WEBO_SPLASH3_AGAIN . $paths['relative']['current_directory'] . _WEBO_SPLASH3_AGAIN2;
?></li></ul></fieldset><fieldset id="security"><h3><?php
	echo _WEBO_SPLASH3_SECURITY;
?></h3><p><?php
	echo _WEBO_SPLASH3_ALTHOUGH . preg_replace("/\\\/", "/", $paths['full']['current_directory']) . _WEBO_SPLASH3_ALTHOUGH2;
?></p><input type="hidden" name="page" value="install_stage_2"/><input type="hidden" name="user[_username]" value="<?php
	echo $username;
?>"/><input type="hidden" name="user[_password]" value="<?php
	echo $password;
?>"/></fieldset><fieldset id="additional"><h3><?php
	echo _WEBO_SPLASH3_ADDITIONAL;
?></h3><p><?php
	echo _WEBO_SPLASH3_ADDITIONAL_INFO;
?></p><ul><li><?php
	echo _WEBO_SPLASH3_ADDITIONAL_INFO_1;
?></li><li><?php
	echo _WEBO_SPLASH3_ADDITIONAL_INFO_2;
?></li><li><?php
	echo _WEBO_SPLASH3_ADDITIONAL_INFO_3;
?></li></ul></fieldset></div></form><b></b><i></i><del></del><ins></ins></div>