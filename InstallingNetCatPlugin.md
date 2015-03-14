# Installing NetCat plugin #

## Important notes ##
  * If you will experience any problems during installation, please refer to [Troubleshooting and Support](TroubleshootingAndSupport.md) section.
  * WEBO Site SpeedUp as a native plugin is only compatible with NetCat 4.0 and above. If you have older version of NetCat use [Standalone installation](StandaloneInstallation.md) guide.
  * If you are using any other performance-related plugins, consider disabling them during installing and testing of WEBO Site SpeedUp. Such plugins may affect WEBO Site SpeedUp operation. And note that WEBO Site SpeedUp integrates and totally exceeds functionality of many such plugins. Just check out the WEBO Site SpeedUp [feature list](http://http://www.webogroup.com/home/site-speedup/features/).
  * After successful installation please refer to [getting started](UsingWEBOSiteSpeedUp.md) section.

## Installing ##
  1. Download from the [official site](http://www.webogroup.com/home/download/) the latest version of the WEBO Site SpeedUp for NetCat that should look like `webo.site.speedup.vx.x.x.netcat.tar.gz` (where X are version numbers). This file should be few KB in size.
  1. In NetCat admin panel open _Tools → Module Installation_. In the _Install from local disc_ field chose the downloaded package and click the _Upload_ button. WEBO Site SpeedUp will download its core package from repository, analyze the system environment and setup the initial configuration. Please do not take any actions while this process is on. It should take about one minute.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-netcat-1.en.png' alt='' title='' />
  1. Open _Settings → Modules List_. You should see the installed WEBO Site SpeedUp module in the modules list.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-netcat-2.en.png' alt='' title='' />
  1. Installation is complete. In the list of modules click _WEBO Site SpeedUp_ to get to its interface. Now you can refer to [getting started](UsingWEBOSiteSpeedUp.md) section.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-netcat-3.en.png' alt='' title='' />

## Uninstalling ##
  1. Disable WEBO Site SpeedUp using its admin interface. If it's unavailable for some reason, open file `/netcat/modules/webositespeedup/web-optimizer/config.webo.php` and change `$compress_options['active']` value from `"1"` to `"0"`. Also if you disable WEBO Site SpeedUp manually, by modifying configuration file, you may also want to restore original .htaccess file in the root directory of your website from .htaccess.backup file, created by WEBO Site SpeedUp.
  1. Remove the module using standard NetCat routine.
  1. Uninstalling is complete. We would highly apperciate if you'll also [let us know](http://www.webogroup.com/about/contacts/) the reasons of uninstalling WEBO Site SpeedUp. We are always looking forward to improve quality and effectiveness of our products.