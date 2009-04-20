<?php
require_once 'yuicompressor.php';
$yui = new YuiCompressor(file_get_contents('libs/js/yass.loadbar.js'));
echo $yui->compress();