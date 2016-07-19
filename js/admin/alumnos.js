
cargarGrados();

$('#opcionalumnos').on('click',opcionesAlumnos);

function opcionesAlumnos(){
  $('#principal').load('alumnos');
}
