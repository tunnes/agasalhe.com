$( document ).ready(function(){
	$('.button-collapse').sideNav();
	init();
    masonryReload();
    getItems();
	
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

function getItems(){

}

function bindData(){
    var itemsController = new Vue({
      el: '#itemsController',
      data: {
        show404: false,
        itemsCount: 0,
        items: []
      },
        methods:{
            searchBySomething: function(){
                var query = "/API/item?filter-result=true"
                
                var title = $('#search-by-title').val();
                title.length ? query = query + "&title=" + title.replace(/\s/g,'') : null;
                
                var category = $('.search-by-category .active.selected span').text();
                category.length ? query = query + "&category=" + category : null;
                
                var useState = $('.search-by-use-state .active.selected span').text();
                useState.length ? query = query + "&use-state=" + useState : null;
                
                var state = $('#search-by-state').val();
                state.length ? query = query + "&state=" + state.replace(/\s/g,'') : null;
                
                var city = $('#search-by-city').val();
                city.length ? query = query + "&city=" + city.replace(/\s/g,'') : null;
                
                this.populateController(query)
            },
            populateController: function(path){
                var that = this;
                path = path || "/API/item";
                this.items = [];
                $.ajax({ 
                    method: "GET", 
                    url: path, 
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                jqXHR.responseJSON.map((e) => { that.itemBuilder(e) });
                                that.itemsCount = jqXHR.responseJSON.length; 
                                break;
                            case 404:
                                that.show404 = true;
                                that.itemsCount = 0; 
                                console.log('404');
                                break;
                            default:
                                console.log("Other error")
                        }
                    }
                })
            },
            itemBuilder: function(item){
                this.items.push({ 
                    name: item.title, 
                    author: item.nickname, 
                    imageUrl: item.images.length ? item.images[0].image : "http://bit.ly/2yHLmEy"
                })
            }
        }
    })
    itemsController.populateController();
}
function init(){ 
	bindData();
    bidLayout();

}

