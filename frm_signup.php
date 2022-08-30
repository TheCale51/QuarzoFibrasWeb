<?php
include("db.php");
include("validacion_signup.php");
$depa="SELECT DISTINCT Departamento, idDepartamento FROM departamento ORDER BY Departamento";
$muni="SELECT Municipio FROM municipio ORDER BY Municipio";
@$getid=$_GET['d'];
?>
<html lang="es">
    <head>
        <title>QuarzoFibras</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="estilos.css"/>
        <script src="lib/jquery-3.6.0.js" ></script>
        <link rel="stylesheet" href="lib/bootstrap-5/css/bootstrap.css" />
        <script src="lib/bootstrap-5/js/bootstrap.js" ></script>

        <script language=JavaScript>
            function reload(form){
            var val=form.depa.options[form.depa.options.selectedIndex].value;
            self.location='frm_signup.php?d=' + val;
            }
        </script>

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
                <div class="col-xxl-12 col-sm-12">
                    <p class="CatTitulo">Registro</p>
                </div>
                <div class="col-xxl-12 col-sm-12 bodyContainerSign">
                    <div class="col-xxl-12 col-sm-12 bodyFormSign">
                        <form method="post">
                        <div class="mb-3 mt-3 row">
                                <div class="col">
                                    <label for="depa" class="form-label">Departamento:</label>
                                    <select class="form-control sm" name="depa" required autofocus placeholder="Departamento" onchange="reload(this.form)">
                                        <option value="">Seleccionar</option>
                                        <?php
                                        if($stmt = $conexion->query("$depa")){
                                            while($col1=$stmt->fetch_assoc())
                                            if($col1['idDepartamento']==@$getid){
                                                echo "<option selected value='$col1[idDepartamento]'>$col1[Departamento]</option>";
                                            }else{
                                                echo "<option value='$col1[idDepartamento]'>$col1[Departamento]</option>";
                                            }
                                        }
                                        ?>
                                        </select>
                                        <small style="color: red;">IMPORTANTE Seleccione el departamento primero</small>
                                </div>
                                <div class="col">
                                    <label for="municipio" class="form-label">Municipio:</label>
                                    <select class="form-control sm" name="muni" required placeholder="Municipio">
                                        <option value="">Seleccionar</option>
                                        <?php
                                        if(isset($getid) and strlen($getid) > 0){
                                            if($stmt = $conexion->prepare("SELECT Municipio,idMunicipio FROM municipio WHERE Departamento_idDepartamento=? ORDER BY Municipio")){
                                                $stmt->bind_param('i',$getid);
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                while ($col2 = $result->fetch_assoc()){
                                                    echo "<option value='$col2[idMunicipio]'>$col2[Municipio]</option>";
                                                }
                                            }else{
                                                echo $conexion->error;
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 mt-3 row">
                                <div class="col">
                                    <label for="dir" class="form-label">Dirección:</label>
                                    <input type="text" class="form-control sm" name="dir" required placeholder="Dirección">
                                </div>
                                <div class="col">
                                    <label for="barrio" class="form-label">Barrio:</label>
                                    <input type="text" class="form-control sm" name="barrio" required placeholder="Barrio">
                                </div>
                            </div>
                            
                            <div class="mb-3 mt-3 row">
                                <div class="col">
                                    <label for="nombres" class="form-label">Nombres:</label>
                                    <input type="text" class="form-control sm" name="nombres" required placeholder="Nombres" onkeydown="numToWhiteSpace(this);" onkeyup="numToWhiteSpace(this);">
                                </div>
                                <div class="col">
                                    <label for="apellidos" class="form-label">Apellidos:</label>
                                    <input type="text" class="form-control sm" name="apellidos" required placeholder="Apellidos" onkeydown="numToWhiteSpace(this);" onkeyup="numToWhiteSpace(this);">
                                </div>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Correo:</label>
                                <input type="email" class="form-control xl" name="email" required placeholder="Correo electronico">
                            </div>

                            <div class="mb-3 mt-3 row">
                                <div class="col">
                                    <label for="celular1" class="form-label">Celular:</label>
                                    <input type="tel" class="form-control sm" name="celular1" required placeholder="Celular" minlength="10" maxlength="10" onkeydown="keyToWhiteSpace(this);" onkeyup="keyToWhiteSpace(this);">
                                </div>
                                <div class="col">
                                    <label for="celular2" class="form-label">Celular 2:</label>
                                    <input type="tel" class="form-control sm" name="celular2" placeholder="Celular" minlength="10" maxlength="10" onkeydown="keyToWhiteSpace(this);" onkeyup="keyToWhiteSpace(this);">
                                </div>
                            </div>

                            <div class="mb-3 mt-3 row">
                                <div class="col">
                                    <label for="telefono1" class="form-label">Telefono:</label>
                                    <input type="tel" class="form-control sm" name="telefono1" placeholder="Telefono" minlength="7" maxlength="7" onkeydown="keyToWhiteSpace(this);" onkeyup="keyToWhiteSpace(this);">
                                </div>
                                <div class="col">
                                    <label for="telefono2" class="form-label">Telefono 2:</label>
                                    <input type="tel" class="form-control sm" name="telefono2" placeholder="Telefono" minlength="7" maxlength="7" onkeydown="keyToWhiteSpace(this);" onkeyup="keyToWhiteSpace(this);">
                                </div>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="fechaNac" class="form-label">Fecha de Nacimiento:</label>
                                <input type="date" class="form-control xl" required name="fechaNac">
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="pass" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control xl" minlength="6" required placeholder="Contraseña" name="pass">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="passcheck" class="form-label">Confirmar contraseña:</label>
                                <input type="password" class="form-control xl" minlength="6" required placeholder="Repite la contraseña" name="passcheck">
                            </div>
                            <button type="submit" name="register" class="btn-sm btn-primary mt-3 btnLeft">Registrarse</button>
                        </form>
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