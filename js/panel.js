
$('#opcionpreguntas').on('click',opcionesPreguntas);
$('#opciones').on('click','li',elegirPreguntas);
$('#btnatras').on('click',regresarPanel);

$('#btnconsultar').on('click',realizarConsulta);

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

}
