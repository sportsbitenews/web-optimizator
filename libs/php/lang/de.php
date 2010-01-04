<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Enth&auml;lt alle DE Lokalisationkonstanten
 * Danke f&uuml;r Joerg Schumacher
 *
 **/

/* general layout */
define('_WEBO_CHARSET', 'utf-8');
define('_WEBO_GENERAL_TITLE', 'WEBO Site SpeedUp Konfiguration');
define('_WEBO_GENERAL_FOOTER', 'Schneller als ein Blitz!');
define('_WEBO_GENERAL_BUYNOW', '<a href="https://secure.plimus.com/jsp/buynow.jsp?contractId=2586666&amp;currency=USD" class="wssJ" title="WEBO Site SpeedUp Premium Edition">Kaufen</a>');
define('_WEBO_GENERAL_BUYNOWLITE', '<a href="https://secure.plimus.com/jsp/buynow.jsp?contractId=2597306&amp;currency=USD" class="wssJ" title="WEBO Site SpeedUp Lite Edition">Kaufen</a>');
define('_WEBO_GENERAL_IMAGE', '<img src="http://web-optimizator.googlecode.com/svn/trunk/images/web.optimizer.logo.small.png" alt="WEBO Site SpeedUp" title="WEBO Site SpeedUp" width="151" height="150"/>');
define('_WEBO_GENERAL_BUY', 'Kaufen');
define('_WEBO_GENERAL_PREMIUM', 'Premium');
define('_WEBO_GENERAL_EDITION', 'Ausgabe');

/* lang menu */
define('_WEBO_GENERAL_LANGUAGE', 'Choose language');
define('_WEBO_GENERAL_ru', 'Русский');
define('_WEBO_GENERAL_de', 'Deutsch');
define('_WEBO_GENERAL_es', 'Español');
define('_WEBO_GENERAL_ua', 'Українська');
define('_WEBO_GENERAL_en', 'English');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Hmmm..., wir haben ein Problem');
define('_WEBO_ERROR_ERROR', 'Oopps! Etwas ist schief gegangen');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Authorization');
define('_WEBO_LOGIN_LOGIN', 'Login');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>Achtung:</strong> Kann keine Ergebnisse der T&auml;tigkeit von WEBO Site SpeedUp auf Ihret Website finden. Pr&uuml;fen Sie das Vorhandensein der Aufrufe in den Quelldateien Ihres Websystems oder installieren Sie WEBO Site SpeedUp noch einmal.');
define('_WEBO_LOGIN_EFFICIENCY', 'Optimierungsergebnisse pro Hit:<br/>gespart');
define('_WEBO_LOGIN_EFFICIENCY_KB', 'Kb');
define('_WEBO_LOGIN_EFFICIENCY_S', 'S');
define('_WEBO_LOGIN_USERNAME', 'First and last name');
define('_WEBO_LOGIN_ENTERLOGIN', 'This information will be used mainly in e-mail messages.');
define('_WEBO_LOGIN_PASSWORD', 'Kennwort');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Kennwort eintragen');
define('_WEBO_LOGIN_PASSWORD_CONFIRM', 'Password confirmation');
define('_WEBO_LOGIN_ENTERPASSWORDCONFIRM', 'Confirm the password');
define('_WEBO_LOGIN_LICENSE', 'Lizenz-Schl&uuml;ssel');
define('_WEBO_LOGIN_ENTERLICENSE', 'Geben Sie Lizenz-Schl&uuml;ssel');
define('_WEBO_SPLAHS1_PROTECTED', 'Gesch&uuml;tzter Modus');
define('_WEBO_SPLAHS1_PROTECTED2', 'WEBO Site SpeedUp Installation ist sicher gesch&uuml;tzt. Sie k&ouml;nnen erneut konfigurieren.');
define('_WEBO_LOGIN_EMAIL', 'E-mail');
define('_WEBO_LOGIN_EMAIL_HELP', 'This e-mail address will be used only for information about urgent updates, greetings, and special offers.');
define('_WEBO_LOGIN_ENTEREMAIL', 'Enter your e-mail');
define('_WEBO_LOGIN_EMAILNOTICE', 'This e-mail address will be used only for information about urgent updates, greetings, and special offers.');
define('_WEBO_LOGIN_ALLOW', 'Allow to use my data about optimization results');
define('_WEBO_LOGIN_ALLOW_HELP', 'Statistical information about website acceleration will be sent to WEBO Software servers. This information won\'t be published and will be used only to improve WEBO Site SpeedUp efficiency. No private data will be sent.');
define('_WEBO_LOGIN_SUCCESS', 'All settings have been successfully saved');
define('_WEBO_LOGIN_ENTEROLDPASSWORD', 'Enter the current password');
define('_WEBO_LOGIN_PASSWORDSDIFFER', 'Passwords don\'t match');
define('_WEBO_LOGIN_LICENSEAGREEMENT', 'I have read and agreed with the ');
define('_WEBO_LOGIN_LICENSEAGREEMENT2', 'license agreement');
define('_WEBO_LOGIN_CONFIRMLICENSEAGREEMENT', 'Confirm that you have read and agreed with the license agreement');

/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Update');
define('_WEBO_LOGIN_VERSION', 'Version');
define('_WEBO_UPGRADE_FILE', 'Updating file');

/* Uninstall */
define('_WEBO_LOGIN_UNINSTALLME', 'WEBO Site SpeedUp deinstallieren');
define('_WEBO_LOGIN_FAILED', 'Login fehlgeschlagen');
define('_WEBO_UNINSTALL_MESSAGE', 'WEBO Site SpeedUp uninstall reason');
define('_WEBO_UNINSTALL_SUCCESS', 'WEBO Site SpeedUp was successfully uninstalled.');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Installation');
define('_WEBO_NEW_ENTER', 'Enter details');
define('_WEBO_NEW_PROTECT', '<p class="wssI">During installation root .htaccess file and some other source files of your web system will be changed so please make sure they are writable (each changed file will be automatically backed up).</p><p class="wssI">If no valid license key will be entered, WEBO Site SpeedUp <a href="http://www.web-optimizer.us/ru/web-optimizer/comparison.html">Community edition</a> will be installed.</p><p class="wssI">When installed, WEBO Site SpeedUp will be automatically configured based on current server capabilites. You can review and change any options later using this administative interface.</p><p class="wssI">More information on WEBO Site SpeedUp installing and configuring you can get from <a href="http://code.google.com/p/web-optimizator/wiki/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">online documentation</a>.</p>');
define('_WEBO_NEW_NOSCRIPT', 'F&uuml;r die korrekte Arbeit muss JavaScript aktiviert sein!');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Deinstall');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'WEBO Site SpeedUp Deinstallation');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Vielen Dank f&uuml;r den Einsatz von WEBO Site SpeedUp. Please help us to improve our product and tell us the uninstall reason.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Also feel free to visit <a href="http://www.web-optimizer.us/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">our company website</a> and submit any <a href="http://code.google.com/p/web-optimizator/issues/list?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">related issues</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Jetzt k&ouml;nnen Sie Zur&uuml;kkehrenzu <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">Ihrer Website</a>.');
define('_WEBO_SPLASH1_UNINSTALL_SEND', 'Send message');
define('_WEBO_SPLASH1_NEXT', 'Install');
define('_WEBO_SPLASH1_BACK', 'Zur&uuml;ck');

