<?php

require "bdCreate.php";

  session_start();

  $id = $_GET["id_producto"];

  $statement = $conn->prepare("SELECT * FROM stock WHERE id_producto = :id LIMIT 1");
  $statement->execute([":id" => $id]);
  $productoStock = $statement->fetch(PDO::FETCH_ASSOC);

  $statement1 = $conn->prepare("SELECT * FROM producto WHERE id_producto = :id LIMIT 1");
  $statement1->execute([":id" => $id]);
  $producto = $statement1->fetch(PDO::FETCH_ASSOC);

  $statement2 = $conn->prepare("SELECT * FROM sucursal WHERE id_sucursal = :id LIMIT 1");
  $statement2->execute([":id" => $productoStock["id_sucursal"]]);
  $sucursal = $statement2->fetch(PDO::FETCH_ASSOC);

  $statement3 = $conn->prepare("SELECT * FROM producto a JOIN stock b on (a.id_producto = b.id_producto) JOIN sucursal c on (b.id_sucursal = c.id_sucursal) where a.id_producto = :id order by c.id_sucursal; ");
  $statement3->execute([":id" => $id]);
  $prodsucursal = $statement3->fetchAll(PDO::FETCH_ASSOC);


 

 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="static/css/tienda.css">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/auto.css">
    <link rel="stylesheet" href="static/css/fondo.css">
</head>


<body  class="">

   <header class="header">
        <a href="index.php" class="logo"> <i class="fa-sharp fa-solid fa-music fa-bounce">USIC.</i></a>
        <nav class="navbar">
            <a href="index.php"><i class="fa-solid fa-house fa-beat"></i> Inicio</a>
            <a href="tienda.php"><i class="fa-solid fa-shop fa-beat"></i>Tienda</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>

      
    <div class="container" style="text-align: center; margin-top: 10%;">
        
        <section class="py-5" style="background-color: #f5f5f5; border-radius: 10px;">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= $producto["foto"] ?>" alt="imagen no disponible" /></div>
                    <div class="col-md-6">
                        <div class="small mb-2" style="font-size: 15px;">SKU: <?= $producto["id_producto"] ?></div>
                        <!-- <div class="small mb-2" style="font-size: 15px;">Stock: <?= $productoStock["cantidad"] ?></div> -->
                        <h1 class="display-5 fw-bolder"><?= $producto["nombre"] ?></h1>
                        <div class="fs-5 mb-5">
                            <span style="font-size: 25px;">$<?= $producto["precio"] ?></span>
                        </div>


                        <form action="#" method="POST" >
                        <p class="lead"><?= $producto["descripcion"] ?></p>
                        <div class="d-flex" style="margin-left: 25%;">
                            
                            <input class="form-control text-center me-3" id="cantidad" name="cantidad" type="number" value="1"  style="max-width: 5rem" />
                            <input  id="idProd" name="idProd" type="number" value="productos.idProducto" hidden >
                            <input type="text" name="idUser" name="idUser" value="usuario.idUsuario" hidden>
                            
                            <button type="submit" class="btn btn-outline-dark flex-shrink-0" >Añadir al carro</button>
                        
                            
                        </div>
                     
                        <!-- <div class="small mb-2" style="font-size: 15px;">Sucursal: <?= $prodsucursal["nombre"] ?>, Cantidad: <?=$prodsucursal["cantidad"] ?></div> -->
                        <?php
                           
                                // Itera sobre los resultados
                                foreach ($prodsucursal as $fila) {
                                  // Aquí puedes acceder a cada columna de la fila utilizando $fila['nombre_columna']
                                  $sucursal = $fila['nombre'];
                                  $direccion = $fila['direccion'];
                                  $cantidad2 = $fila['cantidad'];
                        
                                  // Genera el código HTML para cada resultado
                                  echo "<div class='small mb-2' style='font-size: 15px;margin-top: 2rem;'>Stock disponible: </div>";
                                  echo "<div class='small mb-2' style='font-size: 15px;'>Sucursal: $sucursal, Direccion: $direccion, Cantidad: $cantidad2 </div>";

                                //   echo "<p>Sucursal: $sucursal</p>";
                                //   echo "<p>Direccion: $direccion</p>";
                                //   echo "<p>Cantidad: $cantidad2</p>";
                                //   echo "<hr>"; // Puedes agregar un separador entre cada resultado si lo deseas
                                }
                              
                            
                        ?>

                      
                        </form>


                    </div>
                </div>
            
        </section>
       


    </div>
    







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/auto.js"></script>
</body>
</html>