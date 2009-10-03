<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Enth&auml;lt alle DE Lokalisationkonstanten
 * Danke f&uuml;r Joerg Schumacher
 *
 **/

/* general layout */
define('_WEBO_CHARSET', 'utf-8');
define('_WEBO_GENERAL_TITLE', 'Web Optimizer Konfiguration');
define('_WEBO_GENERAL_FOOTER', 'Schneller als ein Blitz!');
define('_WEBO_GENERAL_BUYNOW', '<a href="http://www.web-optimizer.us/">Kaufen Vollversion</a>');
define('_WEBO_GENERAL_IMAGE', '<img src="http://web-optimizator.googlecode.com/svn/trunk/images/web.optimizer.logo.small.png" alt="Web Optimizer" title="Web Optimizer" width="151" height="150"/>');
define('_WEBO_GENERAL_DEMOVERSION', 'Testversion');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Hmmm..., wir haben ein Problem');
define('_WEBO_ERROR_ERROR', 'Oopps! Etwas ist schief gegangen');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Tragen Sie Ihre Anmeldedaten ein');
define('_WEBO_LOGIN_INSTALLED', 'Sie haben Web Optimizer ');
define('_WEBO_LOGIN_INSTALLED2', ' auf dieser Website schon installiert. Tragen Sie Ihre Anmeldedaten ein, um Zugriff auf alle Einstellungen zu erhalten:');
define('_WEBO_LOGIN_INSTALLED3', '. Klicken Sie auf  <strong>Weiter</strong>, um Zugriff auf alle Einstellungen zu erhalten.');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>Achtung:</strong> Kann keine Ergebnisse der T&auml;tigkeit von Web Optimizer auf  Ihret Website finden. Pr&uuml;fen Sie das Vorhandensein der Aufrufe in den Quelldateien Ihres Websystems oder installieren Sie Web Optimizer noch einmal.');
define('_WEBO_LOGIN_EFFICIENCY', 'Optimierungsergebnisse pro Hit:<br/>gespart');
define('_WEBO_LOGIN_EFFICIENCY_KB', 'Kb');
define('_WEBO_LOGIN_EFFICIENCY_S', 'Sekunden');
define('_WEBO_LOGIN_USERNAME', 'Benutzername');
define('_WEBO_LOGIN_ENTERLOGIN', 'Tragen Sie Ihre Anmeldedaten ein');
define('_WEBO_LOGIN_PASSWORD', 'Kennwort');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Kennwort eintragen');
define('_WEBO_LOGIN_LICENSE', 'Lizenz-Schl&uuml;ssel');
define('_WEBO_LOGIN_ENTERLICENSE', 'Geben Sie Lizenz-Schl&uuml;ssel');
define('_WEBO_SPLAHS1_PROTECTED', 'Gesch&uuml;tzter Modus');
define('_WEBO_SPLAHS1_PROTECTED2', 'Web Optimizer Installation ist sicher gesch&uuml;tzt. Sie k&ouml;nnen erneut konfigurieren.');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Upgrade');
define('_WEBO_LOGIN_UPGRADENOTICE', 'Sie k&ouml;nnen Ihre Version (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') von Web Optimizer auf die neueste Version aktualisieren. Tragen Sie Ihre Benutzernamen und Kennwort ein und klicken Sie auf <strong>Upgrade</strong>. Web Optimizer wird aktualisiert auf Version <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_LOGIN_UPGRADENOTICE4', ') von Web Optimizer auf die neueste Version aktualisieren &mdash; <strong>');
define('_WEBO_UPGRADE_SUCCESSFULL', 'Sie haben erfolgreich auf Version ');
define('_WEBO_UPGRADE_SUCCESSFULL2', ' aktualisiert');
define('_WEBO_UPGRADE_UNABLE', 'Kann die neueste Version nicht downloaden. Pr&uuml;fen Sie die Internetverbindung zum Server und die Curl-Existenz.');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', 'Um Web Optimizer von Ihrem System zu entfernen, tragen Sie Benutzernamen und Kennwort ein und klicken auf <strong>Deinstall</strong>');
define('_WEBO_LOGIN_UNINSTALL2', 'Web Optimizer kann f&uuml;r Ihre Website ganz einfach unwirksam gemacht werden. Sie m&uuml;ssen das Tool nur l&ouml;schen.');
define('_WEBO_LOGIN_UNINSTALLME', 'Web Optimizer deinstallieren');
define('_WEBO_LOGIN_FAILED', 'Login fehlgeschlagen');
define('_WEBO_LOGIN_ACCESS', 'Sie m&uuml;ssen angemeldet sein, um diese Seite anzusehen');
define('_WEBO_LOGIN_LOGGED', 'Angemeldet');
define('_WEBO_SPLASH1_CLEAR', 'Cache bereinigen');
define('_WEBO_SPLASH1_CLEAR_CACHE', 'Um den Cachespeicher von Web Optimizer zu reinigen, tragen Sie Benutzernamen und Kennwort ein und klicken auf <strong>Cache bereinigen</strong>. ');
define('_WEBO_SPLASH1_CLEAR_CACHE2', 'Alle gespeicherten Versionen erstellter Dateien werden aus Cache-Ordner gel&ouml;scht.');
define('_WEBO_CLEAR_UNABLE', 'Einige Dateien konnten nicht aus dem Cache-Ordner gel&ouml;scht werden');
define('_WEBO_CLEAR_SUCCESSFULL', 'Alle Dateien in Cache-Ordnern sind gel&ouml;scht worden');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Installation - Kennwort einrichten');
define('_WEBO_NEW_PROTECT', '<p>Tragen Sie Benutzernamen und Kennwort ein, um diese Installation zu sch&uuml;tzen.</p>
							<p>Kontrollieren Sie vor der Installation die Schreibrechte f&uuml;r die root <code>.htaccess</code> und f&uuml;r die Quelldateien Web-Systems (w&auml;hrend Installation wird Web Optimizer Backups Ihrer Dateien erstellen).</p>
							<p>Web Optimizer kann alle Funktionen des Servers pr&uuml;fen und die Installation automatisch vollenden. Benutzen Sie daf&uuml;r die Option <strong>"Express-Installation"</strong>. Nach Fertigstellung k&ouml;nnen Sie beliebige Einstellungen &uuml;ber die administative Schnittstelle &auml;ndern</p>.
							<p>Wenn Sie die Benutzung von Web Optimizer selbst einstellen wollen, dann klicken Sie auf <strong>"Weiter"</strong>. Sie k&ouml;nnen alle Einstellungen vor der eigentlichen Installation von Web Optimizer auf Ihrer Website p&uuml;rfen und ver&auml;ndern</p>.
							<p><a href="http://code.google.com/p/web-optimizator/wiki/Installation">Web Optimizer - Installation</a></p>');
define('_WEBO_NEW_USERDATA', 'Benutzername und Kennwort');
define('_WEBO_NEW_ENTER', 'Tragen Sie das Kennwort f&uuml;r die Installation ein');
define('_WEBO_NEW_ORDERINSTALLATION', 'Auftrag Web Optimizer Installation und Konfiguration f&uuml;r Ihre Website');
define('_WEBO_NEW_NOSCRIPT', 'F&uuml;r die korrekte Arbeit muss JavaScript aktiviert sein!');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Deinstall');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'Deinstallation');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Vielen Dank f&uuml;r den Einsatz von <a href="http://www.web-optimizer.us/">Web Optimizer</a>. Sie k&ouml;nnen das Tool erneut installieren nach einem Besuch der  <a href =� http: //');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '"> Web Optimizer Seite</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Besuchen Sie die <a href="http://code.google.com/p/web-optimizator/">Web Optimizer Website</a> und <a href="http://code.google.com/p/web-optimizator/issues/list"> machen Sie Vorschl&auml;ge</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Jetzt k&ouml;nnen Sie Zur&uuml;kkehrenzu <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">Ihrer Website</a>.');
define('_WEBO_SPLASH1_NEXT', 'Weiter');
define('_WEBO_SPLASH1_BACK', 'Zur&uuml;ck');
define('_WEBO_SPLASH1_EXPRESS', 'Express-Installation');

