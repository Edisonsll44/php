<?php
require_once '../config/Conexion.php';
abstract class GenericRepository
{
    protected $tableName;
    protected $connection;
    protected $idColumn;

    public function __construct($tableName, $idColumn)
    {
        $this->tableName = $tableName;
        $this->idColumn = $idColumn;
        $this->connection = new ClaseConectar();
        $this->connection = $this->connection->Conectar();
    }

    public function todos()
    {
        $query = "SELECT * FROM `$this->tableName`";
        $result = mysqli_query($this->connection, $query);
        $datos = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $datos;
    }

    public function uno($id)
    {
        $query = "SELECT * FROM `$this->tableName` WHERE `$this->idColumn` = $id";
        $result = mysqli_query($this->connection, $query);
        $dato = mysqli_fetch_assoc($result);
        return $dato;
    }

    public function insertar($data)
    {
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $query = "INSERT INTO `$this->tableName` ($columns) VALUES ('$values')";
        if (mysqli_query($this->connection, $query)) {
            return mysqli_insert_id($this->connection);
        } else {
            return mysqli_error($this->connection);
        }
    }

    public function actualizar($id, $data)
    {
        $set = "";
        foreach ($data as $column => $value) {
            $set .= "`$column` = '$value', ";
        }
        $set = rtrim($set, ", ");
        $query = "UPDATE `$this->tableName` SET $set WHERE `$this->idColumn` = $id";

        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return mysqli_error($this->connection);
        }
    }

    public function eliminar($id)
    {
        $query = "DELETE FROM `$this->tableName` WHERE `$this->idColumn` = $id";
        
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            return mysqli_error($this->connection);
        }
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}