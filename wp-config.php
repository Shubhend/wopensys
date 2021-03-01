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
define( 'DB_NAME', 'wordpress' );

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

// define( 'ALLOW_UNFILTERED_UPLOADS', true );
// define( 'ALLOW_UNFILTERED_UPLOADS', true );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1 Cax8!MiAA{:act:ed%rv6!6Yo#pLU* ?a(t*)><6q:H&$3A2ijt_K#(lwQbG=0' );
define( 'SECURE_AUTH_KEY',  '7S5lez;?_D;tLl>%+0C~gFV9j+oeKp>m{{Nx1`XW]!Tt-!XBew))8y J|Ker*4DJ' );
define( 'LOGGED_IN_KEY',    '<oN[e6>e#<lp=evsjjr#G  7U)73&S/z*~hk owkEZJ6p*PE2X-YIf-U.eHG^`TQ' );
define( 'NONCE_KEY',        'uwQ!kG4/sSl9P$p*: ?t>2Ro2M%w)o?t*/Rp#@#:n?V**<r7?.Uq6Y!II`YZuPf~' );
define( 'AUTH_SALT',        'M9F.SLnbbt~f$S,5KWK#wA#<oghs]f].)?}vLIKUyn<+H-$HR|;FiR18S00am`d3' );
define( 'SECURE_AUTH_SALT', '-J=MRSpakf2$=a8[.p@m5dorGA~=/%LS?+NK+CElFs_~[{YZ.~phLS*ZD:Di=!X0' );
define( 'LOGGED_IN_SALT',   'rWm9u}s/}n!me0>G^wbVLD0y6eB}u1X sE&:?(s&?A|0md.-%rZvGP$[?Bw:e#ko' );
define( 'NONCE_SALT',       '!y;wrUxEgO}X;3{8HZ5y<hghxZt/qkZgJ/H1t%=B[~*$yS~;T31VEb&_PrGHJ,SB' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_2';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
