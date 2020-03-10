<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ConquistasAlunos Model
 *
 * @method \App\Model\Entity\ConquistasAluno get($primaryKey, $options = [])
 * @method \App\Model\Entity\ConquistasAluno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ConquistasAluno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ConquistasAluno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConquistasAluno saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConquistasAluno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ConquistasAluno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ConquistasAluno findOrCreate($search, callable $callback = null, $options = [])
 */
class ConquistasAlunosTable extends Table
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

        $this->setTable('conquistas_alunos');
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

        $validator
            ->integer('ConquistaID')
            ->requirePresence('ConquistaID', 'create')
            ->notEmptyString('ConquistaID');

        return $validator;
    }
}
