$(document).ready(function ($) {
    $(document).on("click", ".btnAssinar", function (dados) {
        assinarDialog({
            nomeModulo: "Documento",
            rota: "documento/assinar",
            idTable: "table",
            element: $(this),
        });
    });

    $(document).on("click", ".btnMarcar", function (dados) {
        marcarDialog({
            nomeModulo: "Documento",
            rota: "documento/marcar",
            idTable: "table",
            element: $(this),
        });
    });
});
