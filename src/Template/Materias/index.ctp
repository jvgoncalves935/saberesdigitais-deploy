<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materia[]|\Cake\Collection\CollectionInterface $materias
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Materia'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Cursos'), ['controller' => 'Cursos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Adicionar Curso'), ['controller' => 'Cursos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materias index large-9 medium-8 columns content">
    <h3><?= __('Materias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('MateriaID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EXPMateria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CursoID') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materias as $materia): ?>
            <tr>
                <td><?= $this->Number->format($materia->MateriaID) ?></td>
                <td><?= h($materia->Nome) ?></td>
                <td><?= $this->Number->format($materia->EXPMateria) ?></td>
                <td><?= $this->Number->format($materia->CursoID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $materia->MateriaID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $materia->MateriaID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $materia->MateriaID], ['confirm' => __('Are you sure you want to delete # {0}?', $materia->MateriaID)]) ?>
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
