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
define('_WEBO_GENERAL_DEMOVERSION', 'Community Edition');
define('_WEBO_GENERAL_BUY', 'Buy now');
define('_WEBO_GENERAL_PREMIUM', 'Premium');
define('_WEBO_GENERAL_EDITION', 'Edition');

/* lang menu */
define('_WEBO_GENERAL_LANGUAGE', 'Choose language');
define('_WEBO_GENERAL_ru', 'Русский');
define('_WEBO_GENERAL_de', 'Deutsch');
define('_WEBO_GENERAL_es', 'Español');
define('_WEBO_GENERAL_ua', 'Українська');
define('_WEBO_GENERAL_en', 'English');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Hmmm...we have a problem');
define('_WEBO_ERROR_ERROR', 'Oopps! Something went wrong');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Enter your login details');
define('_WEBO_LOGIN_LOGIN', 'Login');
define('_WEBO_LOGIN_INSTALLED', 'You have already installed WEBO Site SpeedUp ');
define('_WEBO_LOGIN_INSTALLED2', ' to this website. Please enter your login details below to get access to all settings:');
define('_WEBO_LOGIN_INSTALLED3', '. Please press \'Next\' to get access to all settings.');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>Attention:</strong> can\'t find result of WEBO Site SpeedUp\'s efforts on your website. Please check its calls existence in your web system source files or install WEBO Site SpeedUp once more.');
define('_WEBO_LOGIN_EFFICIENCY_KB', 'Kb');
define('_WEBO_LOGIN_EFFICIENCY_S', 's');
define('_WEBO_LOGIN_USERNAME', 'Username');
define('_WEBO_LOGIN_ENTERLOGIN', 'Enter your username');
define('_WEBO_LOGIN_PASSWORD', 'Password');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Enter password');
define('_WEBO_LOGIN_LICENSE', 'License key');
define('_WEBO_LOGIN_ENTERLICENSE', 'Enter your license key');
define('_WEBO_SPLAHS1_PROTECTED', 'Protected mode');
define('_WEBO_SPLAHS1_PROTECTED2', 'WEBO Site SpeedUp installation is safely protected. You can configure it once more.');
define('_WEBO_LOGIN_EMAIL', 'E-mail');
define('_WEBO_LOGIN_ENTEREMAIL', 'Please enter your e-mail.');
define('_WEBO_LOGIN_EMAILNOTICE', 'This e-mail will be used for information about urgent updates, greetings, and special offers.');
define('_WEBO_LOGIN_ALLOW', 'Allow to use my data about optimization results');
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
define('_WEBO_LOGIN_UNINSTALL', 'To remove WEBO Site SpeedUp from your system please enter username and password and click <strong>Uninstall</strong>.');
define('_WEBO_LOGIN_UNINSTALL2', 'WEBO Site SpeedUp can be simply disabled for your website. Just delete it.');
define('_WEBO_LOGIN_UNINSTALLME', 'Uninstall WEBO Site SpeedUp');
define('_WEBO_LOGIN_FAILED', 'Login failed');
define('_WEBO_LOGIN_ACCESS', 'You need to be logged in to view this page');
define('_WEBO_LOGIN_LOGGED', 'Logged you in');
define('_WEBO_SPLASH1_CLEAR', 'Clear cache');
define('_WEBO_SPLASH1_CLEAR_CACHE', 'To clear WEBO Site SpeedUp cache please enter username and password and press <strong>Clear cache</strong>. ');
define('_WEBO_SPLASH1_CLEAR_CACHE2', 'All saved versions of generated files will be deleted from the cache folder.');
define('_WEBO_CLEAR_UNABLE', 'Sorry, can\'t delete a number of files from the cache directory');
define('_WEBO_CLEAR_SUCCESSFULL', 'All files in cache directories have been deleted');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Installation - set password');
define('_WEBO_NEW_PROTECT', '<p class="wssI">Please enter password to protect this installation. <strong>Community Edition</strong> requires no license key to be installed.</p><p class="wssI">Before installation please check that root <code>.htaccess</code> and source files of your web system are writable (during installation WEBO Site SpeedUp also creates backup of your files).</p><p class="wssI">WEBO Site SpeedUp can check all functions of your server and complete installation automatically. For this option please press <strong>"Next"</strong>. On complete you can change any settings using this administative interface.</p><p class="wssI"><a href="http://code.google.com/p/web-optimizator/wiki/StandaloneInstallation?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">WEBO Site SpeedUp installation process</a></p>');
define('_WEBO_NEW_USERDATA', 'Your username and password');
define('_WEBO_NEW_ENTER', 'Enter your password for installation');
define('_WEBO_NEW_ORDERINSTALLATION', 'Order WEBO Site SpeedUp installation and configuration for your website');
define('_WEBO_NEW_NOSCRIPT', 'For correct work JavaScript must be enabled!');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Uninstall');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'Uninstallation');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Thank you for using <a href="http://www.web-optimizer.us/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">WEBO Site SpeedUp</a>. You can install it once more later by visiting <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">WEBO Site SpeedUp page</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Feel free to visit <a href="http://www.web-optimizer.us/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">WEBO Site SpeedUp website</a> and submit <a href="http://code.google.com/p/web-optimizator/issues/list?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">any related issues</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Now you can return back to <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">your website</a>.');
define('_WEBO_SPLASH1_NEXT', 'Next');
define('_WEBO_SPLASH1_BACK', 'Back');
define('_WEBO_SPLASH1_EXPRESS', 'Express install');

