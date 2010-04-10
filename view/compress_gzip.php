<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Outputs info about compressed file
 * Result (success or failure), file name, file size, compressed size
 *
 **/
?>[<?php
	echo $success ? 1 : 0;
?>,"<?php
	echo htmlspecialchars($file);
?>",<?php
	echo round($size);
?>,<?php
	echo round($compressed);
	if ($error) {
/* error codes:
 1 - can't write to the file
 2 - can't gzip file
 */
?>,<?php
		echo round($error);
	}
?>]