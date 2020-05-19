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
    <h3><?= h("Perfil de ".$usuario->Nome) ?></h3>
    <span style='display:block; float:right;'>
        <table style="width:100%">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <td class="td-imagem-sbr-dg">
                        <span style='display:block; float:left;'>
                            <?php echo $this->Html->image($arquivoImagem, ['pathPrefix' => $diretorioImagem,'style'=>'width:256px;height:256px;']); ?>
                        </span>
                    </td>
                    <td>
                        <table class="tabela-informacoes">
                            <tr><td><?= h("Nome: ".$usuario->Nome) ?></td></tr>
                            <tr><td><?= h("CPF: ".$usuario->Cpf) ?></td></tr>
                            <tr><td><?= h("Email: ".$usuario->Email) ?></td></tr>
                            <tr><td><?= h("Genero: ".$usuario->Genero) ?></td></tr>
                            <tr><td><?= h("Tutor: ".$tutor->Nome) ?></td></tr>
                            <tr><td><?= h("Escola: ".$escola->Nome) ?></td></tr>
                            <tr><td><?= h("Level: ".$aluno->Level) ?></td></tr>
                            <tr><td><?= h("EXP: ".$aluno->EXPTotal.", Prox. LVL: ".$xpProximoLevelNormal) ?></td></tr>
                            
                            <tr>
                                <td>
                                    <table id="progresso_xp">
                                        <tr>
                                            <td style="width:100%;height:100%;">
                                                <progress style="width:100%;" max="100" value="<?= h($porcentagemLevel) ?>"></progress>
                                                
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php if($selfUser){ ?>
                                <tr><td><?= $this->Html->link(__('Editar Perfil'), ['controller' => 'alunos', 'action' => 'editarPerfil']); ?></td></tr>
                            <?php ;} ?>
                            
                            </br></br>
                        </table>
                    </td>
                </tr>
                <tr><td style='display:block;width:100%;'><h3><?= h("Lista de Conquistas") ?></h3></td></tr>
                <tr>
                    <td>
                        <?php if(empty($listaConquistas)){
                                    echo "<div align='center' style='width:100%;'><p>Nenhuma conquista desbloqueada.</p></div>";
                                }else{ foreach ($listaConquistas as $conquistaID): ?>
                            <table cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td><?php echo $this->Html->image($conquistaID.".png", ['pathPrefix' => $diretorioImagemConquistas,'style'=>'width:256px;height:256px;']); ?><td>
                                    </tr>
                                    <tr>
                                        <td><?= h($nomesConquistas[$conquistaID]) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endforeach;}; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </span>
</div>
