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
define( 'DB_NAME', 'wp_freelancer' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'wp_freelancer' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         '9NNSPhM^1njE7|94U++vb`. ?.u~Hi*HeCsr?V..c]hkV`TcU.RZ?gKEv.eI`em=' );
define( 'SECURE_AUTH_KEY',  'OI/xyoxnAC(tjmQVW#:LQpd= IsH.fxv]-.ta@%^q[i$nh`wO(BH[}.}{^: #Gd*' );
define( 'LOGGED_IN_KEY',    'YH4bjdru~hI2 Dt?-Q.kW&D2l%YFa>`(TAO1<t8<|f*:`8^JMO;<aF5ww(N1rDJR' );
define( 'NONCE_KEY',        'Dg#/P*$=[%/4*PnTCa=R9KWrzq!rw-kl%SRdKK<[a%<$t# ]0G@,Qf1h,|,74rzn' );
define( 'AUTH_SALT',        '9xT8)Ye{-etjGlbbkHk+kiu)#VqDw@eg2z6^Uj2J$ve Vm8i2p8Xn92&Z0S v;qp' );
define( 'SECURE_AUTH_SALT', 'Szo~b*jy{F5%^6-C1*?fw3}tVN%4IjLQ HY]$C@zgZP=#p3bLMfNsvM,EAuV{>Cy' );
define( 'LOGGED_IN_SALT',   '{$rz@*~%:#a0B7jH:^5>G=,V2;O*x>smODW`wd}.({eabj,hV8pQwm*V]G,=h}`t' );
define( 'NONCE_SALT',       'wL6jBs;9[Ehy),(:e .?w-RE=}2xnN>M^_d+M BIY?OQ!,%c`jXke`s,THOE,3Wg' );
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
