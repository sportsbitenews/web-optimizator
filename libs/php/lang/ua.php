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
define('_WEBO_GENERAL_BUYNOW', '<a href="http://www.softkey.ru/catalog/basket.php?id=320283&amp;act=buy&amp;from=1722979&amp;compid=1" class="wssJ" title="WEBO Site SpeedUp Premium Edition">Купить</a>');
define('_WEBO_GENERAL_BUYNOWLITE', '<a href="http://www.softkey.ru/catalog/basket.php?id=334156&amp;act=buy&amp;from=1722979&amp;compid=1" class="wssJ" title="WEBO Site SpeedUp Lite Edition">Купить</a>');
define('_WEBO_GENERAL_IMAGE', '<img src="http://web-optimizator.googlecode.com/svn/trunk/images/web.optimizer.logo.small.png" alt="Web Optimizer" title="Web Optimizer" width="151" height="150"/>');
define('_WEBO_GENERAL_BUY', 'Купить');
define('_WEBO_GENERAL_PREMIUM', 'полную');
define('_WEBO_GENERAL_EDITION', 'версию');

/* lang menu */
define('_WEBO_GENERAL_LANGUAGE', 'Выберите язык');
define('_WEBO_GENERAL_ru', 'Русский');
define('_WEBO_GENERAL_de', 'Deutsch');
define('_WEBO_GENERAL_es', 'Español');
define('_WEBO_GENERAL_ua', 'Українська');
define('_WEBO_GENERAL_en', 'English');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Хмм... у нас виникла проблема');
define('_WEBO_ERROR_ERROR', 'Щось пішло не так!');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Авторизация');
define('_WEBO_LOGIN_LOGIN', 'Войти');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>Увага:</strong> не вдається знайти результат роботи Web Optimizer. Будь-ласка, перевірте наявність його викликів у файлах вашої веб-системи або проведіть установку ще раз.');
define('_WEBO_LOGIN_EFFICIENCY_KB', 'Кб');
define('_WEBO_LOGIN_EFFICIENCY_S', 'с');
define('_WEBO_LOGIN_USERNAME', 'Имя и фамилия');
define('_WEBO_LOGIN_USERNAME_HELP', 'Эта информация будет использоваться, чтобы обращаться к вам в почтовых сообщениях.');
define('_WEBO_LOGIN_ENTERLOGIN', 'Введите ваше имя');
define('_WEBO_LOGIN_PASSWORD', 'Пароль');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Введіть пароль');
define('_WEBO_LOGIN_PASSWORD_CONFIRM', 'Подтверждение пароля');
define('_WEBO_LOGIN_ENTERPASSWORDCONFIRM', 'Подтвердите ваш пароль');
define('_WEBO_LOGIN_LICENSE', 'Лицензионный ключ');
define('_WEBO_LOGIN_ENTERLICENSE', 'Введите ваш лицензионный ключ');
define('_WEBO_SPLAHS1_PROTECTED', 'Захищений режим');
define('_WEBO_SPLAHS1_PROTECTED2', 'Web Optimizer надійно захищає від зовнішнього доступу. Ви можете налаштувати його ще раз.');
define('_WEBO_LOGIN_EMAIL', 'E-mail');
define('_WEBO_LOGIN_EMAIL_HELP', 'На этот адрес будет отправляться информация об обновлениях и спецпредложениях.');
define('_WEBO_LOGIN_ENTEREMAIL', 'Пожалуйта, введите ваш адрес e-mail.');
define('_WEBO_LOGIN_EMAILNOTICE', 'E-mail будет использован только для уведомления вас об экстренных обновлениях, поздравлений и специальных предложений.');
define('_WEBO_LOGIN_ALLOW', 'Разрешить использовать мои данные о результате оптимизации');
define('_WEBO_LOGIN_ALLOW_HELP', 'Если эта опция включена, на сервер компании WEBO Software будет отправляться статистическая информация о результатах оптимизации. Эта информация не будет публиковаться в открытых источниках и будет использоваться исключительно в целях повышения эффективности WEBO Site SpeedUp. Никакая личная информация при этом передаваться не будет.');
define('_WEBO_LOGIN_SUCCESS', 'Все настройки успешно сохранены');
define('_WEBO_LOGIN_ENTEROLDPASSWORD', 'Введите текущий пароль');
define('_WEBO_LOGIN_PASSWORDSDIFFER', 'Пароли не совпадают');
define('_WEBO_LOGIN_LICENSEAGREEMENT', 'Я прочитал и согласен с ');
define('_WEBO_LOGIN_LICENSEAGREEMENT2', 'лицензионным соглашением');
define('_WEBO_LOGIN_CONFIRMLICENSEAGREEMENT', 'Подтвердите, что вы прочитали и согласны с лицензионным соглашением');

/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Обновити');
define('_WEBO_LOGIN_UPGRADE_ROLLBACK', 'Откатить');
define('_WEBO_LOGIN_UPGRADE_TO', 'до версии');
define('_WEBO_LOGIN_VERSION', 'Версия');
define('_WEBO_UPGRADE_FILE', 'Обновляем файл');

/* Uninstall */
define('_WEBO_LOGIN_UNINSTALLME', 'Удаление WEBO Site SpeedUp');
define('_WEBO_LOGIN_FAILED', 'Невірно введений логін та(або) пароль');
define('_WEBO_UNINSTALL_MESSAGE', 'Причина удаления WEBO Site SpeedUp');
define('_WEBO_UNINSTALL_SUCCESS', 'WEBO Site SpeedUp был успешно удален.');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Установка - обмеження доступу');
define('_WEBO_NEW_PROTECT', '<p class="wssI">Для обеспечения безопасности при дальнейшем использовании WEBO Site SpeedUp необходимо установить пароль доступа. <strong>Некоммерческая версия</strong> устанавливается без лицензионного ключа.</p><p class="wssI">Перед проведением установки, пожалуйста, убедитесь, что корневой <code>.htaccess</code> и файлы используемой веб-системы доступны на запись (при проведении установки WEBO Site SpeedUp также создает резерные копии).</p><p class="wssI">WEBO Site SpeedUp может самостоятельно проверить доступные возможности вашего сервера и провести установку в автоматическом режиме. Для этого нужно выбрать <strong>&laquo;Далее&raquo;</strong>. В дальнейшем вы сможете изменить все сохраненные настройки, используя текущий интерфейс.</p><p class="wssI"><a href="http://webo.in/articles/habrahabr/99-web-optimizer-installation-0.5/" class="wssJ">Процесс установки WEBO Site SpeedUp</a></p>');
define('_WEBO_NEW_NOSCRIPT', 'Для корректной работы с приложением требуется включенный JavaScript!');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Видалити');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'Видалення WEBO Site SpeedUp');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Спасибо за использование WEBO Site SpeedUp. Пожалуйста, помогите нам улучшить продукт и сообщите причину его удаления.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Мы будем рады видеть отзывы о системе на <a href="http://www.web-optimizer.ru/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">сайте WEBO Site SpeedUp</a>, вы также можете отправить <a href="http://code.google.com/p/web-optimizator/issues/list?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">любые проблемные вопросы</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Теперь можно вернуться обратно к <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">вашему сайту</a>.');
define('_WEBO_SPLASH1_UNINSTALL_HELP', 'Помогите сделать наш продукт лучше, сообщите нам причину удаления WEBO Site SpeedUp.');
define('_WEBO_SPLASH1_UNINSTALL_SEND', 'Отправить сообщение');
define('_WEBO_SPLASH1_NEXT', 'Установить');
define('_WEBO_SPLASH1_BACK', 'Назад');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Мы будем рады видеть отзывы о системе на <a href="http://www.web-optimizer.ru/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">сайте WEBO Site SpeedUp</a>, вы также можете отправить <a href="http://code.google.com/p/web-optimizator/issues/list?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">любые проблемные вопросы</a>.');

/* Change password */
define('_WEBO_PASSWORD_OLD', 'Текущий пароль');
define('_WEBO_PASSWORD_ENTERPASSWORD', 'Введите текущий пароль');
define('_WEBO_PASSWORD_NEW', 'Новый пароль');
define('_WEBO_PASSWORD_ENTERPASSWORDNEW', 'Введите новый пароль');
define('_WEBO_PASSWORD_CONFIRM', 'Подтверждение пароля');
define('_WEBO_PASSWORD_ENTERPASSWORDCONFIRM', 'Введите подтверждение для нового пароля');
define('_WEBO_SPLASH1_SAVE', 'Сохранить');
define('_WEBO_PASSWORD_DIFFERENT', 'Новый пароль и его подтверждение не совпадают');
define('_WEBO_PASSWORD_EMPTY', 'Новый пароль не задан!');
define('_WEBO_PASSWORD_SUCCESSFULL', 'Пароль успешно обновлен');

/* Second splash -- set options */
define('_WEBO_SPLASH2_CONTROLPANEL', 'Панель управления');
define('_WEBO_SPLASH2_OPTIONS', 'Настройка');
define('_WEBO_SPLASH2_UNABLE', 'Невозможно открыть');
define('_WEBO_SPLASH2_MAKESURE', '. Пожалуйста, убедитесь, что такая директория существует.');

