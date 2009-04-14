<?php
/**
 * File from PHP Speedy, Leon Chevalier (http://www.aciddrop.com)
 * Adopted to Web Optimizer by Nikolay Matsievsky (http://webo.in)
 * Gzips and minifies the JavaScript and CSS within the head tags of a page. 
 * Can also gzip and minify the page itself
 **/
class web_optimizer {

	/**
	* Constructor
	* Sets the options and defines the gzip headers
	**/
	function web_optimizer($options = false) {
		if(!empty($options['skip_startup'])) {
			return;
		}	
/* initialize chained optimization */
		$this->web_optimizer_stage = round(empty($_GET['web_optimizer_stage']) ? 0 : $_GET['web_optimizer_stage']);
		$this->username = htmlspecialchars(empty($_GET['username']) ? '' : $_GET['username']);
		$this->password = htmlspecialchars(empty($_GET['password']) ? '' : $_GET['password']);
		$this->auto_rewrite = round(empty($_GET['auto_rewrite']) ? '' : $_GET['auto_rewrite']);
/* Allow merging of other classes with this one */
		foreach($options AS $key=>$value) {
			$this->$key = $value;
		}
/* define head of the webpage for scripts / styles */
		$this->head = '';
/* Set options */
		$this->set_options();
/* Define the gzip headers */
		$this->set_gzip_headers();
/* Start things off */
		$this->start();
	}

	/**
	* Write installation progress to JavaScript file
	* 
	**/	
	function write_progress ($progress) {
		$fp = @fopen('progress.js', "w");
		if ($fp) {
			@fwrite($fp, 'window.progress=' . $progress);
			@fclose($fp);
		}
	}

	/**
	* Options are read from config.webo.php
	**/
	function set_options() {
/* Set paths with new options */
		$this->options['document_root'] = !empty($this->options['document_root']) ? $this->options['document_root'] : '';
		$this->view->set_paths($this->options['document_root']);
/* Set ignore file */
		if(!empty($this->options['ignore_list'])) {
			$this->ignore(trim($this->options['ignore_list']));
		}			
/* Read in options */
		$full_options = array(
			"javascript" => array(
				"cachedir" => $this->options['javascript_cachedir'],
				"installdir" => $this->options['webo_cachedir'],
				"gzip" => $this->options['gzip']['javascript'] && !$this->options['htaccess']['enabled'] && !$this->options['htaccess']['mod_gzip'] && !$this->options['htaccess']['mod_deflate'],
				"minify" => $this->options['minify']['javascript'],
				"minify_with" => $this->options['minify']['with_jsmin'] ? 'jsmin' : ($this->options['minify']['with_yui'] ? 'yui' : ($this->options['minify']['with_packer'] ? 'packer' : '')),
				"far_future_expires" => $this->options['far_future_expires']['javascript'] && !$this->options['htaccess']['enabled'] && !$this->options['htaccess']['mod_expires'],
				"unobtrusive" => $this->options['unobtrusive']['on'],
				"external_scripts" => $this->options['external_scripts']['on'],
				"external_scripts_exclude" => $this->options['external_scripts']['ignore_list']
			),
			"css" => array(
				"cachedir" => $this->options['css_cachedir'],
				"installdir" => $this->options['webo_cachedir'],
				"gzip" => $this->options['gzip']['css'] && !$this->options['htaccess']['enabled'] && !$this->options['htaccess']['mod_gzip'] && !$this->options['htaccess']['mod_deflate'],
				"minify" => $this->options['minify']['css'],
				"minify_with" => $this->options['minify']['with_yui'] ? 'yui' : 'tidy',
				"far_future_expires" => $this->options['far_future_expires']['css'] && !$this->options['htaccess']['enabled'] && !$this->options['htaccess']['mod_expires'],
				"data_uris" => $this->options['data_uris']['on'],
				"css_sprites" => $this->options['css_sprites']['enabled'],
				"css_sprites_exclude" => $this->options['css_sprites']['ignore_list'],
				"truecolor_in_jpeg" => $this->options['css_sprites']['truecolor_in_jpeg'],
				"aggressive" => $this->options['css_sprites']['aggressive'],
				"unobtrusive" => false,
				"external_scripts" => $this->options['external_scripts']['on'],
				"external_scripts_exclude" => $this->options['external_scripts']['ignore_list']
			),
			"page" => array(
				"gzip" => $this->options['gzip']['page'] && !$this->options['htaccess']['enabled'] && !$this->options['htaccess']['mod_gzip'] && !$this->options['htaccess']['mod_deflate'],
				"minify" => $this->options['minify']['page']
			)
		);
/* overwrite other options array that we passed in */
		$this->options = $full_options;
/* Make sure cachedir does not have trailing slash */
		foreach($this->options AS $key=>$option) {			
			if(!empty($option['cachedir'])) {
				if(substr($option['cachedir'],-1,1) == "/") {
					$cachedir = substr($option['cachedir'], 0, -1); 
					$option['cachedir'] = $cachedir;
				}			   
			}
			$this->options[$key] = $option;			
		}
		$this->options['show_timer'] = false; //time the javascript and css compression?	
	}
	
	/**
	* Start saving the output buffer
	* 
	**/	
	function start() {
		ob_start();
	}
	
	/**
	* Compress passes content directly
	* 
	**/	
	function compress($content) {
		$this->finish($content);
	}
	
	/**
	* Tells the script to ignore certain files
	* 
	**/	
	function ignore($files = false) {
		if(!empty($files)) {
			$files_array = explode(",",$files);
		}
/* Ignore these files */
		if(!empty($files_array)) {
			foreach($files_array AS $key=>$value) {
				$this->ignore_files[] = trim($value);
			}
		}
	}	

	/**
	* Do work and return output buffer
	*
	**/	
	function finish($content = false) {

		$this->runtime = $this->startTimer();
		$this->times['start_compress'] = $this->returnTime($this->runtime);
		if(!$content) {
			$this->content = ob_get_clean();
		} else {
			$this->content = $content;
		}
		if ($this->web_optimizer_stage) {
			$this->write_progress($this->web_optimizer_stage = $this->web_optimizer_stage < 16 ? 16 : $this->web_optimizer_stage);
		}
/* Run the functions specified in options */
		if(is_array($this->options)) {
			foreach($this->options AS $func => $option) {
				if(method_exists($this,$func)) {
					if(!empty($option['gzip']) || !empty($option['minify']) || !empty($option['far_future_expires'])) {
						$this->$func($option, $func);
					}
				}
			}
		}
/* Delete old cache files */
		if(!empty($this->compressed_files) && is_array($this->compressed_files)) {
/* Make a string with the names of the compressed files */
			$this->compressed_files_string = implode("", $this->compressed_files);
		}
		if (!empty($this->web_optimizer_stage)) {
			$this->write_progress($this->web_optimizer_stage = $this->web_optimizer_stage < 90 ? 90 : $this->web_optimizer_stage);
		}
/* Delete any files that don't match the string	 */
		if(!empty($this->options['cleanup']['on'])) {
			$this->do_cleanup();
		}
		$this->times['end'] = $this->returnTime($this->runtime);
/* redirect to installation page if chained optimization */
		if (!empty($this->web_optimizer_stage)) {
			$this->write_progress($this->web_optimizer_stage = $this->web_optimizer_stage < 95 ? 95 : $this->web_optimizer_stage);
			header('Location: ../index.php?page=install_stage_3&submit=1&web_optimizer_stage='. $this->web_optimizer_stage .'&user[_username]=' . $this->username . '&user[_password]=' . $this->password . "&user[auto_rewrite][enabled][on]=" . $this->auto_rewrite);
			die();
		}
/* Echo content to the browser */
		if(empty($this->supress_output)) {
			if(!empty($this->return_content)) {
				return $this->content;
			} else {
				echo $this->content;
			}
		}

	}

