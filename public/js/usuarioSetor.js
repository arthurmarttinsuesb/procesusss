$(document).on("click", ".btnExcluir", function() {
    deleteDialog({
        nomeModulo: "Usuario Setor",
        rota: "usuario-setor",
        idTable: "table_usuario-setor",
        element: $(this),
    });
});

$(document).on("click", ".buscar_user", function (event) {
    event.preventDefault()
    var busca = $("#campo_busca").val();

    if (busca != ""){
        buscaUsuario(busca);
    } else {
        Swal.fire(
            "Atenção!",
            "campo em branco, digite o e-mail do usuário que deseja buscar",
            "warning"
        );
    } 
});

function buscaUsuario(busca) {
    $.ajax({
        url: base_url + '/usuario-setor/busca',
        cache: false,
        contentType: false,
        processData: false,
        data: {"busca":busca},
        type: "POST",
        success: function (response) {
            $("#cidade").html(response).show();
        },
        error: function (data) {
            Swal.fire(
                "Usuário não encontrado!",
                "não foi possível encontrar o usuário com o e-mail digitado, favor verificar o e-mail digitado.",
                "error"
            );
        }
    });
}

$(document).on('change', '#fk_sect', function() {
    var secretaria = $("#fk_sect option:selected").val();
    // console.log(secretaria);
    var option = "";
    $.getJSON("/selecionar-setor/" + secretaria, function(dados) {
        //Atibuindo valores à variavel com os dados da consulta
        option += '<option value="">Selecione</option>';
        $.each(dados.setores, function(i, setor) {
            option +=
                '<option value="' +
                setor.id +
                '" >' +
                setor.titulo +
                "</option>";
        });
        //passando para o select de cidades
        console.log(option);
        $("#fk_setor").html(option).show();

    });
});

$(document).ready(function() {
    const select = $(".select2");

    if (Object.keys(select).length !== 0 && select.length > 0) {
        select.select2({
            theme: "bootstrap4",
        });
    }

    const inputMask = $("[data-mask]");
    if (Object.keys(inputMask).length !== 0 && inputMask.length > 0) {
        inputMask.inputmask();
    }
});