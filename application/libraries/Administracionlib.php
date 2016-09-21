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

function cambiar_password_alumno($pass_actual,$pass_nuevo){
	if($this->CI->session->userdata('id_alumnos') == null){
			redirect('principal/acceso_denegado');
		}
		else{
			$id_alumno = $this->CI->session->userdata('id_alumnos');
			$alumno_info = $this->CI->Model_alumnos->buscar_alumno($id_alumno);

			if($alumno_info->password == $pass_actual){
					$registro = array('id_alumnos' => $id_alumno,
								  'password' => $pass_nuevo);
					$this->CI->Model_alumnos->actualizar_alumno($registro);
				}
				else{
					return FALSE;
				}
		}
	}

}
