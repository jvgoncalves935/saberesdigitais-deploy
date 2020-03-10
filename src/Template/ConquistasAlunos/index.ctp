<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConquistasAluno[]|\Cake\Collection\CollectionInterface $conquistasAlunos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Conquistas Aluno'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="conquistasAlunos index large-9 medium-8 columns content">
    <h3><?= __('Conquistas Alunos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Cpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ConquistaID') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conquistasAlunos as $conquistasAluno): ?>
            <tr>
                <td><?= $this->Number->format($conquistasAluno->ID) ?></td>
                <td><?= h($conquistasAluno->Cpf) ?></td>
                <td><?= $this->Number->format($conquistasAluno->ConquistaID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $conquistasAluno->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conquistasAluno->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conquistasAluno->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $conquistasAluno->ID)]) ?>
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
