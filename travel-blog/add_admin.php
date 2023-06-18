<?php
// Obtener el usuario_id del parámetro en la URL

// Realizar la conexión a la base de datos
require "conexion.php";

// Crear la consulta SQL preparada para eliminar el registro
$id = $_GET['updateid'];

if(isset($_GET['updateid'])) {

    // para el registro de usuarios
    $sql = "UPDATE registro SET tipo_usuario = 0 WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "<script> window.alert('¡El usuario se ha asignado como administrador!'); window.location='dashboard.php'</script>";
    } else {
        echo "<script> window.alert('¡Error al asignar al usuario!'); window.location='dashboard.php'</script>";

    }
}
?>