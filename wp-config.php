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
define( 'DB_NAME', 'dev-wp' );

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
define( 'AUTH_KEY',         '@j`Pa|Ld0?V4B;h4`>.d>`1mw6az&Wf1jC5!UfC}*eP0H_6M*aWD(KtDa9OrT2N*' );
define( 'SECURE_AUTH_KEY',  '?DPyUjsb$Fs$ uIGfr}r%Q$W7Mj)*i8P.zp]&Tk$k3dI*uorOf[xy +ZA^Uf4*:S' );
define( 'LOGGED_IN_KEY',    'M6X.OUqM!_h=2KA/ )p%.<`|]@aE>Ieyq.A/s/CQB.)Z@Z^ms _(e*!?zNsyC,~e' );
define( 'NONCE_KEY',        '@-5N/0wVUcF7_)| XJ~?U+,0)5gs_W9-cGxfcZz|2,3@F-<tGupQHe!(ibmr4*&`' );
define( 'AUTH_SALT',        '#`nRp*^,c,yXc1c60hc()6!%w_163dqS>8g*;>r{ wp#HRZX4n/v-Bp>AJ^4HD@7' );
define( 'SECURE_AUTH_SALT', '@m!(kzIxE~,Em5w7;S.H99_NK~B98`C@fw(LNa_l/g{zK{DELX99:,9c8NLY6U_8' );
define( 'LOGGED_IN_SALT',   'Or:r;+;oX.Zb)/=]%a&bP9}[|yc{2pV2qc:o kf*#n;b!YRb=40-BcfzVV,s{l0H' );
define( 'NONCE_SALT',       '[:z?N?uYIZc:cSrX4SII2]xd)p3vl];pY0<&o$FSorEXsk5%_ab8r)4S#zUTC>S_' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
