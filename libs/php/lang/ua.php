<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://www.web-optimizer.us/)
 * Contains all UA localization constants
 * Translated by Sergiy Andriychuk
 * http://crazyyy.net.ua/2009/07/ustanovka-web-optimizer.html
 **/

/* general layout */
define('_WEBO_CHARSET', "utf-8");
define('_WEBO_GENERAL_TITLE', 'Конфігурація Web Optimizer');
define('_WEBO_GENERAL_FOOTER', 'Швидше блискавки!');
define('_WEBO_GENERAL_BUYNOW', '<a href="http://www.web-optimizer.us">Купить полную версию</a>');
define('_WEBO_GENERAL_IMAGE', '<img src="http://web-optimizator.googlecode.com/svn/trunk/images/web.optimizer.logo.small.png" alt="Web Optimizer" title="Web Optimizer" width="151" height="150"/>');
define('_WEBO_GENERAL_DEMOVERSION', 'Демонстрационная версия');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Хмм... у нас виникла проблема');
define('_WEBO_ERROR_ERROR', 'Щось пішло не так!');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Введіть ваші авторизаційні дані');
define('_WEBO_LOGIN_INSTALLED', 'Для цього сайту Веб Оптимизатор ');
define('_WEBO_LOGIN_INSTALLED2', ' вже встановлений. Будь-ласка, введіть ваш логін та пароль для доступу до всіх налаштувань:');
define('_WEBO_LOGIN_INSTALLED3', '. Для доступу до всіх налаштувань натисніть кнопку <strong>Далі</strong>.');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>Увага:</strong> не вдається знайти результат роботи Web Optimizer. Будь-ласка, перевірте наявність його викликів у файлах вашої веб-системи або проведіть установку ще раз.');
define('_WEBO_LOGIN_EFFICIENCY', 'Результат оптимізації при показі сторінки:<br/>виграш');
define('_WEBO_LOGIN_EFFICIENCY_KB', 'Кб');
define('_WEBO_LOGIN_EFFICIENCY_S', 'секунд');
define('_WEBO_LOGIN_USERNAME', 'Логін');
define('_WEBO_LOGIN_ENTERLOGIN', 'Введіть ваш логін');
define('_WEBO_LOGIN_PASSWORD', 'Пароль');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Введіть пароль');
define('_WEBO_LOGIN_LICENSE', 'Лицензионный ключ');
define('_WEBO_LOGIN_ENTERLICENSE', 'Введите ваш лицензионный ключ');
define('_WEBO_SPLAHS1_PROTECTED', 'Захищений режим');
define('_WEBO_SPLAHS1_PROTECTED2', 'Web Optimizer надійно захищає від зовнішнього доступу. Ви можете налаштувати його ще раз.');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Обновити');
define('_WEBO_LOGIN_UPGRADENOTICE', 'Ви можете обновити вашу поточну версію Web Optimizer (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') до найостаннішої. Для цього введіть ваш логін і пароль в формі вище і натисніть кнопку <strong>Поновити</strong>. Web Optimizer буде автоматично обновлений до версії <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_UPGRADE_SUCCESSFULL', 'Ви успішно обновились до версії ');
define('_WEBO_UPGRADE_SUCCESSFULL2', '');
define('_WEBO_UPGRADE_UNABLE', 'Не вдається завантажити останню версію з репозиторію. Будь-ласка, перевірте з\'єднання серверу з інтернетом та наявність встановленого curl.');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', 'Щоб видалити Web Optimizer, будь-ласка, введіть ваш логін та пароль у формі вище та натисніть кнопку <strong>Видалити</strong>.');
define('_WEBO_LOGIN_UNINSTALL2', 'Для вашого сайту Web Optimizer може бути відключений. Для цього його необхідно просто видалити.');
define('_WEBO_LOGIN_UNINSTALLME', 'Видалити Web Optimizer');
define('_WEBO_LOGIN_FAILED', 'Невірно введений логін та(або) пароль');
define('_WEBO_LOGIN_ACCESS', 'Ця сторінка доступна тільки авторизованим користувачам');
define('_WEBO_LOGIN_LOGGED', 'Увійшли в систему');
define('_WEBO_SPLASH1_CLEAR', 'Очистити кеш');
define('_WEBO_SPLASH1_CLEAR_CACHE', 'Щоб очистити кеш Web Optimizer, будь-ласка, введіть ваш логін і пароль та натисніть кнопку <strong>Очистити кеш</strong>. ');
define('_WEBO_SPLASH1_CLEAR_CACHE2', 'Всі збережені копії створених файлів будуть видалені з директорії для кешування.');
define('_WEBO_CLEAR_UNABLE', 'Не виходить видалити деякі файли з директорії для кешування');
define('_WEBO_CLEAR_SUCCESSFULL', 'Всі файли були успішно видалені з кеша');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Установка - обмеження доступу');
define('_WEBO_NEW_PROTECT', '<p>Для забезпечення безпеки при подальшому використанні Web Optimizer необхідно встановили пароль доступу. <strong>Демонстрационная версия</strong> устанавливается без лицензионного ключа.</p>
							<p>Перед проведенням установки, будь-ласка, переконайтеся, що кореневий <code>.htaccess</code>і файли веб-системи, яка використовується, доступні на запис (при проведенні установки Web Optimizer також створює резервні копії).</p>
							<p>Web Optimizer може самостійно перевірити доступні можливості вашего серверу і провести установку в автоматичному режимі. Для цього необхідно обрати <strong>&laquo;Швидка установка&raquo;</strong>. В подальшому ви зможете змінити всі збережені налаштування, використовуючи даний інтерфейс.</p>
							<p>Якщо Ви хочете налаштувати використання Web Optimizer самостійно, то необхідно обрати <strong>&laquo;Далі&raquo;</strong>. Ви зможете перевірити всі налаштування до їх застосування для вашого сайту.</p>
							<p><a href="http://webo.in/articles/habrahabr/99-web-optimizer-installation-0.5/">Процес установки Web Optimizer</a></p>');
define('_WEBO_NEW_USERDATA', 'Ваш логін та пароль');
define('_WEBO_NEW_ENTER', 'Встановіть ваш логін та пароль');
define('_WEBO_NEW_ORDERINSTALLATION', 'Заказать установку и настройку Web Optimizer для вашего сайта');
define('_WEBO_NEW_NOSCRIPT', 'Для корректной работы с приложением требуется включенный JavaScript!');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Видалити');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'Видалення');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Дякуємо за використання <a href="http://www.web-optimizer.us/">Web Optimizer</a>. Ви можете встановити його знову в будь-який момент, якщо зайдете на <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">сторінку Web Optimizer</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Ми будемо раді бачити ваші відгуки про систему на <a href="http://code.google.com/p/web-optimizator/">сайті Web Optimizer</a>, ви також можете відправити<a href="http://code.google.com/p/web-optimizator/issues/list">будь-які проблемні запитання</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Тепер можна повернутися назад до <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">вашого сайту</a>.');
define('_WEBO_SPLASH1_NEXT', 'Далі');
define('_WEBO_SPLASH1_BACK', 'Назад');
define('_WEBO_SPLASH1_EXPRESS', 'Швидка установка');

