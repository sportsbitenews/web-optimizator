<?php
/**
 * File from WEBO Site SpeedUp, WEBO Software (http://www.webogroup.com/)
 * Contains all FR localization constants
 * by Veronique McKay, www.maedupandco.com
 *
 **/

/* general layout */
define('_WEBO_CHARSET', 'utf-8');
define('_WEBO_GENERAL_TITLE', 'Configuration de WEBO Site SpeedUp ');
define('_WEBO_GENERAL_FOOTER', 'Plus rapide qu\'un éclair!');
define('_WEBO_GENERAL_BUYNOW', '<a href="https://www.softkey.net/catalog/basket.php?id=350446&amp;act=buy&amp;from=1722979&amp;compid=1" class="wssJ" title="WEBO Site SpeedUp Premium Edition">Acheter</a>');
define('_WEBO_GENERAL_BUYNOWLITE', '<a href="https://www.softkey.net/catalog/basket.php?id=350449&amp;act=buy&amp;from=1722979&amp;compid=1" class="wssJ" title="WEBO Site SpeedUp Lite Edition">Acheter</a>');
define('_WEBO_GENERAL_IMAGE', '<img src="http://web-optimizator.googlecode.com/svn/trunk/images/web.optimizer.logo.small.png" alt="WEBO Site SpeedUp" title="WEBO Site SpeedUp" width="151" height="150"/>');
define('_WEBO_GENERAL_BUY', 'Acheter');
define('_WEBO_GENERAL_PREMIUM', 'Premium');
define('_WEBO_GENERAL_EDITION', 'Edition');
define('_WEBO_GENERAL_LOADING', 'Loading');

/* lang menu */
define('_WEBO_GENERAL_LANGUAGE', 'Choisir votre Langue');
define('_WEBO_GENERAL_ru', 'Русский');
define('_WEBO_GENERAL_de', 'Deutsch');
define('_WEBO_GENERAL_es', 'Español');
define('_WEBO_GENERAL_ua', 'Українська');
define('_WEBO_GENERAL_en', 'English');
define('_WEBO_GENERAL_fr', 'Français');

/* error layout */
define('_WEBO_ERROR_TITLE', 'Hmmm... nous avons un problème');
define('_WEBO_ERROR_ERROR', 'Oopps! Il y a eu un problème');

/* Enter login and password */
define('_WEBO_LOGIN_TITLE', 'Autorisation');
define('_WEBO_LOGIN_LOGIN', 'Enter');
define('_WEBO_LOGIN_NOTINSTALLED', '<strong>Warning:</strong> fichier WEBO Site SpeedUp introuvables dans vos fichiers source système. Vérifier l\'existence des appels manuellement ou réinstaller le logiciel WEBO Site SpeedUp.');
define('_WEBO_LOGIN_EFFICIENCY_KB', 'Kb');
define('_WEBO_LOGIN_EFFICIENCY_S', 's');
define('_WEBO_LOGIN_USERNAME', 'Prénom et Nom');
define('_WEBO_LOGIN_USERNAME_HELP', 'Cette information sera principalement utilsé dans les messages messages.');
define('_WEBO_LOGIN_ENTERLOGIN', 'Entrer votre prénom et nom SVP');
define('_WEBO_LOGIN_PASSWORD', 'Mot de passe');
define('_WEBO_LOGIN_ENTERPASSWORD', 'Entrer votre mot de passe');
define('_WEBO_LOGIN_PASSWORD_CONFIRM', 'Confirmation de mot de passe ');
define('_WEBO_LOGIN_ENTERPASSWORDCONFIRM', 'Confirmez votre mot de passe');
define('_WEBO_LOGIN_LICENSE', 'Clé série');
define('_WEBO_LOGIN_ENTERLICENSE', 'Entrez la clé de série');
define('_WEBO_SPLAHS1_PROTECTED', 'Mode Protégé');
define('_WEBO_SPLAHS1_PROTECTED2', 'L\installation de WEBO Site SpeedUp  est protégé. Vous pouvez le reconfigurer une fois supplémentaire.');
define('_WEBO_LOGIN_EMAIL', 'E-mail');
define('_WEBO_LOGIN_EMAIL_HELP', 'Cette adresse e-mail  sera utilisé seulement pour des informations sur les mises à jour urgent, nos salutations, et offres spéciales.');
define('_WEBO_LOGIN_ENTEREMAIL', 'Entrer votre e-mail');
define('_WEBO_LOGIN_EMAILNOTICE', 'Cette adresse e-mail  sera utilisé seulement pour des informations sur les mises à jour urgent, nos salutations, et offres spéciales.');
define('_WEBO_LOGIN_ALLOW', 'Permettre l\'utilisation de mes informations sur les résultats d\'optimisation.');
define('_WEBO_LOGIN_ALLOW_HELP', 'Les informations statistiques sur l\'accélération de site sera envoyée aux serveurs WEBO Software. Cette information ne sera pas publiée et sera utilisée dans le but unique d\améliorer la performance de WEBO Site SpeedUp. Aucune donnée privée ne sera transmise.');
define('_WEBO_LOGIN_SUCCESS', 'Toutes les options de configuration ont bien été enregistrées');
define('_WEBO_LOGIN_ENTEROLDPASSWORD', 'Entrer le mot de passe actuel');
define('_WEBO_LOGIN_PASSWORDSDIFFER', 'Les mots de passe sont différents');
define('_WEBO_LOGIN_LICENSEAGREEMENT', 'J\'ai pris connaissance de ');
define('_WEBO_LOGIN_LICENSEAGREEMENT2', 'conditions de la licence');
define('_WEBO_LOGIN_LICENSEAGREEMENT3', ' et je les accepte');
define('_WEBO_LOGIN_CONFIRMLICENSEAGREEMENT', 'Confirmez que vous avez lu et accepté les conditions de licence.');
define('_WEBO_LOGIN_TRIAL', 'Get trial license key');

/* Upgrade */
define('_WEBO_LOGIN_UPGRADE', 'Mise à jour');
define('_WEBO_LOGIN_UPGRADE_ROLLBACK', 'Rollback');
define('_WEBO_LOGIN_UPGRADE_TO', 'à la ver.');
define('_WEBO_LOGIN_VERSION', 'Version');
define('_WEBO_UPGRADE_FILE', 'Mise à jour du fichier');

/* Uninstall */
define('_WEBO_LOGIN_UNINSTALLME', 'Désinstaller WEBO Site SpeedUp');
define('_WEBO_LOGIN_FAILED', 'Connexion échouée');
define('_WEBO_UNINSTALL_MESSAGE', 'Raison pour la désinstallation de WEBO Site SpeedUp ');
define('_WEBO_UNINSTALL_SUCCESS', 'WEBO Site SpeedUp à été désinstaller avec succès.');

/* Set login and password */
define('_WEBO_NEW_TITLE', 'Installation');
define('_WEBO_NEW_ENTER', 'Enter details');
define('_WEBO_NEW_PROTECT', '<p class="wssI">Pendant l\'installation le fichier root .htaccess file et d\'autres fichiers sources de votre système web seront modifiés. Vous devez vérifier qu\'ils sont inscriptibles(il y aura une sauvegarde automatique de chaque fichier modifié).</p><p class="wssI">Si aucun clé série valide n\'est entré, WEBO Site SpeedUp <a href="http://www.webogroup.com/home/site-speedup/comparison/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">L\' Edition communauté </a> sera installée.</p><p class="wssI">Une fois installé, WEBO Site SpeedUp sera configuré automatiquement basé sur les capacités du serveur actuel.  Vous pouvez réviser et changer les options antérieurement en utilisant cette interface administrative. </p><p class="wssI">Pour plus d\'information sur l\'installation et la configuration de WEBO Site SpeedUp vous pouvez accéder au<a href="http://code.google.com/p/web-optimizator/wiki/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ"> documentation en ligne.</a>.</p>');
define('_WEBO_NEW_NOSCRIPT', 'JavaScript doit être activé pour un fonctionnement correct!');

/* First splash -- set document root */
define('_WEBO_SPLASH1_UNINSTALL', 'Désinstaller');
define('_WEBO_SPLASH1_UNINSTALL_TITLE', 'Désinstallation de WEBO Site SpeedUp');
define('_WEBO_SPLASH1_UNINSTALL_THANKS', 'Merci d\'avoir utilisé WEBO Site SpeedUp. Aidez-nous à améliorer notre produit en nous indiquant la raison de la désinstallation.');
define('_WEBO_SPLASH1_UNINSTALL_VISIT', 'Vous pouvez aussi visiter <a href="http://www.webogroup.com/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">Notre site</a> et soumettre vos éventuelles <a href="http://code.google.com/p/web-optimizator/issues/list?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">problèmes liés à ce produit</a>.');
define('_WEBO_SPLASH1_UNINSTALL_BACK', 'Vous pouvez réinstaller WEBO Site SpeedUp quand vous le souhaitez en vous rendant sur <a href="http://');
define('_WEBO_SPLASH1_UNINSTALL_BACK2', '">la page WEBO Site SpeedUp </a>.');
define('_WEBO_SPLASH1_UNINSTALL_SEND', 'Envoyer un message');
define('_WEBO_SPLASH1_NEXT', 'Installer');
define('_WEBO_SPLASH1_BACK', 'Retour');

/* Change password */
define('_WEBO_PASSWORD_OLD', 'Mot de passe actuel');
define('_WEBO_PASSWORD_ENTERPASSWORD', 'Entrez le mot de passe');
define('_WEBO_PASSWORD_NEW', 'Nouveau mot de passe');
define('_WEBO_PASSWORD_ENTERPASSWORDNEW', 'Entrez le nouveau mot de passe');
define('_WEBO_PASSWORD_CONFIRM', 'Confirmation du nouveau mot de passe');
define('_WEBO_PASSWORD_ENTERPASSWORDCONFIRM', 'Confirmez le nouveau mot de passe');
define('_WEBO_SPLASH1_SAVE', 'Enregistré');
define('_WEBO_PASSWORD_DIFFERENT', 'Le nouveau mot de passe et sa confirmation sont différents');
define('_WEBO_PASSWORD_EMPTY', 'Le champ "nouveau mot de passe" ne doit pas être vide');
define('_WEBO_PASSWORD_SUCCESSFULL', 'Votre mot de passe à été changé');

/* Second splash -- set options */
define('_WEBO_SPLASH2_CONTROLPANEL', 'Panneau de control');
define('_WEBO_SPLASH2_OPTIONS', 'Options');
define('_WEBO_SPLASH2_UNABLE', 'Ouverture pas possible');
define('_WEBO_SPLASH2_MAKESURE', '. Veuillez vérifier que le répertoire existe.');

/* WEBO Site SpeedUp options */
define('_WEBO_general', 'Options Générales ');
define('_WEBO_combinecss', 'Combiner le CSS');
define('_WEBO_combine_js', 'Combiner le JavaScript');
define('_WEBO_minify', 'Minifier');
define('_WEBO_gzip', 'Gzip');
define('_WEBO_clientside', 'Cache coté Client');
define('_WEBO_htaccess', '.htaccess');
define('_WEBO_backlink', 'Rétro lien');
define('_WEBO_performance', 'Performance');
define('_WEBO_data_uri', 'data:URI');
define('_WEBO_css_sprites', 'Sprites CSS ');
define('_WEBO_serverside', 'Cache coté Serveur');
define('_WEBO_unobtrusive', ' JavaScript non-obtrusive');
define('_WEBO_multiple_hosts', 'CDN');

define('_WEBO_javascript_cachedir', 'Chemin du répertoire du cache JavaScript');
define('_WEBO_javascript_cachedir_HELP', 'Ce répertoire contient tous les fichier de cache JavaScript.');
define('_WEBO_css_cachedir', 'Chemin du répertoire de cache CSS');
define('_WEBO_css_cachedir_HELP', 'Ce répertoire contient tous les fichiers cache CSS.');
define('_WEBO_html_cachedir', 'Chemin du répertoire cache HTML');
define('_WEBO_html_cachedir_HELP', 'Ce directoire contient tous les fichier cache HTML.');
define('_WEBO_website_root', 'Chemin du répertoire racine du site');
define('_WEBO_website_root_HELP', 'Chemin absolu au répertoire racine de votre site.');
define('_WEBO_document_root', 'Chemin au <code>DOCUMENT_ROOT</code>');
define('_WEBO_document_root_HELP', 'Chemin absolu du répertoire du serveur du site.');
define('_WEBO_host', 'Adresse du site ');
define('_WEBO_host_HELP', 'Nom de domaine ou adresse IP de votre site web. Exemple: monsite.com');
define('_WEBO_external_scripts_user', 'Nom d\'utilisateur (pour accéder via  HTTP Basic Authorization)');
define('_WEBO_external_scripts_user_HELP', 'Si votre site web est protégé via HTTP Basic Authorization vous devez indiquer votre nom d\utilisateur et mot de passe afin que WEBO Site SpeedUp puisse traiter tous les ressources requis depuis le site web.');
define('_WEBO_external_scripts_pass', 'Mot de passe (pour accéder via HTTP Basic Authorization)');
define('_WEBO_external_scripts_pass_HELP', 'Si votre site web est protégé via HTTP Basic Authorization vous devez indiquer votre nom d\'utilisateur et mot de passe pour que WEBO Site SpeedUp puisse traiter toutes les ressources requises depuis le site web.');
define('_WEBO_restricted', 'Exclude URL from optimization');
define('_WEBO_restricted_HELP', 'Sometimes it\'s required to exclude some parts of website from WEBO Site SpeedUp logic. In this case you need to set meaningful parts (masks) for such sections / URL, separated by space.');

