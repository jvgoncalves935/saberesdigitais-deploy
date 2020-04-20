<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usuario->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usuarios form large-9 medium-8 columns content">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Alterar Usuario') ?></legend>
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
            echo $this->Form->control('Senha');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
