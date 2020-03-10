<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisito $requisito
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requisito->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requisito->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Requisitos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="requisitos form large-9 medium-8 columns content">
    <?= $this->Form->create($requisito) ?>
    <fieldset>
        <legend><?= __('Edit Requisito') ?></legend>
        <?php
            echo $this->Form->control('MateriaID');
            echo $this->Form->control('RequisitoID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
