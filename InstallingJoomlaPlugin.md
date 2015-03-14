# Installing Joomla! plugin #

## Important notes ##

  * Before installing, if you are using PHP Speedy or Web Optimizer or any other performance-related solutions, consider disabling them or deleting them. These solutions may affect WEBO Site SpeedUp operation. And note that WEBO Site SpeedUp integrates and totally exceeds functionality of the most of them. Just check out the WEBO Site SpeedUp [feature list](http://http://www.webogroup.com/home/site-speedup/features/).
  * If you will experience any problems during installation, please check for possible solution at the Troubleshooting section of this article or refer to global [Troubleshooting and Support](TroubleshootingAndSupport.md) section.

## Installing Joomla! 1.5.x+ plugin ##

  1. Open [official site](http://www.webogroup.com/home/download/) and find the latest version of the package WEBO Site SpeedUp for Joomla! that should look like `webo.site.speedup.vx.x.x.joomlaxx.zip` (where X are version numbers) and should be about 1 Mb in size. Download it or just copy its URL.
  1. In Joomla! admin panel click _Extensions → Install/Uninstall_.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-joomla-1.png' alt='' title='' />
  1. Depending on your first step, enter a path to the downloaded package in _Upload Package_ field and click _Upload & Install_ **OR** enter a path to the package located on official site and click _Install_ button afterwards. WEBO Site SpeedUp will be installed. Please do not take any actions while this process is on.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-joomla-2.png' alt='' title='' />
  1. The success message about component installation will be shown up. WEBO Site SpeedUp automatically installs system plugin to handle all HTML document transformaations.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-joomla-3.png' alt='' title='' />
  1. Installation is complete. Click _Components → WEBO Site SpeedUp_ to start working with this plugin or refer to [getting started](UsingWEBOSiteSpeedUp.md) section to learn WEBO Site SpeedUp basics.

## Installing Joomla! 1.5.x+ plugin manually ##

<ol>
<li>Download from the <a href='http://www.webogroup.com/home/download/'>official site</a> the latest version of the package WEBO Site SpeedUp for Joomla! that should look like <code>webo.site.speedup.vx.x.x.joomla15.zip</code> (where X are version numbers). This file should be around 2 MB in size.</li>
<li>Extract the following files:<br>
<pre><code>admin.webositespeedup.php<br>
index.html<br>
install.webositespeedup.php<br>
LICENSE.txt<br>
readme.txt<br>
uninstall.webositespeedup.php<br>
WeboMySql.php<br>
weboptimizer.php<br>
weboptimizer.x<br>
webositespeedup.xml<br>
</code></pre>
to the <code>/administrator/components/com_webositespeedup/</code> directory</li>
<li>Extract the directory:<br>
<pre><code>/web-optimizer/<br>
</code></pre>
to the <code>/components/com_webositespeedup/</code> directory</li>
<li>Extract the following files:<br>
<pre><code>weboptimizer.php<br>
webositespeedup.xml<br>
</code></pre>
to the <code>/plugins/system/</code> directory</li>
<li>Extract the file:<br>
<pre><code>WeboMySql.php<br>
</code></pre>
to the <code>/libraries/joomla/database/database/</code> directory</li>
<li>Run this query for your Joomla! database (don't forget to replace [<a href='dbprefix.md'>dbprefix</a>] with your database prefix):<br>
<pre><code>INSERT INTO `[[dbprefix]]components` (`name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`) <br>
VALUES ('WEBO Site SpeedUp', 'option=com_webositespeedup', 0, 0, 'option=com_webositespeedup', 'WEBO Site SpeedUp', 'com_webositespeedup', 0, '../components/com_webositespeedup/web-optimizer/favicon.ico', 0, '', 1); <br>
INSERT INTO `[[dbprefix]]plugins` (`name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) <br>
VALUES ('System - WEBO Site SpeedUp', 'weboptimizer', 'system', 0, 2, 1, 0, 0, 0, '0000-00-00 00:00:00', '');<br>
</code></pre>
</li>
<li><b>Optional!</b> Change the dbtype value in <code>/configuration.php</code> file (replace asterisk with your previous dbtype value)<br>
<pre><code>var $dbtype = 'WeboMySql';//*<br>
</code></pre>
You should get this, for example:<br>
<pre><code>var $dbtype = 'WeboMySql';//mysqli<br>
</code></pre>
</li>
<li>Open file <code>/components/com_webositespeedup/web-optimizer/config.webo.php</code> and set the following values:<br>
<pre><code>$compress_options['password'] = "[[random valid password hash]]";<br>
$compress_options['host'] = "";<br>
$compress_options['document_root'] = "";<br>
$compress_options['website_root'] = "";<br>
$compress_options['html_cachedir'] = "";<br>
$compress_options['css_cachedir'] = "";<br>
$compress_options['javascript_cachedir'] = "";<br>
</code></pre>
You should get this, for example:<br>
<pre><code>$compress_options['password'] = "cbad86ef2bdfe8373bcade262354de45";<br>
$compress_options['host'] = "site.com";<br>
$compress_options['document_root'] = "/var/www/path-to-doc-root/";<br>
$compress_options['website_root'] = "/var/www/path-to-doc-root/joomla-installation/";<br>
$compress_options['html_cachedir'] = "/var/www/path-to-doc-root/joomla-installation/cache/wo/";<br>
$compress_options['css_cachedir'] = "/var/www/path-to-doc-root/joomla-installation/cache/wo/";<br>
$compress_options['javascript_cachedir'] = "/var/www/path-to-doc-root/joomla-installation/cache/wo/";<br>
</code></pre>
</li>
<li>
Installation is complete. Login to admin panel and open <i>Components → WEBO Site SpeedUp</i> to make sure that the plugin was installed successfully.</li>
</ol>

## Upgrading from Joomla! 1.5.x to Joomla! 1.6.x/1.7.x ##

To preserve your current WEBO Site SpeedUp configuration before Joomla upgrade do the following:

<ol>
<li> Disable WEBO Site SpeedUp on its admin panel.</li>
<li> Upgrade WEBO Site SpeedUp to its latest stable version from System Status page of its admin panel to make current configuration files compatible to the latest version of WEBO Site SpeedUp.</li>
<li> Backup configuration files:</li>
<pre><code>/components/com_webositespeedup/web-optimizer/config.webo.php<br>
/components/com_webositespeedup/web-optimizer/config.user.php<br>
...<br>
/components/com_webositespeedup/web-optimizer/config.userX.php<br>
</code></pre>
<li> Uninstall WEBO Site SpeedUp from components page.</li>
<li> Upgrade Joomla!</li>
<li> Install Joomla! 1.6/1.7 compatible version of WEBO Site SpeedUp.</li>
<li> Upgrade WEBO Site SpeedUp to last stable version (the same one as you have backed up) from System Status page.</li>
<li> Copy and overwrite backed up configuration files in the same directory:</li>
<pre><code>/components/com_webositespeedup/web-optimizer/<br>
</code></pre>
<li> Check that license and component settings are ok and enable the product on its admin panel.</li>
</ol>

Now all you WEBO Site SpeedUp settings are transferred w/o any damage to the website.

## Installing Joomla! 1.0.x plugin ##

WEBO Site SpeedUp cannot be installed as a plugin in Joomla! 1.0.x. so there are two options:
  * Consider [standalone installation](StandaloneInstallation.md) of latest WEBO Site SpeedUp version (recommended).
  * Download and install older version of WEBO Site SpeedUp called Web Optimizer which supports Joomla! 1.0.x integration as a Mambot. In order to do that:
    1. Download the package named web-optimizer.v0.6.7.joomla10.zip from [official site](http://www.webogroup.com/home/download/).
    1. In Joomla! admin panel click _Installers → Mambot_.
    1. Enter a path to the downloaded package and click _Upload & Install_.
    1. The success message will be shown up after a few seconds.
    1. Check Joomla! installation directory and make sure that root `.htaccess` file is writable (if any) and `/cache/` subdirectory is completely writable including all its files and subdirectories. This is required for normal plugin operation.
    1. Installing is complete.

## Uninstalling ##
  1. In Joomla! admin panel open _Components → WEBO Site SpeedUp_ and press _Disable_ button.
  1. Open _Extensions → Install/Uninstall_ and select Components tab.
  1. Locate WEBO Site SpeedUp in components list, check it and click _Uninstall_ icon.
  1. Uninstalling is complete. We would highly appreciate if you'll also [let us know](http://www.webogroup.com/about/contacts/) the reasons of uninstalling WEBO Site SpeedUp. We are always looking forward to improve quality and effectiveness of our products.

## Troubleshooting ##
### Installation fails with error `Component Install: Custom install routine failure` or 'Can't write to the file (please chmod it to 0664)' or other similar ###
Set _Enable FTP_ value to _No_ on a _Server_ tab of _Site → Global Configuration_ page. This option can be restored after WEBO Site SpeedUp is installed.

### Installation fails with some `unable to write` error or `Error when connecting WEBO Site SpeedUp SQL driver` ###
Make sure that following directories are writable:
  * `/administrator/components/`
  * `/cache/`
  * `/components/`
  * `/libraries/joomla/database/database/`
This will allow Joomla! to install WEBO Site SpeedUp files, its cache directory and its custom database driver (which is important for WEBO Site SpeedUp SQL Caching feature in Joomla!).

### Installation fails with error `Unable to Find Install Package` ###
This can happen when the upload file limit in PHP is exceeded. If the package you try to install is 2 MB, set the limit to 3MB, for example, by adding the following line to your root .htaccess file:
```
php_value upload_max_filesize 3M
```
Otherwise you can install any other verison of WEBO Site SpeedUp for Joomla! and then update to the latest version using its admin panel.

### Website is unreadable or shown as a white (blank) page ###
Disable native Joomla! _GZIP Page Compression_ and set it to _No_ on a page _Site → Global Configuration → Server_. WEBO Site SpeedUp supports gzip as well, but double compression can cause this problem.

### Layout problems or Pages/CSS/JavaScript/Images paths are incorrect ###
Make sure that WEBO Site SpeedUp is located after _System - SEF_ plugin or any other SEF plugns you use, but before _System - Cache_ plugin on an _Extensions → Plugin Manager_ page. Otherwise you may experience problems with incorrect URLs and missing assets on your website pages.

### Joomla! crashes with Fatal error `Class 'database' not found in /plugins/system/legacy.php` ###
This happens when you enable Legacy Mode after installing WEBO Site SpeedUp as its SQL caching feature is not compatible with Legacy Mode. To avoid this problem you can disable the _System - Legacy_ plugin at _Extensions → Plugin Manager_ page. Otherwise just change the dbtype value in `/configuration.php` file to its original value (see below).

### Joomla crashes or shows white (blank) page or with some database related error ###
Such problem may appear when WEBO Site SpeedUp SQL driver, which is essential for SQL caching feature, is not compatible with the website current environment. It can happen when using JoomFish, for example. Change the dbtype value in `/configuration.php` in Joomla! root directory to its previous value to solve this problem. Instead of this line:
```
var $dbtype = 'WeboMySql';//mysql (or mysqli or whatever the original type was, it's backed up here)
```
You should have the original line:
```
var $dbtype = mysql;
```
Alternate way to restore dbtype value is to edit _Database Type_ field on the _Server_ tab of _Site → Global Configuration_ page.

### No traces of WEBO Site SpeedUp activity ###
Turn off _System - Cache_ plugin on a page _Extensions → Plugin Manager_ and any other caching solutions you have on your website. These solutions will make it difficult to configure WEBO Site SpeedUp though they could be enabled back when WEBO Site SpeedUp is installed and configured.

### Can't disable WEBO Site SpeedUp through the admin panel ###
  1. Open file `/components/com_webositespeedup/web-optimizer/config.webo.php` and change `$compress_options['active']` parameter value from `"1"` to `"0"`.
  1. Restore the original .htaccess file in your website root directory from .htaccess.backup file, created by WEBO Site SpeedUp.

## Server-side caching efficiency comparison for Joomla! ##

Content (HTML) generation time with different caching settings
|**Cache (global settings)**|**System-Cache (plugin)**|**WEBO Site SpeedUp**|**WEBO Site SpeedUp Cache**|**WEBO Site SpeedUp Cache Extreme mode**|**Time (ms)**|**YSlow**|
|:--------------------------|:------------------------|:--------------------|:--------------------------|:---------------------------------------|:------------|:--------|
|No|No|No|No|No|325|65|
|Yes|No|No|No|No|143|65|
|Yes|No|Yes|No|No|152|93|
|Yes|Yes|Yes|No|No|53|93|
|No|No|Yes|Yes|No|43|93|
|No|No|Yes|Yes|Yes|4 |93|


<a href='Hidden comment: 
'></a>