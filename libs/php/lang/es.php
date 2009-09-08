<?php
/**
 * Archivo del Web Optimizer, Nikolay Matsievsky (http://webo.in/) 
 * Contiene todas las constates en ES
 * by Alejandro Quezada
 *
 **/

/* layout general */
define('_WEBO_CHARSET', 'latin-1');
define('_WEBO_GENERAL_TITLE', 'Configuraci&oacute;n del Web Optimizer');
define('_WEBO_GENERAL_FOOTER', 'M&aacute;s r&aacute;pido que el rayo!');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Hmmm...tenemos un problemita');
define('_WEBO_ERROR_ERROR', 'Oopps! Algo estuvo mal');

/* Ingresar login y password */
define('_WEBO_LOGIN_TITLE', 'Ingrese sus datos');
define('_WEBO_LOGIN_INSTALLED', 'Usted ya tiene instalado el Web Optimizer ');
define('_WEBO_LOGIN_INSTALLED2', ' a este Website. Por favor ingrese sus datos registrados para adquirir acceso a todas las funciones:');
define('_WEBO_LOGIN_INSTALLED3', '. Por favor presione \'Continuar\' para adquirir acceso a todas las funciones.');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>Atenci&oacute;n:</strong> no se pudo encontrar los resultados de trabajo de Web Optimizer en su website. Por favor, observe su funcion en los archivos fuente de su sistema o instale Web Optimizer nuevamente.');
define('_WEBO_LOGIN_EFFICIENCY', 'Resultados de optimizaci&oacute;n por estado:<br/>Grabado ');
define('_WEBO_LOGIN_EFFICIENCY_KB', 'Kb');
define('_WEBO_LOGIN_EFFICIENCY_S', 'segundos');
define('_WEBO_LOGIN_USERNAME', 'Usuario');
define('_WEBO_LOGIN_ENTERLOGIN', 'Login');
define('_WEBO_LOGIN_PASSWORD', 'Contrase&ntilde;a');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Ponga su Contrase&ntilde;a');
define('_WEBO_SPLAHS1_PROTECTED', 'Modo protegido');
define('_WEBO_SPLAHS1_PROTECTED2', 'La instalaci&oacute;n de Web Optimizer est&aacute; protegida exitosamente. Usted puede configurarla nuevamente.');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Actualizaci&oacute;n');
define('_WEBO_LOGIN_UPGRADENOTICE', 'Usted ya puede actualizar su versi&oacute;n (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') de Web Optimizer a la &uacute;ltima versi&oacute;n. Por favor ingrese su Login y Contrase&ntilde;a y presione <strong>Actualizar</strong>. Web Optimizer ser&aacute; actualizado <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_LOGIN_UPGRADENOTICE4', ') de Web Optimizer a la &uacute;ltima disponible &mdash; <strong>');
define('_WEBO_UPGRADE_SUCCESSFULL', 'Su actualizaci&oacute;n a la &uacute;ltima versi&oacute;n fue todo un &eacute;xito ');
define('_WEBO_UPGRADE_UNABLE', 'No se puede descargar la &uacute;ltima versi&oacute;n de la fuente. Por favor revise su conexi&oacute;n de internet del servidor y existencia del curl.');
/* Desinstalaci&oacute;n */
define('_WEBO_LOGIN_UNINSTALL', 'Para borrar Web Optimizer de su sistema por favor ingrese su Login y Contrase&ntilde;a y presione <strong>Desinstalar</strong>.');
define('_WEBO_LOGIN_UNINSTALL2', 'Web Optimizer puede ser desconectado simplemente de su website. Solo b&oacute;rrelo.');
define('_WEBO_LOGIN_UNINSTALLME', 'Desinstalar Web Optimizer');
define('_WEBO_LOGIN_FAILED', 'Ingreso fallido');
define('_WEBO_LOGIN_ACCESS', 'Usted debe ingresar al sistema para poder ver esta p&aacute;gina');
define('_WEBO_LOGIN_LOGGED', 'Usted ha ingresado');
define('_WEBO_SPLASH1_CLEAR', 'Borrar la memoria cache');
define('_WEBO_SPLASH1_CLEAR_CACHE', 'Para borrar la memoria cache de Web Optimizer por favor ingrese su Login y Contrase&ntilde;a y presione <strong>Borrar memoria cache</strong>. ');
define('_WEBO_SPLASH1_CLEAR_CACHE2', 'Todas las versiones de archivos generados y guardados ser&aacute;n borrados del folder de la memoria Cache.');
define('_WEBO_CLEAR_UNABLE', 'Perd&oacute;n, no se pueden borrar borrar los archivos del folder de la memoria Cache');
define('_WEBO_CLEAR_SUCCESSFULL', 'Todos los archivos del folder de la memoria Cache han sido borrados');

