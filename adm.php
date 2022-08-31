<?php
error_reporting(E_ERROR | E_PARSE);
if ($_SESSION["email"] != "cproberto026@gmail.com") {
    echo "<script>alert('ACCESO RESTRINGIDO'); window.location.href='principal.php';</script>";
}
?>