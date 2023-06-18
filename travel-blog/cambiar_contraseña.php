<?php
require "conexion.php";

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $correo = $_POST["correo"];
  $contraseñaAntigua = $_POST["contrasena_antigua"];
  $nuevaContraseña = $_POST["nueva_contrasena"];

  // Verificar si el correo existe en la base de datos
  $query = "SELECT * FROM registro WHERE correo = '$correo'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    // El correo existe en la base de datos, verificar la contraseña antigua
    $row = mysqli_fetch_assoc($result);
    $contraseñaGuardada = $row["contraseña"];

    if ($contraseñaAntigua == $contraseñaGuardada) {
      // Actualizar la contraseña en la base de datos
      $updateQuery = "UPDATE registro SET contraseña = '$nuevaContraseña' WHERE correo = '$correo'";
      mysqli_query($con, $updateQuery);
      // Mostrar mensaje de éxito
        echo "<p id='successMessage'>La contraseña se ha cambiado exitosamente.</p>";
    }else{
      // Contraseña antigua incorrecta
      echo "<p id='errorMessage'>La contraseña antigua es incorrecta.</p>";
    } 
  } else{
    // El correo no existe en la base de datos
     echo "<p id='notRegisteredMessage'>El correo ingresado no está registrado.</p>";
  }


  // Cerrar la conexión a la base de datos
  mysqli_close($con);
}
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- boostrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title>Cambio de contraseña</title>
  <link rel="shortcut icon" href="imagenes/index-icono.ico">
  <style>
    #eye, #eye-slash {
      color: black;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
      <div class="row">
        <div class="col-md-6 side-image"></div>
        <div class="col-md-6 right">
          <div class="input-box">
            <form action="cambiar_contraseña.php" method="post">
              <h1>Cambiar contraseña</h1>
              <div class="input-field">
                <input type="text" id="correo" name="correo" class="input" required autocomplete="off">
                <label for="correo">Correo Electrónico:</label>
              </div>

              <div class="input-field">
                <input type="password" id="contrasena_antigua" name="contrasena_antigua" class="input" required autocomplete="off">
                <label for="contraseña_antigua">Contraseña Antigua:</label>
                <div class="eye-area">
                  <div class="eye-box" onclick="togglePassword('contrasena_antigua')">
                    <i class="fa-regular fa-eye" id="eye"></i>
                    <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                  </div>
                </div>
              </div>
              
              <div class="input-field">
                <input type="password" id="nueva_contrasena" name="nueva_contrasena" class="input" required autocomplete="off">
                <label for="nueva_contrasena">Nueva Contraseña:</label>
                <div class="eye-area">
                  <div class="eye-box" onclick="togglePassword('nueva_contrasena')">
                    <i class="fa-regular fa-eye" id="eye"></i>
                    <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                  </div>
                </div>
              </div>

              <div class="input-field">
                <input type="submit" class="submit" value="Cambiar Contraseña">
              </div>
            </form>
             
            <div class="signin">
              <span>¿Ya tienes una cuenta? <a href="index.html">Inicia Sesión</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    function togglePassword(inputId) {
      var passwordInput = document.getElementById(inputId);
      var eyeIcon = passwordInput.previousSibling.firstChild;
      var eyeSlashIcon = passwordInput.previousSibling.lastChild;

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.style.color = "black";
        eyeSlashIcon.style.display = "block";
      } else {
        passwordInput.type = "password";
        eyeIcon.style.color = "black";
        eyeSlashIcon.style.display = "none";
      }
    }
  </script>
</body>
</html>
