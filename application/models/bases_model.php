<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bases_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function getQuery($cadena){
    	$query = $this->db->query($cadena);
        if($query->num_rows()>0)
            return $query;
        else
            return FALSE;
    }

    public function registrarse($data){
        $cadena="select * from persona where correo='".$data['email']."' || usuario='".$data['usuario']."'";
        if($this->getQuery($cadena)!=FALSE)
           return FALSE;
    	$cadena="insert into persona(nombre,a_paterno,a_materno,usuario,correo,contraseña) values('".$data['nombre']."','".$data['paterno']."','".$data['materno']."','".$data['usuario']."','".$data['email']."','".$data['contraseña']."');";
    	//echo var_dump($cadena);
    	$query = $this->db->query($cadena);
        return TRUE;
    }

    public function esMaestro($datasession){
        $cadena="select * from maestro where idPersona='".$datasession['idPersona']."'";
        $query = $this->db->query($cadena);
        //echo var_dump($query);
        if($query->num_rows()>0)
            return $query;
        else
            return FALSE;
    }

    public function ingresaMaestro($data){
        $cadena="select * from maestro where idPersona=".$data['maestro']."";
        if($this->getQuery($cadena)!=FALSE)
           return FALSE;

        $cadena="insert into maestro(numGrupos,idPersona) values(0,".$data['maestro'].");";
        //echo var_dump($cadena);
        $query = $this->db->query($cadena);
        return TRUE;
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