
$('#grados').on('change', cargarSemestres);
$('#grados').on('focus', cargarSemestres);

$('#semestres').on('change', cargarMaterias);
$('#semestres').on('click', cargarMaterias);

$('#materias').on('change', cargarTemas);
$('#materias').on('click', cargarTemas);

$('#temas').on('change', cargarContenidos);
$('#temas').on('click', cargarContenidos);


//CARGAR GRADOS
function cargarGrados(){
	obtenerGrados(imprimirGrados);
	cargarSemestres();
}

function obtenerGrados(imprimirGrados){
	$.ajax({
		data : {
			format :'jsonp',
			method : 'get'
		},
		url: 'cargargrados',
	}) .done(imprimirGrados);
}

function imprimirGrados(jsonData){
	$('#grados').empty();
	$opciones = JSON.parse(jsonData);

	for(i=0; i<$opciones.length;i++)
	{
		$('#grados').append('<option value="'+ $opciones[i].id_grados +'">'+ $opciones[i].grado +'</option>');
	}
}

//CARGAR SEMESTRES
function cargarSemestres(){
	var idgrado = $('#grados').val();
	obtenerSemestres(idgrado,imprimirSemestres);
}

function obtenerSemestres(idgrado,imprimirSemestres){
	$.ajax({
		data : {
			format :'jsonp',
			method : 'get',
			id_grados: idgrado
		},
		url: 'cargarsemestres',
	}) .done(imprimirSemestres);
}

function imprimirSemestres(jsonData){
	$('#semestres').empty();
	$('#materias').empty();
	$('#temas').empty();
	$('#contenidos').empty();

	$opciones = JSON.parse(jsonData);

	for(i=0; i<$opciones.length;i++)
	{
		$('#semestres').append('<option value="'+ $opciones[i].id_semestre +'">'+ $opciones[i].semestre+'</option>');
	}
}

//CARGAR MATERIAS
function cargarMaterias(){
	var idsemestre = $('#semestres').val();
	obtenerMaterias(idsemestre,imprimirMaterias);
}

function obtenerMaterias(idsemestre,imprimirMaterias){
	$.ajax({
		data : {
			format :'jsonp',
			method : 'get',
			id_semestre: idsemestre
		},
		url: 'cargarmaterias',
	}) .done(imprimirMaterias);
}

function imprimirMaterias(jsonData){
	$('#materias').empty();
	$('#temas').empty();
	$('#contenidos').empty();

	$opciones = JSON.parse(jsonData);

	for(i=0; i<$opciones.length;i++)
	{
		$('#materias').append('<option value="'+ $opciones[i].id_materias +'">'+ $opciones[i].materia +'</option>');
	}
}

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

function cargarTipoPregunta(){
	obtenerTipoPregunta(imprimirTipoPregunta);
}

function obtenerTipoPregunta(imprimirTipoPregunta){
	$.ajax({
		data : {
			format :'jsonp',
			method : 'get'
		},
		url: 'cargartipopregunta',
	}) .done(imprimirTipoPregunta);
}


function imprimirTipoPregunta(jsonData){
	$('#tipopregunta').empty();
	$opciones = JSON.parse(jsonData);

	for(i=0; i<$opciones.length;i++)
	{
		$('#tipopregunta').append('<option value="'+ $opciones[i].id_tipo_pregunta +'">'+ $opciones[i].tipo +'</option>');
	}
}


$('#btnatras').on('click',regresarPanel);

function regresarPanel(){
	$('#principal').html('');
	$('#principal').load('panel_home');
}
