<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Contains all UA localization constants
 * Translated by Sergiy Andriychuk
 * new (=not translated) constants:
 _WEBO_LOGIN_UPGRADE
 _WEBO_LOGIN_UPGRADENOTICE
 _WEBO_LOGIN_UPGRADENOTICE2
 _WEBO_UPGRADE_SUCCESSFULL
 _WEBO_UPGRADE_UNABLE
 _WEBO_SPLASH1_EXPRESS
 _WEBO_unobtrusive_on
 _WEBO_external_scripts_on
 _WEBO_external_scripts_ignore_list
 _WEBO_minify_javascript
 _WEBO_minify_with_jsmin
 _WEBO_minify_with_packer
 _WEBO_minify_with_yui
 _WEBO_minify_page
 _WEBO_minify_css
 _WEBO_gzip_javascript
 _WEBO_gzip_css
 _WEBO_gzip_page
 _WEBO_far_future_expires_javascript
 _WEBO_far_future_expires_css
 _WEBO_far_future_expires_static
 _WEBO_footer_text
 _WEBO_footer_image
 _WEBO_cleanup_on
 _WEBO_data_uris_on
 _WEBO_css_sprites_enabled
 _WEBO_css_sprites_truecolor_in_jpeg
 _WEBO_css_sprites_aggressive
 _WEBO_css_sprites_extra_space
 _WEBO_css_sprites_ignore_list
 _WEBO_htaccess_enabled
 _WEBO_htaccess_mod_deflate
 _WEBO_htaccess_mod_gzip
 _WEBO_htaccess_mod_expires
 _WEBO_htaccess_mod_headers
 _WEBO_htaccess_mod_setenvif
 **/

/* general layout */
define('_WEBO_CHARSET, "windows-1251");
define('_WEBO_GENERAL_TITLE', '������������ ��� �����������');

/* error layout */
define('_WEBO_ERROR_TITLE', '���... � ��� ������� ��������');
define('_WEBO_ERROR_ERROR', '���� ���� �� ���!');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', '������ ���� ������������ ���');
define('_WEBO_LOGIN_INSTALLED', '��� ����� ����� ��� ����������� '.);
define('_WEBO_LOGIN_INSTALLED2', ' ��� ������������. ����-�����, ������ ��� ���� �� ������ ��� ������� �� ��� �����������:');
define('_WEBO_LOGIN_USERNAME', '����');
define('_WEBO_LOGIN_ENTERLOGIN', '������ ��� ����');
define('_WEBO_LOGIN_PASSWORD', '������');
define('_WEBO_LOGIN_ENTERPASSWORD', '������ ������');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', '��������');
define('_WEBO_LOGIN_UPGRADENOTICE', '�� ������ �������� ���� ������� ������ ��� ������������ (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') �� ����� ���������. ��� ����� ������� ��� ����� � ������ � ����� ���� � ������� ������ <strong>��������</strong>. ��� ����������� ����� ������������� �������� �� ������ <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_UPGRADE_SUCCESSFULL', '�� ������� ���������� �� ������ ');
define('_WEBO_UPGRADE_UNABLE', '�� ������� ��������� ��������� ������ �� �����������. ����������, ��������� ���������� ������� � ���������� � ������� �������������� curl.');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', '��� �������� ��� ����������, ����-�����, ������ ��� ���� �� ������ � ���� ���� �� �������� ������ <strong>��������</strong>.');
define('_WEBO_LOGIN_UNINSTALLME', '�������� ��� ����������');
define('_WEBO_LOGIN_FAILED', '������ �������� ���� ��(���) ������');
define('_WEBO_LOGIN_ACCESS', '�� ������� �������� ����� ������������� ������������');
define('_WEBO_LOGIN_LOGGED', '������ � �������');

/* Set login and password */
define('_WEBO_NEW_TITLE', '��������� - ��������� �������');
define('_WEBO_NEW_PROTECT', '��� ������������ ������� ��� ���������� ����������� ��� ����������� ��������� ���������� ������ �������.');
define('_WEBO_NEW_USERDATA', '��� ���� �� ������');
define('_WEBO_NEW_ENTER', '��������� ��� ���� �� ������');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', '��������');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', '������ �� ������������ ��� �����������. �� ������ ���������� ���� ����� � ����-���� ������, ���� ������� �� <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">������� ��� �����������</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', '�� ������ ��� ������ ���� ������ ��� ������� �� <a href="http://code.google.com/p/web-optimizator/">���� ��� �����������</a>, �� ����� ������ ���������<a href="http://code.google.com/p/web-optimizator/issues/list">����-�� �������� ���������</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', '����� ����� ����������� ����� �� <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">������ �����</a>.');
define('_WEBO_SPLASH1_TITLE', '��������� - ������ ����');
define('_WEBO_SPLASH1_WELCOME', '������� ������� �� ������������ ��� �����������!');
define('_WEBO_SPLASH1_PATH', '������������ ������');
define('_WEBO_SPLASH1_FULLPATH', '������ ���� �� ������ �����:');
define('_WEBO_SPLASH1_NOTICE', '����� ����� &mdash; �� ��������� �� ��������� �����, � ��� ����������� � ����� ��������� �� ���� HTML-�����. ���� �� �� ����쳺��, ��� �� ��� ����, ����� �������� ���� ���������� ����. ��� ����� ������ �������� ������ <strong>���...</strong>.');
define('_WEBO_SPLASH1_INCORRECT', '<strong>���� �������� ���� �������� ������</strong>, ����-�����, ������ ���������� ������.');
define('_WEBO_SPLASH1_NEXT', '���...');
define('_WEBO_SPLASH1_EXPRESS', '������� ���������');

