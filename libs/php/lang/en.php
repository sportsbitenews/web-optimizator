<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Contains all EN localization constants
 *
 **/

/* general layout */
define('_WEBO_CHARSET', 'utf-8');
define('_WEBO_GENERAL_TITLE', 'WEBO Site SpeedUp Configuration');
define('_WEBO_GENERAL_FOOTER', 'Faster than lightning!');
define('_WEBO_GENERAL_BUYNOW', '<a href="https://secure.plimus.com/jsp/buynow.jsp?contractId=2586666&amp;currency=USD" class="wssJ" title="WEBO Site SpeedUp Premium Edition">Buy Now</a>');
define('_WEBO_GENERAL_BUYNOWLITE', '<a href="https://secure.plimus.com/jsp/buynow.jsp?contractId=2597306&amp;currency=USD" class="wssJ" title="WEBO Site SpeedUp Lite Edition">Buy Now</a>');
define('_WEBO_GENERAL_IMAGE', '<img src="http://web-optimizator.googlecode.com/svn/trunk/images/web.optimizer.logo.small.png" alt="WEBO Site SpeedUp" title="WEBO Site SpeedUp" width="151" height="150"/>');
define('_WEBO_GENERAL_BUY', 'Buy now');
define('_WEBO_GENERAL_PREMIUM', 'Premium');
define('_WEBO_GENERAL_EDITION', 'Edition');

/* lang menu */
define('_WEBO_GENERAL_LANGUAGE', 'Choose language');
define('_WEBO_GENERAL_ru', '–†—É—Å—Å–∫–∏–π');
define('_WEBO_GENERAL_de', 'Deutsch');
define('_WEBO_GENERAL_es', 'Espa√±ol');
define('_WEBO_GENERAL_ua', '–£–∫—Ä–∞—ó–Ω—Å—å–∫–∞');
define('_WEBO_GENERAL_en', 'English');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Hmmm...we have a problem');
define('_WEBO_ERROR_ERROR', 'Oopps! Something went wrong');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Authorization');
define('_WEBO_LOGIN_LOGIN', 'Login');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>Attention:</strong> can\'t find result of WEBO Site SpeedUp\'s efforts on your website. Please check its calls existence in your web system source files or install WEBO Site SpeedUp once more.');
define('_WEBO_LOGIN_EFFICIENCY_KB', 'Kb');
define('_WEBO_LOGIN_EFFICIENCY_S', 's');
define('_WEBO_LOGIN_USERNAME', 'First and last name');
define('_WEBO_LOGIN_USERNAME_HELP', 'This information will be used in e-mail messages to your.');
define('_WEBO_LOGIN_ENTERLOGIN', 'Enter your first and last name');
define('_WEBO_LOGIN_PASSWORD', 'Password');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Enter password');
define('_WEBO_LOGIN_LICENSE', 'License key');
define('_WEBO_LOGIN_ENTERLICENSE', 'Enter your license key');
define('_WEBO_SPLAHS1_PROTECTED', 'Protected mode');
define('_WEBO_SPLAHS1_PROTECTED2', 'WEBO Site SpeedUp installation is safely protected. You can configure it once more.');
define('_WEBO_LOGIN_EMAIL', 'E-mail');
define('_WEBO_LOGIN_EMAIL_HELP', 'This e-mail address will be used only for information about urgent updates, greetings, and special offers.');
define('_WEBO_LOGIN_ENTEREMAIL', 'Please enter your e-mail.');
define('_WEBO_LOGIN_EMAILNOTICE', 'This e-mail address will be used only for information about urgent updates, greetings, and special offers.');
define('_WEBO_LOGIN_ALLOW', 'Allow to use my data about optimization results');
define('_WEBO_LOGIN_ALLOW_HELP', 'Statistical information about website acceleration will be sent to WEBO Software servers. This information won\'t be published and will be used only to improve WEBO Site SpeedUp efficiency. No private data will be sent.');
define('_WEBO_LOGIN_SUCCESS', 'All settings have been successfully saved');
define('_WEBO_LOGIN_ENTEROLDPASSWORD', 'Please enter current password');
define('_WEBO_LOGIN_PASSWORDSDIFFER', 'Passwords don\'t match');

/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Upgrade');
define('_WEBO_LOGIN_VERSION', 'Version');
define('_WEBO_LOGIN_UPGRADE_BETA', 'To beta');
define('_WEBO_LOGIN_UPGRADE_STABLE', 'To stable');
define('_WEBO_LOGIN_UPGRADENOTICE', 'Your can upgrade your version (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') of WEBO Site SpeedUp to the latest one. Please enter your username and password and click <strong>Upgrade</strong>. WEBO Site SpeedUp will be upgraded to the version <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_LOGIN_UPGRADENOTICE4', ') of WEBO Site SpeedUp to latest one &mdash; <strong>');
define('_WEBO_UPGRADE_SUCCESSFULL', 'You have successfully upgraded to the version ');
define('_WEBO_UPGRADE_SUCCESSFULL2', '');
define('_WEBO_UPGRADE_UNABLE', 'Can\'t download the latest version from repository. Please check internet connection of the server and curl existence.');

/* Uninstall */
define('_WEBO_LOGIN_UNINSTALLME', 'Uninstall WEBO Site SpeedUp');
define('_WEBO_LOGIN_FAILED', 'Login failed');
define('_WEBO_UNINSTALL_MESSAGE', 'WEBO Site SpeedUp uninstall reason');
define('_WEBO_UNINSTALL_SUCCESS', 'WEBO Site SpeedUp was successfully uninstalled.');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Installation - set password');
define('_WEBO_NEW_PROTECT', '<p class="wssI">Please enter password to protect this installation. <strong>Community Edition</strong> requires no license key to be installed.</p><p class="wssI">Before installation please check that root <code>.htaccess</code> and source files of your web system are writable (during installation WEBO Site SpeedUp also creates backup of your files).</p><p class="wssI">WEBO Site SpeedUp can check all functions of your server and complete installation automatically. For this option please press <strong>"Next"</strong>. On complete you can change any settings using this administative interface.</p><p class="wssI"><a href="http://code.google.com/p/web-optimizator/wiki/StandaloneInstallation?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">WEBO Site SpeedUp installation process</a></p>');
define('_WEBO_NEW_NOSCRIPT', 'For correct work JavaScript must be enabled!');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Uninstall');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'WEBO Site SpeedUp uninstallation');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Thank you for using <a href="http://www.web-optimizer.us/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">WEBO Site SpeedUp</a>. You can install it once more later by visiting <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">WEBO Site SpeedUp page</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Feel free to visit <a href="http://www.web-optimizer.us/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">WEBO Site SpeedUp website</a> and submit <a href="http://code.google.com/p/web-optimizator/issues/list?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">any related issues</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Now you can return back to <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">your website</a>.');
define('_WEBO_SPLASH1_UNINSTALL_HELP', 'Please help us to improve our product - tell us WEBO Site SpeedUp uninstall reason.');
define('_WEBO_SPLASH1_UNINSTALL_SEND', 'Send message');
define('_WEBO_SPLASH1_NEXT', 'Next');
define('_WEBO_SPLASH1_BACK', 'Back');

