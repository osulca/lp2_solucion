<?php
include_once "Conn.php";
class Profesor
{
    private $nomnbre;
    private $idioma;

    public function getNomnbre()
    {
        return $this->nomnbre;
    }

    public function setNomnbre($nomnbre)
    {
        $this->nomnbre = $nomnbre;
    }

    public function getIdioma()
    {
        return $this->idioma;
    }

    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;
    }

    public function mostrar(){
        $conn = new Conn();
        $sql = "SELECT * FROM profesor";
        $resultado = $conn->conectar()->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrarProfesor($id_profesor){
        $conn = new Conn();
        $sql = "SELECT * FROM profesor WHERE id = $id_profesor";
        $resultado = $conn->conectar()->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrarProfesorPorNombre($nombre){
        $conn = new Conn();
        $sql = "SELECT leccion.*, programacion.*, estudiante.nombre as estudiante, estudiante.email, profesor.* FROM profesor JOIN programacion ON programacion.id_profesor = profesor.id JOIN leccion ON leccion.id_programacion = programacion.id JOIN estudiante ON leccion.id_estudiante = estudiante.id  WHERE profesor.nombre like '%$nombre%'";
        $resultado = $conn->conectar()->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}