<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

//ophpmyadmin access: u-admin p-szostak
//db: english_adreducation_ca
//db: french_adreducation_ca
//db user: adreducati503402
//db pw: adrenglish123
//db host: sql5c11b.megasqlservers.com

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

// Uncomment the following for debug then tail -f wp-content/debug.log | grep -v "PHP Notice" to view in console in code use error_log( "PHP's console.log()" );

define('WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );


// define('FORCE_SSL', true);
define('FORCE_SSL_ADMIN', true);
if (strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false)
    $_SERVER['HTTPS']='on';
// define('FORCE_SSL_LOGIN', true);

define( 'WP_SITEURL','https://fa69-208-110-108-43.ngrok.io' );
define( 'WP_HOME','https://fa69-208-110-108-43.ngrok.io' );

// This helps with high docker CPU usage
define('DISABLE_WP_CRON', true);

// ENABLES upload to localhost
define('FS_METHOD','direct');

define( 'DB_NAME', 'wordpress-{PROJECTNAME}');

/** MySQL database username */
define( 'DB_USER', 'wordpress');

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress');

/** MySQL hostname */
define( 'DB_HOST', 'db:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+-_$XvWQal{PP~go]6V`NF(/H>n+#sl%$o+|%+iT|p|9Mw=^+2+P9|&+FE|XoB4+');
define('SECURE_AUTH_KEY',  'a-Kgw4i_|^;re(a;nPV=ix(LyuuN=LQe?Q8kYV*;5tb!WK`4OZ`)6fw!u4,>CVNV');
define('LOGGED_IN_KEY',    '<k|v.RAVAFy]i|! ==n@u{L9v`qyQB@OZ@7&?+|F|d!P /fea:EVb}d%I$GQWzrk');
define('NONCE_KEY',        '+4=)b[LJx<*>h0fEBnHI!(f|M-W;Y(=8aXOM0n DVKR.n3gZ#~b5<xIFeuegkeM7');
define('AUTH_SALT',        'v|D%|(zwC7)@v1pd,<nYGTg ZQ%LJbK,,qfwg@K/%jsyfs};&zmd+FP3SWG51p_z');
define('SECURE_AUTH_SALT', '3N{lT6dDs@~6oQhEHsP(:Td1C/t;1F1`c:Zjv=A<> M|A}l-M-fd1I7`WF+Xih:G');
define('LOGGED_IN_SALT',   '++hdLR~GV6-!3auQQe*Ts|*:T$>6=KC`F~6w#Ster:7^Z6.$Z?|VrB;2)iY}~$`<');
define('NONCE_SALT',       '[VNvP{Snpq17Ef+NM0GRb9X4tDe|H%3X{;[ {U Qh.[d(1c#3f<YyG0-t10u^yEK');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
