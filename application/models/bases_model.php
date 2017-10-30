<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bases_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function getQuery($cadena){
    	return $query = $this->db->query($cadena);
    }

    public function registrarse($data){
    	$cadena="insert into persona(nombre,a_paterno,a_materno,usuario,correo,contraseña) values('".$data['nombre']."','".$data['paterno']."','".$data['materno']."','".$data['usuario']."','".$data['email']."','".$data['contraseña']."');";
    	//echo var_dump($cadena);
    	$query = $this->db->query($cadena);
    }

    public function iniciarSesion($data){
        $cadena="select * from persona where correo='".$data['email']."' and contraseña='".$data['contraseña']."'";
        $query = $this->db->query($cadena);
        //echo var_dump($query);
        if($query->num_rows()>0)
            return $query;
        else
            return FALSE;
    }
}