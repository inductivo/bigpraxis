<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenidos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_contenidos');
		$this->load->model('Model_cursos');
		$this->load->model('Model_administracion');
	}

//Matemáticas 1	


	public function aritmetica($id_tema)
	{
		$data['contenido'] ='preparatoria/semestre1/matematicas1/aritmetica';
		$data['subtemas'] = $this->Model_contenidos->mostrarSubtemas($id_tema);
		$this->load->view('templates/template_temas',$data);
	}

	public function algebra($id_tema)
	{
		$data['contenido'] ='preparatoria/semestre1/matematicas1/algebra';
		$data['subtemas'] = $this->Model_contenidos->mostrarSubtemas($id_tema);
		$this->load->view('templates/template_temas',$data);
	}

	//Perimetros, áreas y volumenes de figuras geometricas regulares
	public function perimetros($id_tema)
	{
		$data['contenido'] ='preparatoria/semestre1/matematicas1/perimetros';
		$data['subtemas'] = $this->Model_contenidos->mostrarSubtemas($id_tema);
		$this->load->view('templates/template_temas',$data);
	}

	

	
}



