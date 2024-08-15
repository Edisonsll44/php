<?php

require_once '../config/GenericRepository.php';
require_once '../repositories/alquiler.repository.php';

class Alquiler extends GenericRepository
{
    private $alquilerRepository;
    public function __construct()
    {
        parent::__construct('Alquileres','alquiler_id');
        $this->alquilerRepository = new AlquilerRepository();
    }

    public function todosAlquileres()
    {
        return $this->alquilerRepository->todosAlquileres();
    }

    public function unAlquiler($id)
    {
        return $this->alquilerRepository->unAlquiler($id);
    }
}