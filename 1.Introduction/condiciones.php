<?php
class GestorUsuario
{
    private $tipoUsuario;
    private $tipoCliente;
    private $montoCompra;

    // Constructor para inicializar propiedades
    public function __construct($edad, $tipoUsuario, $tipoCliente, $montoCompra) {
        
        $this->tipoUsuario = $tipoUsuario;
        $this->tipoCliente = $tipoCliente;
        $this->montoCompra = $montoCompra;
    }

    // Método para verificar acceso basado en la edad
    public function verificarAcceso($edad) {
        if ($edad >= 18) {
            return "Permitido.";
        } else {
            return "Denegado. Debes ser mayor de 18 años.";
        }
    }

    // Método para verificar el tipo de usuario
    public function verificarTipoUsuario() {
        if ($this->tipoUsuario === 'admin') {
            return "Bienvenido, Administrador.";
        } elseif ($this->tipoUsuario === 'editor') {
            return "Bienvenido, Editor.";
        } elseif ($this->tipoUsuario === 'suscriptor') {
            return "Bienvenido, Suscriptor.";
        } else {
            return "Tipo de usuario no reconocido.";
        }
    }

    // Método para calcular el descuento basado en el tipo de cliente
    public function calcularDescuento($tipo_cliente) {
        if ($tipo_cliente === 'VIP') {
            return $this->montoCompra * 0.20; // 20% de descuento
        } elseif ($tipo_cliente === 'Regular') {
            return $this->montoCompra * 0.10; // 10% de descuento
        } elseif ($tipo_cliente === 'Nuevo') {
            return $this->montoCompra * 0.05; // 5% de descuento
        } else {
            return 0; // Sin descuento
        }
    }
}


