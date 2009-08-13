<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><title><?php
	echo _WEBO_GENERAL_TITLE;
?> | <?php
	echo $title
?></title><meta http-equiv="content-type" content="text/html; charset=<?php
	echo _WEBO_CHARSET;
?>"/><link href="libs/css/main.css" rel="stylesheet" type="text/css"/><link rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACEklEQVQ4T3WST0iTcRjHf3nwtNOC/twW6kGvMXArYd1EN9pi4C5BJHRYSO80oqRAGsgGleDy1Nb8c8j0IpMVYjDqEhP6g77uUnpZHhL0IKRbyz3t8wuHbe4LDzw838/nfbcxpWqSzea8y8vZz/Pz7wrT0+kyw86NrpavJpNZt6RSH8xY7LWMj8+eOHQwsHVyMrm4Mzr6UqLRSVla+ihbW9tSLP7Ww86NDiaZTO3+95CpqUVzeHhCIpFJDTcKHQwsjpYXFt73GMZTGRwck3z+Z0P5KDCwOLgqFpv91N//WGZm0nVwqfRHDg/LdXdYHFxlGE8KgcAD2dj4IWtrm6JOuSrf8a0G4/G0HpJIvNEdDCwOrvL775XdbkMODgoavNw1IM5Lt/XbbRcCetg7HUHdEVgcXNXdPVB2uW7J/v6/B8zNZfSbjNBzsZ726GHnRkdgcXCVz3e3YLdfl1xuU5fFYknOnPVqIRp9pYedGx2BxcFVwWDkS3u7X8LhePVHevgoIefOX6t81KIedm5HgcXBVeHwix6bzS1tbT4xze8ayOe3qz8eYedGYFpargoOrv4v9PXdN63WK9LR4ZfV1W/SKHQwsDjVf+LIyITF6by509zcKRZLl4RCz2RlZV329n7pYedGB+Nw3NjFUcfDobf3jtnUZBelLp44dDB18vEMDY15PZ7Q19ZWb6HyxjLDzo2ulv8LN6Bqnkiu8fYAAAAASUVORK5CYII=" type="image/x-icon"/></head><body><div class="b"><a href="http://code.google.com/p/web-optimizator/" class="a"></a><h1><?php
	echo _WEBO_GENERAL_TITLE;
?></h1><h4>Web Optimizer <span><?php
	echo $version;
?>/<b id="z"><?php
	echo $version_new;
?></b></span></h4><?php
	require($page.".php");
?></div><blockquote><p>&copy; 2009<?php
	echo date("Y")>2009 ? '-' . date("Y") : '';
?> <a href="http://code.google.com/p/web-optimizator/">Web Optimizer</a>. <?php
	echo _WEBO_GENERAL_FOOTER;
?></p></blockquote><script type="text/javascript" src="libs/js/yass.loadbar.js"></script></body></html>