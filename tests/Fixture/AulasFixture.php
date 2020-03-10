<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AulasFixture
 */
class AulasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Cpf' => ['type' => 'string', 'length' => 11, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'MateriaID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Pergunta01' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Pergunta02' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Pergunta03' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_cod_aluno_aulas' => ['type' => 'index', 'columns' => ['Cpf'], 'length' => []],
            'FK_cod_materias_aulas' => ['type' => 'index', 'columns' => ['MateriaID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ID'], 'length' => []],
            'FK_cod_aluno_aulas' => ['type' => 'foreign', 'columns' => ['Cpf'], 'references' => ['alunos', 'CpfAluno'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_cod_materias_aulas' => ['type' => 'foreign', 'columns' => ['MateriaID'], 'references' => ['materias', 'MateriaID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'MateriaID' => 1,
                'Pergunta01' => 1,
                'Pergunta02' => 1,
                'Pergunta03' => 1
            ],
        ];
        parent::init();
    }
}
