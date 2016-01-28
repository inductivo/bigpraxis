<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenidos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_contenidos');
		$this->load->model('Model_cursos');
		$this->load->model('Model_administracion');
	}
	
}



