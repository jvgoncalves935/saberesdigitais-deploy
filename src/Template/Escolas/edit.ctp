<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Escola $escola
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $escola->EscolaID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $escola->EscolaID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Escolas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="escolas form large-9 medium-8 columns content">
    <?= $this->Form->create($escola) ?>
    <fieldset>
        <legend><?= __('Edit Escola') ?></legend>
        <?php
            echo $this->Form->control('Nome');
            echo $this->Form->control('Cidade');
            echo $this->Form->control('Estado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
