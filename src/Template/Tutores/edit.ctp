<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tutore $tutore
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tutore->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tutore->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tutores'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tutores form large-9 medium-8 columns content">
    <?= $this->Form->create($tutore) ?>
    <fieldset>
        <legend><?= __('Edit Tutore') ?></legend>
        <?php
            echo $this->Form->control('Cpf');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
