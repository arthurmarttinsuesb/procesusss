$(document).ready(function($) {
    $(document).on("click", ".btnAssinar", function() {
        assinarDialog({
            nomeModulo: "Documento",
            rota: "documento/assinar",
            idTable: "table",
            element: $(this),
        });
    });
});