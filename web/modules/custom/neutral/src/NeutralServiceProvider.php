<?php

namespace Drupal\neutral;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Drupal\Core\StackMiddleware\NegotiationMiddleware;

/**
 * Modifies various services (with caution).
 */
class NeutralServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    // Register the CSV mime type in http_middleware.negotiation.
    if ($container->has('http_middleware.negotiation') && is_a($container->getDefinition('http_middleware.negotiation')->getClass(), NegotiationMiddleware::class, TRUE)) {
      $container->getDefinition('http_middleware.negotiation')->addMethodCall('registerFormat', ['csv', ['text/csv']]);
    }
  }

}
