$(document).on("click", ".btnExcluir", function () {
    deleteDialog({
        nomeModulo: "Setor",
        rota: "setor",
        idTable: "table_processos",
        element: $(this),
    });
});

$(document).on("keyup", ".busca_processo_form", function (event) {
    event.preventDefault()
    if(event.key === "Enter") {
        var busca = $("#campo_busca").val();

        if (busca != "") buscarProcesso(busca);
        else alert("Campo de busca em branco, Preencha com os dados da busca!!!");
    }
    
})

$(document).on("click", ".busca_processo", function (event) {
    event.preventDefault()
    var busca = $("#campo_busca").val();

    if (busca != "") buscarProcesso(busca);
    else alert("Campo de busca em branco, Preencha com os dados da busca!!!");
});

const table = $("#table_processos");

function buscarProcesso(busca) {
    if (Object.keys(table).length !== 0) {
        table.DataTable({
            ajax: base_url + `/consultar-processo/list/${busca}`,
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
                { data: "nome", name: "nome" },
                { data: "numero", name: "numero" },
                { data: "titulo", name: "titulo" },
                { data: "descricao", name: "descricao" },
                { data: "encaminhamento", name: "encaminhamento" },
                { data: "status", name: "status" },
                { data: "acao", name: "acao" },
            ],
            language: { url: "/plugins/datatables/traducao.json" },
        });
    }
}
