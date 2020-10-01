$(document).ready(function($) {
    $(".todo-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999,

    });

    //retorno das tabs
    var tab = $("#tab").val();
    $('#custom-tabs-four-tab a[href="#' + tab + '"]').tab('show');

    var id_processo = $("#processo").val();
    var table = $("#table_documento").DataTable({
        ajax: base_url + "/documento/list/" + id_processo,
        scrollCollapse: true,
        responsive: true,
        paging: true,
        searching: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        columns: [
            { data: "titulo", name: "titulo" },
            { data: "tipo", name: "tipo" },
            { data: "status", name: "status" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    var table = $("#table_anexo").DataTable({
        ajax: base_url + "/anexos/list/" + id_processo,
        scrollCollapse: true,
        responsive: true,
        paging: true,
        searching: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        columns: [
            { data: "titulo", name: "titulo" },
            { data: "usuario", name: "usuario" },
            { data: "fk_user_atenticacao", name: "fk_user_atenticacao" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    $("#table_tramite").DataTable({
        ajax: `${base_url}/processo-tramitacao/list/${id_processo}`,
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        columns: [
            { width: "100%", data: "tramite", name: "tramite" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });
    /*
        $(document).on("click", ".add_anexo", function() {
            var dados = new FormData($("#form_anexo")[0]); //pega os dados do form
            $.ajax({
                type: "post",
                url: base_url + "/anexos/store/" + id_processo,
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: dados,
                processData: false,
                contentType: false,
                success: function(data) {
                    $("#table_anexo").DataTable().draw(false);
                },
                error: function(data) {
                    $(".erros").show(); //exibe a div de erro
                    $(".erros").find("ul").text(""); //limpa a div para erros successivos

                    $.each(data.responseJSON.errors, function(nome, mensagem) {
                        $(".erros")
                            .find("ul")
                            .append(mensagem + "</br>");
                    });
                },
            });
        });*/

    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Documento",
            rota: "documento",
            idTable: "table_documento",
            element: $(this),
        });
    });
    var id_processo = $("#processo").val();

    $(document).on("click", ".btnExcluirAnexo", function() {
        deleteDialog({
            nomeModulo: "Anexo",
            rota: "anexos",
            idTable: "table_anexo",
            btnClass: "btnExcluirAnexo",
            element: $(this),
        });
    });

    $(document).on("click", ".btnExcluirTramite", function() {
        deleteDialog({
            nomeModulo: "Tramite",
            rota: `processo/${id_processo}/tramite`,
            idTable: "table_tramite",
            element: $(this),
        });
    });

    $(document).on("click", ".btnAutenticar", function() {
        autenticarDialog({
            nomeModulo: "Anexo",
            rota: "anexos/autentica",
            idTable: "table_anexo",
            btnClass: "btnAutenticar",
            element: $(this),
        });
    });
});