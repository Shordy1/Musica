<?php
require "bdCreate.php";

#inicia la sesion si no esta el id manda al login 
session_start();



if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    return;
}

  $statement = $conn->prepare("SELECT * FROM cliente WHERE id_cliente = {$_SESSION['id_usuario']}");
  $statement->execute();

  $usuario = $statement->fetch(PDO::FETCH_ASSOC);
  $error = null;

  $id_cliente=$_SESSION["id_usuario"];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["rut"]) || empty($_POST["nombre"]) ||  empty($_POST["correo"]) ||  empty($_POST["direccion"]) ||  empty($_POST["contra"]) ||  empty($_POST["repContra"]) ) {
      $error = "Rellene los campos.";
    } else {
      $rut = $_POST["rut"];
      $nombre = $_POST["nombre"];
      $correo = $_POST["correo"];
      $direccion = $_POST["direccion"];
      $contra = $_POST["contra"];

      
      $hash = password_hash($contra, PASSWORD_DEFAULT);
      $statement = $conn->prepare("UPDATE cliente SET nombre = :nombre, contra = :contra, direccion = :direccion WHERE id_cliente = :id_cliente");
      $statement->bindParam(":nombre", $_POST["nombre"]);
      $statement->bindParam(":direccion", $_POST["direccion"]);
      $statement->bindParam(":contra", $hash);
      $statement->bindParam(":id_cliente", $id_cliente);
      $statement->execute();
    
      
     session_start();
     $_SESSION['mensaje_exito'] = 'Usuario editado correctamente';


      header("Location: index.php");

    


      
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

        <form method="POST" action="Prov_usuario.php"  name="form1" id="form1" style="margin-right: 2%; margin-top: 5%;">
            <div class="login">
                <h2>Crear cuenta</h2>
                <div class="inputBox">
                    <input id="rut" name="rut" type="text" value="<?=$usuario["rut_cliente"] ?>" readonly >
                </div>
                <div class="inputBox">
                    <input id="nombre" name="nombre" type="text" value="<?=$usuario["nombre"] ?>">
                </div>
                <div class="inputBox">
                    <input id="correo" name="correo" type="text" value="<?=$usuario["correo"] ?>" readonly >
                </div>
                <div class="inputBox">
                    <input id="direccion" name="direccion" type="text" value="<?=$usuario["direccion"] ?>">
                </div>
                <div class="inputBox">
                    <input id="contra" name="contra" type="password" placeholder="Contraseña">
                </div>
                <div class="inputBox">
                    <input id="repContra" name="repContra" type="password" placeholder="Repetir Contraseña">
                </div>
                <div class="inputBox">
                    <input type="submit" value="Guardar" id="btn">
                </div>
               

                <div class="inputBox">
                    <input type="button" value="Cerrar sesión" id="btn2" style="color: red;  background-color: black; color: red;">
                </div>

                
                <?php if ($error): ?>
                    <p   class="error-box" id="errorM" >
                         <?= $error ?>
                    </p>
                <?php endif ?>

                
                
            </div>
            
        </form>
        

        
        <h2 class="error-message login" id="mensaje-error"  style="display: none;" style="margin-left: 5%; "> </h2>

        
    </section>

    <script>
    document.getElementById("btn2").addEventListener("click", function() {
    // Enviar una solicitud AJAX al archivo PHP para borrar la variable de sesión
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "borrar_sesion.php", true);
    xmlhttp.send();

    // Redirigir al usuario al index.php
    window.location.href = "index.php";
});
</script>


    
    <script src="static/js/Validacion.js"></script>
</body>
</html>