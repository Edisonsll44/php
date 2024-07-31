<?php

class Arreglos
{
    private $nombresPersonas = [];
    // Método para agregar un nombre al arreglo de nombres
    public function agregarNombre($nombre) {
        $this->nombresPersonas[] = $nombre;
    }

    // Método para mostrar todos los nombres
    public function mostrarNombres() {
        return $this-> nombresPersonas;
    } 
}



