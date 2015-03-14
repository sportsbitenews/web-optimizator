# System Status #

System Status is a page that consists of four tabs:

## Status ##

This tab shows WEBO Site SpeedUp current mode and allows you to switch that mode by clicking Enable or Disable buttons.

There are two possible modes: **Debug mode** and **Live mode**. In Debug mode WEBO Site SpeedUp performs optimization actions only if certain GET-parameter is passed with the request (that is "web\_optimizer\_debug=1" by default) or if certain cookie is set. In Live mode WEBO Site SpeedUp performs optimization actions on every request.

It also informs about any troubles and warnings that affects WEBO Site SpeedUp performance. To learn how to get rid of problems listed here refer to [troubleshooting and support](TroubleshootingAndSupport.md) section.

Warnings about Apache modules (and possible memory restriction) are not related to WEBO Site SpeedUp logic but depend on current server configuration. Please contact your hosting provider to eliminate these warnings. Usually disabled modules don't influence general optimization algorithms because WEBO Site SpeedUp has very good graceful degradation for a lot of various environments.

This tab is similar to the blocks **Application Status** and **Server Status** on [Control Panel page](PageControlPanel.md).

## Settings ##

This tab allows you to review and change WEBO Site SpeedUp program settings. In most cases these settings are set automatically and should not be modified. Change them only if you know what you are doing. Settings are the following.

## Cache ##

This page contains details about cache contents. These cached files are optimized files that WEBO Site SpeedUp gets from your system and sends to end users, making the optimization process much faster.

Refresh button allows you to entirely clear the cache contents and fill it again as if you had opened index page of your website.

Cache refreshing is usually needed:
  * after WEBO Site SpeedUp configuration,
  * when site contents is changed and Server Side HTML caching option is applied.

Similar to the **Cache** block on [Control Panel page](PageControlPanel.md).

### Website address ###
Domain name or IP address of your website. For example: mysite.com. It is used to determine external resources and also as a domain for merged CSS and JS files. You can also set here the following domains here (to use them as a static mirror for the mentioned files).
  * js.yourwebsite.com
  * css.yourwebsite.com
  * beta.yourwebsite.com
  * test.yourwebsite.com
  * local.yourwebsite.com
  * stat.yourwebsite.com
  * stat1.yourwebsite.com
  * static.yourwebsite.com
  * dev.yourwebsite.com
  * www2.yourwebsite.com
  * cdn.yourwebsite.com
### Path to website root directory ###
Absolute path to the root directory of your website.
### Path to `DOCUMENT_ROOT` ###
Absolute path to the root directory of the website's host.
### Path to CSS cache directory ###
This directory contains all files of CSS cache.
### Path to JavaScript cache directory ###
This directory contains all files of JavaScript cache.
### Path to HTML cache directory ###
This directory contains all files of HTML cache.
### Website charset ###
Website content charset, is required for correct server-side caching. Example: utf-8
### Website currency ###
Website default currency code (for less cache size). Example: RUR, EUR, USD
### Protect WEBO Site SpeedUp installation via `htpasswd` ###
This option provides additional security for WEBO Site SpeedUp installation with the help of HTTP Basic Authorization and .htaccess and .htpasswd files.
### Login to protect WEBO Site SpeedUp with `.htpasswd` ###
To protect WEBO Site SpeedUp with .htpasswd you need to define login and password. Login is set with this option. Password is equal to WEBO Site SpeedUp installation password.
### Username and Password (to access via HTTP Basic Authorization) ###
If your website is protected via HTTP Basic Authorization you need to declare username and password so WEBO Site SpeedUp can process all required resources from the website.
### Exclude URL from optimization ###
Sometimes you may need to exclude some parts of website from WEBO Site SpeedUp processing. In this case you need to set meaningful parts (masks) for such sections / URL, separated by space.

## Updates ##

This tab shows information about the latest stable version of WEBO Site SpeedUp software and its changes log. When new version is out you can click the Update button and WEBO Site SpeedUp will automatically download and update all files preserving your current configuration.

Also you can get the latest beta version from here. Please be careful with it - and you can always roll back to the stable one if something is wrong.

This tab is similar to the block **Updates** on [Control Panel page](PageControlPanel.md).

## Install & Uninstall ##

This tab is only active if WEBO Site SpeedUp is installed as a standalone application.

If WEBO Site SpeedUp is installed on the system that is in [supported systems list](SystemRequirements.md) this tab shows information about all changes made to the source files of that system during installation.

There are two buttons that allow you to Install or Uninstall these changes. When these changes are uninstalled, system is rolled back to its original state (note that all WEBO Site SpeedUp files including configuration files and all cache files and will be preserved) , but you can always restore these changes anytime press "Install" button.

If WEBO Site SpeedUp is installed on a system that is not in the supported systems list, this tab contains instructions on how to install and uninstall WEBO Site SpeedUp manually.