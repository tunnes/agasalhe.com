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
        	
        <!-- Login components -->
        <script type="text/javascript" src="/application/assets/js/components/_register.js"></script>        
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_login.css">
        
        <!-- Register components -->
        <script type="text/javascript" src="/application/assets/js/components/_login.js"></script>
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_register.css">  
        
        <!-- Navbar components -->
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_navbar.css">        
        <script type="text/javascript" src="/application/assets/js/components/_navbar.js"></script>
        
        <link rel="stylesheet" type="text/css" href="/application/assets/css/items.css">
        <script type="text/javascript" src="/application/assets/js/items.js"></script>
        
        <!-- Another control and meta-tags -->
        <link rel="shortcut icon" href="/application/assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="/application/assets/imgx-icon">
        <meta charset="UTF-8">
        <title>Items</title>
	</head>
	<body>
        <header>
        <!-- External login component starts -->
            <?php include('components/_navbar.php') ?>
        <!-- External login component end's-->   
            <div class="itens-call-to-action">
                <div class="container">
	                <h2>
	                	Itens disponíveis
	                </h2>
                </div>
            </div>
        </header>
        <div class="content-items-wrapper">
        	<div class="container">
        	    <div class="sidebar-wrapper">
        	        <div class="side-header">
        	            <img src="/application/assets/img/items-logo.png"/>
        	            <h3>Swapage</h3>
        	        </div>
		            <div class="sidebar">
                    <div class="chips chips-autocomplete"></div>
                    <div class="input-field col s12">
                        <select>
                            <option value="" disabled selected>Todas as categorias</option>
                            <option value="1">Moveis</option>
                            <option value="2">Brinquedos</option>
                            <option value="3">Eletronicos</option>
                        </select>
                        <label>Categoria</label>
                    </div>
                    <div class="chips chips-state"></div>                       
                    <div class="chips chips-city"></div>                     
                    
		            <a class="waves-effect waves-light btn-large">
		                Filtrar
                    </a>
		       	</div>
		       	</div>
		        <div class="item-results">
		            <span class="itens-count">Exbindo 16 resultado(s).</span>
		            
		        	<div id="itemsController" class="grid">
			        	<div class="grid-sizer"></div>
	                    <!-- Item component starts here - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->			        	
	                    <div class="grid-item" v-for="item in items">
	                        <div class="item-card">
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
	                                <p class="author">{{ item.author }}<span>{{ item.action }}</span></p>
	                                <p class="item-name">{{ item.name }}</p>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- Item component end's here - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					</div>
		        </div>
	        </div>
        </div>
        <div class="power-by">
            © Copyright 2017 - Feito com <span> < 3 </span> por Time ainda sem nome.
        </div>
	</body>
</html>