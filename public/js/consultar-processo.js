$(document).on("click", ".btnExcluir", function() {
    deleteDialog({
        nomeModulo: "Setor",
        rota: "setor",
        idTable: "table_processos",
        element: $(this),
    });
});

$(document).on("click", ".busca_processo", function() {
    var busca = $('#campo_busca').val();
    buscarProcesso(busca);
});

const table = $("#table_processos");

function buscarProcesso(busca) {
    if (Object.keys(table).length !== 0) {
        table.DataTable({
            ajax: base_url + `/consultar-processo/list/${busca}`,
            scrollCollapse: true,
            responsive: true,
            paging: false,
            processing: true,
            serverSide: true,
            deferRender: true,
            searching: false,
            destroy: true,
            pageLength: 10,
            columns: [
                { data: "nome", name: "nome" },
                { data: "numero", name: "numero" },
                { data: "tipo", name: "tipo" },
                { data: "status", name: "status" },
                { data: "acao", name: "acao" },
            ],
            language: { url: "/plugins/datatables/traducao.json" },
        });
    }
}