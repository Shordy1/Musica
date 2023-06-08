<?php

  require "bdCreate.php";

  $error = null;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["descuento"]<0 ||  empty($_POST["cantidad"]) ||  empty($_POST["id_producto"]) ||  empty($_POST["id_sucursal"]) ) {
      $error = "Rellene los campos.";
    } else {
     
      $descuento = $_POST["descuento"];
      $cantidad = $_POST["cantidad"];
      $id_producto = $_POST["id_producto"];
      $id_sucursal = $_POST["id_sucursal"];

    
      $statement = $conn->prepare("INSERT INTO stock (descuento, cantidad, id_producto, id_sucursal) VALUES ( :descuento, :cantidad, :id_producto, :id_sucursal)");

      $statement->bindParam(":descuento", $_POST["descuento"]);
      $statement->bindParam(":cantidad", $_POST["cantidad"]);
      $statement->bindParam(":id_producto", $_POST["id_producto"]);
      $statement->bindParam(":id_sucursal", $_POST["id_sucursal"]);  
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

        <form method="POST" action="add-stock.php"  name="form1" id="form1" style="margin-right: 2%; ">
            <div class="login">
                <h2>Agregar Stock</h2>
               
              
                <div class="inputBox">
                    <input id="descuento" name="descuento" type="number" placeholder="descuento">
                </div>
                <div class="inputBox">
                    <input id="cantidad" name="cantidad" type="number" placeholder="cantidad">
                </div>
                <div class="inputBox">
                    <input id="id_producto" name="id_producto" type="number" placeholder="id_producto">
                </div>
                <div class="inputBox">
                    <input id="id_sucursal" name="id_sucursal" type="number" placeholder="id_sucursal">
                </div>
                
                
                <div class="inputBox">
                    <input type="submit" value="Agregar" id="btn">
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