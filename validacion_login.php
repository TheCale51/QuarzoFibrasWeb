<?php
$email=$_POST['email'];
$contraseña=$_POST['pass'];

include("db.php");

$consulta="SELECT * FROM cliente WHERE Correo='$email' and Contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);
if ($filas){
    header("location:principal.php");
    session_start();
    $_SESSION['email']=$email;
}else{
    echo "<script>alert('Usuario o contraseña invalido!'); window.location.href='frm_login.php'; </script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>