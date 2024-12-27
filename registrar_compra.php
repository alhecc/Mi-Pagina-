<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_producto = $_POST['id_producto'];
    $id_cliente = $_POST['id_cliente'];
    $cantidad = $_POST['cantidad'];

    // Obtener detalles del producto
    $sql_producto = "SELECT precio, stock FROM PRODUCTO WHERE id_producto = ?";
    $stmt_producto = $conn->prepare($sql_producto);
    $stmt_producto->bind_param("i", $id_producto);
    $stmt_producto->execute();
    $result_producto = $stmt_producto->get_result();
    $producto = $result_producto->fetch_assoc();

    if (!$producto) {
        echo "<script>
                alert('Producto no encontrado.');
                window.location.href = 'menu.php';  // Redirige al menú
              </script>";
        exit();
    }

    $precio = $producto['precio'];
    $stock = $producto['stock'];

    // Verificar disponibilidad en stock
    if ($cantidad > $stock) {
        echo "<script>
                alert('No hay suficiente stock disponible. Stock actual: $stock.');
                window.location.href = 'menu.php';  // Redirige al menú
              </script>";
        exit();
    }

    $total = $cantidad * $precio;

    // Registrar la compra
    $sql_compra = "INSERT INTO COMPRA (cantidad, total, id_producto, id_cliente) VALUES (?, ?, ?, ?)";
    $stmt_compra = $conn->prepare($sql_compra);
    $stmt_compra->bind_param("idii", $cantidad, $total, $id_producto, $id_cliente);
    $stmt_compra->execute();

    // Actualizar el stock del producto
    $nuevo_stock = $stock - $cantidad;
    $sql_actualizar_stock = "UPDATE PRODUCTO SET stock = ? WHERE id_producto = ?";
    $stmt_actualizar_stock = $conn->prepare($sql_actualizar_stock);
    $stmt_actualizar_stock->bind_param("ii", $nuevo_stock, $id_producto);
    $stmt_actualizar_stock->execute();

    echo "<script>
            alert('Compra registrada exitosamente.');
            window.location.href = 'menu.php';  // Redirige al menú
          </script>";
    exit();
}

// Obtener todos los productos y clientes para mostrar en el formulario
$sql_productos = "SELECT id_producto, nombre FROM PRODUCTO";
$result_productos = $conn->query($sql_productos);
$productos = $result_productos->fetch_all(MYSQLI_ASSOC);

$sql_clientes = "SELECT id_cliente, nombre FROM CLIENTE";
$result_clientes = $conn->query($sql_clientes);
$clientes = $result_clientes->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registrar Compra</title>
</head>

<body>
    <div class="container">
        <h1>Registrar Compra</h1>
        <form action="registrar_compra.php" method="POST">
            <label for="id_producto">Producto:</label>
            <select id="id_producto" name="id_producto" required>
                <?php foreach ($productos as $producto): ?>
                    <option value="<?= htmlspecialchars($producto['id_producto']) ?>">
                        <?= htmlspecialchars($producto['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="id_cliente">Cliente:</label>
            <select id="id_cliente" name="id_cliente" required>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= htmlspecialchars($cliente['id_cliente']) ?>">
                        <?= htmlspecialchars($cliente['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" min="1" required>

            <button type="submit">Registrar Compra</button>
        </form>
        <form action="menu.php" method="GET">
            <button type="submit">Volver al Menú Principal</button>
        </form>
    </div>
</body>

</html>