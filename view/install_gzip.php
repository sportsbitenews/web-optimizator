<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs page to create .gz versions of files
 *
 **/
?></div><p id="showme"><sub><a href="?" title="<?php
	echo _WEBO_SPLASH1_BACK;
?>"></a></sub></p><div class="c"><b></b><i></i><del></del><ins></ins><h2><?php
	echo _WEBO_GZIP_TITLE
?></h2><div class="d u"><div class="e"><?php
	if (empty($results)) {
		echo _WEBO_GZIP_INSTALLED;
	} else {
		echo _WEBO_GZIP_RESULTS;
?><textarea rows="22" cols="55"><?php
		echo $results;
?></textarea><?php
	}
?></div><form method="post" enctype="multipart/form-data" action="?"><fieldset class="f"><legend><?php
	echo _WEBO_GZIP_ENTERDIRECTORY;
?></legend><p><label for="user_directory"><?php
	echo _WEBO_GZIP_DIRECTORY;
?></label><input name="user[directory]" id="user_directory" value="<?php
	echo $directory;
?>" title="<?php
	echo _WEBO_GZIP_ENTERDIRECTORY;
?>"/></p><input type="submit" value="<?php
	echo _WEBO_GZIP_CREATE;
?>" title="<?php
	echo _WEBO_GZIP_CREATE;
?>" class="i"/><input type="hidden" name="page" value="install_gzip"/><input type="hidden" name="Submit" value="1"/><input type="hidden" name="user[_username]" value="<?php
	echo $username;
?>"/><input type="hidden" name="user[_password]" value="<?php
	echo $password;
?>"/></fieldset></form><b></b><i></i><del></del><ins></ins></div>