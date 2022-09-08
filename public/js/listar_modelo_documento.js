$(document).ready(function ($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/modelo-documento/list/",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        pageLength: 10,
        columns: [
            { data: "titulo", name: "titulo" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    $(document).on("click", ".btnExcluir", function () {
        deleteDialog({
            nomeModulo: "Modelo",
            rota: "modelo-documento",
            idTable: "table",
            element: $(this),
        });
    });

    // $(document).on('click', '.btnVisualizar', function() {
    //     var id = $(this).data("id");
    //     $.ajax({
    //         type: 'get',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: base_url + '/pdf/modelo-documento/' + id,
    //         success: function(data) {
    //             console.log(data);
    //         },
    //         error: function(data) {
    //             console.log(data);
    //         },
    //     });
    // });
});
