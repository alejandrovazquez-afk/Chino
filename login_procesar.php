<?php
session_start();
include("db.php");

$usuario = $_POST['usuario'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

    $datos = $resultado->fetch_assoc();

    // Guardamos datos en $_SESSION
    $_SESSION['usuario'] = $datos['usuario'];
    $_SESSION['rol']     = $datos['rol'];

    // ✔ Si es empleado → panel administrativo
    if ($datos['rol'] === "empleado") {
        header("Location: admin.php");
        exit();
    }

    // ✔ Si es cliente → página de tienda
    if ($datos['rol'] === "cliente") {
        header("Location: index.php");
        exit();
    }

} else {
    echo "<script>
        alert('Usuario o contraseña incorrectos');
        window.location='login_procesar.php';
    </script>";
}
?>
