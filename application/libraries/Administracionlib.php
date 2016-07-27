<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracionlib{

	function __construct(){
		$this->CI = & get_instance();
    	$this->CI->load->model('Model_administracion');
			$this->CI->load->model('Model_alumnos');
	}

	//Login Profesores
	function login($email,$password){
		$query = $this->CI->Model_administracion->obtener_login($email,$password);

		if($query->num_rows() > 0){
			$usuario = $query->row();
			$datosSession = array('id_usuarios' => $usuario->id_usuarios,
								  'nombre' => $usuario->nombre,
								  'apellidos' => $usuario->apellidos,
									'nivel' => $usuario->nivel

								 );

			$this->CI->session->set_userdata($datosSession);
			return TRUE;
		}
		else{
			$this->CI->session->sess_destroy();
			return FALSE;
		}
}

//Login Profesores
function login_alumnos($email,$password){
	$query = $this->CI->Model_alumnos->obtener_login($email,$password);

	if($query->num_rows() > 0){
		$usuario = $query->row();
		$datosSession = array('id_alumnos' => $usuario->id_alumnos,
								'nombre' => $usuario->nombre,
								'apellidos' => $usuario->apellidos,
								'id_grados' => $usuario->id_grados,
								'id_semestres' => $usuario->id_semestres,
								'email' => $usuario->email,
								'id_lms' => $usuario->id_lms
							 );

		$this->CI->session->set_userdata($datosSession);
		return TRUE;
	}
	else{
		$this->CI->session->sess_destroy();
		return FALSE;
	}
}

}
