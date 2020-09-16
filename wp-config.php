<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'etceteratestcom' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '123098asd' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%C;Yz{fR6!/W(wiEGD:p|5kgfjB4izSH|W0PtrV~kPa#(%KMkg}N&`t^r@(Gjm!m' );
define( 'SECURE_AUTH_KEY',  'lgx(tDi+J`7t:Rb2O?$>2ux_jb+JfA`LG>1Kum*5r<iU9Ctb3+$pu$:o _.b5lu`' );
define( 'LOGGED_IN_KEY',    'g6mbgDG*pqemM0t-L>Op1x,}Ab`^5N?2pU>j8kjZ<1fnVyV^W>F;tml*P; 9:%gG' );
define( 'NONCE_KEY',        'xsHW<pJ.1K+QE-(9s]:3ix^H=$q)5fHWE!24_phE+t)Fn1!]8hU`)S, `VMUOcKS' );
define( 'AUTH_SALT',        'gxv1E2WWTAXUw,sJJ)MUHG5a7?fpczr~rkTj[95y-&!w]*r;6!Z7taacbQaRI6va' );
define( 'SECURE_AUTH_SALT', '@l}>c_r23,$#8K{B9-,kKut]`U/gd.8|ff^0?OFKL_2$kCNQOx(NHz#iys1E[@.<' );
define( 'LOGGED_IN_SALT',   '_V1}a5yQ7}}?eaJpfAz~6rN*G@dUh04n?cUo@f=XC@}vyuC-1jtMA~3E/@pm~k[[' );
define( 'NONCE_SALT',       'GSALM@$uyDGl)LedZDG_^_JA]3,8*4,0[T-r%)fSHDz 815n=SviBv;n!1VrllIj' );

define('FS_METHOD', 'direct');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
