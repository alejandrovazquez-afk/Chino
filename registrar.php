<?php
include("db.php");

$codigo = $_POST["codigo"];
$nom = $_POST["nomprod"];
$talla = $_POST["talla"];
$precio = $_POST["precio"];
$imagen = $_POST["imagen"];

$sql = "INSERT INTO productos (id, nombre, descripcion, precio, imagen) 
        VALUES ('$codigo', '$nom', 'Talla: $talla', '$precio', '$imagen')";

if ($conexion->query($sql)) {
    echo "Producto registrado correctamente.";
} else {
    echo "Error: " . $conexion->error;
}
?>
<br><a href="admin.php">Volver</a>