/* Change password */
define('_WEBO_PASSWORD_OLD', 'Current password');
define('_WEBO_PASSWORD_ENTERPASSWORD', 'Please enter current password');
define('_WEBO_PASSWORD_NEW', 'New password');
define('_WEBO_PASSWORD_ENTERPASSWORDNEW', 'Please enter new password');
define('_WEBO_PASSWORD_CONFIRM', 'New password confirmation');
define('_WEBO_PASSWORD_ENTERPASSWORDCONFIRM', 'Please enter confirmation for the new password');
define('_WEBO_SPLASH1_SAVE', 'Save');
define('_WEBO_PASSWORD_DIFFERENT', 'New password and its confirmation are different');
define('_WEBO_PASSWORD_EMPTY', 'New password isn\'t set!');
define('_WEBO_PASSWORD_SUCCESSFULL', 'Password has been changed');

/* Second splash -- set options */
define('_WEBO_SPLASH2_CONTROLPANEL', 'Control Panel');
define('_WEBO_SPLASH2_OPTIONS', 'Options');
define('_WEBO_SPLASH2_YES', 'Yes:');
define('_WEBO_SPLASH2_NO', 'No:');
define('_WEBO_SPLASH2_UNABLE', 'Unable to open');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>Please make sure the directory exists and it is your root directory.');

/* WEBO Site SpeedUp options */
define('_WEBO_general', 'General options');
define('_WEBO_combinecss', 'CSS combine');
define('_WEBO_combine_js', 'JavaScript combine');
define('_WEBO_minify', 'Minify');
define('_WEBO_gzip', 'Gzip');
define('_WEBO_clientside', 'Client side cache');
define('_WEBO_htaccess', '.htaccess');
define('_WEBO_backlink', 'Backlink');
define('_WEBO_performance', 'Performance');
define('_WEBO_data_uri', 'data:URI usage');
define('_WEBO_css_sprites', 'CSS Sprites');
define('_WEBO_serverside', 'Server side cache');
define('_WEBO_unobtrusive', 'Unobtrusive JavaScript');
define('_WEBO_multiple_hosts', 'Multiple hosts');

define('_WEBO_javascript_cachedir', 'Path to JavaScript cache directory');
define('_WEBO_javascript_cachedir_HELP', 'This directory contains all files of JavaScript cache.');
define('_WEBO_css_cachedir', 'Path to CSS cache directory');
define('_WEBO_css_cachedir_HELP', 'This directory contains all files of CSS cache.');
define('_WEBO_html_cachedir', 'Path to HTML cache directory');
define('_WEBO_html_cachedir_HELP', 'This directory contains all files of HTML cache.');
define('_WEBO_website_root', 'Path to website root directory');
define('_WEBO_website_root_HELP', 'Absolute path to the root directory of your website.');
define('_WEBO_document_root', 'Path to <code>DOCUMENT_ROOT</code>');
define('_WEBO_document_root_HELP', 'Absolute path to the root directory of th website\'s host.');
define('_WEBO_host', 'Website address');
define('_WEBO_host_HELP', 'Domain name or IP address of your website. For example: mysite.com');
define('_WEBO_external_scripts_user', 'Username (to access via HTTP Basic Authorization)');
define('_WEBO_external_scripts_user_HELP', 'If your website is protected via HTTP Basic Authorization you need to declare username and password so WEBO Site SpeedUp can process all required resources from the website.');
define('_WEBO_external_scripts_pass', 'Password (to access via HTTP Basic Authorization)');
define('_WEBO_external_scripts_pass_HELP', 'If your website is protected via HTTP Basic Authorization you need to declare username and password so WEBO Site SpeedUp can process all required resources from the website.');

define('_WEBO_combine_css', 'Combine CSS files');
define('_WEBO_combine_css_HELP', 'Depending on this option CSS won\'t be combined, or there will be combined only CSS in &lt;head&gt; tag, or there will be combined the whole CSS on the page. All combined CSS code will be minified.');
define('_WEBO_combine_css1', 'Don\'t combine CSS files');
define('_WEBO_combine_css2', 'Combine only CSS included in tag <code>&lt;head&gt;</code>');
define('_WEBO_combine_css3', 'Combine all CSS in tags <code>&lt;head&gt;</code> and <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_css', 'Enable external styles merging');
define('_WEBO_external_scripts_css_HELP', 'There will be combined files located on all hosts. Otherwise WEBO Site SpeedUp will combine only files located on the same host that initial web page.');
define('_WEBO_external_scripts_css_inline', 'Enable inline styles merging');
define('_WEBO_external_scripts_css_inline_HELP', 'There will be combined all CSS included with the help of &lt;style&gt; and &lt;link&gt; tags. Otherwise WEBO Site SpeedUp will combine files included with &lt;link&gt; tag.');
define('_WEBO_minify_css_file', 'Combined CSS file name');
define('_WEBO_minify_css_file_HELP', 'File name can include only latin letters, numbers, hyphens, underlines, or dots. All the other symbols will be excluded. This file name may be automatically expanded with special extension to manage client side cache in browsers.');
define('_WEBO_external_scripts_additional_list', 'Exclude CSS file(s) from merging (separated by space)');
define('_WEBO_external_scripts_additional_list_HELP', 'Defined files won\'t be included into combined CSS file. You need to define only file names, not absolute paths to them.');
define('_WEBO_external_scripts_include_code', 'Include CSS code to all files');
define('_WEBO_external_scripts_include_code_HELP', 'Entered CSS code will be added to the end of each combined CSS file. This field allows you to define additional styles for website working under WEBO Site SpeedUp.');

define('_WEBO_minify_javascript', 'Combine JavaScript files');
define('_WEBO_minify_javascript_HELP', 'Depending on this option JavaScript won\'t be combined, or there will be combined only JavaScript in &lt;head&gt; tag, or there will be combined the whole JavaScript on the page.');
define('_WEBO_minify_javascript1', 'Don\'t combine JavaScript files');
define('_WEBO_minify_javascript2', 'Combine only JavaScript included in tag <code>&lt;head&gt;</code>');
define('_WEBO_minify_javascript3', 'Combine all JavaScript in tags <code>&lt;head&gt;</code> and <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_inline', 'Enable inline JavaScript merging');
define('_WEBO_external_scripts_inline_HELP', 'There will be combined both inline code in tags &‰ÂÊscript&gt; and JavaScript code from external files. Otherwise there will be combined only JavaScript included via &lt;script src=&quot;...&quot;&gt;.');
define('_WEBO_external_scripts_on', 'Enable external JavaScript merging');
define('_WEBO_external_scripts_on_HELP', 'There will be combined files located on all hosts. Otherwise WEBO Site SpeedUp will combine only files located on the same host that initial web page.');
define('_WEBO_minify_javascript_file', 'Combined JavaScript file name');
define('_WEBO_minify_javascript_file_HELP', 'File name can include only latin letters, numbers, hyphens, underlines, or dots. All the other symbols will be excluded. This file name may be automatically expanded with special extension to manage client side cache in browsers.');
define('_WEBO_external_scripts_ignore_list', 'Exclude file(s) from combining');
define('_WEBO_external_scripts_ignore_list_HELP', 'Defined files won\'t be included into combined JavaScript file. You need to define only file names, not absolute paths to them.');
define('_WEBO_external_scripts_head_end', 'Force moving combined script to <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_head_end_HELP', 'Combined JavaScript file call will be moved to closing tag &lt;/head&gt;.');

