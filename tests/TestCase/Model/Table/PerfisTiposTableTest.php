<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PerfisTiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PerfisTiposTable Test Case
 */
class PerfisTiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PerfisTiposTable
     */
    public $PerfisTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PerfisTipos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PerfisTipos') ? [] : ['className' => PerfisTiposTable::class];
        $this->PerfisTipos = TableRegistry::getTableLocator()->get('PerfisTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PerfisTipos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
