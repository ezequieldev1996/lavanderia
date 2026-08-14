<?php
//$servername = "127.0.0.1:3300";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zuricatas";
// Crear la conexión
$conexion= new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
} 
?>


