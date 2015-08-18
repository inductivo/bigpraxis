<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracionlib{

	function __construct(){
		$this->CI = & get_instance();
    	$this->CI->load->model('Model_administracion');
	}

	function login($email,$password)
	{
		$query = $this->CI->Model_administracion->obtener_login($email,$password);

		if($query->num_rows() > 0){
			$usuario = $query->row();
			$datosSession = array('id_usuarios' => $usuario->id_usuarios,
								  'nombre' => $usuario->nombre,
								  'apellidos' => $usuario->apellidos

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