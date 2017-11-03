const apiEndPoint = 'https://agasalhe-tarcisiolima.c9users.io/API/';

//It's a promise: you can use it like so: .then( success, err ) or .done() .fail() .always()
function AJAXRequester(method, resourse, data, headers = {}) {
   return new Promise(function(resolve, reject){
       $.ajax({
        type: method,
        url: apiEndPoint + resourse,
        headers: headers,
        data: data,
        beforeSend: function() {
            $('.upper-wrapper').css('display', 'flex');
        },
        complete: function() {
            $('.upper-wrapper').fadeOut();
        }
       })
       .done((data) => resolve(data))
       .fail((data) => reject(data));
    })
}
function datefixer(x) { return x.split('/').reverse().join('-'); }

