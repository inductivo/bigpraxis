$(document).ready(function() {

	
		var id_temas = $("#id_temas").val();
		obtenerSubtemas(id_temas,mostrarSubtemas);
	
	function obtenerSubtemas(id_temas,callback)
	{
		$.ajax({
			data : {
				format : 'jsonp',
				method : 'get',
				id_temas: id_temas
			},
			url : 'subtemas'
		}).done(callback);
	}

	function mostrarSubtemas(jsonData)
	{
	
	//var js ='<script type="text/javascript" src="http://www.bigpraxis.com/en/js/test.js"></script>';	
	//$('#js').append(js);

		var datos = JSON.parse(jsonData);

		var html1 ='';
		var html2='';
		var html3='';
		var imagen='';
		var contenido='';
		
		

		for(i=0; i<datos.length;i++)
		{
			html1='<li class="list-group-item" id="'+datos[i].id_contenidos+'">';
			html2= '<h4 class="h4temas" style="cursor:pointer"> <span class="label label-info">'+datos[i].subclave +' </span>' + datos[i].contenido+'</h4></li>';

			imagen=datos[i].imagen;
			contenido=datos[i].contenido;
			$('#ul-contenidos').append(html1+html2);
			
		}

		   html3='<img class="img-rounded img-responsive img-center" src="'+imagen+'" alt="'+contenido+'">';
			$('#div-imagen').append(html3);	  
			 

	}


});

