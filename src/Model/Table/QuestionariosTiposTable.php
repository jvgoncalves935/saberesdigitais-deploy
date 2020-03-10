<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuestionariosTipos Model
 *
 * @method \App\Model\Entity\QuestionariosTipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuestionariosTipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QuestionariosTipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuestionariosTipo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuestionariosTipo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuestionariosTipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionariosTipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionariosTipo findOrCreate($search, callable $callback = null, $options = [])
 */
class QuestionariosTiposTable extends Table
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

        $this->setTable('questionarios_tipos');
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

        $validator
            ->integer('Pergunta04')
            ->requirePresence('Pergunta04', 'create')
            ->notEmptyString('Pergunta04');

        $validator
            ->integer('Pergunta05')
            ->requirePresence('Pergunta05', 'create')
            ->notEmptyString('Pergunta05');

        $validator
            ->integer('Pergunta06')
            ->requirePresence('Pergunta06', 'create')
            ->notEmptyString('Pergunta06');

        $validator
            ->integer('Pergunta07')
            ->requirePresence('Pergunta07', 'create')
            ->notEmptyString('Pergunta07');

        $validator
            ->integer('Pergunta08')
            ->requirePresence('Pergunta08', 'create')
            ->notEmptyString('Pergunta08');

        $validator
            ->integer('Pergunta09')
            ->requirePresence('Pergunta09', 'create')
            ->notEmptyString('Pergunta09');

        $validator
            ->integer('Pergunta10')
            ->requirePresence('Pergunta10', 'create')
            ->notEmptyString('Pergunta10');

        $validator
            ->integer('Pergunta11')
            ->requirePresence('Pergunta11', 'create')
            ->notEmptyString('Pergunta11');

        $validator
            ->integer('Pergunta12')
            ->requirePresence('Pergunta12', 'create')
            ->notEmptyString('Pergunta12');

        $validator
            ->integer('Pergunta13')
            ->requirePresence('Pergunta13', 'create')
            ->notEmptyString('Pergunta13');

        $validator
            ->integer('Pergunta14')
            ->requirePresence('Pergunta14', 'create')
            ->notEmptyString('Pergunta14');

        $validator
            ->integer('Pergunta15')
            ->requirePresence('Pergunta15', 'create')
            ->notEmptyString('Pergunta15');

        return $validator;
    }
}