define('_WEBO_combine_css', 'Combiner les fichiers CSS');
define('_WEBO_combine_css_HELP', 'Selon cette option le CSS ne sera pas combiné ou il sera combiné seulement dans le balise &lt;head&gt;, ou tout le CSS de la page. Tout les fichiers CSS seront minifié');
define('_WEBO_combine_css1', 'Ne pas combiner les fichiers CSS');
define('_WEBO_combine_css2', 'Combiner uniquement le CSS inclus dans le balise <code>&lt;head&gt;</code>');
define('_WEBO_combine_css3', 'Combiner tout le CSS dans les balises <code>&lt;head&gt;</code> et <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_css', 'Permettre la fusion des styles externes');
define('_WEBO_external_scripts_css_HELP', 'Il y aura des fichiers combinés chez tous les hébergeurs. Sinon WEBO Site SpeedUp combinera uniquement les fichiers situés chez le même hébergeur sur la page web initiale.');
define('_WEBO_external_scripts_css_HELP_DISABLED', 'There is no support for curl library on your website, so dynamic and external files merging is impossible.');
define('_WEBO_external_scripts_css_inline', 'Permettre la fusion de styles inline');
define('_WEBO_external_scripts_css_inline_HELP', 'Il y aura une fusion CSS inclus avec l\'aide de balises &lt;style&gt; and &lt;link&gt;. Sinon WEBO Site SpeedUp combinera les fichiers  inclus avec le balise &lt;link&gt;.');
define('_WEBO_minify_css_file', 'Combiner le nom du fichier CSS');
define('_WEBO_minify_css_file_HELP', 'Le nom du fichier peut inclure que des lettres, symboles et chiffres latines. Tous les autres symboles seront exclus. Ces fichiers pourront être automatiquement étendus avec une extension spécifique afin de prendre en charge le cache des navigateurs coté client.');
define('_WEBO_minify_css_host', 'Host for CSS file(s)');
define('_WEBO_minify_css_host_HELP', 'Host to load merged CSS file. With enabled options in CDN group it will be used for all CSS files.');
define('_WEBO_external_scripts_additional_list', 'Exclure les fichiers CSS de la fusion (separés par un espace)');
define('_WEBO_external_scripts_additional_list_HELP', 'Les fichiers définis ne seront pas inclus dans les fichiers CSS combinés.  Vous devez définir seulement les noms de fichier et non leurs chemins absolus.');
define('_WEBO_external_scripts_include_code', 'Inclure le code CSS à tous les fichiers');
define('_WEBO_external_scripts_include_code_HELP', 'Le code CSS entré sera ajouté à la fin de chaque fichier CSS. Ce champ vous permet de définir des styles supplémentaires pour un site qui fonctionne sous WEBO Site SpeedUp.');

define('_WEBO_minify_javascript', 'Combiner les fichiers JavaScript');
define('_WEBO_minify_javascript_HELP', 'Selon cette option le JavaScript ne sera pas combiné ou il y aura une combinaison dans le balise  &lt;head&gt; ou tout le javascript sera combiné sur la page.');
define('_WEBO_minify_javascript1', 'Ne pas combiner les fichiers JavaScript.');
define('_WEBO_minify_javascript2', 'Combiner seulement le JavaScript inclus dans le balise <code>&lt;head&gt;</code>');
define('_WEBO_minify_javascript3', 'Combiner tout le JavaScript dans les balises <code>&lt;head&gt;</code> et <code>&lt;body&gt;</code>');
define('_WEBO_external_scripts_inline', 'Permettre la fusion JavaScript incorporé');
define('_WEBO_external_scripts_inline_HELP', 'Il y aura une combinaison de code incorporé dans les balises &lt;script&gt; et code JavaScript cdepuis les fichiers externes. Sinon, il y aura une combinaison uniquement de JavaScript inclus via &lt;script src=&quot;...&quot;&gt;.');
define('_WEBO_external_scripts_on', 'Permettre la fusion de JavaScript externe');
define('_WEBO_external_scripts_on_HELP', 'Il y aura une fusion des fichiers situés sur plusieurs hébergeurs. Sinon WEBO Site SpeedUp combinera uniquement les fichiers se trouvant chez le même hébergeur sur la page web initiale.');
define('_WEBO_external_scripts_on_HELP_DISABLED', 'There is no support for curl library on your website, so dynamic and external files merging is impossible.');
define('_WEBO_minify_javascript_file', 'Combiner le nom de fichier JavaScript');
define('_WEBO_minify_javascript_file_HELP', 'Le nom du fichier peut inclure que des lettres, symboles et chiffres latines. Tous les autres symboles seront exclus. Ces fichiers pourront être automatiquement étendus avec une extension spécifique afin de prendre en charge le cache des navigateurs coté client.');
define('_WEBO_minify_javascript_host', 'Host for JavaScript file(s)');
define('_WEBO_minify_javascript_host_HELP', 'Host to load merged JavaScript file. With enabled options in CDN group it will be used for all JavaScript files.');
define('_WEBO_external_scripts_ignore_list', 'Exclure le(s) fichier(s) du processus de fusion');
define('_WEBO_external_scripts_ignore_list_HELP', 'Les fichiers définis ne seront pas inclus dans le fichier combiné. Vous devez définir seulement les noms de fichier et non leurs chemins absolus.');
define('_WEBO_external_scripts_head_end', 'Déplacer le script combiné au <code>&lt;/head&gt;</code>');
define('_WEBO_external_scripts_head_end_HELP', 'Le fichier JavaScript combiné sera bougé vers la balise de terminaison &lt;/head&gt;.');
define('_WEBO_external_scripts_include_try', 'Safe combine mode');
define('_WEBO_external_scripts_include_try_HELP', 'With this option all external files will be enveloped into try-catch construction (with individual files\' inclusion on failed content execution in common scope). This reduces JavaScript performance but guarantee that there will be no broken JavaScript calls due to their combine.');

define('_WEBO_minify_css', 'Minifier les fichiers CSS');
define('_WEBO_minify_css_HELP', 'Tous les espaces, tabulations, retours à la ligne et commentaires seront effacés des fichiers combinés.');
define('_WEBO_minify_js', 'Minifer les fichiers JavaScript');
define('_WEBO_minify_js_HELP', 'Tous les espaces, tabulations, retours à la ligne et commentaires seront effacés des fichiers combinés. Le choix Bibliothèque affecte l\'algorithme et taux de compression. La compression maximale peut être obtenue avec n\'importe lequel des ces bibliothèques selon les conditions initiales.');
define('_WEBO_minify_js_HELP_DISABLED', 'There is no support for java execution under PHP on your website, so minify with YUI Compressor is impossible.');
define('_WEBO_minify_js1', 'Ne pas minifier le JavaScript');
define('_WEBO_minify_js2', 'Minifier avec JSMin (de Douglas Crockford)');
define('_WEBO_minify_js3', 'Minifier avec YUI Compresseur (exige java)');
define('_WEBO_minify_js4', 'Minifier avec Packer (par Dean Edwards)');
define('_WEBO_minify_page', 'Minifier le HTML');
define('_WEBO_minify_page_HELP', 'Le code HTML code sera nettoyé. Les espaces double, double retours à la ligne, symboles vides au début de chaque chaîne et les espaces avant la balise. Les balises &lt;pre&gt;, &lt;textarea&gt;, &lt;script&gt; seront excluent de toutes les actions. ');
define('_WEBO_minify_html_comments', 'Supprimer les commentaires HTML');
define('_WEBO_minify_html_comments_HELP', 'Tous les commentaires HTML seront supprimés. Ceci peut casser les commentaires conditionnels et les compteurs javascript.');
define('_WEBO_minify_html_one_string', 'Comprimer le HTML en une seule chaîne');
define('_WEBO_minify_html_one_string_HELP', 'Le code HTML du page web résultant sera comprimé en une seule chaîne. Ceci peut aider à éliminer les espaces et retours à la ligne superflue. Néanmoins ceci est intensif au niveau UC et devra être utilisé avec précaution.');

define('_WEBO_unobtrusive_on', 'Permettre le JavaScript inobtrus');
define('_WEBO_unobtrusive_on_HELP', 'All supported widgets will be loaded on window.onload event (this increases website load speed by Google).');
define('_WEBO_unobtrusive_body', 'Inclure le fichier JavaScript combiné avant  <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_body_HELP', 'Les fichiers JavaScript combinés seront déplacés au balises de fin &lt;/body&gt; balise. Cette option à plus de priorité que &quot;Déplacer le script Java au &lt;/head&gt;&quot;.');
define('_WEBO_unobtrusive_all', 'Déplacer tout le code JavaScript au <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_all_HELP', 'Toutes les requêtes JavaScript seront déplacés au balise de fin &lt;/body&gt; selon leur ordre initial sur la page web.');
define('_WEBO_unobtrusive_informers', 'Deplacer les requêtes de widgets JavaScript avant <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_informers_HELP', 'Toutes les requêtes de code JavaScript depuis les widgets seront déplacées au &lt;/body&gt;.');
define('_WEBO_unobtrusive_counters', 'Deplacer les requêtes compteur avant <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_counters_HELP', 'Tout le code JavaScript de requêtes compteurs seront déplacés au &lt;/body&gt;.');
define('_WEBO_unobtrusive_ads', 'Déplacer les requêtes de publicités  avant <code>&lt;/body&gt;</code>');
define('_WEBO_unobtrusive_ads_HELP', 'Tout les requêtes de code JavaScript publicitaires (contexte et bannières) seront déplacées au &lt;/body&gt;.');
define('_WEBO_unobtrusive_iframes', 'Créer un iframes\' chargement différé');
define('_WEBO_unobtrusive_iframes_HELP', 'Tout le code HTML code issu de requêtes iframes seront déplacées au &lt;/body&gt;.');

define('_WEBO_gzip_css', 'Mettre le CSS en fichier Gzip');
define('_WEBO_gzip_css_HELP', 'Tous les fichiers CSS seront compressés via gzip.');
define('_WEBO_gzip_javascript', 'Mettre le JavaScript en Gzip');
define('_WEBO_gzip_javascript_HELP', 'Tous les fichiers JavaScript seront compressés via gzip.');
define('_WEBO_gzip_fonts', 'Mettres les fichiers de polices de caractères en Gzip');
define('_WEBO_gzip_fonts_HELP', 'Tous les fichiers polices (.eot, .ttf, .otf etc) seront compressés via gzip.');
define('_WEBO_gzip_fonts_HELP_DISABLED', 'There is no support for mod_gzip, mod_deflate, or mod_rewrite on your website, so gzip for fonts is impossible.');
define('_WEBO_gzip_page', 'Mettre les fichiers HTML en Gzip');
define('_WEBO_gzip_page_HELP', 'Tous les fichiers HTML seront compressés via gzip.');
define('_WEBO_gzip_page_HELP_DISABLED', 'There is no support for mod_gzip, or mod_deflate, or zlib extension on your website, so gzip for HTML is impossible.');
define('_WEBO_gzip_noie', 'Utiliser <code>deflate</code> au lieu de <code>gzip</code> pour IE6/7');
define('_WEBO_gzip_noie_HELP', 'Dans certains cas, gzip dans les navigateurs IE6 et IE7 peuvent donner un résultat de page incorrect. Cette option vous permet de forcer l\'utilisation des moyens de compression alternatifs pour ces navigateurs.');
define('_WEBO_gzip_cookie', 'Verifier les possibilités gzip via les cookies');
define('_WEBO_gzip_cookie_HELP', 'WEBO Site SpeedUp peut faire une vérification supplémentaire de prise en charge gzip dans les navigateurs. Si cela à été défini, toutes les donnés seront compressés peut importe l\'en tête Accept-Encoding.');

