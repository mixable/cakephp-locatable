<?php
declare(strict_types=1);

namespace Locatable\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Locatable\Model\Table\CoordinatesTable;

/**
 * Locatable\Model\Table\CoordinatesTable Test Case
 */
class CoordinatesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Locatable\Model\Table\CoordinatesTable
     */
    protected $Coordinates;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Coordinates',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Coordinates') ? [] : ['className' => CoordinatesTable::class];
        $this->Coordinates = $this->getTableLocator()->get('Coordinates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Coordinates);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
