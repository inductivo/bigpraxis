
$('#opcionpreguntas').on('click',opcionesPreguntas);
$('#opciones').on('click','li',elegirPreguntas);
$('#btnatras').on('click',regresarPanel);

$('#btnconsultar').on('click',realizarConsulta);

//$('.cont-pregunta').on('click',mostrarInfo);

	function opcionesPreguntas()
	{

		var html2= '<ul class="list-group ul-opciones">';
		var html3= '<li data-li="1" class="list-group-item li-opciones" style="cursor:pointer"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Agregar</li>';
		var html4='<li data-li="2" class="list-group-item li-opciones" style="cursor:pointer"><i class="fa fa-search" aria-hidden="true"></i> Consultar</li>';
		var html5='</ul>';

    $('#opciones').html(html2+html3+html4+html5);

	}

function elegirPreguntas()
{
	var id_li = $(this).attr('data-li');

	if(id_li == 1)
	{
			$('#principal').load('agregar_preguntas');
	}
	else {
		$('#principal').load('consultar_preguntas');
	}

}

function regresarPanel(){

	$('#principal').load('panel_home');
}

function realizarConsulta(){

	var grado = $('#grados').val();
	var semestre = $('#semestres').val();
	var materia = $('#materias').val();
	var tema = $('#temas').val();
	var contenido = $('#contenidos').val();

	obtenerPreguntas(grado,semestre,materia,tema,contenido,imprimirPreguntas);

}

function obtenerPreguntas(grado,semestre,materia,tema,contenido,preguntas)
{
	$.ajax({
		data : {
			format :'jsonp',
			method : 'get',
			grado : grado,
			semestre : semestre,
			materia : materia,
			tema : tema,
			contenido : contenido
		},
		url: 'cargarpreguntas',
	}) .done(preguntas);
}

function imprimirPreguntas(jsonData)
{
	$('#mostrarPreguntas').empty();
	$preguntas = JSON.parse(jsonData);
	var cont=0;
	var titulo = '<div class="row header-pregunta"><div class="col-lg-12 text-left"> <i class="fa fa-question-circle fa-lg" aria-hidden="true"></i> Se encontraron <strong>'+$preguntas.length+'</strong> preguntas</div> </div>';
	$('#titulo-pregunta').html(titulo);

	for(i=0; i<$preguntas.length;i++)
	{
		cont++;
		//Activar Modal
		//var preg='<div class="row"><div class="col-lg-12 panel panel-default cont-pregunta" data-repaso="'+$preguntas[i].repaso+'" data-solucion="'+$preguntas[i].solucion+'" data-toggle="modal" data-target="#modal-pregunta"><div class="panel-heading"><h3 class="panel-title badge"><bold>'+cont+'</bold></h3></div><div class="panel-body">'+ $preguntas[i].pregunta+'</div></div></div>';

		//var preg='<div class="row"><div class="col-lg-12 panel panel-default cont-pregunta"><div class="panel-heading"><h3 class="panel-title badge"><bold>'+cont+'</bold></h3></div><div class="panel-body">'+ $preguntas[i].pregunta+'</div></div></div>';

		var titulo_preg='<div class="row"><div class="col-lg-12 titulo-pregunta text-center">'+cont+'</div>';
		var pregunta= '<div class="col-lg-12 panel panel-default panel-pregunta data-idpregunta="'+$preguntas[i].id_preguntas+'">'+ $preguntas[i].pregunta+'</div></div>';

		var titulo_tipo = '<div class="row" style="display:none"><div class="col-lg-12 titulo-respuesta"><i class="fa fa-th-list" aria-hidden="true"></i> Tipo de Pregunta</div>';
		var tipo = '<div class="col-lg-12 panel panel-default panel-respuesta"><div class="panel-body">'+$preguntas[i].id_tipo_pregunta+'</div></div>';

		var titulo_resp = '<div class="col-lg-12 titulo-respuesta"><i class="fa fa-th-list" aria-hidden="true"></i> Respuestas</div>';
		var respuestas = '<div class="col-lg-12 panel panel-default panel-respuesta"><div class="panel-body">Listado de Respuesta</div></div>';

		var titulo_repaso = '<div class="col-lg-12 titulo-repaso"><i class="fa fa-pencil-square" aria-hidden="true"></i> Repaso</div>';
		var repaso = '<div class="col-lg-12 panel panel-default panel-repaso"><div class="panel-body">'+$preguntas[i].repaso+'</div></div>';

		var titulo_solucion = '<div class="col-lg-12 titulo-solucion"><i class="fa fa-check-circle" aria-hidden="true"></i> Solución</div>';
		var solucion = '<div class="col-lg-12 panel panel-default panel-solucion"><div class="panel-body">'+$preguntas[i].solucion+'</div></div></div>';

		$('#mostrarPreguntas').append(titulo_preg+pregunta+titulo_tipo+tipo+titulo_resp+respuestas+titulo_repaso+repaso+titulo_solucion+solucion);
	}

	$('.titulo-pregunta').on('click', function(e) {
		$(this).parent().next().toggle('slow');
		//$('.caja-respuesta').toggle('slow');
		//$('.caja-repaso').toggle('slow');
		//$('.caja-solucion').toggle('slow');
		e.preventDefault();

		//Evento ventana Modal
		/*var repasop = $(this).attr('data-repaso');
		  $('.modal-title').text('Juan');
			$('.modal-body').html(repasop);*/

	});
}
