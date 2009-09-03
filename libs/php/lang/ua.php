<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Contains all UA localization constants
 * Translated by Sergiy Andriychuk
 * http://crazyyy.net.ua/2009/07/ustanovka-web-optimizer.html
 **/

/* general layout */
define('_WEBO_CHARSET', "windows-1251");
define('_WEBO_GENERAL_TITLE', '������������ Web Optimizer');
define('_WEBO_GENERAL_FOOTER', '������ ���������!');

/* error layout */
define('_WEBO_ERROR_TITLE', '���... � ��� ������� ��������');
define('_WEBO_ERROR_ERROR', '���� ���� �� ���!');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', '������ ���� ������������ ���');
define('_WEBO_LOGIN_INSTALLED', '��� ����� ����� ��� ����������� ');
define('_WEBO_LOGIN_INSTALLED2', ' ��� ������������. ����-�����, ������ ��� ���� �� ������ ��� ������� �� ��� �����������:');
define('_WEBO_LOGIN_INSTALLED3', '. ��� ������� �� ��� ����������� �������� ������ <strong>���</strong>.');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>�����:</strong> �� ������� ������ ��������� ������ Web Optimizer. ����-�����, �������� �������� ���� ������� � ������ ���� ���-������� ��� �������� ��������� �� ���.');
define('_WEBO_LOGIN_EFFICIENCY', '��������� ���������� ��� ����� �������:<br/>������');
define('_WEBO_LOGIN_EFFICIENCY_KB', '��');
define('_WEBO_LOGIN_EFFICIENCY_S', '������');
define('_WEBO_LOGIN_USERNAME', '����');
define('_WEBO_LOGIN_ENTERLOGIN', '������ ��� ����');
define('_WEBO_LOGIN_PASSWORD', '������');
define('_WEBO_LOGIN_ENTERPASSWORD', '������ ������');
define('_WEBO_SPLAHS1_PROTECTED', '��������� �����');
define('_WEBO_SPLAHS1_PROTECTED2', 'Web Optimizer ������ ������ �� ���������� �������. �� ������ ����������� ���� �� ���.');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', '��������');
define('_WEBO_LOGIN_UPGRADENOTICE', '�� ������ �������� ���� ������� ����� Web Optimizer (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') �� �����������. ��� ����� ������ ��� ���� � ������ � ���� ���� � �������� ������ <strong>��������</strong>. Web Optimizer ���� ����������� ���������� �� ���� <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_UPGRADE_SUCCESSFULL', '�� ������ ���������� �� ���� ');
define('_WEBO_UPGRADE_UNABLE', '�� ������� ����������� ������� ����� � ����������. ����-�����, �������� �\'������� ������� � ���������� �� �������� ������������� curl.');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', '��� �������� Web Optimizer, ����-�����, ������ ��� ���� �� ������ � ���� ���� �� �������� ������ <strong>��������</strong>.');
define('_WEBO_LOGIN_UNINSTALL2', '��� ������ ����� Web Optimizer ���� ���� ����������. ��� ����� ���� ��������� ������ ��������.');
define('_WEBO_LOGIN_UNINSTALLME', '�������� Web Optimizer');
define('_WEBO_LOGIN_FAILED', '������ �������� ���� ��(���) ������');
define('_WEBO_LOGIN_ACCESS', '�� ������� �������� ����� ������������� ������������');
define('_WEBO_LOGIN_LOGGED', '������ � �������');
define('_WEBO_SPLASH1_CLEAR', '�������� ���');
define('_WEBO_SPLASH1_CLEAR_CACHE', '��� �������� ��� Web Optimizer, ����-�����, ������ ��� ���� � ������ �� �������� ������ <strong>�������� ���</strong>. ');
define('_WEBO_SPLASH1_CLEAR_CACHE2', '�� �������� ��ﳿ ��������� ����� ������ ������� � �������� ��� ���������.');
define('_WEBO_CLEAR_UNABLE', '�� �������� �������� ���� ����� � �������� ��� ���������');
define('_WEBO_CLEAR_SUCCESSFULL', '�� ����� ���� ������ ������� � ����');

