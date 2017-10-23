<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Jquery CND -->
        <script	src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
        <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
        <!-- Materialize CND -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
        <script src="https://unpkg.com/vue@2.4.4/dist/vue.js"></script>
        <!-- Account resources files  -->
        <link rel="stylesheet" type="text/css" href="/application/assets/css/account.css">
        <script type="text/javascript" src="/application/assets/js/account.js"></script>
        <!-- Another control and meta-tags -->
        <link rel="shortcut icon" href="/application/assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="/application/assets/imgx-icon">
        <meta charset="UTF-8">
        <title>Account</title>
    </head>
    <body>
        <header class="subpage-header">
            <div class="container">
                <div class="col s12">
                    <img src="/application/assets/img/header-logo.png">
                    <h2>
                        swapage <br>
                        Painel do usuário
                    </h2>
                </div>
            </div>
        </header>
        <main class="container">
            <div id="account-controller">
                <ul id="slide-out" class="side-nav fixed account-sidebar">
                    <li>
                        <div class="user-view">
                            <a href="#!user"><img class="circle" src="http://via.placeholder.com/64x64"></a>
                            <span class="user-infomations">
                                <span class="name">John Doe</span>
                                <span class="email">jdandturk@gmail.com</span>
                            </span>
                        </div>
                    </li>
                    <div class="divider"></div>
                    </li>
                    <li><a class="subheader">Minha conta</a></li>
                    <li>
                        <a href="items">Pesquisar Itens</a>
                    </li>
                    <li>
                        <a class="waves-effect waves-red" href="#!" v-on:click="showAccountRegister()">Cadastro</a>
                    </li>
                    <li>
                        <a class="waves-effect waves-red" href="#!" v-on:click="showMyItens()">Itens</a>
                    </li>
                    <li>
                        <a class="waves-effect waves-red" href="#!" v-on:click="showMyLikes()">Curtidas</a>
                    </li>
                    <li>
                        <a class="waves-effect waves-red" href="#!" v-on:click="showMyWishes()">Desejos</a>
                    </li> 
                    <li>
                        <a class="waves-effect waves-red" href="#!" v-on:click="showTrades()">Trocas</a>
                    </li>
                    <li>
                        <a class="waves-effect waves-red" href="/">Sair</a>
                    </li>
                </ul>
                <div class="mobile-user-view">
                    <a href="#" data-activates="slide-out" class="button-collapse trigger-sidenav">
                        <i class="material-icons">menu</i>
                        <img class="circle" src="http://via.placeholder.com/64x64">
                    </a>
                    <span class="user-infomations"> 
                        <a href="#!name"><span class="name">John Doe</span></a>
                        <a href="#!email"><span class="email">jdandturk@gmail.com</span></a>
                    </span>
                </div>
                <div class="sidebar-options-wrapper">
                    <!-- Option update register -->
                    <div class="update-register active-option">
                        <h3 class="section-title">Editar Cadastro</h3>
                        <div class="row">
                            <div class="input-field col s12 ">
                                <input id="email" type="text" class="validate">
                                <label for="email" data-error="wrong" data-success="right">Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="email" type="text" class="validate">
                                <label for="email" data-error="wrong" data-success="right">Nick</label>
                            </div>
                            <div class="date-field col s6 ">
                                <input type="text" class="datepicker" value="Aniversário">
                            </div>
                            <div class="file-field input-field col s7 ">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-field col s5 ">
                                <input id="email" type="text" class="validate">
                                <label for="email" data-error="wrong" data-success="right">CEP</label>
                            </div>
                            <div class="input-field col s6 ">
                                <input id="email" type="email" class="validate">
                                <label for="email" data-error="wrong" data-success="right">Email</label>
                            </div>
                            <div class="input-field col s6 ">
                                <input id="email" type="email" class="validate">
                                <label for="email" data-error="wrong" data-success="right">Senha</label>
                            </div>
                        </div>
                        <div class="row">    
                            <a href="#!" class="btn-flat register-button-submmit" style='float: right; margin-right: 10px;'>Salvar edição</a>
                        </div>
                    </div>
                    <!-- Option my items -->
                    <div class="my-items">
                        <h3 class="section-title">Meus itens</h3>
                        <a class="btn-floating btn-large waves-effect waves-light right btn-floating-swapage modal-trigger" href="#register-item-modal"><i class="material-icons">add</i></a>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Titulo</th>
                                    <th>Descrição</th>
                                    <th>Curtidas</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="item-image"></span>
                                    </td>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td class="truncate item-description">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Excluir</span>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="item-image"></span>
                                    </td>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td class="truncate item-description">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Excluir</span>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="item-image"></span>
                                    </td>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td class="truncate item-description">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Excluir</span>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="item-image"></span>
                                    </td>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td class="truncate item-description">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Excluir</span>                                    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Option my trades -->
                    <div class="trades">
                        <h3 class="section-title">Minhas trocas</h3>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Quem?</th>
                                    <th>O que?</th>
                                    <th></th>
                                    <th></th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="chip">
                                            <img src="http://via.placeholder.com/60x60" alt="Contact Person">
                                            <span>Gabriel Morais</span>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="chip">
                                            <img src="http://via.placeholder.com/60x60" alt="Contact Person">
                                            <span>Caixa de lapis</span>
                                        </div>
                                    </td>
                                    <td>
                                        <i class="material-icons">swap_horiz</i>
                                    </td>
                                    <td>
                                        <div class="chip">
                                            <img src="http://via.placeholder.com/60x60" alt="Contact Person">
                                            <span>Caneta maneira</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Aceitar</span>
                                        <span class="item-action-button button-drop">Recusar</span>                                    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Options likes -->
                    <div class="my-likes">
                        <h3 class="section-title">Minhas curtidas</h3>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Curtidas</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Descurtir</span>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Descurtir</span>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Descurtir</span>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Descurtir</span>                                    
                                    </td>
                                </tr>
                            </tbody>
                        </table>                    
                    </div>
                    <!-- Option Wishes -->
                    <div class="my-wishs">
                        <h3 class="section-title">Meus desejos</h3>
                        <table class="responsive-table">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Retirar</span>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Retirar</span>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Retirar</span>                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Bicicleta Trek
                                    </td>
                                    <td>
                                        <span class="item-action-button button-show">Visualizar</span>
                                        <span class="item-action-button button-drop">Retirar</span>                                    
                                    </td>
                                </tr>
                            </tbody>
                        </table>                    
                    </div>
                </div>
                
                <!-- Modal new item -->
                <div id="register-item-modal" class="modal">
                    <div class="modal-content">
                        <h4 class="item-register-title">Novo Item</h4>
                        <div class="row"> 
                            <div class="input-field col s12 m6">
                                <input id="first_name2" type="text" class="validate">
                                <label class="active" for="first_name2">Titulo</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="" disabled selected>Nenhuma</option>
                                    <option value="1">Moveis</option>
                                    <option value="2">Eletronicos</option>
                                    <option value="3">Roupas</option>
                                    <option value="3">Mais serão adicionadas...</option>
                                </select>
                                <label>Categoria</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select>
                                    <option value="3" selected>Usado</option>
                                    <option value="2">Semi-novo</option>
                                    <option value="1">Novo</option>
                                </select>
                                <label>Estado</label>
                            </div>
                            <div class="file-field input-field col s6 ">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="input-field col s12">
                              <textarea id="textarea1" class="materialize-textarea"></textarea>
                              <label for="textarea1">Descrição</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat login-button-close">Cancelar</a>
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat login-button-access">Cadastrar</a>
                    </div>
                </div>
            </div>
        </main>
        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    <div class="copyright-wrapper">
                        <span>© 2017 Copyright - Feito com</span> 
                        <span><i class="material-icons">favorite</i></span>
                        <span>por um time ainda sem nome.</span>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>