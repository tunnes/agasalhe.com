$( document ).ready(function(){
	$('.button-collapse').sideNav();
	$('#chat-modal').modal({
        dismissible: false,
        opacity: .5,
        inDuration: 300,
        outDuration: 200,
        startingTop: '4%',
        endingTop: '10%',
        ready: function(modal, trigger) {
            console.log("Ready");
            //console.log(modal, trigger);
        },
        complete: function() {
            console.log('Closed');
        }
    });
    init();
});

function bidLayout(){
    function sideBarPosition(){
    //  NOTE: To turn side-bar fixed with mouse scrool, based in the header height: 
        var sidebar = $('.sidebar-wrapper');
        
        var sidebarHeader = $('.side-header');
        
        $(".button-collapse").sideNav();
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

function bindLayout(){
        
    var $grid = $('.grid').masonry({ itemSelector: '.grid-item', percentPosition: true, columnWidth: '.grid-sizer'});
        $grid.imagesLoaded().progress( () => { $grid.masonry('layout') });
        $(".trocaqui-item .like-button").click( (e) => { e.stopPropagation() });
}

function closeToast(toast){
    $(toast).parent().fadeOut()
}

function bindData(){
    var itemsController = new Vue({
      el: '#itemsController',
      data: {
        show404: false,
        loading: false,
        itemsCount: 0,
        liked: false,
        item: { 
            id: null,
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
        target_user: {
            id: null,
            username: null,
            nickname: null,
            picture: null
        },
        chatMessages: [],
        items: [],
        myItems: [],
        currentImage: null,
        currentUser: $.parseJSON(localStorage.getItem("current_user")),
      },
        methods:{
            searchBySomething: function(){
                
                var query = "/API/item?filter-result=true"
                var title = $('#search-by-title').val();
                title.length ? query = query + "&title=" + title.replace(/\s/g,'') : null;
                var category = $('#search-by-category').val();
                category.length ? query = query + "&category=" + category : null;
                var useState = $('#search-by-use-state').val();
                useState.length ? query = query + "&use-state=" + useState : null;
                var state = $('#search-by-state').val();
                state.length ? query = query + "&state=" + state.replace(/\s/g,'') : null;
                var city = $('#search-by-city').val();
                city.length ? query = query + "&city=" + city.replace(/\s/g,'') : null;
                this.populateController(query)
            },
            populateController: function(path){
                var that = this;
                that.show404 = false;
                path = path || "/API/item";
                this.items = [];
                $.ajax({ 
                    method: "GET", 
                    url: path, 
                    headers:{ 'Authorization': that.currentUser ? that.currentUser.token : null },
                    beforeSend: function(){
                        that.loading = true;
                    },
                    complete: function(jqXHR, textStatus){
                        that.loading = false;
                        $('.upper-wrapper').fadeOut();
                        switch (jqXHR.status) {
                            case 200:
                                that.items = jqXHR.responseJSON;
                                // jqXHR.responseJSON.map((e) => { that.itemBuilder(e) });
                                that.itemsCount = jqXHR.responseJSON.length;
                                that.$nextTick(function () {
                                        bindLayout()
                                })
                                console.log(that.items)
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
                this.$nextTick(function () {
                    var img = new Image();
                    img.onload = () => { $('.grid').masonry({ itemSelector: '.grid-item', percentPosition: true, columnWidth: '.grid-sizer'}) }
                    img.src = item.images.length ? item.images[0].image : "http://bit.ly/2yHLmEy"
                })
                
                //  this.$nextTick(function(){console.log($('.grid img'))})                
            },
            initChat: function(id, nickname, username){
                chatController.requestChat(id, nickname, username);
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
                                    id: item.item_id,
                                    title: item.title,
                                    authorId: item.user_id,
                                    authorUserName: item.username,
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
            showTrade: function(request){
                var request = request || false
                $('.modal-trade-step').toggleClass('modal-trade-actived');
                request ? this.showMyItems() : null
            },
            changeImageItem: function (image){
                this.currentImage = image
            },
            checkCurrentUser: function(){
                console.log(this.currentUser)
                console.log("here")
            },
            showMyItems: function(){
                var that = this;
                this.myItems = [];
                $.ajax({ 
                    method: "GET", 
                    url: "/API/user/item",
                    headers:{ 'Authorization': that.currentUser.token },
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                that.myItems = jqXHR.responseJSON;
                                console.log(that.myItems);
                                break;
                            default:
                                console.log(jqXHR.status + " - Error on show user items..")
                        }
                    }
                })
            },
            postTrade: function(their_item, my_item){
                var that = this;
                $.ajax({ 
                    method: "POST", 
                    url: "/API/item/"+ my_item +"/trade/" + their_item,
                    headers:{ 'Authorization': that.currentUser.token },
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 201:
                                var serverMessage = jqXHR.responseJSON.message
                                console.log(that.myItems);
                                break;
                            default:
                                console.log(jqXHR)
                                // console.log()
                                var serverMessage = jqXHR.responseJSON.message
                                console.log(jqXHR.status + " - Error on trade items..")
                            
                                
                        }
                        var $toastContent = $('<span>'+ serverMessage +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                        Materialize.toast($toastContent, 8000);
    
                    }
                })                
            },
            requestMyMessages: function(){
                if (this.myMessages.length) { return false }
                var that = this;
                $.ajax({ 
                    method: "GET", 
                    url: "/API/chat/null",
                    headers:{ 'Authorization': that.currentUser.token },
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                that.myMessages = jqXHR.responseJSON;
                                Vue.nextTick( () => { bindLayout() });
                                console.log(that.myMessages);
                                break;
                            default:
                                console.log(jqXHR.status + " - Error on show user messages..")
                        }
                    }
                })
            },
            requestChat: function(id, username, nickname){
                var that = this;
                
                that.target_user.id = id;
                that.target_user.username = username;
                that.target_user.nickname = nickname;
                that.target_user.picture  = 'API/image/profile/'+id;
                
                $.ajax({ 
                    method: "GET", 
                    url: "/API/chat/"+id,
                    headers:{ 'Authorization': that.currentUser.token },
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                that.chatMessages = jqXHR.responseJSON;
                                Vue.nextTick(()=>{
                                    $("#chatbox").scrollTop($("#chatbox").get(0).scrollHeight);
                                });
                                console.log("messages", that.chatMessages);
                                break;
                            default:
                                console.log(jqXHR.status + " - Error on show user chat messages..")
                        }
                    }
                })
            },
            sendMessage: function(){
                var that = this;
                var message = $('#messagebox').text().replace(/<div[^<]*?>/g, '').replace(/<\/div[^<]*?>/g, '<br>');
                $('#messagebox').text('');
                if(message != ''){
                        var that = this;
                        $.ajax({ 
                            method: "POST", 
                            url: "/API/chat/register",
                            data: {'receiver': that.target_user.id, 'description': message},
                            headers:{ 'Authorization': that.currentUser.token },
                            complete: function(jqXHR, textStatus){
                                switch (jqXHR.status) {
                                    case 201:
                                        that.chatMessages.push({'description': message, 'sent_by_sender': '1', 'created': jqXHR.responseJSON.created, 'id' : jqXHR.responseJSON.id});
                                        Vue.nextTick(() =>{
                                            $("#chatbox").scrollTop($("#chatbox").get(0).scrollHeight);
                                        });
                                        break;
                                    default:
                                        var $toastContent = $('<span>'+ 'Não foi possível enviar a mensagem.'  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                                        Materialize.toast($toastContent, 4000);
                                }
                            }
                        })
                }
            },
            toggleLike: function(isLiked, item) {
                var that = this;
                    if(that.currentUser != null){
                        isLiked ? this.unlikeItem(item) : this.likeItem(item);
                    }else{
                    var message = "Faça seu registro ou entre com sua <br> conta para poder curtir =]";
                    var $toastContent = $('<span>'+ message  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                        Materialize.toast($toastContent, 8000);
                    }
            },
            likeItem: function(item) {
                var that = this;
                console.log('item_id ' + item);
                 $.ajax({ 
                    method: "POST", 
                    url: ("/API/user/" + that.currentUser.id + "/like/item/" + item.item_id),
                    headers:{ 'Authorization': that.currentUser.token },
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 201:
                                var serverMessage = "Like with success";
                                item.isLikedForYou = true
                                break;
                            default:
                                var serverMessage = "Error on like your item..";
                                break;
                        }
                        var $toastContent = $('<span>'+ serverMessage  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                            Materialize.toast($toastContent, 8000);
                    }
                })
            },
            unlikeItem: function(item) {
                var that = this;
                $.ajax({ 
                    method: "DELETE", 
                    url: ("/API/user/" + that.currentUser.id + "/like/item/" + item.item_id),
                    headers:{ 'Authorization': that.currentUser.token },
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                var serverMessage = jqXHR.responseJSON.message;
                                item.isLikedForYou = false
                                break;
                            default:
                                var serverMessage = "Error on unlike your item..";
                                break;
                        }
                    var $toastContent = $('<span>'+ serverMessage  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                        Materialize.toast($toastContent, 8000);
                    }
                })
            }
        }
    })
    itemsController.changeImageItem();
    itemsController.populateController();
    itemsController.showItemByURL();
}

function init(){
	bindData();
    bidLayout();
    if(window.localStorage.getItem('balloon-menu-closed') === null){
        $('#balloon-menu').css('display', 'block');
        $('.close-bubble').click(function(){
            window.localStorage.setItem('balloon-menu-closed', true);
            $('#balloon-menu').fadeOut(1000);
        });
    }

    
    $('.account-open').click(function(){
        window.location.href = "account"; 
    });
}

function itemByURL(){
    
}

  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });