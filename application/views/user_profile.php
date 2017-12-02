<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Jquery CND -->
        <script	src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
        
        <!-- Materialize CND -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
        
        <script src="https://unpkg.com/vue@2.4.4/dist/vue.js"></script>
        	
        <!-- Another control and meta-tags -->
        <link rel="shortcut icon" href="/application/assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="/application/assets/imgx-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        
        <!-- ReactiveX JS -->
        <script src="https://unpkg.com/rxjs/bundles/Rx.min.js"></script>
        <!-- Indexed db -->
        <script src="idb-keyval.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.6.0/firebase.js"></script>
        <script type="text/javascript" src="/application/assets/js/firebase.js"></script>
        
        <title>
            <?php echo $nickname ?>
        </title>
        
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_item.css">
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_chat.css">
        <link rel="stylesheet" type="text/css" href="/application/assets/css/helpers.css">
        
        <script type="text/javascript" src="/application/assets/js/components/_chat.js"></script>
        
        <link rel="stylesheet" type="text/css" href="/application/assets/css/user_profile.css">
        <script type="text/javascript" src="/application/assets/js/user_profile.js"></script>
        
        <!-- Main Js -->
        <script type="text/javascript" src="/application/assets/js/main.js"></script>
        
        <!-- Easy Autocomplete -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.min.css" type="text/css" />
        <!-- Login components -->
        <script type="text/javascript" src="/application/assets/js/components/_register.js"></script>        
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_login.css">
        
        <!-- Register components -->
        <script type="text/javascript" src="/application/assets/js/components/_login.js"></script>
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_register.css">   
        
        <script type="text/javascript" src="/application/assets/js/components/_login.js"></script>
        <script type="text/javascript" src="/application/assets/js/components/_register.js"></script>   
        <script type="text/javascript" src="/application/assets/js/countries.js"></script>
        
    </head>
    <body>
        <header id="top" class="subpage-header">
            <div class="container">
                <div class="col s12">
                    <!--<a href="/"><img src="/application/assets/img/header-logo.png"></a>-->
                    <!--<h2>-->
                    <!--    Trocaqui<br>-->
                    <!--    Nossos usuários <3-->
                    <!--</h2>-->
                    <!--<a href="#" data-activates="slide-out" class="button-collapse trigger-sidenav">-->
                    <!--    <i class="material-icons account-menu-trigger">menu</i>-->
                    <!--</a>-->
                    <!-- Generic Navbar -->
                    <?php include('components/_navbar.php') ?>
                </div>
            </div>
            
        </header>
        <main class="container">
            <div class="profile-wrapper" data-user-id="<?php echo $id ?>">
                <div class="profile-infomations" v-if="informations != null">
                    <div class="profile-image" v-bind:style='{ backgroundImage: "url(/API/image/profile/" + informations.id + ")", }'></div>
                    <div class="informations">
                        <h1 class="profile-name">
                            {{ informations.username }}
                            <span class="email">
                                {{ informations.nickname }}
                                <?php if(!$mySelf): ?>
                                <a href="#chat-modal" v-on:click='initChat(informations.id, informations.nickname, informations.username)' class="waves-effect waves-green btn-flat modal-regular-button modal-trigger"><i class="material-icons">message</i></a>
                                <?php endif; ?>                   
                            </span>
                        </h1>
                        <div>
                            <span class="information">
                                <i class="material-icons">date_range</i>
                                <strong>
                                    {{informations.birth}}
                                </strong>
                            </span>
                            <span class="information">
                                <i class="material-icons">email</i>
                                <strong>
                                    {{ informations.email }}
                                </strong>
                            </span>
                            <br>
                            <span class="information">
                                <i class="material-icons">place</i>
                                <strong>
                                    {{informations.state}} - {{informations.country}}
                                </strong>
                            </span>
                            <span class="information">
                                <i class="material-icons">card_giftcard</i>
                                <strong>
                                    {{ items.length }}
                                </strong>
                            </span>
                        </div>
                        <span style="clear:both;display: block;"></span>
                    </div>
                </div>
                <span class="itens-count">Exbindo {{ items.length }} resultado(s).</span>
                <div class="profile-items">
                    <div class="grid" v-if="items.length > 0">
			            <div class="grid-sizer"></div>
	                    <!-- Item component starts here - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->			        	
	                    <div class="grid-item" v-for="item in items">
                            <div class="card trocaqui-item" v-on:click="showItem(item.id)">
                                <div class="card-image">
                                    <img class="item-image" v-bind:src="'/API/image/item/' + item.id"/>
                                </div>
                                <div class="card-content">
                                    <span class="truncate-one-line title">{{ item.title }}</span>
                                </div>
                             </div>
	                    </div>
	                    <!-- Item component end's here - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					</div>
                </div>
                <?php include('components/_item.php') ?>
                <ul id="slide-out" class="side-nav">
                    <li v-if="currentUser != null">
                        <div class="user-view">
                            <a href="/account">
                                <img class="circle" v-bind:src="'/API/image/profile/' + currentUser.id">
                            </a>
                            <span class="user-infomations">
                                <strong style="font-weight: 800" class="name">{{currentUser.username}}</strong>
                                <span class="email">{{currentUser.nickname}}</span>
                            </span>
                        </div>
                        <div class="divider"></div>
                    </li>
                    <li>
                        <a href="/items">
                            <i class="material-icons">search</i>
                            Pesquisar items
                        </a>
                    </li>
                    <li>
                        <a href="/">
                            <i class="material-icons">home</i>
                            Página inicial
                        </a>
                    </li>
                </ul>
            </div>

        </main>
        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    <div class="copyright-wrapper">
                        <span>© 2017 Copyright - Feito com</span> 
                        <span><i class="material-icons">favorite</i></span>
                        <span>por equipe trocaqui.</span>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- External login component starts -->
            <?php include('components/_login.php') ?>
        <!-- External login component end's-->
        
        <!-- External login component starts -->
            <?php include('components/_register.php') ?>
        <!-- External login component end's-->
        
        <!-- External loading component starts -->
            <?php include('components/_loading.php') ?>
        <!-- External loading component end's-->    
        
        <!-- External chat component starts -->
            <?php include('components/_chat.php') ?>
        <!-- External chat component end's-->    

    </body>
</html>