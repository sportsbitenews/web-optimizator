<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Contains all EN localization constants
 *
 **/

/* general layout */
define('_WEBO_CHARSET', 'utf-8');
define('_WEBO_GENERAL_TITLE', 'WEBO Site SpeedUp Configuration');
define('_WEBO_GENERAL_FOOTER', 'Faster than lightning!');
define('_WEBO_GENERAL_BUYNOW', '<a href="https://www.softkey.net/catalog/basket.php?id=350446&amp;act=buy&amp;from=1722979" class="wssJ" title="WEBO Site SpeedUp Extended Edition">Buy Now</a>');
define('_WEBO_GENERAL_BUYNOWLITE', '<a href="https://www.softkey.net/catalog/basket.php?id=350449&amp;act=buy&amp;from=1722979" class="wssJ" title="WEBO Site SpeedUp Standard Edition">Buy Now</a>');
define('_WEBO_GENERAL_BUYNOWZERO', '<a href="https://www.softkey.net/catalog/basket.php?id=582711&amp;act=buy&amp;from=1722979" class="wssJ" title="WEBO Site SpeedUp Zero Edition">Buy Now</a>');
define('_WEBO_GENERAL_IMAGE', '<img src="http://web-optimizator.googlecode.com/svn/trunk/images/web.optimizer.logo.small.png" alt="WEBO Site SpeedUp" title="WEBO Site SpeedUp" width="151" height="150"/>');
define('_WEBO_GENERAL_BUY', 'Buy now');
define('_WEBO_GENERAL_PREMIUM', 'Premium');
define('_WEBO_GENERAL_EDITION', 'Edition');
define('_WEBO_GENERAL_LOADING', 'Loading');

/* lang menu */
define('_WEBO_GENERAL_LANGUAGE', 'Choose language');
define('_WEBO_GENERAL_ru', 'Русский');
define('_WEBO_GENERAL_de', 'Deutsch');
define('_WEBO_GENERAL_es', 'Español');
define('_WEBO_GENERAL_ua', 'Українська');
define('_WEBO_GENERAL_en', 'English');
define('_WEBO_GENERAL_fr', 'Français');
define('_WEBO_GENERAL_ur', 'اردو');
define('_WEBO_GENERAL_it', 'Italiano');
define('_WEBO_GENERAL_da', 'Dansk');
define('_WEBO_GENERAL_bg', 'Български');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Hmmm... we have a problem');
define('_WEBO_ERROR_ERROR', 'Oopps! Something went wrong');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Authorization');
define('_WEBO_LOGIN_LOGIN', 'Login');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>Warning:</strong> can\'t find WEBO Site SpeedUp calls in your web system source files. Check calls existence manually or reinstall WEBO Site SpeedUp.');
define('_WEBO_LOGIN_EFFICIENCY_KB', 'Kb');
define('_WEBO_LOGIN_EFFICIENCY_S', 's');
define('_WEBO_LOGIN_USERNAME', 'First and last name');
define('_WEBO_LOGIN_USERNAME_HELP', 'This information will be used mainly in e-mail messages.');
define('_WEBO_LOGIN_ENTERLOGIN', 'Enter your first and last name');
define('_WEBO_LOGIN_PASSWORD', 'Password');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Enter the password');
define('_WEBO_LOGIN_PASSWORD_CONFIRM', 'Password confirmation');
define('_WEBO_LOGIN_ENTERPASSWORDCONFIRM', 'Confirm the password');
define('_WEBO_LOGIN_LICENSE', 'License key');
define('_WEBO_LOGIN_ENTERLICENSE', 'Enter your license key');
define('_WEBO_SPLAHS1_PROTECTED', 'Protected mode');
define('_WEBO_SPLAHS1_PROTECTED2', 'WEBO Site SpeedUp installation is safely protected. You can configure it once more.');
define('_WEBO_LOGIN_EMAIL', 'E-mail');
define('_WEBO_LOGIN_EMAIL_HELP', 'This e-mail address will be used only for information about urgent updates, greetings, and special offers.');
define('_WEBO_LOGIN_ENTEREMAIL', 'Enter your e-mail');
define('_WEBO_LOGIN_EMAILNOTICE', 'This e-mail address will be used only for information about urgent updates, greetings, and special offers.');
define('_WEBO_LOGIN_ALLOW', 'Allow to use my data about optimization results');
define('_WEBO_LOGIN_ALLOW_HELP', 'Statistical information about website acceleration will be sent to WEBO Software servers. This information won\'t be published and will be used only to improve WEBO Site SpeedUp efficiency. No private data will be sent.');
define('_WEBO_LOGIN_SUCCESS', 'All settings have been successfully saved');
define('_WEBO_LOGIN_ENTEROLDPASSWORD', 'Enter the current password');
define('_WEBO_LOGIN_PASSWORDSDIFFER', 'Passwords don\'t match');
define('_WEBO_LOGIN_LICENSEAGREEMENT', 'I have read the');
define('_WEBO_LOGIN_LICENSEAGREEMENT2', 'license agreement');
define('_WEBO_LOGIN_LICENSEAGREEMENT3', 'and I accept it');
define('_WEBO_LOGIN_CONFIRMLICENSEAGREEMENT', 'Confirm that you have read and accepted the license agreement');
define('_WEBO_LOGIN_TRIAL', 'Get SaaS license key');

/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Update');
define('_WEBO_LOGIN_UPGRADE_ROLLBACK', 'Rollback');
define('_WEBO_LOGIN_UPGRADE_TO', 'to version');
define('_WEBO_LOGIN_VERSION', 'Version');
define('_WEBO_UPGRADE_FILE', 'Updating file');

/* Uninstall */
define('_WEBO_LOGIN_UNINSTALLME', 'Uninstall WEBO Site SpeedUp');
define('_WEBO_LOGIN_FAILED', 'Login failed');
define('_WEBO_UNINSTALL_MESSAGE', 'WEBO Site SpeedUp uninstall reason');
define('_WEBO_UNINSTALL_SUCCESS', 'WEBO Site SpeedUp was successfully uninstalled.');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Installation');
define('_WEBO_NEW_ENTER', 'Enter details');
define('_WEBO_NEW_PROTECT', '<p class="wssI">During installation root .htaccess file and some other source files of your web system will be changed so please make sure they are writable (each changed file will be automatically backed up).</p><p class="wssI">If no valid license key will be entered, WEBO Site SpeedUp <a href="http://www.webogroup.com/home/site-speedup/comparison/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">Free edition</a> will be installed.</p><p class="wssI">When installed, WEBO Site SpeedUp will be automatically configured based on current server capabilites. You can review and change any options later using this administative interface.</p><p class="wssI">More information on WEBO Site SpeedUp installing and configuring you can get from <a href="http://code.google.com/p/web-optimizator/wiki/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">online documentation</a>.</p>');
define('_WEBO_NEW_NOSCRIPT', 'JavaScript must be enabled for correct work!');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Uninstall');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'WEBO Site SpeedUp uninstallation');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Thank you for using WEBO Site SpeedUp. Please help us to improve our product and tell us the uninstall reason.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Also feel free to visit <a href="http://www.webogroup.com/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">our company website</a> and submit any <a href="http://code.google.com/p/web-optimizator/issues/list?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">related issues</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'You can reinstall WEBO Site SpeedUp anytime by visiting <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">WEBO Site SpeedUp page</a>.');
define('_WEBO_SPLASH1_UNINSTALL_SEND', 'Send message');
define('_WEBO_SPLASH1_NEXT', 'Install');
define('_WEBO_SPLASH1_BACK', 'Back');

/* Change password */
define('_WEBO_PASSWORD_OLD', 'Current password');
define('_WEBO_PASSWORD_ENTERPASSWORD', 'Enter the current password');
define('_WEBO_PASSWORD_NEW', 'New password');
define('_WEBO_PASSWORD_ENTERPASSWORDNEW', 'Enter the new password');
define('_WEBO_PASSWORD_CONFIRM', 'New password confirmation');
define('_WEBO_PASSWORD_ENTERPASSWORDCONFIRM', 'Confirm the new password');
define('_WEBO_SPLASH1_SAVE', 'Save');
define('_WEBO_PASSWORD_DIFFERENT', 'New password and its confirmation don\'t match');
define('_WEBO_PASSWORD_EMPTY', 'New password cannot be empty');
define('_WEBO_PASSWORD_SUCCESSFULL', 'Password has been changed');

/* Second splash -- set options */
define('_WEBO_SPLASH2_CONTROLPANEL', 'Control Panel');
define('_WEBO_SPLASH2_OPTIONS', 'Options');
define('_WEBO_SPLASH2_UNABLE', 'Unable to open');
define('_WEBO_SPLASH2_MAKESURE', '. Please Make sure the directory exists.');

/* WEBO Site SpeedUp options */
define('_WEBO_general', 'General options');
define('_WEBO_combinecss', 'Combine CSS');
define('_WEBO_combine_js', 'Combine JavaScript');
define('_WEBO_minify', 'Minify');
define('_WEBO_gzip', 'Gzip');
define('_WEBO_clientside', 'Client side cache');
define('_WEBO_htaccess', '.htaccess');
define('_WEBO_iis', 'web.config');
define('_WEBO_backlink', 'Backlink');
define('_WEBO_performance', 'Performance');
define('_WEBO_data_uri', 'data:URI');
define('_WEBO_css_sprites', 'CSS Sprites');
define('_WEBO_serverside', 'Server side cache');
define('_WEBO_sqlcache', 'DB cache');
define('_WEBO_unobtrusive', 'Unobtrusive JavaScript');
define('_WEBO_multiple_hosts', 'CDN');
define('_WEBO_rocket', 'Rocket');
define('_WEBO_saas', 'Daily fee');
define('_WEBO_saas2', '');
define('_WEBO_plugins', 'Plugins API');

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
define('_WEBO_charset', 'Website charset');
define('_WEBO_charset_HELP', 'Website content charset, is required for correct server-side caching. Example: utf-8');
define('_WEBO_currency', 'Website currency');
define('_WEBO_currency_HELP', 'Website default currency code (for less cache size). Example: RUR, EUR, USD');
define('_WEBO_external_scripts_user', 'Username (to access via HTTP Basic Authorization)');
define('_WEBO_external_scripts_user_HELP', 'If your website is protected via HTTP Basic Authorization you need to declare username and password so WEBO Site SpeedUp can process all required resources from the website.');
define('_WEBO_external_scripts_pass', 'Password (to access via HTTP Basic Authorization)');
define('_WEBO_external_scripts_pass_HELP', 'If your website is protected via HTTP Basic Authorization you need to declare username and password so WEBO Site SpeedUp can process all required resources from the website.');
define('_WEBO_restricted', 'Exclude URL from optimization');
define('_WEBO_restricted_HELP', 'Sometimes it\'s required to exclude some parts of website from WEBO Site SpeedUp logic. In this case you need to set meaningful parts (masks) for such sections / URL, separated by space.');
define('_WEBO_external_scripts_remove_list', 'Remove JavaScript file(s)');
define('_WEBO_external_scripts_remove_list_HELP', 'These JavaScript files will be completely removed from HTML output. Example: mootools.js');
define('_WEBO_external_scripts_remove_list_EFFECT', '2-5% less traffic and requests');
define('_WEBO_external_scripts_remove_list_css', 'Remove CSS file(s)');
define('_WEBO_external_scripts_remove_list_css_HELP', 'These CSS files will be completely removed from HTML output. Example: jcomments.css');
define('_WEBO_external_scripts_remove_list_css_EFFECT', '2-5% less traffic and requests');

define('_WEBO_combine_css', 'Combine CSS files');
define('_WEBO_combine_css_HELP', 'Depending on this option CSS won\'t be combined, or there will be combined only CSS in &lt;head&gt; tag, or there will be combined the whole CSS on the page. All combined CSS code will be minified.');
define('_WEBO_combine_css1', 'Don\'t combine CSS files');
define('_WEBO_combine_css2', 'Combine only CSS included in tag <code>&lt;head&gt;</code>');
define('_WEBO_combine_css3', 'Combine all CSS in tags <code>&lt;head&gt;</code> and <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_css', 'Enable external styles merging');
define('_WEBO_external_scripts_css_HELP', 'There will be combined files located on all hosts. Otherwise WEBO Site SpeedUp will combine only files located on the same host that initial web page.');
define('_WEBO_external_scripts_css_HELP_DISABLED', 'Current server environment doesn\'t have support for curl library, so dynamic and external files merging is impossible.');
define('_WEBO_external_scripts_css_inline', 'Enable inline styles merging');
define('_WEBO_external_scripts_css_inline_HELP', 'There will be combined all CSS included with the help of &lt;style&gt; and &lt;link&gt; tags. Otherwise WEBO Site SpeedUp will combine files included with &lt;link&gt; tag.');
define('_WEBO_minify_css_file', 'Combined CSS file name');
define('_WEBO_minify_css_file_HELP', 'Use this option to make sure that every web page has the same combined CSS file. Use it only if sets of CSS files are identical throughout the website. Pages with another sets of CSS files will still load the formely created file. The named combined file is static and when created, it is updated only on manual cache refresh. File name can include only Latin letters, numbers, hyphens, underlines, or dots. All the other symbols will be excluded. This file name may be automatically expanded with special extension to manage client side cache in browsers.');
define('_WEBO_minify_css_file_EFFECT', 'Better website view in search engines\' cache');
define('_WEBO_minify_css_host', 'Host for CSS file(s)');
define('_WEBO_minify_css_host_HELP', 'Host to load merged CSS file. With enabled options in CDN group it will be used for all CSS files.');
define('_WEBO_minify_css_host_EFFECT', 'Website speedup by 5-10%');
define('_WEBO_external_scripts_additional_list', 'Exclude CSS file(s) from merging (separated by space)');
define('_WEBO_external_scripts_additional_list_HELP', 'Defined files won\'t be included into combined CSS file. You need to define only file names, not absolute paths to them.');
define('_WEBO_external_scripts_include_code', 'Include CSS code into all combined files');
define('_WEBO_external_scripts_include_code_HELP', 'Entered CSS code will be added to the end of each combined CSS file. This field allows you to define additional styles for website working under WEBO Site SpeedUp.');
define('_WEBO_external_scripts_include_code_EFFECT', 'Better website view with WEBO Site SpeedUp');

