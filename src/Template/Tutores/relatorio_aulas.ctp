<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tutore[]|\Cake\Collection\CollectionInterface $tutores
 */
?>

<div class="aulas index large-9 medium-8 columns content">
    <h3><?= __('Relatório') ?></h3>
    <?php if(empty($aulasArray)){
                 echo "<div align='center'><p>Você não possui aulas cadastradas!</p></div>";
            }else{  ?>
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <?php foreach($aulasArray as $aula): ?>
                    <tr>
                        <td><?= h($usuariosIDs[$aula['Cpf']].";".
                        $materiasIDs[$aula['MateriaID']].";".
                        $cursosIDs[$materiasCursos[$aula['MateriaID']]].";".
                        $aula['Pergunta01'].";".
                        $aula['Pergunta02'].";".
                        $aula['Pergunta03'].";") ?></td>
                        
                    </tr>
                    <?php endforeach;}; ?>
            </tbody>
        </table>
</div>