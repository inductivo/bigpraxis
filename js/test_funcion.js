$(document).ready(function() {

	var problemas=0;
	var aciertos=0;
	var preguntas_mostradas=0;
	var arreglo_preguntas = [];


	$('#caja_tiempo').countdown({since:0,format: 'HMS',padZeroes: true, description: '',compact:true});
	$('#caja_aciertos').html(aciertos);
	$('#caja_problemas').html(problemas);

	$('#caja_boton').on('click','button',validarRespuesta);
	$('#caja_siguiente').on('click','button',siguientePregunta);

	//Obtenemos el id del contenido
	var id_contenidos = $("#id_contenidos").val();

	//Conocemos el número de preguntas del contenido
	var num_preguntas = $("#num_preguntas").val();

	//Se incia el test
	obtenerPregunta(id_contenidos,mostrarPregunta2);


	function validarRespuesta(){
	 	problemas++;
		$('#caja_problemas').html(problemas);

	 	var id_tipo = $(this).attr('data-tipo');
	 	var id_pregunta = $(this).attr('data-preg');
	 	var id_contenidos = $(this).attr('data-idcont');

		if(id_tipo == 1){
			var opcion_correcta = $('input[name="radio"]:checked').attr('id');
			validaradio(id_pregunta,id_contenidos,opcion_correcta,mostrarResultado);

		} else if (id_tipo == 2){
			var checkboxValues = new Array();
			//recorremos todos los checkbox seleccionados con .each
			$('input[name="checkbox[]"]:checked').each(function() {
			//$(this).val() es el valor del checkbox correspondiente
			checkboxValues.push($(this).val());
	    	});

	    validacheck(id_pregunta,id_contenidos,checkboxValues,mostrarResultado);
		}
	 }

	 function validaradio(id_preguntas,id_contenidos,opcion,callback){
	 	$.ajax({
			data: {
				format: 'jsonp',
				method: 'get',
				id_preguntas: id_preguntas,
				id_contenidos: id_contenidos,
				opcion: opcion
			},
			url: 'validar_respuesta_radio'
		}).done(callback);
	 }

	 function validacheck(id_preguntas,id_contenidos,opcion,callback){
	 	$.ajax({
			data: {
				format: 'jsonp',
				method: 'get',
				id_preguntas: id_preguntas,
				id_contenidos: id_contenidos,
				opcion: opcion
			},
			url: 'validar_respuesta_check'
		}).done(callback);
	 }

	 function mostrarResultado(jsonData){
	 	var respuesta = JSON.parse(jsonData);

	 	for(var i=0; i<respuesta.length;i++){
			if(respuesta[i].validacion == 0){
		 		var html ='';
		 		var html1 = '';
		 		var html2 ='';
		 		var html3='';

		 		html0='<h3><i class="fa fa-times fa-lg"></i>  INCORRECT!</h3>';
		 		html1 ='<div class="bs-callout bs-callout-warning"><h3>Review</h3><p>'+respuesta[i].repaso+'</p></div>';
		 		html2='<div class="bs-callout bs-callout-success"><h3>Solution</h3><p>'+respuesta[i].solucion+'</p></div>';
		 		html3 = '<div class="row cont-btnenviar"><div class="col-md-2"><button type="button" class="btn btn-block btn-siguiente" id="siguiente" data-idc="'+respuesta[i].id_contenidos+'">Siguiente <i class="fa fa-arrow-circle-o-right fa-lg"></i></button></div></div>';

		 		$('#caja_incorrecto').addClass('caja-incorrecto text-center');
		 		$('#caja_incorrecto').html(html0);
		 		$('#caja_opciones').empty();
		 		$('#caja_boton').html('');
		 		$('#caja_repaso').html(html1);
		 		$('#caja_solucion').html(html2);
		 		$('#caja_siguiente').html(html3);

		 	}
		 	else if(respuesta[i].validacion = 1){
		 		swal({   title: respuesta[i].mensaje,   type: "success",   confirmButtonText: "Siguiente", timer: 2000,  showConfirmButton: false });
		 		siguientePreguntaOk(respuesta[i].id_contenidos);
				aciertos=aciertos+1;
				$('#caja_aciertos').html(aciertos);
		 	}
		}
	 }

	function siguientePregunta(){
		$('#caja_incorrecto').removeClass('caja-incorrecto');
		$('#caja_incorrecto').empty();
		$('#caja_repaso').empty();
		$('#caja_solucion').empty();
		$('#caja_respuesta').empty();
		$('#caja_siguiente').empty();

		var id_contenido = $(this).attr('data-idc');
		obtenerPregunta(id_contenido,mostrarPregunta2);
	}

//Funcion que se ejecuta cuando la respuesta es correcta
	function siguientePreguntaOk(id_contenido){
		$('#caja_incorrecto').removeClass('caja-incorrecto');
		$('#caja_incorrecto').empty();
		$('#caja_repaso').empty();
		$('#caja_solucion').empty();
		$('#caja_respuesta').empty();
		$('#caja_siguiente').empty();

		obtenerPregunta(id_contenido,mostrarPregunta2);
	}


	function obtenerPregunta(id_contenido,mostrarPregunta2){
		$.ajax({
			data : {
				format : 'jsonp',
				method : 'get',
				id_contenidos: id_contenido
			},
			url : 'obtener_pregunta'
		}).done(mostrarPregunta2);
	}

	function mostrarPregunta2(jsonData){
		var pregunta = JSON.parse(jsonData);
		if(pregunta == null){
			fin_test();
		}else{
			if($.inArray(pregunta.id_preguntas,arreglo_preguntas) > -1){
				if(arreglo_preguntas.length == num_preguntas){
					fin_test();
				}else{
					obtenerPregunta(id_contenidos,mostrarPregunta2);
				}

			}else{
				arreglo_preguntas.push(pregunta.id_preguntas);
				preguntas_mostradas ++;
				$('#caja_pregunta').empty();
				$('#caja_boton').empty();

				if(preguntas_mostradas <= num_preguntas){
					var html1 ='';

					var id_preg = pregunta.id_preguntas;
					var id_cont = pregunta.id_contenidos;
					var tipo_preg = pregunta.id_tipo_pregunta;
					var titulo = pregunta.subclave+' '+pregunta.contenido;
					var pregunta = pregunta.pregunta;

					$('#caja_titulo').html(titulo);
					$('#caja_pregunta').html(pregunta);

					if(tipo_preg == 1){

						obtenerOpciones(id_preg,mostrarOpcionesRadio);

					}
					else if(tipo_preg == 2){
						obtenerOpciones(id_preg,mostrarOpcionesCheck);
					}

					html1 = '<div class="row cont-btnenviar"><div class="col-md-12"><button type="button" class="btn btn-enviar" name="enviar" id="btnenviar" data-idcont="'+id_cont+'" data-preg="'+id_preg+'" data-tipo="'+tipo_preg+'"><i class="fa fa-play-circle fa-lg" aria-hidden="true"></i> Revisar respuesta</button></div></div>';

					$('#caja_boton').html(html1);
				}else{
					fin_test();
				}

			}
		}

	}

	function obtenerOpciones(id_preguntas,callback){
		$.ajax({
			data: {
				format: 'jsonp',
				method: 'get',
				id_preguntas : id_preguntas
			},
			url: 'obtener_opciones'
		}).done(callback);
	}

	function mostrarOpcionesRadio(jsonData){
		$('#caja_opciones').empty();
		var datos = JSON.parse(jsonData);
		var html1 ='';
		var html2='';

		for(var i=0; i<datos.length;i++){
			html1= '<div class="test"><input type="radio" maxlength="524288" name="radio" id="'+datos[i].id_opciones+'" class="radio" value="0">';
      html2= '<label for="'+datos[i].id_opciones+'">'+ datos[i].opcion +'</label></div>';
      $('#caja_opciones').append(html1+html2);
		}
	}

	function mostrarOpcionesCheck(jsonData){
		$('#caja_opciones').empty();
		var datos = JSON.parse(jsonData);
		var html1 ='';
		var html2='';

		for(var i=0; i<datos.length;i++){
			html1= '<div class="test"><input type="checkbox" name="checkbox[]" id="'+datos[i].id_opciones+'" class="checkbox">';
      html2= '<label for="'+datos[i].id_opciones+'">'+datos[i].opcion+'</label></div>';
      $('#caja_opciones').append(html1+html2);
		}
	}

	function fin_test(){
		var calificacion = ((aciertos*100)/problemas).toFixed(2);
		var inicio ="<div class='row'> <div class='col-lg-12 fin-preguntas text-center'>";
		var fin = "</div></div>";
		var btn = "<button type='button' class='btn btn-lg btn-fin' id="+id_contenidos+" name='btn-fin'><i class='fa fa-caret-square-o-left fa-lg' aria-hidden='true'></i>  Regresar</button>";

		if(calificacion >= 70){
			var img = "<span><i class='fa fa-thumbs-o-up fa-5x icon-fin-aprobado' aria-hidden='true'></i></span>";
			var titulo= "<h1 class='fin-titulo'>¡Muy bien!</h1>";
			var mostrar_calificacion = "<p><span class='fin-info'>Calificación:</span> <span class='aprobado'><strong>"+calificacion+"</strong></span></p>";
		}else{
			var img = "<span><i class='fa fa-thumbs-o-down fa-5x icon-fin-reprobado' aria-hidden='true'></i></span>";
			var titulo= "<h1 class='fin-titulo'>¡Sigue Intentando!</h1>";
			var mostrar_calificacion = "<p><span class='fin-info'>Calificación:</span> <span class='reprobado'><strong>"+calificacion+"</strong></span></p>";
		}

		$('#caja_pregunta').html(inicio+img+titulo+mostrar_calificacion+btn+fin);
		$('#caja_opciones').empty();
		$('#caja_incorrecto').removeClass('caja-incorrecto');
		$('#caja_incorrecto').empty();
		$('#caja_repaso').empty();
		$('#caja_solucion').empty();
		$('#caja_respuesta').empty();
		$('#caja_siguiente').empty();
		$('#caja_boton').empty();
		$('#caja_tiempo').countdown('pause');


		$('.btn-fin').on('click',regresar);

		function regresar(){
			regresarMaterias();
		}
	}

});
