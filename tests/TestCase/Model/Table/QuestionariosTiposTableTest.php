<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionariosTiposTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionariosTiposTable Test Case
 */
class QuestionariosTiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionariosTiposTable
     */
    public $QuestionariosTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.QuestionariosTipos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('QuestionariosTipos') ? [] : ['className' => QuestionariosTiposTable::class];
        $this->QuestionariosTipos = TableRegistry::getTableLocator()->get('QuestionariosTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QuestionariosTipos);

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