/* WEBO Site SpeedUp options */
define('_WEBO_general', 'Общие настройки');
define('_WEBO_combinecss', 'Объединение CSS');
define('_WEBO_combine_js', 'Объединение JavaScript');
define('_WEBO_minify', 'Минимизация');
define('_WEBO_gzip', 'Gzip-архивирование');
define('_WEBO_clientside', 'Клиентское кэширование');
define('_WEBO_htaccess', '.htaccess');
define('_WEBO_backlink', 'Обратная ссылка');
define('_WEBO_performance', 'Производительность');
define('_WEBO_data_uri', 'Использование data:URI');
define('_WEBO_css_sprites', 'CSS Sprites');
define('_WEBO_serverside', 'Серверное кэширование');
define('_WEBO_unobtrusive', 'Ненавязчивый JavaScript');
define('_WEBO_multiple_hosts', 'Множественные хосты');

define('_WEBO_javascript_cachedir', 'Путь к директории JavaScript-кэша');
define('_WEBO_javascript_cachedir_HELP', 'В этой директории располагаются файлы JavaScript-кэша.');
define('_WEBO_css_cachedir', 'Путь к директории CSS-кэша');
define('_WEBO_css_cachedir_HELP', 'В этой директории располагаются файлы CSS-кэша.');
define('_WEBO_html_cachedir', 'Путь к директории HTML-кэша');
define('_WEBO_html_cachedir_HELP', 'В этой директории располагаются файлы HTML-кэша.');
define('_WEBO_website_root', 'Путь к корневой директории сайта');
define('_WEBO_website_root_HELP', 'Абсолютный путь к корневой директории вашего сайта.');
define('_WEBO_document_root', 'Путь к корневой директории хоста (<code>DOCUMENT_ROOT</code>)');
define('_WEBO_document_root_HELP', 'Абсолютный путь к корневой директории хоста, на котором расположен сайт.');
define('_WEBO_host', 'Адрес сайта');
define('_WEBO_host_HELP', 'Доменное имя или IP-адрес оптимизируемого сайта. Пример: mysite.ru.');
define('_WEBO_external_scripts_user', 'Логин для доступа по HTTP Basic Authorization');
define('_WEBO_external_scripts_user_HELP', 'В случае, если доступ на сайт, где используется WEBO Site SpeedUp, ограничен посредством HTTP Basic Authorization, необходимо указать логин и пароль, чтобы WEBO Site SpeedUp мог обрабатывать необходимые ресурсы с сайта.');
define('_WEBO_external_scripts_pass', 'Пароль для доступа по HTTP Basic Authorization');
define('_WEBO_external_scripts_pass_HELP', 'В случае, если доступ на сайт, где используется WEBO Site SpeedUp, ограничен посредством HTTP Basic Authorization, необходимо указать логин и пароль, чтобы WEBO Site SpeedUp мог обрабатывать необходимые ресурсы с сайта.');
define('_WEBO_restricted', 'Исключить обработку следующих URL');
define('_WEBO_restricted_HELP', 'В некоторых случаях необходимо исключить часть разделов сайта из логики работы WEBO Site SpeedUp. В этом случае необходимо задать характерные части этих разделов (маски) через пробел.');

define('_WEBO_combine_css', 'Об\'єднати CSS-файли');
define('_WEBO_combine_css_HELP','В зависимости от выбранной опции CSS либо не будет объединяться вовсе, либо будет объединяться только код, подключенный в тэге &lt;head&gt;, либо же будет объединяться весь CSS на странице. Весь объединенный код будет минимизироваться.');
define('_WEBO_combine_css1', 'Не объединять CSS-файлы');
define('_WEBO_combine_css2', 'Объединять только CSS, подключенный в тэге <code>&lt;head&gt;</code>');
define('_WEBO_combine_css3', 'Объединять CSS, подключенный в тэгах <code>&lt;head&gt;</code> и <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_css', 'Включити об\'єднання зовнішніх CSS-файлів');
define('_WEBO_external_scripts_css_HELP', 'Будут объединяться файлы, расположенные на любых хостах. В противном случае будут объединяться только файлы, расположенные на том же хосте, что и исходная страница.');
define('_WEBO_external_scripts_css_inline', 'Включити об\'єднання CSS-кода');
define('_WEBO_external_scripts_css_inline_HELP', 'Будет объединяться весь CSS-код, подключаемый при помощи тэгов &lt;style&gt; и &lt;link&gt;. В противном случае будут объединяться только файлы, подключаемые при помощи тэгов &lt;link&gt;.');
define('_WEBO_minify_css_file', 'Имя объединенного CSS-файла');
define('_WEBO_minify_css_file_HELP', 'Имя файла может содержать буквы латинского алфавита, цифры, знаки дефиса, подчеркивания и точки. Остальные символы будут автоматически удалены. Ко введенному имени файла может быть автоматически добавлено специальное окончание для форсирования сброса клиентского кэша в браузерах.');
define('_WEBO_external_scripts_additional_list', 'Виключити з об\'єднання CSS-файли');
define('_WEBO_external_scripts_additional_list_HELP', 'Указанные в этом поле файлы не будут включаться в объединенный файл. Необходимо указывать только имена файлов, а не абсолютные пути к ним.');
define('_WEBO_external_scripts_include_code', 'Включать в объединенные CSS-файлы дополнительный код');
define('_WEBO_external_scripts_include_code_HELP', 'Код введенный в это поле будет добавлен в конце каждого объединенного файла. Это поле позволяет задать дополнительные стили для страниц сайта, на котором работает WEBO Site SpeedUp.');

define('_WEBO_minify_javascript', 'Об\'єднати JavaScript-файли');
define('_WEBO_minify_javascript_HELP', 'В зависимости от выбранной опции JavaScript либо не будет объединяться вовсе, либо будет объединяться только JavaScript, подключенный в тэге &lt;head&gt;, либо будет объединяться весь JavaScript на странице.');
define('_WEBO_minify_javascript1', 'Не объединить JavaScript-файлы');
define('_WEBO_minify_javascript2', 'Объединять только JavaScript, подключенный в тэге <code>&lt;head&gt;</code>');
define('_WEBO_minify_javascript3', 'Объединять JavaScript, подключенный в тэгах <code>&lt;head&gt;</code> и <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_inline', 'Включити об\'єднання JavaScript-кода');
define('_WEBO_external_scripts_inline_HELP', 'Будет объединяться как код, содержащийся в тэгах &дежscript&gt;, так и код, подключаемый из внешних файлов. В противном случае, будет объединяться только код, подключаемый при помощи &lt;script src=&quot;...&quot;&gt;.');
define('_WEBO_external_scripts_on', 'Включити об\'єднання зовнішніх файлів');
define('_WEBO_external_scripts_on_HELP', 'Будут объединяться файлы, расположенные на любых хостах. В противном случае будут объединяться только файлы, расположенных на том же хосте, что и исходная страница.');
define('_WEBO_minify_javascript_file', 'Имя объединенного JavaScript-файла');
define('_WEBO_minify_javascript_file_HELP', 'Имя файла может содержать буквы латинского алфавита, цифры, знаки дефиса, подчеркивания и точки. Остальные символы будут автоматически удалены. Ко введенному имени файла может быть автоматически добавлено специальное окончание для форсирования сброса клиентского кэша в браузерах.');
define('_WEBO_external_scripts_ignore_list', 'Виключити з об\'єднання JavaScript-файли');
define('_WEBO_external_scripts_ignore_list_HELP', 'Указанные в этом поле файлы не будут включаться в объединенный файл. Необходимо указывать только имена файлов, а не абсолютные пути к ним.');
define('_WEBO_external_scripts_head_end', 'Форсувати розміщення об\'єднаного JavaScript-файлу перед <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_head_end_HELP', 'Вызов объединенного файла JavaScript будет переноситься к закрывющему тэгу &lt;/head&gt;.');

