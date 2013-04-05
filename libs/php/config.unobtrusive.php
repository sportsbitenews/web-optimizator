<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Configuration for delayed JavaScript blocks
 * License agreement: http://www.webogroup.com/about/EULA.txt
 *
 **/
$unobtrusive_items = array(
/* Advertisement */
	'unobtrusive_ads' => array (
/* Amazon Ads */
		'aa' => array(
			'marker' => 'amazon_ad',
			'regexp' => "<script[^>]+><!--[^\da-zA-Z]*amazon_ad_tag.*?ads.js\"></script>"
/* Affiz */
		), 'af' => array(
			'marker' => 'affiz.net/tracking',
			'regexp' => "<script[^>]+>[^\da-zA-Z]*var rdads.*?affiz.net/tracking/ads_display.php.*?</script>"
/* AdVaction */
		), 'av' => array(
			'marker' => 'advaction.ru/js/advertiser.js',
			'regexp' => "<script[^>]+advaction.ru/js/advertiser.js[^>]*></script>"
/* BlogBang */
		), 'bb' => array(
			'marker' => 'blogbang.com/d.php',
			'regexp' => "<script[^>]+src=[\"']http://www.blogbang.com/d.php\?id=.*?</script>"
/* Begun */
		), 'bu' => array(
			'marker' => 'autocontext.begun.ru',
			'regexp' => "<script[^>]+><!--[^\da-zA-Z]*var begun_auto_pad.*?autocontext.begun.ru/autocontext2\.js[\"']></script>"
/* Carpediem */
		), 'cp' => array(
			'marker' => 'media.yesmessenger.com',
			'regexp' => "<script[^>]+>[^\da-zA-Z]*var yesmsng_flash_banner.*?media.yesmessenger.com/flashbanner/[^>]+></script>"
/* DirectAdvert */
		), 'da' => array(
			'marker' => 'directadvert.ru/show.cgi',
			'regexp' => "<script[^>]+directadvert.ru/show\.cgi.*?/script>",
			'onload_before' => '<script[^>]+src=[\'"](.*?)[\'"][^>]*></script>',
			'onload_after' => 'var b=document,a=b.createElement("script");a.type="text/javascript";a.src="$1";wss_parentNode.appendChild(a);wss_onload_ready=1',
			'inline' => true
/* eBuzzing */
		), 'eb' => array(
			'marker' => 'ebuzzing.com/player',
			'regexp' => "<script[^>]+src=[\"']http://www.ebuzzing.com/player[^>]+></script>"
/* ExoClick */
		), 'ec' => array(
			'marker' => 'syndication.exoclick.com',
			'regexp' => "<script[^>]+src=[\"']http://syndication.exoclick.com.*?</script>"
/* GoViral */
		), 'gv' => array(
			'marker' => 'videos.video-loader.com',
			'regexp' => "<script[^>]+src=[\"']http://videos.video-loader.com.*?</script>"
/* Google AdWords */
		), 'gw' => array(
			'marker' => 'pagead2.googlesyndication.com',
			'regexp' => "<script[^>]+>[^<\da-zA-Z]*<!--[\s\t\r\n]*google_ad_client.*?show_ads.js\">[\r\n\s\t]*</script>",
			'onload_before' => '<script type="text/javascript">[\r\n\s\t]*<!--(.*?)//-->[\r\n\s\t]*</script>.*?</script>',
			'onload_after' => '$1;var b=document,a=b.createElement("script");a.type="text/javascript";a.src="//pagead2.googlesyndication.com/pagead/show_ads.js";wss_parentNode.appendChild(a);setTimeout(function(){if(document.getElementById("gw_dst_###WSS###").getElementsByTagName("iframe")[0]){wss_onload_ready=1}else{setTimeout(arguments.callee,10)}},10)'
/* Novoteka */
		), 'nn' => array(
			'marker' => 'novoteka.ru',
			'regexp' => "<script[^>]+src=['\"]https?://nnn\.novoteka\.ru[^>]+></script>",
			'onload_before' => '<script[^>]*?src=[\'"]https?://nnn\.novoteka\.ru([^>]+)[\'"]></script>',
			'onload_after' => 'document.write(\'\x3cscript type="text/javascript" charset="windows-1251" src="//nnn.novoteka.ru$1">\x3c/script>\');wss_onload_ready=1'
/* OpenX */
		), 'ox' => array(
			'marker' => 'OpenX Javascript',
			'regexp' => "<!--/\*\sOpenX\sJavascript.*?</noscript>"
/* PredictAd */
		), 'pa' => array(
			'marker' => 'PredictAd',
			'regexp' => "<!-- PredictAd Code.*?End PredictAd Code -->"
/* Generic OpenX */
		), 'rb' => array(
			'marker' => '/delivery/ajs.php',
			'regexp' => "<script[^>]+><!--//<!\[CDATA\[[^\da-zA-Z]*var m3_u.*?</script>"
/* Yandex.Direct.Async */
		), 'ya' => array(
			'marker' => 'Ya.Direct.insertInto',
			'regexp' => "<script[^>]+>[^<]*?Ya\.Direct\.insertInto.*?</script>",
			'onload_before' => '<script[^>]*>(.*?)</script>',
			'onload_after' => '$1;setTimeout(function(){if(typeof Ya.Context!=="undefined"){wss_onload_ready=1}else{setTimeout(arguments.callee,10)}},10)'
/* Yandex.Direct */
		), 'yd' => array(
			'marker' => 'yandex_partner_id',
			'regexp' => "<script[^>]+>(<!--|[^\da-zA-Z]*//<!\[CDATA\[)[^\da-zA-Z]*yandex_partner_id.*?</script>",
			'onload_before' => '<script[^>]*>.*?CDATA\[(.*?)//\]\].*',
			'onload_after' => '$1;var b=document,a=b.createElement("script");a.type="text/javascript";a.src="//an.yandex.ru/system/context.js";wss_parentNode.appendChild(a);setTimeout(function(){if(document.getElementById("y5_direct"+(###WSS###+1))){wss_onload_ready=1}else{setTimeout(arguments.callee,10)}},10)'
/* Unruly Media */
		), 'um' => array(
			'marker' => 'video.unrulymedia.com',
			'regexp' => "<script[^>]+src=[\"']http://video.unrulymedia.com.*?</script>"
		)
	), 'unobtrusive_iframes' => array (
		'if' => array(
			'marker' => '<iframe',
			'regexp' => "<iframe.*?</iframe>"
		), 'IF' => array(
			'marker' => '<IFRAME',
			'regexp' => "<iframe.*?</iframe>"
		)
/* Informers */
	), 'unobtrusive_informers' => array(
/* AddThis */
		'at' => array(
			'marker' => 'AddThis',
			'regexp' => "<!--\sAddThis\sButton\sBEGIN.*?AddThis\sButton\sEND\s-->",
			'height' => 16
/* Bot Scanner */
		), 'bs' => array(
			'marker' => 'scan.botscanner.com',
			'regexp' => "<script[^>]+src=['\"]https?://scan.botscanner.com[^>]+></script>",
			'onload_before' => "<script[^>]+src=['\"](https?:)?(//scan.botscanner.com.*?)['\"][^>]*></script>",
			'onload_after' => 'document.write(\'\x3cscript type="text/javascript" src="$2">\x3c/script>\');wss_onload_ready=1',
			'inline' => true
/* Facebook Connect Async */
		), 'fa' => array(
			'marker' => 'connect.facebook.net',
			'regexp' => "<script[^>]*>\(function\(d.*?connect.facebook.net.*?</script>",
			'onload_before' => "<script[^>]*>(\(function\(d.*?connect.facebook.net.*?)</script>",
			'onload_after' => '$1;setTimeout(function(){if(typeof window.FB!=="undefined"){wss_onload_ready=1}else{setTimeout(arguments.callee,10)}},10)'
/* FetchBack */
		), 'fb' => array(
			'marker' => 'pixel.fetchback.com',
			'regexp' => "<iframe\s*src='https://pixel.fetchback.com/serve/fb/pdc.*?</iframe>",
			'onload_before' => "<iframe\s*src='(https://pixel.fetchback.com/serve/fb/pdc.*?)'[^>]*></iframe>",
			'onload_after' => 'var a=document.createElement("iframe");a.src="$1";a.id=a.style.width=a.style.height="1px";a.style.border=a.frameBorder=0;document.body.appendChild(a);wss_onload_ready=1;'
/* Facebook Connect */
		), 'fc' => array(
			'marker' => 'ak.connect.facebook',
			'regexp' => "<script type=\"text/javascript\" src=\"https?://static\.ak\.connect\.facebook\.com.*?FB\.init\([\"'][a-f0-9]+[\"']\);?</script>",
			'onload_before' => "<script type=\"text/javascript\" src=\"https?://static\.ak\.connect\.facebook\.com([^>]+)\">[\r\n\s\t]*</script>[\r\n\s\t]*<script type=\"text/javascript\">([^>]+)</script>",
			'onload_after' => 'document.write(\'\x3cscript type="text/javascript" src="//static.ak.connect.facebook.com$1">\x3c/script>\');setTimeout(function(){if(typeof FB!=="undefined"){$2;wss_onload_ready=1}else{setTimeout(arguments.callee,10)}},10)'
/* Google Connect */
		), 'gc' => array(
			'marker' => 'friendconnect',
			'regexp' => "<script type=\"text/javascript\" src=\"https?://www\.google\.com/friendconnect.*?var\sskin.*?</script>",
			'onload_before' => "<script type=\"text/javascript\" src=\"https?://www\.google\.com/friendconnect([^>]+)\">[\r\n\s\t]*</script>(.*?)<script[^>]+>(.*?)</script>",
			'onload_after' => 'document.write(\'\x3cscript type="text/javascript" src="//www.google.com/friendconnect$1">\x3c/script>\');document.write(\'$2\');setTimeout(function(){if(typeof google!=="undefined"&&typeof google.friendconnect!=="undefined"){$3;wss_onload_ready=1}else{setTimeout(arguments.callee,10)}},10)'
/* Google Search */
		), 'gs' => array(
			'marker' => 'setOnLoadCallback',
			'regexp' => "<script src=\"https?://www.google.com/jsapi\" type=\"text/javascript\">[\r\n\s\t]*</script>[\r\n\s\t]*<script type=\"text/javascript\">(//\s*<!\[CDATA\[)?[\r\n\s\t]*google\.load\(['\"]search.*?</script>",
			'onload_before' => '.*?google.load\(\s*[\'"]search[\'"](.*?)\);(.*?)google.setOnLoadCallback[\r\n\s\t]*\([\r\n\s\t]*function\(\)[\r\n\s\t]*\{(.*?)\},\strue\);(.*?)</script>',
			'onload_after' => 'document.write(\'\x3cscript src="//www.google.com/jsapi" type="text/javascript">\x3c/script>\');setTimeout(function(){if(typeof google!=="undefined"&&typeof google.load!=="undefined"){google.load("search"$1);setTimeout(function(){if(typeof google.search!=="undefined"&&typeof google.search.CustomSearchControl!=="undefined"){$2$3$4;setTimeout(function(){var a=document.forms,b=0,c;while(c=a[b++]){if(c.className=="gsc-search-box"){wss_onload_ready=1}}if(!wss_onload_ready){setTimeout(arguments.callee,20)}},20)}else{setTimeout(arguments.callee,10)}},10)}else{setTimeout(arguments.callee,10)}},10);'
/* Google Search Engine */
		), 'gse' => array(
			'marker' => 'cse/cse',
			'regexp' => "<script[^>]*>[^<]+cse/cse[^<]+</script>",
			'onload_before' => "<script[^>]*>([^<]+cse/cse[^<]+)</script>",
			'onload_after' => '$1;wss_onload_ready=1;'
/* Google Plus */
		), 'gp' => array(
			'marker' => 'plusone.js',
			'regexp' => "<script[^>]+apis.google.com/js/plusone.js[^>]*>[^<]*</script>",
			'onload_before' => '<script[^>]+src="(https?://apis.google.com/js/plusone.js.*)">(.*?)</script>',
			'onload_after' => 'document.write(\'\x3cscript type="text/javascript" src="$1">\x3c/script>\');$2;wss_onload_ready=1;',
			'inline' => true
/* Google Translate */
		), 'gt' => array(
			'marker' => 'translate.google.com',
			'regexp' => "<script[^>]+src=\"(https?:)?//translate.google.com/[^\"]+\"[^>]*></script>",
			'onload_before' => '<script[^>]+src=\"(https?:)?//translate.google.com/([^\"]+)\"[^>]*></script>',
			'onload_after' => 'document.write(\'\x3cscript src="//translate.google.com/$2" type="text/javascript">\x3c/script>\');wss_onload_ready=1;'
/* LinkedIn */
		), 'ln' => array(
			'marker' => 'platform.linkedin',
			'regexp' => '<script[^>]*>[^>]*?platform\.linkedin[^>]*?</script>',
			'onload_before' => '<script[^>]*>([^>]*?platform\.linkedin[^>]*?)</script>',
			'onload_after' => '$1;setTimeout(function(){if(typeof window.IN!=="undefined"){wss_onload_ready=1}else{setTimeout(arguments.callee,10)}},10)'
/* Lentovod */
		), 'lv' => array(
			'marker' => 'lentovod.ru/rss',
			'regexp' => '<embed[^>]+lentovod.ru/rss[^>]+>',
			'onload_before' => '<(embed[^>]+lentovod.ru/rss[^>]+>)',
			'onload_after' => 'document.write(\'\x3c$1\');wss_onload_ready=1;'
/* Livetex */
		), 'lx' => array(
			'marker' => 'liveTexID',
			'regexp' => '<script[^>]*>[^>]*?liveTexID[^>]*?</script>',
			'onload_before' => '<script[^>]*>[^>]*?liveTex\s*=\s*([^,]+)[^>]*?liveTexID\s*=\s*([^,]+)[^>]*?liveTex_object\s*=\s*([^;]+);([^>]*?)</script>',
			'onload_after' => 'window.liveTex=$1;window.liveTexID=$2;window.liveTex_object=$3;$4;setTimeout(function(){if(typeof window.ltAPI!=="undefined"){wss_onload_ready=1}else{setTimeout(arguments.callee,10)}},10)'
/* Marva */
		), 'mr' => array(
			'marker' => 'marva',
			'regexp' => '<script[^>]*>[\r\n]*\/\/<!\[CDATA\[([^>]*?marva[^>]*?)\/\/\]\]>[\r\n]*</script>',
			'onload_before' => '<script[^>]*>[\r\n]*\/\/<!\[CDATA\[([^>]*?marva[^>]*?)\/\/\]\]>[\r\n]*</script>',
			'onload_after' => '$1;setTimeout(function(){if(typeof window.marva!=="undefined"){wss_onload_ready=1}else{setTimeout(arguments.callee,10)}},10)'
/* Odnaknopka */
		), 'ok' => array(
			'marker' => 'odnaknopka.ru',
			'regexp' => "<script\s*src=['\"]https?://odnaknopka\.ru[^>]+></script>",
			'height' => 16
/* Reformal */
		), 're' => array(
			'marker' => 'reformal.ru',
			'regexp' => "<script\stype=\"text/javascript\"\slanguage=\"JavaScript\"\ssrc=\"http://reformal\.ru.*?</script>"
/* RedHelper */
		), 'rh' => array(
			'marker' => 'web.redhelper',
			'regexp' => "<script[^>]+src=[\"'](https?:)?//web\.redhelper.*?</script>",
			'onload_before' => '<script[^>]+src=["\'](https?:)?(//web\.redhelper\.[^\'"]+)[^>]*?></script>',
			'onload_after' => 'document.write(\'\x3cscript id="rhlpscrtg" type="text/javascript" src="$2" async="true">\x3c/script>\');wss_onload_ready=1;'
/* Twitter */
		), 'tw' => array(
			'marker' => 'platform.twitter',
			'regexp' => '<script>[^>]*?platform\.twitter[^>]*?</script>',
			'onload_before' => '<script>([^>]*?platform\.twitter[^>]*?)</script>',
			'onload_after' => '$1;setTimeout(function(){if(typeof window.__twttrlr!=="undefined"){wss_onload_ready=1}else{setTimeout(arguments.callee,10)}},10)'
/* Vkontakte API */
		), 'va' => array(
			'marker' => 'vkontakte.ru/js/common.js',
			'regexp' => "<script[^>]+vkontakte.ru/js/common.js.*?</script>",
			'onload_before' => '<script[^>]+src="(https?://vkontakte.ru/js/common.js.+?)"></script>',
			'onload_after' => 'document.write(\'\x3cscript type="text/javascript" src="$1">\x3c/script>\');wss_onload_ready=1;'
/* Vkontakte */
		), 'vk' => array(
			'marker' => 'api/share.js',
			'regexp' => "<script[^>]+vkontakte.ru/js/api/share.js.*?</script>[\t\s\r\n]*<script[^>]+userapi.com/js/api/openapi.js.*?</script>",
			'onload_before' => '<script[^>]+src="(https?://vkontakte.ru/js/api/share.js.+?)"></script>[\t\s\r\n]*<script[^>]+src="(https?://userapi.com/js/api/openapi.js.+?)"></script>',
			'onload_after' => 'document.write(\'\x3cscript type="text/javascript" src="$1">\x3c/script>\');document.write(\'\x3cscript type="text/javascript" src="$2">\x3c/script>\');wss_onload_ready=1;'
/* Verisign */
		), 'vs' => array(
			'marker' => 'seal.verisign.com',
			'regexp' => "<script[^>]+src=\"https://seal.verisign.com/getseal.*?</script>",
			'onload_before' => '<script[^>]+src="(https://seal.verisign.com/getseal.+?)"></script>',
			'onload_after' => 'document.write(\'\x3cscript type="text/javascript" src="$1">\x3c/script>\');wss_onload_ready=1;'
/* Yandex.Site */
		), 'ys' => array(
			'marker' => 'site.yandex.net',
			'regexp' => "<script[^>]+>[^<]+site.yandex.net[^<]+</script>",
			'onload_before' => '<script[^>]+>([^<]+site.yandex.net[^<]+)</script>',
			'onload_after' => '$1;wss_onload_ready=1;',
			'inline' => true
/* Yandex.Site Script */
		), 'yss' => array(
			'marker' => 'site.yandex.net',
			'regexp' => "<script[^>]+src=\"(https?://)?site.yandex.net[^>]+></script>",
			'onload_before' => '<script[^>]+src=\"(https?://)?(site.yandex.net[^\"]+)"[^>]*></script>',
			'onload_after' => 'document.write(\'\x3cscript type="text/javascript" src="//$2">\x3c/script>\');;wss_onload_ready=1;',
			'inline' => true
		)
/* Counters */
	), 'unobtrusive_counters' => array (
/* bigmir)net TOP 100 */
		'bm' => array(
			'marker' => 'bigmir)net',
			'regexp' => "<!--bigmir\)net.*bigmir\)net\sTOP\s100(\sPart\s2)?-->",
			'height' => 31,
			'inline' => true
/* Google Analytics */
		), 'ga' => array(
			'marker' => 'gaJsHost',
			'regexp' => "<script\stype=\"text/javascript\">\s*\r?\n?var\s+gaJsHost.*?catch\(err\)\s*\{\}</script>",
			'inline' => true
/* counter.1Gb.ua */
		), 'gb' => array(
			'marker' => 'counter.1Gb.ua',
			'regexp' => "<!--\scounter\.1Gb\.ua.*?counter\.1Gb\.ua\s-->",
			'height' => 31,
			'inline' => true
/* BotLog */
		), 'hl' => array(
			'marker' => 'HotLog',
			'regexp' => "<!--\sHotLog.*HotLog\s-->",
			'height' => 31,
			'inline' => true
/* hit.ua */
		), 'hu' => array(
			'marker' => 'hit.ua',
			'regexp' => "<!--\shit\.ua\sinvisible.*?hit\.ua\sinvisible\spart\s-->",
			'inline' => true
/* InetLog */
		), 'il' => array(
			'marker' => 'inetlog.ru/',
			'regexp' => "<script[^>]*>[^>]+inetlog\.ru/.*?/script>",
			'height' => 1,
			'inline' => true
/* I.UA counter */
		), 'iu' => array(
			'marker' => 'I.UA',
			'regexp' => "<!--\sI\.UA\scounter.*?I\.UA\scounter\s-->",
			'height' => 31,
			'inline' => true
/* LiveInternet */
		), 'li' => array(
			'marker' => 'LiveInternet',
			'regexp' => "<!--LiveInternet\scounter-->.*?<!--/LiveInternet-->",
			'height' => 31,
			'inline' => true
/* Number One Counter */
		), 'no' => array(
			'marker' => 'www.one.ru',
			'regexp' => "<!--NUMBER\sONE.*?ONE\sCOUNTER-->",
			'height' => 31,
			'inline' => true
/* Rambler Top100 */
		), 'ra' => array(
			'marker' => 'Top100',
			'regexp' => "<!--\sbegin\sof\sTop100.*?end\sof\sTop100\scode\s-->",
			'inline' => true
/* Rating@Mail.ru */
		), 'rm' => array(
			'marker' => 'Rating@Mail.ru',
			'regexp' => "<!--Rating\@Mail\.ru.*?Rating\@Mail.ru\scounter-->",
			'height' => 31,
			'inline' => true
/* SpyLog */
		), 'sl' => array(
			'marker' => 'SpyLOG',
			'regexp' => "<!--\sSpyLOG.*?SpyLOG\s-->",
			'height' => 31,
			'inline' => true
/* Teaser.cc */
		), 'ti' => array(
			'marker' => 'teaser.cc/statistics',
			'regexp' => "<script[^>]+>[^>]+teaser\.cc/statistics.*?/script>",
			'onload_before' => '<script[^>]+>(.*?)</script>',
			'onload_after' => '$1;wss_onload_ready=1;',
			'inline' => true
/* Yandex.Metrica */
		), 'ym' => array(
			'marker' => 'watch',
			'regexp' => "<script[^>]+/watch(_visor)?.js.*?/noscript>",
			'inline' => true
		)
	)
);
?>