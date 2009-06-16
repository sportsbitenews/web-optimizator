<ul>
<li><a href="index.php" title="<?php echo _WEBO_SPLASH1_BACK ?>">1</a></li>
<li><a href="?page=install_stage_2" title="<?php echo _WEBO_SPLASH1_BACK ?>" class="x">2</a></li>
<li><strong>3</strong></li>
</ul>
<h4>Web Optimizer <span><?php echo $version ?>/<b><?php echo $version_new ?></b></span></h4>
</div>
<p><sub><a href="?page=install_stage_2" title="<?php echo _WEBO_SPLASH1_BACK ?>"></a></sub><sup><a href="/" title="<?php echo _WEBO_SPLASH1_NEXT ?>"></a></sup></p>
<div class="c">
<b></b><i></i><del></del><ins></ins>
<?php if(!empty($message)) { ?><p class="m"><?php echo $message ?></p><?php } ?>
<h2><?php echo _WEBO_SPLASH3_TITLE ?></h2>
<div class="d n q">
<ul>
<li><a href="#rewrite" class="z"><?php echo _WEBO_SPLASH3_REWRITE_SHORT ?></a></li>
<?php if (empty($auto_rewrite)) { ?>
	<li><a href="#modify"><?php echo _WEBO_SPLASH3_MODIFY_SHORT ?></a></li>
<?php } ?>
<li><a href="#testing"><?php echo _WEBO_SPLASH3_TESTING_SHORT ?></a></li>
<li><a href="#security"><?php echo _WEBO_SPLASH3_SECURITY_SHORT ?></a></li>
</ul>
<form action="" method="post">
<?php

	if ($auto_rewrite) {

?>
<fieldset id="rewrite">
<h3><?php echo _WEBO_SPLASH3_REWRITE ?></h3>
<p><?php echo _WEBO_SPLASH3_REWRITE_DESCRIPTION . $cms_version . _WEBO_SPLASH3_REWRITE_DESCRIPTION2 . $paths['relative']['document_root'] . _WEBO_SPLASH3_REWRITE_DESCRIPTION3 ?></p>
</fieldset>
<?php

	} else {
	
?>
<fieldset id="rewrite">
<h3><?php echo _WEBO_SPLASH3_WORKING ?></h3>
<p><?php echo _WEBO_SPLASH3_ADD ?></p>
</fieldset>
<fieldset id="modify">
<h3><?php echo _WEBO_SPLASH3_MODIFY ?></h3>
<p><?php echo _WEBO_SPLASH3_WP ?></p>
<blockquote><pre>&lt;?php
if (! isset($wp_did_header)):
?&gt;</pre></blockquote>
<p><?php echo _WEBO_SPLASH3_CODE ?></p>
<blockquote><pre>&lt;?php
require('<?php echo $paths['full']['current_directory'] ?>web.optimizer.php');
?&gt;</pre></blockquote>
<p><?php echo _WEBO_SPLASH3_FINALLY ?></p>
<blockquote><pre>&lt;?php
$web_optimizer->finish();
?&gt;</pre></blockquote>
</fieldset>
<?php

	}

?>
<fieldset id="testing">
<h3><?php echo _WEBO_SPLASH3_TESTING ?></h3>
<p><?php echo _WEBO_SPLASH3_NOTLIVE ?></p>
<ul>
		<li><?php echo _WEBO_SPLASH3_MANUALLY . preg_replace("/\\\/", "/", $paths['full']['current_directory']) ._WEBO_SPLASH3_MANUALLY2 ?></li>
		<li><?php echo _WEBO_SPLASH3_AGAIN . $paths['relative']['current_directory'] . _WEBO_SPLASH3_AGAIN2 ?></li>
</ul>
</fieldset>
<fieldset id="security">
<h3><?php echo _WEBO_SPLASH3_SECURITY ?></h3>
<p><?php echo _WEBO_SPLASH3_ALTHOUGH . preg_replace("/\\\/", "/", $paths['full']['current_directory']) . _WEBO_SPLASH3_ALTHOUGH2 ?></p>
<input type="hidden" name="page" value="install_stage_2" />
<input type="hidden" name="user[_username]" value="<?php echo $username ?>" />
<input type="hidden" name="user[_password]" value="<?php echo $password ?>" />	
</fieldset>
</form>
<b></b><i></i><del></del><ins></ins>
</div>