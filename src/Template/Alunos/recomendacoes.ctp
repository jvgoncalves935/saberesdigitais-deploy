<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno[]|\Cake\Collection\CollectionInterface $alunos
 */
     
?>
<div class="alunos index large-9 medium-8 columns content">
    <h3><?= h("Cursos Recomendados") ?></h3>
    <?php if(!empty($cursosRecomendados)){ ?>
        <table style="width:100%">
            <thead>

            </thead>
            <tbody>
                <?php foreach ($cursosRecomendados as $idCurso=>$nomeCurso): ?>
                    <tr>
                        <td><?= h($nomeCurso) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php }else{ ?>
        <p>Para receber recomendações da plataforma, é necessário que você responda nosso 
        <?php echo $this->Html->link("questionário",["controller" => "alunos","action" => "questionario"]); ?>.</p>
    <?php }; ?>
    
    </br></br>
    <h3><?= h("Cursos Mais Acessados") ?></h3>
    <table style="width:100%">
        <thead>

        </thead>
        <tbody>
            <?php foreach ($cursosModa as $idCurso=>$nomeCurso): ?>
                <tr>
                    <td><?= h($nomeCurso) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
