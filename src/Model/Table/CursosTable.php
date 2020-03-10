<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cursos Model
 *
 * @property \App\Model\Table\MateriasTable|\Cake\ORM\Association\BelongsToMany $Materias
 *
 * @method \App\Model\Entity\Curso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Curso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Curso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Curso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Curso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Curso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Curso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Curso findOrCreate($search, callable $callback = null, $options = [])
 */
class CursosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('cursos');
        $this->setDisplayField('CursoID');
        $this->setPrimaryKey('CursoID');

        $this->belongsToMany('Materias', [
            'foreignKey' => 'curso_id',
            'targetForeignKey' => 'materia_id',
            'joinTable' => 'materias_cursos'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('CursoID')
            ->allowEmptyString('CursoID', null, 'create');

        $validator
            ->scalar('Nome')
            ->maxLength('Nome', 255)
            ->requirePresence('Nome', 'create')
            ->notEmptyString('Nome');

        $validator
            ->integer('EXPCurso')
            ->requirePresence('EXPCurso', 'create')
            ->notEmptyString('EXPCurso');

        return $validator;
    }
}
