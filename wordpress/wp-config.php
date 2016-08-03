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

define('WPLANG', 'zh_CN');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'pt~l@;=0O@DuV3Yj9x0*6X9jMzitD,<Hswp`%a@4vDY#,ZS(#X/]pg]]^=2<C0ba');
define('SECURE_AUTH_KEY',  'b8VjB9`ZS<G#Hh~FS:x7;Vq2{wC6SWlpjkiA+CUsAQ+#Skb?*O3-rt,St>)a)ixg');
define('LOGGED_IN_KEY',    '9,8fisQxK07f8c-Nz8gZ3Tj;:*F(y>_0y?_|,_z0!<IMC%N`%>&Jsy^.K2*[,#}m');
define('NONCE_KEY',        'Jpm^q0e/AJ16>S?-A_)O~m8AIIa[P)9ffZ>d?+i)3h5hq`whxt;KbD|Ybl,,F8)8');
define('AUTH_SALT',        'uw3-4,HM6E{+r~+On*Nk^{7izYLba@<W/b,R14t%OPstv)O^5Ig]-ui![Lp_.cMX');
define('SECURE_AUTH_SALT', 'lKd-[!Sb({5PB|@$*w&S}XU=uPEr:@x}d=hY7HbUx>`8v4*Gl~9F.3<|I/ArEA9=');
define('LOGGED_IN_SALT',   'o=kkDU!ClH9H2P:M`2gRfwLNysi@Cov2&+.:foMWuyg)cg]yE67r|IP@CG.1viOu');
define('NONCE_SALT',       '`^ws]4])8&IQ[G:wVYFYEtu_3}#uMj?O8x[Db W5T+~#z%b/NHDVK;:kd -e55x/');


define('FS_METHOD', 'direct');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
