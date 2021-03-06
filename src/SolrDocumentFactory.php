<?php

namespace Drupal\search_api_solr_datasource;

use Drupal\Core\TypedData\TypedDataManagerInterface;
use Drupal\search_api\Item\ItemInterface;

/**
 * Defines a class for a Solr Document factory.
 */
class SolrDocumentFactory implements SolrDocumentFactoryInterface {

  /**
   * A typed data manager.
   *
   * @var \Drupal\Core\TypedData\TypedDataManagerInterface
   */
  protected $typedDataManager;

  /**
   * Constructs a SolrDocumentFactory object.
   *
   * @param \Drupal\Core\TypedData\TypedDataManagerInterface $typedDataManager
   *   A typed data manager.
   */
  public function __construct(TypedDataManagerInterface $typedDataManager) {
    $this->typedDataManager = $typedDataManager;
  }

  /**
   * {@inheritdoc}
   */
  public function create(ItemInterface $item) {
    $plugin = $this->typedDataManager->getDefinition('solr_document')['class'];
    return $plugin::createFromItem($item);
  }

}