define('_WEBO_minify_css', 'Minify CSS files');
define('_WEBO_minify_css_HELP', 'All excessive spaces, tabs, line breaks, and comments will be deleted from combined CSS file.');
define('_WEBO_minify_js', 'Minify JavaScript files');
define('_WEBO_minify_js_HELP', 'All excessive spaces, tabs, line breaks, and comments will be deleted from combined JavaScript file. Library choice affects minify algorithm and compression rate. Maximum compression can be achieved with any of these libraries depending on initial conditions.');
define('_WEBO_minify_js1', 'Don\'t minify JavaScript');
define('_WEBO_minify_js2', 'Minify with JSMin (from Douglas Crockford)');
define('_WEBO_minify_js3', 'Minify with Packer (by Dean Edwards)');
define('_WEBO_minify_js4', 'Minify with YUI Compressor (requires java)');
define('_WEBO_minify_page', 'Minify HTML');
define('_WEBO_minify_page_HELP', 'HTML code will be cleaned from double spaces, double line breaks, empty symbols at the beginning of every string and spaces before tag ends. Tags &lt;pre&gt;, &lt;textarea&gt;, &lt;script&gt; will be excluded from all actions .');
define('_WEBO_minify_html_comments', 'Remove HTML comments');
define('_WEBO_minify_html_comments_HELP', 'All HTML comments will be removed. This can break conditional comments and some JavaScript counters.');
define('_WEBO_minify_html_one_string', 'Compress HTML to one string');
define('_WEBO_minify_html_one_string_HELP', 'HTML code of result web page will be compressed to one string. This can help with removing extra spaces and line breaks. But this is CPU intensive and should be used carefully.');

define('_WEBO_unobtrusive_on', 'Enable unobtrusive JavaScript');
define('_WEBO_unobtrusive_on_HELP', 'Every web page load will be accelerated with unobtrusive JavaScript according to options in this section.');
define('_WEBO_unobtrusive_body', 'Include combined JavaScript file before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_body_HELP', 'Combined JavaScript files will be moved to closing &lt;/body&gt; tag. This option has more priority than &quot;Force moving combined script to &lt;/head&gt;&quot;.');
define('_WEBO_unobtrusive_all', 'Move all JavaScript code to <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_all_HELP', 'All JavaScript calls will be moved to closing &lt;/body&gt; tag according to their initial order on the web page.');
define('_WEBO_unobtrusive_informers', 'Move JavaScript widgets calls before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers_HELP', 'The whole JavaScript code from widgets calls will be moved to &lt;/body&gt;.');
define('_WEBO_unobtrusive_counters', 'Move counter calls before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters_HELP', 'The whole JavaScript code from counters calls will be moved to &lt;/body&gt;.');
define('_WEBO_unobtrusive_ads', 'Move advertisement calls before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads_HELP', 'The whole JavaScript code from ads (context and banners) calls will be moved to &lt;/body&gt;.');
define('_WEBO_unobtrusive_iframes', 'Make iframes\' load delayed');
define('_WEBO_unobtrusive_iframes_HELP', 'The whole HTML code from iframes calls will be moved to &lt;/body&gt;.');

define('_WEBO_gzip_css', 'Gzip CSS');
define('_WEBO_gzip_css_HELP', 'All CSS files will be compressed via gzip.');
define('_WEBO_gzip_javascript', 'Gzip JavaScript');
define('_WEBO_gzip_javascript_HELP', 'All JavaScript files will be compressed via gzip.');
define('_WEBO_gzip_fonts', 'Gzip fonts');
define('_WEBO_gzip_fonts_HELP', 'All fonts files (.eot, .ttf, .otf etc) will be compressed via gzip.');
define('_WEBO_gzip_page', 'Gzip HTML');
define('_WEBO_gzip_page_HELP', 'All HTML files (.eot, .ttf, .otf etc) will be compressed via gzip.');
define('_WEBO_gzip_noie', 'Use <code>deflate</code> instead of <code>gzip</code> for IE6/7');
define('_WEBO_gzip_noie_HELP', 'In some cases gzip in IE6 and IE7 browsers can lead to incorrect page view. This option allows you to force alternative compression technique usage for these browsers.');
define('_WEBO_gzip_cookie', 'Check for gzip possibility via cookies');
define('_WEBO_gzip_cookie_HELP', 'WEBO Site SpeedUp can perform additional check for gzip support in browsers. If it\'s been defined all data will be compressed regardless Accept-Encoding header.');

define('_WEBO_far_future_expires_javascript', 'Cache JavaScript');
define('_WEBO_far_future_expires_javascript_HELP', 'All JavaScript files will have caching headers set to far future.');
define('_WEBO_far_future_expires_css', 'Cache CSS');
define('_WEBO_far_future_expires_css_HELP', 'All CSS files will have caching headers set to far future.');
define('_WEBO_far_future_expires_images', 'Cache images');
define('_WEBO_far_future_expires_images_HELP', 'All images will have caching headers set to far future.');
define('_WEBO_far_future_expires_fonts', 'Cache fonts');
define('_WEBO_far_future_expires_fonts_HELP', 'All fonts files will have caching headers set to far future. This option is applied via .htaccess.');
define('_WEBO_far_future_expires_video', 'Cache video files');
define('_WEBO_far_future_expires_video_HELP', 'All video files will have caching headers set to far future. This option is applied via .htaccess.');
define('_WEBO_far_future_expires_static', 'Cache static assets');
define('_WEBO_far_future_expires_static_HELP', 'All other static files will have caching headers set to far future. This option is applied via .htaccess.');
define('_WEBO_far_future_expires_html', 'Cache HTML');
define('_WEBO_far_future_expires_html_HELP', 'All images will have caching headers. Cache timeout will be set according to option &quot;Default timeout to cache HTML&quot;.');
define('_WEBO_far_future_expires_html_timeout', 'Default timeout to cache HTML (in seconds)');
define('_WEBO_far_future_expires_html_timeout_HELP', 'Time to cache HTML files. Zero value means zero timeout.');
define('_WEBO_far_future_expires_external', 'Cache external files');
define('_WEBO_far_future_expires_external_HELP', 'External files called on web page will be cached and served fro mthe same host that web page itself.');

