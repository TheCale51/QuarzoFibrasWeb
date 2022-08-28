<?php
session_start();
include("db.php");
$codigo=$_REQUEST['delcodigo'];

if (isset($_POST['delpedido'])){
    $del=$conexion->prepare("DELETE FROM pedido WHERE `pedido`.`Codigo` =?");
    $del->bind_param("i", $codigo);
    $del->execute();
    header('location: carrito.php');
}


?>