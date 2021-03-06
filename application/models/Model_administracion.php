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
	        $query = $this->db->query('SELECT id_grados,grado FROM grados');
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

      public function cargarSemestres($id_grados)
      	{

					$sql = "SELECT * FROM semestres WHERE id_grados = ?";
        	$query = $this->db->query($sql, array($id_grados));
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
      		$sql = "SELECT * FROM temas WHERE id_materias = ? ORDER BY clave ASC";
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
      		$sql = "SELECT * FROM contenidos WHERE id_temas = ? ORDER BY subclave ASC";
        	$query = $this->db->query($sql, array($idtema));

	        $arreglo = array();

	        if($query->num_rows() > 0)
	        {
	           foreach($query->result() as $registro)
	           {

	            $arreglo[] = array(
	                'id_contenidos'=> $registro->id_contenidos,
	                'subclave' => $registro->subclave,
	                'contenido' => $registro->contenido,
									'preguntas_test' => $registro->preguntas_test

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

			$this->db->select('preguntas.*,tipo_pregunta.*');
			$this->db->from('preguntas');
			$this->db->join('tipo_pregunta','preguntas.id_tipo_pregunta = tipo_pregunta.id_tipo_pregunta','inner');
			$this->db->where('id_grados', $grado);
			$this->db->where('id_semestre', $semestre);
			$this->db->where('id_temas', $tema);
			$this->db->where('id_contenidos', $contenido);

			$query = $this->db->get();
			$arreglo= array();

			if($query->num_rows() > 0)
			{
					foreach($query->result() as $registro)
					{
							$arreglo[] = array(
									'id_preguntas'=>$registro->id_preguntas,
									'id_temas'=>$registro->id_temas,
									'id_contenidos'=>$registro->id_contenidos,
									'tipo'=>$registro->tipo,
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
			$this->db->order_by('clave','asc');
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
			$this->db->order_by('contenidos.subclave','asc');
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
									'contenido'=>$registro->contenido,
									'activacion'=>$registro->activacion,
									'preguntas_test' => $registro->preguntas_test
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

		//Realiza la consulta para eliminar un Contenido
		public function eliminar_contenido($id) {
			$this->db->where('id_contenidos', $id);
			$this->db->delete('contenidos');
		}

		//Agrega el NUEVO CONTENIDO  a la BD
		public function agregar_contenido($registro){
			$this->db->set($registro);
			$this->db->insert('contenidos');
		}

		public function buscar_profesores(){
			//$query = $this->db->query('SELECT * FROM usuarios');
			$this->db->select('usuarios.*, acceso.*');
			$this->db->from('usuarios');
			$this->db->join('acceso','usuarios.nivel = acceso.nivel','inner');
			$this->db->order_by('usuarios.nivel','asc');
			$query = $this->db->get();

			$arreglo = array();
			if($query->num_rows() > 0){
				 foreach($query->result() as $registro){
					 $arreglo[] = array(
							'id_usuarios'=> $registro->id_usuarios,
							'nombre' => $registro->nombre,
							'apellidos' => $registro->apellidos,
							'email'	=> $registro->email,
							'nivel' => $registro->descripcion
						);
				 }
			}
					$json = json_encode($arreglo);
					echo $json;
		}

		public function cargar_niveles_usuario(){
			$query = $this->db->query('SELECT * FROM acceso ORDER BY descripcion DESC');
			$arreglo = array();

			if($query->num_rows() > 0){
				 foreach($query->result() as $registro){
					$arreglo[] = array(
							'id_acceso'=> $registro->id_acceso,
							'nivel' => $registro->nivel,
							'descripcion' => $registro->descripcion
						);
				 }
			}
					$json = json_encode($arreglo);
					echo $json;
		}

	public function agregar_profesor($registro){
			$this->db->set($registro);
			$this->db->insert('usuarios');
	}

//ELIMINA el registro del usuario PROFESOR
public function eliminar_profesor($id) {
			$this->db->where('id_usuarios', $id);
			$this->db->delete('usuarios');
}

//Realiza la consulta para buscar los datos del Profesor
public function buscar_profesor($id) {
	$this->db->where('id_usuarios', $id);
	$query = $this->db->get('usuarios')->row();
	$json = json_encode($query);
	echo $json;
}

//Se actualiza la información del Profesor
public function editar_profesor($registro){
			$this->db->set($registro);
			$this->db->where('id_usuarios',$registro['id_usuarios']);
			$this->db->update('usuarios');
}

//Se actualiza el PASSWORD del Profesor
public function cambiar_password_profesor($registro){
			$this->db->set($registro);
			$this->db->where('id_usuarios',$registro['id_usuarios']);
			$this->db->update('usuarios');
}

//Función para Consultar Respuestas
public function consultar_respuestas($id){
	$this->db->select('preguntas.id_preguntas, preguntas.pregunta,preguntas.id_tipo_pregunta,opciones.*');
	$this->db->from('opciones');
	$this->db->join('preguntas','preguntas.id_preguntas = opciones.id_preguntas','inner');
	$this->db->where('opciones.id_preguntas',$id);
	$query = $this->db->get();

	$arreglo = array();
	if($query->num_rows() > 0){
		 foreach($query->result() as $registro){
			 $arreglo[] = array(
					'id_preguntas'=> $registro->id_preguntas,
					'pregunta' => $registro->pregunta,
					'id_opciones' => $registro->id_opciones,
					'opcion' => $registro->opcion,
					'respuesta'	=> $registro->respuesta
				);
		 }
	}
			$json = json_encode($arreglo);
			echo $json;
}

public function buscar_pregunta($id){
	$this->db->where('id_preguntas', $id);
	$query = $this->db->get('preguntas')->row();
	$json = json_encode($query);
	echo $json;
}

public function actualizar_pregunta($pregunta,$id){
	$this->db->set($pregunta);
	$this->db->where('id_preguntas',$id);
	$this->db->update('preguntas');
	}

	public function actualizar_opciones($opciones,$respuestas,$idopciones){
		$valores = array();
		$cont=count($opciones);
		for ($i = 0; $i < $cont; $i++) {

			$valores['opcion']=$opciones[$i];
			$valores['respuesta']=$respuestas[$i];

			$this->db->set($valores);
			$this->db->where('id_opciones',$idopciones[$i]);
			$this->db->update('opciones');

		}
}

public function consultar_alumnos($grado,$semestre){
	$this->db->where('id_grados', $grado);
	$this->db->where('id_semestres', $semestre);
	$this->db->order_by('apellidos','asc');
	$query = $this->db->get('alumnos');

	$arreglo= array();

	if($query->num_rows() > 0)
	{
			foreach($query->result() as $registro)
			{
					$arreglo[] = array(
							'id_alumnos'=>$registro->id_alumnos,
							'nombre'=>$registro->nombre,
							'apellidos'=>$registro->apellidos,
							'id_grados'=>$registro->id_grados,
							'id_semestres'=>$registro->id_semestres,
							'email'=>$registro->email,
							'id_lms'=>$registro->id_lms
							);
			}
	}
	$json = json_encode($arreglo);
	echo $json;
}

	//Agregar Nuevo ALUMNO
	public function agregar_alumno($registro){
			$this->db->set($registro);
			$this->db->insert('alumnos');
	}

	//Realiza la consulta para buscar los datos del ALUMNO
	public function buscar_alumno($id) {
		$this->db->where('id_alumnos', $id);
		$query = $this->db->get('alumnos')->row();
		$json = json_encode($query);
		echo $json;
	}

	//Se actualiza la información del ALUMNO
	public function editar_alumno($registro){
				$this->db->set($registro);
				$this->db->where('id_alumnos',$registro['id_alumnos']);
				$this->db->update('alumnos');
	}

	//Se actualiza el PASSWORD del ALUMNO
	public function cambiar_password_alumno($registro){
				$this->db->set($registro);
				$this->db->where('id_alumnos',$registro['id_alumnos']);
				$this->db->update('alumnos');
	}

	//ELIMINA el registro del usuario ALUMNO
	public function eliminar_alumno($id) {
				$this->db->where('id_alumnos', $id);
				$this->db->delete('alumnos');
	}

	//ELIMINA una PREGUNTA
	public function eliminar_pregunta($id) {
				$this->db->where('id_preguntas', $id);
				$this->db->delete('preguntas');

		//Elimina las respuestas
		$this->db->where('id_preguntas', $id);
		$this->db->delete('opciones');

	}


}//FIN
