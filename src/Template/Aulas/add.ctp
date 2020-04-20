<script>
    function criarSolicitacao(_materiaID,_cpfAluno){
        var resposta = confirm("Erro: Você não cumpriu todos os requistos desta matéria. Deseja solicitar uma quebra de requisitos desta matéria?");
        if(resposta){
            $.ajax({
                method:'get',
                url: "http://saberesdigitais.darlinton.net/aulas/solicitarautorizacao",
                data: {materiaID:_materiaID,cpfAluno:_cpfAluno},
                success:function(response){
                    
                }
            });
        }
    }
</script>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aula $aula
 */
    use Cake\ORM\TableRegistry;
    use \Cake\Http\Session;

    $query = TableRegistry::get('cursos')->find();
    $query = TableRegistry::getTableLocator()->get('cursos')->find();

    $cursos = array();
    foreach ($query as $curso) {
        $cursos[$curso['CursoID']] = $curso['Nome'];
    }
    //debug(empty($nenhumaSolicitacao));
    //debug($nenhumaSolicitacao);
    if(!empty($_POST['nenhumaSolicitacao']) && $_POST['nenhumaSolicitacao']){
        echo "<script> criarSolicitacao(".$_POST['solicitacaoMateriaID'].",".$_POST['cpfAluno']."); </script>";
    }
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
    
    function pesquisarMaterias(cursoID){
        var data = cursoID;
        var select = document.getElementById('materiaIDComboBox');
        
        limparListaMaterias(select);
        estadoCarregandoListaMaterias(select);
        
        $.ajax({
            method:'get',
            url: "search",
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
                    $('#materiaIDComboBox')
                        .append($("<option></option>")
                                    .attr("value",key)
                                    .text(value['nome'])); 
                });
                //for(var materia in materias){
                //    var opt = document.createElement('option');
                //    opt.value = materia['id'];
                //    opt.innerHTML = materia['nome'];
                //    select.appendChild(opt);
                //}
                //console.log(materias);
                //console.log(materias.length);
            }
        });
    }
    function verificarAutorizacaoAulas(materiaID){
        $.ajax({
            method:'get',
            url: "http://saberesdigitais.darlinton.net/aulas/verificar-autorizacao-aulas",
            data: {materiaID:data},
            success:function(response){
                var json = JSON.parse(response);
                alert(response);
            }
        });
    }
</script>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Visualizar Aulas'), ['controller'=>'Aulas','action' => 'index']) ?></li>
    </ul>
</nav>
<div class="aulas form large-9 medium-8 columns content">
    <?= $this->Form->create($aula) ?>
    <fieldset>
        <legend><?= __('Cadastrar Aula') ?></legend>
        <?php
            echo $this->Form->control('CursoID',[
                'label'=>'Curso',
                'type'=>'select',
                'id'=>'cursoIDComboBox',
                'options'=>$cursos,
                'onchange'=>'pesquisarMaterias(this.value)'
            ]);
            echo $this->Form->control('MateriaID',[
                'label'=>'Matéria',
                'type'=>'select',
                'id'=>'materiaIDComboBox',
                'options'=>['-1'=>'(Selecione um curso)']
            ]);
            echo $this->Form->control('Pergunta01',[
                'type'=>'radio',
                'label'=>'Pergunta 1: Qual nota você daria para a qualidade do conteúdo desta aula?',
                'id'=>'pergunta01RadioGroup',
                'options'=>[
                        '1' => '1 (Muito ruim)',
                        '2' => '2 (Ruim)',
                        '3' => '3 (Mediano)',
                        '4' => '4 (Bom)',
                        '5' => '5 (Muito bom)'
                    ]   
                ]
            );
            //echo $this->Form->control('Pergunta01');
            echo $this->Form->control('Pergunta02',[
                'type'=>'radio',
                'label'=>'Pergunta 2: Qual foi a sua dificuldade em relação ao aprendizado do conteúdo desta aula?',
                'id'=>'pergunta02RadioGroup',
                'options'=>[
                        '1' => '1 (Muito difícil)',
                        '2' => '2 (Difícil)',
                        '3' => '3 (Mediano)',
                        '4' => '4 (Fácil)',
                        '5' => '5 (Muito fácil)'
                    ]   
                ]
            );
            echo $this->Form->control('Pergunta03',[
                'type'=>'radio',
                'label'=>'Pergunta 3: Qual nota você daria para esta aula?',
                'id'=>'pergunta03RadioGroup',
                'options'=>[
                        '1' => '1 (Muito ruim)',
                        '2' => '2 (Ruim)',
                        '3' => '3 (Mediano)',
                        '4' => '4 (Boa)',
                        '5' => '5 (Muito boa)'
                    ]   
                ]
            );
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
