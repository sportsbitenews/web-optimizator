<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Contains all EN localization constants
 *
 **/

/* general layout */
define('_WEBO_CHARSET', 'latin-1');
define('_WEBO_GENERAL_TITLE', 'Web Optimizer Admin');

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
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Upgrade');
define('_WEBO_LOGIN_UPGRADENOTICE', 'Your can upgrade your version (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') of Web Optimizer to latest one. Please enter your login and password in the form above and click <strong>Upgrade</strong>. Web Optimizer will be upgraded to the version <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_UPGRADE_SUCCESSFULL', 'You have successfully upgraded to the version ');
define('_WEBO_UPGRADE_UNABLE', 'Can\'t download the latest version from repository. Please check internet connection of the server and curl existence.');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', 'To remove Web Optimizer from your system please enter login and password in the form above and click <strong>Uninstall</strong>.');
define('_WEBO_LOGIN_UNINSTALLME', 'Uninstall Web Optimizer');
define('_WEBO_LOGIN_FAILED', 'Login failed');
define('_WEBO_LOGIN_ACCESS', 'You need to be logged in to view this page');
define('_WEBO_LOGIN_LOGGED', 'Logged you in');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Installation - set password');
define('_WEBO_NEW_PROTECT', 'We need to password protect this installation so only you have access.');
define('_WEBO_NEW_USERDATA', 'Your username and password');
define('_WEBO_NEW_ENTER', 'Enter your password for installation');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Uninstall');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Thank you for using Web Optimizer. You can install it once more later by visiting <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">Web Optimizer page</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Feel free to visit <a href="http://code.google.com/p/web-optimizator/">Web Optimizer website</a> and submit <a href="http://code.google.com/p/web-optimizator/issues/list">any related issues</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Now you can return back to <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">your website</a>.');
define('_WEBO_SPLASH1_TITLE', 'Installation - Stage 1');
define('_WEBO_SPLASH1_WELCOME', 'Welcome to Web Optimizer installation!');
define('_WEBO_SPLASH1_PATH', 'Path Information');
define('_WEBO_SPLASH1_FULLPATH', 'Your full path to document root:');
define('_WEBO_SPLASH1_NOTICE', 'Your document root is the root folder that your HTML files are served from. If you don\'t know what it is, it\'s probably the path above. Just click <strong>Next...</strong> below.');
define('_WEBO_SPLASH1_INCORRECT', '<strong>Is the above path incorrect</strong>, please enter the correct path.');
define('_WEBO_SPLASH1_NEXT', 'Next...');
define('_WEBO_SPLASH1_EXPRESS', 'Express install');

/* Second splash -- set options */
define('_WEBO_SPLASH2_TITLE', 'Installation - Stage 2');
define('_WEBO_SPLASH2_SAVED', 'Saved');
define('_WEBO_SPLASH2_OPTIONS', 'Compression options');
define('_WEBO_SPLASH2_CACHE', 'Cache Directories');
define('_WEBO_SPLASH2_CACHE_JS', 'Your JavaScript will be cached in');
define('_WEBO_SPLASH2_CACHE_CSS', 'Your CSS will be cached in');
define('_WEBO_SPLASH2_INSTALLDIR', 'Web Optimizer is located in');
define('_WEBO_SPLASH2_DOCUMENTROOT', 'Website is located in');
define('_WEBO_SPLASH2_SPACE', 'Please separate with space:');
define('_WEBO_SPLASH2_YES', 'Yes:');
define('_WEBO_SPLASH2_NO', 'No:');
define('_WEBO_SPLASH2_UNABLE', 'Unable to open');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>Please make sure the directory exists and it is your root directory.');
/* Web Optimizer options */
define('_WEBO_SPLASH2_JSLIB', 'JavaScript Libraries');
define('_WEBO_SPLASH2_JSLIB_INFO', 'If your plugins or theme use a JavaScript library, it is advisable to let Web Optimizer handle where it is included.
									<br/><br/>Web Optimizer has determined that the libraries below could be in use by your installation. It is recommended that you tick all the scripts to let Web Optimizer handle them.
									<br/><br/>If your plugins or theme use a higher version or you are sure you don\'t use the library at all, leave unticked.');
