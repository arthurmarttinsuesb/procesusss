$(document).on("click", ".btnExcluir", function () {
    deleteDialog({
        nomeModulo: "Usuario Setor",
        rota: "usuario-setor",
        idTable: "table_usuario-setor",
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
            { data: "user.nome", name: "usuario" },
            { data: "setor.titulo", name: "setor" },
            { data: "data_entrada", name: "data_entrada" },
            { data: "data_saida", name: "data_saida" },
            { data: "acao", name: "acao" },
        ],
        columnDefs: [
            {
                targets: 2, //index of column starting from 0
                data: "acao", //this name should exist in your JSON response
                render: function (data, type, full, meta) {
                    return (
                        '<span class="label label-danger">' +
                        new Date(data.split("-")).toLocaleDateString() +
                        "</span>"
                    );
                },
            },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });
}

$(document).ready(function () {
    const select = $(".select2");

    if (Object.keys(select).length !== 0 && select.length > 0) {
        select.select2({
            theme: "bootstrap4",
        });
    }

    const inputMask = $("[data-mask]");
    if (Object.keys(inputMask).length !== 0 && inputMask.length > 0) {
        inputMask.inputmask();
    }
});
