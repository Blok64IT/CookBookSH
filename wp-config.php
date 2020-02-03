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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cookbook' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '& <ZjUSe3RXf(26=qV5NJATOdw-nq,p!t`qD6ciOsQ+{L</&%yo?YyP>:?<+*Zu2' );
define( 'SECURE_AUTH_KEY',  '2Mg|, hRSHTO=<KLlSDR=93r95}>IHy|#l^iz}AbOQlmvU3#uhV[&/zhplVrK7bM' );
define( 'LOGGED_IN_KEY',    'YXH3g_VbK<{I4 C{1D[KJ{Q.8/UZ%(),8)rd5] =/h.C$S2+e9ODZ;-~+/(`>eOS' );
define( 'NONCE_KEY',        't>f0=@Yjx5VgH(gd`G`0n`2v<O r2Ly$A[qAJ6w-q2CbcVL+gA_?HL[pe&XFa0L=' );
define( 'AUTH_SALT',        'lYuv0+{_>3=T_wlLC>O;mDr+DT@#iTT.#94q1aRaJB7PxII|TJ&bqM-4=|UHn~&I' );
define( 'SECURE_AUTH_SALT', '|S#s?ZZfbbvYdmuYoO/LX{!2S-P)Xw#s>na*2ow9Fl8:;MB)t75Q}xB*f!*ARo5<' );
define( 'LOGGED_IN_SALT',   '-qRGl2Cs9Pm:Bkhsr[nh K,*t~h=WHYQgU~a6z>mRmm]Sp8/66R>MQ}h!Q(c)UOr' );
define( 'NONCE_SALT',       'q<vU_/^AT_6jGuxXC~y}@&y+)@Izl |wX@0t<Qbzj;$q,R{&z]I7;O_pM z@fV P' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */

ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