define('_WEBO_minify_css', 'Мінімізувати СSS-файли');
define('_WEBO_minify_css_HELP', 'Из всех объединенных файлов CSS будут удаляться лишние пробелы, символы табуляции, переносы строк и комментарии.');
define('_WEBO_minify_javascript_body', 'Объединить JavaScript-файлы внутри <code>&lt;body&gt;</code>');
define('_WEBO_minify_js', 'Мінімізувати JavaScript-файли');
define('_WEBO_minify_js_HELP', 'Из всех объединенных файлов JavaScript будут удаляться лишние пробелы, символы табуляции, переносы строк и комментарии. От выбора библиотеки зависит алгоритм минимизации, а следовательно финальный размер минимизированных файлов. В зависимости от особенностей минимизируемого кода более эффективный результат может быть достигнут с той или иной библиотекой.');
define('_WEBO_minify_js1', 'Не минимизировать JavaScript');
define('_WEBO_minify_js2', 'Мінімізувати за допомогою JSMin');
define('_WEBO_minify_js3', 'Мінімізувати за допомогою YUI Compressor');
define('_WEBO_minify_js4', 'Мінімізувати за допомогою Packer');
define('_WEBO_minify_page', 'Мінімізувати HTML');
define('_WEBO_minify_page_HELP', 'Из кода страниц будут удаляться двойные пробелы, двойные переводы строк, пустые символы в начале каждой строки и пробелы перед окончанием тэга. Все операции будут проводиться за исключением содержимого тэгов &lt;pre&gt;, &lt;textarea&gt;, &lt;script&gt;.');
define('_WEBO_minify_html_one_string', 'Стиснути HTML до 1 рядка');
define('_WEBO_minify_html_one_string_HELP', 'Код итоговой страницы будет вытянут в одну строку. С одной стороны подобная мера позволяет получить дополнительный выигрыш за счет удаления избыточных пробелов, табуляций и переводов строк, но с другой стороны требует значительных серверных ресурсов и должна быть использована с осторожностью.');
define('_WEBO_minify_html_comments', 'Видалити HTML-коментарі');
define('_WEBO_minify_html_comments_HELP', 'Все HTML-комментарии будут удаляться, что может повлечь за собой неработоспособность условных комментариев, а также ряда счетчиков.');

define('_WEBO_unobtrusive_on', 'Включити &laquo;ненав\'язливий&raquo; JavaScript');
define('_WEBO_unobtrusive_on_HELP', 'Ко всем страницам будет применяться технология ненавязчивого JavaScript в соответствии с остальными опциями данного раздела.');
define('_WEBO_unobtrusive_body', 'Вставити виклик об\'єднаного JavaScript-файлу перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_body_HELP', 'Вызов объединенного файла будет перенесен к закрывющему тэгу &lt;/body&gt;. Эта опция имеет больший приоритет, чем &laquo;Переносить вызов объединенного JavaScript-файла перед &lt;/head&gt;&laquo;.');
define('_WEBO_unobtrusive_all', 'Переместить весь JavaScript-код перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_all_HELP', 'Весь JavaScript-код будет переноситься к закрывющему тэгу &lt;/body&gt; в том же порядке, в котором этот код встречался на исходной странице.');
define('_WEBO_unobtrusive_informers', 'Перенести виклики JavaScript-інформерів перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers_HELP', 'Код всех JavaScript-информеров будет переноситься к закрывающему тэгу &lt;/body&gt;.');
define('_WEBO_unobtrusive_counters', 'Перенести виклики лічильників перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters_HELP', 'Код всех JavaScript-счетчиков будет переноситься к закрывающему тэгу &lt;/body&gt;.');
define('_WEBO_unobtrusive_ads', 'Перенести рекламні виклики (контекст і банери) перед <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads_HELP', 'Код всех рекламных блоков (контекстной и баннерной рекламы) будет переноситься к закрывющему тэгу &lt;/body&gt;.');
define('_WEBO_unobtrusive_iframes', 'Отложить загрузку фреймов');
define('_WEBO_unobtrusive_iframes_HELP', 'Код всех фреймов  будет переноситься к закрывющему тэгу &lt;/body&gt;.');

define('_WEBO_gzip_css', 'Застосувати <code>gzip</code> для CSS');
define('_WEBO_gzip_css_HELP', 'Все CSS-файлы будут передаваться в сжатом виде.');
define('_WEBO_gzip_javascript', 'Застосувати <code>gzip</code> для JavaScript');
define('_WEBO_gzip_javascript_HELP', 'Все JavaScript-файлы будут передаваться в сжатом виде.');
define('_WEBO_gzip_fonts', 'Застосувати <code>gzip</code> для шрифтiв');
define('_WEBO_gzip_fonts_HELP', 'Все файлы шрифтов (.eot, .ttf, .otf и др.) будут передаваться в сжатом виде.');
define('_WEBO_gzip_page', 'Застосувати <code>gzip</code> для HTML');
define('_WEBO_gzip_page_HELP', 'Все HTML-файлы будут передаваться в сжатом виде.');
define('_WEBO_gzip_cookie', 'Перевіряти можливість <code>gzip</code> через cookie');
define('_WEBO_gzip_cookie_HELP', 'WEBO Site SpeedUp будет осуществлять дополнительную проверку на поддержку gzip в браузере, и если она будет определена, данные будут передаваться в сжатом виде вне зависимости от заголовка Accept-Encoding.');
define('_WEBO_gzip_noie', 'Применять <code>deflate</code> вместо <code>gzip</code> для IE6, IE7');
define('_WEBO_gzip_noie_HELP', 'В ряде ситуаций использование gzip в браузерах IE6 и IE7 может привести к некорректному отображению страницы. Данная опция позволяет использовать для этих браузеров альтернативный алгоритм сжатия.');

define('_WEBO_far_future_expires_css', 'Кэшировать CSS-файлы на клиенте');
define('_WEBO_far_future_expires_css_HELP', 'Всем CSS-файлам будут присваиваться кэширующие заголовки, установленные на далекое будущее.');
define('_WEBO_far_future_expires_javascript', 'Кэшировать JavaScript-файлы на клиенте');
define('_WEBO_far_future_expires_javascript_HELP', 'Если эта опция включена, всем JavaScript-файлам будут присваиваться кэширующие заголовки, установленные на далекое будущее.');
define('_WEBO_far_future_expires_images', 'Кэшировать изображения на клиенте');
define('_WEBO_far_future_expires_images_HELP', 'Всем изображениям будут присваиваться кэширующие заголовки, установленные на далекое будущее');
define('_WEBO_far_future_expires_fonts', 'Кэшировать файлы шрифтов на клиенте');
define('_WEBO_far_future_expires_fonts_HELP', 'Всем файлам шрифтов будут присваиваться кэширующие заголовки, установленные на далекое будущее.');
define('_WEBO_far_future_expires_video', 'Кэшировать видео-файлы на клиенте');
define('_WEBO_far_future_expires_video_HELP', 'Всем видео-файлам будут присваиваться кэширующие заголовки, установленные на далекое будущее. Эта опция может быть применена только при помощи .htaccess.');
define('_WEBO_far_future_expires_static', 'Кэшировать остальные файлы на клиенте');
define('_WEBO_far_future_expires_static_HELP', 'Всем остальным файлам будут присваиваться кэширующие заголовки, установленные на далекое будущее. Эта опция может быть применена только при помощи .htaccess.');
define('_WEBO_far_future_expires_html', 'Кэшировать HTML на клиенте');
define('_WEBO_far_future_expires_html_HELP', 'Всем HTML-файлам будут присваиваться кэширующие заголовки, установленные в значение, заданное в поле &laquo;Время существования клиентского кэша для HTML-файлов&raquo;.');
define('_WEBO_far_future_expires_html_timeout', 'Время существования клиентского кэша для HTML-файлов (в секундах)');
define('_WEBO_far_future_expires_html_timeout_HELP', 'Время, на которое кэшируются файлы HTML. Отсутствие значения означает нулевое время кэширования.');
define('_WEBO_far_future_expires_external', 'Кэшировать внешние файлы');
define('_WEBO_far_future_expires_external_HELP', 'Внешние файлы, подключаемые на страницах, будут кэшироваться и отдаваться с того же хоста, что и запрашиваемая страница.');

define('_WEBO_html_cache_enabled', 'Применять серверное кэширование');
define('_WEBO_html_cache_enabled_HELP', 'Страницы будут кэшироваться на сервере на время, заданное в поле &laquo;Время существования серверного кэша для HTML-файлов&raquo;. Примение этой опции позволяет во много раз ускорить загрузку страниц, долго генерирующихся на сервере, однако это целесообразно только для статических страниц без с динамически изменяемых параметров.');
define('_WEBO_html_cache_timeout', 'Время существования HTML-файлов серверного кэша (в секундах)');
define('_WEBO_html_cache_timeout_HELP', 'По истечению этого времени закэшированные на сервере страницы будут создаваться заново.');
define('_WEBO_html_cache_flush_only', 'Включити швидке скидання частини документу');
define('_WEBO_html_cache_flush_only_HELP', 'При наличии в кэше на сервере запрошенной страницы, некоторое число начальных байт этой страницы (заданное в поле &laquo;Размер сбрасываемой части страницы&raquo;) будет отправляться и &laquo;сбрасываться&raquo; клиенту раньше остального содержимого страницы. Благодаря этой опции браузер может раньше получить первую часть страницы и раньше начать загрузку требуемых ресурсов.');
define('_WEBO_html_cache_flush_size', 'Розмір частини документа, що скидається (в байтах)');
define('_WEBO_html_cache_flush_size_HELP', 'Размер рано сбрасываемой части страницы может быть фиксированным для избежания проблем с браузерами, имеющими ограничения на минимальный или максимальный размер получаемой части страницы. Отсутствие значения или нулевое значение приведет к раннему сбросу содержимого страницы от ее начала до закрывающего тэга &lt;/head&gt;.');
define('_WEBO_html_cache_ignore_list', 'Перелік частин URL для виключення при кешуванні');
define('_WEBO_html_cache_ignore_list_HELP', 'Часто серверное кэширование неприменимо для страниц с динамически изменяемыми параметрами, например, для страниц аккаунта пользователя, страниц статистики и других. Данное поле позволяет указать части (маски) URL страниц, которые не следует кэшировать на сервере.');
define('_WEBO_html_cache_allowed_list', 'Список частин USER AGENTS (роботів) для включення при кешуванні');
define('_WEBO_html_cache_allowed_list_HELP', 'Данное поле позволяет указать список USER AGENTS, которым будут отправляться строго закэшированные файлы. Например, за счет отдачи закэшированных файлов всем поисковым роботам может быть снижена нагрузка на сервер.');
define('_WEBO_html_cache_additional_list', 'Перелік COOKIE для виключення при кешуванні');
define('_WEBO_html_cache_additional_list_HELP', 'Вы также можете отключить кэширование страниц для пользователей, у которых заданы указанные COOKIE. Это бывает полезно для авторизованных пользователей или при работе с покупательской корзиной.');

