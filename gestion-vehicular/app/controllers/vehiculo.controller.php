
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
require_once '../models/vehiculo.models.php';
error_reporting(0);
$vehiculo = new Vehiculo;



switch ($_GET["op"]) {
    case 'todos':
        $datos = $vehiculo->todos(); 
        echo json_encode($datos);
        break;
    case 'uno':
        $idVehiculo = $_POST["id"];
        $datos = $vehiculo->uno($idVehiculo); 
        echo json_encode($datos);
        break;
    case 'insertar':
        $data = [
            'marca' => $_POST["marca"],
            'modelo' => $_POST["modelo"],
            'año' => $_POST["año"],
            'disponible' => $_POST["disponible"]
        ];
        $datos = $vehiculo->insertar($data);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $idVehiculo = $_POST["id"];
        $data = [
            'marca' => $_POST["marca"],
            'modelo' => $_POST["modelo"],
            'año' => $_POST["año"],
            'disponible' => $_POST["disponible"]
        ];
        $datos = $vehiculo->actualizar($idVehiculo, $data);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $idVehiculo = $_POST["id"];
        $datos = $vehiculo->eliminar($idVehiculo); 
        echo json_encode($datos);
        break;
     default:
         echo json_encode(["error" => "Operación no válida"]);
         break;
}
