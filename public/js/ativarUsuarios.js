$(document).on("click", ".btnExcluir", function () {
    deleteDialog({
        nomeModulo: "Usuarios",
        rota: "ativar-usuarios",
        idTable: "table_users",
        element: $(this),
    });
});

$(document).on("click", ".btnAtivar", function () {
    ativarDialog({
        nomeModulo: "Usuario(a)",
        rota: "ativar-usuarios",
        idTable: "table_users",
        element: $(this),
    });
});

const table = $("#table_users");

if (Object.keys(table).length !== 0) {
    table.DataTable({
        ajax: base_url + "/ativar-usuarios/list",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        pageLength: 10,
        columns: [
            { data: "nome", name: "nome" },
            { data: "sexo", name: "sexo" },
            { data: "nascimento", name: "nascimento" },
            { data: "telefone", name: "telefone" },
            { data: "cidade.nome", name: "cidade" },
            { data: "estado.nome", name: "estado" },
            { data: "email", name: "email" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });
}

$(document).ready(function () {
    const select = $(".select2");

    if (Object.keys(select).length !== 0) {
        select.select2({
            theme: "bootstrap4",
        });
    }
});
