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
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $materia->MateriaID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $materia->MateriaID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Materias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cursos'), ['controller' => 'Cursos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Curso'), ['controller' => 'Cursos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materias form large-9 medium-8 columns content">
    <?= $this->Form->create($materia) ?>
    <fieldset>
        <legend><?= __('Edit Materia') ?></legend>
        <?php
            echo $this->Form->control('Nome');
            echo $this->Form->control('EXPMateria');
            echo $this->Form->control('CursoID',[
                'type'=>'select',
                'options'=>$cursos
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
