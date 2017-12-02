$(document).ready(function() {
    $('#login-modal').modal({
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
        complete: function() {
            console.log('Closed');
        }
    });

$('.no-account').click(function() {
    $('#login-modal').modal('close');
    $('#register-modal').modal('open');
});
    
$("#logar").click(function(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    
    AJAXRequester('post', 'user/login', {email: $('#login-modal #email').val(), password: $('#login-modal #password').val()})
      .then(function(data){ 
          localStorage.setItem('auth_jwt', data.token);
          localStorage.setItem('current_user', JSON.stringify(data));
          $('#login-modal').modal('close');
          window.location.href = 'account';
       })
       .catch(function(data) {
           let x = JSON.parse(data.responseText);
           if(x.user === null){
                var $toastContent = $('<span>'+ x.message  +'</span>').add($('<button class="btn-flat toast-action" onclick="closeToast(this)">Ok</button>'));
                Materialize.toast($toastContent, 3000);
           }else {
            console.log(x);
            for (var key in x) {
              $('#login-modal #' + key + ' + label').attr("data-error", x[key]);
              $('#login-modal #' + key + ' + label').addClass('active');
              $('#login-modal #' + key).addClass('invalid');
            }
           }
        })
    });
    $('.forgot-my-pswd').click(function(e) {
        e.preventDefault();
        $('.recovery-password').fadeIn();
        $('.recovery-password').css({'transform': 'translateX(0%)'});
    });
    $('.close-forgot-my-pswd').click(function(e) {
        $('.recovery-password').css({'transform': 'translateX(-100%)'});
        $('.recovery-password').fadeOut('slow');
    });
    
    $('.send-email-recovery').click(function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $(this).attr('disabled', 'disabled');
        AJAXRequester('post', 'user/password-recovery', {email: $('#login-modal #email-recovery').val()})
          .then(function(data) { 
             alert('E-mail enviado com sucesso :D');
             $('.send-email-recovery').removeAttr('disabled');
           })
           .catch(function(data) { 
                let x = JSON.parse(data.responseText);
                if(x.hasOwnProperty('email')){
                  $('#login-modal #email-recovery + label').attr("data-error", x['email']);
                  $('#login-modal #email-recovery + label').addClass('active');
                  $('#login-modal #email-recovery').addClass('invalid');
                }else {
                  alert(x['message']);
                }
                $('.send-email-recovery').removeAttr('disabled');
            })
    });
    
    $('#update-password').click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $(this).attr('disabled', 'disabled');
        
        if($('.recovery #password').val() == '' || $('.recovery #password-repeat').val() == '' ||
         $('.recovery #password').val() != $('.recovery #password-repeat').val()) {
             alert('preencha os campos e/ou repita a senha corretamente.');
             $('#update-password').removeAttr('disabled');
             return false;
         }
        AJAXRequester('put', 'user/password-recovery', {
            password: $('.recovery #password').val(),
            hash: window.location.href.split('/').pop()
        })
          .then(function(data) { 
             alert('Senha Atualizada com sucesso.');
             $('#update-password').removeAttr('disabled');
           })
           .catch(function(data) { 
                let x = JSON.parse(data.responseText);
                console.log(x);
                if(x.hasOwnProperty('password')){
                  $('.recovery #password + label').attr("data-error", x['password']);
                  $('.recovery #password + label').addClass('active');
                  $('.recovery #password').addClass('invalid');
                }else {
                    alert(x['message']); 
                }
                $('#update-password').removeAttr('disabled');
            })
    })
});
