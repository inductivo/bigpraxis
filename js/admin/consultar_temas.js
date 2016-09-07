$('#opciontemas').on('click',opcionesTemas);
$('#btnconsultartemas').on('click',realizarConsulta);
$('#materias').on('change',realizarConsulta);

cargarGrados();

//Funciones para consultar los temas
function opcionesTemas(){
	$('#opciones-preguntas').html('');
	$('#principal').html('');
	$('#principal').load('consultar_temas');
}

function realizarConsulta(){
	var materia = $('#materias').val();
	obtenerTemas(materia,imprimirTemas);
}

function obtenerTemas(materia,imprimirTemas){
	$.ajax({
		data : {
			format :'jsonp',
			method : 'get',
			materia : materia
		},
		url: 'cargarConsultaTemas',
	}) .done(imprimirTemas);
}

function imprimirTemas(jsonData){
  $('#content').empty();
	$temas= JSON.parse(jsonData);

  var cabecera = '<div class="row header-pregunta"><div class="col-lg-12 text-left"> <i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i> Se encontraron <strong>'+$temas.length+'</strong> temas</div> </div>';
  $('#cabecera').html(cabecera);

  if($temas.length > 0){
    var th= '<div class="row"><div class="col-lg-12"><div class="table-responsive"><table id="fila-tema" class="table table-condensed tabla-temas"><tr class="th-temas"><th class="text-center">Clave</th><th class="text-center">Tema</th><th></th><th></th><th></th></tr></table></div></div></div>';
    $('#content').html(th);

    for(i=0; i<$temas.length;i++){
      var td = '<tr class="tr-temas"><td class="text-center">'+$temas[i].clave+'</td><td>'+$temas[i].tema+'</td>';
      var editar = '<td><span data-id='+$temas[i].id_temas+' data-toggle="modal" data-target="#editarTema" class="editarTema"><i class="fa fa-lg fa-pencil-square icon-cursor icon-editar" aria-hidden="true"> </i></span><span class="hidden-xs hidden-sm"> Editar</span></td>';
			var contenido ='<td><span data-id = '+$temas[i].id_temas+' class="verContenidos"> <i class="fa fa-lg fa-list-ul icon-cursor icon-contenido" aria-hidden="true"></i></span><span class="hidden-xs hidden-sm"> Contenidos</span></td>';
			var eliminar = '<td><span data-id='+$temas[i].id_temas+' data-toggle="modal" data-target="#eliminarTema" class="eliminarTema"><i class="fa fa-lg fa-times-circle icon-cursor icon-eliminar" aria-hidden="true"></i></span></td></tr>';

			$('#fila-tema').append(td+editar+contenido+eliminar);
    }

    //Funciones para buscar la informacion del tema que se selecciono
    $('.editarTema').on('click',buscarTemaEditar);

    function buscarTemaEditar(){
			var id_tema = $(this).attr('data-id');
    	editarTema(id_tema,mostrarDatosTema);
    }

    function editarTema(id_temas,mostrarDatosTema){
    	$.ajax({
    		data : {
    			format :'jsonp',
    			method : 'get',
    			id_temas : id_temas
    		},
    		url: 'buscar_tema',
    	}) .done(mostrarDatosTema);
    }

    function mostrarDatosTema(jsonData){
      $temas = JSON.parse(jsonData);
      $('#id_temas').val($temas.id_temas);
      $('#id_materias').val($temas.id_materias);
      $('#clave').val($temas.clave);
      $('#tema').val($temas.tema);
    }

//Funciones para eliminar un Tema
		$('.eliminarTema').on('click',buscarTemaEliminar);

		function buscarTemaEliminar(){
      var id_tema = $(this).attr('data-id');
			if(confirm('¿Estas seguro de eliminar este Tema?') == true)
			{
				eliminarTema(id_tema,temaEliminado);
			}
    }
		function eliminarTema(id_temas,temaEliminado){
    	$.ajax({
    		data : {
    			format :'jsonp',
    			method : 'get',
    			id_temas : id_temas
    		},
    		url: 'eliminar_tema',
    	}) .done(temaEliminado);
    }

		function temaEliminado(){
			realizarConsulta();
			mensajeRegistroEliminado();
    }

		//Funciones para ver los contenidos del Tema
		$('.verContenidos').on('click',buscarContenidos);

		function buscarContenidos(){
      var id_temaContenido = $(this).attr('data-id');
			$('#id_Editartemas').val(id_temaContenido);
			$('#id_temaNuevoContenido').val(id_temaContenido);
			obtenerNombreTema(id_temaContenido,imprimirNombreTema);
			obtenerContenidos(id_temaContenido,imprimirContenidos);
    }

		function obtenerNombreTema(id_temas){
			$.ajax({
				data : {
					format :'jsonp',
					method : 'get',
					id_temas : id_temas
				},
				url: 'buscar_tema',
			}) .done(imprimirNombreTema);
		}

		function imprimirNombreTema(jsonData){
			$('#cabecera').empty();
			$temas=JSON.parse(jsonData);
			var tema = $temas.tema;
			var clave = $temas.clave;
			var cabecera = '<div class="row header-pregunta"><div class="col-lg-12 text-center"> <span class="titulo-tema"><strong>'+clave+'. '+tema+'</strong><span> </div></div>';
			$('#cabecera').html(cabecera);
		}
	} //If imprimirTemas

	var btnNuevoTema = '<div class="row"><div class="col-lg-12"> <button type="button" class="btn btnNuevo" name="btnNuevoTema" data-toggle="modal" data-target="#agregarTemaModal"><i class="fa fa-file-text-o"></i>  Agregar Tema</button></div> </div>';
	$('#botones').html(btnNuevoTema);

} //Cierre de función imprimirTemas

	//GUARDAR UN TEMA EDITADO
	function guardarTema(){
	  var id_tema = $('#id_temas').val();
	  var clave = $('#clave').val();
	  var tema = $('#tema').val();
	  var id_materias = $('#id_materias').val();
	  enviarTema(id_tema,clave,tema,id_materias,edicionExitosa);
	}

	function enviarTema(id_temas,clave,tema,id_materias,edicionExitosa){
	  $.ajax({
	    data : {
	      format :'jsonp',
	      method : 'get',
	      id_temas : id_temas,
	      clave : clave,
	      tema : tema,
	      id_materias : id_materias
	    },
	    url: 'guardar_tema',
	  }) .done(edicionExitosa);
	}

	function edicionExitosa(){
		$('#editarTema').modal('hide');
		realizarConsulta();
		mensajeExito();
	}

	//Funciones para AGREGAR UN TEMA NUEVO
	function agregarNuevoTema(){
		var id_materias=$('#materias').val();
	  var clave = $('#nuevaClave').val();
	  var tema = $('#nuevoTema').val();

	  $.ajax({
	    data : {
	      format :'jsonp',
	      method : 'get',
				id_materias : id_materias,
	      clave : clave,
	      tema : tema
	    },
	    url: 'agregar_tema',
	  }) .done(temaAgregado);
	}

	function temaAgregado(){
		$('#nuevaClave').val('');
		$('#nuevoTema').val('');
		$('#agregarTemaModal').modal('hide');
		realizarConsulta();
		mensajeExito();
	}

	//Funciones para AGREGAR UN CONTENIDO NUEVO
	function agregarContenido(){
		debugger;
		var id_nuevoTema = $('#id_temaNuevoContenido').val();
		var nuevaSubclave = $('#nuevoSubtema').val();
		var nuevoContenido = $('#nuevoContenido').val();
		var nuevoPreguntasAsig = $('#nuevoPreguntasAsignadas').val();
		var nuevoStatus = $('input:radio[name=nuevoStatus]:checked').val();
		console.log("Activacion: " + nuevoStatus);

		enviarNuevoContenido(id_nuevoTema,nuevaSubclave,nuevoContenido,nuevoStatus,nuevoPreguntasAsig,contenidoAgregado);
	}

	function enviarNuevoContenido(id_temas,subclave,contenido,activacion,preguntasAsig,contenidoAgregado){
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_temas : id_temas,
				subclave : subclave,
				contenido : contenido,
				activacion : activacion,
				preguntasAsig : preguntasAsig
			},
			url: 'agregar_contenido',
			}) .done(contenidoAgregado);
		}

	function contenidoAgregado(){
		var id_temaNuevoContenido = $('#id_temaNuevoContenido').val();
		$('#nuevoSubtema').val('');
		$('#nuevoContenido').val('');
		$('#nuevoPreguntasAsignadas').val('');
		$('#agregarNuevoContenido').modal('hide');
		obtenerContenidos(id_temaNuevoContenido,imprimirContenidos);
		mensajeExito();
	}

	//Funciones para guardar un CONTENIDO editado
	function guardarContenidoEditado(){
		var id_contenido = $('#id_Editarcontenidos').val();
		var subclave = $('#subtemaEditar').val();
		var contenido = $('#contenidoEditar').val();
		var status = $('input:radio[name=status]:checked').val();
		var preguntasAsig = $('#preguntasAsignadasEditar').val();
		enviarContenido(id_contenido,subclave,contenido,status,preguntasAsig,edicionContenidoExitosa);
	}

	function enviarContenido(id_contenidos,subclave,contenido,activacion,preguntasAsig,edicionContenidoExitosa){
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_contenidos : id_contenidos,
				subclave : subclave,
				contenido : contenido,
				activacion : activacion,
				preguntasAsig : preguntasAsig
			},
			url: 'guardar_contenido',
		}) .done(edicionContenidoExitosa);
	}

	function edicionContenidoExitosa(){
		var id_tema = $('#id_Editartemas').val();
		obtenerContenidos(id_tema,imprimirContenidos);
		$('#editarContenidoModal').modal('hide');
		mensajeExito();
	}

	function obtenerContenidos(id_temas,imprimirContenidos){
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_temas : id_temas
			},
			url: 'buscar_contenidos',
		}) .done(imprimirContenidos);
	}

	function mensajeExito(){
		var mensaje = '<div class="row"><div class="col-lg-12 text-center alerta alerta-exito">Actualización exitosa  <i class="fa fa-check-circle" aria-hidden="true"></i></div></div>';
	  $('#mensaje').html(mensaje);

		window.setTimeout(function() {
				$(".alerta-exito").fadeTo(1500, 0).slideUp(500, function(){
					$(this).remove();
				});
		}, 3500);
	}

	function mensajeRegistroEliminado(){
		var mensaje = '<div class="row"><div class="col-lg-12 text-center alerta alerta-eliminar">Registro eliminado <i class="fa fa-times-circle" aria-hidden="true"></i></div></div>';
		$('#mensaje').html(mensaje);
		window.setTimeout(function() {
				$(".alerta-eliminar").fadeTo(1500, 0).slideUp(500, function(){
					$(this).remove();
				});
		}, 3500);
	}

