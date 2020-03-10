<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Escolas Model
 *
 * @method \App\Model\Entity\Escola get($primaryKey, $options = [])
 * @method \App\Model\Entity\Escola newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Escola[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Escola|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Escola saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Escola patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Escola[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Escola findOrCreate($search, callable $callback = null, $options = [])
 */
class EscolasTable extends Table
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

        $this->setTable('escolas');
        $this->setDisplayField('EscolaID');
        $this->setPrimaryKey('EscolaID');
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
            ->integer('EscolaID')
            ->allowEmptyString('EscolaID', null, 'create');

        $validator
            ->scalar('Nome')
            ->maxLength('Nome', 255)
            ->requirePresence('Nome', 'create')
            ->notEmptyString('Nome');

        $validator
            ->scalar('Cidade')
            ->maxLength('Cidade', 255)
            ->requirePresence('Cidade', 'create')
            ->notEmptyString('Cidade');

        $validator
            ->scalar('Estado')
            ->maxLength('Estado', 2)
            ->requirePresence('Estado', 'create')
            ->notEmptyString('Estado');

        return $validator;
    }
}
