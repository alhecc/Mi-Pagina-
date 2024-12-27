<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];

    // Verificar que los valores no estén vacíos
    if (!empty($nombre) && !empty($email) && !empty($direccion)) {
        // Consulta SQL para insertar datos en la tabla CLIENTE
        $sql = "INSERT INTO CLIENTE (nombre, email, direccion) VALUES (?, ?, ?)";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Vincular los parámetros
            $stmt->bind_param("sss", $nombre, $email, $direccion);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "<script>
                        alert('Cliente agregado correctamente.');
                        window.location.href = 'menu.php';  // Redirige al menú
                      </script>";
                exit();
            } else {
                echo "Error al ejecutar la consulta: " . $stmt->error;
            }

            // Cerrar el statement
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conn->error;
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
}

// Cerrar conexión
$conn->close();
