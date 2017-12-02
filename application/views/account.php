<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
        <!-- ReactiveX JS -->
        <script src="https://unpkg.com/rxjs/bundles/Rx.min.js"></script>
        <!-- Indexed db -->
        <script src="idb-keyval.js"></script>
        <!-- Jquery CND -->
        <script	src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
        <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
        <!-- Materialize CND -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
        <script src="https://unpkg.com/vue@2.4.4/dist/vue.js"></script>
        
        <!-- Easy Autocomplete -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.min.css" type="text/css" />
        
        <!-- Account resources files  -->
        <link rel="stylesheet" type="text/css" href="/application/assets/css/account.css">
        <script type="text/javascript" src="/application/assets/js/main.js"></script>
        <script type="text/javascript" src="/application/assets/js/components/_chat.js"></script>
        <script type="text/javascript" src="/application/assets/js/account.js"></script>
        <!-- Another control and meta-tags -->
        <link rel="shortcut icon" href="/application/assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="/application/assets/imgx-icon">
        <!-- Kit Firebase Notification -->
        <link rel="manifest" href="/manifest.json">
        <script src="https://www.gstatic.com/firebasejs/4.6.0/firebase.js"></script>
        <script type="text/javascript" src="/application/assets/js/firebase.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account</title>
        
        <!-- Components -->
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/account/_register_item.css">
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/account/_show_items.css">  
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/account/_show_trades.css">
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/account/_show_received.css"> 
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_item.css">
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_chat.css">
        <link rel="stylesheet" type="text/css" href="/application/assets/css/helpers.css">

    </head>
    <body>
        <header class="subpage-header">
            <div class="container">
                <div class="col s12">
                    <!--<img src="/application/assets/img/header-logo.png">-->
                    <!--<h2>-->
                    <!--    trocaqui <br> <?= $this->lang->line('account_menu_h2') ?>-->
                    <!--</h2>-->
                     <!-- Generic Navbar -->
                     <?php include('components/_navbar.php') ?>
                    <!--<a href="#" data-activates="slide-out" class="button-collapse trigger-sidenav">-->
                    <!--    <i class="material-icons account-menu-trigger">menu</i>-->
                    <!--</a>-->
                </div>
            </div>
        </header>
        <main class="container">
            <div id="account-controller">
                <ul id="slide-out" class="side-nav fixed account-sidebar">
                    <li>
                        <div class="user-view">
                            <img class="circle materialboxed" src="<?= $myimage ?>"/>
                            <span class="user-infomations">
                                <span class="name">{{currentUser.username}}</span>
                                <span class="email">{{currentUser.nickname}}
                                <a class="waves-effect waves-red" href="#!" v-on:click="showAccountRegister()" title="<?= $this->lang->line('account_account-edit_a') ?>">
                                    <i class="material-icons edit-icon">mode_edit</i>
                                </a>
                                </span>
                            </span>
                        </div>
                    </li>
                    <div class="divider"></div>
                    </li>
                    <li class="complement-nav-on-mobile">
                        <a href="items">
                            <i class="material-icons">search</i>
                            <?= $this->lang->line('account_search-items_a') ?>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-red" href="#!" v-on:click="showMyItens()">
                            <i class="material-icons">card_giftcard</i>
                            <?= $this->lang->line('account_items_a') ?>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-red" href="#!" v-on:click="showRequestedTrades()">
                            <i class="material-icons">arrow_forward</i>
                            <?= $this->lang->line('account_requested-trades_a') ?>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-red" href="#!" v-on:click="showReceivedTrades()">
                            <i class="material-icons">arrow_back</i>
                            <?= $this->lang->line('account_received-trades_a') ?>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-red" href="#!" v-on:click="showMyLikes()">
                            <i class="material-icons">favorite</i>
                            <?= $this->lang->line('account_likes_a') ?>
                        </a>
                    </li>
                    <li>
                        <a class="waves-effect waves-red" href="#!" v-on:click="showMyMessages()">
                            <i class="material-icons">chat</i>
                            <?= $this->lang->line('account_messages_a') ?>
                        </a>
                    </li>
                    <!--<li>
                        <a class="waves-effect waves-red" href="#!" v-on:click="showAccountRegister()">
                            <i class="material-icons">chat</i>
                            <?= $this->lang->line('account_account-edit_a') ?>
                        </a>
                    </li>-->
                    <li class="complement-nav-on-mobile">
                        <a class="waves-effect waves-red" href="/logout">
                            <i class="material-icons">power_settings_new</i>
                            <?= $this->lang->line('account_get-out_a') ?>
                        </a>
                    </li>
                </ul>
                <div class="sidebar-options-wrapper">
                    <!-- Option my items -->
                    <div class="my-items active-option">
                        <h3 class="section-title">
                            Meus itens
                            <a class="btn-floating waves-effect waves-light btn-floating-swapage modal-trigger tooltipped" 
                               data-tooltip="Belo dia para um novo item né !? =P"
                               href="#register-item-modal"
                               data-position="bottom" 
                               data-delay="70"> 
                                <i class="material-icons">add</i>
                            </a>
                        </h3>
                        <?php include('components/account/_items.php') ?>
                        <?php include('components/account/_item.php') ?>                      
                    </div>
                    
                    <!-- Option messages -->
                    <div class="my-messages">
                        <h3 class="section-title">
                            Mensagens
                        </h3>
                        <?php include('components/account/_messages.php') ?>
                    </div>
                    
                    <!-- Option update register -->
                    <div class="update-register">
                        <h3 class="section-title">Editar Cadastro</h3>
                        <div class="row">
                            <div class="input-field col s12 m4 ">
                                <input id="username" data-name="username" type="text" :value="currentUser.username" class="validate input-register-user" required>
                                <label for="username" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_name') ?></label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input id="nickname" data-name="nickname" type="text" :value="currentUser.nickname" class="validate input-register-user" required>
                                <label for="nickname" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_nickname') ?></label>
                            </div>
                            <div class="date-field input-field col s12 m4">
                                <input type="text" data-name="birth" id="birth" :value="currentUser.birth" class="validate datepicker input-register-user" required>
                                <label for="birth" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_birthday') ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4">
                                <input data-name="email" id="emailuser" type="email" :value="currentUser.email" class="validate input-register-user" required>
                                <label for="emailuser" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_email') ?></label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input data-name="newpassword" id="newpassword" type="password" class="validate input-register-user">
                                <label for="newpassword" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_newpassword') ?></label>
                            </div>
                            <div class="input-field col s12 m4">
                                <select data-name="gender" id="gender" class="input-register-user" required :value="currentUser.gender" >
                                  <option value="M"><?= $this->lang->line('home_modal_register_male') ?></option>
                                  <option value="F"><?= $this->lang->line('home_modal_register_female') ?></option>
                                </select>
                                <label for="gender" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_gender') ?></label>
                             </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4">
                                <input data-name="country" id="country" :value="currentUser.country" type="text" class="validate input-register-user" placeholder="<?= $this->lang->line('home_modal_register_country') ?>" required>
                                <!--<label for="country" data-error="wrong" data-success="right">Pais</label>-->
                            </div>
                            <div class="input-field col s12 m4">
                                <input data-name="state" id="state" :value="currentUser.state" type="text" class="validate input-register-user">
                                <label for="state" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_state') ?></label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input data-name="city" id="city" :value="currentUser.city" type="text" class="validate input-register-user">
                                <label for="city" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_city') ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="file-field input-field col s12">
                                <div class="btn">
                                    <span><?= $this->lang->line('home_modal_register_picture_update') ?><i class="material-icons left profile_picture">check</i></span>
                                    <input data-name="profile_picture" id="profile_picture" class="input-register-user" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <a href="#!" id="enviar-atualizar-perfil" class="btn-flat register-button-submmit" v-on:click="updateUser()" style='float: right; margin-right: 10px;'>Salvar edição</a>
                        </div>
                    </div>
                    
                    <!-- Option my trades -->
                    <div class="trades-requested">
                        <h3 class="section-title">Trocas solicitadas</h3>
                        <?php include('components/account/_trades_request.php') ?>
                        
                    </div>
                    
                    <!-- Option my trades -->
                    <div class="trades-received">
                        <h3 class="section-title">Trocas recebidas</h3>
                        <?php include('components/account/_trades_received.php') ?>
                    </div>
                    
                    <!-- Options likes -->
                    <div class="my-likes">
                        <h3 class="section-title">Minhas curtidas</h3>
                        <?php include('components/account/_likes.php') ?>                
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
                <?php include('components/_register_item.php') ?>
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
        <!-- External loading component starts -->
            <?php include('components/_loading.php') ?>
        <!-- External loading component end's-->
        <!-- External chat component starts -->
            <?php include('components/_chat.php') ?>
        <!-- External loading component end's-->
        
        
        <!-- Notification alert -->
        <div id="notification-modal" class="modal">
            <div class="modal-content">
                <h4 class="notification-title"><?= $this->lang->line('main_notification_alert_title') ?></h4>
                <p><?= $this->lang->line('main_notification_alert') ?></p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close decide-notification waves-effect waves-green btn-flat"><p><?= $this->lang->line('main_notification_alert_ok') ?></p></a>
            </div>
        </div>
        
        <!--<div id="balloon-menu">
            <div class="bubble"><?= $this->lang->line('main_notification_alert_bubble')?>
                <a class="btn-floating close-bubble"><i class="material-icons">close</i></a>
            </div>
        </div>
        <div id="floating-account" class="fixed-action-btn horizontal">
            <a class="waves-effect waves-light btn-floating account-open btn-large"></a>
        </div>-->
        
    </body>
</html>