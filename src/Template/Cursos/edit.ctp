<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso $curso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $curso->CursoID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $curso->CursoID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cursos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Materias'), ['controller' => 'Materias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Materia'), ['controller' => 'Materias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cursos form large-9 medium-8 columns content">
    <?= $this->Form->create($curso) ?>
    <fieldset>
        <legend><?= __('Edit Curso') ?></legend>
        <?php
            echo $this->Form->control('Nome');
            echo $this->Form->control('EXPCurso');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