	/**
	* GZIP and minify the javascript as required
	*
	**/	
	function javascript($options,$type) {
/* Remove any files in the remove list */
		$this->do_remove();
		$this->content = $this->do_compress(
			array(
				'cachedir' => $options['cachedir'],
				'installdir' => $options['installdir'],
				'tag' => 'script',
				'type' => 'text/javascript',
				'ext' => 'js',
				'src' => 'src',
				'self_close' => false,
				'gzip' => $options['gzip'],
				'minify' => $options['minify'],
				'minify_with' => $options['minify_with'],
				'far_future_expires' => $options['far_future_expires'],
				'header' => $type,
				'css_sprites' => false,
				'css_sprites_exclude' => false,
				'data_uris' => false,
				'save_name' => $type,
				'unobtrusive' => $options['unobtrusive'],
				'external_scripts' => $options['external_scripts'],
				'external_scripts_exclude' => $options['external_scripts_exclude']
			),
			$this->content
		);
	}

	/**
	* GZIP and minify the CSS as required
	*
	**/	
	function css($options, $type) {

		$this->get_head($this->content);
/* Need a head, HTML is out of the range */
		if(empty($this->head)) {
			return;
		}
/* Get links */
		preg_match_all("!<link[^>]+stylesheet[^>]*>!is", $this->head, $matches);
		if(count($matches[0]) == 0) {
			return;
		}
/* find variants */
		foreach($matches[0] AS $link) {
			preg_match_all("@(rel|media|href)=[\"'](.*?)[\"']@i", $link, $variants,PREG_SET_ORDER); //|media
			if(is_array($variants)) {
				$media = "";
				$marker = "";
				foreach($variants AS $variant_type) {
					$variant_type[1] = strtolower($variant_type[1]);
					switch ($variant_type[1]) {
						case "rel":
							$marker .= $variant_type[2];
							$return[$variant_type[1]] = $variant_type[2];
							break;
/* create array of sources / media to merge the minto 1 file */
						case "media":
						case "href":
							$$variant_type[1] = $variant_type[2];
							break;
					}
				}
			}
/* skip @media all -- can lead to broken CSS in WebKit */
			$media = $media == "all" ? "" : $media;
			$return['media_all'][$href] = $media;
/* Sub this new marker into the link */
			$marker = str_replace(" ", "", $marker);
			$return['real_type'] = $marker;
			$media_types[md5($marker)] = $return;
		}

		$this->process_report['media_types'] = $media_types;
/* Compress separately for each media type*/
		foreach ($media_types AS $key => $value) {
			$this->content = $this->do_compress(
				array(
					'cachedir' => $options['cachedir'],
					'installdir' => $options['installdir'],
					'tag' => 'link',
					'type' => 'text/css',
					'ext' => 'css',
					'src' => 'href',
					'rel' => !empty($value['rel']) ? $value['rel'] : false,
					'media' => !empty($value['media']) ? $value['media'] : false,
					'media_all' => $value['media_all'],
					'data_uris' => $options['data_uris'],
					'css_sprites' => $options['css_sprites'],
					'css_sprites_exclude' => $options['css_sprites_exclude'],
					'truecolor_in_jpeg' => $options['truecolor_in_jpeg'],
					'aggressive' => $options['aggressive'],
					'self_close' => true,
					'gzip' => $options['gzip'],
					'minify' => $options['minify'],
					'minify_with' => $options['minify_with'],
					'far_future_expires' => $options['far_future_expires'],
					'header' => $type,
					'save_name' => $type . $value['real_type'],
					'unobtrusive' => $options['unobtrusive'],
					'external_scripts' => $options['external_scripts'],
					'external_scripts_exclude' => $options['external_scripts_exclude']
				),
				$this->content
			);
		}

	}

	/**
	* GZIP and minify the page itself as required
	*
	**/		
	function page($options, $type) {
		if (!empty($this->web_optimizer_stage)) {
			$this->write_progress($this->web_optimizer_stage = $this->web_optimizer_stage < 88 ? 88 : $this->web_optimizer_stage);
		}
/* Minify page itself */
		if(!empty($options['minify'])) {
			$this->content = $this->trimwhitespace($this->content);
/* remove empty scripts after merging inline code */
			$this->content = preg_replace("/<script type=['\"]text\/javascript['\"]><\/script>/i", "", $this->content);
		}
/* Gzip page itself */
		if(!empty($options['gzip'])) {
			$content = $this->create_gz_compress($this->content);
			if($content) {			 
				$this->set_gzip_header();
				$this->content = $content;
			}
		}
	}
	