define('_WEBO_far_future_expires_javascript', 'Permettre le cache de JavaScript');
define('_WEBO_far_future_expires_javascript_HELP', 'Tous les fichiers JavaScript files auront des entêtes cache fixé loin dans le futur.');
define('_WEBO_far_future_expires_css', 'Permettre le cache de CSS');
define('_WEBO_far_future_expires_css_HELP', 'Tous les fichiers CSS auront des  entêtes cache fixé loin dans le futur.');
define('_WEBO_far_future_expires_images', 'Permettre le cache des images');
define('_WEBO_far_future_expires_images_HELP', 'Toutes les images auront leur entêtes cache fixé loin dans le futur. ');
define('_WEBO_far_future_expires_fonts', 'Permettre le cache des polices');
define('_WEBO_far_future_expires_fonts_HELP', 'Toutes les polices auront des entêtes cache fixé loin dans le futur. Cette option est appliqué   via le fichier .htaccess.');
define('_WEBO_far_future_expires_fonts_HELP_DISABLED', 'There is no support for mod_expires or mod_rewrite on your website, so client side caching for fonts is impossible.');
define('_WEBO_far_future_expires_video', 'Permettre le cache de fichiers videos.');
define('_WEBO_far_future_expires_video_HELP', 'Tous les vidéos auront leurs entêtes cache fixé loin dans le futur. Cette option est appiqué via .htaccess.');
define('_WEBO_far_future_expires_video_HELP_DISABLED', 'There is no support for mod_expires or mod_rewrite on your website, so client side caching for video files is impossible.');
define('_WEBO_far_future_expires_static', 'Permettre le cache des éléments statiques');
define('_WEBO_far_future_expires_static_HELP', 'Tous les éléments statiques auront des entêtes cache fixé loin dans le futur. Cette option est appliqué via .htaccess.');
define('_WEBO_far_future_expires_static_HELP_DISABLED', 'There is no support for mod_expires or mod_rewrite on your website, so client side caching for the other static files is impossible.');
define('_WEBO_far_future_expires_html', 'Permettre le cache de HTML');
define('_WEBO_far_future_expires_html_HELP', 'Toutes les images auront des entêtes en cache. L\'epiration du cache sera fixé selon l\'option &quot;Expiration à défaut du cache HTML&quot;.');
define('_WEBO_far_future_expires_html_timeout', 'L\'expiration de défaut du cache HTML (en secondes)');
define('_WEBO_far_future_expires_html_timeout_HELP', 'Le temps de faire un cache de fichiers HTML. Valeur zéro égale à une expiration de zéro.');
define('_WEBO_far_future_expires_external', 'Permettre le Cache des fichiers externes.');
define('_WEBO_far_future_expires_external_HELP', 'Les fichiers externes appelés sur une page web seront en cache et délivré depuis le même hébergeur que la page web lui-même.');

define('_WEBO_html_cache_enabled', 'Fichiers HTML générés depuis le cache');
define('_WEBO_html_cache_enabled_HELP', 'Les pages HTML seront en cache pour le temps d\'expiration fixés dans l\'option &quot; Le cache HTML par défaut timeout&quot;. Cette option vous permet d\'accélérer vos pages web de manière significative avec un temps de génération longue. Ceci est raisonnable uniquement sur des pages statiques sans contenu dynamique.');
define('_WEBO_html_cache_timeout', 'Cache HTML par défaut (en secondes)');
define('_WEBO_html_cache_timeout_HELP', 'Après cette durée toutes les pages HTML en cache seront recréer coté serveur.');
define('_WEBO_html_cache_flush_only', 'Mettre en cache que les premiers n bytes de contenu (vider tôt)');
define('_WEBO_html_cache_flush_only_HELP', 'Le cache HTML contiendra pas toute la page web mais les premiers bytes (fixé dans l\'option  &quot;Flusher le contenu size&raquo;). Cette quantité de données sera vidée du cache sur le serveur plus tôt que la suite de la page. Le serveur recevra les requêtes de ressource plus rapidement et n\'attendra pas la suite de la page pour se charger.');
define('_WEBO_html_cache_flush_size', 'Taille du cache vidé (in bytes)');
define('_WEBO_html_cache_flush_size_HELP', 'Taille de la partie page web dont le cache sera vidé. Cela peut-être réglé( afin d\'éviter des problèmes avec les navigateurs et connections réseau. Une valeur vide (ou zéro) donne lieu à un vidage de cache pour toute la page avant la balise de fermeture &lt;/head&gt;.');
define('_WEBO_html_cache_ignore_list', 'Liste des parties des URLs à ignorer pour le cache.( séparées par un espace)');
define('_WEBO_html_cache_ignore_list_HELP', 'Souvent, le cache coté serveur ne peut pas être utilisé pour des pages avec un contenu dynamique. Par exemple pour les pages comptes utilisateurs, pages de statistiques et autres. Cette option vous permet de fixer des parties du URL (masques) pour exclure les pages depuis le cache serveur. ');
define('_WEBO_html_cache_allowed_list', 'Liste de AGENTS UTILISATEURS (robots) a ajouter au cache. (separé par un espace)');
define('_WEBO_html_cache_allowed_list_HELP', 'Cette option vous permet de fixer une liste d\'AGENTS UTILISATEURS qui recevront que les pages cache en HTML. Par exemple faire une cache des pages HTML pour tous les moteurs de recherche peut réduire la taille de chargement coté serveur.');
define('_WEBO_html_cache_additional_list', 'List of COOKIE to exclude from server side caching (separated by space)');
define('_WEBO_html_cache_additional_list_HELP', 'You can also skip server side caching for user who have one of the COOKIE from this list. This can be useful for authorized users or during the work with shopping cart.');

define('_WEBO_performance_mtime', 'Ignorez l\'empreinte temps du fichier modifié. (mtime)');
define('_WEBO_performance_mtime_HELP', 'Il y aura une accélération supplémentaire (coté serveur). Pour raffraichir des fichiers combinés vous devez changer les requêtes des fichiers initiaux en code HTML ou raffraichir le cache de WEBO Site SpeedUp.');
define('_WEBO_performance_plain_string', 'Ne pas utiliser d\' expressions régulières.');
define('_WEBO_performance_plain_string_HELP', 'L\'usage d\'expressions régulieres endommage la performance du serveur et ils peuvent être remplacés par des opérations simple de classe. Dans ce dernier cas, une probabilité d\'erreur d\'analyse HTML sera plus probable. (pour les documents (X)HTML invalides uniquement).');
define('_WEBO_performance_cache_version', 'Numéro de version du cache');
define('_WEBO_performance_cache_version_HELP', 'La version du cache définit tous les fichiers en cache. Pour rafraîchir le cache coté client (dans le navigateur) vous devez changer ce numéro.');
define('_WEBO_performance_check_files', 'Ne pas vérifier l\'existence de fichier cache.');
define('_WEBO_performance_check_files_HELP', 'Il n y aura pas de vérification de l\existance de fichier cache avec cette option. La version du  cache version sera définit avec l\'option &quo;tCache version number&quot;. Dans ce cas, pour rafraîchir le cache coté client(dans les navigateurs) vous devez changer le numéro de cache. Il y aura une vérification standard de l\'existence cache avec cette option.');
define('_WEBO_performance_uniform_cache', 'Uniformiser les fichiers cache pour tous les serveurs');
define('_WEBO_performance_uniform_cache_HELP', 'Tous les serveurs recevront un code CSS, JavaScript, et HTML uniformisé. Ceci vous permets de utilisé des techniques de cache externe sans souci mais mets hors fonction un certain nombre de techniques d\'optimisation tel que data:URI.');
define('_WEBO_performance_restore_properties', 'Restore CSS properties');
define('_WEBO_performance_restore_properties_HELP', 'Missed CSS properties can be restored during CSS Sprites or data:URI creation to reduce amount of final cache size. but this may lead to huge CPU overhead in case of large amount of CSS rules.');
define('_WEBO_performance_delete_old', 'Days to store cache files');
define('_WEBO_performance_delete_old_HELP', 'You can restrict cache size by defining time to live for all cache files (in days). Zero value means no restriction.');

define('_WEBO_footer_text', 'Ajouter un lien à WEBO Site SpeedUp');
define('_WEBO_footer_text_HELP', 'Le lien WEBO Site SpeedUp est obligatoire dans l\'édition Communautaire et peut-être enlevé dans la version payante.');
define('_WEBO_footer_image', 'Ajouter une image WEBO Site SpeedUp ');
define('_WEBO_footer_image_HELP', 'Fichier avec le logo WEBO Site SpeedUp. Tous les fichiers permis sont situés : &lt;WEBO Site SpeedUp path&gt;/web-optimizer/images/. Si cette option est vide, un texte défini dans &quot;Text for backlink&quot; sera visible.');
define('_WEBO_footer_link', 'Texte pour le retrolien');
define('_WEBO_footer_link_HELP', 'Si l\'option &quot;Add a WEBO Site SpeedUp image&quot; est désactivé, ce texte sera visible en lien. Sinon, il sera utilisé en titre d\'image. ');
define('_WEBO_footer_css_code', 'Styles pour l\'emplacement du rétro lien');
define('_WEBO_footer_css_code_HELP', 'Ces styles seront appliqués pour le lien WEBO Site SpeedUp. Vous pouvez définir l\'emplacement du lien, sa couleur, fond, taille, etc. ');
define('_WEBO_footer_spot', 'Ajouter <code>&lt;!--WSS--&gt;</code> to HTML document');
define('_WEBO_footer_spot_HELP', 'L\'existance &lt;!--WSS--&gt; indique que WEBO Site SpeedUp analyse la pages avec succès. Il est utilisé dans les algorithmes internes.');

define('_WEBO_data_uris_on', 'Appliquer <code>data:URI</code>');
define('_WEBO_data_uris_on_HELP', 'Les images de fond seront converties au format base64 et seront inclus directement dans les fichiers CSS pour tous les serveurs qui supportent data:URI.');
define('_WEBO_data_uris_mhtml', 'Appliquer <code>mhtml</code>');
define('_WEBO_data_uris_mhtml_HELP', 'Les images de fond seront converties en format mhtml et seront inclut directement dans les fichiers CSS pour toutes les versions d\'Internet Explorer qui ne supportent pas données:URI.');
define('_WEBO_data_uris_mhtml_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option "Performance - Uniformiser les fichiers cache pour tous les serveurs" enabled.');
define('_WEBO_data_uris_separate', 'Séparer les images du code CSS');
define('_WEBO_data_uris_separate_HELP', 'Combiner le code CSS et les images en base64 . Le format mtml sera gardé dans des fichiers séparés. Cela devra accroître la capacité du cache. ');
define('_WEBO_data_uris_separate_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option "Performance - Uniformiser les fichiers cache pour tous les serveurs" enabled.');
define('_WEBO_data_uris_domloaded', 'Charger les images en <code>DOMready</code> event');
define('_WEBO_data_uris_domloaded_HELP', 'Le chargement des images de fond sera différé à l\'évènement DOMReady . Cela augmentera la vitesse du rendement initial de la page dans les serveurs .');
define('_WEBO_data_uris_domloaded_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option "Performance - Uniformiser les fichiers cache pour tous les serveurs" enabled.');
define('_WEBO_data_uris_size', 'Taille maximum <code>data:URI</code> (en octets)');
define('_WEBO_data_uris_size_HELP', 'Les images ayant une taille plus élevée que le chiffre donné ne seront pas converties en format base64. Un champ vide ou zéro indique sans limites.');
define('_WEBO_data_uris_size_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option "Performance - Uniformiser les fichiers cache pour tous les serveurs" enabled.');
define('_WEBO_data_uris_mhtml_size', 'Taille maximum <code>mhtml</code> (en bytes)');
define('_WEBO_data_uris_mhtml_size_HELP', 'Les images ayant une taille supérieure au numéro indiqué ne seront pas converties en format mhtml format. Un champ vide ou zéro indique sans limites.');
define('_WEBO_data_uris_mhtml_size_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option "Performance - Uniformiser les fichiers cache pour tous les serveurs" enabled.');
define('_WEBO_data_uris_ignore_list', 'Exclure les fichier du <code>data:URI</code> (separé par un espace)');
define('_WEBO_data_uris_ignore_list_HELP', 'Les images listées dans cette option ne seront pas converties en data:URI. Ne fournir que les noms de fichiers et nom pas les chemins absolus.');
define('_WEBO_data_uris_ignore_list_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option "Performance - Uniformiser les fichiers cache pour tous les serveurs" enabled.');
define('_WEBO_data_uris_additional_list', 'Exclure les fichiers du <code>mhtml</code> (separé par un espace)');
define('_WEBO_data_uris_additional_list_HELP', 'Les images listées dans cette option ne seront pas converties en data:URI. Ne fournir que les noms de fichiers et nom pas les chemins absolus.');
define('_WEBO_data_uris_additional_list_HELP_DISABLED', 'It impossible to create cross browser data:URI because there is option "Performance - Uniformiser les fichiers cache pour tous les serveurs" enabled.');

