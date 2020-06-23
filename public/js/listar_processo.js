$(document).ready(function ($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/processo/list/",
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        columns: [
            { data: "numero", name: "numero" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    $(document).on("click", ".btnExcluir", function () {
        deleteDialog({
            nomeModulo: "Processo",
            rota: "processo",
            idTable: "table",
            element: $(this),
        });
    });
});
