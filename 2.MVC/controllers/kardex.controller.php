<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once '../models/kardex.model.php';

$kardex = new Kardex;

switch ($_GET["op"]) {
    case 'todos':
        $data = $kardex->todos();
        echo json_encode($data);
        break;

    case 'uno':
        $id = $_GET["id"];
        $data = $kardex->uno($id);
        echo json_encode($data);
        break;

    case 'insertar':
        $data = $_POST;
        $id = $kardex->insertar($data);
        echo json_encode(["id" => $id]);
        break;

    case 'actualizar':
        $id = $_POST["id"];
        $data = $_POST;
        unset($data["id"]);
        $result = $kardex->actualizar($id, $data);
        echo json_encode(["result" => $result]);
        break;

    case 'eliminar':
        $id = $_POST["id"];
        $result = $kardex->eliminar($id);
        echo json_encode(["result" => $result]);
        break;

    case 'obtenerProductos':
        $id = $_GET["id"];
        $data = $kardex->obtenerProductos($id);
        echo json_encode($data);
        break;

    case 'obtenerUnidadMedida':
        $id = $_GET["id"];
        $data = $kardex->obtenerUnidadMedida($id);
        echo json_encode($data);
        break;

    case 'obtenerIVA':
        $id = $_GET["id"];
        $data = $kardex->obtenerIVA($id);
        echo json_encode($data);
        break;

    case 'obtenerProveedor':
        $id = $_GET["id"];
        $data = $kardex->obtenerProveedor($id);
        echo json_encode($data);
        break;
}
