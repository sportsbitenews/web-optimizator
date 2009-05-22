<?php
/**
 * File from Web Optimizer, Alexander Beshkenadze, Nikolay Matsievsky
 * Envelopes YUI Compressor into PHP call
 * Outputs minified content
 *
 **/
class YuiCompressor {

	function __construct($cachedir, $rootdir) {
		$this->jarfile = $rootdir . 'libs/yuicompressor/yuicompressor.jar';
		$this->command = '/usr/bin/env java -jar';
		$this->file = $cachedir . time() . '.js';
	}

	function compress($content, $type="js"){
		@file_put_contents($this->file, $content);
		if(!file_exists($this->file)){
			return $content;
		}
		if(!$this->check()){
			return $content;
		}
		$content = @shell_exec($this->command . ' ' . $this->jarfile . ' ' . $this->file);
		@unlink($this->file);
		return $content; 
	}

	function check(){
		$locate = @shell_exec('whereis java');
		if(isset($locate) && is_executable($this->jarfile)){
			return true;
		}else{
			return false;
		}
	}
}
?>