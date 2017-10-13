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
            console.log(modal, trigger);
        },
        complete: function() {
            console.log('Closed');
        }
    });
});