<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Contains all RU localization constants
 *
 **/

/* general layout */
define('_WEBO_CHARSET', 'windows-1251');
define('_WEBO_GENERAL_TITLE', 'Настройка Web Optimizer');
define('_WEBO_GENERAL_FOOTER', 'Быстрее молнии!');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Хмм... у нас возникла проблема');
define('_WEBO_ERROR_ERROR', 'Упс! Что-то не так');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Авторизация');
define('_WEBO_LOGIN_INSTALLED', 'Для этого сайта уже установлен Web Optimizer ');
define('_WEBO_LOGIN_INSTALLED2', '. Пожалуйста, введите ваш логин и пароль для доступа ко всем настройкам и нажмите кнопку <strong>Далее</strong>.');
define('_WEBO_LOGIN_INSTALLED3', '. Для доступа ко всем настройкам нажмите кнопку <strong>Далее</strong>.');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>Внимание:</strong> не удается найти результат работы Web Optimizer. Пожалуйста, проверьте наличие его вызовов в исходных файлах вашей веб-системы или проведите установку еще раз.');
define('_WEBO_LOGIN_EFFICIENCY', 'Результат оптимизации при показе страницы:<br/>выигрыш');
define('_WEBO_LOGIN_EFFICIENCY_KB', 'Кб');
define('_WEBO_LOGIN_EFFICIENCY_S', 'секунды');
define('_WEBO_LOGIN_USERNAME', 'Логин');
define('_WEBO_LOGIN_ENTERLOGIN', 'Введите ваш логин');
define('_WEBO_LOGIN_PASSWORD', 'Пароль');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Введите пароль');
define('_WEBO_SPLAHS1_PROTECTED', 'Защищенный режим');
define('_WEBO_SPLAHS1_PROTECTED2', 'Web Optimizer надежно защищен от внешнего доступа. Вы можете настроить его еще раз.');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Обновить');
define('_WEBO_LOGIN_UPGRADENOTICE', 'Вы можете обновить вашу текущую версию Web Optimizer (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') до самой последней. Для этого введите ваш логин и пароль и нажмите кнопку <strong>Обновить</strong>. Web Optimizer будет автоматически обновлен до версии <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_LOGIN_UPGRADENOTICE4', ') до самой последней версии <strong>');
define('_WEBO_UPGRADE_SUCCESSFULL', 'Вы успешно обновились до версии ');
define('_WEBO_UPGRADE_UNABLE', 'Не удается загрузить последнюю версию из репозитория. Пожалуйста, проверьте соединение сервера с интернетом и наличие установленного curl.');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', 'Чтобы удалить Web Optimizer, пожалуйста, введите ваш логин и пароль и нажмите кнопку <strong>Удалить</strong>.');
define('_WEBO_LOGIN_UNINSTALL2', 'Web Optimizer может быть отключен для вашего сайта. Для этого его нужно просто удалить.');
define('_WEBO_LOGIN_UNINSTALLME', 'Удалить Web Optimizer');
define('_WEBO_LOGIN_FAILED', 'Неверно введен логин и(ли) пароль');
define('_WEBO_LOGIN_ACCESS', 'Эта страница доступна только авторизованным пользователям');
define('_WEBO_LOGIN_LOGGED', 'Вошли в систему');
define('_WEBO_SPLASH1_CLEAR', 'Очистить кэш');
define('_WEBO_SPLASH1_CLEAR_CACHE', 'Чтобы очистить кэш Web Optimizer, пожалуйста, введите ваш логин и пароль и нажмите кнопку <strong>Очистить кэш</strong>. ');
define('_WEBO_SPLASH1_CLEAR_CACHE2', 'Все сохраненные копии созданных файлов будут удалены из кэширующей директории.');
define('_WEBO_CLEAR_UNABLE', 'Не получается удалить некоторые файлы из кэширующих директорий');
define('_WEBO_CLEAR_SUCCESSFULL', 'Все файлы были успешно удалены из кэша');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Установка - ограничение доступа');
define('_WEBO_NEW_PROTECT', '<p>Для обеспечения безопасности при дальнейшем использовании Web Optimizer необходимо установить пароль доступа.</p>
							<p>Перед проведением установки, пожалуйста, убедитесь, что корневой <code>.htaccess</code> и файлы используемой веб-системы доступны на запись (при проведении Web Optimizer также создает резерные копии).</p>
							<p>Web Optimizer может самостоятельно проверить доступные возможности вашего сервера и провести установку в автоматическом режиме. Для этого нужно выбрать <strong>&laquo;Быстрая установка&raquo;</strong>. В дальнейшем вы сможете изменить все сохраненные настройки, используя текущий интерфейс.</p>
							<p>Если вы хотите настроить использование Web Optimizer самостоятельно, то нужно выбрать <strong>&laquo;Далее&raquo;</strong>. Вы сможете проверить все настройки до их применения для вашего сайта.</p>
							<p><a href="http://webo.in/articles/habrahabr/99-web-optimizer-installation-0.5/">Процесс установки Web Optimizer</a></p>');
define('_WEBO_NEW_USERDATA', 'Ваш логин и пароль');
define('_WEBO_NEW_ENTER', 'Установите ваш логин и пароль');
define('_WEBO_NEW_NOSCRIPT', 'Для корректной работы с приложением требуется включенный JavaScript!');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Удалить');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'Удаление');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Спасибо за использование Web Optimizer. Вы можете в любой момент установить его снова просто зайдя на <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">страницу Веб Оптиизатора</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Мы будем рады видеть отзывы о системе на <a href="http://code.google.com/p/web-optimizator/">сайте Web Optimizer</a>, вы также можете отправить <a href="http://code.google.com/p/web-optimizator/issues/list">любые проблемные вопросы</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Теперь можно вернуться обратно к <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">вашему сайту</a>.');
define('_WEBO_SPLASH1_NEXT', 'Далее');
define('_WEBO_SPLASH1_BACK', 'Назад');
define('_WEBO_SPLASH1_EXPRESS', 'Быстрая установка');

