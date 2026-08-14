<?php
//declarar variables de la BD
$server = "localhost";
$database = "parcial";
$username = "root";
$password = "";  
//establecer conexion
$conexion = mysqli_connect($server, $username, $password, $database);


if ($conexion) {
    echo "conectado correctamente.";
} else {
    echo "Error al conectar: " . mysqli_error($conexion);
}
?>