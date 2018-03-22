<?php

$databases['default']['default'] = array(
  'driver' => 'mysql',
  'database' => '',
  'username' => '',
  'password' => '',
  'host' => 'localhost',
  'prefix' => '',
);

// Workaround for permission issues with NFS shares.
$conf['file_chmod_directory'] = 0777;
$conf['file_chmod_file'] = 0666;

// Reverse proxy configuration (Docksal vhost-proxy).
if (!drupal_is_cli()) {
  $conf['reverse_proxy'] = TRUE;
  $conf['reverse_proxy_addresses'] = array($_SERVER['REMOTE_ADDR']);
  // HTTPS behind reverse-proxy.
  if (
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' &&
    !empty($conf['reverse_proxy']) && in_array($_SERVER['REMOTE_ADDR'], $conf['reverse_proxy_addresses'])
  ) {
    $_SERVER['HTTPS'] = 'on';
    // This is hardcoded because there is no header specifying the original port.
    $_SERVER['SERVER_PORT'] = 443;
  }
}

include_once('./includes/cache.inc');

// Rackspace Cloudfiles variables.
$conf['rackspace_cloud_cdn_domain'] = '326d036eb354775f82f0-39c4958e2e3ace883a8062380f5f9f2f.r71.cf1.rackcdn.com';
$conf['rackspace_cloud_cdn_ssl_domain'] = '5a1cfe6b98d197fd5f6d-39c4958e2e3ace883a8062380f5f9f2f.ssl.cf1.rackcdn.com';
$conf['rackspace_cloud_container'] = 'DixonValveCMSDev';

// Mail redirect rules.
$conf['mg_mail_redirect_domain'] = 'dixon.mindgrub.com';
$conf['dixon_newsletter_signup_to_email'] = 'bthompson@mindgrub.com';
$conf['dixon_publication_subscription_signup_to_email'] = 'bthompson@mindgrub.com';

// Dev version of product 3rd party services.
$conf['dixon_dds_order_url'] = 'https://72.45.50.215:5090/MindgrubTest';
$conf['dixon_dds_order_url'] = 'https://72.45.50.215:5090/MindgrubTest';
$conf['dixon_dds_password'] = 'PUKwWhABxbV8';
$conf['dixon_dds_priceandavailability_test_enabled'] = TRUE;
$conf['dixon_dds_username'] = 'Mindgrub';
$conf['dixon_dds_wsdl_location'] = 'http://omt.dixonvalve.com/CustomerSiteDev.v2.wsdl';
$conf['dixon_pronto_api_url'] = 'http://dixon@mindgrub.com:L=lj2f*3j@http://dixonvalve-test.prontoavenue.biz/api/json/';
$conf['googleanalytics_account'] = 'UA-45061304-2';
$conf['recaptcha_private_key'] = '6LeTf-ASAAAAAMycb042ImDD0LUufNk1dYqZsBvR';
$conf['recaptcha_public_key'] = '6LeTf-ASAAAAAGRxAELSNiXaXBjswM1eg_xayNDy';

// Development configuration.
$conf['error_reporting'] = 2;
$conf['securepages_enable'] = 0;
$conf['sandbox_bypass_dan_validation'] = TRUE;

$conf['stage_file_proxy_origin'] = 'https://mgtest:oafzMVn32SbKsj0arT2PvZyihuX2GUfS@testmg-cms.dixonvalve.com';
$conf['stage_file_proxy_origin_dir'] = 'sites/default/files';

// Redis settings.
$conf['redis_client_interface'] = 'PhpRedis';
$conf['redis_client_host'] = 'redis';

$conf['lock_inc'] = 'sites/all/modules/contrib/redis/redis.lock.inc';
$conf['path_inc'] = 'sites/all/modules/contrib/redis/redis.path.inc';
$conf['cache_backends'][] = 'sites/all/modules/contrib/redis/redis.autoload.inc';
$conf['cache_default_class'] = 'Redis_Cache';
$conf['cache_prefix'] = ['default' => 'dixon-redis'];

// Do not use Redis for cache_form (no performance difference).
$conf['cache_class_cache_form'] = 'DrupalDatabaseCache';

// Rely on the external cache for page caching.
$conf['cache_class_cache_page'] = 'DrupalFakeCache';
