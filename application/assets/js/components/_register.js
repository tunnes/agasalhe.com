$(document).ready(function() {
    
    $('#register-modal').modal({
        dismissible: true, 
        opacity: .5, 
        inDuration: 300, 
        outDuration: 200, 
        startingTop: '4%', 
        endingTop: '10%', 
        ready: function(modal, trigger) { 
            console.log("Ready");
            //console.log(modal, trigger);
        },
        complete: () => { return console.log('Closed') }
    });
    
    $("#profile_picture").change(function(){
        if($(this).val().length)
            $('.profile_picture').css('display', 'block');
        else
            $('.profile_picture').css('display', 'none');
    });
    
    //Register
    $("#enviar-cadastro").click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $(this).attr('disabled', 'disabled');
        var data = new FormData();
        $('.input-register-user').map(function(){
            if($(this).attr('data-name') != undefined){
                if($(this).attr('data-name') == 'birth'){
                    data.append($(this).attr('data-name'), datefixer($(this).val()))
                }else if($(this).attr('data-name') == 'country'){
                    data.append($(this).attr('data-name'), $(this).data('code') || JSON.parse(window.localStorage.getItem('current_user')).cdCountry)
                }else if($(this).attr('data-name') == 'profile_picture'){
                    data.append($(this).attr('data-name'), $(this)[0].files[0])
                }else{
                    data.append($(this).attr('data-name'), $(this).val())
                }
            }
        });
        console.log(data);
        AJAXRequester('post', 'user', data, {'enctype': 'multipart/form-data'}, true/*{
            }*/).then(function(data){
                $('#register-modal').modal('close');
                var $toastContent = $('<span>'+ data.message  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                Materialize.toast($toastContent, 6000);
                $('#login-modal').modal('open');
                $('#enviar-cadastro').removeAttr('disabled');
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
                $('#enviar-cadastro').removeAttr('disabled');
            });
    });
});