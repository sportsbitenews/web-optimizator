<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Contains all RU localization constants
 *
 **/

/* general layout */
define('_WEBO_CHARSET', 'windows-1251');
define('_WEBO_GENERAL_TITLE', 'Конфигурация Веб Оптимизатора');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Хмм... у нас возникла проблема');
define('_WEBO_ERROR_ERROR', 'Упс! Что-то не так');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Введите ваши авторизационные данные');
define('_WEBO_LOGIN_INSTALLED', 'Для этого сайта уже установлен Веб Оптимизатор ');
define('_WEBO_LOGIN_INSTALLED2', '. Пожалуйста, введите ваш логин и пароль для доступа ко всем настройкам:');
define('_WEBO_LOGIN_USERNAME', 'Логин');
define('_WEBO_LOGIN_ENTERLOGIN', 'Введите ваш логин');
define('_WEBO_LOGIN_PASSWORD', 'Пароль');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Введите пароль');
define('_WEBO_SPLAHS1_PROTECTED', 'Защищенный режим');
define('_WEBO_SPLAHS1_PROTECTED2', 'Веб Оптимизатор надежно защищен от внешнего доступа. Вы можете настроить его еще раз.');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Обновить');
define('_WEBO_LOGIN_UPGRADENOTICE', 'Вы можете обновить вашу текущую версию Веб Оптимизатора (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') до самой последней. Для этого введите ваш логин и пароль в форме выше и нажмите кнопку <strong>Обновить</strong>. Веб Оптимизатор будет автоматически обновлен до версии <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_LOGIN_UPGRADENOTICE4', ') до самой последней версии <strong>');
define('_WEBO_UPGRADE_SUCCESSFULL', 'Вы успешно обновились до версии ');
define('_WEBO_UPGRADE_UNABLE', 'Не удается загрузить последнюю версию из репозитория. Пожалуйста, проверьте соединение сервера с интернетом и наличие установленного curl.');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', 'Чтобы удалить Веб Оптимизатор, пожалуйста, введите ваш логин и пароль в форме выше и нажмите кнопку <strong>Удалить</strong>.');
define('_WEBO_LOGIN_UNINSTALL2', 'Веб Оптимизатор может быть отключен для вашего сайта. Для этого его нужно просто удалить.');
define('_WEBO_LOGIN_UNINSTALLME', 'Удалить Веб Оптимизатор');
define('_WEBO_LOGIN_FAILED', 'Неверно введен логин и(ли) пароль');
define('_WEBO_LOGIN_ACCESS', 'Эта страница доступна только авторизованным пользователям');
define('_WEBO_LOGIN_LOGGED', 'Вошли в систему');
define('_WEBO_SPLASH1_CLEAR', 'Очистить кэш');
define('_WEBO_SPLASH1_CLEAR_CACHE', 'Чтобы очистить кэш Веб Оптимизатора, пожалуйста, введите ваш логин и пароль и нажмите кнопку <strong>Очистить кэш</strong>. ');
define('_WEBO_SPLASH1_CLEAR_CACHE2', 'Все сохраненные копии созданных файлов будут удалены из кэширующей директории.');
define('_WEBO_CLEAR_UNABLE', 'Не получается удалить некоторые файлы из кэширующих директорий');
define('_WEBO_CLEAR_SUCCESSFULL', 'Все файлы были успешно удалены из кэша');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Установка - ограничение доступа');
define('_WEBO_NEW_PROTECT', 'Для обеспечения безопасности при дальнейшем использовании Веб Оптимизатора необходимо установить пароль доступа.');
define('_WEBO_NEW_USERDATA', 'Ваш логин и пароль');
define('_WEBO_NEW_ENTER', 'Установите ваш логин и пароль');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Удалить');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Спасибо за использование Веб Оптимизатора. Вы можете в любой момент установить его снова просто зайдя на <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">страницу Веб Оптиизатора</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Мы будем рады видеть отзывы о системе на <a href="http://code.google.com/p/web-optimizator/">сайте Веб Оптимизатора</a>, вы также можете отправить <a href="http://code.google.com/p/web-optimizator/issues/list">любые проблемные вопросы</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Теперь можно вернуться обратно к <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">вашему сайту</a>.');
define('_WEBO_SPLASH1_TITLE', 'Установка - шаг первый');
define('_WEBO_SPLASH1_WELCOME', 'Добро пожаловать в установку Веб Оптимизатора!');
define('_WEBO_SPLASH1_PATH', 'Настройка путей');
define('_WEBO_SPLASH1_FULLPATH', 'Полный путь к корню сайта:');
define('_WEBO_SPLASH1_NOTICE', 'Корень сайта &mdash; это директория на жестком диске, в которой находятся и откуда отдаются все ваши HTML-файлы. Если вы понятия не имеете, о чем идет речь, то лучше оставить указанный выше путь. Для этого просто нажмите кнопку <strong>Далее...</strong>.');
define('_WEBO_SPLASH1_INCORRECT', '<strong>Если указанный путь отображен неверно</strong>, пожалуйста, введите правильный вариант.');
define('_WEBO_SPLASH1_NEXT', 'Далее...');
define('_WEBO_SPLASH1_EXPRESS', 'Быстрая установка');

