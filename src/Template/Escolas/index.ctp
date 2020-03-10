<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Escola[]|\Cake\Collection\CollectionInterface $escolas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Adicionar Escola'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="escolas index large-9 medium-8 columns content">
    <h3><?= __('Escolas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('EscolaID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($escolas as $escola): ?>
            <tr>
                <td><?= $this->Number->format($escola->EscolaID) ?></td>
                <td><?= h($escola->Nome) ?></td>
                <td><?= h($escola->Cidade) ?></td>
                <td><?= h($escola->Estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $escola->EscolaID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $escola->EscolaID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $escola->EscolaID], ['confirm' => __('Are you sure you want to delete # {0}?', $escola->EscolaID)]) ?>
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
