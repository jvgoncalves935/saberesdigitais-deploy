<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno[]|\Cake\Collection\CollectionInterface $alunos
 */
?>
<div class="alunos index large-9 medium-8 columns content">
    <h3><?= h("Página Inicial") ?></h3>
    <div align="center">
        <p>Seja bem vindo ao Projeto Saberes Digitais, uma plataforma de acompanhamento personalizado de estudos. A Plataforma disponibiliza cursos de Informática (como o Curso de App Inventor).</p>
    </div>
    <span style='display:block; float:left;'>
        <?php echo $this->Html->image("saberesdigitais01.png", ['pathPrefix' => "webroot/img/saberesdigitais_pagina_inicial/"]); ?>
    </span>
    <span style='display:block; float:right;'>
        <p>O projeto já participou do Colégio Atus em 2020.</p>
    </span>
</div>
