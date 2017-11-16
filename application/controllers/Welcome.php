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

	public function maestro(){
		$this->load->view('header');
		$this->load->view('encabezadoMaestro');
		$this->load->view('main');
		$this->load->view('footer');
	}

	public function admin(){
		$this->load->view('header');
		$this->load->view('encabezadoAdmin');
		$this->load->view('main');
		$this->load->view('footer');
	}

	public function login(){
		$this->load->view('header');
		$this->load->view('encabezado');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function altaMaestro(){
		$this->load->view('header');
		$this->load->view('encabezadoAdmin');
		$cadena="select * from persona";
		$data['personas']=$this->bases_model->getQuery($cadena);
		$this->load->view('altaMaestro',$data);
		$this->load->view('footer');
	}

	///metodos
	public function ingresaMaestro(){
		$this->form_validation->set_rules('maestro','maestro','required');
		$this->form_validation->set_message('required','<div class="red-text" >El campo %s es obligatorio</div>');
		if ($this->form_validation->run() != FALSE){
			$data["data"] = array(
				'maestro' => $this->input->post('maestro')
				);
			if($this->bases_model->ingresaMaestro($data["data"])==TRUE){
				redirect('/Welcome/admin/', 'location');
			}else{
				redirect('/Welcome/altaMaestro/', 'location');
			}
		}else{			
			redirect('/Welcome/altaMaestro/', 'location');			
		}
	}
	public function iniciarSesion(){

		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('contraseña','contraseña','required');
		$this->form_validation->set_message('required','<div class="red-text" >El campo %s es obligatorio</div>');
		if ($this->form_validation->run() != FALSE){
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
							'nivel' => 0
						);
				}			
				if($datasession['usuario']=='Admin'){//nivel 1
					$datasession['nivel']=1;
					$this->session->set_userdata($datasession);
					redirect('/Welcome/admin/', 'location');
				}else{
					if($this->bases_model->esMaestro($datasession)!=FALSE){//nivel 2 es profe
						$datasession['nivel']=2;
						$this->session->set_userdata($datasession);
						redirect('/Welcome/maestro/', 'location');
					}else{//nivel 3 es alumno
						$datasession['nivel']=3;
						$this->session->set_userdata($datasession);
						redirect('/Welcome/alumno/', 'location');
					}
				}
				
			}
		}else{
			$this->login();
		}
	}

	public function cerrarSesion(){
		$datasession = array('nivel' => '');
		$this->session->unset_userdata($datasession);
		$this->session->sess_destroy();
		redirect('/Welcome/index/', 'refresh');
	}

	public function registrarse(){
		$this->form_validation->set_rules('nombre','nombre','required');
		$this->form_validation->set_rules('paterno','paterno','required');
		$this->form_validation->set_rules('materno','materno','required');
		$this->form_validation->set_rules('usuario','usuario','required');
		$this->form_validation->set_rules('email','email','required');
		$this->form_validation->set_rules('contraseña','contraseña','required');
		$this->form_validation->set_message('required','<div class="red-text" >El campo %s es obligatorio</div>');
		if ($this->form_validation->run() != FALSE){
		    $data["data"] = array( 
		    	'nombre'=> $this->input->post('nombre'), 
		    	'paterno'=> $this->input->post('paterno'),
		    	'materno'=> $this->input->post('materno'), 
		    	'usuario'=> $this->input->post('usuario'),
		    	'email'=> $this->input->post('email'), 
		    	'contraseña'=> $this->input->post('contraseña'),
		    	);
		    
		    if($this->bases_model->registrarse($data["data"])==TRUE)
		    	redirect('/Welcome/index/', 'location');
		    else
		    	redirect('/Welcome/registro/', 'location');
		}else{
			redirect('/Welcome/registro/', 'location');
		}
	}
}
