<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MateriasCursosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MateriasCursosTable Test Case
 */
class MateriasCursosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MateriasCursosTable
     */
    public $MateriasCursos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MateriasCursos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MateriasCursos') ? [] : ['className' => MateriasCursosTable::class];
        $this->MateriasCursos = TableRegistry::getTableLocator()->get('MateriasCursos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MateriasCursos);

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
