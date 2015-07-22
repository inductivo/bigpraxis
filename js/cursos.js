
$(document).ready(function() {

	$('#h1-temas').empty();
	$('#lista-temas').empty();

	$('#lista-temas').on('click','div',subtemas);

	$('#lista-materias').on('click','li',temas);


	function temas()
	{
		$('#principal').load('vista_temas');
		
		var id_materias = $(this).attr('id-idmateria');
		obtenerTemas(id_materias,mostrarTemas);
	}

	function obtenerTemas(id_materias,callback)
	{
		$.ajax({
			data : {
				format : 'jsonp',
				method : 'get',
				id_materias: id_materias
			},
			url : 'temas'
		}).done(callback);
	}

	function mostrarTemas(jsonData)
	{
		$('#h1-temas').empty();
		$('#lista-temas').empty();

		var datos = JSON.parse(jsonData);
		console.log(datos);

		var html1 ='';
		var html2='';


		for(i=0; i<datos.length;i++)
		{
			html1='<div class="col-lg-4 col-sm-4 text-center" data-idtema="'+datos[i].id_temas+'"> <img class="img-rounded img-responsive img-center imgtemas" src="'+datos[i].imagen+'" alt="'+datos[i].tema+'"><h4 class="h4temas">'+datos[i].tema+'</h4></div>';
			$('#lista-temas').append(html1);
		}

	}

	function subtemas()
	{
		$('#principal').load('vista_contenidos');
		
		var id_temas = $(this).attr('data-idtema');
		obtenerSubtemas(id_temas,mostrarSubtemas);
	}

	function obtenerSubtemas(id_temas,callback)
	{
		$.ajax({
			data : {
				format : 'jsonp',
				method : 'get',
				id_temas: id_temas
			},
			url : 'subtemas'
		}).done(callback);
	}

	function mostrarSubtemas(jsonData)
	{
		$('#h1-titulo').empty();
		$('#div-imagen').empty();
		$('#ul-contenidos').empty();

		var datos = JSON.parse(jsonData);
		 console.log(datos);

		var html1 ='';
		var html2='';


		for(i=0; i<datos.length;i++)
		{
			html1='<li class="list-group-item" id="'+datos[i].id_contenidos+'"> <h4 class="h4temas" style="cursor:pointer"><span class="label label-info">'+datos[i].subclave+' </span>' +datos[i].contenido+'</h4></li>';
			$('#ul-contenidos').append(html1);
		}

	}


});