/* Change password */
define('_WEBO_PASSWORD_OLD', 'Altes Kennwort');
define('_WEBO_PASSWORD_ENTERPASSWORD', 'Geben Sie altes Kennwort');
define('_WEBO_PASSWORD_NEW', 'Neues Kennwort');
define('_WEBO_PASSWORD_ENTERPASSWORDNEW', 'Geben Sie neues Kennwort');
define('_WEBO_PASSWORD_CONFIRM', 'Neues Kennwort Best&auml;tigung');
define('_WEBO_PASSWORD_ENTERPASSWORDCONFIRM', 'Geben Sie Best&auml;tigung f&uuml;r neues Kennwort');
define('_WEBO_SPLASH1_SAVE', 'Sichern');
define('_WEBO_PASSWORD_DIFFERENT', 'Neues Kennwort und die Best&auml;tigung sind verschiedene');
define('_WEBO_PASSWORD_EMPTY', 'Neues Kennwort ist nicht gesetzt!');
define('_WEBO_PASSWORD_SUCCESSFULL', 'Kennwort wurde ge&auml;ndert');

/* Second splash -- set options */
define('_WEBO_SPLASH2_CONTROLPANEL', 'Control Panel');
define('_WEBO_SPLASH2_OPTIONS', 'Optionen');
define('_WEBO_SPLASH2_UNABLE', '&Ouml;ffnen nicht m&ouml;glich');
define('_WEBO_SPLASH2_MAKESURE', ' .Stellen Sie sicher, dass das Verzeichnis existiert und das es das Root-Verzeichnis ist.');

/* WEBO Site SpeedUp options */
define('_WEBO_general', 'General options');
define('_WEBO_combinecss', 'Combine CSS');
define('_WEBO_combine_js', 'Combine JavaScript');
define('_WEBO_minify', 'Minify');
define('_WEBO_gzip', 'Gzip');
define('_WEBO_clientside', 'Client side cache');
define('_WEBO_htaccess', '.htaccess');
define('_WEBO_backlink', 'Backlink');
define('_WEBO_performance', 'Performance');
define('_WEBO_data_uri', 'data:URI');
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

define('_WEBO_combine_css', 'CSS-Dateien kombinieren');
define('_WEBO_combine_css_HELP', 'Depending on this option CSS won\'t be combined, or there will be combined only CSS in &lt;head&gt; tag, or there will be combined the whole CSS on the page. All combined CSS code will be minified.');
define('_WEBO_combine_css1', 'Don\'t combine CSS files');
define('_WEBO_combine_css2', 'Combine only CSS included in tag <code>&lt;head&gt;</code>');
define('_WEBO_combine_css3', 'Combine all CSS in tags <code>&lt;head&gt;</code> and <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_css', 'Vermischung von externem Styles aktivieren');
define('_WEBO_external_scripts_css_HELP', 'There will be combined files located on all hosts. Otherwise WEBO Site SpeedUp will combine only files located on the same host that initial web page.');
define('_WEBO_external_scripts_css_inline', 'Vermischung von Inline Styles aktivieren');
define('_WEBO_external_scripts_css_inline_HELP', 'There will be combined all CSS included with the help of &lt;style&gt; and &lt;link&gt; tags. Otherwise WEBO Site SpeedUp will combine files included with &lt;link&gt; tag.');
define('_WEBO_minify_css_file', 'Combined CSS file name');
define('_WEBO_minify_css_file_HELP', 'File name can include only latin letters, numbers, hyphens, underlines, or dots. All the other symbols will be excluded. This file name may be automatically expanded with special extension to manage client side cache in browsers.');
define('_WEBO_external_scripts_additional_list', 'CSS-Dateien vom Vermischen ausschlie&szlig;en');
define('_WEBO_external_scripts_additional_list_HELP', 'Defined files won\'t be included into combined CSS file. You need to define only file names, not absolute paths to them.');
define('_WEBO_external_scripts_include_code', 'Include CSS code to all files');
define('_WEBO_external_scripts_include_code_HELP', 'Entered CSS code will be added to the end of each combined CSS file. This field allows you to define additional styles for website working under WEBO Site SpeedUp.');

define('_WEBO_minify_javascript', 'JavaScript-Dateien kombinieren');
define('_WEBO_minify_javascript_HELP', 'Depending on this option JavaScript won\'t be combined, or there will be combined only JavaScript in &lt;head&gt; tag, or there will be combined the whole JavaScript on the page.');
define('_WEBO_minify_javascript1', 'Don\'t combine JavaScript files');
define('_WEBO_minify_javascript2', 'Combine only JavaScript included in tag <code>&lt;head&gt;</code>');
define('_WEBO_minify_javascript3', 'Combine all JavaScript in tags <code>&lt;head&gt;</code> and <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_inline', 'Vermischung von Inline JavaScript aktivieren');
define('_WEBO_external_scripts_inline_HELP', 'There will be combined both inline code in tags &lt;script&gt; and JavaScript code from external files. Otherwise there will be combined only JavaScript included via &lt;script src=&quot;...&quot;&gt;.');
define('_WEBO_external_scripts_on', 'Vermischung von externem JavaScript aktivieren');
define('_WEBO_external_scripts_on_HELP', 'There will be combined files located on all hosts. Otherwise WEBO Site SpeedUp will combine only files located on the same host that initial web page.');
define('_WEBO_minify_javascript_file', 'Combined JavaScript file name');
define('_WEBO_minify_javascript_file_HELP', 'File name can include only latin letters, numbers, hyphens, underlines, or dots. All the other symbols will be excluded. This file name may be automatically expanded with special extension to manage client side cache in browsers.');
define('_WEBO_external_scripts_ignore_list', 'JavaScript-Dateien vom Vermischen ausschlie&szlig;en');
define('_WEBO_external_scripts_ignore_list_HELP', 'Defined files won\'t be included into combined JavaScript file. You need to define only file names, not absolute paths to them.');
define('_WEBO_external_scripts_head_end', 'Verschiebung aller vermischten Scripts nach <code>&lt;/head&gt;</code> erzwingen');
define('_WEBO_external_scripts_head_end_HELP', 'Combined JavaScript file call will be moved to closing tag &lt;/head&gt;.');

