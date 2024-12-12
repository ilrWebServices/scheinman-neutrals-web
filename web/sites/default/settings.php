<?php
/**
 * @file
 * Platform.sh example settings.php file for Drupal 11.
 */

// Default Drupal settings.
//
// These are already explained with detailed comments in Drupal's
// default.settings.php file.
//
// See https://api.drupal.org/api/drupal/sites!default!default.settings.php/10
$databases['default']['default'] = [
  'database' => '../data/scheinman_neutrals.sqlite',
  'driver' => 'sqlite',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\sqlite',
  'prefix' => '',
];

$config_directories = [];
$settings['update_free_access'] = FALSE;
$settings['container_yamls'][] = $app_root . '/' . $site_path . '/services.yml';
$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];
// @see https://www.drupal.org/node/3177901
$settings['state_cache'] = TRUE;

// The hash_salt should be a unique random value for each application.
// If left unset, the settings.platformsh.php file will attempt to provide one.
// You can also provide a specific value here if you prefer and it will be used
// instead. In most cases it's best to leave this blank on Platform.sh. You
// can configure a separate hash_salt in your settings.local.php file for
// local development.
$settings['hash_salt'] = 'L927zoxLPI0jjOX4T9TD9kLYovWTgepw07zJFL2lbGjrfoHLhi7SF94dydr8o1AOlPOJn7LBvA';

// Automatic Platform.sh settings.
if (file_exists($app_root . '/' . $site_path . '/settings.platformsh.php')) {
  include $app_root . '/' . $site_path . '/settings.platformsh.php';
}

// Local settings. These come last so that they can override anything.
if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
  include $app_root . '/' . $site_path . '/settings.local.php';
}
