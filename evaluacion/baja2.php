<?php
include("Conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedUserId = $_POST['modificar'];

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tip_doc = $_POST['tip_doc'];
    $num_doc = $_POST['num_doc'];
    $telefono = $_POST['telefono'];
    $usuario = $_POST['usuario'];
    $pais = $_POST['pais'];

    $sql = "DELETE FROM formulario WHERE id=$selectedUserId";


    if ($conexion->query($sql) === TRUE) {
        echo "HOLA MUNDO ";

    } else {
        echo "Error al actualizar los datos: " . $conexion->error;
    }
    echo "  <a href='baja.php'> volver al formulario</a>";
}

$conexion->close();
?>