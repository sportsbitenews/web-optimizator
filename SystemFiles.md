# System Files #
Here is a list of internal libraries and WEBO Site SpeedUp files which are being used outside of the core folder.

## Internal libraries ##
These files are used to provide different parts of WEBO Site SpeedUp functionality locally on the website (WEBO Site SpeedUp can be installed outside document root, so all essential parts must exist inside website folder).

### wo.static.php ###
Initially it is located inside `libs/php/` folder. On installation it is copied to CSS cache directory.
It is used to provide gzip / client side caching for appropriate types of files on environments w/o required Apache modules. Well-known 'static proxy' library.

### 0.gif ###
Initially it is located inside `libs/php/` folder. On installation it is copied to CSS cache directory.
It is used to replace images with transparent ones on HTML Sprites usage.

### yass.loader.js ###
Initially it is located inside `libs/js/` folder. On installation it is copied to JavaScript cache directory.
It is used to provide unobtrusive load for detected pieces of JavaScript code (cross browser `onDOMready` event).

### wo.cookie.php ###
Initially it is located inside `libs/js/` folder. On installation it is copied to JavaScript cache directory.
It is used to check gzip support for browsers which don't send `Accept-Encoding` headers (.php file sends gzipped JavaScript which sets appropriate cookie).

### web.optimizer.stamp.png ###
Initially it is located inside `images/` folder. On installation it is copied to CSS cache directory.
It it used as a water mark for Community Edition (and can be used in any other WEBO Site SpeedUp Edition).

## Achievement files ##
These files are required to display information about speedup achievements.

### webo-site-speedup.back.jpg ###
Initially it is located inside `libs/css/` folder. On first visit to Achievements page it is copied to CSS cache directory.
It is used to display general (orange) background for Website speedup Achievements page.

### webo-site-speedup.rocket.png ###
Initially it is located inside `libs/css/` folder. On first visit to Achievements page it is copied to CSS cache directory.
This file contains all achievements graphics to display final schema with rocket parts.

### webo-site-speedup88.png ###
On every visit to Achievements page it is re-checked and the last version is downloaded from WEBO Software servers.
This file contains tiny (88x88) picture of website speedup achievement.

### webo-site-speedup125.png ###
On every visit to Achievements page it is re-checked and the last version is downloaded from WEBO Software servers.
This file contains small (125x125) picture of website speedup achievement.

### webo-site-speedup161.png ###
On every visit to Achievements page it is re-checked and the last version is downloaded from WEBO Software servers.
This file contains medium (161x161) picture of website speedup achievement.

### webo-site-speedup250.png ###
On every visit to Achievements page it is re-checked and the last version is downloaded from WEBO Software servers.
This file contains large (250x250) picture of website speedup achievement.

### webo-site-speedup.php ###
On every visit to Achievements page it is re-generated to the actual state.
This file contains all HTML part of website speedup achievement page.

### webo-site-speedup.css ###
On every visit to Achievements page it is re-generated to the actual state.
This file contains all CSS (mhtml) part of website speedup achievement page.

## Temporary files ##
These files don't usually present in any of website folders, but sometimes they can be found while WEBO Site SpeedUp is operating.

### progress.html ###
Can be found inside JavaScript cache directory.
Contains current stage of optimization or file number for update process.

### htaccess.test ###
Can be found inside JavaScript cache directory.
Contains (zero) content of `libs/php/css.sprites.php` file (being downloaded through curl it returns no content). If this file contains some text (Apache error), `.htaccess` usage is possible for current website. Usually check for `.htaccess` possibility with this procedure causes access warning inside log files. It is OK.

### module.test ###
Can be found inside JavaScript cache directory.
Contains content of `libs/js/wo.cookie.php`, `libs/js/yass.loader.php`, or `libs/js/yass.loadbar.js` files (it depends on current testing module). It is used to check possible usage of Apache modules (if `apache_get_modules` returns nothing).