$(document).ready(function() {
cargarGrados();

$('#opcionpreguntas').on('click',opcionesPreguntas);
$('#opciones-preguntas').on('click','li',elegirPreguntas);
$('#btnconsultarpreguntas').on('click',realizarConsulta);
$('#contenidos').on('change',realizarConsulta);

  window.setTimeout(function() {
  		$(".alerta-exito").fadeTo(1500, 0).slideUp(500, function(){
  			$(this).remove();
  		});
  }, 3500);

function opcionesPreguntas()
{
  var html2= '<ul class="list-group ul-opciones">';
  var html3= '<li data-li="1" class="list-group-item li-opciones" style="cursor:pointer"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Agregar</li>';
  var html4='<li data-li="2" class="list-group-item li-opciones" style="cursor:pointer"><i class="fa fa-search" aria-hidden="true"></i> Consultar</li>';
  var html5='</ul>';

  $('#opciones-temas').html('');
  $('#opciones-alumnos').html('');
  $('#opciones-profesores').html('');
  $('#opciones-preguntas').html(html2+html3+html4+html5);
}


function elegirPreguntas(){
var id_li = $(this).attr('data-li');
$('#principal').html('');
  if(id_li == 1){
      $('#principal').load('agregar_preguntas');
  }
  else {
    $('#principal').load('consultar_preguntas');
  }
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

		var pregunta= '<div class="row"><div class="col-lg-1 col-md-1 col-sm-1 text-center titulo-pregunta">'+cont+'</div><div class="col-lg-11 col-md-11 col-sm-11 panel panel-default panel-pregunta text-pregunta data-idpregunta="'+$preguntas[i].id_preguntas+'">'+ $preguntas[i].pregunta+'</div></div>';

		var titulo_tipo = '<div class="row info-pregunta"><div class="col-lg-12 titulo-respuesta"><i class="fa fa-th-list" aria-hidden="true"></i> Tipo de Pregunta</div>';
		var tipo = '<div class="col-lg-12 panel panel-default panel-respuesta"><div class="panel-body">'+$preguntas[i].tipo+'</div></div>';

		//var titulo_resp = '<div class="col-lg-12 titulo-respuesta"><i class="fa fa-th-list" aria-hidden="true"></i> Respuestas</div>';
		//var respuestas = '<div class="col-lg-12 panel panel-default panel-respuesta"><div class="panel-body"></div></div>';

		var titulo_repaso = '<div class="col-lg-12 titulo-repaso"><i class="fa fa-pencil-square" aria-hidden="true"></i> Repaso</div>';
		var repaso = '<div class="col-lg-12 panel panel-default panel-repaso"><div class="panel-body">'+$preguntas[i].repaso+'</div></div>';

		var titulo_solucion = '<div class="col-lg-12 titulo-solucion"><i class="fa fa-check-circle" aria-hidden="true"></i> Solución</div>';
		var solucion = '<div class="col-lg-12 panel panel-default panel-solucion"><div class="panel-body">'+$preguntas[i].solucion+'</div></div>';

    var btn_respuestas = '<div class="col-lg-4 col-md-4 text-center"><button type="button" class="btn btnrespuestas" data-toggle="modal" data-target="#verRespuestas" data-id='+$preguntas[i].id_preguntas+'><i class="fa fa-list-ul" aria-hidden="true"></i> Ver Respuestas</button></div>';
    var btn_editar_pregunta = '<div class="col-lg-4 col-md-4 text-center"><button type="button" class="btn btneditarpregunta" data-id='+$preguntas[i].id_preguntas+'><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Pregunta</button></div>';
    var btn_eliminar_pregunta = '<div class="col-lg-4 col-md-4 text-center"><button type="button" class="btn btneliminarpregunta" data-id='+$preguntas[i].id_preguntas+'><i class="fa fa-times" aria-hidden="true"></i> Eliminar Pregunta</button></div></div>';


		$('#mostrarPreguntas').append(pregunta+titulo_tipo+tipo+titulo_repaso+repaso+titulo_solucion+solucion+btn_respuestas+btn_editar_pregunta+btn_eliminar_pregunta);
	}

	$('.text-pregunta').on('click', function(e) {
    $(this).parent().next().toggle('slow');
		e.preventDefault();
	});

  $('.btneliminarpregunta').on('click', buscarPreguntaEliminar);

  function buscarPreguntaEliminar(){
    var id_pregunta = $(this).attr('data-id');
    if(confirm('¿Estas seguro de eliminar esta Pregunta?') == true)
    {
      eliminarPregunta(id_pregunta,preguntaEliminada);
    }
  }

  function eliminarPregunta(id_pregunta,preguntaEliminada){
    $.ajax({
      data : {
        format :'jsonp',
        method : 'get',
        id_pregunta : id_pregunta
      },
      url: '../administracion/eliminar_pregunta',
    }) .done(preguntaEliminada);
  }

  function preguntaEliminada(){
    realizarConsulta();
    mensajeRegistroEliminado();
  }

  $('.btneditarpregunta').on('click',cargarDatosPregunta);

  function cargarDatosPregunta(){
    var id_pregunta= $(this).attr('data-id');

    $('#titulo-pregunta').html('');
    $('#mostrarPreguntas').html('');
    var btnc=document.getElementById("btnConsultar");
		btnc.style.display = 'none';
    $('#mostrarPreguntas').load('../administracion/editar_preguntas');

    mostrarDatosPregunta(id_pregunta, imprimirDatosPregunta);
    mostrarDatosRespuestas(id_pregunta,imprimirDatosRespuestas);
  }

  function mostrarDatosPregunta(id_preguntas,imprimirDatosPregunta){
    $.ajax({
      data : {
        format :'jsonp',
        method : 'get',
        id_preguntas : id_preguntas
      },
      url: '../administracion/buscar_pregunta',
    }) .done(imprimirDatosPregunta);
  }

  function mostrarDatosRespuestas(id_preguntas,imprimirDatosRespuestas){
    $.ajax({
      data : {
        format :'jsonp',
        method : 'get',
        id_preguntas : id_preguntas
      },
      url: '../administracion/consultar_respuestas',
    }) .done(imprimirDatosRespuestas);
  }

function imprimirDatosPregunta(jsonData){

  $pregunta = JSON.parse(jsonData);
  $('#txtpregunta').val($pregunta.pregunta);
  $('#idpreguntas').val($pregunta.id_preguntas);
  $('#txtrepaso').val($pregunta.repaso);
  $('#txtsolucion').val($pregunta.solucion);
  var id_tipo_pregunta = $pregunta.id_tipo_pregunta;

  	$.ajax({
  		data : {
  			format :'jsonp',
  			method : 'get',
  		},
  		url: 'cargartipopregunta',
  	}) .done(imprimirTipoPregunta);

  function imprimirTipoPregunta(jsonData){
  	$('#tipopregunta').empty();
  	$opciones = JSON.parse(jsonData);

  	for(i=0; i<$opciones.length;i++){
  		$('#tipopregunta').append('<option value="'+ $opciones[i].id_tipo_pregunta +'">'+ $opciones[i].tipo +'</option>');
  	}

    $('#tipopregunta').val(id_tipo_pregunta);
  }

}

function imprimirDatosRespuestas(jsonData){
  $respuestas = JSON.parse(jsonData);

  for(i=0;i<$respuestas.length;i++){
    var caja = '<div class="input-group respuestas__editor"><input type="hidden" name="chk'+i+'" value='+$respuestas[i].respuesta+'><span class="input-group-addon"><input type="checkbox" name="chk'+i+'" id="chk'+i+'" value='+$respuestas[i].respuesta+' class="cursor cajarespuestas__check"></span><textarea name="resp[]" class="txtarea" id="r'+i+'" value='+$respuestas[i].opcion+'></textarea>';
    var idopcion = '<input type="hidden" name="idopcion'+i+'" id="idopcion'+i+'"></div>';
    $('#respuestas').append(caja+idopcion);

      if($respuestas[i].respuesta == 1){
        $('#chk'+i).prop("checked", true);
      }
      else{
        $('#chk'+i).prop("checked", false);
      }
      $('#r'+i).val($respuestas[i].opcion);
      $('#idopcion'+i).val($respuestas[i].id_opciones);
  }

}


  $('.btnrespuestas').on('click',buscarRespuestas);

  function buscarRespuestas(){
    var id_pregunta= $(this).attr('data-id');
    $('#id_preguntas').val(id_pregunta);
    consultarRespuestas(id_pregunta,mostrarRespuestas);
  }

  function consultarRespuestas(id_preguntas,mostrarRespuestas){
    $.ajax({
      data : {
        format :'jsonp',
        method : 'get',
        id_preguntas : id_preguntas
      },
      url: '../administracion/consultar_respuestas',
    }) .done(mostrarRespuestas);
  }

  function mostrarRespuestas(jsonData){
    $opciones=JSON.parse(jsonData);

    var pregunta = '<div class="pregunta">'+$opciones[1].pregunta+'</div>';
    $('#content-pregunta').html(pregunta);

    if($opciones.length > 0){
  		var th= '<div class="row"><div class="col-lg-12"><div class="table-responsive"><table id="fila-contenido" class="table table-condensed tabla-temas"><tr class="th-temas"><th class="text-center">Opciones</th><th class="text-center">Respuestas</th></tr></table></div></div></div>';
  		$('#content-respuestas').html(th);

  		for(i=0; i<$opciones.length;i++){
  			var td = '<tr class="tr-temas"><td class="text-center">'+$opciones[i].opcion+'</td>';
          if($opciones[i].respuesta == 1){
            var td2 = '<td class="text-center"><span><i class="fa fa-check fa-lg icon-ok" aria-hidden="true"></i></span></td></tr>';
          }
          else{
            var td2 = '<td class="text-center"><span><i class="fa fa-times fa-lg icon-bad" aria-hidden="true"></i></span></td></tr>';
          }

  			$('#fila-contenido').append(td+td2);
  		}
    }
  }

}

});
