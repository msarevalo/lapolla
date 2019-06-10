<!DOCTYPE html>
<html>
<head>
    <title>La Polla | Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <!-- Estilos -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="../css/estilos.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/Logo-Polla.png">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/scripts.js" type="application/javascript"></script>
</head>
<body>
<header id="main-header">
    <a id="logo-header" href="home.php">
        <img src="../img/Logo-Polla.png" id="logo">
    </a> <!-- / #logo-header -->
    <div class="menu_bar">
        <a href="#" class="bt-menu"><span class="icon-list2"></span><img src="../img/menuhamburguesa.png" style="width: 30px"></a>
    </div>
    <nav>
        <ul>
            <li><a href="home.php" class="active" style="cursor:pointer;">Inicio</a></li>
            <li><a href="partidos.php">Partidos</a></li>
            <li>
                <?php
                include ("../back/conexion.php");
                if (!isset($_SESSION['username'])){
                    header("Location: ../public/home.php");
                }else{
                    echo "<a href='cuenta.php'>Mi Cuenta</a>";
                }
                ?>
            </li>
            <li>
                <?php
                if (!isset($_SESSION['username'])){
                    echo "<a href=\"registro.php\">Registrarme</a>";
                }else{
                    echo "<a href='../back/cerrar.php'>Cerrar Sesion</a>";
                }
                ?>
            </li>
        </ul>
    </nav><!-- / nav -->

</header>
<div class="participa">
    <label class="textos-p" style="height: 10px">Ingresa el marcador para el próximo partido. Recuerda que una vez enviado tu marcador no podras modificarlo.</label><br><br>
    <!-- Slide THREE -->
    <form>
    <div class="slideThree">
        <input type="checkbox" value="None" id="slideThree" name="check" onclick="select()" checked/>
        <label for="slideThree"></label>
    </div>
    <div class="slideThree">
        <input type="checkbox" value="None" id="slideThree1" name="check" />
        <label for="slideThree1"></label>
    </div>
    </form>
</div>