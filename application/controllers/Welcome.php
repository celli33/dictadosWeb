<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('bases_model');
	}
	///vistas
	public function index(){
		$this->load->view('header');
		$this->load->view('encabezado');
		$this->load->view('main');
		$this->load->view('footer');
	}

	public function registro(){
		$this->load->view('header');
		$this->load->view('encabezado');
		$this->load->view('mainReg');
		$this->load->view('footer');
	}

	public function alumno(){
		$this->load->view('header');
		$this->load->view('encabezadoAlumno');
		$this->load->view('main');
		$this->load->view('footer');
	}

	public function login(){
		$this->load->view('header');
		$this->load->view('encabezado');
		$this->load->view('login');
		$this->load->view('footer');
	}

	///metodos

	public function iniciarSesion(){
		$data["data"] = array(
			'email' => $this->input->post('email'),
			'contraseña' => $this->input->post('contraseña')
			);
		$data["data"]=$this->bases_model->iniciarSesion($data["data"]);
		//comprobar si existe el usuario con el password correcto
		//inicialmente solo se logea el alumno :3
		if($data["data"]==FALSE){
			redirect('/Welcome/login/', 'location');							
		}else{
			foreach ($data["data"]-> result() as $row) {
				$datasession = array(
						'idPersona' => $row->idPersona,
						'nombre' => $row->nombre,
						'a_paterno' => $row->a_paterno,
						'a_materno' => $row->a_materno,
						'usuario' => $row->usuario,
						'correo' => $row->correo,
						'contraseña' => $row->contraseña,
					);
			}
			$this->session->set_userdata($datasession);
			redirect('/Welcome/alumno/', 'location');
		}
	}

	public function cerrarSesion(){
		$datasession = array('usuario' => '');
		$this->session->unset_userdata($datasession);
		$this->session->sess_destroy();
		redirect('/Welcome/index/', 'refresh');
	}

	public function registrarse(){

	    $data["data"] = array( 
	    	'nombre'=> $this->input->post('nombre'), 
	    	'paterno'=> $this->input->post('paterno'),
	    	'materno'=> $this->input->post('materno'), 
	    	'usuario'=> $this->input->post('usuario'),
	    	'email'=> $this->input->post('email'), 
	    	'contraseña'=> $this->input->post('contraseña'),
	    	);
	    
	    $this->bases_model->registrarse($data["data"]);
	    $this->index();
	}
}
