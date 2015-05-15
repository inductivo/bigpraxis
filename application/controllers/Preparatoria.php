<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preparatoria extends CI_Controller {

//Matemáticas 1
	public function mat1()
	{
		$data['contenido'] = 'preparatoria/mat/primero';
		$this->load->view('templates/template_principal',$data);
	}



	//B. Operaciones
	public function operaciones()
	{
		$data['contenido'] ='preparatoria/mat/primero/operaciones';
		$this->load->view('templates/template_principal',$data);
	}

	//C. Relaciones y proporciones
	public function relaciones()
	{
		$data['contenido'] ='preparatoria/mat/primero/relaciones';
		$this->load->view('templates/template_principal',$data);
	}

	//D. Porcentajes
	public function porcentajes()
	{
		$data['contenido'] ='preparatoria/mat/primero/porcentajes';
		$this->load->view('templates/template_principal',$data);
	}

	//E. Mediciones
	public function mediciones()
	{
		$data['contenido'] ='preparatoria/mat/primero/mediciones';
		$this->load->view('templates/template_principal',$data);
	}

	//F. Geometría
	public function geometria()
	{
		$data['contenido'] ='preparatoria/mat/primero/geometria';
		$this->load->view('templates/template_principal',$data);
	}

	//G. Gráficos de coordenadas
	public function coordenadas()
	{
		$data['contenido'] ='preparatoria/mat/primero/coordenadas';
		$this->load->view('templates/template_principal',$data);
	}

	//H. Propiedades
	public function propiedades()
	{
		$data['contenido'] ='preparatoria/mat/primero/propiedades';
		$this->load->view('templates/template_principal',$data);
	}
}