/* Change password */
define('_WEBO_PASSWORD_TITLE', 'Change password');
define('_WEBO_PASSWORD_INSTALLED', 'There is WEBO Site SpeedUp installed for the current website. You can change password to access to its functions: Settings changing, Cache clean-up, Upgrade, Disable and Delete.');
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
define('_WEBO_SPLASH2_CACHE', 'Cache Directories');
define('_WEBO_SPLASH2_CACHE_JS', 'Your JavaScript will be cached in');
define('_WEBO_SPLASH2_CACHE_CSS', 'Your CSS will be cached in');
define('_WEBO_SPLASH2_CACHE_HTML', 'Your HTML will be cached in');
define('_WEBO_SPLASH2_WEBSITEROOT', 'Website is located in');
define('_WEBO_SPLASH2_DOCUMENTROOT', 'Host points to (document root)');
define('_WEBO_SPLASH2_HOST', 'Website host (to include before static resources), i.e. site.com');
define('_WEBO_SPLASH2_SPACE', 'Please separate with space:');
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
define('_WEBO_external_scripts_pass', 'Password (to access via HTTP Basic Authorization)');

define('_WEBO_combine_css', 'Combine CSS files');
define('_WEBO_combine_css_HELP', '');
define('_WEBO_combine_css1', 'Don\'t combine CSS files');
define('_WEBO_combine_css2', 'Combine only CSS included in tag <code>&lt;head&gt;</code>');
define('_WEBO_combine_css3', 'Combine all CSS in tags <code>&lt;head&gt;</code> and <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_css', 'Enable external styles merging');
define('_WEBO_external_scripts_css_HELP', '');
define('_WEBO_external_scripts_css_inline', 'Enable inline styles merging');
define('_WEBO_external_scripts_css_inline_HELP', '');
define('_WEBO_minify_css_file', 'Combined CSS file name');
define('_WEBO_minify_css_file_HELP', '');
define('_WEBO_external_scripts_additional_list', 'Exclude CSS file(s) from merging (separate by space)');
define('_WEBO_external_scripts_additional_list_HELP', '');
define('_WEBO_external_scripts_include_code', 'Include CSS code to all files');
define('_WEBO_external_scripts_include_code_HELP', '');