define('_WEBO_minify_javascript', 'Combine JavaScript files in <code>&lt;head&gt;</code>');
define('_WEBO_minify_javascript_HELP', 'There will be combined only JavaScript files in &lt;head&gt; tag.');
define('_WEBO_minify_javascript_body', 'Combine JavaScript files in <code>&lt;body&gt;</code>');
define('_WEBO_minify_javascript_body_HELP', 'There will be combined only JavaScript files in &lt;body&gt; tag.');
define('_WEBO_external_scripts_inline', 'Enable inline JavaScript merging in <code>&lt;head&gt;</code>');
define('_WEBO_external_scripts_inline_HELP', 'There will be combined inline code in tags &lt;script&gt;. This affects only &lt;head&gt; tag content.');
define('_WEBO_external_scripts_inline_body', 'Enable inline JavaScript merging in <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_inline_body_HELP', 'There will be combined inline code in tags &lt;script&gt;. This affects only &lt;body&gt; tag content.');
define('_WEBO_external_scripts_on', 'Enable external JavaScript merging');
define('_WEBO_external_scripts_on_HELP', 'There will be combined files located on all hosts. Otherwise WEBO Site SpeedUp will combine only files located on the same host that initial web page.');
define('_WEBO_external_scripts_on_HELP_DISABLED', 'Current server environment doesn\'t have support for curl library, so dynamic and external files merging is impossible.');
define('_WEBO_minify_javascript_file', 'Combined JavaScript file name');
define('_WEBO_minify_javascript_file_HELP', 'Use this option to make sure that every web page has the same combined JavaScript file. Use it only if sets of JavaScript files are identical throughout the website. Pages with another sets of JavaScript files will still load the formely created file. The named combined file is static and when created, it is updated only on manual cache refresh. File name can include only Latin letters, numbers, hyphens, underlines, or dots. All the other symbols will be excluded. This file name may be automatically expanded with special extension to manage client side cache in browsers.');
define('_WEBO_minify_javascript_file_EFFECT', 'Better website view in search engines\' cache');
define('_WEBO_minify_javascript_host', 'Host for JavaScript file(s)');
define('_WEBO_minify_javascript_host_HELP', 'Host to load merged JavaScript file. With enabled options in CDN group it will be used for all JavaScript files.');
define('_WEBO_minify_javascript_host_EFFECT', 'Website speedup by 5-10%');
define('_WEBO_external_scripts_ignore_list', 'Exclude file(s) from combining');
define('_WEBO_external_scripts_ignore_list_HELP', 'Defined files won\'t be included into combined JavaScript file. You need to define only file names, not absolute paths to them.');
define('_WEBO_external_scripts_head_end', 'Force moving combined script to <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_head_end_HELP', 'Combined JavaScript file call will be moved to closing tag &lt;/head&gt;.');
define('_WEBO_external_scripts_include_try', 'Safe combine mode');
define('_WEBO_external_scripts_include_try_HELP', 'With this option all external files will be enveloped into try-catch construction (with individual files\' inclusion on failed content execution in common scope). This reduces JavaScript performance but guarantee that there will be no broken JavaScript calls due to their combine.');
define('_WEBO_external_scripts_duplicates', 'Remove duplicates');
define('_WEBO_external_scripts_duplicates_HELP', 'All noticed duplicates of common libraries (jQuery, Prototype, MooTools) will be removed from merging. This reduces final JavaScript file size and its initialization time, but in a few cases can break integrity of cliet side logic.');
define('_WEBO_external_scripts_include_mask', 'Mask to merge scripts');
define('_WEBO_external_scripts_include_mask_HELP', 'You can set the mask according to which all scripts will be included. For example you need to include the first 3 script tag to merged file, and exclude the next 2. So the mask will be xxx00. If there is no mask matching the current script tag - it will included or excluded according to the other rules.');

define('_WEBO_minify_css_min', 'Minify CSS files');
define('_WEBO_minify_css_min_HELP', 'All excessive spaces, tabs, line breaks, and comments will be deleted from combined CSS file.');
define('_WEBO_minify_css_min1', 'Don\'t minify CSS');
define('_WEBO_minify_css_min2', 'Minify with regular expressions');
define('_WEBO_minify_css_min3', 'Minify with CSS Tidy');
define('_WEBO_minify_js', 'Minify JavaScript files');
define('_WEBO_minify_js_HELP', 'All excessive spaces, tabs, line breaks, and comments will be deleted from combined JavaScript file. Library choice affects minify algorithm and compression rate. Maximum compression can be achieved with any of these libraries depending on initial conditions.');
define('_WEBO_minify_js_HELP_DISABLED', 'There is no support for java execution under PHP on your website, so minify with YUI Compressor is impossible.');
define('_WEBO_minify_js1', 'Don\'t minify JavaScript');
define('_WEBO_minify_js2', 'Minify with JSMin (from Douglas Crockford)');
define('_WEBO_minify_js3', 'Minify with YUI Compressor (requires java)');
define('_WEBO_minify_js4', 'Minify with Packer (by Dean Edwards)');
define('_WEBO_minify_js5', 'Minify with Google Compiler (requires java)');
define('_WEBO_external_scripts_minify_exclude', 'Exclude the following file(s) from minify (separated by space)');
define('_WEBO_external_scripts_minify_exclude_HELP', 'File(s) listed here won\'t be minified with combining of JavaScript code (but will be combined according to other settings from &quot;Combine JavaScript&quot; group of options).');
define('_WEBO_external_scripts_minify_exclude_EFFECT', 'Website size reduction by 5-7%');
define('_WEBO_minify_page', 'Minify HTML');
define('_WEBO_minify_page_HELP', 'HTML code will be cleaned from double spaces, double line breaks, empty symbols at the beginning of every string and spaces before tag ends. Tags &lt;pre&gt;, &lt;textarea&gt;, &lt;script&gt; will be excluded from all actions .');
define('_WEBO_minify_html_comments', 'Remove HTML comments');
define('_WEBO_minify_html_comments_HELP', 'All HTML comments will be removed. This can break conditional comments and some JavaScript counters.');
define('_WEBO_minify_html_comments_EFFECT', 'HTML pages size reduction by 2-5%');
define('_WEBO_minify_html_one_string', 'Compress HTML to one string');
define('_WEBO_minify_html_one_string_HELP', 'HTML code of result web page will be compressed to one string. This can help with removing extra spaces and line breaks. But this is CPU intensive and should be used carefully.');
define('_WEBO_minify_html_one_string_EFFECT', 'HTML pages size reduction by 5-10%');

define('_WEBO_unobtrusive_on', 'Unobtrusive JavaScript');
define('_WEBO_unobtrusive_on_HELP', 'With basic mode all supported widgets will be loaded on onDOMloaded event. With advanced mode - on window.onload event (this increases website load speed by Google) according to the other options in this section. In case of inline code usage all contents of yass.loader.js library will be inserted directly to HTML document.');
define('_WEBO_unobtrusive_on_EFFECT', 'Unobtrusive JavaScript possibility');
define('_WEBO_unobtrusive_on1', 'Basic mode');
define('_WEBO_unobtrusive_on2', 'Advanced mode');
define('_WEBO_unobtrusive_on3', 'Advanced mode + inline code');
define('_WEBO_unobtrusive_body', 'Include combined JavaScript file before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_body_HELP', 'Combined JavaScript files will be moved to closing &lt;/body&gt; tag. This option has more priority than &quot;Force moving combined script to &lt;/head&gt;&quot;.');
define('_WEBO_unobtrusive_body_EFFECT', 'Website rendering speedup by 20-40%');
define('_WEBO_unobtrusive_all', 'Move all JavaScript code to <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_all_HELP', 'All JavaScript calls will be moved to closing &lt;/body&gt; tag according to their initial order on the web page.');
define('_WEBO_unobtrusive_all_EFFECT', 'Website rendering speedup by 20-50%');
define('_WEBO_unobtrusive_informers', 'Move JavaScript widgets calls before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers_HELP', 'The whole JavaScript code from widgets calls will be moved to &lt;/body&gt;.');
define('_WEBO_unobtrusive_informers_EFFECT', 'Website speedup by 20-30%');
define('_WEBO_unobtrusive_counters', 'Move counter calls before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters_HELP', 'The whole JavaScript code from counters calls will be moved to &lt;/body&gt;.');
define('_WEBO_unobtrusive_counters_EFFECT', 'Website speedup by 10-15%');
define('_WEBO_unobtrusive_ads', 'Move advertisement calls before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads_HELP', 'The whole JavaScript code from ads (context and banners) calls will be moved to &lt;/body&gt;.');
define('_WEBO_unobtrusive_ads_EFFECT', 'Website speedup by 25-40%');
define('_WEBO_unobtrusive_iframes', 'Defer iframes loading');
define('_WEBO_unobtrusive_iframes_HELP', 'The whole HTML code from iframes calls will be moved to &lt;/body&gt;.');
define('_WEBO_unobtrusive_iframes_EFFECT', 'Website speedup by 20-35%');
define('_WEBO_unobtrusive_background', 'Load background images on <code>DOMready</code> event');
define('_WEBO_unobtrusive_background_HELP', 'Background images\' load will be delayed to DOMReady event. This will increase initial web page render speed in browsers.');
define('_WEBO_unobtrusive_background_EFFECT', 'Website rendering speedup by 20-50%');
define('_WEBO_unobtrusive_background_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option &quot;Performance - Uniform cache files for all browsers&quot; enabled.');
define('_WEBO_unobtrusive_postload', 'Pre-load CSS or JavaScript files');
define('_WEBO_unobtrusive_postload_HELP', 'All defined URLs will be loaded on window.onload event to speed the next page view up.');
define('_WEBO_unobtrusive_postload_EFFECT', 'Faster next page views');
define('_WEBO_unobtrusive_frames', 'Pre-load pages');
define('_WEBO_unobtrusive_frames_HELP', 'All resources on these pages will be loaded on window.onload event (iframes) to speed the next page view up.');
define('_WEBO_unobtrusive_frames_EFFECT', 'Faster next page views');
define('_WEBO_unobtrusive_configuration', 'Unobtrusive configuration');
define('_WEBO_unobtrusive_configuration_HELP', 'Setup what unobtrusive chunks must be excluded from delayed loading - i.e. you need to show some adverts first, other - after window onload. Syntax: {id1}:{amount_to_skip} {id2}:{amount_to_skip}. Complete list of ids is located in libs/php/config.unobtrusive.php as keys of all arrays.');
define('_WEBO_unobtrusive_configuration_EFFECT', 'Agile page load process management');

define('_WEBO_gzip_css', 'Gzip CSS');
define('_WEBO_gzip_css_HELP', 'All CSS files will be compressed via gzip.');
define('_WEBO_gzip_javascript', 'Gzip JavaScript');
define('_WEBO_gzip_javascript_HELP', 'All JavaScript files will be compressed via gzip.');
define('_WEBO_gzip_fonts', 'Gzip fonts');
define('_WEBO_gzip_fonts_HELP', 'All fonts files (.eot, .ttf, .otf etc) will be compressed via gzip.');
define('_WEBO_gzip_fonts_HELP_DISABLED', 'There is no support for mod_gzip, mod_deflate, or mod_rewrite on your website, so gzip for fonts is impossible.');
define('_WEBO_gzip_page', 'Gzip HTML');
define('_WEBO_gzip_page_HELP', 'All HTML files will be compressed via gzip.');
define('_WEBO_gzip_page_HELP_DISABLED', 'There is no support for mod_gzip, or mod_deflate, or zlib extension on your website, so gzip for HTML is impossible.');
define('_WEBO_gzip_zlib', 'Use <code>zlib</code>');
define('_WEBO_gzip_zlib_HELP', 'PHP library zlib will be used for gzip.');
define('_WEBO_gzip_zlib_HELP_DISABLED', 'Current server environment doesn\'t support zlib.');
define('_WEBO_gzip_noie', 'Use <code>deflate</code> instead of <code>gzip</code> for IE6/7');
define('_WEBO_gzip_noie_HELP', 'In some cases gzip in IE6 and IE7 browsers can lead to incorrect page view. This option allows you to force alternative compression technique usage for these browsers.');
define('_WEBO_gzip_noie_EFFECT', 'Improved gzip compatibility with Internet Explorer');
define('_WEBO_gzip_cookie', 'Check for gzip possibility via cookies');
define('_WEBO_gzip_cookie_HELP', 'WEBO Site SpeedUp can perform additional check for gzip support in browsers. If it\'s been defined all data will be compressed regardless Accept-Encoding header.');
define('_WEBO_gzip_cookie_EFFECT', 'HTML pages size reduction by 8-12%');

define('_WEBO_far_future_expires_javascript', 'Cache JavaScript');
define('_WEBO_far_future_expires_javascript_HELP', 'All JavaScript files will have caching headers set to far future.');
define('_WEBO_far_future_expires_css', 'Cache CSS');
define('_WEBO_far_future_expires_css_HELP', 'All CSS files will have caching headers set to far future.');
define('_WEBO_far_future_expires_images', 'Cache images');
define('_WEBO_far_future_expires_images_HELP', 'All images will have caching headers set to far future.');
define('_WEBO_far_future_expires_fonts', 'Cache fonts');
define('_WEBO_far_future_expires_fonts_HELP', 'All fonts files will have caching headers set to far future. This option is applied via .htaccess.');
define('_WEBO_far_future_expires_fonts_HELP_DISABLED', 'There is no support for mod_expires or mod_rewrite on your website, so client side caching for fonts is impossible.');
define('_WEBO_far_future_expires_video', 'Cache video files');
define('_WEBO_far_future_expires_video_HELP', 'All video files will have caching headers set to far future. This option is applied via .htaccess.');
define('_WEBO_far_future_expires_video_HELP_DISABLED', 'There is no support for mod_expires or mod_rewrite on your website, so client side caching for video files is impossible.');
define('_WEBO_far_future_expires_static', 'Cache static assets');
define('_WEBO_far_future_expires_static_HELP', 'All other static files will have caching headers set to far future. This option is applied via .htaccess.');
define('_WEBO_far_future_expires_static_HELP_DISABLED', 'There is no support for mod_expires or mod_rewrite on your website, so client side caching for the other static files is impossible.');
define('_WEBO_far_future_expires_html', 'Cache HTML');
define('_WEBO_far_future_expires_html_HELP', 'All images will have caching headers. Cache timeout will be set according to option &quot;Default timeout to cache HTML&quot;.');
define('_WEBO_far_future_expires_html_EFFECT', 'Traffic savings 5-10%');
define('_WEBO_far_future_expires_html_timeout', 'Default timeout to cache HTML (in seconds)');
define('_WEBO_far_future_expires_html_timeout_HELP', 'Time to cache HTML files. Zero value means zero timeout.');
define('_WEBO_far_future_expires_external', 'Cache external files');
define('_WEBO_far_future_expires_external_HELP', 'External files called on web page will be served from the same host that web page itself with Expires headers using /cache/wo.static.php proxy script from the WEBO Site SpeedUp apllication directory.');
define('_WEBO_far_future_expires_external_EFFECT', 'Website speedup by 3-10%');

