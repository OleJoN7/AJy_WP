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
define('DB_NAME', 'Exam');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'sithempire');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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

define('AUTH_KEY',         '2O{L%hihl&bR+|e.G*Rf{9L;JD31KW(>x+R~,o-OR>XaE5HMA%3z0}vTiq8Khq=3');
define('SECURE_AUTH_KEY',  'kE/70N(9B}oN==#U-f/XC?y(wV0s_|@4]{Nex$X<4mMPMdW|0M[y5siy *<Jb|SG');
define('LOGGED_IN_KEY',    'x!&G$G|:s--B|* yq{it*:e-d;0F7z<@-aJ_}*[?`4;ksm+YS0r~@~HeAUs<Aw{=');
define('NONCE_KEY',        '|1/g#L/)$R5li`B#L7 4QaArLxN]qj&(Xs)&5F`30}b.>R>*$s:wLK4/w!hs=K0K');
define('AUTH_SALT',        'xqxkmMx(?~gp=T|(.EoF,XO}n10cXYV^KY>S,1mxS``V?2}aY*{CuVgF{:f+d>Jn');
define('SECURE_AUTH_SALT', '|^ &0!4=a7Xm<:D[Y,0J_S!7o-BbJ<{^7yQ9itJWM|w` WYDF?t^+$|%AX`}t6[&');
define('LOGGED_IN_SALT',   'S}1hwj-NOnz/=,q[?z2`c&Sl-y@r$4Z6c%@=GG8Nk{}@}~fX3b]{rW}bct4H${cm');
define('NONCE_SALT',       'A:8yqcy|. P:4@WRN2P1MFEN2nS7da Mb#`-oA=+K&hG!069^ TnK0@%yi|H][;c');

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
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
define( 'UPLOADS', 'wp-content/uploads' );
require_once(ABSPATH . 'wp-settings.php');
