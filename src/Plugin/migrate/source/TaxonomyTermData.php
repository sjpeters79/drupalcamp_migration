<?php
namespace Drupal\drupalcamp_migration\Plugin\migrate\source;
use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;
/**
 * Source plugin for taxonomy content.
 *
 * @MigrateSource(
 *   id = "taxonomy_term_data"
 * )
 */
class TaxonomyTermData extends SqlBase {
  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('taxonomy_term_data', 't')
      ->fields('t',
      [
        'tid',
        'vid',
        'name',
        'description',
      ]
    );
    return $query;
  }
  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'tid' => $this->t('Term ID'),
      'vid' => $this->t('Vocabulary ID'),
      'name' => $this->t('Name'),
      'description' => $this->t('Description'),
      'parent_id' => $this->t('Parent ID'),
    ];
    return $fields;
  }
  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'tid' => [
        'type' => 'integer',
        'alias' => 't',
      ],
    ];
  }
  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    // Taxonomy vocabularies brought in statically for dependency reasons with
    // field configs yet we still need some internal mappings for subsequent
    // db migration to work based on old vid key.
    $vid = '';
    switch ($row->getSourceProperty('vid')) {
      case 1:
        $vid = 'tags';
        break;
      default:
        $vid = 'tags';
    }
    // Parent ID Term.
    $parent_id = $this->select('taxonomy_term_hierarchy', 'th')
      ->fields('th', ['parent'])
      ->condition('tid', $row->getSourceProperty('tid'))
      ->execute()
      ->fetchCol();

    $row->setSourceProperty('vid', $vid);
    $row->setSourceProperty('parent_id', $parent_id[0]);
    return parent::prepareRow($row);
  }
}
