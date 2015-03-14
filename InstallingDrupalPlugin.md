# Installing Drupal plugin #

## Important notes ##

  * If you will experience any problems during installation, please refer to [Troubleshooting and Support](TroubleshootingAndSupport.md) section.
  * If you are using PHP Speedy or Web Optimizer plugins (or their standalone versions), deactivate or delete them before WEBO Site SpeedUp installation. They are not compatible with WEBO Site SpeedUp.
  * If you are using any other Drupal performance-related plugins, consider disabling them during installing and testing of WEBO Site SpeedUp. Such plugins may affect WEBO Site SpeedUp operation. And note that WEBO Site SpeedUp integrates and totally exceeds functionality of many such plugins. Just check out the WEBO Site SpeedUp [feature list](http://http://www.webogroup.com/home/site-speedup/features/).
  * To get the best of gzip compression please disable gzip in Drupal global settings. WEBO Site SpeedUp has better gzip support.
  * After successful installation please refer to [getting started](UsingWEBOSiteSpeedUp.md) section.

## Installing ##

  1. Download from the [official site](http://www.webogroup.com/home/download/) the latest version of the package WEBO Site SpeedUp for Drupal that should look like `webo.site.speedup.vx.x.x.drupalx.zip` (where X are version numbers). Package file should be few Kb in size.
  1. Extract this package to the `/sites/all/modules/weboptimizer/` directory of Drupal installation to have the following structure there:
```
INSTALL.txt
LICENSE.txt
README.txt
weboptimizer.info
weboptimizer.module
```
  1. Make directory `/sites/all/modules/weboptimizer/` writable for your web server (or for all users) - WEBO Site SpeedUp will install here core package automatically.
  1. In Drupal admin panel open _Administer → Site building → Modules_ then check Enabled box near WEBO Site SpeedUp moudle and click _Save configuration_ button. WEBO Site SpeedUp will download its core package from repository, analyze the system environment and setup the initial configuration. Please do not take any actions while this process is on. It should take about one minute and then the success message will be shown up.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-drupal-1.png' alt='' title='' />
  1. In case auto installer is unable to download WEBO Site SpeedUp core package, download it manually from the [official site](http://www.webogroup.com/home/download/). Its name should be like `webo.site.speedup.vx.x.x.zip` and its size should be about 1 Mb. Extract this core package to the same directory `/sites/all/modules/weboptimizer/`. The structure now should be as the following:
```
/web-optimizer/
|__/cache/
|__/controller/
|__ ...
INSTALL.txt
LICENSE.txt
README.txt
weboptimizer.info
weboptimizer.module
```
  1. Make `/web-optimizer/` directory completely writable including all its files and subdirectories or at least make sure that `config.webo.php` file and `/cache/` directory are writable. This is required for normal plugin operation.
  1. Open _Administer → Site configuration → WEBO Site SpeedUp_ to get to the WEBO Site SpeedUp configuration interface.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-drupal-2.png' alt='' title='' />
  1. Installation is complete. Now you can refer to [getting started](UsingWEBOSiteSpeedUp.md) section.