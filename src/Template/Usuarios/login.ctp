<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="usuarios form">
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Digite seu e-mail e sua senha') ?></legend>
        <?= $this->Form->control('username',['label'=>'E-mail']) ?>
        <?= $this->Form->control('password',['label'=>'Senha']) ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>
