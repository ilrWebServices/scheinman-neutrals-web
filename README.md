# ILR Scheinman Roster of Neutrals Drupal Site

This site hosts the admin interface and data API for the Scheinman Roster of Neutrals.

## Setup

For local development, add something like the following to `web/sites/default/settings.local.php`:

```
<?php

$databases['default']['default'] = [
  'database' => 'YOUR_DATABASE_NAME',
  'username' => 'YOUR_USER_NAME',
  'password' => '',
  'prefix' => '',
  'collation' => 'utf8mb4_general_ci',
  'host' => 'localhost',
  'port' => '3306',
  'isolation_level' => 'READ COMMITTED',
  'driver' => 'mysql',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
];
```
