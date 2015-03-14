# Installing Bitrix module #

## Important notes ##

  * If you will experience any problems during installation, please refer to [Troubleshooting and Support](TroubleshootingAndSupport.md) section.
  * If you are using PHP Speedy or Web Optimizer modules (or their standalone versions), deactivate or delete them before WEBO Site SpeedUp installation. They are not compatible with WEBO Site SpeedUp.
  * If you are using any other Bitrix performance-related modules, consider disabling them during installing and testing of WEBO Site SpeedUp. Such modules may affect WEBO Site SpeedUp operation. And note that WEBO Site SpeedUp integrates and totally exceeds functionality of many such modules. Just check out the WEBO Site SpeedUp [features list](http://http://www.webogroup.com/home/site-speedup/features/).
  * WEBO Site SpeedUp is not operational when you are logged in under admin account. To ensure that WEBO Site SpeedUp works properly, please, log off, use another browser or use debug mode of WEBO Site SpeedUp.
  * Please note that Configuration Wizard doens't wotk if you logged as admin. To aboid this please open WEBO Site SpeedUp dashboard and then log out from Bitrix (on another tab of browser). This will allow you to use Configuration Wizard normally.
  * After successful installation please refer to [getting started](UsingWEBOSiteSpeedUp.md) section.


## Installing using Bitrix admin panel ##

  * It is recommended to install WEBO module using Bitrix admin panel. Open _Settings → 3rd Party Updates → Add module_ and search for _WEBO Site SpeedUp_. Follow the instructions shown after that.
  * It is also possible to install module using [Bitrix Marketplace](http://marketplace.1c-bitrix.ru/solutions/webo.optimizer/?sphrase_id=1141030).

Please note:
  * WEBO Site SpeedUp module from Marketplace catalog can be installed only on websites with active update subscription [(learn more)](http://marketplace.1c-bitrix.ru/about/help.php).
  * WEBO Site SpeedUp can be updated only using its own interface, but not Bitrix Marketplace.


## Installing manually ##

  1. Download from the [official site](http://www.webogroup.com/home/download/) the latest version of the package WEBO Site SpeedUp for Bitrix that should look like `webo.site.speedup.vx.x.x.bitrix.zip` (where X are version numbers). Package file should be few Kb in size.
  1. Extract this package to the `/bitrix/modules/webo.optimizer/` directory of Bitrix installation to have the following structure there:
```
/admin/
/install/
/lang/
include.php
LICENSE.txt
options.php
readme.txt
```
  1. In Bitrix admin panel open _Control Panel → Settings → Modules_ then check Install button near WEBO Site SpeedUp module. WEBO Site SpeedUp will download its core package from repository, analyze the system environment and setup the initial configuration. Please do not take any actions while this process is on. It should take about one minute.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-bitrix-1.en.png' alt='' title='' />
  1. In case auto installer is unable to download WEBO Site SpeedUp core package, download it manually from the [official site](http://www.webogroup.com/home/download/). Its name should be like `webo.site.speedup.vx.x.x.zip` and its size should be about 1 Mb. Extract this core package to the directory `/bitrix/components/webo/optimizer/`. The structure in that directory should be as the following:
```
/cache/
/controller/
...
config.webo.php
index.php
install.php
...
```
  1. Make `/bitrix/tmp/` directory completely writable including all its files and subdirectories and also make sure that .htaccess file in your website root is writable too or that this file can be created if it not yet exists (in this case website root directory should be writable). This is required for normal module operation.
  1. Open _Control Panel → Settings → Modules Settings → WEBO Site SpeedUp_ to get to the WEBO Site SpeedUp configuration interface.<br /><img src='http://web-optimizator.googlecode.com/svn/wiki/images/installing-bitrix-2.en.png' alt='' title='' />
  1. Installation is complete. Now you can refer to [getting started](UsingWEBOSiteSpeedUp.md) section.