# Integration with website #

## Integration approaches ##

WEBO Site SpeedUp can be integrated into your website in several ways:
  * Buffered approach
  * Raw approach
  * Complex approach
  * Shutdown approach

### Buffered approach ###
It's the most common way. First call of WEBO Site SpeedUp (with library require) ends with `ob_start()`. Then all content (there can be either simple `echo $content` or hundreds of different `echo 'some tag'`) echoed till the next call of WEBO Site SpeedUp will be buffered. The second (and the last) call `$web_optimizer->finish();` ends buffering with `ob_get_clean()`. And then this content (HTML document) is parsed and optimized. Generally it looks like this:

```
require('.../web.optimizer.php');
...
echo ...
...
echo ...
...
$web_optimizer->finish();
```

There are several issues with PHP buffers from website subsystems, so sometimes this approach won't work. But usually it can be used for any website.

### Raw approach ###
There is a possibility to parse HTML content with WEBO Site SpeedUp without buffering. It can be achieved by following lines of code:

```
$not_buffered = 1;
require('.../web.optimizer.php');
$content = $web_optimizer->finish($content);
```

As shown in the example, WEBO Site SpeedUp can receive entire HTML document on its input and return it optimized. This approach can also be useful to create a complex application with scheduled optimization.

### Complex approach ###
Both described above approaches can be used in one place. A good example of usage has been implemented into WordPress plugin:

```
/* main function for every page execution */
function web_optimizer_init() {
	ob_start('web_optimizer_shutdown');
}
/* envelope output buffer with optimization actions */
function web_optimizer_shutdown ($content) {
	$not_buffered = 1;
	require(dirname(__FILE__) . '/web-optimizer/web.optimizer.php');
	return $web_optimizer->finish($content);
}
/* add init and finish hook */
add_action('plugins_loaded', 'web_optimizer_init');
```

Buffered approach is implemented in `web_optimizer_init` function, where buffering is initialized and delayed until webpage content is ready to be sent to browser. At the same time function `web_optimizer_shutdown` implements raw approach and returns optimized content after single WEBO Site SpeedUp call.

### Shutdown approach ###
One more way to integrate WEBO Site SpeedUp into website is shutdown function registration (via `ob_start`). Example (at the very beginning of `index.php` file):

```
global $webo_request_uri;
$not_buffered = 1;
require(dirname(__FILE__) . '/web-optimizer/web.optimizer.php');
function weboptimizer_shutdown ($content) {
	if (!empty($content)) {
		global $webo_request_uri;
		$_SERVER['REQUEST_URI'] = $webo_request_uri;
		$not_buffered = 1;
		require(dirname(__FILE__) . '/web-optimizer/web.optimizer.php');
		if (!empty($web_optimizer)) {
			$weboptimizer_content = $web_optimizer->finish($content);
		}
		if (!empty($weboptimizer_content)) {
			$content = $weboptimizer_content;
		}
		return $content;
	}
}
ob_start('weboptimizer_shutdown');
```

## Scheduled optimization ##
WEBO Site SpeedUp can be used in deployment process of any website in static mode. Just open all website pages when WEBO Site SpeedUp is installed, and then just copy resulted HTML documents to cache folders. We can for example run `wget` and get optimized website mirror that can be deployed on production server.
```
wget -d -r -c http://dev.yoursite.ru/
```

## Multiple domain/folder configuration ##
WEBO Site SpeedUp Corporate Edition can be used for multiple domains and folders with independent configuration (under 1 product interface). To make this possible you need to create inside the product folder - i.e. `web-optimizer/` the following configuration files (you can just copy them from `config.webo.php` and change host to required one):
```
mydomain.com.config.webo.php
mydomain.com#internal#folder.config.webo.php
```
This will allow WEBO Site SpeedUp to use different configurations for `mydomain.com` website and for its folder `/internal/folder`. When administrative interface is loaded all configurations are parsed and included into special array.

