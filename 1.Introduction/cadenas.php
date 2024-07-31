<?php
class Cadenas
{
    private $cadena1;
    private $cadena2;

    public function __construct($cadena1, $cadena2)
    {
        $this->cadena1 = $cadena1;
        $this->cadena2 = $cadena2;
    }

    public function concat_string()
    {
        return "{$this->cadena1} {$this->cadena2}";
    }

    public function length_string($cadena)
    {
     $length = strlen($cadena);
     return "La cadena => {$cadena} tiene {$length} caracteres";
    }
    
    public function convert_string()
    {
        $upper = strtoupper($this->cadena1);
        $lower = strtolower($this->cadena2);
        return [$upper, $lower];
    }

    public function substring ($subcadena, $caracteres)
    {
        $substring = substr($subcadena, 0, $caracteres);
        return $substring; 
    }

    public function replace_substring($cadena, $subcadena, $cadenaremplazar)
    {
        $replaced = str_replace($cadenaremplazar, $subcadena, $cadena);
        return $replaced; 
    }

    public function find_position($cadena, $subcadena)
    {
        $position = strpos($cadena, $subcadena);

        if ($position !== false) {
            echo "La posición de {$subcadena} es: " . $position; // Salida: La posición de 'Mundo' es: 6
        } else {
            echo "{$subcadena} no se encuentra en la cadena.";
        }
    }

    public function repeat_string($cadena,$repeticiones)
    {
        $repeated = str_repeat($cadena, $repeticiones);
        return $repeated;
    }
}
