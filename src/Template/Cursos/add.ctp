<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso $curso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cursos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Materias'), ['controller' => 'Materias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Materia'), ['controller' => 'Materias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cursos form large-9 medium-8 columns content">
    <?= $this->Form->create($curso) ?>
    <fieldset>
        <legend><?= __('Add Curso') ?></legend>
        <?php
            echo $this->Form->control('Nome');
            echo $this->Form->control('EXPCurso');
            /*
            echo $this->Form->select('rooms',
                [1, 2, 3, 4, 5, 6],
                [
                    'multiple' => true,
                    'value' => ['Iniciante', 'Empresarial','Programador','Gamer','Especialista em Redes','Robótica']
                ]
            );
            */
            
            echo $this->Form->control('Perfis',[
                'type'=>'select',
                'label'=>'Perfis do Curso',
                'multiple'=>'checkbox',
                'options'=>[
                    '1' =>'Iniciante',
                    '2' =>'Empresarial',
                    '3' =>'Programador',
                    '4' =>'Gamer',
                    '5' =>'Especialista em Redes',
                    '6' =>'Robótica'
                ],
                'selected'=>['1','2','3','4','5','6']
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>
