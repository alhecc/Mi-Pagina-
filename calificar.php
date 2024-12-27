<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
    $review = htmlspecialchars($_POST['review']);

    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'tienda');
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO reseñas (producto_id, calificacion, reseña) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $product_id, $rating, $review);

    if ($stmt->execute()) {
        // Mostrar el mensaje de confirmación con el estilo adecuado
        echo "<div class='confirmation-container'>
                <div class='container confirmation-message'>
                    <h1>¡Gracias por tu reseña!</h1>
                    <p>Tu reseña ha sido enviada correctamente. Serás redirigido a la página principal.</p>
                </div>
              </div>";
        // Redirigir a index.html después de 3 segundos
        echo "<script>setTimeout(function(){ window.location.href = 'index.html'; }, 3000);</script>";
    } else {
        // Mostrar mensaje de error con estilo de error
        echo "<div class='confirmation-container'>
                <div class='container confirmation-message error-message'>
                    <h1>Error: " . $stmt->error . "</h1>
                    <p>Hubo un problema al enviar tu reseña. Intenta nuevamente.</p>
                </div>
              </div>";
    }
    $stmt->close();
    $conn->close();
} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calificar Producto</title>
        <div class="container translucent-background">
            <link rel="stylesheet" href="menues.css">
    </head>

    <body>
        <header>
            <h1>Calificar Producto</h1>
        </header>
        <main>
            <form action="calificar.php" method="POST">
                <label for="product_id">ID del Producto:</label>
                <input type="number" id="product_id" name="product_id" required><br><br>

                <label for="rating">Calificación (1-5):</label>
                <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>

                <label for="review">Reseña:</label><br>
                <textarea id="review" name="review" rows="4" cols="50" required></textarea><br><br>

                <button type="submit">Enviar Reseña</button>
            </form>
            <H4>
                <form action="menu.php" method="GET">
                    <button type="submit">Volver al Menú Principal</button>
                </form>
                </div>
        </main>
    </body>

    </html>
<?php
}
?>