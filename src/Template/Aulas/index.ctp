<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aula[]|\Cake\Collection\CollectionInterface $aulas
 */
    use \Cake\Http\Session;
    use Cake\ORM\TableRegistry;

    $session = new Session();

    $cpf = $session->consume('Auth.User.Cpf');

    $query = TableRegistry::get('administradores')->find();
    $query = TableRegistry::getTableLocator()->get('administradores')->find()
                                                              ->where(['Cpf' => $cpf])
                                                              ->first();
    $isAdmin = false;
    if($query != null){
        $isAdmin = true;
    }

    $query = TableRegistry::get('tutores')->find();
    $query = TableRegistry::getTableLocator()->get('tutores')->find()
                                                              ->where(['Cpf' => $cpf])
                                                              ->first();
    $isTutor = false;
    if($query != null){
        $isTutor = true;
    }


    //debug($isTutor);
    //debug($isAdmin);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Registrar Aula'), ['action' => 'add']) ?></li>
        <?php if($isAdmin || $isTutor){ ?>
        <li><?= $this->Html->link(__('Validar Aula'), ['action' => 'validar']) ?></li>
        <?php ;} ?>
        <li><?= $this->Html->link(__('Solicitar Quebra de Requisitos'), ['controller'=>'Requisitos','action' => 'solicitar']) ?></li>
        <?php if($isAdmin || $isTutor){ ?>
        <li><?= $this->Html->link(__('Validar Solicitações de Quebra de Requisitos'), ['action' => 'solicitacoes']) ?></li>
        <?php ;} ?>
    </ul>
</nav>
<div class="aulas index large-9 medium-8 columns content">
    <h3><?= __('Aulas') ?></h3>
    <?php if(empty($aulasCursos)){
                 echo "<div align='center'><p>Você não possui aulas cadastradas!</p></div>";
            }else{ foreach ($aulasCursos as $cursoID=>$aulas): ?>
        <h4><?= h($nomesCursos[$cursoID]) ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <?php foreach($aulas as $aula): ?>
                    <tr>
                        <td><?= h($aula['Nome']) ?></td>
                        <?php if($aulasValidadas[$aula["MateriaID"]]){
                                    echo "<td>(Validada)</td>";
                                }else{
                                    echo "<td>(Não Validada)</td>";
                                }
                             ?>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach;}; ?>
</div>