define('_WEBO_minify_javascript', 'Combine JavaScript files');
define('_WEBO_minify_javascript_HELP', '');
define('_WEBO_minify_javascript1', 'Don\'t combine JavaScript files');
define('_WEBO_minify_javascript2', 'Combine only JavaScript included in tag <code>&lt;head&gt;</code>');
define('_WEBO_minify_javascript3', 'Combine all JavaScript in tags <code>&lt;head&gt;</code> and <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_inline', 'Enable inline JavaScript merging');
define('_WEBO_external_scripts_inline_HELP', '');
define('_WEBO_external_scripts_on', 'Enable external JavaScript merging');
define('_WEBO_external_scripts_on_HELP', '');
define('_WEBO_minify_javascript_file', 'Combined JavaScript file name');
define('_WEBO_minify_javascript_file_HELP', '');
define('_WEBO_external_scripts_ignore_list', 'Exclude file(s) from merging');
define('_WEBO_external_scripts_ignore_list_HELP', '');
define('_WEBO_external_scripts_head_end', 'Force moving all merged scripts to <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_head_end_HELP', '');

define('_WEBO_minify_css', 'Minify CSS files');
define('_WEBO_minify_css_HELP', '');
define('_WEBO_minify_js', 'Minify JavaScript files');
define('_WEBO_minify_js_HELP', '');
define('_WEBO_minify_js1', 'Don\'t minify JavaScript');
define('_WEBO_minify_js2', 'Minify with JSMin (from Douglas Crockford)');
define('_WEBO_minify_js3', 'Minify with Packer (by Dean Edwards)');
define('_WEBO_minify_js4', 'Minify with YUI Compressor (requires java)');
define('_WEBO_minify_page', 'Minify HTML (remove whitespaces)');
define('_WEBO_minify_page_HELP', '');
define('_WEBO_minify_html_comments', 'Remove HTML comments');
define('_WEBO_minify_html_comments_HELP', '');
define('_WEBO_minify_html_one_string', 'Compress HTML to one string (CPU intensive)');
define('_WEBO_minify_html_one_string_HELP', '');

define('_WEBO_unobtrusive_on', 'Enable unobtrusive JavaScript');
define('_WEBO_unobtrusive_on_HELP', '');
define('_WEBO_unobtrusive_body', 'Include merged JavaScript file before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_body_HELP', '');
define('_WEBO_unobtrusive_all', 'Move all JavaScript code to <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_all_HELP', '');
define('_WEBO_unobtrusive_informers', 'Move JavaScript informers calls before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers_HELP', '');
define('_WEBO_unobtrusive_counters', 'Move counter calls before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters_HELP', '');
define('_WEBO_unobtrusive_ads', 'Move advertisement (context and banners) calls before <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads_HELP', '');
define('_WEBO_unobtrusive_iframes', 'Make iframes\' load delayed');
define('_WEBO_unobtrusive_iframes_HELP', 'Make iframes\' load delayed');

define('_WEBO_gzip_css', 'Gzip CSS');
define('_WEBO_gzip_css_HELP', '');
define('_WEBO_gzip_javascript', 'Gzip JavaScript');
define('_WEBO_gzip_javascript_HELP', '');
define('_WEBO_gzip_fonts', 'Gzip fonts');
define('_WEBO_gzip_fonts_HELP', '');
define('_WEBO_gzip_page', 'Gzip HTML');
define('_WEBO_gzip_page_HELP', '');
define('_WEBO_gzip_noie', 'Use <code>deflate</code> instead of <code>gzip</code> for IE6/7');
define('_WEBO_gzip_noie_HELP', '');
define('_WEBO_gzip_cookie', 'Check for gzip possibility via cookies');
define('_WEBO_gzip_cookie_HELP', '');

define('_WEBO_far_future_expires_javascript', 'Cache JavaScript');
define('_WEBO_far_future_expires_javascript_HELP', 'Cache JavaScript');
define('_WEBO_far_future_expires_css', 'Cache CSS');
define('_WEBO_far_future_expires_css_HELP', '');
define('_WEBO_far_future_expires_images', 'Cache images');
define('_WEBO_far_future_expires_images_HELP', '');
define('_WEBO_far_future_expires_fonts', 'Cache fonts');
define('_WEBO_far_future_expires_fonts_HELP', 'Cache fonts');
define('_WEBO_far_future_expires_video', 'Cache video files');
define('_WEBO_far_future_expires_video_HELP', '');
define('_WEBO_far_future_expires_static', 'Cache static assets');
define('_WEBO_far_future_expires_static_HELP', '');
define('_WEBO_far_future_expires_html', 'Cache HTML');
define('_WEBO_far_future_expires_html_HELP', '');
define('_WEBO_far_future_expires_html_timeout', 'Default timeout to cache HTML, in seconds');
define('_WEBO_far_future_expires_html_timeout_HELP', '');
define('_WEBO_far_future_expires_external', 'Cache external files');
define('_WEBO_far_future_expires_external_HELP', '');