define('_WEBO_css_sprites_enabled', 'Appliquer les Sprites CSS ');
define('_WEBO_css_sprites_enabled_HELP', 'Les images de fond seront combinées avec l\'aide du technique Sprites CSS.  Le code CSS relié sera modifié sans risque.');
define('_WEBO_css_sprites_enabled_HELP_DISABLED', 'There is no compelte GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_truecolor_in_jpeg', 'Images\' format');
define('_WEBO_css_sprites_truecolor_in_jpeg_HELP', 'Si vous choisissez la détection de formatage automatique, la possibilité d\'effets indésirables sera minimalisée. Si vous optez pour le format JPEG format le rendement/qualité/ taille pour les images couleur vraies sera optimal mais il n\' y aura pas de transparence.');
define('_WEBO_css_sprites_truecolor_in_jpeg_HELP_DISABLED', 'There is no compelte GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_truecolor_in_jpeg1', 'Détecter le format requis automatiquement.');
define('_WEBO_css_sprites_truecolor_in_jpeg2', 'Préférer le format JPEG');
define('_WEBO_css_sprites_aggressive', '&quot;Aggressive&quot; mode combiner  pour les Sprites CSS ');
define('_WEBO_css_sprites_aggressive_HELP', 'Le nombre d\images en Sprites CSS et leur tailles sera moindre mais cela peut entrainer des effets non désirés graphiques sur les pages web.');
define('_WEBO_css_sprites_aggressive_HELP_DISABLED', 'There is no compelte GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_extra_space', 'Ajouter de l\'espace libre pour les Sprites CSS');
define('_WEBO_css_sprites_extra_space_HELP', 'Les images en Sprites CSS seront arrondies avec un espace libre afin de limiter les effets secondaires sur la taille page web dans les navigateurs. La taille des fichiers Sprites CSS sera largement supérieure.');
define('_WEBO_css_sprites_extra_space_HELP_DISABLED', 'There is no compelte GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_no_ie6', 'Exclure IE6');
define('_WEBO_css_sprites_no_ie6_HELP', 'IE6 recevra un fichier CSS indépendant sans Sprites.');
define('_WEBO_css_sprites_no_ie6_HELP_DISABLED', 'There is no compelte GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_dimensions_limited', 'Hauteur et largeur maximum des images(en px)');
define('_WEBO_css_sprites_dimensions_limited_HELP', 'Les images plus hautes et larges que défini ne seront pas incluses. Un champ vide ou un zéro indique sans restrictions.');
define('_WEBO_css_sprites_dimensions_limited_HELP_DISABLED', 'There is no compelte GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_ignore_list', 'Exclure les fichiers des Sprites CSS(séparés par un espace)');
define('_WEBO_css_sprites_ignore_list_HELP', 'Les images listé dans cette option ne seron pas inclus dans les Sprites CSS. Ne fournir que les noms de fichiers et non pas leurs chemins absolus.');
define('_WEBO_css_sprites_ignore_list_HELP_DISABLED', 'There is no compelte GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_html_sprites', 'Combine HTML images');
define('_WEBO_css_sprites_html_sprites_HELP', 'A lot of small HTML images can be merged together to reduce number of HTTP requests as well. In this case there is a transparent image inserted into HTML document instead of initial one (with data:URI if possible). And it has the initial image as a background.');
define('_WEBO_css_sprites_html_sprites_HELP_DISABLED', 'There is no compelte GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_html_limit', 'Maximum width and height of HTML images (in px)');
define('_WEBO_css_sprites_html_limit_HELP', 'HTML images heigher or wider than defined number won\'t be included into CSS Sprites. No value or zero value means no restriction.');
define('_WEBO_css_sprites_html_limit_HELP_DISABLED', 'There is no compelte GD library support on your website, so CSS Sprites creation is impossible.');
define('_WEBO_css_sprites_html_page', 'Combine images for the current page only');
define('_WEBO_css_sprites_html_page_HELP', 'HTML images can be combined for the current page only (this reduces size of the final file, but increases number of such files) or for all website pages. In the last case there will be used the only image for the whole website, but its size can be very large.');
define('_WEBO_css_sprites_html_page_HELP_DISABLED', 'There is no compelte GD library support on your website, so CSS Sprites creation is impossible.');

define('_WEBO_parallel_enabled', 'Permettre des hébergeurs multiple');
define('_WEBO_parallel_enabled_HELP', 'Tous les images appelées sur une page web seront automatiquement distribué via les hôtes multiple (miroirs). Par exemple  l\' URL http://www.site.com/i/logo.png or /i/bg.jpg peut être remplacé par  http://i1.site.com/i/logo.png et http://i2.site.com/i/bg.jpg dans le cas ou les deux hôtes  i1 and i2 sont disponibles et listé dans l\'option  &quot;Allowed hosts&quot;.');
define('_WEBO_parallel_check', 'Vérifier la disponibilité des hôtes automatiquement. ');
define('_WEBO_parallel_check_HELP', 'Les hôtes seront vérifiés automatiquement pour l\'existence des images.');
define('_WEBO_parallel_css', 'Distribute CSS files');
define('_WEBO_parallel_css_HELP', 'All CSS files will be served via host defined as &quot;Host for CSS files&quot; in &quot;Combine CSS&quot; group of options.');
define('_WEBO_parallel_javascript', 'Distribute JavaScript files');
define('_WEBO_parallel_javascript_HELP', 'All JavaScript files will be served via host defined as &quot;Host for JavaScript files&quot; in &quot;Combine JavaScript&quot; group of options.');
define('_WEBO_parallel_allowed_list', 'Les hôtes permis (séparer par un espace)');
define('_WEBO_parallel_allowed_list_HELP', 'Les hôtes listés seront utilisés pour la distribution des images. Veuillez définir plus de 4 hôtes images. ');
define('_WEBO_parallel_additional', 'Les sites additionnels avec hébergement multiple(séparer par un espace)');
define('_WEBO_parallel_additional_HELP', 's\il y\' a plusieurs sites web utilisant les images vous pouvez utiliser  WEBO Site SpeedUp pour les distribuer à travers tous les hôtes.');
define('_WEBO_parallel_additional_list', 'Les hôtes sur ces sites web (séparer par un espace)');
define('_WEBO_parallel_additional_list_HELP', 'Ces hôtes sont utilisé pour distribuer les images qui sont situés sur les sites web définis dans l\'option&quot;Additional websites with multiple hosts&quot;');
define('_WEBO_parallel_ignore_list', 'Exclude the following files from distribution (séparer par un espace)');
define('_WEBO_parallel_ignore_list_HELP', 'You can set a list of files (i.e. dynamic ones) to exclude from distibution logic.');

define('_WEBO_htaccess_enabled', 'Permettre  <code>.htaccess</code>');
define('_WEBO_htaccess_enabled_HELP', 'Cette option créera (ou modifiera) le fichier.htaccess file dans le répertoire racine du site web. Cela crée également une version de sauvegarde de ce fichier.  Le contenu du fichier .htaccess file dépends des autres options dans ce groupe.');
define('_WEBO_htaccess_enabled_HELP_DISABLED', 'There is no support for .htaccess on your website.');
define('_WEBO_htaccess_mod_deflate', 'Utiliser <code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_htaccess_mod_deflate_HELP', 'Ceci est requis pour une compression dynamique de gzip. C\'est une alternative pour mod_gzip.');
define('_WEBO_htaccess_mod_deflate_HELP_DISABLED', 'There is no support for .htaccess or(and) mod_deflate or mod_filter on your website.');
define('_WEBO_htaccess_mod_gzip', 'Utiliser <code>mod_gzip</code>');
define('_WEBO_htaccess_mod_gzip_HELP', 'Ceci est requis pour une compression dynamique de gzip. C\'est une alternative pour mod_deflate.');
define('_WEBO_htaccess_mod_gzip_HELP_DISABLED', 'There is no support for .htaccess or(and) mod_gzip on your website.');
define('_WEBO_htaccess_mod_expires', 'Utiliser <code>mod_expires</code>');
define('_WEBO_htaccess_mod_expires_HELP', 'Ceci est requis pour le cache des fichiers en tête coté client. ');
define('_WEBO_htaccess_mod_expires_HELP_DISABLED', 'There is no support for .htaccess or(and) mod_expires on your website.');
define('_WEBO_htaccess_mod_headers', 'Utiliser le <code>mod_headers</code>');
define('_WEBO_htaccess_mod_headers_HELP', 'Ceci est requis pour prendre en charge les fichiers en-tête sur les serveurs proxy et les versions anciennes des navigateurs. ');
define('_WEBO_htaccess_mod_headers_HELP_DISABLED', 'There is no support for .htaccess or(and) mod_headers on your website.');
define('_WEBO_htaccess_mod_setenvif', 'Utiliser <code>mod_setenvif</code>');
define('_WEBO_htaccess_mod_setenvif_HELP', 'Ceci est requis pour prendre en charge les fichiers en-tête sur les serveurs Proxy et les versions anciennes des navigateurs. ');
define('_WEBO_htaccess_mod_setenvif_HELP_DISABLED', 'There is no support for .htaccess or(and) mod_setenvif on your website.');
define('_WEBO_htaccess_mod_mime', 'Utiliser <code>mod_mime</code>');
define('_WEBO_htaccess_mod_mime_HELP', 'Ceci est requis pour le gzip statique.');
define('_WEBO_htaccess_mod_mime_HELP_DISABLED', 'There is no support for .htaccess or(and) mod_mime on your website.');
define('_WEBO_htaccess_mod_rewrite', 'Utiliser <code>mod_rewrite</code>');
define('_WEBO_htaccess_mod_rewrite_HELP', 'Ceci est requis pour le gzip statique ou le cache forcé.');
define('_WEBO_htaccess_mod_rewrite_HELP_DISABLED', 'There is no support for .htaccess or(and) mod_rewrite on your website.');
define('_WEBO_htaccess_local', 'Placer le fichier <code>.htaccess</code> localement (pas à la racine du document.)');
define('_WEBO_htaccess_local_HELP',  'Le fichier .htaccess sera placé dans le fichier serveur local mais non dans le document racine de l\'hébergeur web.');
define('_WEBO_htaccess_access', 'Protéger l\'installation de WEBO Site SpeedUp via <code>htpasswd</code>');
define('_WEBO_htaccess_access_HELP', 'Cette option assure une sécurité supplémentaire à l\'installation WEBO Site SpeedUp avec l\'aide de  HTTP Basic Autorisation, fichier .htaccess et fichiers htpasswd .');
define('_WEBO_htaccess_login', 'Connectez vous afin de protéger WEBO Site SpeedUp avec <code>.htpasswd</code>');
define('_WEBO_htaccess_login_HELP', 'Afin de protéger WEBO Site SpeedUp avec .htpasswd, vous devez définir votre nom d\'utilisateur et mot de passe. La connexion est configuré avec cette option. Le mot de passe est identique à celui de l\'installation de WEBO Site SpeedUp.');

/* Dashboard */
define('_WEBO_DASHBOARD_LOADING', 'Chargement...');
define('_WEBO_SPLASH2_CONTROLPANEL_TITLE', 'Résumé d\'information sur l\'application');
define('_WEBO_SPLASH2_OPTIONS_TITLE', 'Options d\'optimisation');
define('_WEBO_DASHBOARD_SYSTEM_TITLE', 'Statut du Système et réglages');
define('_WEBO_DASHBOARD_ACCOUNT_TITLE', 'Données utilisateur');
define('_WEBO_DASHBOARD_ACCOUNT', 'Données personnelles.');
define('_WEBO_DASHBOARD_CACHE', 'Cache');
define('_WEBO_DASHBOARD_SYSTEM', 'Statut Système');
define('_WEBO_DASHBOARD_SPEED', 'Vitesse de chargement');
define('_WEBO_DASHBOARD_STATUS', 'Statut de l\'application');
define('_WEBO_DASHBOARD_NEWS', 'Infos');
define('_WEBO_DASHBOARD_BUZZ', 'Faire connaître!');
define('_WEBO_DASHBOARD_UPDATES', 'Mises à jour');
define('_WEBO_DASHBOARD_RESULTS', 'Résultat de l\'Optimisation ');
define('_WEBO_DASHBOARD_TOOLS', 'Outils d\'Optimisation ');
define('_WEBO_DASHBOARD_LINKS', 'Liens Rapides');
define('_WEBO_DASHBOARD_AVAILABLE', 'Disponible dans L\'Edition Premium');
define('_WEBO_DASHBOARD_ALL', 'Blocs Disponibles');
define('_WEBO_DASHBOARD_INSTALL', 'Installer');
define('_WEBO_DASHBOARD_SHARE_RESULTS', 'Share results on Twitter');
define('_WEBO_DASHBOARD_SHARE_RESULTS1', 'My @wboptimizer - #WEBO Site SpeedUp - tuned to');
define('_WEBO_DASHBOARD_SHARE_RESULTS2', '@wboptimizer - #WEBO Site SpeedUp - accelerated my website by');
define('_WEBO_DASHBOARD_SHARE_RESULTS3', '@wboptimizer - #WEBO Site SpeedUp - saved for my website');
define('_WEBO_DASHBOARD_SHARE_RESULTS_TRAFFIC', 'of traffic');

