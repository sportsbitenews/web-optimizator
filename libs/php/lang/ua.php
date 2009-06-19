<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Contains all UA localization constants
 * Translated by Sergiy Andriychuk
 * new (=not translated) constants:
 **/

/* general layout */
define('_WEBO_CHARSET', "windows-1251");
define('_WEBO_GENERAL_TITLE', 'Конфігурація Веб Оптимізатора');
define('_WEBO_GENERAL_FOOTER', 'Быстрее молнии!');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Хмм... у нас виникла проблема');
define('_WEBO_ERROR_ERROR', 'Щось пішло не так!');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Введіть ваші авторизаційні дані');
define('_WEBO_LOGIN_INSTALLED', 'Для цього сайту Веб Оптимизатор ');
define('_WEBO_LOGIN_INSTALLED2', ' вже встановлений. Будь-ласка, введіть ваш логін та пароль для доступу до всіх налаштувань:');
define('_WEBO_LOGIN_INSTALLED3', '. Для доступа ко всем настройкам нажмите кнопку <strong>Далее</strong>.');
define('_WEBO_LOGIN_USERNAME', 'Логін');
define('_WEBO_LOGIN_ENTERLOGIN', 'Введіть ваш логін');
define('_WEBO_LOGIN_PASSWORD', 'Пароль');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Введіть пароль');
define('_WEBO_SPLAHS1_PROTECTED', 'Защищенный режим');
define('_WEBO_SPLAHS1_PROTECTED2', 'Веб Оптимизатор надежно защищен от внешнего доступа. Вы можете настроить его еще раз.');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Обновити');
define('_WEBO_LOGIN_UPGRADENOTICE', 'Ви можете обновити вашу поточну версію Веб Оптимізатора (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') до найостаннішої. Для цього введіть ваш логін і пароль в формі вище і натисніть кнопку <strong>Поновити</strong>. Веб Оптимізатор буде автоматично обновлений до версії <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_UPGRADE_SUCCESSFULL', 'Ви успішно обновились до версії ');
define('_WEBO_UPGRADE_UNABLE', 'Не вдається завантажити останню версію з репозиторію. Будь-ласка, перевірте з\'єднання серверу з інтернетом та наявність встановленого curl.');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', 'Щоб видалити Веб Оптимізатор, будь-ласка, введіть ваш логін та пароль у формі вище та натисніть кнопку <strong>Видалити</strong>.');
define('_WEBO_LOGIN_UNINSTALL2', 'Веб Оптимизатор может быть отключен для вашего сайта. Для этого его нужно просто удалить.');
define('_WEBO_LOGIN_UNINSTALLME', 'Видалити Веб Оптимізатор');
define('_WEBO_LOGIN_FAILED', 'Невірно введений логін та(або) пароль');
define('_WEBO_LOGIN_ACCESS', 'Ця сторінка доступна тільки авторизованим користувачам');
define('_WEBO_LOGIN_LOGGED', 'Увійшли в систему');
define('_WEBO_SPLASH1_CLEAR', 'Очистити кеш');
define('_WEBO_SPLASH1_CLEAR_CACHE', 'Щоб очистити кеш Веб Оптимізатора, будь-ласка, введіть ваш логін і пароль та натисніть кнопку <strong>Очистити кеш</strong>. ');
define('_WEBO_SPLASH1_CLEAR_CACHE2', 'Всі збережені копії створених файлів будуть видалені з директорії для кешування.');
define('_WEBO_CLEAR_UNABLE', 'Не виходить видалити деякі файли з директорії для кешування');
define('_WEBO_CLEAR_SUCCESSFULL', 'Всі файли були успішно видалені з кеша');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Установка - обмеження доступу');
define('_WEBO_NEW_PROTECT', 'Для забезпечення безпеки при подальшому використанні Веб Оптимізатора необхідно встановили пароль доступу.');
define('_WEBO_NEW_USERDATA', 'Ваш логін та пароль');
define('_WEBO_NEW_ENTER', 'Встановіть ваш логін та пароль');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Видалити');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'Удаление');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Дякуємо за використання Веб Оптимізатора. Ви можете встановити його знову в будь-який момент, якщо зайдете на <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">сторінку Веб Оптимізатора</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Ми будемо раді бачити ваші відгуки про систему на <a href="http://code.google.com/p/web-optimizator/">сайті Веб Оптимізатора</a>, ви також можете відправити<a href="http://code.google.com/p/web-optimizator/issues/list">будь-які проблемні запитання</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Тепер можна повернутися назад до <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">вашого сайту</a>.');
define('_WEBO_SPLASH1_NEXT', 'Далі');
define('_WEBO_SPLASH1_BACK', 'Назад');
define('_WEBO_SPLASH1_EXPRESS', 'Швидка установка');

