<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materia $materia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Materia'), ['action' => 'edit', $materia->MateriaID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Materia'), ['action' => 'delete', $materia->MateriaID], ['confirm' => __('Are you sure you want to delete # {0}?', $materia->MateriaID)]) ?> </li>
        <li><?= $this->Html->link(__('List Materias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Materia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cursos'), ['controller' => 'Cursos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Curso'), ['controller' => 'Cursos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materias view large-9 medium-8 columns content">
    <h3><?= h($materia->MateriaID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($materia->Nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MateriaID') ?></th>
            <td><?= $this->Number->format($materia->MateriaID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EXPMateria') ?></th>
            <td><?= $this->Number->format($materia->EXPMateria) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cursos') ?></h4>
        <?php if (!empty($materia->cursos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('CursoID') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('EXPCurso') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($materia->cursos as $cursos): ?>
            <tr>
                <td><?= h($cursos->CursoID) ?></td>
                <td><?= h($cursos->Nome) ?></td>
                <td><?= h($cursos->EXPCurso) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cursos', 'action' => 'view', $cursos->CursoID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cursos', 'action' => 'edit', $cursos->CursoID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cursos', 'action' => 'delete', $cursos->CursoID], ['confirm' => __('Are you sure you want to delete # {0}?', $cursos->CursoID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
