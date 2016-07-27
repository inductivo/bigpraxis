
cargarGrados();

$('#opcionalumnos').on('click',opcionesAlumnos);
$('#btnalumnos').on('click',realizarConsultaAlumnos);

function opcionesAlumnos(){
  $('#principal').empty();
  $('#principal').load('alumnos');
}

function realizarConsultaAlumnos(){
	var grado = $('#grados').val();
  var semestre = $('#semestres').val();
	obtenerAlumnos(grado,semestre,imprimirAlumnos);
}

function obtenerAlumnos(grado,semestre,imprimirAlumnos){
	$.ajax({
		data : {
			format :'jsonp',
			method : 'get',
			grado : grado,
      semestre : semestre,
		},
		url: '../administracion/consultar_alumnos',
	}) .done(imprimirAlumnos);
}

function imprimirAlumnos(jsonData){
  $('#cabecera').empty();
  $('#content').empty();
  $('#botones').empty();

	$alumnos= JSON.parse(jsonData);
  var cabecera = '<div class="row header-pregunta"><div class="col-lg-12 text-left"> <i class="fa fa-child fa-lg" aria-hidden="true"></i> Existen <strong>'+$alumnos.length+'</strong> alumnos registrados</div> </div>';
  $('#cabecera').html(cabecera);

  if($alumnos.length > 0){
    var th= '<div class="row"><div class="col-lg-12"><div class="table-responsive"><table id="fila-tema" class="table table-condensed tabla-temas"><tr class="th-temas"><th class="text-center">#</th><th class="text-center">Nombre</th><th class="text-center">Email</th><th class="text-center">ID-LMS</th><th></th><th></th><th></th></tr></table></div></div></div>';
    $('#content').html(th);

    for(i=0; i<$alumnos.length;i++){
      var td1 = '<tr class="tr-temas"><td class="text-center">'+(i+1)+'</td>';
      var td2 ='<td>'+$alumnos[i].apellidos+' '+$alumnos[i].nombre+'</td>';
      var td3 = '<td>'+$alumnos[i].email+'</td>';
      var td4 = '<td class="text-center">'+$alumnos[i].id_lms+'</td>';
      var editar = '<td><span data-id='+$alumnos[i].id_alumnos+' data-toggle="modal" data-target="#editarAlumno" class="editarAlumno"><i class="fa fa-lg fa-pencil-square icon-cursor icon-editar" aria-hidden="true"> </i></span><span class="hidden-xs hidden-sm"> Editar</span></td>';
      var password = '<td><span data-id='+$alumnos[i].id_alumnos+' data-toggle="modal" data-target="#actualizarPassword" class="cambiarPassword"><i class="fa fa-asterisk icon-cursor icon-pass" aria-hidden="true"> </i></span><span class="hidden-xs hidden-sm"></span></td>';
      var eliminar = '<td><span data-id='+$alumnos[i].id_alumnos+' data-toggle="modal" data-target="#eliminarAlumno" class="eliminarAlumno"><i class="fa fa-lg fa-times-circle icon-cursor icon-eliminar" aria-hidden="true"></i></span></td></tr>';

			$('#fila-tema').append(td1+td2+td3+td4+editar+password+eliminar);
    }
  }

  var btnNuevo = '<div class="row"><div class="col-lg-12"> <button type="button" class="btn btnNuevo" name="btnNuevo" data-toggle="modal" data-target="#nuevoAlumno"><i class="fa fa-user-plus"></i>  Agregar Alumno</button></div></div>';
  $('#botones').html(btnNuevo);

  //Funciones para EDITAR los datos del ALUMNO
	$('.editarAlumno').on('click',buscarAlumnoEditar);
	function buscarAlumnoEditar(){
		var id=$(this).attr('data-id');
		editarAlumno(id,mostrarDatosAlumno);
	}

	function editarAlumno(id_alumno, mostrarDatosAlumno){
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_alumno : id_alumno
			},
			url: '../administracion/buscar_alumno',
		}) .done(mostrarDatosAlumno);
	}

	function mostrarDatosAlumno(jsonData){
		$alumno = JSON.parse(jsonData);
		$('#id_editarAlumno').val($alumno.id_alumnos);
		$('#editarNombre').val($alumno.nombre);
		$('#editarApellido').val($alumno.apellidos);
		$('#editarEmail').val($alumno.email);
		$('#editarLMS').val($alumno.id_lms);
	}

  $('.cambiarPassword').on('click',enviarID);
	function enviarID(){
		var id=$(this).attr('data-id');
		$('#id_passAlumno').val(id);
	}

  //Funciones para ELIMINAR el registro de un ALUMNO
	$('.eliminarAlumno').on('click',buscarAlumnoEliminar);
	function buscarAlumnoEliminar(){
		var id=$(this).attr('data-id');
		if(confirm('¿Estas seguro de eliminar este ALUMNO?') == true){
				eliminarAlumno(id,alumnoEliminado);
			}
	}
	function eliminarAlumno(id_alumno,alumnoEliminado){
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_alumno : id_alumno
			},
			url: '../administracion/eliminar_alumno',
		}) .done(alumnoEliminado);
	}

	function alumnoEliminado(){
		realizarConsultaAlumnos();
		mensajeRegistroEliminado();
	}

}

