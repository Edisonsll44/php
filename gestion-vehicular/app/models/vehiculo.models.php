<?php

require_once '../config/GenericRepository.php';

class Vehiculo extends GenericRepository
{
    public function __construct()
    {
        parent::__construct('Vehiculos','vehiculo_id');
    }
}