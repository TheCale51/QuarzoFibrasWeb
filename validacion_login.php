<?php
$email=$_POST['email'];
$contraseña=$_POST['pass'];
session_start();
$_SESSION['email']=$email;

include("db.php");

$consulta="SELECT * FROM cliente WHERE Correo='$email' and Contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
if ($filas){
    header("location:principal.php");
}else{
    include("frm_login.php");
    
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>