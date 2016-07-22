$(document).ready(function(){
  $('#frmalumno').validate({
      rules:{
        nuevoNombre:{
          required:true
        },
        nuevoApellido:{
          required:true
        },
        nuevoEmail:{
          required:true,
          email:true
        },
        nuevoLMS:{
          required:true
        },
        nuevoPassword:{
          required:true
        },
        nuevoPassword2:{
          required:true,
          equalTo:"#nuevoPassword"
        }
      },
      messages:{
        nuevoNombre: "<span class='label label-danger'>Ingresar NOMBRE</span>",
        nuevoApellido: "<span class='label label-danger'>Ingresar APELLIDO</span>",
        nuevoEmail:{
          required:"<span class='label label-danger'>Ingresar EMAIL</span>",
          email:"<span class='label label-danger'>Ingresar EMAIL VÁLIDO</span>"
        },
        nuevoLMS: "<span class='label label-danger'>Ingresar ID LMS</span>",
        nuevoPassword:"<span class='label label-danger'>Ingresar CONTRASEÑA</span>",
        nuevoPassword2:{
          required:"<span class='label label-danger'>Ingresar CONTRASEÑA</span>",
          equalTo:"<span class='label label-danger'>Las CONTRASEÑAS no coinciden</span>"
        }
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
        		validarAlumno();
  			}

  });


  $('#frmEditarAlumno').validate({
    rules:{
      editarNombre:{
        required:true
      },
      editarApellido:{
        required:true
      },
      editarEmail:{
        required:true,
        email:true
      },
      editarLMS:{
        required:true
      }
    },
    messages:{
      editarNombre: "<span class='label label-danger'>Ingresar NOMBRE</span>",
      editarApellido: "<span class='label label-danger'>Ingresar APELLIDO</span>",
      editarEmail:{
        required:"<span class='label label-danger'>Ingresar EMAIL</span>",
        email:"<span class='label label-danger'>Ingresar EMAIL VÁLIDO</span>"
      },
      editarLMS: "<span class='label label-danger'>Ingresar ID LMS</span>"
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
        validarEditarAlumno();
    }

  });

/*
  $('#frmPassProfesor').validate({
    rules:{
      cambiarPassword:{
        required:true
      },
      cambiarPassword2:{
        required:true,
        equalTo:"#cambiarPassword"
      }
    },
    messages:{
      cambiarPassword:"<span class='label label-danger'>Ingresar CONTRASEÑA</span>",
      cambiarPassword2:{
        required:"<span class='label label-danger'>Ingresar CONTRASEÑA</span>",
        equalTo:"<span class='label label-danger'>Las CONTRASEÑAS no coinciden</span>"
      }
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
        validarPassProfesor();
    }
  });*/

});
