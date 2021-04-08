<?php
declare(strict_types=1);

namespace Locatable\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Locatable\Model\Table\GpsTable;

/**
 * Locatable\Model\Table\GpsTable Test Case
 */
class GpsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Locatable\Model\Table\GpsTable
     */
    protected $Gps;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Gps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Gps') ? [] : ['className' => GpsTable::class];
        $this->Gps = $this->getTableLocator()->get('Gps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Gps);

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
