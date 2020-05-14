$(document).on("click", ".btnExcluir", function () {
    deleteDialog({
        nomeModulo: "Secretaria",
        rota: "secretaria",
        idTable: "table_secretarias",
    });
});

var tabela = $("#table_secretarias").DataTable({
    ajax: base_url + "/secretaria/list",
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
        { data: "status", name: "status" },
        { data: "acao", name: "acao" },
    ],
    language: { url: "/plugins/datatables/traducao.json" },
});
