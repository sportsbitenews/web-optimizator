<?php
#########################################
## Web Optimizer options file ###########
#########################################
## Access control
$compress_options['username'] = "";
$compress_options['password'] = "";
## Path info
$compress_options['javascript_cachedir'] = "";
$compress_options['css_cachedir'] = "";
$compress_options['webo_cachedir'] = "";
$compress_options['document_root'] = "";
## Comma separated list of JS Libraries to include
$compress_options['js_libraries'] = "";
$compress_options['unobtrusive']['on'] = "0";
$compress_options['external_scripts']['on'] = "1";
## Ignore list, files separated by space
$compress_options['external_scripts']['ignore_list'] = "tiny_mce.js";
## Performance options
$compress_options['dont_check_file_mtime']['on'] = "1";
## Minify options
$compress_options['minify']['javascript'] = "1";
$compress_options['minify']['with_jsmin'] = "0";
$compress_options['minify']['with_packer'] = "0";
$compress_options['minify']['with_yui'] = "1";
$compress_options['minify']['css'] = "1";
$compress_options['minify']['page'] = "1";
## Gzip options
$compress_options['gzip']['javascript'] = "1";
$compress_options['gzip']['page'] = "1";
$compress_options['gzip']['css'] = "1";
## Versioning
$compress_options['far_future_expires']['javascript'] = "1";
$compress_options['far_future_expires']['css'] = "1";
$compress_options['far_future_expires']['static'] = "1";
## On or off 
$compress_options['active'] = "1";
## Display a link back to Web Optimizer
$compress_options['footer']['text'] = "1";
$compress_options['footer']['image'] = "1";
## Should Web Optimizer Clean Up the cache directory?
$compress_options['cleanup']['on'] = "0";
## Should Web Optimizer use data URIs for background images?
$compress_options['data_uris']['on'] = "1";
## Should Web Optimizer use CSS Sprites for background images?
$compress_options['css_sprites']['enabled'] = "1";
$compress_options['css_sprites']['truecolor_in_jpeg'] = "0";
$compress_options['css_sprites']['aggressive'] = "0";
$compress_options['css_sprites']['extra_space'] = "1";
## Ignore list, files separated by space
$compress_options['css_sprites']['ignore_list'] = "";
## Should be gzip / cache settings written via .htaccess?
$compress_options['htaccess']['enabled'] = "1";
$compress_options['htaccess']['mod_deflate'] = "1";
$compress_options['htaccess']['mod_gzip'] = "1";
$compress_options['htaccess']['mod_expires'] = "1";
$compress_options['htaccess']['mod_headers'] = "1";
$compress_options['htaccess']['mod_setenvif'] = "1";
#########################################
?>