$(document).on("click", ".btnExcluir", function () {
    deleteDialog({
        nomeModulo: "Setor",
        rota: "setor",
        idTable: "table_setors",
    });
});

var tabela = $("#table_setors").DataTable({
    ajax: base_url + "/setor/list",
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
        { data: "sigla", name: "sigla" },
        { data: "secretaria.titulo", name: "secretaria" },
        { data: "acao", name: "acao" },
    ],
    language: { url: "/plugins/datatables/traducao.json" },
});
