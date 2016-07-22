$(document).ready(function() {
cargarEditor();

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