define('_WEBO_SPLASH2_MINIFY', 'Minify Options');
define('_WEBO_SPLASH2_MINIFY_INFO', 'Minifying removes whitespace and other unnecessary characters.
									<br/>Also you can choose the tool for CSS/JavaScript minification or obfuscation.');
define('_WEBO_SPLASH2_UNOBTRUSIVE', 'Make JavaScript unobtrusive');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', 'Unobtrusive JavaScript will be loaded right after all content has been shown in a browser.
									<br/>This can significantly increase website load speed. But in some cases can break the client side logic (if it\'s not designed to handle in unobtrusive way).
									<br/>Please be careful with this option &mdash; it can seriously hurt client side functionality.');
define('_WEBO_SPLASH2_EXTERNAL', 'Include external and inline scripts');
define('_WEBO_SPLASH2_EXTERNAL_INFO', 'With this option all scripts (including external files and inline ones) will be merged into single one and added right after CSS file.
									<br/>This can be useful in some cases when there is a lot of different plugins and modules in head section and this logic can\'t be moved to unobtrusive load.
									<br/>You also can define a list of excluded files (i.e. ga.js, jquery.min.js, etc).');
define('_WEBO_SPLASH2_MTIME', 'Don\'t check files mtime and content');
define('_WEBO_SPLASH2_MTIME_INFO', 'Usually Web Optimizer checks if files have been changed since the last access to the page. And uses retrieved information to give existing file from cache or generate a new one.
									<br/>It\'s not good from the server side optimization point of view so you can disable this check.
									<br/>By enabling this option you need to manage Web Optimizer cache manually to clean cache folders from out-of-date cached files when new assests are available.');
define('_WEBO_SPLASH2_GZIP', 'Gzip Options');
define('_WEBO_SPLASH2_GZIP_INFO', 'Gzipping compresses the code via Gzip compression. This is recommended only for small scale sites, and is off by default.
									<br/>For larger sites, you should Gzip via the web server.');
define('_WEBO_SPLASH2_EXPIRES', 'Far Future Expires Options');
define('_WEBO_SPLASH2_EXPIRES_INFO', 'This adds an expires header to your JavaScipt and CSS files which ensures they are cached client-side by the browser.
									<br/>When you change your JS or CSS, a new filename is generated and the latest version is therefore downloaded and cached.');
define('_WEBO_SPLASH2_SPRITES', 'CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', 'It is possible to store CSS Background images as CSS Sprites. This can significantly reduce number of HTTP Requests website load.
									<br/>This technique is fully supported by all modern browsers. You can also switch to more aggressive mode if you are sure with your CSS rules.
									<br/>You also can define images to exclude from CSS Sprites creation (i.e. logo.png, bg.gif, etc).');
define('_WEBO_SPLASH2_DATAURI', 'Data URIs');
define('_WEBO_SPLASH2_DATAURI_INFO', 'It is possible to store CSS Background images as Data URIs. This will help cut down even further on the amount of HTTP Requests. 
									<br/>Note, however, that this will not work on Internet Explorer (up to version 7.0) and that the overall data size will be larger.');
define('_WEBO_SPLASH2_HTACCESS', 'Use .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', 'Most of gzip and cache options can be written for your website configuration (and avoid additional work). This can be done via <code>.htaccess</code> file (and you can later cut options from there and move to <code>httpd.cond</code> if it is required).
									<br/>Available options: ');
define('_WEBO_SPLASH2_CLEANUP', 'File cleanup');
define('_WEBO_SPLASH2_CLEANUP_INFO', 'When you change your JavaScript or CSS Web Optimizer will automatically generate a new compressed file and remove any unused files from the directory.
									<br/>However, if different pages in your site use different JavaScipt or CSS files Web Optimizer will get confused and cleanup files it shouldn\'t. In this case, you should turn off the cleanup process.');
define('_WEBO_SPLASH2_FOOTER', 'Footer text');
define('_WEBO_SPLASH2_FOOTER_INFO', 'Web Optimizer can add a link in your blog footer back to the Web Optimizer website. The link can be a text link, a small image link or both.
									<br/>Please support Web Optimizer by enabling this.');
define('_WEBO_SPLASH2_AUTOCHANGE', 'Auto change /index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', 'Web Optimizer can add to your website based on ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' all required changes (only for /index.php).
									<br/>Note: this can lead to some problems due to server misconfiguration, be carefull with this option.');
define('_WEBO_unobtrusive_on', 'Enable unobtrusive JavaScript');
define('_WEBO_external_scripts_on', 'Enable external and inline scripts merging');
define('_WEBO_external_scripts_ignore_list', 'Exclude file from merging');
define('_WEBO_dont_check_file_mtime', 'Don\'t check files mtime');
define('_WEBO_minify_javascript', 'Combine JavaScript files');
define('_WEBO_minify_with_jsmin', 'Minify with JSMin');
define('_WEBO_minify_with_packer', 'Minify with Packer');
define('_WEBO_minify_with_yui', 'Minify with YUI Compressor');
define('_WEBO_minify_page', 'Minify and combine CSS files');
define('_WEBO_minify_css', 'Minify HTML');
define('_WEBO_gzip_javascript', 'Gzip JavaScript');
define('_WEBO_gzip_css', 'Gzip CSS');
define('_WEBO_gzip_page', 'Gzip HTML');
define('_WEBO_far_future_expires_javascript', 'Cache JavaScript');
define('_WEBO_far_future_expires_css', 'Cache CSS');
define('_WEBO_far_future_expires_static', 'Cache static assets');
define('_WEBO_footer_text', 'Add a link to Web Optimizer');
define('_WEBO_footer_image', 'Add a Web Optimizer image');
define('_WEBO_cleanup_on', 'Regularly delete old files');
define('_WEBO_data_uris_on', 'Apply <code>data:URI</code>');
define('_WEBO_css_sprites_enabled', 'Apply CSS Sprites');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Save truecolor images as JPEG');
define('_WEBO_css_sprites_aggressive', '"Aggressive" combine mode for CSS Sprites');
define('_WEBO_css_sprites_extra_space', 'Add free space for CSS Sprites');
define('_WEBO_css_sprites_ignore_list', 'Exclude files from CSS Sprites');
define('_WEBO_htaccess_enabled', 'Enable <code>.htaccess</code>');
define('_WEBO_htaccess_mod_deflate', 'Enable <code>mod_deflate</code>');
define('_WEBO_htaccess_mod_gzip', 'Enable <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_expires', 'Enable <code>mod_expires</code>');
define('_WEBO_htaccess_mod_headers', 'Enable <code>mod_headers</code>');
define('_WEBO_htaccess_mod_setenvif', 'Enable <code>mod_setenvif</code>');
define('_WEBO_auto_rewrite_enabled', 'Enable auto-rewrite');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', 'Installation - Stage 3');
define('_WEBO_SPLASH3_SAVED', 'Your configuration options have been successfully saved.');
define('_WEBO_SPLASH3_REWRITE', 'Your configuration has been successfully saved');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'You website based on ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ' has been patched. You can <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">check the result here</a>.');
define('_WEBO_SPLASH3_WORKING', 'That\'s working. OK now what?');
define('_WEBO_SPLASH3_ADD', 'Now should should add the Web Optimizer code to your own PHP page. This is made a lot easier if you have one PHP file that serves every page in your site. In a Wordpress blog, for example, this would be the <strong>wp-blog-header.php</strong> file. Because <strong>wp-blog-header.php</strong> is accessed for every page, we just have to modify that file. If you have different PHP files serving different pages, then you will need to modify each of those pages.');
define('_WEBO_SPLASH3_MODIFY', 'How to modify your PHP file');
define('_WEBO_SPLASH3_WP', 'Let\'s say we are modifying the <code>wp-blog-header.php</code> of a Wordpress blog. (This is just an example: if you want to add Web Optimizer to Wordpress you can use the Web Optimizer WP plugin). At the very top of the page you might see something like this:');
define('_WEBO_SPLASH3_CODE', 'We need to add in the Web Optimizer code <strong>before</strong> that. So you would add this to the very top of the page:');
define('_WEBO_SPLASH3_FINALLY', 'Finally, we must then add one more line of code to the very bottom of the page as follows:');
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
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', 'Make CHMOD 775 for it, or create readable and writable <code>.htaccess</code> there, or CHMOD current <code>.htaccess</code> to 664.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Please sure that the root of your website is writable for your web server process or there is a writable <code>.htaccess</code> file.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Make CHMOD 775 for it, or create writable <code>.htaccess</code> there, or CHMOD current <code>.htaccess</code> to 664.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'Please sure that you have installed Web Optimizer into');
define('_WEBO_SPLASH3_CONFSAVED', 'Configuration saved');
define('_WEBO_SPLASH3_CONFIGERROR', 'Unable to open the config file for writing. Please change the <code>config.webo.php</code> file so that is it writable.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'You can usually do this from your FTP client. Just navigate to <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , right click the file, and look for a Properties or CHMOD option. Set to 777, or "write"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'Once you have done so, please refresh this page.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'Config file does not exist. Please download the full script from <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');

?>