$('#opciontemas').on('click',opcionesTemas);
$('#btnconsultartemas').on('click',realizarConsulta);

//Funciones para consultar los temas
function opcionesTemas()
{
	$('#opciones-preguntas').html('');
	$('#principal').load('consultar_temas');
}

function realizarConsulta(){
	var materia = $('#materias').val();
	obtenerTemas(materia,imprimirTemas);
}


function obtenerTemas(materia,imprimirTemas)
{
	$.ajax({
		data : {
			format :'jsonp',
			method : 'get',
			materia : materia
		},
		url: 'cargarConsultaTemas',
	}) .done(imprimirTemas);
}

function imprimirTemas(jsonData)
{
  $('#mostrarTemas').empty();
	$temas= JSON.parse(jsonData)

  var cont=0;
  var cabecera = '<div class="row header-pregunta"><div class="col-lg-12 text-left"> <i class="fa fa-question-circle fa-lg" aria-hidden="true"></i> Se encontraron <strong>'+$temas.length+'</strong> temas</div> </div>';
  $('#cabecera').html(cabecera);

  if($temas.length > 0)
  {
    var th= '<div class="row"><div class="col-lg-12"><div class="table-responsive"><table id="fila-tema" class="table table-condensed tabla-temas"><tr class="th-temas"><th class="text-center">Clave</th><th class="text-center">Tema</th><th></th><th></th></tr></table></div></div></div>';
    $('#mostrarTemas').html(th);

    for(i=0; i<$temas.length;i++){
      var td = '<tr class="tr-temas"><td class="text-center">'+$temas[i].clave+'</td><td>'+$temas[i].tema+'</td>';
      var action = '<td><span data-id='+$temas[i].id_temas+' data-toggle="modal" data-target="#editarTema" class="editarTema"><i class="fa fa-lg fa-pencil-square icon-editar" aria-hidden="true"> </i></span><span class="hidden-xs hidden-sm"> Editar</span></td><td><span data-id='+$temas[i].id_temas+' data-toggle="modal" data-target="#eliminarTema"><i class="fa fa-lg fa-times-circle icon-eliminar" aria-hidden="true"></i></span><span class="hidden-xs hidden-sm"> Eliminar</span></td></tr>';
      $('#fila-tema').append(td+action);
    }

    var btnNuevoTema = '<div class="row"><div class="col-lg-12"> <button type="button" class="btn btnNuevoTema" name="btnNuevoTema" ><i class="fa fa-file-text-o"></i>  Agregar Tema</button></div> </div>';
    $('#nuevoTema').html(btnNuevoTema);
    //Funciones para buscar la informacion del tema que se selecciono
    $('.editarTema').on('click',buscarTema);

    function buscarTema(){
      var id_tema = $(this).attr('data-id');
    	editarTemas(id_tema,temaEncontrado);
    }

    function editarTemas(id_temas,temaEncontrado)
    {
    	$.ajax({
    		data : {
    			format :'jsonp',
    			method : 'get',
    			id_temas : id_temas
    		},
    		url: 'editar_temas',
    	}) .done(temaEncontrado);
    }

    function temaEncontrado(jsonData){
      $temas = JSON.parse(jsonData);
      $('#id_temas').val($temas.id_temas);
      $('#id_materias').val($temas.id_materias);
      $('#clave').val($temas.clave);
      $('#tema').val($temas.tema);
    }

  }
}

$('#btneditartemas').on('click',guardarTema);

function guardarTema()
{
  var id_tema = $('#id_temas').val();
  var clave = $('#clave').val();
  var tema = $('#tema').val();
  var id_materias = $('#id_materias').val();

  enviarTema(id_tema,clave,tema,id_materias,edicionExitosa);
}

function enviarTema(id_temas,clave,tema,id_materias,edicionExitosa)
{
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

function edicionExitosa(jsonData)
{
  $materia= JSON.parse(jsonData);

  $('#principal').load('consultar_temas');

  $('#id_grados').val($materia.id_grados);
  $('#id_semestre').val($materia.id_semestre);
  $('#id_materias').val($materia.id_materias);

  realizarConsulta();
}
