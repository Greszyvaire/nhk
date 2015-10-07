<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'newhongk_hk89');

/** MySQL database username */
define('DB_USER', 'newhongk_hk89');

/** MySQL database password */
define('DB_PASSWORD', 'zQqsdPpB,,~-');

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
define('AUTH_KEY',         '5ucpnigkkubmucazp2dkq5zkjrrmp24mrgyirc7xjjz9ksttv675bi795h3fdasb');
define('SECURE_AUTH_KEY',  'w6w5vkyoynqpwtpc7pqiozttvwzkzc4vspgnjia53g1d25ylhzyp1qxfps1b6zgm');
define('LOGGED_IN_KEY',    'nn80lvbwh7zbtwfdfvbofffeneaq60ro8dxkcgfq7oucuotceerz2nzzfurvpjnd');
define('NONCE_KEY',        'yltqbmpptytk2m9nf1jdfwrxhym4adk9w3olwz5duzfltg7hbargehdsx0hoanv8');
define('AUTH_SALT',        'alzq7g7s0qmwcsks0jnooimtxxhum64bwd7qg5ls2d9vk68g9adi3d2dkpjm8jsm');
define('SECURE_AUTH_SALT', 'cewfbpu1qnigmc4ld0amjp8kgycmcqxykverjng97kw0orktsj3rouewkbmisgds');
define('LOGGED_IN_SALT',   'yfd7cebphsdbm86bqnbhpbgjkwa24q12h6tty6qfmtjyxgg5njrjfx6dhmfs6f4d');
define('NONCE_SALT',       'jiqkhn9ovoag4tec8ohh2inkiavqt6lfugctw13caxlod0rqf0fadrhiqy2wj7ts');
define('DISALLOW_FILE_MODS',true);

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nhk2_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
