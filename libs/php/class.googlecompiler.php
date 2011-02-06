<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software
 * (http://www.webogroup.com/)
 * Envelopes Google Compiler into PHP call
 * Outputs minified content
 *
 * ============================================================
 * Google Closure Compiler binary is licensed under Apache License
 * Copyright 2009 The Closure Compiler Authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 **/
class GoogleCompiler {

	function __construct($cachedir, $rootdir) {
		$this->jarfile = $rootdir . 'libs/googlecompiler/googlecompiler.jar';
		$this->command = '/usr/bin/env java -jar';
		$this->file = $cachedir . time() . '.js';
	}

	public function compress($content, $type="js") {
		@file_put_contents($this->file, $content);
		if (!file_exists($this->file)) {
			return $content;
		}
		if (!$this->check()) {
			@unlink($this->file);
			return $content;
		}
		$content = @shell_exec($this->command . ' ' . $this->jarfile . ' --js=' . $this->file);
		@unlink($this->file);
		return $content; 
	}

	function check() {
		if (strpos(@ini_get('disable_functions') . ' ' . @ini_get('suhosin.executor.func.blacklist'), 'shell_exec') === false && !@ini_get('safe_mode')) {
			try {
				$locate = @shell_exec('whereis java');
			} catch (Expression $e) {}
		}
		if (isset($locate)) {
			return true;
		} else {
			return false;
		}
	}
}
?>