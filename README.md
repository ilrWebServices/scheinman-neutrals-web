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

// Force the use of SMTP for local development.
$config['system.mail']['interface'] = [
  'default' => 'symfony_mailer',
];

// These are the settings for Mailpit/Mailhog.
$config['system.mail']['mailer_dsn'] = [
  'scheme' => 'smtp',
  'host' => 'localhost',
  'port' => 1025,
  'user' => '',
  'password' => '',
];

// Enable the config split for development-only modules, like field_ui.
$config['config_split.config_split.dev']['status'] = TRUE;
```

