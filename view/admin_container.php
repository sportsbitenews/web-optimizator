<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Outputs general container for pages of administation interface
 *
 **/
 
/* set correct content charset */
header('Content-Type: text/html;charset=' . _WEBO_CHARSET);

$ajax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
          $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';

if (!$ajax) {
?><!DOCTYPE html><html><head><title><?php
		echo _WEBO_GENERAL_TITLE;
?> | <?php
		echo $title
?></title><meta http-equiv="content-type" content="text/html;charset=<?php
		echo _WEBO_CHARSET;
?>"/><link href="libs/css/main.css?<?php
		if (empty($page) || (!empty($page) && $page != 'install_enter_password')) {
			echo $version;
		}
?>" rel="stylesheet" type="text/css"/><link rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACEklEQVQ4T3WST0iTcRjHf3nwtNOC/twW6kGvMXArYd1EN9pi4C5BJHRYSO80oqRAGsgGleDy1Nb8c8j0IpMVYjDqEhP6g77uUnpZHhL0IKRbyz3t8wuHbe4LDzw838/nfbcxpWqSzea8y8vZz/Pz7wrT0+kyw86NrpavJpNZt6RSH8xY7LWMj8+eOHQwsHVyMrm4Mzr6UqLRSVla+ihbW9tSLP7Ww86NDiaZTO3+95CpqUVzeHhCIpFJDTcKHQwsjpYXFt73GMZTGRwck3z+Z0P5KDCwOLgqFpv91N//WGZm0nVwqfRHDg/LdXdYHFxlGE8KgcAD2dj4IWtrm6JOuSrf8a0G4/G0HpJIvNEdDCwOrvL775XdbkMODgoavNw1IM5Lt/XbbRcCetg7HUHdEVgcXNXdPVB2uW7J/v6/B8zNZfSbjNBzsZ726GHnRkdgcXCVz3e3YLdfl1xuU5fFYknOnPVqIRp9pYedGx2BxcFVwWDkS3u7X8LhePVHevgoIefOX6t81KIedm5HgcXBVeHwix6bzS1tbT4xze8ayOe3qz8eYedGYFpargoOrv4v9PXdN63WK9LR4ZfV1W/SKHQwsDjVf+LIyITF6by509zcKRZLl4RCz2RlZV329n7pYedGB+Nw3NjFUcfDobf3jtnUZBelLp44dDB18vEMDY15PZ7Q19ZWb6HyxjLDzo2ulv8LN6Bqnkiu8fYAAAAASUVORK5CYII=" type="image/x-icon"/></head><body><div class="wssa"><a id="wss_dashboard" title="WEBO Site SpeedUp" href="#wss_dashboard"></a><span class="wssc"><?php
		if (empty($page) || (!empty($page) && $page != 'install_enter_password')) {
			echo $version;
		}
?></span><ul class="wssd" title="<?php
	echo _WEBO_GENERAL_LANGUAGE;
?>"><?php
	switch ($language) {
		case 'en':
?><li class="wsse wsse1"><a class="wssg" href="javascript:_.t('ru')"><?php
			echo _WEBO_GENERAL_ru;
?></a></li><?php
			break;
		default:
?><li class="wsse wsse1"><a class="wssg" href="javascript:_.t('en')"><?php
			echo _WEBO_GENERAL_en;
?></a></li><?php
			break;
	}
?><li class="wsse wssf"><a class="wssg" href="javascript:if(_('.wssd1')[0]){_('.wssd1')[0].className='wssd'}else{_('.wssd')[0].className='wssd wssd1'}void(0)"><?php
	echo constant('_WEBO_GENERAL_' . $language);
	?></a></li><?php
	$i = 0;
	if (0) {
	foreach (array('de', 'ru', 'es', 'ua') as $lang) {
		if ($lang != $language) {
?><li class="wsse<?php
			echo $i == 2 ? ' wsse2' : '';
?>"><a class="wssg" href="javascript:_.t('<?php
			echo $lang;
?>')"><?php
			echo constant('_WEBO_GENERAL_' . $lang);
?></a></li><?php
			$i++;
		}
	}
	}
?></ul><a id="wss_promo" href="#wss_promo" title="<?php
	echo _WEBO_GENERAL_BUY;
?> WEBO Site SpeedUp <?php
	echo _WEBO_GENERAL_PREMIUM;
?> <?php
	echo _WEBO_GENERAL_EDITION
?>"<?php
	echo $premium ? ' style="display:none"' : '';
?>><?php
	echo _WEBO_GENERAL_BUY;
?><span class="wsso"><?php
	echo _WEBO_GENERAL_PREMIUM;
?></span><span class="wssp"><?php
	echo _WEBO_GENERAL_EDITION
?></span><span class="wssn"></span></a><div id="wss_content"><?php
	}
	
	require($page.".php");

	if (!$ajax) {
?></div><p class="wssy"><a href="http://www.web-optimizer.us/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssx" title="WEBO Software"></a>&copy; 2009-<?php
		echo date("Y");
?> <a href="#wss_about" class="wssz" title="About WEBO Site SpeedUp">WEBO Site SpeedUp</a><?php
		if (empty($page) || (!empty($page) && $page != 'install_enter_password' && $page != 'install_set_password')) {
?> | <a class="wssw" href="#wss_promo" title="WEBO Site SpeedUp"><span class="wssw1<?php
			if (!$premium) {
?> wssw0<?php
			}
?>"><?php
				echo _WEBO_SPLASH2_COMPARISON_DEMO;
?> <?php
				echo  _WEBO_SPLASH2_COMPARISON_VERSION;
?> </span><span class="wssw2<?php
				if ($premium == 1) {
?> wssw0<?php
				}
?>"> <?php
				echo _WEBO_SPLASH2_COMPARISON_LITE;
?> <?php
				echo  _WEBO_SPLASH2_COMPARISON_VERSION;
?> </span><span class="wssw3<?php
				if ($premium == 2) {
?> wssw0<?php
				}
?>"> <?php
				echo _WEBO_SPLASH2_COMPARISON_FULL;
?> <?php
				echo  _WEBO_SPLASH2_COMPARISON_VERSION;
?></span></a><?php
		}
?></p></div><script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAcDjjgL6gyYUwSrkesv6c7RRPj_C4VnSBVCqcbcH6fyxpcL8EhxSiDicBRQUIZJ32TB5Qr_cb3UjZXg"></script><script type="text/javascript" src="libs/js/yass.loadbar.js?<?php
		if (empty($page) || (!empty($page) && $page != 'install_enter_password')) {
			echo $version;
		}
?>"></script><script type="text/javascript">if(_('#wss_feed')[0]){(function(){google.load("feeds","1");function a(){var f=new google.feeds.Feed("http://feeds.feedburner.com/WebOptimizerBlog");f.load(function(r){if(!r.error){_.feeds[0]=r.feed}})}google.setOnLoadCallback(a)}());(function(){google.load("feeds","1");function a(){var f=new google.feeds.Feed("http://sitespeedupupdates.blogspot.com/feeds/posts/default?alt=rss");f.load(function(r){if(!r.error){_.feeds[1]=r.feed}})};google.setOnLoadCallback(a)}())}wss_premium=<?php
		echo (empty($page) || (!empty($page) && $page != 'install_enter_password' && $page != 'install_set_password')) ? round($premium) : 10;
?></script></body></html><?php
	}
?>