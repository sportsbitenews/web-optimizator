<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs final Stage 2 page
 *
 **/
?><ul><li><a href="index.php" title="<?php
	echo _WEBO_SPLASH1_BACK;
?>">1</a></li><li><strong>2</strong></li><li><a href="?page=install_stage_3" title="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" class="x">3</a></li></ul></div><p id="showme"><sub><a href="index.php" title="<?php
	echo _WEBO_SPLASH1_BACK;
?>"></a></sub><sup><a href="?page=install_stage_3" title="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" class="x"></a></sup></p><div class="c"><b></b><i></i><del></del><ins></ins><h2><?php
	echo _WEBO_SPLASH2_TITLE;
?></h2><div class="d n" id="f"><ul><li><a href="#dirs" class="z" name="1"><?php
	echo _WEBO_SPLASH2_CACHE;
?></a></li><?php
	$count = 1;
	foreach($options AS $key=>$type) {	
		if(is_array($type['value']) && empty($type['is_premium'])) {
?><li><a href="#wo_<?php
			echo $key;
?>" name="<?php
			echo ++$count;
?>"><?php
			echo $type['title'];
?></a></li><?php
		}
	}
	if (empty($premium)) {
?><li><a href="#comparison" name="<?php
	echo ++$count;
?>"><strong><?php
		echo _WEBO_SPLASH2_COMPARISON;
?></strong></a></li><?php
	}
?></ul><form method="post" enctype="multipart/form-data" action="?page=install_stage_3" id="exp"><div class="n"><fieldset id="dirs"><h3><?php
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
	echo _WEBO_SPLASH2_WEBSITEROOT;
?><input name="user[website_root]" value="<?php
	echo $website_root;
?>" title="<?php
	echo _WEBO_SPLASH2_WEBSITEROOT;
?>" size="40"/></label><label><?php
	echo _WEBO_SPLASH2_DOCUMENTROOT;
?><input name="user[document_root]" value="<?php
	echo $document_root;
?>" title="<?php
	echo _WEBO_SPLASH2_DOCUMENTROOT;
?>" size="40"/></label><label><?php
	echo _WEBO_SPLASH2_HOST;
?><input name="user[host]" value="<?php
	echo $host;
?>" title="<?php
	echo _WEBO_SPLASH2_HOST;
?>" size="40"/></label><label><?php
	echo _WEBO_LOGIN_LICENSE;
?><input name="user[license]" value="<?php
	echo $license;
?>" title="<?php
	echo _WEBO_LOGIN_ENTERLICENSE;
?>" size="40"/></label><input type="hidden" name="page" value="install_stage_3"/><input type="hidden" name="Submit" value="1"/><input type="hidden" name="user[_username]" value="<?php
	echo $compress_options['username'];
?>"/><input type="hidden" name="user[_password]" value="<?php
	echo $compress_options['password'];
?>"/></fieldset><?php
	foreach ($options as $key => $type) {
		if (is_array($type['value']) && empty($type['is_premium'])) {
?><fieldset id="wo_<?php
			echo $key;
?>"><h3><?php
			echo $type['title'];
?></h3><div class="o"><?php
			echo $type['intro'];
?><i></i><del></del></div><?php
			foreach ($type['value'] as $option => $value) {
				if ((!in_array($option, array('javascript_level', 'page_level', 'css_level', 'fonts_level', 'cookie', 'html_comments', 'html_one_string', 'gzip_noie', 'include_code', 'html_timeout', 'spot')) ||
						(in_array($option, array('cookie', 'html_comments', 'html_one_string', 'gzip_noie', 'include_code', 'html_timeout', 'spot'))
							&& $premium)) &&
					($option != 'html' ||
						$key != 'far_future_expires' ||
						($option == 'html' &&
							$key == 'far_future_expires' &&
							$premium))) {
?><label><?php
					if (in_array($option, array('html_timeout', 'dimensions_limited', 'ignore_list', 'timeout', 'allowed_list', 'flush_size', 'size', 'mhtml_size', 'user', 'pass', 'additional', 'additional_list', 'cache_version', 'css_code', 'link', 'image', 'css_file', 'javascript_file'))) {
						echo defined("_WEBO_" . $key . "_" . $option) ? constant("_WEBO_" . $key . "_" . $option) : ($key . " " . $option);
						echo in_array($option, array('ignore_list', 'allowed_list', 'additional', 'additional_list')) ? '. ' . _WEBO_SPLASH2_SPACE : ':';
?> <input name="user[<?php
						echo $key;
?>][<?php
						echo $option;
?>]" value="<?php
						echo $value;
?>" size="40"<?php
						echo in_array($option, array('html_timeout', 'dimensions_limited', 'timeout', 'flush_size', 'size', 'mhtml_size', 'cache_version')) ? ' class="t"' : '';
?>/><?php
					} elseif (in_array($option, array('include_code'))) {
						echo defined("_WEBO_" . $key . "_" . $option) ? constant("_WEBO_" . $key . "_" . $option) : ($key . " " . $option);
?> <textarea name="user[<?php
						echo $key;
?>][<?php
						echo $option;
?>]" rows="3" cols="40"><?php
						echo htmlspecialchars(str_replace("<br/>", "\n", $value));
?></textarea><?php

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
?>]<?php
						}
?>" <?php
						echo empty($value) ? '' : 'checked="checked"';
?>/></a><?php
						echo defined("_WEBO_" . $key . "_" . $option) ? constant("_WEBO_" . $key . "_" . $option) : ($key . " " . $option);
					}
