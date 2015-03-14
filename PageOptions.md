# Options #

This page allows you to manage WEBO Site SpeedUp configurations. Each configuration is a set of optimization options (i.e. options for merging, minimizing, gzipping, caching etc.) grouped under a single name.

_Active configuration_ is the one which is currently applied to your website and it's highlighted by the orange background in a list of configurations. To make a configuration active, select it (click it and it will get an orange border) and then click the _Make active_ button.

There are several predefined configurations: **Safe**, **Basic**, **Optimal** and **Extreme**.
  * Safe configuration, as is comes from its name, is the most safe set of options for every environment. But it does almost nothing to increase website performance.
  * Basic configuration applies the most safe optimization methods. Compatibility problems are possible in very few environments.
  * Optimal configuration is the most balanced one. Considerable performance is achieved usually, but it can result in some minor issues for certain environments.
  * Extreme configuration provides almost the best performance. You can get more only after an accurate manual configuration. Be aware that depending on environment, this configuration can significantly harm a website appearance or behavior so it's strongly recommended to review and test this configuration in a _Debug mode_ before using it on a live website.

If you want to know more details about some configuration, select it and you will see its description under its name on the top of the page. If you want to review all options in some configuration, select it and then click the Edit button or the small Pencil icon above the configuration icon. If you want to create your own configuration from scratch, click the Create New icon. To delete your configuration, select it and click the small garbage bin icon.

Note that all three predefined configurations cannot be edited or deleted so when you choose to edit them and save your changes, the new configuration is created.

All available optimization options are listed below. Note that some options are only available in Lite and Premium versions of WEBO Site SpeedUp. Check out the [Version Comparison](VersionComparison.md) section.

## Combine CSS ##
### Combine CSS files ###
Depending on this option CSS won't be combined, or there will be combined only CSS in `<head>` tag, or there will be combined the whole CSS on the page. All combined CSS code will be minified.
### Enable inline styles merging ###
There will be combined all CSS included with the help of `<style> and <link> tags. Otherwise WEBO Site SpeedUp will combine files included with <link>` tag.
### Enable external styles merging ###
There will be combined files located on all hosts. Otherwise WEBO Site SpeedUp will combine only files located on the same host that initial web page.
### Combined CSS file name ###
Use this option to make sure that every web page has the same combined CSS file. Use it only if sets of CSS files are identical throughout the website. Pages with another sets of CSS files will still load the formely created file. The named combined file is static and when created, it is updated only on manual cache refresh.
File name can include only Latin letters, numbers, hyphens, underlines, or dots. All the other symbols will be excluded. This file name may be automatically expanded with special extension to manage client side cache in browsers.
### Host for CSS file(s) ###
Host to load merged CSS file. With enabled options in CDN group it will be used for all CSS files.
### Exclude CSS file(s) from merging ###
Defined files won't be included into combined CSS file. You need to define only file names, not absolute paths to them.
### Include CSS code to all files ###
Entered CSS code will be added to the end of each combined CSS file. This field allows you to define additional styles for website working under WEBO Site SpeedUp.

