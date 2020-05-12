//Select de Estado e Cidade
$(document).on('change', '#estado', function() {
    //recuperando id do select de estado
    var id = $("#estado option:selected").val();
    //variavel que adiciona as opções
    var option = '';
    $.getJSON(base_url + '/selecionar-cidade/' + id, function(dados) {
        //Atibuindo valores à variavel com os dados da consulta
        option += '<option value="">Selecione</option>';
        $.each(dados.cidades, function(i, cidade) {
            option += '<option value="' + cidade.id + '" >' + cidade.nome + '</option>';
        });
        //passando para o select de cidades
        $('#cidade').html(option).show();
    });
});