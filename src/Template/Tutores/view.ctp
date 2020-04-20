<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tutore $tutore
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Tutor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Tutores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Edit Tutor'), ['action' => 'edit', $tutore->ID]) ?> </li>
    </ul>
</nav>
<div class="tutores view large-9 medium-8 columns content">
    <h3><?= h($tutore->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($tutore->Cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($tutore->ID) ?></td>
        </tr>
    </table>
</div>
