<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

define( 'ITSEC_ENCRYPTION_KEY', 'PFdrQGZjSjFIS2Iqc0ogN2AxXnFmc2ovN1Q5PWlMVTAsUDBxV2p8ZW0gREBkaXIjSU5aWT1USS5hJG4xYSBeLQ==' );

/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'bricotips' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY',         'VoPHw3u-Z|8u+%z;#qE=g08_CX^n/vW|vd9fs:[w-RC&ryHei@5{XC)4(AP&@u.I' );
define( 'SECURE_AUTH_KEY',  'B>eGgB_4#^x9Kw0-!P^K[vS[Xq!~4qi QS ]`k4woO02r.e9*-5ElV*=uKp;3W-L' );
define( 'LOGGED_IN_KEY',    'W(BZDKz*6G#$1HnSt=.m]2bZ#=JKg?~}:(m[>`E8SlZJ=f|jiNadn|a|I:+``q:t' );
define( 'NONCE_KEY',        '{(&,2#~Qg_<1&6nZJ!HY@`vGuAXXP1B9d(^0_;|<se;sqmdk59oeIb%)Npr>75cb' );
define( 'AUTH_SALT',        '@S{ X8:tX.m1-wf:V$mCiuCg[[%O!:Bh$(^WzE~!lc+H# x&bhIkr6PR:sAHme{|' );
define( 'SECURE_AUTH_SALT', ' ^X#b9L~eR-T^z5Pf*f*s`KIX9sV=mzzbhLr!%{~]iyJkC63_!Pa=Lt_E,jfV|5l' );
define( 'LOGGED_IN_SALT',   'l,}Y+HTT3t5iY-@W^:Q}<4X})z%@> l|*/@1&O]]^x~T>Mfkn4Z`#idMs4<Lt87z' );
define( 'NONCE_SALT',       's#y}?GHtJl8[ehg.k0Z..]4=FOXkDsUf$AqiadlqIrVn5*IZP[TF%X=L<9FU3b|a' );
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
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
