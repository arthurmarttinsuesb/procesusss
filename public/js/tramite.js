 $(document).ready(function($) {

     const select = $(".select2");
     if (Object.keys(select).length !== 0) {
         select.select2({
             theme: "bootstrap4",
             tags: true,
             tokenSeparators: [';', '']
         });
     }

     $(document).on('change', '#envio', function() {
         var envio = $("#envio option:selected").val();
         if (envio == 'setor') {
             $(".setor").show();
             $(".colaborador").hide();
         } else if (envio == 'colaborador') {
             $(".colaborador").show();
             $(".setor").hide();
         }
     });
 });