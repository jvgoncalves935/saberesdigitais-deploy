<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Curso[]|\Cake\Collection\CollectionInterface $cursos
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
    //debug($nomeCursoHeader);
?>

<script>
    function limparListaMaterias(select){
        for(var i = select.options.length - 1 ; i >= 0 ; i--){
            select.remove(i);
        }
    }

    function estadoCarregandoListaMaterias(select){
        var opt = document.createElement('option');
        opt.innerHTML = "(Carregando...)";
        select.appendChild(opt);
    }
    
    function pesquisarMaterias(cursoID,idComboBox){
        var data = cursoID;
        var select = document.getElementById(idComboBox);
        
        limparListaMaterias(select);
        estadoCarregandoListaMaterias(select);
        
        $.ajax({
            method:'get',
            url: "/saberesdigitais.darlinton.net/cursos",
            data: {cursoID:data},
            success:function(response){
                
            }
        });
    }
</script>

<?php if($isAdmin || $isTutor){ ?>
    <nav class="large-3 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
            <li class="heading"><?= __('Actions') ?></li>
            <li><?= $this->Html->link(__('Adicionar Curso'), ['action' => 'add']) ?></li>
        </ul>
    </nav>
<?php ;} ?>
<div class="aulas form large-9 medium-8 columns content">
    <h3><?= __('Lista de Matérias') ?></h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Cursos') ?></legend>
        <?php
            echo $this->Form->control('',[
                'type'=>'select',
                'id'=>'cursoIDComboBox',
                'name'=>'CursoID',
                'options'=>$nomeCursos
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Consultar')) ?>
    <?= $this->Form->end() ?>
</div>

<div class="cursos index large-9 medium-8 columns content">
    <h3><?php if(!empty($nomeCursoHeader)){ echo ($nomeCursoHeader);}; ?></h3>
    <?php if($flagPaginate){ ?>
        <h7><?= h("Tags do Curso: ".$tiposCursos) ?></h7>
    <?php }; ?>
    </br></br>
    
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Matérias') ?></th>
                <th scope="col"><?= $this->Paginator->sort('EXPMateria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Requisitos') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if($flagPaginate){ ?>
            <?php foreach ($materias as $materia): ?>
            <tr>
                <td><?= h($materia->Nome) ?></td>
                <td><?= $this->Number->format($materia->EXPMateria) ?></td>
                <?php foreach ($requisitos[$materia['MateriaID']] as $requisito): ?>
                    <td><?= h($requisito) ?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
            <?php }; ?>
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
