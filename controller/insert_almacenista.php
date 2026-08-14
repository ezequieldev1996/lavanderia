<?php
//conexión a la base de datos
require "conexion.php";
//datos del formulario de almacenista
$nombre  = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tip_doc = $_POST['tip_doc'];
$num_doc = $_POST['num_doc'];
$telefono = $_POST['telefono'];
$usuario = $_POST['usuario'];
$contraseña =$_POST['password'];

 
//consulta
$contraseña_fuerte = password_hash($contraseña,PASSWORD_DEFAULT);
$consulta = "INSERT INTO almacenista (nombre, apellido, tip_doc, no_doc, telef, usuario, contraseña)
 VALUES('$nombre','$apellido','$tip_doc','$num_doc','$telefono','$usuario','$contraseña_fuerte')";

if ($conexion->query($consulta) === true) {
    echo "registro exitoso";
} else {
    echo "Error: " . $consulta . "<br>" . $conexion->error;
}
/*
echo '<div style="border-radius: 500px; overflow: hidden;">';
echo '<img src="../img/orden_trabajo.jpeg" alt="suricata feliz" style="width: 35%; border-radius: 210px;">';
echo '</div>';
echo '<a href="../view/administrativo.php" style="display: block; text-align: center; margin-top: 20px; text-decoration: none; font-size: 2.5rem;">Volver</a>';
echo '</div>';*/
echo '<script>
alert("¡Registro exitoso!"); window.location.href = "../view/administrativo.php";
</script>';
//cerrar
$conexion->close();
?>