/* Dashboard error */
define('_WEBO_DASHBOARD_CRITICAL', 'There is a critical issue');
define('_WEBO_DASHBOARD_CRITICAL_FAILED', 'WEBO Site SpeedUp automatic installation is failed');
define('_WEBO_DASHBOARD_CRITICAL_DO', 'Please do the following');
define('_WEBO_DASHBOARD_CRITICAL_STEP1_1', 'Open your website source files via FTP or SSH.');
define('_WEBO_DASHBOARD_CRITICAL_STEP1_2', 'Find file <code>config.webo.php</code> in WEBO Site SpeedUp installation folder');
define('_WEBO_DASHBOARD_CRITICAL_STEP1_3' , 'Open this file and change the value of constants <code>$compress_options[\'website_root\']</code> and <code>$compress_options[\'document_root\']</code> to the right one (actual location of your website and your document root). If you have no idea what there should be you can consult with your hosting provider.');
define('_WEBO_DASHBOARD_CRITICAL_STEP1_4', 'Reload this page.');
define('_WEBO_DASHBOARD_CRITICAL_STEP2_1', 'Check permissions and possible errors (i.e. via log files) while accessing the file');
define('_WEBO_DASHBOARD_CRITICAL_STEP2_2', 'Allow this file to be accessed via web (through HTTP protocol).');
define('_WEBO_DASHBOARD_CRITICAL_REFER', 'If error still occurs please refer to');
define('_WEBO_DASHBOARD_CRITICAL_DOCS', 'user documentation');
define('_WEBO_DASHBOARD_CRITICAL_OR', 'or');
define('_WEBO_DASHBOARD_CRITICAL_ISSUES', 'known issues');

/* Dashboard status block */
define('_WEBO_DASHBOARD_STATUS_IS', 'is');
define('_WEBO_DASHBOARD_STATUS_ACTIVE', 'actif');
define('_WEBO_DASHBOARD_STATUS_LIVE', 'live&nbsp;mode');
define('_WEBO_DASHBOARD_STATUS_WORKING', 'Maintenant vous pouvez ');
define('_WEBO_DASHBOARD_STATUS_WORKING2', 'révisé votre site web');
define('_WEBO_DASHBOARD_STATUS_WORKING3', ' ou ramener l\'application en mode debogage en cliquant sur le button &quot;Disable&quot; button.');
define('_WEBO_DASHBOARD_STATUS_NOTACTIVE', 'non-activé');
define('_WEBO_DASHBOARD_STATUS_DEBUG', 'debug&nbsp;mode');
define('_WEBO_DASHBOARD_STATUS_TESTING', 'Vous pouvez déboguer l\'application: ');
define('_WEBO_DASHBOARD_STATUS_TESTING2', 'via GET-parametre ');
define('_WEBO_DASHBOARD_STATUS_TESTING4', '<code>web_optimizer_debug</code>');
define('_WEBO_DASHBOARD_STATUS_COOKIE', 'ou juste ');
define('_WEBO_DASHBOARD_STATUS_COOKIE2', 'via les cookies');
define('_WEBO_DASHBOARD_STATUS_TESTING3', 'Cliquer sur le bouton &quot;Enable&quot; lorsque vous souhaitez ramenez WEBO&nbsp;Site&nbsp;SpeedUp en mode live.');
define('_WEBO_DASHBOARD_STATUS_ENABLE', 'Activez');
define('_WEBO_DASHBOARD_STATUS_DISABLE', 'Désactiver');
define('_WEBO_DASHBOARD_STATUS0','Début d\'optimisation');
define('_WEBO_DASHBOARD_STATUS1','Préparation de l\'environnement');
define('_WEBO_DASHBOARD_STATUS2','Initiation des variables');
define('_WEBO_DASHBOARD_STATUS4','Estimation des répertoires');
define('_WEBO_DASHBOARD_STATUS5','Vérification des réglages');
define('_WEBO_DASHBOARD_STATUS6','Inscription du fichier .htaccess');
define('_WEBO_DASHBOARD_STATUS8','Préparation de l\'optimisation en chaîne');
define('_WEBO_DASHBOARD_STATUS10','Début de l\'optimisation en chaîne');
define('_WEBO_DASHBOARD_STATUS11','Création du cache JavaScript &mdash; vérification des fichiers');
define('_WEBO_DASHBOARD_STATUS12','Création du cache JavaScript &mdash; fusion des fichiers');
define('_WEBO_DASHBOARD_STATUS13','Création du cache JavaScript &mdash; compression des fichiers');
define('_WEBO_DASHBOARD_STATUS14','Préparation des Sprites CSS ');
define('_WEBO_DASHBOARD_STATUS15','Création des Sprites CSS  &mdash; sbalisee 1');
define('_WEBO_DASHBOARD_STATUS16','Création des Sprites CSS  &mdash; sbalisee 2');
define('_WEBO_DASHBOARD_STATUS17','Création des Sprites CSS  &mdash; sbalisee 3');
define('_WEBO_DASHBOARD_STATUS18','Préparation data:URI + mhtml');
define('_WEBO_DASHBOARD_STATUS19','Création data:URI + mhtml');
define('_WEBO_DASHBOARD_STATUS20','Création du cache CSS &mdash; vérification des fichiers');
define('_WEBO_DASHBOARD_STATUS21','Création du cache CSS &mdash; fusion des fichiers');
define('_WEBO_DASHBOARD_STATUS22','Création du cache CSS &mdash; compression des fichiers');
define('_WEBO_DASHBOARD_STATUS23','Vérification du document HTML');
define('_WEBO_DASHBOARD_STATUS24','Compression du document HTML ');
define('_WEBO_DASHBOARD_STATUS_ALL','tous les navigateurs');
define('_WEBO_DASHBOARD_STATUS85','Vérification de l\'intégrité du cache');
define('_WEBO_DASHBOARD_STATUS90','Finalisation de l\'optimisation en chaîne');
define('_WEBO_DASHBOARD_STATUS95','Effacement des données temporaires');
define('_WEBO_DASHBOARD_STATUS100','Fin');

/* Dashboard links block */
define('_WEBO_DASHBOARD_LINKS_WEBSITE', 'Site officiel de WEBO Site SpeedUp');
define('_WEBO_DASHBOARD_LINKS_UG', 'Documentation utilisateur');
define('_WEBO_DASHBOARD_LINKS_ISSUES', 'Problèmes connus');
define('_WEBO_DASHBOARD_LINKS_SUPPORT', 'Support Technique');

/* Dashboard cache block */
define('_WEBO_DASHBOARD_CACHE_TITLE', 'Statut du Cache');
define('_WEBO_DASHBOARD_CACHE_CSS', 'CSS');
define('_WEBO_DASHBOARD_CACHE_JS', 'JavaScript');
define('_WEBO_DASHBOARD_CACHE_HTML', 'HTML');
define('_WEBO_DASHBOARD_CACHE_SPRITES', 'Sprites CSS ');
define('_WEBO_DASHBOARD_CACHE_IMAGES', 'Images');
define('_WEBO_DASHBOARD_CACHE_RESOURCES', 'data:URI + mhtml');
define('_WEBO_DASHBOARD_CACHE_SCRIPTS', 'PHP scripts');
define('_WEBO_DASHBOARD_CACHE_SIZE', 'Taille totale');
define('_WEBO_DASHBOARD_CACHE_NUMBER', 'Number');
define('_WEBO_DASHBOARD_CACHE_REFRESH', 'Rafraîchir le cache');

