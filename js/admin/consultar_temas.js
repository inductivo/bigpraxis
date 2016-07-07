$('#opciontemas').on('click',opcionesTemas);
$('#btnconsultartemas').on('click',realizarConsulta);
$('#materias').on('change',realizarConsulta);

//Funciones para consultar los temas
function opcionesTemas(){
	$('#opciones-preguntas').html('');
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

  var cabecera = '<div class="row header-pregunta"><div class="col-lg-12 text-left"> <i class="fa fa-question-circle fa-lg" aria-hidden="true"></i> Se encontraron <strong>'+$temas.length+'</strong> temas</div> </div>';
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

		function actualizarTablaContenidos(id_tema){
			obtenerContenidos(id_tema,imprimirContenidos);
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

		function imprimirContenidos(jsonData){
			$('#content').empty();
			$('#botones').empty();
			$contenidos= JSON.parse(jsonData);

			if($contenidos.length > 0)
		  {
		    var th= '<div class="row"><div class="col-lg-12"><div class="table-responsive"><table id="fila-contenido" class="table table-condensed tabla-temas"><tr class="th-temas"><th class="text-center">Subtema</th><th class="text-center">Contenido</th><th></th><th></th></tr></table></div></div></div>';
		    $('#content').html(th);

				for(i=0; i<$contenidos.length;i++){
					var td = '<tr class="tr-temas"><td class="text-center">'+$contenidos[i].subclave+'</td><td>'+$contenidos[i].contenido+'</td>';
					var editar = '<td><span data-id='+$contenidos[i].id_contenidos+' data-toggle="modal" data-target="#editarContenido" class="editarContenido"><i class="fa fa-lg fa-pencil-square icon-cursor icon-editar" aria-hidden="true"> </i></span><span class="hidden-xs hidden-sm"> Editar</span></td>';
					var eliminar = '<td><span data-id='+$contenidos[i].id_contenidos+' class="eliminarContenido"><i class="fa fa-lg fa-times-circle icon-cursor icon-eliminar" aria-hidden="true"></i></span></td></tr>';
					$('#fila-contenido').append(td+editar+eliminar);
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
		    }

				//Funciones para guardar un CONTENIDO editado
				$('.btneditarcontenido').on('click',guardarContenido);

				function guardarContenido(){
					var id_contenido = $('#id_Editarcontenidos').val();
				  var subclave = $('#subtemaEditar').val();
				  var contenido = $('#contenidoEditar').val();
				  enviarContenido(id_contenido,subclave,contenido,edicionContenidoExitosa);
				}

				function enviarContenido(id_contenidos,subclave,contenido,edicionContenidoExitosa){
				  $.ajax({
				    data : {
				      format :'jsonp',
				      method : 'get',
							id_contenidos : id_contenidos,
				      subclave : subclave,
				      contenido : contenido
				    },
				    url: 'guardar_contenido',
				  }) .done(edicionContenidoExitosa);
				}

				function edicionContenidoExitosa(){
					var id_tema = $('#id_Editartemas').val();
					//obtenerNombreTema(id_tema,imprimirNombreTema);
					obtenerContenidos(id_tema,imprimirContenidos);
					mensajeExito();
				}

				//Funciones para ELIMINAR un CONTENIDO
				$('.eliminarContenido').on('click',buscarContenidoEliminar);

				function buscarContenidoEliminar(){
				  var id = $(this).attr('data-id');
					if(confirm('¿Estas seguro de eliminar este Contenido?') == true)
						{
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
							//obtenerNombreTema(id_tema,imprimirNombreTema);
							obtenerContenidos(id_tema,imprimirContenidos);
							mensajeRegistroEliminado();
				}

			}//If imprimirContenidos

			var btnNuevoContenido = '<div class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> <button type="button" class="btn btnNuevoContenido" name="btnNuevoContenido" data-toggle="modal" data-target="#agregarNuevoContenido"><i class="fa fa-list"></i>  Agregar Contenido</button></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 cajaBtnVerTemas"><button type="button" class="btn btnVerTemas" name="btnVerTemas"><i class="fa fa-file-text-o"></i>  Ver Temas</button></div></div>';
			$('#botones').html(btnNuevoContenido);
			$('.btnVerTemas').on('click',realizarConsulta);

		}//Fin imprimirContenidos

	} //If imprimirTemas


	var btnNuevoTema = '<div class="row"><div class="col-lg-12"> <button type="button" class="btn btnNuevo" name="btnNuevoTema" data-toggle="modal" data-target="#agregarTema"><i class="fa fa-file-text-o"></i>  Agregar Tema</button></div> </div>';
	$('#botones').html(btnNuevoTema);

} //Cierre de función imprimirTemas

	//Funciones para guardar un tema editado
	$('#btneditartemas').on('click',guardarTema);

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
	  realizarConsulta();
		mensajeExito();
	}

	//Funciones para AGREGAR UN TEMA NUEVO
	$('#btnagregartema').on('click',agregarTema);

	function agregarTema(){
		var id_materias=$('#materias').val();
	  var clave = $('#nuevaClave').val();
	  var tema = $('#nuevoTema').val();
	  enviarNuevoTema(id_materias,clave,tema,temaAgregado);
	}

	function enviarNuevoTema(id_materias,clave,tema,temaAgregado){
	  $.ajax({
	    data : {
	      format :'jsonp',
	      method : 'get',
				id_materias : id_materias,
	      clave : clave,
	      tema : tema,
	    },
	    url: 'agregar_tema',
	  }) .done(temaAgregado);
	}

	function temaAgregado(){
	  realizarConsulta();
		$('#nuevaClave').val('');
		$('#nuevoTema').val('');
		mensajeExito();
	}

	//Funciones para AGREGAR UN CONTENIDO NUEVO
	$('#btnagregarcontenido').on('click',agregarContenido);
	function agregarContenido(){
		var id_nuevoTema = $('#id_temaNuevoContenido').val();
		var nuevaSubclave = $('#nuevoSubtema').val();
		var nuevoContenido = $('#nuevoContenido').val();
		enviarNuevoContenido(id_nuevoTema,nuevaSubclave,nuevoContenido,contenidoAgregado);
	}

	function enviarNuevoContenido(id_temas,subclave,contenido,contenidoAgregado){
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_temas : id_temas,
				subclave : subclave,
				contenido : contenido,
			},
			url: 'agregar_contenido',
			}) .done(contenidoAgregado);
		}

	function contenidoAgregado(){
		var id_temaNuevoContenido = $('#id_temaNuevoContenido').val();
		//actualizarTablaContenidos(id_temaNuevoContenido);
		$('#nuevoSubtema').val('');
		$('#nuevoContenido').val('');
		mensajeExito();
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
