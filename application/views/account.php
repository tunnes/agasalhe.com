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
        <!-- Internal file resources -->
        <link rel="stylesheet" type="text/css" href="/application/assets/css/account.css">
        <script type="text/javascript" src="/application/assets/js/items.js"></script>
        <!-- Navbar components -->
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_navbar.css">
        <script type="text/javascript" src="/application/assets/js/components/_navbar.js"></script>
        <!-- Another control and meta-tags -->
        <link rel="shortcut icon" href="/application/assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="/application/assets/imgx-icon">
        <meta charset="UTF-8">
        <title>Account</title>
    </head>
    <body>
        <header class="subpage-header">
            <h2>Painel do usuário</h2>
        </header>
        <ul id="slide-out" class="side-nav fixed account-sidebar">
            <li>
                <div class="user-view">
                    <div class="background">
                    </div>
                    <a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
                    <a href="#!name"><span class="white-text name">John Doe</span></a>
                    <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
                </div>
            </li>
            <li>
                <a href="#!">Pesquisar Itens</a>
            </li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a class="subheader">Minha conta</a></li>
            <li>
                <a class="waves-effect" href="#!">Inicio</a>
            </li>
            <li>
                <a class="waves-effect" href="#!">Cadastro</a>
            </li>            
            <li>
                <a class="waves-effect" href="#!">Itens</a>
            </li>                      
            <li>
                <a class="waves-effect" href="#!">Trocas</a>
            </li>                                  
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        <div class="power-by">
            © Copyright 2017 - Feito com <span> < 3 </span> por Time ainda sem nome.
        </div>
    </body>
</html>