/* Second splash -- set options */
define('_WEBO_SPLASH2_TITLE', 'Установка - шаг второй');
define('_WEBO_SPLASH2_SAVED', 'Сохранена настройка: ');
define('_WEBO_SPLASH2_OPTIONS', 'Настройки Веб Оптимизатора');
define('_WEBO_SPLASH2_CACHE', 'Директории кэширования');
define('_WEBO_SPLASH2_CACHE_JS', 'JavaScript-файлы будут располагаться в');
define('_WEBO_SPLASH2_CACHE_CSS', 'CSS-файлы будут располагаться в');
define('_WEBO_SPLASH2_CACHE_HTML', 'HTML-файлы будут располагаться в');
define('_WEBO_SPLASH2_INSTALLDIR', 'Веб Оптимизатор расположен в');
define('_WEBO_SPLASH2_DOCUMENTROOT', 'Сайт расположен в');
define('_WEBO_SPLASH2_SPACE', 'Пожалуйста, через пробел:');
define('_WEBO_SPLASH2_YES', 'Да:');
define('_WEBO_SPLASH2_NO', 'Нет:');
define('_WEBO_SPLASH2_UNABLE', 'Невозможно открыть');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>Пожалуйста, убедитесь, что такая директория существует и она располагается в корне сайта.');
/* Web Optimizer options */
define('_WEBO_SPLASH2_JSLIB', 'JavaScript-файлы');
define('_WEBO_SPLASH2_JSLIB_INFO', 'Если ваша клиентская логика использует какие-то специальные JavaScript-библиотеки, то имеет смысл добавить их в поле видимости Веб Оптимизатора.
									<br/><br/>Веб Оптимизатор установил, что указанные ниже файлы могли быть добавлены непосредственно вами. Стоит пересмотреть этот список и обновить указанные в нем файлы в случае необходимости.');
define('_WEBO_SPLASH2_MINIFY', 'Настройки сжатия');
define('_WEBO_SPLASH2_MINIFY_INFO', 'Сжатие удаляет из CSS- и JavaScript-файлов пробелы, переводы строк и другие ненужные символы.
									<br/>Вы также можете выбрать один из нескольких инструментов минимизации или обфускации.');
define('_WEBO_SPLASH2_UNOBTRUSIVE', '&laquo;Ненавязчивый&raquo; JavaScript');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '&laquo;Ненавязчивые&raquo; JavaScript-файлы загружаются сразу после того, как страница отобразиться в браузере (на странице будет сформировано DOM-дерево).
									<br/>Его использование может значительно увеличить скорость загрузки страницы для конечных пользователей. Но в некоторых случаях (при недостаточно аккуратном использовании JavaScript-библиотек) это может существенно нарушить работоспособность вашего сайта.
									<br/>Рекомендуется включать эту настройку только в случае полной уверенности в существующей клиентской логики.');
define('_WEBO_SPLASH2_MTIME', 'Не проверять время изменения и содержание файлов');
define('_WEBO_SPLASH2_MTIME_INFO', 'Обычно Веб Оптимизатор при каждой загрузке страницы проверяет, изменились ли файлы (какое у них время изменение и какое в них содержание), и на основе этой информации либо дает ссылки на существующие статические файлы, либо создает новые.
									<br/>С точки зрения серверной оптимизации более оптимально не проверять каждый раз, изменились ли файлы, а удалять по факту самого изменения закэшированную версию.
									<br/>С включением этой настройки вам будет необходимо самостоятельно управлять кэшем Веб Оптимизатора, но при этом дополнительная нагрузка на сервер производиться не будет.');
define('_WEBO_SPLASH2_EXTERNAL', 'Включить внешние JavaScript-файлы и встроенный код');
define('_WEBO_SPLASH2_EXTERNAL_INFO', 'При активации этой настройки все JavaScript-файлы, подключаемые с внешних сайтов, равно как и просто JavaScript-код, находящийся в секции <code>head</code> будут объединены в один файл, уменьшены в размеры и подключены сразу после CSS-файла.
									<br/>Это будет особенно полезно при использовании большого числа модулей с разных сайтов, которые не могут быть подключены в &laquo;ненавязчивом&raquo; режиме.
									<br/>Вы также можете указать имена файлов, которые нужно исключить из подобного объединения (например, ga.js, jquery.min.js и т.д.).');
define('_WEBO_SPLASH2_GZIP', 'Настройки архивирования');
define('_WEBO_SPLASH2_GZIP_INFO', 'Применение <code>gzip</code>-сжатия позволит на 80-85% уменьшить размер текстовых файлов.
									<br/>Для нагруженных сайтов рекомендуется настройки <code>gzip</code>-сжатия перенести в конфигурационный файл сервера (или использовать настройки <code>.htaccess</code> ниже).');
define('_WEBO_SPLASH2_EXPIRES', '&laquo;Вечное&raquo; кэширование');
define('_WEBO_SPLASH2_EXPIRES_INFO', 'В результате работы этой настройки ко всем статическим файлам будут добавлены заголовки кэширования, позволяющие предотвратить их повторный запрос с сервера для одного и того же пользователя.
									<br/>При изменении JavaScript- или CSS-файлов автоматически будут создаваться их новые минимизированные версии, что позволит &laquo;пробить&raquo; кэш в браузерах. Для картинок и других статических файлов рекомендуется использовать новое физическое имя при их изменении');
define('_WEBO_SPLASH2_HTMLCACHE', 'Кэшировать HTML-файлы');
define('_WEBO_SPLASH2_HTMLCACHE_INFO', 'Веб Оптиизатор может кэшировать конечный HTML-код, чем предотвращает значительную работу на стороне сервера и уменьшает время создания страницы.
									<br/>Внимание: при включении этой настройки вся логика, осуществляемая на сервере, будет недоступна. Страницы станут полностью статическими. Рекомендуется включать эту настройку, только если вы полностью уверены в последствиях.');
define('_WEBO_SPLASH2_SPRITES', 'CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', 'Существует возможность объединить большинство фоновых изображений в CSS Sprites. Это существенно уменьшит число HTTP-запросов при загрузке сайта.
									<br/>Эта техника полностью поддерживается всеми современными браузерами. Вы также можете переключиться в более агрессивный режим использования CSS Sprites, если вы уверены в корректности ваших CSS-правил.
									<br/>Также можно задать набор изображений, которые будут исключены при создании CSS Sprites (например, logo.png, bg.gif и т.д.).');
define('_WEBO_SPLASH2_DATAURI', 'Data:URI');
define('_WEBO_SPLASH2_DATAURI_INFO', 'Также возможно перевести все фоновые изображения в формат <code>data:URI</code> (base64-вид). Таким образом при загрузке дизайна сайта будет осуществлен только один HTTP-запрос &mdash; к файлу стилей.
									<br/>Внимание: эта техника не поддерживается рядом браузеров (Internet Explorer до 7 версии включительно). Однако для них используются специальные CSS-правила, позволяющие загрузить обычные изображения. Также размер конечного CSS-файла может существенно увеличиться (за счет включения в него самих фоновых изображений).');
define('_WEBO_SPLASH2_PARALLEL', 'Множественные хосты');
define('_WEBO_SPLASH2_PARALLEL_INFO', 'Для ускорения процесса отображения страницы в некоторых случаях полезно добавить несколько хостов для статиченых файлов (изображений). В таком случае браузеры могут открыть больше параллельных соединений к основному серверу и показать страницу быстрее.
									<br/>Внимание: для обеспечения работы данной настройки необходимо добавить в конфигурационный файл сервера несколько служебных псевдонимов для основного хоста, например: <code>i1.site.ru</code> <code>i2.site.ru</code> <code>i3.site.ru</code> <code>i4.site.ru</code>, &mdash; а также обеспечить их соответствующими записями в DNS (которые бы указывали для этих хостов на тот же IP-адрес). Веб Оптимизатор автоматически проверяет доступность заявленных хостов и только после этого начинает распределять по ним загрузку статических файлов.');
define('_WEBO_SPLASH2_HTACCESS', 'Использование .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', 'Большая часть настроек <code>gzip</code>-сжатия и кэширования могут быть записаны в конфигурационном файле вашего сервера для избежания дополнительной работы на стороне серверных скриптов. Это может быть проделано с помощью файла <code>.htaccess</code> (при необходимости вы можете впоследствии самостоятельно перенести все настройик в файл <code>httpd.cond</code>).
									<br/>Доступные модули: ');
define('_WEBO_SPLASH2_CLEANUP', 'Удаление файлов');
define('_WEBO_SPLASH2_CLEANUP_INFO', 'При изменении JavaScript- или CSS-файлов Веб Оптимизатор будет автоматически создавать новые версии объединенных и сжатых файлов. Для удаления старых версий файлов нужно включить эту настройку.
									<br/>Однако если на вашем сайте используются разные наборы скриптов и файлов стилей для разных частей сайта, это может привести к регулярному удалению нужных файлов, что отрицательно скажется на производительности сайта. В общем случае эту настройку лучше не включать.');
define('_WEBO_SPLASH2_FOOTER', 'Логотип Веб Оптимизатора');
define('_WEBO_SPLASH2_FOOTER_INFO', 'Веб Оптимизатор может добавить значок оптимизатора со ссылкой на сайт проекта. Это может быть как печать, так и ссылка, а также и то, и другое.
									<br/>Включив эту настройку вы поддерживаете распространение Веб Оптимизатора в массы.');
define('_WEBO_SPLASH2_AUTOCHANGE', 'Автоматическое изменение /index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', 'Веб Оптимизатор может автоматически внести требуемые изменения в основной файл вашего сайта, использующего ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' (изменения будут применены только для <code>/index.php</code>).
									<br/>Внимание: для некоторых непроверенных окружений и малораспространенных CMS это может привести к неработоспособности сайта.');
define('_WEBO_unobtrusive_on', 'Включить &laquo;ненавязчивый&raquo; JavaScript');
define('_WEBO_unobtrusive_body', 'Вставить вызов объединенного JavaScript-файла перед <code>&lt;/body&gt;</code>');
define('_WEBO_external_scripts_on', 'Включить объединение внешних JavaScript-файлов');
define('_WEBO_external_scripts_css', 'Включить объединение внешних CSS-файлов');
define('_WEBO_external_scripts_ignore_list', 'Исключить из объединения файлы');
define('_WEBO_minify_javascript', 'Объединить JavaScript-файлы');
define('_WEBO_dont_check_file_mtime_on', 'Не проверять время изменения файлов');
define('_WEBO_minify_with_jsmin', 'Минимизировать с помощью JSMin');
define('_WEBO_minify_with_packer', 'Минимизировать с помощью Packer');
define('_WEBO_minify_with_yui', 'Минимизировать с помощью YUI Compressor');
define('_WEBO_minify_css', 'Минимизировать и объединить CSS-файлы');
define('_WEBO_minify_page', 'Минимизировать HTML');
define('_WEBO_minify_html_comments', 'Удалить HTML-комментарии');
define('_WEBO_gzip_javascript', 'Применить <code>gzip</code> для JavaScript');
define('_WEBO_gzip_css', 'Применить <code>gzip</code> для CSS');
define('_WEBO_gzip_page', 'Применить <code>gzip</code> для HTML');
define('_WEBO_far_future_expires_javascript', 'Кэшировать JavaScript');
define('_WEBO_far_future_expires_css', 'Кэшировать CSS');
define('_WEBO_far_future_expires_static', 'Кэшировать статические файлы');
define('_WEBO_far_future_expires_html', 'Кэшировать HTML');
define('_WEBO_far_future_expires_html_timeout', 'Время клиентского кэша для HTML-файлов');
define('_WEBO_html_cache_enabled', 'Кэшировать созданные HTML-файлы');
define('_WEBO_html_cache_timeout', 'Срок действия кэша в секундах');
define('_WEBO_html_cache_flush_only', 'Включить только быстрый сброс части документа');
define('_WEBO_html_cache_flush_size', 'Размер сбрасываемой части документа (в байтах)');
define('_WEBO_html_cache_ignore_list', 'Список частей URL для исключения при кэшировании');
define('_WEBO_html_cache_allowed_list', 'Список частей USER AGENTS (роботов) для включения при кэшировании');
define('_WEBO_footer_text', 'Добавить ссылку на Веб Оптимизатор');
define('_WEBO_footer_image', 'Добавить изображение Веб Оптимизатора');
define('_WEBO_cleanup_on', 'Удалять старые файлы');
define('_WEBO_data_uris_on', 'Применить <code>data:URI</code>');
define('_WEBO_data_uris_smushit', 'Оптимизировать все CSS-изображения через smush.it');
define('_WEBO_css_sprites_enabled', 'Применить CSS Sprites');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Сохранять полноцветные изображения в JPEG');
define('_WEBO_css_sprites_aggressive', '&laquo;Агрессивный&raquo; режим создания CSS Sprites');
define('_WEBO_css_sprites_extra_space', 'Добавить свободное место в CSS Sprites');
define('_WEBO_css_sprites_no_ie6', 'Исключить IE6 (через хаки) из процесса создания CSS Sprites');
define('_WEBO_css_sprites_memory_limited', 'Ограничить использование памяти для PHP-процесса');
define('_WEBO_css_sprites_dimensions_limited', 'Исключить изображения, если их линейный размер больше заданного');
define('_WEBO_css_sprites_ignore_list', 'Исключить из CSS Sprites файлы');
define('_WEBO_parallel_enabled', 'Включить множественные хосты');
define('_WEBO_parallel_allowed_list', 'Доступные хосты');
define('_WEBO_htaccess_enabled', 'Включить <code>.htaccess</code>');
define('_WEBO_htaccess_mod_deflate', 'Включить <code>mod_deflate</code>');
define('_WEBO_htaccess_mod_gzip', 'Включить <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_expires', 'Включить <code>mod_expires</code>');
define('_WEBO_htaccess_mod_headers', 'Включить <code>mod_headers</code>');
define('_WEBO_htaccess_mod_setenvif', 'Включить <code>mod_setenvif</code>');
define('_WEBO_htaccess_local', 'Расположить <code>.htaccess</code> в локальной (не корневой) директории');
define('_WEBO_htaccess_access', 'Защитить установку Веб Оптимизатора с помощью <code>htpasswd</code>');
define('_WEBO_auto_rewrite_enabled', 'Включить авто-запись');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', 'Установка - шаг третий');
define('_WEBO_SPLASH3_SAVED', 'Ваши настройки были успешно сохранены.');
define('_WEBO_SPLASH3_REWRITE', 'Ускорение сайта проведено успешно');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'Ваш сайт, использующий ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ', был успешно ускорен. Вы можете <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">проверить получившийся результат</a>.');
define('_WEBO_SPLASH3_WORKING', 'Вроде все работает. А дальше?');
define('_WEBO_SPLASH3_ADD', 'Вы должны добавить вызов Веб Оптимизатора в ваши серверные скрипты. Это будет значительно проще, если у вас есть 1 файл, которые обслуживает все остальные страницы, таким образом вам нужно будет изменить только его.');
define('_WEBO_SPLASH3_MODIFY', 'Как нужно изменить ваш файл');
define('_WEBO_SPLASH3_WP', 'Предположим, что мы изменяем файл <code>wp-blog-header.php</code> вашего блога, использующего Wordpress. (Это только пример: в общем случае нужно модифицировать файл <code>index.php</code>). В самом верху страницы вы должны увидеть примерно это:');
define('_WEBO_SPLASH3_CODE', 'Вы должны добавить код Веб Оптимизатора <strong>до</strong> этих строк. Поэтому нужно добавить в самых верх страницы следующее:');
define('_WEBO_SPLASH3_FINALLY', 'И после этого нужно завершить вызов Веб Оптимизатора следующим образом (в самом низу кода страницы):');
define('_WEBO_SPLASH3_TESTING', 'Теперь немного тестирования...');
define('_WEBO_SPLASH3_NOTLIVE', 'На самом деле у вас довольно большой простор действий. Вы можете провести любые изменения в конфигурации Веб Оптимизатора (но лучше это проводить на тестовом сайте) для достижения оптимальной производительности. Для изменения настроек нужно:');
define('_WEBO_SPLASH3_MANUALLY', 'Вручную изменить файл <code>config.webo.php</code>, находящийся по этому пути: <code>');
define('_WEBO_SPLASH3_MANUALLY2', 'config.webo.php</code>');
define('_WEBO_SPLASH3_AGAIN', 'И <a href="');
define('_WEBO_SPLASH3_AGAIN2', '">запустить установку заново</a>. Все новые опции будут автоматически загружены, проверены и сохранены.');
define('_WEBO_SPLASH3_SECURITY', 'Дополнительная безопасность');
define('_WEBO_SPLASH3_ALTHOUGH', 'Хотя при установке и конфигурировании используется логин и пароль, вы можете удалить <code>');
define('_WEBO_SPLASH3_ALTHOUGH2', 'install.php</code> для обеспечения дополнительной безопасности вашего сайта.');
define('_WEBO_SPLASH3_FINISH', 'Закончить установку');
define('_WEBO_SPLASH3_CANTWRITE', 'Не удается записать в указанную вами директорию ');
define('_WEBO_SPLASH3_CANTWRITE2', '. Пожалуйста, проверьте, что директория существует и доступна на запись.');
define('_WEBO_SPLASH3_CANTWRITE3', 'Вы можете сделать это и из своего FTP-клиента. Для этого нужно перейти в директорию, зайти в ее свойства или выполнить CHMOD 775 или CHMOD 777.');
define('_WEBO_SPLASH3_CANTWRITE4', 'После того, как вы устраните эту проблему, пожалуйста, перезагрузите страницу.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Пожалуйста, убедитесь, что корневая папка вашего сайта доступна на чтение и запись для вашего веб-сервера.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', 'Для этого выполните CHMOD 775 или CHMOD 777, или создайте в корне файл <code>.htaccess</code>, доступный для чтения и записи для вашего веб-сервера, или разрешите чтение и запись для текущего файла <code>.htaccess</code> (CHMOD 664 или CHMOD 777).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Пожалуйста, убедитесь, что корневая папка вашего сайта доступна на запись для вашего веб-сервера или в ней существует доступный на запись файл <code>.htaccess</code>.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Выполните для директории CHMOD 775 или CHMOD 777, или создайте в корне файл <code>.htaccess</code>, доступный для записи для вашего веб-сервера, или разрешите запись для текущего файла <code>.htaccess</code> (CHMOD 664 или CHMOD 777).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'Пожалуйста, убедитесь, что Веб Оптимизатор установлен в');
define('_WEBO_SPLASH3_CONFSAVED', 'Конфигурация сохранена');
define('_WEBO_SPLASH3_CONFIGERROR', 'Невозможно открыть на запись конфигурационный файл. Пожалуйста, измените права доступа для файла <code>config.webo.php</code> Веб Оптимизатора, чтобы он был доступен на запись для вашего веб-сервера.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'Вы это можете сделать при помощи вашего FTP-клиента. Для этого просто перейдите в директорию <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , затем зайдите в свойства файла или выполните CHMOD. Установите в 775, или 777, или "write"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'После того, как вы устраните эту проблему, пожалуйста, перезагрузите страницу.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'Конфигурационный файл не найден. Пожалуйста, загрузите Веб Оптимизатор полностью по адресу <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');

?>