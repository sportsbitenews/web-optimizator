<?php
class YuiCompressor {
	public $jarfile = 'libs/yuicompressor/yuicompressor-2.3.2.jar';
	public $command = '/usr/bin/env java -jar';
	public $file = '';
	function __construct($content) {
		$tmpname = 'cache/'.time().'.js';
		file_put_contents($tmpname,$content);
		if(file_exists($tmpname)){
			$this->file = $tmpname;
		}else{
			die('Oops, file not found');
		}
		if(!is_executable($this->jarfile)){
			if(!shell_exec('chmod +x '.$this->jarfile)){
			   die('Oops, can\'t chmod file');  
			}
		}
		if(!$this->check()){
			die('Java not install');
		}
	}
	public function compress($type="js"){
		$content = shell_exec($this->command.' '.$this->jarfile.' '.$this->file);
		unlink($this->file);
		return $content; 
	}
	function check(){
		$locate = shell_exec('whereis java');
		if(isset($locate)){
			return true;
		}else{
			return false;
		}
	}
}