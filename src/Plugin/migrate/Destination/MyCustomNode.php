<?php

namespace Drupal\drupalcamp_migration\Plugin\migrate\destination;

use Drupal\Core\Entity\Entity;
use Drupal\migrate\Plugin\migrate\destination\EntityContentBase;
use Drupal\migrate\Plugin\MigrationInterface;
use Drupal\migrate\Row;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Destination plugin for my_custom_node type.
 *
 * @MigrateDestination(
 *   id = "my_custom_node"
 * )
 */
class MyCustomNode extends EntityContentBase {

  /**
   * Declare entity type to be node.
   *
   * @var entityType
   */
  public static $entityType = 'node';

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition, MigrationInterface $migration = NULL) {
    return parent::create($container, $configuration, 'entity:' . static::$entityType, $plugin_definition, $migration);
  }

  /**
   * {@inheritdoc}
   */
  public function import(Row $row, array $old_destination_id_values = array()) {
    // Add custom code here, if needed.
    return parent::import($row, $old_destination_id_values);
  }

}
