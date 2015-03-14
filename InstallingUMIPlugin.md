# Installing UMI plugin #

## Important notes ##
  * If you will experience any problems during installation, please refer to [Troubleshooting and Support](TroubleshootingAndSupport.md) section.
  * If you are using any other performance-related plugins, consider disabling them during installing and testing of WEBO Site SpeedUp. Such plugins may affect WEBO Site SpeedUp operation. And note that WEBO Site SpeedUp integrates and totally exceeds functionality of many such plugins. Just check out the WEBO Site SpeedUp [feature list](http://http://www.webogroup.com/home/site-speedup/features/).
  * After successful installation please refer to [getting started](UsingWEBOSiteSpeedUp.md) section.

## Installing ##
  1. Download from the [official site](http://www.webogroup.com/home/download/) the latest version of the WEBO Site SpeedUp for UMI that should look like `webo.site.speedup.vx.x.x.umi.zip` (where X are version numbers). This file should be few KB in size.
  1. Extract contents of this package to `/classes/modules/webositespeedup/` of UMI installation and set write permissions on this directory for web server.
  1. In UMI admin panel open _Modules → Configuration → Modules_. In the _Installation file path_ enter 'classes/modules/webositespeedup/install.php' and click the _Install_ button. WEBO Site SpeedUp will download its core package from repository, analyze the system environment and setup the initial configuration. Please do not take any actions while this process is on. It should take about one minute.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-umi-1.png' alt='' title='' />
  1. After installation WEBO Site SpeedUp will appear in installed modules list on this page.
  1. Installation is complete. Click _Modules → WEBO Site SpeedUp_ to get to its interface. Now you can refer to [getting started](UsingWEBOSiteSpeedUp.md) section.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-umi-2.png' alt='' title='' />

## Uninstalling ##
  1. Disable WEBO Site SpeedUp using its admin interface. If it's unavailable for some reason, open file `classes/modules/webositespeedup/web-optimizer/config.webo.php` and change `$compress_options['active']` value from `"1"` to `"0"`. Also if you disable WEBO Site SpeedUp manually, by modifying configuration file, you may also want to restore original .htaccess file in the root directory of your website from .htaccess.backup file, created by WEBO Site SpeedUp.
  1. Remove the module using standard UMI routine.
  1. Uninstalling is complete. We would highly apperciate if you'll also [let us know](http://www.webogroup.com/about/contacts/) the reasons of uninstalling WEBO Site SpeedUp. We are always looking forward to improve quality and effectiveness of our products.