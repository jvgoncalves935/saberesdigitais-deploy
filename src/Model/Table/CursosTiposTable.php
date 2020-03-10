<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CursosTipos Model
 *
 * @method \App\Model\Entity\CursosTipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\CursosTipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CursosTipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CursosTipo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursosTipo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursosTipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CursosTipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CursosTipo findOrCreate($search, callable $callback = null, $options = [])
 */
class CursosTiposTable extends Table
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

        $this->setTable('cursos_tipos');
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
            ->integer('Perfil')
            ->requirePresence('Perfil', 'create')
            ->notEmptyString('Perfil');

        return $validator;
    }
}
