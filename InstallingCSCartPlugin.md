# Installing CS-Cart plugin #

## Important notes ##
  * If you will experience any problems during installation, please refer to [Troubleshooting and Support](TroubleshootingAndSupport.md) section.
  * If you are using any CS-Cart performance-related plugins, consider disabling them during installing and testing of WEBO Site SpeedUp. Such plugins may affect WEBO Site SpeedUp operation. And note that WEBO Site SpeedUp integrates and totally exceeds functionality of many such plugins. Just check out the WEBO Site SpeedUp [feature list](http://http://www.webogroup.com/home/site-speedup/features/).
  * After successful installation please refer to [getting started](UsingWEBOSiteSpeedUp.md) section.

## Installing ##
  1. Download from the [official site](http://www.webogroup.com/home/download/) the latest version of the package WEBO Site SpeedUp for CS-Cart that should look like `webo.site.speedup.vx.x.x.cscart.zip` (where X are version numbers). Package file should be a few kilobytes in size.
  1. Extract this package to the `/addons/` directory of CS-Cart installation to have the `webositespeedup` directory with following structure there:
```
/controllers/
/schemas/
addon.xml
func.php
init.php
LICENSE.txt
readme.txt
```
  1. Make sure that `/addons/webositespeedup/` directory is writable including all its files and subdirectories.
  1. Make sure that `/skins/your_admin_panel_skin/admin/addons/` directory is writable.
  1. In CS-Cart admin panel open _Administration → Addons_ then find WEBO Site SpeedUp plugin and click _Install_ link to the right. CS-cart will register the plugin.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-cscart-1.png' alt='' title='' />
  1. On the same page change status for WEBO Site SpeedUp plugin from _Disabled_ to _Active_. WEBO Site SpeedUp will download its core package from repository, analyze the system environment and setup the initial configuration. Please do not take any actions while this process is on. It should take about one minute.
  1. Installation is complete. In CS-Cart admin panel click _Administration → WEBO Site SpeedUp_ to get to the plugin interface. Now you can refer to [getting started](UsingWEBOSiteSpeedUp.md) section.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-cscart-2.png' alt='' title='' />

> <a href='Hidden comment: 
== Uninstalling ==
0. Disable on WEBO Site SpeedUp page.
1. Disable and Uninstall on addons page.
2. Remove addon files from:
/addons/webositespeedup/
/skins/basic/admin/addons/webositespeedup/ (replace basic with your other admin skin name if needed)
'></a>

## Troubleshooting ##
### Error message `Page Not Found` on the WEBO Site SpeedUp administration page ###
This happens when WEBO Site SpeedUp files are absent in `/skins/basic/admin/addons/webositespeedup/` directory. Please make sure that `/skins/basic/admin/addons/` directory is writable (replace `basic` to your specific admin skin name if you are not using the default). Then try to reinstall WEBO Site SpeedUp from the Addons page.

### Error message `There is a critical issue` on the WEBO Site SpeedUp administration page ###
This problem takes place when one of your server security modules like suPHP is forcing 500 error for WEBO interface's requests to the server. To avoid the problem, try to set rights to 755 and 644 for all the directories and files respectively under the `/addons/webositespeedup/` directory, including the directory itself. If that won't work, try to trace the exact error messages for the WEBO Site SpeedUp dynamic requests. For this you can use a tool like Console tab of Firebug addon for Firefox.

Also this issue can be caused by prohibited `.php` files execution from `addons` folder. To avoid this please create a file `wo.php` in you document root with the following content
```
<?php
$basepath = dirname(__FILE__) . '/addons/webositespeedup/web-optimizer/';
@include($basepath . 'index.php');
?>
```

### Addon is activated but is not listed in the Administration menu ###
There are probably server cache which prevents the menu change so try to clear this cache. You have two options:
  * Open the `http://domain.com/cs-cart-admin.php?cc` (replace domain.com and cs-cart-admin.php to your domain and admin filename respectively)
  * Delete all files from the `/var/cache/` directory