define('_WEBO_performance_mtime', 'Не перевіряти час зміни файлів');
define('_WEBO_performance_mtime_HELP', 'Будет получен дополнительный выигрыш в быстродействии сервера, однако для обновления закэшированных файлов у клиента будет необходимо либо изменить вызовы этих файлов (их URL), либо вручную обновить кэш.');
define('_WEBO_performance_check_files', 'Не проверять наличие файлов');
define('_WEBO_performance_check_files_HELP', 'Если эта опция включена, проверка на существование файлов в кэше производиться не будет, а версия всех файлов будет определяться значением в поле &laquo;Версия кэша&raquo;. В этом случае для обновления закэшированных файлов у клиента необходимо изменить версию кэша. Если эта опция отключена, проверка будет производиться.');
define('_WEBO_performance_cache_version', 'Версия кэша');
define('_WEBO_performance_cache_version_HELP', 'Версия кэша определяет версию всех файлов кэша. Для обновления закэшированных файлов у клиента необходимо изменить значение этого поля.');
define('_WEBO_performance_plain_string', 'Не применять регулярные выражения');
define('_WEBO_performance_plain_string_HELP', 'Регулярные выражения отрицательно влияют на быстродействие сервера и могут быть заменены более простыми проверками, однако в этом случае вероятность некоррентного разбора документов, не соответствующих стандартам, будет больше.');
define('_WEBO_performance_quick_check', 'Проверять целостность кэша только по содержимому тэга <code>head</code>');
define('_WEBO_performance_quick_check_HELP', 'Может быть получен дополнительный выигрыш в быстродействии сервера за упрощения проверки кэша, однако станет невозможным исключение каких-либо файлов из объединения.');
define('_WEBO_performance_uniform_cache', 'Использовать файлы в кэше для всех браузеров');
define('_WEBO_performance_uniform_cache_HELP', 'Все браузеры будут получать одинаковый CSS-, JavaScript- и HTML-код, благодаря чему будет возможно безопасное использование внешних кэширующих механизмов, однако при этом станет невозможным использование ряда технологий оптимизации, таких как data:URI.');

define('_WEBO_data_uris_on', 'Застосувати <code>data:URI</code>');
define('_WEBO_data_uris_on_HELP', 'Фоновые изображения будут преобразовываться в формат base64 и подставляться в CSS-файлы для всех браузеров, поддерживающих технологию data:URI.');
define('_WEBO_data_uris_mhtml', 'Застосувати <code>mhtml</code>');
define('_WEBO_data_uris_mhtml_HELP', 'Фоновые изображения будут преобразовываться в формат mhtml и подставляться в CSS-файлы для всех версий Internet Explorer, не поддерживающих технологию data:URI.');
define('_WEBO_data_uris_size', 'Максимальный размер <code>data:URI</code> (в байтах)');
define('_WEBO_data_uris_size_HELP', 'Изображения, размер которых превышает значение, заданное в этом поле, не будут преобразованы в формат base64. Отсутствие значения или нулевое значение означает отсутствие ограничения.');
define('_WEBO_data_uris_mhtml_size', 'Максимальный размер <code>mhtml</code> (в байтах)');
define('_WEBO_data_uris_mhtml_size_HELP', 'Изображения, размер которых превышает значение, заданное в этом поле, не будут преобразованы в формат mhtml. Отсутствие значения или нулевое значение означает отсутствие ограничения.');
define('_WEBO_data_uris_ignore_list', 'Исключить из <code>data:URI</code> файлы');
define('_WEBO_data_uris_ignore_list_HELP', 'Изображения, указанные в этом поле, не будут преобразованы в формат base64. Пожалуйста, указывайте только имена файлов, а не полные пути к ним.');
define('_WEBO_data_uris_additional_list', 'Исключить из <code>mhtml</code> файлы');
define('_WEBO_data_uris_additional_list_HELP', 'Изображения, указанные в этом поле, не будут преобразованы в формат mhtml. Пожалуйста, указывайте только имена файлов, а не полные пути к ним.');
define('_WEBO_data_uris_separate', 'Отделить картинки от CSS-кода');
define('_WEBO_data_uris_separate_HELP', 'Преобразованный код CSS и изображения в форматах base64 и mhtml будут храниться в отдельных файлах. Это должно улучшить их кэширующее поведение.');
define('_WEBO_data_uris_domloaded', 'Загружать изображения по событию <code>DOMready</code>');
define('_WEBO_data_uris_domloaded_HELP', 'Загрузка фоновых изображений будет откладываться до события DOMReady. Это увеличит скорость появления страницы на экране браузера.');

define('_WEBO_css_sprites_enabled', 'Застосувати CSS Sprites');
define('_WEBO_css_sprites_enabled_HELP', 'Фоновые изображения будут объединяться по технологии CSS Sprites, а CSS-код, отвечающий за их вывод, будет соответствующим образом преобразовываться.');
define('_WEBO_css_sprites_aggressive', '&laquo;Агресивний&raquo; режим створення CSS Sprites');
define('_WEBO_css_sprites_aggressive_HELP', 'Число изображений и размер изображений, созданных при помощи технологии CSS Sprites будет меньше, однако возможно появление артефактов на страницах.');
define('_WEBO_css_sprites_no_ie6', 'Не применять CSS Sprites для IE6');
define('_WEBO_css_sprites_no_ie6_HELP', 'IE6 будет получать собственный файл CSS без применения технологии CSS Sprites.');
define('_WEBO_css_sprites_memory_limited', 'Ограничить использование памяти');
define('_WEBO_css_sprites_memory_limited_HELP', 'В случае превышения максимального значения доступной памяти создание CSS Sprites будет отменяться.');
define('_WEBO_css_sprites_dimensions_limited', 'Максимальная ширина и высота изображений (в px)');
define('_WEBO_css_sprites_dimensions_limited_HELP', 'Изображения, ширина или высота которых превышает значение, заданное в этом поле, не будут преобразованы по технологии CSS Sprites. Отсутствие значения или нулевое значение означает отсутствие ограничения.');
define('_WEBO_css_sprites_ignore_list', 'Виключити із CSS Sprites файли');
define('_WEBO_css_sprites_ignore_list_HELP', 'Изображения, указанные в этом поле, не будут преобразованы по технологии CSS Sprites. Пожалуйста, указывайте только имена файлов, а не полные пути к ним.');
define('_WEBO_css_sprites_extra_space', 'Додати вільне місце в CSS Sprites');
define('_WEBO_css_sprites_extra_space_HELP', 'Некоторые изображения в файлах, созданных по технологии CSS Sprites, будут окружаться пустым пространством, чтобы избежать появления артефактов при масштабировании страницы пользователем. Размер файлов изображений при этом несколько увеличится.');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Формат изображений');
define('_WEBO_css_sprites_truecolor_in_jpeg_HELP', 'Если выбрана опция автоматического определения формата, риск появления артефактов в изображениях будет минимальным. Если предпочтение отдается формату JPEG, соотношение размер/качество для полноцветных изображений будет наилучшим, однако использование прозрачности будет невозможным.');
define('_WEBO_css_sprites_truecolor_in_jpeg1', 'Определять подходящий формат автоматически');
define('_WEBO_css_sprites_truecolor_in_jpeg2', 'Предпочитать формат JPEG');

