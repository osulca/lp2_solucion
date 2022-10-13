<?php

class Estudiante
{
    private $nombre;
    private $email;

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function mostrarEstudiantePorNombre($nombre){
        $conn = new Conn();
        $sql = "SELECT leccion.*, programacion.*, estudiante.nombre as estudiante, estudiante.email, profesor.* FROM estudiante JOIN leccion ON leccion.id_estudiante = estudiante.id JOIN programacion ON leccion.id_programacion = programacion.id JOIN profesor ON programacion.id_profesor = profesor.id  WHERE estudiante.nombre like '%$nombre%'";
        $resultado = $conn->conectar()->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}