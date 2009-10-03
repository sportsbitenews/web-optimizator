Web Optimizer
-----------------------

Web Optimizer is a PHP solution that automatically speeds up your website by
combining and compressing your JavaScript and CSS assets.
It can also GZIP these assets, and the page itself (via PHP or .htaccess
options). Also it applies CSS Sprites and data:URI techniques. It supports
unobtrusive JavaScript conversion, multiple hosts, and a lot of other useful
options.
Average acceleration is 2.5 times. Web Optimizer was initially based on PHP
Speedy.

Web Optimizer native plugin for Wordpress:
http://wordpress.org/extend/plugins/web-optimizer/

Web Optimizer native plugin for Joomla! 1.5:
http://code.google.com/p/web-optimizator/downloads/detail?name=j15-web-optimizer.v0.6.0.zip

Web Optimizer native plugin for Joomla! 1.0:
http://code.google.com/p/web-optimizator/downloads/detail?name=j10-web-optimizer.v0.6.0.zip

Installation
-----------------------
1. Download and UNZIP the Web Optimizer package into its own directory (if you
   haven't already).
2. Point your browser to the Web Optimizer directory (/web-optimizer -- that you
   have just created)
2a. If you are using advanced framework (such as CodeIgniter, Zend Framework,
    Symfony, etc) please disable default Rewrite rules to setup Web Optimizer
    properly. I.e. comment these lines
	  RewriteCond %{REQUEST_FILENAME} !-f
	  RewriteRule .* index.php
    in your .htaccess
2b. Or you can just try to go to /web-optimizer/index.php
3. Follow the installation instructions. For Express Install please make sure
   that
   * website root is writable for your web server process or(and) there is
     writable .htaccess file
   * default cache folder (web-optimizer/cache) is writable for your web server
     process
   * config.webo.php is writable for your web server process
4. Enjoy your accelerated website!

Support and bug reports
-----------------------
Please submit support requests and bug reports via
http://code.google.com/p/web-optimizator/issues/list

Purchase
-----------------------
You can purchase full verion with dozens of acceleration settings or order
product installation and tuning here:
http://www.web-optimizer.us/

Donate
-----------------------
Please find all coordinates for donation here: http://sprites.in/donate/

Upgrade issues
-----------------------
To proper upgrade from version 0.5.9 and below please after upgrade save
configuration options once more - this will create all necessary rules in
.htaccess.
Auto-upgrade is included since version 0.3.8. Please just enter username and
password at your Web Optimizer Admin interface and press 'Upgrade'. For
auto-upgrade curl must be enabled on the server.
Please note that on upgrading from version 0.2 and below you need to replace in
the last part in index.php file 'compressor' to 'web_optimizer'.

Known issues
-----------------------
There are several issues related to CSS Sprites usage. If you think that your
template is broken or you system shows white screen -- please try to disable
CSS Sprites in configuration. This will solve occured issue in 99% of cases.
Also you can try to exclude some images from CSS Sprites generation.
Please also visit TroubleeShooter page in Wiki:
http://code.google.com/p/web-optimizator/wiki/Troubleshooter

Team
-----------------------
A lot of different persons contributed to this project. Some of them:
 * sunnybear (ported core, htaccess, CSS Sprites, multiple hosts, unobtrusive
   logic, promotion, investment raising, other stuff)
 * fade (design, general usability)
 * gkondratenko (documentation, integration, known issues gathering)
 * ShimON (Java branch, CSS Sprites unit-tests)
 * bazik (test cases for CSS Sprites, CSS rules, JS logic, etc)
 * beshkenadze (initial YUI Compressor envelope)
 * janvarev (files MTIME check)
 * crazyyy (UA localization)
 * Ajexandro (ES localization)
 * jos (DE localization)