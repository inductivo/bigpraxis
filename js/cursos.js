$(document).ready(function() {

	$('#lista-materias1').on('click','li',temasVista);
	$('#lista-materias2').on('click','li',temasVista);
	$('#lista-materias3').on('click','li',temasVista);
	$('#lista-materias4').on('click','li',temasVista);
	$('#lista-materias5').on('click','li',temasVista);
	$('#lista-materias6').on('click','li',temasVista);
	$('#lista-materias').on('click','li',temasVista);

	function temasVista() {
		var id_materias = $(this).attr('data-idmateria');
		var materia = $(this).attr('data-materia');
		$('#principal').html('');
		$('#principal').load('vista_temas',{id_materias:id_materias,materia:materia});
	}

});
