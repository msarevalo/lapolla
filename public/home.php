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
    <div class="acumulados">
        <div class="pozo">
            <div style="margin-top: 14.46px">
                <label>Total Usuarios</label>
            </div>
        </div>
        <label class="valor1">4</label>
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
        <tr>
            <td>Manuel Arévalo</td>
            <td>6</td>
            <td>18</td>
            <td>Ok</td>
        </tr>
        <tr>
            <td>Fernando Torres</td>
            <td>6</td>
            <td>17</td>
            <td>Ok</td>
        </tr>
        <tr>
            <td>Edna Gomez</td>
            <td>6</td>
            <td>15</td>
            <td>No</td>
        </tr>
        <tr>
            <td>Paola Vasquez</td>
            <td>6</td>
            <td>10</td>
            <td>Ok</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="partido-curso">
    <label class="textos">Partido en Curso</label><br><br>
    <div style="margin-left: -46%;">
        <div class="resumen">
            <div class="equipos">
                <div class="equipo">
                    <label>Japon</label>
                </div>
            </div>
            <div class="marcador">
                <label>0</label>
            </div>
        </div>
        <div class="resumen" style="margin-left: 11px">
            <div class="equipos">
                <div class="equipo">
                    <label>Colombia</label>
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
                <label>SI</label>
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