define('_WEBO_htaccess_enabled', 'Включити <code>.htaccess</code>');
define('_WEBO_htaccess_enabled_HELP', 'Создает в корневой директории сайта файл .htaccess, либо модифицирует существующий файл, сохраняя все его исходное содержимое, а также создавая резервную копию исходного файла. Содержимое файла .htaccess изменяется в зависимости от других опций.');
define('_WEBO_htaccess_local', 'Розмістити <code>.htaccess</code> в локальній (не кореневій) директорії');
define('_WEBO_htaccess_local_HELP', 'Файл <code>.htaccess</code> будет расположен в локальной папке сайта, а не корневой директории хоста.');
define('_WEBO_htaccess_mod_deflate', 'Використовувати <code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_htaccess_mod_deflate_HELP', 'Требуется для динамического сжатия файлов и является альтернативой использованию mod_gzip.');
define('_WEBO_htaccess_mod_gzip', 'Використовувати <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_gzip_HELP', 'Требуется для динамического сжатия файлов и является альтернативой mod_deflate + mod_filter.');
define('_WEBO_htaccess_mod_expires', 'Використовувати <code>mod_expires</code>');
define('_WEBO_htaccess_mod_expires_HELP', 'Требуется для выставления заголовков, отвечающих за клиентское кэширование.');
define('_WEBO_htaccess_mod_headers', 'Використовувати <code>mod_headers</code>');
define('_WEBO_htaccess_mod_headers_HELP', 'Требуется для обеспечения корректной обработки сжатых файлов на прокси-серверах и в старых браузерах.');
define('_WEBO_htaccess_mod_setenvif', 'Використовувати <code>mod_setenvif</code>');
define('_WEBO_htaccess_mod_setenvif_HELP', 'Требуется для обеспечения корректной обработки сжатых файлов на прокси-серверах и в старых браузерах.');
define('_WEBO_htaccess_mod_mime', 'Використовувати <code>mod_mime</code>');
define('_WEBO_htaccess_mod_mime_HELP', 'Требуется для статического сжатия файлов.');
define('_WEBO_htaccess_mod_rewrite', 'Використовувати <code>mod_rewrite</code>');
define('_WEBO_htaccess_mod_rewrite_HELP', 'Требуется для статического сжатия файлов или форсированного кэширования.');

define('_WEBO_parallel_enabled', 'Включити паралельні хости');
define('_WEBO_parallel_enabled_HELP', 'Все файлы изображений, вызываемые на веб-страницах будут автоматически распределяться по нескольким хостам. Так, например, вызовы файлов http://site.ru/i/logo.png и /i/bg.jpg могут быть заменены вызовами http://i1.site.ru/i/logo.png и http://i2.site.ru/i/bg.jpg, при условии, что хосты i1 и i2 доступны и указаны в поле &laquo;Использовать хосты&raquo;.');
define('_WEBO_parallel_check', 'Автоматично перевіряти доступність хостів');
define('_WEBO_parallel_check_HELP', 'Доступные хосты будут определяться автоматически (по существованию на них картинок сайта).');
define('_WEBO_parallel_allowed_list', 'Доступні хости');
define('_WEBO_parallel_allowed_list_HELP', 'Для распределения изображений будут использоваться хосты, указанные в этом поле. Хостов может быть не более четырех.');
define('_WEBO_parallel_additional', 'Распределять файлы на дополнительных доменах (через пробел)');
define('_WEBO_parallel_additional_HELP', 'Если есть несколько сайтов, использующих распределение изображений, то при помощи WEBO Site SpeedUp можно распределять изображения, находяющиеся на любом сайте из списка, по всем его зеркалам (поддоменам).');
define('_WEBO_parallel_additional_list', 'Использовать хосты на дополнительных доменах (через пробел)');
define('_WEBO_parallel_additional_list_HELP', 'Для распределения изображений, расположенных на сайтах, указанных в поле &laquo;Распределять файлы на дополнительных доменах&raquo;, будут использоваться хосты, указанные в этом поле.');

define('_WEBO_footer_text', 'Додати посилання на Web Optimizer');
define('_WEBO_footer_text_HELP', 'Ссылка на WEBO Site SpeedUp является обязательным требованием для некомерческой версии и может быть убрана только в платной версии.');
define('_WEBO_footer_image', 'Додати зображення Web Optimizer');
define('_WEBO_footer_image_HELP', 'Имя файла с логотипом WEBO Site SpeedUp. Доступные файлы находятся в следующей директории: &lt;путь к WEBO Site SpeedUp&gt;/web-optimizer/images/. Если это поле оставлено пустым, вместо изображения будет отображаться текст, укащанный в поле &laquo;Текст обратной ссылки&raquo;.');
define('_WEBO_footer_link', 'Текст обратной ссылки');
define('_WEBO_footer_link_HELP', 'Если поле &laquo;Изображение обратной ссылки&raquo; заполнено, текст этого поля будет использоваться в качестве альтернативного текста для изображения. В противном случае это будет непосредственно текст ссылки.');
define('_WEBO_footer_css_code', 'Стили для размещения ссылки');
define('_WEBO_footer_css_code_HELP', 'Эти стили будут присвоены ссылке на WEBO Site SpeedUp. Вы можете вручную задать положение ссылки, ее цвет, фон, размер и т.д.');
define('_WEBO_footer_spot', 'Добавлять <code>&lt;!--wss--&gt;</code> в <code>body</code> оптимизированных страниц');
define('_WEBO_footer_spot_HELP', 'Наличие аттрибута lang=&quot;wo&quot; сигнализирует о том, что WEBO Site SpeedUp успешно обработал текущую страницу, и используется во внутренних алгоритмах.');

define('_WEBO_htaccess_access', 'Захистити установку Web Optimizer за допомогою <code>htpasswd</code>');
define('_WEBO_htaccess_access_HELP', 'Обеспечивает дополнительную безопасность WEBO Site SpeedUp при помощи механизма, основанного на применении технологии HTTP Basic Authorization и файлов .htaccess и .htpasswd.');
define('_WEBO_htaccess_login', 'Логин для защиты установки WEBO Site SpeedUp с помощью <code>.htpasswd</code>');
define('_WEBO_htaccess_login_HELP', 'Для защиты с помощью .htpasswd требуются логин и пароль. В качестве логина используется значение этого поля. В качестве пароля автоматически используется пароль от установки WEBO Site SpeedUp.');
define('_WEBO_showbeta', 'Показывать информацию о бета-версиях');
define('_WEBO_showbeta_HELP', 'По умолчанию отображаются только стабильные версии WEBO Site SpeedUp. Вы можете также включить отображение информации о бета-версиях (потенциально нестабильных).');

/* Dashboard */
define('_WEBO_DASHBOARD_LOADING', 'Идет загрузка...');
define('_WEBO_SPLASH2_CONTROLPANEL_TITLE', 'Сводная информация о приложении');
define('_WEBO_SPLASH2_OPTIONS_TITLE', 'Все настройки');
define('_WEBO_DASHBOARD_SYSTEM_TITLE', 'Состояния приложения и сервера');
define('_WEBO_DASHBOARD_ACCOUNT_TITLE', 'Пользовательские данные');
define('_WEBO_DASHBOARD_ACCOUNT', 'Персональные данные');
define('_WEBO_DASHBOARD_CACHE', 'Кэш');
define('_WEBO_DASHBOARD_SYSTEM', 'Состояние системы');
define('_WEBO_DASHBOARD_SPEED', 'Скорость загрузки');
define('_WEBO_DASHBOARD_STATUS', 'Текущее состояние');
define('_WEBO_DASHBOARD_NEWS', 'Новости');
define('_WEBO_DASHBOARD_BUZZ', 'Расскажите о нас');
define('_WEBO_DASHBOARD_UPDATES', 'Обновления');
define('_WEBO_DASHBOARD_RESULTS', 'Результат оптимизации');
define('_WEBO_DASHBOARD_TOOLS', 'Инструменты оптимизации');
define('_WEBO_DASHBOARD_LINKS', 'Быстрые ссылки');
define('_WEBO_DASHBOARD_AVAILABLE', 'Доступно в полной версии');
define('_WEBO_DASHBOARD_ALL', 'Все блоки');
define('_WEBO_DASHBOARD_INSTALL', 'Установить');

