<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aula $aula
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $aula->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $aula->ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Aulas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="aulas form large-9 medium-8 columns content">
    <?= $this->Form->create($aula) ?>
    <fieldset>
        <legend><?= __('Edit Aula') ?></legend>
        <?php
            echo $this->Form->control('Cpf');
            echo $this->Form->control('MateriaID');
            echo $this->Form->control('Pergunta01');
            echo $this->Form->control('Pergunta02');
            echo $this->Form->control('Pergunta03');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
