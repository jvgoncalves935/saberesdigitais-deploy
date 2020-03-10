<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tutores Model
 *
 * @method \App\Model\Entity\Tutore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tutore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tutore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tutore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tutore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tutore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tutore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tutore findOrCreate($search, callable $callback = null, $options = [])
 */
class TutoresTable extends Table
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

        $this->setTable('tutores');
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
            ->scalar('Cpf')
            ->maxLength('Cpf', 11)
            ->requirePresence('Cpf', 'create')
            ->notEmptyString('Cpf');

        return $validator;
    }
}
