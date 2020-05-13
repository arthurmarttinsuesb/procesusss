$(document).ready(function($) {
    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ol', 'ul', 'paragraph', 'height']],
            ['table', ['table']],
        ],
        callbacks: {
            onImageUpload: function(files, editor, $editable) {
                uploadImage(files[0], editor, $editable);
            }
        }
    });

    function uploadImage(file, editor, welEditable) {
        var data = new FormData();
        data.append("file", file);
        $.ajax({
            url: base_url + '/modelodocumento/inserir-imagem',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            success: function(data) {
                // editor.insertNode(welEditable, "<img src='{{url('storage/imagem_summernote/'" + data + "}}'>");
                // var file = $('<img>').attr('src', '{{url("storage / imagem_summernote /"' + data + '}}');
                $('#summernote').summernote("insertImage", base_url + "/storage/imagem_summernote/" + data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    $(document).on('click', '.btnNovo', function() {
        var tipo = $("#tipo").val();
        var conteudo = $('#summernote').summernote('code');
        $.ajax({
            type: 'post',
            url: base_url + '/modelodocumento/store',
            data: {
                'tipo': tipo,
                'conteudo': conteudo
            },
            success: function(data) {
                if ((data.errors)) {
                    $('.callout').removeClass('hidden'); //exibe a div de erro
                    $('.callout').find('p').text(""); //limpa a div para erros successivos

                    $.each(data.errors, function(nome, mensagem) {
                        $('.callout').find("p").append(mensagem + "</br>");
                    });
                } else if ((data.exception)) {
                    mensagemErro();
                } else {
                    mensagemSuccess();
                    $("#tipo").val("");
                    var conteudo = $('#summernote').summernote('reset');
                }
            },
            error: function() {
                mensagemErro();
            },
        });
    });

    $(document).on('click', '.btnEditar', function() {
        var id = $("#id").val();
        var tipo = $("#tipo").val();
        var conteudo = $('#summernote').summernote('code');
        $.ajax({
            type: 'post',
            url: base_url + '/modelodocumento/update',
            data: {
                'id': id,
                'tipo': tipo,
                'conteudo': conteudo
            },
            success: function(data) {
                if ((data.errors)) {
                    $('.callout').removeClass('hidden'); //exibe a div de erro
                    $('.callout').find('p').text(""); //limpa a div para erros successivos

                    $.each(data.errors, function(nome, mensagem) {
                        $('.callout').find("p").append(mensagem + "</br>");
                    });
                } else if ((data.exception)) {
                    mensagemErro();
                } else {
                    mensagemSuccess();
                }
            },
            error: function() {
                mensagemErro();
            },
        });
    });

});