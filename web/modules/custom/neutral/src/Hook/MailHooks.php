<?php

namespace Drupal\neutral\Hook;

use Drupal\Core\Hook\Attribute\Hook;

class MailHooks {

  #[Hook('mail_alter')]
  public function mailAlter(&$message) {
    // When sending via Campaign Monitor transactional email, this helps with
    // reporting. See
    // https://help.campaignmonitor.com/classic-transactional-emails#group-smtp
    $message['headers']['X-Cmail-GroupName'] = \Drupal::config('system.site')->get('name');

    // Disable Campaign Monitor transactional email tracking features.
    $message['headers']['X-Cmail-TrackOpens'] = 'false';
    $message['headers']['X-Cmail-TrackClicks'] = 'false';
  }

}
