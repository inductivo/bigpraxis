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

}//FIN
