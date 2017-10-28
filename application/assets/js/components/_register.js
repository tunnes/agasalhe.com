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
    
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 15,
        labelMonthNext: 'Próximo Mês',
        labelMonthPrev: 'Mês Anterior',
        labelMonthSelect: 'Selecione o Mês',
        labelYearSelect: 'Selecione o Ano',
        monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
        today: 'Hoje',
        clear: 'Limpar',
        close: 'Sair',
        format: 'dd/mm/yyyy',
        onClose: () => { $(document.activeElement).blur() }
    });
    $('select').material_select();
    
    
    //Register
    $("#enviar-cadastro").click(function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $(this).attr('disabled', 'disabled');
        
        AJAXRequester('post', 'user', {
            nickname: $('#register-modal #nickname').val(),
            username: $('#register-modal #username').val(),
            birth: datefixer($('#register-modal #birth').val()),
            email: $('#register-modal #emailuser').val(),
            password: $('#register-modal #password').val(),
            gender: $('#register-modal #gender').val(),
            state:  $('#register-modal #state').val(),
            city:  $('#register-modal #city').val(),
            country: $("#register-modal #country").data('code')
            }).then(function(data){
                $('#register-modal').modal('close');
                alert('Cadastro realizado com sucesso :D');
                $('#login-modal').modal('open');
                $('#enviar-cadastro').removeAttr('disabled');
            }).catch(function(data){
                let x = JSON.parse(data.responseText);
                console.log(x);
                for (var key in x) {
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