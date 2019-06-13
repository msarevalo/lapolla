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

$consulta = mysqli_query($con, "UPDATE `apuestas` SET `local` = '" . $local . "', `visitante`='" . $visitante . "' WHERE `apuestas`.`usuario` = ". $_SESSION['id'] . " AND `apuestas`.`partido` = " . $_SESSION['idpartido'] . ";");

if ($consulta){
    echo "<script>alert('Se editó el marcador con exito'); window.location.href='../public/cuenta.php'</script>";
}else{
    echo "<script>alert('Algo ha fallado'); window.location.href='../public/cuenta.php'</script>";
}