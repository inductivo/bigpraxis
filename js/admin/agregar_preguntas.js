$(document).ready(function() {

	cargarGrados();
	cargarTipoPregunta();

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

	//Cargar RESPUESTAS
	function cargarRespuestas(){
		var id=document.getElementById("cajarespuestas");
		id.style.display = 'block';

		var id2=document.getElementById("cajanuevaresp");
		id2.style.display = 'block';
	}

	function agregarRespuesta(){
		if(x <= maxInputs){
			 FieldCount++;
            //agregar campo
            $(contenedor_r).append('<div class="input-group respuestas__editor"><input type="hidden" name="chk'+FieldCount+'" value="0" ><span class="input-group-addon"><input type="checkbox" value="1" id="check' + FieldCount +'"  name="chk'+FieldCount+'"></span> <textarea name="resp[]" id="r'+ FieldCount +'" class="txtarea"></textarea><a href="#" class="eliminar cursor fa fa-times-circle fa-lg icon-eliminar"></a></div>');
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
		    mode: "textareas",
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
	  		autoresize_max_height: 800,
				onchange_callback: function(editor) {
					tinyMCE.triggerSave();
					$("#" + editor.id).valid();
				}
			});
}


});
