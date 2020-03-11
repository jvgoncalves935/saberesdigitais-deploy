<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aula $aula
 */
    use Cake\ORM\TableRegistry;

    $query = TableRegistry::get('cursos')->find();
    $query = TableRegistry::getTableLocator()->get('cursos')->find();

    $cursos = array();
    foreach ($query as $curso) {
        $cursos[$curso['CursoID']] = $curso['Nome'];
    }
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
            url: "http://saberesdigitais.darlinton.net/aulas/search",
            data: {cursoID:data},
            success:function(response){
                limparListaMaterias(select);
                var json = JSON.parse(response);
                var materias = {};
                for(var i=0, mat; i < json.length; i++){
                    mat = json[i];
                    materias[mat.id] = mat;
                }
                
                $.each(materias, function(key, value) {   
                    $('#'+idComboBox)
                        .append($("<option></option>")
                                    .attr("value",key)
                                    .text(value['nome'])); 
                });
            }
        });
        if(idComboBox == "materiaRequisitoIDComboBox"){
            //pesquisarRequisitos(cursoID,idComboBox);
        }
    }

    function pesquisarRequisitos(materiaID,idComboBox){
        var data = materiaID;
        var select = document.getElementById(idComboBox);
        
        limparListaMaterias(select);
        estadoCarregandoListaMaterias(select);
        
        $.ajax({
            method:'get',
            url: "http://saberesdigitais.darlinton.net/requisitos/search",
            data: {materiaID:data},
            success:function(response){
                limparListaMaterias(select);
                var json = JSON.parse(response);
                var materias = {};
                for(var i=0, mat; i < json.length; i++){
                    mat = json[i];
                    materias[mat.id] = mat;
                }
                
                $.each(materias, function(key, value) {   
                    $('#'+idComboBox)
                        .append($("<option></option>")
                                    .attr("value",key)
                                    .text(value['nome'])); 
                });
            }
        });
    }
</script>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Visualizar Aulas'), ['controller'=>'Aulas','action' => 'index']) ?></li>
    </ul>
</nav>
<div class="aulas form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Adicionar Requisitos') ?></legend>
        <?php
            echo $this->Form->control('Curso',[
                'type'=>'select',
                'id'=>'cursoIDComboBox',
                'name'=>'CursoID',
                'options'=>$cursos,
                'onchange'=>'pesquisarMaterias(this.value,"materiaIDComboBox")'
            ]);
            echo $this->Form->control('Materia',[
                'type'=>'select',
                'id'=>'materiaIDComboBox',
                'name'=>'MateriaID',
                'options'=>['-1'=>'(Selecione um curso)'],
                'onchange'=>'pesquisarRequisitos(this.value,"listaRequisitos")'
            ]);
            echo $this->Form->control('Curso do Pré-Requisito',[
                'type'=>'select',
                'id'=>'cursoRequisitoIDComboBox',
                'name'=>'CursoRequisitoID',
                'options'=>$cursos,
                'onchange'=>'pesquisarMaterias(this.value,"materiaRequisitoIDComboBox")'
            ]);
            echo $this->Form->control('Materia (Pré-Requisito)',[
                'type'=>'select',
                'id'=>'materiaRequisitoIDComboBox',
                'name'=>'MateriaRequisitoID',
                'options'=>['-1'=>'(Selecione um curso)']
            ]);
        ?>
        <div class="select">
            <label for="listaRequisitos">Lista Atual de Requisitos</label>
            <select id="listaRequisitos" multiple>
                <option>(Nenhuma matéria selecionada)</option>
            </select>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
