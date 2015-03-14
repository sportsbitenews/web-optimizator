# Unobtrusive JavaScript patterns #

All patterns for delayed JavaScript loading (to prevent its blocking behavior) are located inside `libs/php/config.unobtrusive.php` file in WEBO Site SpeedUp core. So you can add new patterns (or even delete old ones) if you want.

## Pattern description ##

Each pattern has 7 parameters:
  * Group (it is used just to fit corresponding configuration option).
  * Identifier (must be unique, used for ID of source/destination layout blocks).
  * Marker (short string in HTML code to decide apply regexp pattern or not).
  * Regexp (the main pattern to move JavaScript chunk from its initial place to the end of the document).
  * Onload\_before (regexp match pattern to match JavaScript code chunk to apply progressive script delaying, to window.onload event).
  * Onload\_after (regexp replace pattern to include matched JavaScript code after onload\_before pattern has been applied).
  * Height (is used to prevent reflow on dynamic content changes of destination container).

## Examples ##

### Delayed JavaScript code ###

Let's take Amazon ads as an example. It has the following unobtrusive pattern:
```
 'aa' => array(
	'marker' => 'amazon_ad',
	'regexp' => "<script[^>]+><!--[^\da-zA-Z]*amazon_ad_tag.*?ads.js\"></script>"
)
```

How it works? If HTML document matches `amazon_ad` string, regular expression (`regexp`) is applied to the whole document to find all JavaScript code examples. Then all these code chunks are consequently replaced with `<div id="aa_dst_NUMBER"></div>` (destination containers, `aa` is a unique block identifier through all the other patterns) and at the end of HTML document corresponding chunks are included into `<div id="aa_src_NUMBER"></div>` (source containers). After the whole JavaScript code (from the current chunk) has been loaded into source container its content (maybe be a lot of code) is moved to destination container. There are no changes in layout if `height` parameter is given - only dynamic (usually advertisement) content appears within given container. As the result we have no blocking JavaScript, but all 3rd party content (which is supported by patterns in configuration) is loaded correctly.

In the most of cases this unobtrusive logic is enough to guarantee significant website speedup and remove any blocking JavaScript.

### Progressive JavaScript movement ###

If you want to delay for example Google Search widget to `window.onload` event you can't simple add this via just an event handler for `window.onload`. You need to emulate `document.write` behavior to create a correct DOM structure with the given widget code. For this purpose two advanced parameters are used: `onload_before` and `onload_after`.

Let's take this example:
```
'gs' => array(
	'marker' => 'setOnLoadCallback',
	'regexp' => "<script src=\"https?://www.google.com/jsapi\" type=\"text/javascript\">" .
		"[\r\n\s\t]*</script>[\r\n\s\t]*<script type=\"text/javascript\">(//\s*<!\[CDATA\[)?" .
		"[\r\n\s\t]*google\.load\(['\"]search.*?</script>",
	'onload_before' => '.*?google.load\(\s*[\'"]search[\'"](.*?)\);(.*?)google.setOnLoadCallback[' .
		'\r\n\s\t]*\(function\(\)\{(.*?)\},\strue\);(.*?)</script>',
	'onload_after' => 'document.write(\'\x3cscript src="//www.google.com/jsapi" type="text/javascript">'
		'\x3c/script>\');setTimeout(function(){if(typeof google!=="undefined"&&typeof google.load!==' .
		'"undefined"){google.load("search"$1);setTimeout(function(){if(typeof google.search!=="undefined"' .
		'&&typeof google.search.CustomSearchControl!=="undefined"){$2$3$4;setTimeout(function(){' .
		'var a=document.forms,b=0,c;while(c=a[b++]){if(c.className=="gsc-search-box"){wss_onload_ready=1}}' .
		'if(!wss_onload_ready){setTimeout(arguments.callee,20)}},20)}else{setTimeout(arguments.callee,10)}}' .
		',10)}else{setTimeout(arguments.callee,10)}},10);'
)		
```

Both regexps are used this way
```
$document = preg_replace("@" . $onload_before . "@is", $onload_after, $document);
```

So you can set any regexp groups (inside the first regexp, `onload_before`) to include them into the result code (which will be placed to the end of the document). Also please be careful with dynamic logic, and use `setTimeout` to define if all required libraries have been loaded, and callback can be applied.

JavaScript variable `wss_onload_ready` must be set to 1 after the whole code is loaded (to start the next dynamic block loading). It is required to make `document.write` emulation perform correctly.