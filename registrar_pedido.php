<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Si el formulario se envía, procesamos el pedido.
    require_once 'Pedido.php';

    // Recoger los datos del formulario
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $producto = $_POST['producto'];
    $unidades = $_POST['unidades'];
    $observaciones = htmlspecialchars($_POST['observaciones']);

    // Crear objeto Pedido
    $pedido = new Pedido($descripcion, $tipo, $producto, $unidades, $observaciones);
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pedido Registrado</title>
        <link rel="stylesheet" href="menues.css">
        <style>
            /* Agregar margen al botón de "Volver al Menú Principal" */
            .btn-volver {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="confirmation-message">
                <h1>¡Pedido Registrado Exitosamente!</h1>
                <div class="pedido-details">
                    <p><strong>Descripción:</strong> <?php echo $descripcion; ?></p>
                    <p><strong>Tipo:</strong> <?php echo $tipo; ?></p>
                    <p><strong>Producto:</strong> <?php echo $producto; ?></p>
                    <p><strong>Unidades:</strong> <?php echo $unidades; ?></p>
                    <p><strong>Observaciones:</strong> <?php echo $observaciones; ?></p>
                </div>
                <a href="registrar_pedido.php" class="btn">Registrar Otro Pedido</a>
                <!-- Botón para volver al menú principal con clase adicional -->
                <form action="menu.php" method="GET" class="btn-volver">
                    <button type="submit">Volver al Menú Principal</button>
                </form>
            </div>
        </div>
    </body>
    </html>

    <?php
} else {
    // Si no se ha enviado el formulario, mostramos el formulario de pedido.
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrar Pedido</title>
        <link rel="stylesheet" href="menues.css">
        <style>
            /* Agregar margen al botón de "Volver al Menú Principal" */
            .btn-volver {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container translucent-background">
            <h1 class="page-title">Registrar Pedido</h1>
            <form action="registrar_pedido.php" method="POST">
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" required><br><br>

                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" required><br><br>

                <label for="producto">Producto:</label>
                <input type="text" id="producto" name="producto" required><br><br>

                <label for="unidades">Unidades:</label>
                <input type="number" id="unidades" name="unidades" required><br><br>

                <label for="observaciones">Observaciones:</label>
                <textarea id="observaciones" name="observaciones"></textarea><br><br>

                <button type="submit">Registrar</button>
            </form>

            <!-- Botón para volver al menú principal con clase adicional -->
            <form action="menu.php" method="GET" class="btn-volver">
                <button type="submit">Volver al Menú Principal</button>
            </form>
        </div>
    </body>
    </html>
    <?php
}
?>
