<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Sends cache headers among the content of requested file.
 * Resticted filename to document root only.
 * Helps when there is no mod_expires on the server.
 *
 **/
/* return heximal number for a decimal one, by jbleau at gmail dot com */
function dec_to_hex ($dec) {
	$hex = Array(	0 => 0, 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5,
					6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 'a',
					11 => 'b', 12 => 'c', 13 => 'd', 14 => 'e',
					15 => 'f' );
	do {
		$h = $hex[($dec%16)] . $h;
		$dec /= 16;
	} while ($dec >= 1);
	return $sign . $h;
}

$document_root = $_SERVER['DOCUMENT_ROOT'];
/* Avoiding problems with Denwer and others CGI */
if (empty($document_root) || !is_dir($document_root) || !is_file($document_root . getenv("SCRIPT_NAME"))) {
	$document_root = substr(getenv("SCRIPT_FILENAME"), 0, strpos(getenv("SCRIPT_FILENAME"), getenv("SCRIPT_NAME")));
}
$document_root = realpath(str_replace("\\", "/", $document_root));
/* calculate extension */
$dot = strrpos($_SERVER['QUERY_STRING'], '.');
$extension = strtolower(substr($_SERVER['QUERY_STRING'], $dot + 1, strlen($_SERVER['QUERY_STRING']) - $dot));
/* calculate MIME type */
switch ($extension) {
	case 'jpg':
		$extension = 'jpeg';
	case 'jpeg':
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
/* protect all other files from viewing */
	default:
		$extension = '';
		break;
}
$filename = str_replace("\\", "/", realpath($document_root . $_SERVER['QUERY_STRING']));
/* check if we inside document root */
if (strpos(" " . $filename, $document_root) && !empty($extension)) {
/* set correct content-encoding header */
	header('Content-Type: ' . $extension);
/* set correct Content-Disposition to correct end-filename */
	$slash = strrpos($filename, '/');
	header('Content-Disposition: attachment;filename=' .
			substr($filename, $slash + 1, strlen($filename) - $slash) .
		';modification-date="' .
			date("r", @filemtime($filename)) .
		'";');
/* calculate ETag, mimicry to default Apache settings */
	$hash = dec_to_hex(@fileinode($filename)) . '-' . dec_to_hex(@filesize($filename)) . '-' . dec_to_hex(@filemtime($filename));
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
/* set Cache-Control header */
		header("Cache-Control: public, max-age=" . $timeout);
/* set Expires header */
		@date_default_timezone_set(@date_default_timezone_get());
		header("Expires: " . gmdate('D, d M Y H:i:s', $_SERVER['REQUEST_TIME'] + $timeout). ' GMT');
/* finally output content */
		echo @file_get_contents($filename);
	}
}

?>