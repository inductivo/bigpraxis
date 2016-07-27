$(document).ready(function() {
	$('#btnatras').on('click',regresarMaterias);

	function regresarMaterias(){
		$('#principal').html('');
		$('#principal').load('panel_estudiantes');
	}

});
