<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tutore[]|\Cake\Collection\CollectionInterface $tutores
 */
?>

<div class="aulas index large-9 medium-8 columns content">
    <h3><?= __('Relatório') ?></h3>
    <?php if(empty($perfisArrays)){
                 echo "<div align='center'><p>Você não possui aulas cadastradas!</p></div>";
            }else{  ?>
        <?php foreach($perfisArrays as $chave=>$perfil): ?>
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><?= h($nomesPerfis[$chave])?></td>
                    </tr>
                    <?php foreach($perfil as $nomeAluno): ?>
                        <tr><td><?= h($nomeAluno)?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach;}; ?>
</div>