<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Contains all DE localization constants
 *
 **/

/* general layout */
define('_WEBO_CHARSET', 'utf-8');
define('_WEBO_GENERAL_TITLE', 'Web Optimizer Konfiguration');
define('_WEBO_GENERAL_FOOTER', 'Schneller als der Blitz!');
define('_WEBO_GENERAL_BUYNOW', '<a href="http://webo.name/web-optimizer/">Kaufen Vollversion</a>');
define('_WEBO_GENERAL_IMAGE', '<img src="http://web-optimizator.googlecode.com/svn/trunk/images/web.optimizer.logo.small.png" alt="Web Optimizer" title="Web Optimizer" width="151" height="150"/>');
define('_WEBO_GENERAL_DEMOVERSION', 'Testversion');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Hmmm ... wir haben ein Problem');
define('_WEBO_ERROR_ERROR', 'Oopps! Irgend etwas stimmt nicht');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Geben Sie Ihre Login-Daten');
define('_WEBO_LOGIN_INSTALLED', 'Sie haben bereits Web Optimizer ');
define('_WEBO_LOGIN_INSTALLED2', ' f&uuml;r dieser Website installierten. Bitte geben Sie den Login-Daten auf alle Einstellungen zu bekommen:');
define('_WEBO_LOGIN_INSTALLED3', '. Bitte klicken auf \'Weiter\' auf alle Einstellungen zu bekommen');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>ACHTUNG:</strong> kann nicht Ergebnis der Bem&uuml;hungen von Web Optimizer auf der Website finden. Bitte &uuml;berpr&uuml;fen ihre Existenz fordert in dem Web-System-Quelldateien oder machen die Installation von Web Optimizer noch einmal.');
define('_WEBO_LOGIN_EFFICIENCY', 'Optimierung Ergebnisse pro Treffer:<br/>gespeichert ');
define('_WEBO_LOGIN_EFFICIENCY_KB', 'Kb');
define('_WEBO_LOGIN_EFFICIENCY_S', 'Sekunden');
define('_WEBO_LOGIN_USERNAME', 'Benutzername');
define('_WEBO_LOGIN_ENTERLOGIN', 'Geben Sie Benutzernamen');
define('_WEBO_LOGIN_PASSWORD', 'Kennwort');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Geben Sie Kennwort');
define('_WEBO_LOGIN_LICENSE', 'Lizenz-Schl&uuml;ssel');
define('_WEBO_LOGIN_ENTERLICENSE', 'Geben Sie Lizenz-Schl&uuml;ssel');
define('_WEBO_SPLAHS1_PROTECTED', 'Gesch&uuml;tzter Modus');
define('_WEBO_SPLAHS1_PROTECTED2', 'Web Optimizer Installation ist sicher gesch&uuml;tzt. Sie k&ouml;nnen ihn noch einmal konfigurieren.');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Upgrade');
define('_WEBO_LOGIN_UPGRADENOTICE', 'Sie k&ouml;nnen aktualisieren Ihre Version (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') von Web Optimizer bis sp&auml;testens einen. Geben Sie Ihre Benutzernamen und Kennwort und klicken auf <strong>Upgrade</strong>. Web Optimizer wird auf die Version <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong> aktualisiert werden.');
define('_WEBO_LOGIN_UPGRADENOTICE4', '), so Web Optimizer wird auf die Version <strong>');
define('_WEBO_UPGRADE_SUCCESSFULL', 'Sie haben sich erfolgreich auf die Version ');
define('_WEBO_UPGRADE_SUCCESSFULL2', ' aktualisiert');
define('_WEBO_UPGRADE_UNABLE', 'Kann nicht die neueste Version aus dem Archiv herunterladen. Bitte &uuml;berpr&uuml;fen Internet-Verbindung des Servers und der Existenz von curl.');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', 'Um Web Optimizer von System zu entfernen, geben bitte Benutzername und Passwort ein und klicken auf <strong>Deinstall</storng>.');
define('_WEBO_LOGIN_UNINSTALL2', 'Web Optimierer kann einfach deaktiviert f&uuml;r die Website. Nur l&ouml;schen Den.');
define('_WEBO_LOGIN_UNINSTALLME', 'Web Optimizer deinstallieren');
define('_WEBO_LOGIN_FAILED', 'Anmeldung fehlgeschlagen');
define('_WEBO_LOGIN_ACCESS', 'Sie m&uuml;ssen eingeloggt sein, um diese Seite zu sehen');
define('_WEBO_LOGIN_LOGGED', 'Eingeloggt Sie');
define('_WEBO_SPLASH1_CLEAR', 'Cache leeren');
define('_WEBO_SPLASH1_CLEAR_CACHE', 'Um Web Optimizer Cache zu leeren, geben bitte Benutzername und Passwort ein und klicken auf <strong>Cache leeren</strong>. ');
define('_WEBO_SPLASH1_CLEAR_CACHE2', 'Alle gespeicherten Versionen der erzeugten Dateien werden aus dem Cache-Ordner gel&ouml;scht werden.');
define('_WEBO_CLEAR_UNABLE', 'Pardon, kann nicht gel&ouml;scht werden eine Reihe von Dateien aus dem Cache-Ordner');
define('_WEBO_CLEAR_SUCCESSFULL', 'Alle Dateien im Cache-Verzeichnisse wurden gel&ouml;scht');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Installation - angeben den Kennwort');
define('_WEBO_NEW_PROTECT', '<p>Bitte geben Benutzernamen und Passwort ein, um diese Installation zu sch&uuml;tzen. <strong>Testversion</strong> erfordert keine Lizenz-Schl&uuml;ssel installiert werden.</p>
							<p>&Uuml;berpr&uuml;fen bitte vor der Installation, dass Root-Datei <code>.htaccess</code> und Source-Dateien Ihres Web-System sind beschreibbar (durch der Installation Web Optimizer schafft auch Backup Ihrer Daten).</p>
							<p>Web Optimizer kann alle Funktionen Ihres Servers &uuml;berpr&uuml;fen und Installation automatisch kompletten. F&uuml;r diese Option klicken auf <strong>Express-Installation</strong>. Sie k&ouml;nnen eine Einstellung &auml;ndern mit dieser Administative Schnittstelle nach der vollst&auml;ndigen.</p>
							<p>Wenn Ihr einrichten m&ouml;chten Nutzung von Web Optimizer manuell klicken auf <strong>N&auml;chster</strong>. Sie k&ouml;nnen &uuml;berpr&uuml;fen und setzen alle Einstellungen vor dem eigentlichen Web Optimizer Installation auf Ihrer Website.</p>
							<p><a href="http://code.google.com/p/web-optimizator/wiki/Installation">Web Optimizer Installationshandbuch</a></p>');
define('_WEBO_NEW_USERDATA', 'Ihre Benutzername und Kennwort');
define('_WEBO_NEW_ENTER', 'Geben Sie das Kennwort f&uuml;r die Installation');
define('_WEBO_NEW_ORDERINSTALLATION', 'Auftrag Web Optimizer Installation und Konfiguration f&uuml;r Ihre Website');
define('_WEBO_NEW_NOSCRIPT', 'F&uuml;r die korrekte Arbeit muss JavaScript aktiviert sein!');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Deinstall');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'Deinstallation');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Vielen Dank f&uuml;r Nutzung des Web Optimizer. Sie k&ouml;nnen es sp&auml;ter noch einmal durch den Besuch der <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">Web Optimizer Seite</a> installieren.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'F&uuml;hlen Sie sich frei <a href="http://code.google.com/p/web-optimizator/">Web Optimizer Web</a> zu besuchen und <a href="http://code.google.com/p/web-optimizator/issues/list">damit verbundenen Fragen</a> zu &uuml;berzumitteln.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Nun k&ouml;nnen Sie zur&uuml;ck zur <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">Ihre Website</a> gehen.');
define('_WEBO_SPLASH1_NEXT', 'N&auml;chster');
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
define('_WEBO_SPLASH2_TITLE', 'Installation - Stufe 2');
define('_WEBO_SPLASH2_OPTIONS', 'Kompression Optionen');
define('_WEBO_SPLASH2_CACHE', 'Cache-Verzeichnisse');
define('_WEBO_SPLASH2_CACHE_JS', 'Ihre JavaScript wird zwischengespeichert in');
define('_WEBO_SPLASH2_CACHE_CSS', 'Ihre CSS wird zwischengespeichert in');
define('_WEBO_SPLASH2_CACHE_HTML', 'Ihre HTML wird zwischengespeichert in');
define('_WEBO_SPLASH2_INSTALLDIR', 'Web Optimizer befindet sich in');
define('_WEBO_SPLASH2_DOCUMENTROOT', 'Webseite is befindet sich in');
define('_WEBO_SPLASH2_HOST', 'Website-Host (auf statische Ressourcen), z. B. seite.de');
define('_WEBO_SPLASH2_SPACE', 'Bitte trennen mit Leerzeichen:');
define('_WEBO_SPLASH2_YES', 'Ja:');
define('_WEBO_SPLASH2_NO', 'Nein:');
define('_WEBO_SPLASH2_UNABLE', 'Kann nicht offenen');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>Bitte &uuml;berpr&uuml;fen, dass das Verzeichnis existiert, und es ist Ihrer Root-Verzeichnis.');

/* Web Optimizer options */
define('_WEBO_SPLASH2_MINIFY', 'Minifizieren und Kombinieren');
define('_WEBO_SPLASH2_MINIFY_INFO', '<p>Minifying entfernt Leerzeichen und andere unn&ouml;tige Zeichen.</p>
									<p>Sie k&ouml;nnen auch w&auml;hlen das Werkzeug f&uuml;r CSS / JavaScript Verkleinerung oder Verschleierung.</p>
									<p>Bitte seien Sie vorsichtig bei der Anwendung der Optionen "Entfernen HTML-Kommentare" oder "Komprimieren HTML". Die erste Option kann dazu f&uuml;hren auf die Beseitigung von ein paar Z&auml;hler (JavaScript-Code innerhalb von Kommentaren), die zweite - zus&auml;tzliche Belastung des Servers auf jeder Seite zu sehen.</p>');
define('_WEBO_SPLASH2_UNOBTRUSIVE', '"Unaufdringliche" JavaScript');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '<p>Unaufdringliche JavaScript wird direkt geladen nach allen Inhalten wurde in einem Browser angezeigt (auf die <code>DOMloaded</code> Veranstaltung).</p>
									<p>Dies l&auml;sst sich deutlich erh&ouml;hen Website Geschwindigkeit. Aber in einigen F&auml;llen es kann der Client-Seite Logik brechen. Bitte seien vorsichtig mit dieser Option.</p>
									<p>Auch k&ouml;nnen Sie alle JavaScript-Aufrufe (Schalter, Anzeigen, Widgets usw.) vor <code>&lt;/body&gt;</code> bewegen &mdash; Dies l&auml;sst sich deutlich Geschwindigkeit beim Laden des Inhalts auf Ihrer Websit.</p>
									<p><a href="http://www.onlinetools.org/articles/unobtrusivejavascript/">Unobtrusive JavaScript</a>, <a href="http://yuiblog.com/blog/2008/07/22/non-blocking-scripts/">Non-blocking JavaScript Downloads</a>, <a href="http://dean.edwards.name/weblog/2005/09/busted/">The <code>window.onload</code> Problem - Solved!</a>, <a href="http://dean.edwards.name/weblog/2006/06/again/"><code>window.onload</code> (again)</a></p>');
define('_WEBO_SPLASH2_EXTERNAL', 'Au&szlig;en- und Inline-Scripts');
define('_WEBO_SPLASH2_EXTERNAL_INFO', '<p>Mit dieser Option werden alle Skripte (einschlie?lich der externen Dateien und Inline-Scripts) in ein einziges zusammengef&uuml;hrt werden und direkt nach der CSS-Datei hinzugef&uuml;gt werden.</p>
									<p>Dies kann in einigen Fallen nutzlich werden, wann es ist viele verschiedene Plugins und Module im Kopfbereich und diese Logik nicht auf unaufdringliche bewegende Last.</p>
									<p>Sie k&ouml;nnen auch eine Liste der ausgeschlossenen Dateien definieren (d.h. ga.js jquery.min.js).</p>
									<p><a href="http://thinkvitamin.com/features/webapps/serving-javascript-fast/">Serving JavaScript Fast</a></p>');
define('_WEBO_SPLASH2_MTIME', 'Leistung Optionen');
define('_WEBO_SPLASH2_MTIME_INFO', '<p>Gew&ouml;hnlich Web Optimizer pr7uuml;ft, ob Dateien, die seit dem letzten Zugriff auf die Seite ge&auml;ndert worden sind. Und Informationen abgerufen und verwendet, um vorhandene Datei aus dem Cache geben, oder erstellen Sie eine neue ein.</p>
									<p>Es ist nicht gut von der Server-Seite Optimierung Sicht, so dass Sie dieses Kontrollk&auml;stchen deaktivieren k&ouml;nnen.</p>
									<p>Durch das Aktivieren dieser Option die Sie ben&ouml;tigen, um Web-Optimizer Cache manuell zu verwalten, um Cache-Ordner von sauber heraus-of-date, wenn neue Anlagen zur Verf&uuml;gung stehen zwischengespeichert.</p>');
define('_WEBO_SPLASH2_GZIP', 'Gzip Optionen');
define('_WEBO_SPLASH2_GZIP_INFO', '<p>Gzip-Komprimierung komprimiert den Code per Gzip Kompression. Dies ist nur fur kleine Websites empfohlen.</p>
									<p>Bei gr&ouml;&szlig;eren Sites sollten Sie Gzip ber den Webserver erm&ouml;glichen. Web Optimizer standardm&auml;&szlig;ig f&uuml;gt alle Regeln direkt an die Server-Konfiguration.</p>
									<p><a href="http://paulbuchheit.blogspot.com/2009/04/make-your-site-faster-and-cheaper-to.html">Make your site faster and cheaper to operate in one easy step</a></p>');
define('_WEBO_SPLASH2_EXPIRES', 'Client-Seite Cachen');
define('_WEBO_SPLASH2_EXPIRES_INFO', '<p>Diese Option fugt einen Expires-Header um Ihre JavaScript- und CSS-Dateien, die sicherstellt, dass Dateien auf der Client-Seite werden vom Browser zwischengespeichert.</p>
									<p>Wenn Sie es sich anders JS oder CSS, einen neuen Dateinamen generiert und die neueste Version ist daher heruntergeladen und zwischengespeichert.</p>
									<p><a href="http://developer.yahoo.com/performance/rules.html#expires">Add an Expires or a Cache-Control Header</a></p>');
define('_WEBO_SPLASH2_HTMLCACHE', 'Server-Seite Cachen');
define('_WEBO_SPLASH2_HTMLCACHE_INFO', '<p>Diese Option erm&omul;glicht Web Optimizer generierten HTML-Ausgabe zu zwischenspeichern und eine Menge Server-Seite arbeiten zu verhindern, um ihn zu erzeugen.</p>
									<p>Anmerkung: Bei dieser Option werden alle Server-abhangige Logik wird deaktiviert. Alle Seiten werden komplett statisch. Bitte aktivieren Sie nur, wenn Sie sich ganz sicher sind.</p>
									<p><a href="http://www.stevesouders.com/blog/2009/05/18/flushing-the-document-early/">Flushing the Document Early</a> und <a href="http://blog.port80software.com/2006/11/08/">On Streaming, Chunking, and Finding the End</a></p>');
define('_WEBO_SPLASH2_SPRITES', 'Verwenden CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', '<p>Es ist m&ouml;glich Bilder als Hintergrund CSS in CSS-Sprites zu speichern. Dies l&auml;sst sich deutlich reduzieren die Anzahl von HTTP-Anfragen w&auml;hrend der Website zu laden.</p>
									<p>Diese Technik wird in vollem Umfang von allen modernen Browsern unterst&uuml;tzt. Sie k&ouml;nnen auch Umstellung auf aggressive Modus, wenn Sie mit Ihrem CSS-Regeln ganz sicher sind.</p>
									<p>Sie k&omul;nnen auch Bilder definieren, die von CSS-Sprites auszuschlie&szlig;en Schaffung (d.h. logo.png bg.gif).</p>
									<p><a href="http://www.alistapart.com/articles/sprites">CSS Sprites: Image Slicing\'s Kiss of Death</a></p>');
define('_WEBO_SPLASH2_DATAURI', 'Verwenden data URIs');
define('_WEBO_SPLASH2_DATAURI_INFO', '<p>Es ist m&ouml;glich CSS Hintergrund Bilder als Data-URIs zu speichern. Dies wird helfen noch st&auml;rker auf die Anzahl von HTTP-Anfragen zu reduzieren.</p>
									<p>Anmerkung: dass dies nicht funktioniert mit dem Internet Explorer (bis Version 7.0) und dass die allgemeine Gr&ouml;&szlig;e der Daten wird gr&ouml;&szlig;er.</p>
									<p><a href="http://www.websiteoptimization.com/speed/tweak/inline-images/">Inline Images with Data URLs</a> und <a href="http://yuiblog.com/blog/2008/11/14/imageopt-3/">Four Steps to File Size Reduction</a></p>');
define('_WEBO_SPLASH2_PARALLEL', 'Mehrere Hosts');
define('_WEBO_SPLASH2_PARALLEL_INFO', '<p>Web Optimizer k&ouml;nnen auch mehreren Hosts auf statische Dateien (Bilder) zu dienen und zu beschleunigen Website zu laden. Mit mehreren Hosts f&uuml;r statische Verm&ouml;genswerte Browser k&ouml;nnen viele Verbindungen offen f&uuml;r die einzelnen Server.</p>
									<p>Anmerkung: diese Option zu aktivieren, m&uuml;ssen Sie richtig auf Ihren Server-Konfiguration hinzuf*uuml;gen, einige Aliase f&uuml;r die Haupt-Host, d.h.: <code>i1.seite.de</code> <code>i2.seite.de</code> <code>i3.siete.de</code> <code>i4.seite.de</code>. Dar&uuml;ber hinaus m&uuml;ssen Sie den entsprechenden Aufzeichnungen zum DNS hinzuf&uuml;gen (dass sie auf der Haupt-Website). Web Optimizer uberpr&uuml;ft die Verf&uuml;barkeit aller aufgef&uuml;hrten Hosts automatisch.</p>
									<p>Vor dem Deaktivieren des Auto-Check Sie m&uuml;ssen sicherstellen, dass die Host(s) vorhanden ist(sind), da sonst HTTP GET l&auml;uft in einen 404-Fehler.</p>
									<p><a href="http://www.ajaxperformance.com/2006/12/18/circumventing-browser-connection-limits-for-fun-and-profit/">Circumventing browser connection limits for fun and profit</a></p>');
define('_WEBO_SPLASH2_HTACCESS', 'Verwenden .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', '<p>Die meisten von Gzip- und Cache-Optionen k&ouml;nnen fur Ihre Website-Konfiguration geschrieben werden (und vermeiden Sie zus&auml;tzliche Arbeit). Dies kann uber per <code>.htaccess</code> Datei werden (und Sie k&ouml;nnen sp&auml;ter geschnitten Optionen von dort aus und gehen Sie zu <code>httpd.cond</code> wenn es erforderlich ist).</p>
									<p><a href="http://httpd.apache.org/docs/2.0/mod/mod_deflate.html">mod_deflate</a>, <a href="http://httpd.apache.org/docs/2.2/mod/mod_filter.html">mod_filter</a>, <a href="http://httpd.apache.org/docs/1.3/mod/mod_mime.html">mod_mime</a>, <a href="http://httpd.apache.org/docs/2.0/mod/mod_headers.html">mod_headers</a>, <a href="http://httpd.apache.org/docs/2.0/mod/mod_expires.html">mod_expires</a>, <a href="http://httpd.apache.org/docs/1.3/mod/mod_setenvif.html">mod_setenvif</a>.</p>
									<p>M&ouml;gliche Optionen: ');
define('_WEBO_SPLASH2_FOOTER', 'Fu&szlig;zeile');
define('_WEBO_SPLASH2_FOOTER_INFO', '<p>Web Optimizer kann einen Link hinzuf&uuml;gen in Seinem Blog Fu&szlig;zeile zur&uuml;ck an den Web Optimizer Webseite. Den Link gibt es einen Text-Link, ein kleines Bild Link oder beides.</p>
									<p>Bitte unterst&uuml;tzen Web Optimizer indem diese.</p>');
define('_WEBO_SPLASH2_AUTOCHANGE', '&Auml;ndern /index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', '<p>Web Optimizer kann f&uuml;gen alle erforderlichen &Auml;nderungen (nur f&uuml;r <code>/index.php</code>) zu Ihrer Website auf Basis von ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', '.</p>
									<p>Anmerkung: dies kann dazu f&uuml;hren, dass einige Probleme aufgrund von Serverproblemen Fehlkonfiguration, werden vorsichtig mit dieser Option.</p>');
define('_WEBO_unobtrusive_on', 'Aktivieren Unaufdringliche JavaScript');
define('_WEBO_unobtrusive_body', 'Enthalten fusionierte JavaScript-Datei vor <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers', 'Bewegen JavaScript Windgets fordert vor <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters', 'Bewegen Sie fordert Z&auml;hler vor <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads', 'Bewegen Werbung (Kontext und Banner) fordert vor <code>&lt;/body&gt;</code>');
define('_WEBO_external_scripts_on', 'Aktivieren JavaScript Au&szlig;en- und Inline-Fusion');
define('_WEBO_external_scripts_head_end', 'Bewegen alle zusammengef&uuml;hrte Skripte von <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_css', 'Aktivieren CSS Au&szlig;en- und Inline-Fusion');
define('_WEBO_external_scripts_ignore_list', 'Exklusiv-Datei aus der Verschmelzung');
define('_WEBO_performance_mtime', 'Ignorieren Datei-&Auml;nderungsdatum Stempel (mtime)');
define('_WEBO_minify_javascript', 'Kombinieren JavaScript-Dateien');
define('_WEBO_minify_with', 'Minifizieren JavaScript-Dateien');
define('_WEBO_minify_with_jsmin', 'Minifizieren mit JSMin (von Douglas Crockford)');
define('_WEBO_minify_with_packer', 'Minifizieren mit Packer (von Dean Edwards)');
define('_WEBO_minify_with_yui', 'Minifizieren mit YUI Compressor (ben&ouml;tigt java)');
define('_WEBO_minify_css', 'Minifizieren und kombinieren CSS-Dateien');
define('_WEBO_minify_page', 'Minifizieren HTML (Leerzeichen entfernen)');
define('_WEBO_minify_html_comments', 'Entfernen HTML-Kommentare');
define('_WEBO_minify_html_one_string', 'Komprimieren HTML um eine Zeichenfolge (CPU-intensiv)');
define('_WEBO_gzip_javascript', 'Gzip JavaScript');
define('_WEBO_gzip_css', 'Gzip CSS');
define('_WEBO_gzip_page', 'Gzip HTML');
define('_WEBO_gzip_cookie', 'Prufen, ob gzip M&ouml;glichkeit mit Hilfe von Cookies');
define('_WEBO_far_future_expires_javascript', 'Cachen JavaScript');
define('_WEBO_far_future_expires_css', 'Cachen CSS');
define('_WEBO_far_future_expires_images', 'Cachen Bider (nur per <code>.htaccess</code>)');
define('_WEBO_far_future_expires_video', 'Cachen Video-Dateien (nur per <code>.htaccess</code>)');
define('_WEBO_far_future_expires_static', 'Cachen statische Verm&ouml;genswerte (nur per <code>.htaccess</code>)');
define('_WEBO_far_future_expires_html', 'Cachen HTML');
define('_WEBO_far_future_expires_html_timeout', 'Standard-Timeout-Cache HTML, in Sekunden');
define('_WEBO_html_cache_enabled', 'Cachen generierten HTML-Dateien');
define('_WEBO_html_cache_timeout', 'Standard-Timeout, in Sekunden');
define('_WEBO_html_cache_flush_only', 'Nur cachen ersten n Bytes des Inhalts (flush fr&uuml;hen)');
define('_WEBO_html_cache_flush_size', 'Flush-Inhalt-Gr&ouml;&szlig;e (in Bytes)');
define('_WEBO_html_cache_ignore_list', 'Liste der Teile von URLs zu ignorieren aus den Cache');
define('_WEBO_html_cache_allowed_list', 'Liste der USER AGENTS (Roboter) um in den Cache');
define('_WEBO_footer_text', 'Link hinzuf&uuml;gen aus Web Optimizer');
define('_WEBO_footer_image', 'F&uuml;gen einen Web Optimizer Bild');
define('_WEBO_data_uris_on', 'Anwenden <code>data:URI</code>');
define('_WEBO_data_uris_size', 'Maximale Bildgr&ouml;szlig;e (in Bytes)');
define('_WEBO_data_uris_smushit', 'Optimieren Sie alle CSS-Bilder &uuml;ber smush.it');
define('_WEBO_data_uris_ignore_list', 'Ausschlie&szlig;en von Dateien aus den <code>data:URI</code>');
define('_WEBO_css_sprites_enabled', 'Anwenden CSS Sprites');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Speichern Truecolor-Bilder als JPEG');
define('_WEBO_css_sprites_aggressive', '"Aggressiv" kombinieren Modus f&uuml;r CSS Sprites');
define('_WEBO_css_sprites_extra_space', 'F&uuml;gen Sie freien Speicherplatz f&uuml;r CSS Sprites');
define('_WEBO_css_sprites_no_ie6', 'Ausschliessen IE6 (per CSS-Hacks)');
define('_WEBO_css_sprites_memory_limited', 'Beschr&auml;nken Speichernutzung');
define('_WEBO_css_sprites_dimensions_limited', 'Ausschliessen Bilder mehr gegebene Zahl in einer Dimension');
define('_WEBO_css_sprites_ignore_list', 'Ausschlie&szlig;en von Dateien aus CSS Sprites');
define('_WEBO_parallel_enabled', 'Aktivieren mehrere Hosts');
define('_WEBO_parallel_check', 'Verf&uuml;gbarkeit pr&uuml;fen Gastgeber automatisch');
define('_WEBO_parallel_allowed_list', 'Erlaubt Hosts, d.h. img i1 i2');
define('_WEBO_htaccess_enabled', 'Aktivieren <code>.htaccess</code>');
define('_WEBO_htaccess_mod_deflate', 'Verwenden <code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_htaccess_mod_gzip', 'Verwenden <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_expires', 'Verwenden <code>mod_expires</code>');
define('_WEBO_htaccess_mod_headers', 'Verwenden <code>mod_headers</code>');
define('_WEBO_htaccess_mod_setenvif', 'Verwenden <code>mod_setenvif</code>');
define('_WEBO_htaccess_mod_mime', 'Verwenden <code>mod_mime</code>');
define('_WEBO_htaccess_mod_rewrite', 'Verwenden <code>mod_rewrite</code>');
define('_WEBO_htaccess_local', 'Place <code>.htaccess</code>-Datei lokal (nicht zu Dokument Stamm)');
define('_WEBO_htaccess_access', 'Sch&uuml;tzen Sie Web Optimizer Installation per <code>htpasswd</code>');
define('_WEBO_auto_rewrite_enabled', 'Aktivieren automatisch umschreiben');

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

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', 'Installation - Stufe 3');
define('_WEBO_SPLASH3_SAVED', 'Ihre Konfiguration Optionen wurden erfolgreich gespeichert.');
define('_WEBO_SPLASH3_REWRITE', 'Ihre Konfiguration wurde erfolgreich gespeichert');
define('_WEBO_SPLASH3_REWRITE_SHORT', 'Beschleunigung abgeschlossen');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Erforderliche &Auml;nderungen');
define('_WEBO_SPLASH3_TESTING_SHORT', 'Erprobung');
define('_WEBO_SPLASH3_SECURITY_SHORT', 'Mehr Sicherheit');
define('_WEBO_SPLASH3_ADDITIONAL_SHORT', 'Weitere Beschleunigung');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'Siene Webseite basiert auf ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ' wurde geflickt. Sie k&ouml;nnen <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">&uuml;berpr7uuml;fen das Ergebnis hier</a>.');
define('_WEBO_SPLASH3_WORKING', 'Es arbeitet. OK, was nun?');
define('_WEBO_SPLASH3_WORKING_REQUIRED', 'Erforderliche &Auml;nderungen f&uuml;r ');
define('_WEBO_SPLASH3_ADD', 'Nun <a href="#modify">sollten Sie das Web Optimizer Code</a> hinzuf&uuml;gen um Ihre eigenen PHP-Seiten (');
define('_WEBO_SPLASH3_ADD_', '). Dies wird viel einfacher, wenn Sie eine PHP-Datei, dass jede Seite in Ihrer Website dient haben. So m&uuml;ssen Sie nur ihm &auml;ndern.');
define('_WEBO_SPLASH3_MODIFY', 'So &auml;ndern Sie Ihre PHP-Datei(n) ');
define('_WEBO_SPLASH3_TOFILE', 'Um die Datei');
define('_WEBO_SPLASH3_TOFILE2', 'Um den Anfang der Datei');
define('_WEBO_SPLASH3_TOFILE3', 'Um das Ende der Datei');
define('_WEBO_SPLASH3_AFTERSTRING', 'nach dem String');
define('_WEBO_SPLASH3_ADD2', 'ansetzen Sie');
define('_WEBO_SPLASH3_TESTING', 'Nun zu einigen Tests...');
define('_WEBO_SPLASH3_NOTLIVE', 'Das ist alles, was Sie tun m&uuml;ssen. Wir empfehlen, diese Pr&uuml;fung auf einem nicht aktiven Webseite ersten. Und dann das Spiel mit den Optionen, um eine optimale Leistung zu erzielen. So &auml;ndern die Optionen k&ouml;nnen Sie:');
define('_WEBO_SPLASH3_MANUALLY', 'Manuell bearbeiten Sie die Datei <code>config.webo.php</code> hier: <code>');
define('_WEBO_SPLASH3_MANUALLY2', 'config.webo.php</code>');
define('_WEBO_SPLASH3_AGAIN', 'Und/oder nur <a href="');
define('_WEBO_SPLASH3_AGAIN2', '">laufen diese Installation noch einmal</a>. Es wird erinnern Ihre aktuellen Einstellungen.');
define('_WEBO_SPLASH3_SECURITY', 'Zus&auml;tzliche Sicherheit');
define('_WEBO_SPLASH3_ALTHOUGH', 'Obwohl das Paket einen Benutzernamen und ein Kennwort installiert, um auf das zu installieren, konnen Sie auch l&ouml;schen <code>');
define('_WEBO_SPLASH3_ALTHOUGH2', 'install.php</code> f&uuml;r zus&auml;tzliche Sicherheit.');
define('_WEBO_SPLASH3_FINISH', 'Installation abschlie&szlig;en');
define('_WEBO_SPLASH3_CANTWRITE', 'Es ist unm&ouml;glich Schreibzugriff auf das ');
define('_WEBO_SPLASH3_CANTWRITE2', ' angegebenes Verzeichnis. Bitte &uuml;berpr&uuml;fen Sie, dass das Verzeichnis existiert und schreibbar ist.');
define('_WEBO_SPLASH3_CANTWRITE3', 'Sie kann dies normalerweise vom FTP-Client tun. So navigieren in das Verzeichnis, das rechtes Klicken und suchen Sie nach einer Eigenschaft oder CHMOD Option.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Sobald Sie dies getan haben, aktualisieren diese Seite.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Bitte &uuml;berpr&uuml;fen Sie, dass die Wurzel Ihrer Website gelesen und beschrieben werden f&uuml;r Ihre Web-Server-Prozess.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', 'Stellen Sie CHMOD 775 oder CHMOD 777 f&&uml;r ihm, oder oder erstellen Sie lesbar und beschreibbar <code>.htaccess</code> hier, oder CHMOD aktuelle <code>.htaccess</code> auf 664 oder 777.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Bitte &uuml;berpr&uuml;fen Sie, dass die Wurzel Ihrer Website f&uuml;r Ihre Web-Server-Prozess beschreibbar ist oder es gibt eine beschreibbare Datei <code>.htaccess</code>.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Machen Sie CHMOD 775 oder CHMOD 777 f&uuml;r ihm, oder or erstellen die schreibbare Datei <code>.htaccess</code> hier, oder machen CHMOD f&uuml;r aktuelle <code>.htaccess</code> auf 664 oder 777.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'Bitte &uuml;berpr&uuml;fen Sie, dass Web-Optimizer installiert ist in');
define('_WEBO_SPLASH3_CONFSAVED', 'Ihre Konfiguration wurde gespeichert');
define('_WEBO_SPLASH3_CONFIGERROR', 'Kann die Konfigurationsdatei fur das Schreiben zu &ouml;ffnen. Bitte &auml;ndern Sie die Datei <code>config.webo.php</code>, um es beschreibbar ist.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'Sie kann dies normalerweise vom FTP-Client tun. So navigieren in das <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , das rechtes Klicken und suchen Sie nach einer Eigenschaft oder CHMOD Option. Setzen Sie ihm auf 775, 777, oder "schreibbar"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'Sobald Sie dies getan haben, aktualisieren diese Seite.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'Config-Datei gibt es nicht. Bitte laden Sie das vollst&auml;ndige Skript aus <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');
define('_WEBO_SPLASH3_ADDITIONAL', 'Optimale Performance-Einstellungen');
define('_WEBO_SPLASH3_ADDITIONAL_INFO', 'Sie k&oumllnnen weitere &Auml;nderungen an Ihrer Website gelten zu lassen, Web Optimizer effizienter zu arbeiten. Bitte pr&uuml;fen Sie folgendes:');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_1', '<strong>Machen Sie Ihre Webseite Standard-Beschwerde (HTML, JavaScript und CSS).</strong> Non-Standard externen Dateien Eingliederung f&uuml;ren zu falschen Web Optimizer Verhalten und ihre disconfiguration.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_2', '<strong>Verschieben Sie alle fur Ihre Webseite JavaScript- und CSS-Dateien auf den Abschnitt <code>head</code> erforderlichen.</strong> Damit kann Web Optimizer f&uuml;r die Verwaltung ihrer Fusion und Verkleinern.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_3', '<strong>F&uuml;gen Sie mehrere Hosts f&uuml;r Ihre Website.</strong> Sie m&uuml;ssen um die folgenden DNS-Datensatz <code>* IN A Ihre_Server_IP_Adresse</code> hinzuf&uuml;gen, dann f&uuml;gen approproate Subdomains (d. h. <code>i1</code> <code>i2</code> <code>i3</code> <code>i4</code>) in Ihrer Server-Konfiguration und installieren Web Optimizer noch einmal. Web Optimizer erkennt automatisch bereits vorhandene Hosts (wenn nicht bitte f&uuml;gen Sie sie manuell) und verteilt die Bilder durch sie.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_4', '<strong>Verschieben Sie alle Inline-CSS und JavaScript in externe Dateien.</strong> Zun&auml;chst es macht Umgang mit den Ver&auml;nderungen in Ihre Website Design / Verhalten leichter. Zweitens wird dies erm&ouml;glichen Web Optimizer zu fusionieren, verkleinern und cache alle Stile und Skripte, die auf Ihrer Website verwendet werden.');

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
?>