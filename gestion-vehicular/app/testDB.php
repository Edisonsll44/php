<?php
include_once '../app/config/DatabaseConnectionFactory.php';

// Intentar crear una conexión
try {
    $conexion = DatabaseConnectionFactory::createConnection();
    echo "Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

// Cerrar la conexión si es necesario
if (isset($conexion) && $conexion) {
    mysqli_close($conexion);
}