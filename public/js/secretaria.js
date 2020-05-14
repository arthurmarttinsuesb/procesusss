$(document).on('click', '.btnExcluir', function() {
    id = $(this).data('id');
    swalWithBootstrapButtons.fire({
        title: 'Deseja excluir esse pacote?',
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
                url: base_url + '/pacote/inativar',
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
                                $('#table_pacote').DataTable().draw(false);
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


var tabela = $('#table').DataTable({
    ajax: base_url + '/pacote/list-admin',
    scrollCollapse: true,
    responsive: true,
    paging: true,
    processing: true,
    serverSide: true,
    deferRender: true,
    searching: true,
    pageLength: 10,
    columns: [
        { data: 'titulo', name: 'titulo' },
        { data: 'link', name: 'link' },
        { data: 'valor', name: 'valor' },
        { data: 'status', name: 'status' },
        { data: 'acao', name: 'acao' }
    ],
    language: { "url": "/plugins/datatables/traducao.json" }
});