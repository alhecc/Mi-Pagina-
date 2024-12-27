<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Datos</title>

    <!-- Estilos CSS dentro del archivo HTML -->
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            /* Fondo celeste claro */
            background-image: url('https://ultimainformatica.com/img/cms/TIENDAS/tienda%20de%20informatica%20ultima%20sur%20de%20tenerife-7.jpg');
            /* Imagen de fondo */
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Contenedor principal */
        .container {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            /* Espacio entre los formularios */
            padding: 30px;
            max-width: 1200px;
            margin: auto;
            width: 90%;
        }

        /* Sección de formulario */
        .form-section {
            background: rgba(255, 255, 255, 0.8);
            /* Fondo blanco semitransparente */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 48%;
            /* Ajusta el tamaño de cada formulario */
        }

        /* Títulos */
        h1,
        h2 {
            text-align: center;
            color: #1e90ff;
            /* Azul */
        }

        /* Formularios */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            color:
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        textarea {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #1e90ff;
            /* Azul al enfocar */
            box-shadow: 0 0 5px rgba(30, 144, 255, 0.5);
        }

        /* Botones */
        button {
            background-color: #1e90ff;
            /* Azul */
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4682b4;
            /* Celeste oscuro */
        }

        /* Botón para volver al menú principal */
        .btn-volver button {
            background-color: #1e90ff;
            /* Rojo */
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-volver button:hover {
            background-color: #4682b4;
            /* Rojo más oscuro */
        }

        /* Lista de productos */
        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 15px 0;
            /* Más espacio entre elementos */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <h1>Gestionar Productos y Clientes</h1>

    <div class="container">
        <div class="form-section">
            <h2>Gestionar Productos</h2>
            <form action="insertar_producto.php" method="POST">
                <label for="nombre_producto">Nombre:</label>
                <input type="text" id="nombre_producto" name="nombre" required>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required></textarea>

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" required>

                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" required>

                <button type="submit">Agregar Producto</button>
            </form>
        </div>

        <div class="form-section">
            <h2>Gestionar Clientes</h2>
            <form action="insertar_cliente.php" method="POST">
                <label for="nombre_cliente">Nombre:</label>
                <input type="text" id="nombre_cliente" name="nombre" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="direccion">Dirección:</label>
                <textarea id="direccion" name="direccion" required></textarea>

                <button type="submit">Agregar Cliente</button>
            </form>
        </div>
    </div>

    <!-- Botón para volver al menú principal -->
    <form action="menu.php" method="GET" class="btn-volver">
        <button type="submit">Volver al Menú Principal</button>
    </form>
</body>

</html>