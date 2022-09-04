<?php
session_start();
include("db.php");

@$getid = $_GET['d'];

$depa = "SELECT DISTINCT Departamento, idDepartamento FROM departamento ORDER BY Departamento";
$muni = "SELECT Municipio FROM municipio ORDER BY Municipio";

$infoconsulta = $conexion->query("SELECT `Nombres`,`Apellidos`,celular.Celular1, celular.Celular2, telefono.Telefono1, telefono.Telefono2, `Direccion`,`Barrio`, municipio.Municipio, departamento.Departamento, Contraseña, municipio.idMunicipio, departamento.idDepartamento
FROM `cliente` 
INNER JOIN celular on cliente.idCliente=celular.idCelular 
INNER JOIN telefono on cliente.idCliente=telefono.idTelefono 
INNER JOIN municipio on municipio.idMunicipio=cliente.Municipio_idMunicipio 
INNER JOIN departamento on departamento.idDepartamento=municipio.Departamento_idDepartamento 
WHERE cliente.idCliente=$_SESSION[idcliente]");
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

    <script language=JavaScript>
        function reload(form) {
            var val = form.depa.options[form.depa.options.selectedIndex].value;
            self.location = 'config_acc.php?d=' + val;
        }
    </script>

    <script language=javascript>
        function numToWhiteSpace(e) {
            e.value = e.value.replace(/[^abcdefghijklmnopqrstuvwxyzñ ]/gi, "")
        }
    </script>
    <script language=javascript>
        function keyToWhiteSpace(e) {
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
            <p class="CatTitulo">Configuración de Cuenta</p>
        </div>
        <div class="col-xxl-12">
            <div class="col-xxl-12 bodyPedido">
                <div class="row containerPedido">
                    <div class="col-xxl-10">
                        <div>
                            <?php echo "<form method='post' action='actualizar_datos.php?id=$_SESSION[idcliente]'> " ?>
                            <div class="mb-3 mt-3 row">
                                <div class="col">
                                    <?php echo "<input type='text' class='form-control boxPedido'  required placeholder='Nombres' value='$infocliente[Nombres]' name='nombres' onkeydown='numToWhiteSpace(this);' onkeyup='numToWhiteSpace(this);'>" ?>
                                </div>
                                <div class="col">
                                    <?php echo "<input type='text' class='form-control'  required placeholder='Apellidos' value='$infocliente[Apellidos]' name='apellidos' onkeydown='numToWhiteSpace(this);' onkeyup='numToWhiteSpace(this);'>" ?>
                                </div>
                            </div>
                            <div class="mb-3 mt-3 row">
                                <div class="col">
                                    <select class="form-control boxPedido" name="depa" required autofocus placeholder="Departamento" onchange="reload(this.form)">
                                        <?php
                                        echo "<option value='$infocliente[idDepartamento]'>Actual: $infocliente[Departamento]</option>";
                                        if ($stmt = $conexion->query("$depa")) {
                                            while ($col1 = $stmt->fetch_assoc())
                                                if ($col1['idDepartamento'] == @$getid) {
                                                    echo "<option selected value='$col1[idDepartamento]'>$col1[Departamento]</option>";
                                                } else {
                                                    echo "<option value='$col1[idDepartamento]'>$col1[Departamento]</option>";
                                                }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control" name="muni" required placeholder="Municipio">
                                        <?php
                                        echo "<option value='$infocliente[idMunicipio]'>$infocliente[Municipio]</option>";
                                        if (isset($getid) and strlen($getid) > 0) {
                                            if ($stmt = $conexion->prepare("SELECT Municipio,idMunicipio FROM municipio WHERE Departamento_idDepartamento=? ORDER BY Municipio")) {
                                                $stmt->bind_param('i', $getid);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                while ($col2 = $result->fetch_assoc()) {
                                                    echo "<option value='$col2[idMunicipio]'>$col2[Municipio]</option>";
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 mt-3 row">
                                <div class="col">
                                    <?php echo "<input type='text' class='form-control boxPedido'  required placeholder='Barrio' value='$infocliente[Barrio]' name='barrio'>" ?>
                                </div>
                                <div class="col">
                                    <?php echo "<input type='text' class='form-control'  required placeholder='Dirección' value='$infocliente[Direccion]'name='dir'>" ?>
                                </div>
                            </div>
                            <div class="mb-3 mt-3 row">
                                <div class="col">
                                    <?php echo "<input type='tel' class='form-control boxPedido'  required placeholder='Celular' value='$infocliente[Celular1]' name='celular1' maxlength='10' onkeydown='keyToWhiteSpace(this);'' onkeyup='keyToWhiteSpace(this);'>" ?>
                                </div>
                                <div class="col">
                                    <?php echo "<input type='tel' class='form-control'  placeholder='Celular 2' value='$infocliente[Celular2]' name='celular2' maxlength='10' onkeydown='keyToWhiteSpace(this);' onkeyup='keyToWhiteSpace(this);''>" ?>
                                </div>
                            </div>
                            <div class="mb-3 mt-3 row">
                                <div class="col">
                                    <?php echo "<input type='tel' class='form-control boxPedido'  placeholder='Telefono' value='$infocliente[Telefono1]' name='telefono1' onkeydown='keyToWhiteSpace(this);' onkeyup='keyToWhiteSpace(this);'>" ?>
                                </div>
                                <div class="col">
                                    <?php echo "<input type='tel' class='form-control'  placeholder='Telefono 2' value='$infocliente[Telefono2]' name='telefono2' onkeydown='keyToWhiteSpace(this);' onkeyup='keyToWhiteSpace(this);'>" ?>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <button type="submit" name="actDatos" class="btn-sm btn-primary btnLeft">Guardar Cambios</button>
                                </div>
                            </div>
                            </form>
                            <?php echo "<form method='post' action='actualizar_pass.php?id=$_SESSION[idcliente]'> " ?>
                            <div class="mb-3 mt-3 row">
                                <div class="col">
                                    <?php echo "<input type='password' class='form-control boxPedido' minlength='6' required placeholder='Contraseña nueva' name='pass'>" ?>
                                </div>
                                <div class="col">
                                    <?php echo "<input type='password' class='form-control' minlength='6' required placeholder='Confirmar contraseña' name='passcheck'>" ?>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <button type="submit" name="actPass" class="btn-sm btn-primary btnLeft">Cambiar Contraseña</button>
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