define('_WEBO_html_cache_enabled', 'Cache generated HTML files');
define('_WEBO_html_cache_enabled_HELP', 'HTML pages will be cached for timeout set in option &quot;Default HTML cache timeout&quot;. This option allows you to significantly speedup web pages load with long generation time. But this is reasonable only for static pages without dynamic content.');
define('_WEBO_html_cache_enabled_EFFECT', 'CPU savings 60-95%');
define('_WEBO_html_cache_timeout', 'Default HTML cache timeout (in seconds)');
define('_WEBO_html_cache_timeout_HELP', 'After this time all cached HTML pages will be recreated on server side.');
define('_WEBO_html_cache_timeout_cart', 'Time to cache cart in e-store (in seconds)');
define('_WEBO_html_cache_timeout_cart_HELP', 'During this time all data about user\'s cart will be stored locally (in user\'s cookie or in localStorage).');
define('_WEBO_html_cache_timeout_cart_EFFECT', 'Better website usability');
define('_WEBO_html_cache_timeout_ajax', 'Time to cache AJAX requests (in seconds)');
define('_WEBO_html_cache_timeout_ajax_HELP', 'During this time all AJAX requests will be cached on server.');
define('_WEBO_html_cache_timeout_ajax_EFFECT', 'Better dynamic performanсe');
define('_WEBO_html_cache_flush_only', 'Only cache first n bytes of content (flush early)');
define('_WEBO_html_cache_flush_only_HELP', 'HTML cache will contain not the whole web page but the first n bytes of it (set in option &quot;Flush content size&quot;). And this amount of data will be flushed to browser earlier than the rest web page content. So browser will receive calls to required resources earlier and don\'t wait the rest of the page to start their load.');
define('_WEBO_html_cache_flush_only_EFFECT', 'Website rendering speedup by 10-40%');
define('_WEBO_html_cache_flush_size', 'Flush content size (in bytes)');
define('_WEBO_html_cache_flush_size_HELP', 'Size of cached flushed part of a web page. It can be fixed (to avoid any issues with browsers or network connection). Empty (or zero) value leads to flush the whole web page content before closing &lt;/head&gt; tag.');
define('_WEBO_html_cache_ignore', 'Exclude / include URLs for HTML cache');
define('_WEBO_html_cache_ignore_HELP', 'All URLs listed below will be excluded from HTML cache, or there will be included only these URLs.');
define('_WEBO_html_cache_ignore1', 'Exclude the following URLs from HTML cache');
define('_WEBO_html_cache_ignore2', 'Include to HTML cache the following URLs');
define('_WEBO_html_cache_ignore_list', 'List of parts of URLs (separated by space)');
define('_WEBO_html_cache_ignore_list_HELP', 'Often server side caching can\'t be used for pages with dynamic content. For example user account pages, statistic pages, and more. This option allows you to set parts of URL (masks) to exclude pages from server side caching. You can also set # for home page.');
define('_WEBO_html_cache_ignore_list_EFFECT', 'Server side caching compatibility with dynamic pages');
define('_WEBO_html_cache_allowed_list', 'List of USER AGENTS (robots) to add to caching (separated by space)');
define('_WEBO_html_cache_allowed_list_HELP', 'This option allows you to set a list of USER AGENTS which will receive only cached HTML pages. For example caching HTML pages for all search engines can reduce server side load.');
define('_WEBO_html_cache_additional_list', 'List of COOKIE to exclude from server side caching (separated by space)');
define('_WEBO_html_cache_additional_list_HELP', 'You can also skip server side caching for user who have one of the COOKIE from this list. This can be useful for authorized users or during the work with shopping cart.');
define('_WEBO_html_cache_additional_list_EFFECT', 'Server side caching compatibility with user activity');
define('_WEBO_html_cache_params', 'GET parameters list to exclude on caching (separated by space)');
define('_WEBO_html_cache_params_HELP', 'You can define GET parameters which will be striped from hash key creation to cache any website page. This can help if you have some statistical parameters (i.e. advertisement campaigns) which don\'t influence your website content). This will help to reduce cache size and increase its efficiency.');
define('_WEBO_html_cache_params_EFFECT', 'Increased caching efficiency');
define('_WEBO_html_cache_enhanced', 'Extreme mode');
define('_WEBO_html_cache_enhanced_HELP', 'In extreme mode all HTML documents will be served from cache directly, bypassing normal CMS processing. This will significantly increase website performance (especially useful on traffic peaks), but cache can be refreshed only manually. By default extreme mode for server side caching is available only on systems which uses web-servers with .htaccess support (Apache, LiteSpeed). Other web-servers configurations should be manually changed, according to [http://code.google.com/p/web-optimizator/wiki/IntegrationWithWebsite Integration with website] section of documentation.');
define('_WEBO_html_cache_enhanced_EFFECT', 'CPU savings 4-40%');
define('_WEBO_html_cache_enhanced_DISABLED', 'To enable extreme mode for server side caching you need to have mod_rewrite for your server environment isntalled.');
define('_WEBO_html_cache_cleanup', 'Delete expired files from cache');
define('_WEBO_html_cache_cleanup_HELP', 'After given cache timeout all old entries (which time of creation is less than current timestamp minus given timeout) will be deleted from HTML cache.');
define('_WEBO_html_cache_cleanup_EFFECT', 'Increased caching efficiency');

define('_WEBO_sql_cache_enabled', 'Cache DB queries');
define('_WEBO_sql_cache_enabled_HELP', 'All DB queries will be cached if their execution take more than time set below. This will increase load speed of all website pages.');
define('_WEBO_sql_cache_enabled_EFFECT', 'CPU savings 30-50%');
define('_WEBO_sql_cache_enabled_HELP_DISABLED', 'To make DB cache working correctly you need to install WEBO Site SpeedUp as system extension (not as standalone application).');
define('_WEBO_sql_cache_time', 'Queries execution time (ms)');
define('_WEBO_sql_cache_time_HELP', 'All queries which execution time (in ms) is greater will be cached.');
define('_WEBO_sql_cache_time_HELP_DISABLED', 'To make DB cache working correctly you need to install WEBO Site SpeedUp as system extension (not as standalone application).');
define('_WEBO_sql_cache_timeout', 'DB cache timeout (s)');
define('_WEBO_sql_cache_timeout_HELP', 'After this time all SQL queries will be re-requested from the current DB.');
define('_WEBO_sql_cache_timeout_HELP_DISABLED', 'To make DB cache working correctly you need to install WEBO Site SpeedUp as system extension (not as standalone application).');
define('_WEBO_sql_cache_tables_exclude', 'Exclude table(s) (separated by space)');
define('_WEBO_sql_cache_tables_exclude_HELP', 'You can exclude some tables from DB caching logic by setting their names (without prefix). All queries from such tables won\'t be cached.');
define('_WEBO_sql_cache_tables_exclude_HELP_DISABLED', 'To make DB cache working correctly you need to install WEBO Site SpeedUp as system extension (not as standalone application).');

define('_WEBO_performance_mtime', 'Ignore file modification time stamp (mtime)');
define('_WEBO_performance_mtime_HELP', 'There will be gained additional speedup (on server side). But to refresh combined files you will need to change calls of initial files in HTML code or to refresh WEBO Site SpeedUp cache.');
define('_WEBO_performance_mtime_EFFECT', 'CPU savings 80% in WEBO Site SpeedUp logic');
define('_WEBO_performance_plain_string', 'Do not use regular expressions');
define('_WEBO_performance_plain_string_HELP', 'Regular expressions usage damages server performance and they can be replaced with simple string operations. But in the latter case probability of incorrect HTML parsing (for invalid (X)HTML documents only) will be higher.');
define('_WEBO_performance_plain_string_EFFECT', 'CPU savings 12% in WEBO Site SpeedUp logic');
define('_WEBO_performance_cache_version', 'Cache version number');
define('_WEBO_performance_cache_version_HELP', 'Cache version defines version of all files in cache. To refresh cache on client side (in browsers) you need to change this number.');
define('_WEBO_performance_check_files', 'Don\'t check cache files existence');
define('_WEBO_performance_check_files_HELP', 'There will be no check for cache files existence with this option enabled. Cache version will be defined with option &quot;Cache version number&quot;. In this case to refresh cache files on client side (in browsers) you need to change cache version number. There will be standard cache files existence check performed with this option enabled.');
define('_WEBO_performance_check_files_EFFECT', 'CPU savings 6% in WEBO Site SpeedUp logic');
define('_WEBO_performance_uniform_cache', 'Uniform cache files for all browsers');
define('_WEBO_performance_uniform_cache_HELP', 'All browsers will receive uniform CSS, JavaScript, and HTML code. This allows you to use external caching techniques safely but this disabled a number of optimization techniques such as data:URI.');
define('_WEBO_performance_uniform_cache_EFFECT', 'WEBO Site SpeedUp compatibility with external caching engines');
define('_WEBO_performance_restore_properties', 'Restore CSS properties');
define('_WEBO_performance_restore_properties_HELP', 'All missing CSS properties which can improve CSS Sprites and data:URI creation will be searched across the CSS code. This will result in smaller cache size but may lead to huge CPU overhead in case of large amount of CSS rules to analyze.');
define('_WEBO_performance_restore_properties_EFFECT', 'Number of objects reduction by 5-10%');
define('_WEBO_performance_https', 'Separate HTTPS cache from HTTP');
define('_WEBO_performance_https_HELP', 'All HTML files requested by HTTPS (SSL connection) will be stored separately from ordinary HTML cache files. This will increase overall cache size but quarantee website consistency for different connection types.');
define('_WEBO_performance_https_EFFECT', 'Improve website consistency');
define('_WEBO_performance_delete_old', 'Days to store cache files');
define('_WEBO_performance_delete_old_HELP', 'You can restrict cache size by defining time to live for all cache files (in days). Zero value means no restriction.');
define('_WEBO_performance_delete_old_EFFECT', 'WEBO Site SpeedUp cache reduction by 20-80%');
define('_WEBO_performance_cache_engine', 'Cache engine');
define('_WEBO_performance_cache_engine_HELP', 'You can choose one of the caching engines supported by your server environment to speed the HTML caching up. All engines except file system cache records in RAM by default, this decreases access time.');
define('_WEBO_performance_cache_engine_HELP_DISABLED', 'Some engines may be not supported by your server environment.');
define('_WEBO_performance_cache_engine_EFFECT', 'CPU savings with HTML caching by 50%');
define('_WEBO_performance_cache_engine1', 'File system');
define('_WEBO_performance_cache_engine2', 'Memcached');
define('_WEBO_performance_cache_engine3', 'APC');
define('_WEBO_performance_cache_engine4', 'XCache');
define('_WEBO_performance_cache_engine5', 'Zend Platform');
define('_WEBO_performance_cache_engine6', 'Semaphores');
define('_WEBO_performance_cache_engine_options', 'Additional options');
define('_WEBO_performance_cache_engine_options_HELP', 'Please set server and port for Memcached in format server:port');
define('_WEBO_performance_scale', 'Scale HTML images');
define('_WEBO_performance_scale_HELP', 'All HTML images will be resized to smaller dimensions if latter are used in HTML code.');
define('_WEBO_performance_scale_HELP_DISABLED', 'There is no complete GD library support on your website, so HTML images scaling is impossible.');
define('_WEBO_performance_scale_EFFECT', 'Website speedup by 5-40%');
define('_WEBO_performance_scale_restriction', 'Folder for HTML images scaling');
define('_WEBO_performance_scale_restriction_HELP', 'HTML images will be scaled only within given folder. This will help to reduce CPU usage on large (10k+) array of website images. For example: /images/mainimage/m/');
define('_WEBO_performance_scale_restriction_HELP_DISABLED', 'There is no complete GD library support on your website, so HTML images scaling is impossible.');
define('_WEBO_performance_scale_restriction_EFFECT', 'Website speedup by 3-5%');

define('_WEBO_footer_text', 'Add a link to WEBO Site SpeedUp');
define('_WEBO_footer_text_HELP', 'WEBO Site SpeedUp link is required in Free Edition and can be removed in any paid edition.');
define('_WEBO_footer_image', 'Add a WEBO Site SpeedUp image');
define('_WEBO_footer_image_HELP', 'File name with WEBO Site SpeedUp logo. All allowed files are located in: &lt;WEBO Site SpeedUp path&gt;/web-optimizer/images/. If this option is empty a text defined in &quot;Text for backlink&quot; option will be shown.');
define('_WEBO_footer_link', 'Text for backlink');
define('_WEBO_footer_link_HELP', 'If option &quot;Add a WEBO Site SpeedUp image&quot; is disabled this text will be shown in a link. Otherwise is will used as a title for image.');
define('_WEBO_footer_css_code', 'Styles for backlink placement');
define('_WEBO_footer_css_code_HELP', 'These styles will be applied for WEBO Site SpeedUp link. You can define link placement, its color, background, size, etc.');
define('_WEBO_footer_spot', 'Add <code>&lt;!--WSS--&gt;</code> to HTML document');
define('_WEBO_footer_spot_HELP', '&lt;!--WSS--&gt; existence indicates that WEBO Site SpeedUp successfully parses this page. It\'s used in internal algorithms.');
define('_WEBO_footer_counter', 'Add load time counter');
define('_WEBO_footer_counter_HELP', 'Information about load time will be added to Events section if there is Google Analytics on the website installed to gather visitors stats. Please enter your Google Analytics ID (i.e. UA-123456-7) to activate this.');
define('_WEBO_footer_ab', 'A/B testing');
define('_WEBO_footer_ab_HELP', 'Given per cent of users will get non-optimized website content. All data about results will be sent to Google Analytics.');

define('_WEBO_data_uris_on', 'Apply <code>data:URI</code>');
define('_WEBO_data_uris_on_HELP', 'Background images will be converted to base64 format and included directly into CSS files for all browsers which support data:URI.');
define('_WEBO_data_uris_on_EFFECT', 'Number of objects reduction by 15-75%');
define('_WEBO_data_uris_on_HELP_DISABLED', 'It impossible to create data:URI because CSS files are not combined.');
define('_WEBO_data_uris_mhtml', 'Apply <code>mhtml</code>');
define('_WEBO_data_uris_mhtml_HELP', 'Background images will be converted to mhtml format and included directly into CSS files for all versions of Internet Explorer which don\'t support data:URI.');
define('_WEBO_data_uris_mhtml_EFFECT', 'data:URI compatibility with Internet Explorer');
define('_WEBO_data_uris_mhtml_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option &quot;Performance - Uniform cache files for all browsers&quot; enabled or CSS files are not combined.');
define('_WEBO_data_uris_separate', 'Separate images from CSS code');
define('_WEBO_data_uris_separate_HELP', 'Combined CSS code and images in base64 and mtml formats will be stored in different files. This should increase cachebility.');
define('_WEBO_data_uris_separate_EFFECT', 'Website speedup by 3-5%');
define('_WEBO_data_uris_separate_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option &quot;Performance - Uniform cache files for all browsers&quot; enabled or CSS files are not combined.');
define('_WEBO_data_uris_size', 'Maximum <code>data:URI</code> size (in bytes)');
define('_WEBO_data_uris_size_HELP', 'Images which size is greater than given number won\'t be converted to base64 format. No value or zero value means no limit.');
define('_WEBO_data_uris_size_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option &quot;Performance - Uniform cache files for all browsers&quot; enabled or CSS files are not combined.');
define('_WEBO_data_uris_mhtml_size', 'Maximum <code>mhtml</code> size (in bytes)');
define('_WEBO_data_uris_mhtml_size_HELP', 'Images which size is greater than given number won\'t be converted to mhtml format. No value or zero value means no limit.');
define('_WEBO_data_uris_mhtml_size_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option &quot;Performance - Uniform cache files for all browsers&quot; enabled or CSS files are not combined.');
define('_WEBO_data_uris_ignore_list', 'Exclude files from <code>data:URI</code> (separated by space)');
define('_WEBO_data_uris_ignore_list_HELP', 'Images listed in this option won\'t be converted to data:URI. Please provide only file names not absolute paths.');
define('_WEBO_data_uris_ignore_list_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option &quot;Performance - Uniform cache files for all browsers&quot; enabled or CSS files are not combined.');
define('_WEBO_data_uris_additional_list', 'Exclude files from <code>mhtml</code> (separated by space)');
define('_WEBO_data_uris_additional_list_HELP', 'Images listed in this option won\'t be converted to mhtml. Please provide only file names not absolute paths.');
define('_WEBO_data_uris_additional_list_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option &quot;Performance - Uniform cache files for all browsers&quot; enabled or CSS files are not combined.');

