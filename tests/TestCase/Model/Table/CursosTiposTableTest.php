<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CursosTiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CursosTiposTable Test Case
 */
class CursosTiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CursosTiposTable
     */
    public $CursosTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CursosTipos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CursosTipos') ? [] : ['className' => CursosTiposTable::class];
        $this->CursosTipos = TableRegistry::getTableLocator()->get('CursosTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CursosTipos);

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
