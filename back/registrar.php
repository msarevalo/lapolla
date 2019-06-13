<?php

include ('../back/conexion.php');

if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    //echo $nombre;
}

if (isset($_POST['apellidos'])){
    $apellidos = $_POST['apellidos'];
    //echo $apellidos;
}

if (isset($_POST['mail'])){
    $correo = $_POST['mail'];
    //echo $correo;
}

if (isset($_POST['usuario'])){
    $user = $_POST['usuario'];
    //echo $user;
}

if (isset($_POST['pass1'])){
    $pass = $_POST['pass1'];
    //echo $pass;
}

if (isset($_POST['repass'])){
    $rpass = $_POST['repass'];
    //echo $rpass;
}

if ($pass == $rpass){
    if (strpos($user,' ')!==true) {
        $encrip = password_hash($pass, PASSWORD_BCRYPT);
        //echo "<br>" . $correo;
        $consulta = mysqli_query($con, "INSERT INTO `usuarios` (`nombre`, `apellido`, `usuario`, `correo`, `pass`) VALUES ('" . $nombre . "', '" . $apellidos . "', '" . $user . "', '" . $correo . "', '" . $encrip . "');");
        /*if ($consulta){
            echo "OK";
        }else{
            echo "fallo";
        }*/
        if ($consulta) {
            $resultado = mysqli_query($con, "SELECT * FROM `usuarios` WHERE `usuarios`.`usuario` = '" . $user . "'");
            $respuesta = mysqli_fetch_all($resultado);
            $_SESSION['username'] = $respuesta[0][5];
            $_SESSION['id'] = $respuesta[0][0];
            echo "<script>alert('Se realizó el registro con exito'); window.location.href='../public/home.php'</script>";
        } else {
            echo "<script>alert('Algo ha fallado'); window.location.href='../public/registro.php'</script>";
        }
    }
    else{
        echo "<script>alert('El suaurio no puede contener espacios o signos'); window.location.href='../public/registro.php'</script>";
    }
}else{
    echo "<script>alert('Las contraseñas no son iguales'); window.location.href='../public/registro.php'</script>";
}