# Installing WordPress plugin #

## Important notes ##

  * If you will experience any problems during installation, please refer to [Troubleshooting and Support](TroubleshootingAndSupport.md) section.
  * If you are using PHP Speedy or Web Optimizer plugins (or their standalone versions), deactivate or delete them before WEBO Site SpeedUp installation. They are not compatible with WEBO Site SpeedUp.
  * If you are using any other WordPress performance-related plugins, consider disabling them during installing and testing of WEBO Site SpeedUp. Such plugins may affect WEBO Site SpeedUp operation. And note that WEBO Site SpeedUp integrates and totally exceeds functionality of many such plugins. Just check out the WEBO Site SpeedUp [feature list](http://http://www.webogroup.com/home/site-speedup/features/).
  * After successful installation please refer to [getting started](UsingWEBOSiteSpeedUp.md) section.

## Installing ##

  1. Download from [official site](http://www.webogroup.com/home/download/) latest version of the WEBO Site SpeedUp plugin for WordPress with name like `webo.site.speedup.vx.x.x.wordpress.zip` (where X are version numbers) and is several Kb in size.
  1. Extract this archive to `/wp-content/plugins/webo-site-speedup/` directory of WordPress installation.
  1. In WordPress admin panel click _Plugins → Installed_.
  1. Find WEBO Site SpeedUp plugin there and click _Activate_. WEBO Site SpeedUp will download its core package from repository, analyze the system environment and setup the initial configuration. Please do not take any actions while this process is on. It should take about one minute and then the success message about plugin activation will be shown up.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-wordpress-5.png' alt='' title='' />
  1. Make `/webo-site-speedup/` subdirectory in `/wp-content/plugins/` directory of WordPress installation completely writable including all its files and subdirectories or at least make sure that `config.webo.php` file and `/cache/` subdirectory are writable. This is required for normal plugin operation.
  1. Installation is complete. Now you can refer to [getting started](UsingWEBOSiteSpeedUp.md) section.

## Uninstalling ##
> To guarantee website normal behavior after product deinstallation please do the following:
  1. Disable WEBO Site SpeedUp on its Dashboard page.
  1. Deactivate and delete WEBO Site SpeedUp plugin on WordPress plugins page in admin panel.

## Troubleshooting ##

### Uninstalling through admin panel was unsuccessful ###
> If uninstalling routine has failed:
  1. Remove directory `/wp-content/plugins/webo-site-speedup/`.
  1. From `/wp-content/` directory remove `advanced-cache.php` and `db.php` files.
  1. Restore the original .htaccess file in your website root directory from .htaccess.backup file, created by WEBO Site SpeedUp.

### Can't disable WEBO Site SpeedUp through the admin panel ###
  1. Open file `/wp-content/plugins/webo-site-speedup/config.webo.php` and change `$compress_options['active']` parameter value from `"1"` to `"0"`.
  1. Restore the original .htaccess file in your website root directory from .htaccess.backup file, created by WEBO Site SpeedUp.

### Error message `Curl isn't installed` during WEBO Site SpeedUp installation ###
When PHP cURL module is missing in your server environment it is impossible for the plugin installer to automatically download all necessary files from the repository. To finish installation just follow these three simple steps:
  1. Get the latest full plugin package (file like webo.site.speedup.vx.x.x.zip) from [repository](http://code.google.com/p/web-optimizator/downloads/list).
  1. Extract contents of the web-optimizer directory from the downloaded package into the same directory where other plugin files are already located /wp-content/plugins/webo-site-speedup/.
  1. Make `/webo-site-speedup/` subdirectory in `/wp-content/plugins/` directory of WordPress installation completely writable including all its files and subdirectories or at least make sure that `config.webo.php` file and `/cache/` subdirectory are writable.

## Upgrading from Web Optimizer for WordPress ##

  1. Deactivate Web Optimizer plugin.
  1. Upload WEBO Site SpeedUp over it or just update via internal WordPress interface.
  1. Delete `/wp-content/plugins/web-optimizer/` directory.
  1. Activate plugin. All files should be downloaded from repository automatically.
  1. After activation please go to WEBO Site SpeedUp settings page, then to **System Status**, then to tab **Update**  (left menu), then check **Show information about beta versions**.
  1. Update to the latest beta version. Configuration file will be altered for the new version.
  1. Delete file `/wp-content/plugins/web.optimizer.wordpress.config.php`.
  1. Now all product updates can be safely done via WEBO Site SpeedUp interface.