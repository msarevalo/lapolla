<?php

include ('conexion.php');

$local=null;
$visitante=null;

if (isset($_POST['local'])){
    $local = $_POST['local'];
}

if (isset($_POST['visitante'])){
    $visitante = $_POST['visitante'];
}

/*echo "<br>" . $local;
echo "<br>" . $visitante;
echo "<br>" . $_SESSION['id'];
echo "<br>" . $_SESSION['idpartido'];*/

$offset=-18000; //UTC -5 horas Bogota, Lima, Quito (3.600s * -5 horas)
$numeroDia="N"; //Formato día para el gmdate (muestra el numero del dia)
$fechaDia="Y-m-d"; //formato fecha
$horaActual="H:i:s"; //formato hora
$fdia=gmdate($fechaDia, time()+$offset);//fecha del dia actual
$hactual=gmdate($horaActual, time()+$offset);
$dia = $fdia . " " . $hactual;
//$dia = "2019-06-15 14:00:00";

$partidos = mysqli_query($con, "SELECT * FROM `partidos` WHERE `idPartido`=" . $_SESSION['idpartido'] . " ORDER BY `idPartido` ASC");
$horario = mysqli_fetch_all($partidos);

if ($dia>$horario[0][3]){
    echo "<script>alert('Lo sentimos, el partido ya ha empezado'); window.location.href='../public/cuenta.php'</script>";
}else {
    $consulta = mysqli_query($con, "UPDATE `apuestas` SET `local` = '" . $local . "', `visitante`='" . $visitante . "', `localInt` = '" . $local . "', `visitanteInt`='" . $visitante . "' WHERE `apuestas`.`usuario` = ". $_SESSION['id'] . " AND `apuestas`.`partido` = " . $_SESSION['idpartido'] . ";");

    if ($consulta) {
        echo "<script>alert('Se editó el marcador con exito'); window.location.href='../public/cuenta.php'</script>";
    } else {
        echo "<script>alert('Algo ha fallado'); window.location.href='../public/cuenta.php'</script>";
    }
}