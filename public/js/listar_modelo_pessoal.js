$(document).on("click", ".btnExcluir", function () {
    deleteDialog({
        nomeModulo: "Modelo",
        rota: "meu-modelo",
        idTable: "table_meu_modelo",
        element: $(this),
    });
});

const table = $("#table_meu_modelo");
if (Object.keys(table).length !== 0) {
    table.DataTable({
        ajax: base_url + "/meu-modelo/list",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        pageLength: 10,
        order: [0, "ASC"],
        columns: [
            { width: "90%", data: "titulo", name: "titulo" },
            { width: "10%", data: "acao", name: "acao" },
        ],

        language: { url: "/plugins/datatables/traducao.json" },
    });
}

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