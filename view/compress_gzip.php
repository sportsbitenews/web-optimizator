<?php
/**
 * File from WEBO Site SpeedUp, Nikolay Matsievsky (http://www.web-optimizer.us/)
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
?>]