<?php

require_once '../config/GenericRepository.php';

class Detalle_Factura extends GenericRepository
{
    public function __construct()
    {
        parent::__construct('detalle_factura');
    }

    // Obtener el kardex asociado
    public function obtenerKardex($idDetalle)
    {
        $query = "SELECT * FROM kardex WHERE idKardex = (SELECT Kardex_idKardex FROM detalle_factura WHERE idDetalle_Factura = $idDetalle)";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_assoc($result);
    }
}
