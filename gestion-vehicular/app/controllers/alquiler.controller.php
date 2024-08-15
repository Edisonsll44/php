
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
require_once '../models/alquiler.models.php';
error_reporting(0);
$alquiler = new Alquiler;



switch ($_GET["op"]) {
    case 'todos':
        $datos = $alquiler->todosAlquileres(); 
        echo json_encode($datos);
        break;
    case 'uno':
        $idAlquiler = $_POST["id"];
        $datos = $alquiler->unAlquiler($idAlquiler); 
        echo json_encode($datos);
        break;
    case 'insertar':
        $data = [
            'vehiculo_id' => (int)$_POST["vehiculo_id"],
            'cliente_id' => (int)$_POST["cliente_id"],
            'fecha_alquiler' => $_POST["fecha_alquiler"],
            'fecha_devolucion' => $_POST["fecha_devolucion"],
            'costo' => (float)$_POST["costo"]
        ];

        $datos = $alquiler->insertar($data);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $idAlquiler = $_POST["id"];
        $data = [
            'vehiculo_id' => (int)$_POST["vehiculo_id"],
            'cliente_id' => (int)$_POST["cliente_id"],
            'fecha_alquiler' => $_POST["fecha_alquiler"],
            'fecha_devolucion' => $_POST["fecha_devolucion"],
            'costo' => (float)$_POST["costo"]
        ];
        $datos = $alquiler->actualizar($idAlquiler, $data);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $idAlquiler = $_POST["id"];
        $datos = $alquiler->eliminar($idAlquiler); 
        echo json_encode($datos);
        break;
     default:
         echo json_encode(["error" => "Operación no válida"]);
         break;
}
