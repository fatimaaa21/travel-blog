<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel = "stylesheet" href = "css/normalize.css">
    <link rel = "stylesheet" href = "css/utility.css">
    <link rel = "stylesheet" href = "css/inicio.css">
    <link rel = "stylesheet" href = "css/responsive.css">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>  Bienvenida</title>
    <link rel="shortcut icon" href="imagenes/bienvenida-icono.ico">
</head>
<body>
    <!-- barra de navegación -->
    <nav class = "navbar">
        <div class = "container flex">
            <img src = "imagenes/logotipo.png">
            <a href = "inicio.php" class = "site-brand">
               De aquí
               <span>para allá</span> 
            </a>

            <button type = "button" id = "navbar-show-btn" class = "flex">
                <i class = "fas fa-bars"></i>
            </button>
            <div id = "navbar-collapse">
                <button type = "button" id = "navbar-close-btn" class = "flex">
                    <i class = "fas fa-times"></i>
                </button>
            <ul class = "navbar-nav">
                <li class = "nav-item">
                    <a href = "bienvenida.php" class = "nav-link">Bienvenida</a>
                </li>
                <li class = "nav-item">
                    <a href = "guia.php" class = "nav-link">Guía</a>
                </li>
                <li class = "nav-item">
                    <a href = "galeria.php" class = "nav-link">Galería</a>
                </li>
                <li class = "nav-item">
                    <a href = "publico.php" class = "nav-link">Público</a>
                </li>
                <li class = "nav-item">
                    <a href = "index.html" class = "nav-link">Inicia Sesión</a>
                </li>
                <?php
                    session_start();
                    
                    if(isset($_SESSION["correo"])) {
                        echo '
                        <button class="tab-button nav-link" onclick="toggleTab()"><i class="bi bi-chevron-down"></i></button>
                        <div class="tab-content nav-link" id="tabContent">
                            <a class="opc" href="logout.php">Cerrar sesión</a>
                        </div>
                        ';
                    }
               ?>
            </ul>
        </div>
    </nav>
    <!-- fin de la barra de navegación -->

    <!-- encabezado -->
    <header class="flex header-sm">
        <div class="container">
            <div class="header-title">
                <h1>- Bienvenida -</h1>
            </div>
        </div>
    </header>
    <!-- fin del encabezado -->

    <!-- seccion de bienvenida -->  
    <section class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">conoce un poco</span>
                <h2 class="lg-title">de nuestro proyecto</h2>
            </div>

            <div class="welcome-row">
                <div class="welcome-left my-2">
                    <img src="imagenes/bienvenida-img.jpg" alt="welcome img">
                </div>
                <div class="welcome-right">
                    <h2>¡Bienvenidos Viajeros!</h2>
                    <p class="text">
                        Te damos la bienvenida a nuestro Blog "De aquí para allá" en donde encontrarás 
                        la suficiente información y/o puntos de interés para que puedas informarte antes
                        de viajar alguna parte del país de México y así puedas disfrutar al máximo la tan 
                        bonita experiencia de viajar en este hermoso país. 
                    </p>
                    <p class="text">
                        Si tienes alguna duda de alguno de nuestros viajes o quisieras alguna recomendación 
                        no dudes en ponerte en contacto con nosotros te responderemos lo más pronto posible.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- fin de seccion de bienvenida -->

    <!-- inicio de pie de página -->
    <footer>
        <div class="container footer-row">
            <div class="footer-item">
                <a href="inicio.html" class="site-brand">
                    De aquí<br><span>Para allá</span>
                </a>
                <p class="text">¡Gracias por visitarnos!</p>
                    <p class="text">Te invitamos a seguirnos para mantener una comunicación más cercana,
                    visitar las secciones de nuestro blog <br> para mantenerte informado de nuestros 
                    últimos viajes o bien contactarnos.</p>
                    <p class="text">¡Saludos y buen viaje!</p>
            </div>

            <div class="footer-item">
                <h2>Siguenos en:</h2>
            </div>
            <ul>
                <li class="footer-icon">
                    <span class="icon"><i class="bi bi-instagram"></i></span>
                    <a href="https://www.instagram.com/deaqu_iparaalla/" class="titulo">Instagram</a>
                </li>
            </ul>
        </div>
    </footer>
    <!-- fin de pie de pagina -->

    <!-- js -->
    <script src="js/script.js"></script>
    <script>
        function toggleTab() {
        var tabContent = document.getElementById("tabContent");
        tabContent.classList.toggle("active");
        }
    </script>
</body>
</html>