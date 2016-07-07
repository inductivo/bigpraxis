<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cursos extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

    function mostrarSemestre1()
    {

        $this->db->where('id_semestre',1);
        //$this->db->order_by('semestre','asc');

        $query = $this->db->get('materias');
        return $query->result();

    }

    function mostrarSemestre2()
    {

        $this->db->where('id_semestre',2);
        //$this->db->order_by('semestre','asc');

        $query = $this->db->get('materias');
        return $query->result();

    }

    function mostrarSemestre3()
    {

        $this->db->where('id_semestre',3);
        //$this->db->order_by('semestre','asc');

        $query = $this->db->get('materias');
        return $query->result();

    }

    function mostrarSemestre4()
    {

        $this->db->where('id_semestre',4);
        //$this->db->order_by('semestre','asc');

        $query = $this->db->get('materias');
        return $query->result();

    }

    function mostrarSemestre5()
    {

        $this->db->where('id_semestre',5);
        //$this->db->order_by('semestre','asc');

        $query = $this->db->get('materias');
        return $query->result();

    }

    function mostrarSemestre6()
    {

        $this->db->where('id_semestre',6);
        //$this->db->order_by('semestre','asc');

        $query = $this->db->get('materias');
        return $query->result();

    }

    //Devuelve los temas de la materia correspondiente
    public function obtenerTemas2($id_materia)
    {
        $this->db->where('id_materias',$id_materia);
				$this->db->order_by('clave','asc');
        $query = $this->db->get('temas');
        return $query->result();
    }

    public function obtenerTemas($id_materia)
    {
        $this->db->where('id_materias',$id_materia);
				$this->db->order_by('clave','asc');
        $query = $this->db->get('temas');

        $arreglo= array();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $registro)
            {
                $arreglo[] = array(
                    'id_materias'=>$registro->id_materias,
                    'id_temas'=>$registro->id_temas,
                    'tema'=>$registro->tema,
                    'imagen'=>$registro->imagen
                    );
            }
        }

        $json = json_encode($arreglo);
        echo $json;

    }




}
