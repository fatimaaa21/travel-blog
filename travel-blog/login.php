<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    $sql = "SELECT * FROM registro WHERE correo = '$correo' AND contraseña = '$contraseña'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Obtener el tipo de usuario de la consulta
        $row = mysqli_fetch_assoc($result);
        $tipo_usuario = $row['tipo_usuario'];

        // Iniciar sesión y redirigir según el tipo de usuario
        session_start();
        $_SESSION["correo"] = $correo;
        $_SESSION["tipo_usuario"] = $tipo_usuario;

        if ($tipo_usuario == 0) {
            // Redireccionar a la página para usuarios tipo 1
            header("Location: dashboard.php");
            exit();
        } elseif ($tipo_usuario == 1) {
            // Redireccionar a la página para usuarios tipo 2
            header("Location: inicio.php");
            exit();
        } else {
            // Redireccionar a otra página por defecto
            header("Location: register.php");
            exit();
        }
    } else {
        echo "<script> window.alert('¡Correo o contraseña incorrectos!'); window.location='index.html'</script>";
    }
}
?>