/* Dashboard system block */
define('_WEBO_SYSTEM_TITLE', 'Statut du Serveur');
define('_WEBO_SYSTEM_NOPROBLEMS', 'Tout va bien!');
define('_WEBO_SYSTEM_TOTAL', 'Totale');
define('_WEBO_SYSTEM_TROUBLE', 'problème');
define('_WEBO_SYSTEM_TROUBLES', 'problème');
define('_WEBO_SYSTEM_TROUBLES2', 'problème');
define('_WEBO_SYSTEM_WARNING', 'mise en garde');
define('_WEBO_SYSTEM_WARNINGS', 'mise en garde');
define('_WEBO_SYSTEM_WARNINGS2', 'mise en garde');
define('_WEBO_SYSTEM_javascript_writable', 'Le fichier JavaScript n\'est pas inscriptible');
define('_WEBO_SYSTEM_javascript_writable_HELP', 'Please check rights for your JavaScript cache directory defined on "System Status" page ("Options" tab). You need either to switch this directory to a writable one, or to perform CHMOD 775, or CHMOD 777 for it.');
define('_WEBO_SYSTEM_css_writable', 'Le fichier CSS n\'est pas inscriptible');
define('_WEBO_SYSTEM_css_writable_HELP', 'Please check rights for your CSS cache directory defined on "System Status" page ("Options" tab). You need either to switch this directory to a writable one, or to perform CHMOD 775, or CHMOD 777 for it.');
define('_WEBO_SYSTEM_html_writable', 'Le fichier HTML n\'est pas inscriptible');
define('_WEBO_SYSTEM_html_writable_HELP', 'Please check rights for your HTML cache directory defined on "System Status" page ("Options" tab). You need either to switch this directory to a writable one, or to perform CHMOD 775, or CHMOD 777 for it.');
define('_WEBO_SYSTEM_config_writable', 'Le fichier configuration n\'est pas inscriptible');
define('_WEBO_SYSTEM_config_writable_HELP', 'Please check rights for the file config.webo.php located in the WEBO Site SpeedUp directory. You need to perform CHMOD 664, or CHMOD 666 for it.');
define('_WEBO_SYSTEM_htaccess_writable', 'Le <code>.htaccess</code> n\'est pas inscriptible');
define('_WEBO_SYSTEM_htaccess_writable_HELP', 'Please check rights for the .htaccess file located in your website root. You need to perform CHMOD 664, or CHMOD 666 for it. If there is no such file please make your website root directory writable (CHMOD 775, or CHMOD 777) or create a writable .htaccess file there.');
define('_WEBO_SYSTEM_index_writable', 'le <code>index.php</code> n\'est pas inscriptible');
define('_WEBO_SYSTEM_index_writable_HELP', 'Please check rights for the index.php file located in your website root. It should be writable to inject WEBO Site SpeedUp calls into it. You can leave it unwritable but you will have to include WEBO Site SpeedUp calls manually. More info is located on "System Status" page ("Install / Uninstall" tab). To make index.php writable please perform CHMOD 664, or CHMOD 666 for it.');
define('_WEBO_SYSTEM_curl_possibility', 'Le <code>curl</code> n\'est pas disponible');
define('_WEBO_SYSTEM_curl_possibility_HELP', 'There is no curl PHP extension on your web server. It is used to get external and dynamic files (to perform their merging / caching). To install curl please contact your hosting provider or system administrator. Usually it is enough to just re-install PHP with this extension enabled. [http://php.net/curl Info about curl on php.net] and [http://curl.haxx.se/libcurl/php/iis.html hints about curl installation on IIS].');
define('_WEBO_SYSTEM_gzip_possibility', 'Le <code>zlib</code> n\'est pas disponible');
define('_WEBO_SYSTEM_gzip_possibility_HELP', 'There is no zlib PHP extension on your web server. It is used to compress textual files "on fly" what saves about 80% of data transmitted. To install zlib please contact your hosting provider or system administrator. Usually it is enough to just re-install PHP with this extension enabled. See also [http://php.net/manual/en/book.zlib.php Info about zlib on php.net] and [http://php.net/manual/en/install.windows.extensions.php info about zlib extension on Windows-based environments].');
define('_WEBO_SYSTEM_gd_possibility', 'Le <code>gd</code> n\'est pas disponible');
define('_WEBO_SYSTEM_gd_possibility_HELP', 'There is no gd PHP extension on your web server. It is used only to prepare CSS Sprites. To install gd please contact your hosting provider or system administrator. Usually it is enough to just re-install PHP with this extension enabled. [http://php.net/manual/en/book.image.php Info about gd on php.net] and [http://php.net/manual/en/install.windows.extensions.php info about gd extension on Windows-based environments].');
define('_WEBO_SYSTEM_gd_full_support', 'Le <code>gd</code> est partiellement disponible');
define('_WEBO_SYSTEM_gd_full_support_HELP', 'There is gd PHP extension on your web server, but is has limited functionality. This can lead to incorrect CSS Sprites creation. To install gd with complete functions support please contact your hosting provider or system administrator. Usually it is enough to just re-install PHP with this extension enabled. [http://php.net/manual/en/book.image.php Info about gd on php.net] and [http://php.net/manual/en/install.windows.extensions.php info about gd extension on Windows-based environments].');
define('_WEBO_SYSTEM_yui_possibility', 'Le Compresseur YUI  n\'est pas disponible');
define('_WEBO_SYSTEM_yui_possibility_HELP', 'There is no shell_exec function allowed on your website or java is not available. YUI Compressor is executed as a java binary and provides better (in comparison to JSMin) JavaScript files compression. To allow shell_exec function or to install java please contact your hosting provider or system administrator. Usually it is enough to enable shell_exec in PHP configuration, or to install java on your web server. [http://php.net/manual/en/function.shell-exec.php Info about shell_exec on php.net] and [http://www.java.com/en/download/help/5000010500.xml info about java installation on Linux-based environments].');
define('_WEBO_SYSTEM_hosts_possibility', 'Pas de prise en charge d\'hébergeurs multiples');
define('_WEBO_SYSTEM_hosts_possibility_HELP', 'Default subdomains (img, img1, img2, img3, img4, i, i1, i2, i3, i4, image, images, assets, static, css, js) seem not to mirror your website. It is all OK with this if you are using different hosts (first four are enough) to distribute images through them. To enable subdomains to mirror your website please contact your hosting provider or system administrator.');
define('_WEBO_SYSTEM_mod_deflate', 'Pas de prise en charge <code>mod_deflate</code> + <code>mod_filter</code>');
define('_WEBO_SYSTEM_mod_deflate_HELP', 'There is no mod_deflate, or mod_filter (or both of them) support on your website. mod_deflate + mod_filter are used to gzip resources "on fly" on an Apache2 level. To enable these modules please contact your hosting provider or system administrator. Usually they are included into Apache2 by default. [http://articles.sitepoint.com/article/mod_deflate-apache-2-0-x More info about mod_deflate]');
define('_WEBO_SYSTEM_mod_gzip', 'Pas de prise en charge <code>mod_gzip</code>');
define('_WEBO_SYSTEM_mod_gzip_HELP', 'There is no mod_gzip support on your website. mod_gzip is used to gzip resources "on fly" on an Apache1 level. To enable this module please contact your hosting provider or system administrator. [http://articles.sitepoint.com/article/web-output-mod_gzip-apache More info about mod_gzip]');
define('_WEBO_SYSTEM_mod_headers', 'Pas de prise en charge <code>mod_headers</code>');
define('_WEBO_SYSTEM_mod_headers_HELP', 'There is no mod_headers support on your website. mod_headers is used to leverage gzip through browsers (to exclude unsupported cases) and to disable ETag usage. To enable this module please contact your hosting provider or system administrator.  [http://www.websiteoptimization.com/speed/tweak/cache/ How to enable mod_headers] and [http://httpd.apache.org/docs/2.0/mod/mod_headers.html more info about mod_headers]');
define('_WEBO_SYSTEM_mod_expires', 'Pas de prise en charge <code>mod_expires</code>');
define('_WEBO_SYSTEM_mod_expires_HELP', 'There is no mod_expires support on your website. mod_expires is used to add client side caching headers to all static files. To enable this module please contact your hosting provider or system administrator.  [http://www.websiteoptimization.com/speed/tweak/cache/ How to enable mod_expires] and [http://httpd.apache.org/docs/2.0/mod/mod_expires.html more info about mod_expires]');
define('_WEBO_SYSTEM_mod_mime', 'Pas de prise en charge <code>mod_mime</code>');
define('_WEBO_SYSTEM_mod_mime_HELP', 'There is no mod_mime support on your website. mod_mime is used to provide static gzip (also with mod_rewrite) for textual files. To enable this module please contact your hosting provider or system administrator.  [http://www.debuntu.org/2006/06/15/66-how-to-enable-apache-modules-under-debian-based-system How to enable mod_mime on Ubuntu] and [http://httpd.apache.org/docs/1.3/mod/mod_mime.html more info about mod_mime]');
define('_WEBO_SYSTEM_mod_setenvif', 'Pas de prise en charge <code>mod_setenvif</code> ');
define('_WEBO_SYSTEM_mod_setenvif_HELP', 'There is no mod_setenvif support on your website. mod_setenvif is used to leverage gzip through browsers (to exclude unsupported cases). To enable this module please contact your hosting provider or system administrator. [http://www.debuntu.org/2006/06/15/66-how-to-enable-apache-modules-under-debian-based-system How to enable mod_setenvif on Ubuntu] and [http://httpd.apache.org/docs/1.3/mod/mod_setenvif.html more info about mod_setenvif]');
define('_WEBO_SYSTEM_mod_rewrite', 'Pas de prise en charge <code>mod_rewrite</code> ');
define('_WEBO_SYSTEM_mod_rewrite_HELP', 'There is no mod_rewrite support on your website. mod_rewrite is used to provide static gzip (also with mod_mime) and to provide client side caching in case of mod_expires absence. To enable this module please contact your hosting provider or system administrator. [http://www.tutorio.com/tutorial/enable-mod-rewrite-on-apache How to enable mod_rewrite] and [http://httpd.apache.org/docs/1.3/mod/mod_rewrite.html more info about mod_rewrite]');
define('_WEBO_SYSTEM_mod_symlinks', 'Pas de prise en charge <code>SymLinks</code> ');
define('_WEBO_SYSTEM_mod_symlinks_HELP', 'There is no SymLinks support on your website. SymLinks are used together with mod_rewrite to provide correct rewrite rules in case of symbolic links inside your HTML directory. Usually there is no trouble with this option absence but in a few cases it can lead to incorrect redirects. To enable this option please contact your hosting provider or system administrator. [http://www.elharo.com/blog/software-development/web-development/2006/01/02/two-tips-for-fixing-apache-problems/ More info about SymLinks]');
define('_WEBO_SYSTEM_protected_mode', 'Mode non protégé');
define('_WEBO_SYSTEM_protected_mode_HELP', 'WEBO Site SpeedUp installation is not protected via .htpasswd. It is OK with such situation, but if you want additional secutiry for your website please provide .htpasswd username and password on "System Status" page ("Options" tab). [http://httpd.apache.org/docs/1.3/programs/htpasswd.html More info about .htpasswd]');
define('_WEBO_SYSTEM_cms', 'Pas de prise en charge CMS');
define('_WEBO_SYSTEM_cms_HELP', 'WEBO Site SpeedUp does not support current CMS. You should add required calls to source files manually. Please refer to "System Status" page ("Install/Uninstall" tab) for details.');
define('_WEBO_SYSTEM_memory_limit', 'Limite mémoire bas');
define('_WEBO_SYSTEM_memory_limit_HELP', 'There is very limited memory usage for your website. This can lead to failures on CSS Sprites or data:URI options usage. To increase this limit please contact your hosting provider or system administrator. [http://www.wallpaperama.com/forums/how-to-change-memory-limit-php-apache-server-t53.html More info about memory limit for PHP]');

/* System status */
define('_WEBO_SYSTEM_STATUS', 'Statut');
define('_WEBO_SYSTEM_SETTINGS', 'Réglages');
define('_WEBO_SYSTEM_UPDATES', 'Mises à jour');
define('_WEBO_SYSTEM_NOUPDATES', 'Vous utilisez la dernière version de WEBO Site SpeedUp.');
define('_WEBO_SYSTEM_ROLLBACK', 'Rollback to version');
define('_WEBO_SYSTEM_INSTALL', 'Installer &amp; désinstaller');
define('_WEBO_SYSTEM_STATUS_TITLE', 'Statut de l\'Application ');
define('_WEBO_SYSTEM_ISSUES', 'Statut du serveur');
define('_WEBO_SYSTEM_SETTINGS_TITLE', 'Réglages de l\'Application');
define('_WEBO_SYSTEM_UPDATES_TITLE', 'Mises à jours disponibles');
define('_WEBO_SYSTEM_INSTALL_TITLE', 'Installer et désinstaller');
define('_WEBO_SYSTEM_INSTALLED', 'WEBO Site SpeedUp est installé pour');
define('_WEBO_SYSTEM_INSTALLINFO', 'Suivi des changement effectués sur les fichiers de votre système web durant l\'installation de WEBO Site SpeedUp .');
define('_WEBO_SYSTEM_INSTALLINFO2', 'Pour revenir en arrière, cliquer sur le bouton &quot;Uninstall&quot;  (noter que tout les fichiers WEBO Site SpeedUp incluent les fichiers de configuration et fichiers  cache et seront conservés). Afin de restaurer le système à n\'importe quel moment, cliquer sur le bouton &quot;Reinstall&quot;.');
define('_WEBO_SYSTEM_SUCCESS', 'Tous les changements des fichiers source web ont été effectué correctement.');
define('_WEBO_SYSTEM_USERNAME', 'Entrer le nom d\'utilisateur afin de restreindre l\'accès à WEBO Site SpeedUp en utilisant .htaccess.');
define('_WEBO_SYSTEM_EXTERNAL_HTACCESS', 'Veuillez entrer votre nom d\'utilisateur et mot de passe afin d\'avoir accès au site web en  utilisant  HTTP Basic Authorization.');
define('_WEBO_showbeta', 'Montrer l\'information sur les versions beta ');
define('_WEBO_showbeta_HELP', 'Uniquement les mises à jour stable de WEBO Site SpeedUp sont montrées par défaut. Vous pouvez activer cette option afin de vérifier également les versions potentiellement instables.');

/* Dashboard options block */
define('_WEBO_DASHBOARD_OPTIONS_DISABLED', 'Désactivez');
define('_WEBO_DASHBOARD_OPTIONS_BARELY', 'Barely');
define('_WEBO_DASHBOARD_OPTIONS_NORMALLY', 'Normally');
define('_WEBO_DASHBOARD_OPTIONS_FAST', 'Fast');
define('_WEBO_DASHBOARD_OPTIONS_FLYING', 'Flying');

/* Dashboard speed block */
define('_WEBO_DASHBOARD_SPEED_GAINED', 'L\'Accélération acquis');
define('_WEBO_DASHBOARD_SPEED_SAVINGS', 'Economies');
define('_WEBO_DASHBOARD_SPEED_NODATA', 'Pas de données');

/* Dashboard awards block */
define('_WEBO_DASHBOARD_AWARDS_TITLE', 'Achievements');
define('_WEBO_DASHBOARD_AWARDS', 'Website speedup achievements');
define('_WEBO_DASHBOARD_AWARDS_CURRENT', 'Current achievements');
define('_WEBO_DASHBOARD_AWARDS_GRADE', 'WEBO grade');
define('_WEBO_DASHBOARD_AWARDS_FILES', 'Files');
define('_WEBO_DASHBOARD_AWARDS_SIZE', 'Website size');
define('_WEBO_DASHBOARD_AWARDS_SPEEDUP', 'Speedup');

/* Tools pages */
define('_WEBO_TOOLS_GZIP', 'Outil Gzip Statique');
define('_WEBO_TOOLS_IMAGE', 'Outil d\'Optimisation des images');

/* Dashboard order block */
define('_WEBO_DASHBOARD_HELP', 'Commander de l\'aide qualifiée');
define('_WEBO_DASHBOARD_HELP1', 'Des problèmes avec la configuration de WEBO Site SpeedUp?');
define('_WEBO_DASHBOARD_HELP2', 'Nos ingénieurs peuvent vous aider à installer et régler WEBO Site SpeedUp spécialement pour votre site.');
define('_WEBO_DASHBOARD_SEND', 'Envoyer une demande');

