<?php

require_once '../config/GenericRepository.php';

class Cliente extends GenericRepository
{
    public function __construct()
    {
        parent::__construct('Clientes','cliente_id');
    }
}