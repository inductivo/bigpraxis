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



$('#frmpublicar').validate({

			rules: {
					grados: {required:true},
					materias: {required:true},
					temas: {required:true},
					contenidos: {required:true},
					tipopregunta: {required:true},


			},

			messages: {
					grados: {required: "<span class='label label-danger'>Seleccionar el grado</span>"},
					materias: {required: "<span class='label label-danger'>Seleccionar la materia</span>"},
					temas: {required: "<span class='label label-danger'>Seleccionar el tema</span>"},
					contenidos: {required: "<span class='label label-danger'>Seleccionar el contenido</span>"},
					tipopregunta: {required: "<span class='label label-danger'>Seleccionar el tipo de pregunta</span>"}

			}

		});

$('#frmconsultar-preguntas').validate({

			rules: {
					grados: {required:true},
					semestres: {required:true},
					materias: {required:true},
					temas: {required:true},
					contenidos: {required:true},
			},

			messages: {
					grados: {required: "<span class='label label-danger'>Seleccionar el grado</span>"},
					semestres: {required: "<span class='label label-danger'>Seleccionar el semestre</span>"},
					materias: {required: "<span class='label label-danger'>Seleccionar la materia</span>"},
					temas: {required: "<span class='label label-danger'>Seleccionar el tema</span>"},
					contenidos: {required: "<span class='label label-danger'>Seleccionar el contenido</span>"}
			}

				});

});
