
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<header>
    <h1>🛒 Shop Drop BarNy</h1>
    <a class="carrito-btn" href="carrito.php">Ver carrito</a>
</header>

<!-- 📌 MENÚ DE CATEGORÍAS -->
<nav class="menuCategoria">
    <a href="index.php">Todos</a>
    <a href="index.php?categoria=ropa">Ropa</a>
    <a href="index.php?categoria=accesorios">Accesorios</a>
    <a href="index.php?categoria=perfumes">Perfumes</a>
    <a href="index.php?categoria=lentes">Lentes</a>
    <a href="index.php?categoria=zapatos">Zapatos</a>
</nav>

<br>

<!-- 🔍 BUSCADOR -->
<center>
<form method="GET" action="index.php">
    <input type="text" name="buscar" placeholder="Buscar producto..." 
           value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : '' ?>" 
           style="padding:7px; width:250px;">
    <button type="submit" style="padding:7px;">Buscar</button>

    <!-- ✔ BOTÓN PARA MOSTRAR TODO -->
    <?php if (!empty($_GET['buscar']) || !empty($_GET['categoria'])): ?>
        <a href="index.php" 
           style="
               padding:7px; 
               background:#444; 
               color:white; 
               text-decoration:none;
               margin-left:10px;">
           Mostrar todos
        </a>
    <?php endif; ?>
</form>
</center>

<br>

<section class="productos">
    <?php
    include("db.php");

    // 📌 FILTRO DE CATEGORÍAS
    if (isset($_GET['categoria']) && $_GET['categoria'] !== "") {
        $categoria = $_GET['categoria'];
        $sql = "SELECT * FROM productos WHERE categoria = '$categoria'";

    // 📌 BÚSQUEDA
    } elseif (isset($_GET['buscar']) && $_GET['buscar'] !== "") {
        $busqueda = $_GET['buscar'];
        $sql = "SELECT * FROM productos 
                WHERE nombre LIKE '%$busqueda%'
                OR descripcion LIKE '%$busqueda%'
                OR id LIKE '%$busqueda%'";

    } else {
        //  MOSTRAR TODO
        $sql = "SELECT * FROM productos";
    }

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {

        while ($row = $resultado->fetch_assoc()) {

            echo "
            <div class='producto'>
                <img src='imagenes/{$row['imagen']}' alt='producto'>
                <h3>{$row['nombre']}</h3>
                <p>{$row['descripcion']}</p>
                <span class='precio'>$ {$row['precio']}</span>
                <a href='agregar.php?id={$row['id']}' class='btn'>Agregar al carrito</a>
            </div>
            ";
        }

    } else {
        echo "<center><h2>No se encontraron productos</h2></center>";
    }
    ?>
</section>

</body>
</html>
