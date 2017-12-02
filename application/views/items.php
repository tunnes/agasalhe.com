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
        
        <!-- ReactiveX JS -->
        <script src="https://unpkg.com/rxjs/bundles/Rx.min.js"></script>
        <!-- Indexed db -->
        <script src="idb-keyval.js"></script>
        <script src="https://www.gstatic.com/firebasejs/4.6.0/firebase.js"></script>
        <script type="text/javascript" src="/application/assets/js/firebase.js"></script>
        
        <script type="text/javascript" src="/application/assets/js/components/_chat.js"></script>
        
        <link rel="stylesheet" type="text/css" href="/application/assets/css/items.css">
        <script type="text/javascript" src="/application/assets/js/items.js"></script>
        
        <!-- Another control and meta-tags -->
        <link rel="shortcut icon" href="/application/assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="/application/assets/imgx-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <title>Items</title>
        
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_item.css">
        <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_chat.css">
        <link rel="stylesheet" type="text/css" href="/application/assets/css/helpers.css">
        
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
                    <?php include('components/_navbar.php') ?>
                </div>
            </div>
        </header>
        <main id="itemsController" class="container">
            <ul id="slide-out" class="side-nav fixed account-sidebar">
                <li><a class="subheader"><i class="material-icons left">filter_list</i><?= $this->lang->line('item_filter_item') ?></a></li>
                <div class="sidebar items-page-sidebar">
                    <div class="input-field col s12">
                      <input  id="search-by-title" type="text" class="validate">
                      <label for="first_name">Digite algum termo</label>
                    </div>
                    <div class="input-field col s12">
                        <select id="search-by-category" class="search-by-category">
                            <option value="" selected><?= $this->lang->line('item_category_all') ?></option>
                            <option value="NONE"><?= $this->lang->line('item_category_none') ?></option>
                            <option value="FURNITURE"><?= $this->lang->line('item_category_furniture') ?></option>
                            <option value="ELECTRONIC"><?= $this->lang->line('item_category_electronic') ?></option>
                            <option value="HOUSEHOLD-APPLIANCE"><?= $this->lang->line('item_category_household-appliance') ?></option>
                            <option value="TOY"><?= $this->lang->line('item_category_toy') ?></option>
                            <option value="CLOTHING"><?= $this->lang->line('item_category_clothing') ?></option>
                            <option value="UTENSIL"><?= $this->lang->line('item_category_utensil') ?></option>
                            <option value="TOOL"><?= $this->lang->line('item_category_tool') ?></option>
                            <option value="INSTRUMENT"><?= $this->lang->line('item_category_instrument') ?></option>
                            <option value="MOTORING"><?= $this->lang->line('item_category_motoring') ?></option>
                            <option value="SPORT"><?= $this->lang->line('item_category_sport') ?></option>  
                            <option value="DECORATION"><?= $this->lang->line('item_category_decoration') ?></option>
                            <option value="AUDIO-VISUAL"><?= $this->lang->line('item_category_audio-visual') ?></option>
                            <option value="COLLECTION"><?= $this->lang->line('item_category_collection') ?></option>
                            <option value="OTHERS"><?= $this->lang->line('item_category_others') ?></option>
                        </select>
                        <label>Categoria</label>
                    </div>
                    <div class="input-field col s12" style="margin-top: 40px">
                        <select id="search-by-use-state" class="search-by-use-state">
                            <option value="" selected><?= $this->lang->line('item_use-state_all') ?></option>
                            <option value="USED"><?= $this->lang->line('item_use-state_used') ?></option>
                            <option value="SEMI-NEW"><?= $this->lang->line('item_use-state_semi-new') ?></option>
                            <option value="NEW"><?= $this->lang->line('item_use-state_new') ?></option>
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
		        <div class="item-results">
		            <span class="itens-count">Exibindo {{ itemsCount }} resultado(s).</span>
		            
		        	<div class="grid" v-if="itemsCount > 0">
			        	<div class="grid-sizer"></div>
	                    <!-- Item component starts here - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->			        	
	                    <div class="grid-item" v-for="item in items">
                            <div class="card trocaqui-item" v-on:click="showItem(item.item_id)">
                                <div class="card-image">
                                    <img class="item-image" v-bind:src="'/API/image/item/' + item.item_id"/>
                                </div>
                                <div class="card-content">
                                    <i class="material-icons like-button" v-bind:class="{'item-liked' : item.isLikedForYou}" v-on:click="toggleLike(item.isLikedForYou, item)">
                                        {{ item.isLikedForYou ? 'favorite' : 'favorite_border' }}
                                    </i>
                                    <span class="card-title author">~ {{ item.nickname }}</span>
                                    <span class="truncate-one-line title">{{ item.title }}</span>
                                </div>
                             </div>
	                    </div>
	                    <!-- Item component end's here - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
					</div>
					<div v-if="show404" class="any-results">
					    <h3>
					        <?= $this->lang->line('item_search_notfound')?>
					    </h3>
					</div>
					
					<div v-if="loading" class="loading-results">
					    <div class="preloader-wrapper big active">
                            <div class="spinner-layer spinner-blue-only">
                              <div class="circle-clipper left">
                                <div class="circle"></div>
                              </div><div class="gap-patch">
                                <div class="circle"></div>
                              </div><div class="circle-clipper right">
                                <div class="circle"></div>
                              </div>
                            </div>
                         </div>
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
                        <span>por equipe trocaqui.</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- External loading component starts -->
            <?php include('components/_loading.php') ?>
        <!-- External loading component end's-->    
        
        <!-- External login component starts -->
            <?php include('components/_login.php') ?>
        <!-- External login component end's-->
        
        <!-- External login component starts -->
            <?php include('components/_register.php') ?>
        <!-- External login component end's-->
        <!-- External chat component starts -->
            <?php include('components/_chat.php') ?>
        <!-- External chat component end's--> 
        
	</body>
</html>