<?php
$host = '127.0.0.1';
$usuario = 'root';
$pass = 'root';
$base = 'sexto';
$port = '3307';

$conn = new mysqli($host, $usuario, $pass, $base, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
$conn->close();