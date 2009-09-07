<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Outputs page to change password
 *
 **/
?></div><p id="showme"><sub><a href="?" title="<?php
	echo _WEBO_SPLASH1_BACK;
?>"></a></sub></p><div class="c"><b></b><i></i><del></del><ins></ins><h2><?php
	echo _WEBO_PASSWORD_TITLE
?></h2><div class="d u"><div class="e"><?php
	echo _WEBO_PASSWORD_INSTALLED;
?></div><form method="post" enctype="multipart/form-data" action=""><fieldset class="f"><legend><?php
	echo _WEBO_NEW_USERDATA;
?></legend><p><label for="user_username"><?php
	echo _WEBO_LOGIN_USERNAME;
?></label><input name="user[username]" id="user_username" value="<?php
	echo $username;
?>" title="<?php
	echo _WEBO_LOGIN_ENTERLOGIN;
?>"/><label for="user_password"><?php
	echo _WEBO_PASSWORD_OLD;
?></label><input type="password" name="user[password]" id="user_password" value="<?php
	echo $password;
?>" title="<?php
	echo _WEBO_PASSWORD_ENTERPASSWORD;
?>"/><label for="user_password_new"><?php
	echo _WEBO_PASSWORD_NEW;
?></label><input type="password" name="user[password_new]" id="user_password_new" value="" title="<?php
	echo _WEBO_PASSWORD_ENTERPASSWORDNEW;
?>"/><label for="user_password_confirm"><?php
	echo _WEBO_PASSWORD_CONFIRM
?></label><input type="password" name="user[password_confirm]" id="user_password_confirm" value="" title="<?php
	echo _WEBO_PASSWORD_ENTERPASSWORDCONFIRM;
?>"/></p><input type="submit" value="<?php
	echo _WEBO_SPLASH1_SAVE;
?>" title="<?php
	echo _WEBO_SPLASH1_SAVE;
?>" class="i"/><input type="hidden" name="page" value="install_change_password"/><input type="hidden" name="Submit" value="1"/></fieldset></form><b></b><i></i><del></del><ins></ins></div>