define('_WEBO_css_sprites_enabled', 'Apply CSS Sprites');
define('_WEBO_css_sprites_enabled_HELP', 'Background images will be combined with the help of CSS Sprites technique. Related CSS code will be safely modified.');
define('_WEBO_css_sprites_enabled_EFFECT', 'Number of objects reduction by 10-50%');
define('_WEBO_css_sprites_enabled_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible. Or CSS Tidy library isn\'t selected to minify CSS. Or you need to enable CSS files merging.');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Images\' format');
define('_WEBO_css_sprites_truecolor_in_jpeg_HELP', 'If you choose automated format detection possibility of any side effects in CSS Sprites images will be minimal. If you choose JPEG format rate quality/size for true color images will the best but there will be no transparency.');
define('_WEBO_css_sprites_truecolor_in_jpeg_EFFECT', 'Website size reduction by 5-20%');
define('_WEBO_css_sprites_truecolor_in_jpeg_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible. Or CSS Tidy library isn\'t selected to minify CSS. Or you need to enable CSS files merging.');
define('_WEBO_css_sprites_truecolor_in_jpeg1', 'Detect proper format automatically');
define('_WEBO_css_sprites_truecolor_in_jpeg2', 'Prefer JPEG format');
define('_WEBO_css_sprites_aggressive', '&quot;Aggressive&quot; combine mode for CSS Sprites');
define('_WEBO_css_sprites_aggressive_HELP', 'Number of CSS Sprites images and their size will be lower but this may lead to graphical artifacts on web pages.');
define('_WEBO_css_sprites_aggressive_EFFECT', 'Website size reduction by 2-3%');
define('_WEBO_css_sprites_aggressive_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible. Or CSS Tidy library isn\'t selected to minify CSS. Or you need to enable CSS files merging.');
define('_WEBO_css_sprites_extra_space', 'Add free space for CSS Sprites');
define('_WEBO_css_sprites_extra_space_HELP', 'Images in CSS Sprites will be rounded with free space to prevent side effects on web page scale in browsers. CSS Sprites file size will be a bit greater.');
define('_WEBO_css_sprites_extra_space_EFFECT', 'CSS Sprites compatibility with browsers\' scaling');
define('_WEBO_css_sprites_extra_space_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible. Or CSS Tidy library isn\'t selected to minify CSS. Or you need to enable CSS files merging.');
define('_WEBO_css_sprites_no_ie6', 'Exclude IE6');
define('_WEBO_css_sprites_no_ie6_HELP', 'IE6 will receive its own CSS file without CSS Sprites.');
define('_WEBO_css_sprites_no_ie6_EFFECT', 'CSS Sprites compatibility with Internet Explorer');
define('_WEBO_css_sprites_no_ie6_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible. Or CSS Tidy library isn\'t selected to minify CSS. Or you need to enable CSS files merging.');
define('_WEBO_css_sprites_dimensions_limited', 'Maximum width and height of images (in pixels)');
define('_WEBO_css_sprites_dimensions_limited_HELP', 'Images higher or wider than defined value won\'t be included into CSS Sprites. No value or zero value means no restriction.');
define('_WEBO_css_sprites_dimensions_limited_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible. Or CSS Tidy library isn\'t selected to minify CSS. Or you need to enable CSS files merging.');
define('_WEBO_css_sprites_sprites_limited', 'Maximum width and height of final sprites (in pixels)');
define('_WEBO_css_sprites_sprites_limited_HELP', 'Sprites\' dimensions will be restricted to defined value. No value or zero value means no restriction.');
define('_WEBO_css_sprites_sprites_limited_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_ignore', 'Exclude / include files for CSS Sprites');
define('_WEBO_css_sprites_ignore_HELP', 'All images listed below either won\'t included into CSS Sprites, or there will be included only these images.');
define('_WEBO_css_sprites_ignore_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible. Or CSS Tidy library isn\'t selected to minify CSS.');
define('_WEBO_css_sprites_ignore1', 'Exclude the following files from CSS Sprites');
define('_WEBO_css_sprites_ignore2', 'Include only the following files to CSS Sprites');
define('_WEBO_css_sprites_ignore_list', 'List of files (separated by space)');
define('_WEBO_css_sprites_ignore_list_HELP', 'Images listed in this option won\'t be included to CSS Sprites. Please provide only file names not absolute paths.');
define('_WEBO_css_sprites_ignore_list_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_html_sprites', 'Combine HTML images');
define('_WEBO_css_sprites_html_sprites_HELP', 'A lot of small HTML images can be merged together to reduce number of HTTP requests as well. In this case there is a transparent image inserted into HTML document instead of initial one (with data:URI if possible). And it has the initial image as a background.');
define('_WEBO_css_sprites_html_sprites_EFFECT', 'Number of objects reduction by 5-30%');
define('_WEBO_css_sprites_html_sprites_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_html_limit', 'Maximum width and height of HTML images (in px)');
define('_WEBO_css_sprites_html_limit_HELP', 'HTML images heigher or wider than defined number won\'t be included into CSS Sprites. No value or zero value means no restriction.');
define('_WEBO_css_sprites_html_limit_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_html_page', 'Combine images for the current page only');
define('_WEBO_css_sprites_html_page_HELP', 'HTML images can be combined for the current page only (this reduces size of the final file, but increases number of such files) or for all website pages. In the last case there will be used the only image for the whole website, but its size can be very large.');
define('_WEBO_css_sprites_html_page_EFFECT', 'WEBO Site SpeedUp cache reduction by 10-40%');
define('_WEBO_css_sprites_html_page_HELP_DISABLED', 'There is no complete GD library support on your website, so CSS Sprites creation is impossible.');

define('_WEBO_parallel_enabled', 'Distribute images');
define('_WEBO_parallel_enabled_HELP', 'All images called on web page will be automatically distributed through multiple hosts (mirrors). For example URL http://www.site.com/i/logo.png or /i/bg.jpg can be replaced with http://i1.site.com/i/logo.png and http://i2.site.com/i/bg.jpg in case if both hosts i1 and i2 are available and listed in option &quot;Allowed hosts&quot;.');
define('_WEBO_parallel_enabled_EFFECT', 'Website speedup by 15-25%');
define('_WEBO_parallel_regexp', 'Regular expression');
define('_WEBO_parallel_regexp_HELP', 'You can set your own regular expression to parse HTML pages for images for multiple hosts or CDN distribution. For example:  &lt;(img|input)[^&gt;]+(src)[^&gt;]+&gt; or &lt;(img|input|div)[^&gt;]+(data-src|[^-]src|data-thumb)[^&gt;]+&gt;. First and second parameters are used for correct image source replacement.');
define('_WEBO_parallel_regexp_EFFECT', 'Website speedup by 15-25%');
define('_WEBO_parallel_check', 'Check hosts\' availability automatically');
define('_WEBO_parallel_check_HELP', 'Available hosts will be checked automatically for images\' existence.');
define('_WEBO_parallel_css', 'Distribute CSS files');
define('_WEBO_parallel_css_HELP', 'All CSS files will be served via host defined as &quot;Host for CSS files&quot; in &quot;Combine CSS&quot; group of options.');
define('_WEBO_parallel_css_EFFECT', 'Website speedup by 5-10%');
define('_WEBO_parallel_javascript', 'Distribute JavaScript files');
define('_WEBO_parallel_javascript_HELP', 'All JavaScript files will be served via host defined as &quot;Host for JavaScript files&quot; in &quot;Combine JavaScript&quot; group of options.');
define('_WEBO_parallel_javascript_EFFECT', 'Website speedup by 10-15%');
define('_WEBO_parallel_allowed_list', 'Allowed hosts (separated by space)');
define('_WEBO_parallel_allowed_list_HELP', 'Listed hosts will be used to distribute images. Please define no more than 4 hosts.');
define('_WEBO_parallel_additional', 'Additional websites with multiple hosts (separated by space)');
define('_WEBO_parallel_additional_HELP', 'If there are several websites using images\' distribution you can use WEBO Site SpeedUp to distribute their images through all these hosts.');
define('_WEBO_parallel_additional_list', 'Hosts on these websites (separated by space)');
define('_WEBO_parallel_additional_list_HELP', 'These hosts are used to distribute images which are located on websites defined in &quot;Additional websites with multiple hosts&quot; option.');
define('_WEBO_parallel_ignore_list', 'Exclude the following files from distribution (separated by space)');
define('_WEBO_parallel_ignore_list_HELP', 'You can set a list of files (i.e. dynamic ones) to exclude from distibution logic.');
define('_WEBO_parallel_ignore_list_EFFECT', 'CDN compatibility with dynamic assets');
define('_WEBO_parallel_custom', 'CDN usage');
define('_WEBO_parallel_custom_HELP', 'You can either setup CDN usage by yourself (with settings of the current group and host for CSS/JavaScript files) or just choose one of the supported options.');
define('_WEBO_parallel_custom_EFFECT', 'Website speedup by 50-80%');
define('_WEBO_parallel_custom1', 'Manual setup');
define('_WEBO_parallel_custom2', 'Current CDN (cdn.website.com)');
define('_WEBO_parallel_custom3', 'Coral CDN (.nyud.net)');
define('_WEBO_parallel_custom4', 'WEBO CDN (weboin.ru) by NGENIX');
define('_WEBO_parallel_ftp', 'FTP access to upload files');
define('_WEBO_parallel_ftp_HELP', 'If you are using paid CDN (i.e. EdgeCast) it may be necessary to setup FTP access to upload all new assets. FTP access string must be given in the format &lt;user&gt;:&lt;password&gt;@&lt;host&gt; (or &lt;user&gt;:&lt;password&gt;@&lt;host&gt;:&lt;port&gt;). For RackSpaceCloud please use the following format &lt;user&gt;:&lt;key&gt;@RSC');
define('_WEBO_parallel_ftp_EFFECT', 'WEBO Site SpeedUp cache copatibility with the current CDN');
define('_WEBO_parallel_https', 'Host available via HTTPS');
define('_WEBO_parallel_https_HELP', 'If your website is using HTTPS, you need at least 1 domain which has SSL certificate to serve files through CDN. This host will be used to distribute all types of files with secured (HTTPS) requests.');
define('_WEBO_parallel_https_EFFECT', 'Current CDN compatibility with SSL connection');

define('_WEBO_htaccess_enabled', 'Enable <code>.htaccess</code>');
define('_WEBO_htaccess_enabled_HELP', 'This option will create (or modify) .htaccess file in website root directory. Also it creates backup version of this file. .htaccess file content depends on the other options in this group.');
define('_WEBO_htaccess_enabled_HELP_DISABLED', 'There is no support for .htaccess on your website.');
define('_WEBO_htaccess_mod_deflate', 'Use <code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_htaccess_mod_deflate_HELP', 'This is required for dynamic gzip compression. It\'s an alternative for gzip.');
define('_WEBO_htaccess_mod_deflate_HELP_DISABLED', 'There is no support for .htaccess or(and) mod_deflate or mod_filter on your website.');
define('_WEBO_htaccess_mod_gzip', 'Use <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_gzip_HELP', 'This is required for dynamic gzip compression. It\'s an alternative for deflate.');
define('_WEBO_htaccess_mod_gzip_HELP_DISABLED', 'There is no support for .htaccess, web.config or(and) mod_gzip on your website.');
define('_WEBO_htaccess_mod_expires', 'Use <code>mod_expires</code>');
define('_WEBO_htaccess_mod_expires_HELP', 'This is required for client side cache headers set.');
define('_WEBO_htaccess_mod_expires_HELP_DISABLED', 'There is no support for .htaccess, web.config or(and) mod_expires on your website.');
define('_WEBO_htaccess_mod_headers', 'Use <code>mod_headers</code>');
define('_WEBO_htaccess_mod_headers_HELP', 'This is required to support proxy servers and old browsers with correct headers.');
define('_WEBO_htaccess_mod_headers_HELP_DISABLED', 'There is no support for .htaccess or(and) mod_headers on your website.');
define('_WEBO_htaccess_mod_setenvif', 'Use <code>mod_setenvif</code>');
define('_WEBO_htaccess_mod_setenvif_HELP', 'This is required to support proxy servers and old browsers with correct headers.');
define('_WEBO_htaccess_mod_setenvif_HELP_DISABLED', 'There is no support for .htaccess or(and) mod_setenvif on your website.');
define('_WEBO_htaccess_mod_mime', 'Use <code>mod_mime</code>');
define('_WEBO_htaccess_mod_mime_HELP', 'This is required for static gzip.');
define('_WEBO_htaccess_mod_mime_HELP_DISABLED', 'There is no support for .htaccess or(and) mod_mime on your website.');
define('_WEBO_htaccess_mod_rewrite', 'Use <code>mod_rewrite</code>');
define('_WEBO_htaccess_mod_rewrite_HELP', 'This is required for static gzip or forced caching.');
define('_WEBO_htaccess_mod_rewrite_HELP_DISABLED', 'There is no support for .htaccess, web.config or(and) mod_rewrite on your website.');
define('_WEBO_htaccess_local', 'Place <code>.htaccess</code> file locally (not to Document Root)');
define('_WEBO_htaccess_local_HELP', '.htaccess / web.config file will be located in local website folder but not document root of website host.');
define('_WEBO_htaccess_access', 'Protect WEBO Site SpeedUp installation via <code>htpasswd</code>');
define('_WEBO_htaccess_access_HELP', 'This option provides additional security for WEBO Site SpeedUp installation with the help of HTTP Basic Authorization and .htaccess and .htpasswd files.');
define('_WEBO_htaccess_login', 'Login to protect WEBO Site SpeedUp with <code>.htpasswd</code>');
define('_WEBO_htaccess_login_HELP', 'To protect WEBO Site SpeedUp with .htpasswd you need to define login and password. Login is set with this option. Password is equal to WEBO Site SpeedUp installation password.');
define('_WEBO_iis_enabled', 'Enable <code>web.config</code>');
define('_WEBO_iis_local', 'Place <code>web.config</code> file locally (not to Document Root)');
define('_WEBO_iis_mod_deflate', 'Use <code>DEFLATE</code>');
define('_WEBO_iis_mod_gzip', 'Use <code>httpCompression</code>');
define('_WEBO_iis_mod_expires', 'Use <code>clientCache</code>');
define('_WEBO_iis_mod_headers', 'Use <code>HEADERS</code>');
define('_WEBO_iis_mod_setenvif', 'Use <code>SETENVIF</code>');
define('_WEBO_iis_mod_mime', 'Use <code>MIME</code>');
define('_WEBO_iis_mod_rewrite', 'Use <code>rewrite</code>');
define('_WEBO_rocket_css', 'Enable WEBO Rocket for CSS');
define('_WEBO_rocket_css_HELP', 'This will include all of your CSS files directly into HTML plus add all files to post-load with caching. The whole technique helps to improve both first and repeat view page load time.');
define('_WEBO_rocket_css_EFFECT', 'Overall load time will be reduced by 20-30%.');
define('_WEBO_rocket_javascript', 'Enable WEBO Rocket for JavaScript');
define('_WEBO_rocket_javascript_HELP', 'This will include most of your JavaScript files (except heavy libraries) directly into HTML plus add all files to post-load with caching. The whole technique helps to improve both first and repeat view page load time.');
define('_WEBO_rocket_javascript_EFFECT', 'Overall load time will be reduced by 25-40%.');
define('_WEBO_rocket_reorder', 'Put styles first');
define('_WEBO_rocket_reorder_HELP', 'All style tags will be placed before all script tags (according to CSS/JavaScript merging options).');
define('_WEBO_rocket_reorder_EFFECT', 'Possible first render speedup - 25-40%.');

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
define('_WEBO_DASHBOARD_AVAILABLE', 'Available in Standard Edition');
define('_WEBO_DASHBOARD_ALL', 'Available Blocks');
define('_WEBO_DASHBOARD_INSTALL', 'Install');
define('_WEBO_DASHBOARD_SHARE_RESULTS', 'Share results on Twitter');
define('_WEBO_DASHBOARD_SHARE_RESULTS1', 'My @wboptimizer - #WEBO Site SpeedUp - tuned to');
define('_WEBO_DASHBOARD_SHARE_RESULTS2', '@wboptimizer - #WEBO Site SpeedUp - accelerated my website by');
define('_WEBO_DASHBOARD_SHARE_RESULTS3', '@wboptimizer - #WEBO Site SpeedUp - saved for my website');
define('_WEBO_DASHBOARD_SHARE_RESULTS_TRAFFIC', 'of traffic');