## Combine JavaScript ##
### Combine JavaScript files in `<head>` ###
Depending on this option JavaScript won't be combined, or there will be combined only JavaScript in `<head>` tag.
### Combine JavaScript files in `<body>` ###
Depending on this option JavaScript won't be combined, or there will be combined only JavaScript in `<body>` tag.
### Enable inline JavaScript merging in `<head>` ###
There will be combined inline code in `<head>` tag. Otherwise there will be combined only JavaScript included via `<script src="...">`.
### Enable inline JavaScript merging in `<body>` ###
There will be combined inline code in `<body>` tag. Otherwise there will be combined only JavaScript included via `<script src="...">`.
### Enable external JavaScript merging ###
There will be combined files located on all hosts. Otherwise WEBO Site SpeedUp will combine only files located on the same host that initial web page.
### Combined JavaScript file name ###
Use this option to make sure that every web page has the same combined JavaScript file. Use it only if sets of JavaScript files are identical throughout the website. Pages with another sets of JavaScript files will still load the formely created file. The named combined file is static and when created, it is updated only on manual cache refresh.
File name can include only Latin letters, numbers, hyphens, underlines, or dots. All the other symbols will be excluded. This file name may be automatically expanded with special extension to manage client side cache in browsers.
### Host for JavaScript file(s) ###
Host to load merged JavaScript file. With enabled options in CDN group it will be used for all JavaScript files.
### Exclude file(s) from combining ###
Defined files won't be included into combined JavaScript file. You need to define only file names, not absolute paths to them.
### Force moving combined script to `</head>` ###
Combined JavaScript file call will be moved to closing tag `</head>`.
### Safe combine mode ###
With this option all external files will be enveloped into try-catch construction (with individual files' inclusion on failed content execution in common scope). This reduces JavaScript performance but guarantee that there will be no broken JavaScript calls due to their combine.
### Remove duplicates ###
All noticed duplicates of common libraries (jQuery, Prototype, MooTools) will be removed from merging. This reduces final JavaScript file size and its initialization time, but in a few cases can break integrity of cliet side logic.
### Mask to merge scripts ###
You can set the mask according to which all scripts will be included. For example you need to include the first 3 script tag to merged file, and exclude the next 2. So the mask will be xxx00. If there is no mask matching the current script tag - it will included or excluded according to the other rules.

## Minify ##
### Minify CSS files ###
All excessive spaces, tabs, line breaks, and comments will be deleted from combined CSS file.
### Minify JavaScript files ###
All excessive spaces, tabs, line breaks, and comments will be deleted from combined JavaScript file. Library choice affects minify algorithm and compression rate. Maximum compression can be achieved with any of these libraries depending on initial conditions.
### Exclude the following file(s) from minify ###
File(s) listed here won't be minified with combining of JavaScript code (but will be combined according to other settings from "Combine JavaScript" group of options)
### Minify HTML ###
HTML code will be cleaned from double spaces, double line breaks, empty symbols at the beginning of every string and spaces before tag ends. Tags `<pre>`, `<textarea>`, `<script>` will be excluded from all actions.
### Compress HTML to one string ###
HTML code of result web page will be compressed to one string. This can help with removing extra spaces and line breaks. But this is CPU intensive and should be used carefully.
### Remove HTML comments ###
All HTML comments will be removed. This can break conditional comments and some JavaScript counters.

## Gzip ##
### Gzip CSS ###
All CSS files will be compressed via gzip.
### Gzip JavaScript ###
All JavaScript files will be compressed via gzip.
### Gzip fonts ###
All fonts files (.eot, .ttf, .otf etc) will be compressed via gzip.
### Gzip HTML ###
All HTML files (.eot, .ttf, .otf etc) will be compressed via gzip.
### Use zlib ###
PHP library zlib will be used for gzip.
### Check for gzip possibility via cookies ###
WEBO Site SpeedUp can perform additional check for gzip support in browsers. If it's been defined all data will be compressed regardless Accept-Encoding header.
### Use `deflate` instead of `gzip` for IE6/7 ###
In some cases gzip in IE6 and IE7 browsers can lead to incorrect page view. This option allows you to force alternative compression technique usage for these browsers.

## Client side cache ##
### Cache CSS ###
All CSS files will have caching headers set to far future.
### Cache JavaScript ###
All JavaScript files will have caching headers set to far future.
### Cache images ###
All images will have caching headers set to far future.
### Cache fonts ###
All fonts files will have caching headers set to far future. This option is applied via .htaccess.
### Cache video files ###
All video files will have caching headers set to far future. This option is applied via .htaccess.
### Cache static assets ###
All other static files will have caching headers set to far future. This option is applied via .htaccess.
### Cache HTML ###
All images will have caching headers. Cache timeout will be set according to option "Default timeout to cache HTML".
### Default timeout to cache HTML ###
Time to cache HTML files. Zero value means zero timeout.
### Cache external files ###
External files called on web page will be served from the same host that web page itself with Expires headers using /cache/wo.static.php proxy script from the Site SpeedUp apllication directory. For example the external script call you may have on a web page will be transformed from this:
```
<script type="text/javascript" src="http://external-host.com/test.js"></script>
```
into this:
```
<script type="text/javascript" src="/wordpress/wp-content/plugins/web-optimizer/cache/wo.static.php?http://external-host.com/test.js"></script>
```

## .htaccess ##
### Enable `.htaccess` ###
This option will create (or modify) .htaccess file in website root directory. Also it creates backup version of this file. .htaccess file content depends on the other options in this group.
### Place `.htaccess` file locally (not to Document Root) ###
`.htaccess` file will be located in local website folder but not document root of website host.
### Use `mod_deflate` + `mod_filter` ###
This is required for dynamic gzip compression. It's an alternative for mod\_gzip.
### Use `mod_gzip` ###
This is required for dynamic gzip compression. It's an alternative for mod\_deflate.
### Use `mod_expires` ###
This is required for client side cache headers set.
### Use `mod_headers` ###
This is required to support proxy servers and old browsers with correct headers.
### Use `mod_setenvif` ###
This is required to support proxy servers and old browsers with correct headers.
### Use `mod_rewrite` ###
This is required for static gzip or forced caching.
### Use `mod_mime` ###
This is required for static gzip.

## Backlink ##
### Add a link to WEBO Site SpeedUp ###
WEBO Site SpeedUp link is required in Community Edition and can be removed in any paid edition.
### Add a WEBO Site SpeedUp image ###
File name with WEBO Site SpeedUp logo. All allowed files are located in: `WEBO Site SpeedUp path`/web-optimizer/images/. If this option is empty a text defined in "Text for backlink" option will be shown.
### Text for backlink ###
If option "Add a WEBO Site SpeedUp image" is disabled this text will be shown in a link. Otherwise is will used as a title for image.
### Styles for backlink placement ###
These styles will be applied for WEBO Site SpeedUp link. You can define link placement, its color, background, size, etc.
### Add `<!--WSS-->` to HTML document ###
`<!--WSS-->` existence indicates that WEBO Site SpeedUp successfully parses this page. It's used in internal algorithms.
### Add load time counter ###
Information about load time will be added to Events section if there is Google Analytics on the website installed to gather visitors stats.
### A/B testing ###
Given percent of users will get non-optimized website content. All data about results will be sent to Google Analytics.

## Performance ##
### Ignore file modification time stamp (mtime) ###
There will be gained additional speedup (on server side). But to refresh combined files you will need to change calls of initial files in HTML code or to refresh WEBO Site SpeedUp cache.
### Don't check cache files existence ###
There will be no check for cache files existence with this option enabled. Cache version will be defined with option "Cache version number". In this case to refresh cache files on client side (in browsers) you need to change cache version number. There will be standard cache files existence check performed with this option enabled.
### Cache version number ###
Cache version defines version of all files in cache. To refresh cache on client side (in browsers) you need to change this number.
### Do not use regular expressions ###
Regular expressions usage damages server performance and they can be replaced with simple string operations. But in the latter case probability of incorrect HTML parsing (for invalid (X)HTML documents only) will be higher.
### Uniform cache files for all browsers ###
All browsers will receive uniform CSS, JavaScript, and HTML code. This allows you to use external caching techniques safely but this disabled a number of optimization techniques such as data:URI.
### Restore CSS properties ###
All missing CSS properties which can improve CSS Sprites and data:URI creation will be searched across the CSS code. This will result in smaller cache size but may lead to huge CPU overhead in case of large amount of CSS rules to analyze.
### Days to store cache files ###
You can restrict cache size by defining time to live for all cache files (in days). Zero value means no restriction.
### Separate HTTPS cache from HTTP ###
All HTML files requested by HTTPS (SSL connection) will be stored separately from ordinary HTML cache files. This will increase overall cache size but quarantee website consistency for different connection types.
### Cache engine ###
You can choose one of the caching engines supported by your server environment to speed the HTML caching up. All engines except file system cache records in RAM by default, this decreases access time.
### Scale HTML images ###
All HTML images will be resized to smaller dimensions if latter are used in HTML code.

## data:URI ##
### Apply `data:URI` ###
Background images will be converted to base64 format and included directly into CSS files for all browsers which support data:URI.
### Apply `mhtml` ###
Background images will be converted to mhtml format and included directly into CSS files for all versions of Internet Explorer which don't support data:URI.
### Maximum `data:URI` size ###
Images which size is greater than given number won't be converted to base64 format. No value or zero value means no limit.
### Maximum `mhtml` size ###
Images which size is greater than given number won't be converted to mhtml format. No value or zero value means no limit.
### Exclude files from `data:URI` ###
Images listed in this option won't be converted to data:URI. Please provide only file names not absolute paths.
### Exclude files from `mhtml` ###
Images listed in this option won't be converted to mhtml. Please provide only file names not absolute paths.
### Separate images from CSS code ###
Combined CSS code and images in base64 and mtml formats will be stored in different files. This should increase cachebility.

## CSS Sprites ##
### Apply CSS Sprites ###
Background images will be combined with the help of CSS Sprites technique. Related CSS code will be safely modified.
### "Aggressive" combine mode for CSS Sprites ###
Number of CSS Sprites images and their size will be lower but this may lead to graphical artifacts on web pages.
### Exclude IE6 ###
IE6 will receive its own CSS file without CSS Sprites.
### Maximum width and height of images ###
Images higher or wider than defined number won't be included into CSS Sprites. No value or zero value means no restriction.
### Combine HTML images ###
A lot of small HTML images can be merged together to reduce number of HTTP requests as well. In this case there is a transparent image inserted into HTML document instead of initial one (with data:URI if possible). And it has the initial image as a background.
### Maximum width and height of HTML images ###
HTML images heigher or wider than defined number won't be included into CSS Sprites. No value or zero value means no restriction.
### Maximum width and height of final sprites (in pixels) ###
Sprites' dimensions will be restricted to defined value. No value or zero value means no restriction.
### Combine images for the current page only ###
HTML images can be combined for the current page only (this reduces size of the final file, but increases number of such files) or for all website pages. In the last case there will be used the only image for the whole website, but its size can be very large.
### Exclude / include files for CSS Sprites ###
All images listed below either won't included into CSS Sprites, or there will be included only these images.
### Add free space for CSS Sprites ###
Images in CSS Sprites will be rounded with free space to prevent side effects on web page scale in browsers. CSS Sprites file size will be a bit greater.
### Images' format ###
If you choose automated format detection possibility of any side effects in CSS Sprites images will be minimal. If you choose JPEG format rate quality/size for true color images will the best but there will be no transparency.

## Server side cache ##
### Cache generated HTML files ###
HTML pages will be cached for timeout set in option "Default HTML cache timeout". This option allows you to significantly speedup web pages load with long generation time. But this is reasonable only for static pages without dynamic content.
### Default HTML cache timeout ###
After this time all cached HTML pages will be recreated on server side.
### Time to cache cart in e-store ###
During this time all data about user's cart will be stored locally (in user's cookie or in localStorage).
### Only cache first n bytes of content (flush early) ###
HTML cache will contain not the whole web page but the first n bytes of it (set in option "Flush content size"). And this amount of data will be flushed to browser earlier than the rest web page content. So browser will receive calls to required resources earlier and don't wait the rest of the page to start their load.
### Flush content size ###
Size of cached flushed part of a web page. It can be fixed (to avoid any issues with browsers or network connection). Empty (or zero) value leads to flush the whole web page content before closing `</head>` tag.
### List of parts of URLs to ignore from caching ###
Often server side caching can't be used for pages with dynamic content. For example user account pages, statistic pages, and more. This option allows you to set parts of URL (masks) to exclude pages from server side caching.
### List of USER AGENTS (robots) to add to caching ###
This option allows you to set a list of USER AGENTS which will receive only cached HTML pages. For example caching HTML pages for all search engines can reduce server side load.
### List of cookie to exclude from server side caching ###
You can also skip server side caching for user who have one of the cookie from this list. This can be useful for authorized users or during the work with shopping cart.
### GET parameters list to exclude on caching (separated by space) ###
You can define GET parameters which will be striped from hash key creation to cache any website page. This can help if you have some statistical parameters (i.e. advertisement campaigns) which don't influence your website content). This will help to reduce cache size and increase its efficiency.
### Extreme mode ###
In extreme mode all HTML documents will be served from cache directly, bypassing normal CMS processing. This will significantly increase website performance (especially useful on traffic peaks), but cache can be refreshed only manually. By default extreme mode for server side caching is available only on systems which uses web-servers with .htaccess support (Apache, LiteSpeed). Other web-servers configurations should be manually changed, according to [Integration with website](http://code.google.com/p/web-optimizator/wiki/IntegrationWithWebsite) section of documentation.
### Delete expired files from cache ###
After given cache timeout all old entries (which time of creation is less than current timestamp minus given timeout) will be deleted from HTML cache.

## DB Cache ##
### Cache DB queries ###
All DB queries will be cached if their execution take more than time set below. This will increase load speed of all website pages. To make DB cache working correctly you need to install WEBO Site SpeedUp as system extension (not as standalone application).
### Queries execution time (ms) ###
All queries which execution time (in ms) is greater will be cached.
### DB cache timeout (s): ###
After this time all SQL queries will be re-requested from the current DB.
### Exclude table(s) (separated by space) ###
(separated by space): ?You can exclude some tables from DB caching logic by setting their names (without prefix). All queries from such tables won't be cached.

## Unobtrusive JavaScript ##
### Unobtrusive JavaScript ###
With basic mode all supported widgets will be loaded on onDOMloaded event. With advanced mode - on window.onload event (this increases website load speed by Google) according to the other options in this section.
Available options: basic mode and advanced mode.
### Include combined JavaScript file before `</body>` ###
Combined JavaScript files will be moved to closing `</body>` tag. This option has more priority than "Force moving combined script to `</head>`".
### Move all JavaScript code to `</body>` ###
All JavaScript calls will be moved to closing `</body>` tag according to their initial order on the web page.
### Move JavaScript widgets calls before `</body>` ###
The whole JavaScript code from widgets calls will be moved to `</body>`.
### Move counter calls before `</body>` ###
The whole JavaScript code from counters calls will be moved to `</body>`.
### Move advertisement calls before `</body>` ###
The whole JavaScript code from ads (context and banners) calls will be moved to `</body>`.
### Defer iframes loading ###
The whole HTML code from iframes calls will be moved to `</body>`.
### Load background images on `DOMready` event ###
Background images' load will be delayed to DOMReady event. This will increase initial web page render speed in browsers.
### Unobtrusive configuration ###
Setup what unobtrusive chunks must be excluded from delayed loading - i.e. you need to show some adverts first, other - after window onload. Syntax: {id1}:{amount\_to\_skip} {id2}:{amount\_to\_skip}. Complete list of ids is located in libs/php/config.unobtrusive.php as keys of all arrays.
### Pre-load CSS or JavaScript files ###
All defined URLs will be loaded on window.onload event to speed the next page view up.
### Pre-load pages ###
All resources on these pages will be loaded on window.onload event (iframes) to speed the next page view up.

## CDN ##
### Distribute images ###
All images called on web page will be automatically distributed through multiple hosts (mirrors). For example URL ![http://www.site.com/i/logo.png](http://www.site.com/i/logo.png) or /i/bg.jpg can be replaced with ![http://i1.site.com/i/logo.png](http://i1.site.com/i/logo.png) and ![http://i2.site.com/i/bg.jpg](http://i2.site.com/i/bg.jpg) in case if both hosts i1 and i2 are available and listed in option "Allowed hosts".
### Check hosts' availability automatically ###
Available hosts will be checked automatically for images' existence.
### Allowed hosts ###
Listed hosts will be used to distribute images. Please define no more than 4 hosts.
### Distribute CSS files ###
All CSS files will be served via host defined as "Host for CSS files" in "Combine CSS" group of options.
### Distribute JavaScript files ###
All CSS files will be served via host defined as "Host for JavaScript files" in "Combine JavaScript" group of options.
### Exclude the following files from distribution (separated by space) ###
You can set a list of files (i.e. dynamic ones) to exclude from distibution logic.
### CDN usage ###
You can either setup CDN usage by yourself (with settings of the current group and host for CSS/JavaScript files) or just choose one of the supported options.
Available options: manual setup, current CDN (cdn.website.com), Coral CDN (.nyud.net)
### FTP access to upload files ###
If you are using paid CDN (i.e. EdgeCast) it may be necessary to setup FTP access to upload all new assets. FTP access string must be given in the format user:password@host (or user:password@host:port). Note that only combined CSS and JS files can be uploaded via FTP as this is very time consuming operation.
### Host available via HTTPS ###
If your website is using HTTPS, you need at least 1 domain which has SSL certificate to serve files through CDN. This host will be used to distribute all types of files with secured (HTTPS) requests.

## Rocket ##
### Enable WEBO Rocket for CSS ###
This will include all of your CSS files directly into HTML plus add all files to post-load with caching. The whole technique helps to improve both first and repeat view page load time.

### Enable WEBO Rocket for JavaScript ###
This will include most of your JavaScript files (except heavy libraries) directly into HTML plus add all files to post-load with caching. The whole technique helps to improve both first and repeat view page load time.

### Put styles first ###
All style tags will be placed before all script tags (according to CSS/JavaScript merging options).