define('_WEBO_minify_css', 'CSS-Dateien minimieren');
define('_WEBO_minify_css_HELP', 'All excessive spaces, tabs, line breaks, and comments will be deleted from combined CSS file.');
define('_WEBO_minify_js', 'JavaScript-Dateien minimieren');
define('_WEBO_minify_js_HELP', 'All excessive spaces, tabs, line breaks, and comments will be deleted from combined JavaScript file. Library choice affects minify algorithm and compression rate. Maximum compression can be achieved with any of these libraries depending on initial conditions.');
define('_WEBO_minify_js1', 'Don\'t minify JavaScript');
define('_WEBO_minify_js2', 'Mit JSMin minimieren');
define('_WEBO_minify_js3', 'Mit YUI Compressor mimimieren');
define('_WEBO_minify_js4', 'Mit Packer minimieren');
define('_WEBO_minify_page', 'HTML minimieren');
define('_WEBO_minify_page_HELP', 'HTML code will be cleaned from double spaces, double line breaks, empty symbols at the beginning of every string and spaces before tag ends. Tags &lt;pre&gt;, &lt;textarea&gt;, &lt;script&gt; will be excluded from all actions .');
define('_WEBO_minify_html_comments', 'HTML-Kommentare entfernen');
define('_WEBO_minify_html_comments_HELP', 'All HTML comments will be removed. This can break conditional comments and some JavaScript counters.');
define('_WEBO_minify_html_one_string', 'HTML auf einen String verkleinern');
define('_WEBO_minify_html_one_string_HELP', 'HTML code of result web page will be compressed to one string. This can help with removing extra spaces and line breaks. But this is CPU intensive and should be used carefully.');

define('_WEBO_unobtrusive_on', 'Unauff&auml;lliges JavaScript aktivieren');
define('_WEBO_unobtrusive_on_HELP', 'Every web page load will be accelerated with unobtrusive JavaScript according to options in this section.');
define('_WEBO_unobtrusive_body', 'JavaScript Datei vor <code>&lt;/body&gt;</code> einflie&szlig;en lassen');
define('_WEBO_unobtrusive_body_HELP', 'Combined JavaScript files will be moved to closing &lt;/body&gt; tag. This option has more priority than &quot;Force moving combined script to &lt;/head&gt;&quot;.');
define('_WEBO_unobtrusive_all', 'Move all JavaScript code to <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_all_HELP', 'All JavaScript calls will be moved to closing &lt;/body&gt; tag according to their initial order on the web page.');
define('_WEBO_unobtrusive_informers', 'JavaScript Informer Aufrufe vor <code>&lt;/body&gt;</code> verschieben');
define('_WEBO_unobtrusive_informers_HELP', 'The whole JavaScript code from widgets calls will be moved to &lt;/body&gt;.');
define('_WEBO_unobtrusive_counters', 'Counter Aufrufe vor <code>&lt;/body&gt;</code> verschieben');
define('_WEBO_unobtrusive_counters_HELP', 'The whole JavaScript code from counters calls will be moved to &lt;/body&gt;.');
define('_WEBO_unobtrusive_ads', 'Werbung vor <code>&lt;/body&gt;</code> verschieben');
define('_WEBO_unobtrusive_ads_HELP', 'The whole JavaScript code from ads (context and banners) calls will be moved to &lt;/body&gt;.');
define('_WEBO_unobtrusive_iframes', 'Make iframes\' load delayed');
define('_WEBO_unobtrusive_iframes_HELP', 'The whole HTML code from iframes calls will be moved to &lt;/body&gt;.');

define('_WEBO_gzip_css', 'Gzip CSS');
define('_WEBO_gzip_css_HELP', 'All CSS files will be compressed via gzip.');
define('_WEBO_gzip_javascript', 'Gzip JavaScript');
define('_WEBO_gzip_javascript_HELP', 'All JavaScript files will be compressed via gzip.');
define('_WEBO_gzip_fonts', 'Gzip Fonts');
define('_WEBO_gzip_fonts_HELP', 'All fonts files (.eot, .ttf, .otf etc) will be compressed via gzip.');
define('_WEBO_gzip_page', 'Gzip HTML');
define('_WEBO_gzip_page_HELP', 'All HTML files (.eot, .ttf, .otf etc) will be compressed via gzip.');
define('_WEBO_gzip_noie', 'Use <code>deflate</code> instead of <code>gzip</code> for IE6/7');
define('_WEBO_gzip_noie_HELP', 'In some cases gzip in IE6 and IE7 browsers can lead to incorrect page view. This option allows you to force alternative compression technique usage for these browsers.');
define('_WEBO_gzip_cookie', 'M&ouml;glichkeit f&uuml;r Gzip via Cokkies pr&uuml;fen');
define('_WEBO_gzip_cookie_HELP', 'WEBO Site SpeedUp can perform additional check for gzip support in browsers. If it\'s been defined all data will be compressed regardless Accept-Encoding header.');

define('_WEBO_far_future_expires_javascript', 'JavaScript zwischenspeichern');
define('_WEBO_far_future_expires_javascript_HELP', 'All JavaScript files will have caching headers set to far future.');
define('_WEBO_far_future_expires_css', 'CSS zwischenspeichern');
define('_WEBO_far_future_expires_css_HELP', 'All CSS files will have caching headers set to far future.');
define('_WEBO_far_future_expires_images', 'Bilder zwischenspeichern');
define('_WEBO_far_future_expires_images_HELP', 'All images will have caching headers set to far future.');
define('_WEBO_far_future_expires_fonts', 'Fonts zwischenspeichern');
define('_WEBO_far_future_expires_fonts_HELP', 'All fonts files will have caching headers set to far future. This option is applied via .htaccess.');
define('_WEBO_far_future_expires_video', 'Video-Dateien zwischenspeichern');
define('_WEBO_far_future_expires_video_HELP', 'All video files will have caching headers set to far future. This option is applied via .htaccess.');
define('_WEBO_far_future_expires_static', 'Statische Assets zwischenspeichern');
define('_WEBO_far_future_expires_static_HELP', 'All other static files will have caching headers set to far future. This option is applied via .htaccess.');
define('_WEBO_far_future_expires_html', 'HTML zwischenspeichern');
define('_WEBO_far_future_expires_html_HELP', 'All images will have caching headers. Cache timeout will be set according to option &quot;Default timeout to cache HTML&quot;.');
define('_WEBO_far_future_expires_html_timeout', 'Standard-Timeout f&uuml;r das Cachen von HTML, in Sekunden');
define('_WEBO_far_future_expires_html_timeout_HELP', 'Time to cache HTML files. Zero value means zero timeout.');
define('_WEBO_far_future_expires_external', 'Cache external files');
define('_WEBO_far_future_expires_external_HELP', 'External files called on web page will be cached and served fro mthe same host that web page itself.');

