<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno[]|\Cake\Collection\CollectionInterface $alunos
 */
?>
<div class="alunos index large-9 medium-8 columns content">
    <h3><?= h("Perfil de ".$usuario->Nome) ?></h3>
    <span style='display:block; float:left;'>
        <?php echo $this->Html->image($arquivoImagem, ['pathPrefix' => $diretorioImagem]); ?>
    </span>
    <span style='display:block; float:right;'>
        <table style="width:100%">
            <thead>

            </thead>
            <tbody>
                    
                    <tr>
                        <td><?= h("Nome: ".$usuario->Nome) ?></td>
                    </tr>
                    <tr>
                        <td><?= h("CPF: ".$usuario->Cpf) ?></td>
                    </tr>
                    <tr>
                        <td><?= h("Email: ".$usuario->Email) ?></td>
                    </tr>
                    <tr>
                        <td><?= h("Genero: ".$usuario->Genero) ?></td>
                    </tr>
                    <tr>
                        <td><?= h("Tutor: ".$tutor->Nome) ?></td>
                    </tr>
                    <tr>
                        <td><?= h("Escola: ".$escola->Nome) ?></td>
                    </tr>
                    <tr>
                        <td><?= h("Level: ".$aluno->Level) ?></td>
                    </tr>
                    <tr>
                        <td><?= h("EXP: ".$aluno->EXPTotal) ?></td>
                    </tr>
                    <tr>
                        <table id="progresso_xp">
                            <tr><span style='background-color:#F5AA42;display:block;width:<?= h($porcentagemLevel) ?>%'><?= h("[".$aluno->EXPTotal."/".$xpProximoLevelNormal."]") ?></span></tr>
                        </table>
                    </tr>
                    <?php if($selfUser){ ?>
                    <tr>
                        <td><?= $this->Html->link(__('Editar Perfil'), ['controller' => 'alunos', 'action' => 'editarPerfil']); ?></td>
                    </tr>
                    <?php ;} ?>
                    </br></br>
                    <tr>
                        <h3><?= h("Lista de Conquistas") ?></h3>
                    </tr>
                    <?php if(empty($listaConquistas)){
                                echo "<div align='center'><p>Nenhuma conquista desbloqueada.</p></div>";
                            }else{ foreach ($listaConquistas as $conquistaID): ?>
                        <table cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td><?php echo $this->Html->image($conquistaID.".png", ['pathPrefix' => $diretorioImagemConquistas]); ?><td>
                                </tr>
                                <tr>
                                    <td><?= h($nomesConquistas[$conquistaID]) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endforeach;}; ?>
            </tbody>
        </table>
    </span>
</div>
