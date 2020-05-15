$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/modelo-documento/list/",
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        columns: [
            { data: "titulo", name: "titulo" },
            { data: "acao", name: "acao" }
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });

    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Modelo",
            rota: "modelo-documento",
            idTable: "table",
        });
    });

});