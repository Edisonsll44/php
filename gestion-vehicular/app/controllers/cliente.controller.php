
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
require_once '../models/cliente.models.php';
error_reporting(0);
$cliente = new Cliente;



switch ($_GET["op"]) {
    case 'todos':
        $datos = $cliente->todos(); 
        echo json_encode($datos);
        break;
    case 'uno':
        $idCliente = $_POST["id"];
        $datos = $cliente->uno($idCliente); 
        echo json_encode($datos);
        break;
    case 'insertar':
        $data = [
            'nombre' => $_POST["nombre"],
            'apellido' => $_POST["apellido"],
            'licencia' => $_POST["licencia"],
            'telefono' => $_POST["telefono"],
            'direccion' => $_POST["direccion"],
            'email' => $_POST["email"]
        ];
        $datos = $cliente->insertar($data);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $idCliente = $_POST["id"];
        $data = [
            'nombre' => $_POST["nombre"],
            'apellido' => $_POST["apellido"],
            'licencia' => $_POST["licencia"],
            'telefono' => $_POST["telefono"],
            'direccion' => $_POST["direccion"],
            'email' => $_POST["email"]
        ];
        $datos = $cliente->actualizar($idCliente, $data);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $idCliente = $_POST["id"];
        $datos = $cliente->eliminar($idCliente); 
        echo json_encode($datos);
        break;
     default:
         echo json_encode(["error" => "Operación no válida"]);
         break;
}
