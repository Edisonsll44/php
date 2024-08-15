<?php

class DatabaseConnectionFactory
{
    public static function createConnection()
    {
        $host = '127.0.0.1';
        $usuario = 'root';
        $pass = 'root';
        $base = 'gestion-vehicular';
        $port = '3307';

        // Depuración: Mostrar valores de configuración
        error_log("Conectando a la base de datos con los siguientes parámetros:");
        error_log("Host: $host");
        error_log("Usuario: $usuario");
        error_log("Base de datos: $base");
        error_log("Puerto: $port");

        // Intentar crear una conexión a la base de datos MySQL
        $conexion = mysqli_connect($host, $usuario, $pass, $base, $port);

        // Depuración: Verificar la conexión
        if ($conexion === false) {
            error_log("Error al conectar con el servidor: " . mysqli_connect_error());
            throw new Exception("Error al conectar con el servidor: " . mysqli_connect_error());
        }

        // Configurar el conjunto de caracteres
        if (!mysqli_set_charset($conexion, "utf8")) {
            error_log("Error al establecer el conjunto de caracteres: " . mysqli_error($conexion));
            throw new Exception("Error al establecer el conjunto de caracteres: " . mysqli_error($conexion));
        }

        // Mensaje de éxito en la depuración
        error_log("Conexión exitosa a la base de datos.");

        return $conexion;
    }
}