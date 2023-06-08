<?php 
    require "bdCreate.php";
    $producto = $conn->query("SELECT * FROM producto");

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
        <nav class="navbar">
            <a href="index.php"><i class="fa-solid fa-house fa-beat"></i> Inicio</a>
            <a href="tienda.php"><i class="fa-solid fa-shop fa-beat"></i>Tienda</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    <!-- Header section end-->
    <!-- Home section starts-->
    <section class="home" id="home">    
        <div class="image">
            <img src="static/img/tienda.jpg" alt="">
        </div>
        <div class="content">
            <p>¿Quiere comprar un instrumento musical? ¡Para que esperar, haga click abajo para comprar el suyo ahora!.</p>
        </div>
    </section>
        <!-- Home section end-->

    <!-- Contenedor de elementos -->
    <section class="contenedor">
        <div class="contenedor-items">
            <?php foreach( $producto as $productos): ?>
                <div class="item">
                <span class="titulo-item"><?= $productos["nombre"] ?></span>
                <!-- <img src="static/img/violin.webp" alt="" class="img-item"> -->
                <span class="precio-item">$99.9900</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <?php  endforeach ?>
            <div class="item">
                <span class="titulo-item">Violín Freeman Classic</span>
                <img src="static/img/violin.webp" alt="" class="img-item">
                <span class="precio-item">$99.990</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Piano Digital Nux Wk-310</span>
                <img src="static/img/piano.webp" alt="" class="img-item">
                <span class="precio-item">$469.900</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Flauta Piccolo Allegro C 6 All6465S</span>
                <img src="static/img/flauta.jpg" alt="" class="img-item">
                <span class="precio-item">$159.900</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Batería acústica Tama Imperialstar IE58H6W 6 piezas HBK</span>
                <img src="static/img/bateria.webp" alt="" class="img-item">
                <span class="precio-item">$599.900</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">SAXO ALTO NEGRO/ DORADO ETINGER</span>
                <img src="static/img/saxo.jpg" alt="" class="img-item">
                <span class="precio-item">$498.990</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Teclado Tonic de 61 Teclas TON-250</span>
                <img src="static/img/teclado.webp" alt="" class="img-item">
                <span class="precio-item">$59.900</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">GUITARRA ACUSTICA NYLON 39" ARCG44 SB</span>
                <img src="static/img/guitarra.jpg" alt="" class="img-item">
                <span class="precio-item">$57.900</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">BAJO COLOR SUNBURST-</span>
                <img src="static/img/electrica.webp" alt="" class="img-item">
                <span class="precio-item">$191.990</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Banyo electroacústico 8 cuerdas Meistehaft</span>
                <img src="static/img/banyo.webp" alt="" class="img-item">
                <span class="precio-item">$144.990</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
        </div>
        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>

            <div class="carrito-items">
                <!-- 
                <div class="carrito-item">
                    <img src="img/boxengasse.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Box Engasse</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="1" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$15.000,00</span>
                    </div>
                   <span class="btn-eliminar">
                        <i class="fa-solid fa-trash"></i>
                   </span>
                </div>
                <div class="carrito-item">
                    <img src="img/skinglam.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Skin Glam</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="3" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$18.000,00</span>
                    </div>
                   <button class="btn-eliminar">
                        <i class="fa-solid fa-trash"></i>
                   </button>
                </div>
                 -->
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total">
                        $120.000,00
                    </span>
                </div>
                <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i> </button>
            </div>
        </div>
    </section>
    
    <!--Scripts-->
    <script src="static/js/script.js"></script>
    <script src="static/js/app.js"></script>
</body>
</html>