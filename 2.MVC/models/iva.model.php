<?php

require_once '../config/GenericRepository.php';

class IVA extends GenericRepository
{
    public function __construct()
    {
        parent::__construct('iva');
    }
}