define('_WEBO_html_cache_enabled', 'Cache generated HTML files');
define('_WEBO_html_cache_enabled_HELP', '');
define('_WEBO_html_cache_timeout', 'Default timeout, in seconds');
define('_WEBO_html_cache_timeout_HELP', '');
define('_WEBO_html_cache_flush_only', 'Only cache first n bytes of content (flush early)');
define('_WEBO_html_cache_flush_only_HELP', '');
define('_WEBO_html_cache_flush_size', 'Flush content size (in bytes)');
define('_WEBO_html_cache_flush_size_HELP', '');
define('_WEBO_html_cache_ignore_list', 'List of parts of URLs to ignore from caching');
define('_WEBO_html_cache_ignore_list_HELP', '');
define('_WEBO_html_cache_allowed_list', 'List of USER AGENTS (robots) to add to caching');
define('_WEBO_html_cache_allowed_list_HELP', '');

define('_WEBO_performance_mtime', 'Ignore file modification time stamp (mtime)');
define('_WEBO_performance_mtime_HELP', '');
define('_WEBO_performance_plain_string', 'Do not use regular expressions');
define('_WEBO_performance_plain_string_HELP', '');
define('_WEBO_performance_quick_check', 'Check cache integrity only with <code>head</code>');
define('_WEBO_performance_quick_check_HELP', '');
define('_WEBO_performance_cache_version', 'Cache version number (don\'t check files\' existence)');
define('_WEBO_performance_cache_version_HELP', '');
define('_WEBO_performance_check_files', 'Don\'t check cache files existence');
define('_WEBO_performance_check_files_HELP', '');
define('_WEBO_performance_uniform_cache', 'Uniform cache files for all browsers');
define('_WEBO_performance_uniform_cache_HELP', '');

define('_WEBO_footer_text', 'Add a link to WEBO Site SpeedUp');
define('_WEBO_footer_text_HELP', '');
define('_WEBO_footer_image', 'Add a WEBO Site SpeedUp image');
define('_WEBO_footer_image_HELP', '');
define('_WEBO_footer_link', 'Text for backlink');
define('_WEBO_footer_link_HELP', '');
define('_WEBO_footer_css_code', 'Styles for backlink placement');
define('_WEBO_footer_css_code_HELP', '');
define('_WEBO_footer_spot', 'Add <code>lang="wo"</code> to <code>title</code>');
define('_WEBO_footer_spot_HELP', '');

define('_WEBO_data_uris_on', 'Apply <code>data:URI</code>');
define('_WEBO_data_uris_on_HELP', '');
define('_WEBO_data_uris_mhtml', 'Apply <code>mhtml</code>');
define('_WEBO_data_uris_mhtml_HELP', '');
define('_WEBO_data_uris_separate', 'Separate images from CSS code');
define('_WEBO_data_uris_separate_HELP', '');
define('_WEBO_data_uris_domloaded', 'Load images on <code>DOMready</code> event');
define('_WEBO_data_uris_domloaded_HELP', '');
define('_WEBO_data_uris_size', 'Maximum <code>data:URI</code> size (in bytes)');
define('_WEBO_data_uris_size_HELP', '');
define('_WEBO_data_uris_mhtml_size', 'Maximum <code>mhtml</code> size (in bytes)');
define('_WEBO_data_uris_mhtml_size_HELP', '');
define('_WEBO_data_uris_ignore_list', 'Exclude files from <code>data:URI</code>');
define('_WEBO_data_uris_ignore_list_HELP', '');
define('_WEBO_data_uris_additional_list', 'Exclude files from <code>mhtml</code>');
define('_WEBO_data_uris_additional_list_HELP', '');

