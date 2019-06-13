<?php

include ('conexion.php');

$offset=-18000; //UTC -5 horas Bogota, Lima, Quito (3.600s * -5 horas)
$numeroDia="N"; //Formato día para el gmdate (muestra el numero del dia)
$fechaDia="Y-m-d"; //formato fecha
$horaActual="H:i:s"; //formato hora
$fdia=gmdate($fechaDia, time()+$offset);//fecha del dia actual
$hactual=gmdate($horaActual, time()+$offset);
$dia = $fdia . " " . $hactual;
//$dia = "2019-06-15 14:00:00";

$partidos = mysqli_query($con, "SELECT * FROM `partidos` WHERE `fecha`>'" . $dia . "' ORDER BY `idPartido` ASC");
while ($partidoscurso = mysqli_fetch_array($partidos)){
    $local = "local" . $partidoscurso[0];
    $visitante = "visitante" . $partidoscurso[0];
    /*echo "<br>" . $local;
    echo "<br>" . $visitante;*/
    $localpost = null;
    $visitantepost = null;
    if (isset($_POST[$local])){
        //echo "<br>" . $_POST[$local];
        $localpost = $_POST[$local];
    }

    if (isset($_POST[$visitante])){
        //echo "<br>" . $_POST[$visitante];
        $visitantepost = $_POST[$visitante];
    }

    if ($localpost !== null || $visitante !== null) {
        $busqueda = mysqli_query($con, "SELECT * FROM `apuestas` WHERE `usuario`=" . $_SESSION['id'] . " AND `partido`=" . $partidoscurso[0]);
        $busquedac = mysqli_fetch_all($busqueda);
        //echo $busquedac[0][0];
        if (isset($busquedac[0][0])) {
            //echo $busquedac[0][0];
            $actualiza = mysqli_query($con, "UPDATE `apuestas` SET `local` = '" . $localpost . "', `visitante`='" . $visitantepost . "' WHERE `apuestas`.`usuario` = " . $_SESSION['id'] . " AND `apuestas`.`partido` = " . $partidoscurso[0] . ";");
        } else {
            $inserta = mysqli_query($con, "INSERT INTO `apuestas` (`usuario`, `local`, `visitante`, `partido`) VALUES ('" . $_SESSION['id'] . "', '" . $localpost . "', '" . $visitantepost . "', '" . $partidoscurso[0] . "');");
        }
    }
}

echo "<script>alert('Registros ingresados correctamente'); window.location.href='../public/cuenta.php'</script>";