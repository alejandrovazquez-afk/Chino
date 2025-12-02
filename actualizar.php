<?php
include("db.php");

$codigo = $_POST["codigo"];
$nueva = $_POST["ntalla"];

$sql = "UPDATE productos SET descripcion='Talla: $nueva' WHERE id='$codigo'";

if ($conexion->query($sql)) {
    echo "Talla actualizada correctamente.";
} else {
    echo "Error: " . $conexion->error;
}
?>
<br><a href="admin.php">Volver</a>
