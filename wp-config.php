<?php

define( 'DISALLOW_FILE_EDIT', true );

define( 'BWPS_FILECHECK', true );

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
define('DB_NAME', 'koojarewon');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '[v%Kz)`2!7fbLe(#jn^dE_/~9_k^cNClew]DDHl]@*E$PZ)AsbrKbfkK^=#Yn{>q');
define('SECURE_AUTH_KEY',  'U8`G;g6bs|!.QXj!!m1a$C2xLM{T?.HU2~;Y$dst_szpKZ6iv6PmoDNRj30T0vd{');
define('LOGGED_IN_KEY',    'GgshN~/%XA9+Jv:RnQlz>l t-<|/U;,LjW s3apbmC{;ii*X4+yXElr5ecdd3)<0');
define('NONCE_KEY',        '6e]A |%%PJi+Z0;Q&Y)2XT1+NTQ5~*7LO|nF[)1Np{EwX6xGa;`%|&cQPEi|TwPi');
define('AUTH_SALT',        'K?5W#CL)`{9>.pV#~&LyS*BF0^Ha&Q+cu?Vot-d1ph|,PmDN.iohT /7wGXLNL5Q');
define('SECURE_AUTH_SALT', 'AY;~sn;o!9s?M0t//%fE8h^kp17>E1hHCm[$St9GK<CVQ52kxfZ2*~*g/KVF7Xm$');
define('LOGGED_IN_SALT',   'wsBc|wB7Yv1l7Adqc~1Ty]Aw=}P7Ge`mJpsW$E`z G~m]TxRk3a|dIa6(&GZcCwa');
define('NONCE_SALT',       'qiU!*[  :^{]xK$YU-]ielF%;3fi`YPL;od!q4N~4azUyy&<+0_4T[ymp *CY4M_');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'q63nw0m7my_';

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
