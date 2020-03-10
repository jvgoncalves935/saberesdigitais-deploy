<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno $aluno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aluno'), ['action' => 'edit', $aluno->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aluno'), ['action' => 'delete', $aluno->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $aluno->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Alunos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aluno'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Conquistas'), ['controller' => 'Conquistas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conquista'), ['controller' => 'Conquistas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="alunos view large-9 medium-8 columns content">
    <h3><?= h($aluno->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CpfAluno') ?></th>
            <td><?= h($aluno->CpfAluno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CpfTutor') ?></th>
            <td><?= h($aluno->CpfTutor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($aluno->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EscolaID') ?></th>
            <td><?= $this->Number->format($aluno->EscolaID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $this->Number->format($aluno->Level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EXPTotal') ?></th>
            <td><?= $this->Number->format($aluno->EXPTotal) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Conquistas') ?></h4>
        <?php if (!empty($aluno->conquistas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('ConquistaID') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('EXPConquista') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aluno->conquistas as $conquistas): ?>
            <tr>
                <td><?= h($conquistas->ConquistaID) ?></td>
                <td><?= h($conquistas->Nome) ?></td>
                <td><?= h($conquistas->Descricao) ?></td>
                <td><?= h($conquistas->EXPConquista) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Conquistas', 'action' => 'view', $conquistas->ConquistaID]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Conquistas', 'action' => 'edit', $conquistas->ConquistaID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Conquistas', 'action' => 'delete', $conquistas->ConquistaID], ['confirm' => __('Are you sure you want to delete # {0}?', $conquistas->ConquistaID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
