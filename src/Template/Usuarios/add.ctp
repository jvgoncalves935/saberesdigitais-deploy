<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
    use Cake\ORM\TableRegistry;

    $query = TableRegistry::get('tutores')->find();
    $query = TableRegistry::getTableLocator()->get('tutores')->find()
                                                             ->select(['Cpf']);
    
    $tutoresCpf = array();
    foreach($query as $tutor){
        $tutoresCpf[] = $tutor['Cpf'];
    }
    
    $query = TableRegistry::get('usuarios')->find();
    $query = TableRegistry::getTableLocator()->get('usuarios')->find()
                                                             ->select(['Cpf','Nome'])
                                                             ->where(['Cpf IN' => $tutoresCpf]);

    $tutoresNomes = array();
    foreach($query as $nome){
        $tutoresNomes[$nome['Cpf']] = $nome['Nome'];
    }
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usuarios form large-9 medium-8 columns content">
    <?= $this->Form->create($usuario,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Usuario') ?></legend>
        <?php
            
            echo $this->Form->control('Nome');
            echo $this->Form->control('Cpf');
            echo $this->Form->control('Email');
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
                'options'=>$tutoresNomes
            ]);
            echo $this->Form->control('Foto',['type' => 'file']);
            echo $this->Form->control('Senha');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
