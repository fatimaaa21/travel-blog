<?php

include("conexion.php");

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$pass = $_POST["pass"];

//Registrar
if(isset($_POST["btnregistrar"]))
{
	$sqlgrabar = "INSERT INTO registro (nombre,correo,contraseña) VALUES ('$nombre','$correo','$pass')";
	
	if(mysqli_query($conn,$sqlgrabar))
	{
		echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.html' </script>";
	}else 
	{
		echo "Error: ".$sqlgrabar."<br>".mysqli_error($conn);
	}
}

//ingresar
if(isset($_POST["btningresar"]))
{
	$query = mysqli_query($conn,"SELECT * FROM registro WHERE nombre = '$nombre' AND contraseña = '$pass'");
	$nr = mysqli_num_rows($query);
	
	if($nr==1)
	{
		echo "window.location='inicio.html'";
	}else
	{
		echo "<script> alert('Usuario no existe'); window.location='index.html' </script>";
	}
}

?>