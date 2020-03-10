<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlunosFixture
 */
class AlunosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'CpfAluno' => ['type' => 'string', 'length' => 11, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'CpfTutor' => ['type' => 'string', 'length' => 11, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'EscolaID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Level' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'EXPTotal' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_cpf_alunos' => ['type' => 'index', 'columns' => ['CpfAluno'], 'length' => []],
            'FK_cpf_tutores_alunos' => ['type' => 'index', 'columns' => ['CpfTutor'], 'length' => []],
            'FK_codigo_escola_alunos' => ['type' => 'index', 'columns' => ['EscolaID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ID'], 'length' => []],
            'FK_codigo_escola_alunos' => ['type' => 'foreign', 'columns' => ['EscolaID'], 'references' => ['escolas', 'EscolaID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_cpf_alunos' => ['type' => 'foreign', 'columns' => ['CpfAluno'], 'references' => ['usuarios', 'Cpf'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_cpf_tutores_alunos' => ['type' => 'foreign', 'columns' => ['CpfTutor'], 'references' => ['tutores', 'Cpf'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'CpfAluno' => 'Lorem ips',
                'CpfTutor' => 'Lorem ips',
                'EscolaID' => 1,
                'Level' => 1,
                'EXPTotal' => 1
            ],
        ];
        parent::init();
    }
}
