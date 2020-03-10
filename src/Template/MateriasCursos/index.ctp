<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MateriasCurso[]|\Cake\Collection\CollectionInterface $materiasCursos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Materias Curso'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materiasCursos index large-9 medium-8 columns content">
    <h3><?= __('Materias Cursos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CursoID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MateriaID') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materiasCursos as $materiasCurso): ?>
            <tr>
                <td><?= $this->Number->format($materiasCurso->ID) ?></td>
                <td><?= $this->Number->format($materiasCurso->CursoID) ?></td>
                <td><?= $this->Number->format($materiasCurso->MateriaID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $materiasCurso->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $materiasCurso->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $materiasCurso->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $materiasCurso->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
