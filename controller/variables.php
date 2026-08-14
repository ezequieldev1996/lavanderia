<?php
include "conexion.php";

if(empty($_POST['nu_doc']) || empty($_POST['fecha'])) {
    // Si no se ha seleccionado un cliente o una fecha,  este verifica los dos tanto cliente como fecha   ya mas facil no se puede hacer
    echo '<script>alert("Por favor, seleccione un cliente y una fecha."); window.history.back();</script>';
    exit; // Salir del script
}



// Verifica si las variables POST están definidas antes de intentar acceder a ellas
$num_doc = isset($_POST['nu_doc']) ? $_POST['nu_doc'] : '';
$fechaCreacion = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$type_doc = isset($_POST['type_doc']) ? $_POST['type_doc'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
$id_rol = '3';

?>


