<?php
session_start();
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
                        <li><a class="dropdown-item text-white" href="catalogo.php?cat=1">Alcobas</a></li>
                        <li><a class="dropdown-item text-white" href="catalogo.php?cat=2">Baños</a></li>
                        <li><a class="dropdown-item text-white" href="catalogo.php?cat=3">Barras</a></li>
                        <li><a class="dropdown-item text-white" href="catalogo.php?cat=4">Closets</a></li>
                        <li><a class="dropdown-item text-white" href="catalogo.php?cat=5">Jacuzzis</a></li>
                        <li><a class="dropdown-item text-white" href="catalogo.php?cat=6">Tinas</a></li>
                        <li><a class="dropdown-item text-white" href="catalogo.php?cat=7">Piscinas</a></li>
                        <li><a class="dropdown-item text-white" href="catalogo.php?cat=8">Stands</a></li>
                        <li><a class="dropdown-item text-white" href="catalogo.php?cat=9">Cocinas</a></li>
                        <li><a class="dropdown-item text-white" href="catalogo.php?cat=10">Lavaderos</a></li>
                        <li><a class="dropdown-item text-white" href="catalogo.php?cat=11">Lavamanos</a></li>
                    </ul>
                </li>
                <li class="nav-item navAbout">
                    <a class="nav-link active" href="about.php">Sobre nosotros</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="bodyPrincipal" class="row">
        <div class="col-xxl-12 col-xl-12 col-sm-12 bodyContainerAbout">
            <div class="col-xxl-12 bodyAbout">
                <div class="col-xxl-12 fontAbout">
                    <h1 style="text-align: center;"><span>QuarzoFibras</span></h1>
                    <p style="text-align: center;"><span>Garantizar la prestación de los servicios de elaboración y comercialización de productos fabricados en fibra de vidrio, madera<br>
                            y poli cuarzo de forma eficiente y con calidad a la totalidad de la población.</span></p>
                    <p style="text-align: center;margin-bottom: 0;"><span style="line-height: 1em;">&nbsp;</span></p>
                    <p style="text-align: center;"><span>Garantizar una estructura financiera sana y sostenible.</span></p>
                </div>
                <div class="row">
                    <div class="col-xxl-4 col-xl-4 col-sm-12 aboutContainerBox">
                        <div class="box-heading ">
                            <h5 style="color: #000;">MISIÓN</h5>
                        </div>
                        <div class="fontAbout">
                            <p><span>Somos una empresa líder en la construcción de productos en fibra de vidrio en el sur colombiano, con la mejor calidad en los servicios de venta y mantenimiento de tinas, jacuzzi, piscinas, closets, cocinas integrales. Desarrollando servicios innovadores relacionados con el giro del negocio, fomentando prestigio y confiabilidad para satisfacción de nuestros clientes. </span></p>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-sm-12 aboutContainerBox">
                        <div class="box-heading">
                            <h5 style="color: #000;">VISIÓN</h5>
                        </div>
                        <div class="fontAbout">
                            <p><span>Ser una empresa líder en la elaboración y comercialización de productos fabricados en fibra de vidrio y poli cuarzo que satisfaga las necesidades que requiere nuestros clientes y el mercado, ofreciendo equipos actualizados de la más alta calidad, con técnicos especializados y competitivo que permitan prestar un excelente servicio a la comunidad. </span></p>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-sm-12 aboutContainerBox">
                        <div class="box-heading">
                            <h5 style="color: #000;">VALORES</h5>
                        </div>
                        <div class="fontAbout">
                            <p><span>PULCRITUD INTEGRIDAD CALIDAD SERVICIO DIALOGO RESPETO TRANSPARENCIA LEALTAD TRABAJO EN EQUIPO LIDERAZGO PERSEVERANCIA COMUNICACION </span></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xx-12 col-sm-12 aboutContainerBox">
                        <div class="box-heading">
                            <h5 style="color: #000;">OBJETIVOS</h5>
                        </div>
                        <div class="fontAbout">
                            <p><span>Garantizar la prestación de los servicios de elaboración y comercialización de productos fabricados en fibra de vidrio, madera y poli cuarzo de forma eficiente y con calidad a la totalidad de la población. Garantizar una estructura financiera sana y sostenible. Implementar un sistema de comunicación (Radio, Prensa, Audiovisuales y Redes Sociales) que permitan acercar y mantener informada a la comunidad sobre datos básicos, la dinámica de la administración y el catálogo de productos y servicios ofrecidos por la empresa. Articular acciones que propicie el mejor desempeño de la administración de QUARZOFIBRAS en cumplimiento de los objetivos de desarrollo. Proporcionar los implementos básicos para permitir el acceso a TIC. Definir e implementar la estructura administrativa apropiada para QUARZOFIBRAS. Desarrollar programa de fortalecimiento de capacidades para la gestión de QUARZOFIBRAS. Garantizar el buen servicio y calidad a todos nuestros clientes. Renovar y/o mantener la maquinaria, equipos y herramientas de la empresa. .</span></p>
                        </div>
                    </div>
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