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
                echo "<a href=\"#\" id=\"login\">Login</a>";
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
<div class="acumulados-general">
    <?php
    $cantusuarios = mysqli_query($con, "SELECT COUNT(`idUsuario`) FROM `usuarios`");
    $cantidad = mysqli_fetch_all($cantusuarios);
    ?>
    <div class="acumulados">
        <div class="pozo">
            <div style="margin-top: 14.46px">
                <label>Total Usuarios</label>
            </div>
        </div>
        <label class="valor1"><?php echo $cantidad[0][0]?></label>
    </div>
    <div class="acumulados" style="margin-left: 10px">
        <div class="pozo">
            <div style="margin-top: 14.46px">
                <label>Pozo General</label>
            </div>
        </div>
        <div class="valor">
            <label>$30.000</label>
        </div>
    </div>
</div>
<div class="textos2">
    <label class="textos">Marcadores Participantes</label><br><br>
    <table>
        <thead>
        <tr>
            <th>Participante</th>
            <th>Partidos Jugados</th>
            <th>Puntos</th>
            <th>Pago</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $usuarios = mysqli_query($con, "SELECT * FROM `usuarios` ORDER BY `puntos` DESC");
            while ($usuario = mysqli_fetch_array($usuarios)){
                $participacion = mysqli_query($con, "SELECT COUNT(`usuario`) FROM `apuestas` WHERE `usuario`=" . $usuario[0]);
                $total = mysqli_fetch_all($participacion);

                if ($usuario[9] == 0){
                    $pago = "NO";
                }else{
                    $pago = "OK";
                }

                if (isset($_SESSION['id']) && $usuario[0] == $_SESSION['id']){
                    echo "<tr>
            <td style='color: #FFC400'>". $usuario[1] . " " . $usuario[2] . "</td>
            <td style='color: #FFC400'>" . $total[0][0] . "</td>
            <td style='color: #FFC400'>" . $usuario[8] . "</td>
            <td style='color: #FFC400'>" . $pago . "</td>
        </tr>";
                }else{
                    echo "<tr>
            <td>". $usuario[1] . " " . $usuario[2] . "</td>
            <td>" . $total[0][0] . "</td>
            <td>" . $usuario[8] . "</td>
            <td>" . $pago . "</td>
        </tr>";
                }

            }
        ?>

        </tbody>
    </table>
</div>
<?php
$offset=-18000; //UTC -5 horas Bogota, Lima, Quito (3.600s * -5 horas)
$numeroDia="N"; //Formato día para el gmdate (muestra el numero del dia)
$fechaDia="Y-m-d"; //formato fecha
$horaActual="H:i:s"; //formato hora
$fdia=gmdate($fechaDia, time()+$offset);//fecha del dia actual
$hactual=gmdate($horaActual, time()+$offset);
$dia = $fdia . " " . $hactual;
//$dia = "2019-06-15 12:00:00";

$partido = mysqli_query($con, "SELECT * FROM `partidos` WHERE `fecha`>'" . $dia . "'");
$partidocurso = mysqli_fetch_all($partido);
$ahoral = mysqli_query($con, "SELECT * FROM `equipos` WHERE `idEquipo`=" . $partidocurso[0][1]);
$ahorav = mysqli_query($con, "SELECT * FROM `equipos` WHERE `idEquipo`=" . $partidocurso[0][2]);
$ahoralocal = mysqli_fetch_all($ahoral);
$ahoravisitante = mysqli_fetch_all($ahorav);
?>
<div class="partido-curso">
    <label class="textos">Partido en Curso</label><br><br>
    <div style="margin-left: -46%;">
        <div class="resumen">
            <div class="equipos">
                <div class="equipo">
                    <label><?php echo $ahoralocal[0][1]; ?></label>
                </div>
            </div>
            <div class="marcador">
                <label>0</label>
            </div>
        </div>
        <div class="resumen" style="margin-left: 11px">
            <div class="equipos">
                <div class="equipo">
                    <label><?php echo $ahoravisitante[0][1]; ?></label>
                </div>
            </div>
            <div class="marcador">
                <label>1</label>
            </div>
        </div>
        <div class="resumen" style="margin-left: 11px">
            <div class="equipos">
                <div class="equipo">
                    <label>Ganador</label>
                </div>
            </div>
            <div class="marcador">
                <?php
                if ($dia <= $partidocurso[0][5]){
                    echo "<label style='margin-left: -40%'>En Curso</label>";
                }else{
                  echo "<label>SI</label>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="login-popup">
    <div class="form-body">
        <a class="close-icon" aria-hidden="true">X</a>
        <form method="post" action="../back/validar.php">
            <div class="card">
                <a href="home.php"><img src="../img/Logo-Polla.png" style="width: 30%; margin-left: 35%; margin-top: 10%" alt="LaPolla" class="img-logo"></a>
                <br><br><br>
                <div class="field">
                    <div class="form-group">
                        <input type="text" required="required" name="user" id="user"/>
                        <label for="input" class="control-label">Usuario</label><i class="bar"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass" name="pass" required="required"/>
                        <label for="input" class="control-label">Contraseña</label><i class="bar"></i>
                    </div>
                    <div>
                        <img src="../img/eye.png" style="width: 8%; opacity: 0.5;" id="eye">
                        <label id="mostrar" style="opacity: 0.5;"> Ver Contraseña</label><br><br>
                    </div>
                    <button id="entrar" type="submit">Entrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>