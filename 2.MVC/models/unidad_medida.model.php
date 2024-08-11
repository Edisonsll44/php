<?php

require_once '../config/GenericRepository.php';

class Unidad_Medida extends GenericRepository
{
    public function __construct()
    {
        parent::__construct('unidad_medida');
    }
}
