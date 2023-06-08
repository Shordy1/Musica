<?php
require "bdCreate.php";
session_start();
$productos = $conn->query("SELECT DISTINCT * FROM  stock;");
$productos2 = $conn->query("SELECT * FROM producto;");

if (isset($_SESSION["id_usuario"])) {
  $statement = $conn->prepare("SELECT * FROM cliente WHERE id_cliente = {$_SESSION['id_usuario']} ");
  $statement->execute();
  
  $usuario = $statement->fetch(PDO::FETCH_ASSOC);
  $rol = $usuario['rol'];
  if (!$usuario) {
      unset($_SESSION["id_usuario"]);
  }
}
else{
  $rol=1;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="static/css/tienda.css">
    <link rel="stylesheet" href="static/css/style.css">
    <title>Document</title>
</head>
<body>
    <!-- Header section starts-->
    <header class="header">
        <a href="index.php" class="logo"> <i class="fa-sharp fa-solid fa-music fa-bounce">USIC.</i></a>
        <?php if ($rol !=1):?>
        <a href="add-prod.php"><i class="fa-solid fa-shop fa-beat"></i>Agregar Producto</a>
        <a href="add-stock.php"><i class="fa-solid fa-shop fa-beat"></i>Agregar Stock</a>
        <?php endif ?>

        <nav class="navbar">
            <a href="index.php"><i class="fa-solid fa-house fa-beat"></i> Inicio</a>
            <a href="tienda.php"><i class="fa-solid fa-shop fa-beat"></i>Tienda</a>
            <a href="Prov_usuario.php"><i class="fa-solid fa-user fa-beat" style="margin-right: 5px;"></i>

<?php 
if (isset($_SESSION['id_usuario'])){
  
   $nombreCompleto = $usuario['nombre'];
   $primerEspacio = strpos($nombreCompleto, ' ');
   $primerosCaracteres = substr($nombreCompleto, 0, 10);

   if ($primerEspacio !== false && $primerEspacio < 10) {
       echo substr($nombreCompleto, 0, $primerEspacio);
   } else {
       echo $primerosCaracteres;
       }

       
} else {

  ?>Usuario<?php 
}
 ?> </a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    <!-- Header section end-->
 

    <!-- Contenedor de elementos -->
    <section class="contenedor" style="margin-top: 3%; " >
    
    
    <?php if ($productos->rowCount() == 0): ?>
      <div class="col-md-4 mx-auto">
        <div class="card card-body text-center">
          <p>No productos saved yet</p>
          <a href="add.php">Add One!</a>
        </div>
      </div>
    <?php endif ?>

    <div class="contenedor-items">
        <?php foreach ($productos2 as $producto): ?>
        <?php  
        


        // $statement = $conn->prepare("SELECT DISTINCT * FROM producto WHERE id_producto = :id");
        // $statement->bindParam(':id', $producto['id_producto']);
        // $statement->execute();
        // $productoF = $statement->fetch(PDO::FETCH_ASSOC);



        ?>

        <div class="item">
            <span class="titulo-item"><?= $producto["nombre"] ?></span>
            
            <img src="<?= $producto["foto"] ?>" alt="" class="img-item">
            <p style="text-align: center;"><?= $producto["descripcion"] ?></p>
            <span class="precio-item">$<?= $producto["precio"] ?></span>
            

            <a style="text-align: center;" href="producto.php?id_producto=<?= $producto["id_producto"] ?>" class="boton-item">Ver producto</a>
            <?php if ($rol !=1):?>
              <a style="text-align: center;" href="borrar-prod.php?id_producto=<?= $producto["id_producto"] ?>" class="boton-item">Borrar</a>
              <a style="text-align: center;" href="edit-prod.php?id_producto=<?= $producto["id_producto"] ?>" class="boton-item">Editar</a>
            <?php endif ?>        
            
        </div>
        <?php endforeach ?>
        
    </div>


    </section>
    
   
    <!--Scripts-->
    <script src="static/js/script.js"></script>
    <script src="static/js/app.js"></script>
</body>
</html>