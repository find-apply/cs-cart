<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

if (!defined('BOOTSTRAP')) { die('Access denied'); }

/**
 * This file can be used to override parameters defined in config.php.
 *
 * Use this file to set custom settings that should be preserved during system updates.
 * All parameters specified here will take precedence over those in config.php.
 *
 * Example:
 * $config['db_host'] = 'localhost';
 * $config['cache_backend'] = 'redis';
 */

/*
 * Database connection options
 */
$config['db_host'] = '%DB_HOST%';
$config['db_name'] = '%DB_NAME%';
$config['db_user'] = '%DB_USER%';
$config['db_password'] = '%DB_PASSWORD%';

$config['database_backend'] = 'mysqli';

// Database tables prefix
$config['table_prefix'] = 'cscart_';

/*
 * Script location options
 *
 *	Example:
 *	Your url is http://www.yourcompany.com/store/cart
 *	$config['http_host'] = 'www.yourcompany.com';
 *	$config['http_path'] = '/store/cart';
 *
 *	Your secure url is https://secure.yourcompany.com/secure_dir/cart
 *	$config['https_host'] = 'secure.yourcompany.com';
 *	$config['https_path'] = '/secure_dir/cart';
 *
 */

// Host and directory where software is installed on no-secure server
$config['http_host'] = '%HTTP_HOST%';
$config['http_path'] = '%HOST_DIR%';

// Host and directory where software is installed on secure server
$config['https_host'] = '%HTTPS_HOST%';
$config['https_path'] = '%HOST_DIR%';

/*
 * Misc options
 */
// Names of index files for the backend
// For security reasons, change these values and the file names themselves.
$config['admin_index']  = 'admin.php';
$config['vendor_index'] = 'vendor.php';

// Tweaks
// Whether to remove any javascript code from description and name of product, category, etc.
// Auto - false for ULT, true for MVE.
$config['tweaks']['sanitize_user_html'] = 'auto';
$config['tweaks']['anti_csrf'] = true; // protect forms from CSRF attacks
$config['tweaks']['disable_block_cache'] = false; // used to disable block cache
$config['tweaks']['disable_localizations'] = true; // Disable Localizations functionality
$config['tweaks']['disable_dhtml'] = false; // Disable Ajax-based pagination and Ajax-based "Add to cart" button
$config['tweaks']['do_not_apply_promotions_on_order_update'] = true; // If true, the promotions that applied to the order won't be changed when editing the order. New promotions won't be applied to the order.
$config['tweaks']['dev_js'] = false; // set to true to disable js files compilation
$config['tweaks']['redirect_to_cart'] = false; // Redirect customer to the cart contents page. Used with the "disable_dhtml" setting.
$config['tweaks']['api_https_only'] = false; // Allows the use the API functionality only by the HTTPS protocol
$config['tweaks']['api_allow_customer'] = false; // Allow open API for unauthorized customers
$config['tweaks']['lazy_thumbnails'] = false; // generate image thumbnails on the fly
$config['tweaks']['image_resize_lib'] = 'auto'; // library to resize images - "auto", "gd" or "imagick"
$config['tweaks']['products_found_rows_no_cache_limit'] = 100; // Max count of SQL found rows without saving to cache
$config['tweaks']['show_database_changes'] = false; // Show database changes in View changes tool
$config['tweaks']['backup_db_mysqldump'] = false; // Backup database using mysqldump when available
$config['tweaks']['allow_product_filters_to_create_temporary_table'] = true; // Allows product filters to create temporary table for products query
$config['tweaks']['request_errors_threshold'] = 30; // Threshold for the number of errors when an email realtime delivery error notification is triggered
$config['tweaks']['profile_field_max_upload_filesize'] = '10M'; //Limit max upload file size for profile fields
$config['tweaks']['validate_menu'] = true; // Disable option to add any new element to top and central admin panel menu and to Add-ons top menu element.
$config['tweaks']['secure_cookies'] = true; // Allow to set "Secure" flag to cookies, if your store works with HTTPS. P.S. All users will be log out, also, all abandoned carts will lost.
$config['tweaks']['cors_allowlist'] = []; // CORS enabled domains, e.g. ['domain1.com', 'domain2.com']
$config['tweaks']['csp_frame_ancestors'] = []; // The HTTP Content-Security-Policy (CSP) frame-ancestors directive specifies valid parents that may embed a page using <frame>, <iframe>, <object>, <embed>, or <applet>.
$config['tweaks']['allow_global_individual_settings'] = true; // Allow global individual settings (Track inventory, Options type, Zero price action etc.)
$config['tweaks']['show_marketplace_logs'] = false; // Allow to show logs of all requests to marketplace
$config['tweaks']['disable_resource_preloading'] = false; // Allows to disable resource preloading for the theme
$config['tweaks']['max_fonts_to_preload'] = 1; // Maximum amount of fonts to preload
$config['tweaks']['show_helpdesk_logs'] = false; // Allows showing logs of all requests to Help Desk service
$config['tweaks']['download_upgrade_package_timeout'] = 180; // Allows changing timeout for upgrade package download if server has low download speed
$config['tweaks']['logo_max_upload_filesize_in_bytes'] = 1048576; // Limit max upload filesize for application logos

// Key for sensitive data encryption
$config['crypt_key'] = 'YOURVERYSECRETKEY';

// Cache backend
// Available backends: file, sqlite, database, redis, xcache, apc, apcu
// To use sqlite cache the "sqlite3" PHP module should be installed
// To use xcache cache the "xcache" PHP module should be installed
// To use apc cache the "apc" PHP module should be installed
// To use apcu cache the PHP version should be >= 7.x and the "apcu" PHP module should be installed
$config['cache_backend'] = 'file';
$config['cache_redis_server'] = 'localhost';
$config['cache_redis_global_ttl'] = 0; // set this if your cache size reaches Redis server memory size

// Storage backend for sessions. Available backends: database, redis
$config['session_backend'] = 'database';
$config['session_redis_server'] = 'localhost';
$config['cache_apc_global_ttl'] = 0;
$config['cache_xcache_global_ttl'] = 0;

// Lock backend
// Available backends: database, redis, dummy
// To disable locks use dummy provider
$config['lock_backend'] = 'database';
$config['lock_redis_server'] = 'localhost';
$config['lock_redis_server_password'] = null;

// Set to unique store prefix if you use the same Redis/Xcache/Apc storage
// for several cart installations
$config['store_prefix'] = '';

// CDN server backend
$config['cdn_backend'] = 'cloudfront';

// Developer configuration file
if (file_exists(DIR_ROOT . '/local_conf.php')) {
    include_once(DIR_ROOT . '/local_conf.php');
}

// Enable DEV mode if Product status is not empty (like Beta1, dev, etc.)
if (PRODUCT_STATUS != '' && !defined('DEVELOPMENT')) {
    ini_set('display_errors', 'on');
    ini_set('display_startup_errors', true);

    define('DEVELOPMENT', true);
}
