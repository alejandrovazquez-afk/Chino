
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Administración de Productos</title>
</head>
<body>


<center>

<h1>FORMULARIO PARA REGISTRAR PRODUCTOS</h1>
<form method="POST" action="registrar.php">
    Código de barras: <input type="text" name="codigo"><br>
    Nombre del producto: <input type="text" name="nomprod"><br>
    Talla (descripción): <input type="text" name="talla"><br>
    Precio: <input type="text" name="precio"><br>
    Imagen: <input type="text" name="imagen"><br>
    <input type="submit" value="Registrar">
</form>

<br><hr><br>

<h1>FORMULARIO PARA ELIMINAR PRODUCTO</h1>
<form method="POST" action="eliminar.php">
    Código de barras: <input type="text" name="codigo"><br>
    <input type="submit" value="Eliminar">
</form>

<br><hr><br>

<h1>FORMULARIO PARA ACTUALIZAR TALLA</h1>
<form method="POST" action="actualizar.php">
    Código de barras: <input type="text" name="codigo"><br>
    Nueva talla (descripción): <input type="text" name="ntalla"><br>
    <input type="submit" value="Actualizar">
</form>

<br><hr><br>
<h1>ACTUALIZAR PRECIO</h1>
<form action="actualizar_precio.php" method="POST">
    <label>ID del producto:</label>
    <input type="number" name="id" required><br>

    <label>Nuevo precio:</label>
    <input type="text" name="nuevo_precio" required><br>

    <button type="submit">Actualizar Precio</button>
</form>
<hr>

</center>

</body>
</html>
