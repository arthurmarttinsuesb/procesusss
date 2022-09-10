$(document).on("click", ".btnExcluir", function () {
    deleteDialog({
        nomeModulo: "Modelo de Documento",
        rota: "modelo-documento",
        idTable: "table_modelo_geral",
        element: $(this),
    });
});

const table = $("#table_modelo_geral");
if (Object.keys(table).length !== 0) {
    table.DataTable({
        ajax: base_url + "/modelo-documento/list",
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