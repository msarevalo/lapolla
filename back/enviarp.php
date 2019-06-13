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

$consulta = mysqli_query($con, "INSERT INTO `apuestas` (`usuario`, `local`, `visitante`, `partido`) VALUES ('" . $_SESSION['id'] . "', '" . $local . "', '" . $visitante . "', '" . $_SESSION['idpartido'] . "');");

if ($consulta) {
    echo "<script>alert('Se realizó el registro con exito'); window.location.href='../public/cuenta.php'</script>";
}else {
    echo "<script>alert('Algo ha fallado'); window.location.href='../public/cuenta.php'</script>";
}