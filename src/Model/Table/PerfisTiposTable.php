<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PerfisTipos Model
 *
 * @method \App\Model\Entity\PerfisTipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\PerfisTipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PerfisTipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PerfisTipo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PerfisTipo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PerfisTipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PerfisTipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PerfisTipo findOrCreate($search, callable $callback = null, $options = [])
 */
class PerfisTiposTable extends Table
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

        $this->setTable('perfis_tipos');
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
            ->scalar('CPF')
            ->maxLength('CPF', 11)
            ->requirePresence('CPF', 'create')
            ->notEmptyString('CPF');

        $validator
            ->integer('Perfil')
            ->requirePresence('Perfil', 'create')
            ->notEmptyString('Perfil');

        return $validator;
    }
}