Recommended steps to tune WEBO Site SpeedUp for different websites:
  1. Create and tune the product for the main website, get working configuration (it will be saved into file config.webo.php).
  1. Copy file config.webo.php inside the product folder to another domain configuration file (as shown above).
  1. Edit configuration file to make it working for another domain (enable or disable options, there won't be a lot of changes because both websites work on the same server) via FTP or SSH.

To make this process easier there is automatic host recognition in product administrative panel. Also it is recommended to have 2 (or more) different configurations in product administrative panel and easily edit and apply them for required domains.

## Server-side changes ##

### Source files changes ###

In case of standalone installation, WEBO Site SpeedUp adds two lines of code in the beginning and in the end of a few files which responds for HTML output (depending on system). Most often the only changed file is an `index.php` in a website root directory.

In case of native plugin installation no changes in system files are usually made except of common changes to install the plugin.

The only file which can be modified on every system is `.htaccess` file in website root directory. Note that this file is modified only when `Enable .htaccess` option on .htaccess tab of Settings page is checked.

WEBO Site SpeedUp automatically backups all modified files. Backup files gets gets .backup extension. For example, original `index.php` file will become `index.php.backup` after WEBO Site SpeedUp installation. Newly created `index.php` file will contain all changes WEBO Site SpeedUp needs to work properly.

WEBO Site SpeedUp never modifies other source files, images, CSS or JS files without your notice. Optimized files are stored and served from a separate cache directories leaving original files untouched. The exception is Image Optimization tool but it runs only on demand and backups all optimized images too.

### .htaccess changes ###

If `Enable .htaccess` option on .htaccess tab of Settings page is checked, WEBO Site SpeedUp automatically changes .htaccess file to implement all necessary optimization techniques. These changes are described below.

#### mod\_expires – all cached headers ####

```
# Add caching headers for all files
ExpiresActive On
```

If we cache HTML files
```
<FilesMatch \.(html|xhtml|xml|shtml|phtml|php)$>
	ExpiresDefault "access plus here_goes_HTML_timeout seconds"
</FilesMatch>
ExpiresByType text/html A_HTML_timeout
ExpiresByType text/xml A_HTML_timeout
ExpiresByType application/xhtml+xml A_HTML_timeout
ExpiresByType text/plain A_HTML_timeout
```

If we cache CSS files
```
<FilesMatch \.css$>
	ExpiresDefault "access plus 10 years"
</FilesMatch>
ExpiresByType text/css A315360000
```

If we cache JavaScript files
```
<FilesMatch \.js$>
	ExpiresDefault "access plus 10 years"
</FilesMatch>
ExpiresByType text/javascript A315360000
ExpiresByType application/javascript A315360000
ExpiresByType application/x-javascript A315360000
ExpiresByType text/x-js A315360000
ExpiresByType text/ecmascript A315360000
ExpiresByType application/ecmascript A315360000
ExpiresByType text/vbscript A315360000
ExpiresByType text/fluffscript A315360000
```

If we cache images
```
<FilesMatch \.(bmp|png|gif|jpe?g|ico)$>
	ExpiresDefault "access plus 10 years"
</FilesMatch>
ExpiresByType image/gif A315360000
ExpiresByType image/png A315360000
ExpiresByType image/jpeg A315360000
ExpiresByType image/x-icon A315360000
ExpiresByType image/bmp A315360000
```

If we cache fonts
```
<FilesMatch \.(eot|ttf|otf|svg)$>
	ExpiresDefault "access plus 10 years"
</FilesMatch>
ExpiresByType application/x-font-opentype A315360000
ExpiresByType application/x-font-truetype A315360000
ExpiresByType application/x-font-ttf A315360000
ExpiresByType application/x-font A315360000
ExpiresByType font/opentype A315360000
ExpiresByType font/otf A315360000
ExpiresByType application/vnd.oasis.opendocument.formula-template A315360000
ExpiresByType image/svg+xml A315360000
ExpiresByType application/vnd.ms-fontobject A315360000
ExpiresByType font/woff A315360000
```

If we cache video files
```
<FilesMatch \.(flv|wmv|asf|asx|wma|wax|wmx|wm)$>
	ExpiresDefault "access plus 10 years"
</FilesMatch>
ExpiresByType video/x-flv A315360000
ExpiresByType video/x-ms-wmv A315360000
ExpiresByType video/x-ms-asf A315360000
ExpiresByType video/x-ms-asx A315360000
ExpiresByType video/x-ms-wma A315360000
ExpiresByType video/x-ms-wax A315360000
ExpiresByType video/x-ms-wmx A315360000
ExpiresByType video/x-ms-wm A315360000
```

If we cache other static assets
```
<FilesMatch \.(swf|pdf|doc|rtf|xls|ppt)$>
	ExpiresDefault "access plus 10 years"
</FilesMatch>
ExpiresByType application/x-shockwave-flash A315360000
ExpiresByType application/pdf A315360000
ExpiresByType application/msword A315360000
ExpiresByType application/rtf A315360000
ExpiresByType application/vnd.ms-excel A315360000
ExpiresByType application/vnd.ms-powerpoint A315360000
```

#### mod\_deflate + mod\_filter (if mod\_gzip is absent) – all gzip logic ####

```
# Gzip HTML and ICO files (if page is gzipped)
AddOutputFilterByType DEFLATE text/html
AddOutputFilterByType DEFLATE text/xml
AddOutputFilterByType DEFLATE image/x-icon
```

Gzip CSS files
```
AddOutputFilterByType DEFLATE text/css
```

Gzip JavaScript files
```
AddOutputFilterByType DEFLATE text/javascript
AddOutputFilterByType DEFLATE application/javascript
AddOutputFilterByType DEFLATE application/x-javascript
AddOutputFilterByType DEFLATE text/x-js
AddOutputFilterByType DEFLATE text/ecmascript
AddOutputFilterByType DEFLATE application/ecmascript
AddOutputFilterByType DEFLATE text/vbscript
AddOutputFilterByType DEFLATE text/fluffscript
```

#### mod\_gzip – all gzip logic if mod\_deflate is absent ####

Initialize gzip module
```
mod_gzip_on Yes
# Add static gzipping
mod_gzip can_negotiate Yes
# Static gzip suffix
mod_gzip static_suffix .gz
# Encoding for static gzip
AddEncoding gzip .gz
mod_gzip update_static No
mod_gzip keep_workfiles No
mod_gzip minimum_file_size 500
mod_gzip maximum_file_size 5000000
mod_gzip maximum_inmem_size 60000
mod_gzip min_http 1000
mod_gzip handle_methods GET POST
mod_gzip item_exclude reqheader \"User-agent: Mozilla/4.0[678]\"
mod_gzip dechunk No
```

Add gzip for page
```
mod_gzip_item_include mime ^text/html$
mod_gzip_item_include mime ^text/plain$
mod_gzip_item_include mime ^image/x-icon$
mod_gzip_item_include mime ^httpd/unix-directory$
```

Add gzip for CSS files
```
mod_gzip_item_include mime ^text/css$
```

Add gzip for JavaScript files
```
mod_gzip_item_include mime ^text/javascript$
mod_gzip_item_include mime ^application/javascript$
mod_gzip_item_include mime ^application/x-javascript$
mod_gzip_item_include mime ^text/x-js$
mod_gzip_item_include mime ^text/ecmascript$
mod_gzip_item_include mime ^application/ecmascript$
mod_gzip_item_include mime ^text/vbscript$
mod_gzip_item_include mime ^text/fluffscript$
```

#### mod\_headers – to safe headers for gzip / expires + ETag ####

Disable caching for gzipped files on proxies
```
<FilesMatch \.(css|js)$>
	Header append Vary User-Agent
	Header append Cache-Control private
</FilesMatch>
```

Disable Last-Modified (add ETag instead) -- not vice versa?
```
<FilesMatch \.(ico|pdf|flv|swf|jpe?g|png|gif|bmp|js|css)$>
	Header unset Last-Modified
	FileETag MTime
</FilesMatch>
```

#### mod\_setenvif – to make gzip headers safe for all browsers ####

Exclude problem browsers from gzip
```
BrowserMatch ^Mozilla/4 gzip-only-text/html
BrowserMatch ^Mozilla/4\.0[678] no-gzip
BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
```

Finding out compression type and browser type for extreme mode of server side caching
```
SetEnvIfNoCase accept-encoding deflate WSSENC=.df
SetEnvIfNoCase accept-encoding gzip WSSENC=.gz
BrowserMatch "MSIE 6" WSSBR=.ie6
BrowserMatch "MSIE 7" WSSBR=.ie7
BrowserMatch "MSIE 8" WSSBR=.ie8
BrowserMatch "Android|BlackBerry|HTC|iPhone|iPod|LG|MOT|Mobile|NetFront|Nokia|Opera Mini|Palm|PPC|SAMSUNG|Smartphone|SonyEricsson|Symbian|UP.Browser|webOS" WSSBR=.ma
```

#### mod\_rewrite + mod\_mime (in addition to mod\_deflate or mod\_gzip) -- to gzip CSS / JS files statically ####

Add Encoding for gziped files
```
AddEncoding gzip .gz
```

Add redirects to static files (file names are set with timestamps to force cache reload on the client side properly)
```
RewriteRule ^(.*)\.wo[0-9]+\.(css|php)$ $1.$2
RewriteRule ^(.*)\.wo[0-9]+\.(js|php)$ $1.$2
```

Add static gzip for CSS files
```
RewriteCond %{HTTP:Accept-encoding} gzip
RewriteCond %{HTTP_USER_AGENT} !Konqueror
RewriteCond %{REQUEST_FILENAME}.gz -f
RewriteRule ^(.*)\.css$ $1.css.gz [QSA,L]
```

Add static gzip for JavaScript files
```
RewriteCond %{HTTP:Accept-encoding} gzip
RewriteCond %{HTTP_USER_AGENT} !Konqueror
RewriteCond %{REQUEST_FILENAME}.gz -f
RewriteRule ^(.*)\.js$ $1.js.gz [QSA,L]
```

Adde redirect rules for extreme mode of server side caching (for WordPress, for example)
```
RewriteCond %{HTTP:Cookie} !^.*(comment_author_|wordpress|wp-postpass_).*$
RewriteCond %{REQUEST_METHOD} !=POST
RewriteCond /path-to-document-root/wp-content/plugins/webo-site-speedup/cache/%{HTTP_HOST}/%{REQUEST_URI}%{QUERY_STRING}index%{ENV:WSSBR}.html%{ENV:WSSENC} -f
RewriteRule (.*) /wp-content/plugins/webo-site-speedup/cache/%{HTTP_HOST}/$1/index%{ENV:WSSBR}.html%{ENV:WSSENC} [L]
```

### Changes for nginx configuration file ###

Following rules should be manually added to nginx configuration file to enable gzip compression, client-side caching and extreme mode server-caching.

```
# Setting gzip compression
gzip on;
gzip_comp_level 7;
gzip_types text/plain text/html text/xml application/xhtml+xml image/x-icon image/vnd.microsoft.icon text/richtext text/xsd text/xsl text/xml application/json text/css text/javascript application/javascript application/x-javascript text/x-js text/ecmascript application/ecmascript text/vbscript text/fluffscript image/svg+xml application/x-font-ttf application/x-font font/opentype font/otf font/ttf application/x-font-truetype application/x-font-opentype application/vnd.ms-fontobject application/vnd.oasis.opendocument.formula-template;

# Finding out compression type and browser type for extreme mode of server side caching
if ($http_accept_encoding ~* deflate) {
	set $wssenc .df;
}
# Remove the following condition in case .html documents won't have .html.gz pairs cached
if ($http_accept_encoding ~* gzip) {
	set $wssenc .gz;
}
if ($http_user_agent ~ "MSIE 6") {
	set $wssbr .ie6;
}
if ($http_user_agent ~ "MSIE 7") {
	set $wssbr .ie7;
}
if ($http_user_agent ~ "MSIE 8") {
	set $wssbr .ie8;
}
if ($http_user_agent ~ "Android|BlackBerry|HTC|iPhone|iPod|LG|MOT|Mobile|NetFront|Nokia|Opera Mini|Palm|PPC|SAMSUNG|Smartphone|SonyEricsson|Symbian|UP.Browser|webOS") {
	set $wssbr .ma;
}

# Redirect rules for cache files
if ($request_method != POST) {
	set $cache_file_name /path-to-document-root/wp-content/plugins/webo-site-speedup/cache/$http_host$request_uri/index$wssbr.html$wssenc;
}
if ($http_cookie ~* "wordpress|wp-postpass_") {
	set $cache_file_name '';
}
if (-f $cache_file_name) {
	rewrite ^ /wp-content/plugins/webo-site-speedup/cache/$http_host$request_uri/index$wssbr.html$wssenc break;
}

location ~* ^/wp-content/plugins/webo-site-speedup/cache/.*\.gz
{
        gzip_static on;
        rewrite ^(.*)\.gz$ $1;
}

location ~* ^/wp-content/plugins/webo-site-speedup/cache/.*\.df
{
        gzip_static off;
        add_header Content-Encoding deflate;
}

# Rewriting filename endings with hash to override client-side cache
rewrite ^(.*)\.wo[0-9]+\.(css|php)$ $1.$2;
rewrite ^(.*)\.wo[0-9]+\.(js|php)$ $1.$2;
rewrite ^(.*)\.wo[0-9]+\.(jpe?g|png)$ $1.$2;

# Setting client-side caching headers
location ~* \.(jpe?g|gif|png|css|js|swf|ico|bmp|cur)$ {
	root /path/to/document/root;
	expires max;
	add_header Last-Modified: $date_gmt;
}

# Setting vary header
location ~* \.(css|js)$ {
	add_header Vary: Content-Encoding;
}
```