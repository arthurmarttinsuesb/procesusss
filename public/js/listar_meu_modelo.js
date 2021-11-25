$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/meu-modelo/list/",
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        columns: [
            { data: "titulo", name: "titulo" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Modelo de Documento",
            rota: "meu-modelo",
            idTable: "table",
            element: $(this),
        });
    });

});