define('_WEBO_html_cache_enabled', 'Cache generated HTML files');
define('_WEBO_html_cache_enabled_HELP', 'HTML pages will be cached for timeout set in option &quot;Default HTML cache timeout&quot;. This option allows you to significantly speedup web pages load with long generation time. But this is reasonable only for static pages without dynamic content.');
define('_WEBO_html_cache_timeout', 'Default HTML cache timeout, in seconds');
define('_WEBO_html_cache_timeout_HELP', 'After this time all cached HTML pages will be re-created on server side.');
define('_WEBO_html_cache_flush_only', 'Only cache first n bytes of content (flush early)');
define('_WEBO_html_cache_flush_only_HELP', 'HTML cache will contain not the whole web page but the first n bytes of it (set in option &quot;Flush content size&raquo;) ·Û‰ÂÚ ÓÚÔ‡‚ÎˇÚ¸Òˇ Ë &quot;Ò). And this amount of data will be flushed to browser earlier than the rest web page content. So browser will receive calls to required resources earlier and don\'t wait the rest of the page to start their load.');
define('_WEBO_html_cache_flush_size', 'Flush content size (in bytes)');
define('_WEBO_html_cache_flush_size_HELP', 'Size of cached flushed part of a web page. It can be fixed (to avoid any issues with browsers or network connection). Empty (or zero) value leads to flush the whole web page content before closing &lt;/head&gt; tag.');
define('_WEBO_html_cache_ignore_list', 'List of parts of URLs to ignore from caching (separated by space)');
define('_WEBO_html_cache_ignore_list_HELP', 'Ofter server side caching can\'t be used for pages with dynamic content. For example user account pages, statistic pages, and more. This option allows you to set parts of URL (masks) to exclude pages from server side caching.');
define('_WEBO_html_cache_allowed_list', 'List of USER AGENTS (robots) to add to caching (separated by space)');
define('_WEBO_html_cache_allowed_list_HELP', 'This option allows you to set a list of USER AGENTS which will receive only cached HTML pages. For example caching HTML pages for all search engines can reduce server side load.');

define('_WEBO_performance_mtime', 'Ignore file modification time stamp (mtime)');
define('_WEBO_performance_mtime_HELP', 'There will be gained additional speedup (on server side). But to refresh combined files you will need to change calls of initial files in HTML code or to refresh WEBO Site SpeedUp cache.');
define('_WEBO_performance_plain_string', 'Do not use regular expressions');
define('_WEBO_performance_plain_string_HELP', 'Regular expressions usage damages server performance and they can be replaced with simple string operations. But in the latter case probability of incorrect HTML parsing (for invalid (X)HTML documents only) will be higher.');
define('_WEBO_performance_quick_check', 'Check cache integrity only with <code>head</code> tag');
define('_WEBO_performance_quick_check_HELP', 'There can be gained additional benefit with simplified cache integrity check (only via general content of &lt;head&gt; tag. But this can\'t be used if any external files must be excluded from merging.');
define('_WEBO_performance_cache_version', 'Cache version number');
define('_WEBO_performance_cache_version_HELP', 'Cache version defines version of all files in cache. To refresh cache on client side (in browsers) you need to change this number.');
define('_WEBO_performance_check_files', 'Don\'t check cache files existence');
define('_WEBO_performance_check_files_HELP', 'There will be no check for cache files existence with this option enabled. Cache version will be defined with option &quo;tCache version number&quot;. In this case to refresh cache files on client side (in browsers) you need to change cache version number. THere will be standard cache files existence check performed with this option enabled.');
define('_WEBO_performance_uniform_cache', 'Uniform cache files for all browsers');
define('_WEBO_performance_uniform_cache_HELP', 'All browsers will receive uniform CSS, JavaScript, and HTML code. This allows you to use external caching techniques safely but this disabled a number of optimization techniques such as data:URI.');

define('_WEBO_footer_text', 'Add a link to WEBO Site SpeedUp');
define('_WEBO_footer_text_HELP', 'WEBO Site SpeedUp link is required in Community Edition and can be removed only in paid version.');
define('_WEBO_footer_image', 'Add a WEBO Site SpeedUp image');
define('_WEBO_footer_image_HELP', 'File name with WEBO Site SpeedUp logo. All allowed files are located in: &lt;WEBO Site SpeedUp path&gt;/web-optimizer/images/. If this option is empty a text defined in &quot;Text for backlink&quot; option will be shown.');
define('_WEBO_footer_link', 'Text for backlink');
define('_WEBO_footer_link_HELP', 'If option &quot;Add a WEBO Site SpeedUp image&quot; is disabled this text will be shown in a link. Otherwise is will used as a title for image.');
define('_WEBO_footer_css_code', 'Styles for backlink placement');
define('_WEBO_footer_css_code_HELP', 'These styles will be applied for WEBO Site SpeedUp link. You can define link placement, its color, background, size, etc.');
define('_WEBO_footer_spot', 'Add <code>lang="wo"</code> to <code>title</code>');
define('_WEBO_footer_spot_HELP', 'Attribute lang=&quot;wo&quot; existence indicates that WEBO Site SpeedUp successfully parses this page It\'s used in internal algorithms.');

define('_WEBO_data_uris_on', 'Apply <code>data:URI</code>');
define('_WEBO_data_uris_on_HELP', 'Background images will be converted to base64 format and included directly into CSS files for all browsers which support data:URI.');
define('_WEBO_data_uris_mhtml', 'Apply <code>mhtml</code>');
define('_WEBO_data_uris_mhtml_HELP', 'Background images will be converted to mhtml format and included directly into CSS files for all versions of Internet Explorer which don\'t support data:URI.');
define('_WEBO_data_uris_separate', 'Separate images from CSS code');
define('_WEBO_data_uris_separate_HELP', 'Combined CSS code and images in base64 and mtml formats will be stored in different files. This should increase cachebility.');
define('_WEBO_data_uris_domloaded', 'Load images on <code>DOMready</code> event');
define('_WEBO_data_uris_domloaded_HELP', 'Background images\' load will be delayed to DOMReady event. This will increase initial web page render speed in browsers.');
define('_WEBO_data_uris_size', 'Maximum <code>data:URI</code> size (in bytes)');
define('_WEBO_data_uris_size_HELP', 'Images which size is greater than given number won\'t be converted to base64 format. No value or zero value means no limit.');
define('_WEBO_data_uris_mhtml_size', 'Maximum <code>mhtml</code> size (in bytes)');
define('_WEBO_data_uris_mhtml_size_HELP', 'Images which size is greater than given number won\'t be converted to mhtml format. No value or zero value means no limit.');
define('_WEBO_data_uris_ignore_list', 'Exclude files from <code>data:URI</code> (separated by space)');
define('_WEBO_data_uris_ignore_list_HELP', 'Images listed in this option won\'t be converted to data:URI. Please provide only file names not absolute paths.');
define('_WEBO_data_uris_additional_list', 'Exclude files from <code>mhtml</code> (separated by space)');
define('_WEBO_data_uris_additional_list_HELP', 'Images listed in this option won\'t be converted to mhtml. Please provide only file names not absolute paths.');

