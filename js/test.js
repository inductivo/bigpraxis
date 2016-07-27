
	$('#lista_contenidos').on('click','li',iniciaTest);

	function iniciaTest(){
		var id_contenidos = $(this).attr('id');
		$('#principal').html('');
		$('#principal').load('problemas',{id_contenidos:id_contenidos});

	}
