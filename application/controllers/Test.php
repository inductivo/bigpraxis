<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_contenidos');
		$this->load->model('Model_temas');
	}

//Se accede a los problemas
	/*public function problemas()
	{
		$data['contenido'] ='test2';
		//$data['tema'] = $this->Model_temas->info($tema);
		//$data['preguntas'] = $this->Model_contenidos->obtener_preguntas($cont);
		//$data['info'] = $this->Model_contenidos->obtener_info($cont);
		$this->load->view('templates/template_principal',$data);
	}*/

	




}