define('_WEBO_css_sprites_enabled', 'Apply CSS Sprites');
define('_WEBO_css_sprites_enabled_HELP', 'Background images will be combined with the help of CSS Sprites technique. Related CSS code will be safely modified.');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Images\' format');
define('_WEBO_css_sprites_truecolor_in_jpeg_HELP', 'If you choose automated format detection possibility of any side effects in CSS Sprites images will be minimal. If you choose JPEG format rate quality/size for true color images will the best but there will be no transparency.');
define('_WEBO_css_sprites_truecolor_in_jpeg1', 'Detect proper format automatically');
define('_WEBO_css_sprites_truecolor_in_jpeg2', 'Prefer JPEG format');
define('_WEBO_css_sprites_aggressive', '&quot;Aggressive&quot; combine mode for CSS Sprites');
define('_WEBO_css_sprites_aggressive_HELP', 'Number of CSS Sprites images and their size will be lower but this may lead to graphical artefacts on web pages.');
define('_WEBO_css_sprites_extra_space', 'Add free space for CSS Sprites');
define('_WEBO_css_sprites_extra_space_HELP', 'Images in CSS Sprites will be rounded with free space to prevent side effects on web page scale in browsers. CSS Sprites file size will be a bit greater.');
define('_WEBO_css_sprites_no_ie6', 'Exclude IE6');
define('_WEBO_css_sprites_no_ie6_HELP', 'IE6 will receive its own CSS file without CSS Sprites.');
define('_WEBO_css_sprites_memory_limited', 'Restrict memory usage');
define('_WEBO_css_sprites_memory_limited_HELP', 'In case of available memory excess during CSS Sprites creation some images won\'t be included into final CSS Sprites.');
define('_WEBO_css_sprites_dimensions_limited', 'Maximum width and height of images (in px)');
define('_WEBO_css_sprites_dimensions_limited_HELP', 'Images heigher or wider than defined number won\'t be included into CSS Sprites. No value or zero value means no restriction.');
define('_WEBO_css_sprites_ignore_list', 'Exclude files from CSS Sprites (separated by space)');
define('_WEBO_css_sprites_ignore_list_HELP', 'Images listed in this option won\'t be included to CSS Sprites. Please provide only file names not absolute paths.');

define('_WEBO_parallel_enabled', 'Enable multiple hosts');
define('_WEBO_parallel_enabled_HELP', 'All images called on web page will be automatically distributed through multiple hosts (mirrors). For example URL http://www.site.com/i/logo.png or /i/bg.jpg can be replaced with http://i1.site.com/i/logo.png and http://i2.site.com/i/bg.jpg in case if both hosts i1 and i2 are available and listed in option &quot;Allowed hosts&quot;.');
define('_WEBO_parallel_check', 'Check hosts\' availability automatically');
define('_WEBO_parallel_check_HELP', 'Available hosts will be checked automatically for images\' existence.');
define('_WEBO_parallel_allowed_list', 'Allowed hosts (separated by space)');
define('_WEBO_parallel_allowed_list_HELP', 'Listed hosts will be used to distribute images. Please define no more than 4 hosts.');
define('_WEBO_parallel_additional', 'Additional websites with multiple hosts (separated by space)');
define('_WEBO_parallel_additional_HELP', 'If there is several websites using images\' distribution you can use WEBO Site SpeedUp to distribute their images through all these hosts.');
define('_WEBO_parallel_additional_list', 'Hosts on these websites (separated by space)');
define('_WEBO_parallel_additional_list_HELP', 'These hosts are used to distribute images which are located on websites defined in &quot;Additional websites with multiple hosts&quot; option.');

define('_WEBO_htaccess_enabled', 'Enable <code>.htaccess</code>');
define('_WEBO_htaccess_enabled_HELP', 'This option will create (or modify) .htaccess file in website root directory. Also it creates backup version of this file. .htaccess file content depends on the other options in this group.');
define('_WEBO_htaccess_mod_deflate', 'Use <code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_htaccess_mod_deflate_HELP', 'This is required for dynamic gzip compression. It\'s an alternative for mod_gzip.');
define('_WEBO_htaccess_mod_gzip', 'Use <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_gzip_HELP', 'This is required for dynamic gzip compression. It\'s an alternative for mod_deflate.');
define('_WEBO_htaccess_mod_expires', 'Use <code>mod_expires</code>');
define('_WEBO_htaccess_mod_expires_HELP', 'This is required for client side cache headers set.');
define('_WEBO_htaccess_mod_headers', 'Use <code>mod_headers</code>');
define('_WEBO_htaccess_mod_headers_HELP', 'This is required to support proxy servers and old browsers with correct headers.');
define('_WEBO_htaccess_mod_setenvif', 'Use <code>mod_setenvif</code>');
define('_WEBO_htaccess_mod_setenvif_HELP', 'This is required to support proxy servers and old browsers with correct headers.');
define('_WEBO_htaccess_mod_mime', 'Use <code>mod_mime</code>');
define('_WEBO_htaccess_mod_mime_HELP', 'This is required for static gzip.');
define('_WEBO_htaccess_mod_rewrite', 'Use <code>mod_rewrite</code>');
define('_WEBO_htaccess_mod_rewrite_HELP', 'This is required for static gzip or forced caching.');
define('_WEBO_htaccess_local', 'Place <code>.htaccess</code> file locally (not to Document Root)');
define('_WEBO_htaccess_local_HELP', '<code>.htaccess</code> file will be located in local website folder but not document root of website host.');
define('_WEBO_htaccess_access', 'Protect WEBO Site SpeedUp installation via <code>htpasswd</code>');
define('_WEBO_htaccess_access_HELP', 'This option provides additional security for WEBO Site SpeedUp installation with the help of HTTP Basic Authorization and .htaccess and .htpasswd files.');
define('_WEBO_htaccess_login', 'Login to protect WEBO Site SpeedUp with <code>.htpasswd</code>');
define('_WEBO_htaccess_login_HELP', 'To protect WEBO Site SpeedUp with .htpasswd you need to define login and password. Login is set with this option. Password is equal to WEBO Site SpeedUp installation password.');

/* Dashboard */
define('_WEBO_DASHBOARD_LOADING', 'Loading...');
define('_WEBO_SPLASH2_CONTROLPANEL_TITLE', 'Overall information about application');
define('_WEBO_SPLASH2_OPTIONS_TITLE', 'All settings');
define('_WEBO_DASHBOARD_SYSTEM_TITLE', 'Application and server status');
define('_WEBO_DASHBOARD_ACCOUNT_TITLE', 'User-related data');
define('_WEBO_DASHBOARD_ACCOUNT', 'Personal Data');
define('_WEBO_DASHBOARD_CACHE', 'Cache');
define('_WEBO_DASHBOARD_SYSTEM', 'System Status');
define('_WEBO_DASHBOARD_SPEED', 'Load Speed');
define('_WEBO_DASHBOARD_STATUS', 'Curent Status');
define('_WEBO_DASHBOARD_NEWS', 'News');
define('_WEBO_DASHBOARD_BUZZ', 'Spead the Word!');
define('_WEBO_DASHBOARD_UPDATES', 'Updates');
define('_WEBO_DASHBOARD_RESULTS', 'Optimization Results');
define('_WEBO_DASHBOARD_TOOLS', 'Optimization Tools');
define('_WEBO_DASHBOARD_LINKS', 'Quick Links');
define('_WEBO_DASHBOARD_AVAILABLE', 'Available in Premium Edition');
define('_WEBO_DASHBOARD_ALL', 'All Blocks');
define('_WEBO_DASHBOARD_INSTALL', 'Install');

