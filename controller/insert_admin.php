<?php
//conexión a la base de datos
include "conexion.php";


//datos del formulario de administrador
$nombre  = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tip_doc = $_POST['tip_doc'];
$num_doc = $_POST['num_doc'];
$telefono = $_POST['telefono'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['password'];

 
//consulta
$contraseña_fuerte = password_hash($contraseña,PASSWORD_DEFAULT);
$consulta = "INSERT INTO administrativo (nombre, apellido, tip_doc, nu_doc, telef, usuario, contraseña)
 VALUES('$nombre','$apellido','$tip_doc','$num_doc','$telefono','$usuario','$contraseña_fuerte')";
//condicionales 
if ($conexion->query($consulta) === true) {
    echo "registro exitoso";
} else {
    echo "Error: " . $consulta . "<br>" . $conexion->error;
}
/*
echo '<div style="border-radius: 500px; overflow: hidden;">';
echo '<img src="../img/orden_trabajo.jpeg" alt="suricata feliz" style="width: 35%; border-radius: 210px;">';
echo '</div>';
echo '<a href="../view/master.php" style="display: block; text-align: center; margin-top: 20px; text-decoration: none; font-size: 2.5rem;">Volver al formulario</a>';
echo '</div>';*/

echo '<script>
alert("¡Registro exitoso!"); window.location.href = "../view/master.php";
</script>';
//cerrar
$conexion->close();
?>