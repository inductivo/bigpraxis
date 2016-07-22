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

			$registro = array(
				'nombre' => $nombre,
				'apellidos'  => $apellidos,
				'email'  => $email,
				'nivel'	=> $nivel,
				'password' => md5($password)
			);
			$this->Model_administracion->agregar_profesor($registro);
	}

	// Realizar la consulta para ELIMINAR el registro del Profesor
	public function eliminar_profesor(){
		$id=$_GET['id_usuarios'];
		$this->Model_administracion->eliminar_profesor($id);
	}

	// Realizar la consulta para obtener los datos del Profesor
	public function buscar_profesor(){
		$id=$_GET['id_usuarios'];
		$this->Model_administracion->buscar_profesor($id);
	}

	public function editar_profesor(){
		$id_usuarios=$_GET['id_usuarios'];
		$nombre=$_GET['nombre'];
		$apellidos=$_GET['apellidos'];
		$email=$_GET['email'];
		$nivel=$_GET['nivel'];

			$registro = array(
				'id_usuarios' => $id_usuarios,
				'nombre' => $nombre,
				'apellidos'  => $apellidos,
				'email'  => $email,
				'nivel'	=> $nivel
			);
			$this->Model_administracion->editar_profesor($registro);
	}

	public function cambiar_password_profesor(){
		$id_usuarios=$_GET['id_usuarios'];
		$password=$_GET['password'];

		$registro = array(
			'id_usuarios' => $id_usuarios,
			'password' => md5($password)
		);
		$this->Model_administracion->cambiar_password_profesor($registro);
	}

	public function consultar_respuestas(){
		$id=$_GET['id_preguntas'];
		$this->Model_administracion->consultar_respuestas($id);
	}

	public function editar_preguntas(){
		$this->load->view('administracion/editar_preguntas');
	}

	public function buscar_pregunta(){
		$id=$_GET['id_preguntas'];
		$this->Model_administracion->buscar_pregunta($id);
	}

	// Realizar la consulta de Alumnos
	public function consultar_alumnos(){
		$grado=$_GET['grado'];
		$semestre=$_GET['semestre'];
		$this->Model_administracion->consultar_alumnos($grado,$semestre);
	}

	//Agregar Nuevo Alumno
	public function validar_alumno(){

		$grado=$_GET['grado'];
		$semestre=$_GET['semestre'];
		$nombre=$_GET['nombre'];
		$apellidos=$_GET['apellidos'];
		$email=$_GET['email'];
		$lms=$_GET['lms'];
		$password=$_GET['password'];

			$registro = array(
				'id_grados' => $grado,
				'id_semestres' => $semestre,
				'nombre' => $nombre,
				'apellidos'  => $apellidos,
				'email'  => $email,
				'id_lms'	=> $lms,
				'password' => md5($password)
			);
			$this->Model_administracion->agregar_alumno($registro);
	}

	// Realizar la consulta para obtener los datos del ALUMNO
	public function buscar_alumno(){
		$id=$_GET['id_alumno'];
		$this->Model_administracion->buscar_alumno($id);
	}

	//Funcion para capturar la información editada del ALUMNO
	public function editar_alumno(){
		$id_alumno=$_GET['id_alumno'];
		$nombre=$_GET['nombre'];
		$apellidos=$_GET['apellidos'];
		$email=$_GET['email'];
		$lms=$_GET['lms'];

			$registro = array(
				'id_alumnos' => $id_alumno,
				'nombre' => $nombre,
				'apellidos'  => $apellidos,
				'email'  => $email,
				'id_lms'	=> $lms
			);
			$this->Model_administracion->editar_alumno($registro);
	}

}
