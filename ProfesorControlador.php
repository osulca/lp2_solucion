<?php
include_once "Profesor.php";
class ProfesorControlador
{
    public function mostrar(){
        $profesor = new Profesor();
        return $profesor->mostrar();
    }

    public function mostrarProfesor($id_profesor){
        $profesor = new Profesor();
        return $profesor->mostrarProfesor($id_profesor);
    }

    public function mostrarProfesorPorNombre($nombreProfesor){
        $profesor = new Profesor();
        return $profesor->mostrarProfesorPorNombre($nombreProfesor);
    }
}