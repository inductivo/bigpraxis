<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->library('Administracionlib');
		$this->load->model('Model_administracion');
		$this->load->model('Model_cursos');
		$this->load->model('Model_contenidos');
		$this->form_validation->set_message('validar_credenciales_profesores', '<strong>Incorrect</strong> <strong>Username</strong> or <strong>Password</strong>');
		$this->form_validation->set_message('validar_credenciales_alumnos', '<strong>Incorrect</strong> <strong>Username</strong> or <strong>Password</strong>');
		$this->form_validation->set_message('required', 'Ingresar <strong>%s</strong>');
	}


	public function index()
	{
		$data['contenido'] = 'inicio';
		$this->load->view('templates/template_principal',$data);

	}

	/* Funciòn para cerrar la sesiòn del usuario*/
	public function cerrar_sesion()
	{
		$this->session->sess_destroy();
		redirect('principal/index');
	}

	public function cursos()
	{
		$data['contenido'] = 'cursos';
		$this->load->view('templates/template_temas',$data);
	}

	//Acceso Estudiantes
	public function estudiantes()
	{
		$data['contenido'] = 'administracion/login_estudiantes';
		$this->load->view('templates/template_login',$data);
	}

	//Acceso Profesores
	public function profesores()
	{
		$data['contenido'] = 'administracion/login_profesores';
		$this->load->view('templates/template_login',$data);
	}

	public function login_estudiantes()
	{
		$this->form_validation->set_rules('email','Email','trim|callback_validar_credenciales_alumnos');
		$this->form_validation->set_rules('password','Password','trim');

		if ($this->form_validation->run()){

			redirect('principal/panel_estudiantes');
		} else
		{
			$this->estudiantes();
		}
	}

	public function login_profesores()
	{
		$this->form_validation->set_rules('email','Email','trim|callback_validar_credenciales_profesores');
		$this->form_validation->set_rules('password','Password','trim');

		if ($this->form_validation->run()){
			/*Se accede al dashboard*/
			redirect('principal/panel_profesores');
		} else
		{
			$this->profesores();
		}
	}

	public function validar_credenciales_profesores(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		return $this->administracionlib->login($email,md5($password));
	}

	public function validar_credenciales_alumnos(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		return $this->administracionlib->login_alumnos($email,md5($password));
	}

	public function panel_estudiantes()
	{
		if($this->session->userdata('id_alumnos') == null)
		{
			redirect('principal/acceso_denegado');
		}else{

			$data['contenido'] = 'test/cursos';
			$this->load->view('templates/template_cursos',$data);
		}

	}

	public function panel_profesores()
	{
		if($this->session->userdata('id_usuarios') == null){
			redirect('principal/acceso_denegado');
		}else if($this->session->userdata('nivel') == 1){
						$data['contenido'] = 'administracion/panel';
						$this->load->view('templates/template_panel',$data);
					}else{
						$data['contenido'] = 'administracion/panel_profesores';
						$this->load->view('templates/template_panel',$data);
		}

	}

	public function acceso_denegado()
	{
		$data['contenido'] = 'administracion/acceso_denegado';
		$this->load->view('templates/template_principal',$data);
	}

	public function cargarGrados()
	{
		$this->Model_administracion->cargarGrados();
	}

	public function cargarSemestres()
	{
		$this->Model_administracion->cargarSemestres();
	}

	public function cargarMaterias()
	{
		$idsemestre=$_GET['id_semestre'];
		$this->Model_administracion->cargarMaterias($idsemestre);
	}

	public function cargarTemas()
	{
		$idmateria=$_GET['id_materias'];
		$this->Model_administracion->cargarTemas($idmateria);
	}

	public function cargarContenidos()
	{
		$idtema=$_GET['id_temas'];
		$this->Model_administracion->cargarContenidos($idtema);
	}

	public function cargarTipoPregunta()
	{
		$this->Model_administracion->cargarTipoPregunta();
	}

	public function publicar()
	{
		$respuestas = array();

		$this->form_validation->set_rules('txtpregunta','PREGUNTA','required');
		$this->form_validation->set_rules('txtrepaso','REPASO','required');
		$this->form_validation->set_rules('txtsolucion','SOLUCIÓN','required');

		//Falta agregar la validacion de las respuestas
		if ($this->form_validation->run()){
			$pregunta = array(
				'id_grados' => $this->input->post('grados'),
				'id_semestre' => $this->input->post('semestres'),
				'id_temas' => $this->input->post('temas'),
				'id_contenidos' => $this->input->post('contenidos'),
				'id_tipo_pregunta' => $this->input->post('tipopregunta'),
				'pregunta' => $this->input->post('txtpregunta'),
				'repaso' => $this->input->post('txtrepaso'),
				'solucion' => $this->input->post('txtsolucion')
				);

			$opciones = $this->input->post('resp');
			$cont=count($opciones);

    	for ($i = 0; $i < $cont; $i++) {
		  	$check= $this->input->post('chk'.($i+1));
		    $respuestas[$i+1] = $check;
		    }

			$this->Model_administracion->insertar_pregunta($pregunta,$opciones,$respuestas);
			$this->regresar_agregar_preguntas();

			$grado = $this->input->post('grados');
			$semestre =$this->input->post('semestres');
			$materia = $this->input->post('materias');
			$tema = $this->input->post('temas');
			$contenido = $this->input->post('contenidos');

			echo  '<div class="row text-center"><div class="col-lg-12 margen alerta-exito alerta" id="mensaje"><strong>Muy bien!</strong> Pregunta agregada con éxito.</div></div>';
		}else{

			$this->regresar_agregar_preguntas();
		}
	}

	public function regresar_agregar_preguntas(){
		if($this->session->userdata('id_usuarios') == null){
			redirect('principal/acceso_denegado');
		}else{
			$data['contenido'] = 'administracion/agregar_preguntas';
			$this->load->view('templates/template_panel',$data);
		}

	}


	public function vista_temas()
	{
		$this->load->view('test/temas');
	}


	public function temas()
	{
		$id_materia= $_GET['id_materias'];
		$this->Model_cursos->obtenerTemas($id_materia);
	}


	public function vista_contenidos()
	{
		$this->load->view('contenidos');
	}

	public function subtemas()
	{
		$id_temas= $_GET['id_temas'];
		$this->Model_contenidos->mostrarSubtemas($id_temas);
	}


	public function problemas()
	{
		$this->load->view('test');
	}

	public function obtener_pregunta()
	{
		$id_contenido= $_GET['id_contenidos'];
		$this->Model_contenidos->obtener_pregunta($id_contenido);
	}

	public function obtener_opciones()
	{
		$id_pregunta = $_GET['id_pregunta'];
		$this->Model_contenidos->obtener_opciones($id_pregunta);
	}

	public function validar_respuesta_radio()
	{
		$id_p=$_GET['id_preguntas'];
		$opcion = $_GET['opcion'];
		$id_cont = $_GET['id_contenidos'];
		$this->Model_contenidos->radio_obtener($id_p,$id_cont,$opcion);
	}

	public function validar_respuesta_check()
	{
		$id_p=$_GET['id_preguntas'];
		$id_cont = $_GET['id_contenidos'];
		$opcion = $_GET['opcion'];
		$this->Model_contenidos->check_obtener($id_p,$id_cont,$opcion);
	}

	//Vista AGREGAR preguntas en Panel
	public function agregar_preguntas()
	{
		$this->load->view('administracion/agregar_preguntas');
	}
	//Vista CONSULTAR preguntas en Panel
	public function consultar_preguntas()
	{
		$this->load->view('administracion/consultar_preguntas');
	}

	//Vista CONSULTAR temas en Panel
	public function consultar_temas()
	{
		$this->load->view('administracion/consultar_temas');
	}

	//Vista Panel
	public function panel_home()
	{
		if($this->session->userdata('id_usuarios') == null){
			redirect('principal/acceso_denegado');
		}else if($this->session->userdata('nivel') == 1){
			$this->load->view('administracion/panel');
		}else{
			$this->load->view('administracion/panel_profesores');
		}
	}

	// Realizar la consulta para obtener las preguntas del tema y contenido seleccionado
	public function cargarPreguntas()
	{
		$grado=$_GET['grado'];
		$semestre=$_GET['semestre'];
		$materia=$_GET['materia'];
		$tema=$_GET['tema'];
		$contenido=$_GET['contenido'];

		$this->Model_administracion->cargarPreguntas($grado,$semestre,$materia,$tema,$contenido);
	}

	// Realizar la consulta para obtener los temas de la materia seleccionada
	public function cargarConsultaTemas()
	{
		$materia=$_GET['materia'];

		$this->Model_administracion->cargarConsultaTemas($materia);
	}

	// Realizar la consulta para obtener el tema y poder editarlo
	public function buscar_tema()
	{
		$id=$_GET['id_temas'];
		$this->Model_administracion->buscar_tema($id);
	}

	public function guardar_tema(){
		$id=$_GET['id_temas'];
		$clave=$_GET['clave'];
		$tema=$_GET['tema'];
		$id_materias=$_GET['id_materias'];

		$registro = array(
      'id_temas' => $id,
      'clave'  => $clave,
      'tema'  => $tema
		);

		$this->Model_administracion->actualizar_tema($registro,$id_materias);
	}

	// Realizar la consulta para eliminar un tema
	public function eliminar_tema()
	{
		$id=$_GET['id_temas'];
		$this->Model_administracion->eliminar_tema($id);
	}

	public function agregar_tema(){

		$id_materias=$_GET['id_materias'];
		$clave=$_GET['clave'];
		$tema=$_GET['tema'];

		$registro = array(
			'id_materias' => $id_materias,
      'clave'  => $clave,
      'tema'  => $tema
		);
		$this->Model_administracion->agregar_tema($registro);
	}

	// Realizar la consulta para obtener los contenidos del tema seleccionado
	public function buscar_contenidos()
	{
		$id=$_GET['id_temas'];
		$this->Model_administracion->buscar_contenidos($id);
	}

	public function buscar_contenido(){
		$id=$_GET['id_contenidos'];
		$this->Model_administracion->buscar_contenido($id);
	}

	public function guardar_contenido(){
		$id=$_GET['id_contenidos'];
		$subclave=$_GET['subclave'];
		$contenido=$_GET['contenido'];

		$registro = array(
      'id_contenidos' => $id,
      'subclave'  => $subclave,
      'contenido'  => $contenido
		);
		$this->Model_administracion->actualizar_contenido($registro);
	}

	// Realizar la consulta para eliminar un Contenido
	public function eliminar_contenido()
	{
		$id=$_GET['id_contenidos'];
		$this->Model_administracion->eliminar_contenido($id);
	}

	// Agrega un NUEVO CONTENIDO a la bd
	public function agregar_contenido(){
		$id_temas=$_GET['id_temas'];
		$subclave=$_GET['subclave'];
		$contenido=$_GET['contenido'];

		$registro = array(
			'id_temas' => $id_temas,
      'subclave'  => $subclave,
      'contenido'  => $contenido
		);
		$this->Model_administracion->agregar_contenido($registro);
	}

	//Vista Profesores(usuarios)
	public function consultar_profesores(){
		$this->load->view('administracion/profesores');
	}

	//Vista CONSULTAR Alumnos
	public function alumnos(){
		$this->load->view('administracion/alumnos');
	}

	public function actualizar_pregunta(){

		$respuestas = array();
		$idopciones = array();

		$this->form_validation->set_rules('txtpregunta','PREGUNTA','required');
		$this->form_validation->set_rules('txtrepaso','REPASO','required');
		$this->form_validation->set_rules('txtsolucion','SOLUCIÓN','required');

		if ($this->form_validation->run()){
			$id = $this->input->post('idpreguntas');

				$pregunta = array(
					'id_tipo_pregunta' => $this->input->post('tipopregunta'),
					'pregunta' => $this->input->post('txtpregunta'),
					'repaso' => $this->input->post('txtrepaso'),
					'solucion' => $this->input->post('txtsolucion')
				);

				$opciones = $this->input->post('resp');
				$cont=count($opciones);

				for ($i = 0; $i < $cont; $i++) {
					$check= $this->input->post('chk'.($i));
					$idopcion= $this->input->post('idopcion'.($i));
					$respuestas[$i] = $check;
					$idopciones[$i] = $idopcion;
					}

				$this->Model_administracion->actualizar_pregunta($pregunta,$id);
				$this->Model_administracion->actualizar_opciones($opciones,$respuestas,$idopciones);

				$this->regresar_consultar_preguntas();
				echo  '<div class="row text-center"><div class="col-lg-12 margen alerta-exito alerta" id="mensaje"><strong>Muy bien!</strong> Pregunta actualizada con éxito.</div></div>';

			}
			else{
				$this->regresar_consultar_preguntas();
			}
	}

	public function regresar_consultar_preguntas(){
		if($this->session->userdata('id_usuarios') == null){
			redirect('principal/acceso_denegado');
		}else{
			$data['contenido'] = 'administracion/consultar_preguntas';
			$this->load->view('templates/template_panel',$data);
		}

	}

}//FIN
