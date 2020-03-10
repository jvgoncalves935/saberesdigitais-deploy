<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MateriasCursosFixture
 */
class MateriasCursosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'CursoID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'MateriaID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_cod_cursos_materias' => ['type' => 'index', 'columns' => ['CursoID'], 'length' => []],
            'FK_cod_materias_cursos' => ['type' => 'index', 'columns' => ['MateriaID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ID'], 'length' => []],
            'FK_cod_cursos_materias' => ['type' => 'foreign', 'columns' => ['CursoID'], 'references' => ['cursos', 'CursoID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_cod_materias_cursos' => ['type' => 'foreign', 'columns' => ['MateriaID'], 'references' => ['materias', 'MateriaID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'CursoID' => 1,
                'MateriaID' => 1
            ],
        ];
        parent::init();
    }
}
