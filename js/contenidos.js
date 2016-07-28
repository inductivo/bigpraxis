
	$('#lista-temas').on('click','div',subtemas);

	function subtemas(){
		var id_temas = $(this).attr('data-idtema');
		$('#principal').html('');
		$('#principal').load('vista_contenidos',{id_temas:id_temas});
	}
