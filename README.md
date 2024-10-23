# ILR Scheinman Roster of Neutrals Drupal Site

This site hosts the admin interface and data API for the Scheinman Roster of Neutrals.

## Entity structure

### User account

They can create a single Neutral page, and they can edit their own Neutral.

Some accounts can have a `neutral admin` role, which can edit _any_ Neutral page.

### Neutral

Display of information, similar to a resume, for a Neutral, which is a type of mediator.

This is represented by a `neutral` node type, which might be labeled 'Neutral resume page'.

### Roster

A listing of Neutral resumes. This will also have a CSV display for use as a migration source for the marketing site.

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