/* Change password */
define('_WEBO_PASSWORD_TITLE', 'Смена пароля');
define('_WEBO_PASSWORD_INSTALLED', 'Для данного сайта уже установлен Web Optimizer. Вы можете сменить пароль доступа к его функциям администрирования: Изменения настроек, Удаление файлов из кэша, Обновления, Отключения и Удаления.');
define('_WEBO_PASSWORD_OLD', 'Старый пароль');
define('_WEBO_PASSWORD_ENTERPASSWORD', 'Введите старый пароль');
define('_WEBO_PASSWORD_NEW', 'Новый пароль');
define('_WEBO_PASSWORD_ENTERPASSWORDNEW', 'Введите новый пароль');
define('_WEBO_PASSWORD_CONFIRM', 'Подтверждение пароля');
define('_WEBO_PASSWORD_ENTERPASSWORDCONFIRM', 'Введите подтверждение для нового пароля');
define('_WEBO_SPLASH1_SAVE', 'Сохранить');
define('_WEBO_PASSWORD_DIFFERENT', 'Новый пароль и его подтверждение не совпадают');
define('_WEBO_PASSWORD_EMPTY', 'Новый пароль не задан!');
define('_WEBO_PASSWORD_SUCCESSFULL', 'Пароль успешно обновлен');