/* Login y Contrase&ntilde;a */
define('_WEBO_NEW_TITLE', 'Instalaci&oacute;n &ndash; ingrese una contrase&ntilde;a');
define('_WEBO_NEW_PROTECT', '<p>Por favor ingrese un Login y Contrase&ntilde;a para proteger esta instalaci&oacute;n.</p>
							<p>Antes de la instalaci&oacute;n, por favor revise que la ra&iacute;z <code>.htaccess</code> y archivos fuente del sistema de su web no est&eacute;n protegidos contra escritura (durante la instalaci&oacute;n Web Optimizer crea aparte, copia de seguridad de sus archivos iniciales).</p>
							<p>Web Optimizer puede revisar todas las funciones de su servidor y completar la instalaci&oacute;n automaticamente. Para acceder a esta opci&oacute;n, por favor presione <strong>"Instalaci&oacute;n Express"</strong>. Una vez completado, usted puede cambiar cualquier opci&oacute;n usando esta m&oacute;dulo administrativo.</p>
							<p>Si desea definir el uso de  Web Optimizer manualmente, por favor presione <strong>"Siguiente"</strong>. Usted puede revisar y definir todas las funciones antes de la la instalaci&oacute;n misma de Web Optimizer en su website.</p>
							<p><a href="http://code.google.com/p/web-optimizator/wiki/Installation">Proceso de instalaci&oacute;n de Web Optimizer</a></p>');
define('_WEBO_NEW_USERDATA', 'Su nombre de usuario y Contrase&ntilde;a');
define('_WEBO_NEW_ENTER', 'Ingrese su Contrase&ntilde;a para la instalaci&oacute;n');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Desinstalar');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'Desinstalar');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Gracias por usar Web Optimizer. Usted puede instalarlo nuevamente despu&eacute;s aqu&iacute; <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">P&aacute;gina de Web Optimizer</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Siempre puede visitar <a href="http://code.google.com/p/web-optimizator/">el website de Web Optimizer</a> y compartir <a href="http://code.google.com/p/web-optimizator/issues/list">alg&uacute;n problema encontrado</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Ya puede regresar a <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">su website</a>.');
define('_WEBO_SPLASH1_NEXT', 'Siguiente');
define('_WEBO_SPLASH1_BACK', 'Atr&aacute;s');
define('_WEBO_SPLASH1_EXPRESS', 'Instalaci&oacute;n Express');

/* Change password */
define('_WEBO_PASSWORD_TITLE', 'Change password');
define('_WEBO_PASSWORD_INSTALLED', 'There is Web Optimizer installed for the current website. You can change password to access to its functions: Settings changing, Cache clean-up, Upgrade, Disable and Delete.');
define('_WEBO_PASSWORD_OLD', 'Old password');
define('_WEBO_PASSWORD_ENTERPASSWORD', 'Enter old password');
define('_WEBO_PASSWORD_NEW', 'New password');
define('_WEBO_PASSWORD_ENTERPASSWORDNEW', 'Enter new password');
define('_WEBO_PASSWORD_CONFIRM', 'New password confirmation');
define('_WEBO_PASSWORD_ENTERPASSWORDCONFIRM', 'Enter confirmation for new password');
define('_WEBO_SPLASH1_SAVE', 'Save');
define('_WEBO_PASSWORD_DIFFERENT', 'New password and its confirmation are different');
define('_WEBO_PASSWORD_EMPTY', 'New password isn\'t set!');
define('_WEBO_PASSWORD_SUCCESSFULL', 'Password has been changed');

