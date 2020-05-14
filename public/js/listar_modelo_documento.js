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
        id = $(this).data('id');
        swalWithBootstrapButtons.fire({
            title: 'Deseja excluir esse modelo?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, quero excluir!',
            cancelButtonText: 'Não, cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'post',
                    url: base_url + '/modelo-documento/delete',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'id': id
                    },
                    success: function(data) {
                        if ((data.error_banco)) {
                            Swal.fire("Atenção", "Exclusão cancelada, tente novamente mais tarde.", "error")
                        } else {
                            swalWithBootstrapButtons.fire("Sucesso", "Exclusão Realizada", "success").then(function(result) {
                                if (result.value) {
                                    $('#table').DataTable().draw(false);
                                }
                            });
                        }
                    },
                    error: function() {
                        swalWithBootstrapButtons.fire("Atenção", "Exclusão cancelada, tente novamente mais tarde.", "error")
                    },
                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire("Atenção", "Exclusão cancelada.", "error")
            }
        })
    });

});