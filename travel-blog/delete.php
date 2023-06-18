<?php
// Obtener el usuario_id del parámetro en la URL

// Realizar la conexión a la base de datos
require "conexion.php";

// Crear la consulta SQL preparada para eliminar el registro
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // para el registro de usuarios
    $sql = "DELETE FROM registro WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if($result) {
        echo "<script> window.alert('¡El usuario se ha eliminado correctamente!'); window.location='dashboard.php'</script>";
    } else {
        echo "<script> window.alert('¡Error al eliminar el usuario!'); window.location='dashboard.php'</script>";

    }
}

if(isset($_GET['pubid'])) {
    $id = $_GET['pubid'];
    // para las publicaciones
    $sql1 = "DELETE FROM publicaciones WHERE id = $id";
    $result = mysqli_query($con, $sql1);

    if($result) {
        echo "<script> window.alert('¡La publicación se ha eliminado correctamente!'); window.location='dashboard.php'</script>";
    } else {
        echo "<script> window.alert('¡Error al eliminar la publicación!'); window.location='dashboard.php'</script>";

    }
}

if(isset($_GET['comid'])) {
    $id = $_GET['comid'];
    // para los comentarios
    $sql2 = "DELETE FROM comentarios WHERE id = $id";
    $result = mysqli_query($con, $sql2);

    if($result) {
        echo "<script> window.alert('¡El comentario se ha eliminado correctamente!'); window.location='dashboard.php'</script>";
    } else {
        echo "<script> window.alert('¡Error al eliminar el comentario!'); window.location='dashboard.php'</script>";

    }
}
$con->close();
?>
