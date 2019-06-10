<?php

include("conexion.php");
//session_start();
//echo "test";
$usuario = null;
$pass = null;
if (isset($_POST['user'])){
    $usuario = $_POST['user'];
    //echo $usuario;
}else{
    //echo "test entro";
    //header("Location: index.php");
}

if (isset($_POST['pass'])){
    $pass = $_POST['pass'];
}else{
    //header("Location: index.php");
}
//$_SESSION['username'] = "test";
$anterior = $_SERVER['HTTP_REFERER'];
$resultado = mysqli_query($con, "SELECT * FROM `usuarios` WHERE `usuarios`.`usuario` = '" . $usuario . "'");
//$result = mysql_query("SELECT * from users where user='" . $usuario . "'");
//print_r($resultado);exit;
$respuesta = mysqli_fetch_all($resultado);
//echo 'entro antes';exit;
//print_r($resultado);exit;
//print_r($respuesta);
if($resultado){
    //echo ' entro';exit;
    $hash = $respuesta[0][5];
    if (password_verify($pass, $hash) ){
        if ($respuesta[0][6]==="admin"){
            $_SESSION['username'] = $respuesta[0][5];
            $_SESSION['id'] = $respuesta[0][0];
            header("Location: ../public/admin.php");
        }else {
            $_SESSION['username'] = $respuesta[0][5];
            $_SESSION['id'] = $respuesta[0][0];
            header("Location: " . $anterior);
            //echo "entro bien";
        }
    }else{
        //echo "fallo";
        echo "<script>alert('Usuario o ontraseña incorrectos');window.location.href='" . $anterior . "'</script>";
    }
}else{
    //echo 'no entro';exit;
    echo "<script>alert('Usuario o ontraseña incorrectos');window.location.href='" . $anterior . "'</script>";
}
?>