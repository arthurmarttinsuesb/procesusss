const table = $("#table_users");

if (Object.keys(table).length !== 0) {
    table.DataTable({
        ajax: base_url + "/ativar-usuarios/show",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        pageLength: 10,
        columns: [
            { data: "nome", name: "nome" },
            { data: "sexo", name: "sexo" },
            { data: "nascimento", name: "nascimento" },
            { data: "telefone", name: "telefone" },
            { data: "cidade", name: "cidade" },
            { data: "estado", name: "estado" },
            { data: "email", name: "email" },
            { data: "file", name: "documentos" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });
}

$(document).ready(function () {
    $(document).on("click", ".btnExcluir", function () {
        deleteUserDialog({
            nomeModulo: "Usuarios",
            rota: "ativar-usuarios",
            idTable: "table_users",
            element: $(this),
        });
    });

    $(document).on("change", "#sexo", function () {
        var sexo = $("#sexo option:selected").val();
        if (sexo == "Outro") {
            $(".genero").show();
        } else if (sexo == "Masculino") {
            $(".genero").hide();
        } else if (sexo == "Feminino") {
            $(".genero").hide();
        }
    });

    $(document).on("click", ".btnAtivar", function () {
        ativarDialog({
            nomeModulo: "Usuario(a)",
            rota: "ativar-usuarios/ativar",
            idTable: "table_users",
            element: $(this),
        });
    });

    $(document).on("change", "#tipo", function () {
        formatarCnpjCpf($);
    });

    $("#telefone").inputmask("(99) 99999-9999");
    $("#cep").inputmask("99999-999");

    function formatarCnpjCpf($) {
        $("[data-mask]").inputmask();

        $("#cpf_cnpj").inputmask("999.999.999-99");
        //recuperando id do select de estado
        var tipo = $("#tipo option:selected").val();
        if (tipo == "PF") {
            $("#cpf_cnpj").inputmask("999.999.999-99");
        } else if (tipo == "PJ") {
            $("#cpf_cnpj").inputmask("99.999.999/9999-99");
        }
    }

    const select = $(".select2");
    if (Object.keys(select).length !== 0) {
        select.select2({
            theme: "bootstrap4",
        });
    }

    $(document).on("change", "#estado", function () {
        var id = $("#estado option:selected").val();
        //variavel que adiciona as opções
        var option = "";
        $.getJSON(base_url + "/selecionar-cidade/" + id, function (dados) {
            //Atibuindo valores à variavel com os dados da consulta
            option += '<option value="">Selecione</option>';
            $.each(dados.cidades, function (i, cidade) {
                option +=
                    '<option value="' +
                    cidade.id +
                    '" >' +
                    cidade.nome +
                    "</option>";
            });
            //passando para o select de cidades
            $("#cidade").html(option).show();
        });
    });
});
