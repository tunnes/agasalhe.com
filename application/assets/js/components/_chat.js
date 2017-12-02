var chatController = null;

$(document).ready(function() {
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
    
    chatController = new Vue({
        el: '#chat-controller',
        data: {
            target_user: {
                id: null,
                username: null,
                nickname: null,
                picture: null
            },
            chatMessages: [],
            currentUser: $.parseJSON(localStorage.getItem("current_user"))
        },
        methods: {
            requestChat: function(id, username, nickname){
                var that = this;
                that.chatMessages = [];
                that.target_user.id = id;
                that.target_user.username = username;
                that.target_user.nickname = nickname;
                that.target_user.picture  = 'API/image/profile/'+id;
                
                $.ajax({ 
                    method: "GET", 
                    url: "/API/chat/"+id,
                    headers:{ 'Authorization': that.currentUser.token },
                    beforeSend: function() {
                        $('.upper-wrapper').css('display', 'flex');
                    },
                    complete: function(jqXHR, textStatus){
                        $('.upper-wrapper').fadeOut();
                        switch (jqXHR.status) {
                            case 200:
                                that.chatMessages = jqXHR.responseJSON;
                                Vue.nextTick(()=>{
                                    $("#chatbox").scrollTop($("#chatbox").get(0).scrollHeight);
                                });
                                window.messageSubject.observers = [];
                                window.messageSubject.subscribe(data => {
                                   console.log('SENDER: ', +data.sender_id+"| TARGET: "+that.target_user.id);
                                   console.log(data.sender_id);
                                   console.log(that.target_user.id);
                                   if(data.sender_id == that.target_user.id){
                                        console.log("CHEGOU AQUI N SEI PQ!!!");
                                        that.chatMessages.push({'description': data.body, 'sent_by_sender': '0', 'created': data.created, 'id' : data.id});
                                        Vue.nextTick(() => $("#chatbox").scrollTop($("#chatbox").get(0).scrollHeight));
                                   }
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
            }
        }
    });
    
});

function closeToast(toast){
    $(toast).parent().fadeOut()
}
