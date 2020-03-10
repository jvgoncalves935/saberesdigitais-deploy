<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MateriasCursos Model
 *
 * @method \App\Model\Entity\MateriasCurso get($primaryKey, $options = [])
 * @method \App\Model\Entity\MateriasCurso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MateriasCurso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MateriasCurso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MateriasCurso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MateriasCurso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MateriasCurso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MateriasCurso findOrCreate($search, callable $callback = null, $options = [])
 */
class MateriasCursosTable extends Table
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

        $this->setTable('materias_cursos');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');
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
            ->integer('ID')
            ->allowEmptyString('ID', null, 'create');

        $validator
            ->integer('CursoID')
            ->requirePresence('CursoID', 'create')
            ->notEmptyString('CursoID');

        $validator
            ->integer('MateriaID')
            ->requirePresence('MateriaID', 'create')
            ->notEmptyString('MateriaID');

        return $validator;
    }
}