/* Set login and password */
define('_WEBO_NEW_TITLE', '��������� - ��������� �������');
define('_WEBO_NEW_PROTECT', '<p>��� ������������ ������� ��� ���������� ����������� Web Optimizer ��������� ���������� ������ �������.</p>
							<p>����� ����������� ���������, ����-�����, �������������, �� ��������� <code>.htaccess</code>� ����� ���-�������, ��� ���������������, ������� �� ����� (��� ��������� ��������� Web Optimizer ����� ������� ������� ��ﳿ).</p>
							<p>Web Optimizer ���� ��������� ��������� ������� ��������� ������ ������� � �������� ��������� � ������������� �����. ��� ����� ��������� ������ <strong>&laquo;������ ���������&raquo;</strong>. � ���������� �� ������� ������ �� �������� ������������, �������������� ����� ���������.</p>
							<p>���� �� ������ ����������� ������������ Web Optimizer ���������, �� ��������� ������ <strong>&laquo;���&raquo;</strong>. �� ������� ��������� �� ������������ �� �� ������������ ��� ������ �����.</p>
							<p><a href="http://webo.in/articles/habrahabr/99-web-optimizer-installation-0.5/">������ ��������� Web Optimizer</a></p>');
define('_WEBO_NEW_USERDATA', '��� ���� �� ������');
define('_WEBO_NEW_ENTER', '��������� ��� ���� �� ������');
define('_WEBO_NEW_NOSCRIPT', '��� ���������� ������ � ����������� ��������� ���������� JavaScript!');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', '��������');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', '���������');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', '������ �� ������������ Web Optimizer. �� ������ ���������� ���� ����� � ����-���� ������, ���� ������� �� <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">������� Web Optimizer</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', '�� ������ ��� ������ ���� ������ ��� ������� �� <a href="http://code.google.com/p/web-optimizator/">���� Web Optimizer</a>, �� ����� ������ ���������<a href="http://code.google.com/p/web-optimizator/issues/list">����-�� �������� ���������</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', '����� ����� ����������� ����� �� <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">������ �����</a>.');
define('_WEBO_SPLASH1_NEXT', '���');
define('_WEBO_SPLASH1_BACK', '�����');
define('_WEBO_SPLASH1_EXPRESS', '������ ���������');

