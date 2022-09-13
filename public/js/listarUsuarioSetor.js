$(document).on("click", ".btnExcluir", function() {
    deleteDialog({
        nomeModulo: "Usuario Setor",
        rota: "usuario-setor",
        idTable: "table_usuario-setor",
        element: $(this),
    });
});

const table = $("#table_usuario-setor");
if (Object.keys(table).length !== 0) {
    table.DataTable({
        ajax: base_url + "/usuario-setor/list",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        pageLength: 10,
        columns: [
            { data: "email", name: "email" },
            { data: "nome", name: "nome" },
            { data: "tipo", name: "tipo" },
            { data: "unidade_setor", name: "unidade_setor" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });
}
