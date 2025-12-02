<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Cuando envían el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $codigo = $_POST['codigo'];
    $nueva_talla = $_POST['nueva_talla'];       // Esto va hacia columna 'descripcion'
    $nuevo_precio = $_POST['nuevo_precio'];

    // Consulta para actualizar descripción (talla) y precio
    $sql = "UPDATE productos 
            SET descripcion='$nueva_talla', precio='$nuevo_precio' 
            WHERE codigo='$codigo'";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Producto actualizado correctamente</h3>";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

$conn->close();
?>

<!-- FORMULARIO DE ACTUALIZACIÓN -->
<h2>Actualizar Talla y Precio</h2>
<form method="POST" action="">
    <label>Código de barras:</label><br>
    <input type="text" name="codigo" required><br><br>

    <label>Nueva talla (descripción):</label><br>
    <input type="text" name="nueva_talla" required><br><br>

    <label>Nuevo precio:</label><br>
    <input type="number" step="0.01" name="nuevo_precio" required><br><br>

    <button type="submit">Actualizar</button>
</form>