define('_WEBO_html_cache_enabled', 'Generierte HTML-Dateien zwischenspeichern');
define('_WEBO_html_cache_enabled_HELP', 'HTML pages will be cached for timeout set in option &quot;Default HTML cache timeout&quot;. This option allows you to significantly speedup web pages load with long generation time. But this is reasonable only for static pages without dynamic content.');
define('_WEBO_html_cache_timeout', 'Standard-Timeout, in Sekunden');
define('_WEBO_html_cache_timeout_HELP', 'After this time all cached HTML pages will be recreated on server side.');
define('_WEBO_html_cache_flush_only', 'Nur das fr&uuml;here Sp&uuml;len von Inhalt aktivieren');
define('_WEBO_html_cache_flush_only_HELP', 'HTML cache will contain not the whole web page but the first n bytes of it (set in option &quot;Flush content size&raquo;). And this amount of data will be flushed to browser earlier than the rest web page content. So browser will receive calls to required resources earlier and don\'t wait the rest of the page to start their load.');
define('_WEBO_html_cache_flush_size', 'Gr&ouml;&szlig;e des zu sp&uuml;lenden Inhalts (in Bytes)');
define('_WEBO_html_cache_flush_size_HELP', 'Size of cached flushed part of a web page. It can be fixed (to avoid any issues with browsers or network connection). Empty (or zero) value leads to flush the whole web page content before closing &lt;/head&gt; tag.');
define('_WEBO_html_cache_ignore_list', 'Liste der Teile von URLs, die beim Zwischenspeichern ignoriert werden');
define('_WEBO_html_cache_ignore_list_HELP', 'Ofter server side caching can\'t be used for pages with dynamic content. For example user account pages, statistic pages, and more. This option allows you to set parts of URL (masks) to exclude pages from server side caching.');
define('_WEBO_html_cache_allowed_list', 'Liste der USER AGENTS (Robots), die zwischengespeichert werden');
define('_WEBO_html_cache_allowed_list_HELP', 'This option allows you to set a list of USER AGENTS which will receive only cached HTML pages. For example caching HTML pages for all search engines can reduce server side load.');
define('_WEBO_html_cache_additional_list', 'List of COOKIE to exclude from server side caching (separated by space)');
define('_WEBO_html_cache_ignore_list_HELP', 'You can also skip server side caching for user who have one of the COOKIE from this list. This can be useful for authorized users or during the work with shopping cart.');

define('_WEBO_performance_mtime', 'mtime-Datei (und Inhalt) nicht pr&uuml;fen');
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

define('_WEBO_footer_text', 'Link auf WEBO Site SpeedUp hinzuf&uuml;gen');
define('_WEBO_footer_text_HELP', 'WEBO Site SpeedUp link is required in Community Edition and can be removed in any paid edition.');
define('_WEBO_footer_image', 'WEBO Site SpeedUp-Bild hinzuf&uuml;gen');
define('_WEBO_footer_image_HELP', 'File name with WEBO Site SpeedUp logo. All allowed files are located in: &lt;WEBO Site SpeedUp path&gt;/web-optimizer/images/. If this option is empty a text defined in &quot;Text for backlink&quot; option will be shown.');
define('_WEBO_footer_link', 'Text for backlink');
define('_WEBO_footer_link_HELP', 'If option &quot;Add a WEBO Site SpeedUp image&quot; is disabled this text will be shown in a link. Otherwise is will used as a title for image.');
define('_WEBO_footer_css_code', 'Styles for backlink placement');
define('_WEBO_footer_css_code_HELP', 'These styles will be applied for WEBO Site SpeedUp link. You can define link placement, its color, background, size, etc.');
define('_WEBO_footer_spot', 'Add <code>&lt;--WSS--&gt;</code> to <code>body</code>');
define('_WEBO_footer_spot_HELP', 'Attribute lang=&quot;wo&quot; existence indicates that WEBO Site SpeedUp successfully parses this page It\'s used in internal algorithms.');

define('_WEBO_data_uris_on', '<code>data:URI</code> anwenden');
define('_WEBO_data_uris_on_HELP', 'Background images will be converted to base64 format and included directly into CSS files for all browsers which support data:URI.');
define('_WEBO_data_uris_mhtml', '<code>mhtml</code> anwenden');
define('_WEBO_data_uris_mhtml_HELP', 'Background images will be converted to mhtml format and included directly into CSS files for all versions of Internet Explorer which don\'t support data:URI.');
define('_WEBO_data_uris_separate', 'Separate images from CSS code');
define('_WEBO_data_uris_separate_HELP', 'Combined CSS code and images in base64 and mtml formats will be stored in different files. This should increase cachebility.');
define('_WEBO_data_uris_domloaded', 'Load images on <code>DOMready</code> event');
define('_WEBO_data_uris_domloaded_HELP', 'Background images\' load will be delayed to DOMReady event. This will increase initial web page render speed in browsers.');
define('_WEBO_data_uris_size', 'Maximale Bildgr&ouml;szlig;e f&uuml;r <code>data:URI</code> (in Bytes)');
define('_WEBO_data_uris_size_HELP', 'Images which size is greater than given number won\'t be converted to base64 format. No value or zero value means no limit.');
define('_WEBO_data_uris_mhtml_size', 'Maximale Bildgr&ouml;szlig;e f&uuml;r <code>mhtml</code> (in Bytes)');
define('_WEBO_data_uris_mhtml_size_HELP', 'Images which size is greater than given number won\'t be converted to mhtml format. No value or zero value means no limit.');
define('_WEBO_data_uris_ignore_list', 'Dateien von <code>data:URI</code> ausschlie&szlig;en');
define('_WEBO_data_uris_ignore_list_HELP', 'Images listed in this option won\'t be converted to data:URI. Please provide only file names not absolute paths.');
define('_WEBO_data_uris_additional_list', 'Dateien von <code>mhtml</code> ausschlie&szlig;en');
define('_WEBO_data_uris_additional_list_HELP', 'Images listed in this option won\'t be converted to mhtml. Please provide only file names not absolute paths.');

