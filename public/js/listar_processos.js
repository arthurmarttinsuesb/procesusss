$(document).on("click", ".btnExcluir", function () {
    deleteDialog({
        nomeModulo: "Processo",
        rota: "processo",
        idTable: "table_administrador",
        element: $(this),
    });
});

$(document).on("click", ".btnAutenticar", function () {
    Swal.fire({
        title: "Você tem certeza que deseja autenticar o documento?",
        text: "Você não poderá reverter isso!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar!",
        confirmButtonText: "Sim, desejo autenticar!",
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                "Autenticado!",
                "documento autenticado com sucesso.",
                "success"
            );
        }
    });
});

const table_adm = $("#table_administrador");
if (Object.keys(table_adm).length !== 0) {
    table_adm.DataTable({
        ajax: base_url + "/processo/list",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        pageLength: 10,
        order: [5, "ASC"],
        columns: [
            { width: "25%", data: "usuario", name: "usuario" },
            { width: "15%", data: "numero", name: "numero" },
            { width: "10%", data: "data", name: "data" },
            { width: "5%", data: "tipo", name: "tipo" },
            { width: "10%", data: "status", name: "status" },
            { width: "10%", data: "acao", name: "acao" },
            { data: "criado", name: "criado", visible: false },
        ],

        language: { url: "/plugins/datatables/traducao.json" },
    });
}

const table_usuario = $("#table_usuario");
if (Object.keys(table_usuario).length !== 0) {
    table_usuario.DataTable({
        ajax: base_url + "/processo/list",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        pageLength: 10,
        order: [6, "ASC"],
        columns: [
            { width: "45%", data: "numero", name: "numero" },
            { width: "20%", data: "data", name: "data" },
            { width: "10%", data: "tipo", name: "tipo" },
            { width: "10%", data: "status", name: "status" },
            { width: "10%", data: "acao", name: "acao" },
            { data: "usuario", name: "usuario", visible: false },
            { data: "criado", name: "criado", visible: false },
        ],

        language: { url: "/plugins/datatables/traducao.json" },
    });
}