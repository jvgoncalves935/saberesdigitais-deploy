<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Aulas Model
 *
 * @method \App\Model\Entity\Aula get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aula newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aula[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aula|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aula saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aula patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aula[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aula findOrCreate($search, callable $callback = null, $options = [])
 */
class AulasTable extends Table
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

        $this->setTable('aulas');
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
            ->allowEmptyString('Cpf');

        $validator
            ->integer('MateriaID')
            ->requirePresence('MateriaID', 'create')
            ->notEmptyString('MateriaID');

        $validator
            ->integer('Pergunta01')
            ->requirePresence('Pergunta01', 'create')
            ->notEmptyString('Pergunta01');

        $validator
            ->integer('Pergunta02')
            ->requirePresence('Pergunta02', 'create')
            ->notEmptyString('Pergunta02');

        $validator
            ->integer('Pergunta03')
            ->requirePresence('Pergunta03', 'create')
            ->notEmptyString('Pergunta03');

        return $validator;
    }
}
