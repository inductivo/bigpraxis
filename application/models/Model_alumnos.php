<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_alumnos extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

		function obtener_login($email, $password){
	        $this->db->where('email', $email);
	        $this->db->where('password', $password);
	        return $this->db->get('alumnos');
    	}

		function buscar_alumno($id_alumno){
			$this->db->where('id_alumnos', $id_alumno);
			return $this->db->get('alumnos')->row();
		}

		function actualizar_alumno($registro) {
    $this->db->set($registro);
		$this->db->where('id_alumnos', $registro['id_alumnos']);
		$this->db->update('alumnos');
    }

}//FIN
