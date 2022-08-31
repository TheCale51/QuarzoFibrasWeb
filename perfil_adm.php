<?php
session_start();
include("db.php");
include("adm.php");
$id = $_GET['id'];
$infoconsulta = $conexion->query("SELECT `Nombres`,`Apellidos`,celular.Celular1, celular.Celular2, telefono.Telefono1, telefono.Telefono2, `Direccion`,`Barrio`, municipio.Municipio, departamento.Departamento FROM `cliente` INNER JOIN celular on cliente.idCliente=celular.idCelular INNER JOIN telefono on cliente.idCliente=telefono.idTelefono INNER JOIN municipio on municipio.idMunicipio=cliente.Municipio_idMunicipio INNER JOIN departamento on departamento.idDepartamento=municipio.Departamento_idDepartamento WHERE cliente.idCliente=$id");
$infocliente = $infoconsulta->fetch_assoc();
?>

<html lang="es">

<head>
    <title>QuarzoFibras</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="estilos.css" />
    <script src="lib/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="lib/bootstrap-5/css/bootstrap.css" />
    <script src="lib/bootstrap-5/js/bootstrap.js"></script>
</head>

<body>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    if ($_SESSION['email'] == !null)
        echo "<div class='row navPrincipal'>";
    else
        echo "<div class='row navPrincipalNoLogged'>";
    ?>
    <div class="col-xxl-6 col-sm-6 logo">
        <img class="imgLogo" src="img/logo.gif">
    </div>
    <div class="col-xxl-2 col-sm-2 cart">
        <?php
        if ($_SESSION["email"] == 'cproberto026@gmail.com') {
            echo "<a href='carrito_adm.php'><img src='img/Shopping-cart.png' width='64px' height='56px'></a>";
        } else {
            echo "<a href='carrito.php'><img src='img/Shopping-cart.png' width='64px' height='56px'></a>";
        }
        ?>
    </div>
    <div class="col-xxl-2 col-sm-2 login">
        <?php
        if ($_SESSION["email"] != null)
            echo "<a href='#'><img style='width: 64px;height: 64px;border-radius: 45%;' src='img/default_profile.png'></a>";
        else
            echo "<a class='noDecoration' href='frm_login.php'><p class='h5'>Iniciar Sesión</p></a>"
        ?>
    </div>
    <div class="col-xxl-2 col-sm-2 signup">
        <?php
        if ($_SESSION["email"] != null)
            echo "<nav style='padding-top: 0% !important;' class='navbar navbar-expand-sm RedColor navbar-dark'>
                        <div  class='container-fluid'>
                            <ul class='navbar-nav'>
                                <li class='nav-item dropdown navCat'>
                                <a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='config_acc.php'><img style='width: 64px;height: 64px;' src='img/settings_icon.png'></a>
                                    <ul class='dropdown-menu bg-dark'>
                                        <li><a class='dropdown-item text-white' href='config_acc.php'>Configuración</a></li>
                                        <li><a class='dropdown-item text-white' href='logout.php'>Cerrar Sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>";
        else
            echo "<a class='noDecoration' href='frm_signup.php'><p class='h5'>Registrarse</p></a>";
        ?>
    </div>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item navHome">
                    <a class="nav-link" href="principal.php">Inicio</a>
                </li>
                <li class="nav-item dropdown navCat">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Catálogo de Productos</a>
                    <ul class="dropdown-menu bg-dark">
                        <li><a class="dropdown-item text-white" href="cat_alcobas.php">Alcobas</a></li>
                        <li><a class="dropdown-item text-white" href="cat_baños.php">Baños</a></li>
                        <li><a class="dropdown-item text-white" href="cat_barras.php">Barras</a></li>
                        <li><a class="dropdown-item text-white" href="cat_closets.php">Closets</a></li>
                        <li><a class="dropdown-item text-white" href="cat_jacuzzis.php">Jacuzzis</a></li>
                        <li><a class="dropdown-item text-white" href="cat_tinas.php">Tinas</a></li>
                        <li><a class="dropdown-item text-white" href="cat_piscinas.php">Piscinas</a></li>
                        <li><a class="dropdown-item text-white" href="cat_stands.php">Stands</a></li>
                        <li><a class="dropdown-item text-white" href="cat_cocinas.php">Cocinas</a></li>
                        <li><a class="dropdown-item text-white" href="cat_lavaderos.php">Lavaderos</a></li>
                        <li><a class="dropdown-item text-white" href="cat_lavamanos.php">Lavamanos</a></li>
                    </ul>
                </li>
                <li class="nav-item navAbout">
                    <a class="nav-link" href="about.php">Sobre nosotros</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="bodyPrincipal" class="row">
        <div class="col-xxl-12 col-sm-12">
            <p class="CatTitulo">Datos del Cliente</p>
        </div>
        <div class="col-xxl-12 col-sm-12 bodyContainerClient">
            <div class="col-xxl-12 col-sm-12 bodyFormClient">
                <table>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Celulares</th>
                        <th>Telefonos</th>
                        <th>Departamento</th>
                        <th>Ciudad</th>
                        <th>Direccion</th>
                    </tr>
                    <tr>
                        <td><?php echo "$infocliente[Nombres]" ?></td>
                        <td><?php echo "$infocliente[Apellidos]" ?></td>
                        <td><?php echo nl2br("$infocliente[Celular1]\n$infocliente[Celular2]") ?></td>
                        <td><?php echo nl2br("$infocliente[Telefono1]\n$infocliente[Telefono2]") ?></td>
                        <td><?php echo "$infocliente[Departamento]" ?></td>
                        <td><?php echo "$infocliente[Municipio]" ?></td>
                        <td><?php echo "$infocliente[Direccion] - $infocliente[Barrio]" ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

<footer>
    <div class="row footer">
        <div class="col-xxl-4 col-sm-4">
            <p style="font-size: 30px;">QuarzoFibras</p>
            <p>Elegancia, sencillez y tecnología</p>
        </div>
        <div class="col-xxl-4 col-sm-4">
            <p class="footerTitulo">UBICACIÓN</p>
            <p>CALLE 8 No 27-31</p>
            <p>Barrio las brisas Neiva – Huila</p>
        </div>
        <div class="col-xxl-4 col-sm-4">
            <p class="footerTitulo">CONTACTO</p>
            <p class="text-secondary">quarzofibras@hotmail.com</p>
            <p>318 8213633 – 3167545245</p>
        </div>
    </div>
</footer>

</html>