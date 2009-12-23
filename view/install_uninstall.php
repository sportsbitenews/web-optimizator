<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs uninstall page
 *
 **/
?><noscript><?php
	echo _WEBO_NEW_NOSCRIPT;
?></noscript><?php
	if (!empty($submit) && !count($error)) {
?><div class="wssS"><div class="wssS1"><h2 class="wssB"><?php
		echo _WEBO_ABOUT_SUCCESS;
		?></h2></div></div><?php
	} elseif (count($error)) {
?><div class="wssK">
	<div class="wssK1">
		<h2 class="wssB"><?php
		echo _WEBO_ERROR_TITLE;
		?></h2>
		<ul class="wssL">
			<li class="wssL1<?php
		if (empty($error[1])) {
			?> wssA0<?php
			}
			?>"><?php
		echo _WEBO_ABOUT_ENTEREMAIL;
			?></li><li class="wssL1<?php
			if (empty($error[2])) {
			?> wssA0<?php
			}
			?>"><?php
		echo _WEBO_ABOUT_ENTEREMESSAGE;
			?></li>
		</ul>
	</div>
</div><?php
	}
?><h1 class="wssA wssA4"><?php
	echo _WEBO_SPLASH1_UNINSTALL_TITLE;
?></h1><form action="#wss_uninstall" method="post" class="wssC7" enctype="multipart/form-data">
	<h2 class="wssB"><?php
	echo _WEBO_SPLASH1_UNINSTALL_SEND;
	?></h2>
	<dl class="wssD">
<dt class="wssD1">
			<label for="wss_email" class="wssE"><?php 
	echo _WEBO_ABOUT_EMAIL;
?>:</label>
		</dt>
		<dd class="wssD2<?php
	if (!empty($error[1])) {
			?> wssD8<?php
	}
			?>">
			<span class="wssD3">*</span>
			<input id="wss_email" name="wss_email" title="<?php
	echo _WEBO_ABOUT_ENTEREMAIL;
?>" class="wssF" value="<?php
	if ((empty($submit) || !empty($email)) && count($error)) {
		echo htmlspecialchars($email);
	}?>"/>
		</dd>
		<dt class="wssD1">
			<label for="wss_message" class="wssE"><?php 
	echo _WEBO_UNINSTALL_MESSAGE;
?>:</label>
		</dt>
		<dd class="wssD2<?php
	if (!empty($error[2])) {
			?> wssD8<?php
	}
			?>">
			<span class="wssD3">*</span>
			<textarea id="wss_message" name="wss_message" cols="20" rows="5" title="<?php
	echo _WEBO_ABOUT_ENTEREMESSAGE;
?>" class="wssF wssF2"><?php
	if ((empty($submit) || !empty($message)) && count($error)) {
		echo htmlspecialchars($message);
	}
			?></textarea>
		</dd>
	</dl>
	<p class="wssD">
		<input type="submit" value="<?php
	echo _WEBO_ABOUT_SEND;
?>" class="wssG"/><input type="hidden" name="wss_page" value="install_uninstall"/><input type="hidden" name="wss_Submit" value="1"/>
	</p>
</form>
<div class="wssH wssH5">
	<div class="wssRB">
		<span class="wssRB1"><span class="wssRB2">&bull;</span></span>
		<span class="wssRB3"><span class="wssRB4">&bull;</span></span>
	</div>
	<div class="wssH1">
		<h2 class="wssB"><?php
	echo _WEBO_UNINSTALL_SUCCESS;
		?></h2>
		<p class="wssI"><?php
	echo _WEBO_SPLASH1_UNINSTALL_THANKS . $_SERVER['HTTP_HOST'] . str_replace($document_root, "/", $basepath) . _WEBO_SPLASH1_UNINSTALL_THANKS2;
		?></p><p class="wssI"><?php
	echo _WEBO_SPLASH1_UNINSTALL_VISIT;
		?></p><p class="wssI"><?php
	echo _WEBO_SPLASH1_UNINSTALL_BACK . str_replace($document_root, "/", $website_root) . _WEBO_SPLASH1_UNINSTALL_BACK2;
		?></p><p class="wssI"><?php
	echo _WEBO_SPLASH1_UNINSTALL_HELP;
		?></p>
	</div>
	<div class="wssRB">
		<span class="wssRB5"><span class="wssRB6">&bull;</span></span>
		<span class="wssRB7"><span class="wssRB8">&bull;</span></span>
	</div>
</div>