/* Dashboard status block */
define('_WEBO_DASHBOARD_STATUS_IS', 'is');
define('_WEBO_DASHBOARD_STATUS_ACTIVE', 'active');
define('_WEBO_DASHBOARD_STATUS_LIVE', 'live&nbsp;mode');
define('_WEBO_DASHBOARD_STATUS_WORKING', 'You can bring it to debug mode. For this purpose please disable it.');
define('_WEBO_DASHBOARD_STATUS_NOTACTIVE', 'not active');
define('_WEBO_DASHBOARD_STATUS_DEBUG', 'debug&nbsp;mode');
define('_WEBO_DASHBOARD_STATUS_TESTING', 'You can debug application work');
define('_WEBO_DASHBOARD_STATUS_TESTING2', 'with the <code>web_optimizer_debug</code> parameter');
define('_WEBO_DASHBOARD_STATUS_COOKIE', 'or just via cookie');
define('_WEBO_DASHBOARD_STATUS_TESTING3', 'After this you can enable it.');
define('_WEBO_DASHBOARD_STATUS_ENABLE', 'Enable');
define('_WEBO_DASHBOARD_STATUS_DISABLE', 'Disable');
define('_WEBO_DASHBOARD_STATUS0','Starting optimization');
define('_WEBO_DASHBOARD_STATUS1','Preparing environment');
define('_WEBO_DASHBOARD_STATUS2','Initializing variables');
define('_WEBO_DASHBOARD_STATUS4','Calculating directories');
define('_WEBO_DASHBOARD_STATUS5','Checking settings');
define('_WEBO_DASHBOARD_STATUS6','Writing .htaccess');
define('_WEBO_DASHBOARD_STATUS8','Preparing chained optimization');
define('_WEBO_DASHBOARD_STATUS10','Starting chained optimziation');
define('_WEBO_DASHBOARD_STATUS11','Creating JavaScript cache &mdash; checking files');
define('_WEBO_DASHBOARD_STATUS12','Creating JavaScript cache &mdash; merging files');
define('_WEBO_DASHBOARD_STATUS13','Creating JavaScript cache &mdash; compressing files');
define('_WEBO_DASHBOARD_STATUS14','Preparing CSS Sprites');
define('_WEBO_DASHBOARD_STATUS15','Creating CSS Sprites &mdash; stage 1');
define('_WEBO_DASHBOARD_STATUS16','Creating CSS Sprites &mdash; stage 2');
define('_WEBO_DASHBOARD_STATUS17','Creating CSS Sprites &mdash; stage 3');
define('_WEBO_DASHBOARD_STATUS18','Preparing data:URI + mhtml');
define('_WEBO_DASHBOARD_STATUS19','Creating data:URI + mhtml');
define('_WEBO_DASHBOARD_STATUS20','Creating CSS cache &mdash; checking files');
define('_WEBO_DASHBOARD_STATUS21','Creating CSS cache &mdash; merging files');
define('_WEBO_DASHBOARD_STATUS22','Creating CSS cache &mdash; compressing files');
define('_WEBO_DASHBOARD_STATUS23','Checking HTML document');
define('_WEBO_DASHBOARD_STATUS24','Compressing HTML document');
define('_WEBO_DASHBOARD_STATUS_ALL','all browsers');
define('_WEBO_DASHBOARD_STATUS85','Checking cache integrity');
define('_WEBO_DASHBOARD_STATUS90','Finishing chained optimization');
define('_WEBO_DASHBOARD_STATUS95','Clearing temporary data');
define('_WEBO_DASHBOARD_STATUS100','Finish');

/* Dashboard links block */
define('_WEBO_DASHBOARD_LINKS_WEBSITE', 'WEBO Site SpeedUp website');
define('_WEBO_DASHBOARD_LINKS_UG', 'User documentation');
define('_WEBO_DASHBOARD_LINKS_ISSUES', 'Known issues');
define('_WEBO_DASHBOARD_LINKS_SUPPORT', 'Technical support');

/* Dashboard cache block */
define('_WEBO_DASHBOARD_CACHE_TITLE', 'Cache status');
define('_WEBO_DASHBOARD_CACHE_CSS', 'CSS');
define('_WEBO_DASHBOARD_CACHE_JS', 'JavaScript');
define('_WEBO_DASHBOARD_CACHE_HTML', 'HTML');
define('_WEBO_DASHBOARD_CACHE_SPRITES', 'CSS Sprites');
define('_WEBO_DASHBOARD_CACHE_IMAGES', 'Images');
define('_WEBO_DASHBOARD_CACHE_RESOURCES', 'data:URI + mhtml');
define('_WEBO_DASHBOARD_CACHE_SIZE', 'Total size');
define('_WEBO_DASHBOARD_CACHE_REFRESH', 'Refresh cache');

/* Dashboard system block */
define('_WEBO_SYSTEM_TITLE', 'Server Configuration');
define('_WEBO_SYSTEM_NOPROBLEMS', 'All is OK');
define('_WEBO_SYSTEM_TOTAL', 'Total');
define('_WEBO_SYSTEM_TROUBLE', 'trouble');
define('_WEBO_SYSTEM_TROUBLES', 'troubles');
define('_WEBO_SYSTEM_TROUBLES2', 'troubles');
define('_WEBO_SYSTEM_WARNING', 'warning');
define('_WEBO_SYSTEM_WARNINGS', 'warnings');
define('_WEBO_SYSTEM_WARNINGS2', 'warnings');
define('_WEBO_SYSTEM_javascript_writable', 'JavaScript folder isn\'t writable');
define('_WEBO_SYSTEM_css_writable', 'CSS folder isn\'t writable');
define('_WEBO_SYSTEM_html_writable', 'HTML folder isn\'t writable');
define('_WEBO_SYSTEM_config_writable', 'Configuration file isn\'t writable');
define('_WEBO_SYSTEM_htaccess_writable', '<code>.htaccess</code> isn\'t writable');
define('_WEBO_SYSTEM_index_writable', '<code>index.php</code> isn\'t writable');
define('_WEBO_SYSTEM_curl_possibility', '<code>curl</code> isn\'t available');
define('_WEBO_SYSTEM_gzip_possibility', '<code>zlib</code> isn\'t available');
define('_WEBO_SYSTEM_gd_possibility', '<code>gd</code> isn\'t available');
define('_WEBO_SYSTEM_gd_full_support', '<code>gd</code> is partly available');
define('_WEBO_SYSTEM_yui_possibility', 'YUI Compressor isn\'t available');
define('_WEBO_SYSTEM_hosts_possibility', 'No multiple hosts support');
define('_WEBO_SYSTEM_mod_deflate', 'No <code>mod_deflate</code> support');
define('_WEBO_SYSTEM_mod_gzip', 'No <code>mod_gzip</code> support');
define('_WEBO_SYSTEM_mod_headers', 'No <code>mod_headers</code> support');
define('_WEBO_SYSTEM_mod_expires', 'No <code>mod_expires</code> support');
define('_WEBO_SYSTEM_mod_mime', 'No <code>mod_mime</code> support');
define('_WEBO_SYSTEM_mod_setenvif', 'No <code>mod_setenvif</code> support');
define('_WEBO_SYSTEM_mod_rewrite', 'No <code>mod_rewrite</code> support');
define('_WEBO_SYSTEM_mod_symlinks', 'No <code>SymLinks</code> support');
define('_WEBO_SYSTEM_protected_mode', 'Not protected mode');
define('_WEBO_SYSTEM_cms', 'No CMS support');
define('_WEBO_SYSTEM_memory_limit', 'Memory is limited');

