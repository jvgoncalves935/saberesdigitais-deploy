<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requisitos Model
 *
 * @method \App\Model\Entity\Requisito get($primaryKey, $options = [])
 * @method \App\Model\Entity\Requisito newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Requisito[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requisito|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requisito saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requisito patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Requisito[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requisito findOrCreate($search, callable $callback = null, $options = [])
 */
class RequisitosTable extends Table
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

        $this->setTable('requisitos');
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
            ->integer('MateriaID')
            ->requirePresence('MateriaID', 'create')
            ->notEmptyString('MateriaID');

        $validator
            ->integer('RequisitoID')
            ->requirePresence('RequisitoID', 'create')
            ->notEmptyString('RequisitoID');

        return $validator;
    }
}
