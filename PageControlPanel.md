# Control Panel #

Control Panel is a default page for WEBO Site SpeedUp administrative interface. This is a dashboard with several customizable blocks which show the most important information about WEBO Site SpeedUp status and website activities.

To minimize a block on a Control Panel click its curved corner. To restore any minimized block click its name in Available Blocks.

## Control Panel blocks ##

### Application Status ###
This block shows WEBO Site SpeedUp current mode and allows you to switch that mode by clicking Enable or Disable buttons.

There are two possible modes: **Debug mode** and **Live mode**. In Debug mode WEBO Site SpeedUp performs optimization actions only if certain GET parameter is passed with the request (this parameter is "web\_optimizer\_debug=1" by default) or if certain cookie is set. In the Live mode WEBO Site SpeedUp performs optimization actions on every request.

It is similar to the Status tab on [System Status page](SystemStatus.md).

### Options ###
This block shows on a simple scale how effective current configuration is within limitations of your edition of WEBO Site SpeedUp (editions are: Community, Lite and Premium). Also this block shows several advices on how to make your website even faster.

### Server Status ###
This block informs about any troubles and warnings which affect WEBO Site SpeedUp performance. To learn how to get rid of problems listed here refer to [troubleshooting and support](TroubleshootingAndSupport.md) section.

It is similar to the Status tab on [System Status page](SystemStatus.md).

### Cache Status ###
This block shows WEBO Site SpeedUp cache size and brief information about its contents. Refresh button allows you to completely clear the cache contents and fill it again (for the home page only using chained optimization).

### Optimization Results ###
This block shows the performance gained for the home page of your optimized website.

### Optimization Tools ###
This block contains links to two optimization tools pages. **Static Gzip tool** allows you to create in specified directory .gz versions of CSS and JS (and some other) files for static gzip usage. **Image Optimization tool** can decrease size of images without quality loss in any specified directory on your website. These tools are available only in Premium Edition of WEBO Site SpeedUp and are described in the end of this section in more details.

### Quick Links ###
This block contains few links to the most valuable resources which can make your work with WEBO Site SpeedUp more efficient.

### Order Qualified Help ###
Specialists of WEBO Software are always ready to afford you qualified help with proper installation and configuration of WEBO Site SpeedUp. If you want to ensure that WEBO Site SpeedUp will work at its maximum performance rate, do not hesitate, send us a request.

### Updates ###
This block shows information about the latest stable version of WEBO Site SpeedUp software and its changes log. When new version is out you can click the Update button and WEBO Site SpeedUp will automatically download and update all files preserving your current configuration.

It is similar to the Updates tab on [System Status page](SystemStatus.md).

### Spread The Word ###
WEBO Site SpeedUp made your website unbelievable fast too? Please spend few minutes to tell the world about it. Had some issues with WEBO Site SpeedUp? Many people are interested to learn from your experience, so give them some feedback using links from this block.

### News ###
News are often related to technical articles, major software updates, special offers and many more. Stay tuned.

## Static Gzip tool ##

Using this tool you can create in specified directory .gz versions of CSS and JS (and some other) files for static gzip usage.

Modification time (mtime attribute) of compressed files is set to modification time of the initial (source) files during gzipping. Existing .gz files are refreshed when modification time of initial files and existing files are differ.

To use this tool do the following:
  * Enter the absolute path to the directory which contains files you want to be compressed.
  * Set or remove the flag whether or not this tool should look for files in subdirectories recursively.
  * Click the Find files button.
  * Review the list of found files and set the flag for all files needed. You can also set or remove flags for all files using the box in the table header.
  * Click the Compress files button to start the compression process.

After this tool finished processing you will get the final table with all actual compression results. Please note: if directories of some files are not writable there won't be created gzipped copies of such files.

## Image Optimization tool ##

Using this tool you can decrease size of images without quality losses in any specified directory on your website. For each optimized file .backup version will be created during optimization process. GIF files are replaced with PNG ones if latter are smaller.

One of the following services can be used for images optimization: [smush.it](http://smush.it/) [(terms of service)](http://info.yahoo.com/legal/us/yahoo/smush_it/smush_it-4378.html) or [punypng](http://www.gracepointafterfive.com/punypng/) [(terms of service)](http://www.gracepointafterfive.com/punypng/about/tos).

Working principles of this tool are similar to described for the Static Gzip tool above.