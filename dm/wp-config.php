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
define( 'DB_NAME', 'y7cej4f2_wp184' );

/** MySQL database username */
define( 'DB_USER', 'y7cej4f2_wp184' );

/** MySQL database password */
define( 'DB_PASSWORD', 'S][5xXpU84' );

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
define( 'AUTH_KEY',         'ulr2f89kbmxmfqbzny10es8rp2xronqw79m076yhr4xgkfxm1c6rp4fvgslnedyk' );
define( 'SECURE_AUTH_KEY',  'jcyimrbhszwj3cfyvvq4oazsjb6ftg7i9xdfja1dugp5cfhpvjbjtpjmpbemf5tj' );
define( 'LOGGED_IN_KEY',    'btrmozlkvapwbgmon5x7werpzkshqrcnpyfp5lxwqv6pxxuon3cmxadutgenx7oz' );
define( 'NONCE_KEY',        'rfvjy1ivlvhecatlnqdzntov8dniw7fb6scyine1v0vbzslm0zfqbxrzuo2ugwrk' );
define( 'AUTH_SALT',        'uadaab6as1yfjatelgidf5ynndoeybaibzs7pe7hsagp7s6mdq0nej1xrzlcnqae' );
define( 'SECURE_AUTH_SALT', 'buvsvdt0fhv1sml3zjkdbfsznhcmpfzgvrdkmrpjzzvzqinjmxmihrxql7wruupg' );
define( 'LOGGED_IN_SALT',   'brarkmw50chlzmblbupvyip0vqmemqmrrydq7gtdpom3r7ptbtz9hctqxcc3ylp0' );
define( 'NONCE_SALT',       'whupybrmwcxep8su1mycbdkvnqsg0dgwrlk51pmp3qocfljgujto7ii44rpbokxa' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpau_';

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