/* System status */
define('_WEBO_SYSTEM_STATUS', 'Status');
define('_WEBO_SYSTEM_SETTINGS', 'Settings');
define('_WEBO_SYSTEM_UPDATES', 'Updates');
define('_WEBO_SYSTEM_INSTALL', 'Install &amp; uninstall');
define('_WEBO_SYSTEM_ISSUES', 'Issues and warnings');
define('_WEBO_SYSTEM_SETTINGS_TITLE', 'WEBO Site SpeedUp Settings');
define('_WEBO_SYSTEM_UPDATES_TITLE', 'Application updates');
define('_WEBO_SYSTEM_INSTALL_TITLE', 'WEBO Site SpeedUp install and uninstall');
define('_WEBO_SYSTEM_INSTALLED', 'WEBO Site SpeedUp is installed for');
define('_WEBO_SYSTEM_INSTALLINFO', 'The following changes made during WEBO Site SpeedUp installation can be rolled back if you press button &quot;Uninstall&quot;:');
define('_WEBO_SYSTEM_INSTALLINFO2', 'You can restore initial application calls in system files anytime. To perform this please press &quot;Install&quot; (or &quot;Re-install&quot;). In case of application uninstall all cache files and configuration options will be saved.');
define('_WEBO_SYSTEM_SUCCESS', 'All changes in source files were successfully performed.');
define('_WEBO_showbeta', 'Show beta versions\' information');
define('_WEBO_showbeta_HELP', 'By default only stable WEBO Site SpeedUp updates are shown. You can also enable check for beta (potentially unstable) versions.');

/* Dashboard options block */
define('_WEBO_DASHBOARD_OPTIONS_DISABLED', 'Disabled');

/* Dashboard speed block */
define('_WEBO_DASHBOARD_SPEED_GAINED', 'Acceleration gained');
define('_WEBO_DASHBOARD_SPEED_SAVINGS', 'Savings');
define('_WEBO_DASHBOARD_SPEED_NODATA', 'No data');

/* Tools pages */
define('_WEBO_TOOLS_GZIP', 'Static Gzip');
define('_WEBO_TOOLS_IMAGE', 'Image Optimization');

/* Dashboard order block */
define('_WEBO_DASHBOARD_HELP', 'Order qualified help');
define('_WEBO_DASHBOARD_HELP1', 'Any troubles with WEBO Site SpeedUp configuration?');
define('_WEBO_DASHBOARD_HELP2', 'Our engineers can help to install and tune WEBO Site SpeedUp for your website.');
define('_WEBO_DASHBOARD_SEND', 'Send request');

/* Cache page */
define('_WEBO_CACHE_EMPTY', 'Cache is empty');
define('_WEBO_CACHE_TOTAL', 'Total size of all cache files');
define('_WEBO_CACHE_FILENAME', 'File name');
define('_WEBO_CACHE_TYPE', 'Type');
define('_WEBO_CACHE_BROWSER', 'Browser');
define('_WEBO_CACHE_FILTER', 'Filter');
define('_WEBO_CACHE_EXT', 'By extension');
define('_WEBO_CACHE_ALL', 'All files');

/* Options page */
define('_WEBO_OPTIONS_APPLY', 'Apply');

/* Version comparison */
define('_WEBO_SPLASH2_COMPARISON', 'Demo version limitations');
define('_WEBO_SPLASH2_COMPARISON_TITLE', 'Features and technologies');
define('_WEBO_SPLASH2_COMPARISON_DEMO', 'Community');
define('_WEBO_SPLASH2_COMPARISON_LITE', 'Lite');
define('_WEBO_SPLASH2_COMPARISON_FULL', 'Premium');
define('_WEBO_SPLASH2_COMPARISON_VERSION', 'Edition');
define('_WEBO_SPLASH2_COMPARISON_SUPPORT', 'Premium Support');
define('_WEBO_SPLASH2_COMPARISON_SPEEDUP', 'Speedup');
define('_WEBO_SPLASH2_COMPARISON_CPU', 'CPU overhead');
define('_WEBO_SPLASH2_COMPARISON_ANDMORE', 'and more');
define('_WEBO_SPLASH2_COMPARISON_CPU_MS', 'ms');
define('_WEBO_SPLASH2_COMPARISON_UPTO', 'up to');
define('_WEBO_SPLASH2_COMPARISON_UPTO2', 'up to');
define('_WEBO_SPLASH2_COMPARISON_TRAFFIC', 'less traffic');
define('_WEBO_SPLASH2_COMPARISON_LOAD', 'CPU load');
define('_WEBO_SPLASH2_COMPARISON_SAVED', 'CPU saved');
define('_WEBO_SPLASH2_COMPARISON_REQUESTS', 'HTTP requests');
define('_WEBO_SPLASH2_COMPARISON_ACCELERATION', 'extra website speedup');
define('_WEBO_SPLASH2_COMPARISON_NOTINCLUDED', 'not included');
define('_WEBO_SPLASH2_COMPARISON_ALLBENEFITS', 'All benefits');
define('_WEBO_SPLASH2_COMPARISON_PRICE', 'Price');
define('_WEBO_SPLASH2_COMPARISON_FREE', 'free');
define('_WEBO_SPLASH2_COMPARISON_LITEPRICE', '$19.99');
define('_WEBO_SPLASH2_COMPARISON_FULLPRICE', '$99');
define('_WEBO_SPLASH2_COMPARISON_UPDATE', 'Updates');

