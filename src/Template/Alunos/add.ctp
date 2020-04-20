<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno $aluno
 */
    use Cake\ORM\TableRegistry;

    $query = TableRegistry::get('escolas')->find();
    $query = TableRegistry::getTableLocator()->get('escolas')->find();

    $options = array();
    $vetor_nomes = array();
    $vetor_ids = array();

    foreach ($query as $escola) {
        $options[$escola['EscolaID']] = $escola['Nome'];
    }
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Alunos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="alunos form large-9 medium-8 columns content">
    <?= $this->Form->create($aluno) ?>
    <fieldset>
        <legend><?= __('Adicionar Aluno') ?></legend>
        <?php
            echo $this->Form->control('CpfAluno');
            echo $this->Form->control('CpfTutor');
            echo $this->Form->control('EscolaID',[
                'type'=>'select',
                'options'=>$options
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
