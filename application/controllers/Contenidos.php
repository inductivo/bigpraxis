<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenidos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_contenidos');
	}

//Matemáticas 1
	//A
	public function numeros()
	{
		$data['contenido'] ='preparatoria/mat/primero/numeros';
		$this->load->view('templates/template_principal',$data);
	}

	//B
	public function operaciones()
	{
		$data['contenido'] ='preparatoria/mat/primero/operaciones';
		$this->load->view('templates/template_principal',$data);
	}

	//I
	public function algebra()
	{
		$data['contenido'] ='preparatoria/mat/primero/algebra';
		$this->load->view('templates/template_principal',$data);
	}

	public function obtener_pregunta()
	{
		$id_contenido= $_GET['id_contenido'];
		$this->Model_contenidos->obtener_pregunta($id_contenido);	
	}

	public function obtener_opciones()
	{
		$id_pregunta = $_GET['id_pregunta'];
		$this->Model_contenidos->obtener_opciones($id_pregunta);		
	}

	public function problemas()
	{
		$data['contenido'] ='test2';
		//$data['tema'] = $this->Model_temas->info($tema);
		//$data['preguntas'] = $this->Model_contenidos->obtener_preguntas($cont);
		//$data['info'] = $this->Model_contenidos->obtener_info($cont);
		$this->load->view('templates/template_principal',$data);
	}

	public function validar_respuesta_radio()
	{
		$id_p=$_GET['id_preguntas'];
		$opcion = $_GET['opcion'];
		$id_cont = $_GET['id_contenidos'];
		$this->Model_contenidos->radio_obtener($id_p,$id_cont,$opcion);
	}

	public function validar_respuesta_check()
	{
		$id_p=$_GET['id_preguntas'];
		$id_cont = $_GET['id_contenidos'];
		$opcion = $_GET['opcion'];
		$this->Model_contenidos->check_obtener($id_p,$id_cont,$opcion);
	}
}
