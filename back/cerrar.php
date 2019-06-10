<?php

include('conexion.php');
//$_SESSION['sesion']=null;
session_destroy();
$anterior = $_SERVER['HTTP_REFERER'];
//$actualizar = mysqli_query($con, "UPDATE 'usuarios' SET 'conexion'='0' WHERE 'Login'='" . $_SESSION['username'] . "'");
header("Location: " . $anterior);
//$_SESSION['username']=0;
?>