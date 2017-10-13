$( document ).ready(function(){
	$('.button-collapse').sideNav();
	init();
    masonryReload();

	
});

function masonryReload(){
    $('.grid').imagesLoaded( function() {
     	$('.grid').masonry({
         	itemSelector: '.grid-item',
         	percentPosition: true,
         	columnWidth: '.grid-sizer'
     	}); 
    });
}


function bidLayout(){
    function sideBarPosition(){
    //  NOTE: To turn side-bar fixed with mouse scrool, based in the header height: 
        var sidebar = $('.sidebar-wrapper');
        
        var sidebarHeader = $('.side-header');
        
        var onTop = () => {$(sidebar).addClass('sidebar-on-top'); $(sidebarHeader).addClass('sidebar-header-visible') }
        
        var onRegular = () => {$(sidebar).removeClass('sidebar-on-top'); $(sidebarHeader).removeClass('sidebar-header-visible') }
        
        $(window).scroll( () => { $(this).scrollTop() > 219 ? onTop() : onRegular()} );
    }
    
    function textualSearch(){
        $('.chips-autocomplete').material_chip({
            placeholder: 'Digite um termo..',
            secondaryPlaceholder: '+ termos',
            autocompleteOptions: {
                data: {
                    'Apple': null,
                    'Microsoft': null,
                    'Google': null
                },
                limit: Infinity,
                minLength: 1
            }
        });
        $('.chips-state').material_chip({
            placeholder: 'Digite o estado..',
            secondaryPlaceholder: '+ estados',
            autocompleteOptions: {
                data: {
                    'São Paulo': null,
                    'California': null,
                    'Santos': null
                },
                limit: Infinity,
                minLength: 1
            }
        });
        $('.chips-city').material_chip({
            placeholder: 'Digite a cidade..',
            secondaryPlaceholder: '+ cidades',
            autocompleteOptions: {
                data: {
                    'São Paulo': null,
                    'California': null,
                    'Santos': null
                },
                limit: Infinity,
                minLength: 1
            }
        });        
    }

    function dropdownCategory(){
        $('select').material_select();
    }
    
    dropdownCategory();
    sideBarPosition();
    textualSearch();
}
function bindData(){
    var itemsController = new Vue({
      el: '#itemsController',
      data: {
        items: [
          { name: 'Bicicleta Trek', author: 'Ayrton Felipe', action: 'Quer Trocar', imageUrl: 'http://bit.ly/2yiSzg2' },
          { name: 'Porta Joias', author: 'Carroline Lopes', action: 'Quer Doar', imageUrl: 'http://bit.ly/2ykc1Zx' },          
          { name: 'Caneta Maneira', author: 'João Ruoccu', action: 'Quer Trocar', imageUrl: 'http://bit.ly/2yeIrmt' }, 
          { name: 'Caneta 3D', author: 'Gustavo Souza', action: 'Quer Doar', imageUrl: 'http://bit.ly/2yjPkoz' },
          { name: 'Playgound Infantil', author: 'Tarcisio Talles', action: 'Quer Doar', imageUrl: 'http://bit.ly/2yjr3iu' },
          { name: 'Cama de Gato', author: 'Patrick Augusto', action: 'Quer Trocar', imageUrl: 'http://bit.ly/2i6obja' },
          { name: 'Sofá Braco', author: 'Gabriel Mourais', action: 'Quer Trocar', imageUrl: 'http://bit.ly/2yhMS04' },
          { name: 'Cama de Casal', author: 'Vitor Souza', action: 'Quer Trocar', imageUrl: 'http://bit.ly/2ykdRcW' },
          { name: 'Bicicleta Trek', author: 'Ayrton Felipe', action: 'Quer Trocar', imageUrl: 'http://bit.ly/2yiSzg2' },
          { name: 'Porta Joias', author: 'Carroline Lopes', action: 'Quer Doar', imageUrl: 'http://bit.ly/2ykc1Zx' },          
          { name: 'Caneta Maneira', author: 'João Ruoccu', action: 'Quer Trocar', imageUrl: 'http://bit.ly/2yeIrmt' }, 
          { name: 'Caneta 3D', author: 'Gustavo Souza', action: 'Quer Doar', imageUrl: 'http://bit.ly/2yjPkoz' },
          { name: 'Playgound Infantil', author: 'Tarcisio Talles', action: 'Quer Doar', imageUrl: 'http://bit.ly/2yjr3iu' },
          { name: 'Cama de Gato', author: 'Patrick Augusto', action: 'Quer Trocar', imageUrl: 'http://bit.ly/2i6obja' },
          { name: 'Sofá Braco', author: 'Gabriel Mourais', action: 'Quer Trocar', imageUrl: 'http://bit.ly/2yhMS04' },
          { name: 'Cama de Casal', author: 'Vitor Souza', action: 'Quer Trocar', imageUrl: 'http://bit.ly/2ykdRcW' }          
        ]
      },
      methods:{
          populateController: function(dataItems){ }
      }
    })
}
function init(){ 
    bidLayout();
	bindData();
}

