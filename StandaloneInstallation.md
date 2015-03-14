# Standalone installation #

  * [Important notes](#Important_notes.md)
  * [Installing](#Installing_standalone_version.md)

## Important notes ##

  * If you are using PHP Speedy or Web Optimizer plugins (or their standalone versions), deactivate or delete them before WEBO Site SpeedUp installation. They are not compatible with WEBO Site SpeedUp.
  * If you are using any other performance-related software, consider disabling it during installing and testing of WEBO Site SpeedUp as there is a possibility that such software will affect WEBO Site SpeedUp operation. And note that WEBO Site SpeedUp integrates and totally exceeds functionality of the most of such software. Just check out the WEBO Site SpeedUp [feature list](http://www.webogroup.com/home/site-speedup/complete-comparison/).
  * If you will experience any problems during installation, please refer to [Troubleshooting and Support](TroubleshootingAndSupport.md) section.
> <a href='Hidden comment: 
* After successfull installation please refer to [UsingWEBOSiteSpeedUp getting started] section.
'></a>

## Installing ##

  1. Download from [the official site](http://www.webogroup.com/home/download/) latest version of the WEBO Site SpeedUp core package and extract it to your website root. This package is about 1 Mb in size and its file name is like `webo.site.speedup.vX.X.X.zip` where X are version numbers.
    * If you have SSH access to the website, just run these simple commands:
```
wget -P /your-website-root/ http://web-optimizator.googlecode.com/files/webo.site.speedup.vx.x.x.zip 
unzip /your-website-root/webo.site.speedup.vx.x.x.zip 
```
    * If you have FTP access to the website, just unzip downloaded core package, and upload it to the website root using any available FTP client (WinSCP or FileZilla or any other).
  1. You should have the following structure in /your-website-root/web-optimizer/ directory:
```
/cache/
/controller/
/view/
...
index.php
readme.txt
```
  1. Make `/web-optimizer/` directory completely writable including all its files and subdirectories (or at least make sure that `config.webo.php` file and `/cache/` directory are writable). This is required for normal application operation.
  1. Open in your browser the URL: http://your-website/web-optimizer/index.php.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-standalone-1.png' alt='' title='' />
  1. Enter the _password_, _e-mail_ and in case you have purchased either Lite Edition or Premium Edition of WEBO Site SpeedUp, a valid _license key_.
  1. Click _Install_ button. WEBO Site SpeedUp will analyze the system environment, setup the initial configuration and will backup and change required files (`index.php` and `.htaccess` files usually). It should take just a few seconds.
  1. If your system is not in [supported systems list](SystemRequirements.md), locate every file which outputs a webpage (`index.php` and/or several other `.php` files usually). Each file should have several additional strings in very beginning and very end, according to this:
```
<?php require('/your-website-root/web-optimizer/web.optimizer.php'); ?>
... former contents of the file ...
<?php $web_optimizer->finish(); ?>
```
  1. Installation is complete. The Control Panel page of WEBO Site SpeedUp will be shown up. Now you can start working with this plugin or refer to [getting started](UsingWEBOSiteSpeedUp.md) section to learn WEBO Site SpeedUp basics.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-standalone-2.png' alt='' title='' />