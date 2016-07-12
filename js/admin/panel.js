
$('#grados').on('change', cargarSemestres);
$('#grados').on('focus', cargarSemestres);

$('#semestres').on('change', cargarMaterias);
$('#semestres').on('click', cargarMaterias);


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


$('#btnatras').on('click',regresarPanel);

function regresarPanel(){

	$('#principal').load('panel_home');
}
