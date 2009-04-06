<?php if(!empty($message)) { ?>
<div class="success"><?php echo $message ?></div><?php } ?>

<h1><?php echo _WEBO_SPLASH3_TITLE ?></h1>

<p><?php echo _WEBO_SPLASH3_SAVED ?></p>

<?php

	if ($auto_rewrite) {

?>
<h2><?php echo _WEBO_SPLASH3_REWRITE ?></h2>

<p><?php echo _WEBO_SPLASH3_REWRITE_DESCRIPTION . $cms_version . _WEBO_SPLASH3_REWRITE_DESCRIPTION2 . $paths['absolute']['document_root'] . _WEBO_SPLASH3_REWRITE_DESCRIPTION3 ?></p>
<?php
	
	} else {
	
?>
<h2><?php echo _WEBO_SPLASH3_WORKING ?></h2>

<p><?php echo _WEBO_SPLASH3_ADD ?></p>

<h3><?php echo _WEBO_SPLASH3_MODIFY ?></h3>

<p><?php echo _WEBO_SPLASH3_WP ?></p>
<p>
		<span class="red">&lt;?php</span><br />
		  if (! isset($wp_did_header)):<br />
		  <span class="red">?&gt;</span><br />
</p>
<p><?php echo _WEBO_SPLASH3_CODE ?></p>
<p>
	  <span class="red">&lt;?php</span><br />
	  <span class="green">require</span>(<span class="red">'<?php echo $paths['full']['current_directory'] ?>web.optimizer.php'</span>);<br />
	  <span class="red">?&gt;</span><br />
</p>
</p>
<p><?php echo _WEBO_SPLASH3_FINALLY ?></p>
<p>
	  <span class="red">&lt;?php</span><br />
	  $web_optimizer->finish();<br />
	  <span class="red">?&gt;</span><br />
</p>
<p>
<?php

	}

?>
<h2><?php echo _WEBO_SPLASH3_TESTING ?></h2>

<p><?php echo _WEBO_SPLASH3_NOTLIVE ?></p>
<ul>
		<li><?php echo _WEBO_SPLASH3_MANUALLY . $paths['full']['document_root'] . preg_replace("/^\//", "", $paths['relative']['current_directory']) ._WEBO_SPLASH3_MANUALLY2 ?></li>
		<li><?php echo _WEBO_SPLASH3_AGAIN . $paths['relative']['current_directory'] . _WEBO_SPLASH3_AGAIN2 ?></li>
</ul>
</p>
<h2><?php echo _WEBO_SPLASH3_SECURITY ?></h2>

<p><?php echo _WEBO_SPLASH3_ALTHOUGH . $paths['full']['document_root'] . preg_replace("/^\//", "", $paths['relative']['current_directory']) . _WEBO_SPLASH3_ALTHOUGH2 ?></p>

<form action="<?php echo $paths['relative']['document_root'] ?>" method="get"><p><input type="submit" value="<?php echo _WEBO_SPLASH3_FINISH ?>" title="<?php echo _WEBO_SPLASH3_FINISH ?>" /></p></form>
