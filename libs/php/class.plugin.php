<?php
// ==============================================================================================
// Licensed under the GNU GPLv3 (LICENSE.txt)
// ==============================================================================================
// @author     WEBO Software (http://www.webogroup.com/)
// @version    1.1.0
// @copyright  Copyright &copy; 2009-2010 WEBO Software, All Rights Reserved
// ==============================================================================================
// no direct access

/* Abstract WEBO plugin class */

class webo_plugin
{
	/* Two methods required for every plugin but don't needed in our case so just return recieved content */
	function onCache ($content)
	{
		return $content;
	}

	function onBeforeOptimization ($content)
	{
		return $content;
	}

	function onAfterOptimization ($content)
	{
		return $content;
	}
}

?>