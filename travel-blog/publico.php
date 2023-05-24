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
    <title>  Público</title>
    <link rel="shortcut icon" href="imagenes/publico-icono.ico">
</head>
<body>
    <!-- barra de navegación -->
    <nav class = "navbar">
        <div class = "container flex">
            <img src = "imagenes/logotipo.png">
            <a href = "inicio.html" class = "site-brand">
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
                    <a href = "bienvenida.html" class = "nav-link">Bienvenida</a>
                </li>
                <li class = "nav-item">
                    <a href = "guia.html" class = "nav-link">Guía</a>
                </li>
                <li class = "nav-item">
                    <a href = "galeria.html" class = "nav-link">Galería</a>
                </li>
                <li class = "nav-item">
                    <a href = "publico.php" class = "nav-link">Público</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- fin de la barra de navegación -->

    <!-- encabezado -->
    <header class="flex header-sm">
        <div class="container">
            <div class="header-title">
                <h1>- Público -</h1>
            </div>
        </div>
    </header>
    <!-- fin del encabezado -->

    <!-- seccion de publico -->
    <div class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">Compartenos</span>
                <h2 class="lg-title">tu experiencia viajando</h2>
            </div>
        </div>
    </div>

    <div id="formulario">
        <form action="publicaciones.php" method="post" enctype="multipart/form-data">
            <div class="public">
                <p>¿A qué estado de México viajaste?</p>
                <select name="pais" class="form-select">
                    <option selected disabled>--</option>
                    <option>Aguascalientes</option>
                    <option>Baja California</option>
                    <option>Baja California Sur</option>
                    <option>Campeche</option>
                    <option>Coahuila</option>
                    <option>Colima</option>
                    <option>Chiapas</option>
                    <option>Chihuahua</option>
                    <option>Durango</option>
                    <option>Distrito Federal</option>
                    <option>Guanajuato</option>
                    <option>Guerrero</option>
                    <option>Hidalgo</option>
                    <option>Jalisco</option>
                    <option>México</option>
                    <option>Michoacán</option>
                    <option>Morelos</option>
                    <option>Nayarit</option>
                    <option>Nuevo León</option>
                    <option>Oaxaca</option>
                    <option>Puebla</option>
                    <option>Querétaro</option>
                    <option>Quintana Roo</option>
                    <option>San Luis Potosí</option>
                    <option>Sinaloa</option>
                    <option>Sonora</option>
                    <option>Tabasco</option>
                    <option>Tamaulipas</option>
                    <option>Tlaxcala</option>
                    <option>Veracruz</option>
                    <option>Yucatán</option>
                    <option>Zacatecas</option>
                </select>

                <p>Añade un comentario</p>
                <textarea name="texto" class="texto" cols="40" rows="3"></textarea>
                <input name="imagen" type="file" id="file" accept="image/*" hidden>
                <div class="img-area" data-img="">
                    <i class="bi bi-image icon"></i>
                </div>

                <div class="select-image">
                    <p class="text">¡Añade una imagen!</p>
                </div>
            </div>
            <button type="submit" class="btnform" name="btnPublicar">Publicar</button>
        </form>
    </div>
    <!-- fin de seccion de publico -->

    <!-- php -->
    <?php
        require "conexion.php";

        $query = "SELECT * FROM publicaciones";
        $resultado = $conn->query($query);
        while($columna=$resultado->fetch_assoc())
        {
    ?>
    <div class="public-row shadow">
        <div class="public-left my-2">
            <img src="data:image/jpg/png/jpeg;base64,<?php echo base64_encode($columna['imagen']);?>"/>
        </div>
        <div class="public-right">
            <span class="text"><i class="bi bi-geo-alt"></i><?php echo $columna['pais'] ?></span>
            <p class="text">"<?php echo $columna['contenido'] ?>"</p>
        </div>
    </div>

    <?php 
        }
    ?>

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
                <a class="cs text" href="index.html">Cerrar Sesión</a>
            </ul>
            
        </div>
    </footer>
    <!-- fin de pie de pagina -->

    <!-- js -->
    <script src="js/script.js"></script>

    <script>
        // agregar imagen
        const selectImage = document.querySelector('.select-image');
        const inputFile = document.querySelector('#file');
        const imgArea = document.querySelector('.img-area');

        selectImage.addEventListener('click', function () {
	    inputFile.click();
        })

        inputFile.addEventListener('change', function () {
	        const image = this.files[0]
		    const reader = new FileReader();
		    reader.onload = ()=> {
			    const allImg = imgArea.querySelectorAll('img');
			    allImg.forEach(item=> item.remove());
			    const imgUrl = reader.result;
			    const img = document.createElement('img');
			    img.src = imgUrl;
			    imgArea.appendChild(img);
			    imgArea.classList.add('active');
			    imgArea.dataset.img = image.name;
		    }
		    reader.readAsDataURL(image);
        })
    </script>
</body>
</html>