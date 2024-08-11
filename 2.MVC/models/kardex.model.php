<?php

require_once '../config/GenericRepository.php';

class Kardex extends GenericRepository
{
    public function __construct()
    {
        parent::__construct('kardex');
    }

    // Obtener productos asociados al kardex
    public function obtenerProductos($idKardex)
    {
        $query = "SELECT * FROM productos WHERE idProductos = (SELECT Productos_idProductos FROM kardex WHERE idKardex = $idKardex)";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_assoc($result);
    }

    // Obtener unidad de medida asociada
    public function obtenerUnidadMedida($idKardex)
    {
        $query = "SELECT um.* FROM unidad_medida um
                  JOIN kardex k ON um.idUnidad_Medida = k.Unidad_Medida_idUnidad_Medida
                  WHERE k.idKardex = $idKardex";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_assoc($result);
    }

    // Obtener IVA asociado
    public function obtenerIVA($idKardex)
    {
        $query = "SELECT i.* FROM iva i
                  JOIN kardex k ON i.idIVA = k.IVA_idIVA
                  WHERE k.idKardex = $idKardex";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_assoc($result);
    }

    // Obtener proveedor asociado
    public function obtenerProveedor($idKardex)
    {
        $query = "SELECT p.* FROM proveedores p
                  JOIN kardex k ON p.idProveedores = k.Proveedores_idProveedores
                  WHERE k.idKardex = $idKardex";
        $result = mysqli_query($this->connection, $query);
        return mysqli_fetch_assoc($result);
    }
}
