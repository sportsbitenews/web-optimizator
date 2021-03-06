<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs general container for pages of administation interface
 *
 **/
 
/* set correct content charset */
if (!$skip_render) {
	header('Content-Type: text/html;charset=' . _WEBO_CHARSET);
}

$ajax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';

if (!$ajax) {
	if (!$skip_render) {
?><!DOCTYPE html><html><head><title><?php
		echo _WEBO_GENERAL_TITLE;
?> | <?php
		echo $title
?></title><meta http-equiv="content-type" content="text/html;charset=<?php
		echo _WEBO_CHARSET;
?>"/><link href="libs/css/wss.css?<?php
		if (empty($page) || (!empty($page) && $page != 'install_enter_password')) {
			echo $version;
		}
?>" rel="stylesheet" type="text/css"/><link rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACEklEQVQ4T3WST0iTcRjHf3nwtNOC/twW6kGvMXArYd1EN9pi4C5BJHRYSO80oqRAGsgGleDy1Nb8c8j0IpMVYjDqEhP6g77uUnpZHhL0IKRbyz3t8wuHbe4LDzw838/nfbcxpWqSzea8y8vZz/Pz7wrT0+kyw86NrpavJpNZt6RSH8xY7LWMj8+eOHQwsHVyMrm4Mzr6UqLRSVla+ihbW9tSLP7Ww86NDiaZTO3+95CpqUVzeHhCIpFJDTcKHQwsjpYXFt73GMZTGRwck3z+Z0P5KDCwOLgqFpv91N//WGZm0nVwqfRHDg/LdXdYHFxlGE8KgcAD2dj4IWtrm6JOuSrf8a0G4/G0HpJIvNEdDCwOrvL775XdbkMODgoavNw1IM5Lt/XbbRcCetg7HUHdEVgcXNXdPVB2uW7J/v6/B8zNZfSbjNBzsZ726GHnRkdgcXCVz3e3YLdfl1xuU5fFYknOnPVqIRp9pYedGx2BxcFVwWDkS3u7X8LhePVHevgoIefOX6t81KIedm5HgcXBVeHwix6bzS1tbT4xze8ayOe3qz8eYedGYFpargoOrv4v9PXdN63WK9LR4ZfV1W/SKHQwsDjVf+LIyITF6by509zcKRZLl4RCz2RlZV329n7pYedGB+Nw3NjFUcfDobf3jtnUZBelLp44dDB18vEMDY15PZ7Q19ZWb6HyxjLDzo2ulv8LN6Bqnkiu8fYAAAAASUVORK5CYII=" type="image/x-icon"/></head><body><?php
	}
?><a id="wss_spot"></a><div class="wss_a"><div class="wss_q"><span class="wss_q0"><?php
	echo _WEBO_GENERAL_LOADING;
?></span> <span id="wss_q1"></span><span id="wss_q2"></span></div><a id="wss_dashboard" title="WEBO Site SpeedUp" href="<?php
	if (in_array($page, array('install_enter_password', 'install_set_password'))) {
?>http://www.webogroup.com/home/site-speedup/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer<?php
	} else {
?>#wss_dashboard<?php
	}
?>"></a><span class="wss_c"><?php
	if (empty($page) || (!empty($page) && $page != 'install_enter_password')) {
		echo $version;
	}
?></span><ul class="wss_d" title="<?php
	echo _WEBO_GENERAL_LANGUAGE;
?>"><?php
	switch ($language) {
		case 'en':
?><li class="wss_e wss_e1"><a class="wss_g" href="javascript:yass.t('ru')"><?php
			echo _WEBO_GENERAL_ru;
?></a></li><?php
			break;
		default:
?><li class="wss_e wss_e1"><a class="wss_g" href="javascript:yass.t('en')"><?php
			echo _WEBO_GENERAL_en;
?></a></li><?php
			break;
	}
?><li class="wss_e wss_f"><a class="wss_g" href="javascript:if(yasss.lang){yass('.wss_d1')[0].className='wss_d';yass.lang=0}else{yass('.wss_d')[0].className='wss_d wss_d1';yass.lang=1}void(0)"><?php
	echo constant('_WEBO_GENERAL_' . $language);
	?></a></li><?php
	$i = 0;
	foreach (array('de', 'ru', 'es', 'ua', 'fr', 'it', 'ur', 'da', 'bg') as $lang) {
		if ($lang != $language && ($language != 'en' || $lang != 'ru')) {
?><li class="wss_e<?php
			echo $i == 7 ? ' wss_e2' : '';
?>"><a class="wss_g" href="javascript:yass.t('<?php
			echo $lang;
?>')"><?php
			echo constant('_WEBO_GENERAL_' . $lang);
?></a></li><?php
			$i++;
		}
	}
?></ul><?php
	if (empty($page) || (!empty($page) && $page != 'install_enter_password')) {
?><a id="wss_promo" href="#wss_promo" title="<?php
		echo _WEBO_GENERAL_BUY;
?> WEBO Site SpeedUp <?php
		echo _WEBO_GENERAL_PREMIUM . ' ' . _WEBO_GENERAL_EDITION;
?>"<?php
		echo $premium ? ' style="display:none"' : '';
?>><?php
		echo _WEBO_GENERAL_BUY;
?><span class="wss_o"><?php
		echo _WEBO_GENERAL_PREMIUM;
?></span><span class="wss_p"><?php
		echo _WEBO_GENERAL_EDITION
?></span><span class="wss_n"></span></a><a id="wss_bal" class="wssN5<?php
		if (round($premium) != 10) {
?> wssA0<?php
		}
?>" href="#wss_balance"><span class="wssN2"><span class="wssJ"><?php
		echo _WEBO_SAAS_BALANCE;
?>:</span><span id="wss_balance"><?php
		echo '???';
?></span></span></a><?php
	}
?><div id="wss_content"><?php
}

switch ($page) {
	case 'install_enter_password':
		include('install_enter_password.php');
		break;
	case 'install_set_password':
		include('install_set_password.php');
		break;
	default :
		require($page.".php");
		break;
}

if (!$ajax) {
?></div><p class="wss_y"><?php
	if ((empty($page) || !in_array($page, array('install_enter_password','install_set_password'))) && empty($ready)) {
?><a class="wss_z wss_z1" href="javascript:yass('.wss_a')[0].className='wss_a wss_a1';void(0)"><?php
		echo _WEBO_HELP_HELP;
?></a><?php
	}
?><a href="http://www.webogroup.com/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wss_x" title="WEBO Software"></a>&copy; 2009-<?php
	echo date("Y");
?> <a href="<?php
	if (in_array($page, array('install_enter_password', 'install_set_password'))) {
?>http://www.webogroup.com/home/site-speedup/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer<?php
	} else {
?>#wss_about<?php
	}
?>" class="wss_z" title="About WEBO Site SpeedUp">WEBO Site SpeedUp</a><?php
	if (empty($page) || (!empty($page) && $page != 'install_enter_password' && $page != 'install_set_password')) {
?> | <a class="wss_w" href="#wss_promo" title="WEBO Site SpeedUp"><span class="wss_w1<?php
		if (!$premium) {
?> wss_w0<?php
		}
?>"><?php
		echo _WEBO_SPLASH2_COMPARISON_DEMO . ' ' . _WEBO_SPLASH2_COMPARISON_VERSION;
?> </span><span class="wss_w6<?php
		if ($premium == 0.5) {
?> wss_w0<?php
		}
?>"> <?php
		echo _WEBO_SPLASH2_COMPARISON_ZERO . ' ' . _WEBO_SPLASH2_COMPARISON_VERSION;
?> </span><span class="wss_w2<?php
		if ($premium == 1) {
?> wss_w0<?php
		}
?>"> <?php
		echo _WEBO_SPLASH2_COMPARISON_LITE . ' ' . _WEBO_SPLASH2_COMPARISON_VERSION;
?> </span><span class="wss_w3<?php
		if ($premium == 2) {
?> wss_w0<?php
		}
?>"> <?php
		echo _WEBO_SPLASH2_COMPARISON_FULL . ' ' . _WEBO_SPLASH2_COMPARISON_VERSION;
?></span><span class="wss_w4<?php
		if ($premium == 3) {
?> wss_w0<?php
		}
?>"> <?php
		echo _WEBO_SPLASH2_COMPARISON_CORPORATE . ' ' . _WEBO_SPLASH2_COMPARISON_VERSION;
?></span></a><a class="wss_w" href="#wss_balance" title="WEBO Site SpeedUp"><span class="wss_w5<?php
		if ($premium == 10) {
?> wss_w0<?php
		}
?>"> <?php
		echo _WEBO_SPLASH2_COMPARISON_SAAS . ' ' . _WEBO_SPLASH2_COMPARISON_VERSION;
?></span></a><?php
	}
?></p><?php
	if ((empty($page) || !in_array($page, array('install_enter_password','install_set_password'))) && empty($ready)) {
		$screens_lang = (in_array($language, array('ru', 'ua')) ? 'ru' : 'en');
?><div id="wss_help"><div class="wss_r"><a href="javascript:yass('.wss_a')[0].className='wss_a';yass.v('wss_welcome=1');void(0)" class="wssJ20" title="<?php
		echo _WEBO_HELP_MINIMIZE;
?>"></a><h1 class="wssB"><?php
		echo _WEBO_HELP_WELCOME;
?>!</h1><h2 class="wssB1"><?php
		echo _WEBO_HELP_FIRSTTIME;
?></h2><ol class="wssO7"><li class="wssO8 wssO24"><a class="wssO22" href="#wss_wizard"><span class="wssO29<?php
		echo $screens_lang;
?> wssO25" title="<?php
		echo _WEBO_WIZARD_TITLE;
?>"></span></a><?php
		echo _WEBO_HELP_TUNING;
?></li><li class="wssO8 wssO21"><a class="wssO22" href="#wss_account"><span class="wssO29<?php
		echo $screens_lang;
?> wssO23" title="<?php
		echo _WEBO_DASHBOARD_ACCOUNT;
?>"></span></a><?php
		echo _WEBO_HELP_LICENSEKEY;
?> <a href="#wss_account" class="wssJ"><?php
		echo _WEBO_DASHBOARD_ACCOUNT;
?></a> <?php
		echo _WEBO_HELP_LICENSEKEY2;
?></li><li class="wssO8 wssO26"><a class="wssO22" href="#wss_dashboard"><span class="wssO29<?php
		echo $screens_lang;
?> wssO27" title="<?php
		echo _WEBO_SPLASH2_CONTROLPANEL;
?>"></span></a><?php
		echo _WEBO_HELP_CONTROLPANEL;
?></li></ol><div class="wss_r1"><div class="wssN wssN4"><h3 class="wssB2"><?php
		echo _WEBO_ABOUT_SUPPORT;
?></h3><ul class="wssO7"><li class="wssO8"><a href="http://www.webogroup.com/" class="wssJ wssJ0"><?php
		echo _WEBO_HELP_LINK1;
?></a></li><li class="wssO8"><a href="http://code.google.com/p/web-optimizator/w/list" class="wssJ wssJ0"><?php
		echo _WEBO_HELP_LINK2;
?></a></li><li class="wssO8"><a href="http://code.google.com/p/web-optimizator/issues/list" class="wssJ wssJ0"><?php
		echo _WEBO_HELP_LINK3;
?></a></li><li class="wssO8"><a href="http://www.webogroup.com/home/support/" class="wssJ wssJ0"><?php
		echo _WEBO_HELP_LINK4;
?></a></li><li class="wssO8"><a href="http://www.webogroup.com/store/" class="wssJ wssJ0"><?php
		echo _WEBO_HELP_LINK5;
?></a></li></ul></div><div class="wssN wssN4"><h3 class="wssB2"><?php
		echo _WEBO_HELP_MEDIA;
?></h3><a href="http://www.webogroup.com/home/site-speedup-joomla/video/" class="wssO29 wssO30"><span class="wssO29<?php
		echo $screens_lang;
?> wssO31"></span></a></div><div class="wssN"><h3 class="wssB2"><?php
		echo _WEBO_HELP_FEATURES;
?></h3><ul class="wssO7"><?php
		echo _WEBO_HELP_FEATURES_LIST;
?></ul><p class="wssI"><a class="wssJ" href="http://www.webogroup.com/home/site-speedup/features/"><?php
		echo _WEBO_HELP_FEATURES_ALL;
?></a> / <a href="http://blog.webogroup.com/" class="wssJ"><?php
		echo _WEBO_HELP_FEATURES_BLOG;
?></a></p><p class="wssI"><a href="javascript:yass('.wss_a')[0].className='wss_a';yass.v('wss_welcome=1');void(0)" class="wssJ wssJ5"><span class="wssJ6"></span><?php
		echo _WEBO_HELP_CLOSE;
?></a></p></div></div></div></div><?php
	}
?></div><script type="text/javascript"><?php
	if (!$premium) {
?>alert('<?php
		echo _WEBO_LICENSE_EXPIRED;
?>');<?php
	}
?><?php
	if ($premium == 10) {
?>setTimeout(function(){if(typeof _!=='undefined'){var a=document,b=a.createElement('script');b.type='text/javascript';b.src='http://webo.name/license/?key=<?php
		echo $license;
?>&status=1';a.body.appendChild(b)}else{setTimeout(arguments.callee,10)}},10);<?php
	}
?>wss_premium=<?php
	echo (empty($page) || (!empty($page) && $page != 'install_enter_password' && $page != 'install_set_password')) ? round($premium) : 10;
?></script><?php
	if (!$skip_render) {
?><script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAcDjjgL6gyYUwSrkesv6c7RRPj_C4VnSBVCqcbcH6fyxpcL8EhxSiDicBRQUIZJ32TB5Qr_cb3UjZXg"></script><script type="text/javascript" src="libs/js/yass.loadbar.js?<?php
		if (empty($page) || (!empty($page) && $page != 'install_enter_password')) {
			echo $version;
		}
?>"></script><script type="text/javascript">
if(yass('#wss_feed')[0]&&typeof google!=='undefined'){(function(){
google.load("feeds","1");function a(){
var f=new google.feeds.Feed("http://feeds.feedburner.com/WebOptimizerBlog");
f.load(function(r){if(!r.error){yass.feeds[0]=r.feed}})}google.setOnLoadCallback(a)}());
(function(){google.load("feeds","1");function a(){
var f=new google.feeds.Feed("http://sitespeedupupdates.blogspot.com/feeds/posts/default?alt=rss");
f.load(function(r){if(!r.error){yass.feeds[1]=r.feed}})};
google.setOnLoadCallback(a)}())}</script></body></html><?php
	}
}
?>