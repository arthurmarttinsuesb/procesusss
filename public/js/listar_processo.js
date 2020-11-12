$(document).ready(function ($) {
    var table = $("#table_administrador").DataTable({
        ajax: base_url + "/processo/list",
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        order: [6, "ASC"],
        columns: [
            { width: "30%", data: "usuario", name: "usuario" },
            { width: "20%", data: "numero", name: "numero" },
            { width: "15%", data: "data", name: "data" },
            { width: "10%", data: "tipo", name: "tipo" },
            { width: "15%", data: "status", name: "status" },
            { width: "10%", data: "acao", name: "acao" },
            { data: "criado", name: "criado", visible: false },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    var table = $("#table_usuario").DataTable({
        ajax: base_url + "/processo/list",
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        order: [6, "ASC"],
        columns: [
            { width: "45%", data: "numero", name: "numero" },
            { width: "20%", data: "data", name: "data" },
            { width: "10%", data: "tipo", name: "tipo" },
            { width: "15%", data: "status", name: "status" },
            { width: "10%", data: "acao", name: "acao" },
            { data: "usuario", name: "usuario", visible: false },
            { data: "criado", name: "criado", visible: false },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    

    $(document).on("click", ".btnExcluir", function () {
        deleteDialog({
            nomeModulo: "Processo",
            rota: "processo",
            idTable: "table",
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


    //
   

});
