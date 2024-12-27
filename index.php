<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php'); // Redirigir al formulario de inicio de sesión
    exit();
}

// Inicializar el carrito si no existe 
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Agregar productos al carrito si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto = htmlspecialchars($_POST['producto']);
    $cantidad = intval($_POST['cantidad']);

    // Agregar al carrito
    $_SESSION['cart'][] = [
        'producto' => $producto,
        'cantidad' => $cantidad,
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Carrito de Compras</h1>
        <form action="" method="POST">
            <label for="producto">Producto:</label>
            <input type="text" id="producto" name="producto" required>
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" min="1" required>
            <button type="submit">Agregar al carrito</button>
        </form>

        <h2>Productos en el carrito:</h2>
        <ul>
            <?php
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    echo "<li><span>{$item['producto']}</span><span>{$item['cantidad']}</span></li>";
                }
            } else {
                echo "<li>El carrito está vacío.</li>";
            }
            ?>
        </ul>
        
        <form action="vaciar_carrito.php" method="POST">
            <button type="submit">Vaciar Carrito</button>
        </form>

        <!-- Botón para volver al menú principal -->
        <form action="menu.php" method="GET">
            <button type="submit">Volver al Menú Principal</button>
        </form>
    
    </div>
</body>
</html>

