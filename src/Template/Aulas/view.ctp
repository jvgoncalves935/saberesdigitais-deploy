<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aula $aula
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aula'), ['action' => 'edit', $aula->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aula'), ['action' => 'delete', $aula->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $aula->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Aulas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aula'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aulas view large-9 medium-8 columns content">
    <h3><?= h($aula->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($aula->Cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($aula->ID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MateriaID') ?></th>
            <td><?= $this->Number->format($aula->MateriaID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pergunta01') ?></th>
            <td><?= $this->Number->format($aula->Pergunta01) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pergunta02') ?></th>
            <td><?= $this->Number->format($aula->Pergunta02) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pergunta03') ?></th>
            <td><?= $this->Number->format($aula->Pergunta03) ?></td>
        </tr>
    </table>
</div>
