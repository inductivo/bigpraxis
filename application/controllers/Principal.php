<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {


	public function index()
	{
		$data['contenido'] = 'inicio';
		$this->load->view('templates/template_principal',$data);
	}
}