/* About */
define('_WEBO_ABOUT_TITLE', 'About WEBO Site SpeedUp');
define('_WEBO_ABOUT_ABOUT', 'About Product');
define('_WEBO_ABOUT_SUPPORT', 'Useful Info');
define('_WEBO_ABOUT_SUPPORT_INSTALLING', 'Installing issues');
define('_WEBO_ABOUT_SUPPORT_CLIENT', 'Client side issues');
define('_WEBO_ABOUT_SUPPORT_SERVER', 'Server side issues');
define('_WEBO_ABOUT_FEATURES', 'Features');
define('_WEBO_ABOUT_BENEFITS', 'Benefits');
define('_WEBO_ABOUT_REQUIREMENTS', 'System requirements');
define('_WEBO_ABOUT_BUZZ', 'Testimonials');
define('_WEBO_ABOUT_SENDMESSAGE', 'Send a message');
define('_WEBO_ABOUT_EMAIL', 'E-mail to answer');
define('_WEBO_ABOUT_ENTEREMAIL', 'Enter your e-mail where an answer must be send');
define('_WEBO_ABOUT_MESSAGE', 'Your message');
define('_WEBO_ABOUT_ENTEREMESSAGE', 'Enter your message');
define('_WEBO_ABOUT_SEND', 'Send');
define('_WEBO_ABOUT_SUCCESS', 'Your message has been sent');
define('_WEBO_ABOUT_TEXT', '<p class="wssI0"><strong>WEBO Site SpeedUp</strong> product has been developed since March, 2009. It\'s an automated solution to speedup website load speed. It combines a lot of time-proven solutions and cutting-edge technologies to achieve exceptional client side performance for you website. All rights for <strong>WEBO Site SpeedUp</strong> belong to <a href="http://www.web-optimizer.us/about/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">WEBO Software</a> company. It\'s a worldwide leader in client side performance solutions development. The last company news <a href="http://blog.web-optimizer.us/">are published in official blog</a>.</p><p class="wssI0">You can also participate in development or testing to make this product better. For this purpose please contact us <a href="http://www.web-optimizer.us/about/contacts.html?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">using this information</a> or the form below. We will be glad to receive a message from you.</p><p class="wssI0">You can also support product with <a href="http://twitter.com/wboptimizer">Twitter</a>, <a href="http://www.facebook.com/pages/Web-Optimizer/183974322020">Facebook</a>, <a href="http://extensions.joomla.org/extensions/site-management/cache/10152">Joomla! Extensions Directory</a> or <a href="http://wordpress.org/extend/plugins/web-optimizer/">Wordpress website</a>.</p>');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_SAVED', 'Your configuration options have been successfully saved.');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Required changes');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'You website based on ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ' has been patched. You can <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">check the result here</a>.');
define('_WEBO_SPLASH3_ADD', 'Now you <a href="#modify">should add the WEBO Site SpeedUp code</a> to your own PHP pages (');
define('_WEBO_SPLASH3_ADD_', '). This is made a lot easier if you have one PHP file that serves every page in your site, so you need to change only it.');
define('_WEBO_SPLASH3_MODIFY', 'How to modify your PHP file(s):');
define('_WEBO_SPLASH3_TOFILE', 'To the file');
define('_WEBO_SPLASH3_TOFILE2', 'To the very beginning of the file');
define('_WEBO_SPLASH3_TOFILE3', 'To the end of the file');
define('_WEBO_SPLASH3_AFTERSTRING', 'after the string');
define('_WEBO_SPLASH3_ADD2', 'add');
define('_WEBO_SPLASH3_CANTWRITE', 'Unable to write to the ');
define('_WEBO_SPLASH3_CANTWRITE2', ' directory you specified. Please make sure the directory exists and is writable.');
define('_WEBO_SPLASH3_CANTWRITE3', 'You can usually do this from your FTP client. Just navigate to the directory, right click and look for a Properties or CHMOD option.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Can\'t write to file ');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Please make sure that the root of your website is readable and writable for your web server process.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', 'Make CHMOD 775 or CHMOD 777 for it, or create readable and writable <code>.htaccess</code> there, or CHMOD current <code>.htaccess</code> to 664 or 777.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Please make sure that the root of your website is writable for your web server process or there is a writable <code>.htaccess</code> file.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Make CHMOD 775 or CHMOD 777 for it, or create writable <code>.htaccess</code> there, or CHMOD current <code>.htaccess</code> to 664 or 777.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'Please sure that you have installed WEBO Site SpeedUp into');
define('_WEBO_SPLASH3_CONFSAVED', 'Configuration saved');
define('_WEBO_SPLASH3_CONFIGERROR', 'Unable to open the config file for writing. Please change the <code>config.webo.php</code> file to make it writable.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'You can usually do this from your FTP client. Just navigate to <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , right click the file, and look for a Properties or CHMOD option. Set to 775, 777, or "write"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'Once you have done so, please refresh this page.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'Config file does not exist. Please download the full script from <a href="http://code.google.com/p/web-optimizator/downloads/list?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');

/* create .gz versions of css/js file */
define('_WEBO_GZIP_INSTALLED', 'You can create <code>.gz</code> versions of all CSS and JS files and some more file types (for static gzip usage). For this purpose please enter intitial directory. It will be scanned recursively for required files, current <code>.gz</code> versions of files will be refreshed if it\'s required.');
define('_WEBO_GZIP_INSTALLED2', 'After gzipping mtime of compressed file is set to be equal to modification time (mtime) of the initial file. During second-time compression every gzipped file mtime is checked with initial (source) file mtime. If they differ this file is compressed once more.');
define('_WEBO_GZIP_RESULTS', 'Gzip results:');
define('_WEBO_GZIP_ENTERDIRECTORY', 'Enter initial directory');
define('_WEBO_GZIP_DIRECTORY', 'Directory');
define('_WEBO_GZIP_RECURSIVE', 'Include subdirectories');
define('_WEBO_GZIP_ENTERRECURSIVE', 'Find / gzip files recursively');
define('_WEBO_GZIP_COMPRESS', 'Compress files');
define('_WEBO_GZIP_FIND', 'Find files');
define('_WEBO_GZIP_WAIT', 'Please wait. Searching for files');
define('_WEBO_GZIP_RELATIVE', 'Relative file path');
define('_WEBO_GZIP_SIZE', 'Size');
define('_WEBO_GZIP_MTIME', 'Modification time');
define('_WEBO_GZIP_NOTCHANGED', 'not changed');
define('_WEBO_GZIP_INITIAL_TOTAL', 'Initial files size');
define('_WEBO_GZIP_FINAL_TOTAL', 'Compressed files size');
define('_WEBO_GZIP_SAVINGS', 'Total savings');
define('_WEBO_GZIP_INITIAL', 'Initial size');
define('_WEBO_GZIP_FINAL', 'Savings');
define('_WEBO_GZIP_PROCESSING', 'Processing image');
define('_WEBO_GZIP_OUTOF', 'out of');
define('_WEBO_GZIP_OPTIMIZATION', 'Optimization in action. Please wait');

/* Image optimization */
define('_WEBO_IMAGE_INSTALLED', 'You can minify images on your website (without losses in quality). For this purpose please enter intitial directory. It will be scanned recursively for required files, current <code>.backup</code> versions of files will be refreshed if it\'s required.');
define('_WEBO_IMAGE_INSTALLED2', 'There are backup (<code>.backup</code>) version of all images are being createed during optimization process. In the future you can roll back all changes with these backup versions. To optimize images <a href="http://smush.it/" rel="nofollow" class="wssJ">smush.it</a> (<a href="http://info.yahoo.com/legal/us/yahoo/smush_it/smush_it-4378.html" rel="nofollow" class="wssJ">terms of use</a>) service is used. GIF files are replaced with PNG ones if latter are smaller.');
?>