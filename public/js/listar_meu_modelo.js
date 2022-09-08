if (Object.keys(table).length !== 0) {
    const table = $("#table");
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
        columns: [
            
            { data: "titulo", name: "titulo" },
            { data: "acao", name: "acao" },
            
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });
}
$(document).ready(function($) {
  

    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Modelo de Documento",
            rota: "meu-modelo",
            idTable: "table",
            element: $(this),
        });
    });

});