/* Account page */
define('_WEBO_ACCOUNT_EXPIRES', 'Valide jusqu\'a');
define('_WEBO_ACCOUNT_LICENSEINFO', 'WEBO Site SpeedUp donne droit à une licence pour une année contre paiement de l\'inscription annuelle. L\'Edition Communautaire peut-être utilisé uniquement sur les sites non commerciaux (voir <a href="http://www.webogroup.com/store/questions-answers/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">frequently asked questions</a> page). Pour les sites commerciaux vous pouvez utiliser une des deux versions de WEBO Site SpeedUp éditions &mdash; Lite ou Premium (see <a href="#wss_promo" class="wssJ">version comparaison</a> page).');
define('_WEBO_ACCOUNT_LICENSEINFO2', 'L\'inscription de la Clé de Licence est faite automatiquement. Vous devez juste entrer le code clé dans le champ requis et cliquer sur "Sauvegarder". Une fois la clé enregistrée, vous recevrez des informations sur sa date de péremption. Si la clé est périmée, vous pouvez racheter la renouvellement de votre licence WEBO Site SpeedUp. ');
define('_WEBO_ACCOUNT_LICENSEINFO3', 'Vous pouvez poser vos questions sur la politique des licences WEBO Site SpeedUp en utilisant <a href="http://www.webogroup.com/about/contacts/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">our contacts</a> tel que listé sur le site officiel.');
define('_WEBO_ACCOUNT_INVALID', 'Entrer le code clé valide ou laissez le champ vide.');
define('_WEBO_ACCOUNT_SERVER_UNAVAILABLE', 'Désolée mais le serveur d\'enregistrement n\'est pas disponible actuellement. Veuillez essayer plus tard.');

/* Cache page */
define('_WEBO_CACHE_EMPTY', 'Le Cache est vide');
define('_WEBO_CACHE_TOTAL', 'Taille Totale de tous les fichiers cache');
define('_WEBO_CACHE_SELECTED', 'Taille Totale des fichiers sélectionnés');
define('_WEBO_CACHE_NOTHING', 'Pas de fichiers trouvés selon cette condition');
define('_WEBO_CACHE_FILENAME', 'Nom de fichier');
define('_WEBO_CACHE_TYPE', 'Type');
define('_WEBO_CACHE_BROWSER', 'Serveur');
define('_WEBO_CACHE_FILTER', 'Filtre');
define('_WEBO_CACHE_EXT', 'Par extension');
define('_WEBO_CACHE_ALL', 'Tous les fichiers');

/* Options page */
define('_WEBO_OPTIONS_APPLY', 'Make live');
define('_WEBO_OPTIONS_EDIT', 'Modifier');
define('_WEBO_OPTIONS_CONFIRM', 'Êtes vous sûr de vouloir effacer la configuration"');
define('_WEBO_OPTIONS_CONFIGURATION', 'Configuration');
define('_WEBO_OPTIONS_DESCRIPTION', 'Description');
define('_WEBO_OPTIONS_APPLYCONFIG', 'Appliquer la configuration');
define('_WEBO_OPTIONS_EDITCONFIG', 'Editer la configuration');
define('_WEBO_OPTIONS_DELETECONFIG', 'Effacer la configuration');
define('_WEBO_OPTIONS_ALLCONFIGS', 'Configurations');
define('_WEBO_OPTIONS_CREATENEW', 'Nouveau');
define('_WEBO_OPTIONS_EXTREME', 'Extrême');
define('_WEBO_OPTIONS_OPTIMAL', 'Optimale');
define('_WEBO_OPTIONS_SAFE', 'Sécurisé');
define('_WEBO_OPTIONS_BASIC', 'Basic');
define('_WEBO_OPTIONS_ATTENTION', 'Attention!');
define('_WEBO_OPTIONS_ATTENTION2', 'Les changements de configuration peuvent causer l\'échec de votre site. Veuillez mettre l\'application en  <a href="#wss_system" class="wssJ">mode débogage</a> avant d\'appliquer les changements.');
define('_WEBO_OPTIONS_TITLES_safe', 'Configuration sans danger');
define('_WEBO_OPTIONS_DESCRIPTIONS_safe', 'Configuration testé soigneusement qui fournit une accéleration significative de votre site sans l\'endommager.');
define('_WEBO_OPTIONS_TITLES_basic', 'Basic configuration');
define('_WEBO_OPTIONS_DESCRIPTIONS_basic', 'Basic complex of settings which provide balanced speedup for your website. In a few cases can be incompatible with server environment.');
define('_WEBO_OPTIONS_TITLES_optimal', 'Configuration optimale');
define('_WEBO_OPTIONS_DESCRIPTIONS_optimal', 'Fournit une accélération optimale pour votre site web mais peut causer quelques problèmes parfois.');
define('_WEBO_OPTIONS_TITLES_extreme', 'Configuration extrême');
define('_WEBO_OPTIONS_DESCRIPTIONS_extreme', 'La  combinaison de tous les méthodes d\'accélération coté client garantie une accélération maximale. Cette configuration doit -être rigoureusement testé en mode débogage car il peut provoquer des changement d\'apparence et de comportement du site.');
define('_WEBO_OPTIONS_TITLES_user', 'Configuration utilisateur');
define('_WEBO_OPTIONS_DESCRIPTIONS_user', 'Description de configuration utilisateur.');


/* Version comparison */
define('_WEBO_SPLASH2_COMPARISON', 'Comparaison des versions ');
define('_WEBO_SPLASH2_COMPARISON_TITLE', 'Caractéristiques et technologies');
define('_WEBO_SPLASH2_COMPARISON_DEMO', 'Communauté');
define('_WEBO_SPLASH2_COMPARISON_LITE', 'Lite');
define('_WEBO_SPLASH2_COMPARISON_FULL', 'Premium');
define('_WEBO_SPLASH2_COMPARISON_VERSION', 'Edition');
define('_WEBO_SPLASH2_COMPARISON_SUPPORT', 'Aide Premium');
define('_WEBO_SPLASH2_COMPARISON_SPEEDUP', 'Speedup');
define('_WEBO_SPLASH2_COMPARISON_CPU', 'CPU overhead');
define('_WEBO_SPLASH2_COMPARISON_ANDMORE', 'et encore');
define('_WEBO_SPLASH2_COMPARISON_CPU_MS', 'ms');
define('_WEBO_SPLASH2_COMPARISON_UPTO', 'jusqu\'a');
define('_WEBO_SPLASH2_COMPARISON_UPTO2', 'jusqu\'a');
define('_WEBO_SPLASH2_COMPARISON_TRAFFIC', 'moins de trafic');
define('_WEBO_SPLASH2_COMPARISON_LOAD', 'moins de chargement CPU ');
define('_WEBO_SPLASH2_COMPARISON_SAVED', 'CPU économisé');
define('_WEBO_SPLASH2_COMPARISON_REQUESTS', 'moins de requêtes HTTP ');
define('_WEBO_SPLASH2_COMPARISON_ACCELERATION', 'accélération site web en plus');
define('_WEBO_SPLASH2_COMPARISON_NOTINCLUDED', 'non inclus');
define('_WEBO_SPLASH2_COMPARISON_ALLBENEFITS', 'Tous les bénéfices');
define('_WEBO_SPLASH2_COMPARISON_PRICE', 'Prix');
define('_WEBO_SPLASH2_COMPARISON_FREE', 'gratuit');
define('_WEBO_SPLASH2_COMPARISON_LITEPRICE', '17.99&euro;');
define('_WEBO_SPLASH2_COMPARISON_FULLPRICE', '72,99&euro;');
define('_WEBO_SPLASH2_COMPARISON_UPDATE', 'Mise à jour');

/* About */
define('_WEBO_ABOUT_TITLE', 'A propos de WEBO Site SpeedUp');
define('_WEBO_ABOUT_ABOUT', 'A propos du produit');
define('_WEBO_ABOUT_SUPPORT', 'Infos utiles');
define('_WEBO_ABOUT_SUPPORT_INSTALLING', 'Problèmes d\'installation');
define('_WEBO_ABOUT_SUPPORT_CLIENT', 'Problèmes coté client');
define('_WEBO_ABOUT_SUPPORT_SERVER', 'Problèmes coté serveur');
define('_WEBO_ABOUT_FEATURES', 'Caractéristiques');
define('_WEBO_ABOUT_BENEFITS', 'Bénéfices');
define('_WEBO_ABOUT_REQUIREMENTS', 'Requis système');
define('_WEBO_ABOUT_BUZZ', 'Témoignages');
define('_WEBO_ABOUT_SENDMESSAGE', 'Envoyer un message');
define('_WEBO_ABOUT_EMAIL', 'Envoyer un email de réponse');
define('_WEBO_ABOUT_ENTEREMAIL', 'Entrer un e-mail de réponse');
define('_WEBO_ABOUT_MESSAGE', 'Votre message');
define('_WEBO_ABOUT_ENTEREMESSAGE', 'Entrer votre message');
define('_WEBO_ABOUT_SEND', 'Envoyer');
define('_WEBO_ABOUT_SUCCESS', 'Votre message à bien été envoyé');
define('_WEBO_ABOUT_TEXT', '<p class="wssI0">Le produit WEBO Site SpeedUp est en développement depuis Mars 2009. C\'est une solution automatisée d\'accélération de site. Il combine des solutions reconnus et des technologies innovantes afin d\'améliorer une performance coté client exceptionnelle pour votre site web. Tous les droits pour WEBO Site SpeedUp appartiennent à l\'entreprise <a href="http://www.webogroup.com/about/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer" class="wssJ">WEBO Software</a>. C\'est un des mondiaux de développement de solutions de performance coté client. Les dernières informations publiées se trouvent sur le blog officiel<a href="http://blog.webogroup.com/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer"></a>.</p><p class="wssI0">Vous pouvez également participez au développement et au tests afin d\'améliorer ce produit. Dans ce but, merci de nous contacter en utilisant les <a href="http://www.webogroup.com/about/contacts/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=web.optimizer">contacts sur notre site web entreprise</a> ou le fichier ci-dessus. Nous serons heureux de recevoir une message de votre part.</p><p class="wssI0"> Vous pouvez également soutenir le produit en nous suivant sur <a href="http://twitter.com/wboptimizer">Twitter</a>, <a href="http://www.facebook.com/pages/Web-Optimizer/183974322020">Facebook</a>, <a href="http://extensions.joomla.org/extensions/site-management/cache/10152">Joomla! Extensions Directory</a> or <a href="http://wordpress.org/extend/plugins/web-optimizer/">Wordpress website</a>.</p>');

/* Third splash -- end screen */
define('_WEBO_SPLASH3_SAVED', 'Votre configuration à été sauvegardé avec succès.');
define('_WEBO_SPLASH3_MODIFY_SHORT', 'Changements requis');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION', 'Votre site web basé sur ');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION2', ' à été patché. Vous pouvez <a href="');
define('_WEBO_SPLASH3_REWRITE_DESCRIPTION3', '">vérifier le résultat ici</a>.');
define('_WEBO_SPLASH3_ADD', 'Maintenant vous <a href="#modify"> devez ajouter le code WEBO Site SpeedUp </a> sur vos pages PHP (');
define('_WEBO_SPLASH3_ADD_', '). Ceci est plus facile lorsque uniquement un seul fichier PHP sert chaque page web.');
define('_WEBO_SPLASH3_MODIFY', 'Comment modifier vos fichier(s) PHP:');
define('_WEBO_SPLASH3_TOFILE', 'Allez au fichier');
define('_WEBO_SPLASH3_TOFILE2', 'Ajouté au début du fichier');
define('_WEBO_SPLASH3_TOFILE3', 'Ajouté à la fin du fichier');
define('_WEBO_SPLASH3_AFTERSTRING', 'après la séquence');
define('_WEBO_SPLASH3_ADD2', 'ajouter');
define('_WEBO_SPLASH3_CANTWRITE', 'Inscription impossible dans le ');
define('_WEBO_SPLASH3_CANTWRITE2', ' répertoire. Veuillez vérifier que le répertoire existe et qu\'il est inscriptible.');
define('_WEBO_SPLASH3_CANTWRITE3', 'Vous pouvez faire ceci depuis votre client FTP. Il suffit de naviguer au répertoire, cliquer à droite pour afficher les propriétés ou option CHMOD.');
define('_WEBO_SPLASH3_CANTWRITE4', 'Inscription fichier impossible ');
define('_WEBO_SPLASH3_HTACCESS_CHMOD', 'Veuillez vérifiez que le répertoire WEBO Site SpeedUp directory est lisible et inscriptible pour le processus serveur web. Sinon, mettre en CHMOD 775 ou CHMOD 777.');
define('_WEBO_SPLASH3_HTACCESS_CHMOD3', 'Veuillez vérifier que la racine de votre site web est inscriptible pour le processus serveur web ou qu\'il y a un fichier inscriptible <code>.htaccess</code> .'); 
define('_WEBO_SPLASH3_HTACCESS_CHMOD4', 'Mettre en CHMOD 775 ou CHMOD 777 ou créer un fichier inscriptible <code>.htaccess</code> ici, ou changer le CHMOD actuel du <code>.htaccess</code> à 664 or 777.');
define('_WEBO_SPLASH3_CONFSAVED', 'Configuration sauvegardée');
define('_WEBO_SPLASH3_CONFIGERROR', 'Impossible d\'ouvrir  le fichier de configuration pour inscription. Veuillez changer les permissions sur le fichier  <code>config.webo.php</code> pour qu\'il soit inscriptible.');
define('_WEBO_SPLASH3_CONFIGERROR2', 'Vous pouvez faire cela depuis cotre client FTP. Naviguez au <strong>');
define('_WEBO_SPLASH3_CONFIGERROR3', '</strong> , cliquer à droite et chercher les propriétés ou options CHMOD. Le régler sur 775, 777, ou "écriture"');

