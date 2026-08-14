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

// Datos de conexión a la base de datos
include "../controller/conexion.php";

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener el nombre de usuario enviado por el formulario
$usuario = $_POST['usuario'];

// Consulta SQL para obtener los datos del usuario
$sql = "SELECT nombre, apellido, tip_doc, nu_doc, telef FROM administrativo WHERE usuario = '$usuario'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Si se encontraron resultados, devolver los datos en formato JSON
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    // Si no se encontraron resultados, devolver un objeto vacío
    echo json_encode((object)[]);
}

$conexion->close();
?>
