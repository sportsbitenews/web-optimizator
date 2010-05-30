<?php
// ==============================================================================================
// Licensed under the GNU GPLv3 (LICENSE.txt)
// ==============================================================================================
// @author     WEBO Software (http://www.webogroup.com/)
// @version    1.1.0
// @copyright  Copyright &copy; 2009-2010 WEBO Software, All Rights Reserved
// ==============================================================================================
// no direct access

/* This class checks cached page if there's a captcha image and if it's changes captcha image url to correct one */

class webo_cs_cart_captcha extends webo_plugin
{
	function onAfterOptimization ($content)
	{
		$content_parts = explode('verification_id=', $content);
		if (count($content_parts) > 1)
		{
			$new_content = $content_parts[0];
			unset($content_parts[0]);
			foreach($content_parts as $content_part)
			{
				$new_content .= 'verification_id=';
				$sess_id = explode(':', $content_part, 2);
				if(!empty($sess_id[1]))
				{
					$new_content .= session_id() . ':';
					$captcha_id = explode('&amp;', $sess_id[1], 3);
					if(!empty($captcha_id[1]) && !empty($captcha_id[2]))
					{
						$new_content .= $captcha_id[0] . '&amp;' . uniqid($captcha_id[0]) . '&amp;' . $captcha_id[2];
					}
					else
					{
						$new_content = $new_content . implode('&amp;',$captcha_id);
					}
				}
				else
				{
					$new_content .= $sess_id[0];
				}
			}

			return $new_content;
		}
		return $content;
	}
}

?>
