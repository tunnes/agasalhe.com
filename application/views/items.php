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
        	
        <link rel="stylesheet" type="text/css" href="/application/assets/css/items.css">
        <script type="text/javascript" src="/application/assets/js/items.js"></script>
        
        <!-- Another control and meta-tags -->
        <link rel="shortcut icon" href="/application/assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="/application/assets/imgx-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <title>Items</title>
        
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_item.css">
	</head>
	<body>
        <header class="subpage-header">
            <div class="container">
                <div class="col s12">
                    <a href="/"><img src="/application/assets/img/header-logo.png"></a>
                    <h2><?= $this->lang->line('item_header_h2') ?></h2>
                </div>
            </div>
        </header>
        <main id="itemsController" class="container">
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
                <li><a class="subheader"><?= $this->lang->line('item_search_item') ?></a></li>
                <div class="sidebar">
                    <div class="input-field col s12">
                      <input  id="search-by-title" type="text" class="validate">
                      <label for="first_name">Digite algum termo</label>
                    </div>
                    <div class="input-field col s12">
                        <select class="search-by-category">
                            <option value="0" selected>Todas as categorias</option>
                            <option value="1">Moveis</option>
                            <option value="2">Eletrodomestico</option>
                            <option value="3">Eletronico</option>
                        </select>
                        <label>Categoria</label>
                    </div>
                    <div class="input-field col s12" style="margin-top: 40px">
                        <select class="search-by-use-state">
                            <option value="0" selected>Indiferente</option>
                            <option value="1">Novo</option>
                            <option value="2">Semi-Novo</option>
                            <option value="3">Usado</option>    
                        </select>
                        <label>Estado de uso</label>
                    </div>                    
                    <div class="input-field col s12">
                      <input  id="search-by-state" type="text" class="validate">
                      <label for="first_name">Digite o estado</label>
                    </div>                     
                   <div class="input-field col s12">
                      <input  id="search-by-city" type="text" class="validate">
                      <label for="first_name">Digite a cidade</label>
                    </div> 
		            <a v-on:click="searchBySomething" class="waves-effect waves-light btn-large">
		                Filtrar
                    </a>
                </div>
            </ul>
            <div class="content-items-wrapper">
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
		        <div class="item-results">
		            <span class="itens-count">Exbindo {{ itemsCount }} resultado(s).</span>
		            
		        	<div v-if="itemsCount > 0">
			        	<div class="grid-sizer"></div>
	                    <!-- Item component starts here - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->			        	
	                    <div class="grid-item" v-for="item in items">
    	                        <div class="item-card" v-on:click="showItem(item.itemID)">
    	                            <div class="state"> 
    	                                <span>SP</span>
    	                            </div>
    	                            <div class="head">
    	                                <img class="item-image" v-bind:src="item.imageUrl"/>
    	                                <span class="action-like">
        	                                <img src="/application/assets/img/itens-like-heart.svg"></img>
        	                                <span>10</span>
    	                                </span>
    	                            </div>
    	                            <div class="body">
    	                                <p class="author truncate-on-line">{{ item.author }}</p>
    	                                <p class="item-name truncate-on-line">{{ item.name }}</p>
    	                            </div>
    	                        </div>
	                        </a>
	                    </div>
	                    <!-- Item component end's here - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					</div>
					<div v-if="show404" class="any-results">
					    <h3>
					        Desculpe.. Nenhum item encontrado =S
					    </h3>
					</div>
					
		        </div>
	        </div>
            <?php include('components/_item.php') ?>
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