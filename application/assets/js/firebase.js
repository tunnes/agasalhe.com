// Initialize Firebase
var config = {
    apiKey: "AIzaSyDoT3ObbiBKe459nJIMJsMt2cLhbpmjF4s",
    authDomain: "trocaqui-54785.firebaseapp.com",
    databaseURL: "https://trocaqui-54785.firebaseio.com",
    projectId: "trocaqui-54785",
    storageBucket: "trocaqui-54785.appspot.com",
    messagingSenderId: "774510302034"
};

firebase.initializeApp(config);
const messaging = firebase.messaging();

messaging.onTokenRefresh(function(){
    messaging.getToken().then(function(token){
        saveToken(token);
    })
});
    
messaging.onMessage(function(payload){
    console.log("Message received. ", payload);
    var notification = new Notification(payload.notification.title, {
        icon: payload.notification.icon,
        body: payload.notification.body
    });
    notification.onclick = function() {
        window.open(payload.notification.href,"_self");
    }
});

$(function(){
    messaging.getToken().then(function (token){
        if(token === null){
            $('#notification-modal').modal('open');
            $('.decide-notification').click(function(){
                messaging.requestPermission().then(function(){
                    console.log("Notificação permitida.")
                    messaging.getToken().then(function(token){
                        saveToken(token);
                    })
                }).catch(function(err) {
                  console.log('Notificação não permitida.', err);
                });
            });
        }
    }).catch(function(err){
        console.log('Notificação não permitida.', err);
    });
    
});

function saveToken(token){
    console.log(token);
    //AQUI VOU PRECISAR DAR UM UPDATE LÁ NO FCM DO USUÁRIO NO SERVIDOR!!! E PRONTO, NOTIFICAÇÃO PRONTA.
}
