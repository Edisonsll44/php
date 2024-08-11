<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once '../models/iva.model.php';

$iva = new IVA;

switch ($_GET["op"]) {
    case 'todos':
        $data = $iva->todos();
        echo json_encode($data);
        break;

    case 'uno':
        $id = $_GET["id"];
        $data = $iva->uno($id);
        echo json_encode($data);
        break;

    case 'insertar':
        $data = $_POST;
        $id = $iva->insertar($data);
        echo json_encode(["id" => $id]);
        break;

    case 'actualizar':
        $id = $_POST["id"];
        $data = $_POST;
        unset($data["id"]);
        $result = $iva->actualizar($id, $data);
        echo json_encode(["result" => $result]);
        break;

    case 'eliminar':
        $id = $_POST["id"];
        $result = $iva->eliminar($id);
        echo json_encode(["result" => $result]);
        break;
}