define('_WEBO_css_sprites_enabled', 'CSS Sprites anwenden');
define('_WEBO_css_sprites_enabled_HELP', 'Background images will be combined with the help of CSS Sprites technique. Related CSS code will be safely modified.');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Images\' format');
define('_WEBO_css_sprites_truecolor_in_jpeg_HELP', 'If you choose automated format detection possibility of any side effects in CSS Sprites images will be minimal. If you choose JPEG format rate quality/size for true color images will the best but there will be no transparency.');
define('_WEBO_css_sprites_truecolor_in_jpeg1', 'Detect proper format automatically');
define('_WEBO_css_sprites_truecolor_in_jpeg2', 'Prefer JPEG format');
define('_WEBO_css_sprites_aggressive', '&quot;Aggressive&quot; Kombinationsmethode f&uuml;r CSS Sprites');
define('_WEBO_css_sprites_aggressive_HELP', 'Number of CSS Sprites images and their size will be lower but this may lead to graphical artefacts on web pages.');
define('_WEBO_css_sprites_extra_space', 'Freien Platz f&uuml;r CSS Sprites hinzuf&uuml;gen');
define('_WEBO_css_sprites_extra_space_HELP', 'Images in CSS Sprites will be rounded with free space to prevent side effects on web page scale in browsers. CSS Sprites file size will be a bit greater.');
define('_WEBO_css_sprites_no_ie6', 'IE6 ausschlie&szlig;en');
define('_WEBO_css_sprites_no_ie6_HELP', 'IE6 will receive its own CSS file without CSS Sprites.');
define('_WEBO_css_sprites_memory_limited', 'Speicherbenutzung beschr&auml;nken');
define('_WEBO_css_sprites_memory_limited_HELP', 'In case of available memory excess during CSS Sprites creation some images won\'t be included into final CSS Sprites.');
define('_WEBO_css_sprites_dimensions_limited', 'Bilder gr&ouml;&szlig;er als eine vorgegebene Zahl in einer Dimension ausschlie&szlig;en');
define('_WEBO_css_sprites_dimensions_limited_HELP', 'Images heigher or wider than defined number won\'t be included into CSS Sprites. No value or zero value means no restriction.');
define('_WEBO_css_sprites_ignore_list', 'Dateien von CSS Sprites ausschlie&szlig;en');
define('_WEBO_css_sprites_ignore_list_HELP', 'Images listed in this option won\'t be included to CSS Sprites. Please provide only file names not absolute paths.');

define('_WEBO_parallel_enabled', 'Multiple Hosts aktivieren');
define('_WEBO_parallel_enabled_HELP', 'All images called on web page will be automatically distributed through multiple hosts (mirrors). For example URL http://www.site.com/i/logo.png or /i/bg.jpg can be replaced with http://i1.site.com/i/logo.png and http://i2.site.com/i/bg.jpg in case if both hosts i1 and i2 are available and listed in option &quot;Allowed hosts&quot;.');
define('_WEBO_parallel_check', 'Verf&uuml;gbarkeit von hosts automatisch pr&uuml;fen');
define('_WEBO_parallel_check_HELP', 'Available hosts will be checked automatically for images\' existence.');
define('_WEBO_parallel_allowed_list', 'Erlaubte Hosts');
define('_WEBO_parallel_allowed_list_HELP', 'Listed hosts will be used to distribute images. Please define no more than 4 hosts.');
define('_WEBO_parallel_additional', 'Additional websites with multiple hosts (separated by space)');
define('_WEBO_parallel_additional_HELP', 'If there is several websites using images\' distribution you can use WEBO Site SpeedUp to distribute their images through all these hosts.');
define('_WEBO_parallel_additional_list', 'Hosts on these websites (separated by space)');
define('_WEBO_parallel_additional_list_HELP', 'These hosts are used to distribute images which are located on websites defined in &quot;Additional websites with multiple hosts&quot; option.');

define('_WEBO_htaccess_enabled', '<code>.htaccess</code> aktivieren');
define('_WEBO_htaccess_enabled_HELP', 'This option will create (or modify) .htaccess file in website root directory. Also it creates backup version of this file. .htaccess file content depends on the other options in this group.');
define('_WEBO_htaccess_mod_deflate', '<code>mod_deflate</code> verwenden');
define('_WEBO_htaccess_mod_deflate_HELP', 'This is required for dynamic gzip compression. It\'s an alternative for mod_gzip.');
define('_WEBO_htaccess_mod_gzip', '<code>mod_gzip</code> verwenden');
define('_WEBO_htaccess_mod_gzip_HELP', 'This is required for dynamic gzip compression. It\'s an alternative for mod_deflate.');
define('_WEBO_htaccess_mod_expires', '<code>mod_expires</code> verwenden');
define('_WEBO_htaccess_mod_expires_HELP', 'This is required for client side cache headers set.');
define('_WEBO_htaccess_mod_headers', '<code>mod_headers</code> verwenden');
define('_WEBO_htaccess_mod_headers_HELP', 'This is required to support proxy servers and old browsers with correct headers.');
define('_WEBO_htaccess_mod_setenvif', '<code>mod_setenvif</code> verwenden');
define('_WEBO_htaccess_mod_setenvif_HELP', 'This is required to support proxy servers and old browsers with correct headers.');
define('_WEBO_htaccess_mod_mime', '<code>mod_mime</code> verwenden');
define('_WEBO_htaccess_mod_mime_HELP', 'This is required for static gzip.');
define('_WEBO_htaccess_mod_rewrite', '<code>mod_rewrite</code> verwenden');
define('_WEBO_htaccess_mod_rewrite_HELP', 'This is required for static gzip or forced caching.');
define('_WEBO_htaccess_local', 'Datei <code>.htaccess</code> lokal platzieren (nicht in die Dokument-Root)');
define('_WEBO_htaccess_local_HELP', '<code>.htaccess</code> file will be located in local website folder but not document root of website host.');
define('_WEBO_htaccess_access', 'WEBO Site SpeedUp Installation via <code>htpasswd</code> sch&uuml;tzen');
define('_WEBO_htaccess_access_HELP', 'This option provides additional security for WEBO Site SpeedUp installation with the help of HTTP Basic Authorization and .htaccess and .htpasswd files.');
define('_WEBO_htaccess_login', 'Login to protect WEBO Site SpeedUp with <code>.htpasswd</code>');
define('_WEBO_htaccess_login_HELP', 'To protect WEBO Site SpeedUp with .htpasswd you need to define login and password. Login is set with this option. Password is equal to WEBO Site SpeedUp installation password.');