/* Second splash -- set options */
define('_WEBO_SPLASH2_TITLE', 'Установка - другий крок');
define('_WEBO_SPLASH2_SAVED', 'Збережене налаштування: ');
define('_WEBO_SPLASH2_OPTIONS', 'Налаштування Веб Оптимізатора');
define('_WEBO_SPLASH2_CACHE', 'Директорії кешування');
define('_WEBO_SPLASH2_CACHE_JS', 'JavaScript-файли будуть розміщуватися в');
define('_WEBO_SPLASH2_CACHE_CSS', 'CSS-файли будуть розміщуватися в');
define('_WEBO_SPLASH2_INSTALLDIR', 'Веб Оптимізатор розміщений в');
define('_WEBO_SPLASH2_DOCUMENTROOT', 'Сайт розміщений в');
define('_WEBO_SPLASH2_SPACE', 'Будь-лайска, через пробіл:');
define('_WEBO_SPLASH2_YES', 'Так:');
define('_WEBO_SPLASH2_NO', 'Ні:');
define('_WEBO_SPLASH2_UNABLE', 'Неможливо відкрити');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>Будь-ласка, переконайтеся, що такая директорія існує і вона розміщена в корені сайту.');
/* Web Optimizer options */
define('_WEBO_SPLASH2_MINIFY_INFO', '<p>Сжатие удаляет из CSS- и JavaScript-файлов пробелы, переводы строк и другие ненужные символы.</p>
									<p>Вы также можете выбрать один из нескольких инструментов минимизации или обфускации.</p>
									<p><a href="http://webo.in/articles/habrahabr/14-minifing-css/">Сжатие CSS-</a> и <a href="http://webo.in/articles/habrahabr/11-minifing-javascript/">JavaScript-файлов</a>.</p>');
define('_WEBO_SPLASH2_EXTERNAL', 'Включить внешние файлы');
define('_WEBO_SPLASH2_EXTERNAL_INFO', '<p>При активации этой настройки все JavaScript-файлы, подключаемые с внешних сайтов, равно как и просто JavaScript-код, находящийся в секции <code>head</code> будут объединены в один файл, уменьшены в размеры и подключены сразу после CSS-файла.</p>
									<p>Это будет особенно полезно при использовании большого числа модулей с разных сайтов, которые не могут быть подключены в &laquo;ненавязчивом&raquo; режиме.</p>
									<p>Вы также можете указать имена файлов, которые нужно исключить из подобного объединения (например, ga.js jquery.min.js).</p>
									<p><a href="http://webo.in/articles/habrahabr/50-fast-fast-javascript/">Методы ускорения загрузки JavaScript</a>.</p>');
define('_WEBO_SPLASH2_UNOBTRUSIVE', '&laquo;Ненавязчивый&raquo; JavaScript');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '<p>&laquo;Ненавязчивые&raquo; JavaScript-файлы загружаются сразу после того, как страница отобразиться в браузере. Его использование может значительно увеличить скорость загрузки страницы для конечных пользователей. Но в некоторых случаях это может нарушить работоспособность сайта.</p>
									<p>Рекомендуется включать эту настройку только в случае полной уверенности в существующей клиентской логики.</p>
									<p>Также возможно перенести все вызовы внешних JavaScript-файлов перед <code>&lt;/body&gt;</code>.</p>
									<p><a href="http://webo.in/articles/all/04-unobtrusive-javascript-operation-clean-up/">Техника &laquo;ненавязчивого&raquo; JavaScript</a>, <a href="http://webo.in/articles/habrahabr/44-unobtrusive-advertisements-basics/">&laquo;ненавязчивая&raquo; реклама и счетчики</a>, <a href="http://webo.in/articles/habrahabr/56-non-blocking-javascript/">блокирующие скрипты</a> и <a href="http://webo.in/articles/habrahabr/05-delayed-loading/">&laquo;отложенная&raquo; загрузка</a>.</p>');
define('_WEBO_SPLASH2_MTIME', 'Не проверять актуальность');
define('_WEBO_SPLASH2_MTIME_INFO', '<p>Обычно Веб Оптимизатор при каждой загрузке страницы проверяет, изменились ли файлы (какое у них время изменение и какое в них содержание), и на основе этой информации либо дает ссылки на существующие статические файлы, либо создает новые.</p>
									<p>С точки зрения серверной оптимизации более оптимально не проверять каждый раз, изменились ли файлы, а удалять по факту самого изменения закэшированную верси С включением этой настройки вам будет необходимо самостоятельно управлять кэшем Веб Оптимизатора.</p>
									<p><a href="http://webo.in/articles/all/10-frontend-backend-balancing/">Влияние числа подключаемых файлов на скорость загрузки</a>.</p>');
define('_WEBO_SPLASH2_GZIP', 'Настройки архивирования');
define('_WEBO_SPLASH2_GZIP_INFO', '<p>Применение <code>gzip</code>-сжатия позволит на 80-85% уменьшить размер текстовых файлов.</p>
									<p>Для нагруженных сайтов рекомендуется настройки <code>gzip</code>-сжатия перенести в конфигурационный файл сервера (или использовать настройки <code>.htaccess</code> ниже).</p>
									<p><a href="http://webo.in/articles/habrahabr/30-gzip-versus-broadband/">Ресурсоемкость</a> и <a href="http://webo.in/articles/habrahabr/33-gzip-level-tool/">эффективность gzip-сжатия</a>.</p>');
define('_WEBO_SPLASH2_EXPIRES', '&laquo;Вечное&raquo; кэширование');
define('_WEBO_SPLASH2_EXPIRES_INFO', '<p>В результате работы этой настройки ко всем статическим файлам будут добавлены заголовки кэширования, позволяющие предотвратить их повторный запрос с сервера для одного и того же пользователя.</p>
									<p>При изменении JavaScript- или CSS-файлов автоматически будут создаваться их новые минимизированные версии, что позволит &laquo;пробить&raquo; кэш в браузерах. Для картинок и других статических файлов рекомендуется использовать новое физическое имя при их изменениию.</p>
									<p><a href="http://webo.in/articles/all/http-caching/">Кэширование </a> и <a href="http://webo.in/articles/habrahabr/15-yahoo-best-practices/#expires">его эффективность</a>.</p>');
define('_WEBO_SPLASH2_HTMLCACHE', 'Кэшировать HTML-файлы');
define('_WEBO_SPLASH2_HTMLCACHE_INFO', '<p>Веб Оптимизатор может кэшировать конечный HTML-код, чем предотвращает значительную работу на стороне сервера и уменьшает время создания страницы.</p>
									<p>Внимание: при включении этой настройки вся логика, осуществляемая на сервере, будет недоступна. Страницы станут полностью статическими. Рекомендуется включать эту настройку, только если вы полностью уверены в последствиях.</p>
									<p><a href="http://webo.in/articles/all/2009/16-content-flushing/">Быстрый сброс документа</a> и <a href="http://webo.in/articles/habrahabr/34-streaming-chunking-finding-end/">чанки</a>.</p>');
define('_WEBO_SPLASH2_SPRITES', 'CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', '<p>Существует возможность объединить большинство фоновых изображений в CSS Sprites. Это существенно уменьшит число HTTP-запросов при загрузке сайта.</p>
									<p>Эта техника полностью поддерживается всеми современными браузерами. Вы также можете переключиться в более агрессивный режим использования CSS Sprites, если вы уверены в корректности ваших CSS-правил.</p>
									<p>Также можно задать набор изображений, которые будут исключены при создании CSS Sprites (например, logo.png bg.gif).</p>
									<p><a href="http://webo.in/articles/habrahabr/08-all-about-css-sprites/">Техника CSS Sprites</a> и <a href="http://webo.in/articles/habrahabr/89-css-sprites-2.0/">ее автоматизация</a>.</p>');
define('_WEBO_SPLASH2_DATAURI', 'Data:URI');
define('_WEBO_SPLASH2_DATAURI_INFO', '<p>Также возможно перевести все фоновые изображения в формат <code>data:URI</code> (base64-вид). Таким образом при загрузке дизайна сайта будет осуществлен только один HTTP-запрос &mdash; к файлу стилей.</p>
									<p>Внимание: эта техника не поддерживается рядом браузеров (Internet Explorer до 7 версии включительно). Однако для них используются специальные CSS-правила, позволяющие загрузить обычные изображения. Также размер конечного CSS-файла может существенно увеличиться (за счет включения в него самих фоновых изображений).</p>
									<p><a href="http://webo.in/articles/habrahabr/29-all-about-data-url-images/">Техника <code>data:URI</code></a> и <a href="http://webo.in/articles/habrahabr/69-total-image-optimization/">оптимизации изображений</a>.</p>');
define('_WEBO_SPLASH2_PARALLEL', 'Множественные хосты');
define('_WEBO_SPLASH2_PARALLEL_INFO', '<p>Для ускорения процесса отображения страницы в некоторых случаях полезно добавить несколько хостов для статических файлов (изображений), чтобы браузеры могут открыть больше параллельных соединений к серверу.</p>
									<p>Внимание: для обеспечения работы данной настройки необходимо добавить в конфигурационный файл сервера несколько служебных псевдонимов для основного хоста, например: <code>i1.site.ru</code> <code>i2.site.ru</code> <code>i3.site.ru</code> <code>i4.site.ru</code>, &mdash; а также обеспечить их соответствующими записями в DNS (которые бы указывали для этих хостов на тот же IP-адрес).</p>
									<p><a href="http://webo.in/articles/habrahabr/32-parallel-downloads-optimization/">Использование параллельных загрузок</a>.</p>');
define('_WEBO_SPLASH2_HTACCESS', 'Использование .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', '<p>Большая часть настроек <code>gzip</code>-сжатия и кэширования могут быть записаны в конфигурационном файле вашего сервера для избежания дополнительной работы на стороне серверных скриптов. Это может быть проделано с помощью файла <code>.htaccess</code> (при необходимости вы можете впоследствии самостоятельно перенести все настройки в файл <code>httpd.cond</code>).</p>
									<p><a href="http://webo.in/articles/all/mod-gzip-minify-on-fly/">Использование <code>mod_gzip</code></a>, <a href="http://webo.in/articles/all/2009/12-faster-and-cheaper-with-gzip/"><code>mod_deflate</code></a> и <a href="http://webo.in/articles/habrahabr/07-gzip-all/"><code>mod_rewrite</code></a>.</p>
									<p>Доступные модули: ');define('_WEBO_SPLASH2_FOOTER', 'Логотип Веб Оптимізатора');
define('_WEBO_SPLASH2_FOOTER_INFO', 'Веб Оптимізавтор може додати значок оптимізатора із посиланням на сайт проекту. Це може бути як печатка, так і посилання, а також і то, і інше.
									<br/>Включивши цю опцію ви підтримаєте розповсюдження Веб Оптимізатора в маси.');
define('_WEBO_SPLASH2_AUTOCHANGE', 'Автоматичне змінення /index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', 'Веб Оптимізавтор може автоматично внести потрібні зміни в основний файл вашого сайту, який використовує ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' (зміни будуть застосовані тільки для <code>/index.php</code>).
									<br/>УВАГА: для деяких переревірених середовищ і малорозповсюджених CMS це може призвести до непрацездатності сайту.');
define('_WEBO_unobtrusive_on', 'Включити &laquo;ненав\'язливий&raquo; JavaScript');
define('_WEBO_unobtrusive_body', 'Вставить вызов объединенного JavaScript-файла перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers', 'Перенести вызовы JavaScript-информеров перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters', 'Перенести вызовы счетчиков перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads', 'Перенести рекламные вызовы (контекст и банеры) перед <code>&lt;/body&gt;</code>');
define('_WEBO_external_scripts_on', 'Включити об\'єднання зовнішніх файлів');
define('_WEBO_external_scripts_head_end', 'Форсировать размещение объединенного JavaScript-файла перед <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_css', 'Включить объединение внешних CSS-файлов');
define('_WEBO_external_scripts_ignore_list', 'Виключити з об\'єднання файли');
define('_WEBO_minify_javascript', 'Об\'єднати JavaScript-файли');
define('_WEBO_dont_check_file_mtime_on', 'Не перевіряти час зміни файлів');
define('_WEBO_minify_with', 'Мінімізувати JavaScript-файли');
define('_WEBO_minify_with_jsmin', 'Мінімізувати за допомогою JSMin');
define('_WEBO_minify_with_packer', 'Мінімізувати за допомогою Packer');
define('_WEBO_minify_with_yui', 'Мінімізувати за допомогою YUI Compressor');
define('_WEBO_minify_css', 'Мінімізувати і об\'єднати CSS-файли');
define('_WEBO_minify_page', 'Мінімізувати HTML');
define('_WEBO_minify_html_comments', 'Удалить HTML-комментарии');
define('_WEBO_minify_html_one_string', 'Сжать HTML до 1 строки');
define('_WEBO_gzip_javascript', 'Застосувати <code>gzip</code> для JavaScript');
define('_WEBO_gzip_css', 'Застосувати <code>gzip</code> для CSS');
define('_WEBO_gzip_page', 'Застосувати <code>gzip</code> для HTML');
define('_WEBO_far_future_expires_javascript', 'Кешуровати JavaScript');
define('_WEBO_far_future_expires_css', 'Кешуровати CSS');
define('_WEBO_far_future_expires_static', 'Кешуровати статические файлы');
define('_WEBO_far_future_expires_html', 'Кэшировать HTML');
define('_WEBO_far_future_expires_html_timeout', 'Время клиентского кэша для HTML-файлов');
define('_WEBO_html_cache_enabled', 'Кешувати створені HTML-файли');
define('_WEBO_html_cache_timeout', 'Термін дії кеша в секундах');
define('_WEBO_html_cache_flush_only', 'Включить только быстрый сброс части документа');
define('_WEBO_html_cache_flush_size', 'Размер сбрасываемой части документа (в байтах)');
define('_WEBO_html_cache_ignore_list', 'Список частей URL для исключения при кэшировании');
define('_WEBO_html_cache_allowed_list', 'Список частей USER AGENTS (роботов) для включения при кэшировании');
define('_WEBO_footer_text', 'Додати посилання на Веб Оптимізатор');
define('_WEBO_footer_image', 'Додати зображення Веб Оптимізатора');
define('_WEBO_data_uris_on', 'Застосувати <code>data:URI</code>');
define('_WEBO_data_uris_smushit', 'Оптимизировать все CSS-изображения через smush.it');
define('_WEBO_css_sprites_enabled', 'Застосувати CSS Sprites');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Зберігати повнокольорові зображення в JPEG');
define('_WEBO_css_sprites_aggressive', '&laquo;Агресивний&raquo; режим створення CSS Sprites');
define('_WEBO_css_sprites_extra_space', 'Додати вільне місце в CSS Sprites');
define('_WEBO_css_sprites_no_ie6', 'Виключити IE6 (через хаки) із процесу створення CSS Sprites');
define('_WEBO_css_sprites_memory_limited', 'Обмежити використання пам\'яті для PHP-процесу');
define('_WEBO_css_sprites_dimensions_limited', 'Исключить изображения, если их линейный размер больше заданного');
define('_WEBO_css_sprites_ignore_list', 'Виключити із CSS Sprites файли');
define('_WEBO_parallel_enabled', 'Включить параллельные хосты, например, i1 i2');
define('_WEBO_parallel_allowed_list', 'Доступные хосты');
define('_WEBO_htaccess_enabled', 'Включити <code>.htaccess</code>');
define('_WEBO_htaccess_mod_deflate', 'Использовать <code>mod_deflate</code>');
define('_WEBO_htaccess_mod_gzip', 'Использовать <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_expires', 'Использовать <code>mod_expires</code>');
define('_WEBO_htaccess_mod_headers', 'Использовать <code>mod_headers</code>');
define('_WEBO_htaccess_mod_setenvif', 'Использовать <code>mod_setenvif</code>');
define('_WEBO_htaccess_mod_mime', 'Использовать <code>mod_mime</code>');
define('_WEBO_htaccess_mod_rewrite', 'Использовать <code>mod_rewrite</code>');
define('_WEBO_htaccess_local', 'Расположить <code>.htaccess</code> в локальной (не корневой) директории');
define('_WEBO_htaccess_access', 'Защитить установку Веб Оптимизатора с помощью <code>htpasswd</code>');
define('_WEBO_auto_rewrite_enabled', 'В\ключити авто-запис');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', 'Установка - третій крок');
define('_WEBO_SPLASH3_SAVED', 'Ваші налаштування були успішно збережені.');
define('_WEBO_SPLASH3_REWRITE', 'Прискорення сайтц проведено успішно');
define('_WEBO_SPLASH3_REWRITE_SHORT', 'Ускорение сайта проведено');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Необходимые изменения');
define('_WEBO_SPLASH3_TESTING_SHORT', 'Дополнительное ускорение');
define('_WEBO_SPLASH3_SECURITY_SHORT', 'Безопасность');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'Ваш сайт, який використовує ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ', був успішно прискорений. Ви можете <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">перевірити результат, що вийшов</a>.');
define('_WEBO_SPLASH3_WORKING', 'Начебто все працює. А далі?');
define('_WEBO_SPLASH3_ADD', 'Ви повинні додати виклик Веб Оптимізатора до ваших серверних скриптів. Це буде значно простіше, якщо у вас є 1 файл, який обслуговує всі інші сторінки, таким чином вам потрібно буде змінити тільки його.');
define('_WEBO_SPLASH3_MODIFY', 'Як потрібно змінити ваш файл');
define('_WEBO_SPLASH3_TOFILE', 'В файл');
define('_WEBO_SPLASH3_TOFILE2', 'В самое начало файла');
define('_WEBO_SPLASH3_TOFILE3', 'В самый конец файла');
define('_WEBO_SPLASH3_AFTERSTRING', 'после строки');
define('_WEBO_SPLASH3_ADD2', 'добавить');
define('_WEBO_SPLASH3_TESTING', 'Тепер трохи тестування...');
define('_WEBO_SPLASH3_NOTLIVE', 'Насправді у вас досить великий простір дій. Ви можете провести будь-які зміни в конфігурації Веб Оптимізатора (але краще їх проводити на тестовому сайті) для досягнення оптимальної продуктивності. Для змінення налаштувань потрібно:');
define('_WEBO_SPLASH3_MANUALLY', 'Вручну змінити файл <code>config.webo.php</code>, який знаходиться за цим шляхом:<code>');
define('_WEBO_SPLASH3_MANUALLY2', 'config.webo.php</code>');
define('_WEBO_SPLASH3_AGAIN', 'І <a href="');
define('_WEBO_SPLASH3_AGAIN2', '">запустити установку спочатку</a>. Всі нові опції будуть автоматично завантажені,перевірені та збережені.');
define('_WEBO_SPLASH3_SECURITY', 'Додаткова безпека');
define('_WEBO_SPLASH3_ALTHOUGH', 'Хоча під час встановлення і конфігурування використовується логін та пароль, ви можете видалити <code>');
define('_WEBO_SPLASH3_ALTHOUGH2', 'install.php</code> для забезпечення додаткової безпеки вашого сайту.');
define('_WEBO_SPLASH3_FINISH', 'Закінчити установку');
define('_WEBO_SPLASH3_CANTWRITE', 'Не вдається записати у вказану вами директорію ');
define('_WEBO_SPLASH3_CANTWRITE2', '. Будь-ласка, перевірте існування вашої директорії і доступ на її запис.');
define('_WEBO_SPLASH3_CANTWRITE3', 'Ви можете зробити це також через свій FTP-клієнт. Для цього потрібно перейти в директорію, зайти в її властивості або виконати CHMOD 775 aбо CHMOD 777.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Після того, як ви усунете цю проблему, будь-ласка, перезавантажте сторінку.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Будь-ласка, переконайтеся в тому, що коренева папка вашого сайту доступна для читання і запису для вашого веб-серверу.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', 'Для цього виконайте CHMOD 775, aбо CHMOD 777, або створіть в корені файл <code>.htaccess</code>, доступний для читання і запису для вашого веб-серверу, або дозвольте читання і запис для поточного файлу <code>.htaccess</code> (CHMOD 664).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Будь-ласка, переконайтеся, що коренева папка вашого сайту доступна для запису для вашого веб-серверу або в ній існує доступний для запису файл <code>.htaccess</code>.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Виконайте для директорії CHMOD 775 aбо CHMOD 777, або створіть в корені файл <code>.htaccess</code>, доступний для запису для вашого веб-серверу, або дозвольте запис для поточного файлу <code>.htaccess</code> (CHMOD 664 aбо CHMOD 777).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'Будь-ласка, переконайтеся, що Веб Оптимізатор був проінстальований в');
define('_WEBO_SPLASH3_CONFSAVED', 'Конфігурація збережена');
define('_WEBO_SPLASH3_CONFIGERROR', 'Неможливо відкрити для запису конфігураційний файл. Будь-ласка, змініть права доступу для файлу <code>config.webo.php</code> Веб Оптимізатора, щоб він був доступний для запису для вашого веб-серверу.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'Ви можете це зробити за допомогою вашого FTP-клієнта. Для цього просто перейдіть в директорію <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , потім увійдіть до властивостей файлу або виконайте CHMOD. Встановіть у 775 або 777, або "write"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'Після того, як ви усунете цю проблему, будь-ласка, перезавантажте сторінку.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'Конфігураційний файл не знайдений. Будь-ласка, завантажте Веб Оптимізатор повністю за адресою <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');

?>