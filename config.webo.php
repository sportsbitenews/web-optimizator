<?php
#########################################
## Web Optimizer options file ###########
#########################################
## Access control
$compress_options['username'] = "";
$compress_options['password'] = "";
## Path info. Cache directory for JS files
$compress_options['javascript_cachedir'] = "";
## Cache directory for CSS files
$compress_options['css_cachedir'] = "";
## Cache directory for HTML files
$compress_options['html_cachedir'] = "";
## Web Optimizer installation directory
$compress_options['webo_cachedir'] = "";
## Root directory of the website
$compress_options['document_root'] = "";
## Comma separated list of JS Libraries to include
$compress_options['js_libraries'] = "";
## Add JS loader for all libraries on DOMloaded event
$compress_options['unobtrusive']['on'] = "0";
## Merge external and inline scripts inside head
$compress_options['external_scripts']['on'] = "1";
## Merge inline styles in head and external CSS files
$compress_options['external_scripts']['css'] = "1";
## Ignore list, files separated by space
$compress_options['external_scripts']['ignore_list'] = "tiny_mce.js fckeditor.js";
## Performance options
$compress_options['dont_check_file_mtime']['on'] = "1";
## Minify options
$compress_options['minify']['javascript'] = "1";
## Minify JS with JSMin from Douglas Crockford
$compress_options['minify']['with_jsmin'] = "0";
## Minify JS with Dean Edwards Packer
$compress_options['minify']['with_packer'] = "0";
## Minify JS with YUI Compressor (requires java installed)
$compress_options['minify']['with_yui'] = "1";
$compress_options['minify']['css'] = "1";
## Remove whitespaces
$compress_options['minify']['page'] = "1";
## Remove comments from HTML. Some JS counters can be broken
$compress_options['minify']['html_comments'] = "0";
## Gzip options
$compress_options['gzip']['javascript'] = "1";
$compress_options['gzip']['page'] = "1";
$compress_options['gzip']['css'] = "1";
## Caching
$compress_options['far_future_expires']['javascript'] = "1";
$compress_options['far_future_expires']['css'] = "1";
## Cache static assets (images, flash, etc) -- only via .htaccess
$compress_options['far_future_expires']['static'] = "1";
## Send cache headers for HTML files?
$compress_options['far_future_expires']['html'] = "0";
## Default timeout of client side HTML files caching, in seconds
$compress_options['far_future_expires']['html_timeout'] = "60";
## Cache generated HTML files
$compress_options['html_cache']['enabled'] = "1";
## Cache timeout for generated HTML files, in seconds
$compress_options['html_cache']['timeout'] = "600";
## Flush head section with first N bytes of body?
$compress_options['html_cache']['flush_only'] = "1";
## Flush size of HTML body
$compress_options['html_cache']['flush_size'] = "1000";
## Parts of ignore URL for HTML cache, separated by space
$compress_options['html_cache']['ignore_list'] = "";
## Parts of user agents to output cached HTML, separated by space
$compress_options['html_cache']['allowed_list'] = "office data msfrontpage yahoo googlebot yandex yadirect dyatel msnbot twiceler";
## On or off 
$compress_options['active'] = "1";
## Display a link back to Web Optimizer
$compress_options['footer']['text'] = "1";
$compress_options['footer']['image'] = "1";
## Should Web Optimizer use data URIs for background images?
$compress_options['data_uris']['on'] = "1";
## Should Web Optimizer use CSS Sprites for background images?
$compress_options['css_sprites']['enabled'] = "1";
## Save 24bit images in JPEG not PNG
$compress_options['css_sprites']['truecolor_in_jpeg'] = "0";
## Ignore no dimensions for repeat-x / repeat-y Sprites
$compress_options['css_sprites']['aggressive'] = "0";
## Add additional 5px to CSS Sprites
$compress_options['css_sprites']['extra_space'] = "1";
## Exclude IE6 from CSS Sprites creation
$compress_options['css_sprites']['no_ie6'] = "0";
## Restrict large Sprites creation on PHP memory limit
$compress_options['css_sprites']['memory_limited'] = "1";
## CSS Sprites ignore list, files separated by space, i.e. head.jpg
$compress_options['css_sprites']['ignore_list'] = "";
## Parallel downloads
$compress_options['parallel']['enabled'] = "1";
## List of hosts for parallel downloads
$compress_options['parallel']['allowed_list'] = "";
## Should be gzip / cache settings written via .htaccess?
$compress_options['htaccess']['enabled'] = "1";
$compress_options['htaccess']['mod_deflate'] = "1";
$compress_options['htaccess']['mod_gzip'] = "1";
$compress_options['htaccess']['mod_expires'] = "1";
$compress_options['htaccess']['mod_headers'] = "1";
$compress_options['htaccess']['mod_setenvif'] = "1";
## Use local directory with installed website
$compress_options['htaccess']['local'] = "1";
## Security options
$compress_options['htaccess']['access'] = "0";
#########################################
?>