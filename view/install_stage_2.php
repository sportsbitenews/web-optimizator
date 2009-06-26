<ul><li><a href="index.php" title="<?php
	echo _WEBO_SPLASH1_BACK;
?>">1</a></li><li><strong>2</strong></li><li><a href="?page=install_stage_3" title="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" class="x">3</a></li></ul></div><p><sub><a href="index.php" title="<?php
	echo _WEBO_SPLASH1_BACK;
?>"></a></sub><sup><a href="?page=install_stage_3" title="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" class="x"></a></sup></p><div class="c"><b></b><i></i><del></del><ins></ins><h2><?php
	echo _WEBO_SPLASH2_TITLE;
?></h2><div class="d n"><ul><li><a href="#dirs" class="z"><?php
	echo _WEBO_SPLASH2_CACHE;
?></a></li><?php
	foreach($options AS $key=>$type) {
		if(is_array($type['value'])) {
?><li><a href="#<?php
			echo $key;
?>"><?php
			echo $type['title'];
?></a></li><?php
		}
	}
?></ul><form method="post" enctype="multipart/form-data" action=""><fieldset id="dirs"><h3><?php
	echo _WEBO_SPLASH2_CACHE;
?></h3><label><?php
	echo _WEBO_SPLASH2_CACHE_JS;
?><input name="user[javascript_cachedir]" value="<?php
	echo $javascript_cachedir;
?>" title="<?php
	echo _WEBO_SPLASH2_CACHE_JS;
?>" size="40"/></label><label><?php
	echo _WEBO_SPLASH2_CACHE_CSS;
?><input name="user[css_cachedir]" value="<?php
	echo $css_cachedir;
?>" title="<?php
	echo _WEBO_SPLASH2_CACHE_CSS;
?>" size="40"/></label><label><?php
	echo _WEBO_SPLASH2_CACHE_HTML;
?><input name="user[html_cachedir]" value="<?php
	echo $html_cachedir;
?>" title="<?php
	echo _WEBO_SPLASH2_CACHE_HTML;
?>" size="40"/></label><label><?php
	echo _WEBO_SPLASH2_INSTALLDIR;
?><input name="user[webo_cachedir]" value="<?php
	echo $webo_cachedir;
?>" title="<?php
	echo _WEBO_SPLASH2_INSTALLDIR;
?>" size="40"/></label><label><?php
	echo _WEBO_SPLASH2_DOCUMENTROOT;
?><input name="user[document_root]" value="<?php
	echo $document_root;
?>" title="<?php
	echo _WEBO_SPLASH2_DOCUMENTROOT;
?>" size="40"/></label><input type="submit" value="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" class="i" id="hideme"/><input type="hidden" name="page" value="install_stage_3"/><input type="hidden" name="Submit" value="1"/><input type="hidden" name="user[_username]" value="<?php
	echo $compress_options['username'];
?>"/><input type="hidden" name="user[_password]" value="<?php
	echo $compress_options['password'];
?>"/></fieldset><?php
	foreach ($options AS $key => $type) {
		if(is_array($type['value'])) {
?><fieldset id="<?php
			echo $key;
?>"><h3><?php
			echo $type['title'];
?></h3><div class="o"><?php
			echo $type['intro'];
?><i></i><del></del></div><?php
			foreach ($type['value'] as $option=>$value) {
?><label><?php
				if (in_array($option, array('html_timeout', 'dimensions_limited', 'ignore_list', 'timeout', 'allowed_list', 'flush_size'))) {
					echo defined("_WEBO_" . $key . "_" . $option) ? constant("_WEBO_" . $key . "_" . $option) : ($key . " " . $option);
?>.<?php
					echo in_array($option, array('html_timeout', 'dimensions_limited', 'timeout', 'flush_size')) ? '' : _WEBO_SPLASH2_SPACE;
?> <input name="user[<?php
					echo $key;
?>][<?php
					echo $option;
?>]" value="<?php
					echo $value;
?>" size="40"<?php
					echo in_array($option, array('html_timeout', 'dimensions_limited', 'timeout', 'flush_size')) ? ' class="t"' : '';
?>/><?php
				} else {
?><a href="#<?php
					echo $key;
?>" class="<?php
					if (strpos($option, 'ith_')) {
						echo empty($value) ? 'r' : 'y';
?>"><input type="radio" name="with" value="<?php
						echo $key
?>#<?php
						echo $option;
					} else {
						echo empty($value) ? 's' : 'w';
?>"><input type="checkbox" name="user[<?php
						echo $key;
?>][<?php
						echo $option;
?>]" value="<?php
						echo $value;
					}
?>" <?php
					echo empty($value) ? '' : 'checked="checked"';
?>/></a><?php
					echo defined("_WEBO_" . $key . "_" . $option) ? constant("_WEBO_" . $key . "_" . $option) : ($key . " " . $option);
?><?php
				}
?></label><?php
			}
?></fieldset><?php 
		}
	}
?></form><b></b><i></i><del></del><ins></ins></div>