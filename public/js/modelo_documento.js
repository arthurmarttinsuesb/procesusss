$(document).ready(function ($) {
   
    $('.textarea').summernote({
        height: 900,
       
       
        callbacks: {
            onImageUpload: function (files, editor, $editable) {
                uploadImage(files[0], editor, $editable);
            },
            onMediaDelete: function (target) {
                deleteFile(target[0].src);
            },
            
        },
    }, 
   );
   

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
            success: function (data) {
                $('#conteudo').summernote("insertImage", "/editor/" + data);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    function deleteFile(file) {
        var local = file.replace(base_url, '');
        $.ajax({
            url: base_url + '/modelo-documento/remover-imagem',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { local: local },
            type: "post",
            dataType: 'json',
            cache: false,
            success: function (data) { },
            error: function (data) {
                // console.log(data);
            }
        });
    }
})
