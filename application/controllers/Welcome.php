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
		$this->load->view('mainIni');
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
		$this->load->view('mainIni');
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


	public function verGrupos(){//nuevo
		$this->load->view('header');
		$this->load->view('encabezadoMaestro');
		$cadena="select * from grupo where idPersona='".$this->session->userdata('idPersona')."'";
		$data['grupos']=$this->bases_model->getQuery($cadena);
		$this->load->view('verGrupos',$data);
		$this->load->view('footer');
	}
	public function verGruposA(){//nuevo
		$this->load->view('header');
		$this->load->view('encabezadoAlumno');
		$cadena="select ga.Calificacion, ga.idPersona, ga.idGrupo, g.nombre from grupo_has_alumno as ga inner join grupo as g on g.idGrupo=ga.idGrupo where ga.idPersona='".$this->session->userdata('idPersona')."'";
		$data['grupos']=$this->bases_model->getQuery($cadena);
		$this->load->view('verGruposA',$data);
		$this->load->view('footer');
	}
	///metodos
	public function verGrupo(){//nuevo
		$this->form_validation->set_rules('grupo','grupo','required');
		$this->form_validation->set_message('required','<div class="red-text" >El campo %s es obligatorio</div>');
		if ($this->form_validation->run() != FALSE){

			$this->load->view('header');
			$this->load->view('encabezadoMaestro');		
			$cadena="select p.idPersona, p.nombre, p.usuario from maestro as m inner join persona as p on p.idPersona!=m.idPersona and p.nombre!='Admin' group by p.idPersona";		
			$data['alumnos']=$this->bases_model->getQuery($cadena);
			$data['idGrupo']=$this->input->post('grupo');

			$cadena="select p.idPersona, p.nombre, p.usuario, a.numDictados, a.promedio, ga.Calificacion from grupo_has_alumno as ga inner join persona as p on ga.idPersona=p.idPersona inner join alumno as a on a.idPersona=p.idPersona where ga.idGrupo='".$this->input->post('grupo')."'";		
			$data['grupo']=$this->bases_model->getQuery($cadena);
			
			$this->load->view('grupos',$data);
			$this->load->view('footer');
		}else{			
			redirect('/Welcome/verGrupos/', 'location');			
		}
	}
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
	public function ingresaAlumno(){
		$this->form_validation->set_rules('alumno','alumno','required');
		$this->form_validation->set_message('required','<div class="red-text" >El campo %s es obligatorio</div>');
		if ($this->form_validation->run() != FALSE){
			$data["data"] = array(
				'alumno' => $this->input->post('alumno'),
				'grupo' => $this->input->post('idGrupo')
				);
			$this->bases_model->ingresaAlumno($data["data"]);//

			if($this->bases_model->ingresaAlumnoEnGrupo($data["data"])==TRUE)
				echo "hecho";
			else
				echo "hubo un error";

			redirect('/Welcome/verGrupos/', 'location');
		}else{			
			redirect('/Welcome/verGrupos/', 'location');			
		}
	}
	public function ingresaGrupo(){
		$this->form_validation->set_rules('nombre','nombre','required');
		$this->form_validation->set_rules('numAlumnos','numAlumnos','required');
		$this->form_validation->set_message('required','<div class="red-text" >El campo %s es obligatorio</div>');
		if ($this->form_validation->run() != FALSE){
			$data["data"] = array(
				'nombre' => $this->input->post('nombre'),
				'numAlumnos' => $this->input->post('numAlumnos'),
				'idPersona' => $this->session->userdata('idPersona')
				);
			if($this->bases_model->ingresaGrupo($data["data"])==TRUE){
				redirect('/Welcome/maestro/', 'location');
			}else{
				redirect('/Welcome/verGrupos/', 'location');
			}
		}else{			
			redirect('/Welcome/verGrupos/', 'location');			
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
