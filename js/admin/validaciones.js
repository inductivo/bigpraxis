$(document).ready(function(){
  $('#frmprofesor').validate({
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
        nuevoPassword:"<span class='label label-danger'>Ingresar CONTRASEÑA</span>",
        nuevoPassword2:{
          required:"<span class='label label-danger'>Ingresar CONTRASEÑA</span>",
          equalTo:"<span class='label label-danger'>La CONTRASEÑA no coincide</span>"
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
				}
  });

  $.validator.setDefaults( {
  			submitHandler: function () {
        		validarProfesor();
  			}
  		} );
});
