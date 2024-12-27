<?php
require 'conexion.php';

$sql = "SELECT * FROM PRODUCTO WHERE stock > 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Productos Disponibles</h1>";
    echo "<ul>";
    while ($producto = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($producto['nombre']) . " - " . htmlspecialchars($producto['stock']) . " unidades disponibles</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No hay productos disponibles.</p>";
}


$conn->close();
?>
