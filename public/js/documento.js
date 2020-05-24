$(document).ready(function($) {
    $('#conteudo').summernote({
        height: 900,
        callbacks: {
            onImageUpload: function(files, editor, $editable) {
                uploadImage(files[0], editor, $editable);
            },
            onMediaDelete: function(target) {
                deleteFile(target[0].src);
            }
        }
    });

    function uploadImage(file, editor, welEditable) {
        var data = new FormData();
        data.append("file", file);
        $.ajax({
            url: base_url + '/modelo-documento/inserir-imagem',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            success: function(data) {
                $('#conteudo').summernote("insertImage", base_url + "/storage/imagem_modelo/" + data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteFile(file) {
        $.ajax({
            url: base_url + '/modelo-documento/remover-imagem',
            cache: false,
            contentType: false,
            processData: false,
            data: file,
            type: "post",
            success: function(data) {
                // $('#conteudo').summernote("insertImage", base_url + "/storage/imagem_modelo/" + data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    $(document).on("change", "#tipo", function() {
        var tipo = $('#tipo option:selected').text();
        var id_tipo = $('#tipo').val();

        if (tipo == "Outro" || id_tipo == "") {
            $("#conteudo").summernote("code", "");
        } else {
            $.ajax({
                type: 'post',
                url: base_url + '/documento/preencher',
                data: {
                    'tipo': id_tipo,
                },
                success: function(data) {
                    $("#conteudo").summernote("code", data);
                },
                error: function() {
                    swalWithBootstrapButtons.fire(
                        "Atenção",
                        "Modelo não encontrado, entre em contato com o administrador do sistema.",
                        "error"
                    );
                },
            });
        }
    });
})