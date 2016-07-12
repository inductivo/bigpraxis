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
	cargarNiveles();
  $('#content').empty();
  $profesores = JSON.parse(jsonData);
  var cabecera = '<div class="row header-pregunta"><div class="col-lg-12 text-left"> <i class="fa fa-question-circle fa-lg" aria-hidden="true"></i> Existen <strong>'+$profesores.length+'</strong> profesores registrados</div> </div>';
  $('#cabecera').html(cabecera);

  if($profesores.length > 0){
    var th= '<div class="row"><div class="col-lg-12"><div class="table-responsive"><table id="fila-tema" class="table table-condensed tabla-temas"><tr class="th-temas"><th class="text-center">#</th><th class="text-center">Nombre</th><th class="text-center">Email</th><th class="text-center">Nivel</th><th></th><th></th><th></th></tr></table></div></div></div>';
    $('#content').html(th);

    for(i=0; i<$profesores.length;i++){
      var td = '<tr class="tr-temas"><td class="text-center">'+(i+1)+'</td><td>'+$profesores[i].nombre+' '+$profesores[i].apellidos+'</td><td>'+$profesores[i].email+'</td><td class="text-center">'+$profesores[i].nivel+'</td>';
      var editar = '<td><span data-id='+$profesores[i].id_usuarios+' data-toggle="modal" data-target="#editarProfesor" class="editarProfesor"><i class="fa fa-lg fa-pencil-square icon-cursor icon-editar" aria-hidden="true"> </i></span><span class="hidden-xs hidden-sm"> Editar</span></td>';
      var password = '<td><span data-id='+$profesores[i].id_usuarios+' data-toggle="modal" data-target="#actualizarPassword" class="cambiarPassword"><i class="fa fa-asterisk icon-cursor icon-pass" aria-hidden="true"> </i></span><span class="hidden-xs hidden-sm"></span></td>';
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
		if(confirm('¿Estas seguro de eliminar al Profesor?') == true){
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

	//Funciones para EDITAR los datos del Profesor
	$('.editarProfesor').on('click',buscarProfesorEditar);
	function buscarProfesorEditar(){
		var id=$(this).attr('data-id');
		editarProfesor(id,mostrarDatosProfesor);
	}

	function editarProfesor(id_usuarios, mostrarDatosProfesor){
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_usuarios : id_usuarios
			},
			url: '../administracion/buscar_profesor',
		}) .done(mostrarDatosProfesor);
	}

	function mostrarDatosProfesor(jsonData){
		$profesor = JSON.parse(jsonData);
		$('#id_editarProfesor').val($profesor.id_usuarios);
		$('#editarNombre').val($profesor.nombre);
		$('#editarApellido').val($profesor.apellidos);
		$('#editarEmail').val($profesor.email);
		$('#editarNivel').val($profesor.nivel);
		$('#editarEmail').val($profesor.email);
	}

	$('.cambiarPassword').on('click',enviarID);
	function enviarID(){
		var id=$(this).attr('data-id');
		$('#id_passProfesor').val(id);
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

		$('#nuevoNombre').val('');
		$('#nuevoApellido').val('');
		$('#nuevoEmail').val('');
		$('#nuevoPassword').val('');
		$('#nuevoPassword2').val('');
		$('#nuevoNivel').html('');
		$('#editarNivel').html('');

		for(var i=0; i<$opciones.length;i++){
			$('.niveles').append('<option value="'+ $opciones[i].nivel +'">'+ $opciones[i].descripcion +'</option>');
		}
	}
}

	//Funciones para agregar un nuevo Profesor
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
		$('#nuevoNombre').val('');
		$('#nuevoApellido').val('');
		$('#nuevoEmail').val('');
		$('#nuevoPassword').val('');
		$('#nuevoPassword2').val('');
		$('#nuevoProfesor').modal('hide');
		buscarProfesores();
		mensajeExito();
	}

	//Funciones para enviar la información editada del Profesor
	function validarEditarProfesor(){
		var id_usuarios = $('#id_editarProfesor').val();
		var nombre= $('#editarNombre').val();
		var apellidos= $('#editarApellido').val();
		var email= $('#editarEmail').val();
		var nivel = $('#editarNivel').val();

		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_usuarios : id_usuarios,
				nombre : nombre,
				apellidos : apellidos,
				email : email,
				nivel : nivel
			},
			url: '../administracion/editar_profesor',
		}) .done(confirmarProfesorActualizado);
	}

	function confirmarProfesorActualizado(){
		$('#id_editarProfesor').val('');
		$('#editarNombre').val('');
		$('#editarApellido').val('');
		$('#editarEmail').val('');
		$('#editarProfesor').modal('hide');
		buscarProfesores();
		mensajeExito();
	}

	//Funciones para CAMBIAR LA CONTRASEÑA del Profesor
	function validarPassProfesor(){
		var id_usuarios = $('#id_passProfesor').val();
		var password= $('#cambiarPassword').val();

		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_usuarios : id_usuarios,
				password : password
			},
			url: '../administracion/cambiar_password_profesor',
		}) .done(confirmarPassProfesor);
	}

	function confirmarPassProfesor(){
		$('#id_passProfesor').val('');
		$('#cambiarPassword').val('');
		$('#cambiarPassword2').val('');

		$('#actualizarPassword').modal('hide');
		buscarProfesores();
		mensajeExito();
	}
