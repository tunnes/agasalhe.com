$(document).ready(function() {
    switch(navigator.language || navigator.userLanguage){
        case "pt-BR":
            labelMonthNext    = 'Próximo Mês';
            labelMonthPrev    = 'Mês Anterior';
            labelMonthSelect  = 'Selecione o Mês';
            labelYearSelect   = 'Selecione o Ano';
            monthsFull        = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            monthsShort       = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
            weekdaysFull      = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];
            weekdaysShort     = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];
            weekdaysLetter    = ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'];
            today             = 'Hoje';
            clear             = 'Limpar';
            close             = 'Ok';
            format            = 'dd/mm/yyyy';
            $('#country').val('Brazil');
            var country = "BR";
            break;
        case "fr":
            labelMonthNext    = 'Mois prochain';
            labelMonthPrev    = 'Mois précédent';
            labelMonthSelect  = 'Selectionner le mois';
            labelYearSelect   = 'Selectionner une année';
            monthsFull        = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre'];
            monthsShort       = ['Jan','Fev','Mar','Avr','Mai','Jun','Jul','Aou','Sep','Oct','Nov','Dec'];
            weekdaysFull      = ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'];
            weekdaysShort     = ['Di','Lu','Ma','Me','Je','Ve','Sa'];
            weekdaysLetter    = [ 'Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam' ];
            today             = 'Aujourd\'hui';
            clear             = 'Réinitialiser';
            close             = 'Fermer';
            format            = 'dd/mm/yyyy';
            $('#country').val('France');
            var country = "FR";
            break;
        case "es":
            labelMonthNext    = 'Mes siguiente';
            labelMonthPrev    = 'Mes anterior';
            labelMonthSelect  = 'Selecciona un mes';
            labelYearSelect   = 'Selecciona un año';
            monthsFull        = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ];
            monthsShort       = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ];
            weekdaysFull      = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ];
            weekdaysShort     = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb' ];
            weekdaysLetter    = [ 'D', 'L', 'M', 'X', 'J', 'V', 'S' ];
            today             = 'Hoy';
            clear             = 'Limpiar';
            close             = 'Cierrar';
            format            = 'dd/mm/yyyy';
            $('#country').val('Spain');
            var country = "ES";
            break;
        case "it":
            labelMonthNext    = 'Prossimo mese';
            labelMonthPrev    = 'Precedente mese';
            labelMonthSelect  = 'Selezionare un mese';
            labelYearSelect   = 'selezionare un anno';
            monthsFull        = ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];
            monthsShort       = ['Gen','Feb','Mar','Apr','Mag','Giu','Lug','Ago','Set','Ott','Nov','Dic'];
            weekdaysFull      = ['Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato'];
            weekdaysShort     = ['Dom','Lun','Mar','Mer','Gio','Ven','Sab'];
            weekdaysLetter    = ['Do','Lu','Ma','Me','Gi','Ve','Sa'];
            today             = 'Oggi';
            clear             = 'Svuota';
            close             = 'Chiudi';
            format            = 'dd/mm/yyyy';
            $('#country').val('Italy');
            var country = "IT";
            break;
        default:
            labelMonthNext    = 'Next month';
            labelMonthPrev    = 'Previous month';
            labelMonthSelect  = 'Select a month';
            labelYearSelect   = 'Select a year';
            monthsFull        = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            monthsShort       = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            weekdaysFull      = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            weekdaysShort     = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            weekdaysLetter    = [ 'S', 'M', 'T', 'W', 'T', 'F', 'S' ];
            today             = 'Today';
            clear             = 'Clear';
            close             = 'Done';
            format            = 'mm/dd/yyyy';
    }
    $('select').material_select();
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
    window.location
    
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 120,
        labelMonthNext: labelMonthNext,
        labelMonthPrev: labelMonthPrev,
        labelMonthSelect: labelMonthSelect,
        labelYearSelect: labelYearSelect,
        monthsFull: monthsFull,
        monthsShort: monthsShort,
        weekdaysFull: weekdaysFull,
        weekdaysShort: weekdaysShort,
        weekdaysLetter: weekdaysLetter,
        today: today,
        clear: clear,
        close: close,
        format: format,
        onClose: () => { $(document.activeElement).blur() }
    });
    
    
    
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