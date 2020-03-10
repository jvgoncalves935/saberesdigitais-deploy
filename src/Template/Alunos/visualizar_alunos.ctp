<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno[]|\Cake\Collection\CollectionInterface $alunos
 */
?>
<div class="alunos index large-9 medium-8 columns content">
    <h3><?= h("Alunos de ".$nomeEscola) ?></h3>
    
    <?php foreach ($alunos as $aluno): ?>
    <span style='display:block; float:left;'>
        <?php echo $this->Html->image($usuarios[$aluno->CpfAluno]['ArquivoImagem'], ['pathPrefix' => $usuarios[$aluno->CpfAluno]['DiretorioImagem']]); ?>
    </span>
    <span style='display:block; float:right;'>
        <table style="width:100%">
            <thead>

            </thead>
            <tbody>
                    <tr>
                        <td><?= h("Nome: ".$usuarios[$aluno->CpfAluno]['Nome']) ?></td>
                        <td><?= h("Email: ".$usuarios[$aluno->CpfAluno]['Email']) ?></td>
                    </tr>
                    <tr>
                        <td><?= h("LVL: ".$aluno->Level) ?></td>
                        <td><?= h("EXP: ".$aluno->EXPTotal) ?></td>
                        <td><?= $this->Html->link(__('Ver Perfil'), ['controller' => 'alunos', 'action' => 'perfil',$usuarios[$aluno->CpfAluno]['ID']]); ?></td>
                    </tr>
                    <br><br>
                    
            </tbody>
        </table>
    </span>
    <?php endforeach; ?>
</div>
