//Proteção da aplicação contra ataques de falsificação de solicitações entre sites (CSRF). 
$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

var base_url = 'http://' + window.location.host.toString();
var base_url = location.protocol + '//' + window.location.host.toString();


//mensagens de alerta 
function mensagemSuccess() {
    iziToast.success({
        title: 'OK',
        message: 'Operação Realizada com Sucesso!',
    });
}

function mensagemErro() {
    iziToast.error({
        title: 'Erro Interno',
        message: 'Operação cancelada, tente novamente mais tarde.',
    });
}