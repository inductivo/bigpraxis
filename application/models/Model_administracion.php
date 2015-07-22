<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_administracion extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

		function obtener_login($email, $password)
		{
	        $this->db->where('email', $email);
	        $this->db->where('password', $password);
	        return $this->db->get('usuarios');
    	}

    	public function cargarGrados()
      	{
	        $query = $this->db->query('SELECT * FROM grados'); 
	        $arreglo = array();

	        if($query->num_rows() > 0)
	        {
	           foreach($query->result() as $registro)
	           {

	            $arreglo[] = array(
	                'id_grados'=> $registro->id_grados,
	                'grado' => $registro->grado
	              );    
	           }
	        }
	            $json = json_encode($arreglo);
	            echo $json;              
      }

      public function cargarMaterias()
      	{
	        $query = $this->db->query('SELECT * FROM materias'); 
	        $arreglo = array();

	        if($query->num_rows() > 0)
	        {
	           foreach($query->result() as $registro)
	           {

	            $arreglo[] = array(
	                'id_materias'=> $registro->id_materias,
	                'materia' => $registro->materia
	              );    
	           }
	        }
	            $json = json_encode($arreglo);
	            echo $json;              
      }

       public function cargarTemas($idmateria)
      	{
      		$sql = "SELECT * FROM temas WHERE id_materias = ?";
        	$query = $this->db->query($sql, array($idmateria));

	        $arreglo = array();

	        if($query->num_rows() > 0)
	        {
	           foreach($query->result() as $registro)
	           {

	            $arreglo[] = array(
	                'id_temas'=> $registro->id_temas,
	                'clave' => $registro->clave,
	                'tema' => $registro->tema

	              );    
	           }
	        }
	            $json = json_encode($arreglo);
	            echo $json;              
      }

      public function cargarContenidos($idtema)
      	{
      		$sql = "SELECT * FROM contenidos WHERE id_temas = ?";
        	$query = $this->db->query($sql, array($idtema));

	        $arreglo = array();

	        if($query->num_rows() > 0)
	        {
	           foreach($query->result() as $registro)
	           {

	            $arreglo[] = array(
	                'id_contenidos'=> $registro->id_contenidos,
	                'subclave' => $registro->subclave,
	                'contenido' => $registro->contenido

	              );    
	           }
	        }
	            $json = json_encode($arreglo);
	            echo $json;              
      }

  	public function cargarTipoPregunta()
    {
	    $query = $this->db->query('SELECT * FROM tipo_pregunta'); 
	    $arreglo = array();

	    if($query->num_rows() > 0)
	    {
	      foreach($query->result() as $registro)
	        {

	          $arreglo[] = array(
	            'id_tipo_pregunta'=> $registro->id_tipo_pregunta,
	            'tipo' => $registro->tipo
	           );    
	        }
	    }
	        $json = json_encode($arreglo);
	        echo $json;              
    }

    public function insertar_pregunta($pregunta,$opciones,$respuestas)
    {
    	$valores = array();

    	$this->db->set($pregunta);
    	$this->db->insert('preguntas');

    	//$id_preg = $this->db->query('SELECT MAX (id_preguntas) FROM preguntas');

    	$this->db->select_max('id_preguntas');
      	$this->db->from('preguntas');
      	$query = $this->db->get()->row();

    	$cont=count($opciones);
    	for ($i = 0; $i < $cont; $i++) {
		        
		        $valores['id_preguntas']=$query->id_preguntas;
		        $valores['opcion']=$opciones[$i];
		        $valores['respuesta']=$respuestas[$i+1];

		       $this->db->set($valores);
		       $this->db->insert('opciones');
		        //echo $opciones[$i]. " </br>";
		        //echo $respuestas[$i+1]. " </br></br>";


		}


    }

   
       
}