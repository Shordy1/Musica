<?php

  require "bdCreate.php";

  
  $id_producto = $_GET["id_producto"];

  $statement2 = $conn->prepare("SELECT * FROM producto WHERE id_producto= :id_producto");
  $statement2->execute([":id_producto" => $id_producto]);
  
  $prod = $statement2->fetch(PDO::FETCH_ASSOC);
  
  $error = null;
  

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"]) || empty($_POST["foto"]) ||  empty($_POST["descripcion"]) ||  empty($_POST["marca"]) ||  empty($_POST["modelo"]) ||  empty($_POST["precio"]) ) {
      $error = "Rellene los campos.";
    } else {
      $nombre = $_POST["nombre"];
      $foto = $_POST["foto"];
      $descripcion = $_POST["descripcion"];
      $marca = $_POST["marca"];
      $modelo = $_POST["modelo"];
      $precio = $_POST["precio"];

     
      $statement = $conn->prepare("UPDATE producto SET nombre = :nombre , foto = :foto , descripcion = :descripcion , marca = :marca , modelo = :modelo , precio = :precio WHERE  id_producto = :id_producto;");
      $statement->bindParam(":nombre", $_POST["nombre"]);
      $statement->bindParam(":foto", $_POST["foto"]);
      $statement->bindParam(":descripcion", $_POST["descripcion"]);
      $statement->bindParam(":marca", $_POST["marca"]);
      $statement->bindParam(":modelo", $_POST["modelo"]);  
      $statement->bindParam(":precio", $_POST["precio"]); 
      $statement->bindParam(":id_producto", $id_producto); 
      $statement->execute();
    
      header("Location: tienda.php");
    
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

        <form method="POST" action="edit-prod.php"  name="form1" id="form1" style="margin-right: 2%; ">
            <div class="login">
                <h2>Modificar Producto</h2>
               
                <div class="inputBox">
                    <input id="nombre" name="nombre" type="text" value="<?=$prod["nombre"] ?>"   >
                </div>
                <div class="inputBox">
                    <input id="foto" name="foto" type="text" value="<?=$prod["foto"] ?>">
                </div>
                <div class="inputBox">
                    <input id="descripcion" name="descripcion" type="text" value="<?=$prod["descripcion"] ?>">
                </div>
                <div class="inputBox">
                    <input id="marca" name="marca" type="text" value="<?=$prod["marca"] ?>">
                </div>
                <div class="inputBox">
                    <input id="modelo" name="modelo" type="text" value="<?=$prod["modelo"] ?>">
                </div>
                <div class="inputBox">
                    <input id="precio" name="precio" type="number" value="<?=$prod["precio"] ?>">
                </div>
                
                <div class="inputBox">
                    <input type="submit" value="Modificar" id="btn">
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


    
    <!-- <script src="static/js/Validacion.js"></script> -->
</body>
</html>