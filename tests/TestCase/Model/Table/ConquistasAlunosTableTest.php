<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConquistasAlunosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConquistasAlunosTable Test Case
 */
class ConquistasAlunosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConquistasAlunosTable
     */
    public $ConquistasAlunos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ConquistasAlunos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ConquistasAlunos') ? [] : ['className' => ConquistasAlunosTable::class];
        $this->ConquistasAlunos = TableRegistry::getTableLocator()->get('ConquistasAlunos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ConquistasAlunos);

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
