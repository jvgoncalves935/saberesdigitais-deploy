<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno[]|\Cake\Collection\CollectionInterface $alunos
 */
?>
<head>
    <?= $this->Html->css('alunos.css') ?>
</head>
<div class="alunos index large-9 medium-8 columns content">
    <h3><?= h("Alunos de ".$nomeEscola) ?></h3>
    
    <?php foreach ($alunos as $aluno): ?>
    
    <span style='display:block; float:right;'>
        <table class="tabela-alunos-sbr-dg">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <td class="td-imagem-sbr-dg">
                        <span style='display:block; float:left;'>
                            <?php echo $this->Html->image($usuarios[$aluno->CpfAluno]['ArquivoImagem'], ['pathPrefix' => $usuarios[$aluno->CpfAluno]['DiretorioImagem'],'width'=>'256px','height'=>'256px']); ?>
                        </span>
                    </td>
                    <td>
                        <table class="tabela-informacoes">
                            <tr><td class="td-nome-sbr-dg"><?= h("Nome: ".$usuarios[$aluno->CpfAluno]['Nome']) ?></td></tr>
                            <tr><td class="td-email-sbr-dg"><?= h("Email: ".$usuarios[$aluno->CpfAluno]['Email']) ?></td></tr>
                            <tr><td class="td-lvl-sbr-dg"><?= h("LVL: ".$aluno->Level) ?></td></tr>
                            <tr><td class="td-exp-sbr-dg"><?= h("EXP: ".$aluno->EXPTotal) ?></td></tr>
                            <tr><td class="td-perfil-sbr-dg"><?= $this->Html->link(__('Ver Perfil'), ['controller' => 'alunos', 'action' => 'perfil',$usuarios[$aluno->CpfAluno]['ID']]); ?></td></tr>
                        </table>
                    </td>
                </tr>
                <br><br>
                    
            </tbody>
        </table>
    </span>
    <?php endforeach; ?>
</div>
