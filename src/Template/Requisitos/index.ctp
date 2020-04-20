<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisito[]|\Cake\Collection\CollectionInterface $requisitos
 */
    use Cake\ORM\TableRegistry;

    $_materiasRequisitosAux = TableRegistry::getTableLocator()->get('requisitos')->find();
    $_materiasAux = array();
    $_requisitosAux = array();
    foreach($_materiasRequisitosAux as $aux){
        $_materiasAux[] = $aux['MateriaID'];
        $_requisitosAux[] = $aux['RequisitoID'];
    }
    $_todasMaterias = array_merge($_materiasAux,$_requisitosAux);

    $_materiasQuery = TableRegistry::getTableLocator()->get('materias')->find()->select(['MateriaID', 'Nome'])->where(['MateriaID IN'=>$_todasMaterias]);
    $_materiasNomes = array();
    foreach($_materiasQuery as $aux){
        $_materiasNomes[$aux['MateriaID']] = $aux['Nome'];
    }

    //debug()

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Requisito'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Solicitar Quebra Requisito'), ['action' => 'solicitar']) ?></li>
    </ul>
</nav>
<div class="requisitos index large-9 medium-8 columns content">
    <h3><?= __('Requisitos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Materia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Requisito') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requisitos as $requisito): ?>
            <tr>
                <td><?= $this->Number->format($requisito->ID) ?></td>
                <td><?= h($_materiasNomes[$requisito->MateriaID]) ?></td>
                <td><?= h($_materiasNomes[$requisito->RequisitoID]) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $requisito->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $requisito->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