/* Second splash -- set options */
define('_WEBO_SPLASH2_TITLE', 'Установка - шаг второй');
define('_WEBO_SPLASH2_OPTIONS', 'Настройки Web Optimizer');
define('_WEBO_SPLASH2_CACHE', 'Директории кэширования');
define('_WEBO_SPLASH2_CACHE_JS', 'JavaScript-файлы будут располагаться в');
define('_WEBO_SPLASH2_CACHE_CSS', 'CSS-файлы будут располагаться в');
define('_WEBO_SPLASH2_CACHE_HTML', 'HTML-файлы будут располагаться в');
define('_WEBO_SPLASH2_INSTALLDIR', 'Web Optimizer расположен в');
define('_WEBO_SPLASH2_DOCUMENTROOT', 'Сайт расположен в');
define('_WEBO_SPLASH2_SPACE', 'Пожалуйста, через пробел:');
define('_WEBO_SPLASH2_YES', 'Да:');
define('_WEBO_SPLASH2_NO', 'Нет:');
define('_WEBO_SPLASH2_UNABLE', 'Невозможно открыть');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>Пожалуйста, убедитесь, что такая директория существует и она располагается в корне сайта.');
/* Web Optimizer options */
define('_WEBO_SPLASH2_MINIFY', 'Настройки сжатия');
define('_WEBO_SPLASH2_MINIFY_INFO', '<p>Сжатие удаляет из CSS- и JavaScript-файлов пробелы, переводы строк и другие ненужные символы.</p>
									<p>Вы также можете выбрать один из нескольких инструментов минимизации или обфускации.</p>
									<p><a href="http://webo.in/articles/habrahabr/14-minifing-css/">Сжатие CSS-</a> и <a href="http://webo.in/articles/habrahabr/11-minifing-javascript/">JavaScript-файлов</a>.</p>');
define('_WEBO_SPLASH2_EXTERNAL', 'Включить внешние файлы');
define('_WEBO_SPLASH2_EXTERNAL_INFO', '<p>При активации этой настройки все JavaScript-файлы, подключаемые с внешних сайтов, равно как и просто JavaScript-код, находящийся в секции <code>head</code>, будут объединены в один файл, уменьшены в размеры и подключены сразу после CSS-файла.</p>
									<p>Это будет особенно полезно при использовании большого числа модулей с разных сайтов, которые не могут быть подключены в &laquo;ненавязчивом&raquo; режиме.</p>
									<p>Вы также можете указать имена файлов, которые нужно исключить из подобного объединения (например, ga.js jquery.min.js).</p>
									<p><a href="http://webo.in/articles/habrahabr/50-fast-fast-javascript/">Методы ускорения загрузки JavaScript</a>.</p>');
define('_WEBO_SPLASH2_UNOBTRUSIVE', '&laquo;Ненавязчивый&raquo; JavaScript');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '<p>&laquo;Ненавязчивые&raquo; JavaScript-файлы загружаются сразу после того, как страница отобразиться в браузере. Их использование может значительно увеличить скорость загрузки страницы для конечных пользователей. Но в некоторых случаях это может нарушить работоспособность сайта.</p>
									<p>Рекомендуется включать эту настройку только в случае полной уверенности в существующей клиентской логики.</p>
									<p>Также возможно перенести все вызовы внешних JavaScript-файлов перед <code>&lt;/body&gt;</code>.</p>
									<p><a href="http://webo.in/articles/all/04-unobtrusive-javascript-operation-clean-up/">Техника &laquo;ненавязчивого&raquo; JavaScript</a>, <a href="http://webo.in/articles/habrahabr/44-unobtrusive-advertisements-basics/">&laquo;ненавязчивая&raquo; реклама и счетчики</a>, <a href="http://webo.in/articles/habrahabr/56-non-blocking-javascript/">блокирующие скрипты</a> и <a href="http://webo.in/articles/habrahabr/05-delayed-loading/">&laquo;отложенная&raquo; загрузка</a>.</p>');
define('_WEBO_SPLASH2_MTIME', 'Не проверять актуальность');
define('_WEBO_SPLASH2_MTIME_INFO', '<p>Обычно Web Optimizer при каждой загрузке страницы проверяет, изменились ли файлы (какое у них время изменение и какое в них содержание), и на основе этой информации либо дает ссылки на существующие статические файлы, либо создает новые.</p>
									<p>С точки зрения серверной оптимизации лучше не проверять каждый раз, изменились ли файлы, а удалять по факту самого изменения закэшированную версии. С включением этой настройки вам будет необходимо самостоятельно управлять кэшем Web Optimizer.</p>
									<p><a href="http://webo.in/articles/all/10-frontend-backend-balancing/">Влияние числа подключаемых файлов на скорость загрузки</a>.</p>');
define('_WEBO_SPLASH2_GZIP', 'Настройки архивирования');
define('_WEBO_SPLASH2_GZIP_INFO', '<p>Применение <code>gzip</code>-сжатия позволяет на 80-85% уменьшить размер текстовых файлов.</p>
									<p>Для нагруженных сайтов рекомендуется настройки <code>gzip</code>-сжатия перенести в конфигурационный файл сервера (или использовать настройки <code>.htaccess</code> ниже).</p>
									<p><a href="http://webo.in/articles/habrahabr/30-gzip-versus-broadband/">Ресурсоемкость</a> и <a href="http://webo.in/articles/habrahabr/33-gzip-level-tool/">эффективность gzip-сжатия</a>.</p>');
define('_WEBO_SPLASH2_EXPIRES', 'Клиентское кэширование');
define('_WEBO_SPLASH2_EXPIRES_INFO', '<p>В результате работы этой настройки ко всем статическим файлам будут добавлены заголовки кэширования, позволяющие предотвратить их повторный запрос с сервера для одного и того же пользователя.</p>
									<p>При изменении JavaScript- или CSS-файлов автоматически будут создаваться их новые минимизированные версии, что позволит &laquo;пробить&raquo; кэш в браузерах. Для картинок и других статических файлов рекомендуется использовать новое физическое имя при их изменениии.</p>
									<p><a href="http://webo.in/articles/all/http-caching/">Кэширование </a> и <a href="http://webo.in/articles/habrahabr/15-yahoo-best-practices/#expires">его эффективность</a>.</p>');
define('_WEBO_SPLASH2_HTMLCACHE', 'Серверное кэширование');
define('_WEBO_SPLASH2_HTMLCACHE_INFO', '<p>Web Optimizer может кэшировать конечный HTML-код, чем предотвращает значительную работу на стороне сервера и уменьшает время создания страницы.</p>
									<p>Внимание: при включении этой настройки вся логика, осуществляемая на сервере, будет недоступна. Страницы станут полностью статическими. Рекомендуется включать эту настройку, только если вы полностью уверены в последствиях.</p>
									<p><a href="http://webo.in/articles/all/2009/16-content-flushing/">Быстрый сброс документа</a> и <a href="http://webo.in/articles/habrahabr/34-streaming-chunking-finding-end/">HTTP-чанки</a>.</p>');
define('_WEBO_SPLASH2_SPRITES', 'CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', '<p>Существует возможность объединить большинство фоновых изображений в CSS Sprites. Это существенно уменьшит число HTTP-запросов при загрузке сайта.</p>
									<p>Эта техника полностью поддерживается всеми современными браузерами. Вы также можете переключиться в более агрессивный режим использования CSS Sprites, если вы уверены в корректности ваших CSS-правил.</p>
									<p>Также можно задать набор изображений, которые будут исключены при создании CSS Sprites (например, logo.png bg.gif).</p>
									<p><a href="http://webo.in/articles/habrahabr/08-all-about-css-sprites/">Техника CSS Sprites</a> и <a href="http://webo.in/articles/habrahabr/89-css-sprites-2.0/">ее автоматизация</a>.</p>');
define('_WEBO_SPLASH2_DATAURI', 'Data:URI');
define('_WEBO_SPLASH2_DATAURI_INFO', '<p>Также возможно перевести все фоновые изображения в формат <code>data:URI</code> (base64-вид). Таким образом при загрузке дизайна сайта будет осуществлен только один HTTP-запрос &mdash; к файлу стилей.</p>
									<p>Внимание: эта техника не поддерживается рядом браузеров (Internet Explorer до 7 версии включительно). Однако для них используются специальные CSS-правила, позволяющие загрузить обычные изображения. Также размер конечного CSS-файла может существенно увеличиться (за счет включения в него самих фоновых изображений).</p>
									<p><a href="http://webo.in/articles/habrahabr/29-all-about-data-url-images/">Техника <code>data:URI</code></a> и <a href="http://webo.in/articles/habrahabr/69-total-image-optimization/">оптимизация изображений</a>.</p>');
define('_WEBO_SPLASH2_PARALLEL', 'Множественные хосты');
define('_WEBO_SPLASH2_PARALLEL_INFO', '<p>Для ускорения процесса отображения страницы в некоторых случаях полезно добавить несколько хостов для статических файлов (изображений), чтобы браузеры могли открыть больше параллельных соединений к серверу.</p>
									<p>Внимание: для обеспечения работы данной настройки необходимо добавить в конфигурационный файл сервера несколько служебных псевдонимов для основного хоста, например: <code>i1.site.ru</code> <code>i2.site.ru</code> <code>i3.site.ru</code> <code>i4.site.ru</code>, &mdash; а также обеспечить их соответствующими записями в DNS (которые бы указывали для этих хостов на тот же IP-адрес).</p>
									<p>При отключении автоматической проверки, пожалуйтса, убедитесь, что указанные(-й) хост(ы) существуют, иначе статические ресурсы на вашем сайте нельзя будет загрузить.</p>
									<p><a href="http://webo.in/articles/habrahabr/32-parallel-downloads-optimization/">Использование параллельных загрузок</a>.</p>');
define('_WEBO_SPLASH2_HTACCESS', 'Использование .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', '<p>Большая часть настроек <code>gzip</code>-сжатия и кэширования могут быть записаны в конфигурационном файле вашего сервера для избежания дополнительной работы на стороне серверных скриптов. Это может быть проделано с помощью файла <code>.htaccess</code> (при необходимости вы можете впоследствии самостоятельно перенести все настройки в файл <code>httpd.cond</code>).</p>
									<p><a href="http://webo.in/articles/all/mod-gzip-minify-on-fly/">Использование <code>mod_gzip</code></a>, <a href="http://webo.in/articles/all/2009/12-faster-and-cheaper-with-gzip/"><code>mod_deflate</code></a> и <a href="http://webo.in/articles/habrahabr/07-gzip-all/"><code>mod_rewrite</code></a>.</p>
									<p>Доступные модули: ');
define('_WEBO_SPLASH2_FOOTER', 'Логотип Web Optimizer');
define('_WEBO_SPLASH2_FOOTER_INFO', '<p>Web Optimizer может добавить значок оптимизатора со ссылкой на сайт проекта. Это может быть как печать, так и ссылка, а также и то, и другое.</p>
									<p>Включив эту настройку вы поддерживаете распространение Web Optimizer в массы.</p>');
define('_WEBO_SPLASH2_AUTOCHANGE', 'Изменение /index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', '<p>Web Optimizer может автоматически внести требуемые изменения в основной файл вашего сайта, использующего ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' (изменения будут применены только для <code>/index.php</code>).</p>
									<p>Внимание: для некоторых непроверенных окружений и малораспространенных CMS это может привести к неработоспособности сайта.</p>');
define('_WEBO_unobtrusive_on', 'Включить &laquo;ненавязчивый&raquo; JavaScript');
define('_WEBO_unobtrusive_body', 'Вставить вызов объединенного JavaScript-файла перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers', 'Перенести вызовы JavaScript-информеров перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters', 'Перенести вызовы счетчиков перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads', 'Перенести рекламные вызовы (контекст и банеры) перед <code>&lt;/body&gt;</code>');
define('_WEBO_external_scripts_on', 'Включить объединение внешних JavaScript-файлов');
define('_WEBO_external_scripts_head_end', 'Форсировать размещение объединенного JavaScript-файла перед <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_css', 'Включить объединение внешних CSS-файлов');
define('_WEBO_external_scripts_ignore_list', 'Исключить из объединения файлы');
define('_WEBO_minify_javascript', 'Объединить JavaScript-файлы');
define('_WEBO_dont_check_file_mtime_on', 'Не проверять время изменения файлов');
define('_WEBO_minify_with', 'Минимизировать JavaScript-файлы');
define('_WEBO_minify_with_jsmin', 'Минимизировать с помощью JSMin');
define('_WEBO_minify_with_packer', 'Минимизировать с помощью Packer');
define('_WEBO_minify_with_yui', 'Минимизировать с помощью YUI Compressor');
define('_WEBO_minify_css', 'Минимизировать и объединить CSS-файлы');
define('_WEBO_minify_page', 'Минимизировать HTML');
define('_WEBO_minify_html_comments', 'Удалить HTML-комментарии');
define('_WEBO_minify_html_one_string', 'Сжать HTML до 1 строки');
define('_WEBO_gzip_javascript', 'Применить <code>gzip</code> для JavaScript');
define('_WEBO_gzip_css', 'Применить <code>gzip</code> для CSS');
define('_WEBO_gzip_page', 'Применить <code>gzip</code> для HTML');
define('_WEBO_gzip_cookie', 'Проверять возможность <code>gzip</code> через cookie');
define('_WEBO_far_future_expires_javascript', 'Кэшировать JavaScript');
define('_WEBO_far_future_expires_css', 'Кэшировать CSS');
define('_WEBO_far_future_expires_images', 'Кэшировать изображения');
define('_WEBO_far_future_expires_video', 'Кэшировать видео-файлы');
define('_WEBO_far_future_expires_static', 'Кэшировать статические файлы');
define('_WEBO_far_future_expires_html', 'Кэшировать HTML');
define('_WEBO_far_future_expires_html_timeout', 'Время клиентского кэша для HTML-файлов');
define('_WEBO_html_cache_enabled', 'Кэшировать созданные HTML-файлы');
define('_WEBO_html_cache_timeout', 'Срок действия кэша в секундах');
define('_WEBO_html_cache_flush_only', 'Включить только быстрый сброс части документа');
define('_WEBO_html_cache_flush_size', 'Размер сбрасываемой части документа (в байтах)');
define('_WEBO_html_cache_ignore_list', 'Список частей URL для исключения при кэшировании');
define('_WEBO_html_cache_allowed_list', 'Список USER AGENTS (роботов) для включения при кэшировании');
define('_WEBO_footer_text', 'Добавить ссылку на Web Optimizer');
define('_WEBO_footer_image', 'Добавить изображение Web Optimizer');
define('_WEBO_data_uris_on', 'Применить <code>data:URI</code>');
define('_WEBO_data_uris_smushit', 'Оптимизировать все CSS-изображения через smush.it');
define('_WEBO_css_sprites_enabled', 'Применить CSS Sprites');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Сохранять полноцветные изображения в JPEG');
define('_WEBO_css_sprites_aggressive', '&laquo;Агрессивный&raquo; режим создания CSS Sprites');
define('_WEBO_css_sprites_extra_space', 'Добавить свободное место в CSS Sprites');
define('_WEBO_css_sprites_no_ie6', 'Исключить IE6 (через CSS-хаки)');
define('_WEBO_css_sprites_memory_limited', 'Ограничить использование памяти');
define('_WEBO_css_sprites_dimensions_limited', 'Исключить изображения, если их линейный размер больше заданного');
define('_WEBO_css_sprites_ignore_list', 'Исключить из CSS Sprites файлы');
define('_WEBO_parallel_enabled', 'Включить несколько хостов, например, i1 i2');
define('_WEBO_parallel_check', 'Автоматически проверять доступность хостов');
define('_WEBO_parallel_allowed_list', 'Доступные хосты');
define('_WEBO_htaccess_enabled', 'Включить <code>.htaccess</code>');
define('_WEBO_htaccess_mod_deflate', 'Использовать <code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_htaccess_mod_gzip', 'Использовать <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_expires', 'Использовать <code>mod_expires</code>');
define('_WEBO_htaccess_mod_headers', 'Использовать <code>mod_headers</code>');
define('_WEBO_htaccess_mod_setenvif', 'Использовать <code>mod_setenvif</code>');
define('_WEBO_htaccess_mod_mime', 'Использовать <code>mod_mime</code>');
define('_WEBO_htaccess_mod_rewrite', 'Использовать <code>mod_rewrite</code>');
define('_WEBO_htaccess_local', 'Расположить <code>.htaccess</code> в локальной (не корневой) директории');
define('_WEBO_htaccess_access', 'Защитить установку Web Optimizer с помощью <code>htpasswd</code>');
define('_WEBO_auto_rewrite_enabled', 'Включить авто-запись');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', 'Установка - шаг третий');
define('_WEBO_SPLASH3_SAVED', 'Ваши настройки были успешно сохранены.');
define('_WEBO_SPLASH3_REWRITE', 'Ускорение сайта проведено успешно');
define('_WEBO_SPLASH3_REWRITE_SHORT', 'Ускорение сайта проведено');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Необходимые изменения');
define('_WEBO_SPLASH3_TESTING_SHORT', 'Тестирование');
define('_WEBO_SPLASH3_SECURITY_SHORT', 'Безопасность');
define('_WEBO_SPLASH3_ADDITIONAL_SHORT', 'Дополнительное ускорение');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'Ваш сайт, использующий ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ', был успешно ускорен. Вы можете <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">проверить получившийся результат</a>.');
define('_WEBO_SPLASH3_WORKING', 'Вроде все работает. А дальше?');
define('_WEBO_SPLASH3_ADD', 'Вы должны <a href="#modify">добавить вызов Web Optimizer</a> в ваши серверные скрипты (');
define('_WEBO_SPLASH3_ADD_', '). Это будет значительно проще, если у вас есть 1 файл, которые обслуживает все остальные страницы, таким образом вам нужно будет изменить только его.');
define('_WEBO_SPLASH3_MODIFY', 'Как нужно изменить ваш(и) файл(ы):');
define('_WEBO_SPLASH3_TOFILE', 'В файл');
define('_WEBO_SPLASH3_TOFILE2', 'В самое начало файла');
define('_WEBO_SPLASH3_TOFILE3', 'В самый конец файла');
define('_WEBO_SPLASH3_AFTERSTRING', 'после строки');
define('_WEBO_SPLASH3_ADD2', 'добавить');
define('_WEBO_SPLASH3_TESTING', 'Теперь немного тестирования...');
define('_WEBO_SPLASH3_NOTLIVE', 'На самом деле у вас довольно большой простор действий. Вы можете провести любые изменения в конфигурации Web Optimizer (но лучше это проводить на тестовом сайте) для достижения оптимальной производительности. Для изменения настроек нужно:');
define('_WEBO_SPLASH3_MANUALLY', 'Вручную изменить файл <code>config.webo.php</code>, находящийся по этому пути: <code>');
define('_WEBO_SPLASH3_MANUALLY2', 'config.webo.php</code>');
define('_WEBO_SPLASH3_AGAIN', 'И(ли) <a href="');
define('_WEBO_SPLASH3_AGAIN2', '">запустить установку заново</a>. Все новые опции будут автоматически загружены, проверены и сохранены.');
define('_WEBO_SPLASH3_SECURITY', 'Дополнительная безопасность');
define('_WEBO_SPLASH3_ALTHOUGH', 'Хотя при установке и конфигурировании используется логин и пароль, вы можете удалить <code>');
define('_WEBO_SPLASH3_ALTHOUGH2', 'install.php</code> для обеспечения дополнительной безопасности вашего сайта.');
define('_WEBO_SPLASH3_FINISH', 'Закончить установку');
define('_WEBO_SPLASH3_CANTWRITE', 'Не удается записать в указанную вами директорию ');
define('_WEBO_SPLASH3_CANTWRITE2', '. Пожалуйста, проверьте, что директория существует и доступна на запись.');
define('_WEBO_SPLASH3_CANTWRITE3', 'Вы можете сделать это и из своего FTP-клиента. Для этого нужно перейти в директорию, зайти в ее свойства, или выполнить CHMOD 775, или CHMOD 777.');
define('_WEBO_SPLASH3_CANTWRITE4', 'После того, как вы устраните эту проблему, пожалуйста, перезагрузите страницу.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Пожалуйста, убедитесь, что корневая папка вашего сайта доступна на чтение и запись для вашего веб-сервера.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', 'Для этого выполните CHMOD 775, или CHMOD 777, или создайте в корне файл <code>.htaccess</code>, доступный для чтения и записи для вашего веб-сервера, или разрешите чтение и запись для текущего файла <code>.htaccess</code> (CHMOD 664 или CHMOD 777).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Пожалуйста, убедитесь, что корневая папка вашего сайта доступна на запись для вашего веб-сервера или в ней существует доступный на запись файл <code>.htaccess</code>.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Выполните для директории CHMOD 775, или CHMOD 777, или создайте в корне файл <code>.htaccess</code>, доступный для записи для вашего веб-сервера, или разрешите запись для текущего файла <code>.htaccess</code> (CHMOD 664 или CHMOD 777).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'Пожалуйста, убедитесь, что Web Optimizer установлен в');
define('_WEBO_SPLASH3_CONFSAVED', 'Конфигурация сохранена');
define('_WEBO_SPLASH3_CONFIGERROR', 'Невозможно открыть на запись конфигурационный файл. Пожалуйста, измените права доступа для файла <code>config.webo.php</code> Web Optimizer, чтобы он был доступен на запись для вашего веб-сервера.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'Вы это можете сделать при помощи вашего FTP-клиента. Для этого просто перейдите в директорию <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , затем зайдите в свойства файла или выполните CHMOD. Установите в 775, или 777, или "write"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'После того, как вы устраните эту проблему, пожалуйста, перезагрузите страницу.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'Конфигурационный файл не найден. Пожалуйста, загрузите Web Optimizer полностью по адресу <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');
define('_WEBO_SPLASH3_ADDITIONAL', 'Настройка оптимального быстродействия');
define('_WEBO_SPLASH3_ADDITIONAL_INFO', 'Вы можете провести дополнительные изменения на вашем сайте, которые позволят использовать Web Optimizer более эффективно. К числу таких изменений можно отнести:');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_1', '<strong>Сделайте ваш сайт соответствующим спецификациям (HTML, JavaScript и CSS).</strong> Нестандартные вызовы файлов и некорректный код приводит к различному рода ошибкам и ограничение функциональности Web Optimizer.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_2', '<strong>Вынесите все JavaScript- и CSS-файлы, требуемые для загрузки сайта, в <code>head</code>-секцию страницы.</strong> Это позволит Web Optimizer управлять их объединением и сжатием.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_3', '<strong>Подключите множественные хосты для вашего сайта.</strong> Для этого в DNS необходимо указать <code>* IN A IP_адрес_вашего_сервера</code>, подключить соответствующие поддомены (например, <code>i1</code> <code>i2</code> <code>i3</code> <code>i4</code>) и провести установку заново. Web Optimizer самостоятельно обнаружит доступные хосты и распределит изображения по ним.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_4', '<strong>Вынесите все стили и скрипты, прописанные прямо в коде страницы, во внешние файлы.</strong> Во-первых, это позволит вам проще управлять изменениями на вашем сайте. Во-вторых, это позволит Web Optimizer объединить, минимизировать и закэшировать весь объем дополнительного кода, который требуется для правильного функционирования вашего сайта.');

/* System check info on the first screen */
define('_WEBO_SYSTEM_CHECK', 'Проверяем конфигурацию сервера...');
define('_WEBO_SYSTEM_CHECK_ENABLED', 'есть');
define('_WEBO_SYSTEM_CHECK_DISABLED', 'нет');
define('_WEBO_SYSTEM_CHECK_WRITABLE', 'доступна');
define('_WEBO_SYSTEM_CHECK_RESTRICTED', 'запрещена');
define('_WEBO_SYSTEM_CHECK_SYSTEM_INFO', 'Конфигурация сервера');
define('_WEBO_SYSTEM_CHECK_VIA_JSMIN', 'через JSMin');
define('_WEBO_SYSTEM_CHECK_VIA_YUI', 'через YUI Compressor');
define('_WEBO_SYSTEM_CHECK_VIA_CSSTIDY', 'через CSS Tidy');
define('_WEBO_SYSTEM_CHECK_VIA_PHP', 'через PHP');
define('_WEBO_SYSTEM_CHECK_VIA_HTACCESS', 'через <code>.htaccess</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_SUPPORT', 'Поддержка <code>.htaccess</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS', 'Запись в <code>.htaccess</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_REWRITE', '<code>mod_rewrite</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_GZIP', '<code>mod_gzip</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_DEFLATE', '<code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_EXPIRES', '<code>mod_expires</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_HEADERS', '<code>mod_headers</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_MIME', '<code>mod_mime</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_SETENVIF', '<code>mod_setenvif</code>');
define('_WEBO_SYSTEM_CHECK_HTACCESS_PROTECTED', 'Ограничение доступа для установки');
define('_WEBO_SYSTEM_CHECK_CSS_DIRECTORY', 'Запись в CSS-директорию');
define('_WEBO_SYSTEM_CHECK_JAVASCRIPT_DIRECTORY', 'Запись в JavaScript-директорию');
define('_WEBO_SYSTEM_CHECK_HTML_DIRECTORY', 'Запись в HTML-директорию');
define('_WEBO_SYSTEM_CHECK_INDEX', 'Запись в файл <code>/index.php</code>');
define('_WEBO_SYSTEM_CHECK_CONFIG', 'Запись в конфигурационный файл');
define('_WEBO_SYSTEM_CHECK_GZIP', '<code>gzip</code> &laquo;на лету&raquo;');
define('_WEBO_SYSTEM_CHECK_GZIP_STATIC', 'Поддержка статического <code>gzip</code>');
define('_WEBO_SYSTEM_CHECK_CACHE', 'Клиентское кэширование');
define('_WEBO_SYSTEM_CHECK_CSS_SPRITES', 'Поддержка CSS Sprites');
define('_WEBO_SYSTEM_CHECK_CSS_MINIFY', 'Минимизация CSS');
define('_WEBO_SYSTEM_CHECK_JS_MINIFY', 'Минимизация JS');
define('_WEBO_SYSTEM_CHECK_EXTERNAL', 'Доступ ко внешних файлам');
define('_WEBO_SYSTEM_CHECK_HOSTS', 'Множественные хосты');
define('_WEBO_SYSTEM_CHECK_CMS', 'Встроенная поддержка CMS');
?>