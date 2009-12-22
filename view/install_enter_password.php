<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs login page
 *
 **/
?><div class="wssN0 wssN1"><form action="index.php" method="post" class="wssC wssN2"><h1 class="wssA"><?php
	echo _WEBO_LOGIN_TITLE;
?></h1><dl class="wssD"><dt class="wssD1"><label for="wss_password" class="wssE"><?php 
	echo _WEBO_LOGIN_PASSWORD;
?>:</label></dt><dd class="wssD2"><input type="password" id="wss_password" name="wss_password" title="<?php
	echo _WEBO_LOGIN_ENTERPASSWORD;
?>" class="wssF"/></dd></dl><p class="wssD"><input type="submit" value="<?php
	echo _WEBO_LOGIN_LOGIN;
?>" class="wssG wssG1"/><input type="hidden" name="wss_page" value="install_dashboard"/><input type="hidden" name="wss_Submit" value="1"/></p></form></div>