define('_WEBO_css_sprites_enabled', 'Apply CSS Sprites');
define('_WEBO_css_sprites_enabled_HELP', '');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Images\' format');
define('_WEBO_css_sprites_truecolor_in_jpeg_HELP', '');
define('_WEBO_css_sprites_truecolor_in_jpeg1', 'Detect proper format automatically');
define('_WEBO_css_sprites_truecolor_in_jpeg2', 'Prefer JPEG format');
define('_WEBO_css_sprites_aggressive', '"Aggressive" combine mode for CSS Sprites');
define('_WEBO_css_sprites_aggressive_HELP', '');
define('_WEBO_css_sprites_extra_space', 'Add free space for CSS Sprites');
define('_WEBO_css_sprites_extra_space_HELP', '');
define('_WEBO_css_sprites_no_ie6', 'Exclude IE6 (via CSS hacks)');
define('_WEBO_css_sprites_no_ie6_HELP', '');
define('_WEBO_css_sprites_memory_limited', 'Restrict memory usage');
define('_WEBO_css_sprites_memory_limited_HELP', '');
define('_WEBO_css_sprites_dimensions_limited', 'Exclude images greater given number in one dimension');
define('_WEBO_css_sprites_dimensions_limited_HELP', '');
define('_WEBO_css_sprites_ignore_list', 'Exclude files from CSS Sprites');
define('_WEBO_css_sprites_ignore_list_HELP', '');

define('_WEBO_parallel_enabled', 'Enable multiple hosts');
define('_WEBO_parallel_enabled_HELP', '');
define('_WEBO_parallel_check', 'Check hosts\' availability automatically');
define('_WEBO_parallel_check_HELP', '');
define('_WEBO_parallel_allowed_list', 'Allowed hosts (separated by space)');
define('_WEBO_parallel_allowed_list_HELP', '');
define('_WEBO_parallel_additional', 'Additional websites with multiple hosts (separated by space)');
define('_WEBO_parallel_additional_HELP', '');
define('_WEBO_parallel_additional_list', 'Hosts on these websites (separated by space)');
define('_WEBO_parallel_additional_list_HELP', '');

