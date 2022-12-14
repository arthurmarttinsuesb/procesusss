const select = $(".select2");
if (Object.keys(select).length !== 0) {
    select.select2({
        theme: "bootstrap4",
    });
}

var numero_processo = $("#processo").val();

$(document).ready(function($) {
    const selectSetor = document.getElementById("select_secretaria");
    const selectUser = document.getElementById("select_user");

    function selectCheck(name) {
        if (name === "secretaria") {
            selectUser.value = "selecione";
        } else {
            selectSetor.value = "selecione";
        }
    }

    selectSetor.onchange = () => {
        selectCheck("secretaria");
    };

    selectUser.onchange = () => {
        selectCheck("user");
    };


    $(document).on("click", ".add_tramite", function() {
        if (selectUser.value === "selecione" && selectSetor.value === "selecione") {
            swalWithBootstrapButtons.fire({
                icon: 'error',
                title: 'Atenção',
                text: 'Você deve selecionar um Setor OU um Usuário',
            });
            return false;

        } else if (selectUser.value !== "selecione" && selectSetor.value !== "selecione") {
            swalWithBootstrapButtons.fire({
                icon: 'error',
                title: 'Atenção',
                text: 'Você deve selecionar um Setor OU um Usuário',
            });
            return false;

        } else {

            swalWithBootstrapButtons.fire({
                title: "Deseja encaminhar esse processo?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sim, quero encaminhar!",
                cancelButtonText: "Não, cancelar!",
                reverseButtons: true,
            }).then((result) => {
                if (result.value) {
                    var dados = new FormData($("#tramite")[0]);
                    $.ajax({
                        type: "post",
                        processData: false,
                        contentType: false,
                        url: base_url + "/processo-tramitacao",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        data: dados,
                        success: function(data) {
                            if (data.errors) {
                                Swal.fire("Atenção", "Encaminhamento cancelado, tente novamente mais tarde.", "error");
                            } else if (data.status == "Assinatura") {
                                Swal.fire("Atenção", "Encaminhamento cancelado, você precisa ter no mínimo um documento criado para encaminhar o processo.", "error");
                            } else if (data.status == "Ok") {
                                swalWithBootstrapButtons.fire("Sucesso", "Processo Encaminhado", "success").then(function(result) {
                                    if (result.value) {
                                        window.location.href = base_url + "/processo/" + numero_processo + "/edit";
                                    }
                                });
                            }
                        },
                        error: function() {
                            swalWithBootstrapButtons.fire("Atenção", "Encaminhamento cancelado, tente novamente mais tarde.", "error");
                        },
                    });

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire("Atenção", "Encaminhamento cancelado.", "error");
                }
            });

        }
    });
});