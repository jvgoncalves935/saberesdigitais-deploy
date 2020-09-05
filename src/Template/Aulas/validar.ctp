<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aula $aula
 */
    use \Cake\Http\Session;
    use Cake\ORM\TableRegistry;

    if(isset($_POST['submit'])){
       //debug("teste"); 
    }

    $query_aulas = TableRegistry::get('aulas')->find();
    $query_aulas = TableRegistry::getTableLocator()->get('aulas')->find()->where(['Validada' => false]);

    //CPFs não repetidos
    $cpfs = array();
    $materias_ids = array();
    $aulas_ids = array();
    
    //CPFs de quem fez as aulas
    $cpfs_aulas = array();

    foreach($query_aulas as $cpf){
        if(empty($cpfs[$cpf['Cpf']])){
            $cpfs[$cpf['Cpf']] = $cpf['Cpf'];
        }
        array_push($cpfs_aulas,$cpf['Cpf']);
        array_push($materias_ids,$cpf['MateriaID']);
        array_push($aulas_ids,$cpf['ID']);
    }
    $cpfs_array = array_values($cpfs);

    if(!empty($materias_ids)){
        $query_materias = TableRegistry::get('materias')->find();
        $query_materias = TableRegistry::getTableLocator()->get('materias')->find()->select(['MateriaID','Nome'])->where(['MateriaID IN' => $materias_ids]);
        
        $materias_aulas = array();
        foreach($query_materias as $materia){
            $materias_aulas[$materia['MateriaID']] = $materia['Nome'];
        }
    }
    
    
    //debug($aulas_ids);
    //debug($materias_ids);
    //debug($materias_aulas);

    if(!empty($cpfs_array)){
        $query_nomes = TableRegistry::get('usuarios')->find();
        $query_nomes = TableRegistry::getTableLocator()->get('usuarios')->find()->select(['Cpf','Nome'])->where(['Cpf IN' => $cpfs_array]);
    
        //Nomes
        $cpfs_nomes_array = array();
        foreach($query_nomes as $nome){
            $cpfs_nomes_array[$nome['Cpf']] = $nome['Nome'];
        }

        $aulas = array();
        $num_aulas = count($cpfs_aulas);
        for($i = 0; $i < $num_aulas;$i++){
            $array_aux = array();
            $array_aux['MateriaID'] = $materias_ids[$i];
            $array_aux['NomeMateria'] = $materias_aulas[$materias_ids[$i]];
            $array_aux['Cpf'] = $cpfs_aulas[$i];
            $array_aux['NomeAluno'] = $cpfs_nomes_array[$cpfs_aulas[$i]];
            $array_aux['AulaID'] = $aulas_ids[$i];
            array_push($aulas,$array_aux);
        }
    }
    
    

    //debug($cpfs_aulas);
    //debug($cpfs_nomes_array);

    
?>

<div class="aulas index large-9 medium-8 columns content">
    <h3><?= __('Validar Aulas') ?></h3>
    <?= $this->Form->create() ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('Aluno') ?></th>
                <th scope="col"><?= __('CPF') ?></th>
                <th scope="col"><?= __('Materia') ?></th>
                <th scope="col"><?= __('Curso') ?></th>
                <th scope="col" class="actions"><?= __('Ação') ?></th>
            </tr>
        </thead>
        
        <tbody>    
            <fieldset>
            <?php if(empty($aulas)){
                 echo "<div align='center'><p>Todas as aulas foram avaliadas!</p></div>";
            }else{
                foreach ($aulas as $aula): ?>
                    <tr>
                        <td><?= h($aula['NomeAluno']) ?></td>
                        <td><?= h($aula['Cpf']) ?></td>
                        <td><?= h($aula['NomeMateria']) ?></td>
                        <td><?= h($nomesCursos[$cursosMaterias[$aula['MateriaID']]]) ?></td>
                        <td class="actions">
                            <?php
                                echo $this->Form->control('Validar',[
                                    'type'=>'checkbox',
                                    'id'=>'aula'.$aula['AulaID'],
                                    'name'=>'validarAula'.$aula['AulaID'],
                                    'value'=>'true',
                                ]);
                                echo $this->Form->control('Recusar',[
                                    'type'=>'checkbox',
                                    'id'=>'aula'.$aula['AulaID'],
                                    'name'=>'recusarAula'.$aula['AulaID'],
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
