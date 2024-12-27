<?php
$host = 'localhost';
$user = 'root';
$password = ''; // Cambia esto si tienes una contraseña
$dbname = 'TIENDA';

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Configurar el conjunto de caracteres
if (!$conn->set_charset("utf8")) {
    die("Error al configurar el conjunto de caracteres: " . $conn->error);
}
?>
