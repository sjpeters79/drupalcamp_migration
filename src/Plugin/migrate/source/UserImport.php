<?php
namespace Drupal\drupalcamp_migration\Plugin\migrate\source;
use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;
/**
 * Source plugin for user_import content.
 *
 * @MigrateSource(
 *   id = "user_import"
 * )
 */
class UserImport extends SqlBase {
  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('users', 'u')
      ->fields('u',
      [
        'uid',
        'name',
        'pass',
        'mail',
        'created',
        'access',
        'login',
        'status',
        'timezone',
        'language',
        'init',
      ]
    );
    return $query;
  }
  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'uid' => $this->t('User ID'),
      'name' => $this->t('Name'),
      'pass' => $this->t('Pass'),
      'mail' => $this->t('Mail'),
      'created' => $this->t('Created'),
      'access' => $this->t('Access'),
      'login' => $this->t('Login'),
      'status' => $this->t('Status'),
      'timezone' => $this->t('Timezone'),
      'language' => $this->t('Language'),
      'init' => $this->t('Init'),
    ];
    return $fields;
  }
  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'uid' => [
        'type' => 'integer',
        'alias' => 'u',
      ],
    ];
  }
  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    return parent::prepareRow($row);
  }
}
