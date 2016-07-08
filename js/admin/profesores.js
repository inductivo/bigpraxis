$('#opcionprofesores').on('click',opcionesProfesores);

function opcionesProfesores(){
	$('#principal').load('consultar_profesores',buscarProfesores);
}

function buscarProfesores(){
  obtenerProfesores(imprimirProfesores);
}

function obtenerProfesores(imprimirProfesores){
	$.ajax({
		data : {
			format :'jsonp',
			method : 'get'
		},
		url: '../administracion/buscar_profesores',
	}) .done(imprimirProfesores);
}

function imprimirProfesores(jsonData){
  $('#content').empty();
  $profesores = JSON.parse(jsonData);
  var cabecera = '<div class="row header-pregunta"><div class="col-lg-12 text-left"> <i class="fa fa-question-circle fa-lg" aria-hidden="true"></i> Se encontraron <strong>'+$profesores.length+'</strong> profesores</div> </div>';
  $('#cabecera').html(cabecera);

  if($profesores.length > 0){
    var th= '<div class="row"><div class="col-lg-12"><div class="table-responsive"><table id="fila-tema" class="table table-condensed tabla-temas"><tr class="th-temas"><th class="text-center">#</th><th class="text-center">Nombre</th><th class="text-center">Email</th><th class="text-center">Nivel</th><th></th><th></th><th></th></tr></table></div></div></div>';
    $('#content').html(th);

    for(i=0; i<$profesores.length;i++){
      var td = '<tr class="tr-temas"><td class="text-center">'+(i+1)+'</td><td>'+$profesores[i].nombre+' '+$profesores[i].apellidos+'</td><td>'+$profesores[i].email+'</td><td class="text-center">'+$profesores[i].nivel+'</td>';
      var editar = '<td><span data-id='+$profesores[i].id_usuarios+' data-toggle="modal" data-target="#editarProfesor" class="editarProfesor"><i class="fa fa-lg fa-pencil-square icon-cursor icon-editar" aria-hidden="true"> </i></span><span class="hidden-xs hidden-sm"> Editar</span></td>';
      var password = '<td><span data-id='+$profesores[i].id_usuarios+' data-toggle="modal" data-target="#cambiarPass" class="cambiarPass"><i class="fa fa-asterisk icon-cursor icon-pass" aria-hidden="true"> </i></span><span class="hidden-xs hidden-sm"></span></td>';
      var eliminar = '<td><span data-id='+$profesores[i].id_usuarios+' data-toggle="modal" data-target="#eliminarProfesor" class="eliminarProfesor"><i class="fa fa-lg fa-times-circle icon-cursor icon-eliminar" aria-hidden="true"></i></span></td></tr>';

      $('#fila-tema').append(td+editar+password+eliminar);

    }
  }
  var btnNuevo = '<div class="row"><div class="col-lg-12"> <button type="button" class="btn btnNuevo" name="btnNuevo" data-toggle="modal" data-target="#nuevoProfesor"><i class="fa fa-user-plus"></i>  Agregar Profesor</button></div></div>';
  $('#botones').html(btnNuevo);

	//Funciones para ELIMINAR el registro de un Profesor
	$('.eliminarProfesor').on('click',buscarProfesorEliminar);
	function buscarProfesorEliminar(){
		var id=$(this).attr('data-id');
		if(confirm('¿Estas seguro de eliminar este Contenido?') == true){
				eliminarProfesor(id,profesorEliminado);
			}
	}
	function eliminarProfesor(id_usuarios,profesorEliminado){
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_usuarios : id_usuarios
			},
			url: '../administracion/eliminar_profesor',
		}) .done(profesorEliminado);
	}

	function profesorEliminado(){
		buscarProfesores();
		mensajeRegistroEliminado();
	}


	//Funciones para cargar los niveles en el formulario
	$('.btnNuevo').on('click',cargarNiveles);

	function cargarNiveles(){
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get'
			},
			url: '../administracion/cargar_niveles_usuario',
		}) .done(imprimirNiveles);
	}

	function imprimirNiveles(jsonData){
		$opciones = JSON.parse(jsonData);
		for(var i=0; i<$opciones.length;i++){
			$('#nuevoNivel').append('<option value="'+ $opciones[i].nivel +'">'+ $opciones[i].descripcion +'</option>');
		}
	}
}

	$('#btnGuardarProfesor').on('click',validarProfesor);
	function validarProfesor(){
		var nombre= $('#nuevoNombre').val();
		var apellidos= $('#nuevoApellido').val();
		var email= $('#nuevoEmail').val();
		var nivel = $('#nuevoNivel').val();
		var password= $('#nuevoPassword').val();
		var password2= $('#nuevoPassword2').val();

		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				nombre : nombre,
				apellidos : apellidos,
				email : email,
				nivel : nivel,
				password : password,
				password2 : password2
			},
			url: '../administracion/validar_profesor',
		}) .done(confirmarProfesor);
	}

	function confirmarProfesor(){
		buscarProfesores();
		mensajeExito();
	}
