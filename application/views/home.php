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
        
        <!-- Easy Autocomplete -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/easy-autocomplete.min.css" type="text/css" />
        
        <!-- Login components -->
        <script type="text/javascript" src="/application/assets/js/components/_register.js"></script>        
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_login.css">
        
        <!-- Register components -->
        <script type="text/javascript" src="/application/assets/js/components/_login.js"></script>
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_register.css">        
        
        <!-- Internal file resources -->
        <link rel="stylesheet" type="text/css" href="/application/assets/css/home.css">
        <link rel="stylesheet" type="text/css" href="/application/assets/css/helpers.css">
        <script type="text/javascript" src="/application/assets/js/main.js"></script>
        <script type="text/javascript" src="/application/assets/js/home.js"></script>
        <script type="text/javascript" src="/application/assets/js/components/_login.js"></script>
        <script type="text/javascript" src="/application/assets/js/components/_register.js"></script>        
        
        
        <!-- Another control and meta-tags -->
        <link rel="shortcut icon" href="/application/assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="/application/assets/imgx-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <title>Trocaqui</title>
    </head>
    <body>
        <header>
            <nav>
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="/" class="brand-logo">
                        <img src="/application/assets/img/header-logo.png"/>
                        </a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="#" class="go-about"><?= $this->lang->line('main_nav_item_3') ?></a></li>
                            <li><a href="#" class="go-works"><?= $this->lang->line('main_nav_item_2') ?></a></li>
                            <li><a href="/items"><?= $this->lang->line('main_nav_item_1') ?></a></li>
                            <?php if($isLogged): ?>
                                <!--<li class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?= $this->lang->line('main_tooltip_account') ?>">-->
                                <li>
                                    <a class="valign-wrapper" href="/account">
                                        <!--<img class="circle navbar-account-picture" src="<?= $image?>"/>-->
                                        <?= $mynickname ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="/logout"><?= $this->lang->line('main_nav_item_7') ?></a>
                                </li>
                            <?php else: ?>
                            <li><a href="#register-modal" class="modal-trigger"><?= $this->lang->line('main_nav_item_4') ?></a></li>
                            <li><a href="#login-modal" class="modal-trigger"><?= $this->lang->line('main_nav_item_5') ?></a></li>
                            <?php endif; ?>
                        </ul>
                        <ul class="side-nav" id="mobile-demo">
                            <?php if($isLogged): ?>
                            <li>
                                <div class="user-view">
                                    <img class="circle materialboxed" src="<?= $image ?>"/>
                                    <span class="user-infomations">
                                        <span class="name black-text"><?= $username ?></span>
                                        <span class="email black-text"><?= $nickname ?></span>
                                    </span>
                                </div>
                            </li>
                            <?php endif;?>
                            <li><a href="#"><i class="material-icons left">help_outline</i><?= $this->lang->line('main_nav_item_3') ?></a></li>
                            <li><a href="#"><i class="material-icons left">work</i><?= $this->lang->line('main_nav_item_2') ?></a></li>
                            <li><a href="/items"><i class="material-icons left">search</i><?= $this->lang->line('main_nav_item_1') ?></a></li>
                            <?php if($isLogged): ?>
                            <li class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?= $this->lang->line('main_tooltip_account') ?>"><a class="valign-wrapper" href="/account"><i class="material-icons left">account_circle</i><?= $this->lang->line('main_nav_item_6')?></a></li>
                            <li class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?= $this->lang->line('main_tooltip_logout') ?>"><a href="/logout"><i class="material-icons left">power_settings_new</i><?= $this->lang->line('main_nav_item_7') ?></a></li>
                            <?php else: ?>
                            <li><a href="#register-modal" class="modal-trigger"><i class="material-icons left">fiber_new</i><?= $this->lang->line('main_nav_item_4') ?></a></li>
                            <li class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?= $this->lang->line('main_tooltip_enter') ?>"><a href="#login-modal" class="modal-trigger"><i class="material-icons left">play_circle_outline</i><?= $this->lang->line('main_nav_item_5') ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="container message-wrapper">
                    <h1><?= $this->lang->line('home_header_h1') ?></h1>
                    <h2><?= $this->lang->line('home_header_h2') ?></h2>
                    <!--<span><?= $this->lang->line('home_header_yes') ?></span> <span><?= $this->lang->line('home_header_no') ?></span>-->
                </div>
            </div>
        </header>
        <div class="header-after-content">
            <div class="container">
                <div class="row">
                    <div class="content-text col s12 m5">
                        <img src="/application/assets/img/header-quotation.svg"/>
                        <h4><?= $this->lang->line('home_quotation_1_h4') ?></h4>
                        <h3><?= $this->lang->line('home_quotation_1_h3') ?></h3>
                        <p><?= $this->lang->line('home_quotation_1_p') ?></p>
                    </div>
                    <div class="content-text col s12 m7">
                        <div class="secondary-text">
                             <img src="/application/assets/img/header-quotation.svg"/>
                             <h4><?= $this->lang->line('home_quotation_2_h4') ?></h4>
                             <h3><?= $this->lang->line('home_quotation_2_h3') ?></h3>
                             <p><?= $this->lang->line('home_quotation_2_p') ?></p>
                        </div>
                        <div class="secondary-text">
                            <img src="/application/assets/img/header-quotation.svg"/>
                             <h4><?= $this->lang->line('home_quotation_3_h4') ?></h4>
                             <h3><?= $this->lang->line('home_quotation_3_h3') ?></h3>
                             <p><?= $this->lang->line('home_quotation_3_p') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='container'>
            <div class="how-works">
                <div class="row">
                    <h2>
                        <span><?= $this->lang->line('home_how_works_span_1') ?></span>
                        <span><?= $this->lang->line('home_how_works_span_2') ?></span>
                    </h2>
                    <div class="col s12 m6 l3">
                        <div class="content">
                            <div class="wrapper-step">
                                <h4>01</h4>
                            </div>
                            <img src="/application/assets/img/how-it-works-computer.svg"></img>
                            <span><?= $this->lang->line('home_how_works_step_1') ?></span>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="content">
                            <div class="wrapper-step">
                                <h4>02</h4>
                            </div>
                            <img src="/application/assets/img/how-it-works-ux.svg"></img>
                            <span><?= $this->lang->line('home_how_works_step_2') ?></span>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="content">
                            <div class="wrapper-step">
                                <h4>03</h4>
                            </div>
                            <img src="/application/assets/img/how-it-works-iron.svg"></img>  							
                            <span><?= $this->lang->line('home_how_works_step_3') ?></span>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="content">
                            <div class="wrapper-step">
                                <h4>04</h4>
                            </div>
                            <img src="/application/assets/img/how-it-works-confetti.svg"></img>  
                            <span><?= $this->lang->line('home_how_works_step_4') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="access-now">
            <div class="row">
                <div class="col s12 m4 l4 register-now">
                    <h3>
                        <span><?= $this->lang->line('home_register_now_span_1') ?></span>
                        <span><?= $this->lang->line('home_register_now_span_2') ?></span>
                    </h3>
                    <button>
                        <?= $this->lang->line('home_register_now_button') ?>
                    </button>
                </div>
                <div class="col s12 m8 l8 mobile-coming-soon">
                    <h3>
                        <span><?= $this->lang->line('home_coming_span_1') ?></span>  
                        <span><?= $this->lang->line('home_coming_span_2') ?></span>
                    </h3>
                    <img src="/application/assets/img/access-now-iphone.png"/>        			
                </div>
            </div>
        </div>
        <div class="container itens-wrapper">
            <div class="row">
                <div class="itens">
                    <h2>
                        <span><?= $this->lang->line('home_item_span_1') ?></span>
                        <span><?= $this->lang->line('home_item_span_2') ?></span>
                    </h2>
                </div>
                <div class="grid">
                    <div class="grid-sizer"></div>
                    <div class="grid-item">
                        <div class="item-card">
                            <div class="state"> 
                                <span>SP</span>
                            </div>
                            <div class="head">
                                <img src="/application/assets/img/iten-test.jpg" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>
                            </div>
                            <div class="body">
                                <p class="author">Ayrton Felipe <span><?= $this->lang->line('item_card_wanna_trade') ?></span></p>
                                <p class="item-name">Bicicleta Trek</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item-card">
                            <div class="state"> 
                                <span>SP</span>
                            </div>
                            <div class="head">
                                <img src="/application/assets/img/iten-test.jpg" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                            	
                            </div>
                            <div class="body">
                                <p class="author">Carolline Lopes <span><?= $this->lang->line('item_card_wanna_trade') ?></span></p>
                                <p class="item-name">Porta Joiais</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item-card">
                            <div class="state"> 
                                <span>SP</span>
                            </div>
                            <div class="head">
                                <img src="/application/assets/img/iten-test.jpg" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                             	
                            </div>
                            <div class="body">
                                <p class="author">João Ruoccu <span><?= $this->lang->line('item_card_wanna_trade') ?></span></p>
                                <p class="item-name">Caneta Maneira</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item-card">
                            <div class="state"> 
                                <span>SP</span>
                            </div>
                            <div class="head">
                                <img src="/application/assets/img/iten-test.jpg" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                               	
                            </div>
                            <div class="body">
                                <p class="author">Gustavo Souza <span><?= $this->lang->line('item_card_wanna_trade') ?></span></p>
                                <p class="item-name">Caneta 3D</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item-card">
                            <div class="state"> 
                                <span>SP</span>
                            </div>
                            <div class="head">
                                <img src="/application/assets/img/iten-test.jpg" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                               	
                            </div>
                            <div class="body">
                                <p class="author">Vitor Sousa <span><?= $this->lang->line('item_card_wanna_trade') ?></span></p>
                                <p class="item-name">Cama de casal</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item-card">
                            <div class="state"> 
                                <span>SP</span>
                            </div>
                            <div class="head">
                                <img src="/application/assets/img/iten-test.jpg" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                               	
                            </div>
                            <div class="body">
                                <p class="author">Gabriel Morais <span><?= $this->lang->line('item_card_wanna_trade') ?></span></p>
                                <p class="item-name">Sofá Branco</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item-card">
                            <div class="state"> 
                                <span>SP</span>
                            </div>
                            <div class="head">
                                <img src="/application/assets/img/iten-test.jpg" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                              	
                            </div>
                            <div class="body">
                                <p class="author">Tarcisio Talles <span><?= $this->lang->line('item_card_wanna_trade') ?></span></p>
                                <p class="item-name">Playground Infantil</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="item-card">
                            <div class="state">
                                <span>SP</span>
                            </div>
                            <div class="head">
                                <img src="/application/assets/img/iten-test.jpg" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                             	
                            </div>
                            <div class="body">
                                <p class="author">Patrick Augusto <span><?= $this->lang->line('item_card_wanna_donate') ?></span></p>
                                <p class="item-name">Cama de gato</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-to-itens-page">
                    <span><?= $this->lang->line('home_item_button') ?></span>
                </div>
            </div>
        </div>
        <div class="about-us">
            <div class="about-wrapper">
                <div class="about-text about-mobile">
                    <h3><?= $this->lang->line('home_about_us_h3') ?></h3>
                    <p><?= $this->lang->line('home_about_us_p_mobile') ?></p>
                </div>
                <img src="/application/assets/img/about-us-team-members.png"/>
                <div class="about-text">
                    <h3><?= $this->lang->line('home_about_us_h3') ?></h3>
                    <p><?= $this->lang->line('home_about_us_p') ?></p>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="row">
                <div class="contact col s12 m6">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s9 offset-s3">
                                <h3><?= $this->lang->line('home_contact_h3') ?></h3>
                            </div>
                            <div class="input-field col s9 offset-s3">
                                <input id="name" type="text" class="validate">
                                <label for="name"><?= $this->lang->line('home_contact_name') ?></label>
                            </div>
                            <div class="input-field col s9 offset-s3">
                                <input id="email" type="email" class="validate">
                                <label for="email"><?= $this->lang->line('home_contact_email') ?></label>
                            </div>
                            <div class="input-field col s9 offset-s3">
                                <textarea id="textarea1" class="materialize-textarea"></textarea>
                                <label for="textarea1"><?= $this->lang->line('home_contact_mensagem') ?></label>
                            </div>
                            <div class="input-field col s9 offset-s3">
                                <button class="btn waves-effect waves-light" type="submit" name="action"><?= $this->lang->line('home_contact_button') ?>
                                <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col s12 m6 map">
                    <div id="map" ></div>
                </div>
            </div>
            <!--<div class="footer-location"></div>-->
            <div class="power-by">
                <?= $this->lang->line('home_footer') ?>
            </div>
        </div>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOgRKKdJv0sJSZYLFQQUUjII20mGsbLj4&callback=initMap"> </script>
        
        <!-- External login component starts -->
            <?php include('components/_login.php') ?>
        <!-- External login component end's-->
        
        <!-- External login component starts -->
            <?php include('components/_register.php') ?>
        <!-- External login component end's-->
        
        <!-- External loading component starts -->
            <?php include('components/_loading.php') ?>
        <!-- External loading component end's-->    
        
    </body>
</html>