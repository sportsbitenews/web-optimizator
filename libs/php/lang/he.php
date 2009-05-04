<?php
/**
 * File from Web Optimizer, Vladimir Karpov (http://pcwalker.co.il/)
 * Contains all He localization constants
 *
 **/

/* general layout */
define('_WEBO_CHARSET', 'UTF-8');
define('_WEBO_GENERAL_TITLE', 'הגדרות של מַאֲרָג האופטימיזטור');

/* error layout */
define('_WEBO_ERROR_TITLE', 'הממ ... יש לנו בעיה');
define('_WEBO_ERROR_ERROR', 'אופס! משהו לא בסדר');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'נא להזין את פרטי כְּנִיסָה לַמַעֲרֶכֶת');
define('_WEBO_LOGIN_INSTALLED', 'באתר זה כבר מותקן מַאֲרָג האופטימיזטור');
define('_WEBO_LOGIN_INSTALLED2', '. נא להזין את שם המשתמש והסיסמה שלך כדי לקבל גישה לכל ההגדרות:');
define('_WEBO_LOGIN_USERNAME', 'שם משתמש');
define('_WEBO_LOGIN_ENTERLOGIN', 'הזן את שם המשתמש שלך');
define('_WEBO_LOGIN_PASSWORD', 'סיסמה');
define('_WEBO_LOGIN_ENTERPASSWORD', 'הזן את סיסמתך');
/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'רענן');
define('_WEBO_LOGIN_UPGRADENOTICE', 'אתה יכול לעדכן את הגירסה הנוכחית של מַאֲרָג האופטימיזטור (');
define('_WEBO_LOGIN_UPGRADENOTICE2', ') עד העדכני ביותר. לשם כך, הכנס את שם המשתמש ואת הסיסמה בטופס הנ"ל, ולחץ על <strong>עדכן</strong>. 1 יהיה משודרג אוטומטית לגרסה <strong>');
define('_WEBO_LOGIN_UPGRADENOTICE3', '</strong>.');
define('_WEBO_UPGRADE_SUCCESSFULL', 'בהצלחה עודכן לגרסה ');
define('_WEBO_UPGRADE_UNABLE', 'לא ניתן להוריד את הגרסה האחרונה. אנא בדוק את חיבור האינטרנט של השרת ואת הגדרות של CURL');
/* Uninstall */
define('_WEBO_LOGIN_UNINSTALL', 'כדי להסיר מַאֲרָג האופטימיזטור ממערכת שלך אנא הכנס שם המשתמש והסיסמה שלך בטופס למעלה <strong>הסר התקנה</strong>.');
define('_WEBO_LOGIN_UNINSTALLME', 'הסר התקנה של מַאֲרָג האופטימיזטור');
define('_WEBO_LOGIN_FAILED', 'שם משתמש או סיסמה שהוזן שגוי');
define('_WEBO_LOGIN_ACCESS', 'דף זה זמין רק עבור משתמשים מורשים');
define('_WEBO_LOGIN_LOGGED', 'מחובר');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'התקנה - הגבלת גישה');
define('_WEBO_NEW_PROTECT', 'כדי להבטיח את ביטחונם של המשך השימוש במַאֲרָג האופטימיזטור חייבים להגדיר סיסמה לגישה.');
define('_WEBO_NEW_USERDATA', 'שם המשתמש והסיסמה שלך');
define('_WEBO_NEW_ENTER', 'הכנס את שם המשתמש והסיסמה שלך');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'להסיר');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'אנו מודים לך על השימוש במַאֲרָג האופטימיזטור. אתה יכול להתקין אותו שוב במועד מאוחר יותר על ידי ביקור <a href=”http://');
define('_WEBO_SPLASH1_UNINSTALL_THANKS2', '"> דף של אופטימיזטור דפי אינטרנט</a>.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'נשמח לראות משוב על מערכת ב <a href="http://code.google.com/p/web-optimizator/"> אתר של אופטימיזטור דפי אינטרנט </a>  , אתה יכול גם לשלוח <a href="http://code.google.com/p/web-optimizator/issues/list"> כל השאלות ו בעיות </a>');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'עכשיו אתה יכול לחזור <a href="');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">האתר שלך</a>.');
define('_WEBO_SPLASH1_TITLE', 'ההתקנה - שלב ראשון');
define('_WEBO_SPLASH1_WELCOME', 'רוכים הבאים התקנת אופטימיזטור דפי אינטרנט!');
define('_WEBO_SPLASH1_PATH', 'הגדרת נתבים');
define('_WEBO_SPLASH1_FULLPATH', 'הנתיב המלא אל הבסיס של האתר:');
define('_WEBO_SPLASH1_NOTICE', 'הבסיס של האתר - הוא ספרייה על הכונן הקשיח, בו הוא נתון ואת ממנו את כל קבצי ה-HTML-. אם אין לך מושג על מה היא בסכנה, עדיף לצאת לעיל בדרך. כדי לעשות זאת, פשוט לחץ <strong> הבא  ...</ strong>.');
define('_WEBO_SPLASH1_INCORRECT', '<strong> אם הנתיב מוצג בצורה לא נכונה </ strong>, הזן את האפשרות הנכונה.');
define('_WEBO_SPLASH1_NEXT', ' <strong> הבא  ...</ strong>.');
define('_WEBO_SPLASH1_EXPRESS', 'התקנה מהירה');

/* Second splash -- set options */
define('_WEBO_SPLASH2_TITLE', 'התקנה - שלב שני');
define('_WEBO_SPLASH2_SAVED', 'שמור הגדרות: ');
define('_WEBO_SPLASH2_OPTIONS', 'העדפות אופטימיזטור דפי אינטרנט');
define('_WEBO_SPLASH2_CACHE', 'מדריך במטמון');
define('_WEBO_SPLASH2_CACHE_JS', 'קבצי JavaScript יהיו ממוקמים');
define('_WEBO_SPLASH2_CACHE_CSS', 'CSS-הקבצים יהיו ממוקמים ב');
define('_WEBO_SPLASH2_INSTALLDIR', 'אופטימיזטור דפי אינטרנט ממיקום ב');
define('_WEBO_SPLASH2_DOCUMENTROOT', 'האתר ממוקם ב');
define('_WEBO_SPLASH2_SPACE', 'בבקשה, לפי שטח:');
define('_WEBO_SPLASH2_YES', 'כן:');
define('_WEBO_SPLASH2_NO', 'לא:');
define('_WEBO_SPLASH2_UNABLE', 'לא ניתן לפתוח');
define('_WEBO_SPLASH2_MAKESURE', '.<br/>אנא ודא כי זה תיקייה קיימת ו ממוקם הבסיס של האתר.');
/* Web Optimizer options */
define('_WEBO_SPLASH2_JSLIB', 'קבצי JavaScript ');
define('_WEBO_SPLASH2_JSLIB_INFO', 'אם ההיגיון הלקוח שלך משתמשת את בכמה קבצים מיוחדים של-JavaScript הספרייה, אז תוסיף אותם לראיה אופטימיזטור דפי אינטרנט. 
<br/> <br/> אופטימיזטור דפי אינטרנט קבעה כי הקבצים הבאים ניתן להוסיף ישירות אליך. יש צורך לשנות או לעדכן את רשימת המכונה של הקבצים אם יהיה צורך בכך.
');
define('_WEBO_SPLASH2_MINIFY', 'הגדרות דחיסה');
define('_WEBO_SPLASH2_MINIFY_INFO', 'הדוחס מסיר מ-CSS ו-JavaScript קבצים, רווחים, וכן שורות תווים לא רצויות אחרות. 
<br/> אתה יכול גם לבחור אחד מתוך מספר כלים כדי למזער או האפלה.');
define('_WEBO_SPLASH2_UNOBTRUSIVE', '&laquo;קל&raquo; JavaScript');
define('_WEBO_SPLASH2_UNOBTRUSIVE_INFO', '&laquo;קל&raquo; JavaScript-הקבצים טעון בהקדם הדף מופיע בדפדפן (בדף ייווצר Dom-עץ). 
<br/> את השימוש עשוי להגדיל באופן משמעותי את מהירות ההורדה של דף עבור משתמשי קצה. אולם במקרים מסוימים (אם לא מספיק מדויק באמצעות JavaScript-Library), היא עלולה לשבש באופן משמעותי את הביצועים של האתר שלך. 
<br/> היא כי אפשרות זו מומלצת רק אם ביטחון מלא של ההיגיון הלקוח.');
define('_WEBO_SPLASH2_MTIME', 'אל תבדוק את הזמן שינוי תוכן הקבצים');
define('_WEBO_SPLASH2_MTIME_INFO', 'בדרך כלל, אופטימיזטור דפי אינטרנט, בודק האם קבצים (זמן שינוי תוכן ומה התוכן שלהם) והן על בסיס של מידע או קישורים קיימים קבצים סטטיים או יוצרת חדשים. 
<br/> במונחים של שרת אופטימיזציה עדיף שלא לבדוק כל הזמן, אם את הקבצים ומחק על העובדה של שינוי דרך במטמון גירסה. 
<br/> לכלול הגדרה זו תצטרך לנהל את מטמון ה אופטימיזטור דפי אינטרנט, אבל עומס נוסף על השרת לא יהיה.');
define('_WEBO_SPLASH2_EXTERNAL', 'לול קבצים חיצוניים JavaScript ו-מוטבע קוד');
define('_WEBO_SPLASH2_EXTERNAL_INFO', 'בעת הפעלת הגדרה זו, כל הקבצים-JavaScript, התוספת לאתרים חיצוניים, כמו גם של קוד JavaScript-, הנמצא בסעיף <code> בראש </ code> יהיה למזג לתוך קובץ בודד, בגודל מוקטן הם מחוברים ואת מיד לאחר CSS-קובץ. 
<br/> זה יהיה שימושי במיוחד אם אתה משתמש במספר גדול של מודולים של אתרים שונים, אשר אינם יכולים להיות מחובר «מתבלט» מצב. 
<br/> אתה יכול גם לציין את שמות הקבצים שאמורים להיות נכלל בין עמותות כאלה (לדוגמה, ga.js, jquery.min.js, וכו).
');
define('_WEBO_SPLASH2_GZIP', 'הגדרות גיבוי');
define('_WEBO_SPLASH2_GZIP_INFO', 'יישום <code> gzip </ code>-מאפשר דחיסה 80-85% כדי לצמצם את הגודל של קבצי טקסט. 
<br/> טעון הגדרות עבור אתרים מומלצים <code> gzip </ code>-דחיסה להעביר את קובץ תצורת השרת (או להשתמש בהגדרות <code>. htaccess </ code> להלן).');
define('_WEBO_SPLASH2_EXPIRES', '&laquo;הנצחית &raquo; במטמון');
define('_WEBO_SPLASH2_EXPIRES_INFO', 'כתוצאה תצורה זו לכל הקבצים סטטי המטמון כותרות הוספת predostvratit את השני כדי לבקש לשרת עבור אותו משתמש. 
שינוי <br/>-JavaScript או CSS-קובץ ייווצר אוטומטית ממוזער לגרסה החדשה, אשר תהיה «לשבור» את המטמון בדפדפן. לקבלת תמונות ושאר קבצים סטטיים מוזמנים להשתמש בשם חדש כאשר הם פיזית לשנות');
define('_WEBO_SPLASH2_SPRITES', 'CSS Sprites');
define('_WEBO_SPLASH2_SPRITES_INFO', 'יש הזדמנות לאחד את רוב רקע תמונות ב CSS Sprites. פעולה זו מפחיתה באופן משמעותי את מספר בקשות-HTTP כדי לטעון את האתר. 
<br/> טכניקה זו יש תמיכה מלאה של כל הדפדפנים המודרניים. אתה יכול גם לעבור טיפול אגרסיבי יותר באמצעות CSS Sprites, אם אתה בטוח ב נכונות של ה-CSS את הכללים. 
<br/> אתה יכול להגדיר גם סט של תמונות שיהיה נכלל כשיצרת CSS Sprites (לדוגמה, logo.png, bg.gif, וכו).
');
define('_WEBO_SPLASH2_DATAURI', 'Data:URI');
define('_WEBO_SPLASH2_DATAURI_INFO', 'ניתן לתרגם כל רקע תמונות בפורמט <code> נתונים: אורי </ code> (base64 מסוג). לכן בעת הטעינה העיצוב של האתר יהיה ביצע רק אחד HTTP-בקשה - הקובץ סגנונות. 
<br/> אזהרה: טכניקה זו אינה נתמכת על ידי מספר דפדפנים (אינטרנט אקספלורר גרסה 7 כולל). עם זאת, הם משתמשים CSS-כללים מיוחדים המאפשרים לטעון את התמונה נורמלי. כמו כן, הגודל של הקובץ הסופי CSS-עשוי להגדיל באופן משמעותי (לכלול תמונות רקע עצמם).
');
define('_WEBO_SPLASH2_HTACCESS', 'שימוש .htaccess');
define('_WEBO_SPLASH2_HTACCESS_INFO', 'רוב ההגדרות <code> gzip </ code> ו-דחיסה במטמון יכול להיות מוקלט בקובץ התצורה של השרת שלך, כדי למנוע עבודה נוספת על סקריפטים בצד השרת. ניתן לעשות זאת באמצעות <code>. Htaccess </ code> (במידת הצורך תוכל להעביר עצמאי בכל nastroyik קובץ <code> httpd.cond </ code>). 
<br/> זמינים מודולים:');
define('_WEBO_SPLASH2_CLEANUP', 'מחיקת קבצים');
define('_WEBO_SPLASH2_CLEANUP_INFO', 'כאשר אתה משנה את JavaScript ו-CSS-קבצים, אופטימיזטור דפי אינטרנט באופן אוטומטי יצור גרסה משולבת חדשה ו קבצים דחוסים. כדי להסיר גירסאות ישנות של נא לכלול אפשרות זו. 
<br/> עם זאת, אם האתר שלך משתמש שונים מערכי סקריפטים ו stylesheets קבצים עבור חלקים שונים של האתר, זה יכול להוביל את ההסרה הרגיל של הקובץ הרצוי, אשר משפיעה לשלילה את הפרודוקטיביות של האתר. בדרך כלל, הגדרה זו לא מומלצת.');
define('_WEBO_SPLASH2_FOOTER', 'לוגו של אופטימיזטור דפי אינטרנט');
define('_WEBO_SPLASH2_FOOTER_INFO', 'אופטימיזטור דפי אינטרנט יכול להוסיף סמל של אופטימיזטור עם קישור הפרויקט. זה יכול להיות מודפס או מכונה, כמו גם את שניהם. <br/> הפעלת אפשרות זו תומכת בהתפשטות אופטימיזטור באינטרנט');
define('_WEBO_SPLASH2_AUTOCHANGE', 'שינוי אוטומטיים / index.php');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO', 'אופטימיזטור דפי אינטרנט  יכול להפוך באופן אוטומטי לעדכן את השינויים הנדרשים על פי רוב הקבצים של האתר שלך באמצעות');
define('_WEBO_SPLASH2_AUTOCHANGE_INFO2', ' (השינויים יחולו רק על <code> / index.php </ code>).
									<br/>הערה: עבור חלק בלתי CMS ו בסביבות המעטה זה יכול להוביל עקיפה של המפה.');
define('_WEBO_unobtrusive_on', 'כלול &laquo;קל&raquo; JavaScript');
define('_WEBO_external_scripts_on', 'כלול ההתאגדות קבצים חיצוניים ');
define('_WEBO_external_scripts_ignore_list', 'מחיקת קבצים מן ההתאגדות');
define('_WEBO_minify_javascript', 'שלב-JavaScript קבצים');
define('_WEBO_dont_check_file_mtime', 'אל תסמן את הזמן שינויים בקובץ');
define('_WEBO_minify_with_jsmin', 'מזער באמצעות JSMin');
define('_WEBO_minify_with_packer', 'מזער באמצעות אורז');
define('_WEBO_minify_with_yui', 'למזער את השימוש YUI מלחץ');
define('_WEBO_minify_css', 'זער לשלב ו קבצים CSS ');
define('_WEBO_minify_page', 'HTML מזער');
define('_WEBO_gzip_javascript', 'להחיל <code>gzip</code> עבור JavaScript');
define('_WEBO_gzip_css', 'להחיל <code>gzip</code> עבור CSS');
define('_WEBO_gzip_page', 'להחיל <code>gzip</code> עבור HTML');
define('_WEBO_far_future_expires_javascript', 'מטמון JavaScript');
define('_WEBO_far_future_expires_css', 'מטמון CSS');
define('_WEBO_far_future_expires_static', 'מטמון קבצים סטטיים');
define('_WEBO_footer_text', 'הוסף קישור לאופטימיזטור דפי אינטרנט');
define('_WEBO_footer_image', 'הוסף תמונה לאופטימיזטור דפי אינטרנט');
define('_WEBO_cleanup_on', 'מחיקת קבצים ישנים');
define('_WEBO_data_uris_on', 'להחיל <code>data:URI</code>');
define('_WEBO_css_sprites_enabled', 'להחיל CSS Sprites');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'שמור את התמונה המלאה על JPEG');
define('_WEBO_css_sprites_aggressive', '&laquo;אגרסיביתפעלולי&raquo; כדי יצירת CSS Sprites');
define('_WEBO_css_sprites_extra_space', 'הוסף את השטח הפנוי ב CSS Sprites');
define('_WEBO_css_sprites_ignore_list', 'מחיקת קבצים מן CSS Sprites');
define('_WEBO_htaccess_enabled', 'להחיל <code>.htaccess</code>');
define('_WEBO_htaccess_mod_deflate', 'להחיל <code>mod_deflate</code>');
define('_WEBO_htaccess_mod_gzip', 'להחיל <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_expires', 'להחיל <code>mod_expires</code>');
define('_WEBO_htaccess_mod_headers', 'להחיל <code>mod_headers</code>');
define('_WEBO_htaccess_mod_setenvif', 'להחיל <code>mod_setenvif</code>');
define('_WEBO_auto_rewrite_enabled', 'להחיל הקלטה אוטומטית');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_TITLE', 'ההתקנה - שלב שלוש');
define('_WEBO_SPLASH3_SAVED', 'ההעדפות שלך נשמרו בהצלחה.');
define('_WEBO_SPLASH3_REWRITE', 'מאיץ את האתר הצלחה');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'האתר שלך משתמש ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ', הצלחנו מואצת. אתה יכול <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">לבדוק את התוצאות הנובעות</a>.');
define('_WEBO_SPLASH3_WORKING', 'נראה כי הכל פועל. הבא?');
define('_WEBO_SPLASH3_ADD', 'אתה חייב להוסיף קריאה לאופטימיזטור דפי אינטרנט שלך בשרת ה-script. זה יהיה הרבה יותר קל אם יש לך קובץ 1, אשר משרתת את כל שאר הדפים, לכן תצטרך לשנות רק אותו.');
define('_WEBO_SPLASH3_MODIFY', 'איך צריך לערוך את הקובץ');
define('_WEBO_SPLASH3_WP', 'נניח כי אנו משנים את הקובץ wp-Blog <code>-header.php </ code> של הבלוג שלך באמצעות Wordpress. (זוהי רק דוגמה: את בכלל מקרה אתה צריך לשנות את הקובץ <code> index.php </ code>). בחלקו העליון של הדף תוכל לראות על זה:');
define('_WEBO_SPLASH3_CODE', 'עליך להוסיף קוד של אופטימיזטור דפי אינטרנט <strong>עד</ strong> מחרוזות אלה. לכן, עליך להוסיף את הדף כדלקמן:');
define('_WEBO_SPLASH3_FINALLY', 'ואז אתה צריך להשלים את הקריאה, אופטימיזטור דפי אינטרנט, כדלקמן (את הקוד בתחתית העמוד):');
define('_WEBO_SPLASH3_TESTING', 'עכשיו קצת לבדוק ...');
define('_WEBO_SPLASH3_NOTLIVE', 'למעשה, יש לך די גדול חופש פעולה. אתה יכול לעשות כל שינוי בתצורת הרשת ה אופטימיזטור דפי אינטרנט (אבל עדיף לקיים את הבדיקה על אתר בניה) על מנת להשיג ביצועים אופטימלי. כדי לשנות את ההגדרות אתה צריך:');
define('_WEBO_SPLASH3_MANUALLY', 'ערוך ידנית את הקובץ <code> config.webo.php </ code>, שנמצאת בדרך: <code>');
define('_WEBO_SPLASH3_MANUALLY2', 'config.webo.php</code>');
define('_WEBO_SPLASH3_AGAIN', 'ו <a href="');
define('_WEBO_SPLASH3_AGAIN2', '">הפעל את ההתקנה שוב</a>. כל אפשרויות חדשות יהיה להוריד באופן אוטומטי, נבדק ומתוחזק.');
define('_WEBO_SPLASH3_SECURITY', 'פרטים הביטחון');
define('_WEBO_SPLASH3_ALTHOUGH', 'למרות התקנה ותצורה באמצעות שם המשתמש והסיסמה, אתה יכול למחוק <code>');
define('_WEBO_SPLASH3_ALTHOUGH2', 'install.php</code>כדי לספק אבטחה נוספת לאתר שלך.');
define('_WEBO_SPLASH3_FINISH', 'סיום ההתקנה');
define('_WEBO_SPLASH3_CANTWRITE', 'לא ניתן לכתוב את הספרייה שציינת ');
define('_WEBO_SPLASH3_CANTWRITE2', '. אנא בדוק את המדריך כי הוא קיים את הרשומה זמין.');
define('_WEBO_SPLASH3_CANTWRITE3', 'אתה יכול לעשות את זה מ-FTP הלקוח. כדי לעשות זאת, ללכת לספרייה, ללכת על נכסים או לקיים CHMOD 775.');
define('_WEBO_SPLASH3_CANTWRITE4', 'לאחר לתקן בעיה זו, אנא רענן את הדף.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'אנא ודא כי תיקיית השורש של האתר שלך זמין לקריאה וכתיבה על שרת שלך.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD2', 'לשם כך CHMOD 775 או ליצור קובץ הבסיס <code>. Htaccess </ code>, זמין לקריאה וכתיבה של שרת האינטרנט, או לאפשר קריאה וכתיבה אל הקובץ הנוכחי <code>. Htaccess </ code> ( CHMOD 664).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'אנא ודא כי תיקיית השורש של האתר שלך, ניתן למצוא בו את הערך עבור שרת האינטרנט שלך, או שיש את זה זמין בקובץ שלך <code>. Htaccess </ code>.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'אנא CHMOD 775 עבור הספרייה, או ליצור קובץ הבסיס <code>. Htaccess </ code>, הקלטה זמינה עבור שרת האינטרנט שלך, או לאפשר כניסה של הקובץ הנוכחי <code>. Htaccess </ code> (CHMOD 664).');
define('_WEBO_SPLASH3_HTACCESS_CHMOD5', 'אנא ודא כי אופטימיזטור דפי אינטרנט מותקן לתוך');
define('_WEBO_SPLASH3_CONFSAVED', 'תצורת נשמר');
define('_WEBO_SPLASH3_CONFIGERROR', 'לא ניתן לפתוח את קובץ התצורה. אנא שנה את ההרשאות של הקובץ <code> config.webo.php </ code> אופטימיזטור דפי אינטרנט שזה זמין עבור שרת שלך.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'אתה יכול לעשות זאת באמצעות ה-FTP-לקוח. כדי לעשות זאת, פשוט לנווט לספרייה <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , לאחר מכן פתח את המאפיינים של קובץ או להפעיל את CHMOD. בחר עד 775, או "write"');
define('_WEBO_SPLASH3_CONFIGERROR4', 'לאחר לתקן בעיה זו, אנא רענן את הדף.');
define('_WEBO_SPLASH3_CONFIGERROR5', 'הקובץ של התצורה לא נמצא. אנא הורד במלואו אופטימיזטור דפי אינטרנט מכתובת האינטרנט <a href="http://code.google.com/p/web-optimizator/downloads/list" rel="nofollow">http://code.google.com/p/web-optimizator/downloads/list</a>');

?>