function bindLayout()
{
     $(".button-collapse").sideNav();
    var $grid = $('.grid').masonry({ itemSelector: '.grid-item', percentPosition: true, columnWidth: '.grid-sizer'});
        $grid.imagesLoaded().progress( () => { $grid.masonry('layout') });
        $(".trocaqui-item .like-button").click( (e) => { e.stopPropagation() }); 
}

function bindData(ID)
{
    var profileController = new Vue({
        el: '.profile-wrapper',
        data: {
            informations: null,
            items: [],
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
            myItems: [],
            currentImage: null,
            currentUser: $.parseJSON(localStorage.getItem("current_user")),
        },
        methods:{
            getInformations: function(ID){
                var that = this;
                $.ajax({ 
                    method: "GET", 
                    url: '/API/user/' + ID, 
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                that.informations = jqXHR.responseJSON;
                                break;
                            default:
                                console.log("error")
                                break;
                        }
                    }
                    
                })
                
            },
            getItems: function(ID){
                var that = this;
                $.ajax({ 
                    method: "GET", 
                    url: '/API/user_profile/items/' + ID, 
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                that.items = jqXHR.responseJSON;
                                that.$nextTick(function () {
                                    bindLayout()
                                    $('.grid').masonry({ itemSelector: '.grid-item', percentPosition: true, columnWidth: '.grid-sizer'});
                                })
                                break;
                            default:
                                console.log("error")
                                break;
                        }
                    }
                    
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
            showTrade: function(request){
                var request = request || false
                $('.modal-trade-step').toggleClass('modal-trade-actived');
                request ? this.showMyItems() : null
            },
            initChat: function(id, nickname, username){
                chatController.requestChat(id, nickname, username);
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
        }
    });

    profileController.getInformations(ID);
    profileController.getItems(ID);
    console.log(profileController);
}

function init(ID)
{   
    console.log("Iniciando...");
    bindData(ID);
    bindLayout();
}

$( document ).ready(() => { 
    var ID = $(".profile-wrapper").attr('data-user-id');
        init(ID);
});