<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso $curso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Curso'), ['action' => 'edit', $curso->CursoID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Curso'), ['action' => 'delete', $curso->CursoID], ['confirm' => __('Are you sure you want to delete # {0}?', $curso->CursoID)]) ?> </li>
        <li><?= $this->Html->link(__('List Cursos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Curso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materias'), ['controller' => 'Materias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Materia'), ['controller' => 'Materias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cursos view large-9 medium-8 columns content">
    <h3><?= h($curso->CursoID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($curso->Nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CursoID') ?></th>
            <td><?= $this->Number->format($curso->CursoID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EXPCurso') ?></th>
            <td><?= $this->Number->format($curso->EXPCurso) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Materias') ?></h4>
        <?php if (!empty($curso->materias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('MateriaID') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('EXPMateria') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($curso->materias as $materias): ?>
            <tr>
                <td><?= h($materias->MateriaID) ?></td>
                <td><?= h($materias->Nome) ?></td>
                <td><?= h($materias->EXPMateria) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Materias', 'action' => 'view', $materias->MateriaID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Materias', 'action' => 'edit', $materias->MateriaID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Materias', 'action' => 'delete', $materias->MateriaID], ['confirm' => __('Are you sure you want to delete # {0}?', $materias->MateriaID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
