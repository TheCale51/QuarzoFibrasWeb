<?php
session_start();
include("db.php");

$productid=$_REQUEST['id'];
$clientid=$_SESSION['idcliente'];

$reqid=$conexion->query("SELECT `idPedido` FROM `pedido` ORDER BY idPedido DESC LIMIT 1;");
$ultimoid=$reqid->fetch_column();
$resultadoid=intval($ultimoid);
$idfinal=($resultadoid + 1);

$fecha = date('Y-m-d');
$fechaF = date('Ymd').$idfinal;

if (isset($_POST['pedidoTrigger'])){
    $insert=("INSERT INTO `pedido` (`idPedido`, `Producto_idProducto`, `Cliente_idCliente`, `Codigo`, `Estado`, `Fecha`) 
     VALUES ('NULL', '$productid', '$clientid', '$fechaF', 'En Espera', '$fecha');");

    $resultado=mysqli_query($conexion, $insert);

    header("location:carrito.php");
}
?>