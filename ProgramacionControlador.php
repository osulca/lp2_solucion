<?php
include_once "Programacion.php";
class ProgramacionControlador
{
    public function mostrar(): PDOStatement
    {
        $programacion = new Programacion();
        return $programacion->mostrar();
    }

    public function mostrarPorProfesor(int $id): PDOStatement
    {
        $programacion = new Programacion();
        $programacion->setIdProfesor($id);
        return $programacion->mostrarPorIdProfesor();
    }

    public function eliminar(int $id): string
    {
        $programacion = new Programacion();
        $programacion->setId($id);
        if($this->esProgramacionLibre($id))
        {
            $resultado = $programacion->eliminar();
            if($resultado != 0){
                return "Programación eliminada";
            }
            return "Error no se eliminó";
        }
        else
        {
            return "La programación no es libre, no se puede eliminar";
        }
    }

    public function esProgramacionLibre(int $id):bool
    {
        $programacion = new Programacion();
        $programacion->setId($id);
        $resultado = $programacion->checkLibre();

        $i = 0;
        foreach ($resultado as $item) {
            $i++;
        }

        if($i == 0){
            return true;
        }else{
            return false;
        }
    }
}