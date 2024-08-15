<?php

require_once '../config/GenericRepository.php';

class AlquilerRepository extends GenericRepository
{
    protected $idColumn = 'alquiler_id';
    public function __construct()
    {
        parent::__construct('Alquileres', $this->idColumn);
    }

    public function todosAlquileres()
    {
        $query = "
            SELECT 
                a.alquiler_id, 
                a.fecha_alquiler, 
                a.fecha_devolucion, 
                a.costo, 
                v.marca AS vehiculo_marca, 
                v.modelo AS vehiculo_modelo, 
                v.año AS vehiculo_año, 
                c.nombre  AS cliente_nombre, 
                c.apellido AS cliente_apellido,
                c.email AS cliente_email
            FROM 
                Alquileres a
            JOIN 
                Vehiculos v ON a.vehiculo_id = v.vehiculo_id
            JOIN 
                Clientes c ON a.cliente_id = c.cliente_id
        ";
        $result = mysqli_query($this->connection, $query);

        if (!$result) {
            return ["error" => mysqli_error($this->connection)];
        }

        $datos = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $datos;
    }

    public function unAlquiler($id)
    {
        $query = "
            SELECT 
                a.alquiler_id, 
                a.fecha_alquiler, 
                a.fecha_devolucion, 
                a.costo, 
                v.marca AS vehiculo_marca, 
                v.modelo AS vehiculo_modelo, 
                v.año AS vehiculo_año, 
                c.nombre AS cliente_nombre, 
                c.apellido AS cliente_apellido,
                c.email AS cliente_email
            FROM 
                Alquileres a
            JOIN 
                Vehiculos v ON a.vehiculo_id = v.vehiculo_id
            JOIN 
                Clientes c ON a.cliente_id = c.cliente_id
            WHERE `$this->idColumn` = $id
        ";
        $result = mysqli_query($this->connection, $query);

        if (!$result) {
            return ["error" => mysqli_error($this->connection)];
        }

        $datos = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $datos;
    }
}
