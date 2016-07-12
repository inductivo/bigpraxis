
$(document).ready(function() {


	cargarGrados();

	$('#materias').on('change', cargarTemas);
	$('#materias').on('click', cargarTemas);
	
	$('#temas').on('change', cargarContenidos);
	$('#temas').on('click', cargarContenidos);
	//$('#temas').on('focus', cargarContenidos);

	$('#agregar').on('click', construirPregunta);
	$('#agregar').on('click', cargarTipoPregunta);
	$('#agregar').on('click', cargarRespuestas);

	//Datos para desplegar campos Respuestas
	var maxInputs = 4;
	var contenedor_r = $('#respuestas');
	var agregar_r = $('#agregar_respuesta');

	  //var x = número de campos existentes en el contenedor
    var x = $('#respuestas div').length + 1;

    var FieldCount = x-1; //para el seguimiento de los campos

	$(agregar_r).on('click', agregarRespuesta);


	 $('body').on('click','.eliminar', function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo

            x--;
        }
        return false;
    });
		cargarEditor();


	//Cargar TEMAS

	function cargarTemas()
	{
		var idmateria = $('#materias').val();
		obtenerTemas(idmateria,imprimirTemas);

	}

	function obtenerTemas(idmateria,imprimirTemas)
	{
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_materias: idmateria
			},
			url: 'cargartemas',
		}) .done(imprimirTemas);
	}

	function imprimirTemas(jsonData)
	{
		$('#temas').empty();
		$('#contenidos').empty();

		$opciones = JSON.parse(jsonData);

		for(i=0; i<$opciones.length;i++)
		{
			$('#temas').append('<option value="'+ $opciones[i].id_temas +'">'+ $opciones[i].clave +". " + $opciones[i].tema +'</option>');
		}
	}

	//Cargar CONTENIDOS

	function cargarContenidos()
	{
		var idtema = $('#temas').val();
		obtenerContenidos(idtema,imprimirContenidos);

	}

	function obtenerContenidos(idtema,imprimirContenidos)
	{
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get',
				id_temas: idtema
			},
			url: 'cargarcontenidos',
		}) .done(imprimirContenidos);
	}

	function imprimirContenidos(jsonData)
	{
		$('#contenidos').empty();
		$opciones = JSON.parse(jsonData);

		for(i=0; i<$opciones.length;i++)
		{
			$('#contenidos').append('<option value="'+ $opciones[i].id_contenidos +'">'+ $opciones[i].subclave +" " + $opciones[i].contenido +'</option>');
		}
	}

	//Cargar TIPO DE PREGUNTAS

	function cargarTipoPregunta()
	{
		var tipo=document.getElementById("cajatipopregunta");
		tipo.style.display = 'block';


		obtenerTipoPregunta(imprimirTipoPregunta);

	}

	function obtenerTipoPregunta(imprimirTipoPregunta)
	{
		$.ajax({
			data : {
				format :'jsonp',
				method : 'get'
			},
			url: 'cargartipopregunta',
		}) .done(imprimirTipoPregunta);
	}


	function imprimirTipoPregunta(jsonData)
	{
		$('#tipopregunta').empty();
		$opciones = JSON.parse(jsonData);

		for(i=0; i<$opciones.length;i++)
		{
			$('#tipopregunta').append('<option value="'+ $opciones[i].id_tipo_pregunta +'">'+ $opciones[i].tipo +'</option>');
		}
	}

	//Cargar RESPUESTAS
	function cargarRespuestas()
	{
		var id=document.getElementById("cajarespuestas");
		id.style.display = 'block';

		var id2=document.getElementById("cajanuevaresp");
		id2.style.display = 'block';
	}


	function construirPregunta()
	{
		var pregunta=document.getElementById("cajaPregunta");
		pregunta.style.display = 'block';

		var cajas=document.getElementById("cajas");
		cajas.style.display = 'block';

		var publicar=document.getElementById("publicar");
		publicar.style.display = 'block';

	}

	function agregarRespuesta()
	{


		if(x <= maxInputs)
		{
			 FieldCount++;
            //agregar campo
            $(contenedor_r).append('<div class="input-group"><input type="hidden" name="chk'+FieldCount+'" value="0" ><span class="input-group-addon"><input type="checkbox" value="1" id="check' + FieldCount +'"  name="chk'+FieldCount+'"></span> <textarea name="resp[]" id="r'+ FieldCount +'" class="txtarea" ></textarea><a href="#" class="eliminar">&times;</a></div>');

            //$(respuestas).append('<div><input type="text" name="resp[]" id="r'+ FieldCount +'" placeholder="Texto '+ FieldCount +'"/><a href="#" class="eliminar">&times;</a></div>');
            x++; //text box increment

		}

		cargarEditor();

		return false;
	}

	window.setTimeout(function() {
    	$(".alerta").fadeTo(1500, 0).slideUp(500, function(){
        $(this).remove();
    	});
	}, 5000);

function cargarEditor(){
	//EDITOR
		 tinymce.init({
		    selector: "textarea",
		    plugins: [
		        "leaui_formula",
		        "advlist autolink lists link image charmap print preview anchor",
		        "searchreplace visualblocks code fullscreen",
		        "insertdatetime media table contextmenu paste",
		        "tiny_mce_wiris",
		        "jbimages",
		        "autoresize",
		        "code",
		    ],
		    paste_data_images: true,
		    toolbar: "leaui_formula | insertfile bold italic superscript subscript | bullist numlist | jbimages charmap link code ",
		    menubar:false,
		    statusbar : false,
		    language : 'es_MX',
		    relative_urls: false,
		    height: 200,
		    autoresize_min_height: 200,
	  		autoresize_max_height: 800
			});
}


});
