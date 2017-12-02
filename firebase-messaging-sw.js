
importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-messaging.js');
importScripts('idb-keyval.js');

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

messaging.setBackgroundMessageHandler(function(payload){
    idbKeyval.set('newMessage', JSON.stringify(payload.data));
    console.log(payload);
    const title= payload.data.title;
    const options = {
        body: payload.data.body,
        icon: payload.data.icon
    }
    return self.registration.showNotification(title, options);
});