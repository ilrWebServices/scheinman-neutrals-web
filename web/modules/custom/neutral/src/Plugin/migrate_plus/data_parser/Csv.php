<?php

declare(strict_types = 1);

namespace Drupal\neutral\Plugin\migrate_plus\data_parser;

use Drupal\migrate\MigrateException;
use Drupal\migrate_plus\DataParserPluginBase;

/**
 * Obtain CSV data for migration using the Symfony CSV serializer.
 *
 * @DataParser(
 *   id = "csv",
 *   title = @Translation("CSV")
 * )
 */
class Csv extends DataParserPluginBase {

  /**
   * {@inheritdoc}
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    protected ?\SplFileObject $file = null,
    protected array $headers = []
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  protected function openSourceUrl($url): bool {
    // Fetch the remote csv data into an \SplFileObject. Normally this is done
    // via $this->getDataFetcherPlugin()->getResponseContent($url), but in this
    // case we want to store the data in a stream to avoid loading it all into
    // memory.
    try {
      $this->file = new \SplFileObject($url, 'r');
      $this->file->setFlags(\SplFileObject::READ_CSV);
      $this->headers = $this->file->fgetcsv();
    } catch (\Exception $e) {
      throw new MigrateException($e->getMessage());
    }

    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  protected function fetchNextRow(): void {
    if ($this->file->eof()) {
      return;
    }

    $next_row = $this->file->fgetcsv();
    $current = array_combine($this->headers, $next_row);

    foreach ($this->fieldSelectors() as $field_name => $selector) {
      $this->currentItem[$field_name] = $current[$selector];
    }
  }

}
