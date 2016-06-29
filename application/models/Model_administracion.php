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

      public function cargarSemestres()
      	{
	        $query = $this->db->query('SELECT * FROM semestres');
	        $arreglo = array();

	        if($query->num_rows() > 0)
	        {
	           foreach($query->result() as $registro)
	           {

	            $arreglo[] = array(
	                'id_semestre'=> $registro->id_semestre,
	                'semestre' => $registro->semestre
	              );
	           }
	        }
	            $json = json_encode($arreglo);
	            echo $json;
      }

      public function cargarMaterias($idsemestre)
      	{

      		$sql = "SELECT * FROM materias WHERE id_semestre = ?";
        	$query = $this->db->query($sql, array($idsemestre));

	        //$query = $this->db->query('SELECT * FROM materias');
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

		public function cargarPreguntas($grado,$semestre,$materia,$tema,$contenido)
		{
			$this->db->where('id_grados', $grado);
			$this->db->where('id_semestre', $semestre);
			$this->db->where('id_temas', $tema);
			$this->db->where('id_contenidos', $contenido);

			$query = $this->db->get('preguntas');

			$arreglo= array();

			if($query->num_rows() > 0)
			{
					foreach($query->result() as $registro)
					{
							$arreglo[] = array(
									'id_preguntas'=>$registro->id_preguntas,
									'id_temas'=>$registro->id_temas,
									'id_contenidos'=>$registro->id_contenidos,
									'id_tipo_pregunta'=>$registro->id_tipo_pregunta,
									'pregunta'=>$registro->pregunta,
									'repaso'=>$registro->repaso,
									'solucion'=>$registro->solucion,
									'fecha'=>$registro->fecha
									);
					}
			}

			$json = json_encode($arreglo);
			echo $json;

		}

		public function cargarConsultaTemas($materia)
		{
			$this->db->where('id_materias', $materia);
			$query = $this->db->get('temas');

			$arreglo= array();

			if($query->num_rows() > 0)
			{
					foreach($query->result() as $registro)
					{
							$arreglo[] = array(
									'id_temas'=>$registro->id_temas,
									'id_materias'=>$registro->id_materias,
									'clave'=>$registro->clave,
									'tema'=>$registro->tema,
									'imagen'=>$registro->imagen
									);
					}
			}
			$json = json_encode($arreglo);
			echo $json;
		}

		//Realiza la consulta para buscar el tema que se va a editar
		public function buscar_tema($id) {

			$this->db->where('id_temas', $id);
			$query = $this->db->get('temas')->row();

			$json = json_encode($query);
			echo $json;
		}


		public function actualizar_tema($registro,$id_materias){
		      //Se actualiza la información Tema
		      $this->db->set($registro);
		      $this->db->where('id_temas',$registro['id_temas']);
		      $this->db->update('temas');
		}

		//Realiza la consulta para eliminar un tema
		public function eliminar_tema($id) {
			$this->db->where('id_temas', $id);
			$this->db->delete('temas');

		}

		public function agregar_tema($registro){
			$this->db->set($registro);
			$this->db->insert('temas');
		}

		public function buscar_contenidos($id_temas)
		{
			//$this->db->where('id_temas', $id_temas);
			//$query = $this->db->get('contenidos');
			$this->db->select('contenidos.*,temas.tema');
			$this->db->from('contenidos');
			$this->db->join('temas','contenidos.id_temas = temas.id_temas','inner');
			$this->db->where('contenidos.id_temas', $id_temas);
			$query = $this->db->get();

			$arreglo= array();

			if($query->num_rows() > 0)
			{
					foreach($query->result() as $registro)
					{
							$arreglo[] = array(
									'id_contenidos'=>$registro->id_contenidos,
									'id_temas'=>$registro->id_temas,
									'tema'=>$registro->tema,
									'subclave'=>$registro->subclave,
									'contenido'=>$registro->contenido
									);
					}
			}
			$json = json_encode($arreglo);
			echo $json;
		}

		//Realiza la consulta para buscar el CONTENIDO que se va a editar
		public function buscar_contenido($id) {
			$this->db->where('id_contenidos', $id);
			$query = $this->db->get('contenidos')->row();
			$json = json_encode($query);
			echo $json;
		}

		//Se actualiza la información del CONTENIDO editado
		public function actualizar_contenido($registro){
		      $this->db->set($registro);
		      $this->db->where('id_contenidos',$registro['id_contenidos']);
		      $this->db->update('contenidos');
		}

}//FIN
