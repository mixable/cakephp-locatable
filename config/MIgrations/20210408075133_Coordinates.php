<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Coordinates extends AbstractMigration
{
    /**
     * Up Method.
     *
     * @return void
     */
    public function up()
    {
        $this->table('coordinates')
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('model', 'string', [
                'default' => null,
                'limit' => 128,
                'null' => true,
            ])
            ->addColumn('latitude', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 7,
            ])
            ->addColumn('longitude', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 7,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    /**
     * @return void
     */
    public function down()
    {
        $this->dropTable('coordinates');
    }
}
