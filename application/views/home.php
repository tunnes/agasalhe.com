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
        
        <!-- Login components -->
        <script type="text/javascript" src="/application/assets/js/components/_register.js"></script>        
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_login.css">
        
        <!-- Register components -->
        <script type="text/javascript" src="/application/assets/js/components/_login.js"></script>
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_register.css">        
        
        <!-- Internal file resources -->
        <link rel="stylesheet" type="text/css" href="/application/assets/css/home.css">
        <script type="text/javascript" src="/application/assets/js/home.js"></script>
        
        <!-- Another control and meta-tags -->
        <link rel="shortcut icon" href="/application/assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="/application/assets/imgx-icon">
        <meta charset="UTF-8">
        <title>Swapage</title>
    </head>
    <body>
        <header>
            <nav>
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="#" class="brand-logo">
                        <img src="/application/assets/img/header-logo.png"/>
                        </a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="#">Itens</a></li>
                            <li><a href="#">Como funciona</a></li>
                            <li><a href="#">Sobre</a></li>
                            <li><a href="#register-modal" class="modal-trigger">Começar</a></li>
                            <li><a href="#login-modal" class="modal-trigger">Entrar</a></li>                            
                        </ul>
                        <ul class="side-nav" id="mobile-demo">
                            <li><a href="#">Itens</a></li>
                            <li><a href="#">Como funciona</a></li>
                            <li><a href="#">Sobre</a></li>
                            <li><a href="#register-modal" class="modal-trigger">Começar</a></li>
                            <li><a href="#login-modal" class="modal-trigger">Entrar</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="container message-wrapper">
                    <h1>Hey visitante!</h1>
                    <h2>Muita coisa encostada no <br> guarda-roupa?</h2>
                    <span>Com certeza!</span> <span>Nem tanto...</span>
                </div>
            </div>
        </header>
        <div class="header-after-content">
            <div class="container">
                <div class="row">
                    <div class="content-text col s12 m5">
                        <img src="/application/assets/img/header-quotation.svg"/>
                        <h4>Taah o que vocês fazem então?</h4>
                        <h3>Sabe aquele relogio que você cansou ou a jaqueta que não serve mais?</h3>
                        <p>
                            Então é o seguinte.. Aqui você consegue trocar por alguma coisa bacana 
                            que você curta, como por exemplo uma fantasia de Louro José, ou uma foto 
                            raríssima de Aborígene um canhoto. 
                        </p>
                    </div>
                    <div class="content-text col s12 m7">
                        <div class="secondary-text">
                            <img src="/application/assets/img/header-quotation.svg"/>
                            <h4>Me livro da bagunça e ainda consigo ganhar coisitias maneiras!?</h4>
                            <h3>Uhumm é isso ai !</h3>
                            <p>
                                Aqui voce ainda ajuda na sustentabilidade do planeta reduzindo o numero  
                                de coisas que caem em desuso.
                            </p>
                        </div>
                        <div class="secondary-text">
                            <img src="/application/assets/img/header-quotation.svg"/>
                            <h4>Sakei posso trocar qualquer coisa que ta jogada em casa?</h4>
                            <h3>Pera ai bebe, não é bem assim não!</h3>
                            <p>
                                Aqui não é a casa da mãe joana, como tudo na vida aqui existem regras 
                                que devem ser respeitadas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='container'>
            <div class="how-works">
                <div class="row">
                    <h2>
                        <span>Como funciona?</span>
                        <span>Essa é fácil, confira <br> o passo a passo e saiba como!</span>
                    </h2>
                    <div class="col s12 m6 l3">
                        <div class="content">
                            <div class="wrapper-step">
                                <h4>01</h4>
                            </div>
                            <img src="/application/assets/img/how-it-works-computer.svg"></img>
                            <span>Faça seu cadastro no nosso site</span>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="content">
                            <div class="wrapper-step">
                                <h4>02</h4>
                            </div>
                            <img src="/application/assets/img/how-it-works-ux.svg"></img>
                            <span>No seu painel, cadastre todos os itemns que deseja trocar ou doar.</span>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="content">
                            <div class="wrapper-step">
                                <h4>03</h4>
                            </div>
                            <img src="/application/assets/img/how-it-works-iron.svg"></img>  							
                            <span>Seus itens serão publicados e ficarão disponíveis para troca ou doação.</span>
                        </div>
                    </div>
                    <div class="col s12 m6 l3">
                        <div class="content">
                            <div class="wrapper-step">
                                <h4>04</h4>
                            </div>
                            <img src="/application/assets/img/how-it-works-confetti.svg"></img>  
                            <span>Pronto! Agora é só esperar algum interessado entrar em contato.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="access-now">
            <div class="row">
                <div class="col s12 m4 l4 register-now">
                    <h3>
                        <span>Registre-se agora mesmo!</span>
                        <span>Rápido e gratuito!</span>
                    </h3>
                    <button>
                    REGISTRAR
                    </button>
                </div>
                <div class="col s12 m8 l8 mobile-coming-soon">
                    <h3>
                        <span>Fique ligado!</span>  
                        <span>Embreve lançaremos <br> nosso app =)</span>
                    </h3>
                    <img src="/application/assets/img/access-now-iphone.png"/>        			
                </div>
            </div>
        </div>
        <div class="container itens-wrapper">
            <div class="row">
                <div class="itens">
                    <h2>
                        <span>Curtiu?</span>
                        <span>De olhadinha <br> nos itens mais curtidos!</span>
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
                                <img src="http://www.pedalpower.com.br/pedalpower/Assets/product_images/grandes/trek%20top%20fuel%20usada.jpg" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>
                            </div>
                            <div class="body">
                                <p class="author">Ayrton Felipe <span>quer trocar</span></p>
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
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwItnekXy2cwEGY2iUKmx5gAfFwymHEtar3qXCpQyXnJE385jv" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                            	
                            </div>
                            <div class="body">
                                <p class="author">Carolline Lopes <span>quer trocar</span></p>
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
                                <img src="https://ichef-1.bbci.co.uk/news/660/cpsprodpb/3577/production/_91378631_bala.jpg" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                             	
                            </div>
                            <div class="body">
                                <p class="author">João Ruoccu <span>quer trocar</span></p>
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
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQx-g0rblDesm-fFR20KIUalFkbOiAaJItOdYeIKsBLoR_Z8QA8" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                               	
                            </div>
                            <div class="body">
                                <p class="author">Gustavo Souza <span>quer trocar</span></p>
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
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaGTtUkANpurpWtbHihXzsV5m_zQT7l5AP5X6E-wp82Jql_OcG" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                               	
                            </div>
                            <div class="body">
                                <p class="author">Vitor Sousa <span>quer trocar</span></p>
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
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDuLrmBJmwdo-9SI5P7DvspvQYhotPCgdEWLQKAdW4Z5wIXlOwIg" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                               	
                            </div>
                            <div class="body">
                                <p class="author">Gabriel Morais <span>quer trocar</span></p>
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
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSg2_vDvWIktT-WycQFdnLG7b82EtrhdQ55s1HmGlonpAxwSAJ3" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                              	
                            </div>
                            <div class="body">
                                <p class="author">Tarcisio Talles <span>quer trocar</span></p>
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
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTl67RNk4-5TI6nCHHMnxaOAgO5HstxiTwZvh9EOSJn4O0o3TSd-Q" />
                                <span class="action-like">
                                <img src="/application/assets/img/itens-like-heart.svg"></img>
                                <span>10</span>
                                </span>                             	
                            </div>
                            <div class="body">
                                <p class="author">Patrick Algusto <span>quer doar</span></p>
                                <p class="item-name">Cama de gato</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-to-itens-page">
                    <span>Ver mais itens</span>
                </div>
            </div>
        </div>
        <div class="about-us">
            <div class="about-wrapper">
                <div class="about-text about-mobile">
                    <h3>Nosso time </h3>
                    <p>
                        Somos um equipe... ou melhor um time de amigos na verdade, composto por três alunos do curso de Sistemas 
                        para Internet da faculdade de tecnologia Rubens Lara. Temos como objetivo comum aprender e desenvolver uma aplicação totalmente 
                        gratuita que propage a importancia de se aproveitar objetos sejam eles quais forem e reduzir o disperdicio de roupas, brinquetos
                        utencilious e etc.. Uma realidade a qual nos incomoda. 
                    </p>
                </div>
                <img src="/application/assets/img/about-us-team-members.png"/>
                <div class="about-text">
                    <h3>Nosso time </h3>
                    <p>
                        Somos um equipe... ou melhor um time de amigos na verdade, composto por três alunos do curso de Sistemas 
                        para Internet da faculdade de tecnologia Rubens Lara. Temos como objetivo comum aprender e desenvolver uma aplicação totalmente 
                        gratuita que propage a importancia de se aproveitar objetos sejam eles quais forem e reduzir o disperdicio de roupas, brinquetos
                        utencilious e etc.. Uma realidade a qual nos incomoda. 
                    </p>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="row">
                <div class="contact col s12 m6">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s9 offset-s3">
                                <h3>Nos mande um oi!</h3>
                            </div>
                            <div class="input-field col s9 offset-s3">
                                <input id="name" type="text" class="validate">
                                <label for="name">NOME</label>
                            </div>
                            <div class="input-field col s9 offset-s3">
                                <input id="email" type="email" class="validate">
                                <label for="email">EMAIL</label>
                            </div>
                            <div class="input-field col s9 offset-s3">
                                <textarea id="textarea1" class="materialize-textarea"></textarea>
                                <label for="textarea1">MENSAGEM</label>
                            </div>
                            <div class="input-field col s9 offset-s3">
                                <button class="btn waves-effect waves-light" type="submit" name="action">ENVIAR
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
                © Copyright 2017 - Feito com <span> < 3 </span> por Time ainda sem nome.
            </div>
        </div>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOgRKKdJv0sJSZYLFQQUUjII20mGsbLj4&callback=initMap"> </script>
        
        <!-- External login component starts -->
            <?php include('components/_login.php') ?>
        <!-- External login component end's-->
        
        <!-- External login component starts -->
            <?php include('components/_register.php') ?>
        <!-- External login component end's-->    
        
    </body>
</html>