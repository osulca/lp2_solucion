<?php

class Leccion
{
    private $numero;
    private $status;
    private $comProfesor;
    private $comEstudiante;
    private $id_estudiante;
    private $id_programacion;

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getComProfesor()
    {
        return $this->comProfesor;
    }

    public function setComProfesor($comProfesor)
    {
        $this->comProfesor = $comProfesor;
    }

    public function getComEstudiante()
    {
        return $this->comEstudiante;
    }

    public function setComEstudiante($comEstudiante)
    {
        $this->comEstudiante = $comEstudiante;
    }

    public function getIdEstudiante()
    {
        return $this->id_estudiante;
    }

    public function setIdEstudiante($id_estudiante)
    {
        $this->id_estudiante = $id_estudiante;
    }

    public function getIdProgramacion()
    {
        return $this->id_programacion;
    }

    public function setIdProgramacion($id_programacion)
    {
        $this->id_programacion = $id_programacion;
    }

    public function guardar(){
        $conn = new Conn();
        $sql = "INSERT INTO leccion(status, id_estudiante, id_programacion) VALUES('".$this->getStatus()."', ".$this->getIdEstudiante().", ".$this->getIdProgramacion().")";
        $resultado = $conn->conectar()->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrarPorStatus($status){
        $conn = new Conn();
        $sql = "SELECT leccion.*, programacion.*, estudiante.nombre as estudiante, estudiante.email, profesor.* FROM leccion JOIN estudiante ON leccion.id_estudiante = estudiante.id JOIN programacion ON leccion.id_programacion = programacion.id JOIN profesor ON programacion.id_profesor = profesor.id WHERE leccion.status = '$status'";
        $resultado = $conn->conectar()->query($sql);
        $conn->cerrar();
        return $resultado;
    }

}