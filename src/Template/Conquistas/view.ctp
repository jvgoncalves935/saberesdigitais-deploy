<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $conquista
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conquista'), ['action' => 'edit', $conquista->ConquistaID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conquista'), ['action' => 'delete', $conquista->ConquistaID], ['confirm' => __('Are you sure you want to delete # {0}?', $conquista->ConquistaID)]) ?> </li>
        <li><?= $this->Html->link(__('List Conquistas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conquista'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="conquistas view large-9 medium-8 columns content">
    <h3><?= h($conquista->ConquistaID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($conquista->Nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ConquistaID') ?></th>
            <td><?= $this->Number->format($conquista->ConquistaID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EXPConquista') ?></th>
            <td><?= $this->Number->format($conquista->EXPConquista) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($conquista->Descricao)); ?>
    </div>
</div>
