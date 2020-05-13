$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/modelo-documento/list/",
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        columns: [
            { data: "tipo", name: "tipo" },
            { data: "acao", name: "acao" }
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });

    $(document).on('click', '.btnExcluir', function() {
        var id_modelo = $(this).data('id');
        swal({
                title: "Deseja excluir esse Modelo?",
                text: "deseja Excluir?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, quero excluir!",
                cancelButtonText: "Não, cancelar!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: base_url + '/modelo-documento/delete',
                        data: {
                            'id': id_modelo
                        },
                        success: function(data) {
                            if (data.status == "error") {
                                swal("Cancelado", "Exclusão Cancelada  :)", "error");
                            } else {
                                swal("Excluído!", "Operação realizada com sucesso", "success");
                                $('#table').DataTable().draw(false);
                            }
                        },
                        error: function() {
                            swal("Cancelado", "Exclusão Cancelada  :)", "error");
                        },
                    });
                } else {
                    swal("Cancelado", "Exclusão Cancelada :)", "error");
                }
            });
    });

});