/* Change password */
define('_WEBO_PASSWORD_TITLE', 'Kennwort &auml;ndern');
define('_WEBO_PASSWORD_INSTALLED', 'Es gibt Web Optimizer installiert f&uuml;r die aktuelle Website. Sie k&ouml;nnen Kennwort zu &auml;ndern um seine Funktionen zugreifen: Einstellungen &auml;ndern, Cache s&auml;ubern, Upgrade, Deaktivieren und Deinstallieren.');
define('_WEBO_PASSWORD_OLD', 'Altes Kennwort');
define('_WEBO_PASSWORD_ENTERPASSWORD', 'Geben Sie altes Kennwort');
define('_WEBO_PASSWORD_NEW', 'Neues Kennwort');
define('_WEBO_PASSWORD_ENTERPASSWORDNEW', 'Geben Sie neues Kennwort');
define('_WEBO_PASSWORD_CONFIRM', 'Neues Kennwort Best&auml;tigung');
define('_WEBO_PASSWORD_ENTERPASSWORDCONFIRM', 'Geben Sie Best&auml;tigung f&uuml;r neues Kennwort');
define('_WEBO_SPLASH1_SAVE', 'Sichern');
define('_WEBO_PASSWORD_DIFFERENT', 'Neues Kennwort und die Best&auml;tigung sind verschiedene');
define('_WEBO_PASSWORD_EMPTY', 'Neues Kennwort ist nicht gesetzt!');
define('_WEBO_PASSWORD_SUCCESSFULL', 'Kennwort wurde ge&auml;ndert');

