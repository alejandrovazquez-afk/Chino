

<?php
session_start();
include("db.php");

$id = $_GET['id'];

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (!isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id] = 1;
} else {
    $_SESSION['carrito'][$id]++;
}

header("Location: carrito.php");
