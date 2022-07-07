<?php
include("db.php");

if (isset($_POST['register'])){
    if ($_POST['pass'] === $_POST['passcheck']){            
        if (strlen($_POST['nombres']) >= 1 && strlen($_POST['apellidos']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['celular1']) >= 1 && strlen($_POST['pass']) >= 1 && strlen($_POST['passcheck']) >= 1){
        $nombres=trim($_POST['nombres']);
        $apellidos=trim($_POST['apellidos']);
        $email=trim($_POST['email']);
        $celular1=trim($_POST['celular1']);
        $celular2=trim($_POST['celular2']);
        $telefono1=trim($_POST['telefono1']);
        $telefono2=trim($_POST['telefono2']);
        $fechaNac=date($_POST['fechaNac']);
        $pass=$_POST['pass'];
        $barrio=trim($_POST['barrio']);
        $dir=trim($_POST['dir']);
        $muni=$_POST['muni'];

        $reqid=$conexion->query("SELECT `idCliente` FROM `cliente` ORDER BY idCliente DESC LIMIT 1;");
        $ultimoid=$reqid->fetch_column();
        $resultadoid=intval($ultimoid);
        $idfinal=($resultadoid + 1);

        $insert1="INSERT INTO `celular`(`idCelular`, `Celular1`, `Celular2`) VALUES ('NULL','$celular1','$celular2')";
        $resultado1=mysqli_query($conexion,$insert1);

        $insert2="INSERT INTO `telefono`(`idTelefono`, `Telefono1`, `Telefono2`) VALUES ('NULL','$telefono1','$telefono2')";
        $resultado2=mysqli_query($conexion,$insert2);

        $insert3="INSERT INTO `cliente`(`idCliente`, `Municipio_idMunicipio`, `Telefono_idTelefono`, `Celular_idCelular`, `Correo`, `Direccion`, `Nombres`, `Apellidos`, `Fecha_Nacimiento`, `Barrio`, `Contraseña`)
         VALUES ('NULL','$muni','$idfinal','$idfinal','$email','$dir','$nombres','$apellidos','$fechaNac','$barrio','$pass')";
        $resultado3=mysqli_query($conexion,$insert3);
        }
    }else{
        echo "<small style='color: red;'>Las contraseñas no coinciden</small>";
    }
}



?>