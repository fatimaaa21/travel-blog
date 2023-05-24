<?php
require "conexion.php";

$pais = $_POST["pais"];
$contenido = $_POST["texto"];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

// Crear publicacion
if(isset($_POST["btnPublicar"]))
{
    $query = "INSERT INTO publicaciones (pais,contenido,imagen) VALUES ('$pais','$contenido','$imagen')";
    $resultado = $conn->query($query);
    
    if($resultado)
    {
        echo "window.location='publico.php' </script>";
    }
    else
    {
        echo "Error: ".$sqlgrabar."<br>".mysqli_error($conn);
    }
}
?>