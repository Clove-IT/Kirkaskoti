<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kirkaskoti' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '>Y~J-U5 N^IZ>%o{TqtkFH=,%+I =&+]%eAxkB_;/!o1?SIRa`T&.}Sih3ooD*3#' );
define( 'SECURE_AUTH_KEY',  ':cks|K,o;F%Lbj4e* t6~f!T}n+ (7l<A-sBhultB;Pm9&JQzr4Ox[_*]MY<)G1]' );
define( 'LOGGED_IN_KEY',    ')B(bOS}|wZ|5AYHNnnUbAkw`B`%x4MS&D%jJcIUA,vs[3#OrVAZQ0wWeee:Rhn=}' );
define( 'NONCE_KEY',        'Ta|6w]<^r.LQ:PVcm9cp9MU08hU-PC[X`q;I{Y vE&.kSd=[d|=Tlsg.C9!2[SXM' );
define( 'AUTH_SALT',        '5Ov?iwJ$zQh`=a4 /s|v4XF048l5qbB~]MnrGADz[?XznsyVT4jJ:-jO&E{kT1V}' );
define( 'SECURE_AUTH_SALT', 'V6FV|1i:CZP;@Wu)hEd$Y2,kX26<lNN`O38N@-^B2V%6jsFj hviayDl}/5/pU&f' );
define( 'LOGGED_IN_SALT',   '+rPt7XW#Od5bBRmm^1n,M<LrL)V-<wWUQn9qcsy$%Niqf{*~(*LIVWUx/g?-Xpg[' );
define( 'NONCE_SALT',       '_w3vRQ~{5m.d0&{c2M>,co=(A ]0oP_;gWV5EnO?;to%+YGb5kQf[+Q~(-]$3O3=' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
