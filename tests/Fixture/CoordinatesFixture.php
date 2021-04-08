<?php
declare(strict_types=1);

namespace Locatable\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoordinatesFixture
 */
class CoordinatesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'foreign_key' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'model' => ['type' => 'string', 'length' => 128, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'latitude' => ['type' => 'decimal', 'length' => 10, 'precision' => 7, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'longitude' => ['type' => 'decimal', 'length' => 10, 'precision' => 7, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'foreign_key' => 1,
                'model' => 'Lorem ipsum dolor sit amet',
                'latitude' => 1.5,
                'longitude' => 1.5,
                'created' => '2021-04-08 08:29:30',
                'modified' => '2021-04-08 08:29:30',
            ],
        ];
        parent::init();
    }
}
