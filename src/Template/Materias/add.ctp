<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materia $materia
 */
    use Cake\ORM\TableRegistry;

    $query = TableRegistry::get('cursos')->find();
    $query = TableRegistry::getTableLocator()->get('cursos')->find();

    $cursos = array();
    foreach ($query as $curso) {
        $cursos[$curso['CursoID']] = $curso['Nome'];
    }
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Materias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Cursos'), ['controller' => 'Cursos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Adicionar Curso'), ['controller' => 'Cursos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materias form large-9 medium-8 columns content">
    <?= $this->Form->create($materia) ?>
    <fieldset>
        <legend><?= __('Add Materia') ?></legend>
        <?php
            echo $this->Form->control('Nome');
            echo $this->Form->control('EXPMateria');
            echo $this->Form->control('CursoID',[
                'type'=>'select',
                'options'=>$cursos
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>
