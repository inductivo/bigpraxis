$(document).ready(function() {

	$('#lista-materias').on('click','li',temasVista);

	function temasVista() {
		var id_materias = $(this).attr('data-idmateria');
		var materia = $(this).attr('data-materia');

		$('#principal').load('vista_temas',{id_materias:id_materias,materia:materia});

	}

});

