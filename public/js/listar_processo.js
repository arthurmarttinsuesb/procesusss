$(document).ready(function ($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/processo/list/",
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        columns: [
            { data: "numero", name: "numero" },
            { data: "acao", name: "acao" },
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
});
