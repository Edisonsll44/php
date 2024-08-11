<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de proveedores

require_once '../models/proveedores.model.php';
error_reporting(0);
$proveedores = new Provedores;

switch ($_GET["op"]) {
        //TODO: operaciones de proveedores

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los proveedores
        $datos = $proveedores->todos(); // Llamo al metodo todos de la clase proveedores.model.php
        echo json_encode($datos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idProveedores = $_POST["idProveedores"];
        $datos = $proveedores->uno($idProveedores); // Llamo al método uno de la clase Provedores
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para insertar un proveedor en la base de datos
    case 'insertar':
        $data = [
            'Nombre_Empresa' => $_POST["Nombre_Empresa"],
            'Direccion' => $_POST["Direccion"],
            'Telefono' => $_POST["Telefono"],
            'Contacto_Empresa' => $_POST["Contacto_Empresa"],
            'Teleofno_Contacto' => $_POST["Teleofno_Contacto"]
        ];
        $datos = $proveedores->insertar($data); // Llamo al método insertar de la clase Provedores
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un proveedor en la base de datos
    case 'actualizar':
        $idProveedores = $_POST["idProveedores"];
        $data = [
            'Nombre_Empresa' => $_POST["Nombre_Empresa"],
            'Direccion' => $_POST["Direccion"],
            'Telefono' => $_POST["Telefono"],
            'Contacto_Empresa' => $_POST["Contacto_Empresa"],
            'Teleofno_Contacto' => $_POST["Teleofno_Contacto"]
        ];
        $datos = $proveedores->actualizar($idProveedores, $data); // Llamo al método actualizar de la clase Provedores
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idProveedores = $_POST["idProveedores"];
        $datos = $proveedores->eliminar($idProveedores); // Llamo al método eliminar de la clase Provedores
        echo json_encode($datos);
        break;
    default:
        echo json_encode(["error" => "Operación no válida"]);
        break;
}