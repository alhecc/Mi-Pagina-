<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Verificar que los valores no estén vacíos
    if (!empty($nombre) && !empty($descripcion) && !empty($precio) && !empty($stock)) {
        // Consulta SQL para insertar datos en la tabla PRODUCTO
        $sql = "INSERT INTO PRODUCTO (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)";

        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Vincular los parámetros
            $stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $stock);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "<script>
                        alert('Producto agregado correctamente.');
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
?>
