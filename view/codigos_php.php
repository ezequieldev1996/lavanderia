<?php
//seguridad de session pagina
session_start();
$varsesion= $_SESSION['username'];
if ($varsesion == null || $varsesion == ''){
    header('location:../index.html');
    die();
}
 
?>





<?php
// Conectar a la base de datos
include "../controller/conexion.php";
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recuperar el número de documento enviado por la solicitud AJAX
// Recuperar el número de documento enviado por la solicitud AJAX
$numeroDocumento = $_POST['numeroDocumento'];

// Consultar la base de datos para obtener los datos del cliente
$sql = "SELECT type_doc, nombre, apellido, telefono, email, direccion, fecha FROM cliente WHERE num_doc = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $numeroDocumento);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar si se encontró el cliente
if ($resultado->num_rows > 0) {
    // Obtener los datos del cliente y devolverlos en formato JSON
    $cliente = $resultado->fetch_assoc();
    echo json_encode($cliente);
} else {
    // Devolver un mensaje de error si el cliente no fue encontrado
    echo json_encode(array("error" => "Cliente no encontrado"));
}
?>  