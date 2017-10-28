
/* Initialize Firebase

var config = {
    apiKey: "AIzaSyCcbzxR_XvsH56LRCx_KikVSa4qhIYuBBA",
    authDomain: "agasalhe-tcc.firebaseapp.com",
    databaseURL: "https://agasalhe-tcc.firebaseio.com",
    projectId: "agasalhe-tcc",
    storageBucket: "",
    messagingSenderId: "373472014293"
};
firebase.initializeApp(config);
const auth = firebase.auth(); */

const apiEndPoint = 'https://agasalhe-tarcisiolima.c9users.io/API/';

$(function(){
    
    //Login Normal
    $("#login-form").submit(function(e) {
      e.preventDefault();
        AJAXRequester('post', 'user/login', {
            firebase_id: user['uid']
        })
         .then(function(data){ 
              sessionStorage.setItem('jwt', data);
              alert('logado com sucesso.');
           })
          .catch(function(data) {
              alert('Não autorizado.');
        })
    });
    
    $("#update-password-form").submit(function(e) {
      e.preventDefault();
      if($('#pwd').val() != $('#pwd-repeat').val()){
          alert('repita a senha corretamente.');
      }else {
          AJAXRequester('put', 'user/password-recovery', {
            hash: window.location.href.split('/').pop(),
            password: $('#password').val()
        }, null, 'application/x-www-form-urlencoded')
            .then(function(data){ console.log(data.responseText)})
            .catch(function(data){ console.log(JSON.parse(data.responseText))});
      }
    });
    
   
    //Facebook Login
    //Google Login
    
    
    //Logout
    $(".logout").click(function(e) { 
        localStorage.removeItem('jwt');
        //auth.signOut();
    });
});

/*Realtime listener to check wether the user is logged or not.
auth.onAuthStateChanged(firebaseUser => {
    firebaseUser ? console.log(firebaseUser) : console.log('not logged in.');
});*/


/*ALL CODE HERE IS A POSSIBLE TRASH

$("#login-form").submit(function(e) {
      e.preventDefault();
      
      const promise = auth.signInWithEmailAndPassword($("#email").val(), $("#password").val());
      promise
      .then(function(user){
           AJAXRequester('post', 'user/login', {firebase_id: user['uid']})
           .then(function(data){ 
              sessionStorage.setItem('jwt', data);
              alert('logado com sucesso.');
           })
           .catch(function(data){ 
               alert('Não autorizado.');
           })
      })
      .catch(function(error) {
          var errorCode = error.code;
          var errorMessage = error.message;
          console.log('ERROR CODE: ' + errorCode + ' ERROR MESSAGE: ' +errorMessage);
        });
    });
*/


//It's a promise: you can use it like so: .then( success, err ) or .done() .fail() .always()
function AJAXRequester(method, resourse, data, headers = {}) {
   return new Promise(function(resolve, reject){
       $.ajax({
        type: method,
        url: apiEndPoint + resourse,
        headers: headers,
        data: data
       })
       .done((data) => resolve(data))
       .fail((data) => reject(data));
    })
}

function datefixer(x) {
    return x.split('/').reverse().join('-');
}