$(document).ready(function ($) {
    $(document).on("click", ".btnAssinar", function () {
        Swal.fire({
            title: "Você tem certeza que deseja assinar o documento?",
            text: "Você não poderá reverter isso!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar!",
            confirmButtonText: "Sim, desejo assinar!",
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    "Assinado!",
                    "documento assinado com sucesso.",
                    "success"
                );
            }
        });
    });
});
