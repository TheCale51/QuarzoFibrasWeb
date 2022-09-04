<?php
include("db.php");
session_start();

if (isset($_POST['actPass'])) {
    if ($_POST['pass'] === $_POST['passcheck']) {
        if (strlen($_POST['pass']) >= 6 && strlen($_POST['passcheck']) >= 6) {
            $pass = $_POST['pass'];

            $insert1 = "UPDATE `cliente` SET `Contraseña` = '$pass' WHERE `idCliente` = $_SESSION[idcliente];";
            $resultado1 = mysqli_query($conexion, $insert1);

            header("location:frm_login.php");
        }
    } else {
        echo "<script>alert('Las contraseñas no coinciden!'); window.location.href='config_acc.php';</script>";
    }
}
