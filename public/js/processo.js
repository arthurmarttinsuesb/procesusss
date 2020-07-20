$(document).ready(function ($) {
    $(".todo-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999,
    });

    var id_processo = $("#processo").val();
    var table = $("#table_documento").DataTable({
        ajax: base_url + "/documento/list/" + id_processo,
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        columns: [
            { data: "titulo", name: "titulo" },
            { data: "tipo", name: "tipo" },
            { data: "status", name: "status" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    var table = $("#table_anexo").DataTable({
        ajax: base_url + "/anexos/list/" + id_processo,
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        columns: [
            { data: "titulo", name: "titulo" },
            { data: "usuario", name: "usuario" },
            { data: "fk_user_atenticacao", name: "fk_user_atenticacao" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });

    $(document).on("click", ".add_anexo", function () {
        var dados = new FormData($("#form_anexo")[0]); //pega os dados do form
        $.ajax({
            type: "post",
            url: base_url + "/anexos/store/" + id_processo,
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: dados,
            processData: false,
            contentType: false,
            success: function (data) {
                $("#table_anexo").DataTable().draw(false);
            },
            error: function (data) {
                $(".erros").show(); //exibe a div de erro
                $(".erros").find("ul").text(""); //limpa a div para erros successivos

                $.each(data.responseJSON.errors, function (nome, mensagem) {
                    $(".erros")
                        .find("ul")
                        .append(mensagem + "</br>");
                });
            },
        });
    });

    $(document).on("click", ".btnExcluir", function () {
        deleteDialog({
            nomeModulo: "Documento",
            rota: "documento",
            idTable: "table_documento",
            element: $(this),
        });
    });

    $(document).on("click", ".btnExcluirAnexo", function () {
        deleteDialog({
            nomeModulo: "Anexo",
            rota: "anexos",
            idTable: "table_anexo",
            btnClass: "btnExcluirAnexo",
            element: $(this),
        });
    });


    var id_processo = $("#processo").val();
    $("#table_tramite").DataTable({
        ajax: `${base_url}/processo/${id_processo}/tramite`,
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        columns: [
            { data: "user", name: "usuario" },
            { data: "setor", name: "setor" },
            { data: "status", name: "status" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    });
});

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

$(document).on("click", ".add_tramite", function () {
    var id_processo = $("#processo").val();
    if (selectUser.value === "selecione" && selectSetor.value === "selecione") {
        $(document).Toasts("create", {
            title: "Atenção",
            class: "bg-warning mt-2 mr-2",
            body: "Por favor, selecione um setor ou um usuario!",
        });
        return false;
    }

    // muito dificil chegar aqui,
    // mas vai que consegue né
    if (selectUser.value !== "selecione" && selectSetor.value !== "selecione") {
        $(document).Toasts("create", {
            title: "Atenção",
            class: "bg-warning mt-2 mr-2",
            body: "Você deve selecionar um setor OU um usuario",
        });
        return false;
    }

    var dados = new FormData($("#form_tramite")[0]); //pega os dados do form
    $.ajax({
        type: "post",
        url: `${base_url}/processo/${id_processo}/tramite`,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: dados,
        processData: false,
        contentType: false,
        success: function (data) {
            $("#table_tramite").DataTable().draw(false);
        },
        error: function (data) {
            $(".erros").show(); //exibe a div de erro
            $(".erros").find("ul").text(""); //limpa a div para erros successivos

            $.each(data.responseJSON.errors, function (nome, mensagem) {
                $(".erros")
                    .find("ul")
                    .append(mensagem + "</br>");
            });
        },

    $(document).on("click", ".btnAutenticar", function () {
        autenticarDialog({
            nomeModulo: "Anexo",
            rota: "anexos/autentica",
            idTable: "table_anexo",
            btnClass: "btnAutenticar",
            element: $(this),
        });
<<<<<<< HEAD

    var id_processo = $("#processo").val();
    $("#table_tramite").DataTable({
        ajax: `${base_url}/processo/${id_processo}/tramite`,
        scrollCollapse: true,
        responsive: true,
        paging: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: false,
        columns: [
            { data: "user", name: "usuario" },
            { data: "setor", name: "setor" },
            { data: "status", name: "status" },
            { data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" },
    
});

const selectSetor = document.getElementById("select_secretaria");
const selectUser = document.getElementById("select_user");

function selectCheck(name) {
    if (name === "secretaria") {
        selectUser.value = "selecione";
    } else {
        selectSetor.value = "selecione";
    }
}

console.log("asdad");

selectSetor.onchange = () => {
    console.log("asdad");
    selectCheck("secretaria");
};

selectUser.onchange = () => {
    selectCheck("user");
};

$(document).on("click", ".add_tramite", function () {
    var id_processo = $("#processo").val();
    if (selectUser.value === "selecione" && selectSetor.value === "selecione") {
        $(document).Toasts("create", {
            title: "Atenção",
            class: "bg-warning mt-2 mr-2",
            body: "Por favor, selecione um setor ou um usuario!",
        });
        return false;
    }

    // muito dificil chegar aqui,
    // mas vai que consegue né
    if (selectUser.value !== "selecione" && selectSetor.value !== "selecione") {
        $(document).Toasts("create", {
            title: "Atenção",
            class: "bg-warning mt-2 mr-2",
            body: "Você deve selecionar um setor OU um usuario",
        });
=======
        
>>>>>>> 56757943e98ba4a1066596f5fb09ba0b573a268e
    });
});
