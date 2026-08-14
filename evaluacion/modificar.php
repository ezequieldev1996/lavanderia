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

    $sql = "UPDATE formulario SET nombre='$nombre', apellido='$apellido', tip_doc='$tip_doc', num_doc='$num_doc', telefono='$telefono', usuario='$usuario', pais='$pais' WHERE id=$selectedUserId";

    if ($conexion->query($sql) === TRUE) {
        echo "Los datos se actualizaron correctamente";
        
    } else {
        echo "Error al actualizar los datos: " . $conexion->error;
    }
    echo "  <a href='actualizar1.php'> volver al formulario</a>";
}

$conexion->close();
?>
