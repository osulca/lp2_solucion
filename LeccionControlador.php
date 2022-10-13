<?php
include_once "Leccion.php";
include_once "ProgramacionControlador.php";
include_once "ProfesorControlador.php";
include_once "EstudianteControlador.php";
class LeccionControlador
{
    public function programar($id_programación): string
    {
        $leccion = new Leccion();
        $leccion->setStatus("programado");
        $leccion->setIdProgramacion($id_programación);
        $leccion->setIdEstudiante(1);

        $programacionControlador = new ProgramacionControlador();
        if($programacionControlador->esProgramacionLibre($id_programación))
        {
            $resultado = $leccion->guardar();
            if($resultado != 0){
                return "Leccion Programada";
            }else{
                return "Error: no se pudo programar la leccion";
            }
        }else{
            return "La lección no se puede programar porque no es libre";
        }
    }

    public function buscar(string $criterio, string $busqueda)
    {
        switch ($criterio){
            case 0:
                $profesorControlador = new ProfesorControlador();
                $resultado = $profesorControlador->mostrarProfesorPorNombre($busqueda);
                break;
            case 1:
                $estudianteControlador = new EstudianteControlador();
                $resultado = $estudianteControlador->mostrarEstudiantePorNombre($busqueda);
                break;
            case 2:
                $leccion = new Leccion();
                $resultado = $leccion->mostrarPorStatus($busqueda);
                break;
        }
        return $resultado;
    }
}