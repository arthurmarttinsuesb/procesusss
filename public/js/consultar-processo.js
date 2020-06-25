$(document).on("click", ".btnExcluir", function () {
    deleteDialog({
        nomeModulo: "Setor",
        rota: "setor",
        idTable: "table_processos",
        element: $(this),
    });
});

const campoBusca = document.getElementById("buscaProcesso");

campoBusca.addEventListener("keyup", (event) => {
    if (event.keyCode === 13) {
        buscarProcesso(campoBusca.value);
    }
});

const table = $("#table_processos");
function buscarProcesso(numero) {
    if (Object.keys(table).length !== 0) {
        table.DataTable({
            ajax: base_url + `/consultar-processo/list/${numero}`,
            scrollCollapse: true,
            responsive: true,
            paging: false,
            processing: true,
            serverSide: true,
            deferRender: true,
            searching: false,
            destroy: true,
            pageLength: 10,
            columns: [
                { data: "numero", name: "numero" },
                { data: "tipo", name: "tipo" },
                { data: "status", name: "status" },
                { data: "acao", name: "acao" },
            ],
            language: { url: "/plugins/datatables/traducao.json" },
        });
    }
}

$(document).ready(function () {
    const select = $(".select2");

    if (Object.keys(select).length !== 0) {
        select.select2({
            theme: "bootstrap4",
        });
    }
});
