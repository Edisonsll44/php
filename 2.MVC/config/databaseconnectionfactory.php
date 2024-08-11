<?php

class DatabaseConnectionFactory
{
    public static function createConnection()
    {
        $host = getenv('DB_HOST') ?: 'localhost';
        $usuario = getenv('DB_USER') ?: 'root';
        $pass = getenv('DB_PASS') ?: 'root';
        $base = getenv('DB_NAME') ?: 'Sexto';

        $conexion = new mysqli($host, $usuario, $pass, $base);

        if ($conexion->connect_error) {
            throw new Exception("Error al conectar con el servidor: " . $conexion->connect_error);
        }

        $conexion->set_charset("utf8");

        return $conexion;
    }
}
