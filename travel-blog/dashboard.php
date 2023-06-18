<?php
session_start();

// Verificar si el usuario ha iniciado sesión y su tipo de usuario es 0
if (!isset($_SESSION["tipo_usuario"]) || $_SESSION["tipo_usuario"] != 0) {
  // Redireccionar a otra página si el usuario no ha iniciado sesión o no tiene el tipo de usuario adecuado
  header("Location: index.html");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administración</title>
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@200&display=swap" rel="stylesheet">
  
  <!-- icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  
  <!-- css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="css/utility.css">

</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <?php
            require "conexion.php";
            // Consulta para obtener el campo "nombre"
            if (isset($_SESSION["correo"])) {
              $correo = $_SESSION["correo"];
              $sql = "SELECT nombre FROM registro WHERE correo = '$correo'";
              $resultado = $con->query($sql);

              if ($resultado->num_rows > 0) {
                  // Obtener el valor del campo "nombre"
                  $fila = $resultado->fetch_assoc();
                  $nombre = $fila['nombre'];

                  // Mostrar el nombre en el código HTML
                  echo '<span class="nav-item text">¡ Bienvenid@,<br> admin. ' . $nombre . ' !</span>';
              }
            }
          ?>
        </a></li>
        <li><a href="#" onclick="mostrarTabla('registro')">
          <i class="fas fa-user"></i>
          <span class="nav-item text">Registro de Usuarios</span>
        </a></li>
        <li><a href="#" onclick="mostrarTabla('publicaciones')">
          <i class="fas fa-wallet"></i>
          <span class="nav-item text">Publicaciones</span>
        </a></li>
        <li><a href="#" onclick="mostrarTabla('comentarios')">
          <i class="fas fa-chart-bar"></i>
          <span class="nav-item text">Comentarios</span>
        </a></li>
        <li><a href="logout-dash.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item text">Salir</span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
      <div id="tabla-registro" style="display: none;">
        <div class="course-box">
          <h1>Usuarios</h1>
          <table>
            <tr>
              <th>Nombre</th>
              <th>Correo Electrónico</th>
              <th>Contraseña</th>
              <th>Acciones</th>
            </tr>
            <tr>
            <?php
                // Conexión a la base de datos
                require "conexion.php";
            
                // Consulta a la base de datos
                $query = "SELECT * FROM registro WHERE tipo_usuario = 1";
                $result = mysqli_query($con, $query);
            
                // Mostrar los datos en la tabla
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['nombre'] . "</td>";
                  echo "<td>" . $row['correo'] . "</td>";
                  echo "<td>" . $row['contraseña'] . "</td>";
                  echo '<td>
                  <button title="Agregar como Administrador"><a href="add_admin.php? updateid='. $row['id'] .'" class="delete-button"><i class="bi bi-person-fill-add"></i></a></button>
                  <button title="Eliminar Usuario"><a href="delete.php?deleteid='. $row['id'] .'" class="delete-button" ><i class="bi bi-trash-fill"></i></a></button>
                  </td>';
                  echo "</tr>";
                }
            
                // Cerrar la conexión a la base de datos
                mysqli_close($con);
                ?>
            </tr>
          </table>
        </div>
        <div class="course-box">
          <h1>Administradores</h1>
          <table>
            <tr>
              <th>Nombre</th>
              <th>Correo Electrónico</th>
              <th>Contraseña</th>
              <th>Acción</th>
            </tr>
            <tr>
            <?php
                // Conexión a la base de datos
                require "conexion.php";
            
                // Consulta a la base de datos
                $query = "SELECT * FROM registro WHERE tipo_usuario = 0";
                $result = mysqli_query($con, $query);
            
                // Mostrar los datos en la tabla
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['nombre'] . "</td>";
                  echo "<td>" . $row['correo'] . "</td>";
                  echo "<td>" . $row['contraseña'] . "</td>";
                  echo '<td><button title="Eliminar Administrador"><a href="delete.php?deleteid='. $row['id'] .'" class="delete-button"><i class="bi bi-trash-fill"></i></a></button></td>'; 
                  echo "</td>";
                  echo "</tr>";
                }
            
                // Cerrar la conexión a la base de datos
                mysqli_close($con);
                ?>
            </tr>
          </table>
        </div>
      </div>
      <div id="tabla-publicaciones" style="display: none;">
        <div class="course-box">
          <table>
          <tr>
            <th>Id</th>
            <th>Lugar</th>
            <th>Contenido</th>
            <th>Imagen</th>
            <th>Acción</th>
          </tr>
          <tr>
          <?php
            // Conexión a la base de datos
            require "conexion.php";
        
            // Consulta a la base de datos
            $query = "SELECT * FROM publicaciones";
            $result = mysqli_query($con, $query);
        
            // Mostrar los datos en la tabla
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['pais'] . "</td>";
              echo "<td class='cont'>" . $row['contenido'] . "</td>";?>
              <td><img class="imagen" src="data:image/jpg/png/jpeg;base64,<?php echo base64_encode($row['imagen']);?>"></td>
              <?php
              echo '<td>
                <button title="Editar Publicación"><a href="modificar-pub.php?id='. $row['id'] .'" class="delete-button"><i class="bi bi-pencil"></i></a></button>
                <br><br><button title="Eliminar Publicación"><a href="delete.php?pubid='. $row['id'] .'" class="delete-button"><i class="bi bi-trash-fill"></i></a></button>
                </td>'; 
              echo "</tr>";
            }
        
            // Cerrar la conexión a la base de datos
            mysqli_close($con);
            ?>
          </tr>
        </table>
        </div>
      </div>
      <div id="tabla-comentarios" style="display: none;">
        <div class="course-box">
          <table>
            <tr>
              <th>Usuario</th>
              <th>Número de publicación</th>
              <th>Comentario</th>
              <th>Acción</th>
            </tr>
            <tr>
              <?php
                // Conexión a la base de datos
                require "conexion.php";
            
                // Consulta a la base de datos
                $query = "SELECT * FROM comentarios";
                $result = mysqli_query($con, $query);
            
                // Mostrar los datos en la tabla
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td class='coment'>" . $row['usuario_id'] . "</td>";
                  echo "<td class='num-pub'>" . $row['publicacion_id'] . "</td>";
                  echo "<td class='texto'>" . $row['comentario'] . "</td>";
                  echo '<td><button title="Editar Comentario"><a href="modificar.php?id='. $row['id'] .'" class="delete-button"><i class="bi bi-pencil"></i></a></button> 
                        <button title="Eliminar Comentario"><a href="delete.php?comid='. $row['id'] .'" class="delete-button"><i class="bi bi-trash-fill"></i></a></button></td>'; 
                  echo "</td>";
                  echo "</tr>";
                }
            
                // Cerrar la conexión a la base de datos
                mysqli_close($con);
              ?>
            </tr>
          </table>
        </div>
      </div>
    </div>
      </div>
    </section>
  </div>  

  <script>
    function mostrarTabla(tabla) {
      // Ocultar todas las tablas
      document.querySelectorAll('[id^="tabla-"]').forEach(tabla => {
        tabla.style.display = 'none';
      });

      // Mostrar la tabla correspondiente al hacer clic en la pestaña
      document.getElementById(`tabla-${tabla}`).style.display = 'block';
    }
</script>
</body>
</html>
