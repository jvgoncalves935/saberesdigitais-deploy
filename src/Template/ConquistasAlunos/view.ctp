<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConquistasAluno $conquistasAluno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conquistas Aluno'), ['action' => 'edit', $conquistasAluno->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conquistas Aluno'), ['action' => 'delete', $conquistasAluno->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $conquistasAluno->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Conquistas Alunos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conquistas Aluno'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conquistasAlunos view large-9 medium-8 columns content">
    <h3><?= h($conquistasAluno->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($conquistasAluno->Cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($conquistasAluno->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ConquistaID') ?></th>
            <td><?= $this->Number->format($conquistasAluno->ConquistaID) ?></td>
        </tr>
    </table>
</div>