?></label><?php
				} elseif (!in_array($option, array('javascript_level', 'page_level', 'css_level', 'fonts_level')) && !$premium) {
?><input type="hidden" name="user[<?php
					echo $key;
?>][<?php
					echo $option;
?>]" value="<?php
					echo $value;
?>"/><?php
				}
			}
?></fieldset><?php 
		} elseif (!empty($type['is_premium'])) {
			foreach ($type['value'] as $option => $value) {
?><input type="hidden" name="user[<?php
				echo $key;
?>][<?php
				echo $option;
?>]" value="<?php
				echo $value;
?>"/><?php
			}
		}
	}
	if (empty($premium)) {
?><fieldset id="comparison"><h3><?php
		echo _WEBO_SPLASH2_COMPARISON;
?></h3><table><col width="190"/><col width="115"/><col width="275"/><thead><tr><th><?php
		echo _WEBO_SPLASH2_COMPARISON_TITLE;
?></th><th><?php
		echo _WEBO_SPLASH2_COMPARISON_DEMO;
?></th><th><?php
		echo _WEBO_SPLASH2_COMPARISON_FULL;
?></th></tr></thead><tfoot><tr><td><?php
		echo _WEBO_SPLASH2_COMPARISON_ALLBENEFITS;
?></td><td></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> <strong>98%</strong> <?php
		echo _WEBO_SPLASH2_COMPARISON_SAVED;
?><br/><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> <strong>73%</strong> <?php
		echo _WEBO_SPLASH2_COMPARISON_TRAFFIC;
?><br/><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> <strong>85%</strong> <?php
		echo _WEBO_SPLASH2_COMPARISON_REQUESTS;
?><br/><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO2;
?> <strong>70%</strong> <?php
		echo _WEBO_SPLASH2_COMPARISON_ACCELERATION;
?><br/><?php
		echo _WEBO_SPLASH2_COMPARISON_SUPPORT;
?> 24/7</td></tr></tfoot><tbody><tr><td><?php
		echo _WEBO_SPLASH2_COMPARISON_CPU;
?></td><td>15-50 <?php
		echo _WEBO_SPLASH2_COMPARISON_CPU_MS;
?></td><td>3-10<?php
		echo _WEBO_SPLASH2_COMPARISON_CPU_MS;
?></td></tr><tr><td><?php
		echo _WEBO_SPLASH2_GZIP;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 65% <?php
		echo _WEBO_SPLASH2_COMPARISON_TRAFFIC;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 88% <?php
		echo _WEBO_SPLASH2_COMPARISON_TRAFFIC;
?></td></tr><tr><td><?php
		echo _WEBO_SPLASH2_EXPIRES;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 60% <?php
		echo _WEBO_SPLASH2_COMPARISON_TRAFFIC;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 85% <?php
		echo _WEBO_SPLASH2_COMPARISON_TRAFFIC;
?></td></tr><tr><td><?php
		echo _WEBO_SPLASH2_HTMLCACHE;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_NOTINCLUDED;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 90% <?php
		echo _WEBO_SPLASH2_COMPARISON_LOAD;
?></td></tr><tr><td><?php
		echo _WEBO_SPLASH2_SPRITES;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_NOTINCLUDED;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 25% <?php
		echo _WEBO_SPLASH2_COMPARISON_REQUESTS;
?></td></tr><tr><td><?php
		echo _WEBO_SPLASH2_DATAURI;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_NOTINCLUDED;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO;
?> 60% <?php
		echo _WEBO_SPLASH2_COMPARISON_REQUESTS;
?></td></tr><tr><td><?php
		echo _WEBO_SPLASH2_PARALLEL;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_NOTINCLUDED;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO2;
?> 50% <?php
		echo _WEBO_SPLASH2_COMPARISON_ACCELERATION;
?></td></tr><tr><td><?php
		echo _WEBO_SPLASH2_UNOBTRUSIVE;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_NOTINCLUDED;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_UPTO2;
?> 20% <?php
		echo _WEBO_SPLASH2_COMPARISON_ACCELERATION;
?></td></tr><tr><td><?php
		echo _WEBO_SPLASH2_COMPARISON_SUPPORT;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_NOTINCLUDED;
?></td><td>24/7</td></tr><tr><td><?php
		echo _WEBO_SPLASH2_COMPARISON_PRICE;
?></td><td><?php
		echo _WEBO_SPLASH2_COMPARISON_FREE;
?></td><td><strong><?php
		echo _WEBO_SPLASH2_COMPARISON_FULLPRICE;
?></strong></td></tr></tbody></table><strong><?php
		echo _WEBO_GENERAL_BUYNOW;
?></strong></fieldset><?php
	}
?></div><p id="hideme"><input type="submit" value="<?php
	echo _WEBO_SPLASH1_NEXT;
?>" class="i"/></p></form><b></b><i></i><del></del><ins></ins></div><div id="a"><div><span id="b"><span id="d"></span></span></div><span id="c"><span id="e">0</span>%</span></div>