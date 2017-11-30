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

    public function ingresaAlumno($data){
        $cadena="select * from alumno where idPersona=".$data['alumno']."";
        if($this->getQuery($cadena)!=FALSE)
           return FALSE;

        $cadena="insert into alumno(numDictados,promedio,idPersona) values(0,0,".$data['alumno'].")";
        //echo var_dump($cadena);
        $query = $this->db->query($cadena);
        return TRUE;
    }

    public function ingresaAlumnoEnGrupo($data){
        $cadena="select * from grupo_has_alumno where idPersona=".$data['alumno']." and idGrupo=".$data['grupo']."";
        if($this->getQuery($cadena)!=FALSE)
           return FALSE;

        $cadena="insert into grupo_has_alumno(idGrupo,idPersona) values(".$data['grupo'].",".$data['alumno'].");";
        //echo var_dump($cadena);
        $query = $this->db->query($cadena);
        return TRUE;
    }

    public function ingresaGrupo($data){
        $cadena="select * from grupo where nombre='".$data['nombre']."' and idPersona='".$data['idPersona']."'";
        if($this->getQuery($cadena)!=FALSE)
           return FALSE;

        $cadena="insert into grupo(numAlumnos,nombre,idPersona) values('".$data['numAlumnos']."','".$data['nombre']."','".$data['idPersona']."');";
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