# Installing issues #

## Files or directories are not writable ##

For normal operation of WEBO Site SpeedUp, certain files and directories should be writable.
  * File index.php in website root directory. This file often contains calls which integrates WEBO Site SpeedUp with the system.
  * File .htaccess in website root directory. If this file does not exists, website root directory itself should be writable in order to create .htaccess file. This file contains important Apache instructions which are necessary for many of the WEBO Site SpeedUp features.
  * Directory, where WEBO Site SpeedUp is installed with all its files and subdirectories. WEBO Site SpeedUp updates gets installed in this directory, user settings are stored here as well.
  * Directory where HTML, CSS and JavaScript cache files are located with all their files and subdirectories. These directories contains optimized files — the result of WEBO Site SpeedUp work. By default they are placed in WEBO Site SpeedUp installation directory, but their placement could be changed by user.
<a href='Hidden comment: 

More details on these files and directories location in different systems are given in [SystemFiles System Files] section.
'></a>

## Website is broken but WEBO Site SpeedUp is disabled or even uninstalled ##

### Invalid .htaccess Instructions ###
In the root directory of a website there is an .htaccess file which is often modified when WEBO Site SpeedUp is installed. There is also copy of original file named `.htaccess.backup`. Restore the original file or make sure that there are no Site SpeedUp instructions left in .htaccess file. Such instructions are surrounded by two lines like this:
```
# Web Optimizer options
[some instructions]
# Web Optimizer end
```

### Client Side or Server Side Cache is Active ###
Cached pages can refer to nonexistent resources or just contain outdated code which can make website look broken. Find all active caching solutions on a website and clear their cache to make sure that you seeing the actual but not cached pages.

## Restoring Password for WEBO Site SpeedUp ##
If WEBO Site SpeedUp is installed as a standalone application, open its installation directory and find a file named `config.webo.php`. Empty the `password` parameter value on a line 7 like this:
```
$compress_options['password'] = "";
```
Open WEBO Site SpeedUp admin interface afterwards and enter your registration data once again. Configuration settings and cache files will be preserved.

If WEBO Site SpeedUp is installed as a native plugin, password can be restored using any system specific methods.

## WEBO Site SpeedUp activity ##
If you need to check whether WEBO Site SpeedUp works on the website or not (if its installation does HTML document parsing) you can just open raw HTML code of your website and find there string `<!--WSS-->` (starting from version 0.9.0). WEBO Site SpeedUp doesn't parse content if there is no such string (also it can be disabled in configuration, please be careful with such stuff).

For earlier versions you can check HTML document for absence of tabulations at the start of strings, absence of double line breaks or some file names in head section (like cache/1234a6789b.css or cache/1234c6789d.js, where 1234c6789d is a random string in hex16). It seems WEBO Site SpeedUp doesn't work if there are no such sings.

If you can't find any traces of WEBO Site SpeedUp you need to re-check its calls in files of your CMS and maybe also repeat WEBO Site SpeedUp installation (WEBO Site SpeedUp can apply all required changes to CMS files by automatically).

To get information about required changes for a standalone installation you can open _System Status_ page and go to _Instal & Uninstall& tab._

Also you can check in WEBO Site SpeedUp is active in the configuration (all installations except Joomla! plugin). For this purpose you should check in the file `web-optimizer/config.webo.php` this string
```
$compress_options['active'] = "1";
```
And set value to `1` (if it's `0`). This will activate WEBO Site SpeedUp for your website.

If this doesn't help please check if there are any other plugins which can gzip content (so WEBO Site SpeedUp can receive it in gzipped view, and don't parse). Try to disable gzip in every such plugin or system configuration if it can affect HTML code.

## Incorrect paths calculation ##

Sometimes WEBO Site SpeedUp can't correctly calculate all default paths for correct installation (this can result in no styles or scripts on the website, or even in any PHP fatal error). Usually it appears on CGI environments. To calculate paths WEBO Site SpeedUp tries the following.

  * Detects document root. Usually it's defined as `$_SERVER['DOCUMENT_ROOT']`
  * If no document root is defined (or it's defined to a not accessible folder) WEBO Site SpeedUp tries to get environmental variable `SCRIPT_FILENAME` and exclude from it another variable `SCRIPT_NAME` (usually this helps in detection).
  * In case of relative website installation (i.e. a folder inside document root) WEBO Site SpeedUp has an option for website root. Usually it's computed automatically.
  * If CGI environment has been set completely incorrectly (i.e. `$_SERVER['DOCUMENT_ROOT']` isn't defined, and environmental variables `SCRIPT_NAME`, `SCRIPT_FILENAME` are defined regarding internal PHP process) WEBO Site SpeedUp fails to detect document root, so it can't set all other directories (in most of cases they are also computed automatically after document root).

In the last case you need to setup all paths manually. This can be done through WEBO Site SpeedUp interface, usually all paths are listed as the first parameters to set.