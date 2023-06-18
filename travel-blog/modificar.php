<?php
require "conexion.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $select= "SELECT * FROM comentarios WHERE id='$id'";
    $data=mysqli_query($con,$select);
    $row=mysqli_fetch_array($data);

}
// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $nombre = $_POST["nombre"];
  $comment = $_POST["comment"];

  // Verificar si el correo existe en la base de datos

      // Actualizar la contraseña en la base de datos
      $updateQuery = "UPDATE comentarios SET comentario = '$comment' WHERE usuario_id = '$nombre'";
      
      // Mostrar mensaje de éxito
      if (mysqli_query($con, $updateQuery)) {
        echo "<script> window.alert('Comentario Modificado!'); window.location='dashboard.php'</script>";
    }else{
      echo "<script> window.alert('¡Error al modificar el comentario!'); window.location='dashboard.php'</script>";
    } 
  } 
  // Cerrar la conexión a la base de datos
  mysqli_close($con);
?>
<!-- JavaScript para ocultar los mensajes después de 3 segundos -->
<script>
  setTimeout(function() {
    var successMessage = document.getElementById('successMessage');
    if (successMessage) {
      successMessage.style.display = 'none';
    }
    var errorMessage = document.getElementById('errorMessage');
    if (errorMessage) {
      errorMessage.style.display = 'none';
    }

    var notRegisteredMessage = document.getElementById('notRegisteredMessage');
    if (notRegisteredMessage) {
      notRegisteredMessage.style.display = 'none';
    }
  }, 3000);
</script>

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
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/utility.css">
  <!-- icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- boostrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title>Modificar Comentarios</title>
  <link rel="shortcut icon" href="imagenes/index-icono.ico">
  <style>
    #eye, #eye-slash {
      color: black;
    }
  </style>
</head>
<body>

<div class="main">
    <div class="row">
        <form action="modificar.php" method="post">
            <h1 class="tittle">Modificar Comentario</h1>
            <div class="input-field inputs">
                <label for="Nombre de usuario">Nombre del usuario</label>
                <input value="<?php echo $row['usuario_id'] ?>" type="text" id="Nombre de usuario" name="nombre" class="ingtext" required autocomplete="off">
            </div>

            <div class="input-field inputs">
                <label for="comentario">Comentario</label>
                <input value="<?php echo $row['comentario'] ?>" type="text" id="comentario" name="comment" class="ingtext" required autocomplete="off">
            </div>

            <div class="input-field">
                <input type="submit" class="submit" value="Modificar texto">
            </div>

            <div class="input-field">
                <br><br><a href="http://localhost/travel-blog/dashboard.php" class="reg"><i class="bi bi-arrow-left-circle-fill"></i>&nbspRegresar al panel</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
