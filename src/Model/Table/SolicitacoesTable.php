<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Solicitacoes Model
 *
 * @method \App\Model\Entity\Solicitaco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Solicitaco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Solicitaco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Solicitaco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Solicitaco saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Solicitaco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Solicitaco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Solicitaco findOrCreate($search, callable $callback = null, $options = [])
 */
class SolicitacoesTable extends Table
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

        $this->setTable('solicitacoes');
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
            ->integer('CPFAluno')
            ->requirePresence('CPFAluno', 'create')
            ->notEmptyString('CPFAluno');

        $validator
            ->integer('CPFTutor')
            ->requirePresence('CPFTutor', 'create')
            ->notEmptyString('CPFTutor');

        $validator
            ->boolean('Autorizada')
            ->requirePresence('Autorizada', 'create')
            ->notEmptyString('Autorizada');

        return $validator;
    }
}
