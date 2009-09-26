<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Sends cache headers among the content of requested file.
 * Resticted filename to document root only.
 * Helps when there is now mod_expires on the server.
 * htaccess RewriteRule ^(.*)\.(gif|png|jpe?g|ico)\.$ /webo/cache/wo.static.php?$1.$2
 * or raw /webo/cache/wo.static.php?$filepath
 *
 **/

$document_root = '/home/dreamwind/www/cmsms.webo.in/';
/* calculate extension */
$extension = strtolower(preg_replace("!.*\.!", "", $_SERVER['QUERY_STRING']));
/* calculate MIME type */
switch ($extension) {
    case 'jpg':
        $extension = 'jpeg';
    case 'bmp':
	case 'gif':
    case 'png':
        $extension = 'image/' . $extension;
        break;
	case 'ico':
		$extension = 'image/x-icon';
		break;
	case 'flv':
		$extension = 'video/x-flv';
		break;
	case 'asf':
	case 'asx':
	case 'wmv':
	case 'wma':
	case 'wax':
	case 'wmx':
	case 'wm':
		$extension = 'video/x-ms-' . $extension;
		break;
	case 'swf':
		$extension = 'application/x-shockwave-flash';
		break;
	case 'pdf':
		$extension = 'application/pdf';
		break;
	case 'doc':
		$extension = 'application/msword';
		break;
	case 'rtf':
		$extension = 'application/rtf';
		break;
	case 'xls':
		$extension = 'application/vnd.ms-excel';
		break;
	case 'ppt':
		$extension = 'application/vnd.ms-powerpoint';
		break;
}
$filename = realpath($document_root . $_SERVER['QUERY_STRING']);
/* check if we inside document root */
if (strpos(" " . $filename, $document_root)) {
/* send correct content-encoding header */
	header('Content-Type: ' . $extension);
/* get content */
    $content = @file_get_contents($filename);
/* calculate ETag */
	$hash = crc32($content);
	if ((isset($_SERVER['HTTP_IF_NONE_MATCH']) &&
			stripslashes($_SERVER['HTTP_IF_NONE_MATCH']) == '"' . $hash . '"') ||
		(isset($_SERVER['HTTP_IF_MATCH']) &&
			stripslashes($_SERVER['HTTP_IF_MATCH']) == '"' . $hash . '"')) {
/* return visit and no modifications, so do not send anything */
				header ('HTTP/1.0 304 Not Modified');
				header ('Content-Length: 0');
				exit();
	} else {
/* set ETag */
		header('ETag: "' . $hash . '"');
/* cache timeout */
		$timeout = 360000000;
/* Set Cache-Control header */
		header("Cache-Control: public, max-age=" . $timeout);
/* Set Expires header */
		@date_default_timezone_set(@date_default_timezone_get());
		header("Expires: " . gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + $timeout). ' GMT');
/* finally output content */
		echo $content;
	}
}

?>