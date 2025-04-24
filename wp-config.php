<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define( 'DB_NAME', 'test_wp' );

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
define( 'AUTH_KEY',         'q#^}l -dw`_(h+{PZI/H~94NlnS8>0{DkC{J(}uqtO@(L*~F{n8aLBWJY66s0bI}' );
define( 'SECURE_AUTH_KEY',  ',auOMR&BYy&6C4ghl.]3J(wBZg?SKmbkl0oc;uv=f-!E9F[L!7c8!Lz09{</ig?V' );
define( 'LOGGED_IN_KEY',    'k+@d}/q?i~}Ug_[m{+zX_F/D%%Rmij-N-VEYW~amOIwH~++|DUK`t<o}^=R{M-10' );
define( 'NONCE_KEY',        '}fC/8mr}~e@Ejd+{gB%j4.<EgJQ2b)v.zsdk_9>cJ=f}.t[1Xfif%QIFmBZS,uXh' );
define( 'AUTH_SALT',        ']b*1+V6h-F/+DsOaDw!z``Vu[UyR_lUsh1>[Z^tkPb`#,h1$yF*>!W?i9WV(B.^)' );
define( 'SECURE_AUTH_SALT', 'jYIWs5v`r25z b0W@&j@dHX.ea&x}oIDj`1[oF8hm[OBap BD3{D^vtyC]ye?6~I' );
define( 'LOGGED_IN_SALT',   'M9%io2:p]ss.wo.EXGgz=c:Aph?uGd=w!<IC5CPu< #d]9t+?[QRutn4z2n4+38Q' );
define( 'NONCE_SALT',       '|L*|W9I`:S1~0Jb,hJx%I2a<aNJi9(f$uGhbqd4uw@)qEQ{LeEiD.1Vn0}@U7R2g' );

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
