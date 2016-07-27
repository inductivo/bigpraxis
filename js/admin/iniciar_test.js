$('#opciontest').on('click',iniciarTest);

function iniciarTest(){
  $('#principal').html('');
  $('#principal').load('cursos');
}
