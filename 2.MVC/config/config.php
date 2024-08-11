<?php
include_once 'DatabaseConnectionFactory.php';
class ClaseConectar
{
    protected $conexion;

    public function __construct()
    {
        $this->conexion = DatabaseConnectionFactory::createConnection();
    }

    public function Conectar()
    {
        return $this->conexion;
    }
}