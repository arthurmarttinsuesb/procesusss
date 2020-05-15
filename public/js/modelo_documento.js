 $(document).ready(function($) {
     $('.textarea').summernote({
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
             url: base_url + '/modelo-documento/inserir-imagem',
             cache: false,
             contentType: false,
             processData: false,
             data: data,
             type: "post",
             success: function(data) {
                 // editor.insertNode(welEditable, "<img src='{{url('storage/imagem_summernote/'" + data + "}}'>");
                 // var file = $('<img>').attr('src', '{{url("storage / imagem_summernote /"' + data + '}}');
                 $('#conteudo').summernote("insertImage", base_url + "/storage/imagem_modelo/" + data);
             },
             error: function(data) {
                 console.log(data);
             }
         });
     }
 })

 $(document).on('click', '.btnNovo', function() {
     var titulo = $("#titulo").val();
     var conteudo = $('#conteudo').val();
     $.ajax({
         type: 'post',
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         url: base_url + '/modelo-documento/store',
         data: {
             'titulo': titulo,
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
                 console.log('deu erro');
             } else {
                 console.log('deu certo');
             }
         },
         error: function() {
             console.log('deu erro');
         },
     });
 });

 $(document).on('click', '.btnEditar', function() {
     var id = $("#id").val();
     var titulo = $("#titulo").val();
     var conteudo = $('#conteudo').val();
     $.ajax({
         type: 'post',
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         url: base_url + '/modelo-documento/update',
         data: {
             'id': id,
             'titulo': titulo,
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
                 console.log('deu erro');
             } else {
                 console.log('deu certo');
             }
         },
         error: function() {
             console.log('deu erro');
         },
     });
 });