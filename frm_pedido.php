<?php
include("db.php");
include("validacion_pedido.php");
@$productid=$_GET["id"];
$consulta = $conexion->query("SELECT * FROM `detallesproducto` WHERE `idDetallesProducto` ='$productid'");
$col = $consulta->fetch_assoc();

$infoconsulta = $conexion->query("SELECT `Nombres`,`Apellidos`,celular.Celular1, celular.Celular2, telefono.Telefono1, telefono.Telefono2, `Direccion`,`Barrio`, municipio.Municipio, departamento.Departamento FROM `cliente` INNER JOIN celular on cliente.idCliente=celular.idCelular INNER JOIN telefono on cliente.idCliente=telefono.idTelefono INNER JOIN municipio on municipio.idMunicipio=cliente.Municipio_idMunicipio INNER JOIN departamento on departamento.idDepartamento=municipio.Departamento_idDepartamento WHERE cliente.idCliente=$_SESSION[idcliente]");
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

        <script language=javascript>
            function numToWhiteSpace(e){
                e.value = e.value.replace(/[^abcdefghijklmnopqrstuvwxyzñ ]/gi, "")
            }
        </script>
        <script language=javascript>
            function keyToWhiteSpace(e){
                e.value = e.value.replace(/[^0-9]/g, "")
            }
        </script>

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
                if($_SESSION["email"] == 'cproberto026@gmail.com'){
                    echo "<a href='carrito_adm.php'><img src='img/Shopping-cart.png' width='64px' height='56px'></a>";
                }else{
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
                    <h1 style="text-align: center;"><span>Datos del Pedido</span></h1>
                </div>
                <div class="col-xxl-12">
                    <div class="col-xxl-12 bodyPedido">
                        <div class="row containerPedido">
                            <div class="col-xxl-2 col-sm-4">
                                <div>
                                    <?php echo "<h1 style='text-align: left;'><span>$col[Nombre_Producto]</span></h1>"?>
                                </div>
                                <div>
                                    <?php echo "<img src='$col[Img]' width='70%'>"?>
                                </div>
                            </div>
                            <div class="col-xxl-10">
                                <div>
                                    <form method="post">
                                        <div class="mb-3 mt-3 row">
                                            <div class="col">
                                            <?php echo "<input type='text' class='form-control boxPedido' disabled required placeholder='Nombres' value='$infocliente[Nombres]' name='nombre' onkeydown='numToWhiteSpace(this);' onkeyup='numToWhiteSpace(this);'>"?>
                                            </div>
                                            <div class="col">
                                            <?php echo "<input type='text' class='form-control' disabled required placeholder='Apellidos' value='$infocliente[Apellidos]' name='apellido' onkeydown='numToWhiteSpace(this);' onkeyup='numToWhiteSpace(this);'>"?>
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 row">
                                            <div class="col">
                                            <?php echo "<input type='text' class='form-control boxPedido' disabled required placeholder='Departamento' value='$infocliente[Departamento]' name='depa'>"?>
                                            </div>
                                            <div class="col">
                                            <?php echo "<input type='text' class='form-control' disabled required placeholder='Ciudad/Municipio' value='$infocliente[Municipio]'name='ciudad'>"?>
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 row">
                                            <div class="col">
                                            <?php echo "<input type='text' class='form-control boxPedido' disabled required placeholder='Barrio' value='$infocliente[Barrio]' name='barrio'>"?>
                                            </div>
                                            <div class="col">
                                            <?php echo "<input type='text' class='form-control' disabled required placeholder='Dirección' value='$infocliente[Direccion]'name='dir'>"?>
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 row">
                                            <div class="col">
                                            <?php echo "<input type='tel' class='form-control boxPedido' disabled required placeholder='Celular' value='$infocliente[Celular1]' name='cel1' maxlength='10' onkeydown='keyToWhiteSpace(this);'' onkeyup='keyToWhiteSpace(this);'>"?>
                                            </div>
                                            <div class="col">
                                            <?php echo "<input type='tel' class='form-control' disabled placeholder='Celular 2' value='$infocliente[Celular2]' name='cel2' maxlength='10' onkeydown='keyToWhiteSpace(this);' onkeyup='keyToWhiteSpace(this);''>"?>
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 row">
                                            <div class="col">
                                            <?php echo "<input type='tel' class='form-control boxPedido' disabled placeholder='Telefono' value='$infocliente[Telefono1]' name='tel1' onkeydown='keyToWhiteSpace(this);' onkeyup='keyToWhiteSpace(this);'>"?>
                                            </div>
                                            <div class="col">
                                            <?php echo "<input type='tel' class='form-control' disabled placeholder='Telefono 2' value='$infocliente[Telefono2]' name='tel2' onkeydown='keyToWhiteSpace(this);' onkeyup='keyToWhiteSpace(this);'>"?>
                                            </div>
                                        </div>
                                        <!--<div class="mb-3 mt-3">
                                            <label for="comment">Comentario para personalización del producto</label>
                                            <textarea class="form-control" rows="5" id="comment" name="personalizacion"></textarea>
                                        </div>-->
                                        <div class="row">
                                            <div>
                                                <button type="submit" name="pedidoTrigger" class="btn-sm btn-primary btnLeft">Enviar Pedido</button>
                                            </div>
                                        </div>
                                    </form>
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