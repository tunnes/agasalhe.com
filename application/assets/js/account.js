$( document ).ready(function(){
    bindData();
    $('#chat-modal').modal({
        dismissible: false,
        opacity: .5,
        inDuration: 300,
        outDuration: 200,
        startingTop: '4%',
        endingTop: '10%',
        ready: function(modal, trigger){
            console.log("Ready");
            console.log(modal, trigger);
        },
        complete: function(){
            console.log('Closed');
        }
    });
    
    $('.materialboxed').materialbox();
    
    if(window.localStorage.getItem('balloon-menu-closed') === null){
        $('#balloon-menu').css('display', 'block');
        $('.close-bubble').click(function(){
            window.localStorage.setItem('balloon-menu-closed', true);
            $('#balloon-menu').fadeOut(1000);
        });
    }
    
    $("#profile_picture").change(function(){
        if($(this).val().length)
            $('.profile_picture').css('display', 'block');
        else
            $('.profile_picture').css('display', 'none');
    });
    
});

function bindLayout(){
    $('.tooltipped').tooltip({delay: 60});
    $(".button-collapse").sideNav();
    $('.modal').modal({ opacity: .8 });
    $('select').material_select();
    prepareDate();
    prepareCountry();
}

function closeToast(toast){
    $(toast).parent().fadeOut()
}

