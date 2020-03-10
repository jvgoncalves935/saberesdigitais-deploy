<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SolicitacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SolicitacoesTable Test Case
 */
class SolicitacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SolicitacoesTable
     */
    public $Solicitacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Solicitacoes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Solicitacoes') ? [] : ['className' => SolicitacoesTable::class];
        $this->Solicitacoes = TableRegistry::getTableLocator()->get('Solicitacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Solicitacoes);

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
