<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Outputs final Stage 1 page (before installation)
 *
 **/
?><ul><li><strong>1</strong></li><li><a href="?page=install_stage_2" title="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" class="x">2</a></li><li><a href="?page=install_stage_3" title="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" class="x">3</a></li></ul></div><p id="showme"><sup><a href="?page=install_stage_2" title="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" class="x"></a></sup></p><div class="c"><b></b><i></i><del></del><ins></ins><h2><?php
	echo _WEBO_NEW_TITLE;
?></h2><div class="d u"><div class="e"><noscript><p><?php
	echo _WEBO_NEW_NOSCRIPT;
?></p></noscript><?php
	echo _WEBO_NEW_PROTECT;
?></div><div id="sc"><p><?php echo _WEBO_SYSTEM_CHECK ?></p></div><form method="post" enctype="multipart/form-data" action=""><fieldset class="f"><legend><?php
	echo _WEBO_NEW_USERDATA;
?></legend><p><label for="user_username"><?php
	echo _WEBO_LOGIN_USERNAME;
?></label><input id="user_username" name="user[username]" title="<?php
	echo _WEBO_LOGIN_ENTERLOGIN;
?>"/><label for="user_password"><?php
	echo _WEBO_LOGIN_PASSWORD;
?></label><input type="password" id="user_password" name="user[password]" title="<?php
	echo _WEBO_LOGIN_ENTERPASSWORD;
?>"/><input type="submit" name="express" id="express" value="<?php
	echo _WEBO_SPLASH1_EXPRESS;
?>" title="<?php
	echo _WEBO_SPLASH1_EXPRESS;
?>" class="v"/><input type="submit" name="Submit" value="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" title="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" class="i"/><?php
	if ($display_progress) {
?><input type="hidden" name="display_progress" value="1"/><?php
	}
?><input type="hidden" name="page" value="install_stage_2"/></p></fieldset></form><b></b><i></i><del></del><ins></ins></div><?php
	if ($display_progress) {
?><div id="a"><div><span id="b"><span id="d"></span></span></div><span id="c"><span id="e">0</span>%</span></div><?php
	}
?><script type="text/javascript" src="?page=system_check&amp;r=<?php echo time() ?>"></script>