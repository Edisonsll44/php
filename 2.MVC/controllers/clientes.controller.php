<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once '../models/clientes.model.php';

$clientes = new Clientes;

switch ($_GET["op"]) {
    case 'todos':
        $data = $clientes->todos();
        echo json_encode($data);
        break;

    case 'uno':
        $id = $_GET["id"];
        $data = $clientes->uno($id);
        echo json_encode($data);
        break;

    case 'insertar':
        $data = $_POST;
        $id = $clientes->insertar($data);
        echo json_encode(["id" => $id]);
        break;

    case 'actualizar':
        $id = $_POST["id"];
        $data = $_POST;
        unset($data["id"]);
        $result = $clientes->actualizar($id, $data);
        echo json_encode(["result" => $result]);
        break;

    case 'eliminar':
        $id = $_POST["id"];
        $result = $clientes->eliminar($id);
        echo json_encode(["result" => $result]);
        break;

    case 'obtenerFacturas':
        $id = $_GET["id"];
        $data = $clientes->obtenerFacturas($id);
        echo json_encode($data);
        break;
}
