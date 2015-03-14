# Client-side issues #

**Please note!** After each modification you need to refresh cache to apply new configuration settings.

## Browser error or strange symbols instead of website or content encoding error ##
Usually it relates to double gzipping of the HTML document. The first can be performed by WEBO Site SpeedUp, and the second - by CMS or by web server.

To resolve this issue you need to disable gzip in CMS or in WEBO Site SpeedUp:
```
Gzip -> Gzip HTML -> No
```

## White screen instead of website or too long delay ##
The main trouble was related to CSS Sprites behavior (memory limit issues), it is resolved in versions 0.5+ (so if you are using older versions - just upgrade). In any case you can try to completely disable CSS Sprites:
```
CSS Sprites -> Apply CSS Sprites -> No
```
and then step-by-step increase maximum width and height of images
```
CSS Sprites -> Maximum width and height of images (in pixels) -> 100 ... 900
```
or exclude a number of files from merging
```
CSS Sprites -> Exclude files from CSS Sprites -> List of files separated by space
```

Also try to disable HTML images combining:
```
CSS Sprites -> Combine HTML images -> No
```

Also you can check your web server error logs to find out what is the problem. Usually it is enough to add required fixes.

Sometimes white screen refers to incorrect installation or double gzipping. Upper sections tell how to resolve these troubles.

If you still can't resolve this trouble you can disable WEBO Site SpeedUp options one-by-one to find out the right combination or the clue. You should start with the main groups of settings - **Combine CSS**, **Combine JavaScript**, **Minify**, and **Gzip** - and move forward in enabling more detailed settings (i.e., **Client side cache**, **.htaccess**, **data:URI**, or **CSS Sprites**).

## Incorrect design ##
This can be caused by different issues, but you can start with disabling CSS Sprites:
```
CSS Sprites -> Apply CSS Sprites -> No
```
Then (if the situation isn't resolved) you can disable data:URI:
```
Data:URI -> Apply data:URI -> No
```
After disabling this option CSS files won't be parsed by CSS Tidy and will be just merged together (and simple optimization will be applied).

If there are still some issues with design you can disable inline CSS styles merging inside head
```
Combine CSS -> Enaable inline styles merging -> No
```
or(and) external CSS files
```
Combine CSS -> Enaable external styles merging -> No
```
or minify for CSS files
```
Minify -> Minify CSS files -> No
```
If you have time and want to research trouble more you can disable merging CSS files inside head one-by-one with the setting:
```
Combine CSS -> Exclude CSS file(s) from merging -> List of files separated by space
```
So you can find files that cause incorrect WEBO Site SpeedUp behavior and just exclude them from optimization process (or make them standard-complaint with [jigsaw.w3.org/css-validator/](http://jigsaw.w3.org/css-validator/) and try once more).

At the bottom line there is an option
```
Combine CSS -> Include CSS code to all files
```
which you can use to add any custom CSS code to the merged file and overwrite current calculated styles. This can guarantee elimination of any CSS merging troubles.

## Disappeared or broken background images ##
In some cases installation WEBO Site SpeedUp can result in disappeared or broken background images. To resolve this issue you need to detect what initial background images cause incorrect WEBO Site SpeedUp behavior (using and tools to debug markup) and exclude them from the CSS Sprites creation:
```
CSS Sprites -> Exclude files from CSS Sprites -> List of files separated by space
```
If this doesn't resolve the trouble you can disable CSS Sprites:
```
CSS Sprites -> Apply CSS Sprites -> No
```
Also it's possible you should use this option
```
Combine CSS -> Include CSS code to all files
```
to define styles more precisely because you may have some troubles with this option
```
data:URI -> Separate images from CSS code
```

## Unavailable scripts, styles or images while using client-side caching and nginx ##

WEBO Site SpeedUp has two ways to override client cache:
  * Using GET-parameters, like: 3a1a23c4ea.js?wo1285789196. In this case some proxy servers can ignore such GET-parameters and still serve older cached files.
  * Using filename suffixes, like: 3a1a23c4ea.wo1285789196.js. This is most recommended way but all requests for files with such suffixes should be redirected to real existing files. And as long as nginx does not support dynamic changes in its configuration, WEBO Site SpeedUp cannot create all necessary redirect rules automatically.

There are several ways to solve this problem:
  * Disable `.htaccess → Use mod_rewrite`. First approach with unique GET-parameters will be used.
  * Disable `.htaccess → Use mod_expires` (if client-side caching is enabled in WEBO Site SpeedUp) or `.htaccess → Use mod_deflate` (if gzip compression is enabled in WEBO Site SpeedUp). Files extensions will be changed to .php, and compression and caching headers will be applied dynamically, when files are requested and they will will look like this, for example: 3a1a23c4ea.wo1285789196.php. They will be served directly with Apache (using properly working mod\_rewrite), bypassing nginx.
  * Add to nginx configuration all necessary redirect rules as it's performed for Apache .htaccess. They can look like this:
```
rewrite ^(.*)\.wo[0-9]+\.(css|js)$ $1.$2 break;
```
It's recommended to apply client-side caching and compression for static resources utilizing nginx features only. Ideologically this is the most correct approach but it requires manual configuration changes for nginx.

## Incorrect website behavior ##
Usually it results in disabling part of client side logic. So you should understand that if you have for example a comments form (that is shown by means of JavaScript) and after WEBO Site SpeedUp installation there is no such form, then there are issues with client side logic (JavaScript) and not with design itself.

You should start resolving this issue with disabling safe merging mode for JavaScript files
```
Combine JavaScript -> Safe combine mode -> No
```
because it can be too safe for your website client side logic (and thus may harm it).

To find out the issue you can start with disabling minify for JavaScript files:
```
Minify -> Minify JavaScript files -> Don't minify JavaScript
```
Then (if troubles still occur) you can try to exclude files one-by-one:
```
Combine JavaScript -> Exclude file(s) from combining -> List of files separated by space
```
When you detect which file causes the issue you can just exclude it from the overall packet or try to put logic of this file in non-conflict state (usually such errors are caused by incorrect internal logic inside this file, that isn't erroneous in one environment but leads to conflicts with other environments on merging together with all other files).

In addition you can try to exclude inline JavaScript from merging
```
Combine JavaScript -> Enable inline JavaScript merging -> No
```
and place combined JavaScript file in the beginning of the page
```
Combine JavaScript -> Force moving combined script to </head> -> No
```

## Not accessible files for end-users ##
Sometimes there are issues with access to the website from end-users browsers but in the same time there are no troubles in the admin browser. If you face with such issue you need to check where cache folders are located, where WEBO Site SpeedUp is located, and if protection for WEBO Site SpeedUp installation is enabled:
```
System Status -> Settings -> Protect WEBO Site SpeedUp installation via htpasswd -> Yes
```
So you need to move cache folders outside WEBO Site SpeedUp installation (i.e. to the root directory cache, accessible via web server to write into) or disable protection for WEBO Site SpeedUp installation:
```
System Status -> Settings -> Protect WEBO Site SpeedUp installation via htpasswd -> No
```

## WEBO Site SpeedUp favicon appears on a website ##
WEBO Site SpeedUp can put its favicon.ico to the website root directory when it can't find current favicon in that directory, or a link to any favicon in documents sources. This step allows browsers to download the favicon just once and cache it for a long time. Otherwise, if there will be no favicon, browsers will receive 404 errors on every page load. If you want to get your own favicon, just delete WEBO Site SpeedUp favicon.ico (and its gzipped favicon.ico.gz version) from the website root directory. Browsers will update their cache after a while and you won't notice WEBO Site SpeedUp favicon again.