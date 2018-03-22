<?php
  $databases['default']['default'] = array(
    'driver' => 'mysql',
    'database' => 'migrate_spd',
    'username' => 'root',
    'password' => 'root',
    'host' => 'localhost',
    'port' => '3306',
  );


// Require WWW.
if (isset($_SERVER['PANTHEON_ENVIRONMENT']) && 
  $_SERVER['PANTHEON_ENVIRONMENT'] === 'live') {
  if ($_SERVER['HTTP_HOST'] == 'spyderbytedesign.com' || 
      $_SERVER['HTTP_HOST'] == 'live-spyder-byte-design.gotpantheon.com') {
    header('HTTP/1.0 301 Moved Permanently'); 
    header('Location: http://www.spyderbytedesign.com'. $_SERVER['REQUEST_URI']); 
    exit();
  }
}

$local_settings = dirname(__FILE__) . '/settings.local.php';
if (file_exists($local_settings)) {
  include $local_settings;
}