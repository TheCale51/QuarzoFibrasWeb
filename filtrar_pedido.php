<?php
include("db.php");

$estado = $_POST['estado'];
$cod = $_POST['cod'];

if (isset($_POST['filtrar'])){
    if (strlen($estado) != 0){
        header("location: carrito_adm.php?est=$estado");
    }elseif (strlen($cod) >= 9){
        header("location: carrito_adm.php?cod=$cod");
    }else{
        header("location: carrito_adm.php?all=1");
    }
}
?>