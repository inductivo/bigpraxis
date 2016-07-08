<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_contenidos');
		$this->load->model('Model_cursos');
		$this->load->model('Model_administracion');
	}

	public function buscar_profesores(){
		$this->Model_administracion->buscar_profesores();
	}

	public function cargar_niveles_usuario(){
		$this->Model_administracion->cargar_niveles_usuario();
	}

	public function validar_profesor(){

		$nombre=$_GET['nombre'];
		$apellidos=$_GET['apellidos'];
		$email=$_GET['email'];
		$nivel=$_GET['nivel'];
		$password=$_GET['password'];

		if($this->form_validation->run()){
			$registro = array(
				'nombre' => $nombre,
				'apellidos'  => $apellidos,
				'email'  => $email,
				'nivel'	=> $nivel,
				'password' => $password
			);
			$this->Model_administracion->agregar_profesor($registro);
		}

	}

	// Realizar la consulta para ELIMINAR el registro del Profesor
	public function eliminar_profesor(){
		$id=$_GET['id_usuarios'];
		$this->Model_administracion->eliminar_profesor($id);
	}

}
