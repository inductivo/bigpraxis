
	var id_temas = $('#id_temas').val();
	obtenerSubtemas(id_temas,mostrarSubtemas);

	function obtenerSubtemas(id_temas,mostrarSubtemas){
		$.ajax({
			data : {
				format : 'jsonp',
				method : 'get',
				id_temas: id_temas
			},
			url : 'subtemas',
			beforeSend: function(){
        var loader = '<div class="col-lg-12 text-center">Cargando...</div>';
        $('#loading').append(loader);
      },
      complete: function(){
        $('#loading').remove();
      }
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
			if(datos[i].activacion == 1){

				html1='<li class="list-group-item li-contenidos" id="'+datos[i].id_contenidos+'">';
				html2= '<h4 class="h4contenidos"> <span class="label label-contenido">'+ datos[i].subclave +'</span><span> '+datos[i].contenido+'</span></h4></li>';

				imagen=datos[i].imagen;
				contenido=datos[i].contenido;
				titulo = datos[i].tema;
				$('#ul-contenidos').append(html1+html2);
			}
			else{
				html5='<li class="list-group-item li-contenidos2" id="'+datos[i].id_contenidos+'">';
				html6= '<h4 class="h4contenidos"> <span class="label label-contenido2">'+ datos[i].subclave +'</span><span> '+datos[i].contenido+'</span></h4></li>';

				imagen=datos[i].imagen;
				contenido=datos[i].contenido;
				titulo = datos[i].tema;
				$('#ul-contenidos').append(html5+html6);
			}
		}

			html3= '<h1 class="page-header text-center titulo-contenidos">'+titulo+'</h1>';
			$('#titulo-contenidos').append(html3);

		  html4='<img class="img-rounded img-responsive img-center imgtemas img-margen" src="'+imagen+'" alt="'+contenido+'">';
			$('#div-imagen').append(html4);

			$('.li-contenidos').on('click',iniciaTest);
			function iniciaTest(){
				var id_contenidos = $(this).attr('id');
				$('#principal').html('');
				$('#principal').load('problemas',{id_contenidos:id_contenidos});

			}


	}
