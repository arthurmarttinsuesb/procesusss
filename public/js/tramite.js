$(document).ready(function($) {
    const select = $(".select2");
    if (Object.keys(select).length !== 0) {
        select.select2({
            theme: "bootstrap4",
            tags: true,
            tokenSeparators: [";", ""],
        });
    }

    $(document).on("change", "#envio", function() {
        var envio = $("#envio option:selected").val();
        if (envio == "setor") {
            $(".setor").show();
            $(".colaborador").hide();
        } else if (envio == "colaborador") {
            $(".colaborador").show();
            $(".setor").hide();
        }
    });

    var id_processo_documento = $("#processo_documento").val();
    var table = $("#table_tramite_documento").DataTable({
        ajax: base_url + "/documento-tramite/list/" + id_processo_documento,
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        columns: [
            { data: "assinatura", name: "assinatura" },
            { data: "envio", name: "envio" },
            { data: "status", name: "status" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Trâmite Documento",
            rota: "documento-tramite",
            idTable: "table_tramite_documento",
            element: $(this),
        });
    });
});