function imprimirContenidos(jsonData){
	$('#content').empty();
	$('#botones').empty();
	$contenidos= JSON.parse(jsonData);

	if($contenidos.length > 0){
		var th= '<div class="row"><div class="col-lg-12"><div class="table-responsive"><table id="fila-contenido" class="table table-condensed tabla-temas"><tr class="th-temas"><th class="text-center">Status</th><th class="text-center">Subtema</th><th class="text-center">Contenido</th><th class="text-center">Preguntas existentes</th><th class="text-center">Preguntas asignadas</th><th></th><th></th></tr></table></div></div></div>';
		$('#content').html(th);

		for(var i=0; i<$contenidos.length;i++){
			var inicio = '<tr class="tr-temas">';
			var td = '<td class="text-center">'+$contenidos[i].subclave+'</td><td>'+$contenidos[i].contenido+'</td>';
			var preg = '<td class="text-center"><strong><span id="num_cont'+i+'"></span></strong></td>';
			var preg_asignadas = '<td class="text-center">'+$contenidos[i].preguntas_test+'</td>';
			var editar = '<td><span data-id='+$contenidos[i].id_contenidos+' data-toggle="modal" data-target="#editarContenidoModal" class="editarContenido"><i class="fa fa-lg fa-pencil-square icon-cursor icon-editar" aria-hidden="true"> </i></span><span class="hidden-xs hidden-sm"> Editar</span></td>';
			var eliminar = '<td><span data-id='+$contenidos[i].id_contenidos+' class="eliminarContenido"><i class="fa fa-lg fa-times-circle icon-cursor icon-eliminar" aria-hidden="true"></i></span></td></tr>';

			if($contenidos[i].activacion == 1){
				var status = '<td class="text-center"><span><i class="fa fa-check-circle fa-lg icon-activacion1" aria-hidden="true"></i></span></td>';
			}
			else{
				var status = '<td class="text-center"><span><i class="fa fa-ban fa-lg icon-activacion2" aria-hidden="true"></i></span></td>';
			}

			$('#fila-contenido').append(inicio+status+td+preg+preg_asignadas+editar+eliminar+preg);
			num_preg($contenidos[i].id_contenidos,i);
		}

	function num_preg(id_contenidos,i){
			$.ajax({
				data : {
				format :'jsonp',
				method : 'get',
				id_contenidos : id_contenidos
				},
				url: '../administracion/numero_preguntas_contenido',
				success : function (data){
					$('#num_cont'+i).append(data);

				}
			})
		}

		//Funciones para buscar la informacion del contenido que se selecciono
			$('.editarContenido').on('click',buscarContenidoEditar);
			function buscarContenidoEditar(){
				var id = $(this).attr('data-id');
			  editarContenido(id,mostrarDatosContenido);
			}

			function editarContenido(id_contenidos,mostrarDatosContenido){
				$.ajax({
			  	data : {
			    format :'jsonp',
			    method : 'get',
			    id_contenidos : id_contenidos
			  	},
			    url: 'buscar_contenido',
			  }) .done(mostrarDatosContenido);
			}

			function mostrarDatosContenido(jsonData){
			  $contenido = JSON.parse(jsonData);
			  $('#id_Editartemas').val($contenido.id_temas);
			  $('#id_Editarcontenidos').val($contenido.id_contenidos);
			  $('#subtemaEditar').val($contenido.subclave);
			  $('#contenidoEditar').val($contenido.contenido);
				$('#preguntasAsignadasEditar').val($contenido.preguntas_test);

				if($contenido.activacion == 1){
					$('#status-activo').prop("checked", true);
				}
				else{
						$('#status-inactivo').prop("checked", true);
				}

			}
			//Funciones para ELIMINAR un CONTENIDO
			$('.eliminarContenido').on('click',buscarContenidoEliminar);
			function buscarContenidoEliminar(){
				var id = $(this).attr('data-id');
				if(confirm('¿Estas seguro de eliminar este Contenido?') == true){
					eliminarContenido(id,contenidoEliminado);
				}
			}
			function eliminarContenido(id_contenidos,contenidoEliminado){
				$.ajax({
					data : {
					format :'jsonp',
					method : 'get',
					id_contenidos : id_contenidos
					},
					url: 'eliminar_contenido',
				}) .done(contenidoEliminado);
			}

			function contenidoEliminado(){
				var id_tema = $('#id_Editartemas').val();
				obtenerContenidos(id_tema,imprimirContenidos);
				mensajeRegistroEliminado();
			}

	}//If imprimirContenidos
	var btnNuevoContenido = '<div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <button type="button" class="btn btnNuevoContenido" name="btnNuevoContenido" data-toggle="modal" data-target="#agregarNuevoContenido"><i class="fa fa-list"></i>  Agregar Contenido</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 cajaBtnVerTemas"><button type="button" class="btn btnVerTemas" name="btnVerTemas"><i class="fa fa-file-text-o"></i>  Ver Temas</button></div></div>';
	$('#botones').html(btnNuevoContenido);
	$('.btnVerTemas').on('click',realizarConsulta);
}//Fin imprimirContenidos
