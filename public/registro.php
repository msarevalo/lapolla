<!DOCTYPE html>
<html>
<head>
    <title>La Polla | Registro</title>
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
                    echo "<a href=\"#\">Mi Cuenta</a>";
                }
                ?>
            </li>
            <li>
                <?php
                if (!isset($_SESSION['username'])){
                    echo "<a href=\"registro.php\">Registrarme</a>";
                }else{
                    header("Location: ../public/home.php");
                }
                ?>
            </li>
        </ul>
    </nav><!-- / nav -->

</header>
<div class="login-popup1">
    <div class="form-body">
        <form method="post" action="../back/registrar.php">
            <div class="card1">
                <div class="field1"><br>
                    <span class="header">Registro</span><br>
                    <div>
                        <table id="registra">
                            <tr>
                                <td class="td-registra">
                                    <div class="form-group">
                                        <input type="text" required="required" name="nombre" id="nombre"/>
                                        <label for="input" class="control-label">Nombre</label><i class="bar"></i>
                                        <br>
                                    </div>
                                </td>

                                <td class="td-registra">
                                    <div class="form-group">
                                        <input type="text" id="apellidos" name="apellidos" required="required"/>
                                        <label for="input" class="control-label">Apellidos</label><i class="bar"></i>
                                        <br>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-registra">
                                    <div class="form-group">
                                        <input type="email" required="required" name="mail" id="mail"/>
                                        <label for="input" class="control-label">Correo</label><i class="bar"></i>
                                        <br>
                                    </div>
                                </td>
                                <td class="td-registra">
                                    <div class="form-group">
                                        <input type="text" id="usuario" name="usuario" required="required" onkeyup='check1();'/>
                                        <label for="input" class="control-label">Usuario</label><i class="bar"></i>
                                        <span id='message1'><br></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-registra">
                                    <div class="form-group">
                                        <input type="password" required="required" name="pass1" id="pass1" onkeyup='check();'/>
                                        <label for="input" class="control-label">Contraseña</label><i class="bar"></i>
                                        <br>
                                    </div>
                                </td>
                                <td class="td-registra">
                                    <div class="form-group">
                                        <input type="password" id="repass" name="repass" required="required" onkeyup='check();'/>
                                        <label for="input" class="control-label">Confirma Contraseña</label><i class="bar"></i>
                                        <span id='message'><br></span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <img src="../img/eye.png" style="width: 3.5%; opacity: 0.5;" id="eye1">
                        <label id="mostrar1" style="opacity: 0.5;"> Ver Contraseña</label><br><br>
                    </div>
                    <button id="entrar" type="submit">Registrarme</button>
                </div>
            </div>
        </form>
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