/* Second splash -- set options */
define('_WEBO_SPLASH2_TITLE', 'Installation - Abschnitt 2');
define('_WEBO_SPLASH2_OPTIONS', 'Komprimierungsoptionen');
define('_WEBO_SPLASH2_CACHE', 'Cache-Ordner');
define('_WEBO_SPLASH2_CACHE_JS', 'Javascript-Cache in');
define('_WEBO_SPLASH2_CACHE_CSS', 'CSS-Cache in');
define('_WEBO_SPLASH2_CACHE_HTML', 'HTML-Cache in');
define('_WEBO_SPLASH2_INSTALLDIR', 'Web Optimizer ist in');
define('_WEBO_SPLASH2_DOCUMENTROOT', 'Website ist in');
define('_WEBO_SPLASH2_HOST', 'Website-Host (auf statische Ressourcen), z. B. seite.de');
define('_WEBO_SPLASH2_SPACE', 'Trennen Sie mit Leerzeichen:');
define('_WEBO_SPLASH2_YES', 'Ja:');
define('_WEBO_SPLASH2_NO', 'Nein:');
define('_WEBO_SPLASH2_UNABLE', '&Ouml;ffnen nicht m&ouml;glich');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>Stellen Sie sicher, dass das Verzeichnis existiert und das es das Root-Verzeichnis ist.');
/* Web Optimizer options */
define('_WEBO_SPLASH2_MINIFY', 'Minimierungsoptionen');
define('_WEBO_SPLASH2_MINIFY_INFO', '<p>Die Minimierung entfernt Leerzeichen und andere unn&ouml;tige Zeichen.</p>
									<p>Au&szlig;erdem k&ouml;nnen Sie das Werkzeug w&auml;hlen, um CSS/JavaScript zu minimieren oder zu verschleiern.</p>
									<p>Bitte seien Sie vorsichtig bei der Anwendung der Optionen "HTML-Kommentare entfernen" oder "HTML auf einen String verkleinern". Die erste Option kann dazu f&uuml;hren auf die Beseitigung von ein paar Z&auml;hler (JavaScript-Code innerhalb von Kommentaren), die zweite - zus&auml;tzliche Belastung des Servers auf jeder Seite zu sehen.</p>');
define('_WEBO_SPLASH2_UNOBTRUSIVE', '"Unauff&auml;lliges" JavaScript');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '<p>Unauff&auml;lliges JavaScript wird unmittelbar geladen, nachdem der gesamte Inhalt in einem Browser geladen wurde.</p>
									<p>Das kann das Laden einer Webseite signifikant beschleunigen. Aber in einigen F&auml;llen kann die Client-seitige Logik zerst&ouml;rt werden. Verwenden Sie diese Option also vorsichtig.</p>
									<p>Sie k&ouml;nnen auch den Aufruf des gesamten JavaScript vor <code>&lt;/body&gt;</code> verschieben &mdash; das kann das Laden des Inhalts Ihrer Webseite signifikant beschleunigen.</p>
									<p><a href="http://www.onlinetools.org/articles/unobtrusivejavascript/">Unobtrusive JavaScript</a>, <a href="http://yuiblog.com/blog/2008/07/22/non-blocking-scripts/">Non-blocking JavaScript Downloads</a>, <a href="http://dean.edwards.name/weblog/2005/09/busted/">The <code>window.onload</code> Problem - Solved!</a>, <a href="http://dean.edwards.name/weblog/2006/06/again/"><code>window.onload</code> (again)</a></p>');
define('_WEBO_SPLASH2_EXTERNAL', 'Externe und Inline-Skripts');
define('_WEBO_SPLASH2_EXTERNAL_INFO', '<p>Mit dieser Option werden alle Skripts (einschlie&szlig;lich externer Dateien und der Inline-Skripts) zu einem einzelnen Skript verbunden und unmittelbar nach der CSS-Datei eingef&uuml;gt.</p>
									<p>Das kann in den F&auml;llen n&uuml;tzlich sein, wenn es eine Vilezahl unterschiedlicher Plug-ins und Module im Kopfbereich gibt und diese Logik nicht in unauff&auml;lliges Laden verschoben werden kann.</p>
									<p>Sie k&ouml;nnen au&szlig;erdem eine Liste ausgeschlossener Dateien definieren (d.h. ga.js jquery.min.js).</p>
									<p><a href="http://thinkvitamin.com/features/webapps/serving-javascript-fast/">JavaScript schnell bereitstellen</a></p>');
define('_WEBO_SPLASH2_MTIME', 'File-mtime verifizieren');
define('_WEBO_SPLASH2_MTIME_INFO', '<p>&Uml;blicherweise pr&uuml;ft Web Optimizer, ob Dateien seit dem letzten Zugriff auf die Seite ver&auml;ndert wurden. Die erhaltenen Informationen werden benutzt, um die Dateien aus dem Cache zu benutzen oder einen neuen zu generieren.</p>
									<p>Wenn das aus Sicht der Server-seitigen Optimierung nicht gut ist, dann k&ouml;nnen Sie die Einstellung deaktivieren.</p>
									<p>Beim Einschalten der Option m&uuml;ssen Sie die den Web Optimizer Cache manuell von veralteten Dateien bereinigen, wenn neue Assets verf&uuml;gbar sind.</p>');
define('_WEBO_SPLASH2_GZIP', 'Gzip-Optionen');
define('_WEBO_SPLASH2_GZIP_INFO', '<p>Gzipping komprimiert den Code via Gzip-Komprimierung. Das ist nur f&uuml;r kleindimensionierte Seiten empfohlen und ist als Standard ausgeschaltet.</p>
									<p>F&uuml;r gr&ouml;&szlig;ere Seiten sollten Sie Gzip via Web-Server ausf&uuml;hren.</p>
									<p><a href="http://paulbuchheit.blogspot.com/2009/04/make-your-site-faster-and-cheaper-to.html">Make your site faster and cheaper to operate in one easy step</a></p>');
define('_WEBO_SPLASH2_EXPIRES', 'Klient-Seite Cachen');
define('_WEBO_SPLASH2_EXPIRES_INFO', '<p>Dies f&uuml;gt einen Ablauf-Header in Ihre JavaScript und CSS-Dateien ein, der sicherstellt, dass sie Client-seitig durch den Browser zwischengespeichert werden.</p>
									<p>Wenn Sie JS oder CSS &auml;ndern, wird ein neuer Dateiname erstellt und die letzte Version wird deshalb heruntergeladen und zwischengespeichert.</p>
									<p><a href="http://developer.yahoo.com/performance/rules.html#expires">Ablauf- oder Cache-Control Header hinzuf&uuml;gen</a></p>');
define('_WEBO_SPLASH2_HTMLCACHE', 'Server-Seite Cachen');
define('_WEBO_SPLASH2_HTMLCACHE_INFO', '<p>Diese Option erm&ouml;glicht Web Optimizer den erstellten HTML-Output zwischenzusoeichern und so eine Menge Server-seitige Arbeit f&uuml;r die Erstelluing abzuwenden.</p>
									<p>Beachten Sie, dass diese Option alle Server-abh&auml;ngige Logik abschaltet. Alle Seiten werden vollst&auml;ndig statisch. Schalten Sie diese Option nur an, wenn Sie v&ouml;llig sicher sind.
									<p><a href="http://www.stevesouders.com/blog/2009/05/18/flushing-the-document-early/">Flushing the Document Early</a> and <a href="http://blog.port80software.com/2006/11/08/">On Streaming, Chunking, and Finding the End</a></p>');
define('_WEBO_SPLASH2_SPRITES', 'CSS-Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', '<p>Es ist m&ouml;glich, CSS-Hintergrundbilder als CSS-Sprites zu speichern. Das kann die Zahl der HTTP-Requests beim Laden der Website signifikant reduzieren.</p>
									<p>Diese Technik wird von modernen Browsern vollst&auml;ndig unterst&uuml;tzt. Sie k&ouml;nnen in einen agressiveren Modus umschalten, wenn Sie Ihre CSS-Richtlinien sicher beherrschen.</p>
									<p>Sie k&ouml;nnen auch Images definieren, die von der Erstellung der CSS-Sprites ausgeschlossen werden (z.B. logo.png bg.gif)</p>
									<p><a href="www.alistapart.com/articles/sprites">CSS-Sprites Image Slicing\'s Kiss of Death</a></p>');
define('_WEBO_SPLASH2_DATAURI', 'Daten-URIs');
define('_WEBO_SPLASH2_DATAURI_INFO', '<p>Es ist m&ouml;glich, CSS-Hintergrundbilder als Daten-URIs zu speichern. Das hilft Ihnen, die Zahl der HTTP-Requests weiter einzuschr&auml;nken.</p> 
									<p>Beachten Sie, dass das nicht mit dem Internet Explorer (bis zu Version  7.0) funktioniert und dass die Gesamtgr&ouml;&szlig;e der Daten zunimmt.</p>
									<p><a href="http://www.websiteoptimization.com/speed/tweak/inline-images/">Inline Images with Data URLs</a> and <a href="http://yuiblog.com/blog/2008/11/14/imageopt-3/">Four Steps to File Size Reduction</a></p>');
define('_WEBO_SPLASH2_PARALLEL', 'Multiple Hosts');
define('_WEBO_SPLASH2_PARALLEL_INFO', '<p>Web Optimizer kann multiple Hosts hinzuf&uuml;gen, um statische Dateien (Images) bereitzustellen und das Laden der Website zu beschleunigen. Mit mehreren Hosts f&uuml;r statische Assets k&ouml;nnen Browser mehrere Verbindungen zu einem einzelnen Server &ouml;ffnen.</p>
									<p>Um diese Option richtig zu aktivieren, m&uuml;ssen Sie der Server-Konfiguration einige Aliasse f&uuml;r den Main-Host hinzuf&uuml;gen, z.B.: <code>i1.site.com</code> <code>i2.site.com</code> <code>i3.site.com</code> <code>i4.site.com</code>. Au&szlig;erdem m&uuml;ssen Sie korrespondirende Datens&auml;tze zum  DNS hinzuf&uuml;gen (zum Verweis auf die Haupt-Website) Web Optimizer pr&uuml;ft die Verf&uuml;gbarkeit aller gelisteten Hosts automatisch.</p>
									<p>Bevor Sie diese Auto-Pr&uuml;fung ausschalten, stellen Sie sicher, dass die Hosts existieren, sonst l&auml;uft HTTP GET in einen 4040-Fehler.</p>
									<p><a href="http://www.ajaxperformance.com/2006/12/18/circumventing-browser-connection-limits-for-fun-and-profit/">Circumventing browser connection limits for fun and profit</a></p>');
define('_WEBO_SPLASH2_HTACCESS', '.htaccess verwenden');
define('_WEBO_SPLASH2_HTACCESS_INFO', '<p>Die meistenb der Gzip- und Cacxhe-Optionen k&ouml;nnen f&uuml;r die Konfiguration Ihrer Webseite geschrieben werden (und so zus&auml;tzliche Arebeit vermeiden). Dazu kann die Datei  <code>.htaccess</code> verwendet werden (und sp&auml;ter k&ouml;nnen Sie optionen von dort herausschneiden, falls n&ouml;tig und in die Datei <code>httpd.cond</code> verschieben).</p>
									<p><a href="http://httpd.apache.org/docs/2.0/mod/mod_deflate.html">mod_deflate</a>, <a href="http://httpd.apache.org/docs/2.2/mod/mod_filter.html">mod_filter</a>, <a href="http://httpd.apache.org/docs/1.3/mod/mod_mime.html">mod_mime</a>, <a href="http://httpd.apache.org/docs/2.0/mod/mod_headers.html">mod_headers</a>, <a href="http://httpd.apache.org/docs/2.0/mod/mod_expires.html">mod_expires</a>, <a href="http://httpd.apache.org/docs/1.3/mod/mod_setenvif.html">mod_setenvif</a>.</p>
									<p>Verf&uuml;gbare Optionen: ');
define('_WEBO_SPLASH2_FOOTER', 'Fu&szlig;zeilentext');
define('_WEBO_SPLASH2_FOOTER_INFO', '<p>Web Optimizer kann einen Link in die Fu&szlig;zeile Ihres Blogs einf&uuml;gen , der auf die Website von Web Optimizer zeigt. Der Link kann ein Textlink, ein kleines Bild oder beides sein.</p>
									<p>Bitte unterst&uuml;tzen Sie Web Optimizer durch Aktivieren dieses Links.</p>');
define('_WEBO_SPLASH2_AUTOCHANGE', '/index.php &auml;ndern');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', '<p>Web Optimizer kann zu Ihrer Website hinzugef&uuml;gt werden auf der Basis  ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' aller erforderlichen &Auml;nderungen (nur f&uuml;r /index.php).</p>
									<p>Anmerkung: Setzen Sie diese Option vorsichtig ein, sie kann Probleme bis hin zur Serverkonfiguration hervorrufen</p>');
define('_WEBO_unobtrusive_on', 'Unauff&auml;lliges JavaScript aktivieren');
define('_WEBO_unobtrusive_body', 'JavaScript Datei vor <code>&lt;/body&gt;</code> einflie&szlig;en lassen');
define('_WEBO_unobtrusive_informers', 'JavaScript Informer Aufrufe vor <code>&lt;/body&gt;</code> verschieben');
define('_WEBO_unobtrusive_counters', 'Counter Aufrufe vor <code>&lt;/body&gt;</code> verschieben');
define('_WEBO_unobtrusive_ads', 'Werbung (Kontext und Banner vor <code>&lt;/body&gt;</code> verschieben');
define('_WEBO_external_scripts_on', 'Vermischung von externem und Inline JavaScript aktivieren');
define('_WEBO_external_scripts_head_end', 'Verschiebung aller vermischten Scripts nach <code>&lt;/head&gt;</code> erzwingen');
define('_WEBO_external_scripts_css', 'Vermischung von externem und Inline Styles aktivieren');
define('_WEBO_external_scripts_ignore_list', 'Datei vom Vermischen ausschlie&szlig;en');
define('_WEBO_performance_mtime', 'mtime-Datei (und Inhalt) nicht pr&uuml;fen');
define('_WEBO_minify_javascript', 'JavaScript-Dateien kombinieren');
define('_WEBO_minify_with', 'JavaScript-Dateien minimieren');
define('_WEBO_minify_with_jsmin', 'Mit JSMin minimieren');
define('_WEBO_minify_with_packer', 'Mit Packer minimieren');
define('_WEBO_minify_with_yui', 'Mit YUI Compressor mimimieren');
define('_WEBO_minify_css', 'CSS-Dateien minimieren und kombinieren');
define('_WEBO_minify_page', 'HTML minimieren');
define('_WEBO_minify_html_comments', 'HTML-Kommentare entfernen');
define('_WEBO_minify_html_one_string', 'HTML auf einen String verkleinern');
define('_WEBO_gzip_javascript', 'Gzip JavaScript');
define('_WEBO_gzip_css', 'Gzip CSS');
define('_WEBO_gzip_page', 'Gzip HTML');
define('_WEBO_gzip_cookie', 'M&ouml;glichkeit f&uuml;r Gzip via Cokkies pr&uuml;fen');
define('_WEBO_far_future_expires_javascript', 'JavaScript zwischenspeichern');
define('_WEBO_far_future_expires_css', 'CSS zwischenspeichern');
define('_WEBO_far_future_expires_images', 'Bilder zwischenspeichern');
define('_WEBO_far_future_expires_video', 'Video-Dateien zwischenspeichern');
define('_WEBO_far_future_expires_static', 'Statische Assets zwischenspeichern');
define('_WEBO_far_future_expires_html', 'HTML zwischenspeichern');
define('_WEBO_far_future_expires_html_timeout', 'Standard-Timeout f&uuml;r das Cachen von HTML, in Sekunden');
define('_WEBO_html_cache_enabled', 'Generierte HTML-Dateien zwischenspeichern');
define('_WEBO_html_cache_timeout', 'Standard-Timeout, in Sekunden');
define('_WEBO_html_cache_flush_only', 'Nur das fr&uuml;here Sp&uuml;len von Inhalt aktivieren');
define('_WEBO_html_cache_flush_size', 'Gr&ouml;&szlig;e des zu sp&uuml;lenden Inhalts (in Bytes)');
define('_WEBO_html_cache_ignore_list', 'Liste der Teile von URLs, die beim Zwischenspeichern ignoriert werden');
define('_WEBO_html_cache_allowed_list', 'Liste der USER AGENTS (Robots), die zwischengespeichert werden');
define('_WEBO_footer_text', 'Link auf Web Optimizer hinzuf&uuml;gen');
define('_WEBO_footer_image', 'Web Optimizer-Bild hinzuf&uuml;gen');
define('_WEBO_data_uris_on', '<code>data:URI</code> anwenden');
define('_WEBO_data_uris_size', 'Maximale Bildgr&ouml;szlig;e (in Bytes)');
define('_WEBO_data_uris_smushit', 'Alle CSS-Bilder via smush.it optimieren');
define('_WEBO_data_uris_ignore_list', 'Dateien von <code>data:URI</code> ausschlie&szlig;en');
define('_WEBO_css_sprites_enabled', 'CSS Sprites anwenden');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Truecolor-Bilder als JPEG speichern');
define('_WEBO_css_sprites_aggressive', '"Aggressive" Kombinationsmethode f&uuml;r CSS Sprites');
define('_WEBO_css_sprites_extra_space', 'Freien Platz f&uuml;r CSS Sprites hinzuf&uuml;gen');
define('_WEBO_css_sprites_no_ie6', 'IE6 ausschlie&szlig;en (via CSS Hacks)');
define('_WEBO_css_sprites_memory_limited', 'Speicherbenutzung beschr&auml;nken');
define('_WEBO_css_sprites_dimensions_limited', 'Bilder gr&ouml;&szlig;er als eine vorgegebene Zahl in einer Dimension ausschlie&szlig;en');
define('_WEBO_css_sprites_ignore_list', 'Dateien von CSS Sprites ausschlie&szlig;en');
define('_WEBO_parallel_enabled', 'Multiple Hosts aktivieren');
define('_WEBO_parallel_check', 'Verf&uuml;gbarkeit von hosts automatisch pr&uuml;fen');
define('_WEBO_parallel_allowed_list', 'Erlaubte Hosts, z.B. img i1 i2');
define('_WEBO_parallel_additional', 'Additional websites with multiple hosts, i.e. shop-host.es photo-host.es');
define('_WEBO_parallel_additional_list', 'Hosts on these websites, i.e. i1 i2');
define('_WEBO_htaccess_enabled', '<code>.htaccess</code> aktivieren');
define('_WEBO_htaccess_mod_deflate', '<code>mod_deflate</code> verwenden');
define('_WEBO_htaccess_mod_gzip', '<code>mod_gzip</code> verwenden');
define('_WEBO_htaccess_mod_expires', '<code>mod_expires</code> verwenden');
define('_WEBO_htaccess_mod_headers', '<code>mod_headers</code> verwenden');
define('_WEBO_htaccess_mod_setenvif', '<code>mod_setenvif</code> verwenden');
define('_WEBO_htaccess_mod_mime', '<code>mod_mime</code> verwenden');
define('_WEBO_htaccess_mod_rewrite', '<code>mod_rewrite</code> verwenden');
define('_WEBO_htaccess_local', 'Datei <code>.htaccess</code> lokal platzieren (nicht in die Dokument-Root)');
define('_WEBO_htaccess_access', 'Web Optimizer Installation via <code>htpasswd</code> sch&uuml;tzen');
define('_WEBO_htaccess_username', 'Username (to access via HTTP Basic Authorization)');
define('_WEBO_htaccess_password', 'Password (to access via HTTP Basic Authorization)');
define('_WEBO_auto_rewrite_enabled', 'Auto-Rewrite aktivieren');

/* Version comparison */
define('_WEBO_SPLASH2_COMPARISON', 'Testversion Einschr&auml;nkungen');
define('_WEBO_SPLASH2_COMPARISON_TITLE', 'Merkmale und Technologien');
define('_WEBO_SPLASH2_COMPARISON_DEMO', 'Testversion');
define('_WEBO_SPLASH2_COMPARISON_FULL', 'Vollversion');
define('_WEBO_SPLASH2_COMPARISON_SUPPORT', 'Pr&auml;mie Support');
define('_WEBO_SPLASH2_COMPARISON_CPU', 'CPU-Unkosten');
define('_WEBO_SPLASH2_COMPARISON_CPU_MS', 'ms');
define('_WEBO_SPLASH2_COMPARISON_UPTO', 'bis zu');
define('_WEBO_SPLASH2_COMPARISON_UPTO2', 'bis zu');
define('_WEBO_SPLASH2_COMPARISON_TRAFFIC', 'weniger Traffic');
define('_WEBO_SPLASH2_COMPARISON_LOAD', 'CPU-Last');
define('_WEBO_SPLASH2_COMPARISON_SAVED', 'CPU gespeichert');
define('_WEBO_SPLASH2_COMPARISON_REQUESTS', 'HTTP-Anfragen');
define('_WEBO_SPLASH2_COMPARISON_ACCELERATION', 'extra Website Beschleunigung');
define('_WEBO_SPLASH2_COMPARISON_NOTINCLUDED', 'nicht verf&uuml;gbar');
define('_WEBO_SPLASH2_COMPARISON_ALLBENEFITS', 'Alle Leistungen');
define('_WEBO_SPLASH2_COMPARISON_PRICE', 'Pries');
define('_WEBO_SPLASH2_COMPARISON_FREE', 'kostenlos');
define('_WEBO_SPLASH2_COMPARISON_FULLPRICE', '69&euro;');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', 'Installation - Abschnitt 3');
define('_WEBO_SPLASH3_SAVED', 'Die Konfigurationsoptionen wurden erfolgreich gespeichert.');
define('_WEBO_SPLASH3_REWRITE', 'Die Konfiguration wurde erfolgreich gespeichert.');
define('_WEBO_SPLASH3_REWRITE_SHORT', 'Beschleunigung abgeschlossen');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Erforderliche &Auml;nderungen');
define('_WEBO_SPLASH3_TESTING_SHORT', 'Im Test');
define('_WEBO_SPLASH3_SECURITY_SHORT', 'Mehr Sicherheit');
define('_WEBO_SPLASH3_ADDITIONAL_SHORT', 'Zus&auml;tzliche Beschleunigung');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'Ihre Webseite wurde auf Basis von  ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ' gepatcht. Sie k&ouml;nnen das <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">Ergebnis pr&uuml;fen</a>.');
define('_WEBO_SPLASH3_WORKING', 'Es funktioniert. OK?');
define('_WEBO_SPLASH3_WORKING_REQUIRED', 'Erforderliche &Auml;nderungen f&uuml;r ');
define('_WEBO_SPLASH3_ADD', 'Jetzt sollten Sie den <a href="#modify">Web Optimizer Code hinzuf&uuml;gen</a> zu Ihren eigenen PHP-Seiten(');
define('_WEBO_SPLASH3_ADD_', '). Es macht Vielses einfacher, wenn Sie eine PHP-Datei haben, die alle Seiten Ihrer Website bedient, so dass Sie nur diese Datei &auml;ndern m&uuml;ssen.');
define('_WEBO_SPLASH3_MODIFY', 'So modifizieren Sie Ihre PHP Dateien:');
define('_WEBO_SPLASH3_TOFILE', 'Zu Datei');
define('_WEBO_SPLASH3_TOFILE2', 'Ganz an den Anfang der Datei');
define('_WEBO_SPLASH3_TOFILE3', 'An das Ende der Datei');
define('_WEBO_SPLASH3_AFTERSTRING', 'hinter den String');
define('_WEBO_SPLASH3_ADD2', 'hinzuf&uuml;gen');
define('_WEBO_SPLASH3_TESTING', 'Jetzt zum Testen...');
define('_WEBO_SPLASH3_NOTLIVE', 'Das ist alles, was Sie tun mussten. Zum Ver&auml;ndern der Optionen k&ouml;nnen Sie:');
define('_WEBO_SPLASH3_MANUALLY', 'Die Datei <code>config.webo.php</code> manuell bearbeiten: <code>');
define('_WEBO_SPLASH3_MANUALLY2', 'config.webo.php</code>');
define('_WEBO_SPLASH3_AGAIN', 'Oder nur diese <a href="');
define('_WEBO_SPLASH3_AGAIN2', '">Installation erneut ausf&uuml;hren</a>. Die gegenw&auml;rtigen Optionen werden dabei voreingestellt');
define('_WEBO_SPLASH3_SECURITY', 'Zus&auml;tzliche Sicherheit');
define('_WEBO_SPLASH3_ALTHOUGH', 'Obwohl das Paket einen Benutzernamen und Kennwort installiert, um auf die Installation zuzugreifen, k&ouml;nnen Sie au&szlig;erdem die   <code>');
define('_WEBO_SPLASH3_ALTHOUGH2', 'install.php</code> f&uuml;r zus&auml;tzliche Sicherheit l&ouml;schen.');
define('_WEBO_SPLASH3_FINISH', 'Installation abschlie&szlig;en');
define('_WEBO_SPLASH3_CANTWRITE', 'Schreiben nicht m&ouml;glich in  ');
define('_WEBO_SPLASH3_CANTWRITE2', ' das von Ihnen angegebene Verzeichnis. Stellen sie sicher, dass das Verzeichnis existiert und das Schreiben dorthin erlaubt ist.');
define('_WEBO_SPLASH3_CANTWRITE3', 'Sie k&ouml;nnen das &uuml;blicherweise &uuml;ber Ihren FTP-Client erledigen. Navigieren Sie zum Verzeichnis, klicken Sie mit der rechten Maustaste und pr&uuml;fen Sie die Eigenschaften oder die CHMOD-Option.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Wenn Sie das getan haben, aktualisieren Sie diese Seite.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Stellen Sie sicher, dass die Root Ihrer Website Lese- und Schreibrechte f&uuml;r Prozesse Ihres Webservers hat.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', 'CHMOD 775 oder CHMOD 777 oder <code>.htaccess</code> dort im Lese/Schreibmodus erstellen oder CHMOD der aktuellen <code>.htaccess</code> zu 664 oder 777.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Stellen Sie sicher, dass die Root Ihrer Website Lese- und Schreibrechte f&uuml;r Prozesse Ihres Webservers hat oder eine beschreibbare <code>.htaccess</code>-Datei existiert.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'CHMOD 775 oder CHMOD 777 oder <code>.htaccess</code> dort im Lese/Schreibmodus erstellen oder CHMOD der aktuellen <code>.htaccess</code> zu 664 oder 777.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'Stellen Sie sicher, dass Sie Web Optimizer installiert haben nach');
define('_WEBO_SPLASH3_CONFSAVED', 'Konfiguration gespeichert');
define('_WEBO_SPLASH3_CONFIGERROR', 'Kann Konfigurationsdatei nicht zum Schreiben &ouml;ffnen. &Auml;ndern Sie die Eigenschaften der <code>config.webo.php</code> so, dass sie beschreibbar ist.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'Sie k&ouml;nnen das &uuml;blicherweise &uuml;ber Ihren FTP-Client erledigen. Navigieren Sie zu <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , klicken Sie mit der rechten Maustaste auf die Datei und &auml;ndern Sie die Eigenschaften oder die CHMOD-Option. Stellen Sie 775, 777 oder "write" ein.');
define('_WEBO_SPLASH3_CONFIGERROR4', 'Wenn Sie das getan haben, aktualisieren Sie diese Seite.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'Konfigurationsdatei existiert nicht. Laden Sie das vollst&auml;ndige Script von <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');
define('_WEBO_SPLASH3_ADDITIONAL', 'Einstellungen f&uuml;r optimale Performance');
define('_WEBO_SPLASH3_ADDITIONAL_INFO', 'Sie k&ouml;nnen erweiterte Einstellungen auf Ihre Website anwenden, damit Web Optimizer effizienter arbeitet. Pr&uuml;fen Sie Folgendes:');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_1', '<strong>Machen Sie Ihre Webseite Standard-Beschwerde (HTML, JavaScript und CSS).</strong> Non-Standard externen Dateien Eingliederung f&uuml;ren zu falschen Web Optimizer Verhalten und ihre disconfiguration.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_2', '<strong>Alle f&uuml;r Ihre Website erforderlichen JavaScript- und CSS-Dateienin die <code>head</code>-Sektion verschieben.</strong> Das erm&ouml;glicht Web Optimizer das Zusammenf&uuml;hren und Minimieren.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_3', '<strong>Multiple Hosts f&uuml;r Ihre Website hinzuf&uuml;gen.</strong> Sie m&uuml;ssen zu Ihrer DNS den Record <code>* IN A your_server_IP_address</code> hinzuf&uuml;gen und dann passende Subdomains (z.B. <code>i1</code> <code>i2</code> <code>i3</code> <code>i4</code>) in Ihre Serverkonfiguration hinzuf&uuml;gen und Web Optimizer erneut installieren. Web Optimizer wird die existierenden Hosts automatisch ermitteln (wenn nicht, f&uuml;gen Sie diese manuell hinzu) und die Bilder auf sie verteilen.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_4', '<strong>Inline CSS und JavaScript in exterene Dateien verschieben.</strong> Das macht die Verwaltung von &Auml;nderungen am Design und Verhalten Ihrer Website einfacher. Au&szlig;erdem erm&ouml;glicht es Web Optimizer das Zusammenf&uuml;hren, Minimieren und Zwischenspeichern aller Styles und Scripts, die auf Ihrer Website benutzt werden.');

/* System check info on the first screen */
define('_WEBO_SYSTEM_CHECK', '&Uuml;berpr&uuml;fung des Server Konfiguration...');
define('_WEBO_SYSTEM_CHECK_ENABLED', 'aktiviert');
define('_WEBO_SYSTEM_CHECK_DISABLED', 'behindert');
define('_WEBO_SYSTEM_CHECK_WRITABLE', 'ja');
define('_WEBO_SYSTEM_CHECK_RESTRICTED', 'nein');
define('_WEBO_SYSTEM_CHECK_SYSTEM_INFO', 'Server Konfiguration');
define('_WEBO_SYSTEM_CHECK_VIA_JSMIN', 'per JSMin');
define('_WEBO_SYSTEM_CHECK_VIA_YUI', 'per YUI Compressor');
define('_WEBO_SYSTEM_CHECK_VIA_CSSTIDY', 'per CSS Tidy');
define('_WEBO_SYSTEM_CHECK_VIA_PHP', 'per PHP');
define('_WEBO_SYSTEM_CHECK_VIA_HTACCESS', 'per <code>.htaccess</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_SUPPORT', '<code>.htaccess</code> Support');
define('_WEBO_SYSTEM_CHECK_HTACCESS', '<code>.htaccess</code> ist schreibbar');
define('_WEBO_SYSTEM_CHECK_HTACCESS_REWRITE', '<code>mod_rewrite</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_GZIP', '<code>mod_gzip</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_DEFLATE', '<code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_EXPIRES', '<code>mod_expires</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_HEADERS', '<code>mod_headers</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_MIME', '<code>mod_mime</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_SETENVIF', '<code>mod_setenvif</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_PROTECTED', 'Der gesch&uuml;tzte Modus f&uuml;r die Installation');
define('_WEBO_SYSTEM_CHECK_CSS_DIRECTORY', 'CSS-Verzeichnis ist schreibbar');
define('_WEBO_SYSTEM_CHECK_JAVASCRIPT_DIRECTORY', 'JavaScript-Verzeichnis ist schreibbar');
define('_WEBO_SYSTEM_CHECK_HTML_DIRECTORY', 'HTML-Verzeichnis ist schreibbar');
define('_WEBO_SYSTEM_CHECK_INDEX', '<code>/index.php</code> ist schreibbar');
define('_WEBO_SYSTEM_CHECK_CONFIG', 'Konfiguration-Datei ist schreibbar');
define('_WEBO_SYSTEM_CHECK_GZIP', '<code>gzip</code> "auf Fliege"');
define('_WEBO_SYSTEM_CHECK_GZIP_STATIC', 'Statische <code>gzip</code>');
define('_WEBO_SYSTEM_CHECK_CACHE', 'Client-Seite Cachen');
define('_WEBO_SYSTEM_CHECK_CSS_SPRITES', 'CSS Sprites Support');
define('_WEBO_SYSTEM_CHECK_CSS_MINIFY', 'Minifizieren f&uuml;r CSS');
define('_WEBO_SYSTEM_CHECK_JS_MINIFY', 'Minifizieren f&uuml;r JS');
define('_WEBO_SYSTEM_CHECK_EXTERNAL', 'Externe Dateien zugreifen');
define('_WEBO_SYSTEM_CHECK_HOSTS', 'Mehrere Hosts');
define('_WEBO_SYSTEM_CHECK_CMS', 'Native Unterst&uuml;tzung von CMS');
define('_WEBO_SYSTEM_CHECK_MEMORY', 'Memory available');
?>