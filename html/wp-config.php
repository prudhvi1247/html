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
define( 'DB_NAME', 'nrstechn_javahomes' );

/** MySQL database username */
define( 'DB_USER', 'nrstechn_javahomes' );

/** MySQL database password */
define( 'DB_PASSWORD', '0V&YTDmu]d}#' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         ']kmcfdFdl9}8FYnWx/zJEGhp=5K+ lly+WZl/_R%UkJcekDAv|6^#k!XYfG5g?U_' );
define( 'SECURE_AUTH_KEY',  'o@ysKri%Po(j_ga^Gc.y,st5h;c##?E6:EN)b<&|B:T9FM1=>EqAU5HQ#?O+LI-S' );
define( 'LOGGED_IN_KEY',    '{!R(fz4=*`wY*(Qs7,wn-z`<?4!z+y{8vVf?<U:>D52{tm.![W$%+u!I@b}1De8R' );
define( 'NONCE_KEY',        '}-Rz<f[N?8oCj+YVU6uZ~jVq1Rz[q;X(ppIwhhn-}/ODVJ,4H;=?eOM|22f}) wt' );
define( 'AUTH_SALT',        'xr,NDBY6>FS20Lqct8Dy4>M](l{5E^ztailHOA9][um]2YZ}*241!frL0-R,#n;x' );
define( 'SECURE_AUTH_SALT', 'x6-d @JCq!!1YatB|l7xRM8z $|Vt|I~b.$>^7QdnccfSmFZJG/<>Yo9CxI7k7q4' );
define( 'LOGGED_IN_SALT',   '`fJU[a,iJASA,ERK0Ls;.w%WHU/jGRh2E?U0k)qZ@{HsS[iEYSb:Qb Kb.=_*s-d' );
define( 'NONCE_SALT',       '%%>YEk-qOy,y{792:pCotx-ko+np*>8%T@b_jjDYnN.<OAhm-.BNt<%u:Vb6qIlO' );

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

define( 'WP_AUTO_UPDATE_CORE', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