define('_WEBO_htaccess_enabled', 'Enable <code>.htaccess</code>');
define('_WEBO_htaccess_enabled_HELP', '');
define('_WEBO_htaccess_mod_deflate', 'Use <code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_htaccess_mod_deflate_HELP', '');
define('_WEBO_htaccess_mod_gzip', 'Use <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_gzip_HELP', '');
define('_WEBO_htaccess_mod_expires', 'Use <code>mod_expires</code>');
define('_WEBO_htaccess_mod_expires_HELP', '');
define('_WEBO_htaccess_mod_headers', 'Use <code>mod_headers</code>');
define('_WEBO_htaccess_mod_headers_HELP', '');
define('_WEBO_htaccess_mod_setenvif', 'Use <code>mod_setenvif</code>');
define('_WEBO_htaccess_mod_setenvif_HELP', '');
define('_WEBO_htaccess_mod_mime', 'Use <code>mod_mime</code>');
define('_WEBO_htaccess_mod_mime_HELP', '');
define('_WEBO_htaccess_mod_rewrite', 'Use <code>mod_rewrite</code>');
define('_WEBO_htaccess_mod_rewrite_HELP', '');
define('_WEBO_htaccess_local', 'Place <code>.htaccess</code> file locally (not to Document Root)');
define('_WEBO_htaccess_local_HELP', '');
define('_WEBO_htaccess_access', 'Protect WEBO Site SpeedUp installation via <code>htpasswd</code>');
define('_WEBO_htaccess_access_HELP', '');

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
define('_WEBO_SPLASH3_TITLE', 'Installation - Stage 3');
define('_WEBO_SPLASH3_SAVED', 'Your configuration options have been successfully saved.');
define('_WEBO_SPLASH3_REWRITE', 'Your configuration has been successfully saved');
define('_WEBO_SPLASH3_REWRITE_SHORT', 'Acceleration completed');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Required changes');
define('_WEBO_SPLASH3_TESTING_SHORT', 'Testing');
define('_WEBO_SPLASH3_SECURITY_SHORT', 'More security');
define('_WEBO_SPLASH3_ADDITIONAL_SHORT', 'Additional speed up');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'You website based on ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ' has been patched. You can <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">check the result here</a>.');
define('_WEBO_SPLASH3_WORKING', 'That\'s working. OK now what?');
define('_WEBO_SPLASH3_WORKING_REQUIRED', 'Required changes for ');
define('_WEBO_SPLASH3_ADD', 'Now you <a href="#modify">should add the WEBO Site SpeedUp code</a> to your own PHP pages (');
define('_WEBO_SPLASH3_ADD_', '). This is made a lot easier if you have one PHP file that serves every page in your site, so you need to change only it.');
define('_WEBO_SPLASH3_MODIFY', 'How to modify your PHP file(s):');
define('_WEBO_SPLASH3_TOFILE', 'To the file');
define('_WEBO_SPLASH3_TOFILE2', 'To the very beginning of the file');
define('_WEBO_SPLASH3_TOFILE3', 'To the end of the file');
define('_WEBO_SPLASH3_AFTERSTRING', 'after the string');
define('_WEBO_SPLASH3_ADD2', 'add');
define('_WEBO_SPLASH3_TESTING', 'Now for some testing...');
define('_WEBO_SPLASH3_NOTLIVE', 'That\'s all you have to do. We recommend testing this out on a non-live site first, and then playing with the options to get optimal performance. To change the options you can:');
define('_WEBO_SPLASH3_MANUALLY', 'Manually edit the <code>config.webo.php</code> file here: <code>');
define('_WEBO_SPLASH3_MANUALLY2', 'config.webo.php</code>');
define('_WEBO_SPLASH3_AGAIN', 'And/or just <a href="');
define('_WEBO_SPLASH3_AGAIN2', '">run this install again</a>. It will remember your current options.');
define('_WEBO_SPLASH3_SECURITY', 'Extra security');
define('_WEBO_SPLASH3_ALTHOUGH', 'Although the package installs a username and password to access the install, you can also delete <code>');
define('_WEBO_SPLASH3_ALTHOUGH2', 'install.php</code> for extra security.');
define('_WEBO_SPLASH3_FINISH', 'Finish installation');
define('_WEBO_SPLASH3_CANTWRITE', 'Unable to write to the ');
define('_WEBO_SPLASH3_CANTWRITE2', ' directory you specified. Please make sure the directory exists and is writable.');
define('_WEBO_SPLASH3_CANTWRITE3', 'You can usually do this from your FTP client. Just navigate to the directory, right click and look for a Properties or CHMOD option.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Once you have done so, please refresh this page.');
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
define('_WEBO_SPLASH3_ADDITIONAL', 'Optimal performance settings');
define('_WEBO_SPLASH3_ADDITIONAL_INFO', 'You can apply additional changes to your website to let WEBO Site SpeedUp work more efficiently. Please check the following:');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_1', '<strong>Make your website standard-complaint (HTML, JavaScript, and CSS).</strong> Non standard external files inclusion lead to incorrect WEBO Site SpeedUp behavior and its disconfiguration.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_2', '<strong>Move all required for your website JavaScript and CSS files to the <code>head</code> section.</strong> This will allow WEBO Site SpeedUp to manage their merging and minify.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_3', '<strong>Add multiple hosts for your website.</strong> You need to add to your DNS the following record <code>* IN A your_server_IP_address</code>, then add approproate subdomains (i.e. <code>i1</code> <code>i2</code> <code>i3</code> <code>i4</code>) into your server configuration and install WEBO Site SpeedUp once more. WEBO Site SpeedUp automatically detects existing hosts (if not please add them manually) and distribute images through them.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_4', '<strong>Move all inline CSS and JavaScript to external files.</strong> First of all it make managing changes in your website design / behavior simplier. Secondly this will allow WEBO Site SpeedUp to merge, minify and cache all styles and scripts that are used on your website.');

