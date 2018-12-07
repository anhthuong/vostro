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
define('DB_NAME', 'wordpress_vostrodb2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'vT#s%$#r]3=s_+hWjDv_2^`dpN0/Am1p3tn7(sOH,q IsH|OBp[$*9*F0cSJ)9%j');
define('SECURE_AUTH_KEY',  'QDDo|8Ne[t`ijVwk*Q PF#gW5N5Pn#r!Po*yN#W)Ox2~Sht-% di_a-e0gJi;!z-');
define('LOGGED_IN_KEY',    'N1t_AvUi-su%Gk_/U]] K?~%zze%([wouW@,t?sU1@[xmly2V0P;xQ5Dw?Ft`0QZ');
define('NONCE_KEY',        'p],NI;Zi]3Gr0Snj}&R(8<l-BZpVTFhNow8U7-)d[_k$|%%T1.2yiL2_/=n,CqvI');
define('AUTH_SALT',        'nH(Ri+xE@>1R%]TF A<R1@RcM.Hj.72 ]&Va<X:Ne5;R.,GADnt(av/4RF]}m3lk');
define('SECURE_AUTH_SALT', 'W&hDt(sxf{,jwI%X3h/z-;e#Sf6.cBSR~,0,PyMu`pr!a2:txJJKfpaNu57yv09Y');
define('LOGGED_IN_SALT',   '8b8G?Y$kb c*CBS<X8}4fL4l#fDO(Mg5Z}T{%a1Lc,`[))hoEW{TEv00!rsiNLYo');
define('NONCE_SALT',       '1/jM:>[XS4f1O3ItlRd{=qm%:KU;g+QHS]/ZjX.2+J)xpxz`|!i9-OoY*Y84>G5]');

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
