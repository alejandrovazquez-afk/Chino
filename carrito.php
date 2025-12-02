
<?php
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h1>🧺 Carrito de compras</h1>
<a href="index.php">← Volver a la tienda</a>

<table>
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
    </tr>

<?php
$total = 0;

if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {

    foreach ($_SESSION['carrito'] as $id => $cantidad) {

        $sql = "SELECT * FROM productos WHERE id=$id";
        $result = $conexion->query($sql);
        $producto = $result->fetch_assoc();

        $subtotal = $producto['precio'] * $cantidad;
        $total += $subtotal;

        echo "
        <tr>
            <td>{$producto['nombre']}</td>
            <td>$cantidad</td>
            <td>$ $subtotal</td>
        </tr>
        ";
    }
}
?>

</table>

<h2>Total: $ <?php echo $total; ?></h2>

<!-- BOTÓN VENDER -->
<form action="procesar_venta.php" method="POST">
    <button type="submit">VENDER</button>
</form>

</body>
</html>
