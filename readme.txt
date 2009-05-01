Web Optimizer
------------

Web Optimizer is a PHP script that automatically speeds up your website by combining and compressing your JavaScript and CSS assets.
It can also GZIP these assets, and the page itself (via PHP or .htaccess options). Also it applies CSS Sprites and data:URI techniques.
Also it supports unobtrusive JavaScript conversion and a lot of other useful options.
Web Optimizer was initially based on PHP Speedy.

Installation
------------
1. Download and UNZIP the Web Optimizer package into its own directory (if you haven't already).
2. Point your browser to the Web Optimizer directory (/web-optimizer -- that you have just created)
2a. If you are using advanced framework (such as CodeIgniter, Zend Framework, Symfony, etc) please disable default Rewrite rules to
   setup Web Optimizer properly. I.e. comment these lines
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule .* index.php
   in your .htaccess
3. Follow the installation instructions. For Express Install please make sure that
 * website root is writable for your web server process or(and) there is writable .htaccess file
 * default cache folder (web-optimizer/cache) is writable for your web server process
 * config.webo.php is writable for your web server process
4. Enjoy your accelerated website!

Support and bug reports
----------------------
Please submit support requests and bug reports via http://code.google.com/p/web-optimizator/

Upgrade issues
----------------------
Auto-upgrade is included since version 0.3.8. Please just enter username and password at your Web Optimizer Admin interface and press
'Upgrade'.
Please note that on uprading from version 0.2 and below you need to replace in the last part in index.php file 'compressor' to
'web_optimizer'.