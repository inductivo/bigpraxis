$(document).ready(function() {

	//$('#lista-materias').on('click','li',temas);
	//$('#lista-temas').on('click','div',subtemas);

		
		var id_materias = $("#id_materias").val();
		var materia = $("#materia").val();
		
		obtenerTemas(id_materias,mostrarTemas);
		mostrarMateria(materia);
	

	function obtenerTemas(id_materias,callback) {
		$.ajax({
			data : {
				format : 'jsonp',
				method : 'get',
				id_materias: id_materias
			},
			url : 'temas'
		}).done(callback);
	}

	function mostrarTemas(jsonData) {

		var datos = JSON.parse(jsonData);
		var html1 ='';
		var html2='';


		for(i=0; i<datos.length;i++)
		{
			html1='<div class="col-lg-4 col-sm-4 text-center" data-idtema="'+datos[i].id_temas+'">';
			html2='<img class="img-rounded img-responsive img-center imgtemas" src="'+datos[i].imagen+'" alt="'+datos[i].tema+'">';
			html3='<h4 class="h4temas"style="cursor:pointer">'+datos[i].tema+'</h4></div>';
			
			$('#lista-temas').append(html1+html2+html3);
		}

	}

	function mostrarMateria(materia)
	{
		var nom_materia=materia;
		html4='';
		html4='<h1 id="h1-temas" class="page-header text-center titulo">"'+nom_materia+'"<br><small>High School</small></h1>';
		$('#titulo-tema').html(html4);
	}


});

