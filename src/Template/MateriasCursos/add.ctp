<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MateriasCurso $materiasCurso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Materias Cursos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="materiasCursos form large-9 medium-8 columns content">
    <?= $this->Form->create($materiasCurso) ?>
    <fieldset>
        <legend><?= __('Add Materias Curso') ?></legend>
        <?php
            echo $this->Form->control('CursoID');
            echo $this->Form->control('MateriaID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
