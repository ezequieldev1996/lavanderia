<?php
// Conexión a la base de datos
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meerkatsdb";

$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
  die("Error en la conexión: " . $conexion->connect_error);
}*/
require "conexion.php";


// Recibir datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tip_doc = $_POST['type_doc'];
$nu_doc = $_POST['nu_doc'];
$telef = $_POST['telef'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$contraseña = hash('sha512' , $contraseña);//encripta la contraseña en sql//

// Insertar datos en la tabla "almacenista"
$sql = "INSERT INTO administrativo (nombre, apellido, tip_doc, nu_doc, telef, usuario, contraseña)
VALUES ('$nombre', '$apellido', '$tip_doc', '$nu_doc', '$telef', '$usuario', '$contraseña')";

if ($conexion->query($sql) === TRUE) {
  echo "Registro exitoso";
} else {
  echo "Error al registrar el almacenista: " . $conexion->error;
}
echo "<a href='administrativo.html'> volver a registro </a>";
// Cerrar la conexión
$conexion -> close ();
?>