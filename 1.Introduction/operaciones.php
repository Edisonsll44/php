<?php
class Operaciones
{
    private $number1;
    private $number2;

    public function __construct($n1, $n2) {
        $this->number1 = $n1;
        $this->number2 = $n2;
    }

    public function add() {
        return $this->number1 + $this->number2;
    }

    public function subtract() {
        return $this->number1 - $this->number2;
    }

    // Método para la multiplicación
    public function multiply()
    {
        return $this->number1 * $this->number2;
    }

    // Método para la división
    public function divide()
    {
        if ($this->number2 != 0) {
            return $this->number1 / $this->number2;
        } else {
            return "Error: División por cero";
        }
    }

    // Método para el módulo
    public function modulus()
    {
        return $this->number1 % $this->number2;
    }

    // Método para la potenciación
    public function power()
    {
        return pow($this->number1, $this->number2);
    }
}