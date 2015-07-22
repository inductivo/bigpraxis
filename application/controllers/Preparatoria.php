<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preparatoria extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_administracion');
		$this->load->model('Model_cursos');
		$this->load->model('Model_contenidos');

	}
	

	//Matemáticas 1
	public function matematicas1($id_materia)
	{
		$data['contenido'] = 'preparatoria/semestre1/matematicas1/temas';
		$data['tema'] = $this->Model_cursos->obtenerTemas($id_materia);
		$this->load->view('templates/template_temas',$data);
	}

	//Química 1
	public function quimica1($id_materia)
	{
		$data['contenido'] = 'preparatoria/semestre1/quimica1/temas';
		$data['id_materia'] = $id_materia;
		$this->load->view('templates/template_temas',$data);
	}

	//Ética y Valores 1
	public function eticayvalores1($id_materia)
	{
		$data['contenido'] = 'preparatoria/semestre1/eticayvalores1/temas';
		$data['id_materia'] = $id_materia;
		$this->load->view('templates/template_temas',$data);
	}

	//Perspectivas Globales 1
	public function perspectivas1($id_materia)
	{
		$data['contenido'] = 'preparatoria/semestre1/perspectivas1/temas';
		$data['id_materia'] = $id_materia;
		$this->load->view('templates/template_temas',$data);
	}

	//Taller de Lectura y Redacción
	public function lectura($id_materia)
	{
		$data['contenido'] = 'preparatoria/semestre1/lectura/temas';
		$data['id_materia'] = $id_materia;
		$this->load->view('templates/template_temas',$data);
	}

	//Francés 1
	public function frances1($id_materia)
	{
		$data['contenido'] = 'preparatoria/semestre1/frances1/temas';
		$data['id_materia'] = $id_materia;
		$this->load->view('templates/template_temas',$data);
	}

	//Informática1
	public function informatica1($id_materia)
	{
		$data['contenido'] = 'preparatoria/semestre1/informatica1/temas';
		$data['id_materia'] = $id_materia;
		$this->load->view('templates/template_temas',$data);
	}


	//Semestre 2
	public function matematicas2($id_materia)
	{
		$data['contenido'] = 'preparatoria/semestre2/matematicas2/temas';
		$data['id_materia'] = $id_materia;
		$this->load->view('templates/template_temas',$data);
	}

	

}
