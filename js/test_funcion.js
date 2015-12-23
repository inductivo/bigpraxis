$(document).ready(function() {

	var problemas=0;
	var aciertos=0;

	$('#caja_tiempo').countdown({since:0,format: 'HMS',padZeroes: true, description: '',compact:true});
	$('#caja_aciertos').html(aciertos);
	//$('#caja_problemas').html(problemas);

	$('#caja_boton').on('click','button',validarRespuesta);
	$('#caja_siguiente').on('click','button',siguientePregunta);

		
	var id_contenidos = $("#id_contenidos").val();
	obtenerPregunta(id_contenidos,mostrarPregunta);


	function validarRespuesta()
	 {
	 	var id_tipo = $(this).attr('data-tipo');
	 	var id_pregunta = $(this).attr('data-preg');
	 	var id_contenidos = $(this).attr('data-idcont');


		if(id_tipo == 1)
		{
			var radioValue = $('input[name="radio"]:checked').val();

			validaradio(id_pregunta,id_contenidos,radioValue,mostrarResultado);


		} else if (id_tipo == 2)
		{
			var checkboxValues = new Array();
			//recorremos todos los checkbox seleccionados con .each
			$('input[name="checkbox[]"]:checked').each(function() {
			//$(this).val() es el valor del checkbox correspondiente
			checkboxValues.push($(this).val()); 
	    	});

	    	validacheck(id_pregunta,id_contenidos,checkboxValues,mostrarResultado);
		}
	
	 } 

	 function validaradio(id_preguntas,id_contenidos,opcion,callback)
	 {
	 	console.log("id_preguntas: "+ id_preguntas);
	 	console.log("id_contenidos: "+ id_contenidos);
	 	console.log("Opcion: "+ opcion);

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

	 function validacheck(id_preguntas,id_contenidos,opcion,callback)
	 {

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

	 function mostrarResultado(jsonData)
	 {
	 	
	 	var respuesta = JSON.parse(jsonData);


	 	for(var i=0; i<respuesta.length;i++)
		{
				
			if(respuesta[i].validacion == 0)
		 	{
		 		console.log("Respuesta 0: " + respuesta[i].validacion);
		 		var html ='';
		 		var html1 = '';
		 		var html2 ='';
		 		var html3='';

		 		html = '<h1 class="incorrecto"><span class="label label-danger">INCORRECT!<span></h1><br> <h4>The correct answer is: </h4> <h3><strong>'+respuesta[i].respuestasok+'</h3></strong>';
		 		html1 ='<div class="bs-callout bs-callout-warning"><h3>Review</h3><p>'+respuesta[i].repaso+'</p></div>';
		 		html2='<div class="bs-callout bs-callout-success"><h3>Solution</h3><p>'+respuesta[i].solucion+'</p></div>';
		 		html3='<button type="button" class="btn btn-info btn-lg" id="siguiente" data-idc="'+respuesta[i].id_contenidos+'">Next <span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></button>';
		 		
		 		$('#caja_sorry').html(html);
		 		$('#caja_boton').html('');
		 		$('#caja_repaso').html(html1);
		 		$('#caja_solucion').html(html2);
		 		$('#caja_siguiente').html(html3);

		 	}
		 	else if(respuesta[i].validacion = 1)
		 	{
		 		console.log("Respuesta 1: " + respuesta[i].validacion);
		 		//var html3='';
		 		//html3 = '<div class="alert alert-success" role="alert">'+respuesta[i].mensaje+'</div>';
		 		//$('#caja').html(html3);
		 		//sweetAlert(respuesta[i].mensaje, "Click para la siguiente", "success");
		 		swal({   title: respuesta[i].mensaje,   type: "success",   confirmButtonText: "Siguiente", timer: 2000,  showConfirmButton: false });
		 		siguientePreguntaOk(respuesta[i].id_contenidos);

				aciertos=aciertos+1;
				$('#caja_aciertos').html(aciertos);
		 	}
			
		}

	 }

	function siguientePregunta()
	{

		$('#caja_repaso').empty();
		$('#caja_solucion').empty();
		$('#caja_sorry').empty();
		$('#caja_siguiente').empty();

		var id_contenido = $(this).attr('data-idc');
		obtenerPregunta(id_contenido,mostrarPregunta);
	}


	function siguientePreguntaOk(id_contenido)
	{
		$('#caja_repaso').empty();
		$('#caja_solucion').empty();
		$('#caja_sorry').empty();
		$('#caja_siguiente').empty();

		obtenerPregunta(id_contenido,mostrarPregunta);
	}



	function obtenerPregunta(id_contenido,callback)
	{
		$.ajax({
			data : {
				format : 'jsonp',
				method : 'get',
				id_contenidos: id_contenido
			},
			url : 'obtener_pregunta'
		}).done(callback);
	}

	function mostrarPregunta(jsonData)
	{
		//problemas=problemas+1;
		problemas++;
		$('#caja_problemas').html(problemas);

		$('#caja_pregunta').empty();
		$('#caja_boton').empty();

		var datos = JSON.parse(jsonData);

		var html1 ='';
		var id_cont = datos.id_contenidos;
		var id_preg = datos.id_preguntas;
		var tipo_preg = datos.id_tipo_pregunta;	

	
		var titulo = '<h2 class="page-header titulo">'+datos.subclave+' '+datos.contenido+'</h2>';
		var pregunta = '<h3 class="pregunta">'+datos.pregunta+'</h3>';

		$('#caja_titulo').html(titulo);	
		$('#caja_pregunta').append(pregunta);	

		if(tipo_preg == 1)
		{

			obtenerOpciones(datos.id_preguntas,mostrarOpcionesRadio);

		}
		else if(tipo_preg == 2)
		{
			obtenerOpciones(datos.id_preguntas,mostrarOpcionesCheck);
		}
		
		html1 = '<button type="button" class="btn btn-success" name="enviar" id="btnenviar" data-idcont="'+id_cont+'" data-preg="'+id_preg+'" data-tipo="'+tipo_preg+'">Enviar</button>';

		$('#caja_boton').html(html1);

	}

	function obtenerOpciones(id_pregunta,callback)
	{
		$.ajax({
			data: {
				format: 'jsonp',
				method: 'get',
				id_pregunta: id_pregunta
			},
			url: 'obtener_opciones'
		}).done(callback);
	}

	function mostrarOpcionesRadio(jsonData)
	{
		$('#caja_opciones').empty();

		var datos = JSON.parse(jsonData);

		var html1 ='';
		var html2='';

		for(var i=0; i<datos.length;i++)
		{
			console.log(datos[i].opcion);

			html1= '<div class="test"><input type="radio" maxlength="524288" name="radio" id="'+datos[i].id_opciones+'" class="radio" value="'+datos[i].opcion+'">';
            html2= '<label for="'+datos[i].id_opciones+'">'+ datos[i].opcion +'</label></div>';
            $('#caja_opciones').append(html1+html2);
		}
		
	}

	function mostrarOpcionesCheck(jsonData)
	{
		$('#caja_opciones').empty();

		var datos = JSON.parse(jsonData);

		var html1 ='';
		var html2='';

		for(var i=0; i<datos.length;i++)
		{
			
			html1= '<div class="test"><input type="checkbox" name="checkbox[]" id="'+datos[i].id_opciones+'" class="checkbox" value="'+datos[i].opcion+'">';
            html2= '<label for="'+datos[i].id_opciones+'">'+datos[i].opcion+'</label></div>';
            $('#caja_opciones').append(html1+html2);
		}
	}


});

