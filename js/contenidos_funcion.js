$(document).ready(function() {

	var id_temas = $('#id_temas').val();
	obtenerSubtemas(id_temas,mostrarSubtemas);

	function obtenerSubtemas(id_temas,mostrarSubtemas){
		$.ajax({
			data : {
				format : 'jsonp',
				method : 'get',
				id_temas: id_temas
			},
			url : 'subtemas'
		}).done(mostrarSubtemas);
	}

	function mostrarSubtemas(jsonData){

		var datos = JSON.parse(jsonData);
		var html1 ='';
		var html2='';
		var html3='';
		var html4='';
		var imagen='';
		var contenido='';

		for(i=0; i<datos.length;i++){
			html1='<li class="list-group-item li-contenidos" id="'+datos[i].id_contenidos+'">';
			html2= '<h4 class="h4contenidos"> <span class="label label-contenido">'+ datos[i].subclave +'</span><span> '+datos[i].contenido+'</span></h4></li>';

			imagen=datos[i].imagen;
			contenido=datos[i].contenido;
			titulo = datos[i].tema;
			$('#ul-contenidos').append(html1+html2);
		}

			html3= '<h1 class="page-header text-center titulo-contenidos">'+titulo+'</h1>';
			$('#titulo-contenidos').append(html3);

		   	html4='<img class="img-rounded img-responsive img-center imgtemas img-margen" src="'+imagen+'" alt="'+contenido+'">';
			$('#div-imagen').append(html4);
	}

});