//Funciones para agregar un nuevo ALUMNO
function validarAlumno(){

  var grado = $('#grados').val();
  var semestre = $('#semestres').val();
  var nombre= $('#nuevoNombre').val();
  var apellidos= $('#nuevoApellido').val();
  var email= $('#nuevoEmail').val();
  var lms = $('#nuevoLMS').val();
  var password= $('#nuevoPassword').val();

  $.ajax({
    data : {
      format :'jsonp',
      method : 'get',
      grado : grado,
      semestre : semestre,
      nombre : nombre,
      apellidos : apellidos,
      email : email,
      lms : lms,
      password : password
    },
    url: '../administracion/validar_alumno',
  }) .done(confirmarAlumno);
}

function confirmarAlumno(){
  $('#nuevoNombre').val('');
  $('#nuevoApellido').val('');
  $('#nuevoEmail').val('');
  $('#nuevoLMS').val('');
  $('#nuevoPassword').val('');
  $('#nuevoPassword2').val('');
  $('#nuevoAlumno').modal('hide');
  realizarConsultaAlumnos();
  mensajeExito();
}

//Funciones para GUARDAR la información editada del ALUMNO
function validarEditarAlumno(){
  var id_alumno = $('#id_editarAlumno').val();
  var nombre= $('#editarNombre').val();
  var apellidos= $('#editarApellido').val();
  var email= $('#editarEmail').val();
  var lms = $('#editarLMS').val();

  $.ajax({
    data : {
      format :'jsonp',
      method : 'get',
      id_alumno : id_alumno,
      nombre : nombre,
      apellidos : apellidos,
      email : email,
      lms : lms
    },
    url: '../administracion/editar_alumno',
  }) .done(confirmarAlumnoActualizado);
}

function confirmarAlumnoActualizado(){
  $('#id_editarAlumno').val('');
  $('#editarNombre').val('');
  $('#editarApellido').val('');
  $('#editarEmail').val('');
  $('#editarLMS').val('');
  $('#editarAlumno').modal('hide');
  realizarConsultaAlumnos();
  mensajeExito();
}

//Funciones para CAMBIAR LA CONTRASEÑA del ALUMNO
function validarPassAlumno(){
  var id_alumno = $('#id_passAlumno').val();
  var password= $('#cambiarPassword').val();

  $.ajax({
    data : {
      format :'jsonp',
      method : 'get',
      id_alumno : id_alumno,
      password : password
    },
    url: '../administracion/cambiar_password_alumno',
  }) .done(confirmarPassAlumno);
}

function confirmarPassAlumno(){
  $('#id_passAlumno').val('');
  $('#cambiarPassword').val('');
  $('#cambiarPassword2').val('');

  $('#actualizarPassword').modal('hide');
  realizarConsultaAlumnos();
  mensajeExito();
}