	/**
	* Return GZIP compressed content string with header
	*
	**/			
	function create_gz_compress($content) {
	
		if(strstr($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') && function_exists('gzcompress')) {
				$Size = strlen( $this->content );
				$Crc = crc32( $this->content );
				$content = "\x1f\x8b\x08\x00\x00\x00\x00\x00";
				$this->content = gzcompress( $this->content,2);
				$this->content = substr( $this->content, 0, strlen( $this->content) - 4 );
				$content .= ( $this->content );
				$content .= ( pack( 'V', $Crc ) );
				$content .= ( pack( 'V', $Size ) );
				return $content;
		} else {
			return false;
		}

	}
	
	/**
	* Sets the correct gzip header
	*
	**/	
	function set_gzip_header() {
		if(strpos(" ".$_SERVER["HTTP_ACCEPT_ENCODING"], "x-gzip")) {
			$encoding = "x-gzip";
		}
		if(strpos(" ".$_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) {
			$encoding = "gzip";
		}
		if(!empty($encoding)) {
			header("Content-Encoding: ".$encoding);
		}
	}

	/**
	* Completely remove any JS scripts in the remove list
	*
	**/
	function do_remove() {
		if(empty($this->remove_files)) {
			return;
		}
/* Get non-immune scripts */
		$this->script_array = $this->get_script_array(
			$this->content,
			array(
				'cachedir' => $options['cachedir'],
				'installdir' => $options['installdir'],
				'tag' => 'script',
				'type' => 'text/javascript',
				'ext' => 'js',
				'src' => 'src',
				'unobtrusive' => $options['unobtrusive'],
				'external_scripts_exclude' => $options['external_scripts_exclude']
			)
		);
/* If we have scripts */
		if(is_array($this->script_array)) {
/* Pull out remove immune */
			preg_match("@<!-- REMOVE IMMUNE -->(.*?)<!-- END REMOVE IMMUNE -->@is", $this->content, $match);
			$_immune = $match[0];
			$this->content = str_replace($_immune,'@@@COMPRESSOR:TRIM:REMOVEIMMUNE@@@', $this->content);
			foreach($this->script_array AS $script) {
				foreach($this->remove_files AS $file) {
					if(!empty($file) && !empty($script)) {
						if(strstr($script,$file)) {
/* Remove the scripts from the source if they are on the remove list */
							$this->content = str_replace($script, "", $this->content);
							$this->process_report['notice'][$script] = array(
								'from' => htmlspecialchars($script),
								'notice' => 'The file was replaced by a standard library and removed'
							);
						}
					}
				}
			}
/* Put back */
			$this->content = str_replace("@@@COMPRESSOR:TRIM:REMOVEIMMUNE@@@", $_immune, $this->content);
/* Remove comments */
			$this->content = str_replace("<!-- REMOVE IMMUNE -->", "", $this->content);
			$this->content = str_replace("<!-- END REMOVE IMMUNE -->", "", $this->content);
		}

	}

	/**
	* Compress JS or CSS and return source
	*
	**/	
	function do_compress($options, $source) {
/* Save the original extension */
		$options['original_ext'] = $options['ext'];
/* Change the extension */
		if (!empty($options['gzip']) || !empty($options['far_future_expires'])) {
			$options['ext'] = "php";
		}
/* Set cachedir */
		$cachedir = $options['cachedir'];
/* Get array of scripts */
		$this->script_array = $this->get_script_array($source, $options);
		if ($this->web_optimizer_stage) {
			$this->write_progress($this->web_optimizer_stage += 1);
		}
/* prepare JS w/o src for merging in unobtrusive way */
		if ($options['unobtrusive'] && !empty($this->script_array) && is_array($this->script_array)) {
			$postloader = array();
			$handler = 'scripts';
			$key = 0;
			foreach ($this->script_array as $script) {
				$handler_new = empty($script['file']) ? 'handler' : 'scripts';
				$postloader[$key][$handler_new][] = $script;
				$handler = $handler_new;
				if ($handler_new != $handler) {
					$key++;
				}
			}
/* go through postloader and include */
			foreach ($postloader as $script_block) {
				$source = $this->do_include($options, $source, $cachedir, empty($script_block['scripts']) ? null : $script_block['scripts'], empty($script_block['handler']) ? null : $script_block['handler']);
			}
		} else {
			$source = $this->do_include($options, $source, $cachedir, $this->script_array);
		}
		return $source;
	}

	/**
	* Include a single file or an unobtrusive bundle
	*
	**/
	function include_bundle ($source, $newfile, $handlers, $cachedir, $include) {
		switch ($include) {
/* if no unobtrusive logic and no external JS, move to top */
			default:
				$source = preg_replace("!<head([^>]+)?>!is", "$0 \n" . $newfile . "\n", $source);
				break;
/* no unobtrusive but external scripts exist, avoid excluded scripts */
			case 1:
				$source = preg_replace("!<\/head>!is", $newfile . "$0", $source);
				break;
/* else use unobtrusive loader */
			case 2:
				if (preg_match("/var yass_modules/i", $source)) {
					$source = preg_replace('!(<script type="text/javascript">var yass_modules=\[\[.*?)\]\]!is', '$1],["' 
						. preg_replace('/.*src="(.*?)".*/i', "$1", $newfile) . '","' . $handlers . '"]]', $source);
				} else {
					$source = preg_replace('/<\/body>/', '<script type="text/javascript">var yass_modules=[["'. preg_replace('/.*src="(.*?)".*/i', "$1", $newfile) 
						.'","'. $handlers . '"]]</script><script type="text/javascript" src="'. str_replace($this->view->paths['full']['document_root'], "http://" 
						. $_SERVER['HTTP_HOST'] . "/", $cachedir) .  '/yass.loader.js' . '"></script></body>', $source);
				}
				break;
		}
		return $source;
	}

	/**
	* Include compressed JS or CSS into source and return it
	*
	**/
	function do_include($options, $source, $cachedir, $external_array, $handler_array = null) {
		if ($this->web_optimizer_stage) {
			$this->write_progress($this->web_optimizer_stage += 1);
		}
		$handlers = '';
		$_script_array = array();
/* If only one script found */
		if(!is_array($external_array)) {
			$_script_array = array($external_array);
		} else {
			$_script_array = $external_array;
		}
/* merge and escape handlers array */
		if (is_array($handler_array)) {
			foreach ($handler_array as $ha) {
				$handlers .= preg_replace("/\r?\n/", ";", preg_replace("/(<!--|\/\/-->)/", "", preg_replace('/"/', '\"', $ha['content']))) . ';';
			}
		} elseif ($options['external_scripts']) {
		    $counter = 0;
		    $new_script_array = array();
/* combine external and inline scripts */
		    foreach ($_script_array as $key => $value) {
				if (!empty($value['content']) && !empty($value['file'])) {
					$new_script_array[$counter]['content'] = (empty($new_script_array[$counter]['content']) ? '' : $new_script_array[$counter]['content'] . "\n") . $value['content'];
					$new_script_array[$counter]['file'] = $value['file'];
					$new_script_array[$counter]['source'] = $value['source'];
					$counter++;
				} else {
					$ind = $counter > 0 ? $counter - 1 : 0;
					$new_script_array[$ind]['content'] = (empty($new_script_array[$ind]['content']) ? '' : $new_script_array[$ind]['content'] . "\n") . $value['content'];
					$source = str_replace($value['content'], "", $source);
				}
		    }
		    $_script_array = $new_script_array;
		}
/* Get date string for making hash */
		$datestring = $this->get_file_dates($_script_array, $options);
/* patch from xandrx */
		$_script_array_files = array();
		foreach ($_script_array as $value) {
			if (!empty($value['content'])) {
				$_script_array_files[] = $value['content'];
			}
		}
/* get options string */
		$optstring = '';
		foreach ($options as $key => $value) {
			if (is_array($value)) {
				$optstring .= '_' . implode('_', $value);
			} else {
				$optstring .= '_' . $value;
			}
		}
/* Get the cache hash, restrict by 10 symbols */
		$cache_file = substr(md5(implode("_", $_script_array_files) . $datestring . $optstring . $handlers), 0, 10);
		$cache_file = urlencode($cache_file);
/* Check if the cache file exists */
		if (file_exists($cachedir . '/' . $cache_file . ".$options[ext]")) {
/* Put in locations and remove certain scripts */
			$external_array = $this->get_file_locations($_script_array, $options);
			if (!is_array($external_array)) {
				$external_array = array($external_array);
			}
			if (is_array($handler_array)) {
				$external_array = array_merge($external_array, $handler_array);
			}
			$source = $this->_remove_scripts($external_array, $source);
			$newfile = $this->get_new_file($options, $cache_file);
/* No longer use marker $source = str_replace("@@@marker@@@",$new_file,$source); */
			$source = str_replace("@@@marker@@@", "", $source);
			$source = $this->include_bundle($source, $newfile, $handlers, $cachedir, $options['unobtrusive'] ? 2 : ($options['ext'] == 'js' && $options['external_scripts'] ? 1 : 0));
			if ($this->web_optimizer_stage) {
				$this->write_progress($this->web_optimizer_stage += 2);
			}
			return $source;
		}
/* If the file didn't exist, continue ... */
		$external_array = $this->get_file_locations($_script_array, $options);
/* Create file */
		$contents = "";
		if(is_array($external_array)) {
			foreach($external_array AS $key => $info) {
/* Get the code */
				if ($file_contents = $info['content']) {
/* Mess with the CSS source */
					if($options['header'] == "css") {
/* Absolute paths */
						$file_contents = $this->convert_paths_to_absolute($file_contents, $info);
/* Add media type header */
						$file_contents = $this->add_media_header($file_contents, $info);
					}
					$contents .=  $file_contents;
				}
			}
			if ($options['css_sprites']) {
				$options['css_sprites_partly'] = 0;
				$remember_data_uri = $options['data_uris'];
				$options['data_uris'] = 0;
/* start new PHP process to create CSS Sprites */
				if (!empty($this->web_optimizer_stage) && $this->web_optimizer_stage < 30) {
					header('Location: optimizing.php?web_optimizer_stage=30&username=' . $this->username . '&password=' . $this->password . "&auto_rewrite=" . $this->auto_rewrite);
					die();
/* prepare first 4 Sprites */
				} elseif (!empty($this->web_optimizer_stage) && $this->web_optimizer_stage < 40) {
					$options['css_sprites_partly'] = 1;
					$this->convert_css_sprites($contents, $options);
					header('Location: optimizing.php?web_optimizer_stage=40&username=' . $this->username . '&password=' . $this->password . "&auto_rewrite=" . $this->auto_rewrite);
					die();
				} elseif (!empty($this->web_optimizer_stage) && $this->web_optimizer_stage < 60) {
/* Create CSS Sprites in CSS dir */
					$this->convert_css_sprites($contents, $options);
/* start new PHP process to create data:URI */
					header('Location: optimizing.php?web_optimizer_stage=60&username=' . $this->username . '&password=' . $this->password . "&auto_rewrite=" . $this->auto_rewrite);
					die();
				} else {
/* we created all Sprites -- ready for data:URI */
					$options['data_uris'] = $remember_data_uri;
					$contents = $this->convert_css_sprites($contents, $options);
				}
			} elseif ($options['data_uris']) {
				if (!empty($this->web_optimizer_stage) && $this->web_optimizer_stage < 70) {
/* start new PHP process to create data:URI */
					header('Location: optimizing.php?web_optimizer_stage=70&username=' . $this->username . '&password=' . $this->password . "&auto_rewrite=" . $this->auto_rewrite);
					die();
				} else {
/* CSS background images to data URIs (after base64 strings have been prepared) */
					$contents = $this->convert_css_bgr_to_data($contents, $options);
				}
			}
			if (is_array($handler_array)) {
				$external_array = array_merge($external_array, $handler_array);
			}
			$source = $this->_remove_scripts($external_array, $source);
		}
		if(!empty($contents)) {
/* Allow for minification of javascript */
			if($options['header'] == "javascript" && $options['minify']) {
				if ($options['minify_with'] == 'packer') {
					$this->packer = new JavaScriptPacker($contents, 'Normal', false, false);
					$contents = $this->packer->pack();
				} elseif ($options['minify_with'] == 'jsmin') {
					$this->jsmin = new JSMin($contents);
					$contents = $this->jsmin->minify($contents);
				}
				if ($this->web_optimizer_stage) {
					$this->write_progress($this->web_optimizer_stage += 3);
				}
			}
/* Allow for minification of CSS, CSS Sprites uses CSS Tidy -- already minified CSS */
			if ($options['header'] == "css" && $options['minify'] && !$options['css_sprites']) {
/* Minify CSS */
				$contents = $this->minify_text($contents);
			}
/* Allow for gzipping and headers */
			if ($options['gzip'] || $options['far_future_expires']) {
				$contents = $this->gzip_header[$options['header']] . $contents;
			}
			if (!empty($contents)) {
/* Write to cache and display */
				if ($fp = fopen($cachedir . '/' . $cache_file . '.' . $options['ext'], 'wb')) {
					fwrite($fp, $contents);
					fclose($fp);
/* Set permissions, required by some hosts */
					@chmod($cachedir . '/' . $cache_file . '.' . $options['ext'], octdec("0755"));
/* Create the link to the new file */
					$newfile = $this->get_new_file($options, $cache_file);
					$source = $this->include_bundle($source, $newfile, $handlers, $cachedir, $options['unobtrusive'] ? 2 : ($options['ext'] == 'js' && $options['external_scripts'] ? 1 : 0));
					$this->process_report['scripts'][] = array(
						'type' => $options['header'] . " " . @$options['rel'],
						'from' => $external_array,
						'to' => $cachedir . '/' . $cache_file . '.' . $options['ext']
					);
				}
			}
			if ($this->web_optimizer_stage) {
				$this->write_progress($this->web_optimizer_stage += 2);
			}
		}
		return preg_replace("/@@@marker@@@/", "", $source);
	}

	/**
	* Replaces scripts calls or css links in the source with a marker
	*
	*/
	function _remove_scripts($external_array, $source) {
		if (is_array($external_array)) {
			$keys = array_keys($external_array);
			$maxKey = array_pop($keys);
			foreach($external_array AS $key=>$value) {
/* Remove script */
				if($key == $maxKey) {
					$source = str_replace($value['source'], "@@@marker@@@", $source);
				} else {
					$source = str_replace($value['source'], "", $source);
				}
			}
		}
		return $source;
	}
	
	/**
	* Returns the filename for our new compressed file
	*
	**/
	function get_new_file($options, $cache_file, $not_modified=false) {
		$relative_cachedir = str_replace($this->view->prevent_trailing_slash($this->unify_dir_separator($this->view->paths['full']['document_root'])), "", $this->view->prevent_trailing_slash($this->unify_dir_separator($options['cachedir'])));
		$newfile = "<" . $options['tag'] . " type=\"" . $options['type'] . "\" $options[src]=\"http://" . $_SERVER['HTTP_HOST'] . "/" . $this->view->prevent_leading_slash($relative_cachedir) ."/$cache_file." . $options['ext'] . "$not_modified\"";				
		if (!empty($options['rel'])) {
			$newfile .= " rel=\"" . $options['rel'] . "\"";
		}
		if (!empty($options['media'])) {
			$newfile .= " media=\"" . $options['media'] . "\"";
		}										
		if(!empty($options['self_close'])) {
			$newfile .= " />";
		} else {
			$newfile .= "></" . $options['tag'] . ">";
		}
		$this->compressed_files[] = $newfile;
		return $newfile;
	}
	
	/**
	* Returns the last modified dates of the files being compressed
	* In this way we can see if any changes have been made
	**/	
	function get_file_dates($files,$options) {
		$files = $this->get_file_locations($files, $options);
		if (!is_array($files)) {
			return;
		}
		$dates = false;
		foreach($files AS $key => $value) {
			if (file_exists($value['src'])) {
				$thedate = filemtime($value['src']);
				$dates[] = $thedate;
			}
		}
		if (is_array($dates)) {
			return implode(".", $dates);
		}
		return;
	}

	/**
	* Get full pathname for the given file
	* 
	**/
	function get_file_name ($file) {
		if(is_array($file) && count($file)>0) {
			$file = $file[0];
		}
		$file = preg_replace("/(https?:\/\/".$_SERVER['HTTP_HOST']."|\?.*)/", "", $file);
		if (substr($file,0,1) == "/") {
			return $this->view->prevent_trailing_slash($this->view->paths['full']['document_root']) . $file;
		} else {
			return $this->view->paths['full']['current_directory'] . $file;
		}
	}

	/**
	* Resursively resolve all @import in CSS files and get files content
	* 
	**/
	function resolve_css_imports ($src) {
		$content = false;
		$file = $this->get_file_name($src);
		if (is_file($file)) {
			$content = file_get_contents($file);
/* new RegExp from xandrx */
			preg_match_all('/@import\\s*(url)?\\s*\\(?([^;]+?)\\)?;/i', $content, $imports, PREG_SET_ORDER);
			if (is_array($imports)) {
				foreach ($imports as $import) {
					$src = false;
					if (isset($import[2])) {
						$src = $import[2];
						$src = trim($src, '\'" ');
					}
					if ($src) {
						$saved_directory = $this->view->paths['full']['current_directory'];
						$this->view->paths['full']['current_directory'] = preg_replace("/[^\/]+$/", "", $file);
/* start recursion */
						$content = preg_replace("/@import[^;]+". $src  ."[^;]*;/i", $this->resolve_css_imports($src), $content);
/* return remembed directory */
						$this->view->paths['full']['current_directory'] = $saved_directory;
					}
				}
			}
		}
		return $content;
	}

	/**
	* Gets an array of scripts/css files to be processed
	* 
	**/
	function get_script_array($source, $options) {

		$this->get_head($source);
		if ($this->head) {
			$regex = "!<" . $options['tag'] . "[^>]+" . ($options['type'] == 'text/javascript' ? "type\\s*=\\s*['\"](" . $options['type'] : "rel\\s*=\\s*['\"](" . $options['rel']) . ")['\"]([^>]*)>(.*?</" . $options['tag'] . ">)?!is";
			preg_match_all($regex, $this->head, $matches, PREG_SET_ORDER);
		}

		if (!empty($matches)) {
			foreach($matches as $match) {
				$external_array[] = array(
					'file' => preg_replace("/<script[^>]+>.*?<\/script>/i", "", preg_replace("/\r?\n/", "", preg_replace("/.*(" . $options['src'] . "\\s*=\\s*['\"](.+?)\\s*['\"]).*/i", "$1", $match[0]))),
					'content' => preg_replace("/(@@@COMPRESSOR:TRIM:HEADCOMMENT@@@|<link[^>]*>|<script[^>]*>|<\/script>)/i", "", $match[0]),
					'source' => $match[0]
				);
			}
		} else {
			$external_array = "";
		}
/* No files */
		if (empty($external_array)) {
			return $source;
		}
/* strange thing: array is filled even if string is empty */
		$excluded_scripts = split("\\\s+", $options['external_scripts_exclude']);
/* Remove empty sources and any externally linked files */
		foreach($external_array AS $key => $value) {
			$regex = "!" . $options['src'] . "=['\"](.*?)(\?.*)?['\"]!is";
			preg_match($regex, $value['file'], $src);
/* Make sure src element present */
			if (!isset($src[1])) {
				$src[1] = false;
			}
/* but keep JS w/o src to merge into unobtrusive loader, also exclude files from ignore_list */
			if(empty($src[1]) && !$options['unobtrusive'] && !$options['external_scripts'] || (!empty($excluded_scripts[0]) && in_array(preg_replace("/.*\//", "", $src[1]), $excluded_scripts))) {
				unset($external_array[$key]);
			}
			if (strlen($src[1])> 7 && strcasecmp(substr($src[1],0,7),'http://') == 0) {
/* exclude files from */
				if(!strstr($src[1], $_SERVER['HTTP_HOST'])) {
/* get an external file */
					$file = $this->get_remote_file($options, $src[1]);
					if ($options['external_scripts'] && $file) {
						$src[1] = str_replace($this->view->paths['full']['document_root'], "/", $options['cachedir']) . "/" . $file;
						$external_array[$key]['file'] = $options['src'] . '="' . $src[1]  . '"';
					} else {
						unset($external_array[$key]);
						$this->process_report['skipped'][$src[1]] = array(
							'from'=>$src[1],
							'reason'=>'Cannot compress external files'
						);
					}
				}
			}
			if ((!$options['unobtrusive'] && !$options['external_scripts']) || empty($value['content'])) {
				if ($options['ext'] == 'css') {
/* recursively resolve @import in files */
					$external_array[$key]['content'] = (empty($options['media_all'][$src[1]]) ? "" : "@media " . $options['media_all'][$src[1]] . "{") . 
						$this->resolve_css_imports($src[1]) . (empty($options['media_all'][$src[1]]) ? "" : "}");
				} else {
					$external_array[$key]['content'] = ( ($file = $this->get_file_name($src[1])) && is_file($file)) ? file_get_contents($file) : false;
				}
			}
		}
/* Remove ignored files */
		if(!empty($this->ignore_files)) {
			foreach ($external_array AS $return_key => $src) {
				foreach($this->ignore_files AS $ignore) {
					if (strstr($src['file'], $ignore)) {
						$this->process_report['notice'][$src['file']] = array('from'=>$src['file'],
																				'notice'=>'The file was on the ignore list and skipped');
						unset($external_array[$return_key]);
					}
				}
			}
		}
		return $external_array;
	}
	
	/**
	* Gets the path locations of the scripts being compressed
	* 
	**/		
	function get_file_locations($external_array, $options) {
	
		if(!is_array($external_array)) {
			return;
		}
		$return_array = array();
/* Remove empty sources */
		foreach($external_array AS $key => $value) {
			$src = array(0, 0);
			if (!empty($value['file'])) {
				preg_match("!" . $options['src'] . "=['\"](.*?)['\"]!is", $value['file'], $src);
			}
			if (empty($value['file']) || empty($src) || !$src[1]) {
					unset($external_array[$key]);
			}
		}			
/* Create file */
		foreach($external_array AS $key => $value) {
/* Get the src, RegExp from xandrx */
			if (preg_match('/'.$options["src"].'\\s*=\\s*[\'"](.*?)[\'"]/si', $value['file'], $regs)) {
				$src = $regs[1];
			} else {
				continue;
			}
			$current_src = $this->get_file_name($src);
			if($current_src != $this->strip_querystring($current_src)) {
				$this->process_report['notice'][$current_src] = array(
					'from'=>$current_src,
					'notice'=>'The querystring was stripped from this script');
			}
			$current_src = $this->strip_querystring($current_src);
/* Make sure script exists */
			if (file_exists($current_src)) {
/* Make sure script has the correct extension */
				$extentsion_length = strlen($options['original_ext']);
				if(".".substr($this->view->get_basename($current_src),(-1*$extentsion_length)) == ".".$options['original_ext']) {			
					$return_array[] = array(
						'src'=>$current_src,
						'source'=>$value['source'],
						'content' => $value['content']
					);
				} else {
					$this->process_report['skipped'][$current_src] = array(
						'from'=>$current_src,
						'reason'=>'Must have ' . $options['original_ext'] . ' extension'
					);
				}
			} else {
				if(!strstr($current_src,'php_speedy_control')) {
					$this->process_report['skipped'][$current_src] = array(
						'from'=>$current_src,
						'reason'=>'Not on server'
					);	
				}
			}								
		}
		return $return_array;	
	}

	/**
	* Sets the headers to be sent in the javascript and css files
	* 
	**/	
	function set_gzip_headers() {
/* When will the file expire? */
		$offset = 6000000 * 60 ;
		$ExpStr = "Expires: " . 
		gmdate("D, d M Y H:i:s",
		time() + $offset) . " GMT";
		$types = array("css","javascript");
			
		foreach($types AS $type) {
/* Always send etag */
			$this->gzip_header[$type] = '<?php	
			$hash = md5($_SERVER[\'SCRIPT_FILENAME\']);
			header ("Etag: \"" . $hash . "\"");		
?>';			
/* Send 304? */
			$this->gzip_header[$type] .= '<?php	
				
			if (isset($_SERVER[\'HTTP_IF_NONE_MATCH\']) && 
				stripslashes($_SERVER[\'HTTP_IF_NONE_MATCH\']) == \'"\' . $hash . \'"\') 	{
				// Return visit and no modifications, so do not send anything
				header ("HTTP/1.0 304 Not Modified");
				header (\'Content-Length: 0\');
				exit();
			} 			
					
?>';
/* ob_start ("ob_gzhandler"); */
			if(!empty($this->options[$type]['gzip'])) { 
				$this->gzip_header[$type] .= '<?php	
				ob_start("compress_output_option");
				function compress_output_option($contents) {
				
					// Determine supported compression method
					$gzip = strstr($_SERVER[\'HTTP_ACCEPT_ENCODING\'], \'gzip\');
					$deflate = strstr($_SERVER[\'HTTP_ACCEPT_ENCODING\'], \'deflate\');
			
					// Determine used compression method
					$encoding = $gzip ? \'gzip\' : ($deflate ? \'deflate\' : \'none\');
			
					// Check for buggy versions of Internet Explorer
					if (!strstr($_SERVER[\'HTTP_USER_AGENT\'], \'Opera\') && 
						preg_match(\'/^Mozilla\/4\.0 \(compatible; MSIE ([0-9]\.[0-9])/i\', $_SERVER[\'HTTP_USER_AGENT\'], $matches)) {
						$version = floatval($matches[1]);
						
						if ($version < 6)
							$encoding = \'none\';
							
						if ($version == 6 && !strstr($_SERVER[\'HTTP_USER_AGENT\'], \'EV1\')) 
							$encoding = \'none\';
					}
									
					if (isset($encoding) && $encoding != \'none\') 
					{
						// Send compressed contents
						$contents = gzencode($contents, 9, $gzip ? FORCE_GZIP : FORCE_DEFLATE);
						header ("Content-Encoding: " . $encoding);
						header (\'Content-Length: \' . strlen($contents));
					} 
					
					return $contents;
				
				}
?>';	
			}
	
			if(!empty($this->options[$type]['far_future_expires'])) {
				$this->gzip_header[$type] .= '<?php	
				header("Cache-Control: must-revalidate");
				header("' . $ExpStr . '");
?>';	
			}
		
			$this->gzip_header[$type] .= '<?php	
				header("Content-type: text/' . $type .'; charset: UTF-8");
?>';	
								
	
		} // end FE	
	}

	/**
	* Returns a path or url without the querystring
	* 
	**/	
	function strip_querystring($path) {
		if ($commapos = strpos($path, '?')) {
			return substr($path, 0, $commapos);
		} else {
			return $path;
		}
	}

	/**
	* Strips whitespace and comments from a text string
	* 
	**/	
	function minify_text($txt) {
/* Compress whitespace */
		$txt = preg_replace('/\s+/', ' ', $txt);
/* Remove comments */
		$txt = preg_replace('/\/\*.*?\*\//', '', $txt);
/* Remove ruments from optimization */
		$txt = preg_replace('/<script[^>]+type=[\'"]text/javascript[\'"][^>]*><\/script>/i', '', $txt);
		return $txt;
	}

	/**
	* Safely trim whitespace from an HTML page
	* Adapted from smarty code http://www.smarty.net/
	**/		
	function trimwhitespace($source) {
/* Pull out the script blocks */
		preg_match_all("!<script[^>]+>.*?</script>!is", $source, $match);
		$_script_blocks = $match[0];
		$source = preg_replace("!<script[^>]+>.*?</script>!is",
							   '@@@COMPRESSOR:TRIM:SCRIPT@@@', $source);
/* Pull out the pre blocks */
		preg_match_all("!<pre>.*?</pre>!is", $source, $match);
		$_pre_blocks = $match[0];
		$source = preg_replace("!<pre>.*?</pre>!is",
							   '@@@COMPRESSOR:TRIM:PRE@@@', $source);
/* Pull out the textarea blocks */
		preg_match_all("!<textarea[^>]+>.*?</textarea>!is", $source, $match);
		$_textarea_blocks = $match[0];
		$source = preg_replace("!<textarea[^>]+>.*?</textarea>!is",
							   '@@@COMPRESSOR:TRIM:TEXTAREA@@@', $source);
/* remove all leading spaces, tabs and carriage returns NOT preceeded by a php close tag */
		$source = trim(preg_replace('/((?<!\?>)\n)[\s]+/m', '\1', $source));
/* replace textarea blocks */
		$this->trimwhitespace_replace("@@@COMPRESSOR:TRIM:TEXTAREA@@@",$_textarea_blocks, $source);
/* replace pre blocks */
		$this->trimwhitespace_replace("@@@COMPRESSOR:TRIM:PRE@@@",$_pre_blocks, $source);
/* replace script blocks */
		$this->trimwhitespace_replace("@@@COMPRESSOR:TRIM:SCRIPT@@@",$_script_blocks, $source);
		return $source;
	}

	/**
	* Helper function for trimwhitespace
	* 
	**/		
	function trimwhitespace_replace($search_str, $replace, &$subject) {
		$_len = strlen($search_str);
		$_pos = 0;
		for ($_i=0, $_count=count($replace); $_i<$_count; $_i++) {
			if (($_pos=strpos($subject, $search_str, $_pos))!==false) {
				$subject = substr_replace($subject, $replace[$_i], $_pos, $_len);
			} else {
				break;
			}
		}
	}

	
	/**
	* Gets the directory we are in
	* 
	**/		
	function get_current_path($trailing=false) {
		$current_dir = $this->view->paths->relative->current_directory;
/* Remove trailing slash */
		if($trailing) {
			if(substr($current_dir,-1,1) == "/") {
				$current_dir = substr($current_dir,0,-1); 
			}
		}
		return $current_dir;
	}

	/**
	* Gets the head part of the $source
	* 
	**/			
	function get_head ($source) {
		if (empty($this->head)) {
/* hack for some templates (i.e. LiveStreet) */
			$source = preg_replace("!</head>((\r?\n)*<script.*)<body!is", "$1</head><body", $source);
			preg_match("!<head([^>]+)?>.*?</head>!is", $source, $matches);
			if (!empty($matches[0])) {
				$this->head = $matches[0];
/* Pull out the comment blocks, so as to avoid touching conditional comments */
				$this->head = preg_replace("@<!--.*?-->@is", '@@@COMPRESSOR:TRIM:HEADCOMMENT@@@', preg_replace("/(<!\[CDATA\[\/\/><!--|\/\/--><!\]\]>)/i", "", $this->head));
			}
		}
	}
	
	/**
	* Removes old cache files
	* 
	**/		
	function do_cleanup() {
/* Get all directories */
		foreach($this->options AS $key=>$value) {
			if(!empty($value['cachedir'])) {
				$active_dirs[] = $value['cachedir'];
			}
		}	
		if(!empty($active_dirs)) {	
			foreach($active_dirs AS $path) {
			$files = $this->get_files_in_dir($path);
				foreach($files AS $file) {	
					if (!strstr($this->compressed_files_string,$file)) {
						if(file_exists($path . "/" . $file)) {
							unlink($path . "/" . $file);
						}
					}
				}
			}
		}
	}	
	
	/**
	* Returns list of files in a directory
	* 
	**/	
	function get_files_in_dir($path) {
/* open this directory */
		$myDirectory = opendir($path);
/* get each entry */
		while($entryName = readdir($myDirectory)) {
			$dirArray[] = $entryName;
		}
/* close directory */
		closedir($myDirectory);
		return $dirArray;
	}
	
/* Adds CSS media info */
	function add_media_header($content, $path) {
		if (!empty($path['location'])) {
			preg_match("@(media)=[\"'](.*?)[\"']@", $path['location'], $media); //|media
			if(!empty($media[2])) {
				$content = "@media " . $media[2] . " {" . $content;
				$content .= " }";
			}
		}
		return $content;
	}
/* Find background images in the CSS and convert their paths to absolute */
	function convert_paths_to_absolute($content,$path) {
		
		preg_match_all( "/url\((.*?)\)/is",$content,$matches);
		if(count($matches[1]) > 0) {
			$counter = 0;
			foreach($matches[1] AS $key=>$file) {
/* Don't touch data URIs, external files or mhtml: */
				if(strstr($file,"data:") || strstr($file,"https://") || strstr($file,"http://") || strstr($file,"mhtml:")) {
					continue;
				}
				$counter++;
				$original_file = trim($file);
				$file = preg_replace("@'|\"@","",$original_file);
/* Not absolute */
				if (substr($file,0,1) != "/") {
					$full_path_to_image = str_replace($this->view->get_basename($path['src']), "", $path['src']);
					$absolute_path = "/". $this->view->prevent_leading_slash(str_replace($this->unify_dir_separator($this->view->paths['full']['document_root']), "", $this->unify_dir_separator($full_path_to_image . $file)));
					$marker = md5($counter);
					$markers[$marker] = $absolute_path;
					$content = str_replace($original_file, $marker, $content);				
				}
			}
		}
		if(!empty($markers) && is_array($markers)) {
/* Replace the markers for the real path */
			foreach($markers AS $md5 => $real_path) {
				$content = str_replace($md5, $real_path, $content);
			}
		}
		return $content;
	
	}

	/**
	* Convert all background image to CSS Sprites if possible
	**/
	function convert_css_sprites ($content, $options) {
		chdir($options['cachedir']);
		$css_sprites = new css_sprites($content, array(
			'root_dir' => $options['installdir'], 
			'current_dir' => $options['cachedir'],
			'website_root' => $this->view->paths['full']['document_root'], 
			'truecolor_in_jpeg' => $options['truecolor_in_jpeg'], 
			'aggressive' => $options['aggressive'],
			'ignore_list' => $options['css_sprites_exclude'],
			'partly' => $options['css_sprites_partly'],
			'data_uris' => $options['data_uris']
		));
		return $css_sprites->process();
	}

	/**
	* Take CSS background images and convert to data URIs
	**/
	function convert_css_bgr_to_data($content, $path) {

		preg_match_all( "/url\((.*?)\)/is",$content,$matches);
		if(count($matches[1]) > 0) {
/* Unique */
			$matches[1] = array_unique($matches[1]);
			foreach($matches[1] AS $key=>$file) {
				$original_file = trim($file);
				if (preg_match("/^webo[ixy\.]/", $file)) {
					$file_path = $path['cachedir'] . '/' . $file;
				} else {
/* Get full path */
					$file_path = $this->view->ensure_trailing_slash($this->view->paths['full']['document_root']) . $this->view->prevent_leading_slash($original_file);
					$file_path = trim($file_path);
				}
				if (is_file($file_path)) {
/* Get mime type */
					$mime = $this->get_mimetype($file_path);
/* Get file contents */
					$contents = @file_get_contents($file_path);
/* Base64 encode contents */
					$base64 = base64_encode($contents); 
/* Set new data uri */
					$data_uri = ('data:' . $mime . ';base64,' . $base64);
/* Find the element this refers to */
					$regex = "([a-z0-9\s\.\:#_\-@,]+)\{([^\}]+?" . str_replace("/","\/",str_replace(".","\.",$original_file)) ."[^\}]+?)\}";
					preg_match_all("/" . $regex . "/is", $content, $elements);
/* IE only conditional style */
					if(is_array($elements[1])) {
						foreach($elements[1] AS $selector) {
/**
* we need to use html * selector -- for IE6- browsers
* and html+* selector -- for IE7 browser
* as far as IE8 supports data:URI -- it's actual only for this old stuff
* unfortunately both selectors don't work with comma, only as different chunks
**/
							$selectors = explode(',', $selector);
							$ie6_selector = implode(',* html ', $selectors);
							$ie7_selector = implode(',*+html ', $selectors);
							$this->ie_only_css[] = "* html " . $ie6_selector . "{background-image:url(" . $original_file . ")}";
							$this->ie_only_css[] = "*+html " . $ie7_selector . "{background-image:url(" . $original_file . ")}";
/**
* of course we can try to use mhtml: protocol for IE7- but there is an issue with IE7@Vista that doens't support it correctly
* so due to compatibility issues only external images, no embedded ones
**/
						}
					}
/* Replace */
					$content = str_replace($original_file, $data_uri, $content);
				}
			}					
			
		}
		if ($this->web_optimizer_stage) {
			$this->write_progress($this->web_optimizer_stage += 5);
		}
/* Add IE only css */
		if(!empty($this->ie_only_css)) {
			if (is_array($this->ie_only_css)) {
				$this->ie_only_css_rules = implode("", $this->ie_only_css);
/* add to previous @media */
				if (substr($content, strlen($content) - 2, 2) == '}}') {
					$content = preg_replace("/\}\}$/", "}". $this->ie_only_css_rules ."}", $content);
				} else {
					$content .= $this->ie_only_css_rules;
				}
			}
		}
		return $content;
	
	}	
/* Make the sep the same */
	function unify_dir_separator($path) {
		if (DIRECTORY_SEPARATOR != '/') {
			return str_replace (DIRECTORY_SEPARATOR, '/', $path);
		} else {
			return $path;
		}
	}
	
	/**
	 * Get file extension
	 *
	**/	
	function get_file_extension($file) {
		$f = explode('.', $file);
		return array_pop($f);
	}

	/**
	 * Get mime from extension
	 *
	 **/
	function get_mimetype($value='') {
		$ct['htm'] = 'text/html';
		$ct['html'] = 'text/html';
		$ct['txt'] = 'text/plain';
		$ct['asc'] = 'text/plain';
		$ct['bmp'] = 'image/bmp';
		$ct['gif'] = 'image/gif';
		$ct['jpeg'] = 'image/jpeg';
		$ct['jpg'] = 'image/jpeg';
		$ct['jpe'] = 'image/jpeg';
		$ct['png'] = 'image/png';
		$ct['ico'] = 'image/vnd.microsoft.icon';
		$ct['mpeg'] = 'video/mpeg';
		$ct['mpg'] = 'video/mpeg';
		$ct['mpe'] = 'video/mpeg';
		$ct['qt'] = 'video/quicktime';
		$ct['mov'] = 'video/quicktime';
		$ct['avi']  = 'video/x-msvideo';
		$ct['wmv'] = 'video/x-ms-wmv';
		$ct['mp2'] = 'audio/mpeg';
		$ct['mp3'] = 'audio/mpeg';
		$ct['rm'] = 'audio/x-pn-realaudio';
		$ct['ram'] = 'audio/x-pn-realaudio';
		$ct['rpm'] = 'audio/x-pn-realaudio-plugin';
		$ct['ra'] = 'audio/x-realaudio';
		$ct['wav'] = 'audio/x-wav';
		$ct['css'] = 'text/css';
		$ct['zip'] = 'application/zip';
		$ct['pdf'] = 'application/pdf';
		$ct['doc'] = 'application/msword';
		$ct['bin'] = 'application/octet-stream';
		$ct['exe'] = 'application/octet-stream';
		$ct['class']= 'application/octet-stream';
		$ct['dll'] = 'application/octet-stream';
		$ct['xls'] = 'application/vnd.ms-excel';
		$ct['ppt'] = 'application/vnd.ms-powerpoint';
		$ct['wbxml']= 'application/vnd.wap.wbxml';
		$ct['wmlc'] = 'application/vnd.wap.wmlc';
		$ct['wmlsc']= 'application/vnd.wap.wmlscriptc';
		$ct['dvi'] = 'application/x-dvi';
		$ct['spl'] = 'application/x-futuresplash';
		$ct['gtar'] = 'application/x-gtar';
		$ct['gzip'] = 'application/x-gzip';
		$ct['js'] = 'application/x-javascript';
		$ct['swf'] = 'application/x-shockwave-flash';
		$ct['tar'] = 'application/x-tar';
		$ct['xhtml']= 'application/xhtml+xml';
		$ct['au'] = 'audio/basic';
		$ct['snd'] = 'audio/basic';
		$ct['midi'] = 'audio/midi';
		$ct['mid'] = 'audio/midi';
		$ct['m3u'] = 'audio/x-mpegurl';
		$ct['tiff'] = 'image/tiff';
		$ct['tif'] = 'image/tiff';
		$ct['rtf'] = 'text/rtf';
		$ct['wml'] = 'text/vnd.wap.wml';
		$ct['wmls'] = 'text/vnd.wap.wmlscript';
		$ct['xsl'] = 'text/xml';
		$ct['xml'] = 'text/xml';
		$extension = $this->get_file_extension($value);
		if (!$type = $ct[strtolower($extension)]) {
			$type = 'text/html';
		}
		return $type;
	} 		
/* Start script timing */
	function startTimer() {
		$mtime = microtime();
		$mtime = explode(" ",$mtime);
		$mtime = $mtime[1] + $mtime[0];
		$starttime = $mtime;
		return $starttime;
	}
/* Return current time */
	function returnTime($starttime) {
		$mtime = microtime();
		$mtime = explode(" ",$mtime);
		$mtime = $mtime[1] + $mtime[0];
		$endtime = $mtime;
		$totaltime = ($endtime - $starttime);
		return $totaltime;
	}
/* download remote files to include */
    function get_remote_file ($options, $file) {
		if (function_exists('curl_init')) {
			chdir($options['cachedir']);
			$return_filename = preg_replace("/\?.*/", "", preg_replace("/.*\//", "", $file));
/* prevent download more than 1 time a day */
			if (is_file($return_filename)) {
				if (filemtime($return_filename) + 86400 > time()) {
					return $return_filename;
				}
			}
/* try to download remote file */
			$ch = @curl_init($file);
			$fp = @fopen($return_filename, "w");
			if ($fp && $ch) {
				@curl_setopt($ch, CURLOPT_FILE, $fp);
				@curl_setopt($ch, CURLOPT_HEADER, 0);
				@curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Web Optimizer; Speed Up Your Website; http://web-optimizer.us/) Firefox 3.0.7");
				@curl_exec($ch);
				@curl_close($ch);
				@fclose($fp);
/* try to replace background images to local ones */
				$contents = @file_get_contents($return_filename);
				if ($contents) {
					$fp = @fopen($return_filename, "w");
					if ($fp) {
/* make external URLs safe */
						$contents = preg_replace("/(url\(\s*['\"]?)(mhtml:|data:|https?:\/\/)/", "$1/$2", $contents);
/* replace relative URLs */
						$contents = preg_replace("/(url\(\s*['\"]?)([^\/])/", "$1" . preg_replace("/[^\/]+$/", "", $file) . "$2", $contents);
/* remove slash before https? */
						$contents = preg_replace("/(url\(\s*['\"]?)\/(https?:\/\/)/", "$1$2", $contents);
/* replace absolute URLs */
						$contents = preg_replace("/(url\(\s*['\"]?)\//", "$1" . preg_replace("/(data:|mhtml:|https?:\/\/[^\/]+\/).*/", "$1", $file), $contents);
						fwrite($fp, $contents);
						fclose($fp);
					}
				}
				return $return_filename;
			}
		}
		return false;
    }		

} // end class

?>