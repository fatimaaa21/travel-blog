<?php
session_start();
        // Insertar el comentario en la base de datos
        require "conexion.php";

        $comment = $_POST["comment"];
        $postId = $_POST["post_id"];

        if (isset($_SESSION["correo"])) {
            $correo = $_SESSION["correo"];
            $sql = "SELECT nombre FROM registro WHERE correo = '$correo'";
            $resultado = $con->query($sql);

            if ($resultado->num_rows > 0) {
                // Obtener el valor del campo "nombre"
                $fila = $resultado->fetch_assoc();
                $nombre = $fila['nombre'];

                $sql = "INSERT INTO comentarios (usuario_id,publicacion_id, comentario) VALUES ('$nombre','$postId','$comment')";
        if (mysqli_query($con, $sql)) {
            echo "<script> window.alert('¡Comentario enviado!'); window.location='publico.php'</script>";
        } else {
            echo "<script> window.alert('¡Error al enviar el comentario!');" . mysqli_error($con). "</script>";
        }
        mysqli_close($con);
            }
          }

?>

