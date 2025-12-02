<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Cuando se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $nuevo_precio = $_POST['nuevo_precio'];

    // Actualizar solo el precio del producto
    $sql = "UPDATE productos SET precio='$nuevo_precio' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Precio actualizado correctamente</h3>";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

$conn->close();
?>

<!-- FORMULARIO -->
<h2>Actualizar precio del producto</h2>

<form method="POST" action="">
    <label>Código de barras del producto:</label><br>
    <input type="text" name="codigo" required><br><br>

    <label>Nuevo precio:</label><br>
    <input type="number" step="0.01" name="nuevo_precio" required><br><br>

    <button type="submit">Actualizar precio</button>
</form>
