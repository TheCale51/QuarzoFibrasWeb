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
                    <a class="noDecoration" href="frm_login.php"><p class="h5">Iniciar Sesión</p></a>
                </div>
                <div class="col-xxl-2 col-sm-2 signup">
                    <a class="noDecoration" href="frm_signup.php"><p class="h5">Registrarse</p></a>
                </div>
            </div>
                    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
                        <div  class="container-fluid">
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

            <div id="bodyPrincipal" class="row">
                <div class="col-xxl-12 col-sm-12">
                    <div>
                        <h1 style="text-align: center;"><span>Carrito de Compras</span></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-12 bodyContainerCart">
                        <div class="col-xxl-12 containerCart">
                            <div class="row itemCart">
                                <div class="col-xxl-3 col-lg-4 col-sm-4 itemHead">
                                    <div>
                                        <h2 style="text-align: left;"><span>Título del Producto</span></h2>
                                        <img src="img/Alcobas-1.jpg" width="50%">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-lg-3 col-sm-3 itemBtn">
                                    <div>
                                        <button type="button" class="btn btn-primary">Confirmar Pedido</button>
                                        <button type="button" style="margin-top: 5px;" class="btn btn-primary">Ver Factura</button>
                                        <h5 style="text-align: left;"><span>Estado: <span>En Espera</span></span></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row itemCart">
                                <div class="col-xxl-3 col-lg-4 col-sm-4 itemHead">
                                    <div>
                                        <h2 style="text-align: left;"><span>Título del Producto</span></h2>
                                        <img src="img/Alcobas-2.jpg" width="50%">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-lg-3 col-sm-3 itemBtn">
                                    <div>
                                        <button type="button" class="btn btn-primary">Confirmar Pedido</button>
                                        <button type="button" style="margin-top: 5px;" class="btn btn-primary">Ver Factura</button>
                                        <h5 style="text-align: left;"><span>Estado: <span>En Espera</span></span></h5>
                                    </div>
                                </div>
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