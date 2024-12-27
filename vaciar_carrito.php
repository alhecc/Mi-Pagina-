<?php
session_start();
$_SESSION['cart'] = []; // Vaciar el carrito
header('Location: index.php'); // Redirigir de vuelta al carrito
exit();
?>
