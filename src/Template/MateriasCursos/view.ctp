<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MateriasCurso $materiasCurso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Materias Curso'), ['action' => 'edit', $materiasCurso->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Materias Curso'), ['action' => 'delete', $materiasCurso->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $materiasCurso->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Materias Cursos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Materias Curso'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materiasCursos view large-9 medium-8 columns content">
    <h3><?= h($materiasCurso->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($materiasCurso->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CursoID') ?></th>
            <td><?= $this->Number->format($materiasCurso->CursoID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MateriaID') ?></th>
            <td><?= $this->Number->format($materiasCurso->MateriaID) ?></td>
        </tr>
    </table>
</div>
