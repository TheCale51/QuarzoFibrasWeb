<?php
session_start();
?>
<html lang="es">
    <head>
        <title>QuarzoFibras</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="estilos.css" />
        <script src="lib/jquery-3.6.0.js" ></script>
        <link rel="stylesheet" href="lib/bootstrap-5/css/bootstrap.css" />
        <script src="lib/bootstrap-5/js/bootstrap.js" ></script>
    </head>
        
        <body>
            <div class="row navPrincipal">
                <div class="col-xxl-6 col-sm-6 logo">
                    <img class="imgLogo" src="img/logo.gif">
                </div>
                <div class="col-xxl-2 col-sm-2 cart">
                    <a href="carrito.php"><img src="img/Shopping-cart.png" width="64px" height="56px"></a>
                </div>
                <div class="col-xxl-2 col-sm-2 login">
                    <?php $string1 = "<a class='noDecoration' href='frm_login.php'><p class='h5'>Iniciar Sesión</p></a>";
                    error_reporting(E_ERROR | E_PARSE);
                    if (($_SESSION["email"]) != null)
                        echo "<a href='#'><img style='width: 64px;height: 64px;border-radius: 45%;' src='img/default_profile.png'></a>";
                    else
                    echo "$string1"
                    ?>
                </div>
                <div class="col-xxl-2 col-sm-2 signup">
                    <?php $string2 = "<a class='noDecoration' href='frm_signup.php'><p class='h5'>Registrarse</p></a>";
                    error_reporting(E_ERROR | E_PARSE);
                    if (($_SESSION["email"]) != null)
                        echo "<a href='config_acc.php'><img style='width: 64px;height: 64px;' src='img/settings_icon.png'></a>";
                    else
                    echo "$string2"
                    ?>
                </div>
            </div>
            
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
                <div  class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item navHome">
                            <a class="nav-link" href="principal.php">Inicio</a>
                        </li>
                        <li class="nav-item dropdown navCat">
                        <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#">Catálogo de Productos</a>
                        <ul class="dropdown-menu bg-dark">
                            <li><a class="dropdown-item text-white" href="cat_alcobas.php">Alcobas</a></li>
                            <li><a class="dropdown-item text-white" href="cat_baños.php">Baños</a></li>
                            <li><a class="dropdown-item text-white" href="cat_barras.php">Barras</a></li>
                            <li><a class="dropdown-item text-white" href="cat_closets.php">Closets</a></li>
                            <li><a class="dropdown-item text-white" href="cat_jacuzzis.php">Jacuzzis</a></li>
                            <li><a class="dropdown-item text-white" href="cat_tinas.php">Tinas</a></li>
                            <li><a class="dropdown-item text-white" href="cat_piscinas.php">Piscinas</a></li>
                            <li><a class="dropdown-item text-white" href="cat_stands.php">Stands</a></li>
                            <li><a class="dropdown-item text-white" href="cat_barras.php">Barras</a></li>
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
            <div class="row">
                <div class="col-sm-12">
                    <p class="CatTitulo">Stands</p>
                </div>
                <div class="col-sm-6 imgcat">
                    <img src="img/Stands-1.jpg">
                    <img src="img/Stands-2.jpg">
                    <img src="img/Stands-3.jpg">
                </div>
                <div class="col-sm-6 imgcat">
                    <img src="img/Stands-4.jpg">
                    <img src="img/Stands-5.jpg">
                    <img src="img/Stands-6.jpg">
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