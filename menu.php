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
    <title>Página Principal</title>
    <link rel="stylesheet" href="menues.css">
</head>
<body>
    <header>
        <h1>Bienvenido a la Tienda Electrónica</h1>
    </header>

    <main>
        <div class="link-container">
            <a href="calificar.php" class="button">Calificar Productos</a>
            <a href="registrar_pedido.php" class="button">Registrar Pedido</a>
            <a href="gestionar_datos.php" class="button">Gestionar Clientes y datos</a>
            <a href="registrar_compra.php" class="button">Registrar Compra</a>
            <a href="index.php" class="button">Carrito de Compras</a>
    
        </form>
        </div>
    </main>
    <form action="logout.php" method="POST">
            <button type="submit">Cerrar Sesión</button>
        </form>
    <footer>
        <p>&copy; 2024 Tienda Electrónica. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
