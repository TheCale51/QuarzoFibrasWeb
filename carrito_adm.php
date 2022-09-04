<?php
session_start();
include("db.php");
include("adm.php");
error_reporting(E_ERROR | E_PARSE);
$estado = $_GET['est'];

if ($estado == 1) {
    $estado = "En Espera";
} elseif ($estado == 2) {
    $estado = "Enviado";
} elseif ($estado == 3) {
    $estado = "Entregado";
} else {
    $estado = "";
}
$cod = $_GET['cod'];

if (strlen($estado) > 0) {
    $consulta = $conexion->query("SELECT * FROM `pedido` INNER JOIN producto on producto.idProducto=pedido.Producto_idProducto INNER JOIN detallesproducto on detallesproducto.idDetallesProducto=pedido.Producto_idProducto WHERE pedido.Estado = '$estado';");
} elseif (strlen($cod) >= 9) {
    $consulta = $conexion->query("SELECT * FROM `pedido` INNER JOIN producto on producto.idProducto=pedido.Producto_idProducto INNER JOIN detallesproducto on detallesproducto.idDetallesProducto=pedido.Producto_idProducto WHERE pedido.Codigo = '$cod';");
} else {
    $consulta = $conexion->query("SELECT * FROM `pedido` INNER JOIN producto on producto.idProducto=pedido.Producto_idProducto INNER JOIN detallesproducto on detallesproducto.idDetallesProducto=pedido.Producto_idProducto;");
}

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
                    <form method="post" action="filtrar_pedido.php">
                        <select name="estado">
                            <option value="">Seleccionar Estado</option>
                            <option value="1">En Espera</option>
                            <option value="2">Enviado</option>
                            <option value="3">Entregado</option>
                        </select>
                        <input type="tel" name="cod" minlength="9" maxlength="13" placeholder="Codigo" />
                        <button type="submit" name="filtrar" class="btn-sm btn-primary">Filtrar</button>
                    </form>
                    <?php
                    while ($col = $consulta->fetch_assoc()) {
                        echo "<div class='row itemCart'>
                                    <div class='col-xxl-3 col-lg-4 col-sm-4 itemHead'>
                                        <div>
                                            <h2 style='text-align: left;'><span>$col[Nombre_Producto]</span></h2>
                                            <a href='perfil_adm.php?id=$col[Cliente_idCliente]'><button type='button' style='margin-top: 5px;' class='btn-sm btn-primary'>Perfil Cliente</button></a>
                                            <button form='formEst$col[idPedido]' type='submit' name='submitEst' class='btn-sm btn-primary'>Actualizar Estado</button>
                                            <input form='formEst$col[idPedido]' type='hidden' value='$col[idPedido]' name='idPedido'></input>
                                        </div>
                                    </div>
                                    <div class='col-xxl-2 col-lg-3 col-sm-3'>
                                        <form id='dPedido' method='post' action='borrar_pedido.php'>
                                        <input type='hidden' value='$col[Codigo]' name='delcodigo'></input>
                                        
                                        </form>
                                        <div>
                                            <button form='dPedido' type='submit' name='delpedido' class='btn-sm btn-primary'>Cancelar Pedido</button>
                                            <a href='factura.php?id=$col[idPedido]' target='_blank'><button type='button' style='margin-top: 5px;' class='btn-sm btn-primary'>Ver Factura</button></a>
                                            <h5 style='text-align: left;'><span>Estado:</span><form id='formEst$col[idPedido]' method='post' action='actualizar_estado.php'><select name='pEstado'><option value=''>Actual: $col[Estado]</option> <option value='En Espera'>En Espera</option> <option value='Enviado'>Enviado</option> <option value='Entregado'>Entregado</option> </select></form></h5>
                                            <h5 style='text-align: left;'><span>Codigo: <span'>$col[Codigo]</span></span></h5>
                                            <h5 style='text-align: left;'><span>Fecha: <span>$col[Fecha]</span></span></h5>
                                        </div>
                                    </div>
                                </div>";
                    } ?>
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