/* create .gz versions of css/js file */
define('_WEBO_GZIP_INSTALLED', 'En utilisant cet outil vous pouvez créer un répértoire spécifié  <code>.gz</code> versions de CSS et JS (et d\'autres pour l\'utilisation de gzip statique.');
define('_WEBO_GZIP_INSTALLED2', 'Le temps de modification  (attribut mtime) des fichiers compressés et réglé au temps de modification des fichiers sources durant le gzipping. Les fichiers existant <code>.gz</code> sont rafraîchit lorsque le temps de modification des fichiers intiaux et existant est différent.');
define('_WEBO_GZIP_RESULTS', 'Résultat du Gzip:');
define('_WEBO_GZIP_ENTERDIRECTORY', 'Entrer dans le directoire initial');
define('_WEBO_GZIP_DIRECTORY', 'Directoire');
define('_WEBO_GZIP_RECURSIVE', 'Inclure un sous directoire');
define('_WEBO_GZIP_ENTERRECURSIVE', 'Trouver / les fichiers gzip récursivement');
define('_WEBO_GZIP_COMPRESS', 'Comprimer les fichiers');
define('_WEBO_GZIP_FIND', 'Trouver les fichiers');
define('_WEBO_GZIP_WAIT', 'Chercher les fichiers...');
define('_WEBO_GZIP_RELATIVE', 'Chemin relatif de fichier');
define('_WEBO_GZIP_SIZE', 'Taille');
define('_WEBO_GZIP_MTIME', 'Temps de modification ');
define('_WEBO_GZIP_NOTCHANGED', 'non changé');
define('_WEBO_GZIP_INITIAL_TOTAL', 'Taille initiale du fichier');
define('_WEBO_GZIP_FINAL_TOTAL', 'Taille du fichier compressé ');
define('_WEBO_GZIP_SAVINGS', 'Gain Total');
define('_WEBO_GZIP_INITIAL', 'Taille initiale');
define('_WEBO_GZIP_FINAL', 'Gain');
define('_WEBO_GZIP_PROCESSING', 'Traitement du fichier en cours');
define('_WEBO_GZIP_OUTOF', 'sur');
define('_WEBO_GZIP_OPTIMIZATION', 'Optimisation en cours. Veuillez patienter');
define('_WEBO_GZIP_NOTHING', 'Rien trouvé');
define('_WEBO_GZIP_ERROR', 'Can\'t gzip file ');
define('_WEBO_GZIP_NOSUCCESS', 'Failed');

/* Image optimization */
define('_WEBO_IMAGE_INSTALLED', 'En utilisant cet outil, vous pouvez diminuer la taille des images sans perte de qualité dans un répertoire spécifié sur votre web. Pour chaque fichier optimisé <code>.backup</code> la version sera crée durant le processus d\'optimisation. Les fichiers GIF sont remplacés par des PNG si ceux ci sont plus petits.');
define('_WEBO_IMAGE_INSTALLED2', 'Une des services suivants peut-être utilisés for l\'optimisation des images: One of the following services  <a href="http://smush.it/" rel="nofollow" class="wssJ">smush.it</a> (<a href="http://info.yahoo.com/legal/us/yahoo/smush_it/smush_it-4378.html" rel="nofollow" class="wssJ">terms of service</a>) ou <a href="http://www.gracepointafterfive.com/punypng/" rel="nofollow" class="wssJ">punypng</a> (<a href="http://www.gracepointafterfive.com/punypng/about/tos" rel="nofollow" class="wssJ">terms of service</a>).');

/* Help screen */
define('_WEBO_HELP_WELCOME', 'Welcome to WEBO Site SpeedUp');
define('_WEBO_HELP_MINIMIZE', 'Minimize');
define('_WEBO_HELP_CLOSE', 'Close');
define('_WEBO_HELP_FIRSTTIME', 'Are you first time here?');
define('_WEBO_HELP_LICENSEKEY', 'Register your license key or get a trial key on');
define('_WEBO_HELP_LICENSEKEY2', 'page. This allows you to use WEBO Site SpeedUp at full throttle. You can skip this step if you are going to use WEBO Site SpeedUp Community Edition.');
define('_WEBO_HELP_TUNING', 'Choose the right configuration (from Safe, Basic, Optimal, or Extreme) or create your own one on');
define('_WEBO_HELP_TUNING2', 'page. Don\'t forget to refresh cache if you change configuration. Hints near every option will help you to understand what it is about.');
define('_WEBO_HELP_CONTROLPANEL', 'Open');
define('_WEBO_HELP_CONTROLPANEL2', 'page and check WEBO Site SpeedUp functionality in debug mode. If your website is OK &mdash; just enable WEBO Site SpeedUp. Otherwise continue tuning on');
define('_WEBO_HELP_CONTROLPANEL3', 'page. If you face any issues with WEBO Site SpeedUp &mdash; please refer to');
define('_WEBO_HELP_LINK1', 'WEBO Software Website');
define('_WEBO_HELP_LINK2', 'Knowledge Base');
define('_WEBO_HELP_LINK3', 'Known Issues');
define('_WEBO_HELP_LINK4', 'Support');
define('_WEBO_HELP_LINK5', 'Online Store');
define('_WEBO_HELP_MEDIA', 'Video tutorials');
define('_WEBO_HELP_FEATURES', 'New Features');
define('_WEBO_HELP_FEATURES_LIST', '<li class="wssO8">Better cache refresh</li><li class="wssO8">HTML Sprites</li><li class="wssO8">Safe JavaScript combine</li><li class="wssO8">Cache expiration timeframe</li>');
define('_WEBO_HELP_FEATURES_ALL', 'All features');
define('_WEBO_HELP_FEATURES_BLOG', 'Official blog');
define('_WEBO_HELP_HELP', 'Quick Help');

/* Awards page */
define('_WEBO_AWARDS_INTRO', 'You have achieved some results during website acceleration and have received an optimization award from WEBO Site SpeedUp. You can achieve greater if you follow website performance optimization advices. You can always clarify your website acceleration with <a href="http://webo.name/my/" class="wssJ">webo.name</a> service (quick registration is required).');
define('_WEBO_AWARDS_TOP', 'Combined YSlow + Page<br/>Speed + WEBO grade');
define('_WEBO_AWARDS_TOP_INFO', '<a href="http://developer.yahoo.com/yslow/" class="wssJ" rel="nofollow">YSlow</a>, <a href="http://code.google.com/speed/page-speed/" class="wssJ" rel="nofollow">Page Speed</a>, and <a href="http://webo.in/about/" class="wssJ">WEBO</a> grades are independent website load speed evaluations. Higher grade indicates higher website performance.');
define('_WEBO_AWARDS_TOP_01', 'To increase this grade try to tune options in groups ');
define('_WEBO_AWARDS_TOP_12', 'To increase this grade try to tune options in groups ');
define('_WEBO_AWARDS_TOP_23', 'To increase this grade try follow YSlow, Page Speed, or WEBO advices or tune options in groups ');
define('_WEBO_AWARDS_MIDDLE', 'Relative decrease<br/>in website size');
define('_WEBO_AWARDS_MIDDLE_INFO', 'Lighter website loads faster for all users, regardless their Internet connection. Website decrease in size is calculated with <a href="http://webo.name/">webo.name</a> service.');
define('_WEBO_AWARDS_MIDDLE_01', 'To reduce website size you need to enable options in groups ');
define('_WEBO_AWARDS_MIDDLE_12', 'To reduce website size you need to enable options in groups ');
define('_WEBO_AWARDS_MIDDLE_23', 'To reduce website size you need to enable options in groups ');
define('_WEBO_AWARDS_BOTTOM', 'Relative website<br/>speedup');
define('_WEBO_AWARDS_BOTTOM_INFO', 'Website load speed is one of the most important factors holding website visitors. Website speedup os calculated with <a href="http://webo.name/">webo.name</a> service.');
define('_WEBO_AWARDS_BOTTOM_01', 'To speed your website up you need to enable options in groups ');
define('_WEBO_AWARDS_BOTTOM_12', 'To additionally speed your website up you need to enable options in groups ');
define('_WEBO_AWARDS_BOTTOM_23', 'To additionally speed your website up you need to enable options in groups ');
define('_WEBO_AWARDS_TAIL', 'Number of objects<br/>per page');
define('_WEBO_AWARDS_TAIL_INFO', 'Number of objects play an important role in website acceleration. Every HTTP request can waste a lot of time for your visitors.');
define('_WEBO_AWARDS_TAIL_01', 'To reduce number of objects your need to tune options in groups ');
define('_WEBO_AWARDS_TAIL_12', 'To reduce number of objects your need to tune options in groups ');
define('_WEBO_AWARDS_TAIL_23', 'To reduce number of objects your need to tune options in groups ');
define('_WEBO_AWARDS_CIRCLE', 'WEBO Site SpeedUp<br/>options usage');
define('_WEBO_AWARDS_CIRCLE_INFO', 'WEBO Site SpeedUp allows you to easily and flexibly manage your website load speed. Website speedup skills indicate a high professional level of developer.');
define('_WEBO_AWARDS_CIRCLE_01', 'To increase the application usage you need to enable options in groups ');
define('_WEBO_AWARDS_CIRCLE_12', 'To increase the application usage you need to enable options in groups ');
define('_WEBO_AWARDS_CIRCLE_23', 'To increase the application usage you need to enable options in groups ');
define('_WEBO_AWARDS_LEVEL1', 'Novice');
define('_WEBO_AWARDS_LEVEL2', 'Master');
define('_WEBO_AWARDS_LEVEL3', 'Guru');
define('_WEBO_AWARDS_CHOOSE', 'Choose your award');
define('_WEBO_AWARDS_SIZE', 'Size');
define('_WEBO_AWARDS_COLOR', 'Colors');
define('_WEBO_AWARDS_COLOR1', 'Basic');
define('_WEBO_AWARDS_CODE', 'Website code');
define('_WEBO_AWARDS_CODE1', 'HTML code');
define('_WEBO_AWARDS_CODE2', 'BB code');
define('_WEBO_AWARDS_CODE3', 'Code for blog');
define('_WEBO_AWARDS_CODE4', 'Twitter');
define('_WEBO_AWARDS_GENERAL', 'Awards <a href="http://www.webogroup.com/home/site-speedup/">WEBO Site SpeedUp</a>');
define('_WEBO_AWARDS_BACK', 'Preview background');
define('_WEBO_AWARDS_TWITTER', 'My #website #performance achievements (with @wboptimizer / #WEBO Site SpeedUp)');
define('_WEBO_AWARDS_RESULT', 'Website speedup results');
define('_WEBO_AWARDS_SENSE', 'What does it mean');
define('_WEBO_AWARDS_TEXT1', 'Achievements mentioned above indicate that website');
define('_WEBO_AWARDS_TEXT2', 'has been accelerated, and now its pages are faster and more qualitative.');
define('_WEBO_AWARDS_TEXT3', 'Website load speed is very important both for website visitors (as far as it affects the website confidence) and search engines (for example Google counts this parameter).');
define('_WEBO_AWARDS_OWN', 'Build your own rocket');
define('_WEBO_AWARDS_TEXT4', 'You can easily achieve the same or even better result and make your website faster than lightning.');
define('_WEBO_AWARDS_TEXT5', 'All what you need is to <a href="http://www.webogroup.com/home/download/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=webo.awards">download</a> and tune for your website the acceleration solution &mdash; <a href="http://www.webogroup.com/home/site-speedup/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=webo.awards">WEBO Site SpeedUp</a>.');
define('_WEBO_AWARDS_TEXT6', '<a href="http://www.webogroup.com/ru/?utm_source=product&amp;utm_medium=internal&amp;utm_campaign=webo.awards">WEBO Software</a> is a world-wide leader in acceleration of websites of any complexity. Its main product &mdash; WEBO Site SpeedUp &mdash; is the most complete solution to ensure high performance of your websites.');
define('_WEBO_AWARDS_RIGHTS', 'All rights reserved.');
?>