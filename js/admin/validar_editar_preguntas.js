$(document).ready(function(){
  $(function() {
    var validator = $("#frmeditarpreguntas").submit(function() {
      // update underlying textarea before submit validation
      tinyMCE.triggerSave();
    }).validate({
        ignore:"",
        rules:{
          txtpregunta:{
            required:true
          },
          tipopregunta:{
            required:true
          },
          txtrepaso:{
            required:true
          },
          txtsolucion:{
            required:true
          }
        },
        messages:{
          txtpregunta: "<span class='label label-danger'>Ingresar PREGUNTA</span>",
          tipopregunta: "<span class='label label-danger'>Seleccionar el TIPO DE PREGUNTA</span>",
          txtrepaso: "<span class='label label-danger'>Ingresar REPASO</span>",
          txtsolucion: "<span class='label label-danger'>Ingresar SOLUCIÓN</span>"
        },
        errorPlacement: function ( error, element ) {
          error.insertAfter(element);

        },
        highlight: function ( element, errorClass, validClass ) {
          $(element).addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).addClass(validClass).removeClass(errorClass);
        }

    });
    validator.focusInvalid = function() {
			// put focus on tinymce on submit validation
			if (this.settings.focusInvalid) {
				try {
					var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
					if (toFocus.is("textarea")) {
						tinyMCE.get(toFocus.attr("id")).focus();
					} else {
						toFocus.filter(":visible").focus();
					}
				} catch (e) {
					// ignore IE throwing errors when focusing hidden elements
				}
			}
		}

  });

});
