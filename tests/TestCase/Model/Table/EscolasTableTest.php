<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EscolasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EscolasTable Test Case
 */
class EscolasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EscolasTable
     */
    public $Escolas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Escolas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Escolas') ? [] : ['className' => EscolasTable::class];
        $this->Escolas = TableRegistry::getTableLocator()->get('Escolas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Escolas);

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