/* Second splash -- set options */
define('_WEBO_SPLASH2_TITLE', '��������� - ������ ����');
define('_WEBO_SPLASH2_SAVED', '��������� ������������: ');
define('_WEBO_SPLASH2_OPTIONS', '������������ ��� �����������');
define('_WEBO_SPLASH2_CACHE', '�������� ���������');
define('_WEBO_SPLASH2_CACHE_JS', 'JavaScript-����� ������ ������������ �');
define('_WEBO_SPLASH2_CACHE_CSS', 'CSS-����� ������ ������������ �');
define('_WEBO_SPLASH2_INSTALLDIR', '��� ���������� ��������� �');
define('_WEBO_SPLASH2_DOCUMENTROOT', '���� ��������� �');
define('_WEBO_SPLASH2_SPACE', '����-������, ����� �����:');
define('_WEBO_SPLASH2_YES', '���:');
define('_WEBO_SPLASH2_NO', 'ͳ:');
define('_WEBO_SPLASH2_UNABLE', '��������� �������');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>����-�����, �������������, �� ����� ��������� ���� � ���� �������� � ����� �����.');
/* Web Optimizer options */
define('_WEBO_SPLASH2_JSLIB', 'JavaScript-�����');
define('_WEBO_SPLASH2_JSLIB_INFO', '���� ���� �볺������ ����� ����������� ��������� JavaScript-��������, � ���� ������ �� � ���� �������� ��� �����������.
									<br/><br/>��� ���������� ���������, �� ������ ����� ����� ����� ���� ����� ������������� ����. ����� ����������� ��� ������ � �������� ������ � ����� ����� � ������� �����������.');
define('_WEBO_SPLASH2_MINIFY', '������������ ���������');
define('_WEBO_SPLASH2_MINIFY_INFO', '��������� ������� �� CSS- � JavaScript-����� ������, �������� ����� �� ���� �������� �������.
									<br/>�� ����� ������ ������� ���� �� �������� ����������� �������� ��� ����������.');
define('_WEBO_SPLASH2_UNOBTRUSIVE', '&laquo;�����\'�������&raquo; JavaScript');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '&laquo;�����\'�����&raquo; JavaScript-����� ������������ ������ ���� ����, �� ������� ���� ���������� � ������� (�� ������� ���� ���������� DOM-������).
									<br/>���� ������������ ���� ������ �������� �������� ������������ ������� ��� ������� ������������. ��� � ������ �������� (��� ����������� ���������� ����������� JavaScript-�������) �� ���� ������� �������� �� ������������� ������ �����.
									<br/>������������� �������� �� ����� ����� � ������� ����� ���������� � �������� �볺������ �����.');
define('_WEBO_SPLASH2_EXTERNAL', '�������� ������ JavaScript-����� � ���������� ���');
define('_WEBO_SPLASH2_EXTERNAL_INFO', '��� ��������� ���� ����� �� JavaScript-�����, �� ������������ �� ������� �����, ��� ���� �� � ������ JavaScript-���, ���� ����������� � ������ <code>head</code> ������ ��\'����� � ���� ����, ������� � ����� � �������� ������ ���� CSS-�����.
									<br/>�� ���� �������� ������� ��� ����������� ������ ������� ������ � ����� �����, �� �� ������ ���� �������� � &laquo;�����\'��������&raquo; �����.
									<br/>�� ����� ������ ������� ����� �����, �� ������� ��������� �� �������� ��\'������� (���������, ga.js, jquery.min.js � �.�.).');
define('_WEBO_SPLASH2_GZIP', '������������ �����������');
define('_WEBO_SPLASH2_GZIP_INFO', '������������ <code>gzip</code>-��������� ��������� �� 80-85% �������� ����� ��������� �����.
									<br/>��� ������������ ����� ������������ ������������ <code>gzip</code>-��������� ��������� � ��������������� ���� ������� (��� ��������������� ������������ <code>.htaccess</code> �����).');
define('_WEBO_SPLASH2_EXPIRES', '&laquo;������&raquo; ���������');
define('_WEBO_SPLASH2_EXPIRES_INFO', '� ��������� ������ ���� ����� �� ��� ��������� ����� ������ ����� ��������� ���������, �� ���������� �������� �� ���������� ������� �� ������� ��� ������ � ���� � �����������.
									<br/>��� ��� JavaScript- ��� CSS-����� ����������� ������ ������������ �� ��� �������� ����, �� ��������� &laquo;�������&raquo; ��� � ���������. ��� ��������� �� ����� ��������� ����� ������������ ��������������� ���� ������� ��\'� ��� �� ��������');
define('_WEBO_SPLASH2_SPRITES', 'CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', '���� ��������� ��\'������� ������� ������� ��������� � CSS Sprites. �� ������ �������� ������� HTTP-������� ��� ����������� �����.
									<br/>�� ������ ������� ����������� ���� ��������� ����������. �� ����� ������ ������������� � ���� ���������� ����� ������������ CSS Sprites, ���� ������� � ���������� ����� CSS-������.
									<br/>����� � ��������� ������ ���� ���������, �� ������ �������� ��� �������� CSS Sprites (���������, logo.png, bg.gif � �.�.).');
define('_WEBO_SPLASH2_DATAURI', 'Data:URI');
define('_WEBO_SPLASH2_DATAURI_INFO', '����� � ��������� ��������� �� ����� ���������� � ������ <code>data:URI</code> (base64-������). ����� ����� ��� ����������� ������� ����� ���� ��������� ����� ���� HTTP-������ &mdash; �� ����� ������.
									<br/>�����: �� ������ �� ����������� ����� �������� (Internet Explorer �� 7 ���� �������). ����� ��� ��� ���������������� ��������� CSS-�������, �� ���������� ����������� ������� ����������. ����� ����� �������� CSS-����� ���� ������ ���������� (�� ������� ��������� � ����� ����� ������� ���������).');
define('_WEBO_SPLASH2_HTACCESS', '������������ .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', '������ ������� ����������� <code>gzip</code>-��������� � ��������� ������ ���� ������� � ���������������� ���� ������ ������� ��� ���������� ��������� ������ �� ������ ��������� �������. �� ���� ���� �������� �� ��������� ����� <code>.htaccess</code> (��� ����������� �� ������ ������ ��������� ��������� �� ������������ � ���� <code>httpd.cond</code>).
									<br/>������� �����: ');
define('_WEBO_SPLASH2_CLEANUP', '��������� �����');
define('_WEBO_SPLASH2_CLEANUP_INFO', '��� ������ JavaScript- ��� CSS-����� ��� ���������� ���� ����������� ���������� ��� ���� ��\'������� � ��������� �����. ��� ��������� ������ ����� ����� ������� �������� �� �����.
									<br/>��� ���� �� ������ ���� ���������������� ��� ������ ������� � ����� ����� ��� ����� ������ �����, �� ���� ��������� �� ����������� ��������� �������� �����, �� ��������� ����������� �� ������������� �����. � ���������� ������� �� ����� ����� �� ��������.');
define('_WEBO_SPLASH2_FOOTER', '������� ��� �����������');
define('_WEBO_SPLASH2_FOOTER_INFO', '��� ����������� ���� ������ ������ ����������� �� ���������� �� ���� �������. �� ���� ���� �� �������, ��� � ���������, � ����� � ��, � ����.
									<br/>��������� �� ����� �� ��������� �������������� ��� ����������� � ����.');
define('_WEBO_SPLASH2_AUTOCHANGE', '����������� ������� /index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', '��� ����������� ���� ����������� ������ ������ ���� � �������� ���� ������ �����, ���� ����������� ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' (���� ������ ���������� ����� ��� <code>/index.php</code>).
									<br/>�����: ��� ������ ������������ ��������� � ������������������ CMS �� ���� ��������� �� ��������������� �����.');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', '��������� - ����� ����');
define('_WEBO_SPLASH3_SAVED', '���� ������������ ���� ������ ��������.');
define('_WEBO_SPLASH3_REWRITE', '����������� ����� ��������� ������');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', '��� ����, ���� ����������� ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ', ��� ������ �����������. �� ������ <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">��������� ���������, �� ������</a>.');
define('_WEBO_SPLASH3_WORKING', '������� ��� ������. � ���?');
define('_WEBO_SPLASH3_ADD', '�� ������ ������ ������ ��� ����������� �� ����� ��������� �������. �� ���� ������ �������, ���� � ��� � 1 ����, ���� ��������� �� ���� �������, ����� ����� ��� ������� ���� ������ ����� ����.');
define('_WEBO_SPLASH3_MODIFY', '�� ������� ������ ��� ����');
define('_WEBO_SPLASH3_WP', '����������, �� �� ������� ���� <code>wp-blog-header.php</code> ������ �����, ���� ����������� Wordpress. (�� ����� �������: � ���������� ������� ������� ������������ ���� <code>index.php</code>). � ������ ����� ������� �� ������ �������� ���� �� ������ �����:');
define('_WEBO_SPLASH3_CODE', '�� ������ ������ ��� ��� ����������� <strong>�����</strong> ���� �������. ���� ������� ������ � ����� ���� ������� ��������:');
define('_WEBO_SPLASH3_FINALLY', 'ϳ��� ����� ������� ��������� ������ ��� ����������� ��������� ������ (� ������ ���� ���� �������):');
define('_WEBO_SPLASH3_TESTING', '����� ����� ����������...');
define('_WEBO_SPLASH3_NOTLIVE', '�������� � ��� ������ ������� ������ ��. �� ������ �������� ����-�� ���� � ������������ ��� ����������� (��� ����� �� ��������� �� ��������� ����) ��� ���������� ���������� �������������. ��� ������� ����������� �������:');
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
define('_WEBO_SPLASH3_CANTWRITE3', '�� ������ ������� �� ����� ����� ��� FTP-�볺��. ��� ����� ������� ������� � ���������, ����� � �� ���������� ��� �������� CHMOD 775.');
define('_WEBO_SPLASH3_CANTWRITE4', 'ϳ��� ����, �� �� ������� �� ��������, ����-�����, �������������� �������.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', '����-�����, ������������� � ����, �� �������� ����� ������ ����� �������� ��� ������� � ������ ��� ������ ���-�������.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', '��� ����� ��������� CHMOD 775, ��� ������� � ����� ���� <code>.htaccess</code>, ��������� ��� ������� � ������ ��� ������ ���-�������, ��� ��������� ������� � ����� ��� ��������� ����� <code>.htaccess</code> (CHMOD 664).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', '����-�����, �������������, �� �������� ����� ������ ����� �������� ��� ������ ��� ������ ���-������� ��� � �� ���� ��������� ��� ������ ���� <code>.htaccess</code>.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', '��������� ��� �������� CHMOD 775, ��� ������� � ����� ���� <code>.htaccess</code>, ��������� ��� ������ ��� ������ ���-�������, ��� ��������� ����� ��� ��������� ����� <code>.htaccess</code> (CHMOD 664).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', '����-�����, �������������, �� ��� ���������� ��� ��������������� �');
define('_WEBO_SPLASH3_CONFSAVED', '������������ ���������');
define('_WEBO_SPLASH3_CONFIGERROR', '��������� ������� ��� ������ ��������������� ����. ����-�����, ����� ����� ������� ��� ����� <code>config.webo.php</code> ��� �����������, ��� �� ��� ��������� ��� ������ ��� ������ ���-�������.');
define('_WEBO_SPLASH3_CONFIGERROR2', '�� ������ �� ������� �� ��������� ������ FTP-�볺���. ��� ����� ������ �������� � ��������� <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , ���� ������ �� ������������ ����� ��� ��������� CHMOD. ��������� � 775, ��� "write"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'ϳ��� ����, �� �� ������� �� ��������, ����-�����, �������������� �������.');
define('_WEBO_SPLASH3_CONFIGERROR5', '��������������� ���� �� ���������. ����-�����, ���������� ��� ���������� ������� �� ������� <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');

?>