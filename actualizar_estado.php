<?php
session_start();
include("db.php");

$est = $_GET['est'];
$id = $_GET['id'];

if ($est == 1) {
    $est = "En Espera";
} elseif ($est == 2) {
    $est = "Enviado";
} elseif ($est == 3) {
    $est = "Entregado";
}


$stmt = $conexion->prepare("UPDATE `pedido` SET `Estado` = ? WHERE `idPedido` = ?;");
$stmt->bind_param("si", $est, $id);
$stmt->execute();
header("location:carrito_adm.php");
?>