<?php
# Database Configuration
define( 'DB_NAME', 'wp_slstaffing' );
define( 'DB_USER', 'slstaffing' );
define( 'DB_PASSWORD', 'gyg8EujhlYerMc3tus5m' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', 'utf8_unicode_ci' );
$table_prefix = 'ps_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '>@-B?2N+7-V:kp|2&&zu_{M9Nn*&+{VP j4rLgTsjqrvp$VQP6hKCrS0x_6F89]H');
define('SECURE_AUTH_KEY',  'i2J+Q:U1x|<_I}1%6^&i6(L$nitW|R/6|i#UJR%I0<Y)L 8,OFq/2e}C-$[2#~?]');
define('LOGGED_IN_KEY',    '3cR$[bT*[ZZH#m+%$K|OoH*};}2dbI!rdZ+9y=MQj{cXhqUNwz||NpXb>|E61Y,g');
define('NONCE_KEY',        '6a5: X@zvT_IpMklW=#`WAweF*;a^;+Ho0]m4D2&a94Z:o7*Z$0kR*A$cE6OXNCC');
define('AUTH_SALT',        'L@k%gOuyI?4$Mq[=H~O7oI~r,3s!2VTmeD|Z`!@Kwb<v(am:+TZwp_0dVv F0,^r');
define('SECURE_AUTH_SALT', 'E4#8g+r(v8A0ObuzA[Q?Cz!6y9{vK0$@u-p>vE%&d{Et{@MXc8#j@R;J}wA-O=YZ');
define('LOGGED_IN_SALT',   'I_)pvgW{Cfw{oG>aB)!/2Lp^DQz/?*.Z-3mTZj(D^0ItYc.SxFJZm;vPY)Hb$]qp');
define('NONCE_SALT',       '3!zsQikEP?07uH-F*oxAf8CY`e8AjxH{Om4.Gq3!|qjzNty5Vqe]NwN1fo?C0g?W');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'slstaffing' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '25069cb61fd4907b024f7b52b3f61c72a91b4718' );

define( 'WPE_CLUSTER_ID', '140232' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', true );

define( 'FORCE_SSL_LOGIN', true );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'mystaffing.agency', 1 => 'www.slstaffinginc.com', 2 => 'slstaffinginc.com', 3 => 'slstaffing.wpengine.com', 4 => 'www.mystaffing.agency', );

$wpe_varnish_servers=array ( 0 => 'pod-140232', );

$wpe_special_ips=array ( 0 => '35.231.65.124', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings




# That's It. Pencils down
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');





define('WP_DEBUG', true);

define('WP_DEBUG_DISPLAY', true );

















?>
