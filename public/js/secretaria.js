$(document).on("click", "#btn-excluir", function () {
    deleteDialog({
        nomeModulo: "Secretaria",
        rota: "secretaria",
        idTable: "table_secretarias",
        btnId: "#btn-excluir",
    });
});

var tabela = $("#table").DataTable({
    ajax: base_url + "/pacote/list-admin",
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
        { data: "link", name: "link" },
        { data: "valor", name: "valor" },
        { data: "status", name: "status" },
        { data: "acao", name: "acao" },
    ],
    language: { url: "/plugins/datatables/traducao.json" },
});
