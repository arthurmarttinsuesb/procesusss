$(document).on("click", ".btnExcluir", function() {
    deleteDialog({
        nomeModulo: "Usuários do sistema",
        rota: "usuarios",
        idTable: "table_usuario",
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
        columns: [
            { data: "nome", name: "nome" },
            { data: "tipo", name: "tipo" },
            { data: "status", name: "status" },
            { data: "telefone", name: "telefone" },
            { data: "email", name: "email" },
            { data: "acao", name: "acao" },
            {data: "sexo", name:"sexo"},
            {data: "nascimento", name: "nascimento"},
            {data: "cidade", name: "cidade"},
            {data: "estado", name: "estado"},
           
        ],

        language: { url: "/plugins/datatables/traducao.json" },
    });
}
