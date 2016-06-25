<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_contenidos extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	//Realiza la consulta para obtener los subtemas
	public function mostrarSubtemas2($id_temas)
	{
		$this->db->select('contenidos.*,temas.*');
		$this->db->from('contenidos');
		$this->db->join('temas','temas.id_temas = contenidos.id_temas','inner');
		$this->db->where('contenidos.id_temas',$id_temas);

		$query= $this->db->get();
		return $query->result();

	}

    public function mostrarSubtemas($id_temas)
    {
        $this->db->select('contenidos.*,temas.*');
        $this->db->from('contenidos');
        $this->db->join('temas','temas.id_temas = contenidos.id_temas','inner');
        $this->db->where('contenidos.id_temas',$id_temas);

        $query= $this->db->get();
        $arreglo = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $registro)
            {
                $arreglo[] = array(
                'id_temas'=> $registro->id_temas,
                'tema' => $registro->tema,
                'id_contenidos' => $registro->id_contenidos,
                'contenido' => $registro->contenido,
                'subclave' => $registro->subclave,
                'imagen' => $registro->imagen
              );
            }
        }

        $json = json_encode($arreglo);
        echo $json;

    }

    //Se obtiene el número total de preguntas que tiene un contenido
    public function num_preguntas($id_contenido)
    {
        $this->db->where('id_contenidos', $id_contenido);
        $this->db->from('preguntas');
        return $this->db->count_all_results();
    }


	//Obtiene TODAS las preguntas de la BD con el id_contenido que se pasa como parámetro
	public function obtener_pregunta2($id_contenido)
	{
		$this->db->select('preguntas.*, contenidos.contenido,contenidos.subclave');
		$this->db->from('preguntas');
    $this->db->join('contenidos','preguntas.id_contenidos = contenidos.id_contenidos','inner');
		$this->db->where('preguntas.id_contenidos',$id_contenido);
		$this->db->order_by('preguntas.id_preguntas','RANDOM');

		$query = $this->db->get();

        $arreglo = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $registro)
            {
                $arreglo[] = array(
                'id_preguntas'=> $registro->id_preguntas,
                'id_grados' => $registro->id_grados,
                'id_semestre' => $registro->id_semestre,
                'id_temas' => $registro->id_temas,
                'id_contenidos' => $registro->id_contenidos,
                'id_tipo_pregunta' => $registro->id_tipo_pregunta,
                'pregunta' => $registro->pregunta,
                'repaso'    => $registro->repaso,
                'solucion'  => $registro->solucion,
                'contenido' => $registro->contenido,
                'subclave'  => $registro->subclave
              );
            }
        }

      	$json = json_encode($arreglo);
     	echo $json;
	}

    //Obtiene una sola pregunta de la BD
    public function obtener_pregunta($id_contenido)
    {
        $this->db->select('preguntas.*, contenidos.contenido,contenidos.subclave');
        $this->db->from('preguntas');
        $this->db->join('contenidos','preguntas.id_contenidos = contenidos.id_contenidos','inner');
        $this->db->where('preguntas.id_contenidos',$id_contenido);
        $this->db->order_by('preguntas.id_preguntas','RANDOM');

        $query = $this->db->get()->row();

        $json = json_encode($query);
        echo $json;
    }


    //Regresar las preguntas del contenido
    function regresarpregunta($idp)
    {
        $this->db->select('preguntas.*');
        $this->db->from('preguntas');
        $this->db->where('preguntas.id_preguntas',$idp);
        $query= $this->db->get()->row();

        return $query;

    }


	public function obtener_opciones($id_preguntas)
	{

        $sql = "SELECT * FROM opciones WHERE id_preguntas = ? ORDER BY RAND();";
        $consulta = $this->db->query($sql, array($id_preguntas));

        $arreglo = array();

        if($consulta->num_rows() > 0)
        {
           foreach($consulta->result() as $registro)
           {

            $arreglo[] = array(
                'id_opciones'=> $registro->id_opciones,
                'opcion' => $registro->opcion,
                'respuesta' => $registro->respuesta
              );
           }
         }

        $json = json_encode($arreglo);
        echo $json;
	}

	//Obtener la información del contenido
	public function obtener_info($idcont)
	{
		$this->db->select('contenidos.*');
		$this->db->from('contenidos');
		$this->db->where('contenidos.id_contenidos',$idcont);
		return $this->db->get()->row();
	}


    public function radio_obtener($idp,$idc,$opcion)
    {
        $sql = "SELECT * FROM opciones WHERE id_preguntas = ? AND respuesta = ?";
        $consulta = $this->db->query($sql, array($idp,1));

        $arreglo = array();

        if ($consulta->num_rows() > 0)
        {
            $row = $consulta->row();

            if($row->opcion == $opcion)
            {

                $this->db->select('mensajes.*');
                $this->db->from('mensajes');
                $this->db->order_by('mensajes.id_mensajes','RANDOM');
                $this->db->limit(1);
                $msj = $this->db->get();

                foreach ($msj->result() as $registro) {

                    $arreglo[] = array(
                    'id_mensajes'=> $registro->id_mensajes,
                    'mensaje' => $registro->mensaje,
                    'validacion' => 1,
                    'id_contenidos' => $idc

                  );
                }
            }
            else
            {
                $this->db->select('preguntas.*');
                $this->db->from('preguntas');
                $this->db->where('preguntas.id_preguntas',$idp);
                $pregunta = $this->db->get();

                foreach ($pregunta->result() as $registro) {

                    $arreglo[] = array(
                    'id_preguntas'=> $registro->id_preguntas,
                    'id_contenidos' => $registro->id_contenidos,
                    'pregunta' => $registro->pregunta,
                    'repaso' => $registro->repaso,
                    'solucion' => $registro->solucion,
                    'validacion' => 0,
                    'respuestasok' => $row->opcion
                  );

                }

            }
        }

        $json = json_encode($arreglo);

        echo $json;

    }

    public function check_obtener($idp,$idc,$opcion)
    {
        $ok = 0;
        $sql = "SELECT * FROM opciones WHERE id_preguntas = ? AND respuesta = ?";
        $consulta = $this->db->query($sql, array($idp,1));

        $opciones= count($opcion);
        $respuestasok=' ';
        $var=0;

        $arreglo = array();

        if ($consulta->num_rows() > 0)
        {

            foreach ($consulta->result() as $reg) {

                for($i=0; $i<$opciones ;$i++)
                {
                    if($opcion[$i] == $reg->opcion)
                    {
                        $ok=$ok+1;

                    }
                }

                $respuestasok= $reg->opcion.", ".$respuestasok;
            }

            if($consulta->num_rows() == $ok && $consulta->num_rows() == $opciones)
            {

                $this->db->select('mensajes.*');
                $this->db->from('mensajes');
                $this->db->order_by('mensajes.id_mensajes','RANDOM');
                $this->db->limit(1);
                $msj = $this->db->get();

                foreach ($msj->result() as $registro) {

                    $arreglo[] = array(
                    'id_mensajes'=> $registro->id_mensajes,
                    'mensaje' => $registro->mensaje,
                    'validacion' => 1,
                    'id_contenidos' => $idc
                  );
                }
            }
            else
            {
                $this->db->select('preguntas.*');
                $this->db->from('preguntas');
                $this->db->where('preguntas.id_preguntas',$idp);
                $pregunta = $this->db->get();

                foreach ($pregunta->result() as $registro) {

                    $arreglo[] = array(
                    'id_preguntas'=> $registro->id_preguntas,
                    'id_contenidos' => $registro->id_contenidos,
                    'pregunta' => $registro->pregunta,
                    'repaso' => $registro->repaso,
                    'solucion' => $registro->solucion,
                    'validacion' => 0,
                    'respuestasok' => $respuestasok
                  );

                }

            }
        }


        $json = json_encode($arreglo);

        echo $json;

    }
}