/* Dashboard error */
define('_WEBO_DASHBOARD_CRITICAL', 'There is a critical issue');
define('_WEBO_DASHBOARD_CRITICAL_FAILED', 'WEBO Site SpeedUp automatic installation is failed');
define('_WEBO_DASHBOARD_CRITICAL_DO', 'Please be sure that you are <strong>not used local environment</strong> and do the following');
define('_WEBO_DASHBOARD_CRITICAL_STEP1_1', 'Open your website source files via FTP or SSH.');
define('_WEBO_DASHBOARD_CRITICAL_STEP1_2', 'Find file <code>config.webo.php</code> in WEBO Site SpeedUp installation folder');
define('_WEBO_DASHBOARD_CRITICAL_STEP1_3' , 'Open this file and change the value of constants <code>$compress_options[\'website_root\']</code> and <code>$compress_options[\'document_root\']</code> to the right one (actual location of your website and your document root). If you have no idea what there should be you can consult with your hosting provider.');
define('_WEBO_DASHBOARD_CRITICAL_STEP1_4', 'If suPHP is installed please check rights for WEBO Site SpeedUp files - they must match suPHP module settings.');
define('_WEBO_DASHBOARD_CRITICAL_STEP1_5', 'Reload this page.');
define('_WEBO_DASHBOARD_CRITICAL_STEP2_1', 'Check permissions and possible errors (i.e. via log files) while accessing the file');
define('_WEBO_DASHBOARD_CRITICAL_STEP2_2', 'Allow this file to be accessed via web (through HTTP protocol).');
define('_WEBO_DASHBOARD_CRITICAL_STEP2_3', 'If there is Smart Optimizer installed - please uninstall it.');
define('_WEBO_DASHBOARD_CRITICAL_REFER', 'If error still occurs please refer to');
define('_WEBO_DASHBOARD_CRITICAL_DOCS', 'user documentation');
define('_WEBO_DASHBOARD_CRITICAL_OR', 'or');
define('_WEBO_DASHBOARD_CRITICAL_ISSUES', 'known issues');

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
define('_WEBO_DASHBOARD_STATUS_TESTING3', 'Press &quot;Enable&quot; button when you are ready to bring WEBO&nbsp;Site&nbsp;SpeedUp into the live mode.');
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
define('_WEBO_DASHBOARD_CACHE_SCRIPTS', 'PHP scripts');
define('_WEBO_DASHBOARD_CACHE_SIZE', 'Total size');
define('_WEBO_DASHBOARD_CACHE_NUMBER', 'Number');
define('_WEBO_DASHBOARD_CACHE_REFRESH', 'Refresh cache');
define('_WEBO_DASHBOARD_CACHE_APC', 'APC');
define('_WEBO_DASHBOARD_CACHE_XCache', 'XCache');
define('_WEBO_DASHBOARD_CACHE_Memcached', 'Memcached');

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
define('_WEBO_SYSTEM_INFO', 'message');
define('_WEBO_SYSTEM_INFOS', 'messages');
define('_WEBO_SYSTEM_INFOS2', 'messages');
define('_WEBO_SYSTEM_javascript_writable', 'JavaScript folder isn\'t writable');
define('_WEBO_SYSTEM_javascript_writable_HELP', 'Please check rights for your JavaScript cache directory defined on "System Status" page ("Options" tab). You need either to switch this directory to a writable one, or to perform CHMOD 775, or CHMOD 777 for it.');
define('_WEBO_SYSTEM_css_writable', 'CSS folder isn\'t writable');
define('_WEBO_SYSTEM_css_writable_HELP', 'Please check rights for your CSS cache directory defined on "System Status" page ("Options" tab). You need either to switch this directory to a writable one, or to perform CHMOD 775, or CHMOD 777 for it.');
define('_WEBO_SYSTEM_html_writable', 'HTML folder isn\'t writable');
define('_WEBO_SYSTEM_html_writable_HELP', 'Please check rights for your HTML cache directory defined on "System Status" page ("Options" tab). You need either to switch this directory to a writable one, or to perform CHMOD 775, or CHMOD 777 for it.');
define('_WEBO_SYSTEM_config_writable', 'Configuration file isn\'t writable');
define('_WEBO_SYSTEM_config_writable_HELP', 'Please check rights for the file config.webo.php located in the WEBO Site SpeedUp directory. You need to perform CHMOD 664, or CHMOD 666 for it.');
define('_WEBO_SYSTEM_htaccess_writable', '<code>.htaccess</code> isn\'t writable');
define('_WEBO_SYSTEM_htaccess_writable_HELP', 'Please check rights for the .htaccess file located in your website root. You need to perform CHMOD 664, or CHMOD 666 for it. If there is no such file please make your website root directory writable (CHMOD 775, or CHMOD 777) or create a writable .htaccess file there.');
define('_WEBO_SYSTEM_webconfig_writable', '<code>web.config</code> isn\'t writable');
define('_WEBO_SYSTEM_webconfig_writable_HELP', 'Please check rights for the web.config file located in your website root. If there is no such file please make your website root directory writable or create a writable web.config file there.');
define('_WEBO_SYSTEM_index_writable', '<code>index.php</code> isn\'t writable');
define('_WEBO_SYSTEM_index_writable_HELP', 'Please check rights for the index.php file located in your website root. It should be writable to inject WEBO Site SpeedUp calls into it. You can leave it unwritable but you will have to include WEBO Site SpeedUp calls manually. More info is located on "System Status" page ("Install / Uninstall" tab). To make index.php writable please perform CHMOD 664, or CHMOD 666 for it.');
define('_WEBO_SYSTEM_not_active', 'WEBO Site SpeedUp doesn\'t work');
define('_WEBO_SYSTEM_not_active_HELP', 'WEBO Site SpeedUp doesn\'t participate in website optimization process. Please make sure that WEBO Site SpeedUp is [http://code.google.com/p/web-optimizator/wiki/InstallingAndUpdating installed properly]. Also check for the solution at the [http://code.google.com/p/web-optimizator/wiki/ServerSideIssues Troubleshooting section] of documentation.');
define('_WEBO_SYSTEM_curl_possibility', '<code>curl</code> isn\'t available');
define('_WEBO_SYSTEM_curl_possibility_HELP', 'There is no curl PHP extension on your web server. It is used to get external and dynamic files (to perform their merging / caching). To install curl please contact your hosting provider or system administrator. Usually it is enough to just re-install PHP with this extension enabled. [http://php.net/curl Info about curl on php.net] and [http://curl.haxx.se/libcurl/php/iis.html hints about curl installation on IIS].');
define('_WEBO_SYSTEM_gzip_possibility', '<code>zlib</code> isn\'t available');
define('_WEBO_SYSTEM_gzip_possibility_HELP', 'There is no zlib PHP extension on your web server. It is used to compress textual files "on fly" what saves about 80% of data transmitted. To install zlib please contact your hosting provider or system administrator. Usually it is enough to just re-install PHP with this extension enabled. [http://php.net/manual/en/book.zlib.php Info about zlib on php.net] and [http://php.net/manual/en/install.windows.extensions.php info about zlib extension on Windows-based environments].');
define('_WEBO_SYSTEM_gd_possibility', '<code>gd</code> isn\'t available');
define('_WEBO_SYSTEM_gd_possibility_HELP', 'There is no gd PHP extension on your web server. It is used only to prepare CSS Sprites. To install gd please contact your hosting provider or system administrator. Usually it is enough to just re-install PHP with this extension enabled. [http://php.net/manual/en/book.image.php Info about gd on php.net] and [http://php.net/manual/en/install.windows.extensions.php info about gd extension on Windows-based environments].');
define('_WEBO_SYSTEM_wordpress_cache_enabled', 'Cache in WordPress is disabled');
define('_WEBO_SYSTEM_wordpress_cache_enabled_HELP', 'To use server side caching you need to add define (\'WP_CACHE\', true); to the wp-config.php file after the string with define(\'WPLANG\', ...) or make this file writable and then disable and re-enable WEBO Site SpeedUp.');
define('_WEBO_SYSTEM_too_many_files', 'Cache is growing');
define('_WEBO_SYSTEM_too_many_files_HELP', 'You may have some unique code on your website which prevents efficient cache creation. If this issue is repeatedly shown - please re-configure WEBO Site SpeedUp to exclude unique code from caching.');
define('_WEBO_SYSTEM_gd_full_support', '<code>gd</code> is partly available');
define('_WEBO_SYSTEM_gd_full_support_HELP', 'There is gd PHP extension on your web server, but is has limited functionality. This can lead to incorrect CSS Sprites creation. To install gd with complete functions support please contact your hosting provider or system administrator. Usually it is enough to just re-install PHP with this extension enabled. See also [http://php.net/manual/en/book.image.php Info about gd on php.net] and [http://php.net/manual/en/install.windows.extensions.php info about gd extension on Windows-based environments].');
define('_WEBO_SYSTEM_yui_possibility', 'YUI Compressor isn\'t available');
define('_WEBO_SYSTEM_yui_possibility_HELP', 'There is no shell_exec function allowed on your website or java is not available. YUI Compressor is executed as a java binary and provides better (in comparison to JSMin) JavaScript files compression. To allow shell_exec function or to install java please contact your hosting provider or system administrator. Usually it is enough to enable shell_exec in PHP configuration, or to install java on your web server. [http://php.net/manual/en/function.shell-exec.php Info about shell_exec on php.net] and [http://www.java.com/en/download/help/5000010500.xml info about java installation on Linux-based environments].');
define('_WEBO_SYSTEM_google_possibility', 'Google Compiler isn\'t available');
define('_WEBO_SYSTEM_google_possibility_HELP', 'There is no shell_exec function allowed on your website or java is not available. Google Compiler is executed as a java binary and provides better (in comparison to JSMin) JavaScript files compression. To allow shell_exec function or to install java please contact your hosting provider or system administrator. Usually it is enough to enable shell_exec in PHP configuration, or to install java on your web server. [http://php.net/manual/en/function.shell-exec.php Info about shell_exec on php.net] and [http://www.java.com/en/download/help/5000010500.xml info about java installation on Linux-based environments].');
define('_WEBO_SYSTEM_hosts_possibility', 'No multiple hosts support');
define('_WEBO_SYSTEM_hosts_possibility_HELP', 'Default subdomains (img, img1, img2, img3, img4, i, i1, i2, i3, i4, image, images, assets, static, css, js) seem not to mirror your website. It is all OK with this if you are using different hosts (first four are enough) to distribute images through them. To enable subdomains to mirror your website please contact your hosting provider or system administrator.');
define('_WEBO_SYSTEM_mod_deflate', 'No <code>mod_deflate</code> + <code>mod_filter</code> support');
define('_WEBO_SYSTEM_mod_deflate_HELP', 'There is no mod_deflate, or mod_filter (or both of them) support on your website. mod_deflate + mod_filter are used to gzip resources "on fly" on an Apache2 level. To enable these modules please contact your hosting provider or system administrator. Usually they are included into Apache2 by default. [http://articles.sitepoint.com/article/mod_deflate-apache-2-0-x More info about mod_deflate]');
define('_WEBO_SYSTEM_mod_gzip', 'No <code>mod_gzip</code> support');
define('_WEBO_SYSTEM_mod_gzip_HELP', 'There is no mod_gzip support on your website. mod_gzip is used to gzip resources "on fly" on an Apache1 level. To enable this module please contact your hosting provider or system administrator. [http://articles.sitepoint.com/article/web-output-mod_gzip-apache More info about mod_gzip]');
define('_WEBO_SYSTEM_mod_headers', 'No <code>mod_headers</code> support');
define('_WEBO_SYSTEM_mod_headers_HELP', 'There is no mod_headers support on your website. mod_headers is used to leverage gzip through browsers (to exclude unsupported cases) and to disable ETag usage. To enable this module please contact your hosting provider or system administrator.  [http://www.websiteoptimization.com/speed/tweak/cache/ How to enable mod_headers] and [http://httpd.apache.org/docs/2.0/mod/mod_headers.html more info about mod_headers]');
define('_WEBO_SYSTEM_mod_expires', 'No <code>mod_expires</code> support');
define('_WEBO_SYSTEM_mod_expires_HELP', 'There is no mod_expires support on your website. mod_expires is used to add client side caching headers to all static files. To enable this module please contact your hosting provider or system administrator.  [http://www.websiteoptimization.com/speed/tweak/cache/ How to enable mod_expires] and [http://httpd.apache.org/docs/2.0/mod/mod_expires.html more info about mod_expires]');
define('_WEBO_SYSTEM_mod_mime', 'No <code>mod_mime</code> support');
define('_WEBO_SYSTEM_mod_mime_HELP', 'There is no mod_mime support on your website. mod_mime is used to provide static gzip (also with mod_rewrite) for textual files. To enable this module please contact your hosting provider or system administrator.  [http://www.debuntu.org/2006/06/15/66-how-to-enable-apache-modules-under-debian-based-system How to enable mod_mime on Ubuntu] and [http://httpd.apache.org/docs/1.3/mod/mod_mime.html more info about mod_mime]');
define('_WEBO_SYSTEM_mod_setenvif', 'No <code>mod_setenvif</code> support');
define('_WEBO_SYSTEM_mod_setenvif_HELP', 'There is no mod_setenvif support on your website. mod_setenvif is used to leverage gzip through browsers (to exclude unsupported cases). To enable this module please contact your hosting provider or system administrator. [http://www.debuntu.org/2006/06/15/66-how-to-enable-apache-modules-under-debian-based-system How to enable mod_setenvif on Ubuntu] and [http://httpd.apache.org/docs/1.3/mod/mod_setenvif.html more info about mod_setenvif]');
define('_WEBO_SYSTEM_mod_rewrite', 'No <code>mod_rewrite</code> support');
define('_WEBO_SYSTEM_mod_rewrite_HELP', 'There is no mod_rewrite support on your website. mod_rewrite is used to provide static gzip (also with mod_mime) and to provide client side caching in case of mod_expires absence. To enable this module please contact your hosting provider or system administrator. [http://www.tutorio.com/tutorial/enable-mod-rewrite-on-apache How to enable mod_rewrite] and [http://httpd.apache.org/docs/1.3/mod/mod_rewrite.html more info about mod_rewrite]');
define('_WEBO_SYSTEM_mod_symlinks', 'No <code>SymLinks</code> support');
define('_WEBO_SYSTEM_mod_symlinks_HELP', 'There is no SymLinks support on your website. SymLinks are used together with mod_rewrite to provide correct rewrite rules in case of symbolic links inside your HTML directory. Usually there is no trouble with this option absence but in a few cases it can lead to incorrect redirects. To enable this option please contact your hosting provider or system administrator. [http://www.elharo.com/blog/software-development/web-development/2006/01/02/two-tips-for-fixing-apache-problems/ More info about SymLinks]');
define('_WEBO_SYSTEM_protected_mode', 'Not protected mode');
define('_WEBO_SYSTEM_protected_mode_HELP', 'WEBO Site SpeedUp installation is not protected via .htpasswd. It is OK with such situation, but if you want additional secutiry for your website please provide .htpasswd username and password on "System Status" page ("Options" tab). [http://httpd.apache.org/docs/1.3/programs/htpasswd.html More info about .htpasswd]');
define('_WEBO_SYSTEM_cms', 'No CMS support');
define('_WEBO_SYSTEM_cms_HELP', 'WEBO Site SpeedUp does not support current CMS. You should add required calls to source files manually. Please refer to "System Status" page ("Install/Uninstall" tab) for details.');
define('_WEBO_SYSTEM_memory_limit', 'Low memory limit');
define('_WEBO_SYSTEM_memory_limit_HELP', 'There is very limited memory usage for your website. This can lead to failures on CSS Sprites or data:URI options usage. To increase this limit please contact your hosting provider or system administrator. [http://www.wallpaperama.com/forums/how-to-change-memory-limit-php-apache-server-t53.html More info about memory limit for PHP]');
define('_WEBO_SYSTEM_heavy_optimization', 'Extreme resources usage');
define('_WEBO_SYSTEM_heavy_optimization_HELP', 'Current configuration enables some heavy optimization methods which takes much system resources. If you are experiencing CPU or memory shortage, consider disabling those options. [http://code.google.com/p/web-optimizator/wiki/ServerSideIssues Learn more about system resources optimization]');
define('_WEBO_SYSTEM_heavy_optimization2', 'Significant resources usage');
define('_WEBO_SYSTEM_heavy_optimization2_HELP', 'Current configuration enables some complicated optimization methods which takes a lot of system resources. If you are experiencing CPU or memory shortage, consider disabling those options. Learn more about [http://code.google.com/p/web-optimizator/wiki/ServerSideIssues system resources optimization]');
define('_WEBO_SYSTEM_large_delay', 'Low pages creation speed');
define('_WEBO_SYSTEM_large_delay_HELP', 'Pages creation time is more than 1 second. Consider any type of HTML caching or server side optimization to reduce this value. Learn more about [http://code.google.com/p/web-optimizator/wiki/ServerSideIssues system resources optimization]');
define('_WEBO_SYSTEM_large_wss_delay', 'Low pages optimization speed');
define('_WEBO_SYSTEM_large_wss_delay_HELP', 'Pages loading time with enabled WEBO Site SpeedUp takes 2x longer than without it. Most likely this is website specific or environment specific issue. Learn more about [http://code.google.com/p/web-optimizator/wiki/ServerSideIssues system resources optimization]');
define('_WEBO_SYSTEM_apc_enabled', 'APC is enabled');
define('_WEBO_SYSTEM_apc_enabled_HELP', 'WEBO Site SpeedUp configuration save can be performed incorrectly. Please add string apc.filters="-/(.*)config(.*)\.php" to PHP configuration file. [http://www.php.net/manual/en/apc.configuration.php#ini.apc.filters Detailed info]');

