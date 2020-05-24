//Proteção da aplicação contra ataques de falsificação de solicitações entre sites (CSRF).
$(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

var base_url = "http://" + window.location.host.toString();
var base_url = location.protocol + "//" + window.location.host.toString();

// Componentes do Sweet Alert

// nomeModulo é o nome do modulo, que será exibido pro usuario,
// exemplo "Deseja deletar a (Secretaria) ?"
// rota é a rota de delete que será feita o post, sem barras
// idTable é o id do datatable
// dataId é o nome da prop que ficará o id a ser deletado no botão, exemplo:
// <button type="button" data-id="1" /> "id" é o nome.
// o valor padrão já é id, então não é necessario preencher caso use o
// mesmo nome
// btnClass é o nome da classe do botao de excluir, por padrao ja fica btnExcluir

function deleteDialog({
    nomeModulo,
    rota,
    idTable,
    dataId = "id",
    btnClass = "btnExcluir",
}) {
    id = $(`.${btnClass}`).data(dataId);
    swalWithBootstrapButtons
        .fire({
            title: `Deseja excluir essa ${nomeModulo}?`,
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sim, quero excluir!",
            cancelButtonText: "Não, cancelar!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    type: "delete",
                    url: base_url + `/${rota}/${id}`,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {},
                    success: function(data) {
                        if (data.error_banco) {
                            Swal.fire(
                                "Atenção",
                                "Exclusão cancelada, tente novamente mais tarde.",
                                "error"
                            );
                        } else {
                            swalWithBootstrapButtons
                                .fire("Sucesso", "Exclusão Realizada", "success").then(function(result) {
                                    if (result.value) {
                                        $("#" + idTable).DataTable().draw(false);
                                    }
                                });
                        }
                    },
                    error: function() {
                        swalWithBootstrapButtons.fire(
                            "Atenção",
                            "Exclusão cancelada, tente novamente mais tarde.",
                            "error"
                        );
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    "Atenção",
                    "Exclusão cancelada.",
                    "error"
                );
            }
        });
}