/* Second splash -- set options */
define('_WEBO_SPLASH2_TITLE', '��������� - ������ ����');
define('_WEBO_SPLASH2_OPTIONS', '������������ Web Optimizer');
define('_WEBO_SPLASH2_CACHE', '�������� ���������');
define('_WEBO_SPLASH2_CACHE_JS', 'JavaScript-����� ������ ������������ �');
define('_WEBO_SPLASH2_CACHE_CSS', 'CSS-����� ������ ������������ �');
define('_WEBO_SPLASH2_INSTALLDIR', 'Web Optimizer ��������� �');
define('_WEBO_SPLASH2_DOCUMENTROOT', '���� ��������� �');
define('_WEBO_SPLASH2_SPACE', '����-������, ����� �����:');
define('_WEBO_SPLASH2_YES', '���:');
define('_WEBO_SPLASH2_NO', 'ͳ:');
define('_WEBO_SPLASH2_UNABLE', '��������� �������');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>����-�����, �������������, �� ����� ��������� ���� � ���� �������� � ����� �����.');
/* Web Optimizer options */
define('_WEBO_SPLASH2_MINIFY', '��������� ���������');
define('_WEBO_SPLASH2_MINIFY_INFO', '<p>��������� ������� �� CSS- �� JavaScript-����� ������, �������� ����� �� ���� �������� �������.</p>
									<p>�� ����� ������ ������ ���� �� �������� ����������� �������� ��� ����������.</p>
									<p><a href="http://webo.in/articles/habrahabr/14-minifing-css/">��������� CSS-</a> �� <a href="http://webo.in/articles/habrahabr/11-minifing-javascript/">JavaScript-�����</a>.</p>');
define('_WEBO_SPLASH2_EXTERNAL', '�������� ������ �����');
define('_WEBO_SPLASH2_EXTERNAL_INFO', '<p>��� ��������� ���� ��������� �� JavaScript-�����, �� ������������ �� ������� �����, ��� ���� �� � ������ JavaScript-���, ���� ����������� � ������ <code>head</code>, ������ ��\'����� � ���� ����, ������� � ����� � �������� ������ ���� CSS-�����.</p>
									<p>�� ���� �������� �������� ��� ����������� ������ ������� ������ � ����� �����, �� �� ������ ���� �������� � &laquo;�����\'��������&raquo; �����.</p>
									<p>�� ����� ������ ������� ����� �����, �� ������� ��������� � �������� ��\'�������� (���������, ga.js jquery.min.js).</p>
									<p><a href="http://webo.in/articles/habrahabr/50-fast-fast-javascript/">������ ����������� ������������ JavaScript</a>.</p>');
define('_WEBO_SPLASH2_UNOBTRUSIVE', '&laquo;�����\'�������&raquo; JavaScript');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '<p>&laquo;�����\'�������&raquo; JavaScript-����� �������������� ������ ���� ����������� ������� � �������. ���� ������������ ���� ������ �������� �������� ������������ ������� ��� ������� ������������. ��� � ������ �������� �� ���� �������� ������������� �����.</p>
									<p>������������� �������� �� ��������� ����� � ������� ����� ���������� � �������� �볺������ �����.</p>
									<p>����� ���� ��������� ��������� �� ������� ������� JavaScript-����� ����� <code>&lt;/body&gt;</code>.</p>
									<p><a href="http://webo.in/articles/all/04-unobtrusive-javascript-operation-clean-up/">������ &laquo;�����\'��������&raquo; JavaScript</a>, <a href="http://webo.in/articles/habrahabr/44-unobtrusive-advertisements-basics/">&laquo;�����\'������&raquo; ������� � ���������</a>, <a href="http://webo.in/articles/habrahabr/56-non-blocking-javascript/">�������� ������</a> �� <a href="http://webo.in/articles/habrahabr/05-delayed-loading/">&laquo;���������&raquo; ������������</a>.</p>');
define('_WEBO_SPLASH2_MTIME', '�� ��������� �����������');
define('_WEBO_SPLASH2_MTIME_INFO', '<p>�� �������, Web Optimizer ��� ������� ����������� ������� ��������, �� �������� ����� (��� ���� �� �� ����), � �� ����� ���� ���������� ��� �� ���� �� ������� ������� �����, ��� ������� ���.</p>
									<p>� ����� ���� �������� ���������� ���� ���������� ���� �� ��������� ������� ����, �� �������� �����, � �������� �� ����� ���� ���� ���������� �����. �� ���������� ���� ��������� ��� ���� ��������� ��������� ��������� ����� Web Optimizer.</p>
									<p><a href="http://webo.in/articles/all/10-frontend-backend-balancing/">����� ������� ������, �� ������������, �� �������� ������������</a>.</p>');
define('_WEBO_SPLASH2_GZIP', '��������� ������������');
define('_WEBO_SPLASH2_GZIP_INFO', '<p>������������ <code>gzip</code>-��������� ��������� �� 80-85% �������� ����� ��������� �����.</p>
									<p>��� ������������ ����� ������������� ��������� <code>gzip</code>-��������� ��������� � ��������������� ���� ������� (��� ��������������� ��������� <code>.htaccess</code> �����).</p>
									<p><a href="http://webo.in/articles/habrahabr/30-gzip-versus-broadband/">������������</a> �� <a href="http://webo.in/articles/habrahabr/33-gzip-level-tool/">����������� gzip-���������</a>.</p>');
define('_WEBO_SPLASH2_EXPIRES', '�볺������ ���������');
define('_WEBO_SPLASH2_EXPIRES_INFO', '<p>� ��������� ������ ���� ��������� �� ��� ��������� ����� ������ ����� ��������� ���������, �� ��������� �������� �� ���������� ������� �� ������� ��� ������ � ���� � �����������.</p>
									<p>��� ��� JavaScript- ��� CSS-����� ����������� ������ ������������ �� ��� �������� ����, �� ��������� &laquo;�������&raquo; ��� � ���������. ��� ������� �� ����� ��������� ����� ������������� ��������������� ���� ������� ��\'� ��� �� ���.</p>
									<p><a href="http://webo.in/articles/all/http-caching/">��������� </a> �� <a href="http://webo.in/articles/habrahabr/15-yahoo-best-practices/#expires">���� �����������</a>.</p>');
define('_WEBO_SPLASH2_HTMLCACHE', '�������� ���������');
define('_WEBO_SPLASH2_HTMLCACHE_INFO', '<p>Web Optimizer ���� �������� ������� HTML-���, ��� ������� ������ ������� ������ �� ������ ������� � ������ ��� ��������� �������.</p>
									<p>�����: ��� �������� ���� ��������� ��� �����, �� ����������� �� ������ �������, ���� ����������. ������� ������� ������� ����������. ������������ �������� �� ���������, ����� ���� �� ������� ������� � ��������.</p>
									<p><a href="http://webo.in/articles/all/2009/16-content-flushing/">������ �������� ���������</a> �� <a href="http://webo.in/articles/habrahabr/34-streaming-chunking-finding-end/">�����</a>.</p>');
define('_WEBO_SPLASH2_SPRITES', 'CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', '<p>���� ��������� ��\'������ �������� ������� ��������� � CSS Sprites. �� ������ �������� ������� HTTP-������� ��� ����������� �����.</p>
									<p>�� ������ ������� ����������� ���� ��������� ����������. �� ����� ������ ������������� � ���� ���������� ����� ������������ CSS Sprites, ���� ������� � ���������� ����� CSS-������.</p>
									<p>����� ����� ������ ���� ���������, �� ������ �������� ��� �������� CSS Sprites (���������, logo.png bg.gif).</p>
									<p><a href="http://webo.in/articles/habrahabr/08-all-about-css-sprites/">������ CSS Sprites</a> �� <a href="http://webo.in/articles/habrahabr/89-css-sprites-2.0/">�� �������������</a>.</p>');
define('_WEBO_SPLASH2_DATAURI', 'Data:URI');
define('_WEBO_SPLASH2_DATAURI_INFO', '<p>����� � ��������� ��������� �� ����� ���������� � ������ <code>data:URI</code> (base64-���). ����� ����� ��� ����������� ������� ����� ���� ��������� ����� ���� HTTP-������ &mdash; �� ����� �����.</p>
									<p>�����: �� ������ �� ������������ ����� ��������� (Internet Explorer �� 7 ���� �������). ����� ��� ��� ���������������� ��������� CSS-�������, �� ���������� ����������� ������� ����������. ����� ����� �������� CSS-����� ���� ������ ���������� (�� ������� ��������� � ����� ����� ������� ���������).</p>
									<p><a href="http://webo.in/articles/habrahabr/29-all-about-data-url-images/">������ <code>data:URI</code></a> �� <a href="http://webo.in/articles/habrahabr/69-total-image-optimization/">���������� ���������</a>.</p>');
define('_WEBO_SPLASH2_PARALLEL', '������� �����');
define('_WEBO_SPLASH2_PARALLEL_INFO', '<p>��� ����������� ������� ����������� ������� � ������ �������� ������� ������ ������� ����� ��� ��������� ����� (���������), ��� �������� ����� ������� ����� ����������� �\'������ �� ��������.</p>
									<p>�����: ��� ������������ ������ ���� ��������� ��������� ������ � ��������������� ���� ������� ������� ��������� ��������� ��� ��������� �����, ���������: <code>i1.site.ru</code> <code>i2.site.ru</code> <code>i3.site.ru</code> <code>i4.site.ru</code>, &mdash; � ����� ����������� �� ���������� �������� � DNS (�� � ��������� ��� ��� ����� �� �� � IP-������).</p>
									<p>��� ���������� �������������� ��������, ����������, ���������, ��� ���������(-�) ����(�) ����������, ����� ����������� ������� �� ����� ����� ������ ����� ���������.</p>
									<p><a href="http://webo.in/articles/habrahabr/32-parallel-downloads-optimization/">������������ ����������� �����������</a>.</p>');
define('_WEBO_SPLASH2_HTACCESS', '������������ .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', '<p>������ ������� ����������� <code>gzip</code>-��������� � ��������� ������ ���� ������� � ���������������� ���� ������ ������� ��� ���������� ��������� ������ �� ������ ��������� �������. �� ���� ���� ���������� �� ��������� ����� <code>.htaccess</code> (��� ����������� �� ������ ����� ��������� ��������� �� ��������� � ���� <code>httpd.cond</code>).</p>
									<p><a href="http://webo.in/articles/all/mod-gzip-minify-on-fly/">������������ <code>mod_gzip</code></a>, <a href="http://webo.in/articles/all/2009/12-faster-and-cheaper-with-gzip/"><code>mod_deflate</code></a> �� <a href="http://webo.in/articles/habrahabr/07-gzip-all/"><code>mod_rewrite</code></a>.</p>
									<p>������� �����: ');
define('_WEBO_SPLASH2_FOOTER', '������� Web Optimizer');
define('_WEBO_SPLASH2_FOOTER_INFO', '��� ����������� ���� ������ ������ ����������� �� ���������� �� ���� �������. �� ���� ���� �� �������, ��� � ���������, � ����� � ��, � ����.
									<br/>��������� �� ����� �� ��������� �������������� Web Optimizer � ����.');
define('_WEBO_SPLASH2_AUTOCHANGE', '����������� ������� /index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', '��� ����������� ���� ����������� ������ ������ ���� � �������� ���� ������ �����, ���� ����������� ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' (���� ������ ���������� ����� ��� <code>/index.php</code>).
									<br/>�����: ��� ������ ������������ ��������� � ������������������ CMS �� ���� ��������� �� ��������������� �����.');
define('_WEBO_unobtrusive_on', '�������� &laquo;�����\'�������&raquo; JavaScript');
define('_WEBO_unobtrusive_body', '�������� ������ ��\'�������� JavaScript-����� ����� <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers', '��������� ������� JavaScript-��������� ����� <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters', '��������� ������� ��������� ����� <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads', '��������� ������� ������� (�������� � ������) ����� <code>&lt;/body&gt;</code>');
define('_WEBO_external_scripts_on', '�������� ��\'������� ������� �����');
define('_WEBO_external_scripts_head_end', '��������� ��������� ��\'�������� JavaScript-����� ����� <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_css', '�������� ��\'������� ������� CSS-�����');
define('_WEBO_external_scripts_ignore_list', '��������� � ��\'������� �����');
define('_WEBO_minify_javascript', '��\'������ JavaScript-�����');
define('_WEBO_dont_check_file_mtime_on', '�� ��������� ��� ���� �����');
define('_WEBO_minify_with', '̳�������� JavaScript-�����');
define('_WEBO_minify_with_jsmin', '̳�������� �� ��������� JSMin');
define('_WEBO_minify_with_packer', '̳�������� �� ��������� Packer');
define('_WEBO_minify_with_yui', '̳�������� �� ��������� YUI Compressor');
define('_WEBO_minify_css', '̳�������� � ��\'������ CSS-�����');
define('_WEBO_minify_page', '̳�������� HTML');
define('_WEBO_minify_html_comments', '�������� HTML-��������');
define('_WEBO_minify_html_one_string', '�������� HTML �� 1 �����');
define('_WEBO_gzip_javascript', '����������� <code>gzip</code> ��� JavaScript');
define('_WEBO_gzip_css', '����������� <code>gzip</code> ��� CSS');
define('_WEBO_gzip_page', '����������� <code>gzip</code> ��� HTML');
define('_WEBO_gzip_cookie', '��������� ��������� <code>gzip</code> ����� cookie');
define('_WEBO_far_future_expires_javascript', '�������� JavaScript');
define('_WEBO_far_future_expires_css', '�������� CSS');
define('_WEBO_far_future_expires_images', '�������� ����������');
define('_WEBO_far_future_expires_video', '�������� �����-�����');
define('_WEBO_far_future_expires_static', '�������� ������� �����');
define('_WEBO_far_future_expires_html', '�������� HTML');
define('_WEBO_far_future_expires_html_timeout', '��� �볺�������� ���� ��� HTML-�����');
define('_WEBO_html_cache_enabled', '�������� ������� HTML-�����');
define('_WEBO_html_cache_timeout', '����� 䳿 ���� � ��������');
define('_WEBO_html_cache_flush_only', '�������� ����� ������ �������� ������� ���������');
define('_WEBO_html_cache_flush_size', '����� ������� ���������, �� ��������� (� ������)');
define('_WEBO_html_cache_ignore_list', '������ ������ URL ��� ���������� ��� ��������');
define('_WEBO_html_cache_allowed_list', '������ ������ USER AGENTS (������) ��� ��������� ��� ��������');
define('_WEBO_footer_text', '������ ��������� �� Web Optimizer');
define('_WEBO_footer_image', '������ ���������� Web Optimizer');
define('_WEBO_data_uris_on', '����������� <code>data:URI</code>');
define('_WEBO_data_uris_smushit', '����������� �� CSS-���������� ����� smush.it');
define('_WEBO_css_sprites_enabled', '����������� CSS Sprites');
define('_WEBO_css_sprites_truecolor_in_jpeg', '�������� ������������� ���������� � JPEG');
define('_WEBO_css_sprites_aggressive', '&laquo;����������&raquo; ����� ��������� CSS Sprites');
define('_WEBO_css_sprites_extra_space', '������ ����� ���� � CSS Sprites');
define('_WEBO_css_sprites_no_ie6', '��������� IE6 (����� CSS-����)');
define('_WEBO_css_sprites_memory_limited', '�������� ������������ ���\'�� ��� PHP-�������');
define('_WEBO_css_sprites_dimensions_limited', '��������� �����������, ���� �� �������� ������ ������ ���������');
define('_WEBO_css_sprites_ignore_list', '��������� �� CSS Sprites �����');
define('_WEBO_parallel_enabled', '�������� ��������� �����, ���������, i1 i2');
define('_WEBO_parallel_check', '����������� ��������� ���������� �����');
define('_WEBO_parallel_allowed_list', '������� �����');
define('_WEBO_htaccess_enabled', '�������� <code>.htaccess</code>');
define('_WEBO_htaccess_mod_deflate', '��������������� <code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_htaccess_mod_gzip', '��������������� <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_expires', '��������������� <code>mod_expires</code>');
define('_WEBO_htaccess_mod_headers', '��������������� <code>mod_headers</code>');
define('_WEBO_htaccess_mod_setenvif', '��������������� <code>mod_setenvif</code>');
define('_WEBO_htaccess_mod_mime', '��������������� <code>mod_mime</code>');
define('_WEBO_htaccess_mod_rewrite', '��������������� <code>mod_rewrite</code>');
define('_WEBO_htaccess_local', '��������� <code>.htaccess</code> � �������� (�� ��������) ��������');
define('_WEBO_htaccess_access', '��������� ��������� Web Optimizer �� ��������� <code>htpasswd</code>');
define('_WEBO_auto_rewrite_enabled', '�\������� ����-�����');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', '��������� - ����� ����');
define('_WEBO_SPLASH3_SAVED', '���� ������������ ���� ������ ��������.');
define('_WEBO_SPLASH3_REWRITE', '����������� ����� ��������� ������');
define('_WEBO_SPLASH3_REWRITE_SHORT', '����������� ����� ���������');
define('_WEBO_SPLASH3_MODIFY_SHORT', '�������� ����');
define('_WEBO_SPLASH3_TESTING_SHORT', '����������');
define('_WEBO_SPLASH3_SECURITY_SHORT', '�������');
define('_WEBO_SPLASH3_ADDITIONAL_SHORT', '��������� �����������');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', '��� ����, ���� ����������� ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ', ��� ������ �����������. �� ������ <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">��������� ���������, ���� ������</a>.');
define('_WEBO_SPLASH3_WORKING', '������� ��� ������. � ���?');
define('_WEBO_SPLASH3_ADD', '�� ������ <a href="#modify">������ ������ Web Optimizer</a> �� ����� ��������� ������� (');
define('_WEBO_SPLASH3_ADD_', '). �� ���� ������ �������, ���� � ��� � 1 ����, ���� ��������� �� ���� �������, ����� ����� ��� ������� ���� ������ ����� ����.');
define('_WEBO_SPLASH3_MODIFY', '�� ������� ������ ��� ����');
define('_WEBO_SPLASH3_TOFILE', '� ����');
define('_WEBO_SPLASH3_TOFILE2', '�� ������� �����');
define('_WEBO_SPLASH3_TOFILE3', '�� ����� �����');
define('_WEBO_SPLASH3_AFTERSTRING', '���� �����');
define('_WEBO_SPLASH3_ADD2', '������');
define('_WEBO_SPLASH3_TESTING', '����� ����� ����������...');
define('_WEBO_SPLASH3_NOTLIVE', '�������� � ��� ������ ������� ������ ��. �� ������ �������� ����-�� ���� � ������������ Web Optimizer (��� ����� �� ��������� �� ��������� ����) ��� ���������� ���������� �������������. ��� ������� ����������� �������:');
define('_WEBO_SPLASH3_MANUALLY', '������ ������ ���� <code>config.webo.php</code>, ���� ����������� �� ��� ������:<code>');
define('_WEBO_SPLASH3_MANUALLY2', 'config.webo.php</code>');
define('_WEBO_SPLASH3_AGAIN', '� <a href="');
define('_WEBO_SPLASH3_AGAIN2', '">��������� ��������� ��������</a>. �� ��� ����� ������ ����������� ����������,�������� �� ��������.');
define('_WEBO_SPLASH3_SECURITY', '��������� �������');
define('_WEBO_SPLASH3_ALTHOUGH', '���� �� ��� ������������ � �������������� ��������������� ���� �� ������, �� ������ �������� <code>');
define('_WEBO_SPLASH3_ALTHOUGH2', 'install.php</code> ��� ������������ ��������� ������� ������ �����.');
define('_WEBO_SPLASH3_FINISH', '�������� ���������');
define('_WEBO_SPLASH3_CANTWRITE', '�� ������� �������� � ������� ���� ��������� ');
define('_WEBO_SPLASH3_CANTWRITE2', '. ����-�����, �������� ��������� ���� �������� � ������ �� �� �����.');
define('_WEBO_SPLASH3_CANTWRITE3', '�� ������ ������� �� ����� ����� ��� FTP-�볺��. ��� ����� ������� ������� � ���������, ����� � �� ���������� ��� �������� CHMOD 775 a�� CHMOD 777.');
define('_WEBO_SPLASH3_CANTWRITE4', 'ϳ��� ����, �� �� ������� �� ��������, ����-�����, �������������� �������.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', '����-�����, ������������� � ����, �� �������� ����� ������ ����� �������� ��� ������� � ������ ��� ������ ���-�������.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', '��� ����� ��������� CHMOD 775, a�� CHMOD 777, ��� ������� � ����� ���� <code>.htaccess</code>, ��������� ��� ������� � ������ ��� ������ ���-�������, ��� ��������� ������� � ����� ��� ��������� ����� <code>.htaccess</code> (CHMOD 664).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', '����-�����, �������������, �� �������� ����� ������ ����� �������� ��� ������ ��� ������ ���-������� ��� � �� ���� ��������� ��� ������ ���� <code>.htaccess</code>.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', '��������� ��� �������� CHMOD 775 a�� CHMOD 777, ��� ������� � ����� ���� <code>.htaccess</code>, ��������� ��� ������ ��� ������ ���-�������, ��� ��������� ����� ��� ��������� ����� <code>.htaccess</code> (CHMOD 664 a�� CHMOD 777).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', '����-�����, �������������, �� Web Optimizer ��� ��������������� �');
define('_WEBO_SPLASH3_CONFSAVED', '������������ ���������');
define('_WEBO_SPLASH3_CONFIGERROR', '��������� ������� ��� ������ ��������������� ����. ����-�����, ����� ����� ������� ��� ����� <code>config.webo.php</code> Web Optimizer, ��� �� ��� ��������� ��� ������ ��� ������ ���-�������.');
define('_WEBO_SPLASH3_CONFIGERROR2', '�� ������ �� ������� �� ��������� ������ FTP-�볺���. ��� ����� ������ �������� � ��������� <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , ���� ������ �� ������������ ����� ��� ��������� CHMOD. ��������� � 775 ��� 777, ��� "write"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'ϳ��� ����, �� �� ������� �� ��������, ����-�����, �������������� �������.');
define('_WEBO_SPLASH3_CONFIGERROR5', '��������������� ���� �� ���������. ����-�����, ���������� Web Optimizer ������� �� ������� <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');
define('_WEBO_SPLASH3_ADDITIONAL', '����������� ���������� ������䳿');
define('_WEBO_SPLASH3_ADDITIONAL_INFO', '�� ������ �������� �������� ���� �� ������ ����, �� ��������� ��������������� Web Optimizer ���� ���������. �� ����� ����� ��� ����� �������:');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_1', '<strong>�������� ��� ���� ��������������� ������������� (HTML, JavaScript � CSS).</strong> ������������� ������ ������ � ������������ ��� �������� � ���������� ���� ������� � ����������� ���������������� Web Optimizer.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_2', '<strong>������� �� JavaScript- � CSS-�����, �������� ��� ������������ �����, � <code>head</code>-������ �������.</strong> �� ��������� Web Optimizer ��������� �� ��\'�������� � ����������.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_3', '<strong>ϳ�������� ������� ����� ��� ������ �����.</strong> ��� ����� � DNS ��������� ������� <code>* IN A IP_������_������_�������</code>, ��������� ������� �������� (���������, <code>i1</code> <code>i2</code> <code>i3</code> <code>i4</code>) � �������� ��������� ��������. Web Optimizer ��������� ������� ������� ����� � ���������� ����������� �� ����.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_4', '<strong>������� �� ���� � �������, �������� ����� � ��� �������, � ������ �����.</strong> ��-�����, �� ��������� ��� ������� ��������� ������ �� ������ ����. ��-�����, �� ��������� Web Optimizer ��\'������, ��������� �� ���������� ���� ��\'�� ����������� ����, ���� �������� ��� ����������� �������������� ������ �����.');

/* System check info on the first screen */
define('_WEBO_SYSTEM_CHECK', '��������� ������������ �������...');
define('_WEBO_SYSTEM_CHECK_ENABLED', '����');
define('_WEBO_SYSTEM_CHECK_DISABLED', '���');
define('_WEBO_SYSTEM_CHECK_WRITABLE', '��������');
define('_WEBO_SYSTEM_CHECK_RESTRICTED', '���������');
define('_WEBO_SYSTEM_CHECK_SYSTEM_INFO', '������������ �������');
define('_WEBO_SYSTEM_CHECK_VIA_JSMIN', '����� JSMin');
define('_WEBO_SYSTEM_CHECK_VIA_YUI', '����� YUI Compressor');
define('_WEBO_SYSTEM_CHECK_VIA_CSSTIDY', '����� CSS Tidy');
define('_WEBO_SYSTEM_CHECK_VIA_PHP', '����� PHP');
define('_WEBO_SYSTEM_CHECK_VIA_HTACCESS', '����� <code>.htaccess</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_SUPPORT', '��������� <code>.htaccess</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS', '������ � <code>.htaccess</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_REWRITE', '<code>mod_rewrite</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_GZIP', '<code>mod_gzip</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_DEFLATE', '<code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_EXPIRES', '<code>mod_expires</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_HEADERS', '<code>mod_headers</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_MIME', '<code>mod_mime</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_SETENVIF', '<code>mod_setenvif</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_PROTECTED', '����������� ������� ��� ���������');
define('_WEBO_SYSTEM_CHECK_CSS_DIRECTORY', '������ � CSS-����������');
define('_WEBO_SYSTEM_CHECK_JAVASCRIPT_DIRECTORY', '������ � JavaScript-����������');
define('_WEBO_SYSTEM_CHECK_HTML_DIRECTORY', '������ � HTML-����������');
define('_WEBO_SYSTEM_CHECK_INDEX', '������ � ���� <code>/index.php</code>');
define('_WEBO_SYSTEM_CHECK_CONFIG', '������ � ���������������� ����');
define('_WEBO_SYSTEM_CHECK_GZIP', '<code>gzip</code> &laquo;�� ����&raquo;');
define('_WEBO_SYSTEM_CHECK_GZIP_STATIC', '��������� ������������ <code>gzip</code>');
define('_WEBO_SYSTEM_CHECK_CACHE', '���������� �����������');
define('_WEBO_SYSTEM_CHECK_CSS_SPRITES', '��������� CSS Sprites');
define('_WEBO_SYSTEM_CHECK_CSS_MINIFY', '����������� CSS');
define('_WEBO_SYSTEM_CHECK_JS_MINIFY', '����������� JS');
define('_WEBO_SYSTEM_CHECK_EXTERNAL', '������ �� ������� ������');
define('_WEBO_SYSTEM_CHECK_HOSTS', '������������� �����');
define('_WEBO_SYSTEM_CHECK_CMS', '���������� ��������� �������');
?>