/* System status */
define('_WEBO_SYSTEM_STATUS', 'Status');
define('_WEBO_SYSTEM_SETTINGS', 'Settings');
define('_WEBO_SYSTEM_UPDATES', 'Updates');
define('_WEBO_SYSTEM_NOUPDATES', 'You are using the latest version of WEBO Site SpeedUp');
define('_WEBO_SYSTEM_ROLLBACK', 'Rollback to version');
define('_WEBO_SYSTEM_INSTALL', 'Install &amp; uninstall');
define('_WEBO_SYSTEM_PHPINFO', 'PHP info');
define('_WEBO_SYSTEM_STATUS_TITLE', 'Application status');
define('_WEBO_SYSTEM_ISSUES', 'Server status');
define('_WEBO_SYSTEM_SETTINGS_TITLE', 'Application settings');
define('_WEBO_SYSTEM_UPDATES_TITLE', 'Available updates');
define('_WEBO_SYSTEM_INSTALL_TITLE', 'Install and uninstall');
define('_WEBO_SYSTEM_INSTALLED', 'WEBO Site SpeedUp is installed for');
define('_WEBO_SYSTEM_INSTALLINFO', 'Following changes were made to files of your web system during WEBO Site SpeedUp installation.');
define('_WEBO_SYSTEM_INSTALLINFO2', 'To rollback these changes press the &quot;Uninstall&quot; button (note that all WEBO Site SpeedUp files including configuration files and all cache files and will be preserved). To restore these changes anytime press &quot;Install&quot; button.');
define('_WEBO_SYSTEM_SUCCESS', 'All changes for web system source files were made successfully.');
define('_WEBO_SYSTEM_USERNAME', 'Please enter username to rectrict access to WEBO Site SpeedUp using .htaccess.');
define('_WEBO_SYSTEM_EXTERNAL_HTACCESS', 'Please enter username and password to get access to the website using HTTP Basic Authorization.');
define('_WEBO_showbeta', 'Show information about beta versions');
define('_WEBO_showbeta_HELP', 'Only stable WEBO Site SpeedUp updates are shown by default. You can enable this option to check for potentially unstable beta versions too.');

/* Dashboard options block */
define('_WEBO_DASHBOARD_OPTIONS_DISABLED', 'Disabled');
define('_WEBO_DASHBOARD_OPTIONS_BARELY', 'Barely');
define('_WEBO_DASHBOARD_OPTIONS_NORMALLY', 'Normally');
define('_WEBO_DASHBOARD_OPTIONS_FAST', 'Fast');
define('_WEBO_DASHBOARD_OPTIONS_FLYING', 'Flying');

/* Dashboard speed block */
define('_WEBO_DASHBOARD_SPEED_GAINED', 'Page Speed');
define('_WEBO_DASHBOARD_SPEED_SAVINGS', 'Savings');
define('_WEBO_DASHBOARD_SPEED_NODATA', 'No data');

/* Dashboard awards block */
define('_WEBO_DASHBOARD_AWARDS_TITLE', 'Achievements');
define('_WEBO_DASHBOARD_AWARDS', 'Website speedup achievements');
define('_WEBO_DASHBOARD_AWARDS_CURRENT', 'Current achievements');
define('_WEBO_DASHBOARD_AWARDS_GRADE', 'WEBO grade');
define('_WEBO_DASHBOARD_AWARDS_FILES', 'Files');
define('_WEBO_DASHBOARD_AWARDS_SIZE', 'Website size');
define('_WEBO_DASHBOARD_AWARDS_SPEEDUP', 'Speedup');

/* Tools pages */
define('_WEBO_TOOLS_GZIP', 'Static Gzip tool');
define('_WEBO_TOOLS_IMAGE', 'Image Optimization tool');

/* Dashboard order block */
define('_WEBO_DASHBOARD_HELP', 'Order qualified help');
define('_WEBO_DASHBOARD_HELP1', 'Any troubles with WEBO Site SpeedUp configuration?');
define('_WEBO_DASHBOARD_HELP2', 'Our engineers can help you to install and tune WEBO Site SpeedUp for your website.');
define('_WEBO_DASHBOARD_SEND', 'Send request');
define('_WEBO_DASHBOARD_ORDER', 'http://www.webogroup.com/corporate/site-speedup/');

/* Account page */
define('_WEBO_ACCOUNT_EXPIRES', 'Valid till');
define('_WEBO_ACCOUNT_LICENSEINFO', 'Free Edition can be used only on non-commercial websites (see <a href="http://www.webogroup.com/store/questions-answers/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">frequently asked questions</a> page). For commercial websites you can use one of two WEBO Site SpeedUp editions &mdash; Lite or Premium (see <a href="#wss_promo" class="wssJ">version comparison</a> page).');
define('_WEBO_ACCOUNT_LICENSEINFO2', 'License key registration is performed automatically. You just need to enter the valid key into the corresponding field and press the "Save" button. Once the license key is registred you will get information about its expiration date.');
define('_WEBO_ACCOUNT_LICENSEINFO3', 'You can ask all questions regarding WEBO Site SpeedUp license policy using <a href="http://www.webogroup.com/about/contacts/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">our contacts</a> listed on the official website.');
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
define('_WEBO_OPTIONS_APPLY', 'Make live');
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
define('_WEBO_OPTIONS_BASIC', 'Basic');
define('_WEBO_OPTIONS_ATTENTION', 'Warning!');
define('_WEBO_OPTIONS_ATTENTION2', 'Configuration change can lead to website failure. Please bring the application into <a href="#wss_system" class="wssJ">debug mode</a> before applying any changes.');
define('_WEBO_OPTIONS_TITLES_safe', 'Safe configuration');
define('_WEBO_OPTIONS_TITLES_optimal', 'Optimal configuration');
define('_WEBO_OPTIONS_TITLES_extreme', 'Extreme configuration');
define('_WEBO_OPTIONS_TITLES_user', 'User configuration');
define('_WEBO_OPTIONS_DESCRIPTIONS_safe', 'Carefully tested configuration which provides significant speedup for your website and don\'t harms it anyway.');
define('_WEBO_OPTIONS_DESCRIPTIONS_optimal', 'Provides optimal acceleration for your website but can result in slight failures on rare occasions.');
define('_WEBO_OPTIONS_DESCRIPTIONS_extreme', 'Combines all client side acceleration methods to guarantee maximum acceleration possible. This configuration must be carefully tested in debug mode because it may cause some unwanted changes in website view or its behavior.');
define('_WEBO_OPTIONS_DESCRIPTIONS_user', 'User configuration description.');
define('_WEBO_OPTIONS_TITLES_basic', 'Basic configuration');
define('_WEBO_OPTIONS_DESCRIPTIONS_basic', 'Basic complex of settings which provide balanced speedup for your website. In a few cases can be incompatible with server environment.');

