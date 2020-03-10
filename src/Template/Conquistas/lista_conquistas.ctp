<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $conquistas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        
    </ul>
</nav>
<div class="conquistas index large-9 medium-8 columns content">
    <h3><?= h("Lista de Conquistas") ?></h3>
    
    <?php foreach ($conquistas as $conquista): ?>
    <span style='display:block; float:left;'>
        <?php echo $this->Html->image($conquista['ConquistaID'].".png", ['pathPrefix' => "webroot/img/conquistas_img/fullsize/"]); ?>
    </span>
    <span style='display:block; float:right;'>
        <table style="width:100%">
            <thead>

            </thead>
            <tbody>
                    <tr>
                        <td><?= h("Nome: ".$conquista['Nome']) ?></td>
                    </tr>
                    <tr>
                        <td><?= h("Descrição: ".$conquista['Descricao']) ?></td>
                    </tr>
                    <tr>
                        <td><?= h("EXP: ".$conquista['EXPConquista']) ?></td>
                    </tr>
                    <br><br>
                    
            </tbody>
        </table>
    </span>
    <?php endforeach; ?>
</div>
