<?php

require_once '../config/GenericRepository.php';

class Factura extends GenericRepository
{
    public function __construct()
    {
        parent::__construct('factura');
    }

    // Obtener todos los detalles de la factura
    public function obtenerDetalles($idFactura)
    {
        $query = "SELECT * FROM detalle_factura WHERE Factura_idFactura = $idFactura";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // Obtener el cliente asociado a la factura
    public function obtenerCliente($idFactura)
    {
        $query = "SELECT c.* FROM clientes c
                  JOIN factura f ON c.idClientes = f.Clientes_idClientes
                  WHERE f.idFactura = $idFactura";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_assoc($result);
    }
}
