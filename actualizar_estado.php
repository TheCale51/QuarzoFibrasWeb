<?php
session_start();
include("db.php");

$id = $_POST['idPedido'];
$est = $_POST['pEstado'];

$stmt = $conexion->prepare("UPDATE `pedido` SET `Estado` = ? WHERE `idPedido` = ?;");


if (isset($_POST['submitEst']) && strlen($est) >= 1){
    $stmt->bind_param("si", $est, $id);
    $stmt->execute();
    header("location:carrito_adm.php");
}else{
    header("location:carrito_adm.php");
}



?>