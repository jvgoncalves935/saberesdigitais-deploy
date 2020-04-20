<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tutore[]|\Cake\Collection\CollectionInterface $tutores
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Tutor'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tutores index large-9 medium-8 columns content">
    <h3><?= __('Tutores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Cpf') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tutores as $tutore): ?>
            <tr>
                <td><?= $this->Number->format($tutore->ID) ?></td>
                <td><?= h($tutore->Cpf) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tutore->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tutore->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tutore->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $tutore->ID)]) ?>
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
