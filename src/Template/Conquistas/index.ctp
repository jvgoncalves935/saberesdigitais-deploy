<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $conquistas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Lista de Conquistas da Plataforma'), ['action' => 'lista_conquistas']) ?></li>
    </ul>
</nav>
<div class="conquistas index large-9 medium-8 columns content">
    <h3><?= __('Conquistas de '.$nomeAluno) ?></h3>
    <?php if(empty($conquistas)){
        echo "<div align='center'><p>Você ainda não desbloqueou nenhuma conquista!</p></div>";
    }else{
        foreach ($conquistas as $conquista): ?>
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
                    <br><br> 
                </tbody>
            </table>
        </span>
        <?php endforeach;}; ?>
</div>
