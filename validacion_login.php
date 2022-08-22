<?php
session_start();
$email=$_POST['email'];
$contraseña=$_POST['pass'];

include("db.php");

$resultado=$conexion->query("SELECT * FROM cliente WHERE Correo='$email' and Contraseña='$contraseña'");
$pid=$resultado->fetch_assoc();

$filas=mysqli_num_rows($resultado);
if ($filas){
    header("location:principal.php");
    $_SESSION["email"]=$email;
    $_SESSION["idcliente"]=$pid['idCliente'];
}else{
    echo "<script>alert('Usuario o contraseña invalido!'); window.location.href='frm_login.php'; </script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>