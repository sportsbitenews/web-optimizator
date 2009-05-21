<?php
/**
 * File from Web Optimizer, Nikolay Matsievsky (http://webo.in/)
 * Contains all UA localization constants
 * Translated by Sergiy Andriychuk
 * new (=not translated) constants: none
 **/
 //_WEBO_LOGIN_UPGRADENOTICE4
 //_WEBO_LOGIN_UNINSTALL2
 //_WEBO_SPLAHS1_PROTECTED
 //_WEBO_SPLAHS1_PROTECTED2
 //_WEBO_SPLASH2_HTMLCACHE
 //_WEBO_SPLASH2_HTMLCACHE_INFO
 //_WEBO_htaccess_access
 //_WEBO_far_future_expires_html
 //_WEBO_far_future_expires_html_timeout
 //_WEBO_html_cache_ignore_list
 //_WEBO_html_cache_allowed_list

/* general layout */
define('_WEBO_CHARSET', "windows-1251");
define('_WEBO_GENERAL_TITLE', 'Конфігурація Веб Оптимізатора');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Хмм... у нас виникла проблема');
define('_WEBO_ERROR_ERROR', 'Щось пішло не так!');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Введіть ваші авторизаційні дані');
define('_WEBO_LOGIN_INSTALLED', 'Для цього сайту Веб Оптимизатор ');
define('_WEBO_LOGIN_INSTALLED2', ' вже встановлений. Будь-ласка, введіть ваш логін та пароль для доступу до всіх налаштувань:');
define('_WEBO_LOGIN_USERNAME', 'Логін');
define('_WEBO_LOGIN_ENTERLOGIN', 'Введіть ваш логін');
define('_WEBO_LOGIN_PASSWORD', 'Пароль');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Введіть пароль');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Обновити');
define('_WEBO_LOGIN_UPGRADENOTICE', 'Ви можете обновити вашу поточну версію Веб Оптимізатора (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') до найостаннішої. Для цього введіть ваш логін і пароль в формі вище і натисніть кнопку <strong>Поновити</strong>. Веб Оптимізатор буде автоматично обновлений до версії <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_UPGRADE_SUCCESSFULL', 'Ви успішно обновились до версії ');
define('_WEBO_UPGRADE_UNABLE', 'Не вдається завантажити останню версію з репозиторію. Будь-ласка, перевірте з\'єднання серверу з інтернетом та наявність встановленого curl.');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', 'Щоб видалити Веб Оптимізатор, будь-ласка, введіть ваш логін та пароль у формі вище та натисніть кнопку <strong>Видалити</strong>.');
define('_WEBO_LOGIN_UNINSTALLME', 'Видалити Веб Оптимізатор');
define('_WEBO_LOGIN_FAILED', 'Невірно введений логін та(або) пароль');
define('_WEBO_LOGIN_ACCESS', 'Ця сторінка доступна тільки авторизованим користувачам');
define('_WEBO_LOGIN_LOGGED', 'Увійшли в систему');
define('_WEBO_SPLASH1_EXPRESS', 'Швидка установка');
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
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Дякуємо за використання Веб Оптимізатора. Ви можете встановити його знову в будь-який момент, якщо зайдете на <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '">сторінку Веб Оптимізатора</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Ми будемо раді бачити ваші відгуки про систему на <a href="http://code.google.com/p/web-optimizator/">сайті Веб Оптимізатора</a>, ви також можете відправити<a href="http://code.google.com/p/web-optimizator/issues/list">будь-які проблемні запитання</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Тепер можна повернутися назад до <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">вашого сайту</a>.');
define('_WEBO_SPLASH1_TITLE', 'Установка - перший крок');
define('_WEBO_SPLASH1_WELCOME', 'Ласкаво просимо до встановлення Веб Оптимізатора!');
define('_WEBO_SPLASH1_PATH', 'Налаштування шляхів');
define('_WEBO_SPLASH1_FULLPATH', 'Повний шлях до кореня сайту:');
define('_WEBO_SPLASH1_NOTICE', 'Корінь сайту &mdash; це директорія на жорсткому диску, в якій знаходяться і звідки віддаються всі ваші HTML-файли. Якщо ви не розумієте, про що йде мова, краще залишите вище зазначений шлях. Для цього просто натисніть кнопку <strong>Далі...</strong>.');
define('_WEBO_SPLASH1_INCORRECT', '<strong>Якщо вказаний шлях вказаний невірно</strong>, будь-ласка, введіть привильний варіант.');
define('_WEBO_SPLASH1_NEXT', 'Далі...');
define('_WEBO_SPLASH1_EXPRESS', 'Быстрая установка');

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
define('_WEBO_SPLASH2_JSLIB', 'JavaScript-файли');
define('_WEBO_SPLASH2_JSLIB_INFO', 'Якщо ваша клієнтська логіка використовує спеціальні JavaScript-бібліотеки, є сенс додати їх в поле видимості Веб Оптімизатора.
									<br/><br/>Веб Оптимізатор встановив, що вказані нижче файли могли бути додані безпосередньо вами. Варто переглянути цей список і обновити вказані в ньому файли у випадку необхідності.');
define('_WEBO_SPLASH2_MINIFY', 'Налаштування стиснення');
define('_WEBO_SPLASH2_MINIFY_INFO', 'Стиснення видаляє із CSS- і JavaScript-файлів пробіли, переводи рядків та інші непотрібні символи.
									<br/>Ви також можете вибрати один із декількох інструментів мінімізації або обфускації.');
define('_WEBO_SPLASH2_UNOBTRUSIVE', '&laquo;Ненав\'язливий&raquo; JavaScript');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '&laquo;Ненав\'язливі&raquo; JavaScript-файли загружаються відразу після того, як сторінка буде відображена в браузері (на сторінці буде сформовано DOM-дерево).
									<br/>Його використання може значно збільшити швидкість завантаження сторінки для кінцевих користувачів. Але в деяких випадках (при недостатньо акуратному використанні JavaScript-бібліотек) це може істотно вплинути на працездатність вашого сайту.
									<br/>Рекомендується включати цю опцію тільки у випадку повної впевненості в існуванні клієнтської логіки.');
define('_WEBO_SPLASH2_EXTERNAL', 'Включить зовнішні JavaScript-файли і вбудований код');
define('_WEBO_SPLASH2_EXTERNAL_INFO', 'При активації цієї опції всі JavaScript-файли, які підключаються із зовнішніх сайтів, так само як і просто JavaScript-код, який знаходиться в секції <code>head</code> будуть об\'єднані в один файл, зменшені в розмірі і підключені відразу після CSS-файлу.
									<br/>Це буде особливо корисно при використанні великої кількості модулів з різних сайтів, які не можуть бути підключені в &laquo;ненав\'язливому&raquo; режимі.
									<br/>Ви також можете вказати імена файлів, які потрібно виключити із подібного об\'єднання (наприклад, ga.js, jquery.min.js і т.п.).');
define('_WEBO_SPLASH2_MTIME', 'Не перевіряти час зміни та змісту файлів');
define('_WEBO_SPLASH2_MTIME_INFO', 'Як правило, Веб Оптимізатор при кожному завантаженні сторінки перевіряє, чи змінились файли (який в них час зміни і який в них зміст), і на основі цієї інформації або дає лінки на існуючі статичні файли, або створює нові.
                                    <br/>З точки зору серверної оптимізації більш оптимально не перевіряти кожного разу, чи змінились файли, а видяляти по факту самої зміни закешовану версію.
                                    <br/>З включенням цієї опції вам буде необхідно самостійно управляти кешем Веб Оптимізатора, але при цьому на сервер не буде створюватися додаткове навантаження.');
define('_WEBO_SPLASH2_GZIP', 'Налаштування архівування');
define('_WEBO_SPLASH2_GZIP_INFO', 'Застосування <code>gzip</code>-стиснення дозволить на 80-85% зменшити розмір текстовых файлів.
									<br/>Для завантажених сайтів рекомендуєтся налаштування <code>gzip</code>-стиснення перенести в конфігураційний файл сервера (або використовувати налаштування <code>.htaccess</code> нижче).');
define('_WEBO_SPLASH2_EXPIRES', '&laquo;Довічне&raquo; кешування');
define('_WEBO_SPLASH2_EXPIRES_INFO', 'В результаті роботи цієї опції до всіх статичних файлів будуть додані заголовки кешування, які дозволяють запобігти їх повторному запросу із серверу для одного и того ж користувача.
									<br/>При зміні JavaScript- або CSS-файлів автоматично будуть створюватися їх нові мінімізовані версії, що дозволить &laquo;пробити&raquo; кеш в браузерах. Для зображень та інших статичних файлів рекомендуєтся використовувати нове фізичне ім\'я при їх змінюванні');
define('_WEBO_SPLASH2_SPRITES', 'CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', 'Існує можливість об\'єднання більшості фонових зображень в CSS Sprites. Це суттєво зменшить кількість HTTP-запросів при завантаженні сайту.
									<br/>Ця техніка повністю підтримується усіма сучасними браузерами. Ви також можете переключитися в більш агресивний режим використання CSS Sprites, якщо впевнені в коректності ваших CSS-правил.
									<br/>Також є можливість задати набір зображень, які будуть виключені при створенні CSS Sprites (наприклад, logo.png, bg.gif і т.п.).');
define('_WEBO_SPLASH2_DATAURI', 'Data:URI');
define('_WEBO_SPLASH2_DATAURI_INFO', 'Також є можливість перевести всі фонові зображення у формат <code>data:URI</code> (base64-вигляд). Таким чином при завантаженні дизайну сайту буде здійснений тільки один HTTP-запрос &mdash; до файлу стилей.
									<br/>УВАГА: ця техніка не підтримується рядом браузерів (Internet Explorer до 7 версії включно). Однак для них використовуються спеціальні CSS-правила, які дозволяють завантажити звичайні зображення. Також розмір кінцевого CSS-файлу може суттєво збільшитися (за рахунок включення в нього самих фонових зображень).');
define('_WEBO_SPLASH2_HTACCESS', 'Використання .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', 'Більша частина налаштувань <code>gzip</code>-стиснення і кешування можуть бути записані в конфігураційному файлі вашого серверу для запобігання додаткової работи на стороні серверних скриптів. Це може бути зроблено за допомогою файлу <code>.htaccess</code> (при необхідності ви можете згодом самостійно перенести всі налаштування у файл <code>httpd.cond</code>).
									<br/>Доступні модулі: ');
define('_WEBO_SPLASH2_CLEANUP', 'Видалення файлів');
define('_WEBO_SPLASH2_CLEANUP_INFO', 'При зміненні JavaScript- або CSS-файлів Веб Оптимізатор буде автоматично створювати нові версії об\'єднаних і стиснених файлів. Для видалення старих версій файлів потрібно включити цю опцію.
									<br/>Але якщо на вашому сайті використовуються різні набори скриптів і файлів стилів для різних частин сайту, це може призвести до регулярного видаленню потрібних файлів, що негативно позначиться на продуктивності сайту. В загальному випадку цю опцію краще не включати.');
define('_WEBO_SPLASH2_FOOTER', 'Логотип Веб Оптимізатора');
define('_WEBO_SPLASH2_FOOTER_INFO', 'Веб Оптимізавтор може додати значок оптимізатора із посиланням на сайт проекту. Це може бути як печатка, так і посилання, а також і то, і інше.
									<br/>Включивши цю опцію ви підтримаєте розповсюдження Веб Оптимізатора в маси.');
define('_WEBO_SPLASH2_AUTOCHANGE', 'Автоматичне змінення /index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', 'Веб Оптимізавтор може автоматично внести потрібні зміни в основний файл вашого сайту, який використовує ');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' (зміни будуть застосовані тільки для <code>/index.php</code>).
									<br/>УВАГА: для деяких переревірених середовищ і малорозповсюджених CMS це може призвести до непрацездатності сайту.');
define('_WEBO_unobtrusive_on', 'Включити &laquo;ненав\'язливий&raquo; JavaScript');
define('_WEBO_external_scripts_on', 'Включити об\'єднання зовнішніх файлів');
define('_WEBO_external_scripts_ignore_list', 'Виключити з об\'єднання файли');
define('_WEBO_minify_javascript', 'Об\'єднати JavaScript-файли');
define('_WEBO_dont_check_file_mtime', 'Не перевіряти час зміни файлів');
define('_WEBO_minify_with_jsmin', 'Мінімізувати за допомогою JSMin');
define('_WEBO_minify_with_packer', 'Мінімізувати за допомогою Packer');
define('_WEBO_minify_with_yui', 'Мінімізувати за допомогою YUI Compressor');
define('_WEBO_minify_css', 'Мінімізувати і об\'єднати CSS-файли');
define('_WEBO_minify_page', 'Мінімізувати HTML');
define('_WEBO_gzip_javascript', 'Застосувати <code>gzip</code> для JavaScript');
define('_WEBO_gzip_css', 'Застосувати <code>gzip</code> для CSS');
define('_WEBO_gzip_page', 'Застосувати <code>gzip</code> для HTML');
define('_WEBO_far_future_expires_javascript', 'Кешуровати JavaScript');
define('_WEBO_far_future_expires_css', 'Кешуровати CSS');
define('_WEBO_far_future_expires_static', 'Кешуровати статические файлы');
define('_WEBO_html_cache_enabled', 'Кешувати створені HTML-файли');
define('_WEBO_html_cache_timeout', 'Термін дії кеша в секундах');
define('_WEBO_footer_text', 'Додати посилання на Веб Оптимізатор');
define('_WEBO_footer_image', 'Додати зображення Веб Оптимізатора');
define('_WEBO_cleanup_on', 'Видаляти старі файли');
define('_WEBO_data_uris_on', 'Застосувати <code>data:URI</code>');
define('_WEBO_css_sprites_enabled', 'Застосувати CSS Sprites');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Зберігати повнокольорові зображення в JPEG');
define('_WEBO_css_sprites_aggressive', '&laquo;Агресивний&raquo; режим створення CSS Sprites');
define('_WEBO_css_sprites_extra_space', 'Додати вільне місце в CSS Sprites');
define('_WEBO_css_sprites_no_ie6', 'Виключити IE6 (через хаки) із процесу створення CSS Sprites');
define('_WEBO_css_sprites_memory_limited', 'Обмежити використання пам\'яті для PHP-процесу');
define('_WEBO_css_sprites_ignore_list', 'Виключити із CSS Sprites файли');
define('_WEBO_htaccess_enabled', 'Включити <code>.htaccess</code>');
define('_WEBO_htaccess_mod_deflate', 'Включити <code>mod_deflate</code>');
define('_WEBO_htaccess_mod_gzip', 'Включити <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_expires', 'Включити <code>mod_expires</code>');
define('_WEBO_htaccess_mod_headers', 'Включити <code>mod_headers</code>');
define('_WEBO_htaccess_mod_setenvif', 'Включити <code>mod_setenvif</code>');
define('_WEBO_auto_rewrite_enabled', 'Включити авто-запис');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', 'Установка - третій крок');
define('_WEBO_SPLASH3_SAVED', 'Ваші налаштування були успішно збережені.');
define('_WEBO_SPLASH3_REWRITE', 'Прискорення сайтц проведено успішно');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'Ваш сайт, який використовує ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ', був успішно прискорений. Ви можете <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">перевірити результат, що вийшов</a>.');
define('_WEBO_SPLASH3_WORKING', 'Начебто все працює. А далі?');
define('_WEBO_SPLASH3_ADD', 'Ви повинні додати виклик Веб Оптимізатора до ваших серверних скриптів. Це буде значно простіше, якщо у вас є 1 файл, який обслуговує всі інші сторінки, таким чином вам потрібно буде змінити тільки його.');
define('_WEBO_SPLASH3_MODIFY', 'Як потрібно змінити ваш файл');
define('_WEBO_SPLASH3_WP', 'Припустимо, що ми змінюємл файл <code>wp-blog-header.php</code> вашого блогу, який використовує Wordpress. (Це тілько приклад: в загальному випадку потрібно модифікувати файл <code>index.php</code>). В самому верху сторінки ви повинні побачити щось на зразок цього:');
define('_WEBO_SPLASH3_CODE', 'Ви повинні додати код Веб Оптимізатора <strong>перед</strong> цими рядками. Тому потрібно додати в самий верх сторінки наступне:');
define('_WEBO_SPLASH3_FINALLY', 'Після цього потрібно завершити виклик Веб Оптимізатора наступним чиноом (в самому низу коду сторінки):');
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
define('_WEBO_SPLASH3_CANTWRITE3', 'Ви можете зробити це також через свій FTP-клієнт. Для цього потрібно перейти в директорію, зайти в її властивості або виконати CHMOD 775.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Після того, як ви усунете цю проблему, будь-ласка, перезавантажте сторінку.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Будь-ласка, переконайтеся в тому, що коренева папка вашого сайту доступна для читання і запису для вашого веб-серверу.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', 'Для цього виконайте CHMOD 775, або створіть в корені файл <code>.htaccess</code>, доступний для читання і запису для вашого веб-серверу, або дозвольте читання і запис для поточного файлу <code>.htaccess</code> (CHMOD 664).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Будь-ласка, переконайтеся, що коренева папка вашого сайту доступна для запису для вашого веб-серверу або в ній існує доступний для запису файл <code>.htaccess</code>.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Виконайте для директорії CHMOD 775, або створіть в корені файл <code>.htaccess</code>, доступний для запису для вашого веб-серверу, або дозвольте запис для поточного файлу <code>.htaccess</code> (CHMOD 664).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'Будь-ласка, переконайтеся, що Веб Оптимізатор був проінстальований в');
define('_WEBO_SPLASH3_CONFSAVED', 'Конфігурація збережена');
define('_WEBO_SPLASH3_CONFIGERROR', 'Неможливо відкрити для запису конфігураційний файл. Будь-ласка, змініть права доступу для файлу <code>config.webo.php</code> Веб Оптимізатора, щоб він був доступний для запису для вашого веб-серверу.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'Ви можете це зробити за допомогою вашого FTP-клієнта. Для цього просто перейдіть в директорію <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , потім увійдіть до властивостей файлу або виконайте CHMOD. Встановіть у 775, або "write"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'Після того, як ви усунете цю проблему, будь-ласка, перезавантажте сторінку.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'Конфігураційний файл не знайдений. Будь-ласка, завантажте Веб Оптимізатор повністю за адресою <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');

?>