<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $pass = $_POST["pass"];
    
    // Verificar si el usuario ya existe en la base de datos
    $sql = "SELECT * FROM registro WHERE nombre = '$nombre'";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<script> window.alert('¡El usuario ya está registrado!'); window.location='registrar.html'</script>";
    } else {
        // Insertar el nuevo usuario en la base de datos con tipo_usuario = 0
        $sql = "INSERT INTO registro (nombre, correo, contraseña, tipo_usuario) VALUES ('$nombre', '$correo', '$pass', 1)";
        if (mysqli_query($con, $sql)) {
            echo "<script> window.alert('¡Registro Exitoso!'); window.location='index.html'</script>";
        } else {
            echo "<script> window.alert('Error al registrar al usuario: " . mysqli_error($con). "');</script>";
        }
    }
}

mysqli_close($con);
?>

