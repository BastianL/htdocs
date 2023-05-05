<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'wordpress' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'bastounet1' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ',2^b5mpOYGuEZbow2uHOYS}jbBIFzb.V Z&@i~hyP{&OK8ar;ZL5b^k>!|yA{.4O' );
define( 'SECURE_AUTH_KEY',  '7v?`5j.`F2&Tk.^(l=mnl:}ta~_,Jh86;GPLMIN#-#jW_&kP1, wRVGo2A.SzS,y' );
define( 'LOGGED_IN_KEY',    '!lo.RN%R{Xy[!%y;j1hx2gIc[U82a9Yf;V@tG@NorDn4~JeUz6vPpM{3B[ws%9},' );
define( 'NONCE_KEY',        'x(-5%GIuSpc3zzBaMd+[r(UWi?VDxw<*MU4P)bw<<;J0:x}#I46aA0`F%lgU3G`t' );
define( 'AUTH_SALT',        'c/$GMY])2T8+d}qD!N14HW/.%<Hn(n30lU?)q9PKdee$WG$IRY]3$hsV#MH]haIY' );
define( 'SECURE_AUTH_SALT', 'x:g5SXM5f]H$K=)/Nq1axt8!19[<uFz7.H X9YFRW_W(u:`$+/<9/[N*4sdP7z#-' );
define( 'LOGGED_IN_SALT',   'w k>2i[vUz5>YCk:bo uMipPsr>|AR}h&/CH*f~HH_~^jz:Ii}p~EyvC%f~hv:UC' );
define( 'NONCE_SALT',       'a/%l#2Q.L4o]<2$ n,>o*){y(4I$$&YK>8hnlqrkIUXD>2FQuy5])*XnCI.u<Wgg' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
