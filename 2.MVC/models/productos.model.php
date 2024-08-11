<?php

require_once '../config/GenericRepository.php';

class Productos extends GenericRepository
{
    public function __construct()
    {
        parent::__construct('productos');
    }
}
