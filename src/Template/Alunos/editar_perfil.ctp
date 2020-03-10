<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno[]|\Cake\Collection\CollectionInterface $alunos
 */
?>
<div class="alunos form large-9 medium-8 columns content">
    <?= $this->Form->create($aluno,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Editar Perfil') ?></legend>
        <?php
            echo $this->Form->control('Nome',[
                'value'=>$usuario->Nome
            ]);
            echo $this->Form->control('Email',[
                'value'=>$usuario->Email,
                'disabled'=>'disabled'
            ]);
            echo $this->Form->control('CPF',[
                'label'=>'CPF',
                'value'=>$usuario->Cpf,
                'disabled'=>'disabled'
                
            ]);
            echo $this->Form->control('Genero',[
                'type'=>'select',
                'options'=>[
                    'Masculino'=>'Masculino',
                    'Feminino'=>'Feminino',
                    'Outro'=>'Outro'
                ]
            ]);
            echo $this->Form->control('Tutor',[
                'type'=>'select',
                'options'=>$tutores
            ]);
            echo $this->Form->control('Escola',[
                'type'=>'select',
                'options'=>$escolas
            ]);
            echo $this->Form->control('Perfis',[
                'multiple' => 'checkbox',
                'options'=> $perfis,
                'selected' => $perfisSelecionados
            ]);
            echo $this->Form->control('Foto',['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>