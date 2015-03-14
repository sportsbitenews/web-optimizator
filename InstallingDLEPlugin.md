# Installing DLE module #

## Important notes ##

  * If you will experience any problems during installation, please refer to [Troubleshooting and Support](TroubleshootingAndSupport.md) section.
  * If you are using PHP Speedy or Web Optimizer, deactivate or delete them before WEBO Site SpeedUp installation. They are not compatible with WEBO Site SpeedUp.
  * If you are using any other DLE performance-related modules, consider disabling them during installing and testing of WEBO Site SpeedUp. Such modules may affect WEBO Site SpeedUp operation. And note that WEBO Site SpeedUp integrates and totally exceeds functionality of many such modules. Just check out the WEBO Site SpeedUp [feature list](http://http://www.webogroup.com/home/site-speedup/features/).
  * After successful installation please refer to [getting started](UsingWEBOSiteSpeedUp.md) section.

## Installing ##

  1. Download from the [official site](http://www.webogroup.com/home/download/) the latest version of the package WEBO Site SpeedUp for DLE that should look like `webo.site.speedup.vx.x.x.dle.zip` (where X are version numbers). Package file should be few Kb in size.
  1. Extract this package to the `/engine/inc/` directory of DLE installation to have the following structure there:
```
LICENSE.txt
readme.txt
webositespeedup.php
webositespeedup.png
```
  1. Make directory `/engine/inc/` writable for your web server (or for all users) - WEBO Site SpeedUp will install here core package automatically.
  1. In DLE admin panel open the page `?mod=webositespeedup`. WEBO Site SpeedUp will download its core package from repository, analyze the system environment and setup the initial configuration. Please do not take any actions while this process is on. It should take about one minute and then the WEBO Site SpeedUp dashboard will appear.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-standalone-2.ru.png' alt='' title='' />
  1. In case auto installer is unable to download WEBO Site SpeedUp core package, download it manually from the [official site](http://www.webogroup.com/home/download/). Its name should be like `webo.site.speedup.vx.x.x.zip` and its size should be about 1 Mb. Extract this core package to the same directory `/engine/inc/`. The structure now should be as the following:
```
/web-optimizer/
|__/cache/
|__/controller/
|__ ...
...
LICENSE.txt
readme.txt
webositespeedup.php
webositespeedup.png
```
  1. Make `/web-optimizer/` directory completely writable including all its files and subdirectories or at least make sure that `config.webo.php` file and `/cache/` directory are writable. This is required for normal module operation.
  1. Open _All Sections → WEBO Site SpeedUp_ to get to the WEBO Site SpeedUp configuration interface.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-standalone-2.ru.png' alt='' title='' />
  1. Installation is complete. Now you can refer to [getting started](UsingWEBOSiteSpeedUp.md) section.

# Uninstalling DLE module #
  1. Open _All Sections_ and delete WEBO Site SpeedUp.
  1. Open `index.php` file in website root and delete PHP line with WEBO Site SpeedUp calls (the first line, it musr be set to `&lt;?php`.
  1. Now you can safely remove all files from `/engine/inc/web-optimizer/`.