/* Version comparison */
define('_WEBO_SPLASH2_COMPARISON', 'Purchase website speedup');
define('_WEBO_SPLASH2_COMPARISON_TITLE', 'Features');
define('_WEBO_SPLASH2_COMPARISON_ZERO', 'Zero');
define('_WEBO_SPLASH2_COMPARISON_DEMO', 'Trial');
define('_WEBO_SPLASH2_COMPARISON_LITE', 'Standard');
define('_WEBO_SPLASH2_COMPARISON_FULL', 'Extended');
define('_WEBO_SPLASH2_COMPARISON_FASTWEBSITE', 'Fast website');
define('_WEBO_SPLASH2_COMPARISON_ORDER', 'Order');
define('_WEBO_SPLASH2_COMPARISON_CORPORATE', 'Corporate');
define('_WEBO_SPLASH2_COMPARISON_SAAS', 'SaaS');
define('_WEBO_SPLASH2_COMPARISON_VERSION', 'Edition');
define('_WEBO_SPLASH2_COMPARISON_SUPPORT', 'Premium Support');
define('_WEBO_SPLASH2_COMPARISON_SPEEDUP', 'First view and repeat view speedup');
define('_WEBO_SPLASH2_COMPARISON_INSTALL', 'Installation and configuration');
define('_WEBO_SPLASH2_COMPARISON_QUARANTEE', 'Guaranteed speedup');
define('_WEBO_SPLASH2_COMPARISON_REPORT', 'Speedup report');
define('_WEBO_SPLASH2_COMPARISON_BASIC', 'Basic speedup features');
define('_WEBO_SPLASH2_COMPARISON_ADVANCED', 'Advanced speedup features');
define('_WEBO_SPLASH2_COMPARISON_CPU', 'Server load reduction');
define('_WEBO_SPLASH2_COMPARISON_SEO', 'Advanced SEO compatibility');
define('_WEBO_SPLASH2_COMPARISON_HTTPS', 'CDN integration');
define('_WEBO_SPLASH2_COMPARISON_PARTLY', 'Partly');
define('_WEBO_SPLASH2_COMPARISON_COMPLETE', 'Complete');
define('_WEBO_SPLASH2_COMPARISON_ANDMORE', 'and even more');
define('_WEBO_SPLASH2_COMPARISON_CPU_MS', 'ms');
define('_WEBO_SPLASH2_COMPARISON_UPTO', 'up to');
define('_WEBO_SPLASH2_COMPARISON_UPTO2', 'up to');
define('_WEBO_SPLASH2_COMPARISON_TRAFFIC', 'less traffic');
define('_WEBO_SPLASH2_COMPARISON_LOAD', 'less CPU load');
define('_WEBO_SPLASH2_COMPARISON_SAVED', 'CPU saved');
define('_WEBO_SPLASH2_COMPARISON_REQUESTS', 'less HTTP requests');
define('_WEBO_SPLASH2_COMPARISON_ACCELERATION', 'extra website speedup');
define('_WEBO_SPLASH2_COMPARISON_NOTINCLUDED', 'not included');
define('_WEBO_SPLASH2_COMPARISON_ALLBENEFITS', 'All benefits');
define('_WEBO_SPLASH2_COMPARISON_PRICE', 'Price');
define('_WEBO_SPLASH2_COMPARISON_FREE', 'Free');
define('_WEBO_SPLASH2_COMPARISON_ZEROPRICE', '$24.99');
define('_WEBO_SPLASH2_COMPARISON_LITEPRICE', '$99.99');
define('_WEBO_SPLASH2_COMPARISON_FULLPRICE', '$399');
define('_WEBO_SPLASH2_COMPARISON_UPDATE', 'Free updates');
define('_WEBO_SPLASH2_COMPARISON_WEEKS', 'Weeks');
define('_WEBO_SPLASH2_COMPARISON_MONTHS', 'Months');
define('_WEBO_SPLASH2_COMPARISON_LICENSING', 'Licensing period');
define('_WEBO_SPLASH2_COMPARISON_UNLIMITED', 'Unlimited');
define('_WEBO_SPLASH2_COMPARISON_MORE', 'For professional website speedup it\'s better to use');
define('_WEBO_SPLASH2_COMPARISON_LIVE', 'Live mode');

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
define('_WEBO_ABOUT_TEXT', '<p class="wssI0">WEBO Site SpeedUp product has been developed since March, 2009. It\'s an automated solution to speedup website load speed. It combines a lot of time-proven solutions and cutting-edge technologies to achieve exceptional client side performance for you website. All rights for WEBO Site SpeedUp belong to <a href="http://www.webogroup.com/about/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">WEBO Software</a> company. It\'s a worldwide leader in client side performance solutions development. The last company news <a href="http://blog.webogroup.com/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">are published in official blog</a>.</p><p class="wssI0">You can also participate in development or testing to make this product better. For this purpose please contact us using <a href="http://www.webogroup.com/about/contacts/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">contacts from our company website</a> or the form below. We will be glad to receive a message from you.</p><p class="wssI0">You can also support product with <a href="http://twitter.com/wboptimizer">Twitter</a>, <a href="http://www.facebook.com/pages/Web-Optimizer/183974322020">Facebook</a>, <a href="http://extensions.joomla.org/extensions/site-management/cache/10152">Joomla! Extensions Directory</a> or <a href="http://wordpress.org/extend/plugins/webo-site-speedup/">Wordpress website</a>.</p>');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_SAVED', 'Your configuration have been successfully saved.');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Required changes');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'You website based on ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ' has been patched. You can <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">check the result here</a>.');
define('_WEBO_SPLASH3_ADD', 'Now you <a href="#modify">should add the WEBO Site SpeedUp code</a> to your own PHP pages (');
define('_WEBO_SPLASH3_ADD_', '). That is much easier when only one PHP file serves every page of a website.');
define('_WEBO_SPLASH3_MODIFY', 'How to modify your PHP file(s):');
define('_WEBO_SPLASH3_TOFILE', 'To the file');
define('_WEBO_SPLASH3_TOFILE2', 'Added to the beginning of the file');
define('_WEBO_SPLASH3_TOFILE3', 'Added to the end of the file');
define('_WEBO_SPLASH3_AFTERSTRING', 'after the string');
define('_WEBO_SPLASH3_ADD2', 'add');
define('_WEBO_SPLASH3_CANTWRITE', 'Unable to write to the ');
define('_WEBO_SPLASH3_CANTWRITE2', ' directory. Please make sure the directory exists and is writable.');
define('_WEBO_SPLASH3_CANTWRITE3', 'You can usually do this from your FTP client. Just navigate to the directory, right click and look for a Properties or CHMOD option.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Can\'t write to file ');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Please make sure that the WEBO Site SpeedUp directory is readable and writable for the web server process. Otherwise make CHMOD 775 or CHMOD 777 for it.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Please make sure that the root of your website is writable for your web server process or there is a writable <code>.htaccess</code> file.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Make CHMOD 775 or CHMOD 777 for it, or create writable <code>.htaccess</code> there, or CHMOD current <code>.htaccess</code> to 664 or 777.');
define('_WEBO_SPLASH3_CONFSAVED', 'Configuration saved');
define('_WEBO_SPLASH3_CONFIGERROR', 'Unable to open the configuration file for writing. Please change the <code>config.webo.php</code> file properties to make it writable.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'You can usually do this from your FTP client. Just navigate to <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , right click the file, and look for a Properties or CHMOD option. Set to 775, 777, or "write"');

/* create .gz versions of css/js file */
define('_WEBO_GZIP_INSTALLED', 'Using this tool you can create in specified directory <code>.gz</code> versions of CSS and JS (and some other) files for static gzip usage.');
define('_WEBO_GZIP_INSTALLED2', 'Modification time (mtime attribute) of compressed files is set to modification time of the initial (source) files during gzipping. Existing <code>.gz</code> files are refreshed when modification time of initial files and exising files are different.');
define('_WEBO_GZIP_RESULTS', 'Gzip results:');
define('_WEBO_GZIP_ENTERDIRECTORY', 'Enter initial directory');
define('_WEBO_GZIP_DIRECTORY', 'Directory');
define('_WEBO_GZIP_RECURSIVE', 'Include subdirectories');
define('_WEBO_GZIP_ENTERRECURSIVE', 'Find / gzip files recursively');
define('_WEBO_GZIP_BACKUP', 'Create backup');
define('_WEBO_GZIP_ENTERBACKUP', 'For each image backup copy with .backup extension will be created');
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
define('_WEBO_GZIP_ERROR', 'Can\'t gzip file ');
define('_WEBO_GZIP_NOSUCCESS', 'Failed');

/* Image optimization */
define('_WEBO_IMAGE_INSTALLED', 'Using this tool you can decrease size of images without quality loss in any specified directory on your website. For each optimized file <code>.backup</code> version will be created during optimization process. GIF files are replaced with PNG ones if latter are smaller.');
define('_WEBO_IMAGE_INSTALLED2', 'One of the following services can be used for images optimization: <a href="http://smush.it/" rel="nofollow" class="wssJ">smush.it</a> (<a href="http://info.yahoo.com/legal/us/yahoo/smush_it/smush_it-4378.html" rel="nofollow" class="wssJ">terms of service</a>), or <a href="http://www.gracepointafterfive.com/punypng/" rel="nofollow" class="wssJ">punypng</a> (<a href="http://www.gracepointafterfive.com/punypng/about/tos" rel="nofollow" class="wssJ">terms of service</a>), or WEBO Nimblizer.');

/* CDN Sync */
define('_WEBO_TOOLS_CDN', 'CDN synchronization');
define('_WEBO_CDN_INFO' , 'This tool can sync static files on your website with their copies on your CDN. Enter directory to sync, get its files, select required files and start synchronization. You can set FTP credentials on <a href="#wss_options#multiple_hosts">CDN settings</a> tab on Options page.');
define('_WEBO_CDN_INFO2' , '<strong>Attention</strong>: getting information on files available for syncronization and syncronization itself can take a long time as remote FTP server is involved. It is not recommended to syncronize large number of subdirectories at one time.');
define('_WEBO_CDN_DISABLED' , 'To use this tool you need to set <a href="#wss_options#multiple_hosts">FTP access credentials</a> from your CDN provider.');
define('_WEBO_CDN_SYNC', 'Sync');
define('_WEBO_CDN_STATUS', 'Result');
define('_WEBO_CDN_NOACCESS0', 'Incorrect CDN access string');
define('_WEBO_CDN_NOACCESS', 'Incorrect FTP credentials, can\'t upload file ');

/* Minify for CSS / JavaScript files */
define('_WEBO_TOOLS_MINIFY', 'CSS/JavaScript minify');
define('_WEBO_MINIFY_INSTALLED', 'With this tool you can minify your CSS (with CSS Minify or CSS Tidy) or JavaScript (with JSMin, Packer, YUI Compressor, or Google Compiler) files according to global CSS / JavaScript minify options (from the active configuration). <strong>Minify is potentially dangerous!</strong> Backup versions of files will be stored with <code>.backup</code> extension.');

/* Help screen */
define('_WEBO_HELP_WELCOME', 'Welcome to WEBO Site SpeedUp');
define('_WEBO_HELP_MINIMIZE', 'Minimize');
define('_WEBO_HELP_CLOSE', 'Close');
define('_WEBO_HELP_FIRSTTIME', 'Are you first time here?');
define('_WEBO_HELP_LICENSEKEY', 'Register your license key or get a SaaS key on');
define('_WEBO_HELP_LICENSEKEY2', 'page. This allows you to use WEBO Site SpeedUp at full throttle. You can skip this step if you are going to use WEBO Site SpeedUp Free Edition.');
define('_WEBO_HELP_TUNING', 'Tune WEBO Site SpeedUp for your website using <a href="#wss_wizard" class="wssJ">Configuration wizard</a>. Just a few minutes and you will get a faster website. To get the maximum speedup you can tune the product manually on the <a href="#wss_options" class="wssJ">Settings</a> page, or you can order a qualified help of WEBO Software specialists.');
define('_WEBO_HELP_CONTROLPANEL', 'Open the <a href="#wss_dashboard" class="wssJ">Control Panel</a> page and learn more about your website. While tuning WEBO Site SpeedUp, use Debug Mode to make sure that your website looks and behaves fine. If you will face any issues with WEBO Site SpeedUp, please refer to <a href="http://code.google.com/p/web-optimizator/w/list" class="wssJ wssJ0">user documentation</a> or <a href="http://www.webogroup.com/home/support/" class="wssJ wssJ0">known issues</a>.');
define('_WEBO_HELP_LINK1', 'WEBO Software Website');
define('_WEBO_HELP_LINK2', 'Knowledge Base');
define('_WEBO_HELP_LINK3', 'Known Issues');
define('_WEBO_HELP_LINK4', 'Support');
define('_WEBO_HELP_LINK5', 'Online Store');
define('_WEBO_HELP_MEDIA', 'Video tutorials');
define('_WEBO_HELP_FEATURES', 'New Features');
define('_WEBO_HELP_FEATURES_LIST', '<li class="wssO8">Better cache refresh</li><li class="wssO8">HTML Sprites</li><li class="wssO8">Safe JavaScript combine</li><li class="wssO8">Cache expiration timeframe</li>');
define('_WEBO_HELP_FEATURES_ALL', 'All features');
define('_WEBO_HELP_FEATURES_BLOG', 'Official blog');
define('_WEBO_HELP_HELP', 'Quick Help');

/* Awards page */
define('_WEBO_AWARDS_INTRO', 'You have achieved some results during website acceleration and have received an optimization award from WEBO Site SpeedUp. You can achieve greater if you follow website performance optimization advices. You can always clarify your website acceleration with <a href="http://webopulsar.com/" class="wssJ">WEBO Pulsar</a> service (quick registration is required).');
define('_WEBO_AWARDS_TOP', 'Combined YSlow + Page<br/>Speed + WEBO grade');
define('_WEBO_AWARDS_TOP_INFO', '<a href="http://developer.yahoo.com/yslow/" class="wssJ" rel="nofollow">YSlow</a>, <a href="http://code.google.com/speed/page-speed/" class="wssJ" rel="nofollow">Page Speed</a>, and <a href="http://webo.in/about/" class="wssJ">WEBO</a> grades are independent website load speed evaluations. Higher grade indicates higher website performance.');
define('_WEBO_AWARDS_TOP_01', 'To increase this grade try to tune options in groups ');
define('_WEBO_AWARDS_TOP_12', 'To increase this grade try to tune options in groups ');
define('_WEBO_AWARDS_TOP_23', 'To increase this grade try follow YSlow, Page Speed, or WEBO advices or tune options in groups ');
define('_WEBO_AWARDS_MIDDLE', 'Relative decrease<br/>in website size');
define('_WEBO_AWARDS_MIDDLE_INFO', 'Lighter website loads faster for all users, regardless their Internet connection. Website decrease in size is calculated with <a href="http://webopulsar.com/">WEBO Pulsar</a> service.');
define('_WEBO_AWARDS_MIDDLE_01', 'To reduce website size you need to enable options in groups ');
define('_WEBO_AWARDS_MIDDLE_12', 'To reduce website size you need to enable options in groups ');
define('_WEBO_AWARDS_MIDDLE_23', 'To reduce website size you need to enable options in groups ');
define('_WEBO_AWARDS_BOTTOM', 'Relative website<br/>speedup');
define('_WEBO_AWARDS_BOTTOM_INFO', 'Website load speed is one of the most important factors holding website visitors. Website speedup os calculated with <a href="http://webopulsar.com/">WEBO Pulsar</a> service.');
define('_WEBO_AWARDS_BOTTOM_01', 'To speed your website up you need to enable options in groups ');
define('_WEBO_AWARDS_BOTTOM_12', 'To additionally speed your website up you need to enable options in groups ');
define('_WEBO_AWARDS_BOTTOM_23', 'To additionally speed your website up you need to enable options in groups ');
define('_WEBO_AWARDS_TAIL', 'Number of objects<br/>per page');
define('_WEBO_AWARDS_TAIL_INFO', 'Number of objects play an important role in website acceleration. Every HTTP request can waste a lot of time for your visitors.');
define('_WEBO_AWARDS_TAIL_01', 'To reduce number of objects your need to tune options in groups ');
define('_WEBO_AWARDS_TAIL_12', 'To reduce number of objects your need to tune options in groups ');
define('_WEBO_AWARDS_TAIL_23', 'To reduce number of objects your need to tune options in groups ');
define('_WEBO_AWARDS_CIRCLE', 'WEBO Site SpeedUp<br/>options usage');
define('_WEBO_AWARDS_CIRCLE_INFO', 'WEBO Site SpeedUp allows you to easily and flexibly manage your website load speed. Website speedup skills indicate a high professional level of developer.');
define('_WEBO_AWARDS_CIRCLE_01', 'To increase the application usage you need to enable options in groups ');
define('_WEBO_AWARDS_CIRCLE_12', 'To increase the application usage you need to enable options in groups ');
define('_WEBO_AWARDS_CIRCLE_23', 'To increase the application usage you need to enable options in groups ');
define('_WEBO_AWARDS_LEVEL1', 'Novice');
define('_WEBO_AWARDS_LEVEL2', 'Master');
define('_WEBO_AWARDS_LEVEL3', 'Guru');
define('_WEBO_AWARDS_CHOOSE', 'Choose your award');
define('_WEBO_AWARDS_SIZE', 'Size');
define('_WEBO_AWARDS_COLOR', 'Image');
define('_WEBO_AWARDS_COLOR1', 'Basic');
define('_WEBO_AWARDS_COLOR2', 'Innovator');
define('_WEBO_AWARDS_COLOR3', 'Optimizer');
define('_WEBO_AWARDS_COLOR4', 'Promoter');
define('_WEBO_AWARDS_COLOR5', 'Rationalizer');
define('_WEBO_AWARDS_COLOR6', 'Integrator');
define('_WEBO_AWARDS_CODE', 'Website code');
define('_WEBO_AWARDS_CODE1', 'HTML code');
define('_WEBO_AWARDS_CODE2', 'BB code');
define('_WEBO_AWARDS_CODE3', 'Code for blog');
define('_WEBO_AWARDS_CODE4', 'Twitter');
define('_WEBO_AWARDS_GENERAL', 'Awards <a href="http://www.webogroup.com/home/site-speedup/">WEBO Site SpeedUp</a>');
define('_WEBO_AWARDS_BACK', 'Preview background');
define('_WEBO_AWARDS_TWITTER', 'My #website #performance achievements (with @wboptimizer / #WEBO Site SpeedUp)');
define('_WEBO_AWARDS_RESULT', 'Website speedup results');
define('_WEBO_AWARDS_SENSE', 'What does it mean');
define('_WEBO_AWARDS_TEXT1', 'Achievements mentioned above indicate that website');
define('_WEBO_AWARDS_TEXT2', 'has been accelerated, and now its pages are faster and more qualitative.');
define('_WEBO_AWARDS_TEXT3', 'Website load speed is very important both for website visitors (as far as it affects the website confidence) and search engines (for example Google counts this parameter).');
define('_WEBO_AWARDS_OWN', 'Build your own rocket');
define('_WEBO_AWARDS_TEXT4', 'You can easily achieve the same or even better result and make your website faster than lightning.');
define('_WEBO_AWARDS_TEXT5', 'All what you need is to <a href="http://www.webogroup.com/home/download/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=webo.awards">download</a> and tune for your website the acceleration solution &mdash; <a href="http://www.webogroup.com/home/site-speedup/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=webo.awards">WEBO Site SpeedUp</a>.');
define('_WEBO_AWARDS_TEXT6', '<a href="http://www.webogroup.com/ru/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=webo.awards">WEBO Software</a> is a world-wide leader in acceleration of websites of any complexity. Its main product &mdash; WEBO Site SpeedUp &mdash; is the most complete solution to ensure high performance of your websites.');
define('_WEBO_AWARDS_RIGHTS', 'All rights reserved.');

/* SaaS variables */
define('_WEBO_SAAS_DAILY', 'Daily payments');
define('_WEBO_SAAS_NODAILY', 'No payments');
define('_WEBO_SAAS_BALANCE', 'Balance');
define('_WEBO_SAAS_TITLE', 'Balance overview');
define('_WEBO_SAAS_CURRENT', 'Current balance');
define('_WEBO_SAAS_CURRENT_HELP', 'You current balance for WEBO Site SpeedUp. It decreases every day according to your current set of options.');
define('_WEBO_SAAS_VALID', 'Funds sufficient');
define('_WEBO_SAAS_VALID_HELP', 'Here you can see how long can the current set of options can be used with your balance.');
define('_WEBO_SAAS_EXPIRED', 'Funds not sufficient');
define('_WEBO_SAAS_EXPIRED_HELP', 'Balance must be positive to enable paid options. Please increase your balance.');
define('_WEBO_SAAS_FOR', 'for');
define('_WEBO_SAAS_DAY', 'day');
define('_WEBO_SAAS_DAYS', 'days');
define('_WEBO_SAAS_DAYS2', 'days');
define('_WEBO_SAAS_TILL', 'till');
define('_WEBO_SAAS_CODE', 'Enter code to increase balance');
define('_WEBO_SAAS_CODE_HELP', 'After purchasing WEBO Site SpeedUp SaaS module please enter its code below. Your balance will be increased by the module value.');
define('_WEBO_SAAS_ADD', 'Add funds');
define('_WEBO_SAAS_EFFECT', 'Casted effect');
define('_WEBO_SAAS_ERROR', 'Code is incorrect');
define('_WEBO_SAAS_SUCCESS', 'Code has been activated');

/* Wizard variables */
define('_WEBO_WIZARD_TITLE', 'Configuration Wizard');
define('_WEBO_WIZARD_STEP1', 'Automatic tuning');
define('_WEBO_WIZARD_STEP2', 'Manual tuning');
define('_WEBO_WIZARD_STEP3', 'Finish');
define('_WEBO_WIZARD_NOTE', 'Please check accelerated website. Is it OK?');
define('_WEBO_WIZARD_PREVIEW', 'Website preview');
define('_WEBO_WIZARD_STEP11', 'Environment analisys');
define('_WEBO_WIZARD_STEP11_INFO', 'WEBO Site SpeedUp is automatically testing your website environment to find optimal acceleration algorithms.');
define('_WEBO_WIZARD_STEP12', 'CSS Optimization');
define('_WEBO_WIZARD_STEP12_INFO', 'CSS files are being combined, minified, and gzipped to speed the website in every browser.');
define('_WEBO_WIZARD_STEP122', 'CSS gzip');
define('_WEBO_WIZARD_STEP13', 'JavaScript Optimiation');
define('_WEBO_WIZARD_STEP13_INFO', 'JavaScript files are being combined, minified, and gzipped to decrease website loading time.');
define('_WEBO_WIZARD_STEP132', 'JavaScript gzip');
define('_WEBO_WIZARD_STEP14', 'HTML Optimization');
define('_WEBO_WIZARD_STEP14_INFO', 'HTML code is being minified and gzipped, also HTML comments are being striped out.');
define('_WEBO_WIZARD_STEP142', 'HTML gzip');
define('_WEBO_WIZARD_STEP15', 'data:URI');
define('_WEBO_WIZARD_STEP15_INFO', 'The website is being checked for data:URI and mhtml technologies support to reduce number of CSS images.');
define('_WEBO_WIZARD_STEP16', 'CDN Configuration');
define('_WEBO_WIZARD_STEP16_INFO', 'Static files distribution settings are being calculated and CDN is being tuned.');
define('_WEBO_WIZARD_STEP17', 'CSS Sprites');
define('_WEBO_WIZARD_STEP17_INFO', 'The website is being checked for CSS Sprites technology support to reduce number of HTML images.');
define('_WEBO_WIZARD_STEP18', 'Unobtrusive JavaScript');
define('_WEBO_WIZARD_STEP18_INFO', 'The website is being checked for delayed loading and unobtrusive JavaScript techniques support.');
define('_WEBO_WIZARD_STEP21', 'Automatic tuning completed');
define('_WEBO_WIZARD_STEP21_INFO', 'Do you want to skip to the end of tuning or continue manuall tuning?');
define('_WEBO_WIZARD_STEP211', 'Skip the manual tuning');
define('_WEBO_WIZARD_STEP211_HELP', 'Some unimportant configuration steps will be skipped.');
define('_WEBO_WIZARD_STEP212', 'Continue the manual tuning');
define('_WEBO_WIZARD_STEP212_HELP', 'Manual tuning will allow WEBO Site SpeedUp work more effectively on your website. You will also learn about optimization methods left for manual tuning.');
define('_WEBO_WIZARD_STEP22', 'Server Side Caching');
define('_WEBO_WIZARD_STEP22_INFO', 'Server side caching decreases delay before HTML pages are sent to website visitors, but some dynamic content can become unavailable with this method.');
define('_WEBO_WIZARD_STEP221', 'Don\'t apply server side caching');
define('_WEBO_WIZARD_STEP221_HELP', 'There is a dynamic content on the website (such as shopping cart or personal account). Different visitors see website pages differently.');
define('_WEBO_WIZARD_STEP222', 'Apply server side caching');
define('_WEBO_WIZARD_STEP222_HELP', 'There are no dynamic blocks of content on the website (such as shopping cart or personal account). All pages looks idetical for every website visitor.');
define('_WEBO_WIZARD_STEP23', 'Gain even more speedup');
define('_WEBO_WIZARD_STEP23_INFO', 'Some of the other WEBO Site SpeedUp options can still be manually tuned on an Options page when Configuration Wizard is finished.');
define('_WEBO_WIZARD_STEP31', 'Tuning completed');
define('_WEBO_WIZARD_STEP31_INFO', 'There is website acceleration');
define('_WEBO_WIZARD_STEP31_INFO2', 'To achieve more website speedup you can configure WEBO Site SpeedUp manually on the page');
define('_WEBO_WIZARD_STEP31_INFO3', 'send request to WEBO Software');
define('_WEBO_WIZARD_STEP31_INFO4', 'Our engineers will perform paid manual configuration and will help you get maximum acceleration for your website.');
define('_WEBO_WIZARD_FROM', 'from');
define('_WEBO_WIZARD_TO', 'to');
define('_WEBO_WIZARD_STEP31_LIST', 'Can\'t tune the following methods:');
define('_WEBO_WIZARD_NEXT', 'Next');
define('_WEBO_WIZARD_SAVE', 'Enable WEBO Site SpeedUp');
define('_WEBO_WIZARD_ORDER', 'http://www.webogroup.com/promo/improve-website-speed/?utm_source=product&utm_medium=internal&utm_campaign=wss.promo');

define('_WEBO_LICENSE_EXPIRED', 'Please purchase full version!');

define('_WEBO_WELCOME_LETTER', 'Good day,

Thank you for installing WEBO Site SpeedUp on the website ###WEBSITE###. We are glad that you are aware of the influence of website speed to your business, and that you do care about customers\' expectations about your website performance.

But must warn you in case of misconfiguration WEBO Site SpeedUp website may stop working.

If you have website broken after misconfiguration, please do not worry, WEBO Site SpeedUp does not change the source code of your website and does not alter the database. Even if the backend of the site is unavailable, the product can be disabled very easy:

* Restore .htaccess file in the root directory of your website, or just delete all the statements between comments # Web Optimizer from it. The backup file is located in the same directory and it is called .htaccess.backup.
* Open the file ###FOLDER###config.webo.php and change the $compress_options[\'active\'] with "1" to "0".

WEBO Site SpeedUp is just a tool. The result depends on how it is configured. Different server environments require different settings. CSS and JavaScript features also impose restrictions on the methods for speeding your website up.

A brief product guide

1. Prepare for work.
* Back up your website and make sure that during website acceleration there won\'t be any other work. So if something goes wrong, you can always go back to the stable version of the website.
* Prepare tools for web applications debugging. We recommend that to use for this purpose with the Firefox browser add-ons:
	o Firebug http://getfirebug.com/
	o YSlow http://developer.yahoo.com/yslow/
	o PageSpeed http://code.google.com/speed/page-speed/docs/extension.html
* Make a list of all the key pages and site features. It is necessary to achieve maximum performance of these pages, of course without any damage to their functionality.
* Collect information about existing problems (problems of layout, JavaScript errors, etc.). If after the website acceleration with WEBO Site SpeedUp will have these problems, you will know their source.
* Check the key pages using the service http://www.webpagetest.org/ retaining links to reports, so that you can return to them later. Check is necessary to simulate typical visitors to the website from its key location, so please perform the first and repeat page load, and make the set of 5-10 tests to obtain a representative sample. The most important parameters that need your attention are: server response time, start render time, rendering time, complete load time, and the webpage size.
* With the help of YSlow or PageSpeed identify the main problems with the download speed. Most often the problems are related to the lack of compression of text files, absence of caching, large number of files. All these problems can be easily solved with WEBO Site SpeedUp.

2. Install WEBO Site SpeedUp
* Before installing and setting up please disable any 3rd-party solutions which improve your website performance (the files combine, caching, CDN files distribution and so on). Such 3rd-party solutions can cause malfunction of WEBO Site SpeedUp product.
* Install instructions. The most frequently encountered problems during the installation are described in these relevant sections of the manual.
	o http://www.webogroup.com/home/site-speedup/installation/
	o http://code.google.com/p/web-optimizator/wiki/IntegrationWithWebsite?wl=en
* If you are aware of the problems in the current version of WEBO Site SpeedUp, try to upgrade to the latest beta version on the System Status tab in the product admin interface.
* After a successful installation go to the product admin interface, open the System Status tab and check that there is no error messages. Also pay attention to info and warnings. They can be useful when configuring the module.
* After installation the product (in disabled mode) does not affect the performance of the website and website admin panel.
* Open the Personal Data Module WEBO Site SpeedUp and enter your license key. You can configure the program in demo mode, but after the free period of the product will be suspended.

3. Tune WEBO Site SpeedUp
NB: After each step please save your configuration settings and check the website work on all the key pages (layout problems, JavaScript errors, key functions performance), by enabling the product or by using the debug mode, i.e. opening the website with the GET parameter web_optimizer_debug=1, for example: http://###WEBSITE###/?web_optimizer_debug=1.
Note that in debug mode the product does not change website files, including .htaccess file, as well there is  no HTML-caching, so some changes (gzip compression, client and server caching) will be visible only after the product is enabled.

* On the Settings page, create a new configuration, save it, make it active, but do not enable the product.
* On the tab .htaccess check that there are all available Apache modules included. The use of these modules simplifies setting up the product and makes it easy to achieve optimum speed of the site. If some modules are missing, please contact your hosting with a request to add the absent module(s). Note that if a website runs any other web servers besides Apache, these changes may not have any effect.
* On the tab client side caching if caching of static files on the website has not yet done, turn on the flags for the required file types. Note that the caching of HTML files and external files can lead to malfunction of the website, if these files are changed dynamically (for example, if the website has a back-end or some pages are displayed differently for different users).
* On the tab Gzip include the types of files that are not yet compressed.
* On the tab Combine CSS files select the appropriate way to merge your website CSS files. In most cases the best is to combine all your CSS code inside the head tag including inline code and external files. Combined files are displayed by default on the page on the website instead of the first part of the code which is included in the merged file.
* On the tab Combine JavaScript tab select the proper JS merging options. JS code in merged file corresponds exactly to the original order on the page, so the best option - to merge all the code in the head tag. But note that if the JavaScript code contains unique values for different users, such code regions should be excluded from the union to WEBO Site SpeedUp not create a unique integrated cache files for each new user the site. Usually, this only slows down the loading. Use the option to exclude files or embedded code from merging, as well as the ability to move the combined file to the end of the head. For a better understanding of the product behavior you can compare the HTML source code in case of different set of options. Be sure to check that no violation of code due to JavaScript code merging and there are no new JavaScript bugs.
* On the tab Minify configure options to remove redundant code (comments, line breaks, etc.). The most stable option is to minimize the CSS by using regular expressions, JavaScript with simple minimization (JSMin) and HTML. If you have any issues with this you can simply disable the minimization. Enabled gzip is sufficient to reduce the size of text files, so minify is only an additional tool to perform this.
* On the tab data:URI enable the option data:URI (the substitution of images in the CSS code to reduce the number of requests to the server). The optimal maximum size for these images is 1000-3000 bytes. Make sure that the size of CSS files with the contained images did not increase by more than 20-50%, otherwise the start of page rendering can increase significantly.
* On the tab CSS Sprites select the most optimal scheme of combining images produced by the CSS and HTML code. Combining a large number of images may require large memory and lead to unusable website. Exclude large images from CSS Sprites merging by size or by file name, or select only the images you want by specifying their file names.
* On the tab Server side cache set the cache lifetime and enable caching. Use this feature with caution and be sure to check the operation of dynamic pages, if necessary exclude them from the server\'s cache. Otherwise, the site might not work properly.
* If you purchased a CDN subscription or have your own servers to distribute static content, set the CDN on the eponymous tab.
* If the website contains advertising blocks or counters, or some other 3rd party JavaScript code, which blocks web pages loading, include the necessary functions on the tab Unobtrusive JavaScript.
* Do not forget to check the website after each step of this job. With the use of YSlow or PageSpeed make sure that enabled options yield the desired effect. If you have problems so it will be easier to determine what settings are chosen wrong and lead to the malfunction of the website.

4. Check the result
* Enable WEBO Site SpeedUp product and perform the final check of all the key pages and website features in several major browsers (IE8, Firefox, and Safari).
* Re-check the page in the service http://www.webpagetest.org/, compare the results with the results of the first tests.
* Re-check the page using YSlow and PageSpeed.
* If there are any problems associated with the speed of the site or with WEBO Site SpeedUp still not resolved, go back to configure the product.
* Read the memo on working with WEBO Site SpeedUp.

Frequently asked questions
1. We have changed the CSS code or JavaScript code into the source files, but do not see the changes on the site. Why?
Typically, the optimized CSS and JavaScript files in cache are not automatically updated when the content of the source files is changed in order to save server resources.
To apply the changes please add an arbitrary parameter for such files (for example, today\'s date or a version of the file, i.e. to replace the file a.css with a.css?v=12), in this case the code is automatically updated in the cache on the server and the client browser, which has already visited the site.
To refresh the cache on the server, open the Control Panel WEBO Site SpeedUp and click Refresh cache. In this case, you seem to manually update the cache in the browser (in most browsers this is done using CTRL + F5).

2. We introduce a new design and new features on the website and CSS and JavaScript code is being updated frequently. Constantly drop cache is very inconvenient. What should I do?
Disable the product on the Control Panel of WEBO Site SpeedUp for the upgrade period, or use a GET-parameter web_optimizer_disabled=1 for the test page with a disabled product, for example:
http://###WEBSITE###/?web_optimizer_disabled=1

3. What if we want to make sure that the new design and new features will be compatible with WEBO Site SpeedUp?
Disable the product on the Control Panel of WEBO Site SpeedUp and use GET-parameter web_optimizer_debug=1 for testing with the product in debug mode.

4. Some of the pages of the accelerated website is slower than the others (though faster than before the WEBO Site SpeedUp installation). Why not?
Likely server side caching is enabled, which greatly increases the speed web pages appearance on the screen, but in some situations it may not work. Possible reasons for this:
* Page has never been opened since the last WEBO Site SpeedUp cache clean-up. In this case, the reopening of the page happens faster.
* The page was opened, and automatically cached, but the cache has expired. Usually, this period ranges from several hours to several days. In this case, the reopening of the page happens faster.
* There are obstacles to cache pages, such as you are logged on the site are on the cart page or the checkout page, etc. When the pages that are on the same address should be given a different content for different users, server caching for a number of CMS can not work.

5. We changed the text of pages, but do not see the changes on the website.
It is likely server side caching is enabled. Open the Control Panel of WEBO Site SpeedUp and click Refresh cache.

6. We found the problem on site and we think that the reason may be WEBO Site SpeedUp.
Disable the product and try to reproduce the problem. If the problem is not reproduced (with disabled product), please report the problem to us at support@webo.name.

7. After turning WEBO Site SpeedUp on website was unavailable? What should I do?
You should disable WEBO Site SpeedUp. All optimization options are automatically canceled. If disabling the product via the control panel is not possible, follow these two steps:
Open the file ###FOLDER###config.webo.php and change the $compress_options[\'active\'] with "1" to "0".
Restore the original .htaccess file in the root directory of your website from a file .htaccess.backup.

Technical support
If you want a guaranteed result, write to sales@webo.name and we will send a detailed report on the possible acceleration and calculate the cost of the work.');
?>