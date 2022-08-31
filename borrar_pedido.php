<?php
session_start();
include("db.php");
$codigo=$_REQUEST['delcodigo'];

if (isset($_POST['delpedido']) && $_SESSION["email"] == "cproberto026@gmail.com"){
    $del=$conexion->prepare("DELETE FROM pedido WHERE `pedido`.`Codigo` =?");
    $del->bind_param("i", $codigo);
    $del->execute();
    header('location: carrito_adm.php');
}else{
    $del=$conexion->prepare("DELETE FROM pedido WHERE `pedido`.`Codigo` =?");
    $del->bind_param("i", $codigo);
    $del->execute();
    header('location: carrito.php');
}


?>