/* Dashboard */
define('_WEBO_DASHBOARD_LOADING', 'Loading...');
define('_WEBO_SPLASH2_CONTROLPANEL_TITLE', 'Overall information about application');
define('_WEBO_SPLASH2_OPTIONS_TITLE', 'Optimization options');
define('_WEBO_DASHBOARD_SYSTEM_TITLE', 'System status and settings');
define('_WEBO_DASHBOARD_ACCOUNT_TITLE', 'User-related data');
define('_WEBO_DASHBOARD_ACCOUNT', 'Personal Data');
define('_WEBO_DASHBOARD_CACHE', 'Cache');
define('_WEBO_DASHBOARD_SYSTEM', 'System Status');
define('_WEBO_DASHBOARD_SPEED', 'Load Speed');
define('_WEBO_DASHBOARD_STATUS', 'Application Status');
define('_WEBO_DASHBOARD_NEWS', 'News');
define('_WEBO_DASHBOARD_BUZZ', 'Spread the Word!');
define('_WEBO_DASHBOARD_UPDATES', 'Updates');
define('_WEBO_DASHBOARD_RESULTS', 'Optimization Results');
define('_WEBO_DASHBOARD_TOOLS', 'Optimization Tools');
define('_WEBO_DASHBOARD_LINKS', 'Quick Links');
define('_WEBO_DASHBOARD_AVAILABLE', 'Available in Premium Edition');
define('_WEBO_DASHBOARD_ALL', 'Available Blocks');
define('_WEBO_DASHBOARD_INSTALL', 'Install');

/* Dashboard status block */
define('_WEBO_DASHBOARD_STATUS_IS', 'is');
define('_WEBO_DASHBOARD_STATUS_ACTIVE', 'active');
define('_WEBO_DASHBOARD_STATUS_LIVE', 'live&nbsp;mode');
define('_WEBO_DASHBOARD_STATUS_WORKING', 'Now you can ');
define('_WEBO_DASHBOARD_STATUS_WORKING2', 'review your website');
define('_WEBO_DASHBOARD_STATUS_WORKING3', ' or bring the application back to debug mode by clicking the &quot;Disable&quot; button.');
define('_WEBO_DASHBOARD_STATUS_NOTACTIVE', 'not active');
define('_WEBO_DASHBOARD_STATUS_DEBUG', 'debug&nbsp;mode');
define('_WEBO_DASHBOARD_STATUS_TESTING', 'You can debug the application:');
define('_WEBO_DASHBOARD_STATUS_TESTING2', 'via GET-parameter ');
define('_WEBO_DASHBOARD_STATUS_TESTING4', '<code>web_optimizer_debug</code>');
define('_WEBO_DASHBOARD_STATUS_COOKIE', 'or just ');
define('_WEBO_DASHBOARD_STATUS_COOKIE2', 'via cookie');
define('_WEBO_DASHBOARD_STATUS_TESTING3', 'Press &quot;Enable&quot; button when you are ready to bring WEBO&nbsp;Site&nbsp;SpeedUp in live mode.');
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
define('_WEBO_DASHBOARD_LINKS_WEBSITE', 'WEBO Site SpeedUp official website');
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
define('_WEBO_SYSTEM_TITLE', 'Server Status');
define('_WEBO_SYSTEM_NOPROBLEMS', 'Everything\'s shiny!');
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
define('_WEBO_SYSTEM_memory_limit', 'Low memory limit');

/* System status */
define('_WEBO_SYSTEM_STATUS', 'Status');
define('_WEBO_SYSTEM_SETTINGS', 'Settings');
define('_WEBO_SYSTEM_UPDATES', 'Updates');
define('_WEBO_SYSTEM_NOUPDATES', 'You are using the latest version of WEBO Site SpeedUp.');
define('_WEBO_SYSTEM_INSTALL', 'Install &amp; uninstall');
define('_WEBO_SYSTEM_STATUS_TITLE', 'Application status');
define('_WEBO_SYSTEM_ISSUES', 'Server status');
define('_WEBO_SYSTEM_SETTINGS_TITLE', 'Application settings');
define('_WEBO_SYSTEM_UPDATES_TITLE', 'Available updates');
define('_WEBO_SYSTEM_INSTALL_TITLE', 'Install and uninstall');
define('_WEBO_SYSTEM_INSTALLED', 'WEBO Site SpeedUp is installed for');
define('_WEBO_SYSTEM_INSTALLINFO', 'Following changes were made to files of your web system during WEBO Site SpeedUp installation.');
define('_WEBO_SYSTEM_INSTALLINFO2', 'To rollback these changes press the &quot;Uninstall&quot; button (note that all WEBO Site SpeedUp files including configuration files and all cache files and will be preserved). To restore these changes anytime press &quot;Reinstall&quot; button.');
define('_WEBO_SYSTEM_SUCCESS', 'All changes for web system source files were made successfully.');
define('_WEBO_SYSTEM_USERNAME', 'Please enter username to rectrict access to WEBO Site SpeedUp using .htaccess.');
define('_WEBO_SYSTEM_EXTERNAL_HTACCESS', 'Please enter username and password to get access to the website using HTTP Basic Authorization.');
define('_WEBO_showbeta', 'Show information about beta versions');
define('_WEBO_showbeta_HELP', 'Only stable WEBO Site SpeedUp updates are shown by default. You can enable this option to check for potentially unstable beta versions too.');

/* Dashboard options block */
define('_WEBO_DASHBOARD_OPTIONS_DISABLED', 'Disabled');

/* Dashboard speed block */
define('_WEBO_DASHBOARD_SPEED_GAINED', 'Acceleration gained');
define('_WEBO_DASHBOARD_SPEED_SAVINGS', 'Savings');
define('_WEBO_DASHBOARD_SPEED_NODATA', 'No data');

/* Tools pages */
define('_WEBO_TOOLS_GZIP', 'Static Gzip tool');
define('_WEBO_TOOLS_IMAGE', 'Image Optimization tool');

/* Dashboard order block */
define('_WEBO_DASHBOARD_HELP', 'Order qualified help');
define('_WEBO_DASHBOARD_HELP1', 'Any troubles with WEBO Site SpeedUp configuration?');
define('_WEBO_DASHBOARD_HELP2', 'Our engineers can help you to install and tune WEBO Site SpeedUp for your website.');
define('_WEBO_DASHBOARD_SEND', 'Send request');

/* Account page */
define('_WEBO_ACCOUNT_EXPIRES', 'Valid till');
define('_WEBO_ACCOUNT_LICENSEINFO', 'WEBO Site SpeedUp is licensed for an annual subscription fee. Community Edition can be used only on non-commercial websites (see <a href="http://www.web-optimizer.us/web-optimizer/questions-answers.html" class="wssJ">frequently asked questions</a> page). For commercial websites you can use one of two WEBO Site SpeedUp editions &mdash; Lite or Premium (see <a href="#wss_promo" class="wssJ">version comparison</a> page).');
define('_WEBO_ACCOUNT_LICENSEINFO2', 'License key registration is performed automatically. You just need to enter the valid key into the corresponding field and press the "Save" button. Once the license key is registred you will get information about its expiration date. If the license key is expired you can purchase WEBO Site SpeedUp license renewal.');
define('_WEBO_ACCOUNT_LICENSEINFO3', 'You can ask all questions regarding WEBO Site SpeedUp license policy using <a href="http://www.web-optimizer.us/ru/about/contacts.html" class="wssJ">our contacts</a> listed on the official website.');
define('_WEBO_ACCOUNT_INVALID', 'Enter the valid license key or leave the field blank');
define('_WEBO_ACCOUNT_SERVER_UNAVAILABLE', 'Sorry, but registration server is unavailable at the moment. Try again later');

