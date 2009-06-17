<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Contains all EN localization constants
 *
 **/

/* general layout */
define('_WEBO_CHARSET', 'latin-1');
define('_WEBO_GENERAL_TITLE', 'Web Optimizer Configuration');
define('_WEBO_GENERAL_FOOTER', 'Faster than lightning!');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Hmmm...we have a problem');
define('_WEBO_ERROR_ERROR', 'Oopps! Something went wrong');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Enter your login details');
define('_WEBO_LOGIN_INSTALLED', 'You have already installed Web Optimizer ');
define('_WEBO_LOGIN_INSTALLED2', ' to this website. Please enter your login details below to get access to all settings:');
define('_WEBO_LOGIN_USERNAME', 'Username');
define('_WEBO_LOGIN_ENTERLOGIN', 'Enter your login');
define('_WEBO_LOGIN_PASSWORD', 'Password');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Enter password');
define('_WEBO_SPLAHS1_PROTECTED', 'Protected mode');
define('_WEBO_SPLAHS1_PROTECTED2', 'Web Optimizer installation is safely protected. You can configure it once more.');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Upgrade');
define('_WEBO_LOGIN_UPGRADENOTICE', 'Your can upgrade your version (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') of Web Optimizer to latest one. Please enter your login and password and click <strong>Upgrade</strong>. Web Optimizer will be upgraded to the version <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_LOGIN_UPGRADENOTICE4', ') of Web Optimizer to latest one &mdash; <strong>');
define('_WEBO_UPGRADE_SUCCESSFULL', 'You have successfully upgraded to the version ');
define('_WEBO_UPGRADE_UNABLE', 'Can\'t download the latest version from repository. Please check internet connection of the server and curl existence.');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', 'To remove Web Optimizer from your system please enter login and password and click <strong>Uninstall</strong>.');
define('_WEBO_LOGIN_UNINSTALL2', 'Web Optimizer can be simply disabled for your website. Just delete it.');
define('_WEBO_LOGIN_UNINSTALLME', 'Uninstall Web Optimizer');
define('_WEBO_LOGIN_FAILED', 'Login failed');
define('_WEBO_LOGIN_ACCESS', 'You need to be logged in to view this page');
define('_WEBO_LOGIN_LOGGED', 'Logged you in');
define('_WEBO_SPLASH1_CLEAR', 'Clear cache');
define('_WEBO_SPLASH1_CLEAR_CACHE', 'To clear Web Optimizer cache please enter login and password and press <strong>Clear cache</strong>. ');
define('_WEBO_SPLASH1_CLEAR_CACHE2', 'All saved versions of generated files will be deleted from the cache folder.');
define('_WEBO_CLEAR_UNABLE', 'Sorry, can\'t delere some files from cache directory');
define('_WEBO_CLEAR_SUCCESSFULL', 'All files in cache directories have been deleted');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Installation - set password');
define('_WEBO_NEW_PROTECT', 'We need to password protect this installation so only you have access.');
define('_WEBO_NEW_USERDATA', 'Your username and password');
define('_WEBO_NEW_ENTER', 'Enter your password for installation');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Uninstall');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'Uninstall');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Thank you for using Web Optimizer. You can install it once more later by visiting <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">Web Optimizer page</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Feel free to visit <a href="http://code.google.com/p/web-optimizator/">Web Optimizer website</a> and submit <a href="http://code.google.com/p/web-optimizator/issues/list">any related issues</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Now you can return back to <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">your website</a>.');
define('_WEBO_SPLASH1_NEXT', 'Next');
define('_WEBO_SPLASH1_BACK', 'Back');
define('_WEBO_SPLASH1_EXPRESS', 'Express install');

