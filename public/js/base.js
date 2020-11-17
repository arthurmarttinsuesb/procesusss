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
// <button type="button" data-id="1" /> "id" é o nome e é o padrão.

function deleteDialog({ nomeModulo, rota, idTable, dataId = "id", element }) {
    const id = element.data(dataId);
    swalWithBootstrapButtons
        .fire({
            title: `Deseja excluir essa(e) ${nomeModulo}?`,
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
                                .fire(
                                    "Sucesso",
                                    "Exclusão Realizada",
                                    "success"
                                )
                                .then(function(result) {
                                    if (result.value) {
                                        $("#" + idTable)
                                            .DataTable()
                                            .draw(false);
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

// nomeModulo é o nome do modulo, que será exibido pro usuario,
// exemplo "Deseja ativar o usuario (Fulano da Silva) ?"
// rota é a rota para ativar que será feita o post, sem barras
// idTable é o id do datatable
// dataId é o nome da prop que ficará o id a ser ativo no botão, exemplo:
// <button type="button" data-id="1" /> "id" é o nome e já é o padrão.

function ativarDialog({ nomeModulo, rota, idTable, dataId = "id", element }) {
    const id = element.data(dataId);
    swalWithBootstrapButtons
        .fire({
            title: `Deseja ativar o(a) ${nomeModulo}?`,
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sim, quero ativar!",
            cancelButtonText: "Não, cancelar!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: base_url + `/${rota}/${id}`,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        ativar: true, // mando esse campo pra confirmar q quero ativar, e nao atualizar outra info
                    },
                    success: function(data) {
                        if (data.error_banco) {
                            Swal.fire(
                                "Atenção",
                                "Exclusão ativação cancelada, tente novamente mais tarde.",
                                "error"
                            );
                        } else {
                            swalWithBootstrapButtons
                                .fire("Sucesso", "Usuário Ativado!", "success")
                                .then(function(result) {
                                    if (result.value) {
                                        $("#" + idTable)
                                            .DataTable()
                                            .draw(false);
                                    }
                                });
                        }
                    },
                    error: function() {
                        swalWithBootstrapButtons.fire(
                            "Atenção",
                            "Exclusão ativação cancelada, tente novamente mais tarde.",
                            "error"
                        );
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    "Atenção",
                    "Ativação cancelada.",
                    "error"
                );
            }
        });
}

function autenticarDialog({
    nomeModulo,
    rota,
    idTable,
    dataId = "id",
    element,
}) {
    const id = element.data(dataId);
    swalWithBootstrapButtons
        .fire({
            title: `Deseja autenticar essa(e) ${nomeModulo}?`,
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sim, quero autenticar!",
            cancelButtonText: "Não, cancelar!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
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
                                "Autenticação cancelada, tente novamente mais tarde.",
                                "error"
                            );
                        } else {
                            swalWithBootstrapButtons
                                .fire(
                                    "Sucesso",
                                    "Autenticação Realizada",
                                    "success"
                                )
                                .then(function(result) {
                                    if (result.value) {
                                        $("#" + idTable)
                                            .DataTable()
                                            .draw(false);
                                    }
                                });
                        }
                    },
                    error: function() {
                        swalWithBootstrapButtons.fire(
                            "Atenção",
                            "Autenticação cancelada, tente novamente mais tarde.",
                            "error"
                        );
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    "Atenção",
                    "Autenticação cancelada.",
                    "error"
                );
            }
        });
}

function assinarDialog({ nomeModulo, rota, idTable, dataId = "id", element }) {
    const id = element.data(dataId);

    swalWithBootstrapButtons
        .fire({
            title: `Deseja assinar esse ${nomeModulo}?`,
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sim, quero assinar!",
            cancelButtonText: "Não, cancelar!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
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
                                "Assinatura cancelada, tente novamente mais tarde.",
                                "error"
                            );
                        } else {
                            swalWithBootstrapButtons.fire(
                                "Sucesso",
                                "Assinatura Realizada",
                                "success"
                            );
                            setTimeout(function() {
                                document.location.reload(true);
                            }, 5000);
                        }
                    },
                    error: function() {
                        swalWithBootstrapButtons.fire(
                            "Atenção",
                            "Assinatura cancelada, tente novamente mais tarde.",
                            "error"
                        );
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    "Atenção",
                    "Assinatura cancelada.",
                    "error"
                );
            }
        });
}


function encerrarDialog({ rota, element }) {
    swalWithBootstrapButtons
        .fire({
            title: `Deseja encerrar esse processo?`,
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sim, quero encerrar!",
            cancelButtonText: "Não, cancelar!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: base_url + `/${rota}`,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {},
                    success: function(data) {
                        if (data.errors) {
                            Swal.fire("Atenção", "Encerramento do processo cancelado, tente novamente mais tarde.", "error");
                        } else if (data.status == "Ok") {
                            swalWithBootstrapButtons.fire("Sucesso", "Processo Encerrado", "success").then(function(result) {
                                if (result.value) {
                                    window.location.href = base_url + "/processo";
                                }
                            });
                        }
                    },
                    error: function() {
                        swalWithBootstrapButtons.fire(
                            "Atenção",
                            "Encerramento do processo cancelado, tente novamente mais tarde.",
                            "error"
                        );
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    "Atenção",
                    "Encerramento do processo cancelado.",
                    "error"
                );
            }
        });
}


function devolverDialog({ rota, element }) {

    swalWithBootstrapButtons
        .fire({
            title: `Deseja devolver esse processo?`,
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sim, quero devolver!",
            cancelButtonText: "Não, cancelar!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: base_url + `/${rota}`,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {},
                    success: function(data) {
                        if (data.errors) {
                            Swal.fire("Atenção", "Devolução cancelada, tente novamente mais tarde.", "error");
                        } else if (data.status == "Ok") {
                            swalWithBootstrapButtons.fire("Sucesso", "Processo Devolvido", "success").then(function(result) {
                                if (result.value) {
                                    window.location.href = base_url + "/processo";
                                }
                            });
                        }
                    },
                    error: function() {
                        swalWithBootstrapButtons.fire(
                            "Atenção",
                            "Devolução cancelada, tente novamente mais tarde.",
                            "error"
                        );
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    "Atenção",
                    "Devolução cancelada.",
                    "error"
                );
            }
        });
}