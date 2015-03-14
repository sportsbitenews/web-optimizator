# Plugins API #

Plugins API is aimed to allow developers one more way to optimize (accelerate) CMS automatically on server-side, on client-side or both.

Right now plugins have some hooks:
  * onInstall — actions that are applied on WEBO Site SpeedUp installation.
  * onUninstall — actions that are applied on WEBO Site SpeedUp uninstall.
  * onBeforeOptimization — actions that are applied to the web page content before any optimization actions are performed by WEBO Site SpeedUp.
  * onAfterOptimization — actions that are applied to the web page content after all optimization actions are performed by WEBO Site SpeedUp (can be cached).
  * onCache — actions that are applied every time to the web page content if it's cached (on output of cache content).

## Plugin skeleton ##
There is general example of WEBO Site SpeedUp plugin:
```
<?php
if (!class_exists('web_optimizer_plugin_name')) {
/* class declaration starts */
	class web_optimizer_plugin_your_cms_here {
/* Constructor, actually not used */
		function web_optimizer_plugin_your_cms_here() {

		}
/* Installer */
		function onInstall ($root) {
/* $root can be used to operate with local files */
		}
/* UnInstaller */
		function onUninstall ($root) {
/* $root can be used to operate with local files */
		}
/* preOptimizer */
		function onBeforeOptimization ($content) {
/* $content is current web page content */
			return $content;
		}
/* postOptimizer */
		function onAfterOptimization ($content) {
/* $content is optimized web page content */
			return $content;
		}
/* Cacher */
		function onCache ($content) {
/* $content is cached web page content */
			return $content;
		}
	}
/* class declaration ends */
}
?>
```

Your plugin file name must be the same as the class plugin defines. I.e. plugin creates class named 'plugin\_class' than plugin file must be named 'plugin\_class.php'.

If you don't want to use all avaliable hooks in your plugin you can extend your class from webo\_plugin class which is included if any plgins are enabled. This class provides the default implementation of all hooks methods.

Good example of WEBO Site SpeedUp plugin is [Joomla! 1.5.x plugin](http://code.google.com/p/web-optimizator/source/browse/trunk/plugins/web_optimizer_plugin_joomla15.php) and [Cs-Cart captcha fixing plugin](http://code.google.com/p/web-optimizator/source/browse/trunk/plugins/webo_cs_cart_captcha.php).

## Plugin installation ##

Steps to install your plugin:

  * Place your plugin (PHP file) into plugins folder of WEBO Site SpeedUp installation.
  * Add file name (w/o .php) of your plugin to config.webo.php (option ['plugins'], the last one).
  * Start installation process.

Note that WEBO Site SpeedUp tries to detect plugins automatically basing on current CMS. I.e. with Drupal CMS you can just place file drupal61.php or drupal56.php into plugins — WEBO Site SpeedUp detects this file and applies it during installation to config.webo.php.