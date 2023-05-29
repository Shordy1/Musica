<?php

  require "bdCreate.php";

  $error = null;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["rut"]) || empty($_POST["nombre"]) ||  empty($_POST["correo"]) ||  empty($_POST["direccion"]) ||  empty($_POST["contra"]) ||  empty($_POST["repContra"]) ) {
      $error = "Rellene los campos.";
    } else {
      $rut = $_POST["rut"];
      $nombre = $_POST["nombre"];
      $correo = $_POST["correo"];
      $direccion = $_POST["direccion"];
      $contra = $_POST["contra"];

      $statement2 = $conn->prepare("SELECT * FROM cliente WHERE correo = :correo");
      $statement2->bindParam(":correo", $correo);
      $statement2->execute();
      if ($statement2->rowCount() > 0) {


        $error = "Ya existe una cuenta con ese correo";
        
        
    } else {
      $hash = password_hash($contra, PASSWORD_DEFAULT);
      $statement = $conn->prepare("INSERT INTO cliente (rut_cliente, correo, nombre, contra, direccion) VALUES (:rut, :correo, :nombre, :contra, :direccion)");
      $statement->bindParam(":rut", $_POST["rut"]);
      $statement->bindParam(":nombre", $_POST["nombre"]);
      $statement->bindParam(":correo", $_POST["correo"]);
      $statement->bindParam(":direccion", $_POST["direccion"]);
      $statement->bindParam(":contra", $hash);  
      $statement->execute();
    
      
     session_start();
     $_SESSION['mensaje_exito'] = 'Usuario creado correctamente';


      header("Location: index.php");

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
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
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

        <form method="POST" action="register.php"  name="form1" id="form1" style="margin-right: 2%; ">
            <div class="login">
                <h2>Crear cuenta</h2>
                <div class="inputBox">
                    <input id="rut" name="rut" type="text" placeholder="Rut">
                </div>
                <div class="inputBox">
                    <input id="nombre" name="nombre" type="text" placeholder="Nombre">
                </div>
                <div class="inputBox">
                    <input id="correo" name="correo" type="text" placeholder="Correo">
                </div>
                <div class="inputBox">
                    <input id="direccion" name="direccion" type="text" placeholder="Direccion">
                </div>
                <div class="inputBox">
                    <input id="contra" name="contra" type="password" placeholder="Contraseña">
                </div>
                <div class="inputBox">
                    <input id="repContra" name="repContra" type="password" placeholder="Repetir Contraseña">
                </div>
                <div class="inputBox">
                    <input type="submit" value="Crear" id="btn">
                </div>
                <?php if ($error): ?>
                    <p   class="error-box" id="errorM" >
                         <?= $error ?>
                    </p>
                <?php endif ?>

                
                
            </div>
            
        </form>
        

        
        <p class="login" id="mensaje-error" class="error-message" style="display: none;" style="margin-left: 5%; "> </p>

        
    </section>


    
    <script src="static/js/Validacion.js"></script>
</body>
</html>