// Options:
function bindData(){
    var accountController = new Vue({
        el: '#account-controller',
        data: {
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
            currentImage: null,
            myItems: [],
            myLikes: [],
            myMessages: [],
            target_user: {
                id: null,
                username: null,
                nickname: null,
                picture: null
            },
            chatMessages: [],
            trades: [],
            message: 'Olá Vue!',
            fileInputTotal: 1,
            currentUser: $.parseJSON(localStorage.getItem("current_user"))
        },
        methods: {
            changeOption: function (target) {
                $('.active-option').fadeOut(200, function(){ 
                    $('.active-option').removeClass('active-option');
                    $(target).fadeIn(200);
                    $(target).addClass('active-option');
                });
            },
            getTrades: function() {
                var that = this;
                $.ajax({ 
                    method: "GET", 
                    url: "/API/item/trade",
                    processData: false,
                    contentType: false,
                    mimeType: false,
                    headers:{ 
                        'Authorization': that.currentUser.token
                    },
                    complete: function(jqXHR, textStatus){
                        if(jqXHR.status === 200) {
                            that.trades = jqXHR.responseJSON;
                        }
                    }
                })
            },
            cancelTrade: function(itemYours, itemTheirs, tradeType) {
                var that = this;
                 $.ajax({
                    method: "DELETE", 
                    url: "/API/item/" + itemYours + "/trade/" + itemTheirs,
                    headers:{ 
                        'Authorization': that.currentUser.token
                    },
                    complete: function(jqXHR, textStatus) {
                        if(jqXHR.status === 200) {
                            console.log('cancel trade', jqXHR.responseJSON);
                            var sx = new Array();
                            that.trades.requested.map((e) =>{ e.item_id == itemTheirs  && e.received.item_theirs == itemYours ? null : sx.push(e) })
                            that.trades.requested = sx;
                            serverMessage = "Cancelado";
                        }else {
                            serverMessage = "Error";
                        }
                        var $toastContent = $('<span>'+ serverMessage  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                        Materialize.toast($toastContent, 6000);
                    }
                })
            },
            acceptTrade: function(itemYours, itemTheirs) {
                var that = this;
                $.ajax({
                    method: "PUT", 
                    url: "/API/item/" + itemYours + "/trade/" + itemTheirs,
                    headers:{ 
                        'Authorization': that.currentUser.token
                    },
                    complete: function(jqXHR, textStatus) {
                        if(jqXHR.status === 200) {
                            console.log('cancel trade', jqXHR.responseJSON);
                            serverMessage = "troca aceita";
                            var sx = new Array();
                            that.trades.received.map((e) =>{ e.item_id == itemTheirs  && e.received.item_theirs == itemYours ? null : sx.push(e) })
                            that.trades.received = sx;
                        }else {
                            serverMessage = "Troca já concluída.";
                        }
                        var $toastContent = $('<span>'+ serverMessage  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                        Materialize.toast($toastContent, 10000);
                    }
                })
            },
            refuseTrade: function(itemYours, itemTheirs) {
                var that = this;
                 $.ajax({
                    method: "POST", 
                    url: "/API/item/" + itemYours + "/refuse/trade/" + itemTheirs,
                    headers:{ 
                        'Authorization': that.currentUser.token
                    },
                    complete: function(jqXHR, textStatus){
                        if(jqXHR.status === 200) {
                            console.log('cancel trade', jqXHR.responseJSON);
                            serverMessage = "Troca recusada";
                            var sx = new Array();
                            that.trades.received.map((e) =>{ e.item_id == itemYours && e.received.item_theirs == itemTheirs ? null : sx.push(e) })
                            that.trades.received = sx;
                        }else {
                            serverMessage = jqXHR.responseJSON.message;
                        }
                        var $toastContent = $('<span>'+ serverMessage  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                        Materialize.toast($toastContent, 10000);
                    }
                })
            },
            showRequestedTrades: function() {
                this.changeOption('.trades-requested');
                this.getTrades();
                 console.log('trocas request', this.trades);
            },
            showReceivedTrades: function(){
                this.changeOption('.trades-received');
                this.getTrades();
                console.log('trocas received', this.trades);
            },
            showMyItens: function(){
                this.changeOption('.my-items');
                this.requestMyItems();
            },
            showMyMessages: function(){
                this.changeOption('.my-messages');
                this.requestMyMessages();
            },
            showAccountRegister: function (){
                this.changeOption('.update-register');
            },
            showMyLikes: function (){
                this.changeOption('.my-likes');
                this.requestLikes()
            },
            showMyWishes: function (){
                this.changeOption('.my-wishs');
            },
            addImageField: function(event){
                $(event.target).html() != 'remove' ? this.fileInputTotal = this.fileInputTotal + 1 : null
                $(event.target).click( () => { $(event.target).parents('.input-multiple-file').remove() })
                $(event.target).html('remove')
            },
            registerItem: function(){
                var that = this;
                var data = new FormData();
                $('.input-register-item').map(function(){
                    if($(this).attr('data-name') != undefined){
                        if($(this).attr('data-name') != 'image[]'){
                            data.append($(this).attr('data-name'), $(this).val())
                        }else{
                            data.append($(this).attr('data-name'), $(this)[0].files[0])
                        }
                    }
                }) 
                $.ajax({ 
                    method: "POST", 
                    url: "/API/item",
                    processData: false,
                    contentType: false,
                    mimeType: false,
                    data: data,
                    headers:{ 
                        'Authorization': that.currentUser.token,
                        'enctype': 'multipart/form-data',
                    },
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 201:
                                var serverMessage = "Created!"
                                $('#register-item-modal').modal('close');
                                break;
                            case 422:
                                var serverMessage = "Invalid!"
                                break;
                            default:
                                var serverMessage = "Error!"
                                break;
                        }
                        var $toastContent = $('<span>'+ serverMessage  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                        Materialize.toast($toastContent, 10000);
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
            initChat: function(id, nickname, username){
                chatController.requestChat(id, nickname, username);
            },
            requestMyItems: function(){
                if (this.myItems.length) { return false }
                var that = this;
                $.ajax({ 
                    method: "GET", 
                    url: "/API/user/item",
                    headers:{ 'Authorization': that.currentUser.token },
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                that.myItems = jqXHR.responseJSON;
                                Vue.nextTick( () => { bindLayout() });
                                console.log(that.myItems);
                                break;
                            default:
                                console.log(jqXHR.status + " - Error on show user items..")
                        }
                    }
                })
            },
            deleteItem: function(itemID){
                var that = this;
                $.ajax({ 
                    method: "DELETE", 
                    url: "/API/item/" + itemID,
                    headers:{ 'Authorization': that.currentUser.token },
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                var serverMessage = jqXHR.responseJSON.message;
                                that.myItems = that.myItems.filter((e) => { return e.id != itemID })
                                break;
                            default:
                                var serverMessage = "Error on delete your item.."
                                break;
                        }
                        var $toastContent = $('<span>'+ serverMessage  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                        Materialize.toast($toastContent, 8000);
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
                                $('#item-modal').modal('open');
                                that.item = {
                                    id: item.item_id,
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
            changeImageItem: function (image){
                this.currentImage = image
            },
            updateUser: function(){
                var that = this;
        //$(this).attr('disabled', 'disabled');
        var data = new FormData();
        $('.input-register-user').map(function(){
            if($(this).attr('data-name') != undefined){
                if($(this).attr('data-name') == 'birth'){
                    data.append($(this).attr('data-name'), datefixer($(this).val()))
                }else if($(this).attr('data-name') == 'country'){
                    data.append($(this).attr('data-name'), $(this).data('code') || that.currentUser.cdCountry)
                }else if($(this).attr('data-name') == 'profile_picture'){
                    data.append($(this).attr('data-name'), $(this)[0].files[0])
                }else{
                    data.append($(this).attr('data-name'), $(this).val())
                }
            }
        });
        
        console.log(data);
        AJAXRequester('post', 'user/update', data, {'enctype': 'multipart/form-data', 'Authorization': that.currentUser.token}, true).then(function(data){
                var $toastContent = $('<span>'+ data.message  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                Materialize.toast($toastContent, 6000);
                $('#enviar-atualizar-perfil').removeAttr('disabled');
            }).catch(function(data){
                console.log(data);
                let x = JSON.parse(data.responseText);
                console.log(x);
                for (var key in x){
                  if(key == 'email'){
                      $('#register-modal #emailuser + label').attr("data-error", x[key]);
                      $('#register-modal #emailuser + label').addClass('active');
                      $('#emailuser').addClass('invalid');
                   } else {
                      $('#register-modal #' + key + ' + label').attr("data-error", x[key]);
                      $('#register-modal #' + key + ' + label').addClass('active');
                      $('#register-modal #' + key).addClass('invalid');
                   }
                }
                $('#enviar-atualizar-perfil').removeAttr('disabled');
            });
            },
            requestLikes: function(){
                var that = this;
                if (this.myLikes.length) { return false }
                $.ajax({ 
                    method: "GET", 
                    url: "/API/user/"+ that.currentUser.id + "/like",
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                that.myLikes = jqXHR.responseJSON;
                                Vue.nextTick( () => { bindLayout() });
                                break;
                            default:
                                console.log(jqXHR.status + " - Error on show user likes..")
                        }
                    }
                })                
            },
            unlikeItem: function(itemID){
                var that = this;
                $.ajax({ 
                    method: "DELETE", 
                    url: ("/API/user/" + that.currentUser.id + "/like/item/" + itemID),
                    headers:{ 'Authorization': that.currentUser.token },
                    complete: function(jqXHR, textStatus){
                        switch (jqXHR.status) {
                            case 200:
                                var serverMessage = jqXHR.responseJSON.message;
                                that.myLikes.given = that.myLikes.given.filter((e) => { return e.item_id != itemID })
                                break;
                            default:
                                var serverMessage = "Error on unlike your item.."
                                break;
                        }
                        var $toastContent = $('<span>'+ serverMessage  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                        Materialize.toast($toastContent, 8000);
                    }
                })                
            }
        },
        mounted: function () {
            this.showMyItens()
        }
    });
    accountController.showMyItens();
    
     $("#enviar-atualizar-perfil").click(function(e){
        
    });
}
