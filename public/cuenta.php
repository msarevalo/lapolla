<!DOCTYPE html>
<html>
<head>
    <title>La Polla | Cuenta</title>
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
    <div class="input-group input-group-lg" role="group" style="margin-left: 18%">
        <div class="input-group-radio">
            <div class="radio-btn radio-btn-primary">
                <input type="radio" checked name="routingType3" value="site" id="site12">
                <label for="site12"><i class="fa fa-globe"></i>Partido Proximo a Jugar</label>
            </div>
        </div>
        <div class="input-group-radio">
            <div class="radio-btn radio-btn-primary">
                <input type="radio" name="routingType3" value="redirect" id="redirect22">
                <label for="redirect22"><i class="fa fa-link"></i>Toda la Copa</label>
            </div>
        </div>
    </div>
    <?php
    $offset=-18000; //UTC -5 horas Bogota, Lima, Quito (3.600s * -5 horas)
    $numeroDia="N"; //Formato día para el gmdate (muestra el numero del dia)
    $fechaDia="Y-m-d"; //formato fecha
    $horaActual="H:i:s"; //formato hora
    $fdia=gmdate($fechaDia, time()+$offset);//fecha del dia actual
    $hactual=gmdate($horaActual, time()+$offset);
    $dia = $fdia . " " . $hactual;
    //$dia = "2019-06-15 14:00:00";

    $partido = mysqli_query($con, "SELECT * FROM `partidos` WHERE `fecha`>'" . $dia . "'");
    $partidocurso = mysqli_fetch_all($partido);
    $ahoral = mysqli_query($con, "SELECT * FROM `equipos` WHERE `idEquipo`=" . $partidocurso[0][1]);
    $ahorav = mysqli_query($con, "SELECT * FROM `equipos` WHERE `idEquipo`=" . $partidocurso[0][2]);
    $ahoralocal = mysqli_fetch_all($ahoral);
    $ahoravisitante = mysqli_fetch_all($ahorav);

    $participa = mysqli_query($con, "SELECT * FROM `apuestas` WHERE `apuestas`.`usuario`=" . $_SESSION['id'] . " AND `apuestas`.`partido`=" . $partidocurso[0][0]);
    $participax = mysqli_fetch_all($participa);

    if (isset($participax[0][0])){
        $local = $participax[0][2];
        $visitante = $participax[0][3];
        $texto = "Editar Marcador";
        $ruta = "../back/editarp.php";
    }else{
        $texto = "Enviar Marcador";
        $ruta = "../back/enviarp.php";
    }
    ?>
    <div>
        <div id="curso" style="display: block">
            <form method="post" action="<?php echo $ruta;?>">
                <div class="partido-curso">
                    <label class="textos" style="margin: -10%">Partido en Curso</label><br><br>
                    <div style="margin-left: -70%;">
                        <div class="resumen">
                            <div class="equipos">
                                <div class="equipo">
                                    <label><?php echo $ahoralocal[0][1]; ?></label>
                                </div>
                            </div>
                            <div class="marcador">
                                <?php
                                if (isset($participax[0][0])){
                                    echo "<input id='local' name='local' type=\"number\" placeholder=\"-\" required class=\"imarcador\" min=\"0\" step=\"1\" value='" . $local . "'>";
                                }else{
                                    echo "<input id='local' name='local' type=\"number\" placeholder=\"-\" required class=\"imarcador\" min=\"0\" step=\"1\" >";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="resumen" style="margin-left: 11px">
                            <div class="equipos">
                                <div class="equipo">
                                    <label><?php echo $ahoravisitante[0][1]; ?></label>
                                </div>
                            </div>
                            <div class="marcador">
                                <?php
                                if (isset($participax[0][0])){
                                    echo "<input id='visitante' name='visitante' type=\"number\" placeholder=\"-\" required class=\"imarcador\" min=\"0\" step=\"1\" value='" . $visitante . "'>";
                                }else{
                                    echo "<input id='visitante' name='visitante' type=\"number\" placeholder=\"-\" required class=\"imarcador\" min=\"0\" step=\"1\" >";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="resumen" style="margin-left: 11px">
                            <div class="equipos">
                                <div class="equipo">
                                    <label>Enviar</label>
                                </div>
                            </div>
                            <div class="marcador">
                                <?php
                                    $_SESSION['idpartido'] = $partidocurso[0][0];
                                    echo "<input type=\"submit\" value='" . $texto . "'>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="copa" style="display: none">
            <form method="post" action="../back/marcadores.php">
                <div class="partido-curso">
                    <label class="textos" style="margin-left: -18%">Partidos Copa America</label><br><br>

        <?php
        $partidos = mysqli_query($con, "SELECT * FROM `partidos` WHERE `fecha`>'" . $dia . "' ORDER BY `idPartido` ASC");
        $contador=0;
        while ($partidoscurso = mysqli_fetch_array($partidos)){
            //echo "<br>" . $partidoscurso[1] . $partidoscurso[2];
            $ahorasl = mysqli_query($con, "SELECT * FROM `equipos` WHERE `idEquipo`=" . $partidoscurso[1]);
            $ahorasv = mysqli_query($con, "SELECT * FROM `equipos` WHERE `idEquipo`=" . $partidoscurso[2]);
            $ahoraslocal = mysqli_fetch_all($ahorasl);
            $ahorasvisitante = mysqli_fetch_all($ahorasv);
            //echo "<br>" . $ahoraslocal[0][1] . $ahorasvisitante[0][1];

            $participacopa = mysqli_query($con, "SELECT * FROM `apuestas` WHERE `apuestas`.`usuario`=" . $_SESSION['id'] . " AND `apuestas`.`partido`=" . $partidocurso[$contador][0]);
            $participac = mysqli_fetch_all($participacopa);

            if (isset($participac[0][0])){
                $local = $participac[0][2];
                $visitante = $participac[0][3];
            }

            echo "<div style=\"margin-left: -70%;\"><div class=\"resumen\">
                                <div class=\"equipos\">
                                    <div class=\"equipo\">
                                        <label>" .  $ahoraslocal[0][1] . "</label>
                                    </div>
                                </div>
                                <div class=\"marcador\">";
                    if (isset($participac[0][0])){
                        echo "<input value='" . $local . "' name='local". $partidoscurso[0] . "' type=\"number\" placeholder=\"-\"  class=\"imarcador\" min=\"0\" step=\"1\" >";
                    }else{
                        echo "<input name='local". $partidoscurso[0] . "' type=\"number\" placeholder=\"-\"  class=\"imarcador\" min=\"0\" step=\"1\" >";
                    }

                                echo "</div>
                            </div>
                            <div class=\"resumen\" style=\"margin-left: 11px\">
                                <div class=\"equipos\">
                                    <div class=\"equipo\">
                                        <label>" . $ahorasvisitante[0][1] . "</label>
                                    </div>
                                </div>
                            <div class=\"marcador\">";
            if (isset($participac[0][0])){
                echo "<input value='" . $visitante . "' name='visitante" . $partidoscurso[0] . "' type=\"number\" placeholder=\"-\" class=\"imarcador\" min=\"0\">";
            }else{
                echo "<input name='visitante" . $partidoscurso[0] . "' type=\"number\" placeholder=\"-\" class=\"imarcador\" min=\"0\">";
            }
                            echo "</div>
                        </div>
                        <div class=\"resumen\" style=\"margin-left: 11px\">
                            <div class=\"equipos\">
                                <div class=\"equipo\">
                                    <label>Fecha</label>
                                </div>
                            </div>
                            <div class=\"marcador1\">
                                <label>" . $partidoscurso[3] . "</label>
                            </div>
                        </div>
                    </div>";
        $contador++;
        }

        ?>
                    <input type="submit" value="Enviar" id="entrar">
                </div>
            </form>
        </div>
    </div>
</div>