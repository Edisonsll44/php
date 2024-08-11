<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once '../models/detalle_factura.model.php';

$detalle_factura = new Detalle_Factura;

switch ($_GET["op"]) {
    case 'todos':
        $data = $detalle_factura->todos();
        echo json_encode($data);
        break;

    case 'uno':
        $id = $_GET["id"];
        $data = $detalle_factura->uno($id);
        echo json_encode($data);
        break;

    case 'insertar':
        $data = $_POST;
        $id = $detalle_factura->insertar($data);
        echo json_encode(["id" => $id]);
        break;

    case 'actualizar':
        $id = $_POST["id"];
        $data = $_POST;
        unset($data["id"]);
        $result = $detalle_factura->actualizar($id, $data);
        echo json_encode(["result" => $result]);
        break;

    case 'eliminar':
        $id = $_POST["id"];
        $result = $detalle_factura->eliminar($id);
        echo json_encode(["result" => $result]);
        break;

    case 'obtenerKardex':
        $id = $_GET["id"];
        $data = $detalle_factura->obtenerKardex($id);
        echo json_encode($data);
        break;
}
