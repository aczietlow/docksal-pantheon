<?php
/**
 * @file
 * Drupal settings file specific to docksal.
 */

# Docksal DB connection settings.
$databases['default']['default'] = array (
  'database' => 'default',
  'username' => 'user',
  'password' => 'user',
  'host' => 'db',
  'driver' => 'mysql',
);

# File system settings.
$conf['file_temporary_path'] = '/tmp';
# Workaround for permission issues with NFS shares
$conf['file_chmod_directory'] = 0777;
$conf['file_chmod_file'] = 0666;

# Reverse proxy configuration (Docksal vhost-proxy)
if (!drupal_is_cli()) {
  $conf['reverse_proxy'] = TRUE;
  $conf['reverse_proxy_addresses'] = array($_SERVER['REMOTE_ADDR']);
  // HTTPS behind reverse-proxy
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

//Rackspace Cloudfiles variables
$conf['rackspace_cloud_cdn_domain'] = '326d036eb354775f82f0-39c4958e2e3ace883a8062380f5f9f2f.r71.cf1.rackcdn.com';
$conf['rackspace_cloud_cdn_ssl_domain'] = '5a1cfe6b98d197fd5f6d-39c4958e2e3ace883a8062380f5f9f2f.ssl.cf1.rackcdn.com';
$conf['rackspace_cloud_container'] = 'DixonValveCMSDev';

//Mail redirect rules
$conf['mg_mail_redirect_domain'] = 'dixon.mindgrub.com';

$conf['recaptcha_public_key'] = '6LeTf-ASAAAAAGRxAELSNiXaXBjswM1eg_xayNDy';
$conf['recaptcha_private_key'] = '6LeTf-ASAAAAAMycb042ImDD0LUufNk1dYqZsBvR';

$conf['dixon_dds_username'] = 'Mindgrub';
$conf['dixon_dds_password'] = 'PUKwWhABxbV8';
$conf['dixon_dds_priceandavailability_test_enabled'] = TRUE;
$conf['dixon_dds_order_url'] = 'https://72.45.50.215:5090/MindgrubTest';
$conf['dixon_dds_wsdl_location'] = 'http://omt.dixonvalve.com/CustomerSiteDev.v2.wsdl';

$conf['error_reporting'] = 2;

$conf['googleanalytics_account'] = 'UA-45061304-2';

$conf['securepages_enable'] = 0;

$conf['sandbox_bypass_dan_validation'] = TRUE;

$conf['stage_file_proxy_origin'] = 'https://test-dixon-ecommerce.pantheonsite.io';
$conf['stage_file_proxy_origin_dir'] = 'sites/default/files';

// Don't cache products locally.
$conf['commerce_entitycache_cache_products'] = FALSE;

// Fix the domain switcher for local dev.
$conf['dixon_domains_base_url_portion'] = 'dixon.docksal';