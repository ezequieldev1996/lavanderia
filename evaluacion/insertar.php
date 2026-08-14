<?php
//conexión a la base de datos
require "Conexion.php";
//datos del formulario de administrador
$nombre  = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tip_doc = $_POST['tip_doc'];
$num_doc = $_POST['num_doc'];
$telefono = $_POST['telefono'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['password'];
$contraseña = hash('sha512', $contraseña);
$pais = $_POST['pais'];
 
//consulta
 
$consulta = "INSERT INTO formulario (nombre, apellido, tip_doc, num_doc, telefono, usuario, contraseña, pais)
 VALUES('$nombre','$apellido','$tip_doc','$num_doc','$telefono','$usuario','$contraseña','$pais')";

if ($conexion->query($consulta) === true) {
    echo "registro exitoso  ";
} else {
    echo "Error: " . $consulta . "<br>" . $conexion->error;
}

echo"  <a href='formulario.html'> volver al formulario</a>";
//cerrar
$conexion->close(); 
?>
