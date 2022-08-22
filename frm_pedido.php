<?php
session_start();
include("db.php");
@$productid=$_GET["id"];
@$img=$_GET["img"];
$consulta = $conexion->query("SELECT * FROM `detallesproducto` WHERE `idDetallesProducto` ='$productid'");
$col = $consulta->fetch_assoc();

$infoconsulta = $conexion->query("SELECT `Nombres`,`Apellidos`,celular.Celular1, celular.Celular2, telefono.Telefono1, telefono.Telefono2, `Direccion`,`Barrio`, municipio.Municipio, departamento.Departamento FROM `cliente` INNER JOIN celular on cliente.idCliente=celular.idCelular INNER JOIN telefono on cliente.idCliente=telefono.idTelefono INNER JOIN municipio on municipio.idMunicipio=cliente.Municipio_idMunicipio INNER JOIN departamento on departamento.idDepartamento=municipio.Departamento_idDepartamento WHERE cliente.idCliente=3");
$infocliente = $infoconsulta->fetch_assoc();

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
                <div class="col-xxl-12">
                    <h1 style="text-align: center;"><span>Configurar Pedido</span></h1>
                </div>
                <div class="col-xxl-12">
                    <div class="col-xxl-12 bodyPedido">
                        <div class="row containerPedido">
                            <div class="col-xxl-2 col-sm-4">
                                <div>
                                    <?php echo "<h1 style='text-align: left;'><span>$col[Nombre_Producto]</span></h1>"?>
                                </div>
                                <div>
                                    <?php echo "<img src='img$img.jpg' width='70%'>"?>
                                </div>
                            </div>
                            <div class="col-xxl-10">
                                <div>
                                    <form>
                                        <div class="mb-3 mt-3 row">
                                            <div class="col">
                                            <input type="text" class="form-control boxPedido" id="nombre" required placeholder="Nombres" name="nombre">
                                            </div>
                                            <div class="col">
                                            <input type="text" class="form-control" id="apellido" required placeholder="Apellidos" name="apellido">
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 row">
                                            <div class="col">
                                            <input type="text" class="form-control boxPedido" id="depa" required placeholder="Departamento" name="depa">
                                            </div>
                                            <div class="col">
                                            <input type="text" class="form-control" id="ciudad" required placeholder="Ciudad/Municipio" name="ciudad">
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 row">
                                            <div class="col">
                                            <input type="text" class="form-control boxPedido" id="barrio" required placeholder="Barrio" name="barrio">
                                            </div>
                                            <div class="col">
                                            <input type="text" class="form-control " id="dir" required placeholder="Dirección" name="dir">
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 row">
                                            <div class="col">
                                            <input type="tel" class="form-control boxPedido" id="tel1" placeholder="Telefono" name="tel1">
                                            </div>
                                            <div class="col">
                                            <input type="tel" class="form-control" id="tel2" placeholder="Telefono 2" name="tel2">
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 row">
                                            <div class="col">
                                            <input type="tel" class="form-control boxPedido" id="cel1" required placeholder="Celular" name="cel1">
                                            </div>
                                            <div class="col">
                                            <input type="tel" class="form-control" id="cel2" placeholder="Celular 2" name="cel2">
                                            </div>
                                        </div>
                                        <!--<div class="mb-3 mt-3">
                                            <label for="comment">Comentario para personalización del producto</label>
                                            <textarea class="form-control" rows="5" id="comment" name="personalizacion"></textarea>
                                        </div>-->
                                    </form>
                                    <div class="row">
                                        <div>
                                            <button type="button" class="btn btn-primary btnLeft">Enviar Pedido</button>
                                        </div>
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