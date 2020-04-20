<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aula $aula
 */
    use \Cake\Http\Session;
    use Cake\ORM\TableRegistry;

    $querySolicitacoes = TableRegistry::getTableLocator()->get('solicitacoes')->find()->where(['Autorizada' => false]);

    //CPFs não repetidos
    $cpfs = array();
    $materias_ids = array();
    $solicitacoesIDs = array();

    foreach($querySolicitacoes as $solicitacao){
        array_push($cpfs,$solicitacao['CPFAluno']);
        array_push($materias_ids,$solicitacao['MateriaID']);
        array_push($solicitacoesIDs,$solicitacao['ID']);
    }
    $cpfs_array = array_values($cpfs);

    if(!empty($materias_ids)){
        $query_materias = TableRegistry::getTableLocator()->get('materias')->find()->select(['MateriaID','Nome'])->where(['MateriaID IN' => $materias_ids]);
    
        $materias_aulas = array();
        foreach($query_materias as $materia){
            $materias_aulas[$materia['MateriaID']] = $materia['Nome'];
        }

        $query_nomes = TableRegistry::getTableLocator()->get('usuarios')->find()->select(['Cpf','Nome'])->where(['Cpf IN' => $cpfs_array]);
        
        //Nomes
        $cpfs_nomes_array = array();
        foreach($query_nomes as $nome){
            $cpfs_nomes_array[$nome['Cpf']] = $nome['Nome'];
        }
    }
    

    $aulas = array();
    $num_aulas = count($materias_ids);
    for($i = 0; $i < $num_aulas;$i++){
        $array_aux = array();
        $array_aux['MateriaID'] = $materias_ids[$i];
        $array_aux['NomeMateria'] = $materias_aulas[$materias_ids[$i]];
        $array_aux['Cpf'] = $cpfs_array[$i];
        $array_aux['NomeAluno'] = $cpfs_nomes_array[$cpfs_array[$i]];
        $array_aux['SolicitacaoID'] = $solicitacoesIDs[$i];
        array_push($aulas,$array_aux);
    }
?>

<div class="aulas index large-9 medium-8 columns content">
    <h3><?= __('Aulas') ?></h3>
    <?= $this->Form->create() ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('Aluno') ?></th>
                <th scope="col"><?= __('CPF') ?></th>
                <th scope="col"><?= __('Materia') ?></th>
                <th scope="col"><?= __('Materia ID') ?></th>
                <th scope="col" class="actions"><?= __('Ação') ?></th>
            </tr>
        </thead>
        
        <tbody>    
            <fieldset>
            <?php if(empty($aulas)){
                 echo "<div align='center'><p>Todas as solicitacoes foram avaliadas!</p></div>";
            }else{
                 foreach ($aulas as $aula): ?>
                    <tr>
                        <td><?= h($aula['NomeAluno']) ?></td>
                        <td><?= h($aula['Cpf']) ?></td>
                        <td><?= h($aula['NomeMateria']) ?></td>
                        <td><?= h($aula['MateriaID']) ?></td>
                        <td class="actions">
                            <?php
                                echo $this->Form->control('Autorizar',[
                                    'type'=>'checkbox',
                                    'id'=>'aula'.$aula['SolicitacaoID'],
                                    'name'=>'validarAula'.$aula['SolicitacaoID'],
                                    'value'=>'true',
                                ]);
                                echo $this->Form->control('Recusar',[
                                    'type'=>'checkbox',
                                    'id'=>'aula'.$aula['SolicitacaoID'],
                                    'name'=>'recusarAula'.$aula['SolicitacaoID'],
                                    'value'=>'true'
                                ]);
                            ?>
                        </td>
                    </tr>
                <?php endforeach;}; ?>
            </fieldset>
        </tbody>
    </table>
    <?php if(!empty($aulas)){ ?>
        <?= $this->Form->button(__('Salvar')) ?>
    <?php }; ?>
    <?= $this->Form->end() ?>
</div>