/* Cache page */
define('_WEBO_CACHE_EMPTY', 'Cache is empty');
define('_WEBO_CACHE_TOTAL', 'Total size of all cache files');
define('_WEBO_CACHE_SELECTED', 'Total size of selected files');
define('_WEBO_CACHE_NOTHING', 'No files found according to this condition');
define('_WEBO_CACHE_FILENAME', 'File name');
define('_WEBO_CACHE_TYPE', 'Type');
define('_WEBO_CACHE_BROWSER', 'Browser');
define('_WEBO_CACHE_FILTER', 'Filter');
define('_WEBO_CACHE_EXT', 'By extension');
define('_WEBO_CACHE_ALL', 'All files');

/* Options page */
define('_WEBO_OPTIONS_APPLY', 'Apply');
define('_WEBO_OPTIONS_EDIT', 'Edit');
define('_WEBO_OPTIONS_CONFIRM', 'Are you sure to delete the configuration "');
define('_WEBO_OPTIONS_CONFIGURATION', 'Configuration');
define('_WEBO_OPTIONS_DESCRIPTION', 'Description');
define('_WEBO_OPTIONS_APPLYCONFIG', 'Apply configuration');
define('_WEBO_OPTIONS_EDITCONFIG', 'Edit configuration');
define('_WEBO_OPTIONS_DELETECONFIG', 'Delete configuration');
define('_WEBO_OPTIONS_ALLCONFIGS', 'All configurations');
define('_WEBO_OPTIONS_CREATENEW', 'Create new');
define('_WEBO_OPTIONS_EXTREME', 'Extreme');
define('_WEBO_OPTIONS_OPTIMAL', 'Optimal');
define('_WEBO_OPTIONS_SAFE', 'Safe');
define('_WEBO_OPTIONS_ATTENTION', 'Warning!');
define('_WEBO_OPTIONS_ATTENTION2', 'Configuration change can lead to website failure. Please bring the application into <a href="#wss_system" class="wssJ">debug mode</a> before applying any changes.');
define('_WEBO_OPTIONS_TITLES_safe', 'Safe configuration');
define('_WEBO_OPTIONS_TITLES_optimal', 'Optimal configuration');
define('_WEBO_OPTIONS_TITLES_extreme', 'Extreme configuration');
define('_WEBO_OPTIONS_TITLES_user', 'User configuration');
define('_WEBO_OPTIONS_DESCRIPTIONS_safe', 'Carefully tested configuration that provides significant speeup for your website and don\'t harms it anyway.');
define('_WEBO_OPTIONS_DESCRIPTIONS_optimal', 'Provides optimal acceleration for your website but can result in slight failures on rare occasions.');
define('_WEBO_OPTIONS_DESCRIPTIONS_extreme', 'Combines all client side acceleration methods to guarantee maximum acceleration possible. This configuration must be carefully tested in debug mode as it may cause some unwanted changes in website view or its behavior.');
define('_WEBO_OPTIONS_DESCRIPTIONS_user', 'User configuration description.');

