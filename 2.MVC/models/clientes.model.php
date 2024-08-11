<?php

require_once '../config/GenericRepository.php';

class Clientes extends GenericRepository
{
    public function __construct()
    {
        parent::__construct('clientes');
    }

    // Obtener todas las facturas asociadas a un cliente
    public function obtenerFacturas($idCliente)
    {
        $query = "SELECT * FROM factura WHERE Clientes_idClientes = $idCliente";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
