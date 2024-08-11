<?php

require_once '../config/genericrepository.php';

class Provedores extends GenericRepository
{
    public function __construct()
    {
        parent::__construct('Proveedores');
    }
}
