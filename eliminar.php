<?php
include("db.php");

$codigo = $_POST["codigo"];

$sql = "DELETE FROM productos WHERE id='$codigo'";

if ($conexion->query($sql)) {
    echo "Producto eliminado.";
} else {
    echo "Error: " . $conexion->error;
}
?>
<br><a href="admin.php">Volver</a>






