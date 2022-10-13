<?php
include_once "Conn.php";
class Programacion
{
    private $id;
    private $inicio;
    private $tipo;
    private $id_profesor;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getInicio()
    {
        return $this->inicio;
    }

    public function setInicio($inicio)
    {
        $this->inicio = $inicio;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getIdProfesor()
    {
        return $this->id_profesor;
    }

    public function setIdProfesor($id_profesor)
    {
        $this->id_profesor = $id_profesor;
    }

    public function mostrar(){
        $conn = new Conn();
        $sql = "SELECT * FROM programacion";
        $resultado = $conn->conectar()->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrarPorIdProfesor(){
        $conn = new Conn();
        $sql = "SELECT * FROM programacion WHERE id_profesor=".$this->getIdProfesor();
        $resultado = $conn->conectar()->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar(){
        $conn = new Conn();
        $sql = "DELETE FROM programacion WHERE programacion.id = ".$this->getId();
        $resultado = $conn->conectar()->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function checkLibre(){
        $conn = new Conn();
        $sql = "SELECT * FROM programacion JOIN leccion ON programacion.id = leccion.id_programacion WHERE programacion.id = ".$this->getId();
        $resultado = $conn->conectar()->query($sql);
        $conn->cerrar();
        return $resultado;
    }


}