<?php
session_start();

    // Obtener el contenido de la publicación del formulario
    $pais = $_POST["pais"];
    $contenido = $_POST["texto"];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    // Validar los datos si es necesario

    // Guardar la publicación en la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";

    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (!$con) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Preparar la consulta SQL para insertar la publicación
    $sql = "INSERT INTO publicaciones (pais, contenido, imagen) VALUES ('$pais', '$contenido','$imagen')";

    if (mysqli_query($con, $sql)) {
        // Publicación guardada exitosamente
        echo "<script> window.alert('¡Publicación creada exitosamente!'); window.location='publico.php'</script>";
    } else {
        // Error al guardar la publicación
        echo "<script> window.alert('¡Error al crear la publicación');" . mysqli_error($con). "</script>";
    }

    mysqli_close($con);
?>