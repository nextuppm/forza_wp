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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpressuser');

/** MySQL database password */
define('DB_PASSWORD', 'wordpresspassword');

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
define('AUTH_KEY',         ')j7VngFDxKe4JVGOT5HEcq%sCbn5Io9d@Asq7x%)mN9A9b8yXJ9In)q(KDLnOMo9');
define('SECURE_AUTH_KEY',  'ik4RFFUGEHI7wQhL9YoYMePqpAhKVkRk!SZ^F0K7nmzWU%9b312HsgIO@W5tn(WB');
define('LOGGED_IN_KEY',    'o2^SU9SNMz%vj&xitY@68AL9qq&CmvPfuBYJch@bkjn)HWtP()B6jZcCOCX2!o%r');
define('NONCE_KEY',        'x)I7&cYNExodMfhKlBclegqYIzEPWmZc9VSUFrMDaMcM*tVB#6Q393*DUUZRF48^');
define('AUTH_SALT',        'LK8)Oljdbchv!bpHtOKdcidkQWMZz1^UoI^#LvUCv1N19hFM%)6j386sPm(otBBj');
define('SECURE_AUTH_SALT', 'TcuB(na(35&Q!pt7#PWs2It0VWc8o7o!XeMml8mN)5s5%uBw9G@Jv!MFMjVCD%^j');
define('LOGGED_IN_SALT',   'BM^EZ5Ov7zS#(RKKWGo47EgIZxQf0#D3w1oktSTg^BeCJ)(m6WsR%D3Bn@(DFf7w');
define('NONCE_SALT',       '6Xj4HlUH!X9)6YbGj(lgo6jaX@BHAkF1VQphR8ys^*WM)u*nqBFVgadJP0dg64X9');
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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
