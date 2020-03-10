<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Alunos Model
 *
 * @property \App\Model\Table\ConquistasTable|\Cake\ORM\Association\BelongsToMany $Conquistas
 *
 * @method \App\Model\Entity\Aluno get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aluno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aluno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aluno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aluno saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aluno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aluno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aluno findOrCreate($search, callable $callback = null, $options = [])
 */
class AlunosTable extends Table
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

        $this->setTable('alunos');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');

        $this->belongsToMany('Conquistas', [
            'foreignKey' => 'aluno_id',
            'targetForeignKey' => 'conquista_id',
            'joinTable' => 'conquistas_alunos'
        ]);
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
            ->scalar('Nome')
            ->maxLength('Nome', 255)
            ->requirePresence('Nome', 'create')
            ->notEmptyString('Nome');

        $validator
            ->scalar('CpfAluno')
            ->maxLength('CpfAluno', 11)
            ->requirePresence('CpfAluno', 'create')
            ->notEmptyString('CpfAluno');

        $validator
            ->scalar('CpfTutor')
            ->maxLength('CpfTutor', 11)
            ->requirePresence('CpfTutor', 'create')
            ->notEmptyString('CpfTutor');

        $validator
            ->integer('EscolaID')
            ->requirePresence('EscolaID', 'create')
            ->notEmptyString('EscolaID');

        $validator
            ->integer('Level')
            ->requirePresence('Level', 'create')
            ->notEmptyString('Level');

        $validator
            ->integer('EXPTotal')
            ->requirePresence('EXPTotal', 'create')
            ->notEmptyString('EXPTotal');
        
        
        $validator->add('Foto',[
            'optionalUpload' => [
                'rule' => ['uploadedFile', ['optional' => true]]
            ],
            'mimeType' => [
                'rule' => ['mimeType', ['image/png','image/jpg','image/gif']],
                'message' => 'Arquivos de imagem suportados: png, jpg e gif.'
            ],
            'fileSize' => [
                'rule' => ['fileSize','<','5MB'],
                'message' => 'Limite do tamanho do arquivo: 5MB.'
            ],
        ])->allowEmptyFile('Foto','update');
        
        return $validator;
    }
}
