<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use \Cake\Event\Event;
use \App\Model\Entity\Usuario;

/**
 * Usuarios Model
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
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
            ->scalar('Nome')
            ->maxLength('Nome', 255)
            ->requirePresence('Nome', 'create')
            ->notEmptyString('Nome');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 255)
            ->requirePresence('Email', 'create')
            ->notEmptyString('Email');

        $validator
            ->scalar('Genero')
            ->maxLength('Genero', 255)
            ->requirePresence('Genero', 'create')
            ->notEmptyString('Genero');

        $validator->add('Foto',[
            'mimeType' => [
                'rule' => ['mimeType', ['image/png','image/jpg','image/gif']],
                'message' => 'Arquivos de imagem suportados: png, jpg e gif.'
            ],
            'fileSize' => [
                'rule' => ['fileSize','<','5MB'],
                'message' => 'Limite do tamanho do arquivo: 5MB.'
            ]
        ]);

        $validator
            ->scalar('Senha')
            ->maxLength('Senha', 255)
            ->requirePresence('Senha', 'create')
            ->notEmptyString('Senha');

        return $validator;
    }
    public function beforeSave(Event $event, Usuario $entity){
        if(strlen($entity->Senha) < 60){
            $entity->Senha = \Cake\Utility\Security::hash($entity->Senha,'sha256');
        }
    }
}
