$(document).ready(function(){

  $('#frmEditarTema').validate({
    rules: {
              clave: {required:true},
              tema: {required:true}
              },
    messages: {
                clave: {required: "<span class='label label-danger'>Escribir Clave</span>"},
                tema: {required: "<span class='label label-danger'>Escribir Tema</span>"}
              }
  });

});
