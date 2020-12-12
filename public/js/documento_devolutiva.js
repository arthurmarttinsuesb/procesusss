$(document).on("click", ".add_tramite", function() {
    

        swalWithBootstrapButtons.fire({
            title: "Deseja devolver esse documento?",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sim, quero devolver!",
            cancelButtonText: "Não, cancelar!",
            reverseButtons: true,
        }).then((result) => {
            if (result.value) {
                var dados = new FormData($("#documento_devolutiva")[0]);
                $.ajax({
                    type: "post",
                    processData: false,
                    contentType: false,
                    url: base_url + "devolutiva/store",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: dados,
                    success: function(data) {
                        if (data.errors) {
                            Swal.fire("Atenção", "Devolução cancelada, tente novamente mais tarde.", "error");
                        }  else if (data.status == "Ok") {
                            swalWithBootstrapButtons.fire("Sucesso", "Processo Devolvido", "success").then(function(result) {
                                if (result.value) {
                                    window.location.href = base_url + "/home";
                                }
                            });
                        }
                    },
                    error: function() {
                        swalWithBootstrapButtons.fire("Atenção", "Devolução cancelada, tente novamente mais tarde.", "error");
                    },
                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire("Atenção", "Devolução cancelada.", "error");
            }
        });

    
});