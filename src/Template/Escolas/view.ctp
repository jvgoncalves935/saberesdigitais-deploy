<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Escola $escola
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Escolas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Adicionar Escola'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Editar Escola'), ['action' => 'edit', $escola->EscolaID]) ?> </li>
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
