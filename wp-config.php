<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'smakolyk_wp5' );

/** Database username */
define( 'DB_USER', 'smakolyk_kuba' );

/** Database password */
define( 'DB_PASSWORD', 'Kubalka15#' );

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
define( 'AUTH_KEY',         'mn1R`j8sHy#$`Z?lo/u$Xc12k3G0~Ugo5k#iL+s[3CQx3a!a}WaD?M5#_@Q?=>]j' );
define( 'SECURE_AUTH_KEY',  'E(XsP`C/z)H&uL#2;8&Gw+OjDX${cFWIb#E-; 56~#QA1Xq`30pl6<snQvR{S.,O' );
define( 'LOGGED_IN_KEY',    '2-j@N6i2|d[W?S5T^8XNO8](mA_Ze?C&lEcr5R)M9:GX~j60rZ.V:[FXlH.EN|Ep' );
define( 'NONCE_KEY',        'gGCk_}HR00Lx`=,6liXWNp[:diyKvzdOsj6+8E<Y1t?8?Vo+q-$jGgE,tl,)9:S0' );
define( 'AUTH_SALT',        '9ZB[R1 >AoO%i:q6HmiXO;pP{YFV$te+UZLr!Vv@0xoa{o$t9XZDgm1e)LwR*`O=' );
define( 'SECURE_AUTH_SALT', 'iV#XUBB]{8xq06Tbd7296=E8cQ2<n1PkaZc50,8&u1%p,/IUk0(ranuI6D0!/@F<' );
define( 'LOGGED_IN_SALT',   'M-Klf-eK9 ^T>S$SF{cBFvmcO.e]SUx@BZH^6wn7XRg}Ng<:{j*x8]?Xp8m%+Q(?' );
define( 'NONCE_SALT',       '`PXB):Z&-IF@s{X/M$P1@Y,#?*$Yq0q=Wfr,g<7J-~dl` Ee.v!O].%{VvlF;x|h' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
