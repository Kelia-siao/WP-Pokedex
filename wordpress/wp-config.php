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
define( 'DB_NAME', 'site_pokemon' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'uM??R{$1kv~wdr2D`Odtyat2tndnk%by!.Tz aM`I}2f^YX-(/zM!5x<n$#V)ny4' );
define( 'SECURE_AUTH_KEY',  'L[rJrjilD~`|Wi[ -nVB Gq#HvrfM<?q#SI^Z(>K2@.7^)[JqvF$Wm`.YU*mvw{,' );
define( 'LOGGED_IN_KEY',    '*i`rBSn{*c9 #o6[2?}`p7&=}F[#2[y]`=h}<S{6q-q3X{/aCvJ#M^dU$I=C9<c9' );
define( 'NONCE_KEY',        'm*Rqa;7g14Z|N6w1VVO#N7KJMw>?1icm(RX3!%6`g]+8/y(HH+_|N&(8S g{}+,I' );
define( 'AUTH_SALT',        '@);=Y0sAL|8swt:0CG5+D&uqQg8:m#u!RaKOmdSnfE-m6@pv^?jxr-3lkn:|Ur6C' );
define( 'SECURE_AUTH_SALT', '`HeS=OQ*h(]y5xDx/hFe0?Qp>cD?<l2GlXMKu#69)b]{H;jGq(s_S9H2t3^-=#Xf' );
define( 'LOGGED_IN_SALT',   '-o0lT!/:Fh^EKH$.V?vL`v8q)q${T#5 ^]yEn>roTaM %94t|J(@dQTP*=m]CT|~' );
define( 'NONCE_SALT',       '+XJDo-kNhA=:;nZrfok@]<nwA;L2O3-R)#/Vue$s2u|A*xqna> RGYpmVXk)u4LU' );
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
define( 'WP_DEBUG', true );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
