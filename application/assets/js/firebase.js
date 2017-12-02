// Initialize Firebase

window.messageSubject = new Rx.Subject();

$(document).ready(function(){
    
    /*$('#notification-modal').modal({
        dismissible: true,
        opacity: .5,
        inDuration: 300,
        outDuration: 200,
        startingTop: '4%',
        endingTop: '10%'
    });*/
    
    $('#notification-modal').modal({
        dismissible: true
    });
    
var config = {
    apiKey: "AIzaSyDoT3ObbiBKe459nJIMJsMt2cLhbpmjF4s",
    authDomain: "trocaqui-54785.firebaseapp.com",
    databaseURL: "https://trocaqui-54785.firebaseio.com",
    projectId: "trocaqui-54785",
    storageBucket: "trocaqui-54785.appspot.com",
    messagingSenderId: "774510302034"
};

firebase.initializeApp(config);
var messaging = firebase.messaging();

messaging.onTokenRefresh(function(){
    messaging.getToken().then(function(token){
        window.localStorage.setItem('fcm', token);
        saveToken();
    })
});

window.backgroundMessage = setInterval(() => 
    idbKeyval.get('newMessage').then(payload =>{
        if(payload !== undefined){
            window.messageSubject.next(JSON.parse(payload));
            idbKeyval.delete('newMessage');
        }
    }), 1000);
    
messaging.onMessage(function(payload){
    window.messageSubject.next(payload.data);
    console.log("FOREGROUND");
    console.log("Message received. ", payload);
    var notification = new Notification(payload.data.title, {
        icon: payload.data.icon,
        body: payload.data.body
    });
    notification.onclick = function(){
        window.open(payload.data.href,"_self");
    }
});

    messaging.getToken().then(function (token){
        if(token === null){
            console.log("CHEGOU AQUI");
            $('#notification-modal').modal('open');
            $('.decide-notification').click(function(){
                messaging.requestPermission().then(function(){
                    console.log("Notificação permitida.")
                    messaging.getToken().then(function(token){
                        window.localStorage.setItem('fcm', token);
                        saveToken();
                    })
                }).catch(function(err) {
                  console.log('Notificação não permitida.', err);
                });
            });
        }else
            saveToken();
            
    }).catch(function(err){
        console.log('Notificação não permitida.', err);
    });

function saveToken(){
    $.ajax({
        method: "PUT", 
        url: "/API/user/token",
        headers:{ 
            'Authorization': window.localStorage.getItem('auth_jwt')
        },
        data: {'token' : window.localStorage.getItem('fcm')},
        complete: function(jqXHR, textStatus) {
            if(jqXHR.status === 200) {
                console.log("Token saved");
            }else {
                console.log("Token already saved");
            }
        }
    })
}

});