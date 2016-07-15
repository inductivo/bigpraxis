$(document).ready(function(){

$('#frmlogin').validate({

			rules: {
					email: {required:true,
					email:true},
					password: {required:true}
			},

			messages: {
					email: {required : "<span class='label label-danger'>Ingresar email</span>",
					email: "<span class='label label-danger'>Ingresar una dirección valida de email</span>"},
					password: {required : "<span class='label label-danger'>Ingresar password</span>"}
			}

		});
});
