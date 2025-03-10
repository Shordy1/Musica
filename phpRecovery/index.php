<?php
require "bdCreate.php";
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/msjE.css">
    <script src="ruta/al/msj.js"></script>
</head>
<body>
   
    <!-- Header section starts-->

    


    <header class="header">
        
    <div id="snackbar"></div>

    


        <a href="index.php" class="logo"> <i class="fa-sharp fa-solid fa-music fa-bounce">USIC.</i></a>
        <nav class="navbar">
            <a href="#home"><i class="fa-solid fa-house fa-beat"></i> Inicio</a>
            <a href="#about"><i class="fa-solid fa-info fa-beat"></i> Información </a>
            <a href="#review"><i class="fa-solid fa-star fa-beat"></i> Reseña</a>
            <a href="tienda.php"><i class="fa-solid fa-shop fa-beat"></i>Tienda</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    <!-- Header section end-->

    <!-- Home section starts-->
    <section class="home" id="home">    
    <div class="image">
        <img src="static/img/back.webp" alt="">
    </div>
    <div class="content">
        <h3>Garantia y calidad</h3>
        <p>¿Quiere comprar un instrumento musical? ¡Para que esperar, haga click abajo para comprar el suyo ahora!.</p>
        <a href="login.php" class="btn"> Iniciar sesión <span class="fas fa-chevron-right"></span></a>
    </div>
</section>
    <!-- Home section end-->

    <!-- Icons section starts-->
    <section class="icons-container">
        <div class="icons">
            <i class="far fa-address-book"></i>
            <h3>140+</h3>
            <p>especialistas en el trabajo</p>
        </div>
        <div class="icons">
            <i class="fas fa-users"></i>
            <h3>1040+</h3>
            <p>clientes satisfechos</p>
        </div>
        <div class="icons">
            <i class="fas fa-music"></i>
            <h3>500+</h3>
            <p>instrumentos musicales</p>
        </div>
        <div class="icons">
            <i class="fas fa-hospital"></i>
            <h3>80+</h3>
            <p>sedes disponibles</p>
        </div>
    </section>
    <!-- Icons section end-->


    <!-- About section starts-->
    <section class="about" id="about">
        <h1 class="heading"><span>Variedad y </span> experiencia </h1>
        <div class="row">
            <div class="image">
                <img src="static/img/b823e38cc01fdb9278b6f7faa2feda6d.gif" alt="">
            </div>
            <div class="content">
                <h3>Nos interesan sus gustos</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, fugit mollitia,
                laborum sequi nulla accusantium illum, voluptates nobis deleniti ipsum voluptatibus quasi obcaecati maiores!
                Itaque aut ducimus minus voluptas similique?</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla impedit consequatur,
                     voluptate fugiat et aliquid accusamus ducimus nemo officia distinctio.</p>
            </div>
        </div>
    </section>
    <!-- About section end-->

   
    <!-- Review section starts-->
    <!-- <section class="review" id="review">
        <h1 class="heading"> Opinión del <span>cliente</span></h1>
        <div class="box-container">
            <div class="box">
                <img src="static/img/1.webp" alt="">
                <h3>Jhon deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit aliquam nisi nemo ipsa, architecto iusto voluptas omnis,
                     nostrum officiis autem, voluptatibus consectetur odio sit tempore quibusdam necessitatibus fuga quo id?
                </p>
            </div>
            <div class="box">
                <img src="static/img/2.jpg" alt="">
                <h3>Jhon deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit aliquam nisi nemo ipsa, architecto iusto voluptas omnis,
                     nostrum officiis autem, voluptatibus consectetur odio sit tempore quibusdam necessitatibus fuga quo id?
                </p>
            </div>
            <div class="box">
                <img src="static/img/3.avif" alt="">
                <h3>Jhon deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit aliquam nisi nemo ipsa, architecto iusto voluptas omnis,
                     nostrum officiis autem, voluptatibus consectetur odio sit tempore quibusdam necessitatibus fuga quo id?
                </p>
            </div>
        </div>
    </section> -->
    <!-- Review section end-->



     <script>
        document.addEventListener('DOMContentLoaded', function() {
            var snackbar = document.getElementById('snackbar');
            var mensajeExito = "<?php echo isset($_SESSION['mensaje_exito']) ? $_SESSION['mensaje_exito'] : ''; ?>";

            if (mensajeExito !== '') {
                snackbar.textContent = mensajeExito;
                snackbar.classList.add('show');
                setTimeout(function() {
                    snackbar.remove();
                    <?php unset($_SESSION['mensaje_exito']); ?>
                    
                }, 5500);
            }
        });
    </script>

    <!-- Footer section starts-->

    <section class="footer">
        <div class="box-container">

            <div class="box">
                <h3>información de contacto</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
                <a href="#"> <i class="fas fa-envelope"></i> musicinstrument@gmail.com </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Region metropolitana Santiago, Huechuraba. </a>
            </div>

            <div class="box">
                <h3>síguenos</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            </div>
        </div>

        <div class="credit"> Pagina creada por <span> @M.U Music Instruments</span><br> Todos los derechos reservados </div>
    </section>

    <!-- Footer section end-->

    <!--loader section-->
    <div class="loader-container">
        <img src="static/IMG/01.gif" alt="">
    </div>
        <!--loader section ends-->

    <script src="static/js/script.js"></script>
    

</body>
</html>