/* Dashboard status block */
define('_WEBO_DASHBOARD_STATUS_IS', '');
define('_WEBO_DASHBOARD_STATUS_ACTIVE', 'работает');
define('_WEBO_DASHBOARD_STATUS_LIVE', 'рабочий&nbsp;режим');
define('_WEBO_DASHBOARD_STATUS_WORKING', 'Вы можете ');
define('_WEBO_DASHBOARD_STATUS_WORKING2', 'проверить ваш сайт');
define('_WEBO_DASHBOARD_STATUS_WORKING3', ' или перевести приложение обратно в режим отладки. Для этого надо нажать &laquo;Отключить&raquo;.');
define('_WEBO_DASHBOARD_STATUS_NOTACTIVE', 'не работает');
define('_WEBO_DASHBOARD_STATUS_DEBUG', 'режим&nbsp;отладки');
define('_WEBO_DASHBOARD_STATUS_TESTING', 'Вы можете отладить работу приложения:');
define('_WEBO_DASHBOARD_STATUS_TESTING2', 'используя GET-параметр ');
define('_WEBO_DASHBOARD_STATUS_TESTING4', '<code>web_optimizer_debug</code>');
define('_WEBO_DASHBOARD_STATUS_COOKIE', 'или просто ');
define('_WEBO_DASHBOARD_STATUS_COOKIE2', 'при помощи cookies');
define('_WEBO_DASHBOARD_STATUS_TESTING3', 'Нажмите кнопку &laquo;Включить&raquo;, когда вы захотите перевести WEBO&nbsp;Site&nbsp;SpeedUp в рабочий режим.');
define('_WEBO_DASHBOARD_STATUS_ENABLE', 'Включить');
define('_WEBO_DASHBOARD_STATUS_DISABLE', 'Отключить');
define('_WEBO_DASHBOARD_STATUS0','Начинаем оптимизацию');
define('_WEBO_DASHBOARD_STATUS1','Подготавливаем окружение');
define('_WEBO_DASHBOARD_STATUS2','Инициализируем переменные');
define('_WEBO_DASHBOARD_STATUS4','Вычисляем директории');
define('_WEBO_DASHBOARD_STATUS5','Проверяем настройки');
define('_WEBO_DASHBOARD_STATUS6','Записываем .htaccess');
define('_WEBO_DASHBOARD_STATUS8','Подготавливаем цепочную оптимизацию');
define('_WEBO_DASHBOARD_STATUS10','Запускаем цепочную оптимизацию');
define('_WEBO_DASHBOARD_STATUS11','Создаем JavaScript-кэш: проверка файлов');
define('_WEBO_DASHBOARD_STATUS12','Создаем JavaScript-кэш: объединение файлов');
define('_WEBO_DASHBOARD_STATUS13','Создаем JavaScript-кэш: сжатие файлов');
define('_WEBO_DASHBOARD_STATUS14','Готовимся к CSS Sprites');
define('_WEBO_DASHBOARD_STATUS15','Создаем CSS Sprites: 1 стадия');
define('_WEBO_DASHBOARD_STATUS16','Создаем CSS Sprites: 2 стадия');
define('_WEBO_DASHBOARD_STATUS17','Создаем CSS Sprites: 3 стадия');
define('_WEBO_DASHBOARD_STATUS18','Готовимся к data:URI + mhtml');
define('_WEBO_DASHBOARD_STATUS19','Создаеи data:URI + mhtml');
define('_WEBO_DASHBOARD_STATUS20','Создаем CSS-кэш: проверка файлов');
define('_WEBO_DASHBOARD_STATUS21','Создаем CSS-кэш: объединение файлов');
define('_WEBO_DASHBOARD_STATUS22','Создаем CSS-кэш: сжатие файлов');
define('_WEBO_DASHBOARD_STATUS23','Проверяем HTML-документ');
define('_WEBO_DASHBOARD_STATUS24','Сжимаем HTML-документ');
define('_WEBO_DASHBOARD_STATUS_ALL','все браузеры');
define('_WEBO_DASHBOARD_STATUS85','Проверяем целостность кэша');
define('_WEBO_DASHBOARD_STATUS90','Завершаем цепочную оптимизацию');
define('_WEBO_DASHBOARD_STATUS95','Удаляем временные данные');
define('_WEBO_DASHBOARD_STATUS100','Конец');

/* Dashboard links block */
define('_WEBO_DASHBOARD_LINKS_WEBSITE', 'Сайт WEBO Site SpeedUp');
define('_WEBO_DASHBOARD_LINKS_UG', 'Пользовательская документация');
define('_WEBO_DASHBOARD_LINKS_ISSUES', 'Известные проблемы');
define('_WEBO_DASHBOARD_LINKS_SUPPORT', 'Техническая поддержка');

/* Dashboard cache block */
define('_WEBO_DASHBOARD_CACHE_TITLE', 'Состояние кэша');
define('_WEBO_DASHBOARD_CACHE_CSS', 'CSS');
define('_WEBO_DASHBOARD_CACHE_JS', 'JavaScript');
define('_WEBO_DASHBOARD_CACHE_HTML', 'HTML');
define('_WEBO_DASHBOARD_CACHE_SPRITES', 'CSS Sprites');
define('_WEBO_DASHBOARD_CACHE_IMAGES', 'Картинки');
define('_WEBO_DASHBOARD_CACHE_RESOURCES', 'data:URI + mhtml');
define('_WEBO_DASHBOARD_CACHE_SIZE', 'Общий размер');
define('_WEBO_DASHBOARD_CACHE_REFRESH', 'Обновить кэш');

/* Dashboard system block */
define('_WEBO_SYSTEM_TITLE', 'Конфигурация сервера');
define('_WEBO_SYSTEM_NOPROBLEMS', 'Все в порядке');
define('_WEBO_SYSTEM_TOTAL', 'Всего');
define('_WEBO_SYSTEM_TROUBLE', 'проблема');
define('_WEBO_SYSTEM_TROUBLES', 'проблемы');
define('_WEBO_SYSTEM_TROUBLES2', 'проблем');
define('_WEBO_SYSTEM_WARNING', 'замечание');
define('_WEBO_SYSTEM_WARNINGS', 'замечания');
define('_WEBO_SYSTEM_WARNINGS2', 'замечаний');
define('_WEBO_SYSTEM_javascript_writable', 'JavaScript-директория не доступна');
define('_WEBO_SYSTEM_css_writable', 'CSS-директория не доступна');
define('_WEBO_SYSTEM_html_writable', 'HTML-директория не доступна');
define('_WEBO_SYSTEM_config_writable', 'Конфигурационный файл не доступен');
define('_WEBO_SYSTEM_htaccess_writable', '<code>.htaccess</code> не доступен');
define('_WEBO_SYSTEM_index_writable', '<code>index.php</code> не доступен');
define('_WEBO_SYSTEM_curl_possibility', 'Расширение <code>curl</code> не доступно');
define('_WEBO_SYSTEM_gzip_possibility', 'Расширение <code>zlib</code> не доступно');
define('_WEBO_SYSTEM_gd_possibility', 'Расширение <code>gd</code> не доступно');
define('_WEBO_SYSTEM_gd_full_support', 'Расширение <code>gd</code> доступно частично');
define('_WEBO_SYSTEM_yui_possibility', 'YUI Compressor не доступен');
define('_WEBO_SYSTEM_hosts_possibility', 'Нет множественных хостов');
define('_WEBO_SYSTEM_mod_deflate', 'Нет поддержки <code>mod_deflate</code>');
define('_WEBO_SYSTEM_mod_gzip', 'Нет поддержки <code>mod_gzip</code>');
define('_WEBO_SYSTEM_mod_headers', 'Нет поддержки <code>mod_headers</code>');
define('_WEBO_SYSTEM_mod_expires', 'Нет поддержки <code>mod_expires</code>');
define('_WEBO_SYSTEM_mod_mime', 'Нет поддержки <code>mod_mime</code>');
define('_WEBO_SYSTEM_mod_setenvif', 'Нет поддержки <code>mod_setenvif</code>');
define('_WEBO_SYSTEM_mod_rewrite', 'Нет поддержки <code>mod_rewrite</code>');
define('_WEBO_SYSTEM_mod_symlinks', 'Нет поддержки <code>SymLinks</code>');
define('_WEBO_SYSTEM_protected_mode', 'Незащищенный режим работы');
define('_WEBO_SYSTEM_cms', 'Нет поддержки CMS');
define('_WEBO_SYSTEM_memory_limit', 'Память ограничена');

/* System status */
define('_WEBO_SYSTEM_STATUS', 'Состояние');
define('_WEBO_SYSTEM_SETTINGS', 'Параметры');
define('_WEBO_SYSTEM_UPDATES', 'Обновление');
define('_WEBO_SYSTEM_NOUPDATES', 'Вы используете самую последнюю версию WEBO Site SpeedUp');
define('_WEBO_SYSTEM_ROLLBACK', 'Откатить до версии');
define('_WEBO_SYSTEM_INSTALL', 'Установка и удаление');
define('_WEBO_SYSTEM_ISSUES', 'Проблемы и замечания');
define('_WEBO_SYSTEM_SETTINGS_TITLE', 'Параметры приложения');
define('_WEBO_SYSTEM_UPDATES_TITLE', 'Обновление программы');
define('_WEBO_SYSTEM_INSTALL_TITLE', 'Установка и удаление WEBO Site SpeedUp');
define('_WEBO_SYSTEM_INSTALLED', 'WEBO Site SpeedUp установлен на');
define('_WEBO_SYSTEM_INSTALLINFO', 'Приведенные ниже изменения, осуществленные во время установки WEBO Site SpeedUp, могут быть отменены по нажатию на кнопку &laquo;Удалить&raquo;:');
define('_WEBO_SYSTEM_INSTALLINFO2', 'Вы в любое время можете восстановить вызовы приложения в исходных файлах системы. Для этого достаточно нажать кнопку &laquo;Установить&raquo; (или &laquo;Переустановить&raquo;). В случае удаления приложения все файлы в кэше и настройки будут сохранены.');
define('_WEBO_SYSTEM_SUCCESS', 'Все изменения исходных файлов успешно проведены.');
define('_WEBO_SYSTEM_USERNAME', 'Пожалуйста, введите логин для ограничения доступа к WEBO Site SpeedUp по .htaccess.');
define('_WEBO_SYSTEM_EXTERNAL_HTACCESS', 'Пожалуйста, введите логин и пароль для доступа к сайту через HTTP Basic Authorization.');

