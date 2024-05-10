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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'caseguard_sb' );

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
define( 'AUTH_KEY',         'llBI,:p1+0$ODHfLV;~&qEk?Ty}s0u@fGjrx+,nlz#)2zLfav$fLQbbmi?eJMdvU' );
define( 'SECURE_AUTH_KEY',  ']A@{j5:&qh]l/!^.B;p0prEALtR>*prcwCjJC|;]QM,$<v73~J|_} !]WUBc{itW' );
define( 'LOGGED_IN_KEY',    '/6i$rh)i_t@?u4m&?~tO{!R]AkKqr%jDBiN?.VByviDwd*P?i3ZX0$2.21bT2r%d' );
define( 'NONCE_KEY',        'aRB?QvKBM_9t$_c]hu<m&K~:qmI?nsM~j<VHf>w|blx^=eG_rDbQ33@$18rl+bwv' );
define( 'AUTH_SALT',        '&+yAf~<).8tJu*,OA#dKJ2lA#c%z-GS3b=y^R6eBmV.)ZnM,x1Z7+$!~6.WI#Aaw' );
define( 'SECURE_AUTH_SALT', 'gso2Hoct9JW^W-gsJc;H<a):!sp9LCF}(C4_AKk1-6Iva?6$7@PpKDD11Q#8(|PL' );
define( 'LOGGED_IN_SALT',   'rhQ#yzq.8O8DQAYw{,_}HZ0q::t`&c31R?@M7(wF.-o?T])O:^HGFAtC?K|j2C{e' );
define( 'NONCE_SALT',       'X$PU6<zt;/rX*LJjWYw?2?:9A+]_X@F}_%w]r:x%WV;I-Yf`~)6MV9k^RK_mVRjS' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