/* Change password */
define('_WEBO_PASSWORD_TITLE', 'Смена пароля');
define('_WEBO_PASSWORD_INSTALLED', 'Для данного сайта уже установлен Web Optimizer. Вы можете сменить пароль доступа к его функциям администрирования: Изменения настроек, Удаления файлов из кэша, Обновления, Отключения и Удаления.');
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
define('_WEBO_SPLASH2_TITLE', 'Установка - другий крок');
define('_WEBO_SPLASH2_OPTIONS', 'Налаштування Web Optimizer');
define('_WEBO_SPLASH2_CACHE', 'Директорії кешування');
define('_WEBO_SPLASH2_CACHE_JS', 'JavaScript-файли будуть розміщуватися в');
define('_WEBO_SPLASH2_CACHE_CSS', 'CSS-файли будуть розміщуватися в');
define('_WEBO_SPLASH2_CACHE_HTML', 'HTML-файли будуть розміщуватися в');
define('_WEBO_SPLASH2_INSTALLDIR', 'Web Optimizer розміщений в');
define('_WEBO_SPLASH2_DOCUMENTROOT', 'Сайт розміщений в');
define('_WEBO_SPLASH2_HOST', 'Адрес сайта, например, site.com.ua');
define('_WEBO_SPLASH2_SPACE', 'Будь-лайска, через пробіл:');
define('_WEBO_SPLASH2_YES', 'Так:');
define('_WEBO_SPLASH2_NO', 'Ні:');
define('_WEBO_SPLASH2_UNABLE', 'Неможливо відкрити');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>Будь-ласка, переконайтеся, що такая директорія існує і вона розміщена в корені сайту.');
/* Web Optimizer options */
define('_WEBO_SPLASH2_MINIFY', 'Настройки стискання');
define('_WEBO_SPLASH2_MINIFY_INFO', '<p>Стиснення видаляє із CSS- та JavaScript-файлів пробіли, переводи рядків та інші непотрібні символи.</p>
									<p>Ви також можете обрати один із декількох інструментів мінімізації або обфускації.</p>
									<p>Будьте внимательными при удалении HTML-комментариев или применении сжатия в одну строку, первое может привести к удалению кодов счетчиков, а второе увеличит нагрузку на сервер каждый раз при создании страницы.</p>
									<p><a href="http://webo.in/articles/habrahabr/14-minifing-css/">Стиснення CSS-</a> та <a href="http://webo.in/articles/habrahabr/11-minifing-javascript/">JavaScript-файлів</a>.</p>');
define('_WEBO_SPLASH2_EXTERNAL', 'Включити зовнішні файли');
define('_WEBO_SPLASH2_EXTERNAL_INFO', '<p>При активації цієї настройки всі JavaScript-файли, що підключаються із зовнішніх сайтів, так само як і просто JavaScript-код, який знаходиться в секції <code>head</code>, будуть об\'єднані в один файл, зменшені у розмірі і підключені відразу після CSS-файлу.</p>
									<p>Це буде особливо корисним при використанні великої кількості модулів з різних сайтів, які не можуть бути підключені в &laquo;ненав\'язливому&raquo; режимі.</p>
									<p>Ви також можете вказати імена файлів, які потрібно виключити з подібного об\'єдинання (наприклад, ga.js jquery.min.js).</p>
									<p><a href="http://webo.in/articles/habrahabr/50-fast-fast-javascript/">Методи прискорення завантаження JavaScript</a>.</p>');
define('_WEBO_SPLASH2_UNOBTRUSIVE', '&laquo;Ненав\'язливий&raquo; JavaScript');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '<p>&laquo;Ненав\'язливий&raquo; JavaScript-файли завантажуються відразу після відображення сторінки в браузері. Його використання може значно збільшити швидкість завантаження сторінки для кінцевих користувачів. Але в деяких випадках це може порушити працездатність сайту.</p>
									<p>Рекомендується включати цю настройку тілько у випадку повної впевненості в існуючій клієнтській логіці.</p>
									<p>Також існує можливість перенести всі виклики зовнішніх JavaScript-файлів перед <code>&lt;/body&gt;</code>.</p>
									<p><a href="http://webo.in/articles/all/04-unobtrusive-javascript-operation-clean-up/">Техніка &laquo;ненав\'язливого&raquo; JavaScript</a>, <a href="http://webo.in/articles/habrahabr/44-unobtrusive-advertisements-basics/">&laquo;ненав\'язлива&raquo; реклама і лічильники</a>, <a href="http://webo.in/articles/habrahabr/56-non-blocking-javascript/">блокуючі скріпти</a> та <a href="http://webo.in/articles/habrahabr/05-delayed-loading/">&laquo;відкладене&raquo; завантаження</a>.</p>');
define('_WEBO_SPLASH2_MTIME', 'Не перевіряти актуальність');
define('_WEBO_SPLASH2_MTIME_INFO', '<p>Як правило, Web Optimizer при кожному завантаженні сторінки перевіряє, чи змінились файли (час зміни та їх вміст), і на основі цієї інформації або дає лінки на існуючі статичні файли, або створює нові.</p>
									<p>З точки зору серверної оптимізації більш оптимально буде не перевіряти кожного разу, чи змінились файли, а видаляти по факту самої зміни закешовану версію. Із включенням цієї настройки вам буде необхідно самостійно управляти кешем Web Optimizer.</p>
									<p><a href="http://webo.in/articles/all/10-frontend-backend-balancing/">Вплив кількості файлов, що підключаються, на швидкість завантаження</a>.</p>');
define('_WEBO_SPLASH2_GZIP', 'Настройки аархівування');
define('_WEBO_SPLASH2_GZIP_INFO', '<p>Застосування <code>gzip</code>-стискання дозволить на 80-85% зменшити розмір текстових файлів.</p>
									<p>Для завантажених сайтів рекомендується настройки <code>gzip</code>-стискання перенести в конфігураційний файл сервера (або використовувати настройки <code>.htaccess</code> нижче).</p>
									<p><a href="http://webo.in/articles/habrahabr/30-gzip-versus-broadband/">Ресурсоємність</a> та <a href="http://webo.in/articles/habrahabr/33-gzip-level-tool/">ефективність gzip-стискання</a>.</p>');
define('_WEBO_SPLASH2_EXPIRES', 'Клієнтське кешування');
define('_WEBO_SPLASH2_EXPIRES_INFO', '<p>В результаті роботи цієї настройки до всіх статичних файлів будуть додані заголовки кешування, які дозволять запобігти їх повторному запросу із сервера для одного і того ж користувача.</p>
									<p>При зміні JavaScript- або CSS-файлів автоматично будуть створюватися їх нові мінімізовані версії, що дозволить &laquo;пробити&raquo; кеш в браузерах. Для малюнків та інших статичних файлів рекомендується використовувати нове фізичне ім\'я при їх зміні.</p>
									<p><a href="http://webo.in/articles/all/http-caching/">Кешування </a> та <a href="http://webo.in/articles/habrahabr/15-yahoo-best-practices/#expires">його ефективність</a>.</p>');
define('_WEBO_SPLASH2_HTMLCACHE', 'Серверне кешування');
define('_WEBO_SPLASH2_HTMLCACHE_INFO', '<p>Web Optimizer може кешувати кінцевий HTML-код, чим відвертає значну частину роботи на стороні сервера і зменшує час створення сторінки.</p>
									<p>Увага: при включенні цієї настройки вся логіка, що здійснюється на стороні серверу, буде недоступна. Сторінки стануть повністю статичними. Рекомендуєтся включати цю настройку, тільки якщо ви повністю впевнені у наслідках.</p>
									<p><a href="http://webo.in/articles/all/2009/16-content-flushing/">Швидке скидання документу</a> та <a href="http://webo.in/articles/habrahabr/34-streaming-chunking-finding-end/">чанки</a>.</p>');
define('_WEBO_SPLASH2_SPRITES', 'CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', '<p>Існує можливість об\'єднати більшість фоновых зображень в CSS Sprites. Це суттєво зменшить кількість HTTP-запросів при завантаженні сайту.</p>
									<p>Ця техніка повністю підтримується всіма сучасними браузерами. Ви також можете переключитися в більш агресивний режим використання CSS Sprites, якщо впевнені в коректності ваших CSS-правил.</p>
									<p>Також можна задати набір зображень, які будуть виключені при створенні CSS Sprites (наприклад, logo.png bg.gif).</p>
									<p><a href="http://webo.in/articles/habrahabr/08-all-about-css-sprites/">Техніка CSS Sprites</a> та <a href="http://webo.in/articles/habrahabr/89-css-sprites-2.0/">її автоматизація</a>.</p>');
define('_WEBO_SPLASH2_DATAURI', 'Data:URI');
define('_WEBO_SPLASH2_DATAURI_INFO', '<p>Також є можливість перевести всі фонові зображення у формат <code>data:URI</code> (base64-вид). Таким чином при завантаженні дизайну сайта буде здійснений тілько один HTTP-запрос &mdash; до файлу стилів.</p>
									<p>Увага: ця техніка не пфдтримується рядом браузеров (Internet Explorer до 7 версії включно). проте для них використовуються спеціальні CSS-правила, які дозволяють завантажити звичайні зображення. Також розмір кінцевого CSS-файлу може суттєво збільшитися (за рахунок включення в нього самих фонових зображень).</p>
									<p><a href="http://webo.in/articles/habrahabr/29-all-about-data-url-images/">Техніка <code>data:URI</code></a> та <a href="http://webo.in/articles/habrahabr/69-total-image-optimization/">оптимізація зображень</a>.</p>');
define('_WEBO_SPLASH2_PARALLEL', 'Множинні хости');
define('_WEBO_SPLASH2_PARALLEL_INFO', '<p>Для прискорення процесу відображення сторінки в деяких випадках корисно додати декілька хостів для статичних файлів (зображень), щоб браузери могли відкрити більше паралельних з\'єднань із сервером.</p>
									<p>Увага: для забезпечення роботи даної настройки необхідно додати в конфігураційний файл серверу декілька службових псевдонімів для основного хосту, наприклад: <code>i1.site.ru</code> <code>i2.site.ru</code> <code>i3.site.ru</code> <code>i4.site.ru</code>, &mdash; а також забезпечити їх відповідними записами в DNS (які б вказували для цих хостів на ту ж IP-адресу).</p>
									<p>При отключении автоматической проверки, пожалуйтса, убедитесь, что указанные(-й) хост(ы) существуют, иначе статические ресурсы на вашем сайте нельзя будет загрузить.</p>
									<p><a href="http://webo.in/articles/habrahabr/32-parallel-downloads-optimization/">Використання паралельних завантажень</a>.</p>');
define('_WEBO_SPLASH2_HTACCESS', 'Використання .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', '<p>Більша частина налаштувань <code>gzip</code>-стискання і кешування можуть бути записані в конфігураційному файлі вашого серверу для запобігання додаткової роботи на стороні серверних скриптів. Це може бути пророблено за допомогою файлу <code>.htaccess</code> (при необхідності ви можете пізніше самостійно перенести всі настройки в файл <code>httpd.cond</code>).</p>
									<p><a href="http://webo.in/articles/all/mod-gzip-minify-on-fly/">Використання <code>mod_gzip</code></a>, <a href="http://webo.in/articles/all/2009/12-faster-and-cheaper-with-gzip/"><code>mod_deflate</code></a> та <a href="http://webo.in/articles/habrahabr/07-gzip-all/"><code>mod_rewrite</code></a>.</p>
									<p>Доступні модулі: ');
define('_WEBO_SPLASH2_FOOTER', 'Логотип Web Optimizer');
define('_WEBO_SPLASH2_FOOTER_INFO', 'Веб Оптимізавтор може додати значок оптимізатора із посиланням на сайт проекту. Це може бути як печатка, так і посилання, а також і то, і інше.
									<br/>Включивши цю опцію ви підтримаєте розповсюдження Web Optimizer в маси.');
define('_WEBO_SPLASH2_AUTOCHANGE', 'Автоматичне змінення /index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', 'Веб Оптимізавтор може автоматично внести потрібні зміни в основний файл вашого сайту, який використовує ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' (зміни будуть застосовані тільки для <code>/index.php</code>).
									<br/>УВАГА: для деяких переревірених середовищ і малорозповсюджених CMS це може призвести до непрацездатності сайту.');
define('_WEBO_unobtrusive_on', 'Включити &laquo;ненав\'язливий&raquo; JavaScript');
define('_WEBO_unobtrusive_body', 'Вставити виклик об\'єднаного JavaScript-файлу перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers', 'Перенести виклики JavaScript-інформерів перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters', 'Перенести виклики лічильників перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads', 'Перенести рекламні виклики (контекст і банери) перед <code>&lt;/body&gt;</code>');
define('_WEBO_external_scripts_on', 'Включити об\'єднання зовнішніх файлів');
define('_WEBO_external_scripts_head_end', 'Форсувати розміщення об\'єднаного JavaScript-файлу перед <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_css', 'Включити об\'єднання зовнішніх CSS-файлів');
define('_WEBO_external_scripts_ignore_list', 'Виключити з об\'єднання файли');
define('_WEBO_minify_javascript', 'Об\'єднати JavaScript-файли');
define('_WEBO_performance_mtime', 'Не перевіряти час зміни файлів');
define('_WEBO_minify_with', 'Мінімізувати JavaScript-файли');
define('_WEBO_minify_with_jsmin', 'Мінімізувати за допомогою JSMin');
define('_WEBO_minify_with_packer', 'Мінімізувати за допомогою Packer');
define('_WEBO_minify_with_yui', 'Мінімізувати за допомогою YUI Compressor');
define('_WEBO_minify_css', 'Мінімізувати і об\'єднати CSS-файли');
define('_WEBO_minify_page', 'Мінімізувати HTML');
define('_WEBO_minify_html_comments', 'Видалити HTML-коментарі');
define('_WEBO_minify_html_one_string', 'Стиснути HTML до 1 рядка');
define('_WEBO_gzip_javascript', 'Застосувати <code>gzip</code> для JavaScript');
define('_WEBO_gzip_css', 'Застосувати <code>gzip</code> для CSS');
define('_WEBO_gzip_page', 'Застосувати <code>gzip</code> для HTML');
define('_WEBO_gzip_cookie', 'Перевіряти можливість <code>gzip</code> через cookie');
define('_WEBO_far_future_expires_javascript', 'Кешувати JavaScript');
define('_WEBO_far_future_expires_css', 'Кешувати CSS');
define('_WEBO_far_future_expires_images', 'Кешувати зображення');
define('_WEBO_far_future_expires_video', 'Кешувати видео-файли');
define('_WEBO_far_future_expires_static', 'Кешувати статичні файли');
define('_WEBO_far_future_expires_html', 'Кешувати HTML');
define('_WEBO_far_future_expires_html_timeout', 'Час клієнтського кешу для HTML-файлів');
define('_WEBO_html_cache_enabled', 'Кешувати створені HTML-файли');
define('_WEBO_html_cache_timeout', 'Термін дії кеша в секундах');
define('_WEBO_html_cache_flush_only', 'Включити тільки швидке скидання частини документу');
define('_WEBO_html_cache_flush_size', 'Розмір частини документа, що скидається (в байтах)');
define('_WEBO_html_cache_ignore_list', 'Перелік частин URL для виключення при кешуванні');
define('_WEBO_html_cache_allowed_list', 'Список частин USER AGENTS (роботів) для включення при кешуванні');
define('_WEBO_footer_text', 'Додати посилання на Web Optimizer');
define('_WEBO_footer_image', 'Додати зображення Web Optimizer');
define('_WEBO_data_uris_on', 'Застосувати <code>data:URI</code>');
define('_WEBO_data_uris_size', 'Максимальный размер изображения (в байтах)');
define('_WEBO_data_uris_smushit', 'Оптимізувати всі CSS-зображення через smush.it');
define('_WEBO_css_sprites_enabled', 'Застосувати CSS Sprites');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Зберігати повнокольорові зображення в JPEG');
define('_WEBO_css_sprites_aggressive', '&laquo;Агресивний&raquo; режим створення CSS Sprites');
define('_WEBO_css_sprites_extra_space', 'Додати вільне місце в CSS Sprites');
define('_WEBO_css_sprites_no_ie6', 'Виключити IE6 (через CSS-хаки)');
define('_WEBO_css_sprites_memory_limited', 'Обмежити використання пам\'яті для PHP-процесу');
define('_WEBO_css_sprites_dimensions_limited', 'Исключить изображения, если их линейный размер больше заданного');
define('_WEBO_css_sprites_ignore_list', 'Виключити із CSS Sprites файли');
define('_WEBO_parallel_enabled', 'Включити паралельні хости, наприклад, i1 i2');
define('_WEBO_parallel_check', 'Автоматично перевіряти доступність хостів');
define('_WEBO_parallel_allowed_list', 'Доступні хости');
define('_WEBO_htaccess_enabled', 'Включити <code>.htaccess</code>');
define('_WEBO_htaccess_mod_deflate', 'Використовувати <code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_htaccess_mod_gzip', 'Використовувати <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_expires', 'Використовувати <code>mod_expires</code>');
define('_WEBO_htaccess_mod_headers', 'Використовувати <code>mod_headers</code>');
define('_WEBO_htaccess_mod_setenvif', 'Використовувати <code>mod_setenvif</code>');
define('_WEBO_htaccess_mod_mime', 'Використовувати <code>mod_mime</code>');
define('_WEBO_htaccess_mod_rewrite', 'Використовувати <code>mod_rewrite</code>');
define('_WEBO_htaccess_local', 'Розмістити <code>.htaccess</code> в локальній (не кореневій) директорії');
define('_WEBO_htaccess_access', 'Захистити установку Web Optimizer за допомогою <code>htpasswd</code>');
define('_WEBO_auto_rewrite_enabled', 'В\ключити авто-запис');

/* Version comparison */
define('_WEBO_SPLASH2_COMPARISON', 'Ограничения демо-версии');
define('_WEBO_SPLASH2_COMPARISON_TITLE', 'Аспекты технологии');
define('_WEBO_SPLASH2_COMPARISON_DEMO', 'Демо-версия');
define('_WEBO_SPLASH2_COMPARISON_FULL', 'Полная версия');
define('_WEBO_SPLASH2_COMPARISON_SUPPORT', 'Техническая поддержка');
define('_WEBO_SPLASH2_COMPARISON_CPU', 'Процессорные затраты');
define('_WEBO_SPLASH2_COMPARISON_CPU_MS', 'мс');
define('_WEBO_SPLASH2_COMPARISON_UPTO', 'экономия до');
define('_WEBO_SPLASH2_COMPARISON_UPTO2', 'на');
define('_WEBO_SPLASH2_COMPARISON_TRAFFIC', 'трафика');
define('_WEBO_SPLASH2_COMPARISON_LOAD', 'загрузки процессора');
define('_WEBO_SPLASH2_COMPARISON_REQUESTS', 'HTTP-запросов');
define('_WEBO_SPLASH2_COMPARISON_SAVED', 'процессорного времени');
define('_WEBO_SPLASH2_COMPARISON_ACCELERATION', 'быстрее загрузка сайта');
define('_WEBO_SPLASH2_COMPARISON_NOTINCLUDED', 'отсутствует');
define('_WEBO_SPLASH2_COMPARISON_ALLBENEFITS', 'Все преимущества');
define('_WEBO_SPLASH2_COMPARISON_PRICE', 'Цена');
define('_WEBO_SPLASH2_COMPARISON_FREE', 'бесплатно');
define('_WEBO_SPLASH2_COMPARISON_FULLPRICE', '1999 руб.');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', 'Установка - третій крок');
define('_WEBO_SPLASH3_SAVED', 'Ваші налаштування були успішно збережені.');
define('_WEBO_SPLASH3_REWRITE', 'Прискорення сайтц проведено успішно');
define('_WEBO_SPLASH3_REWRITE_SHORT', 'Прискорення сайту проведено');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Необхідні зміни');
define('_WEBO_SPLASH3_TESTING_SHORT', 'Тестування');
define('_WEBO_SPLASH3_SECURITY_SHORT', 'Безпека');
define('_WEBO_SPLASH3_ADDITIONAL_SHORT', 'Додаткове прискорення');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'Ваш сайт, який використовує ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ', був успішно прискорений. Ви можете <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">перевірити результат, який вийшов</a>.');
define('_WEBO_SPLASH3_WORKING', 'Начебто все працює. А далі?');
define('_WEBO_SPLASH3_ADD', 'Ви повинні <a href="#modify">додати виклик Web Optimizer</a> до ваших серверних скриптів (');
define('_WEBO_SPLASH3_ADD_', '). Це буде значно простіше, якщо у вас є 1 файл, який обслуговує всі інші сторінки, таким чином вам потрібно буде змінити тільки його.');
define('_WEBO_SPLASH3_MODIFY', 'Як потрібно змінити ваш файл');
define('_WEBO_SPLASH3_TOFILE', 'У файл');
define('_WEBO_SPLASH3_TOFILE2', 'На початок файлу');
define('_WEBO_SPLASH3_TOFILE3', 'На кінець файлу');
define('_WEBO_SPLASH3_AFTERSTRING', 'після пядка');
define('_WEBO_SPLASH3_ADD2', 'додати');
define('_WEBO_SPLASH3_TESTING', 'Тепер трохи тестування...');
define('_WEBO_SPLASH3_NOTLIVE', 'Насправді у вас досить великий простір дій. Ви можете провести будь-які зміни в конфігурації Web Optimizer (але краще їх проводити на тестовому сайті) для досягнення оптимальної продуктивності. Для змінення налаштувань потрібно:');
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
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'Будь-ласка, переконайтеся, що Web Optimizer був проінстальований в');
define('_WEBO_SPLASH3_CONFSAVED', 'Конфігурація збережена');
define('_WEBO_SPLASH3_CONFIGERROR', 'Неможливо відкрити для запису конфігураційний файл. Будь-ласка, змініть права доступу для файлу <code>config.webo.php</code> Web Optimizer, щоб він був доступний для запису для вашого веб-серверу.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'Ви можете це зробити за допомогою вашого FTP-клієнта. Для цього просто перейдіть в директорію <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , потім увійдіть до властивостей файлу або виконайте CHMOD. Встановіть у 775 або 777, або "write"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'Після того, як ви усунете цю проблему, будь-ласка, перезавантажте сторінку.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'Конфігураційний файл не знайдений. Будь-ласка, завантажте Web Optimizer повністю за адресою <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');
define('_WEBO_SPLASH3_ADDITIONAL', 'Налаштуваня оптимальної швидкодії');
define('_WEBO_SPLASH3_ADDITIONAL_INFO', 'Ви можете провести додаткові зміни на вашому сайті, які дозволять використовувати Web Optimizer більш ефективно. До числа таких змін можна віднести:');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_1', '<strong>Сделайте ваш сайт соответствующим спецификациям (HTML, JavaScript и CSS).</strong> Нестандартные вызовы файлов и некорректный код приводит к различному рода ошибкам и ограничение функциональности Web Optimizer.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_2', '<strong>Винесіть всі JavaScript- і CSS-файли, необхідні для завантаження сайту, в <code>head</code>-секцію сторінки.</strong> Це дозволить Web Optimizer управляти їх об\'єднанням і стисненням.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_3', '<strong>Підключіть множинні хости для вашого сайту.</strong> Для цього в DNS необхідно вказати <code>* IN A IP_адресу_вашого_серверу</code>, підключити відповідні піддомени (наприклад, <code>i1</code> <code>i2</code> <code>i3</code> <code>i4</code>) і провести установку спочатку. Web Optimizer самостійно виявить доступні хости і розподілить зображенням між ними.');
define('_WEBO_SPLASH3_ADDITIONAL_INFO_4', '<strong>Винесіть всі стилі і скрипти, прописані прямо в коді сторінки, у зовнішні файли.</strong> По-перше, це дозволить вам простіше управляти змінами на вашому сайті. По-друге, це дозволить Web Optimizer об\'єднати, мінімізувати та закешувати весь об\'єм додаткового коду, який потрібний для правильного функціонування вашого сайту.');

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