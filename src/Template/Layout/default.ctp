<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
    use \Cake\Http\Session;
    use Cake\ORM\TableRegistry;

    $session = new Session();
    $email = $session->consume('Auth.User.Email');
    $senha = $session->consume('Auth.User.Senha');

    $logIn = false;
    if($email != null){
        $logIn = true;
    }

    $query = TableRegistry::get('usuarios')->find();
    $query = TableRegistry::getTableLocator()->get('usuarios')->find()
                                                              ->where(['Email' => $email])
                                                              ->where(['Senha' => $senha])
                                                              ->first();
    $cpf = $query['Cpf'];
    $nome = $query['Nome'];
    $idUser = $query['ID'];

    $query = TableRegistry::get('administradores')->find();
    $query = TableRegistry::getTableLocator()->get('administradores')->find()
                                                              ->where(['Cpf' => $cpf])
                                                              ->first();
    $isAdmin = false;
    if($query != null){
        $isAdmin = true;
    }

    $query = TableRegistry::get('tutores')->find();
    $query = TableRegistry::getTableLocator()->get('tutores')->find()
                                                              ->where(['Cpf' => $cpf])
                                                              ->first();
    $isTutor = false;
    if($query != null){
        $isTutor = true;
    }

    $query = TableRegistry::get('alunos')->find();
    $query = TableRegistry::getTableLocator()->get('alunos')->find()
                                                              ->where(['CpfAluno' => $cpf])
                                                              ->first();
    
    $level = $query['Level'];

    $cakeDescription = 'Plataforma Saberes Digitais';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<body>
    <?php if($logIn){ ?>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $nome .', Level ' . $level ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="left">
                <li>
                    <?= $this->Html->link(__('Início'), ['controller' => 'usuarios', 'action' => 'pagina_inicial']); ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Perfil'), ['controller' => 'alunos', 'action' => 'perfil',$idUser]); ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Aulas'), ['controller' => 'aulas', 'action' => 'index']); ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Escola'), ['controller' => 'alunos', 'action' => 'visualizar_alunos']); ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Conquistas'), ['controller' => 'conquistas', 'action' => 'index']); ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Cursos'), ['controller' => 'cursos', 'action' => 'index']); ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Recomendações'), ['controller' => 'alunos', 'action' => 'recomendacoes']); ?>
                </li>
                <?php if($isAdmin || $isTutor){ ?>
                    <li>
                        <?= $this->Html->link(__('Validar Aulas'), ['controller' => 'aulas', 'action' => 'validar']); ?>
                    </li>
                    <li>
                        <?= $this->Html->link(__('Solicitações'), ['controller' => 'aulas', 'action' => 'solicitacoes']); ?>
                    </li>
                    <li>
                        <?= $this->Html->link(__('Gerenciar Escolas'), ['controller' => 'escolas', 'action' => 'index']); ?>
                    </li>
                    <li>
                        <?= $this->Html->link(__('Matérias'), ['controller' => 'materias', 'action' => 'index']); ?>
                    </li>
                    <li>
                        <?= $this->Html->link(__('Requisitos'), ['controller' => 'requisitos', 'action' => 'index']); ?>
                    </li>
                    <li>
                        <?= $this->Html->link(__('Tutores'), ['controller' => 'tutores', 'action' => 'index']); ?>
                    </li>
                    <li>
                        <?= $this->Html->link(__('Usuários'), ['controller' => 'usuarios', 'action' => 'index']); ?>
                    </li>
                <?php ;} ?>
            </ul>
            <ul class="right">
                <li>
                    <?= $this->Html->link(__('Sair'), ['controller' => 'usuarios', 'action' => 'logout']); ?>
                </li>
            </ul>
        </div>
    </nav>
    <?php ;} ?>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        <div id="footer" align="center">
            <br><br><br>
            <p style="font-size:10px">Plataforma Saberes Digitais. Desenvolvida por: João Vítor Gonçalves. Laboratório de Engenharia de Software -  Universidade Federal de São João Del Rei. 2020.</p>
        </div>
    </footer>
</body>
</html>
