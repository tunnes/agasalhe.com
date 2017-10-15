$( document ).ready(function(){
    bindData();
    bindLayout();
});

function bindLayout(){
    $('.tooltipped').tooltip({delay: 50});
    $(".button-collapse").sideNav();
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
    $('.modal').modal();
    $('select').material_select();
}

// Options:
function bindData(){
    var accountController = new Vue({
        el: '#account-controller',
        data: {
            message: 'Olá Vue!'
        },
        methods: {
            changeOption: function (target) {
                $('.active-option').fadeOut(200, function(){ 
                    $('.active-option').removeClass('active-option');
                    $(target).fadeIn(200);
                    $(target).addClass('active-option');
                });
            },
            showTrades: function(){
                this.changeOption('.trades');
                $('.section-title').html('Minhas trocas');
            },
            showMyItens: function(){
                this.changeOption('.my-items');
                $('.section-title').html('Meus itens');
            },
            showAccountRegister: function (){
                this.changeOption('.update-register');
                $('.section-title').html('Editar Cadastro');
            },
            showMyLikes: function (){
                this.changeOption('.my-likes');
                $('.section-title').html('Minhas Curtidas');
            }            
        }
    })
}
