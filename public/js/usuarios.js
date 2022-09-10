$(document).on("click", ".btnExcluir", function() {
    deleteDialog({
        nomeModulo: "Usuários do sistema",
        rota: "usuarios",
        idTable: "table_usuarios",
        element: $(this),
    });
});

const table = $("#table_usuario");
if (Object.keys(table).length !== 0) {
    table.DataTable({
        ajax: base_url + "/usuarios/list",
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
            { data: "nome", name: "nome" },
            { data: "tipo", name: "tipo" },
            { data: "telefone", name: "telefone" },
            { data: "email", name: "email" },
            { data: "sexo", name:"sexo"},
            { data: "nascimento", name: "nascimento"},
            { data: "status", name: "status" },
            { data: "acao", name: "acao" }, 
        ],

        language: { url: "/plugins/datatables/traducao.json" },
    });
}


