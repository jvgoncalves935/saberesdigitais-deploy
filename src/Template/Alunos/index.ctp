<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno[]|\Cake\Collection\CollectionInterface $alunos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Aluno'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="alunos index large-9 medium-8 columns content">
    <h3><?= __('Alunos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CpfAluno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CpfTutor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EscolaID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EXPTotal') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno): ?>
            <tr>
                <td><?= $this->Number->format($aluno->ID) ?></td>
                <td><?= h($aluno->CpfAluno) ?></td>
                <td><?= h($aluno->CpfTutor) ?></td>
                <td><?= $this->Number->format($aluno->EscolaID) ?></td>
                <td><?= $this->Number->format($aluno->Level) ?></td>
                <td><?= $this->Number->format($aluno->EXPTotal) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $aluno->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aluno->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aluno->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $aluno->ID)]) ?>
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