/* Version comparison */
define('_WEBO_SPLASH2_COMPARISON', 'Version comparison');
define('_WEBO_SPLASH2_COMPARISON_TITLE', 'Merkmale und Technologien');
define('_WEBO_SPLASH2_COMPARISON_DEMO', 'Gemeinschaft');
define('_WEBO_SPLASH2_COMPARISON_LITE', 'Lite');
define('_WEBO_SPLASH2_COMPARISON_FULL', 'Premium');
define('_WEBO_SPLASH2_COMPARISON_VERSION', 'Edition');
define('_WEBO_SPLASH2_COMPARISON_SUPPORT', 'Premium-Support');
define('_WEBO_SPLASH2_COMPARISON_SPEEDUP', 'Speedup');
define('_WEBO_SPLASH2_COMPARISON_CPU', 'CPU-Unkosten');
define('_WEBO_SPLASH2_COMPARISON_ANDMORE', 'and more');
define('_WEBO_SPLASH2_COMPARISON_CPU_MS', 'ms');
define('_WEBO_SPLASH2_COMPARISON_UPTO2', 'bis zu');
define('_WEBO_SPLASH2_COMPARISON_UPTO2', 'bis zu');
define('_WEBO_SPLASH2_COMPARISON_TRAFFIC', 'weniger Traffic');
define('_WEBO_SPLASH2_COMPARISON_LOAD', 'CPU-Last');
define('_WEBO_SPLASH2_COMPARISON_SAVED', 'CPU gespeichert');
define('_WEBO_SPLASH2_COMPARISON_REQUESTS', 'weniger HTTP-Anfragen');
define('_WEBO_SPLASH2_COMPARISON_ACCELERATION', 'extra Website Beschleunigung');
define('_WEBO_SPLASH2_COMPARISON_NOTINCLUDED', 'nicht verf&uuml;gbar');
define('_WEBO_SPLASH2_COMPARISON_ALLBENEFITS', 'Alle Leistungen');
define('_WEBO_SPLASH2_COMPARISON_PRICE', 'Pries');
define('_WEBO_SPLASH2_COMPARISON_FREE', 'kostenlos');
define('_WEBO_SPLASH2_COMPARISON_LITEPRICE', '13,95&euro;');
define('_WEBO_SPLASH2_COMPARISON_FULLPRICE', '69&euro;');
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
define('_WEBO_ABOUT_ENTEREMAIL', 'Enter an e-mail to answer');
define('_WEBO_ABOUT_MESSAGE', 'Your message');
define('_WEBO_ABOUT_ENTEREMESSAGE', 'Enter your message');
define('_WEBO_ABOUT_SEND', 'Send');
define('_WEBO_ABOUT_SUCCESS', 'Your message has been sent');
define('_WEBO_ABOUT_TEXT', '<p class="wssI0">WEBO Site SpeedUp product has been developed since March, 2009. It\'s an automated solution to speedup website load speed. It combines a lot of time-proven solutions and cutting-edge technologies to achieve exceptional client side performance for you website. All rights for WEBO Site SpeedUp belong to <a href="http://www.web-optimizer.us/about/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">WEBO Software</a> company. It\'s a worldwide leader in client side performance solutions development. The last company news <a href="http://blog.web-optimizer.us/">are published in official blog</a>.</p><p class="wssI0">You can also participate in development or testing to make this product better. For this purpose please contact us using <a href="http://www.web-optimizer.us/about/contacts.html?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">contacts from our company website</a> or the form below. We will be glad to receive a message from you.</p><p class="wssI0">You can also support product with <a href="http://twitter.com/wboptimizer">Twitter</a>, <a href="http://www.facebook.com/pages/Web-Optimizer/183974322020">Facebook</a>, <a href="http://extensions.joomla.org/extensions/site-management/cache/10152">Joomla! Extensions Directory</a> or <a href="http://wordpress.org/extend/plugins/web-optimizer/">Wordpress website</a>.</p>');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_SAVED', 'Die Konfigurationsoptionen wurden erfolgreich gespeichert.');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Erforderliche &Auml;nderungen');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'Ihre Webseite wurde auf Basis von ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ' gepatcht. Sie k&ouml;nnen das <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">Ergebnis pr&uuml;fen</a>.');
define('_WEBO_SPLASH3_ADD', 'Jetzt sollten Sie den <a href="#modify">WEBO Site SpeedUp Code hinzuf&uuml;gen</a> zu Ihren eigenen PHP-Seiten(');
define('_WEBO_SPLASH3_ADD_', '). Es macht Vielses einfacher, wenn Sie eine PHP-Datei haben, die alle Seiten Ihrer Website bedient, so dass Sie nur diese Datei &auml;ndern m&uuml;ssen.');
define('_WEBO_SPLASH3_MODIFY', 'So modifizieren Sie Ihre PHP Dateien:');
define('_WEBO_SPLASH3_TOFILE', 'Zu Datei');
define('_WEBO_SPLASH3_TOFILE2', 'Ganz an den Anfang der Datei');
define('_WEBO_SPLASH3_TOFILE3', 'An das Ende der Datei');
define('_WEBO_SPLASH3_AFTERSTRING', 'hinter den String');
define('_WEBO_SPLASH3_ADD2', 'hinzuf&uuml;gen');
define('_WEBO_SPLASH3_CANTWRITE', 'Schreiben nicht m&ouml;glich in ');
define('_WEBO_SPLASH3_CANTWRITE2', ' das von Ihnen angegebene Verzeichnis. Stellen sie sicher, dass das Verzeichnis existiert und das Schreiben dorthin erlaubt ist.');
define('_WEBO_SPLASH3_CANTWRITE3', 'Sie k&ouml;nnen das &uuml;blicherweise &uuml;ber Ihren FTP-Client erledigen. Navigieren Sie zum Verzeichnis, klicken Sie mit der rechten Maustaste und pr&uuml;fen Sie die Eigenschaften oder die CHMOD-Option.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Wenn Sie das getan haben, aktualisieren Sie diese Seite.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Please make sure that the WEBO Site SpeedUp directory is readable and writable for the web server process. Otherwise make CHMOD 775 or CHMOD 777 for it.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Stellen Sie sicher, dass die Root Ihrer Website Lese- und Schreibrechte f&uuml;r Prozesse Ihres Webservers hat oder eine beschreibbare <code>.htaccess</code>-Datei existiert.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'CHMOD 775 oder CHMOD 777 oder <code>.htaccess</code> dort im Lese/Schreibmodus erstellen oder CHMOD der aktuellen <code>.htaccess</code> zu 664 oder 777.');
define('_WEBO_SPLASH3_CONFSAVED', 'Konfiguration gespeichert');
define('_WEBO_SPLASH3_CONFIGERROR', 'Kann Konfigurationsdatei nicht zum Schreiben &ouml;ffnen. &Auml;ndern Sie die Eigenschaften der <code>config.webo.php</code> so, dass sie beschreibbar ist.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'Sie k&ouml;nnen das &uuml;blicherweise &uuml;ber Ihren FTP-Client erledigen. Navigieren Sie zu <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , klicken Sie mit der rechten Maustaste auf die Datei und &auml;ndern Sie die Eigenschaften oder die CHMOD-Option. Stellen Sie 775, 777 oder "write" ein.');

/* create .gz versions of css/js file */
define('_WEBO_GZIP_INSTALLED', 'Using this tool you can create in specified directory <code>.gz</code> versions of CSS and JS (and some other) files for static gzip usage.');
define('_WEBO_GZIP_INSTALLED2', 'Modification time (mtime attribute) of compressed files is set to modification time of the initial (sorce) files during gzipping. Existing <code>.gz</code> files are refreshed when modification time of initial files and exising files are differ.');
define('_WEBO_GZIP_RESULTS', 'Gzip results:');
define('_WEBO_GZIP_ENTERDIRECTORY', 'Enter initial directory');
define('_WEBO_GZIP_DIRECTORY', 'Directory');
define('_WEBO_GZIP_RECURSIVE', 'Include subdirectories');
define('_WEBO_GZIP_ENTERRECURSIVE', 'Find / gzip files recursively');
define('_WEBO_GZIP_COMPRESS', 'Compress files');
define('_WEBO_GZIP_FIND', 'Find files');
define('_WEBO_GZIP_WAIT', 'Searching for files...');
define('_WEBO_GZIP_RELATIVE', 'Relative file path');
define('_WEBO_GZIP_SIZE', 'Size');
define('_WEBO_GZIP_MTIME', 'Modification time');
define('_WEBO_GZIP_NOTCHANGED', 'not changed');
define('_WEBO_GZIP_INITIAL_TOTAL', 'Initial files size');
define('_WEBO_GZIP_FINAL_TOTAL', 'Compressed files size');
define('_WEBO_GZIP_SAVINGS', 'Total savings');
define('_WEBO_GZIP_INITIAL', 'Initial size');
define('_WEBO_GZIP_FINAL', 'Savings');
define('_WEBO_GZIP_PROCESSING', 'Processing file');
define('_WEBO_GZIP_OUTOF', 'out of');
define('_WEBO_GZIP_OPTIMIZATION', 'Optimization in action. Please wait');
define('_WEBO_GZIP_NOTHING', 'Nothing found');

/* Image optimization */
define('_WEBO_IMAGE_INSTALLED', 'Using this tool you can decrease size of images without quality loss in any specified directory on your website. For each optimized file <code>.backup</code> version will be created during optimization process. GIF files are replaced with PNG ones if latter are smaller.');
define('_WEBO_IMAGE_INSTALLED2', 'One of the following services can be used for images optimization: <a href="http://smush.it/" rel="nofollow" class="wssJ">smush.it</a> (<a href="http://info.yahoo.com/legal/us/yahoo/smush_it/smush_it-4378.html" rel="nofollow" class="wssJ">terms of service</a>) or <a href="http://www.gracepointafterfive.com/punypng/" rel="nofollow" class="wssJ">punypng</a> (<a href="http://www.gracepointafterfive.com/punypng/about/tos" rel="nofollow" class="wssJ">terms of service</a>).');
?>