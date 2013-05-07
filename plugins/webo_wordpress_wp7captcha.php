<?php
// ==============================================================================================
// Licensed under the GNU GPLv3 (LICENSE.txt)
// ==============================================================================================
// @author     WEBO Software (http://www.webogroup.com/)
// @version    1.6.3
// @copyright  Copyright &copy; 2009-2013 WEBO Software, All Rights Reserved
// ==============================================================================================
// no direct access

/* This class checks cached page if there's a captcha image and if it's changes captcha image url to correct one */

class webo_wordpress_wp7captcha extends webo_plugin
{
	function onAfterOptimization ($content)
	{
		@include_once(dirname(__FILE__) . '/../../really-simple-captcha/really-simple-captcha.php');
		@include_once(dirname(__FILE__) . '/../../contact-form-7/includes/classes.php');
		@include_once(dirname(__FILE__) . '/../../contact-form-7/modules/captcha.php');
		$content_parts = explode('<input type="hidden" name="_wpcf7_captcha_challenge_captcha"', $content);
		$new_content = $content_parts[0];
		unset($content_parts[0]);
		foreach ($content_parts as $content_part) {
/* replace cached captcha values with new ones */
			$new_content .= preg_replace("!^.*?<img.*?/>!is", @wpcf7_captcha_shortcode_handler(array(
				'name' => 'captcha',
				'type' => 'captchac',
				'options' => array(),
				'values' => array()
			)), $content_part);
		}
		return $new_content;
	}
}

?>
