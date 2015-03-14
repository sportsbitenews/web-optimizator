# Server-side issues #

## Internal Server Error or blank screen after enabling WEBO Site SpeedUp ##

WEBO Site SpeedUp does not change website source files, but can be configured to automatically enhance Apache configuration using .htaccess file and this can causes issues.

To completely disable WEBO Site SpeedUp component and to rollback all its changes just click Disable in WEBO Site SpeedUp admin panel (DO NOT uninstall it from backend until then).

If website backend is unavailable:
  * Restore .htaccess file in website root directory using .htaccess.backup created by WEBO Site SpeedUp. If there are no .htaccess.backup file around, just remove WEBO Site SpeedUp instructions from current .htaccess file.
  * Find file /web-optimizer/config.webo.php and change $compress\_options['active'] parameter value from "1" to "0".

If problem is still there (which is highly unlikely), analyze server error logs from your host to understand and fix the problem.

## Unable to allocate memory for pool in server logs ##
This issue is related to unefficient APC performance during PHP opcode caching. To optimize this please add (or change) the following lines in PHP configuration file (usually php.ini). For 128M can be set any other value, better no lower than half of current PHP memory allocated.
```
apc.enabled=1
apc.shm_size=128M
apc.ttl=0
apc.mmap_file_mask=/dev/zero
```

## Server-side resources consumption by WEBO Site SpeedUp ##

There are three common situations and each results in different load on your system.

  * WEBO Site SpeedUp is installed but disabled (i.e. in debug mode). There is no additional load to your system at all.
  * WEBO Site SpeedUp is enabled and its cache is full. The load is minimal, almost insignificant, around 5 or 10 milliseconds.
  * WEBO Site SpeedUp is enabled and its cache is not full. The load can be minimal to significant. Exact amount of server expenses depends on server environment and WEBO Site SpeedUp configuration. This situation is clearly described below.

So if you are experiencing heavy load for a CPU or memory, and WEBO Site SpeedUp cache was just refreshed, please wait for some time. In most cases it will take no more than one hour until all necessary cache files are created and served without extra load to your system. That is the natural result when users or search bots are browsing your website for some time.

If cache was refreshed long time ago, and the load is still high, then probably some cache files are being created on every page view. You can easily track this situation by examining _Cache_ tab on _System Status_ page. If cache size is growing with every page view, then perhaps some WEBO Site SpeedUp options causing such behavior.

For example, when every page has unique set of JavaScript code, WEBO Site SpeedUp is forced to create a new cache file for every page if the _Combine all JavaScript_ option is enabled. If every JavaScript file should be minimized after that, the load will be even higher. In this situation you can, for example, exclude some files from combining or switch to _Combine only JavaScript in `head` tag_ option or you can exclude inline code from combining, depending on where the problem code is located.

Another similar example is when every page has unique set of images and _Combine HTML images_ option is enabled.

Here is a list of options which may cause such troubles.

WEBO Site SpeedUp options which usually cause extreme resources usage:
  * (Performance) Ignore file modification time stamp (mtime), if disabled
  * (Combine CSS) Combine all CSS in tags `<head>` and `<body>`
  * (Combine JavaScript) Combine all JS in tags `<head>` and `<body>`
  * (Minify) Minify with YUI Compressor
  * (Minify) Minify with Google Compiler
  * (Minify) Compress HTML to one string

Other WEBO Site SpeedUp options which usually cause significant resources usage:
  * (Performance) Do not use regular expressions, if disabled
  * (Performance) Restore CSS properties
  * (Unobtrusive JavaScript) Move all JavaScript code to `</body>`
  * (Unobtrusive JavaScript) Move JavaScript widgets calls before `</body>`
  * (Unobtrusive JavaScript) Move advertisement calls before `</body>`
  * (Unobtrusive JavaScript) Move counter calls before `</body>`
  * (Unobtrusive JavaScript) Defer iframes loading
  * (CSS Sprites) Apply CSS Sprites
  * (CSS Sprites) Combine HTML images

Also if you have a lots of images, CSS or JavaScript assets (i.e. hundreds of them), every page view will result in high server-side load if the following options are enabled:
  * (CDN) Distribute images
  * (CDN) Distribute CSS files
  * (CDN) Distribute JavaScript files

If you have failed to find WEBO Site SpeedUp options which drops down your server performance, create a new configuration and enable optimization options one by one to find out the bottleneck of the current configuration.

Still no solution? Try to disable WEBO Site SpeedUp and check server side performance again to make sure that the problem is not caused by some other software or system plugins.

## No support for multiple hosts ##

If you want to enable multiple hosts to server your images you need to check the following:

  * Enable support in DNS for these hosts. So you need to write to DNS a number of records with these hosts pointing to the required IP address (usually the same as for the current website).
  * Enable support for these hosts on your server. For Apache you do this with ServerAlias directive, i.e.:
```
ServerAlias i1.site.com
ServerAlias i2.site.com
```
  * Check that these hosts are mirroring the main website. For this you need to open any static object on the website (for example site.com/images/my.png) and replace the host with every host from the list of enabled ones (i1.site.com/images/my.png and i2.site.com/images/my.png). If you have any troubles you need to re-check or repeat previous steps.
  * Add all hosts to WEBO Site SpeedUp configuration:
```
CDN -> Allowed hosts -> List of hosts separated by space
```
  * And enable support for multiple hosts:
```
CDN -> Distriute images -> Yes
```

WEBO Site SpeedUp will automatically check some of the most used hosts and try to apply them for images' distribution. So the last setting maybe performed automatically during WEBO Site SpeedUp install.
After all these actions all images will be server through multiple hosts that will significantly increase load speed of every page on the website.

## Multiple hosts aren't saved ##
WEBO Site SpeedUp checks all entered hosts automatically to be sure that they perform as they should. You can disable this check (if it can't be performed properly):
```
CDN -> Check hosts' availability automatically -> No
```

## Server resources are very limited ##

In this case you can use chained optimization:

  * Download home page (raw HTML) into cache directory as compressing.php.
  * Include into compressing.php WEBO Site SpeedUp calls.
  * Redirect to compressing.php with GET parameter (web\_optimizer\_stage).
  * Compressing.php redirect before merging CSS Sprites, after p16 in CSS Spites logic (repeat-x, repeat-y, no-repeatb, no-repeatr), after all CSS Sprites are ready and after data:URI are ready (total 5 redirects).
  * Remove compressing.php.
  * Update existing index.php (all cached files are already exist).