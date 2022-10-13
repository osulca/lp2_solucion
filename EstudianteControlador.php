<?php
include_once "Estudiante.php";
class EstudianteControlador
{
    public function mostrarEstudiantePorNombre($nombreEstudiante){
        $estudiante = new Estudiante();
        return $estudiante->mostrarEstudiantePorNombre($nombreEstudiante);
    }
}