/* Dashboard options block */
define('_WEBO_DASHBOARD_OPTIONS_DISABLED', 'Отключен');

/* Dashboard speed block */
define('_WEBO_DASHBOARD_SPEED_GAINED', 'Полученное ускорение');
define('_WEBO_DASHBOARD_SPEED_SAVINGS', 'Экономия');
define('_WEBO_DASHBOARD_SPEED_NODATA', 'Нет данных');

/* Tools pages */
define('_WEBO_TOOLS_GZIP', 'Статическое сжатие');
define('_WEBO_TOOLS_IMAGE', 'Оптимизация изображений');

/* Dashboard order block */
define('_WEBO_DASHBOARD_HELP', 'Закажите настройку');
define('_WEBO_DASHBOARD_HELP1', 'Возникли проблемы с настройкой WEBO Site SpeedUp?');
define('_WEBO_DASHBOARD_HELP2', 'Наши специалисты помогут установить и отладить WEBO Site SpeedUp для вашего сайта.');
define('_WEBO_DASHBOARD_SEND', 'Отправить заявку');

/* Account page */
define('_WEBO_ACCOUNT_EXPIRES', 'Срок действия истекает');
define('_WEBO_ACCOUNT_LICENSEINFO', 'WEBO Site SpeedUp распространяется по годовой подписке. Использование некоммерческой версии возможно только для некоммерческих сайтов (<a href="http://www.web-optimizer.us/ru/web-optimizer/questions-answers.html" class="wssJ">ознакомьтесь с ответами на часто задаваемые вопросы</a>). Для коммерческих сайтов (т.е. сайтов, деятельность которых связана с извлечением прибыли) WEBO Site SpeedUp доступен в двух редакциях: облегченной и полной (<a href="#wss_promo" class="wssJ">сравнение версий</a>).');
define('_WEBO_ACCOUNT_LICENSEINFO2', 'Регистрация лицензионного ключа осуществляется автоматически: его нужно просто ввести в поле слева. После регистрации будет выводиться информация о сроке истечения его действия. По его окончанию вы можете приобрести продление лицензии WEBO Site SpeedUp.');
define('_WEBO_ACCOUNT_LICENSEINFO3', 'Все вопросы касательно политики лицензирования программы можно задать, <a href="http://www.web-optimizer.us/ru/about/comtacts.html" class="wssJ">используя контакты, приведенные на официальном сайте</a>.');
define('_WEBO_ACCOUNT_INVALID', 'Введите правильный лицензионный ключ или оставьте поле пустым');
define('_WEBO_ACCOUNT_SERVER_UNAVAILABLE', 'Извините, но регистрационный сервер сейчас недоступен. Попробуйте зарегистрироваться позже');

/* Cache page */
define('_WEBO_CACHE_EMPTY', 'В кэше ничего нет');
define('_WEBO_CACHE_TOTAL', 'Общий размер всех файлов в кэше');
define('_WEBO_CACHE_SELECTED', 'Общий размер выбранных файлов');
define('_WEBO_CACHE_NOTHING', 'Нет файлов, удовлетворяющих условию');
define('_WEBO_CACHE_FILENAME', 'Имя файла');
define('_WEBO_CACHE_TYPE', 'Тип');
define('_WEBO_CACHE_BROWSER', 'Браузер');
define('_WEBO_CACHE_FILTER', 'Фильтр');
define('_WEBO_CACHE_EXT', 'Расширению');
define('_WEBO_CACHE_ALL', 'Все файлы');

/* Options page */
define('_WEBO_OPTIONS_APPLY', 'Применить');
define('_WEBO_OPTIONS_EDIT', 'Изменить');
define('_WEBO_OPTIONS_CONFIRM', 'Вы уверены, что хотите удалить конфигурацию "');
define('_WEBO_OPTIONS_CONFIGURATION', 'Конфигурация');
define('_WEBO_OPTIONS_DESCRIPTION', 'Описание');
define('_WEBO_OPTIONS_APPLYCONFIG', 'применить конфигурацию');
define('_WEBO_OPTIONS_EDITCONFIG', 'изменить конфигурацию');
define('_WEBO_OPTIONS_DELETECONFIG', 'удалить конфигурация');
define('_WEBO_OPTIONS_ALLCONFIGS', 'Все конфигурации');
define('_WEBO_OPTIONS_CREATENEW', 'Создать новую');
define('_WEBO_OPTIONS_EXTREME', 'Экстремальная');
define('_WEBO_OPTIONS_OPTIMAL', 'Оптимальная');
define('_WEBO_OPTIONS_SAFE', 'Безопасная');
define('_WEBO_OPTIONS_ATTENTION', 'Внимание!');
define('_WEBO_OPTIONS_ATTENTION2', 'Изменение конфигурации может повлечь за собой неработоспособность сайта. Пожалуйста, <a href="#wss_system" class="wssJ">переведите приложение в режим отладки</a> перед внесением изменений.');
define('_WEBO_OPTIONS_TITLES_safe', 'Безопасная конфигурация');
define('_WEBO_OPTIONS_TITLES_optimal', 'Оптимальная конфигурация');
define('_WEBO_OPTIONS_TITLES_extreme', 'Экстремальная конфигурация');
define('_WEBO_OPTIONS_TITLES_user', 'Пользовательская конфигурация');
define('_WEBO_OPTIONS_DESCRIPTIONS_safe', 'Все настройки тщательно подобраны таким образом, чтобы обеспечить максимальная производительность WEBO Site SpeedUp, но при этом гарантированно не причинить никакого вреда сайту.');
define('_WEBO_OPTIONS_DESCRIPTIONS_optimal', 'Оптимальные настройки позволяют добиться более высокой скорости загрузки, но в некоторых случаях могут привести к  неработоспособности сайта.');
define('_WEBO_OPTIONS_DESCRIPTIONS_extreme', 'Экстремальные настройки обеспечивают, практически, максимально возможную производительность. Но обязательно должны быть проверены перед применением для сайта.');
define('_WEBO_OPTIONS_DESCRIPTIONS_user', 'Пользовательские настройки.');

/* Version comparison */
define('_WEBO_SPLASH2_COMPARISON', 'Сравнение версий WEBO Site SpeedUp');
define('_WEBO_SPLASH2_COMPARISON_TITLE', 'Аспекты технологии');
define('_WEBO_SPLASH2_COMPARISON_DEMO', 'Некоммерческая');
define('_WEBO_SPLASH2_COMPARISON_LITE', 'Облегченная');
define('_WEBO_SPLASH2_COMPARISON_FULL', 'Полная');
define('_WEBO_SPLASH2_COMPARISON_VERSION', 'версия');
define('_WEBO_SPLASH2_COMPARISON_SUPPORT', 'Техническая поддержка');
define('_WEBO_SPLASH2_COMPARISON_SPEEDUP', 'Ускорение');
define('_WEBO_SPLASH2_COMPARISON_CPU', 'Процессорные затраты');
define('_WEBO_SPLASH2_COMPARISON_CPU_MS', 'мс');
define('_WEBO_SPLASH2_COMPARISON_ANDMORE', 'и больше');
define('_WEBO_SPLASH2_COMPARISON_UPTO', 'до');
define('_WEBO_SPLASH2_COMPARISON_UPTO2', 'на');
define('_WEBO_SPLASH2_COMPARISON_TRAFFIC', 'меньше трафика');
define('_WEBO_SPLASH2_COMPARISON_LOAD', 'меньше серверной нагрузки');
define('_WEBO_SPLASH2_COMPARISON_SAVED', 'меньше серверной нагрузки');
define('_WEBO_SPLASH2_COMPARISON_REQUESTS', 'меньше HTTP-запросов');
define('_WEBO_SPLASH2_COMPARISON_ACCELERATION', 'быстрее загрузка сайта');
define('_WEBO_SPLASH2_COMPARISON_NOTINCLUDED', 'отсутствует');
define('_WEBO_SPLASH2_COMPARISON_ALLBENEFITS', 'Все преимущества');
define('_WEBO_SPLASH2_COMPARISON_PRICE', 'Цена');
define('_WEBO_SPLASH2_COMPARISON_FREE', 'бесплатно');
define('_WEBO_SPLASH2_COMPARISON_UPDATE', 'Бесплатное обновление продукта');
define('_WEBO_SPLASH2_COMPARISON_LITEPRICE', '399 руб.');
define('_WEBO_SPLASH2_COMPARISON_FULLPRICE', '1999 руб.');

