
<?php
session_start();
include("db.php");

// Verificar si el carrito está vacío
if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) == 0) {
    echo "<h2>El carrito está vacío.</h2>";
    echo "<a href='index.php'>Volver</a>";
    exit;
}

// Procesar cada producto del carrito
foreach ($_SESSION['carrito'] as $id => $cantidad) {

    // Registrar la venta SIN verificar stock
    $conexion->query("INSERT INTO ventas (producto_id, cantidad) VALUES ($id, $cantidad)");
}

// Vaciar el carrito
unset($_SESSION['carrito']);

echo "<h1>Venta realizada correctamente ✔</h1>";
echo "<a href='index.php'>Volver a la tienda</a>";
?>
