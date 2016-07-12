$(document).ready(function(){
  $('#frmAgregarTema').validate({
    rules:{
      nuevaClave:{
        required:true
      },
      nuevoTema:{
        required:true
      }
    },
    messages:{
      nuevaClave: "<span class='label label-danger'>Ingresar CLAVE</span>",
      nuevoTema: "<span class='label label-danger'>Ingresar TEMA</span>"
    },
    errorPlacement: function ( error, element ) {
      error.insertAfter( element );
    },
    highlight: function ( element, errorClass, validClass ) {
      $(element).addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).addClass(validClass).removeClass(errorClass);
    },
    submitHandler: function () {
      agregarNuevoTema();
    }
  });

  $('#frmEditarTema').validate({
    rules:{
      clave:{
        required:true
      },
      tema:{
        required:true
      }
    },
    messages:{
      clave: "<span class='label label-danger'>Ingresar CLAVE</span>",
      tema: "<span class='label label-danger'>Ingresar TEMA</span>"
    },
    errorPlacement: function ( error, element ) {
      error.insertAfter( element );
    },
    highlight: function ( element, errorClass, validClass ) {
      $(element).addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).addClass(validClass).removeClass(errorClass);
    },
    submitHandler: function () {
      guardarTema();
    }
  });

  $('#frmAgregarContenido').validate({
    rules:{
      nuevoSubtema:{
        required:true
      },
      nuevoContenido:{
        required:true
      }
    },
    messages:{
      nuevoSubtema: "<span class='label label-danger'>Ingresar SUBTEMA</span>",
      nuevoContenido: "<span class='label label-danger'>Ingresar CONTENIDO</span>"
    },
    errorPlacement: function ( error, element ) {
      error.insertAfter( element );
    },
    highlight: function ( element, errorClass, validClass ) {
      $(element).addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).addClass(validClass).removeClass(errorClass);
    },
    submitHandler: function () {
      agregarContenido();
    }
  });

  $('#frmEditarContenido').validate({
    rules:{
      subtemaEditar:{
        required:true
      },
      contenidoEditar:{
        required:true
      }
    },
    messages:{
      subtemaEditar: "<span class='label label-danger'>Ingresar SUBTEMA</span>",
      contenidoEditar: "<span class='label label-danger'>Ingresar CONTENIDO</span>"
    },
    errorPlacement: function ( error, element ) {
      error.insertAfter( element );
    },
    highlight: function ( element, errorClass, validClass ) {
      $(element).addClass(errorClass).removeClass(validClass);
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).addClass(validClass).removeClass(errorClass);
    },
    submitHandler: function () {
      guardarContenidoEditado();
    }
  });

});
