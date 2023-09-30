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
define( 'DB_NAME', 'pruebatecnicamedellin' );

/** Database username */
define( 'DB_USER', 'david' );

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
define( 'AUTH_KEY',         '*#8Jv]M$}:=*aZ7>Eg/B;eY;sM`!+|<jhSvX~:1b/@I89J,JdXu}pAh;bo9gVZAL' );
define( 'SECURE_AUTH_KEY',  '_^?`*DBpJ^eh6Zx]pI87o->>$6b5#P$:z7mekSfR)j&R8d}SXv7QmdUiub$ph%J7' );
define( 'LOGGED_IN_KEY',    '#Q{%-`+Dc`JihV{$Kux,U~B_CK$I-UX8}McB*eOhH@N/)ZbGx#E3oZs=+%$,r1XQ' );
define( 'NONCE_KEY',        'f%Va1wxkF=0]&sZ7G##,k{bnu^L#?aOESOJ=1jpTrLglr_@KuC=Yqf8Q%RZ|Pck,' );
define( 'AUTH_SALT',        'yP@?69oc#+W(}Wx)tV+%37.HgUrm+(P(~Ug#{:q^v$)#P-V*&jIRJ!.xAw*I1A5c' );
define( 'SECURE_AUTH_SALT', 'JWhR>78Xs2Y,Y]#$BlZq@%n`S*6#?o#Xbv1)-@|f2S`lxOL,ror2Cw>t=^S6v[)9' );
define( 'LOGGED_IN_SALT',   ']#kYrDVz(lEMtMXuY[3JMyqh^hb@7m&G%/`|)RC?WQtAqB/*6#(_QpTUr~C*>rOx' );
define( 'NONCE_SALT',       '5PJSIm2yj/j${&vvuxc.a8~:]&b~BAwsD}ae.-zdRBTe6~qyKg6iMi@&MWR9A6d7' );

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
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