/* Second splash -- set options */
define('_WEBO_SPLASH2_TITLE', 'Installation - Stage 2');
define('_WEBO_SPLASH2_SAVED', 'Saved');
define('_WEBO_SPLASH2_OPTIONS', 'Compression options');
define('_WEBO_SPLASH2_CACHE', 'Cache Directories');
define('_WEBO_SPLASH2_CACHE_JS', 'Your JavaScript will be cached in');
define('_WEBO_SPLASH2_CACHE_CSS', 'Your CSS will be cached in');
define('_WEBO_SPLASH2_CACHE_HTML', 'Your HTML will be cached in');
define('_WEBO_SPLASH2_INSTALLDIR', 'Web Optimizer is located in');
define('_WEBO_SPLASH2_DOCUMENTROOT', 'Website is located in');
define('_WEBO_SPLASH2_SPACE', 'Please separate with space:');
define('_WEBO_SPLASH2_YES', 'Yes:');
define('_WEBO_SPLASH2_NO', 'No:');
define('_WEBO_SPLASH2_UNABLE', 'Unable to open');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>Please make sure the directory exists and it is your root directory.');
/* Web Optimizer options */
define('_WEBO_SPLASH2_MINIFY', 'Minify Options');
define('_WEBO_SPLASH2_MINIFY_INFO', '<p>Minifying removes whitespace and other unnecessary characters.</p>
									<p>Also you can choose the tool for CSS/JavaScript minification or obfuscation.</p>');
define('_WEBO_SPLASH2_UNOBTRUSIVE', '"Unobtrusive" JavaScript');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '<p>Unobtrusive JavaScript will be loaded right after all content has been shown in a browser.</p>
									<p>This can significantly increase website load speed. But in some cases can break the client side logic. Please be careful with this option.</p>
									<p>Also you can move all JavaScript calls before <code>&lt;/body&gt;</code> &mdash; this will significatnly increase speed of loading content on your website.</p>
									<p><a href="http://www.onlinetools.org/articles/unobtrusivejavascript/">Unobtrusive JavaScript</a>, <a href="http://yuiblog.com/blog/2008/07/22/non-blocking-scripts/">Non-blocking JavaScript Downloads</a>, <a href="http://dean.edwards.name/weblog/2005/09/busted/>The <code>window.onload</code> Problem - Solved!</a>, <a href="http://dean.edwards.name/weblog/2006/06/again/"><code>window.onload</code> (again)</a></p>');
define('_WEBO_SPLASH2_EXTERNAL', 'External and inline scripts');
define('_WEBO_SPLASH2_EXTERNAL_INFO', '<p>With this option all scripts (including external files and inline ones) will be merged into single one and added right after CSS file.</p>
									<p>This can be useful in some cases when there is a lot of different plugins and modules in head section and this logic can\'t be moved to unobtrusive load.</p>
									<p>You also can define a list of excluded files (i.e. ga.js jquery.min.js).</p>
									<p><a href="http://thinkvitamin.com/features/webapps/serving-javascript-fast/>Serving JavaScript Fast</a></p>');
define('_WEBO_SPLASH2_MTIME', 'Verify files mtime');
define('_WEBO_SPLASH2_MTIME_INFO', '<p>Usually Web Optimizer checks if files have been changed since the last access to the page. And uses retrieved information to give existing file from cache or generate a new one.</p>
									<p>It\'s not good from the server side optimization point of view so you can disable this check.</p>
									<p>By enabling this option you need to manage Web Optimizer cache manually to clean cache folders from out-of-date cached files when new assests are available.</p>');
define('_WEBO_SPLASH2_GZIP', 'Gzip Options');
define('_WEBO_SPLASH2_GZIP_INFO', '<p>Gzipping compresses the code via Gzip compression. This is recommended only for small scale sites, and is off by default.</p>
									<p>For larger sites, you should Gzip via the web server.</p>
									<p><a href="http://paulbuchheit.blogspot.com/2009/04/make-your-site-faster-and-cheaper-to.html">Make your site faster and cheaper to operate in one easy step</a></p>');
define('_WEBO_SPLASH2_EXPIRES', 'Far Future Expires');
define('_WEBO_SPLASH2_EXPIRES_INFO', '<p>This adds an expires header to your JavaScipt and CSS files which ensures they are cached client-side by the browser.</p>
									<p>When you change your JS or CSS, a new filename is generated and the latest version is therefore downloaded and cached.</p>
									<p><a href="http://developer.yahoo.com/performance/rules.html#expires">Add an Expires or a Cache-Control Header</a></p>');
define('_WEBO_SPLASH2_HTMLCACHE', 'Cache HTML files');
define('_WEBO_SPLASH2_HTMLCACHE_INFO', '<p>This option allow Web Optimizer to cache generated HTML output and prevent a lot of server-side work to generate it.</p>
									<p>Note, with this option all server-dependent logic will be disabled. All pages will be completely static. Please turn it on only if you are completely sure.</p>');
define('_WEBO_SPLASH2_SPRITES', 'CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', '<p>It is possible to store CSS Background images as CSS Sprites. This can significantly reduce number of HTTP Requests website load.</p>
									<p>This technique is fully supported by all modern browsers. You can also switch to more aggressive mode if you are sure with your CSS rules.</p>
									<p>You also can define images to exclude from CSS Sprites creation (i.e. logo.png bg.gif).</p>
									<p><a href="www.alistapart.com/articles/sprites">CSS Sprites: Image Slicing\'s Kiss of Death</a></p>');
define('_WEBO_SPLASH2_DATAURI', 'Data URIs');
define('_WEBO_SPLASH2_DATAURI_INFO', '<p>t is possible to store CSS Background images as Data URIs. This will help cut down even further on the amount of HTTP Requests.</p> 
									<p>Note, however, that this will not work on Internet Explorer (up to version 7.0) and that the overall data size will be larger.</p>
									<p><a href="http://www.websiteoptimization.com/speed/tweak/inline-images/">Inline Images with Data URLs</a></p>');
define('_WEBO_SPLASH2_PARALLEL', 'Multiple hosts');
define('_WEBO_SPLASH2_PARALLEL_INFO', '<p>Web Optimizer can also add multiple hosts to serve static files (images) and speed up website load. With several hosts for static assets browsers can open a lot of connections to the single server.</p>
									<p>Note, to enable this option properly you need to add to your server configuration some aliases for the main host, i.e.: <code>i1.site.com</code> <code>i2.site.com</code> <code>i3.site.com</code> <code>i4.site.com</code>. Also you need to add corresponding records to DNS (to point to the main website). Web Optimizer checks availability for all listed hosts automatically.</p>
									<p><a href="http://www.ajaxperformance.com/2006/12/18/circumventing-browser-connection-limits-for-fun-and-profit/">Circumventing browser connection limits for fun and profit</a></p>');
define('_WEBO_SPLASH2_HTACCESS', 'Use .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', '<p>Most of gzip and cache options can be written for your website configuration (and avoid additional work). This can be done via <code>.htaccess</code> file (and you can later cut options from there and move to <code>httpd.cond</code> if it is required).</p>
									<p><a href="http://httpd.apache.org/docs/2.0/mod/mod_deflate.html">mod_deflate</a>, <a href="http://httpd.apache.org/docs/2.2/mod/mod_filter.html">mod_filter</a>, <a href="http://httpd.apache.org/docs/1.3/mod/mod_mime.html">mod_mime</a>, <a href="http://httpd.apache.org/docs/2.0/mod/mod_headers.html">mod_headers</a>, <a href="http://httpd.apache.org/docs/2.0/mod/mod_expires.html">mod_expires</a>, <a href="http://httpd.apache.org/docs/1.3/mod/mod_setenvif.html">mod_setenvif</a>.</p>
									<p>Available options: ');
define('_WEBO_SPLASH2_FOOTER', 'Footer text');
define('_WEBO_SPLASH2_FOOTER_INFO', '<p>Web Optimizer can add a link in your blog footer back to the Web Optimizer website. The link can be a text link, a small image link or both.</p>
									<p>Please support Web Optimizer by enabling this.</p>');
define('_WEBO_SPLASH2_AUTOCHANGE', 'Changing /index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', '<p>Web Optimizer can add to your website based on ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' all required changes (only for /index.php).</p>
									<p>Note: this can lead to some problems due to server misconfiguration, be carefull with this option.</p>');
define('_WEBO_unobtrusive_on', 'Enable unobtrusive JavaScript');
define('_WEBO_unobtrusive_body', 'Include merged JavaScript file before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers', 'Move JavaScript informers calls before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters', 'Move counters calls before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads', 'Move advertisement (context and banners) calls before <code>&lt;/body&gt;</code>');
define('_WEBO_external_scripts_on', 'Enable external and inline JavaScript merging');
define('_WEBO_external_scripts_head_end', 'Force moving all merged scripts to <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_css', 'Enable external and inline styles merging');
define('_WEBO_external_scripts_ignore_list', 'Exclude file from merging');
define('_WEBO_dont_check_file_mtime_on', 'Don\'t check files mtime (and content)');
define('_WEBO_minify_javascript', 'Combine JavaScript files');
define('_WEBO_minify_with', 'Minify JavaScript files');
define('_WEBO_minify_with_jsmin', 'Minify with JSMin');
define('_WEBO_minify_with_packer', 'Minify with Packer');
define('_WEBO_minify_with_yui', 'Minify with YUI Compressor');
define('_WEBO_minify_css', 'Minify and combine CSS files');
define('_WEBO_minify_page', 'Minify HTML');
define('_WEBO_minify_html_comments', 'Remove HTML comments');
define('_WEBO_minify_html_one_string', 'Shrink HTML to the one string');
define('_WEBO_gzip_javascript', 'Gzip JavaScript');
define('_WEBO_gzip_css', 'Gzip CSS');
define('_WEBO_gzip_page', 'Gzip HTML');
define('_WEBO_far_future_expires_javascript', 'Cache JavaScript');
define('_WEBO_far_future_expires_css', 'Cache CSS');
define('_WEBO_far_future_expires_static', 'Cache static assets');
define('_WEBO_far_future_expires_html', 'Cache HTML');
define('_WEBO_far_future_expires_html_timeout', 'Default timeout to cache HTML, in seconds');
define('_WEBO_html_cache_enabled', 'Cache generated HTML files');
define('_WEBO_html_cache_timeout', 'Default timeout, in seconds');
define('_WEBO_html_cache_flush_only', 'Enable only earlier flush of content');
define('_WEBO_html_cache_flush_size', 'Flush content size (in bytes)');
define('_WEBO_html_cache_ignore_list', 'List of parts of URLs to ignore from caching');
define('_WEBO_html_cache_allowed_list', 'List of parts of USER AGENTS (robots) to add to caching');
define('_WEBO_footer_text', 'Add a link to Web Optimizer');
define('_WEBO_footer_image', 'Add a Web Optimizer image');
define('_WEBO_cleanup_on', 'Regularly delete old files');
define('_WEBO_data_uris_on', 'Apply <code>data:URI</code>');
define('_WEBO_data_uris_smushit', 'Optimize all CSS images via smush.it');
define('_WEBO_css_sprites_enabled', 'Apply CSS Sprites');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Save truecolor images as JPEG');
define('_WEBO_css_sprites_aggressive', '"Aggressive" combine mode for CSS Sprites');
define('_WEBO_css_sprites_extra_space', 'Add free space for CSS Sprites');
define('_WEBO_css_sprites_no_ie6', 'Exclude IE6 (via hacks) from CSS Sprites generation');
define('_WEBO_css_sprites_memory_limited', 'Restrict memory usage for PHP process');
define('_WEBO_css_sprites_dimensions_limited', 'Exclude images greater given number in one dimension');
define('_WEBO_css_sprites_ignore_list', 'Exclude files from CSS Sprites');
define('_WEBO_parallel_enabled', 'Enable multiple hosts');
define('_WEBO_parallel_allowed_list', 'Allowed hosts, i.e. img i1 i2');
define('_WEBO_htaccess_enabled', 'Enable <code>.htaccess</code>');
define('_WEBO_htaccess_mod_deflate', 'Enable <code>mod_deflate</code>');
define('_WEBO_htaccess_mod_gzip', 'Enable <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_expires', 'Enable <code>mod_expires</code>');
define('_WEBO_htaccess_mod_headers', 'Enable <code>mod_headers</code>');
define('_WEBO_htaccess_mod_setenvif', 'Enable <code>mod_setenvif</code>');
define('_WEBO_htaccess_local', 'Place <code>.htaccess</code> file locally (not to Document Root)');
define('_WEBO_htaccess_access', 'Protect Web Optimizer installation via <code>htpasswd</code>');
define('_WEBO_auto_rewrite_enabled', 'Enable auto-rewrite');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', 'Installation - Stage 3');
define('_WEBO_SPLASH3_SAVED', 'Your configuration options have been successfully saved.');
define('_WEBO_SPLASH3_REWRITE', 'Your configuration has been successfully saved');
define('_WEBO_SPLASH3_REWRITE_SHORT', 'Acceleration completed');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Required changes');
define('_WEBO_SPLASH3_TESTING_SHORT', 'Additional speed up');
define('_WEBO_SPLASH3_SECURITY_SHORT', 'More security');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'You website based on ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ' has been patched. You can <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">check the result here</a>.');
define('_WEBO_SPLASH3_WORKING', 'That\'s working. OK now what?');
define('_WEBO_SPLASH3_ADD', 'Now should should add the Web Optimizer code to your own PHP page. This is made a lot easier if you have one PHP file that serves every page in your site. In a Wordpress blog, for example, this would be the <strong>wp-blog-header.php</strong> file. Because <strong>wp-blog-header.php</strong> is accessed for every page, we just have to modify that file. If you have different PHP files serving different pages, then you will need to modify each of those pages.');
define('_WEBO_SPLASH3_MODIFY', 'How to modify your PHP file(s):');
define('_WEBO_SPLASH3_WP', 'Let\'s say we are modifying the <code>wp-blog-header.php</code> of a Wordpress blog. (This is just an example: if you want to add Web Optimizer to Wordpress you can use the Web Optimizer WP plugin). At the very top of the page you might see something like this:');
define('_WEBO_SPLASH3_CODE', 'We need to add in the Web Optimizer code <strong>before</strong> that. So you would add this to the very top of the page:');
define('_WEBO_SPLASH3_FINALLY', 'Finally, we must then add one more line of code to the very bottom of the page as follows:');
define('_WEBO_SPLASH3_TOFILE', 'To the file');
define('_WEBO_SPLASH3_TOFILE2', 'To the very beginning of the file');
define('_WEBO_SPLASH3_AFTERSTRING', 'after the string');
define('_WEBO_SPLASH3_ADD', 'add');
define('_WEBO_SPLASH3_TESTING', 'Now for some testing...');
define('_WEBO_SPLASH3_NOTLIVE', 'That\'s all you have to do. We recommend testing this out on a non-live site first, and then playing with the options to get optimal performance. To change the options you can:');
define('_WEBO_SPLASH3_MANUALLY', 'Manually edit the <code>config.webo.php</code> file here: <code>');
define('_WEBO_SPLASH3_MANUALLY2', 'config.webo.php</code>');
define('_WEBO_SPLASH3_AGAIN', 'Just <a href="');
define('_WEBO_SPLASH3_AGAIN2', '">run this install again</a>. It will remember your current options.');
define('_WEBO_SPLASH3_SECURITY', 'Extra security');
define('_WEBO_SPLASH3_ALTHOUGH', 'Although the package installs a username and password to access the install, you can also delete <code>');
define('_WEBO_SPLASH3_ALTHOUGH2', 'install.php</code> for extra security.');
define('_WEBO_SPLASH3_FINISH', 'Finish installation');
define('_WEBO_SPLASH3_CANTWRITE', 'Unable to write to the ');
define('_WEBO_SPLASH3_CANTWRITE2', ' directory you specified. Please make sure the directory exists and is writable.');
define('_WEBO_SPLASH3_CANTWRITE3', 'You can usually do this from your FTP client. Just navigate to the directory, right click and look for a Properties or CHMOD option.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Once you have done so, please refresh this page.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Please sure that the root of your website is readable and writable for your web server process.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', 'Make CHMOD 775 or CHMOD 777 for it, or create readable and writable <code>.htaccess</code> there, or CHMOD current <code>.htaccess</code> to 664 or 777.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Please sure that the root of your website is writable for your web server process or there is a writable <code>.htaccess</code> file.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Make CHMOD 775 or CHMOD 777 for it, or create writable <code>.htaccess</code> there, or CHMOD current <code>.htaccess</code> to 664 or 777.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'Please sure that you have installed Web Optimizer into');
define('_WEBO_SPLASH3_CONFSAVED', 'Configuration saved');
define('_WEBO_SPLASH3_CONFIGERROR', 'Unable to open the config file for writing. Please change the <code>config.webo.php</code> file so that is it writable.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'You can usually do this from your FTP client. Just navigate to <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , right click the file, and look for a Properties or CHMOD option. Set to 775, 777, or "write"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'Once you have done so, please refresh this page.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'Config file does not exist. Please download the full script from <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');

?>