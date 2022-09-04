<?php
include("db.php");
session_start();

if (isset($_POST['actDatos'])) {
    if (strlen($_POST['nombres']) >= 1 && strlen($_POST['apellidos']) >= 1 && strlen($_POST['celular1']) >= 1) {

        $nombres = trim($_POST['nombres']);
        $apellidos = trim($_POST['apellidos']);
        $celular1 = trim($_POST['celular1']);
        $celular2 = trim($_POST['celular2']);
        $telefono1 = trim($_POST['telefono1']);
        $telefono2 = trim($_POST['telefono2']);
        $barrio = trim($_POST['barrio']);
        $dir = trim($_POST['dir']);
        $muni = $_POST['muni'];

        $insert1 = "UPDATE `celular` SET `Celular1` = '$celular1', `Celular2` = '$celular2' WHERE `celular`.`idCelular` = $_SESSION[idcliente];";
        $resultado1 = mysqli_query($conexion, $insert1);

        $insert2 = "UPDATE `telefono` SET `Telefono1` = '$telefono1', `Telefono2` = '$telefono2' WHERE `telefono`.`idTelefono` = $_SESSION[idcliente];";
        $resultado2 = mysqli_query($conexion, $insert2);

        $insert3 = "UPDATE `cliente` SET `Municipio_idMunicipio` = $muni, `Direccion` = '$dir', `Nombres` = '$nombres', `Apellidos` = '$apellidos', `Barrio` = '$barrio' WHERE `cliente`.`idCliente` = $_SESSION[idcliente];";
        $resultado3 = mysqli_query($conexion, $insert3);

        header("location:config_acc.php");
    } else {
    }
}