# Installing Magento plugin #

## Important notes ##
  * If you will experience any problems during installation, please refer to [Troubleshooting and Support](TroubleshootingAndSupport.md) section.
  * If you are using any other performance-related plugins, consider disabling them during installing and testing of WEBO Site SpeedUp. Such plugins may affect WEBO Site SpeedUp operation. And note that WEBO Site SpeedUp integrates and totally exceeds functionality of many such plugins. Just check out the WEBO Site SpeedUp [feature list](http://http://www.webogroup.com/home/site-speedup/features/).
  * WEBO Site SpeedUp is not operational when you are logged in under admin account. To ensure that WEBO Site SpeedUp works properly, please, log off or use another browser.
  * After successful installation please refer to [getting started](UsingWEBOSiteSpeedUp.md) section.

## Installing ##
  1. Download from the [official site](http://www.webogroup.com/home/download/) the latest version of the package WEBO Site SpeedUp for Magento that should look like `webo.site.speedup.vx.x.x.magento.zip` (where X are version numbers). Package file should be around one MB in size.
  1. Extract `/Varien/` and `/Webo/` directories from this package to the `/app/code/local/` directory of Magento installation.
  1. Make sure that `/app/code/local/Webo/SiteSpeedup/web-optimizer/` directory is writable including all its files and subdirectories or at least make sure that `config.webo.php` file and `/cache/` subdirectory are writable.
  1. Extract `Webo_SiteSpeedup.xml` file from this package to the `/app/etc/modules/` directory of Magento installation.
  1. Installation is complete. In Magento admin panel click _WEBO Site SpeedUp_ in top menu to get to the plugin interface. Now you can refer to [getting started](UsingWEBOSiteSpeedUp.md) section.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-magento-2.png' alt='' title='' />

## Troubleshooting ##
### WEBO Site SpeedUp didn't showed up in admin panel after installation ###
  1. In Magento admin panel open _System → Cache Management_ and make sure that Configuration cache is disabled or click _Flush Magento Cache_ to refresh this cache and get WEBO Site SpeedUp working.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-magento-1.png' alt='' title='' />
  1. In Magento admin panel open _System → Configuration_, and then click _Advanced_ item in left menu. Make sure that WEBO Site SpeedUp output is enabled in the list of modules. If it's not, set it to _Enable_.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-magento-3.png' alt='' title='' />

### Several CSS and JavaScript files are already combined ###
For maximum speedup efficiency please disable Magento native merging functions. Open _System → Configuration → Advanced → Developer_, and disable merging in _CSS Settings_ and _JavaScript Settings_ and then save configuration.

## Uninstalling ##
  1. Disable WEBO Site SpeedUp using its admin interface. If it's unavailable for some reason, open file `/app/code/local/Webo/SiteSpeedup/web-optimizer/config.webo.php` and change `$compress_options['active']` value from `"1"` to `"0"`. Also if you disable WEBO Site SpeedUp manually, by modifying configuration file, you may also want to restore original .htaccess file in the root directory of your website from .htaccess.backup file, created by WEBO Site SpeedUp.
  1. Remove `/Varien/` and `/Webo/` directories from `/app/code/local/` directory.
  1. Remove `Webo_SiteSpeedup.xml` file  from `/app/etc/modules/` directory.
  1. Make sure that Configuration cache is refreshed.
  1. Uninstalling is complete. We would highly appreciate if you'll also [let us know](http://www.webogroup.com/about/contacts/) the reasons of uninstalling WEBO Site SpeedUp. We are always looking forward to improve quality and effectiveness of our products.

<a href='Hidden comment: 
Fooman SpeedsterFooman SpeedsterFooman Speedster
http://www.magentocommerce.com/boards/viewthread/21313/

i disable " Use Flat Catalog Product" it might speed the product page load
here you can twick it if needed : http://test.slindi.com/index.php/admin/system_config/edit/section/catalog/
'></a>