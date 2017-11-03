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
    
    $('.modal').modal();
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
        item: { 
            title: null, 
            authorName: null, 
            authorImage: null, 
            authorLink: null, 
            category: null,
            useState: null,
            likes: null,
            description: null,
            images: null,
        },
        items: [],
        currentImage: null,
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
                    imageUrl: item.images.length ? item.images[0].image : "http://bit.ly/2yHLmEy",
                    itemID: item.item_id
                })
            },
            showItem: function(itemID){
                var that = this;
                $.ajax({ 
                    method: "GET", 
                    url: "/API/item/" + itemID, 
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                var item = jqXHR.responseJSON[0]
                                
                                $('#item-modal').modal({
                                      dismissible: true, // Modal can be dismissed by clicking outside of the modal
                                      opacity: .8, // Opacity of modal background
                                      inDuration: 300, // Transition in duration
                                      outDuration: 200, // Transition out duration
                                      startingTop: '4%', // Starting top style attribute
                                      endingTop: '10%', // Ending top style attribute
                                      complete: () => { $('.modal-trade-step').removeClass('modal-trade-actived') } // Callback for Modal close
                                    }
                                );
                                $('#item-modal').modal('open');
                                that.item = {
                                    title: item.title,
                                    authorName: item.nickname,
                                    authorImage: "http://bit.ly/2yHLmEy",
                                    authorLink: "#todo",
                                    category: item.category,
                                    useState: item.use_state,
                                    likes: item.qt_likes,
                                    description: item.description,
                                    images: item.images
                                }
                                that.currentImage = that.item.images[0]
                                break;
                            case 404:
                                console.log('404');
                                break;
                            default:
                                console.log("Other error")
                        }
                    }
                })
            },
            showItemByURL: function(){
                var url = new URL(window.location.href);
                var ID = url.searchParams.get('ID');
                ID != null ? this.showItem(ID) : null;
            },
            showTrade: function(){
                $('.modal-trade-step').toggleClass('modal-trade-actived');
            },
            changeImageItem: function (image){
                this.currentImage = image
            }
        }
    })
    itemsController.populateController();
    itemsController.showItemByURL();
}
function init(){ 
	bindData();
    bidLayout();

}

function itemByURL(){
    
    
}