/* System check info on the first screen */
define('_WEBO_SYSTEM_CHECK', 'Checking server configuration...');
define('_WEBO_SYSTEM_CHECK_ENABLED', 'enabled');
define('_WEBO_SYSTEM_CHECK_DISABLED', 'disabled');
define('_WEBO_SYSTEM_CHECK_WRITABLE', 'yes');
define('_WEBO_SYSTEM_CHECK_RESTRICTED', 'no');
define('_WEBO_SYSTEM_CHECK_SYSTEM_INFO', 'Server configuration');
define('_WEBO_SYSTEM_CHECK_VIA_JSMIN', 'via JSMin');
define('_WEBO_SYSTEM_CHECK_VIA_YUI', 'via YUI Compressor');
define('_WEBO_SYSTEM_CHECK_VIA_CSSTIDY', 'via CSS Tidy');
define('_WEBO_SYSTEM_CHECK_VIA_PHP', 'via PHP');
define('_WEBO_SYSTEM_CHECK_VIA_HTACCESS', 'via <code>.htaccess</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_SUPPORT', '<code>.htaccess</code> support');
define('_WEBO_SYSTEM_CHECK_HTACCESS', '<code>.htaccess</code> is writable');
define('_WEBO_SYSTEM_CHECK_HTACCESS_REWRITE', '<code>mod_rewrite</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_GZIP', '<code>mod_gzip</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_DEFLATE', '<code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_EXPIRES', '<code>mod_expires</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_HEADERS', '<code>mod_headers</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_MIME', '<code>mod_mime</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_SETENVIF', '<code>mod_setenvif</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_PROTECTED', 'Protected mode for install');
define('_WEBO_SYSTEM_CHECK_CSS_DIRECTORY', 'CSS folder is writable');
define('_WEBO_SYSTEM_CHECK_JAVASCRIPT_DIRECTORY', 'JavaScript folder is writable');
define('_WEBO_SYSTEM_CHECK_HTML_DIRECTORY', 'HTML folder is writable');
define('_WEBO_SYSTEM_CHECK_INDEX', '<code>/index.php</code> is writable');
define('_WEBO_SYSTEM_CHECK_CONFIG', 'Configuration file is writable');
define('_WEBO_SYSTEM_CHECK_GZIP', '<code>gzip</code> "on fly"');
define('_WEBO_SYSTEM_CHECK_GZIP_STATIC', 'Static <code>gzip</code>');
define('_WEBO_SYSTEM_CHECK_CACHE', 'Client side caching');
define('_WEBO_SYSTEM_CHECK_CSS_SPRITES', 'CSS Sprites support');
define('_WEBO_SYSTEM_CHECK_CSS_MINIFY', 'Minify for CSS');
define('_WEBO_SYSTEM_CHECK_JS_MINIFY', 'Minify for JS');
define('_WEBO_SYSTEM_CHECK_EXTERNAL', 'External files access');
define('_WEBO_SYSTEM_CHECK_HOSTS', 'Multiple hosts');
define('_WEBO_SYSTEM_CHECK_CMS', 'Native CMS support');
define('_WEBO_SYSTEM_CHECK_MEMORY', 'Memory available');

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

/* Image optimization */
define('_WEBO_IMAGE_INSTALLED', 'You can minify images on your website (without losses in quality). For this purpose please enter intitial directory. It will be scanned recursively for required files, current <code>.backup</code> versions of files will be refreshed if it\'s required.');
define('_WEBO_IMAGE_INSTALLED2', 'There are backup (<code>.backup</code>) version of all images are being createed during optimization process. In the future you can roll back all changes with these backup versions. To optimize images <a href="http://smush.it/" rel="nofollow" class="wssJ">smush.it</a> (<a href="http://info.yahoo.com/legal/us/yahoo/smush_it/smush_it-4378.html" rel="nofollow" class="wssJ">terms of use</a>) service is used. GIF files are replaced with PNG ones if latter are smaller.');
?>