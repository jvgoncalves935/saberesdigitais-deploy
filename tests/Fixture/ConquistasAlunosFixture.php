<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConquistasAlunosFixture
 */
class ConquistasAlunosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Cpf' => ['type' => 'string', 'length' => 11, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ConquistaID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_cpf_alunos_conquistas' => ['type' => 'index', 'columns' => ['Cpf'], 'length' => []],
            'FK_cod_alunos_conquistas' => ['type' => 'index', 'columns' => ['ConquistaID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ID'], 'length' => []],
            'FK_cod_alunos_conquistas' => ['type' => 'foreign', 'columns' => ['ConquistaID'], 'references' => ['conquistas', 'ConquistaID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_cpf_alunos_conquistas' => ['type' => 'foreign', 'columns' => ['Cpf'], 'references' => ['alunos', 'CpfAluno'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'ID' => 1,
                'Cpf' => 'Lorem ips',
                'ConquistaID' => 1
            ],
        ];
        parent::init();
    }
}