/* Second splash -- set options */
define('_WEBO_SPLASH2_TITLE', 'Instalaci&oacute;n - Etapa 2');
define('_WEBO_SPLASH2_OPTIONS', 'Opciones de compresi&oacute;n');
define('_WEBO_SPLASH2_CACHE', 'Folders de memoria Cache');
define('_WEBO_SPLASH2_CACHE_JS', 'Su JavaScript ser&aacute; almacenado en');
define('_WEBO_SPLASH2_CACHE_CSS', 'Su CSS ser&aacute; almacenado en');
define('_WEBO_SPLASH2_CACHE_HTML', 'Su HTML ser&aacute; almacenado en');
define('_WEBO_SPLASH2_INSTALLDIR', 'Web Optimizer est&aacute; localizado en');
define('_WEBO_SPLASH2_DOCUMENTROOT', 'Website est&aacute; localizado en');
define('_WEBO_SPLASH2_SPACE', 'Por favor separe con espacios:');
define('_WEBO_SPLASH2_YES', 'Si:');
define('_WEBO_SPLASH2_NO', 'No:');
define('_WEBO_SPLASH2_UNABLE', 'No se puede abrir');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>Por favor aser&uacute;rese que el folder existe y que es su folder de ra&iacute;z..');
/* Web Optimizer options */
define('_WEBO_SPLASH2_MINIFY', 'Opciones de minimizaci&oacute;n');
define('_WEBO_SPLASH2_MINIFY_INFO', '<p>Minimizaci&oacute;n borra todos los espacios en blanco y otros caracteres innecesarios.</p>
									<p>Adem&aacute;s usted puede escoger la herramienta para la minimizaci&oacute;n de for CSS/JavaScript.</p>');
define('_WEBO_SPLASH2_UNOBTRUSIVE', 'JavaScript "no prominente"');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '<p>JavaScript no prominente ser&aacute; cargado luego de que todo el contenido haya aparecido en el browser.</p>
									<p>Esto puede aumentar considerablemente la velocidad de carga de su website. Pero en algunos casos puede interferir con la l&oacute;gica del cliente. Por favor tome precauci&oacute;n con esta opci&oacute;n.</p>
									<p>Tambi&eacute;n puede mover toda ejecuci&oacute;n del JavaScript antes de <code>&lt;/body&gt;</code> &mdash; esto aumentar&aacute; considerablemente la velocidad de carga de su website.</p>
									<p><a href="http://www.onlinetools.org/articles/unobtrusivejavascript/">JavaScript no prominente</a>, <a href="http://yuiblog.com/blog/2008/07/22/non-blocking-scripts/">Non-blocking JavaScript Downloads</a>, <a href="http://dean.edwards.name/weblog/2005/09/busted/">El <code>window.onload</code> Problema - Resuelto!</a>, <a href="http://dean.edwards.name/weblog/2006/06/again/"><code>window.onload</code> (again)</a></p>');
define('_WEBO_SPLASH2_EXTERNAL', 'Scripts externos y de linea');
define('_WEBO_SPLASH2_EXTERNAL_INFO', '<p>Con esta opci&oacute;n todos los scripts (incluyendo los archivos externos y los de linea) se fusionar&aacute;n a uno solo y se a&ntilde;adir&aacute; luego del archivo CSS.</p>
									<p>Esto puede ser de bastante uso en algunos casos cuando hay gran variedad de plugins y m&oacute;dulos en la secci&oacute;n head y esta l&oacute;gica no puede ser movida a carga no prominente.</p>
									<p>Usted tambi&eacute;n puede definir una lista de archivos excluidos (por ej. ga.js jquery.min.js).</p>
									<p><a href="http://thinkvitamin.com/features/webapps/serving-javascript-fast/">Sirviendo JavaScript r&aacute;pidamente</a></p>');
define('_WEBO_SPLASH2_MTIME', 'Verificar los archivos mtime');
define('_WEBO_SPLASH2_MTIME_INFO', '<p>Usualmente Web Optimizer revisa si los archivos han sido cambiados desde el &uacute;ltimo ingreso a la p&acute;gina. Y usa la informaci&oacute;n extraida para dar a los archivos existentes informaci&oacute;n para memoria Cache o generar un archivo nuevo.</p>
									<p>No es bueno desde el punto de vista de la optimizaci&oacute;n del lado del servidor por eso usted puede desactivar esta opci&oacute;n.</p>
									<p>Al activar esta opci&oacute;n usted debe de administrar la memoria Cache del Web Optimizer manualmente para limpiar folders del Cache de archivos antiguos almacenados cuando nuevos recursos est&eacute;n disponibles.</p>');
define('_WEBO_SPLASH2_GZIP', 'Opciones Gzip');
define('_WEBO_SPLASH2_GZIP_INFO', '<p>El Gzipping comprime el c&oacute;digo a trav&eacute;s de compresi&oacute;n Gzip. Esto es recomendado solo para websites de peque&ntilde;a escala, y est&aacute; apagado predeterminadamente.</p>
									<p>Para websites m&aacute;s grandes, usted deber&iacute;a efectuar Gzip por medio del web server.</p>
									<p><a href="http://paulbuchheit.blogspot.com/2009/04/make-your-site-faster-and-cheaper-to.html">Haga su website m&aacute;s r&aacute;pido y m&aacute;s barato de operar de un simple paso</a></p>');
define('_WEBO_SPLASH2_EXPIRES', 'Client Side Cache');
define('_WEBO_SPLASH2_EXPIRES_INFO', '<p>Esto, a&ntilde;ade un encabezado de expiraci&oacute;n a sus archivos de JavaScript y CSS lo que asegura que est&eacute;n almacenados en el Cache del browser del cliente.</p>
									<p>Cuando usted cambia su JS o CSS, un nuevo nombre de archivo es generado y la &uacute;ltima versi&oacute;n es consecuentemente descargada y grabada en el Cache.</p>
									<p><a href="http://developer.yahoo.com/performance/rules.html#expires">A&ntilde;ade una Expiraci&oacute;n o Encabezado de Cache-Control</a></p>');
define('_WEBO_SPLASH2_HTMLCACHE', 'Server Side Cache');
define('_WEBO_SPLASH2_HTMLCACHE_INFO', '<p>Esta opci&oacute;n permite al Web Optimizer a almacenar en la memoria Cache resultados HTML generados y prevenir mucho trabajo del lado del servidor para generar estos mismos.</p>
									<p>Nota, con esta opci&oacute;n toda la l&oacute;gica dependiente del servidor se desactivar&aacute;. Todas las p&aacute;ginas ser&aacute;n completamente est&aacute;ticas. Por favor active esta opci&oacute;n solo si est&aacute; seguro.</p>
									<p><a href="http://www.stevesouders.com/blog/2009/05/18/flushing-the-document-early/">Flushing the Document Early</a> y <a href="http://blog.port80software.com/2006/11/08/">On Streaming, Chunking, and Finding the End</a></p>');
define('_WEBO_SPLASH2_SPRITES', 'CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', '<p>Es posible almacenar imagenes de fondo CSS como sprites de CSS. Esto puede reudcir considerablemente el n&uacute;mero de demandas HTTP de carga del website</p>
									<p>Esta t&eacute;cnica es totalmente compatible con browsers modernos. Usted puede adem&aacute;s cambiar a un modo mas agresivo si est&aacute; seguro de sus reglas en CSS.</p>
									<p>Usted adem&aacute;s puede definir im&aacute;genes para excluir de creaci&oacute;n de sprites CSS (por ej. logo.png bg.gif).</p>
									<p><a href="www.alistapart.com/articles/sprites">CSS Sprites: Image Slicing\'s Kiss of Death</a></p>');
define('_WEBO_SPLASH2_DATAURI', 'Data URIs');
define('_WEBO_SPLASH2_DATAURI_INFO', '<p>Es posible almacenar las im&aacute;genes de fondo del CSS en urls de datos. Esto ayudar&aacute; a recortar m&aacute;s a&uacute;n la cantidad de demandas de HTTP.</p> 
									<p>Nota, sin embargo, esto no funcionar&aacute; en Internet Explorer (hasta la versi&oacute;n 7.0) y que la informaci&oacute;n en general ser&aacute; mayor.</p>
									<p><a href="http://www.websiteoptimization.com/speed/tweak/inline-images/">Im&aacute;genes en linea con informaci&oacute;n url</a> y <a href="http://yuiblog.com/blog/2008/11/14/imageopt-3/">Cuatro pasos para la reducci&oacute;n del tama&ntilde;o de archivos</a></p>');
define('_WEBO_SPLASH2_PARALLEL', 'Hosts m&uacute;ltiples');
define('_WEBO_SPLASH2_PARALLEL_INFO', '<p>Web Optimizer puede tambi&eacute;n a&ntilde;adir m&uacute;ltiples hosts para servir archivos est&aacute;ticos (im&aacute;genes) y aumentar la velocidad de carga del website. Con varios hosts para browsers de recursos est&aacute;ticos puede abrir muchas conexiones al servidor singular.</p>
									<p>Nota, para activar correctamente esta opci&oacute;n debe de a&ntilde;adir a la configuraci&oacute;n de su servidor algunos alias para el host principal, por ej.: <code>i1.site.com</code> <code>i2.site.com</code> <code>i3.site.com</code> <code>i4.site.com</code>. Adem&aacute;s debe a&ntilde;adir informaci&oacute;n correspondiente al DNS (para apuntar al website principal). Web Optimizer revisa la disponibilidad de todos los hosts enlistados automaticamente.</p>
									<p>Antes de desconectar el auto-check usted debe de asegurarse que el(los) host(s) existen, porque si no el HTTP GET ir&aacute; un error 404.</p>
									<p><a href="http://www.ajaxperformance.com/2006/12/18/circumventing-browser-connection-limits-for-fun-and-profit/">Eludiendo los l&iacute;mites de conexi&oacute;n del browser por diversi&oacute;n y ganancia.</a></p>');
define('_WEBO_SPLASH2_HTACCESS', 'Use .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', '<p>La mayor&iacute;a de opciones gzip y cache puede ser escrita para la configuraci&oacute;n de su website (y evitar trabajo adicional). Esto se puede efectuar v&iacute;a archivo <code>.htaccess</code> (y usted puede luego cortar opciones de ah&iacute; y mover a <code>httpd.cond</code> si es requerido).</p>
									<p><a href="http://httpd.apache.org/docs/2.0/mod/mod_deflate.html">mod_deflate</a>, <a href="http://httpd.apache.org/docs/2.2/mod/mod_filter.html">mod_filter</a>, <a href="http://httpd.apache.org/docs/1.3/mod/mod_mime.html">mod_mime</a>, <a href="http://httpd.apache.org/docs/2.0/mod/mod_headers.html">mod_headers</a>, <a href="http://httpd.apache.org/docs/2.0/mod/mod_expires.html">mod_expires</a>, <a href="http://httpd.apache.org/docs/1.3/mod/mod_setenvif.html">mod_setenvif</a>.</p>
									<p>Opciones disponibles: ');
define('_WEBO_SPLASH2_FOOTER', 'Texto del footer');
define('_WEBO_SPLASH2_FOOTER_INFO', '<p>Web Optimizer puede a&ntilde;adir un enlace en el footer de su blog enlazado de regreso al website de Web Optimizer. El enlace puede ser uno de texto, una peque&ntilde;a imagen o ambos.</p>
									<p>Por favor ayude a impulsar el Web Optimizer activando estos.</p>');
define('_WEBO_SPLASH2_AUTOCHANGE', 'Cambiando /index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', '<p>Web Optimizer puede a&ntilde;adir a tu website basado en ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' todos los cambios requeridos (Solo para /index.php).</p>
									<p>Nota: esto puede llevar a algunos problemas debido a mala configuraci&oacute;n de su servidor, tenga precauci&oacute;n con esta opci&oacute;n.</p>');
define('_WEBO_unobtrusive_on', 'Activando el JavaScript discreto');
define('_WEBO_unobtrusive_body', 'Incluye archivos JavaScript fusionados antes de <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers', 'Mueve llamados informantes de antes de <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters', 'Mueve contrallamados antes de <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads', 'Mueve direccionamiento de avisos (de contenido y baners) antes de <code>&lt;/body&gt;</code>');
define('_WEBO_external_scripts_on', 'Activa fusionamiento externo e interno de JavaScript');
define('_WEBO_external_scripts_head_end', 'Movimiento forzado de todos los scripts fusionados a <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_css', 'Activa fusionamiento de estilos (styles) externos e internos');
define('_WEBO_external_scripts_ignore_list', 'Excluye archivos de fusionamiento');
define('_WEBO_dont_check_file_mtime_on', 'No revisa mtime de archivos (y contenido)');
define('_WEBO_minify_javascript', 'Combina archivos JavaScript');
define('_WEBO_minify_with', 'Minimiza archivos JavaScript');
define('_WEBO_minify_with_jsmin', 'Minimizar con JSMin');
define('_WEBO_minify_with_packer', 'Minimizar con Packer');
define('_WEBO_minify_with_yui', 'Minimizar con YUI Compressor');
define('_WEBO_minify_css', 'Minimizar y combinar archivos CSS');
define('_WEBO_minify_page', 'Minimizar HTML');
define('_WEBO_minify_html_comments', 'Borrar comentarios HTML');
define('_WEBO_minify_html_one_string', 'Comprimir HTML a la linea uno');
define('_WEBO_gzip_javascript', 'Gzip JavaScript');
define('_WEBO_gzip_css', 'Gzip CSS');
define('_WEBO_gzip_page', 'Gzip HTML');
define('_WEBO_gzip_cookie', 'Revisar por posibilidad gzip via cookies');
define('_WEBO_far_future_expires_javascript', 'Cache JavaScript');
define('_WEBO_far_future_expires_css', 'Cache CSS');
define('_WEBO_far_future_expires_static', 'Valores est&aacute;ticos del Cache');
define('_WEBO_far_future_expires_html', 'Cache HTML');
define('_WEBO_far_future_expires_html_timeout', 'Timeout predeterminado al cache HTML, en segundos');
define('_WEBO_html_cache_enabled', 'Archivos HTML generados por Cache');
define('_WEBO_html_cache_timeout', 'Timeout predeterminado, en segundos');
define('_WEBO_html_cache_flush_only', 'Activar solo expulsi&oacute;n temprana de contenido');
define('_WEBO_html_cache_flush_size', 'Limpia tama&ntilde;o del contenido (en bytes)');
define('_WEBO_html_cache_ignore_list', 'Lista de partes de los URL a ignorar de la memoria Cache');
define('_WEBO_html_cache_allowed_list', 'Lista de USER AGENTS (robots) para a&ntilde;adir a la memoria Cache');
define('_WEBO_footer_text', 'A&ntilde;ade un enlace a Web Optimizer');
define('_WEBO_footer_image', 'A&ntilde;ade a Web Optimizer una imagen');
define('_WEBO_data_uris_on', 'Ejecuta <code>data:URI</code>');
define('_WEBO_data_uris_size', 'Maximum image size (in bytes)');
define('_WEBO_data_uris_smushit', 'Optimiza todas las im&aacute;genes CSS via smush.it');
define('_WEBO_css_sprites_enabled', 'AplicarSprites de CSS');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Graba im&aacute;genes truecolor como JPEG');
define('_WEBO_css_sprites_aggressive', 'Modo combinado "Agresivo" para Sprites CSS');
define('_WEBO_css_sprites_extra_space', 'A&ntilde;ade espacio libre para los Sprites CSS');
define('_WEBO_css_sprites_no_ie6', 'Excluye IE6 (via hackeadas CSS)');
define('_WEBO_css_sprites_memory_limited', 'Restringir uso de memoria');
define('_WEBO_css_sprites_dimensions_limited', 'Excluir im&aacute;genes que excedan el n&uacute;mero dado en una dimensi&oacute;n');
define('_WEBO_css_sprites_ignore_list', 'Excluiur archivos de Sprites CSS');
define('_WEBO_parallel_enabled', 'Activar hosts m&uacute;ltiples');
define('_WEBO_parallel_check', 'Revisar disponibilidad de hosts automaticamente');
define('_WEBO_parallel_allowed_list', 'Hosts permitidos, por ej. img i1 i2');
define('_WEBO_htaccess_enabled', 'Activar <code>.htaccess</code>');
define('_WEBO_htaccess_mod_deflate', 'Usar <code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_htaccess_mod_gzip', 'Usar <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_expires', 'Usar <code>mod_expires</code>');
define('_WEBO_htaccess_mod_headers', 'Usar <code>mod_headers</code>');
define('_WEBO_htaccess_mod_setenvif', 'Usar <code>mod_setenvif</code>');
define('_WEBO_htaccess_mod_mime', 'Usar <code>mod_mime</code>');
define('_WEBO_htaccess_mod_rewrite', 'Usar <code>mod_rewrite</code>');
define('_WEBO_htaccess_local', 'Colocar el archivo <code>.htaccess</code> localmente (no en documento ra&iacute;z');
define('_WEBO_htaccess_access', 'Proteger la instalaci&oacute;n de Web Optimizer via <code>htpasswd</code>');
define('_WEBO_auto_rewrite_enabled', 'Activar reescritura autom&aacute;tica');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', 'Instalaci&oacute;n - Etapa 3');
define('_WEBO_SPLASH3_SAVED', 'Sus opciones de configuraci&oacute;n an sido grabadas exitosamente.');
define('_WEBO_SPLASH3_REWRITE', 'Su configuraci&oacute;n ha sido grabada exitosamente');
define('_WEBO_SPLASH3_REWRITE_SHORT', 'Aceleraci&oacute;n completada');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Cambios requeridos');
define('_WEBO_SPLASH3_TESTING_SHORT', 'Probando');
define('_WEBO_SPLASH3_SECURITY_SHORT', 'Mayor seguridad');
define('_WEBO_SPLASH3_ADDITIONAL_SHORT', 'Aceleraci&oacute;n adicional');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'Su website basado en ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ' instal&oacute; el patch. Usted puede <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">revisar el resultado aqu&iacute;</a>.');
define('_WEBO_SPLASH3_WORKING', 'Est&aacute; funcionando. Muy bien, ¿Ahora que?');
define('_WEBO_SPLASH3_WORKING_REQUIRED', 'Cambios requeridos para ');
define('_WEBO_SPLASH3_ADD', 'Ahora usted <a href="#modify">debe a&ntilde;adir el c&oacute;digo de Web Optimizer</a> en sus propias p&aacute;ginas PHP (');
define('_WEBO_SPLASH3_ADD_', '). Esto se efectua m&aacute;s f&aacute;cilmente si tiene un archivo PHP que sirva a todas las p&aacute;ginas en su website, as&iacute; que deba cambiarlo solo a este.');
define('_WEBO_SPLASH3_MODIFY', 'Como modificar su(s) archivo(s) PHP:');
define('_WEBO_SPLASH3_TOFILE', 'Al archivo');
define('_WEBO_SPLASH3_TOFILE2', 'Al comienzo del archivo');
define('_WEBO_SPLASH3_TOFILE3', 'Al final del archivo');
define('_WEBO_SPLASH3_AFTERSTRING', 'luego de la liga');
define('_WEBO_SPLASH3_ADD2', 'a&ntilde;adir');
define('_WEBO_SPLASH3_TESTING', 'Ahora unas pruebas...');
define('_WEBO_SPLASH3_NOTLIVE', 'Es todo lo que debe hacer. Recomendamos probar esto primeramente en un website inactivo o no-en-vido y luego jugar con las opciones para obtener la mejor performance. Para cambiar las opciones usted puede:');
define('_WEBO_SPLASH3_MANUALLY', 'Editar manualmente el archivo <code>config.webo.php</code> aqu&iacute;: <code>');
define('_WEBO_SPLASH3_MANUALLY2', 'config.webo.php</code>');
define('_WEBO_SPLASH3_AGAIN', 'Y/o solamente <a href="');
define('_WEBO_SPLASH3_AGAIN2', '">ejecutar esta instalaci&oacute;n nuevamente</a>. Recordara sus opciones iniciales');
define('_WEBO_SPLASH3_SECURITY', 'Seguridad extra');
define('_WEBO_SPLASH3_ALTHOUGH', 'A pesar que el paquete de instalaci&oacute;n, instala un nombre de usuario y contrase&ntilde;a para ingresar, usted puede tambi&eacute;n borrar <code>');
define('_WEBO_SPLASH3_ALTHOUGH2', 'install.php</code> para seguridad extra.');
define('_WEBO_SPLASH3_FINISH', 'Fin de la instalaci&oacute;n');
define('_WEBO_SPLASH3_CANTWRITE', 'No se puede grabar en el ');
define('_WEBO_SPLASH3_CANTWRITE2', ' directorio especificado. Por favor cerciorese que el folder existe y es permitido escribir en el.');
define('_WEBO_SPLASH3_CANTWRITE3', 'Usted puede hacer esto usualmente desde un cliente FTP. Solo navegue hasta el directorio, presione el bot&oacute;n derecho del mouse y busque una opci&oacute;n CHMOD o las propiedades.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Una vez hecho, por favor recargue esta p&aacute;gina.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Por favor cerciorese que en la ra&iacute;z del website es permitido leer y escribir para el proceso de su web server.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', 'Haga CHMOD 775 o CHMOD 777 para esto, o crea acceso con permiso total <code>.htaccess</code> all&iacute;, o CHMOD el actual <code>.htaccess</code> a 664 o 777.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Por favor aseg&uacute;rese que en la ra&iacute;z de su website es permitido escribir para el proceso de su web server o hay un archivo con permiso de escritura <code>.htaccess</code>.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Haga CHMOD 775 o CHMOD 777 para esto, o cree escribibles <code>.htaccess</code> all&iacute;, o CHMOD actuales <code>.htaccess</code> a 664 o 777.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'Por favor aseg&uacute;rese se haber instalado Web Optimizer en');
define('_WEBO_SPLASH3_CONFSAVED', 'Configuraci&oacute;n guardada');
define('_WEBO_SPLASH3_CONFIGERROR', 'No se puede abrir el archivo congif para escritura. Por favor cambie el <code>config.webo.php</code> archivo, de tal manera que sea posible escribir en el.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'Usted puede hacer esto usualmente desde su cliente FTP. Solo navegue a <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , haga click derecho en el archivo, y busque por las propiedades u opciones CHMOD. Escoja 775, 777, o "escribir"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'Una vez haya usted hecho esto, por favor recargue la p&aacute;gina.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'El archivo de configuraci&oacute;n no existe. Por favor descargue el script completo de <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');
define('_WEBO_SPLASH3_ADDITIONAL', 'Opciones de performance &oacute;ptima');
define('_WEBO_SPLASH3_ADDITIONAL_INFO', 'Usted puede acceder a cambios adicionales de su website para dejar al Web Optimizer trabajar m&aacute;s eficientemente. Por favor revise lo siguiente:');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_1', '<strong>Make your website standard-complaint (HTML, JavaScript, and CSS).</strong> Non standard external files inclusion lead to incorrect Web Optimizer behavior and its disconfiguration.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_2', '<strong>Mueve todo lo requerido del JavaScript de su website y archivos CSS a la <code>head</code> secci&oacute;n.</strong> Esto permitira a Web Optimizer el manejar su fusionamiento y minimizaci&oacute;n.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_3', '<strong>A&ntilde;ada m&uacute;ltiples hosts a su website.</strong> Debe a&ntilde;adir a su DNS los siguientes datos <code>* IN A your_server_IP_address</code>, *luego subdomains apropiados (por ej. <code>i1</code> <code>i2</code> <code>i3</code> <code>i4</code>) al la configuraci&oacute;n de su servidor e instale Web Optimizer nuevamente. Web Optimizer automaticamente detecta hosts existentes (si no, por favor a&ntilde;&aacute;dalos manualmente) y distribuya im&aacute;genes a trav&eacute;s.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_4', '<strong>Mueva todo el CSS en linea y el JavaScript a archivos externos.</strong> Primeramente hace cambios de administraci&oacute;n en el dise&ntilde;o de su website / comportamiento m&aacute;s simpler. Segundo esto le permitira a Web Optimizer el fusionar, minimizar el ingresar en el Cache todos los estilos (styles) y Scripts que son usados en su website.');

/* System check info on the first screen */
define('_WEBO_SYSTEM_CHECK', 'Checking serevr configuration...');
define('_WEBO_SYSTEM_CHECK_ENABLED', 'enabled');
define('_WEBO_SYSTEM_CHECK_DISABLED', 'disabled');
define('_WEBO_SYSTEM_CHECK_WRITABLE', 'yes');
define('_WEBO_SYSTEM_CHECK_RESTRICTED', 'no');
define('_WEBO_SYSTEM_CHECK_SYSTEM_INFO', 'Server configuration');
define('_WEBO_SYSTEM_CHECK_VIA_JSMIN', 'via JSMin');
define('_WEBO_SYSTEM_CHECK_VIA_YUI', 'via YUI Compressor');
define('_WEBO_SYSTEM_CHECK_VIA_CSSTIDY', 'via CSS Tidy');
define('_WEBO_SYSTEM_CHECK_VIA_PHP', 'via PHP');
define('_WEBO_SYSTEM_CHECK_VIA_HTACCESS', 'via <code>.htaccess</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_SUPPORT', '<code>.htaccess</code> support');
define('_WEBO_SYSTEM_CHECK_HTACCESS', '<code>.htaccess</code> is writable');
define('_WEBO_SYSTEM_CHECK_HTACCESS_REWRITE', '<code>mod_rewrite</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_GZIP', '<code>mod_gzip</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_DEFLATE', '<code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_EXPIRES', '<code>mod_expires</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_HEADERS', '<code>mod_headers</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_MIME', '<code>mod_mime</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_SETENVIF', '<code>mod_setenvif</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_PROTECTED', 'Protected mode for install');
define('_WEBO_SYSTEM_CHECK_CSS_DIRECTORY', 'CSS folder is writable');
define('_WEBO_SYSTEM_CHECK_JAVASCRIPT_DIRECTORY', 'JavaScript folder is writable');
define('_WEBO_SYSTEM_CHECK_HTML_DIRECTORY', 'HTML folder is writable');
define('_WEBO_SYSTEM_CHECK_INDEX', '<code>/index.php</code> is wratable');
define('_WEBO_SYSTEM_CHECK_CONFIG', 'Configuration file is writable');
define('_WEBO_SYSTEM_CHECK_GZIP', '<code>gzip</code> "on fly"');
define('_WEBO_SYSTEM_CHECK_GZIP_STATIC', 'Static <code>gzip</code>');
define('_WEBO_SYSTEM_CHECK_CACHE', 'Client side caching');
define('_WEBO_SYSTEM_CHECK_CSS_SPRITES', 'CSS Sprites support');
define('_WEBO_SYSTEM_CHECK_CSS_MINIFY', 'Minify for CSS');
define('_WEBO_SYSTEM_CHECK_JS_MINIFY', 'Minify for JS');
define('_WEBO_SYSTEM_CHECK_EXTERNAL', 'External files access');
define('_WEBO_SYSTEM_CHECK_HOSTS', 'Multiple hosts');
define('_WEBO_SYSTEM_CHECK_CMS', 'Native CMS support');
?>