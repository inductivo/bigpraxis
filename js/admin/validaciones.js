$(document).ready(function() {
  $( ".frmNuevoProfesor" ).validate({
    rules:{
      nuevoNombre: "required",
      nuevoApellido: "required",
      nuevoEmail:{
        required:true,
        email:true
      },
      nuevoPassword:"required",
      nuevoPassword2:{
        required:true,
        equalTo:"#nuevoPassword2"
      }
    },
    messages:{
      nuevoNombre: "<span class='label label-important'>Ingresar NOMBRE</span>",
      nuevoApellido: "<span class='label label-important'>Ingresar APELLIDO</span>",
      nuevoEmail:{
        required:"<span class='label label-important'>Ingresar EMAIL</span>",
        email:"<span class='label label-important'>Ingresar EMAIL VALIDO</span>"
      },
      nuevoPassword:"<span class='label label-important'>Ingresar CONTRASEÑA</span>",
      nuevoPassword2:{
        required:"<span class='label label-important'>Ingresar CONTRASEÑA</span>",
        equalTo:"<span class='label label-important'>La CONTRASEÑA no coincide</span>"
      }
    }
  });
});
