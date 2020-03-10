<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Escola $escola
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Escola'), ['action' => 'edit', $escola->EscolaID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Escola'), ['action' => 'delete', $escola->EscolaID], ['confirm' => __('Are you sure you want to delete # {0}?', $escola->EscolaID)]) ?> </li>
        <li><?= $this->Html->link(__('List Escolas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Escola'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="escolas view large-9 medium-8 columns content">
    <h3><?= h($escola->EscolaID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($escola->Nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($escola->Cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($escola->Estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EscolaID') ?></th>
            <td><?= $this->Number->format($escola->EscolaID) ?></td>
        </tr>
    </table>
</div>
