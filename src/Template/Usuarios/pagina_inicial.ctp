<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aluno[]|\Cake\Collection\CollectionInterface $alunos
 */
?>
<head>
    <?= $this->Html->css('paginainicial.css') ?>
</head>

<div class="paginainicialdiv">
    <div class="paginainicialdivimg">
        <!-- <img src="/saberesdigitais-deploy/webroot/img/saberesdigitais_pagina_inicial/banner_sbr.jpg" style="width:100%;height:400px;"/> -->
        <?php echo $this->Html->image("banner_sbr.jpg", ['pathPrefix' => "webroot/img/saberesdigitais_pagina_inicial/",'style'=>'width:100%;height:220px;']); ?>
    </div>
    
    <div class="paginainicialtext">
        <h1><?= h("Sobre o Projeto") ?></h1>
        <p>O Projeto Saberes Digitais é uma iniciativa do Grupo SI3 da Universidade Federal de São João Del Rei de disponibilizar gratuitamente para alunos do Ensino Fundamental II e Ensino Médio cursos básicos de Computação.
        <p>No momento, o projeto já contou com a participação dos alunos das seguintes escolas:</p>
        <p>-Escola Atus (São João Del Rei - MG)<br/>-Escola Estadual Professor Alberto Vieira Pereira (Barbacena - MG)</p>
    </div>
    <div class="paginainicialtext">
        <h1><?= h("Motivação") ?></h1>
        <p>Ter o conhecimento e destreza para utilizar as novas tecnologias que surgem no mercado são essenciais para toda a população, seja para uso profissonal ou pessoal. O objetivo deste projeto é dar a oportunidade ao conhecimento para qualquer pessoa - sem burocracia e de forma gratuita.</p>
    </div>
</div>
