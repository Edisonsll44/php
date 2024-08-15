<?php

// Incluye el archivo del controlador
require_once '../controllers/vehiculo.controller.php';
require_once '../models/vehiculo.models.php';

// Función para simular la salida de la llamada al controlador
function testOutput($method, $params, $expected) {
    // Configura el entorno de prueba
    $_SERVER['REQUEST_METHOD'] = $method;
    $_GET['op'] = $params['op'] ?? '';
    $_POST = $params;

    // Captura la salida
    ob_start();
    // Evita modificar encabezados en el controlador real
    header_remove();
    require '../controllers/vehiculo.controller.php';
    $output = ob_get_clean();

    // Verifica si el resultado es el esperado
    if ($output === json_encode($expected)) {
        echo "Test passed\n";
    } else {
        echo "Test failed\n";
        echo "Expected: " . json_encode($expected) . "\n";
        echo "Got: " . $output . "\n";
    }
}

// Simula la clase Vehiculo
class MockVehiculo {
    public function todos() {
        return [
            ['vehiculo_id' => 1, 'marca' => 'Toyota', 'modelo' => 'Corolla', 'año' => 2022, 'disponible' => true]
        ];
    }

    public function uno($id) {
        return ['vehiculo_id' => $id, 'marca' => 'Toyota', 'modelo' => 'Corolla', 'año' => 2022, 'disponible' => true];
    }

    public function insertar($data) {
        return $data + ['vehiculo_id' => 1];
    }

    public function actualizar($id, $data) {
        return true;
    }

    public function eliminar($id) {
        return true;
    }
}

// Reemplaza la instancia del modelo en el controlador con un mock
$originalVehiculo = new Vehiculo();
$mockVehiculo = new MockVehiculo();
$vehiculo = $mockVehiculo;

// Pruebas
echo "Running tests...\n";

// Test 'todos'
testOutput('GET', ['op' => 'todos'], [
    ['vehiculo_id' => 1, 'marca' => 'Toyota', 'modelo' => 'Corolla', 'año' => 2022, 'disponible' => true]
]);

// Test 'uno'
testOutput('POST', ['op' => 'uno', 'id' => 1], [
    'vehiculo_id' => 1, 'marca' => 'Toyota', 'modelo' => 'Corolla', 'año' => 2022, 'disponible' => true
]);

// Test 'insertar'
testOutput('POST', ['op' => 'insertar', 'marca' => 'Toyota', 'modelo' => 'Corolla', 'año' => 2022, 'disponible' => true], [
    'vehiculo_id' => 1, 'marca' => 'Toyota', 'modelo' => 'Corolla', 'año' => 2022, 'disponible' => true
]);

// Test 'actualizar'
testOutput('POST', ['op' => 'actualizar', 'id' => 1, 'marca' => 'Toyota', 'modelo' => 'Corolla', 'año' => 2022, 'disponible' => true], true);

// Test 'eliminar'
testOutput('POST', ['op' => 'eliminar', 'id' => 1], true);

// Test 'operación no válida'
testOutput('GET', ['op' => 'invalido'], ['error' => 'Operación no válida']);