/* About */
define('_WEBO_ABOUT_TITLE', 'О WEBO Site SpeedUp');
define('_WEBO_ABOUT_ABOUT', 'О продукте');
define('_WEBO_ABOUT_SUPPORT', 'Полезная информация');
define('_WEBO_ABOUT_SUPPORT_INSTALLING', 'Проблемы при установке');
define('_WEBO_ABOUT_SUPPORT_CLIENT', 'Проблемы на стороне клиента');
define('_WEBO_ABOUT_SUPPORT_SERVER', 'Проблемы на стороне сервера');
define('_WEBO_ABOUT_FEATURES', 'Возможности продукта');
define('_WEBO_ABOUT_BENEFITS', 'Преимущества');
define('_WEBO_ABOUT_REQUIREMENTS', 'Системные требования');
define('_WEBO_ABOUT_BUZZ', 'Отзывы пользователей');
define('_WEBO_ABOUT_SENDMESSAGE', 'Отправить сообщение');
define('_WEBO_ABOUT_EMAIL', 'E-mail для ответа');
define('_WEBO_ABOUT_ENTEREMAIL', 'Введите e-mail, на который должен прийти ответ');
define('_WEBO_ABOUT_MESSAGE', 'Ваше сообщение');
define('_WEBO_ABOUT_ENTEREMESSAGE', 'Введите ваше сообщение');
define('_WEBO_ABOUT_SEND', 'Отправить');
define('_WEBO_ABOUT_SUCCESS', 'Ваше сообщение отправлено');
define('_WEBO_ABOUT_TEXT', '<p class="wssI0">Программный продукт <strong>WEBO Site SpeedUp</strong> разрабатывается с марта 2009 года и является автоматизированным решением для увеличения скорости загрузки веб-страниц. Он сочетает в себе множество проверенных временем решений и новейших технологий, что позволяет добиться исключительной клиентской производительности вашего сайта. Все права на <strong>WEBO Site SpeedUp</strong> принадлежат компании <a href="http://www.web-optimizer.us/about/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">WEBO Software</a>, которая явлется мировым лидером в разработке решений для увеличения клиентской производительности веб-сайтов. Последние новости компании <a href="http://blog.web-optimizer.us/">публикуются в официальном блоге</a>.</p><p class="wssI0">Вы можете принять участие в разработке или тестировании данного продукта, а также в переводе его на другие языки. Для этого свяжитесь, пожалуйста, с нами <a href="http://www.web-optimizer.us/about/contacts.html?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">используя указанные координаты</a> или используя приведенную ниже форму. Мы будем рады получить от вас сообщение.</p><p class="wssI0">Также Вы можете поддержать продукт, используя <a href="http://twitter.com/wboptimizer">Twitter</a>, <a href="http://www.facebook.com/pages/Web-Optimizer/183974322020">страницу в Facebook</a>, <a href="http://extensions.joomla.org/extensions/site-management/cache/10152">Joomla! Extensions Directory</a> или <a href="http://wordpress.org/extend/plugins/web-optimizer/">сайт Wordpress</a>.</p>');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_SAVED', 'Ваші налаштування були успішно збережені.');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Необхідні зміни');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'Ваш сайт, який використовує ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ', був успішно прискорений. Ви можете <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">перевірити результат, який вийшов</a>.');
define('_WEBO_SPLASH3_ADD', 'Ви повинні <a href="#modify">додати виклик Web Optimizer</a> до ваших серверних скриптів (');
define('_WEBO_SPLASH3_ADD_', '). Це буде значно простіше, якщо у вас є 1 файл, який обслуговує всі інші сторінки, таким чином вам потрібно буде змінити тільки його.');
define('_WEBO_SPLASH3_MODIFY', 'Як потрібно змінити ваш файл');
define('_WEBO_SPLASH3_TOFILE', 'У файл');
define('_WEBO_SPLASH3_TOFILE2', 'На початок файлу');
define('_WEBO_SPLASH3_TOFILE3', 'На кінець файлу');
define('_WEBO_SPLASH3_AFTERSTRING', 'після пядка');
define('_WEBO_SPLASH3_ADD2', 'додати');
define('_WEBO_SPLASH3_CANTWRITE', 'Не вдається записати у вказану вами директорію ');
define('_WEBO_SPLASH3_CANTWRITE2', '. Будь-ласка, перевірте існування вашої директорії і доступ на її запис.');
define('_WEBO_SPLASH3_CANTWRITE3', 'Ви можете зробити це також через свій FTP-клієнт. Для цього потрібно перейти в директорію, зайти в її властивості або виконати CHMOD 775 aбо CHMOD 777.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Після того, як ви усунете цю проблему, будь-ласка, перезавантажте сторінку.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Пожалуйста, убедитесь, что папка WEBO Site SpeedUp доступна на чтение и запись для вашего веб-сервера. Иначе выполните CHMOD 775 или CHMOD 777 для нее.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Будь-ласка, переконайтеся, що коренева папка вашого сайту доступна для запису для вашого веб-серверу або в ній існує доступний для запису файл <code>.htaccess</code>.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Виконайте для директорії CHMOD 775 aбо CHMOD 777, або створіть в корені файл <code>.htaccess</code>, доступний для запису для вашого веб-серверу, або дозвольте запис для поточного файлу <code>.htaccess</code> (CHMOD 664 aбо CHMOD 777).');
define('_WEBO_SPLASH3_CONFSAVED', 'Конфігурація збережена');
define('_WEBO_SPLASH3_CONFIGERROR', 'Неможливо відкрити для запису конфігураційний файл. Будь-ласка, змініть права доступу для файлу <code>config.webo.php</code> Web Optimizer, щоб він був доступний для запису для вашого веб-серверу.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'Ви можете це зробити за допомогою вашого FTP-клієнта. Для цього просто перейдіть в директорію <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , потім увійдіть до властивостей файлу або виконайте CHMOD. Встановіть у 775 або 777, або "write"');

/* Create .gz versions of css/js file */
define('_WEBO_GZIP_INSTALLED', 'Вы можете создать <code>.gz</code>-версии всех CSS- и JS-файлов, а также ряда других (для использования статическиого сжатия). Для этого введите исходную директорию. Она будет рекурсивно просмотрена на наличие необходимых файлов, текущие <code>.gz</code>-версии файлов будут обновлены при необходимости.');
define('_WEBO_GZIP_INSTALLED2', 'После сжатия время изменения сжатого файла устанавливается одинаковым со временем изменения исходного файла. При повторном сжатии у каждого сжатого файла проверяется время изменения, и в том случае, если оно отличается от времени изменения несжатого файла, сжатие производится повторно.');
define('_WEBO_GZIP_RESULTS', 'Результаты сжатия:');
define('_WEBO_GZIP_ENTERDIRECTORY', 'Введите исходную директорию');
define('_WEBO_GZIP_DIRECTORY', 'Директория');
define('_WEBO_GZIP_RECURSIVE', 'Учитывать поддиректории');
define('_WEBO_GZIP_ENTERRECURSIVE', 'Произвести поиск / сжатие файлов рекурсивно');
define('_WEBO_GZIP_COMPRESS', 'Сжать файлы');
define('_WEBO_GZIP_FIND', 'Найти файлы');
define('_WEBO_GZIP_WAIT', 'Подождите, идет поиск файлов');
define('_WEBO_GZIP_OPTIMIZATION', 'Подождите, идет оптимизация файлов');
define('_WEBO_GZIP_PROCESSING', 'Обрабатывается файл');
define('_WEBO_GZIP_OUTOF', 'из');
define('_WEBO_GZIP_RELATIVE', 'Относительный путь к файлу');
define('_WEBO_GZIP_SIZE', 'Размер');
define('_WEBO_GZIP_MTIME', 'Время изменения');
define('_WEBO_GZIP_NOTCHANGED', 'не изменен');
define('_WEBO_GZIP_INITIAL_TOTAL', 'Размер исходных файлов');
define('_WEBO_GZIP_FINAL_TOTAL', 'Размер сжатых файлов');
define('_WEBO_GZIP_SAVINGS', 'Суммарная экономия');
define('_WEBO_GZIP_INITIAL', 'Исходный размер');
define('_WEBO_GZIP_FINAL', 'Уменьшение размера');
define('_WEBO_GZIP_NOTHING', 'Ничего не найдено');

/* Image optimization */
define('_WEBO_IMAGE_INSTALLED', 'Вы можете уменьшить размеры графических файлов на вашем сайте (без изменения качества изображения). Для этого введите исходную директорию. Она будет рекурсивно просмотрена на наличие необходимых файлов, текущие <code>.backup</code>-версии файлов будут обновлены при необходимости.');
define('_WEBO_IMAGE_INSTALLED2', 'При оптимизации создаются резервные копии всех изображений (<code>.backup</code>). В дальнейшем вы можете отменить все изменения, используя эти резервные копии. Для оптимизации используется сервис <a href="http://smush.it/" rel="nofollow" class="wssJ">smush.it</a> (<a href="http://info.yahoo.com/legal/us/yahoo/smush_it/smush_it-4378.html" rel="nofollow" class="wssJ">правила использования</a>) или <a href="http://punypng.com/" rel="nofollow" class="wssJ">punypng.com</a> (<a href="http://www.gracepointafterfive.com/punypng/about/tos" rel="nofollow" class="wssJ">правила использования</a>). GIF-файлы заменяются на PNG, если при этом происходит уменьшение в размере.');
?>