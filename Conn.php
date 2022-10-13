<?php

class Conn{

    private $dsn;
    private $usuario;
    private $pass;
    private $conexion;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=idiomas";
        $this->usuario = "root";
        $this->pass = "";
    }

    public function conectar(){
        $this->conexion = new PDO($this->dsn, $this->usuario, $this->pass, array
            (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
        );
        return $this->conexion;
    }

    public function cerrar(){
        $this->conexion = NULL;
    }


}
