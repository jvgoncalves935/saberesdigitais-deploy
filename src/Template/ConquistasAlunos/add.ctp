<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConquistasAluno $conquistasAluno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Conquistas Alunos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="conquistasAlunos form large-9 medium-8 columns content">
    <?= $this->Form->create($conquistasAluno) ?>
    <fieldset>
        <legend><?= __('Add Conquistas Aluno') ?></legend>
        <?php
            echo $this->Form->control('Cpf');
            echo $this->Form->control('ConquistaID');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
