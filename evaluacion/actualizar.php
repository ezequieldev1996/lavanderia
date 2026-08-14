<?php
// Establecer la conexión con la base de datos
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "evaluacion";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
 ($_SERVER["REQUEST_METHOD"] == "POST") ;
  // Recoger los datos del formulario
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tip_doc = $_POST['tip_doc'];
  $num_doc = $_POST['num_doc'];
  $telefono = $_POST['telefono'];
  $usuario = $_POST['usuario'];
  $pais = $_POST['pais'];

  // Actualizar los datos en la base de datos
  $sql = "UPDATE formulario SET nombre='$nombre', apellido='$apellido', tip_doc='$tip_doc', num_doc='$num_doc', telefono='$telefono', usuario='$usuario', pais='$pais' WHERE id=1";

  if ($conn->query($sql) === TRUE) {
    echo "Los datos se actualizaron correctamente";
  } else {
    echo "Error al actualizar los datos: " . $conn->error;
  }


// Cerrar la conexión
$conn->close();
?>
