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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requisito $requisito
 */
?>

<div class="requisitos form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Solicitar Quebra de Requisitos') ?></legend>
        <?php
            echo $this->Form->control('CursoID',[
                'type'=>'select',
                'label'=>'Curso',
                'id'=>'cursoIDComboBox',
                'name'=>'Curso',
                'options'=>$cursos,
                'onchange'=>'pesquisarMaterias(this.value,"materiaIDComboBox")'
            ]);
            echo $this->Form->control('MateriaID',[
                'type'=>'select',
                'label'=>'Matéria',
                'id'=>'materiaIDComboBox',
                'name'=>'Materia',
                'options'=>$materias
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
