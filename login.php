<?php
require "bdCreate.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["usuario"]) || empty($_POST["contrasena"])) {
        $error = "Rellene los campos.";
    } else {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $statement = $conn->prepare("SELECT contra FROM cliente WHERE correo = :usuario ");
        $statement->bindParam(":usuario", $usuario);

        $statement->execute();

        if ($statement->rowCount() > 0) {
            $row = $statement->fetch();
            $hashedPassword = $row['contra'];


            $statement2 = $conn->prepare("SELECT id_cliente FROM cliente WHERE correo = :usuario ");
            $statement2->bindParam(":usuario", $usuario);
            $statement2->execute();
            $row2 = $statement2->fetch();
            $id_user = $row2['id_cliente'];


            $statement3 = $conn->prepare("SELECT nombre FROM cliente WHERE correo = :usuario ");
            $statement3->bindParam(":usuario", $usuario);
            $statement3->execute();
            $row3 = $statement3->fetch();
            $nombre = $row3['nombre'];

            // Verificar la contraseña
            if (password_verify($contrasena, $hashedPassword)) {
                session_start();
                $_SESSION['mensaje_exito'] = 'Inicio de sesión exitoso';
                $_SESSION['id_usuario'] = $id_user;
                header("Location: index.php");
            } else {
                $error = "Usuario o contraseña incorrectos";
            }
        } else {
            $error = "Usuario o contraseña incorrectos";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="static/css/login.css">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/error.css">
</head>
<body>
    <!-- Header section starts-->
    <header class="header">
        <a href="index.php" class="logo"> <i class="fa-sharp fa-solid fa-music fa-bounce">USIC.</i></a>
        <nav class="navbar">
            <a href="index.php"><i class="fa-solid fa-house fa-beat"></i> Inicio</a>
            <a href="tienda.php"><i class="fa-solid fa-shop fa-beat"></i>Tienda</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    <!-- Header section end-->

    <section>

        <img src="static/img/back.jpg" class="bg">

        <form method="POST" action="login.php">
          
        <div class="login">
            <h2>Iniciar sesión</h2>
            <div class="inputBox">
                <input type="text" placeholder="Usuario" id="usuario" name="usuario">
            </div>
            <div class="inputBox">
                <input type="password" placeholder="Contraseña" id="contrasena" name="contrasena">
            </div>
            <div class="inputBox">
                <input type="submit" value="Iniciar" id="btn">
            </div>
            <div class="group">
                <a href="#">Olvide la contraseña</a>
                <a href="register.php">Crear cuenta</a>
            </div>
            <?php if ($error): ?>
                    <p   class="error-box" style="margin-top: 5%;">
                         <?= $error ?>
                    </p>
            <?php endif ?>
        </div>

        </form>

    </section>
</body>
</html>